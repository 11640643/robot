<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class IndexController extends Controller{
    public function index()
    {
        //跨控制器访问方法
        //同一个控制器controller下 可以直接用 controller()助手函数 不在一个控制器下要先引入
        // $data = \think\facade\App::controller('api/users/code');
        // $users = new users();
        // $users->login();
        
        // return view();
        
        exit;
    }
    
    public function callback(){
        $path = "./logs";
        if(!file_exists($path)) 
        { 
            //检查是否有该文件夹，如果没有就创建，并给予最高权限 
            mkdir("$path" , 0700); 
        }
        $myfile = fopen("{$path}/log.txt", "a+");
        $body = file_get_contents ("php://input");
        fwrite($myfile, $body);
        fclose($myfile); 
        $param = json_decode($body,true);
        $sign = $param['sign'];
        unset($param['sign']);
        $mksign = $this->MakeSign($param, 'A27A0342B52C7B99C9894612F168D651');
        if($sign == $mksign){
            $order = Db::name('user_recharge')->where('order_number', $param['order_sn'])->find();
            $user = model("Users")->where('id', $order['uid'])->find();
            if(!$order){
                echo "error"; 
            } else {
                Db::startTrans();
                try{
                    $res = model('api/UserRecharge')->where('id', $order['id'])->update([
                        'state'         => 1, 
                        'remarks'       => '充值',
                        'dispose_time'  => time(),
                        'pt_order'      => $param['pltf_order_sn']
                    ]);
                    $trade_number = 'L'.trading_number();//交易号
                    $trade_before_balance = $user['balance'];
                    $account_balance = $trade_before_balance + $order['money']; 
                    //生成流水
                    $tradeDetails = array(
                        'uid'                   => $order['uid'],
                        'username'              => $user['username'],
                        'trade_time'            => time(),
                        'order_number'          => $order['order_number'],
                        'trade_number'          => $trade_number,
                        'trade_type'            => 1,
                        'state'                 => 1,
                        'trade_before_balance'  => $trade_before_balance,
                        'account_balance'       => $account_balance,
                        'trade_amount'          => $order['money'],
                        'remarks'               => '用户充值'
                    );
                    model('common/TradeDetails')->tradeDetails($tradeDetails);
                    $trade_number = 'L'.trading_number();//交易号
					$order_number = 'T'.trading_number();//订单号
					if(!$user['first_charge']){
    					$ptradeDetails = array(
    		    			'uid'                   => $order['uid'],
    		    			'username'              => $user['username'],
    		    			'trade_time'            => time(),
    		    			'order_number'          => $order_number,
    		    			'trade_number'          => $trade_number,
    		    			'trade_type'            => 11,
    		    			'state'   		        => 1,
    		    			'trade_before_balance'  => $account_balance,
    		    			'account_balance'       => $account_balance + ($order['money']*0.1),
    		    			'trade_amount'          => $order['money']*0.1,
    		    			'remarks'               => '首充赠金'
    		    		);
					}
		    		if($order['money'] >= 20){
		    			$first_charge = 1;
		    		} else {
		    			$first_charge = 2;
		    		}
		    		model('common/TradeDetails')->tradeDetails($ptradeDetails);
                    model('api/Users')->where('id', $order['uid'])->setInc('balance', $order['money']+($order['money']*0.1));
                    $parentid = model('Users')->where('id', $order['uid'])->value('sid');
    	    		$parentUser = model('Users')->where('id', $parentid)->find();
    	    		
    				if($parentid && $first_charge == 1){
    					$list = model('api/TaskReward')->order('num', 'asc')->select()->toArray();
    					foreach($list as $v){
    					    $task_complete = model('api/UserTask')->where('uid', $parentid)->where('task_id', $v['id'])->where('complete', 1)->count();
    						if($task_complete){
    							continue;
    						}
    						$count = model('api/UserTask')->where('uid', $parentid)->where('invite_uid', $order['uid'])->count();
    						$task_num = model('api/UserTask')->where('uid', $parentid)->where('task_id', $v['id'])->count();
    						
    						$complete = 0;
    						if(!$count){
    						   // echo ($task_num + 1 == $v['num'])."**".$task_num."&&".$v['num']; 
    						    
    							if($task_num + 1 == $v['num']){
    								$complete = 1;
    							}
    							model('api/UserTask')->insert([
    								'uid'			=> $parentid,
    								'invite_uid'	=> $order['uid'],
    								'task_id'		=> $v['id'],
    								'complete'		=> $complete
    							]);
    							model('Users')->where('id', $parentid)->setInc('regnum');
    							break;
    						}
    					}
    				}
                    Db::commit();
                    echo "success";
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    echo "****".$e->getMessage().$e->getLine();
                    echo "error";
                }
            }
            
        }
    }
    
    public function mxgcallback(){
        $path = "./logs";
        if(!file_exists($path)) 
        { 
            //检查是否有该文件夹，如果没有就创建，并给予最高权限 
            mkdir("$path" , 0700); 
        }
        $myfile = fopen("{$path}/log.txt", "a+");
        $body = file_get_contents ("php://input");
        fwrite($myfile, $body);
        fclose($myfile); 
        $param = json_decode($body,true);
        $sign = $param['sign'];
        unset($param['sign']);
        $mksign = $this->MakeSign($param, '4BBA6EEC21810EE52638A69052EECF42');
        if($sign == $mksign){
            $order = Db::name('user_recharge')->where('order_number', $param['order_sn'])->find();
            $user = model("Users")->where('id', $order['uid'])->find();
            if(!$order){
                echo "error"; 
            } else {
                Db::startTrans();
                try{
                    $res = model('api/UserRecharge')->where('id', $order['id'])->update([
                        'state'         => 1, 
                        'remarks'       => '充值',
                        'dispose_time'  => time(),
                        'pt_order'      => $param['pltf_order_sn']
                    ]);
                    $trade_number = 'L'.trading_number();//交易号
                    $trade_before_balance = $user['balance'];
                    $account_balance = $trade_before_balance + $order['money']; 
                    //生成流水
                    $tradeDetails = array(
                        'uid'                   => $order['uid'],
                        'username'              => $user['username'],
                        'trade_time'            => time(),
                        'order_number'          => $order['order_number'],
                        'trade_number'          => $trade_number,
                        'trade_type'            => 1,
                        'state'                 => 1,
                        'trade_before_balance'  => $trade_before_balance,
                        'account_balance'       => $account_balance,
                        'trade_amount'          => $order['money'],
                        'remarks'               => '用户充值'
                    );
                    model('common/TradeDetails')->tradeDetails($tradeDetails);
                    $trade_number = 'L'.trading_number();//交易号
					$order_number = 'T'.trading_number();//订单号
					if(!$user['first_charge']){
    					$ptradeDetails = array(
    		    			'uid'                   => $order['uid'],
    		    			'username'              => $user['username'],
    		    			'trade_time'            => time(),
    		    			'order_number'          => $order_number,
    		    			'trade_number'          => $trade_number,
    		    			'trade_type'            => 11,
    		    			'state'   		        => 1,
    		    			'trade_before_balance'  => $account_balance,
    		    			'account_balance'       => $account_balance + ($order['money']*0.1),
    		    			'trade_amount'          => $order['money']*0.1,
    		    			'remarks'               => '首充赠金'
    		    		);
					}
		    		if($order['money'] >= 20){
		    			$first_charge = 1;
		    		} else {
		    			$first_charge = 2;
		    		}
		    		model('common/TradeDetails')->tradeDetails($ptradeDetails);
                    model('api/Users')->where('id', $order['uid'])->setInc('balance', $order['money']+($order['money']*0.1));
                    $parentid = model('Users')->where('id', $order['uid'])->value('sid');
    	    		$parentUser = model('Users')->where('id', $parentid)->find();
    	    		
    				if($parentid && $first_charge == 1){
    					$list = model('api/TaskReward')->order('num', 'asc')->select()->toArray();
    					foreach($list as $v){
    					    $task_complete = model('UserTask')->where('uid', $parentid)->where('task_id', $v['id'])->where('complete', 1)->count();
    						if($task_complete){
    							continue;
    						}
    						$count = model('api/UserTask')->where('uid', $parentid)->where('invite_uid', $order['uid'])->count();
    						$task_num = model('api/UserTask')->where('uid', $parentid)->where('task_id', $v['id'])->count();
    						
    						$complete = 0;
    						if(!$count){
    						   // echo ($task_num + 1 == $v['num'])."**".$task_num."&&".$v['num']; 
    						    
    							if($task_num + 1 == $v['num']){
    								$complete = 1;
    							}
    							model('api/UserTask')->insert([
    								'uid'			=> $parentid,
    								'invite_uid'	=> $order['uid'],
    								'task_id'		=> $v['id'],
    								'complete'		=> $complete
    							]);
    							model('Users')->where('id', $parentid)->setInc('regnum');
    							break;
    						}
    					}
    				}
                    Db::commit();
                    echo "success";
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    // echo "****".$e->getMessage().$e->getLine();
                    echo "error";
                }
            }
            
        }
    }

    public function expire_check(){
        $user_goods = Db::query("select * from user_goods where state=1 and good_type=2 and end_time < ".time());
        foreach($user_goods as $v){
            model("api/UserGoods")->where('id', $v['id'])->update([
                'state' => 3
            ]);
        }
    }

    public function settlement(){
        $user_goods = Db::query("select * from user_goods where state=1 and good_type=2 and unix_timestamp(NOW())-add_time> (receive_hour+1)*86400 and receive_profit = 0");

        Db::startTrans();
        try{
            foreach($user_goods as $v){
                $good = model('api/GoodList')->where('id', $v['good_id'])->find();
                if($v['receive_hour'] + 1 < $good['day']){
                    model('api/UserGoods')->where('id', $v['id'])->update([
                        'receive_profit'    => Db::raw("receive_profit+".(24*$good['income'])),
                        'total_profit'      => Db::raw('total_profit+'.(24*$good['income'])),
                        'receive_hour'      => Db::raw('receive_hour+1')
                    ]);
                } else {
                    model('api/UserGoods')->where('id', $v['id'])->update([
                        'receive_profit'    => Db::raw("receive_profit+".(24*$good['income'])),
                        'total_profit'      => Db::raw('total_profit+'.(24*$good['income'])),
                        'receive_hour'      => Db::raw('receive_hour+1'),
                        'state'             => 3
                    ]);
                    
                }
            }
            $this->expire_check();
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            print_r($e->getMessage().$e->getLine());
        }
    }
    
    function request_by_curl($data,$url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);//不抓取头部信息。只返回数据
        curl_setopt($curl, CURLOPT_TIMEOUT,5);//超时设置
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);//1表示不返回bool值
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));//重点
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 

        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
        $response = curl_exec($curl);
        if($response==false){
            echo 'Curl error: ' . curl_error($curl);
            exit;
        }
        curl_close( $curl );
        
        return $response ;
    }

    /**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    public function MakeSign($data, $key)
    {
        //签名步骤一：按字典序排序参数
        ksort($data);
        //var_dump($data);
        $string = $this->ToUrlParams($data);
        //签名步骤二：在string后加入KEY
        $string = $string .'&key='.$key;
        //echo $string;
        //签名步骤三：MD5加密
        // $str = $this->key.$data['orderid'].strval($data['amount']);
        $string = md5($string);
        return strtolower($string);
    }

    /**
     * 格式化参数格式化成url参数
     */
    public function ToUrlParams($data)
    {
        $buff = "";
        foreach ($data as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }
        
        $buff = trim($buff, "&");
        return $buff;
    }
    
    
    
}

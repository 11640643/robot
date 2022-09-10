<?php
namespace app\manage\model;

use think\Model;
use think\Db;

class UserRechargeModel extends Model{
	//表名
	protected $table = 'user_recharge';

	/**
	 * 充值订单审核view
	 */
	public function rechargeDisposeView(){
		$param = input('get.');

		$data = model('UserRecharge')->alias('v')
			->field('v.*,u.username')->join('users u','v.uid = u.id')->where('v.id',$param['id'])->find();
		// ->join('recaivables','user_recharge.rid=recaivables.id','left')
		
		// if ($data['daozhang_money'] <= 0) {
		//     $data['daozhang_money'] = $data['amount'];
		// }
		
		return array(
			'data'	=>	$data
		);
	}

	/**
	 * 充值订单处理
	 */
	public function rechargeDispose(){
		$param = input('post.');
		if(!$param) return '提交失败';

		$controlAuditTime = cache('CA_rechargeDisposeTime'.session('manage_userid')) ? cache('CA_rechargeDisposeTime'.session('manage_userid')) : time()-2;
		if(time() - $controlAuditTime < 1){
			return ' 1 秒内不能重复提交';
		}
		cache('CA_rechargeDisposeTime'.session('manage_userid'), time(), 10);

		$id = $param['id'];
		unset($param['order_number']);
		$param['aid'] = session('manage_userid');
		$param['dispose_time'] = time();
		$first_charge = 0;
		//获取订单信息
		$orderInfo = model('UserRecharge')->where('id',$id)->find();
        
		if($param['state'] == 1){
            $user = model("Users")->where('id', $orderInfo['uid'])->find();
			Db::startTrans();
			try{
				$res = model('UserRecharge')->where(array(['id','=',$id],['state','=',3]))->update([
					'state'			=> $param['state'], 
					'remarks'		=> $param['remarks'],
					'dispose_time'	=> time()
				]);
				$trade_number = 'L'.trading_number();//交易号
				$trade_before_balance = $user['balance'];
				$account_balance = $trade_before_balance + $orderInfo['money'];	
				//生成流水
	    		$tradeDetails = array(
	    			'uid'                   => $orderInfo['uid'],
	    			'username'              => $user['username'],
	    			'trade_time'            => time(),
	    			'order_number'          => $orderInfo['order_number'],
	    			'trade_number'          => $trade_number,
	    			'trade_type'            => 1,
	    			'state'   		        => 1,
	    			'trade_before_balance'  => $trade_before_balance,
	    			'account_balance'       => $account_balance,
	    			'trade_amount'          => $orderInfo['money'],
	    			'remarks'               => '用户充值'
	    		);
	    		model('common/TradeDetails')->tradeDetails($tradeDetails);
	    		model('Users')->where('id', $orderInfo['uid'])->setInc('balance', $orderInfo['money']);
				if(!$user['first_charge']){
					$trade_number = 'L'.trading_number();//交易号
					$order_number = 'T'.trading_number();//订单号
					$ptradeDetails = array(
		    			'uid'                   => $orderInfo['uid'],
		    			'username'              => $user['username'],
		    			'trade_time'            => time(),
		    			'order_number'          => $order_number,
		    			'trade_number'          => $trade_number,
		    			'trade_type'            => 11,
		    			'state'   		        => 1,
		    			'trade_before_balance'  => $account_balance,
		    			'account_balance'       => $account_balance + ($orderInfo['money']*0.1),
		    			'trade_amount'          => $orderInfo['money']*0.1,
		    			'remarks'               => '首充奖励'
		    		);
		    		model('common/TradeDetails')->tradeDetails($ptradeDetails);
		    		if($orderInfo['money'] >= 20){
		    			$first_charge = 1;
		    		} else {
		    			$first_charge = 2;
		    		}
		    		model('Users')->where('id', $orderInfo['uid'])->update([
		    			'balance'		=> Db::raw('balance+'.($orderInfo['money']*0.1)),
		    			'first_charge'	=> $first_charge
		    		]);
	    		}
	    		$parentid = model('Users')->where('id', $orderInfo['uid'])->value('sid');
	    		$parentUser = model('Users')->where('id', $parentid)->find();
	    		
				if($parentid && $first_charge == 1){
					$list = model('TaskReward')->order('num', 'asc')->select()->toArray();
					foreach($list as $v){
					    $task_complete = model('UserTask')->where('uid', $parentid)->where('task_id', $v['id'])->where('complete', 1)->count();
						if($task_complete){
							continue;
						}
						$count = model('UserTask')->where('uid', $parentid)->where('invite_uid', $orderInfo['uid'])->count();
						$task_num = model('UserTask')->where('uid', $parentid)->where('task_id', $v['id'])->count();
						
						$complete = 0;
						if(!$count){
						   // echo ($task_num + 1 == $v['num'])."**".$task_num."&&".$v['num']; 
						    
							if($task_num + 1 == $v['num']){
								$complete = 1;
							}
							model('UserTask')->insert([
								'uid'			=> $parentid,
								'invite_uid'	=> $orderInfo['uid'],
								'task_id'		=> $v['id'],
								'complete'		=> $complete
							]);
							model('Users')->where('id', $parentid)->setInc('regnum');
							break;
						}
					}
				}
	    		Db::commit();
			} catch (\Exception $e) {
	            // 回滚事务
	            Db::rollback();
	            echo $e->getMessage().$e->getLine(); exit;
	            return "操作失败";
	        }
		} else if($param['state'] == 2) {
		    $res = model('UserRecharge')->where(array(['id','=',$id],['state','=',3]))->update([
		    	'state'=>$param['state'], 
		    	'remarks'=> $param['remarks'],
		    	'dispose_time'	=> time()
		    ]);
			if(!$res){
				return "操作失败";
			}
		}

		//添加操作日志
		model('Actionlog')->actionLog(session('manage_username'),'处理充值申请',1);

		return 1;
	}
}
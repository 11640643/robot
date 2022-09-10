<?php

/**
 * 编写：祝踏岚
 * 对流水的相关操作
 */
namespace app\common\model;

use think\Model;

class TradeDetailsModel extends Model{
	//表名
	protected $table = 'trade_details';

	/**
	 * 添加流水
	 * @param  array  $array 流水数据
	 * @return bool          添加结果
	 */
	public function tradeDetails($array=array()){
		
		if (!$array) return false;
		if (!$array['uid']) return false;

		//获取用户信息
		$userInfo = model('Users')->field('username,vip_level')->where('id',$array['uid'])->findOrEmpty();
		$tradeDetailsData['username']  = (isset($userInfo['username']) && $userInfo['username']) ? $userInfo['username'] : $userInfo['username'];//会员名
		$tradeDetailsData['vip_level'] = (isset($array['vip_level']) && $array['vip_level']) ? $array['vip_level'] : $userInfo['vip_level'];//会员等级

		$tradeDetailsData['uid']                    = $array['uid'];			
		$tradeDetailsData['order_number']           = (isset($array['order_number']) && $array['order_number']) ? $array['order_number'] : 'D'.trading_number();//订单号		
		$tradeDetailsData['trade_number']           = (isset($array['trade_number']) && $array['trade_number']) ? $array['trade_number'] : 'L'.trading_number();//交易单号
		$tradeDetailsData['trade_time']             = (isset($array['trade_time']) && $array['trade_time']) ? $array['trade_time'] : time();//订单号		
		$tradeDetailsData['isadmin']                = (isset($array['isadmin']) && $array['isadmin']) ? $array['isadmin'] : 2;		
		
		//交易金额
		$tradeDetailsData['trade_amount']           = (isset($array['trade_amount']) && $array['trade_amount']) ? $array['trade_amount'] : 0;
		//提供收益用户id
		$tradeDetailsData['rebate_user']           = (isset($array['rebate_user']) && $array['rebate_user']) ? $array['rebate_user'] : 0;
		//交易前金额
		$tradeDetailsData['trade_before_balance']   = (isset($array['trade_before_balance']) && $array['trade_before_balance']) ? $array['trade_before_balance'] : 0;	
		//交易后金额
		$tradeDetailsData['account_balance']        = (isset($array['account_balance']) && $array['account_balance']) ? $array['account_balance'] : 0;
		//交易说明
		$tradeDetailsData['remarks']                = (isset($array['remarks']) && $array['remarks']) ? $array['remarks'] : '';		
		//状态
		$tradeDetailsData['state']                  = (isset($array['state']) && $array['state']) ? $array['state'] : 3;
		//交易类型
		$tradeDetailsData['trade_type']             = (isset($array['trade_type']) && $array['trade_type']) ? $array['trade_type'] : 0;//交易类型ID 
		$tradeDetailsData['aid']             = (isset($array['aid']) && $array['aid']) ? $array['aid'] : 0;//交易类型ID 
		if (!$tradeDetailsData['trade_type']) return false;	

		//流水入库
		$tid = $this->insertGetId($tradeDetailsData);
		if(!$tid) return false;

		return $tid;
	}
}
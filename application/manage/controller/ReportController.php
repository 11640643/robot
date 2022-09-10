<?php
namespace app\manage\controller;

/**
 * 编写：祝踏岚
 * 报表控制器
 */

use app\manage\controller\Common;

class ReportController extends CommonController{
    protected $users          = [];
    protected $whereid        = [];
    protected $whereuid       = [];
    protected $whereuserid    = [];
    protected $uid 			  = 0;
    
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
    	    $this->uid = $uid;
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
		return $this->data();
	}


	/**
	 * 全局统计
	 */
	public function counts(){
		$grades = model("UserGrade")->select()->toArray();
		$today_start = strtotime(date("Y-m-d"));
		$today_end = strtotime(date("Y-m-d 23:59:59"));

		$yesterday_start = strtotime("-1 days", $today_start);
		$yesterday_end = strtotime("-1 days", $today_end);

		$week_start = strtotime(date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"))));
		$week_end = strtotime(date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y"))));
		
		$month_start = strtotime(date("Y-m-d 23:59:59", strtotime("first day of this month")));
		$month_end = strtotime(date("Y-m-d 23:59:59", strtotime("last day of this month")));

		foreach($grades as &$v){
			$v['todayAdd'] = model('UserVip')->where($this->whereuid)->where('state', 1)->where('grade', $v['grade'])->whereBetween('add_time', [$today_start, $today_end])->count();
			$v['total'] = model('UserVip')->where($this->whereuid)->where('state', 1)->where('grade', $v['grade'])->count();
		}
		$total = model('UserVip')->where($this->whereuid)->where('state', 1)->count();
		for($i=1; $i<=17; $i++){
			// 今日统计
			$today[$i] = model('TradeDetails')->where($this->whereuid)->whereBetween('trade_time', [$today_start, $today_end])->where('trade_type', $i)->count();
			// 昨日统计
			$yesterday[$i] = model('TradeDetails')->where($this->whereuid)->whereBetween('trade_time', [$yesterday_start, $yesterday_end])->where('trade_type', $i)->count();
			// 本周统计
			$week[$i] = model('TradeDetails')->where($this->whereuid)->whereBetween('trade_time', [$week_start, $week_end])->where('trade_type', $i)->count();
			// 本月统计
			$month[$i] = model('TradeDetails')->where($this->whereuid)->whereBetween('trade_time', [$month_start, $month_end])->where('trade_type', $i)->count();
		}

		// 今日注册数
		$today['register'] = model('Users')->where($this->whereid)->whereBetween('reg_time', [$today_start, $today_end])->count();
		$yesterday['register'] = model('Users')->where($this->whereid)->whereBetween('reg_time', [$yesterday_start, $yesterday_end])->count();
		$week['register'] = model('Users')->where($this->whereid)->whereBetween('reg_time', [$week_start, $week_end])->count();
		$month['register'] = model('Users')->where($this->whereid)->whereBetween('reg_time', [$month_start, $month_end])->count();
		
		$total_user = model('Users')->where($this->whereid)->count();
		$forbidden_user = model('Users')->where($this->whereid)->where('state', 2)->count();
		$total_balance = model('Users')->where($this->whereid)->sum('balance');

		$this->assign([
			'grades' 			=> $grades,
			'total'				=> $total,
			'today'				=> $today,
			'yesterday'			=> $yesterday,
			'week'				=> $week,
			'month'				=> $month,
			'total_user'		=> $total_user,
			'forbidden_user' 	=> $forbidden_user,
			'total_balance'		=> $total_balance
		]);

		return $this->fetch();
	}

	/**
	 * 每日报表
	 */
	public function data(){
		$param = input('get.');
		

		$where = [];
		if(!empty($param['username'])){
			$where['username'] = trim($param['username']);
		}
		if(!empty($param['date_range'])){
			$dateTime  = explode(' - ', $param['date_range']);
			$startDate = strtotime($dateTime[0]);
			$endDate   = strtotime($dateTime[1]);
		} else {
			$startDate = mktime(0,0,0,date('m'),date('d'),date('Y')) - 86400 * 7;
			$endDate   = mktime(0,0,0,date('m'),date('d'),date('Y'));
		}

		$data = [];
		for ($i = $startDate; $i <= $endDate; $i = $i+86400 ) {
			$this_start = $i;
			$this_end = strtotime(date('Y-m-d 23:59:59', $i));
			$this_day = [];
			for($j=1; $j<=17; $j++){
				$this_day[$j] = model('TradeDetails')->where($this->whereuid)->whereBetween('trade_time', [$this_start, $this_end])->where($where)->where('trade_type', $j)->sum('trade_amount');
			}
			$this_day['date'] = date('Y-m-d', $i);
			$data[] = $this_day;
		} 
		$this->assign('data', $data);
		$this->assign('where', $param);
		return $this->fetch();
	}

	/**
	 * 团队报表
	 */
	public function team_statistic(){
		$param = input('get.'); 
		if(!empty($param['date_range'])){
			$dateTime  = explode(' - ', $param['date_range']);
			$startDate = strtotime($dateTime[0]);
			$endDate   = strtotime($dateTime[1]);
		} else {
			$startDate = mktime(0,0,0,date('m'),date('d'),date('Y')) - 86400 * 365;
			$endDate   = mktime(23,59,59,date('m'),date('d'),date('Y'));
		}
		
		$team = [
			'sum1' => 0,
			'sum2' => 0,
			'sum3' => 0,
			'sum4' => 0,
			'sum5' => 0,
			'sum6' => 0,
			'sum7' => 0,
			'sum8' => 0,
			'sum9' => 0,
			'sum10' => 0,
			'sum11' => 0,
			'sum12' => 0,
			'sum13' => 0,
			'sum14' => 0,
			'sum15' => 0,
			'sum16' => 0,
			'sum17' => 0,
		];

		if(session('manage_type') == 1){
			$user_team = model('manage')->where('manage_type', 2)->select()->toArray();
			$team['num'] = count($user_team);
			foreach($user_team as &$v){
				for($i=1; $i<=17; $i++){
					$v['list'.$i] = model('TradeDetails')->alias('t')->join('users u', 't.uid=u.id')->whereBetween('trade_time', [$startDate, $endDate])->where('u.manage_id', $v['id'])->where('trade_type', $i)->sum('trade_amount');
				// 	echo model('TradeDetails')->getLastSql(); exit;
					$team['sum'.$i] += $v['list'.$i];
				}
			}
		} else if(session('manage_type') == 2){
			$user_team = model('Users')->where('manage_id', session('manage_userid'))->where('topid', 0)->select()->toArray();
			$team['num'] = count($user_team);
			foreach($user_team as &$v){
				for($i=1; $i<=17; $i++){
					$v['list'.$i] = model('TradeDetails')->alias('t')->join('users u', 't.uid=u.id')->whereBetween('trade_time', [$startDate, $endDate])->where('u.topid', $v['id'])->where('trade_type', $i)->sum('trade_amount');
					$team['sum'.$i] += $v['list'.$i];
				}
			}
		} else {
			$team['num'] = count($this->users);
			$user_team = model('Users')->where($this->whereid)->select()->toArray();
			foreach($user_team as &$v){
				$v['username'] = model('Users')->where('id', $v['id'])->value('username');
				for($i=1; $i<=17; $i++){
					$v['list'.$i] = model('TradeDetails')->whereBetween('trade_time', [$startDate, $endDate])->where('uid', $v['id'])->where('trade_type', $i)->sum('trade_amount');
					$team['sum'.$i] += $v['list'.$i];
				}
			}
		}
		
		$this->assign('user_team', $user_team);
		$this->assign('team', $team);
		return $this->fetch();
	}

}
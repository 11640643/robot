<?php
namespace app\manage\controller;

use app\manage\controller\Common;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class BetController extends CommonController{
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
		return $this->products();
	}
	
	/**
	 * 添加项目
	 * @return [type] [description]
	 */
	public function productAdd(){
		if (request()->isAjax()) {
			$param = input('post.');
			$param['add_time'] = time();
			$param['edit_time'] = time();
			$ret = model('GoodList')->allowField(true)->save($param);
			if(!$ret){
				return '操作失败';
			}
			return 1;
		}
		$userLevel = model('UserGrade')->select()->toArray();

		return view('', [
			'userLevel' => $userLevel,
			'currency' => model('Setting')->value('currency')
		]);
	}

	/**
	 * 编辑项目
	 * @return [type] [description]
	 */
	public function productEdit(){
		if (request()->isAjax()) {
			$param = input('post.');
			$param['edit_time'] = time();
			$ret = model('GoodList')->isUpdate(true,['id'=>$param['id']])->allowField(true)->save($param);
			if(!$ret){
				return '操作失败';
			}
			return 1;
		}

		$id                       = input('get.id/d');
		$data                     = model('GoodList')->where('id', $id)->find();
		$userLevel                = model('UserGrade')->select()->toArray();

		return view('', [
			'data'      => $data,
			'userLevel' => $userLevel,
			'currency' => model('Setting')->value('currency')
		]);
	}

	/**
	 * 删除项目
	 * @return [type] [description]
	 */
	public function productDel(){
		$id = empty(input('post.id')) ? 0 : input('post.id');
		$ret = model('GoodList')->where('id', $id)->delete();
		if(!$ret){
			return '操作失败';
		}
		return 1;
	}
    
    /**
	 * 编辑项目
	 * @return [type] [description]
	 */
	public function trade_edit(){
		if (request()->isAjax()) {
			$param = input('post.');
			$param['edit_time'] = time();
			$ret = model('TradeDetails')->isUpdate(true,['id'=>$param['id']])->allowField(true)->save($param);
			if(!$ret){
				return '操作失败';
			}
			return 1;
		}

		$id                       = input('get.id/d');
		$data                     = model('TradeDetails')->where('id', $id)->find();

		return view('', [
			'data'      => $data
		]);
	}

	/**
	 * 删除项目
	 * @return [type] [description]
	 */
	public function trade_del(){
		$id = empty(input('post.id')) ? 0 : input('post.id');
		$ret = model('TradeDetails')->where('id', $id)->delete();
		if(!$ret){
			return '操作失败';
		}
		return 1;
	}
	
	/**
	 * 任务列表
	 * @return [type] [description]
	 */
	public function products(){
		if (request()->isAjax()) {
			$param = input('param.');

			$count = model('GoodList')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 10; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'add_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('GoodList')->order('type', 'desc')->limit($limitOffset, $param['limit'])->select()->toArray();


			foreach ($data as &$v) {
				$v['vip_level_str'] = model('UserGrade')->where('grade', $v['vip_level'])->value('name');
				$v['add_time'] = $v['add_time'] ? date("Y-m-d H:i:s", $v['add_time']) : null;
				$v['type_txt'] = $v['type'] == 1 ? "正式矿机" : "体验矿机";
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
	 * 奖励任务
	 * @return [type] [description]
	 */
	public function taskRewards(){
		if (request()->isAjax()) {
			$param = input('param.');

			$count = model('TaskReward')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 10; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'asc';

			//查询符合条件的数据
			$data = model('TaskReward')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();


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
	 * 添加项目
	 * @return [type] [description]
	 */
	public function taskAdd(){
		if (request()->isAjax()) {
			$param = input('post.');
			$ret = model('TaskReward')->allowField(true)->save($param);
			if(!$ret){
				return '操作失败';
			}
			return 1;
		}

		return view();
	}

	/**
	 * 编辑项目
	 * @return [type] [description]
	 */
	public function taskEdit(){
		if (request()->isAjax()) {
			$param = input('post.');
			$param['edit_time'] = time();
			$ret = model('TaskReward')->isUpdate(true,['id'=>$param['id']])->allowField(true)->save($param);
			if(!$ret){
				return '操作失败';
			}
			return 1;
		}

		$id                       = input('get.id/d');
		$data                     = model('TaskReward')->where('id', $id)->find();

		return view('', [
			'data'      => $data
		]);
	}

	/**
	 * 删除项目
	 * @return [type] [description]
	 */
	public function taskDel(){
		$id = empty(input('post.id')) ? 0 : input('post.id');
		$ret = model('TaskReward')->where('id', $id)->delete();
		if(!$ret){
			return '操作失败';
		}
		return 1;
	}

	
	/**
	 * 任务记录
	 * @return [type] [description]
	 */
	public function userTaskList(){
		if (request()->isAjax()) {
			
			$param = input('param.');

			//查询条件初始化
			$where = array();

			// 用户名
			if(isset($param['username']) && $param['username']){
				$where[] = array(['ly_user_task.username','=',$param['username']]);
			}
			
			// 状态
			if(isset($param['status']) && $param['status']){
				$where[] = array(['ly_user_task.status','=',$param['status']]);
			}

			// 时间
			if(isset($param['datetime_range']) && $param['datetime_range']){
				$dateTime = explode(' - ', $param['datetime_range']);
				$where[] = ['ly_user_task.add_time', 'between time', [$dateTime[0], $dateTime[1]]];
			}else{
				$todayStart = mktime(0,0,0,date('m'),date('d'),date('Y'));
				$todayEnd = mktime(23,59,59,date('m'),date('d'),date('Y'));
				$where[] = ['ly_user_task.add_time', 'between time', [$todayStart, $todayEnd]];
			}

			$count = model('UserTask')->join('ly_task','ly_task.id=ly_user_task.task_id')->where($where)->count(); // 总记录数
			
			
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 10; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'trial_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('UserTask')->field('ly_task.title,ly_user_task.*')->join('ly_task','ly_task.id=ly_user_task.task_id')->where($where)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();

			foreach ($data as $key => &$value) {
				$value['statusStr']      = config('custom.cntaskOrderStatus')[$value['status']];
				$value['add_time'] 		 = ($value['add_time']) ? date('Y-m-d H:i:s', $value['add_time']) : '';//接单时间
				$value['o_id'] 		 = $value['id'];//接单时间
			}

			return json([
				'code'  => 0,
				'msg'   => '',
				'count' => $count,
				'data'  => $data
			]);
		}
		
		return view('');
	}	
	
	/**
	 * 任务记录审核
	 * @return [type] [description]
	 */
	public function userTaskAudit(){
		if (request()->isAjax())	return model('Task')->userTaskAudit();

		$id                       	= input('get.id/d');

		$data                     	= model('UserTask')->field('ly_task.content,ly_task.examine_demo,ly_task.title,ly_task.username,ly_task.link_info,ly_user_task.status as o_status,ly_user_task.id,ly_user_task.add_time as o_add_time,ly_user_task.username as o_username,ly_user_task.examine_demo as o_examine_demo,ly_user_task.trial_time,ly_user_task.id as order_id,ly_user_task.uid as o_uid,ly_user_task.username as o_username,ly_user_task.trial_remarks,ly_user_task.handle_remarks,ly_user_task.complete_time as o_complete_time,ly_user_task.handle_time')->join('ly_task','ly_task.id=ly_user_task.task_id')->where(array(['ly_user_task.id','=',$id]))->find();

		if($data['examine_demo']){
			$data['examine_demo']   = json_decode($data['examine_demo'], true);
		}else{
			$data['examine_demo']	=	array();
		}
		
		if($data['o_examine_demo']){
			if(strstr($data['o_examine_demo'],'[')){ 
				$data['o_examine_demo']   = json_decode($data['o_examine_demo'], true);
			}else{
				$data['o_examine_demo']   = array($data['o_examine_demo']);
			}
		}else{
			$data['o_examine_demo']	=	array();
		}
		
		$data['statusStr']			= config('custom.cntaskOrderStatus')[$data['o_status']];

		return view('', [
			'data'      => $data,
		]);
	}

	/**
	 * 订单编辑
	 * @return [type] [description]
	 */
	public function userTaskEdit(){
		if (request()->isAjax()) return model('Task')->edit();

		$id                       = input('get.id/d');
		
		$data                     = model('UserTask')->field('ly_task.*,ly_user_task.status as o_status,ly_user_task.add_time as o_add_time,ly_user_task.username as o_username,ly_user_task.examine_demo as o_examine_demo,ly_user_task.trial_time,ly_user_task.id as order_id,ly_user_task.uid as o_uid,ly_user_task.username as o_username,ly_user_task.trial_remarks,ly_user_task.handle_remarks,ly_user_task.complete_time as o_complete_time,ly_user_task.handle_time')->join('ly_task','ly_task.id=ly_user_task.task_id')->where(array(['ly_user_task.id','=',$id]))->find();
		$data['end_time']         = ($data['end_time']) ? date('Y-m-d', $data['end_time']) : '';
		$data['finish_condition'] = json_decode($data['finish_condition'], true);

		if($data['task_step']){
			$data['task_step']   = json_decode($data['task_step'], true);
		}else{
			$data['task_step']	=	array();
		}

		if($data['examine_demo']){
			$data['examine_demo']   = json_decode($data['examine_demo'], true);
		}else{
			$data['examine_demo']	=	array();
		}
		
		if($data['o_examine_demo']){
			if(strstr($data['o_examine_demo'],'[')){ 
				$data['o_examine_demo']   = json_decode($data['o_examine_demo'], true);
			}else{
				$data['o_examine_demo']   = array($data['o_examine_demo']);
			}
		}else{
			$data['o_examine_demo']	=	array();
		}

		
		$taskClass                = model('TaskClass')->select()->toArray();
		$userLevel                = model('UserGrade')->select()->toArray();

		return view('', [
			'data'      => $data,
			'taskClass' => $taskClass,
			'userLevel' => $userLevel
		]);
	}

	/**
	 * 用户资金流水
	 */
	public function financial(){
		if (request()->isAjax()) {
			$param = input('post.');

			//查询条件组装
			$where = array();

			//搜索类型
			if(isset($param['search_type']) && $param['search_type'] && isset($param['search_content']) && $param['search_content']){
				switch ($param['search_type']) {
					case 'remarks':
						$where[] = array('remarks','like','%'.$param['search_content'].'%');
						break;
					default:
						$where[] = array($param['search_type'],'=',$param['search_content']);
						break;
				}
			}
			//交易类型
			if(isset($param['trade_type']) && $param['trade_type']){
				$where[] = array('trade_type','=',$param['trade_type']);
			}
			//交易金额
			if(isset($param['price1']) && $param['price1']){
				$where[] = array('trade_amount','>=',$param['price1']);
			}
			//交易金额
			if(isset($param['price2']) && $param['price2']){
				$where[] = array('trade_amount','<=',$param['price2']);
			}
			//时间
			if(isset($param['datetime_range']) && $param['datetime_range']){
				$dateTime = explode(' - ', $param['datetime_range']);
				$where[] = array('trade_time','>=',strtotime($dateTime[0]));
				$where[] = array('trade_time','<=',strtotime($dateTime[1]));
			}

			$count              = model('TradeDetails')->where($where)->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'trade_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('TradeDetails')->where($where)->where($this->whereuid)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
			//部分元素重新赋值
			$orderColor  = config('manage.color');
			$adminColor  = config('manage.adminColor');
			foreach ($data as $key => &$value) {
				$value['trade_time']     = $value['trade_time'] ? date('Y-m-d H:i:s', $value['trade_time']) : null;
				$value['tradeTypeColor'] = $adminColor[$value['trade_type']];
				$value['statusColor']    = $orderColor[$value['state']];
				switch($value['trade_type']){
					case 1 : $value['trade_type_str'] = "充值"; break;
					case 2 : $value['trade_type_str'] = "提现"; break;
					case 3 : $value['trade_type_str'] = "注册奖励"; break;
					case 4 : $value['trade_type_str'] = "推广奖励"; break;
					case 5 : $value['trade_type_str'] = "下级返点"; break;
					case 6 : $value['trade_type_str'] = "购买会员"; break;
					case 7 : $value['trade_type_str'] = "提现驳回"; break;
					case 8 : $value['trade_type_str'] = "租赁矿机"; break;
					case 9 : $value['trade_type_str'] = "退还租金"; break;
					case 10 : $value['trade_type_str'] = "矿机收益"; break;
					case 13 : $value['trade_type_str'] = "手动补分"; break;
					case 14 : $value['trade_type_str'] = "手动减分"; break;
					case 15 : $value['trade_type_str'] = "模拟测试"; break;
					case 16 : $value['trade_type_str'] = "其它1"; break;
					case 17 : $value['trade_type_str'] = "其它2"; break;
				}
				switch($value['state']){
					case 1 : $value['state_str'] = "成功"; break;
					case 2 : $value['state_str'] = "失败"; break;
					case 3 : $value['state_str'] = "审核中"; break;
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
	 * 流水详情
	 */
	public function financial_dateils(){
		$data = model('TradeDetails')->financialDateils();

		$this->assign('info',$data);

		return $this->fetch();
	}
}

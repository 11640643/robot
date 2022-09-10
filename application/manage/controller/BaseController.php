<?php
namespace app\manage\controller;

use app\manage\controller\Common;
use think\Db;
/**
	A-阿大
	系统设置控制器
**/
class BaseController extends CommonController{
    //ThinkPHP构造函数
    public function initialize(){
        parent::initialize();
    }
    
	//空操作处理
	public function _empty(){
		return $this->setting();
	}

	//权限管理
	public function role_list(){

		$data = model('ManageRole')->role_list();
		//权限列表
		$this->assign('list',$data['role_list']);
		//权限
		$this->assign('power',$data['power']);
		return $this->fetch();

	}
	//添加权限
	public function role_add(){
		if($this->request->isAjax()){
			$param = model('ManageRole')->add_role();
			return $param;
		}

		$data = model('ManageRole')->getRoleByIdAdd();
		$this->assign('data',$data);

		return $this->fetch();
	}

	//修改权限
	public function role_edit(){

		if($this->request->isAjax()){
			$param = model('ManageRole')->role_edit();
			return $param;
		}

		$data = $data = model('ManageRole')->getRoleByIdEdit();
		$this->assign('data',$data);
		return $this->fetch();

	}
	//删除权限
	public function role_delete(){
		$param = model('ManageRole')->role_delete();
		return $param;
	}

	//管理员admins
	public function admins(){
		if (request()->isAjax()) {
			$param = input('post.');

			$count              = model('Manage')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
			
			$manage_where = [];
			if(session('manage_type') == 2){
			    $manage_where['sid'] = session('manage_userid');
			}

			//查询符合条件的数据
			$data = model('Manage')->where($manage_where)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
			foreach ($data as &$v){
			    switch($v['manage_type']){
			        case 1 : $v['manage_type_txt'] = '管理员'; break;
			        case 3 : $v['manage_type_txt'] = '组员'; break;
			        default : $v['manage_type_txt'] = '组长'; break;
			    }
			    $susername = model('Manage')->where('id', $v['sid'])->value('username');
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
	//添加管理员
	public function admins_add(){
	    $groups = model('Manage')->where('manage_type', 2)->select();
	    $this->assign('groups', $groups);
		if($this->request->isAjax()){
			$param = model('Manage')->admins_add();
			return $param;
		}
		return $this->fetch();
	}
	//修改管理员
	public function admins_edit(){
	    $groups = model('Manage')->where('manage_type', 2)->select();
	    $this->assign('groups', $groups);
		//修改管理员信息
		if($this->request->isAjax()){
			$data = model('Manage')->admins_edit();
			return $data;
		}

		$data = model('Manage')->getAdminsById();
		$this->assign('data',$data);

		return $this->fetch();
	}
	//删除管理
	public function admins_delete(){
		$param = model('Manage')->admins_delete();
		return $param;
	}
	//管理权限管理
	public function admins_set_role(){
		//权限开关
		if($this->request->isAjax()){
			$param = model('Manage')->admins_set_role_do();
			return $param;
		}

		$param = model('Manage')->admins_set_role();
		$this->assign('list',$param);
		return $this->fetch();

	}

	/**
	 * 后端白名单
	 */
	public function ip_white(){
		if (request()->isAjax()) {
			$param = input('post.');

			$count              = model('IpWhite')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('IpWhite')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();

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
	 * 白名单添加
	 */
	public function ip_white_add(){

		if(request()->isAjax()){
			return model('IpWhite')->ipWhiteAdd();
		}
		return $this->fetch();
	}

	/**
	 * IP删除
	 */
	public function ip_white_delete(){
		return model('IpWhite')->ipWhiteDel();
	}

	/**
	 * 公告
	 */
	public function message(){
		if (request()->isAjax()) {
			$param = input('post.');

			$count              = model('message')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'add_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('message')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
			foreach ($data as $key => &$value) {
				$value['add_time'] = date('Y-m-d H:i:s', $value['add_time']);
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
	 * 添加公告
	 */
	public function message_add(){
		if(request()->isAjax()){
			$param = input('post.');
			$param['add_time'] = time();
			$ret = model('message')->allowField(true)->save($param);
			if($ret){

				//添加操作日志
				model('Actionlog')->actionLog(session('manage_username'),'添加了站内信'.$param['title'],1);
				return 1;
			} else {
				return '添加失败';
			}
		}

		return $this->fetch();
	}

	/**
	 * 编辑公告
	 */
	public function message_edit(){
		if(request()->isAjax()){
			$param = input('post.');
			$param['add_time'] = time();
			$id = $param['id'];
			unset($param['id']);
			$ret = model('message')->allowField(true)->where('id', $id)->update($param);
			if($ret){

				//添加操作日志
				model('Actionlog')->actionLog(session('manage_username'),'编辑了站内信'.$param['title'],1);
				return 1;
			} else {
				return '添加失败';
			}
		}
		$id = input('get.id');
		$data = model('message')->where('id', $id)->find();
		$this->assign('data', $data);
		return $this->fetch();
	}

	/**
	 * 删除公告
	 */
	public function message_delete(){
		$id = input('post.id');
		$info = model("message")->where('id', $id)->find();
		$ret = model("message")->where('id', $id)->delete();
		if(!$ret) return '删除失败';
		//添加操作日志
		model('Actionlog')->actionLog(session('manage_username'),'删除站内信：'.$info['title'],1);

		return 1;
	}

	/**
	 * 公告
	 */
	public function notice(){
		if (request()->isAjax()) {
			$param = input('post.');

			$count              = model('Notice')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'add_time';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('Notice')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
			foreach ($data as $key => &$value) {
				$value['add_time'] = date('Y-m-d H:i:s', $value['add_time']);
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
	 * 添加公告
	 */
	public function notice_add(){
		if(request()->isAjax()){
			return model('Notice')->noticeAdd();
		}
		$noticeGroup = model('NoticeGroup')->field('id,group_name')->select();

		$this->assign('noticeGroup',$noticeGroup);

		return $this->fetch();
	}

	/**
	 * 编辑公告
	 */
	public function notice_edit(){

		$data = model('Notice')->noticeEditView();

		$this->assign('data',$data['data']);
		$this->assign('noticeGroup',$data['noticeGroup']);

		return $this->fetch();
	}

	/**
	 * 删除公告
	 */
	public function notice_delete(){
		return model('Notice')->noticeDel();
	}

	/**
	 * 基本设置
	 */
	public function setting(){
		$data = model('Setting')->getFieldsById();

		$this->assign('data',$data);
		
		return $this->fetch();
	}

	/**
	 * 基本设置修改
	 */
	public function setting_edit(){
		return model('Setting')->settingEdit();
	}

	/*
	 *	公告分类列表	老李
	 */
	public function groupList() {
		if (request()->isAjax()) {
			//获取参数
			$param = input('post.');

			$count              = model('NoticeGroup')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'addtime';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';

			//查询符合条件的数据
			$data = model('NoticeGroup')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
			foreach ($data as $key => &$value) {
				$value['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
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

	/*
	 *	公告分类添加	老李
	 */
	public function groupAdd() {
		if(request()->isAjax()){
			return model('NoticeGroup')->groupAdd();
		}
		return $this->fetch();
	}

	/*
	 *	公告分类编辑	老李
	 */
	public function groupEdit() {
		if(request()->isAjax()){
			return model('NoticeGroup')->groupAdd();
		}
		$id = input('get.id/d');

		$data = model('NoticeGroup')->where('id',$id)->find();

		$this->assign('data',$data);

		return $this->fetch();
	}

	public function groupDel(){
		return model('NoticeGroup')->groupDel();
	}

	/**
	 * 绑定聊天群组
	 */
	public function bindChatGroup(){
		$data = model('BindChatGroup')->bindChatGroup();

		return view('', [
			'bindGroupList' =>	$data['bindGroupList'],
			'page'          =>	$data['page'],
			'where'         =>	$data['where'],
			'power'         =>	$data['power'],
			'lotteryList'   =>	$data['lotteryList'],
		]);
	}

	/**
	 * 添加绑定
	 */
	public function addBindGroup(){
		if(request()->isAjax()){
			return model('BindChatGroup')->addBindGroup();
		}

		$lotteryList = model('PlayClass')->field('class,class_name')->where(array(['name','<>',''],['is_chat','=',1]))->select()->toArray();

		return view('', [
			'lotteryList'	=>	$lotteryList
		]);
	}

	/**
	 * 编辑绑定
	 */
	public function editBindGroup(){
		if(request()->isAjax()){
			return model('BindChatGroup')->editBindGroup();
		}

		$param = input('get.');

		$bindInfo = model('BindChatGroup')->where('id', $param['id'])->find()->toArray();

		$lotteryList = model('PlayClass')->field('class,class_name')->where(array(['name','<>',''],['is_chat','=',1]))->select()->toArray();

		return view('', [
			'bindInfo'    =>	$bindInfo,
			'lotteryList' =>	$lotteryList
		]);
	}

	/**
	 * 删除绑定
	 */
	public function delBindGroup(){
		return model('BindChatGroup')->delBindGroup();
	}

	/**
	 * 聊天房间
	 */
	public function chatRoom(){
		$data = model('ChatRoom')->chatRoom();

		return view('', [
			'chatRoomList' =>	$data['chatRoomList'],
			'page'         =>	$data['page'],
			'where'        =>	$data['where'],
			'power'        =>	$data['power'],
		]);
	}

	/**
	 * 添加绑定
	 */
	public function addChatRoom(){
		if(request()->isAjax()){
			return model('ChatRoom')->addChatRoom();
		}

		return view();
	}

	/**
	 * 编辑绑定
	 */
	public function editChatRoom(){
		if(request()->isAjax()){
			return model('ChatRoom')->editChatRoom();
		}

		$param = input('get.');

		$chatRoom = model('ChatRoom')->where('id', $param['id'])->find()->toArray();

		return view('', [
			'chatRoom'    =>	$chatRoom
		]);
	}

	/**
	 * 删除绑定
	 */
	public function delChatRoom(){
		return model('ChatRoom')->delChatRoom();
	}

	//权限管理
	public function merchantRole(){

		$data = model('AdminRole')->role_list();
		//权限列表
		$this->assign('list',$data['role_list']);
		//权限
		$this->assign('power',$data['power']);
		return $this->fetch();

	}
	//添加权限
	public function merchantRoleAdd(){
		if (request()->isAjax()) return  model('AdminRole')->add_role();

		$data = model('AdminRole')->getRoleByIdAdd();
		$this->assign('data',$data);

		return $this->fetch();
	}

	//修改权限
	public function merchantRoleEdit(){
		if (request()->isAjax()) return model('AdminRole')->role_edit();

		$data = $data = model('AdminRole')->getRoleByIdEdit();
		$this->assign('data',$data);
		return $this->fetch();

	}
	//删除权限
	public function merchantRoleDel(){
		return model('AdminRole')->role_delete();
	}

	public function setMerchantRole(){
		return model('AdminRole')->setMerchantRole();
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
	
	public function picsAdd_ts(){
		return $this->fetch('pics_add_ts');
	}
	
	public function picsAdd_tyj(){
		return $this->fetch('pics_add_tyj');
	}


	// 幻灯片
	public function slideList(){
		if (request()->isAjax()) {
			$param = input('post.');
			$count              = model('slide')->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
			//查询符合条件的数据
			$data = model('Slide')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
			return json([
				'code'  => 0,
				'msg'   => '',
				'count' => $count,
				'data'  => $data
			]);
		}
		return view();
	}
	
	//弹窗列表
		public function popupList(){
				if (request()->isAjax()) {
						$param = input('post.');
						$count              = model('popup')->count(); // 总记录数
						$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
						$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
						$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
						$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
						$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
						//查询符合条件的数据
						$data = model('Popup')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
						return json([
							    'code'  => 0,
							    'msg'   => '',
							    'count' => $count,
							    'data'  => $data
						]);
				}
				return view();
		}
	
	
	
	// 添加幻灯片
	public function slideAdd(){
		if (request()->isAjax()) {
				return model('Slide')->add($_REQUEST);
		}
		return view();
	}
	
	//添加首页弹窗图片
		public  function popupAdd(){
				if (request()->isAjax()) {
						return model('Popup')->add($_REQUEST);
				}
			return view();
		}
	
	// 删除幻灯片
	public function slideDel(){
			if(!request()->isAjax()) return '非法提交';
			$param = input('post.');//获取参数
//			print_r($param);exit();
			if(!$param) return '提交失败';
			$delRes = model($param['table'])->where('id','=',$param['id'])->delete();
			if(!$delRes) return '删除失败';
			//添加操作日志
			model('Actionlog')->actionLog(session('manage_username'),'删除ID: '.$param['id'].'的轮播图片',1);
			return 1;
//		return model('Slide')->del();
	}
	
	//删除首页弹出图片
		public function popupDel(){
				if(!request()->isAjax()) return '非法提交';
				$param = input('post.');//获取参数
//			print_r($param);exit();
				if(!$param) return '提交失败';
				$delRes = model($param['table'])->where('id','=',$param['id'])->delete();
				if(!$delRes) return '删除失败';
				//添加操作日志
				model('Actionlog')->actionLog(session('manage_username'),'删除ID: '.$param['id'].'的首页弹出图片',1);
				return 1;
		}
		
	// 改变状态
	public function slideStatus(){
			if(!request()->isAjax()) return '非法提交';
			$param = input('post.');//获取参数
			if(!$param) return '提交失败';
			$data['uptime'] = time();
			$data['id'] = $param['id'];
			$data['status'] = $param['val'];
			$staRes = Db::name('slide')
				    ->where('id', $data['id'])
				    ->data($data)
				    ->update();
			if(! $staRes ) return '状态修改失败';
			//添加操作日志
			model('Actionlog')->actionLog(session('manage_username'),$data['status'] ==1 ?'显示了ID:'.$param['id'].'的轮播图':'隐藏了ID:'.$param['id'].'的轮播图',1);
			return 1;
	}
	
	//改变弹出图状态
		public function popupStatus(){
				if(!request()->isAjax()) return '非法提交';
				$param = input('post.');//获取参数
				if(!$param) return '提交失败';
				$data['uptime'] = time();
				$data['id'] = $param['id'];
				$data['status'] = $param['val'];
				$staRes = Db::name('popup')
					    ->where('id', $data['id'])
					    ->data($data)
					    ->update();
				if(! $staRes ) return '状态修改失败';
				//添加操作日志
				model('Actionlog')->actionLog(session('manage_username'),$data['status'] ==1 ?'显示了ID:'.$param['id'].'的首页弹出图':'隐藏了ID:'.$param['id'].'的首页弹出图',1);
				return 1;
		}
		
		
		
		
	/**
	 * 语言列表
	 */
	public function langList(){
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

			$count  = model('lang')->where($where)->count(); // 总记录数
			$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
			$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
			$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
			$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
			$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'asc';

			//查询符合条件的数据
			$data = model('lang')->where($where)->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();

			return json([
				'code'  => 0,
				'msg'   => '语言列表',
				'count' => $count,
				'data'  => $data
			]);
		}
		return view();
	}

	/**
	 * 语言添加
	 */
	public function langAdd(){
		if (request()->isAjax()) return model('Lang')->langAdd();

		return view();
	}

	/**
	 * 语言编辑
	 */
	public function langEdit(){
		if (request()->isAjax()) return model('Lang')->langEdit();

		$param = input('param.');

		$data = model('Lang')->where('id', $param['id'])->find();

		return view('', [
			'data' => $data
		]);
	}
	

		// 删除语言
	public function langDel(){
			if(!request()->isAjax()) return '非法提交';
			$param = input('post.');//获取参数
			//	print_r($param);exit();
			if(!$param) return '提交失败';
			$delRes = model($param['table'])->where('id','=',$param['id'])->delete();
			if(!$delRes) return '删除失败';
			//添加操作日志
			model('Actionlog')->actionLog(session('manage_username'),'删除ID: '.$param['id'].'语言',1);
			return 1;
			//	return model('Slide')->del();
	}
		
	
}

<?php
namespace app\manage\model;

use think\Model;
/*
	A-阿大
	管理员业务处理
*/

class ManageModel extends Model{
	//表名
	protected $table = 'manage';
	 /**
     * 用户登录验证
     */
    public function checkLogin(){	

		$where['username']	= input('post.user/s');
		$where['state']		= 1;

		$verifyCode = input('post.code/d');
		if (session('code') != $verifyCode) return 'code';	
		
		//判断用户是否存在
		$userInfo = $this->where($where)->field('id,username,password,manage_type')->find();
		if(!$userInfo) {
		    return 'nouser';
		}
		
		//检查密码
		$password = input('post.pass/s');
		
		if(auth_code($userInfo['password'],'DECODE') != $password) return 'pwd';

		//保存session
		session('is_manage_login',1);
		session('manage_username',$userInfo['username']);
		session('manage_userid',$userInfo['id']);
		session('manage_type', $userInfo['manage_type']);

		model('Loginlog')->loginLog();
		
		return 1;

	}
	
	/**
		管理员列表
	**/
	public function admins(){
		
		//管理员
		$admins =	$this->paginate();
		
		//权限查询
		$powerWhere = [
			['uid','=',session('manage_userid')],
			['pid','=',28],
			['level','=',3],
		];

		$power = model('ManageUserRole')->getUserPower($powerWhere);
		return array(
			'admins' =>	$admins->toArray()['data'],
			'page'   =>	$admins->render(),//分页
			'power'  =>	$power,
		);

	}
	/*
		添加管理员
	*/
	public function admins_add(){
		$param = input('post.');//获取参数
		if(!$param){
			return '提交失败';
		}

		//验证数据
		$validate = new \app\manage\validate\admins;

		if (!$validate->check($param)) {
			return $validate->getError();
		}
		//添加管理员是否存在
		$is_role = $this->where('username','=',$param['username'])->count();
		if($is_role){
			return '管理员已存在';
		}
		
        if(session('manage_type') == 3){
		    return '无权限';
		}
		
		if(session('manage_type') == 2 && $param['manage_type'] < 3){
		    return '无权限';
		}
		
		$manage_type = $param['manage_type'];
		//加密
		$param['password'] = auth_code($param['password'],'ENCODE');
		$param['safe_code'] = auth_code($param['safe_code'],'ENCODE');
		
		$admins_id = $this->insertGetId(array_filter($param));
		//  生成邀请码必须唯一
		$is_repeat	= 1;
		$chk_idcode	= 1;
		$idCodearr = model('Users')->column('idcode');
		while($is_repeat == $chk_idcode){	// 防止邀请码重复
			list($msec, $sec) = explode(' ', microtime());
			$msectime	= (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
			$new_idcode		= substr($msectime,-7);		// 邀请码
			if(!in_array($new_idcode,$idCodearr)){
				$chk_idcode	=	0;
			}
		}
		if($manage_type == 3){
		    // 用户表注册新用户
    		$new_user_data	= [
    			'username'    		=> $param['username'],
    			'password'    		=> $param['password'],
    			'phone'       		=> $param['username'],
    			'balance'			=> 0.00,
    			'sid'         		=> 0,//$db_sid,	// 上级id
    			'manage_id'         => session('manage_userid'),
    			'topid'             => 0,
    			'reg_time'    		=> time(),	// 注册时间	
    			'idcode'      		=> $new_idcode,// 邀请码
    			'state'      		 => 1,		
    			'vip_level'	  		=> 1,		// 普通会员
    			'reg_ip'	  		=> request()->ip(),
    			'last_ip'	  		=> request()->ip(),
    		];
		    model('Users')->insertGetId($new_user_data);
		}
		if($admins_id){
			//赋予权限
			$role = model('ManageUserRole')->where('uid', session('manage_userid'))->select()->toArray();
			foreach($role as $key => $value){
				$admins_role[$key]['uid']     		= $admins_id;
				$admins_role[$key]['role_id'] 		= $value['role_id'];
				$admins_role[$key]['sort']    		= $value['sort'];
				$admins_role[$key]['state']    		= $value['state'];
				$admins_role[$key]['level']  		= $value['level'];
				$admins_role[$key]['cid']     		= $value['cid'];
				$admins_role[$key]['pid']     		= $value['pid'];
				$admins_role[$key]['role_name'] 	= $value['role_name'];
				$admins_role[$key]['role_url'] 		= $value['role_url'];
			}
			$count = model('ManageUserRole')->insertAll($admins_role);
			if($count){
				return 1;
			}
		}
		return '添加失败';
	}
	/*
		获取管理员信息
	*/
	public function getAdminsById(){
		$id = (int)input('get.id/d');
		$data = $this->where('id',$id)->field('id,username,manage_type')->find();
		return $data;
	}
	/*
		修改管理员信息
	*/
	public function admins_edit(){
	
		$param = input('post.');//获取参数
		
		if(!$param){
			return '提交失败';
		}

		//添加管理员是否存在
		$is_role = $this->where('id','=',$param['id'])->count();
		if(!$is_role){
			return '管理员已存在';
		}
		
		if(session('manage_type') == 3){
		    return '无权限';
		}
		
		if(session('manage_type') == 2 && $param['manage_type'] < 3){
		    return '无权限';
		}
		
		$is = $this->where('id',$param['id'])->setField('username',$param['username']);
		
		//修改密码
		if($param['password']){
			$repassword = auth_code($param['password'],'ENCODE');
			$is = $this->where('id',$param['id'])->setField('password',$repassword); 
		}
		//修改安全码
		if($param['safe_code']){
			$resafe_code = auth_code($param['safe_code'],'ENCODE');
			$is = $this->where('id',$param['id'])->setField('safe_code',$resafe_code); 
		}
		if($is){
			return 1;
		}
	}
	//删除管理员
	public function admins_delete(){
		
		$param = input('post.');//获取参数
		if(!$param){
			return '提交失败';
		}
		
		if(session('manage_type') == 3){
		    return '无权限';
		}
		
		$id = $param['id'];
		$cuont = $this->where('id',$id)->delete();
		if($cuont){
			//删除权限
			model('ManageUserRole')->where('uid',$id)->delete();
			return 1;
		}
		return '删除失败';
	
	}
	/**
		管理员权限管理
	**/
	public function admins_set_role(){
				
		$uid = (int)input('get.uid/d');
			
		$role = model('ManageUserRole')->order('sort','ASC')->where('level', '=', 1)->where('uid', '=',$uid)->select();
		
		foreach($role as &$value){
			$value['role2'] = model('ManageUserRole')->order('sort','ASC')->where('level', '=', 2)->where('uid', '=',$uid)->where('cid', '=', $value['role_id'])->select();
			foreach($value['role2'] as &$value2){
				$value2['role3'] = model('ManageUserRole')->order('sort','ASC')->where('level', '=', 3)->where('uid', '=',$uid)->where('pid', '=', $value2['role_id'])->select();
			}
		}
		return $role;
	}
	
	/**
		设置权限
	**/
	public function admins_set_role_do(){
		$param = input('post.');//获取参数
		
		if(!$param){
			return '提交失败';
		}
		//更新权限
		$is_update = model('ManageUserRole')->where('id',$param['id'])->setField('state',$param['state']); 
		if($is_update){
			//更新下级
			$user_role = model('ManageUserRole')->where('id',$param['id'])->find();
			model('ManageUserRole')->where('uid',$user_role['uid'])->where('cid',$user_role['role_id'])->setField('state',$param['state']);
			model('ManageUserRole')->where('uid',$user_role['uid'])->where('pid',$user_role['role_id'])->setField('state',$param['state']); 
			return 1;
		}
		return 0;
	}
}

<?php
namespace app\api\controller;

use think\Controller;
use think\Cache;
//use GatewayClient\Gateway;

class BaseController extends Controller{
    public $lang = [];
	//初始化方法
	protected function initialize(){	
		
	 	parent::initialize();
		
		//接口白名单		
		
		//不用用户登录可以访问的页面
		$no_user_id_arr	= array('code','login','language','checkslogin','sendsmscode','register','helps','resetpassword','backdata','createorder','goodlist','viplist','systemconfig','signin','gettaskranklist','gettaskclasslist','getvipuserexpire','gettasklist','gettaskinfo','taskordertrial','slideimg'
		
		
		);

		$action = request()->action();
		
		//获取提交用户提交数据 并保存
		$param = receiveJson();
	    
		$this->lang	= !empty($param['lang']) ? config($param['lang'].".") : config(config('app.default').".");	// 语言类型
 		
		if(!in_array($action,$no_user_id_arr)){
            
			$user_token = isset($param['token']) && $param['token'] ? $param['token'] : '';

			//检查 userid usertoken
			if(!$user_token){
				$data['code'] = 203;
				$data['code_dec'] 	= $this->lang['no_login'];
				ajax_return($data);
			}
			
			$user_token		= stripslashes($user_token);
			$userArr 		= explode(',',auth_code($user_token,'DECODE'));//用户信息数组
			if(count($userArr)<2){
				$data['code']		= 202;//没有登录
				$data['code_dec']	= $this->lang['invalid_parameter'];
				ajax_return($data);
			}
			$uid 			= $userArr[0];//uid
			$username 		= $userArr[1];//uid

			//检查缓存是否存在
			if(!cache('C_token_'.$uid)){
				$data['code']		= 203;//没有登录
				$data['code_dec']	= $this->lang['no_login'];
				ajax_return($data);
			}
			
			if(cache('C_token_'.$uid) != $user_token){
				$data['code']		= 204;//长时间没操作请重新登录
				$data['code_dec']	= $this->lang['login_invalid'];
				ajax_return($data);
			}
			
			//检查用户是否存在
			$isuser = model('Users')->where(array('id'=>$uid,'username'=>$username,'state'=>1))->count();
			if(!$isuser){
				$data['code']		= 203;
			    $data['code_dec']	= $this->lang['no_user'];
				ajax_return($data);
			}
			
			//增加缓存的时间
			cache('C_token_'.$uid,$user_token,86400);

			//登录接口 添加提交数据日志
			foreach ($param as $key => $value) {
				$params[] = $key;
				$values[] = $value;
			}
		}
    }

}

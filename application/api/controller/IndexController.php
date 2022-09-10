<?php
namespace app\api\controller;

use app\api\controller\BaseController;
use think\Db;

class IndexController extends BaseController{
	
	/**
	 * 系统配置信息
	 */
	public function systemconfig(){
		$param = receiveJson();
		$lang	  = !empty($param['lang']) ? $param['lang'] : 'cn';	// 语言类型
		$datas = model('Setting')->find();
		if($lang == 'cn'){
			$data['title'] = $datas['title'];
			$data['currency'] = $datas['currency'];
			$data['pic_s'] = $datas['pic_s'];
			$data['trcaddress'] = $datas['trcaddress'];
			$data['service'] = $datas['service'];
			$data['info_w'] = $datas['info_w'];
			$data['regurl'] = $datas['regurl'];
			$data['reg_award'] = $datas['reg_award'];
			$data['prompt_popup_picture'] = $datas['prompt_popup_picture'];
			$data['experience_money_pictures'] = $datas['experience_money_pictures'];
		} else {
			$data['title'] = $datas['title'];
			$data['currency'] = $datas['currency'];
			$data['pic_s'] = $datas['pic_s'];
			$data['trcaddress'] = $datas['trcaddress'];
			$data['service'] = $datas['service'];
			$data['info_w'] = $datas['info_w'];
			$data['regurl'] = $datas['regurl'];
			$data['reg_award'] = $datas['reg_award'];
			$data['prompt_popup_picture'] = $datas['prompt_popup_picture'];
			$data['experience_money_pictures'] = $datas['experience_money_pictures'];
		}
		return json($data);
	}
	
	/**
	 * App帮助
	 */
	public function helps(){
		$param = receiveJson();
		$lang	  = !empty($param['lang']) ? $param['lang'] : 'en';	// 语言类型
		$list = model('notice')->where('lang', $lang)->field('id,title,content,add_time,state')->order('add_time', 'asc')->select();
		$data['code'] = 1;
		$data['data'] = $list;
		return json($data);
	}
	
	
	/**
	    获取轮播图10张
	*/
	public function slideimg(){
		$param = receiveJson();
		$list = model('slide')->field('id,title,img_path')->where('status = 1')->order('id', 'desc')->limit(10)->select();
		$data['code'] = 1;
		$data['data'] = $list;
		return json($data);
	}
	
	
	/**
	    获取总流动性质押值
	*/
	public  function totalpledgevalue(){
	    //update是model中的方法
	    $data = model('Pledge')->field('total_pledge')->find();
	    if (!empty($data)) {
	        $data['code'] = 1;
	        $total_nums =  $data['total_pledge'] + $this->getrandom(4);
	        $savedata = Db::name('total_pledge')
	                    ->where('id = 1 ')
	                    ->update(['total_pledge' => $total_nums,'updatetime'=>time()]);
	    }else {
	        $data['total_pledge'] += $this->getrandom(8); 
    	    $data['addtime'] = time();
    	    $listRes = Db::name('total_pledge')->insertGetId($data);
    	    $data['code'] = 1;
	    }
	    
	    return $data;
	}
	
	
	public function getrandom($length){
        //从ASCII码中获取
        $captcha = '';
        for($i = 0;$i < $length; $i++){
            $captcha .= chr(mt_rand(49,57));
        }
        if ($captcha >= 5000) {
           return $captcha;
        }else {
            $captcha = 5000;
            return $captcha;
        }
    }
	
	
	
	
	
}
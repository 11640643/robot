<?php
namespace app\api\controller;

use app\api\controller\BaseController;
use think\Db;

class UsersController extends BaseController{
	// 邀请码注册（完成）
	public function register(){
		$data = model('Users')->register($this->lang);
		return json($data);
	}

	// 登录系统（完成）
	public function login()
	{
		$data = model('Users')->login($this->lang);
		return json($data);
	}

	// 获取用户信息（完成）
	public function getuserinfo(){
		$data = model('Users')->getuserinfo($this->lang);
		return json($data);
	}
	
	// 退出登录（完成）
	public function logout(){
		$data = model('Users')->logout($this->lang);
		return json($data);
	}

	// 提现（完成）
	public function withdrawal(){
		$data = model('Users')->withdrawal($this->lang);
		return json($data);
	}

	// 提现记录（完成）
	public function withdrawalrecord(){
		$data = model('Users')->withdrawalrecord($this->lang);
		return json($data);
	}

	// 用户收入/支出明细（完成）
	public function trade_details(){
		$data = model('Users')->trade_details($this->lang);
		return json($data);
	}
	
	
	// 我的一级用户
	public function mysubordinate(){
		$data = model('Users')->mysubordinate($this->lang);
		return json($data);
	} 
	
	//查看余额
	public function mybalance(){
	    $data = model('Users')->mybalance($this->lang);
	    return json($data);
	}
	
	
	//按日期查看提现记录
// 	public function datewithdrawalrecord(){
// 	    $data = model('Users')->datewithdrawalrecord($this->lang);
// 	    return json($data);
// 	}
	

	// 我的下级
	public function myteam(){
		$data = model('Users')->myteam($this->lang);
		return json($data);
	} 
	
	// 质押
	public function pledge(){
		$data = model('Users')->pledge($this->lang);
		return json($data);
	} 
	
	// 注册验证码（完成）
	public function code(){
		$param = $this->request->param();
		ob_clean();
		
		if(!$param['code_rand']) exit();
		

		$image	= imagecreatetruecolor(100, 34);  
		$bgcolor = imagecolorallocate($image, 255, 255, 255);  
		imagefill($image, 0, 0, $bgcolor);  
	  
		$captch_code = '';  
		for($i=0;$i<4;$i++) { 
			$fontsize = 6;  
			$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120),rand(0, 120));  
			$data = '0123456789';  
			$fontcontent = substr($data, rand(0, strlen($data)-1), 1);  
			$captch_code .= $fontcontent;  
	  
			$x = ($i*100/4) + rand(5, 10);  
			$y = rand(5, 10);  
	  
			imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);  
		}
		cache('C_Code_'.$param['code_rand'],$captch_code,1800);

		//增加点干扰元素  
		for($i=0; $i<200;$i++) {  
			$pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));  
			imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);  
		}  
	  
		//增加线干扰元素  
		for($i=0;$i<3;$i++) {  
			$linecolor = imagecolorallocate($image, rand(80,220), rand(80,220), rand(80, 220));  
			imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);  
		}
		
		header('content-type:image/png');		  
		imagepng($image);
		imagedestroy($image);
	}

}

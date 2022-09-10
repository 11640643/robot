<?php
namespace app\api\controller;

use think\Controller;
use think\Cache;
//use app\common\model\SmsModel as Sms;

class SmsController extends Controller{
	//初始化方法
	protected function initialize(){		
	 	parent::initialize();		
		header('Access-Control-Allow-Origin:*');
		header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId");
    }
    
    // 找回密码————验证短信接口
	public function checkSmsResetPw(){
	    $param = receiveJson();
		$lang	  	= !empty($param['lang']) ? $param['lang'] : config("api.lang");	// 语言类型
		$mobile = empty($param['mobile']) ? '' : $param['mobile'];
		$idcode = empty($param['idcode']) ? '' : $param['idcode'];
		$dest = empty($param['dest']) ? '1' : $param['dest'];
		$code_rand = empty($param['code_rand']) ? '' : $param['code_rand'];
		$imgcode = empty($param['code']) ? '' : $param['code'];
		
		if($imgcode != cache('C_Code_'.$code_rand)){
		    $arr['code'] = 0;
		    if($lang == 'ag'){
		        $arr['code_dec'] = 'Error de código de verificación gráfica';
		    } else {
		        $arr['code_dec'] = 'Graphic verification code error';
		    }
		    return json($arr);
		}

		if(!preg_match('/^[1-9]{1,4}$/', $dest)){
			$arr['code'] = 0;
		    if($lang == 'ag'){
		        $arr['code_dec'] = 'código de país incorrecto';
		    } else {
		        $arr['code_dec'] = 'wrong country code';
		    }
		    return json($arr);
		}

		if(substr($mobile, 0, 1) ==0 ){
            $arr['code'] = 0;
		    if($lang == 'ag'){
		        $arr['code_dec'] = 'El formato del número de teléfono no es correcto';
		    } else {
		        $arr['code_dec'] = 'Phone number format is not correct';
		    }
		    return json($arr);
        }
        
		
		//删除验证码缓存
		cache('C_Code_'.$code_rand, NULL);
		$code = rand(1000, 9999);
		
		$content = urlencode('Your verification code is:'.$code);
		cache('C_Code_'.$mobile, $code);
		$data = [
			'appkey'	=> 'i4QRr5MH',
			'secretkey'	=> 'kuggtF4R',
			'phone'		=> $dest.$mobile,
			'content'	=> $content
		];
		
		$url = 'http://api.quanqiusms.com/api/sms/mtsend';
		$result = $this->post($url, $data);
		echo $result; exit;
// 		if($result['code'] == '0'){
// 		    $arr['code'] = 1;
// 		    if($lang == 'ag'){
// 		        $arr['code_dec'] = 'éxito';
// 		    } else {
// 		        $arr['code_dec'] = 'success';
// 		    }
// 		    return json($arr);
// 		} else {
// 		    $arr['code'] = 0;
// 		    if($lang == 'ag'){
// 		        $arr['code_dec'] = 'error';
// 		    } else {
// 		        $arr['code_dec'] = 'error';
// 		    }
// 		    return json($arr);
// 		}
	}
	
    /**
     * 发送短信验证码（POST形式）
     * @return [type] [description]
    */
    public function sendSMSCode(){
		$param = receiveJson();
		$lang	  	= !empty($param['lang']) ? $param['lang'] : config("api.lang");	// 语言类型
		$mobile = empty($param['mobile']) ? '' : $param['mobile'];
		$dest = empty($param['dest']) ? '43' : $param['dest'];
		$code_rand = empty($param['code_rand']) ? '' : $param['code_rand'];
		$imgcode = empty($param['code']) ? '' : $param['code'];
		
		if($imgcode != cache('C_Code_'.$code_rand)){
		    $arr['code'] = 0;
		    if($lang == 'ag'){
		        $arr['code_dec'] = 'Error de código de verificación gráfica';
		    } else {
		        $arr['code_dec'] = 'Graphic verification code error';
		    }
		    return json($arr);
		}

		if(!preg_match('/^[1-9]{1}[0-9]{0,3}$/', $dest)){
			$arr['code'] = 0;
		    if($lang == 'ag'){
		        $arr['code_dec'] = 'código de país incorrecto';
		    } else {
		        $arr['code_dec'] = 'wrong country code';
		    }
		    return json($arr);
		}

		if(substr($mobile, 0, 1) ==0 ){
            $arr['code'] = 0;
		    if($lang == 'ag'){
		        $arr['code_dec'] = 'El formato del número de teléfono no es correcto';
		    } else {
		        $arr['code_dec'] = 'Phone number format is not correct';
		    }
		    return json($arr);
        }
		
		$count = model('Users')->where('username', $mobile)->count();
		if($count){
		    if($lang == 'ag'){
		        $arr['code_dec'] = 'El número de teléfono ya existe';
		    } else {
		        $arr['code_dec'] = 'Phone number already exists';
		    }
		    return json($arr);
		}
		
		//删除验证码缓存
		cache('C_Code_'.$code_rand, NULL);
		$code = rand(1000, 9999);
		
		$content = urlencode('Your verification code is:'.$code);
		cache('C_Code_'.$mobile, $code);
		$data = [
			'appkey'	=> 'i4QRr5MH',
			'secretkey'	=> 'kuggtF4R',
			'phone'		=> $dest.$mobile,
			'content'	=> $content
		];
		
		$url = 'http://api.quanqiusms.com/api/sms/mtsend';
		$result = $this->post($url, $data);
// 		echo $code; exit;
		
// 		if($result['code'] == '0'){
// 		    $arr['code'] = 1;
// 		    if($lang == 'ag'){
// 		        $arr['code_dec'] = 'éxito';
// 		    } else {
// 		        $arr['code_dec'] = 'success';
// 		    }
// 		    return json($arr);
// 		} else {
// 		    $arr['code'] = 0;
// 		    if($lang == 'ag'){
// 		        $arr['code_dec'] = 'error';
// 		    } else {
// 		        $arr['code_dec'] = 'error';
// 		    }
// 		    return json($arr);
// 		}
		
    }

    public function post($url, $data){
        $headers = array('Content-Type: application/x-www-form-urlencoded');
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

	
}

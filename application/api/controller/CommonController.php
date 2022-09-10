<?php

namespace app\api\controller;

use think\Cache;
use think\Db;
use phpqrcode\QRcode;

use app\api\controller\BaseController;



class CommonController extends BaseController{
    public function getQrcode(){
        $param = receiveJson();
        $userArr	= explode(',',auth_code($param['token'],'DECODE'));
		$uid		= $userArr[0];
		$username	= $userArr[1];
		$idcode     = Db::name('users')->where('id', $uid)->value('idcode');
		$value = "http://www.lygjddt.xyz/xml/index.html#/register?idcode=".$idcode;         //二维码内容
		$data['data']['reg_url'] = "http://www.lygjddt.xyz/xml/index.html#/register";
		$data['data']['idcode'] = $idcode;
		$data['code'] = 1;
		return json($data);
        // $errorCorrectionLevel = 'L';  //容错级别
        // $matrixPointSize = 5;      //生成图片大小
        // //生成二维码图片
        // $filename = './phpqrcode/images'.microtime().'.png';
        // QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);
        // $QR = $filename;        //已经生成的原始二维码图片文件
        // $QR = imagecreatefromstring(file_get_contents($QR));
        // header('content-type:image/png');	
        // //输出图片
        // imagepng($QR);
        // imagedestroy($QR);
    }

}

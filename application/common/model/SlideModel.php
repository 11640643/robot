<?php
		
namespace app\common\model;
use think\Model;
use think\cache;


class SlideModel extends Model{
		// 设置当前模型对应的完整数据表名称
		protected $table = 'slide';
		//添加轮播图
		public function add($data = array()){
			      if (!$data) {return false;}
				$slideData = array();
				$slideData['img_path'] = $data['img_path'][0];
				//生成随机名称的轮播图title
				$slideData['title'] = "0x";
                $slideData['title'] .= $this->getstring(8);
                $slideData['title'] .= "***";
                $slideData['title'] .= $this->getstring(10);
				$slideData['addtime'] = time();
				$slideData['status'] = 1;
				$tid = $this->insertGetId($slideData);
				if(!$tid) return false;
				return 1;
		}
		//删除轮播图
		public function del(){
				if(!request()->isAjax()) return '非法提交';
				$param = input('post.');//获取参数
				if(!$param) return '提交失败';
				
				$delRes = model($param['table'])->where('id','=',$param['id'])->delete();
				if(!$delRes) return '删除失败';
				
				//添加操作日志
				model('Actionlog')->actionLog(session('manage_username'),'删除'.$param['name'],1);
				
				return 1;
		}
		
		
		
	/**
	    随机生成字符串
	*/
	
 	public function getstring($length){
        //从ASCII码中获取
        $captcha = '';
        //随机取：大写、小写、数字
        for($i = 0;$i < $length; $i++){
            //随机确定是字母还是数字
            switch(mt_rand(1,3)){
                case 1:                //数字：49-57分别代表1-9
                $captcha .= chr(mt_rand(49,57));
                break;
                case 2:                //小写字母:a-z
                $captcha .= chr(mt_rand(65,90));
                break;
                case 3:                //大写字母:A-Z
                $captcha .= chr(mt_rand(97,122));
                break;
            
            }
        }
        return $captcha;
    }
	
		
		
	
}
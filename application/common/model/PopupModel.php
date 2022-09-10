<?php
		
		namespace app\common\model;
		
		use think\Model;
		use think\cache;
		
		class PopupModel extends  Model{
				// 设置当前模型对应的完整数据表名称
				protected $table = 'popup';
				//添加弹出图片
				public function add($data = array()){
						if (!$data) {return false;}
						$popupData = array();
						$popupData['img_path'] = $data['img_path'][0];
						$popupData['addtime'] = time();
						$popupData['status'] = 1;
						$tid = $this->insertGetId($popupData);
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
		}
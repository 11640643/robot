<?php
		
		namespace app\manage\controller;
		
		use app\manage\controller\Common;
		use think\Db;
		
		class KefuController  extends CommonController
		{
				// 客服列表
				public function kefuList(){
						if (request()->isAjax()) {
								$param = input('post.');
								$count              = model('kefu')->count(); // 总记录数
								$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
								$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
								$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
								$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
								$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
								//查询符合条件的数据
								$data = model('Kefu')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
								return json([
									    'code'  => 0,
									    'msg'   => '',
									    'count' => $count,
									    'data'  => $data
								]);
						}
						return view();
				}
				
				// 添加客服链接
				public function kefu_add(){
						if (request()->isAjax()) {
								return model('Kefu')->add($_REQUEST);
						}
						return view();
				}
				
				// 删除客服链接
				public function kefuDel(){
						if(!request()->isAjax()) return '非法提交';
						$param = input('post.');//获取参数
						//	print_r($param);exit();
						if(!$param) return '提交失败';
						$delRes = model($param['table'])->where('id','=',$param['id'])->delete();
						if(!$delRes) return '删除失败';
						//添加操作日志
						model('Actionlog')->actionLog(session('manage_username'),'删除ID: '.$param['id'].'的客服链接',1);
						return 1;
						//	return model('Slide')->del();
				}
				
				// 改变状态
				public function kefuStatus(){
						if(!request()->isAjax()) return '非法提交';
						$param = input('post.');//获取参数
						if(!$param) return '提交失败';
						$data['uptime'] = time();
						$data['id'] = $param['id'];
						$data['status'] = $param['val'];
						$staRes = Db::name('kefu')
							    ->where('id', $data['id'])
							    ->data($data)
							    ->update();
						if(! $staRes ) return '状态修改失败';
						//添加操作日志
						model('Actionlog')->actionLog(session('manage_username'),$data['status'] ==1 ?'启用了ID:'.$param['id'].'的客服链接':'禁用了ID:'.$param['id'].'的客服链接',1);
						return 1;
				}
		}
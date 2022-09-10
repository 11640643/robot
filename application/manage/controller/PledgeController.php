<?php
namespace app\manage\controller;
use app\manage\controller\Common;
use think\Db;
		
class PledgeController  extends CommonController{
		// 质押订单列表
		public function pledgeList(){
				if (request()->isAjax()) {
						$param = input('post.');
						$count              = model('user_pledge')->count(); // 总记录数
						$param['limit']     = (isset($param['limit']) and $param['limit']) ? $param['limit'] : 15; // 每页记录数
						$param['page']      = (isset($param['page']) and $param['page']) ? $param['page'] : 1; // 当前页
						$limitOffset        = ($param['page'] - 1) * $param['limit']; // 偏移量
						$param['sortField'] = (isset($param['sortField']) && $param['sortField']) ? $param['sortField'] : 'id';
						$param['sortType']  = (isset($param['sortType']) && $param['sortType']) ? $param['sortType'] : 'desc';
						//查询符合条件的数据
						$data = model('user_pledge')->order($param['sortField'], $param['sortType'])->limit($limitOffset, $param['limit'])->select()->toArray();
						
						foreach ($data as  $key => $value){
						    $data[$key]['start_time'] = date("Y-m-d H:i:s",$value['start_time']);
						    $data[$key]['end_time'] = date("Y-m-d H:i:s",$value['end_time']);
						    $username = model('users')->where('id = '.$value['uid'])->field('id,username')->find();
						    $data[$key]['username'] = $username['username'];
						    switch ($value['status']) {
						        case 0:
                                    $data[$key]['status'] = "未完成";
                                    break;
                                case 1:
                                    $data[$key]['status'] = "已完成";
                                    break;
                                case 2:
                                    $data[$key]['status'] = "已赎回";
                                    break;
                                default:
                                    $data[$key]['status'] = "未完成";
                                    break;
						    }
						    $username = Db::name('users')->where('id',$data[$key]['uid'])->find();
						}
						return json([
							    'code'  => 0,
							    'msg'   => '质押数据',
							    'count' => $count,
							    'data'  => $data
						]);
				}
				return view();
		}
		
	
		// 删除质押订单
		public function pledgeDel(){
				if(!request()->isAjax()) return '非法提交';
				$param = input('post.');//获取参数
				//	print_r($param);exit();
				if(!$param) return '提交失败';
				$delRes = model($param['table'])->where('id','=',$param['id'])->delete();
				if(!$delRes) return '删除失败';
				//添加操作日志
				model('Actionlog')->actionLog(session('manage_username'),'删除ID: '.$param['id'].'的质押记录',1);
				return 1;
				//	return model('Slide')->del();
		}
		
		// 改变状态
// 		public function pledgeStatus(){
// 				if(!request()->isAjax()) return '非法提交';
// 				$param = input('post.');//获取参数
// 				if(!$param) return '提交失败';
// 				$data['uptime'] = time();
// 				$data['id'] = $param['id'];
// 				$data['status'] = $param['val'];
// 				$staRes = Db::name('kefu')
// 					    ->where('id', $data['id'])
// 					    ->data($data)
// 					    ->update();
// 				if(! $staRes ) return '状态修改失败';
// 				//添加操作日志
// 				model('Actionlog')->actionLog(session('manage_username'),$data['status'] ==1 ?'启用了ID:'.$param['id'].'的客服链接':'禁用了ID:'.$param['id'].'的客服链接',1);
// 				return 1;
// 		}
}
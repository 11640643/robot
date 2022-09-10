<?php
namespace app\api\model;

use think\Model;
use think\Db;
use think\Cache;

class GoodListModel extends Model
{
	protected $table = 'good_list';

	/**
	 * 矿机列表
	 */
	public function goodlist(){
		$param = receiveJson();
		$lang	  = !empty($param['lang']) ? $param['lang'] : 'en';	// 语言类型
		$dataAll = $this
		->order(['id'=>'asc'])
		->select()->toArray();
		foreach($dataAll as &$v){
			$v['add_time'] = $v['add_time'] ? date("Y-m-d H:i:s", $v['add_time']) : null;
			if($lang == 'ag'){
				$v['name'] = $v['name_ag'];
			} else {
				$v['name'] = $v['name'];
			}
		}

		//获取成功
		$data['code'] 				= 1;
		$data['data'] = $dataAll;
		return $data;
	}
}

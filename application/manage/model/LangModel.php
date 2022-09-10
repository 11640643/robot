<?php
namespace app\manage\model;

use think\Model;

class LangModel extends Model{
	//表名
	protected $table = 'lang';

	/**
	 * 语言添加
	 */
	public function langAdd(){
		if (!request()->isAjax()) return '非法提交';
		$param = input('post.');
		
		$insertRes = $this->allowField(true)->save($param);
		if(!$insertRes) return '添加失败';

		//添加操作日志
		model('Actionlog')->actionLog(session('manage_username'),'添加语言'.$param['langname'],1);

		return 1;
	}

	/**
	 * 语言编辑
	 */
	public function langEdit(){
		if (!request()->isAjax()) return '非法提交';
		$param = input('post.');


		$id = $param['id'];

		$insertRes = $this->save($param, ['id'=>$id]);
		if(!$insertRes) return '编辑失败';

		//添加操作日志
		model('Actionlog')->actionLog(session('manage_username'),'编辑语言'.$param['langname'],1);

		return 1;
	}
	
	
	
}
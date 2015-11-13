<?php
class Admin_DynastyController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$data = AdminNav::tree(Dynasty::get()->toArray(),'cid');
		return $this->_cacheView('admin.dynasty.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = Dynasty::where('id',$id)->first();
		$data['category'] = Dynasty::where('cid','=',0)->get()->toArray();
		return $this->_cacheView('admin.dynasty.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$flag = Dynasty::where('id',$data['id'])->update($data);
		$backurl = "dynasty/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		$data['category'] = Dynasty::where('cid','=',0)->get()->toArray();
		return $this->_cacheView('admin.dynasty.add',$data);
	}

	public function postAdd(){
		$data = Input::all();
		$mod = new Dynasty();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "dynasty/add/";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
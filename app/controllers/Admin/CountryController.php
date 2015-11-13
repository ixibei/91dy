<?php
class Admin_CountryController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		return $this->_cacheView('admin.country.index');
	}

	public function getEdit($id){
		$data['detail'] = Country::where('id',$id)->first();
		return $this->_cacheView('admin.country.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$flag = Country::where('id',$data['id'])->update($data);
		$backurl = "country/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.country.add');
	}

	public function postAdd(){
		$data = Input::all();
		$mod = new Country();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "country/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
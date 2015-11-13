<?php
class Admin_PersonController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		if(Input::has('ajaxKeywords')){
			$keywords = Input::get('ajaxKeywords');
			$data = Person::select('id','name')->where('name','like',"%$keywords%")->orderBy('id','desc')->take(200)->get()->toJson();
			echo $data;exit;
		}
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$data = Person::getPerson($keywords);
		return $this->_cacheView('admin.person.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = Person::where('id',$id)->first();
		return $this->_cacheView('admin.person.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$data['age'] = strtotime($data['age']);
		$flag = Person::where('id',$data['id'])->update($data);
		$backurl = "person/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.person.add');
	}

	public function postAdd(){
		$data = Input::all();
		$data['age'] = strtotime($data['age']);
		$data['add_time'] = strtotime($data['add_time']);
		$mod = new Person();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "person/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}

}
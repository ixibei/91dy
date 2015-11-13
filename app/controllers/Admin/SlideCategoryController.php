<?php
class Admin_SlideCategoryController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$data = AdminNav::tree(SlideClass::get()->toArray(),'cid');
		return $this->_cacheView('admin.slideCategory.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = SlideClass::where('id',$id)->first();
		$data['category'] = SlideClass::where('cid','=',0)->get();
		return $this->_cacheView('admin.slideCategory.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$flag = SlideClass::where('id',$data['id'])->update($data);
		$backurl = "slideCategory/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		$data['category'] = SlideClass::where('cid','=',0)->get();
		return $this->_cacheView('admin.slideCategory.add',$data);
	}

	public function postAdd(){
		$data = Input::all();
		$mod = new SlideClass();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "slideCategory/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
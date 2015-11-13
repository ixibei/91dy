<?php
class Admin_SlideController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';//查询关键词
		$cid = Input::has('cid') ? Input::get('cid') : '';//查询分类
		$isParent = Input::has('is_parent') ? Input::get('is_parent') : '';//查询是否父分类
		$data['detail'] = Slide::getFocus($keywords,$cid,$isParent);
		$data['category'] = AdminNav::tree(SlideClass::get()->toArray(),'cid');
		return $this->_cacheView('admin.slide.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = Slide::select('focus.*','C.cid as classid')->where('focus.id',$id)->leftJoin('focus_class as C','focus.fclass','=','C.id')->first();
		$data['category'] = SlideClass::where('cid','=','0')->get();//分类
		$data['ncategory'] = SlideClass::where('cid','!=','0')->get();//子分类
		return $this->_cacheView('admin.slide.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$flag = Slide::where('id',$data['id'])->update($data);
		$backurl = "slide/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		$data['category'] = SlideClass::where('cid','=','0')->get();//分类
		$data['ncategory'] = SlideClass::where('cid','!=','0')->get();//子分类
		return $this->_cacheView('admin.slide.add',$data);
	}

	public function postAdd(){
		$data = Input::all();
		$mod = new Slide();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "slide/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
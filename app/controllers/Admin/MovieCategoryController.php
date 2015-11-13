<?php
class Admin_MovieCategoryController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		if(Input::has('ajaxKeywords')){
			$keywords = Input::get('ajaxKeywords');
			$data = MovieCategory::select('id','name')->where('name','like',"%$keywords%")->orderBy('id','desc')->take(200)->get()->toJson();
			echo $data;exit;
		}
		return $this->_cacheView('admin.movieCategory.index');
	}

	public function getEdit($id){
		$data['detail'] = MovieCategory::where('id',$id)->first();
		return $this->_cacheView('admin.movieCategory.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$flag = MovieCategory::where('id',$data['id'])->update($data);
		$backurl = "movieCategory/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.movieCategory.add');
	}

	public function postAdd(){
		$data = Input::all();
		$mod = new MovieCategory();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "movieCategory/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
<?php
class Admin_FeedbackController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$data = Feedback::getFeedback($keywords);
		return $this->_cacheView('admin.feedback.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = Keyword::where('id',$id)->first();
		return $this->_cacheView('admin.keywords.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$flag = Keyword::where('id',$data['id'])->update($data);
		$backurl = "keywords/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.keywords.add');
	}

	public function postAdd(){
		$data = Input::all();
		$mod = new Keyword();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "keywords/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
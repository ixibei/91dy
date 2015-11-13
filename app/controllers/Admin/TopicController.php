<?php
class Admin_TopicController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		if(Input::has('ajaxKeywords')){
			$keywords = Input::get('ajaxKeywords');
			$data = Ht::select('id','ftname as newstitle')->where('ftname','like',"%$keywords%")->orderBy('id','desc')->take(200)->get()->toJson();
			echo $data;exit;
		}
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$data = Ht::getHt($keywords);
		return $this->_cacheView('admin.topic.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = Ht::where('id',$id)->first();
		$data['relateNews'] = News::getRelate('News',$data['detail']['xgids'],'newstitle');
		return $this->_cacheView('admin.topic.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$data['xgids'] = is_array($data['xgids']) ? implode(',',$data['xgids']) : '';
		$flag = Ht::where('id',$data['id'])->update($data);
		$backurl = "topic/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.topic.add');
	}

	public function postAdd(){
		$data = Input::all();
		$data['xgids'] = is_array($data['xgids']) ? implode(',',$data['xgids']) : '';
		$mod = new Ht();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "topic/add/";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
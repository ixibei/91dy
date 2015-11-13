<?php
class Admin_PoemController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		if(Input::has('ajaxKeywords')){
			$keywords = Input::get('ajaxKeywords');
			$data = Poem::select('id','Poetryname as newstitle')->where('Poetryname','like',"%$keywords%")->orderBy('id','desc')->take(200)->get()->toJson();
			echo $data;exit;
		}
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$data = Poem::getPoem($keywords);
		return $this->_cacheView('admin.poem.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = Poem::where('id',$id)->first();
		$data['relateNews'] = News::getRelate('News',$data['detail']['xgids'],'newstitle');
		return $this->_cacheView('admin.poem.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$data['xgids'] = is_array($data['xgids']) ? implode(',',$data['xgids']) : '';
		$flag = Poem::where('id',$data['id'])->update($data);
		$backurl = "poem/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.poem.add');
	}

	public function postAdd(){
		$data = Input::all();
		$data['xgids'] = is_array($data['xgids']) ? implode(',',$data['xgids']) : '';
		$mod = new Poem();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "poem/add/";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
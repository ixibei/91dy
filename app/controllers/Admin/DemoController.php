<?php
//   演视专题
class Admin_DemoController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$data = Demo::getDemo($keywords);
		return $this->_cacheView('admin.demo.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = Demo::where('id',$id)->first();
		$data['relateNews']['yyids'] = News::getRelate('News',$data['detail']['yyids'],'newstitle');
		$data['relateNews']['jqids'] = News::getRelate('News',$data['detail']['jqids'],'newstitle');
		$data['relateNews']['xwids'] = News::getRelate('News',$data['detail']['xwids'],'newstitle');
		return $this->_cacheView('admin.demo.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$data['yyids'] = is_array($data['yyids']) ? implode(',',$data['yyids']) : '';
		$data['jqids'] = is_array($data['jqids']) ? implode(',',$data['jqids']) : '';
		$data['xwids'] = is_array($data['xwids']) ? implode(',',$data['xwids']) : '';
		$flag = Demo::where('id',$data['id'])->update($data);
		$backurl = "demo/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.demo.add');
	}

	public function postAdd(){
		$data = Input::all();
		$data['yyids'] = is_array($data['yyids']) ? implode(',',$data['yyids']) : '';
		$data['jqids'] = is_array($data['jqids']) ? implode(',',$data['jqids']) : '';
		$data['xwids'] = is_array($data['xwids']) ? implode(',',$data['xwids']) : '';
		$mod = new Demo();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "demo/add/";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
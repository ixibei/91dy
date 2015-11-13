<?php
class Admin_FriendLinkController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$isAll = Input::has('is_all') ? Input::get('is_all') : false;
		$data = FriendLink::getFriendLink($keywords,$isAll);
		return $this->_cacheView('admin.friendLink.index',$data);
	}

	public function getEdit($id){
		$data['detail'] = FriendLink::where('id',$id)->first();
		return $this->_cacheView('admin.friendLink.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$flag = FriendLink::where('id',$data['id'])->update($data);
		$backurl = "friendLink/edit/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		return $this->_cacheView('admin.friendLink.add');
	}

	public function postAdd(){
		$data = Input::all();
		$mod = new FriendLink();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "friendLink/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
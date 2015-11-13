<?php
class Admin_UserController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$data = AdminUsers::getAllUser();
		return $this->_cacheView('admin.user.index',$data);
	}

	public function getEditUser($id){
		$data['role'] = AdminRoles::get();
		$data['detail'] = AdminUsers::where('id',$id)->first();
		return $this->_cacheView('admin.user.editUser',$data);
	}

	public function postEditUser(){
		$data = Input::all();
		$data['status'] = isset($data['status']) ? $data['status'] : 0;
		$data['expand'] = isset($data['expand']) ? $data['expand'] : 0;
		if($data['password']){
			$data['password'] = Hash::make($data['password']);
		} else{
			unset($data['password']);
		}
		$flag = AdminUsers::where('id',$data['id'])->update($data);
		$backurl = "user/edit-user/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAddUser(){
		$data['role'] = AdminRoles::get();
		return $this->_cacheView('admin.user.addUser',$data);
	}

	public function postAddUser(){
		$data = Input::all();
		$data['password'] = Hash::make($data['password']);
		$data['add_time'] = $_SERVER['REQUEST_TIME'];
		$mod = new AdminUsers();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "user/add-user";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}


}
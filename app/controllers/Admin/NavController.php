<?php
class Admin_NavController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function dashboard(){
		return $this->_cacheView('admin.nav.dashboard');
	}

	//导航列表
	public function getIndex(){
		$data = AdminNav::nav();
		return $this->_cacheView('admin.nav.nav',$data);
	}

	//导航列表
	public function getEditNav($id){
		if(isset($status)) echo $status;
		$data['detail'] = AdminNav::where('id',$id)->first();
		$data['data'] = AdminNav::where('level','<','2')->orderBy('sort','asc')->get();
		return $this->_cacheView('admin.nav.editNav',$data);
	}

	public function postEditNav(){
		$data = Input::all();
		$data['status'] = isset($data['status']) ? $data['status'] : 0;
		$flag = AdminNav::where('id',$data['id'])->update($data);
		$backurl = "nav/edit-nav/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	//添加导航
	function getAddNav(){
		$data = AdminNav::where('level','<','2')->orderBy('sort','asc')->get();
		return $this->_cacheView('admin.nav.addNav',$data);
	}

	function postAddNav(){
		$data = Input::all();
		$mod = new AdminNav();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "nav/add-nav";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}

	//角色组列表
	public function getRole(){
		$data = AdminRoles::get();
		return $this->_cacheView('admin.nav.role',$data);
	}

	//添加角色
	public function getAddRole(){
		return $this->_cacheView('admin.nav.addRole',AdminNav::getRoleNav(0));
	}

	public function postAddRole(){
		$data = Input::all();
		$data['status'] = isset($data['status']) ? $data['status'] : 0;
		$id = DB::table('admin_roles')->insertGetId(array('title'=>$data['title'],'status'=>$data['status']));
		$flags = false;
		if(isset($data['roles'])){
			$update = array_reverse($data['roles']);
			unset($data['roles']);
			foreach($update as $key=>$val){
				$flags = DB::table('admin_nav_roles')->insert(array('nav_id'=>$val,'role_id'=>$this->$id));
			}
		}
		$backurl = "nav/edit-role/".$id;
		if($id || $flags) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	//编辑角色
	public function getEditRole($id){
		$data['detail'] = AdminRoles::where('id',$id)->first();
		$data['data'] = AdminNav::getRoleNav($id);
		return $this->_cacheView('admin.nav.editRole',$data);
	}

	public function postEditRole(){
		$data = Input::all();
		$data['status'] = isset($data['status']) ? $data['status'] : 0;
		$flags = false;
		if(isset($data['roles'])){
			$update = array_reverse($data['roles']);
			unset($data['roles']);
			DB::table('admin_nav_roles')->where('role_id','=',$data['id'])->delete();
			foreach($update as $key=>$val){
				$flags = DB::table('admin_nav_roles')->insert(array('nav_id'=>$val,'role_id'=>$data['id']));
			}
		}
		$flag = AdminRoles::where('id',$data['id'])->update($data);
		$backurl = "nav/edit-role/".$data['id'];
		if($flag || $flags) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}
}
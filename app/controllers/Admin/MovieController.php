<?php
class Admin_MovieController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$data = array();
		$where = '1=1';
		if($keywords) $where .= ' and name like "%'.$keywords.'%"';
		$data['detail'] = Movie::whereRaw($where,array())->orderBy('sort','desc')->orderBy('id','desc')->get();
		return $this->_cacheView('admin.movie.index',$data);
	}

	public function getEdit($id){
		$data['type'] = Type::all();
		$data['detail'] = Movie::where('id',$id)->first();
		return $this->_cacheView('admin.movie.edit',$data);
	}

	public function postEdit(){
		$data = Input::all();
		$categoryId = $data['category_id'];
		$personId = $data['person_id'];
		unset($data['person_id']);
		unset($data['category_id']);
		MoviePerson::where('movie_id','=',$data['id'])->delete();
		MovieCategoryList::where('movie_id','=',$data['id'])->delete();
		$flag1 = $this->insertData($categoryId,$personId,$data['id']);//插入关联数据
		$data['release_time'] = strtotime($data['release_time']);
		$flag = Movie::where('id',$data['id'])->update($data);
		$backurl = "movie/edit/".$data['id'];
		if($flag || $flag1) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAdd(){
		$data['type'] = Type::all();
		return $this->_cacheView('admin.movie.add',$data);
	}

	public function postAdd(){
		$data = Input::all();
		$data['release_time'] = strtotime($data['release_time']);
		$categoryId = $data['category_id'];
		$personId = $data['person_id'];
		unset($data['person_id']);
		unset($data['category_id']);
		$movieMod = new Movie();
		$this->_setAttribute($movieMod,$data);
		$flag = $movieMod->save($data);
		$this->insertData($categoryId,$personId,$movieMod->id);//插入关联数据
		$backurl = "movie/add";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}

	public function insertData($categoryId,$personId,$id){
		$flag = false;
		//电影分类
		if($categoryId){
			foreach($categoryId as $val){
				$mod = new MovieCategoryList();
				$arr = array('movie_id'=>$id,'category_id'=>$val);
				$this->_setAttribute($mod,$arr);
				if(!$flag)	$flag = $mod->save($arr);
				else $mod->save($arr);
			}
		}
		//电影人物
		if($personId){
			foreach($personId as $val){
				$mod = new MoviePerson();
				$arr = array('movie_id'=>$id,'person_id'=>$val);
				$this->_setAttribute($mod,$arr);
				if(!$flag)	$flag = $mod->save($arr);
				else $mod->save($arr);
			}
		}
		return $flag;
	}
}
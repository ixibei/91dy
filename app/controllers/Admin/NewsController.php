<?php
class Admin_NewsController extends Admin_BaseController {

	public function __construct(){
		$this->controller = __CLASS__;
		parent::__construct();
	}

	public function getIndex(){
		if(Input::has('ajaxKeywords')){
			$keywords = Input::get('ajaxKeywords');
			$data = News::select('id','newstitle')->where('newstitle','like',"%$keywords%")->orderBy('id','desc')->take(200)->get()->toJson();
			echo $data;exit;
		}
		$keywords = Input::has('keywords') ? Input::get('keywords') : '';
		$data['data'] = News::getNews($keywords);
		$data['count'] = News::count();
		return $this->_cacheView('admin.news.index',$data);
	}

	public function getEditNews($id){
		$data['detail'] = News::where('id',$id)->first();//新闻详情
		$data['category'] = NewsClass::where('cid','=',0)->get();//分类
		$data['ncategory'] = NewsClass::orderBy('cid','desc')->where('cid','!=',0)->get();//子分类
		$data['dynasty'] = Dynasty::get();//所属朝代
		$data['relate']['xgids'] = News::getRelate('News',$data['detail']['xgids'],'newstitle');
		$data['relate']['rwid'] = News::getRelate('Person',$data['detail']['rwid'],'rwname');
		$data['relate']['htid'] = News::getRelate('Ht',$data['detail']['htid'],'ftname');
		$data['relate']['scid'] = News::getRelate('Poem',$data['detail']['scid'],'Poetryname');
		return $this->_cacheView('admin.news.editNews',$data);
	}

	public function postEditNews(){
		$data = Input::all();
		$data['jc'] = isset($data['jc']) ? $data['jc'] : 0;
		$data['yc'] = isset($data['yc']) ? $data['yc'] : 0;
		$data['tj'] = isset($data['tj']) ? $data['tj'] : 0;
		$data['twtj'] = isset($data['twtj']) ? $data['twtj'] : 0;
		$data['rwid'] = is_array($data['rwid']) ? implode(',',$data['rwid']) : '';
		$data['htid'] = is_array($data['htid']) ? implode(',',$data['htid']) : '';
		$data['scid'] = is_array($data['scid']) ? implode(',',$data['scid']) : '';
		$data['xgids'] = is_array($data['xgids']) ? implode(',',$data['xgids']) : '';
		$flag = News::where('id',$data['id'])->update($data);
		$backurl = "news/edit-news/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAddNews(){
		$data['category'] = NewsClass::where('cid','=',0)->get();//分类
		$data['ncategory'] = NewsClass::orderBy('cid','desc')->where('cid','!=',0)->get();//子分类
		$data['dynasty'] = Dynasty::get();//所属朝代
		return $this->_cacheView('admin.news.addNews',$data);
	}

	public function postAddNews(){
		$data = Input::all();
		$data['rwid'] = is_array($data['rwid']) ? implode(',',$data['rwid']) : '';
		$data['htid'] = is_array($data['htid']) ? implode(',',$data['htid']) : '';
		$data['scid'] = is_array($data['scid']) ? implode(',',$data['scid']) : '';
		$data['xgids'] = is_array($data['xgids']) ? implode(',',$data['xgids']) : '';
		$mod = new News();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "news/add-news/";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}

	public function getCategory(){
		$data = AdminNav::tree(NewsClass::get()->toArray(),'cid');
		return $this->_cacheView('admin.news.category',$data);
	}

	public function getEditCategory($id){
		$data['category'] = NewsClass::where('cid','=',0)->get()->toArray();
		$data['detail'] = NewsClass::where('id',$id)->first();//新闻详情
		return $this->_cacheView('admin.news.editCategory',$data);
	}

	public function postEditCategory(){
		$data = Input::all();
		$flag = NewsClass::where('id',$data['id'])->update($data);
		$backurl = "news/edit-category/".$data['id'];
		if($flag) return Redirect::to($backurl)->with('status', '保存成功!');
		else return Redirect::to($backurl)->with('status','保存失败!');
	}

	public function getAddCategory(){
		$data['category'] = NewsClass::where('cid','=',0)->get()->toArray();
		return $this->_cacheView('admin.news.addCategory',$data);
	}

	public function postAddCategory(){
		$data = Input::all();
		$mod = new NewsClass();
		$this->_setAttribute($mod,$data);
		$flag = $mod->save($data);
		$backurl = "news/add-category/";
		if($flag) return Redirect::to($backurl)->with('status', '添加成功!');
		else return Redirect::to($backurl)->with('status','添加失败!');
	}

}
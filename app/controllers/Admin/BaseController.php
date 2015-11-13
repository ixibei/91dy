<?php
class Admin_BaseController extends Controller {
	public $user = array();
	public $nav = array();//导航数组
	public $isCache = false;//是否打开缓存
	public $action = '';//当前action名称
	public $controller = '';//当前controller
	public $baseUrl = 'http://www.91dy.me/';

	public function __construct(){
		$this->_initData();
		$this->user = Auth::user();
		$this->action = Route::currentRouteAction();
	}

	public function _initData(){
		$this->nav = json_encode(AdminNav::getNav());
	}

	protected function _cacheView($view,$data = array()){
		return Response::view($view,['data'=>$data,'nav'=>$this->nav,'controller'=>$this->controller,'user'=>$this->user,'baseUrl'=>$this->baseUrl]);
	}

	public function index(){
		$mysql = Config::get('database.connections');
		$users = Users::all();
		$params = Route::getCurrentRoute()->getParametersWithoutDefaults();
		return Response::view('admin.login.index',['users'=>$users]);
	}

	//ajax 更变状态
	public function changeStatus(){
		$table = Input::get('table');
		$id = Input::get('id');
		$field = Input::get('field');
		if($table && $id){
			DB::statement("update $table set $field=($field+1)%2 where id=$id");
			$data = DB::table($table)->where('id',$id)->pluck($field);
			return $data;
		}
	}

	//批量简单删除 批量改变状态 批量推荐功能
	public function option(){
		$table = Input::get('table');
		$option = Input::get('option');
		$data = trim(Input::get('data'),',');
		$flag = false;
		switch($option){
			case 'delete':
				$flag = DB::statement("delete from $table where id in($data)");
				break;
			case 'status_on':
				$flag = DB::statement("update $table set status=1 where id in ($data)");
				break;
			case 'status_off':
				$flag = DB::statement("update $table set status=0 where id in ($data)");
				break;
		}
		$msg = $flag ? 'Option created successfully' : 'Option created failure';
		$data = ['status' => 1,'msg' => $msg];
		return Response::json($data);
	}

	/**
	 * @param $mod 要操作的对象
	 * @param $data 添加的数据
	 */
	protected function _setAttribute($mod,$data){
		foreach($data as $key=>$val){
			$mod->$key = $val;
		}
	}

	//处理文章关联的关键词
	public function parseKeywords($data = '',$keywords = ''){
		if($data){
			$content = $data;
		} else{
			$content = Input::all();
			$content = $content['content'];
		}
		if(!$content) return;
		$keywords = $keywords ? $keywords : Keyword::select('keyword','url')->get();
		$i = 0;
		foreach($keywords as $val){
			if($pos = mb_strpos($content,$val->keyword)){
				if(mb_substr($content,$pos-1,1,'utf8') == '>') continue;//如果前面是>在代表是一个链接，不需要再次进行替换了
				$link = '<a href="'.$val->url.'">'.$val->keyword.'</a>';
				$keywordCount = mb_strlen($val->keyword);
				$contentHeader = mb_substr($content,0,$pos,'utf8');
				$contentFooter = mb_substr($content,$pos+$keywordCount,-1,'utf8');
				$content = $contentHeader.$link.$contentFooter;
				$i++;
			}
		}
		if($data){
			return $content;
		} else{
			echo json_encode(array('content'=>$content,'num'=>$i));
		}
	}

	/**
	 * 批量更新所有的文章
	 */
	public function updateAllKeywords(){
		$p = Input::all();
		$p = $p['p'];
		$count = 100;
		$start = ($p-1)*$count;
		$arr = News::select('content','id')->skip($start)->take($count)->orderBy('id','desc')->get();
		$keywords = Keyword::select('keyword','url')->get();
		foreach($arr as $val){
			$content = $this->parseKeywords($val->content,$keywords);
			News::where('id',$val->id)->update(array('content'=>$content));
		}
		$message = '正在更新第 <span style="color:red">'.$start.' </span>到 <span style="color:red">'.($p*$count).' </span>篇文章';
		echo json_encode(array('message'=>$message,'status'=>1));
	}
}
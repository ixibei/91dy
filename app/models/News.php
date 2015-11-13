<?php

class News extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'news';

	/**
	 * @param string $keywords 搜索关键词
	 * @return object
	 */
	public static function getNews($keywords = ''){
		if(!$keywords){
			return News::select('news.*','C.classname','C1.classname as nclassname')
				->leftJoin('news_class as C','news.classid','=','C.id')
				->leftJoin('news_class as C1','news.nclassid','=','C1.id')
				->orderBy('id','desc')->paginate(20);
		} else {
			return News::where('news.newstitle','like',"%$keywords%")
				->select('news.*','C.classname','C1.classname as nclassname')
				->leftJoin('news_class as C','news.classid','=','C.id')
				->leftJoin('news_class as C1','news.nclassid','=','C1.id')
				->orderBy('id','desc')->paginate(20);
		}
	}

	//获取关联的各项内容
	public static function getRelate($mod,$id,$field){
		$id = trim($id,',');
		$ids = explode(',',$id);
		$return = array();
		foreach($ids as $val){
			$data = $mod::select('id',$field)->where('id',$val)->first();
			if($data) $return[] = $data;
		}
		return $return;
	}

	/**
	 * 新闻子分类|父分类下的新闻
	 * @param $cid 分类id
	 * @param $type classid|nclassid 要取得数据时子分类还是父分类
	 * @param $num
	 * @param $order
	 * @param $signal
	 * @return mixed
	 */
	public static function getCategoryNews($cid,$type='classid',$num = 8,$orderBy='id',$signal = '=',$order = 'desc'){
		$redisKey = 'qls_pc_news_'.$orderBy.'_'.$order.'_'.$type.'_'.$cid.'_'.$num.'_'.$signal;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = News::where($type,$signal,$cid)
			->select('id','newstitle','minititle','tcolor','newspic','classid','nclassid','AddTime','hits','content')
			->orderBy($orderBy,$order)->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 在父分类下模糊查找新闻
	 * @param $classid int 分类id
	 * @param $enLike String 缓存的key
	 * @param $like String 模糊关键词一
	 * @param $like1 String 模糊关键词二
	 * @param $like2 String|null 模糊关键词三
	 * @param $like3 String|null 模糊关键词四
	 * @param int $num int 查询数量
	 * @return mixed
	 */
	public static function getCategoryNewsLike($classid,$enLike,$like,$like1='',$like2='',$like3='',$num = 8) {
		$redisKey = 'qls_pc_news_category_'.$classid.'_'.$enLike.'_'.$num;
		if (Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = News::where('classid', '=', $classid)
			->where(function($query) use ($like,$like1,$like2,$like3){
				if($like3){
					$query->where('newstitle','like',$like)
						->orWhere('newstitle','like',$like1)
						->orWhere('newstitle','like',$like2)
						->orWhere('newstitle','like',$like3)
						->orWhere('keywords','like',$like)
						->orWhere('keywords','like',$like1)
						->orWhere('keywords','like',$like2)
						->orWhere('keywords','like',$like3);
				}elseif($like2){
					$query->where('newstitle','like',$like)
						->orWhere('newstitle','like',$like1)
						->orWhere('newstitle','like',$like2)
						->orWhere('keywords','like',$like)
						->orWhere('keywords','like',$like1)
						->orWhere('keywords','like',$like2);
				} elseif($like1) {
					$query->where('newstitle','like',$like)
						->orWhere('newstitle','like',$like1)
						->orWhere('keywords','like',$like)
						->orWhere('keywords','like',$like1);
				} else{
					$query->where('newstitle','like',$like)
						->orWhere('keywords','like',$like);
				}
			})
			->select('id', 'newstitle', 'minititle', 'tcolor', 'newspic', 'classid', 'nclassid', 'AddTime', 'hits', 'content')
			->orderBy('id', 'desc')->take($num)->get();
		Rds::set($redisKey, $data, Config::get('redis.expire'), 's');
		return $data;
	}

	/**
	 * 获取父分类下的推荐文章
	 * @param $classid
	 * @param int $num
	 * @param String $order
	 * @return mixed
	 */
	public static  function getCategoryNewsTj($classid,$num=10,$order = 'id'){
		$redisKey = 'qls_pc_news_tj_'.$order.'_'.$classid.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = News::where('classid','=',$classid)
			->where('tj','=','1')
			->where('newspic','!=','')
			->select('id','newstitle','minititle','tcolor','newspic','classid','nclassid','AddTime','hits','content')
			->orderBy($order,'desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 获取全站的原创新闻
	 * @param int $num
	 * @return mixed
	 */
	public static function getYc($num = 3){
		$redisKey = 'qls_pc_news_yc_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$data = News::where('yc','=','1')->select('id','newstitle','xgids','AddTime')->orderBy('AddTime','desc')->take($num)->get()->toArray();
		foreach($data as $key=>$val){
			$arr = explode(',',$val['xgids']);
			$ids = array($arr[0],$arr[1]);
			$data[$key]['relateNews'] = News::whereIn('id',$ids)->select('id','newstitle','AddTime')->get()->toArray();
		}
		Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
		return $data;
	}
	/**
	 * 查询新闻朝代相关新闻
	 * @param $where 查询条件
	 * @param $key 缓存的key
	 * @param int $num
	 * @return mixed
	 */
	public static function getDynastyNews($where,$key,$num = 8){
		$redisKey = 'qls_pc_news_dynasty_'.$key.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = News::whereRaw($where,array())
			->select('id','newstitle','minititle','tcolor','newspic','classid','nclassid','AddTime','hits','content')
			->orderBy('id','desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 获取文章详情
	 * @param $id int 文章id
	 * @param $currentPage int 当前页数
	 * @return mixed
	 */
	public static function getNewsDetail($id,$currentPage){
		$redisKey = 'qls_pc_news_detail_'.$id;
		if(Rds::exists($redisKey)){
			$detail = json_decode(Rds::get($redisKey),true);
			$totalPage = $detail['totalPage'];
		} else{
			$detail = News::where('id','=',$id)->select('id','newstitle','AddTime','content','keywords','intro','adduser','classid','nclassid','rwid','xgids','htid')->first()->toArray();
			if(!$detail) App::abort('404');
			$xgids = trim($detail['xgids'],',');//相关阅读推荐
			if($xgids)	$detail['relateNews'] = News::whereRaw('id in ('.$xgids.')',array())->select('id','newstitle','AddTime')->get()->toArray();
			$htids = trim($detail['htid'],',');//相关专题
			if($htids)	$detail['relateHt'] = Ht::whereRaw('id in ('.$htids.')',array())->select('id','ftname','filename')->get()->toArray();
			//分页信息
			$arr = explode('[$HR getPages$]',$detail['content']);
			$totalPage = count($arr);
			$detail['totalPage'] = $totalPage;//总共多少页
			unset($detail['content']);
			$arr[$totalPage-1] .= '<p>  免责声明：以上内容源自网络，版权归原作者所有，如有侵犯您的原创版权请告知，我们将尽快删除相关内容。</p>';//最后一页加上免责声明
			$detail['content'] = $arr;
			Rds::set($redisKey,json_encode($detail),Config::get('redis.expire'),'s');
		}
		$detail['currentContent'] = $detail['content'][$currentPage-1];//当前页内容
		//分页
		$pages = '';
		for($i = 1; $i<= $totalPage; $i++){
			$num = $i == 1 ? '' : '_'.$i;
			$class = $i == $currentPage ? 'class="up1"' : '';
			$pages .= '<a href="'.$detail['id'].$num.'.html" '.$class.'>'.$i.'</a>';
		}
		$upPage = $currentPage == 1 ? $id.'.html' : $id.'_'.($currentPage-1).'.html';//上一页
		$downPage = $currentPage == $totalPage ? $id.'_'.($currentPage).'.html' : $id.'_'.($currentPage+1).'.html';//下一页
		$page = '<div class="page1">
						<div class="pagesad"></div>分页：'.$currentPage.'/'.$totalPage.'页&nbsp;&nbsp;
						<a href="'.$upPage.'" class="up">上一页</a>
						'.$pages.'
						<a href="'.$downPage.'" class="up">下一页</a>
					 </div>';
		$detail['pages'] = $page;
		return $detail;
	}

	/**
	 * 获取新闻详情里面的导航
	 * @param $id
	 * @param $classid
	 * @param $nclassid
	 * @param $rwid
	 * @return mixed
	 */
	public static function getNewsDetailNav($id,$classid,$nclassid,$rwid){
		$redisKey = 'qls_pc_news_detail_nav_'.$id;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$return['classid'] = NewsClass::where('id','=',$classid)->select('filename','classname')->first()->toArray();
		if($nclassid) $return['nclassid'] = NewsClass::where('id','=',$nclassid)->select('filename','classname')->first()->toArray();
		//文章中设置的相关人物
		$id = substr($rwid,0,strpos($rwid,','));
		if($id) {
			$return['rw'] = Person::where('id','=',$id)->select('rwname','filename','xgids')->first()->toArray();
			$where = 'id in ('.trim($return['rw']['xgids'],',').')';
			$return['relateRw'] = Person::whereRaw($where,array())->select('rwname','filename','rwsmallpic')->orderBy('id','desc')->take(9)->get()->toArray();
		}
		Rds::set($redisKey,json_encode($return),Config::get('redis.expire'),'s');
		return $return;
	}

	/**
	 * 在全文中查找相似关键词的文章
	 * @param $keywords
	 * @param int $num
	 * @return mixed
	 */
	public static function getNewsLike($keywords,$num = 10){
		$keywords = str_replace(',','_',trim($keywords,','));
		$redisKey = 'qls_pc_news_like_'.$keywords;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$arr = explode('_',$keywords);
		$where = '';
		foreach($arr as $val){
			$where .= ' newstitle like "%'.$val.'%" or';
		}
		$where = trim($where,'or');
		$data = News::whereRaw($where,array())->select('id','newstitle','AddTime')->orderBy('id','desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	public static function getNewsLikePage($keyword,$currentPage,$order = 'id'){
		$redisKey = 'qls_pc_news_like_'.$keyword.'_'.$currentPage.'_'.$order;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$count = ($currentPage-1)*30;
		$data = News::where('newstitle','like','%'.$keyword.'%')->select('id','AddTime','newstitle')->orderBy($order,'desc')->skip($count)->take(30)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}
}
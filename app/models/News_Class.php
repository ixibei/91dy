<?php

class NewsClass extends Eloquent {

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'news_class';
	/**
	 * 获取分类下的头条信息
	 * @param $classid 分类id
	 * @return mixed
	 */
	public static function getHeadline($classid){
		$redisKey = 'qls_pc_news_category_headline_'.$classid;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$data = News::where(function($query) use ($classid){
				$query->where('classid','=',$classid)
					->orWhere('nclassid','=',$classid);
			})->where('yc','=',1)->select('id','AddTime','newstitle','newspic','content','keywords','xgids')->orderBy('id','desc')->first();
		if(!$data) return false;
		$data = $data->toArray();
		$ids = trim($data['xgids'],',');
		$data['keywords'] = explode(',',trim($data['keywords'],','));
		$data['relateNews'] = News::whereRaw('id in ('.$ids.')',array())->select('id','newspic','newstitle','AddTime')->orderBy('id','desc')->take(3)->get()->toArray();
		Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 文章分类列表
	 * @param $classid int  分类id
	 * @param $currentPage int 当前页数
	 * @param $exceptId int 去除头部
	 * @return mixed
	 */
	public static function getCategoryList($classid,$currentPage,$exceptId,$num = 20){
		$redisKey = 'qls_pc_news_category_list_'.$classid.'_'.$currentPage;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$count = ($currentPage-1)*$num;
		$data = News::where(function($query) use ($classid){
			$query->where('classid','=',$classid)
				->orWhere('nclassid','=',$classid);
			})
			->where('id','!=',$exceptId)->select('id','AddTime','newstitle','newspic','content','keywords','yc')->orderBy('id','desc')->skip($count)->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 老照片分类列表
	 * @param $classid int  分类id
	 * @param $currentPage int 当前页数
	 * @param $type String 当前分类
	 * @param $order String 排序规则
	 * @return mixed
	 */
	public static function getCategoryPicList($classid,$currentPage,$type = 'classid',$order = 'id'){
		$redisKey = 'qls_pc_news_category_list_'.$classid.'_'.$currentPage.'_'.$type.'_'.$order;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$count = ($currentPage-1)*self::$num;
		$data = News::where($type,'=',$classid)->select('id','AddTime','newstitle','newspic','content','keywords','yc','minititle')->orderBy($order,'desc')->skip($count)->take(self::$num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 获取分页
	 * @param $count int 总条数
	 * @param $currentPage 当前页数
	 * @param string $index 网站url前缀
	 * @return string
	 */
	public static function getPages($count,$currentPage,$index='',$num = 20){
		$totalPage = ceil($count/$num);
		$upPage = $downPage = $pages = $hover = '';//上一页 下一页
		$start = $currentPage > $totalPage-4 ? $currentPage-8+($totalPage-$currentPage) : $currentPage-4;//开始页
		$end = $currentPage < 5 ? $currentPage+8-($currentPage-1) : $currentPage+4;//结束页
		if($start < 1) $start = 1;
		if($end > $totalPage) $end = $totalPage;
		if($currentPage == 1) $upPage = 1;
		else $upPage = $currentPage-1;

		if($currentPage == $totalPage) $downPage = $totalPage;
		else	$downPage = $currentPage+1;

		for($i=$start; $i<=$end; $i++){
			if($i == $currentPage) $hover = 'class="active"';
			$pages .= '<a target="_self" '.$hover.' href="/'.$index.'/index_'.$i.'.htm" title="第'.$i.'页">'.$i.'</a>'."\r\n";
			$hover = '';
		}
		$html = '<div class="j31turnPage">
					<span>分页： <i>'.$currentPage.'/'.$totalPage.'</i>页</span>
		 			<a target="_self" href="/'.$index.'/index_1.htm" class="j31Prev">首页</a>
		 			<a target="_self" href="/'.$index.'/index_'.$upPage.'.htm" class="j31Prev">上一页</a>
		 			'.$pages.'
		 			<a target="_self" href="/'.$index.'/index_'.$downPage.'.htm" class="j31Next">下一页</a>
		 			<a target="_self" href="/'.$index.'/index_'.$totalPage.'.htm" class="j31Next">尾页</a>
		</div>';
		return $html;
	}

	//获取导航
	public static function getNav(){
		$key = 'qls_pc_nav';
		if(Rds::exists($key)) return json_decode(Rds::get($key));
		$data = NewsClass::where('status','=','1')->select('classname','filename','is_wenhua','is_mini')->orderBy('sort','desc')->orderBy('id','asc')->get();
		Rds::set($key,$data,Config::get('redis.expire'),'s');
		return $data;
	}
}
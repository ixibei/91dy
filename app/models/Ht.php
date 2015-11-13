<?php

class Ht extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'ht';

	public static function getHt($keywords = '') {
		if(!$keywords){
			return Ht::select()->orderBy('id','desc')->paginate(20);
		} else {
			return Ht::where('ftname','like',"%$keywords%")->select()->orderBy('id','desc')->paginate(20);
		}
	}

	/**
	 * 获取话题模糊查询的列表
	 * @param $like
	 * @param $key
	 * @param int $num
	 * @return mixed
	 */
	public static  function getHtTagsLike($like,$key,$num=10){
		$redisKey = 'qls_pc_ht_tagsLike_'.$key.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Ht::where('tags','like',$like)
			->select('id','ftname','ftpic','pictitle','picurl','filename','tags','descriptions')
			->orderBy('id','desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 获取话题列表
	 * @param string $order
	 * @param int $num
	 * @return mixed
	 */
	public static function getList($order='id',$num = 10){
		$redisKey = 'qls_pc_ht_list_'.$order.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Ht::select('id','ftname','ftpic','pictitle','picurl','filename')
			->orderBy($order,'desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 根据条件查询话题
	 * @param $field 查询的字段
	 * @param $val 查询的值
	 * @param string $order 排序字段
	 * @param int $num 查询数量
	 * @return mixed
	 */
	public static function getHtCondition($field,$val,$order = 'id',$num=10){
		$redisKey = 'qls_pc_ht_'.$field.'_'.$val.'_'.$order;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Ht::where($field,'=',$val)->select('id','ftname','ftpic','pictitle','picurl','filename','content')
			->orderBy($order,'desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * 获取话题分页
	 * @param $currentPage
	 * @return mixed
	 */
	public static function getHtpage($currentPage){
		$redisKey = 'qls_pc_ht_page_'.$currentPage;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$count = ($currentPage-1)*30;
		$data = Ht::select('id','ftname','ftpic','filename')->orderBy('id','desc')->skip($count)->take(30)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	public static function getDetail($index){
		$redisKey = 'qls_pc_ht_detail_'.$index;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$data = Ht::where('filename','=',$index)->first();
		if(!$data) App::abort(404);
		$data = $data->toArray();
		$ids = trim($data['xgids'],',');
		if($ids) $data['relateNews'] = News::whereRaw('id in ('.$ids.')')->select('id','AddTime','newstitle','content')->get()->toArray();
		Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
		return $data;
	}
}
<?php

class Dynasty extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'dynasty';

	public static function getList(){
		$key = 'qls_pc_dynasty';
		if(Rds::exists($key)) return json_decode(Rds::get($key));
		$data = Dynasty::select('filename','classname')->orderBy('id','desc')->get();
		Rds::set($key,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	public static function getDetail($index){
		$redisKey = 'qls_pc_dynasty_detail_'.$index;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$data = Dynasty::where('filename','=',$index)->first();
		if(!$data) App::abort(404);
		$data = $data->toArray();
		$emperor = Person::where('dyid','=',$data['id'])->select('rwsmallpic','id','rwname','filename','tags')->get();
		if($emperor) $data['emperor'] = $emperor->toArray();
		$data['relateNews'] = News::where('dyid','=',$data['id'])->select('id','newstitle','AddTime')->take(50)->orderBy('id','desc')->get()->toArray();
		Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
		return $data;
	}
}
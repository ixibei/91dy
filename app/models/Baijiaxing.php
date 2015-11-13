<?php

class Baijiaxing extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'baijiaxing';

	public static function getBaijiaxing($keywords = '') {
		if(!$keywords){
			return Baijiaxing::select()->orderBy('id','desc')->paginate(20);
		} else {
			return Baijiaxing::where('xing','like',"%$keywords%")->select()->orderBy('id','desc')->paginate(20);
		}
	}

	/**
	 * @param $arr 26个英文字母
	 * @return array|mixed
	 */
	public static  function getList(&$arr){
		$redisKey = 'qls_pc_baijiaxing';
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$where = $keys = '';
		$i = 0;
		$return = array();
		foreach($arr as $val){
			$where .= " zm='$val' or";
			$keys .= $val;
			if($i % 3 == 2 || $val == 'E' || $val == 'S' || $val == 'G' || $val == 'Y' || $val == 'Z'){
				$where = trim($where,'or');
				$return[$keys] = Baijiaxing::whereRaw($where,array())
					->select('id','xing','zm','pinyin','pic','fbdq')
					->orderBy('hits','desc')->get()->toArray();
				$where = $keys = '';
				$i=-1;
			}
			$i++;
		}
		Rds::set($redisKey,json_encode($return),Config::get('redis.expire'),'s');
		return $return;
	}

	public static function getDetail($id){
		$redisKey = 'qls_pc_baijiaxing_detail_'.$id;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Baijiaxing::where('id','=',$id)->first();
		if(!$data) App::abort(404);
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}
}
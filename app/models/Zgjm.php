<?php

class Zgjm extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'zgjm';

	/**
	 * 根据条件查询周公解梦
	 * @param $field 查询的字段
	 * @param $val 查询的值
	 * @param string $order 排序字段
	 * @param int $num 查询数量
	 * @return mixed
	 */
	public static function getZgjm($field,$val,$order = 'id',$sort = 'desc',$signal = '=',$num=10){
		$redisKey = 'qls_pc_zgjm_'.$field.'_'.$val.'_'.$order.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Zgjm::where($field,$signal,$val)->select('id','jmpic','jmtitle','tags','jmcon','jmtitle','jmtitle')
			->orderBy($order,$sort)->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}
}
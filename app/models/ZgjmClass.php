<?php

class ZgjmClass extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'zgjm_class';


	/**
	 * ����������ѯ�ܹ�����
	 * @param $field ��ѯ���ֶ�
	 * @param $val ��ѯ��ֵ
	 * @param string $order �����ֶ�
	 * @param int $num ��ѯ����
	 * @return mixed
	 */
	public static function getZgjmClass($field,$val,$order = 'id',$sort = 'desc',$signal = '=',$num=10){
		$redisKey = 'qls_pc_zgjm_'.$field.'_'.$val.'_'.$order.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = ZgjmClass::where($field,$signal,$val)->select('id','classname','filename')
			->orderBy($order,$sort)->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}
}
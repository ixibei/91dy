<?php

class Zgjm extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'zgjm';

	/**
	 * ����������ѯ�ܹ�����
	 * @param $field ��ѯ���ֶ�
	 * @param $val ��ѯ��ֵ
	 * @param string $order �����ֶ�
	 * @param int $num ��ѯ����
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
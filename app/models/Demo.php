<?php

class Demo extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'yszt';

	public static function getDemo($keywords){
		if(!$keywords){
			return Demo::select()->orderBy('id','desc')->paginate(20);
		} else {
			return Demo::where('ztname','like',"%$keywords%")->select()->orderBy('id','desc')->paginate(20);
		}
	}

	public static function getList($num = 13){
		$redisKey = 'qls_pc_demo';
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Demo::select('ztname','filename','ysztbigpic','ysztsmallpic','tags','content','AddTime','hits','tj')->orderBy('id','desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * ��ȡӰ��ר�������б�
	 * @param $field ��ѯ����
	 * @param $val ��ѯֵ
	 * @param string $order �����ֶ�
	 * @param int $num ��ѯ����
	 * @param string $signal ��ѯ����
	 * @return mixed
	 */
	public static function getYszt($field,$val,$order='id',$num=10,$signal = '='){
		$redisKey = 'qls_pc_demo_'.$field.'_'.$val.'_'.$order.'_'.$num.'_'.$signal;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Demo::where($field,$signal,$val)->select('ztname','filename','ysztbigpic','ysztsmallpic','tags','content','AddTime','hits','tj')->orderBy($order,'desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	public static function getDetail($index){
		$redisKey = 'qls_pc_demo_detail_'.$index;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$data = Demo::where('filename','=',$index)->first()->toArray();
		$ids = trim($data['yyids'],',');
		$data['relateRw'] = News::whereRaw('id in ('.$ids.')')->select('newspic','newstitle','AddTime','id')->get()->toArray();
		$ids = trim($data['jqids'],',');
		$data['relateJuqing'] = News::whereRaw('id in ('.$ids.')')->select('newspic','newstitle','AddTime','id')->get()->toArray();
		$ids = trim($data['xwids'],',');
		$data['relateNews'] = News::whereRaw('id in ('.$ids.')')->select('newspic','newstitle','AddTime','id')->get()->toArray();
		Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
		return $data;
	}
}
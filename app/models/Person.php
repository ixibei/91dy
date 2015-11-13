<?php

class Person extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'm_person';

	public static function getPerson($keywords){
		if(!$keywords){
			return Person::orderBy('sort','desc')->orderBy('id','desc')->paginate(20);
		} else {
			return Person::where('name','like',"%$keywords%")->orderBy('sort','desc')->orderBy('id','desc')->paginate(20);
		}
	}

	/**
	 * ����������ѯ�����б�
	 * @param $where String ��ѯ������
	 * @param $key String �����key
	 * @param int|string $id int ����ǲ�ѯ�ض�id�µ��������
	 * @param $num int ��ѯ������
	 * @param $type String ��ѯ������
	 * @return mixed
	 */
	public static function getDynastyPerson($where,$key = '',$id = '',$num = 40,$type = 'hits'){
		$key = $id ? $id : $key;
		$redisKey = 'qls_pc_person_dynasty_'.$type.'_'.$key.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Person::whereRaw($where,array())
			->select('id','rwname','filename','rwbigpic','rwsmallpic','tags','content','AddTime','hits','tj','dyid')
			->orderBy($type,'desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * ��ȡ���������
	 * @param $index �ļ�����
	 * @return mixed
	 */
	public static function getDetail($index){
		$redisKey = 'qls_pc_person_detail_'.$index;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$data = Person::where('rw.filename','=',$index)->leftJoin('dynasty as D','D.id','=','rw.dyid')->select('rw.*','D.classname','D.filename as DFilename')->first();
		if(!$data) App::abort(404);
		$data = $data->toArray();
		$ids = trim($data['xgids'],',');
		if($ids) $data['relatePerson'] = Person::whereRaw('id in ('.$ids.')',array())->select('rwname','filename')->orderBy('id','desc')->get()->toArray();
		$arr = array('memoid1','memoid2','memoid3','memoid4','memoid5');
		foreach($arr as $key=>$val){
			$ids = trim($data[$val],',');
			if($ids) $data['relateNews'.($key+1)] = News::whereRaw('id in ('.$ids.')')->select('id','AddTime','newstitle')->orderBy('id','desc')->get()->toArray();
		}
		$data['likeNews'] = News::getCategoryNews('%'.$data['rwname'].'%','newstitle',35,'id','like');//�ؼ���ģ������
		$data['likeNews'] = $data['likeNews']->toArray();

		Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * ��ĸ��ͷ��ص�����
	 * @param $name
	 * @param $dyid
	 * @return mixed
	 */
	public static function getRelatePerson($name,$dyid = ''){
		$word = $dyid ? $name : substr($name,0,1);
		$redisKey = 'qls_pc_person_relate_'.$word;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		if(!$dyid){
			$data = Person::where('filename','like',$word.'%')->select('rwname','filename')->orderBy('id','desc')->get();
		} else {
			$data = Person::getDynastyPerson('dyid='.$dyid,'',$dyid,1000,'dyid');
		}
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

	/**
	 * �����������ֽ���ģ����ѯ
	 * @param $keyword
	 * @param int $num
	 * @return array|mixed
	 */
	public static function getLikePerson($keyword,$num = 4,$field = 'rwname'){
		$redisKey = 'qls_pc_person_like_'.$keyword.'_'.$num.'_'.$field;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
		$data = Person::where($field,'like','%'.$keyword.'%')->select('rwname','filename','rwbigpic','rwsmallpic')->orderBy('id','desc')->take($num)->get();
		if($data) $data = $data->toArray();
		if(count($data)<4){
			$extra = Person::select('rwname','filename','rwbigpic','rwsmallpic')->orderBy('hits','desc')->take(4)->get()->toArray();
			$data = array_merge($data,$extra);
		}
		Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
		return $data;
	}

}
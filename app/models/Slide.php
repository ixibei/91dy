<?php

class Slide extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'focus';

	/**
	 * 后台幻灯片获取
	 * @param $keywords
	 * @param $cid
	 * @param $isParent
	 * @return mixed
	 */
	public static function getFocus($keywords,$cid,$isParent){
		$where = '1=1';
		$arr = array();
		if($keywords) {
			$keywords = "%$keywords%";
			$where .= ' and focus.ftitle like ? ';
			array_push($arr,$keywords);
		}
		if($cid){
			if($isParent == 'all' && $ids = SlideClass::select('id')->where('cid','=',$cid)->get()->toArray()){
				$id = '';
				foreach($ids as $key=>$val){
					$id .= $val['id'].',';
				}
				$id = trim($id,',');
				$where .= " and focus.fclass in ($id)";
			} else{
				$where .= ' and focus.fclass = ? ';
				array_push($arr,$cid);
			}
		}
		return Slide::whereRaw($where,$arr)
			->select('focus.*','C.classname')
			->leftJoin('focus_class as C','focus.fclass','=','C.id')
			->orderBy('focus.id','desc')->paginate(20);
	}

	/**
	 * @param $cid 幻灯片分类id
	 * @param $num
	 * @return mixed
	 */
	public static function getCategorySlide($cid,$num){
		$redisKey = 'qls_pc_slide_'.$cid.'_'.$num;
		if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey));
		$data = Slide::where('fclass','=',$cid)->select('id','spic','bpic','furl','ftitle','fclass','intro','addtime')->orderBy('id','desc')->take($num)->get();
		Rds::set($redisKey,$data,Config::get('redis.expire'),'s');
		return $data;
	}

}
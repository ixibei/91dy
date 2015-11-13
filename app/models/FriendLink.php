<?php

class FriendLink extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'friend_link';

	/**
	 * 后台获取友情链接列表
	 * @param $keywords|'' string  要插入的关键词
	 * @param $isAll|false int 选择的类型
	 * @return mixed
	 */
	public static function getFriendLink($keywords,$isAll){
		if(!$keywords && $isAll === false){
			return FriendLink::select()->orderBy('sort','desc')->orderBy('id','desc')->paginate(20);
		} else {
			if($keywords && $isAll === false)
				return FriendLink::where('name','like',"%$keywords%")->select()->orderBy('sort','desc')->orderBy('id','desc')->paginate(20);
			elseif($keywords && $isAll !== false)
				return FriendLink::where('name','like',"%$keywords%")
					->where(function($query,$isAll = 0){
						$query->where('is_all','=',$isAll)
							->orWhere('is_all','=','2');
					})
					->select()->orderBy('sort','desc')
					->orderBy('id','desc')->paginate(20);
			else
				return FriendLink::where('is_all','=',$isAll)->orWhere('is_all','=','2')->select()->orderBy('sort','desc')->orderBy('id','desc')->paginate(20);
		}
	}

	/**
	 * 获取友情链接列表
	 */
	public static function getList(){
		$key = 'qls_pc_friendLink';
		if(Rds::exists($key)) return json_decode(Rds::get($key));
		$data =  FriendLink::where('is_all','=',0)->orWhere('is_all','=',2)->select('url','name')->get();
		Rds::set($key,$data,Config::get('redis.expire'),'s');
		return $data;
	}

}
<?php

class FriendLink extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'friend_link';

	/**
	 * ��̨��ȡ���������б�
	 * @param $keywords|'' string  Ҫ����Ĺؼ���
	 * @param $isAll|false int ѡ�������
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
	 * ��ȡ���������б�
	 */
	public static function getList(){
		$key = 'qls_pc_friendLink';
		if(Rds::exists($key)) return json_decode(Rds::get($key));
		$data =  FriendLink::where('is_all','=',0)->orWhere('is_all','=',2)->select('url','name')->get();
		Rds::set($key,$data,Config::get('redis.expire'),'s');
		return $data;
	}

}
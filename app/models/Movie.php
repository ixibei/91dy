<?php

class Movie extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'm_movie';

	/**
	 * @param string $keywords �����ؼ���
	 * @return object
	 */
	public static function getMovie($keywords = ''){
		if(!$keywords){
			return Movie::orderBy('sort','desc')->orderBy('id','desc')->paginate(20);
		} else {
			return Movie::where('name','like',"%$keywords%")->orderBy('sort','desc')->orderBy('id','desc')->paginate(20);
		}
	}
}
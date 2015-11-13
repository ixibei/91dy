<?php

class Keyword extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'keyword';

	public static function getKeywords($keywords){
		if(!$keywords){
			return Keyword::select()->orderBy('id','desc')->paginate(20);
		} else {
			return Keyword::where('keyword','like',"%$keywords%")->select()->orderBy('id','desc')->paginate(20);
		}
	}

}
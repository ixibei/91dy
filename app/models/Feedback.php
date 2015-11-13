<?php

class Feedback extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'feedback';

	public static function getFeedback($keywords){
		if(!$keywords){
			return Feedback::select()->orderBy('id','desc')->paginate(20);
		} else {
			return Feedback::where('content','like',"%$keywords%")->select()->orderBy('id','desc')->paginate(20);
		}
	}

}
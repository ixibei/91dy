<?php

class Feedback extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'feedback';

	public static function getFeedback($keywords){
		if(!$keywords){
			return Feedback::select()->orderBy('id','desc')->paginate(20);
		} else {
			return Feedback::where('content','like',"%$keywords%")->select()->orderBy('id','desc')->paginate(20);
		}
	}

}
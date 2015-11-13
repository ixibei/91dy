<?php

class Poem extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	protected $table = 'poetry';

	public static function getPoem($keywords){
		if(!$keywords){
			return Poem::select()->orderBy('id','desc')->paginate(20);
		} else {
			return Poem::where('Poetryname','like',"%$keywords%")->select()->orderBy('id','desc')->paginate(20);
		}
	}

}
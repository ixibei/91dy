<?php

class Chengyu extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//������create_at �� update_at�����ֶ�
	protected $table = 'chengyu';

}
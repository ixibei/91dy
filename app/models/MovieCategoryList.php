<?php

class MovieCategoryList extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	public $fileable = array('movie_id','category_id');
	protected $table = 'm_movie_category_list';


	public static function getCategoryMovie($id,$num = 4,$skip = 0){
		$data = MovieCategoryList::select('movie_id')->where('category_id','=',$id)->orderBy('movie_id','desc')->take($num)->skip($skip)->orderBy('movie_id','desc')->get();
		$return = array();
		if($data){
			foreach($data as $val){
				$return[] = Movie::where('id','=',$val->movie_id)->first();
			}
		}
		return $return;
	}
}
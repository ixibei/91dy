<?php

class MovieCategoryList extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//不适用create_at 和 update_at两个字段
	public $fileable = array('movie_id','category_id');
	public $num = 20;
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

	public static function getMovie($category_id,$country,$year,$mingxing,$currentPage){
		$num = 20;
		$start = ($currentPage-1)*$num;
		$field = 'M.name,M.release_time,M.id';
		$where = 'L.category_id='.$category_id;
		$leftJoin = 'left join m_movie as M on L.movie_id=M.id';
		if($country) $where .= " and M.country_id=$country";
		if($year) $where .= ' and M.release_time>='.strtotime($year);
		if($mingxing){
			$where .= ' and MP.person_id=$mingxing';
			$leftJoin .= ' left join m_movie_person as MP on MP.movie_id=L.movie_id';
		}
		$sql = "select count(*) as count from m_movie_category_list as L $leftJoin where $where";
		$count = DB::select($sql);
		$data['count'] = $count[0]->count;
		$sql = "select $field from m_movie_category_list as L $leftJoin where $where order by release_time asc limit $start,$num ";
		$data['data'] = DB::select($sql);
		return $data;
	}

}
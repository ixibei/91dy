<?php

class MovieCategoryList extends Eloquent {

	/*public static $rules = array(
		'username'=>'required|alpha|min:2',
		'password'=>'required|alpha_num|between:6,12|confirmed',
	);*/

	public $timestamps  = false;//涓嶉�傜敤create_at 鍜� update_at涓や釜瀛楁
	public $fileable = array('movie_id','category_id');
	public $num = 20;
	protected $table = 'm_movie_category_list';


	public static function getCategoryMovie($id,$num = 4,$skip = 0){
		$data = MovieCategoryList::select('movie_id')->where('category_id','=',$id)->orderBy('movie_id','desc')->take($num)->skip($skip)->orderBy('movie_id','desc')->get();
		$return = array();
		if($data){
			foreach($data as $val){
				$movie = Movie::where('id','=',$val->movie_id)->first();
				if($movie) $return[] = $movie;
			}
		}
		return $return;
	}

	/**
	 * @param $category_id 电影的分类
	 * @param $country 电影国家
	 * @param $year 电影的年份
	 * @param $mingxing 电影所属明星
	 * @param $orderBy 按照什么排序 1 点击量 | 2 评分排序 | 3 最新时间排序
	 * @param $currentPage 当前的页数
	 * @return mixed
	 */
	public static function getMovie($category_id,$country,$year,$mingxing,$orderBy,$currentPage){
		$num = 30;
		$orderBy = $orderBy == 1 ? 'hits' : ($orderBy == 2 ? 'score' : 'release_time');
		$start = ($currentPage-1)*$num;
		$field = 'M.name,M.release_time,M.id,M.img,M.play_time,M.intro,M.title,M.director_id,M.score,P.name as director';
		$where = 'M.id!="" and L.category_id='.$category_id;
		$leftJoin = 'left join m_movie as M on L.movie_id=M.id left join m_person as P on P.id=M.director_id';
		$orderBy = 'order by '.$orderBy.' desc';
		$data['breadcrumbs'] = [];
		//按国家查找
		if($country){
			$data['breadcrumbs'][0] = Country::where('id','=',$country)->pluck('name');
			$where .= " and M.country_id=$country";
		}
		//存在按年份查找
		if($year){
			$data['breadcrumbs'][1] = $year;
			$startYear = $year.'-1-1';
			$endYear = ($year+1).'-1-1';
			$where .= ' and M.release_time>='.strtotime($startYear) .' and M.release_time <'.strtotime($endYear);
		}
		//按明星查找
		if($mingxing){
			$data['breadcrumbs'][2] = Person::where('id','=',$mingxing)->pluck('name');
			$where .= " and MP.person_id=$mingxing";
			$leftJoin .= ' left join m_movie_person as MP on MP.movie_id=L.movie_id';
		}
		$sql = "select count(*) as count from m_movie_category_list as L $leftJoin where $where";
		$count = DB::select($sql);
		$data['count'] = $count[0]->count;
		$sql = "select $field from m_movie_category_list as L $leftJoin where $where  $orderBy limit $start,$num ";
		$data['data'] = DB::select($sql);
		return $data;
	}

	/**
	 * @param $country 电影国家
	 * @param $year 电影的年份
	 * @param $mingxing 电影所属明星
	 * @param $orderBy 按照什么排序 1 点击量 | 2 评分排序 | 3 最新时间排序
	 * @param $currentPage 当前的页数
	 * @return mixed
	 */
	public static function getNewsMovie($country,$mingxing,$orderBy,$currentPage){
		$num = 30;
		$orderBy = $orderBy == 1 ? 'hits' : ($orderBy == 2 ? 'score' : 'release_time');
		$start = ($currentPage-1)*$num;
		$field = 'M.name,M.release_time,M.id,M.img,M.play_time,M.intro,M.title,M.director_id,M.score,P.name as director';
		$where = 'M.is_news=1';
		$leftJoin = 'left join m_person as P on P.id=M.director_id';
		$orderBy = 'order by M.'.$orderBy.' desc';
		$data['breadcrumbs'] = [];
		//按国家查找
		if($country){
			$data['breadcrumbs'][0] = Country::where('id','=',$country)->pluck('name');
			$where .= " and M.country_id=$country";
		}
		//按明星查找
		if($mingxing){
			$data['breadcrumbs'][2] = Person::where('id','=',$mingxing)->pluck('name');
			$where .= " and MP.person_id=$mingxing";
			$leftJoin .= ' left join m_movie_person as MP on MP.movie_id=M.id';
		}
		$sql = "select count(*) as count from m_movie as M $leftJoin where $where";
		$count = DB::select($sql);
		$data['count'] = $count[0]->count;
		$sql = "select $field from m_movie as M $leftJoin where $where  $orderBy limit $start,$num ";
		$data['data'] = DB::select($sql);
		return $data;
	}
}
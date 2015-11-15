<?php

class MovieController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function detail($id){
        $view = 'movie.detail';
        $data['detail'] = Movie::where('id','=',$id)->firstOrFail();
        return $this->_cacheView($view,$data);
    }

    public function play($id){
        $view = 'movie.play';
        $data['newsMovie'] =  Movie::where("is_news",'=',1)->where('add_time','>',time()-86400*30)->where('status','=',1)->orderBy('id','desc')->take(12)->get();//最新电影
        $data['detail'] = Movie::where('id','=',$id)->firstOrFail();
        $data['category'] = MovieCategoryList::select('MC.url','MC.name')->where('movie_id','=',$data['detail']->id)->leftJoin('m_movie_category as MC','MC.id','=','m_movie_category_list.category_id')->first();
        return $this->_cacheView($view,$data);
    }
}
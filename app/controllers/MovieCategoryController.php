<?php

class MovieCategoryController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index($url,$country = 0,$year = 0,$mingxing = 0,$orderBy = 1,$currentPage = 1){
        $view = 'movieCategory.index';
        $data['param'] = [$country,$year,$mingxing,$orderBy,$currentPage];
        $data['catList'] = MovieCategory::where('status','=',1)->orderBy('sort','desc')->orderBy('id','desc')->get();//分类列表
        $data['country'] = Country::where('status','=',1)->orderBy('sort','desc')->orderBy('id','desc')->get();//国家列表
        $data['mingxing'] = Person::where('status','=',1)->orderBy('sort','desc')->orderBy('id','desc')->get();//明星列表
        if($url == 'news'){
            $data['catInfo'] = ['name'=>'最新','url'=>'news'];
            $data['count'] = 12;
        } else {
            $data['catInfo'] = MovieCategory::where('url','=',$url)->firstOrFail()->toArray();
            $detail = MovieCategoryList::getMovie($data['catInfo']['id'],$country,$year,$mingxing,$orderBy,$currentPage);//多重条件查询
            $data['count'] = $detail['count'];
            $data['data']  = $detail['data'];
            $data['breadcrumbs'] = $detail['breadcrumbs'];
        }
        return $this->_cacheView($view,$data);
    }

    public function category($currentPage = 1){
        $view = 'movieCategory.index';
        $data = array();
        return $this->_cacheView($view,$data);
    }

    public function detail($id){
        $view = 'movieCategory.index';
        $data = array();
        return $this->_cacheView($view,$data);
    }
}
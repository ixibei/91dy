<?php

class HomeController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $view = 'home.index';
        $arr = [
            [5,4],//科幻
            [1,12],//爱情
            [22,12],//感人
            [2,10],//喜剧
            [3,10],//动画片
            [4,10],//剧情
            [6,10],//动作
            [7,10],//经典
        ];
        foreach($arr as $val){
            $data['category'.$val[0]] = MovieCategoryList::getCategoryMovie($val[0],$val[1]);
        }
        return $this->_cacheView($view,$data);
    }

}
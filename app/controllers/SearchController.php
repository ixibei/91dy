<?php

class SearchController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index($keyword,$currentPage = 1) {
        $count = News::where('newstitle','like','%'.$keyword.'%')->count();
        $data['pages'] = NewsClass::getPages($count,$currentPage,'search/'.$keyword,30);
        $data['keyword'] = $keyword;
        $data['currentPage'] = $currentPage;
        $data['nav'] = NewsClass::getNav();//导航列表
        $data['arr'] = array(23,24,25,26,28,29);//右边侧边栏 最新更新
        $seo = $this->getSeo(29);//seo优化信息
        return $this->_cacheView('search.index',$data,'',$seo);
    }
}
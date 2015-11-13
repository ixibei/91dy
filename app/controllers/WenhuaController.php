<?php

class WenhuaController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $view = 'wenhua.index';
        if($html = $this->hasHtml($view)) return $html;

        //左侧图片推荐的上下五个位置
        $arr = array(array(10,7),array(11,1),array(12,1),array(13,1),array(14,1));
        foreach($arr as $val){
            $data['slide'.$val[0]] = Slide::getCategorySlide($val[0],$val[1]);
        }

        //中间所有的内容
        $arr = array(array(18,'nclassid',4,'tj'),array(19,'nclassid',4,'tj'),array(21,'nclassid',5,'tj'),array(29,'classid',15,'id'),array(1,'twtj',8,'id'));
        foreach($arr as $val){
            $data['newsCategory'.$val[0].$val[1]] = News::getCategoryNews($val[0],$val[1],$val[2],$val[3]);
        }
        $data['newsCategory18NclassidTjAsc']  = News::getCategoryNews(18,'nclassid',10,'tj','=','asc');
        $data['newsCategory18NclassidHitsDesc']  = News::getCategoryNews(18,'nclassid',10,'hits');
        $data['newsCategory19NclassidIdDesc']  = News::getCategoryNews(19,'nclassid',10,'id');
        $data['newsCategory30NclassidIdDesc']  = News::getCategoryNews(30,'nclassid',10,'id');
        $data['newsCategory31NclassidIdDesc']  = News::getCategoryNews(31,'nclassid',10,'id');
        $data['newsCategory21NclassidIdDesc']  = News::getCategoryNews(21,'nclassid',10,'id');

        $data['nav'] = NewsClass::getNav();//导航列表
        $seo = $this->getSeo(29);//seo优化信息
        return $this->_cacheView($view,$data,'',$seo);
    }
}
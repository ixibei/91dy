<?php

class OldPictureController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $view = 'pic.index';
        if($html = $this->hasHtml($view)) return $html;

        $data['slide44'] = Slide::getCategorySlide(44,5);
        //五大栏目
        $arr = array(array(27,'classid'),array(65,'nclassid'),array(59,'nclassid'),array(60,'nclassid'),array(61,'nclassid'));
        foreach($arr as $key=>$val){
            $data['newsCategory'.$val[0].$val[1]]  = News::getCategoryNews($val[0],$val[1],21,'AddTime');
            $data['newsCategory'.$val[0].'Count'] = News::where($val[1],'=',$val[0])->count();
        }

        $seo = $this->getSeo(27);//seo优化信息
        return $this->_cacheView($view,$data,'',$seo);
    }

    public function category($currentPage = 1){
        $view = 'pic.category';
        $index = trim($_SERVER['REQUEST_URI'],'/');//文件索引
        if(strpos($index,'/')) $index = substr($index,0,strpos($index,'/'));
        $nav = NewsClass::where('filename','=',$index)->select('id','classname','filename')->first();//导航分类id 名称
        if(!$nav) App::abort(404);
        if($html = $this->hasHtml($view.'.'.$nav->id.'.'.$currentPage)) return $html;

        $data['nav'] = $nav;
        $type = $nav->id == 27 ? 'classid' : 'nclassid';
        $data['newsList'] = NewsClass::getCategoryPicList($nav->id,$currentPage,$type,'AddTime');
        //分页

        $count = News::where($type,'=',$nav->id)->count();
        $data['pages'] = NewsClass::getPages($count,$currentPage,$index);

        $seo = $this->getSeo($nav->id);//seo优化信息
        return $this->_cacheView($view,$data,'.'.$nav->id.'.'.$currentPage,$seo);

    }
}
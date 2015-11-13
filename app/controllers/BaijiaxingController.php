<?php

class BaijiaxingController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'baijiaxing.index';
        if($html = $this->hasHtml($view)) return $html;
        $data['twentySixLetter'] = $this->twentySixLetter;//26个英文字母
        $data['newsCategory44'] = News::getCategoryNews(44,'nclassid',6);
        $seo = $this->getSeo(42);
        return $this->_cacheView($view,$data,'',$seo);
    }

    public function category($currentPage = 1){
        $view = 'baijiaxing.category';
        $index = str_replace('baijiaxing/','',trim($_SERVER['REQUEST_URI'],'/'));//文件索引
        if(strpos($index,'/')) $index = substr($index,0,strpos($index,'/'));
        $nav = NewsClass::where('filename','=',$index)->select('id','classname','filename')->first();//导航分类id 名称
        if(!$nav) App::abort(404);
        $classid = $nav['id'];
        if($html = $this->hasHtml($view.'.'.$classid.'.'.$currentPage)) return $html;

        $data['selfInfo'] = $nav;
        $data['currentPage'] = $currentPage;
        //获取分页
        $count = News::where('nclassid','=',$classid)->count();
        $data['pages'] = NewsClass::getPages($count,$currentPage,'baijiaxing/'.$index);

        $seo = $this->getSeo($nav->id);//seo优化信息
        return $this->_cacheView($view,$data,'.'.$classid.'.'.$currentPage,$seo);
    }

    public function detail($id){
        $view = 'baijiaxing.detail';
        if($html = $this->hasHtml($view)) return $html;
        $data['detail'] = Baijiaxing::getDetail($id);
        $str = "{$data['detail']->xing}姓_姓{$data['detail']->xing}的名人_{$data['detail']->xing}姓起源_{$data['detail']->xing}姓家谱_{$data['detail']->xing}姓起名-百家姓-趣历史";
        $seo = array('Tilte'=>$str,'Keywords'=>$str,'Descriptions'=>$str);
        return $this->_cacheView($view,$data,'.detail.'.$id,$seo);
    }
}
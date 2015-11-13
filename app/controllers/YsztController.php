<?php

class YsztController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'yszt.index';
        if($html = $this->hasHtml($view)) return $html;
        $data['tj'] = Demo::getYszt('tj',1,'id',1);
        $data['intro'] = explode('<hr style="page-break-after:always;" class="ke-pagebreak" />',$data['tj'][0]->content);
        $data['nav'] = NewsClass::getNav();//导航列表
        $seo = array('Tilte'=>'影视专题_热门影视剧专题_古装影视剧最新资讯 - 趣历史','Keywords'=>'影视专题,热门影视剧,影视剧最新资讯','Descriptions'=>'趣历史影视专题,提供最新最热的历史剧新闻，影视专题主要包括历史剧的演员表剧情介绍及电视剧人物的历史原型介绍，影视专题为你打造影视剧知识大全。');
        return $this->_cacheView($view,$data,'',$seo);
    }

    public function detail($index,$type = 'index'){
        $view = 'yszt.detail';
        $data['detail'] = Demo::getDetail($index);//人物详情
        DB::statement('update yszt set hits=hits+1 where id='.$data['detail']['id']);//点击量加1
        $data['intro'] = explode('<hr style="page-break-after:always;" class="ke-pagebreak" />',$data['detail']['content']);
        if(count($data['intro']) < 3) $data['intro'] = explode('<hr class="ke-pagebreak" style="page-break-after:always;" />',$data['detail']['content']);
        $data['index'] = $index;
        $data['type'] = $type;
        if($html = $this->hasHtml($view.'.'.$index.'.'.$type)) return $html;
        return $this->_cacheView($view,$data,'.'.$index.'.'.$type);
    }

}
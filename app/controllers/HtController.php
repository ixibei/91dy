<?php

class HtController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index($currentPage=1){
        $view = 'ht.index';
        if($html = $this->hasHtml($view.'.'.$currentPage)) return $html;

        $data['count'] = Ht::count();
        $data['nav'] = NewsClass::getNav();//导航列表
        $data['currentPage'] = $currentPage;
        $data['pages'] = NewsClass::getPages($data['count'],$currentPage,'huati',30);
        $seo = array('Tilte'=>'历史话题_历史专题汇_今日历史热点话题_中外热门历史话题 - 趣历史','Keywords'=>'历史话题,历史专题,历史上的热门事件,著名的历史话题','Descriptions'=>'趣历史历史话题，旨在为您全面整理历史上一系列的热点大事件，为网友全面地解读从古至今著名的历史事件及历史人物');
        return $this->_cacheView($view,$data,'.'.$currentPage,$seo);
    }


    /**
     * 人物详情接口
     * @param $name
     * @return bool|mixed
     */
    public function detail($name) {
        $view = 'ht.detail';
        $data['detail'] = Ht::getDetail($name);//人物详情
        DB::statement('update ht set hits=hits+1 where id='.$data['detail']['id']);//点击量加1
        if($html = $this->hasHtml($view.'.'.$name)) return $html;
        return $this->_cacheView($view,$data,'.'.$name);
    }
}
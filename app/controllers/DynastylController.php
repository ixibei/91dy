<?php

class DynastyController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function detail() {
        $index = trim($_SERVER['REQUEST_URI'],'/');
        $view = 'dynasty.detail';
        $data['detail'] = Dynasty::getDetail($index);//人物详情
        DB::statement('update dynasty set hits=hits+1 where id='.$data['detail']['id']);//点击量加1
        if($html = $this->hasHtml($view.'.'.$index)) return $html;

        $data['nav'] = NewsClass::getNav();//导航列表
        $seo = array('Tilte'=>$data['detail']['Tilte'],'Keywords'=>$data['detail']['Keywords'],'Descriptions'=>$data['detail']['Descriptions']);
        return $this->_cacheView($view,$data,'.'.$index,$seo);
    }

}
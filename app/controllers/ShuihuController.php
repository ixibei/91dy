<?php

class ShuihuController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'shuihu.index';
        if($html = $this->hasHtml($view)) return $html;
        $data['ht'] = Ht::where('tags','like','%水浒%')->orWhere('tags','like','%梁山%')->select('filename','ftpic','ftname')->orderBy('id','desc')->first();
        $data['hdp'] = Slide::where('fclass','=','43')->orderBy('id','desc')->first();
        $data['twentySixLetter'] = $this->twentySixLetter;
        return $this->_cacheView($view,$data);
    }

    public function search($type = ''){
        //关键词查询
        if(!$type){
            $keyword = Input::get('skey');
            $data['detail'] = Person::where('rwname','like','%'.$keyword.'%')->where('tags','like','%水浒传%')->select('rwsmallpic','filename','rwname')->orderBy('id','desc')->get()->toArray();
        } else {
            $letters = strtolower($type);
            $data['keyword'] = $type.'开头的美女';
            $data['detail'] = Person::where('filename','like',$type.'%')->where('tags','like','%水浒传%')->select('rwsmallpic','filename','rwname')->orderBy('id','desc')->get()->toArray();
        }
        return $this->_cacheView('shuihu.search',$data);
    }

}
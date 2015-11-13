<?php

class BeautyController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'beauty.index';
        if($html = $this->hasHtml($view)) return $html;
        $data['twentySixLetter'] = $this->twentySixLetter;
        return $this->_cacheView($view,$data);
    }

    public function search($type = ''){
        //关键词查询
        if(!$type){
            $keyword = Input::get('skey');
            $data['keyword'] = '搜索：'.$keyword;
            $data['detail'] = Person::where('rwname','like','%'.$keyword.'%')->select('rwsmallpic','filename','rwname')->orderBy('id','desc')->get()->toArray();
        } else {
            $flag = is_numeric($type);
            //字母查找
            if(!$flag){
                $letters = strtolower($type);
                $data['keyword'] = $type.'开头的美女';
                $data['detail'] = Person::where('filename','like',$type.'%')->select('rwsmallpic','filename','rwname')->orderBy('id','desc')->get()->toArray();
            } else{
                $data['detail'] = Person::where('dyid','=',$type)->select('rwsmallpic','filename','rwname')->orderBy('id','desc')->get()->toArray();
                $data['keyword'] = Dynasty::where('id','=',$type)->pluck('classname');
                $data['keyword'] .= '美女';
            }
        }
        return $this->_cacheView('beauty.search',$data);
    }

}
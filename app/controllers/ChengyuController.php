<?php

class ChengyuController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'chengyu.index';
        if($html = $this->hasHtml($view)) return $html;
        $data['twentySixLetter'] = $this->twentySixLetter;
        return $this->_cacheView($view,$data);
    }

    public function category($category){
        $view = 'chengyu.category';
        $len = strlen($category);
        //非字母查找
        if($len != 1){
            $data['detail'] = ChengyuClass::where('filename','=',$category)->first();
            if(!$data['detail']) App::abort(404);
        } else {
            $data['letters'] = $category;
        }
        if($html = $this->hasHtml($view.'.'.$category)) return $html;
        $data['twentySixLetter'] = $this->twentySixLetter;
        return $this->_cacheView($view,$data,'.'.$category);
    }

    /**
     * 人物详情接口
     * @param $name
     * @return bool|mixed
     */
    public function detail($id) {
        $view = 'chengyu.detail';
        DB::statement('update chengyu set hits=hits+1 where id='.$id);//点击量加1
        if($html = $this->hasHtml($view.'.'.$id)) return $html;
        $data['detail'] = Chengyu::where('id','=',$id)->first();
        $first = mb_substr($data['detail']->chengyu,0,1,'utf-8');
        $end = mb_substr($data['detail']->chengyu,-1,1,'utf-8');
        $data['jielongFirst'] = Chengyu::where('chengyu','like',''.$first.'%')->where('id','!=',$id)->select('id','chengyu')->orderBy('id','desc')->get()->toArray(); //成语接龙正接
        $data['jielongEnd'] = Chengyu::where('chengyu','like',''.$end.'%')->select('id','chengyu')->orderBy('id','desc')->get()->toArray();//成语接龙反接
        $data['twentySixLetter'] = $this->twentySixLetter;
        return $this->_cacheView($view,$data,'.'.$id);
    }

    /**
     * 查找人物
     * @param $keyword
     * @return bool|mixed
     */
    public function search(){
        $view = 'chengyu.search';
        $keyword = Input::get('keyword');
        $data['twentySixLetter'] = $this->twentySixLetter;
        $data['keyword'] = $keyword;
        $data['detail'] = Chengyu::where('chengyu','like','%'.$keyword.'%')->select('id','chengyu')->orderBy('id','desc')->get()->toArray();
        return $this->_cacheView($view,$data);
    }
}
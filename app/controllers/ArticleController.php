<?php

class ArticleController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    /**
     * @param $page int 分页
     * @return mixed
     */
    public function category($currentPage = 1){
        $view = 'news.category';
        $index = trim($_SERVER['REQUEST_URI'],'/');//文件索引
        if(strpos($index,'/')) $index = substr($index,0,strpos($index,'/'));
        $nav = NewsClass::where('filename','=',$index)->select('id','classname')->first();//导航分类id 名称
        if(!$nav) App::abort(404);
        $classid = $nav['id'];
        if($html = $this->hasHtml($view.'.'.$classid.'.'.$currentPage)) return $html;

        $data = $this->newsComman();//获取新闻中的一些公共部分
        $data['category'] = $nav;
        $data['headline'] = NewsClass::getHeadline($classid);//获取头条
        $exceptId = $data['headline'] ? $data['headline']['id'] : 0;
        $data['newsCategoryList'] = NewsClass::getCategoryList($classid,$currentPage,$exceptId);//分页内容
        $data['nav'] = NewsClass::getNav();//导航列表

        //获取分页
        $count = News::where(function($query) use ($classid){
            $query->where('classid','=',$classid)
                ->orWhere('nclassid','=',$classid);
        })->where('id','!=',$exceptId)->count();
        $data['pages'] = NewsClass::getPages($count,$currentPage,$index);

        $seo = $this->getSeo($nav->id);//seo优化信息
        return $this->_cacheView($view,$data,'.'.$classid.'.'.$currentPage,$seo);
    }

    /**
     * 新闻详情
     * @param $yearMonth String 年月日
     * @param $id int 文章id
     * @return bool|mixed
     */
    public function detail($yearMonth,$id) {
        $view = 'news.detail';
        $arr = explode('_',$id);
        $id = $arr[0];//文章id
        $page = isset($arr[1]) ? intval($arr[1]) : 1;//当前页数
        DB::statement('update news set hits=hits+1 where id='.$id);//点击量加1
        if($html = $this->hasHtml($view.'.'.$id.'.'.$page)) return $html;

        $data = $this->newsComman();//获取新闻中的一些公共部分

        $data['detail'] = News::getNewsDetail($id,$page);//新闻详情
        $data['nav'] = News::getNewsDetailNav($id,$data['detail']['classid'],$data['detail']['nclassid'],$data['detail']['rwid']);//文章导航
        $data['hotPic'] = News::getCategoryNews($data['detail']['classid'],'classid');//历史热图
        $data['likeRelateNews'] = News::getNewsLike($data['detail']['keywords']);//看过本文的人还看过

        $arr = array(23,24,25,26,28);//热门推荐
        foreach($arr as $val){
            $data['newsCategoryTj'.$val] = News::getCategoryNewsTj($val);
        }

        $data['twentySixLetter'] = $this->twentySixLetter;//26个英文字母
        $data['dynasty'] = Dynasty::getList();//朝代列表
        return $this->_cacheView($view,$data,'.'.$id.'.'.$page);
    }

    /**
     * 新闻分类中的|新闻详情中 最新更新 热门图文 最新排行 三大公共部分
     * @return mixed
     */
    public function newsComman(){
        $arr = array(23,24,25,26,28,29);//最新更新
        foreach($arr as $val){
            $data['newsCategory'.$val] = News::getCategoryNews($val,'classid',11);
        }
        $data['newsTj'] = News::getCategoryNews(1,'tj',3);//热门图文
        $data['newsHitsOrder'] = News::getCategoryNews(0,'id',10,'hits','!=');//最新排行 点击排行
        $data['newsPicOrder'] = News::getCategoryNews(27,'classid',10,'hits');//最新排行 图库排行
        $data['newsHtOrder'] = Ht::getList('hits');//最新排行 专题排行
        return $data;
    }
}
<?php

class PersonController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'person.index';
        if($html = $this->hasHtml($view)) return $html;

        $data['nav'] = NewsClass::getNav();//导航列表
        $data['twentySixLetter']  = $this->twentySixLetter;
        $data['dynasty'] = Dynasty::getList();//朝代列表
        $seo = array('Tilte'=>'风云人物_历史风云人物介绍_中国风云人物排行榜_中外历史人物故事 - 趣历史','Keywords'=>'风云人物,风云人物介绍,中国历代风云人物,历史人物介绍','Descriptions'=>'趣历史风云人物栏目，旨在为您介绍中外历史中的风云人物简介以及人物的生平大事，让我们一起了解活跃在历史中名人');
        return $this->_cacheView($view,$data,'',$seo);
    }


    /**
     * 人物详情接口
     * @param $name
     * @return bool|mixed
     */
    public function detail($name) {
        $view = 'person.detail';
        $data['detail'] = Person::getDetail($name);//人物详情
        DB::statement('update rw set hits=hits+1 where id='.$data['detail']['id']);//点击量加1
        if($html = $this->hasHtml($view.'.'.$name)) return $html;

        $data['newPerson'] = Person::getDynastyPerson('id!=0','newsPerson','',6);//最新人物
        $data['relatePerson'] = Person::getRelatePerson($name);//字母开头其它人物
        $data['detail']['dyid'] = $data['detail']['dyid'] ? $data['detail']['dyid'] : 1;
        $data['relateDynastyPerson'] = Person::getDynastyPerson('dyid='.$data['detail']['dyid'],'',$data['detail']['dyid']);//同朝代其它人物
        $data['nav'] = NewsClass::getNav();//导航列表
        $data['twentySixLetter'] = $this->twentySixLetter;//26个英文字母
        $data['dynasty'] = Dynasty::getList();//朝代列表
        $seo = array('Tilte'=>$data['detail']['title'],'Keywords'=>$data['detail']['keyword'],'Descriptions'=>$data['detail']['descriptions']);
        return $this->_cacheView($view,$data,'.'.$name,$seo);
    }

    /**
     * 查找人物
     * @param $keyword
     * @return bool|mixed
     */
    public function search($keyword){
        $view = 'person.search';
        if($html = $this->hasHtml($view.'.'.$keyword)) return $html;

        //字母方式查找，和朝代方式查找
        if(strlen($keyword) == 1){
            $data['searchTitle'] = strtoupper($keyword).'开头人物列表';
            $data['relatePerson'] = Person::getRelatePerson($keyword);
        } else {
            $dynasty = Dynasty::where('filename','=',$keyword)->select('id','classname')->first();
            $data['relatePerson'] = Person::getRelatePerson($keyword,$dynasty->id);
            $data['searchTitle'] = $dynasty->classname.'人物列表';
        }

        $data['twentySixLetter'] = $this->twentySixLetter;//26个英文字母
        $data['dynasty'] = Dynasty::getList();//朝代列表
        $data['nav'] = NewsClass::getNav();//导航列表
        $seo = $this->getSeo(1);//seo优化信息
        return $this->_cacheView($view,$data,'.'.$keyword,$seo);
    }
}
<?php

class BaseController extends Controller {

    public $isCache = false;//是否打开缓存
    public $action = '';//当前action名称
    public $controller = '';//当前controller
    public $domain = 'http://www.movie.com/';//域名
    protected $prefix = 'qls_pc_v_';//缓存键名前缀
    protected 	$twentySixLetter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','S','Y','Z');

    public function __construct(){
        $this->action = Route::currentRouteAction();
    }

    /**
     * @param $view String 模板文件
     * @param array $data array 数据
     * @param $extraData int|string 可能额外增加的键名补充
     * @param $seo array seo优化信息
     * @return mixed
     */
    protected function _cacheView($view,&$data = array(),$extraData = ''){
        $data['uri'] = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/')+1);
        $views = Response::view($view,$data);
        $key = $this->_parseProfix($view.$extraData);
        Config::get('redis.isCacheView') ? Rds::set($key,substr($views,90),Config::get('redis.expire'),'s') : '';
        return $views;
    }

    protected function getSeo($id){
        $redisKey = 'movie_pc_nav_seo_'.$id;
        if(Rds::exists($redisKey)) return json_decode(Rds::get($redisKey),true);
        $data = NewsClass::where('id','=',$id)->select('Tilte','Keywords','Descriptions')->first()->toArray();
        Rds::set($redisKey,json_encode($data),Config::get('redis.expire'),'s');
        return $data;
    }

    /**
     * 解析缓存key 对应到pc的
     * @param $key
     * @return string
     */
    protected function _parseProfix($key){
        $key = str_replace('.','_',$key);
        return $this->prefix.$key;
    }

    protected function hasHtml($key){
        $key = $this->_parseProfix($key);
        return Rds::exists($key) ? Rds::get($key) : false;
    }
}
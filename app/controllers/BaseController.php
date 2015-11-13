<?php

class BaseController extends Controller {

    public $isCache = false;//�Ƿ�򿪻���
    public $action = '';//��ǰaction����
    public $controller = '';//��ǰcontroller
    public $domain = 'http://www.movie.com/';//����
    protected $prefix = 'qls_pc_v_';//�������ǰ׺
    protected 	$twentySixLetter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','S','Y','Z');

    public function __construct(){
        $this->action = Route::currentRouteAction();
    }

    /**
     * @param $view String ģ���ļ�
     * @param array $data array ����
     * @param $extraData int|string ���ܶ������ӵļ�������
     * @param $isCache bool �Ƿ����ǿ�ƹرջ��棬��ʹ�û������view
     * @return mixed
     */
    protected function _cacheView($view,&$data = array(),$extraData = '',$isCache = true){
        $uri = strpos($_SERVER['REQUEST_URI'],'_') ? substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],'/')) : $_SERVER['REQUEST_URI'];
        $data['uri'] = substr($uri,strrpos($uri,'/')+1);
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
     * ��������key ��Ӧ��pc��
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
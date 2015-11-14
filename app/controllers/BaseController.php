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
     * @param $isCache bool 是否程序强制关闭缓存，不使用缓存这个view
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

    /**
     * 获取分页
     * @param $count int 总条数
     * @param $currentPage 当前页数
     * @param string $index 网站url前缀
     * @param int $num 分页数量
     * @param string $prefix 分页前缀
     * @param string $houzui 分页后缀
     * @return string
     */
    public static function getPages($count,$currentPage,$index='',$param = array(),$num = 30){
        array_pop($param);//去除最后一个元素为分页
        $uri = implode('_',$param);
        $uri .= '_';
        $totalPage = ceil($count/$num);
        $upPage = $downPage = $pages = $hover = '';//上一页 下一页
        $start = $currentPage > $totalPage-4 ? $currentPage-8+($totalPage-$currentPage) : $currentPage-4;//开始页
        $end = $currentPage < 5 ? $currentPage+8-($currentPage-1) : $currentPage+4;//结束页
        if($start < 1) $start = 1;
        if($end > $totalPage) $end = $totalPage;
        if($currentPage == 1) $upPage = 1;
        else $upPage = $currentPage-1;

        if($currentPage == $totalPage) $downPage = $totalPage;
        else	$downPage = $currentPage+1;

        for($i=$start; $i<=$end; $i++){
            if($i == $currentPage){
                $pages .= '<span class="current">'.$i.'</span>';
            } else {
                $pages .= '<a target="_self" '.$hover.' href="/'.$index.$uri.$currentPage.'" title="第'.$i.'页">'.$i.'</a>'."\r\n";
            }
        }
        $html = '<div class="sub-pager-bar">
                <a href="/'.$index.'/'.$uri.$upPage.'" class="next">上一页</a>
                '.$pages.'
                <span>...</span>
                <a href="/'.$index.'/'.$uri.$downPage.'">'.$totalPage.'</a>
                <a href="/'.$index.'/'.$uri.$totalPage.'" class="next">下一页</a>
			</div>';
        return $html;
    }

}
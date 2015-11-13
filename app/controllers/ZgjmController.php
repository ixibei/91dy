<?php

class ZgjmController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'zgjm.index';
        if($html = $this->hasHtml($view)) return $html;
        $seo = array('Tilte'=>'周公解梦_趣历史','Keywords'=>'周公解梦,周公解梦大全,周公解梦查询，免费周公解梦','Descriptions'=>'趣历史为您提供免费周公解梦,周公解梦大全查询,周公解梦查询,周公解梦破解,原版周公解梦,周公解梦梦见蛇,周公解梦梦见怀孕,周公解梦梦见死人等，帮助你分析梦的含义，帮助解答心中的疑惑。');
        return $this->_cacheView($view,$data,'',$seo);
    }

    public function category($currentPage=1){
        $index = str_replace('zgjm/','',trim($_SERVER['REQUEST_URI'],'/'));//文件索引
        if(strpos($index,'/')) $index = substr($index,0,strpos($index,'/'));
        $view = 'zgjm.category';
        if($html = $this->hasHtml($view.'.'.$index.'.'.$currentPage)) return $html;

        $arr = array('jiemenwenhua'=>array('解梦文化','文化','梦境'),
            'jiemenggushi'=>array('解梦故事'),
            'list'=>array('分类解梦'),
            'yuanbanjiemeng'=>array('原版周公解梦','原版','原版'),
        );
        $data['category'] = $arr[$index];
        //解梦故事调用文章
        if($index == 'jiemenggushi') {
            $data['count'] = News::where('nclassid', '=', 53)->count();
            $data['list'] = NewsClass::getCategoryList('53', $currentPage, '0', 30);
            $data['pages'] = NewsClass::getPages($data['count'], $currentPage, 'zgjm/' . $index, 30);
        } else {  //解梦文化，，原版周公解梦
            $data['count'] = Zgjm::where('jmtitle','like','%'.$data['category'][1].'%')->orWhere('jmtitle','like','%'.$data['category'][2].'%')->count();
        }
        $seo = array('Tilte'=>'周公解梦_趣历史','Keywords'=>'周公解梦,周公解梦大全,周公解梦查询，免费周公解梦','Descriptions'=>'趣历史为您提供免费周公解梦,周公解梦大全查询,周公解梦查询,周公解梦破解,原版周公解梦,周公解梦梦见蛇,周公解梦梦见怀孕,周公解梦梦见死人等，帮助你分析梦的含义，帮助解答心中的疑惑。');
        return $this->_cacheView($view,$data,'.'.$index,$seo);
    }

    //看图说梦
    public function categoryKtsm(){
        $index = str_replace('zgjm/','',trim($_SERVER['REQUEST_URI'],'/'));//文件索引
        if(strpos($index,'/')) $index = substr($index,0,strpos($index,'/'));
        $view = 'zgjm.categoryKtsm';
        if($html = $this->hasHtml($view.'.'.$index)) return $html;
        $data['count'] = Zgjm::where('jmpic','!=','')->count();
        return $this->_cacheView($view,$data,'.'.$index);
    }

    //分类解梦
    public function categoryList($id=''){
        $index = str_replace('zgjm/','',trim($_SERVER['REQUEST_URI'],'/'));//文件索引
        if(strpos($index,'/')) $index = substr($index,0,strpos($index,'/'));
        $data['id'] = $id;
        $view = 'zgjm.categoryList';
        if($html = $this->hasHtml($view.'.'.$index.'.'.$id)) return $html;
        return $this->_cacheView($view,$data,'.'.$index.'.'.$id);
    }

    //分类详情
    public function categoryDetail($id){
        $view = 'zgjm.categoryDetail';
        if($html = $this->hasHtml($view.'.'.$id)) return $html;
        $data['detail'] = ZgjmClass::where('id','=',$id)->first();
        $data['count'] = Zgjm::where('jmtitle','like','%'.$data['detail']->classname.'%')->count();
        $data['data'] = Zgjm::where('jmtitle','like','%'.$data['detail']->classname.'%')->select('jmtitle','id')->get();
        return $this->_cacheView($view,$data,'.'.$id);
    }

    public function detail($id){
        $view = 'zgjm.detail';
        DB::statement('update zgjm set hits=hits+1 where id='.$id);//点击量加1
        if($html = $this->hasHtml($view.'.'.$id)) return $html;
        $data['data'] = Zgjm::where('id','=',$id)->first();
        $tags = explode(',',$data['data']->tags);
        $data['relate'] = Zgjm::where('jmtitle','like','%'.trim($tags[0]).'%')->select('jmtitle','id')->take(20)->get();
        return $this->_cacheView($view,$data,'.'.$id);
    }

    public function search(){
        $keyword =  Input::get('skey');
        $data['count'] = Zgjm::where('jmtitle','like','%'.trim($keyword).'%')->count();
        $data['detail']['classname'] = $keyword;
        $data['data'] = Zgjm::where('jmtitle','like','%'.trim($keyword).'%')->select('jmtitle','id')->take(100)->get();
        return $this->_cacheView('zgjm.categoryDetail',$data);
    }
}
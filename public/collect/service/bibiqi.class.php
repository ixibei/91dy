<?php
class bibiqi extends baseCollect{

    private $url = 'http://www.bibiqi.com/dianying/all/';//采集的网址
    private $html = '';//操作采集网页内容的对象
    private $message = '';//错误或者正确信息
    private $insertNum = 0;//插入数据库次数

    /*
     * 初始化数据
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * 获取要采集的信息
     */
    public function getData(){
        for($i = 6; $i<546; $i++){
            if($i == 1){
                $this->pages($this->url);
            } else {
                $url = $this->url.'index_1_1_'.$i.'.html';
                $this->pages($url);
            }
        }
    }

    public function pages($url){
        $this->html = file_get_html($url);
        if(!$this->html) {
           return;
        } else {
            $bd = $this->html->find('ul.list',0);
            foreach ($bd->find('li') as $key=>$val) {
                $aObj = $val->find('a.img_wrap',0);
                $href = $aObj->href;
                $data = $this->getDetail($href);
                if(!$data) continue;
                $this->insertMysql($data);
                $this->insertNum++;
                if($this->insertNum%100 == 0){
                    echo $this->insertNum."\r\n";
                }
            }
        }
    }

    /**
     * 获取电影详情
     * @param $href
     * @return mixed
     */
    public function getDetail($href){
        $href = strpos($href,'http') !== false ? $href : 'http://www.bibiqi.com'.$href;
        $html = file_get_html($href);
        if(!$html) {
            return;
        }
        //播放地址
        $xiguaObj = $html->find('section.xigua',0);
        if(!$xiguaObj) return false;

        $divObj = $xiguaObj->find('div.mlist',0);
        $urlObj = $divObj->find('a',0);
        $url = $urlObj->href;
        $return['url'] = $this->getPlay($url);
        //内容
        $contentObj = $html->find('#content_wrap',0);
        $return['content'] = $contentObj->innertext;
        //封面图片
        $tab1Obj = $html->find('#tab1',0);
        $imgObj = $tab1Obj->find('img',0);
        $return['img'] = $this->_saveImage($imgObj->src,'C_');

        $detailObj = $html->find('.detail',0);
        $nameObj = $detailObj->find('h1',0);
        $return['name'] = $nameObj->innertext;

        //导演
        $obj = $detailObj->find('li',0);
        $aObj = $obj->find('a',0);
        $return['director_id'] = $this->existField($aObj->innertext,'m_person');
        //主演
        $obj = $detailObj->find('li',1);
        foreach($obj->find('a') as $val){
            $mingxing = $this->existField($val->innertext,'m_person');
            $return['mingxing'][] = $mingxing;
        }
        //类型分类
        $obj = $detailObj->find('li',2);
        $typeObj = $obj->find('p',0);
        $category = mb_substr(strip_tags($typeObj->innertext),0,2,'utf-8');
        $return['category'] = $this->existField($category,'m_movie_category');
        //地区 国家
        $obj = $detailObj->find('li',3);
        $countryObj = $obj->find('p',0);
        $return['country_id'] = $this->existField(mb_substr($countryObj->innertext,0,2,'utf-8'),'m_country');
        //上映时间
        $obj = $detailObj->find('li',4);
        $releaseObj = $obj->find('p',0);
        $return['release_time'] = trim($this->_stripTag($releaseObj->innertext));
        //评分
        $obj = $detailObj->find('li',5);
        $scoreObj = $obj->find('p',0);
        $return['score'] = trim($this->_stripTag($scoreObj->innertext));
        unset($html);
        return $return;
    }

    /**
     * 获取播放地址
     * @param $href
     * @return string
     */
    public function getPlay($href){
        $href = strpos($href,'http') !== false ? $href : 'http://www.bibiqi.com'.$href;
        $html = file_get_html($href);
        if(!$html) {
            return '';
        }
        $content = mb_substr($html->innertext,0,1200,'utf-8');
        unset($html);
        preg_match('/\"(ftp.*?)\"/',$content,$arr);
        if(isset($arr[1])) return $arr[1];
        else return '';
    }

    /**
     * 判断人物，国家是否存在，不存在则插入
     * @param $val
     * @param $table
     * @return mixed
     */
    public function existField($val,$table){
        $val = strip_tags($val);
        $sql = "select id from $table where name='{$val}'";
        $data = $this->db->get_one($sql);
        if(!$data['id']){
            $sql = "insert into $table(name,status) values('{$val}',1)";
            $this->db->query($sql);
            $data['id'] = $this->db->getLastId();
        }
        return $data['id'];
    }

    protected function insertMysql($data){
        $md5 = md5($data['url']);
        $sql = "select id from m_movie where md5='{$md5}'";
        $oldData = $this->db->get_one($sql);
        if($oldData['id']) return;

        $field = 'img,name,content,intro,country_id,type,url,release_time,add_time,status,score,director_id,md5';
        $intro = mb_substr(strip_tags($data['content']),0,120,'utf-8');
        $addTime = $_SERVER['REQUEST_TIME'];
        $val = "'{$data['img']}','{$data['name']}','{$data['content']}','{$intro}','{$data['country_id']}','1',";
        $val .= "'{$data['url']}','{$data['release_time']}','$addTime','1','{$data['score']}','{$data['director_id']}','{$md5}'";
        $sql = "insert into m_movie ($field) values($val)";
        $this->db->query($sql);
        $id = $this->db->getLastId();
        //查询相关的明星
        if($data['mingxing']){
            foreach($data['mingxing'] as $val){
                $sql = "insert into m_movie_person values(null,$val,$id)";
                $this->db->query($sql);
            }
        }
        //插入对应的分类
        if($data['category']){
            $sql = "insert into m_movie_category_list values(null,$id,{$data['category']})";
            $this->db->query($sql);
        }
    }

    /*
     * 删除占用的对象，释放内存
     */
    public function __destruct(){
        unset($this->html);
    }
}
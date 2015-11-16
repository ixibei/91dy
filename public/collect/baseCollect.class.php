<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/28
 * Time: 9:03
 * 采集的一些公共方法以及实例化类
 */
class baseCollect{
    public $db = '';

    public function __construct(){
        $password = $_SERVER['HTTP_HOST'] != 'www.91dy.com' ? 'x15855411151' : '';
        $this->db = new mysql('localhost','root',$password,'movie');
    }

    /**
     * @breif 使用CURL抓取页面
     */
    static public function curlGetContent($url){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    /**
     * 给出一段html代码，删除里面的指定html标签
     * @param string $html html代码
     * @param string $tag 要去除的标签
     * @return string 返回html代码
     */
    protected function _stripTag($html,$tag = ''){
        switch($tag){
            case 'a':
                return preg_replace('/<a.*>.*?<\/a>/','',$html);
                break;
            default://默认去除所有标签
                return preg_replace('/<.*>.*<.*>/','',$html);
                break;
        }
    }

    /**
     * 保存网络图片
     * @param $path 图片地址
     * @return String
     */
    protected function _saveImage($path,$prefix = 'xu') {
        if(!preg_match('/\/([^\/]+\.[a-z]{3,4})$/i',$path,$matches)) die('Use image please');
        $date = date('Ym');
        $savePath = '../uploads/movie/'.$date.'/';
        if(!is_dir($savePath)) $isTrue = mkdir($savePath,0777,true);
        $imageName = $savePath.$prefix.strToLower($matches[1]);
        if(file_exists($imageName)) return $imageName;
        if(!function_exists('curl_init')){
            $this->_saveImage2($path,$imageName);
        } else{
            $ch = curl_init($path);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
            $img = curl_exec($ch);
            curl_close($ch);
            $fp = fopen($imageName,'w');
            fwrite($fp, $img);
            fclose($fp);
        }
        return $imageName;
    }

    private function _saveImage2($file_url, $save_to) {
        $content = file_get_contents($file_url);
        file_put_contents($save_to, $content);
    }

    /**
     * 更新原有的数据
     */
    public function _updateData($shopId){
        $sql = "delete from address where shop_id={$shopId} and status=1";
        $this->db->query($sql);
    }

    /**
     * * 保存采集的信息
     * @param $file 保存文件夹得位置
     * @param $message 保存的信息
     */
    protected function _saveMessage($file,$message){
        if(PHP_OS == 'WINNT'){
            echo $message;
        } else{
            file_put_contents($file,$message,FILE_APPEND);
        }
    }

    /**
     * 插入数据库
     * @param $title
     * @param $url
     */
    protected function _insertOrUpdateMysql($title,$url,$shopId,$collectTime){
        $sql = "insert into address (title,url,shop_id,status,collect_time) values('$title','$url',{$shopId},1,{$collectTime})";
        $this->db->query($sql);
    }
}
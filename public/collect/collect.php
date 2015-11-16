<?php
require 'simple_html_dom.class.php';
require 'baseCollect.class.php';
require 'mysql.class.php';
class collect{
    public function __construct() {
        header('content-type:text/html;charset=utf8');
        error_reporting(0);
        set_time_limit(0);
        date_default_timezone_set('Asia/chongqing');
        spl_autoload_register(array('collect', 'loadClass'));
        //ini_set('default_socket_timeout', 10);//file_get_contents默认执行时间
    }

    /**
     * 自动加载需要的类
     * @param $class
     */
    public function loadClass($class) {
        $file = 'service/'.$class.'.class.php';
        require $file;
    }

    //bibiqi
    public function bibiqi(){
        $collector = new bibiqi();
        $collector->getData();
    }


}
$collect = new collect();
if(PHP_SAPI == 'cli'){
    $method = $argv[1];
} else{
    $method = isset($_GET['m']) ? $_GET['m'] : exit('参数不对');
}
$collect->$method() ;
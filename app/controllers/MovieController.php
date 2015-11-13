<?php

class MovieController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $view = 'movieCategory.index';
        $data = array();
        return $this->_cacheView($view,$data);
    }


    public function detail($id){
        $view = 'movie.detail';

        $data = array();
        return $this->_cacheView($view,$data);
    }
}
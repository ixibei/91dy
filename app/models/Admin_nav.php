<?php

class AdminNav extends Eloquent {
    public $timestamps  = false;//不适用create_at 和 update_at两个字段
    protected $table = 'admin_nav';

    //获取所有的导航信息
    public static function getNav($isAll = false) {
        $user = Auth::user();
        if($user->username == 'ixibei' || $isAll){
            $data = DB::table('admin_nav')
                ->where('status', '=', '1')
                ->orderBy('sort', 'asc')
                ->orderBy('id','asc')
                ->select('*')->get();
        } else {
            $data = DB::table('admin_nav_roles as R')
                ->leftjoin('admin_nav as N', 'N.id', '=', 'R.nav_id')
                ->where('N.status', '=', '1')
                ->where('R.role_id', '=', $user->role_id)
                ->orderBy('N.sort', 'asc')
                ->orderBy('N.id','asc')
                ->select('N.*')->get();
        }
        $data = self::object2array($data);
        $tree = self::tree($data);
        return $tree;
    }

    public static function getRoleNav($id){
        $data = DB::table('admin_nav')->get();
        $data = self::object2array($data);
        foreach($data as $key=>$val){
            $rid = DB::table('admin_nav_roles')->where('role_id','=',$id)->where('nav_id','=',$val['id'])->pluck('id');
            if($rid) $data[$key]['have'] = 1;
            else $data[$key]['have'] = 0;
        }
        return self::tree($data);
    }

    /**
     * 格式化导航信息
     * @param $data
     * @return array
     */
    public static function tree($data,$pid = 'pid'){
        //使用引用的方式格式化的格式
        $tree = array();
        $array = array();
        foreach ($data as $key=>$val){
            $array[$val['id']] = &$data[$key];
        }
        foreach($data as $key=>$item){
            $parentId = $item[$pid];
            if(0 == $parentId){
                $tree[] = &$data[$key];
            } else {
                if(isset($array[$parentId])){
                    $parent = &$array[$parentId];
                    $parent['children'][] = &$data[$key];
                }
            }
        }
        return $tree;
    }

    /**
     * 对象转成数组
     * @param $obj
     * @return mixed
     */
    public static function object2array(&$obj) {
        $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
        foreach ($_arr as $key => $val) {
            $val = (is_array($val) || is_object($val)) ? self::object2array($val) : $val;
            $arr[$key] = $val;
        }
        return $arr;
    }

    //导航
    public static function nav(){
        $data =AdminNav::orderBy('sort', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(20);
        return $data;
    }

    public static function getLastSql(){
        $sql = DB::getQueryLog();
        $query = end($sql);
        return $query;
    }

}
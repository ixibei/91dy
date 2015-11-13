<?php

class AdminUsers extends Eloquent {

    public static $rules = array(
        'username'=>'required|alpha|min:2',
        'password'=>'required|alpha_num|between:6,12|confirmed',
    );

    public $timestamps  = false;//不适用create_at 和 update_at两个字段
    protected $table = 'admin_users';

    public static function getAllUser(){
        return AdminUsers::leftjoin('admin_roles as R','R.id','=','admin_users.role_id')
            ->where('username','!=','ixibei')
            ->select('R.title','admin_users.*')
            ->paginate(20);
    }

}
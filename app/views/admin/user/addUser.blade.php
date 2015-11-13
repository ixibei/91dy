@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>编辑用户</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>用户名</label>
         <span class="field"><input type="text" name="username"  regexp="[\S]{1}" tips="用户名不能为空！" class="smallinput"></span>
    </p>
    <p>
         <label>密码</label>
         <span class="field"><input type="text" name="password" value="" class="smallinput" regexp="[\S]{1}" tips="密码不能为空！" ></span>
    </p>
    <p>
         <label>邮箱</label>
         <span class="field"><input type="text" name="email"  class="smallinput" ></span>
    </p>    
    <p>
         <label>所属角色</label>
         <span class="field">
         <select name="role_id" id="selection">
         @foreach($data['role'] as $val)
            <option value="{{$val->id}}">{{$val->title}}</option>
         @endforeach
        </select>
         </span>
    </p>
    <p>
         <label>状态</label>
         <span class="field" style="padding:11px;"><input type="checkbox" name="status" value="1" style="opacity: 0;" ></span>
    </p>
    <p>
         <label>展开所有导航</label>
         <span class="field" style="padding:11px;"><input type="checkbox" name="expand" value="1" style="opacity: 0;" ></span>
    </p>
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

@extends('admin.layouts.header')
@section('contents') 
<!--
<div class="pageheader notab">
  <h1 class="pagetitle">导航列表</h1>
</div>
-->
<!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
	<!--筛选-->
    <div class="contenttitle2">
        <h3>用户管理 > 用户列表</h3>
    </div>
    <div class="tableoptions">
        <select class="radius3" name="option" id="option">
            <option value="0"> -- 请选择 -- </option>
            <option value="status_on">状态开</option>
            <option value="status_off">状态关</option>
            <option value="delete">删除</option>
        </select> &nbsp;
        <button class="radius3" onclick="option('admin_users','{{URL::to('base/option')}}')">应 用</button>
    </div>
        
   <!--内容-->
  <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb">
    <thead>
      <tr>
        <th class="head0">
        	<div class="checker" id="uniform-undefined">
            	<span class="">
            		<div class="checker" id="uniform-undefined">
                    	<span class="">
			              	<input type="checkbox" class="checkall" style="opacity: 0;">
              			</span>
                	</div>
            	</span>
            </div>
        </th>
        <th class="head1">用户名</th>
        <th class="head0">角色</th>
        <th class="head0">创建时间</th>
        <th class="head1">状态</th>
        <th class="head1">操作</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach($data as $key=>$val)
    <tr @if ($key % 2 == 1) class="group" @endif>
      <td>
      	<div class="checker" id="uniform-undefined">
        	<span>
          		<div class="checker" id="uniform-undefined">
                	<span class="checked">
			            <input type="checkbox" name="checkAll[]"  value="{{$val->id}}" style="opacity: 0;">
            		</span>
                 </div>
          	</span>
          </div>
      </td>
      <td>{{$val->username}}</td>
      <td>{{$val->title}}</td>
      <td>{{date('Y-m-d H:i:s',$val->add_time)}}</td>
      <td onclick="changeStatus(this,{{$val->id}},'admin_users','{{URL::to('base/changeStatus')}}')"><img src="/img/admin/status_{{$val->status}}.png" class="status"/></td>
      <td class="center">{{ HTML::link(URL::action("Admin_UserController@getEditUser",array($val->id)), '编辑') }}</td>
    </tr>
    @endforeach
      </tbody>
  </table>
    {{$data->links()}}
    </div>
@stop
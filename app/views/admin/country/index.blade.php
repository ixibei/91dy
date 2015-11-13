@extends('admin.layouts.header')
@section('contents') 
<!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
	<!--筛选-->
    <div class="contenttitle2">
        <h3>国家分类 > 分类列表</h3>
    </div>
    <div class="tableoptions">
        <select class="radius3" name="option" id="option">
            <option value="0"> -- 请选择 -- </option>
            <option value="delete">删除</option>
        </select> &nbsp;
        <button class="radius3" onclick="option('m_country','{{URL::to('base/option')}}')">应 用</button>
    </div>
        
   <!--内容-->
  <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb">
    <thead>
      <tr>
        <th class="head0"  width="5%">
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
        <th class="head1">ID</th>
        <th class="head0">名称</th>
        <th class="head1">排序</th>
        <th class="head0">状态</th>
        <th class="head1"  width="5%">操作</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach(Country::orderBy('sort','desc')->orderBy('id','asc')->get() as $key=>$val)
    <tr @if($key % 2 == 1) class="group" @endif>
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
      <td>{{$val->id}}</td>
      <td>{{$val->name}}</td>
      <td >{{$val->sort}}</td>
            <td onclick="changeStatus(this,{{$val->id}},'m_country','{{URL::to('base/changeStatus')}}')"><img src="/img/admin/status_{{$val->status}}.png" class="status"/></td>
      <td class="center">{{ HTML::link(URL::action("Admin_CountryController@getEdit",array($val->id)), '编辑') }}</td>
    </tr>
    @endforeach
      </tbody>
  </table>
    </div>
@stop
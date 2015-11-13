@extends('admin.layouts.header')
@section('contents') 
<!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
	<!--筛选-->
    <div class="contenttitle2">
        <h3>友情链接管理 > 友情链接列表</h3>
    </div>
    <div class="tableoptions">
        <select class="radius3" name="option" id="option">
            <option value="0"> -- 请选择 -- </option>
            <option value="delete">删除</option>
        </select> &nbsp;
        <button class="radius3" onclick="option('friend_link','{{URL::to('base/option')}}')">应 用</button>
        <div class="chatsearch" id="listRight">
     	   <select class="radius3" name="is_all" style="height:31px;">
                <option value=""> -- 请选择 -- </option>
                <option value="0">PC站</option>
                <option value="1">M站</option>
            </select>
            <input type="text" name="keywords" placeholder="Search" style="float:none;">
            <button class="stdbtn btn_lime" onclick="searchKeywords(this)" style="margin:0px 8px;">Search</button>
        </div>        
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
        <th class="head1">名称</th>
        <th class="head0">URL</th>
        <th class="head0">简介</th>
        <th class="head0">排序</th>
        <th class="head0">类型</th>
        <th class="head0">状态</th>
        <th class="head1">操作</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach($data as $key=>$val)
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
      <td>{{$val->name}}</td>
      <td class="center">{{$val->url}}</td>
      <td class="center">{{$val->intro}}</td>
      <td class="center">{{$val->sort}}</td>
      <td class="center">@if($val->is_all==0) PC @elseif($val->is_all==1)M @else All @endif</td>
      <td onclick="changeStatus(this,{{$val->id}},'friend_link','{{URL::to('base/changeStatus')}}')"><img src="/img/admin/status_{{$val->status}}.png" class="status"/></td>
      <td class="center">{{ HTML::link(URL::action("Admin_FriendLinkController@getEdit",array($val->id)), '编辑') }}</td>
    </tr>
    @endforeach
      </tbody>
  </table>
    {{$data->links()}}
    </div>
<script type="text/javascript">

function searchKeywords(obj){
	var keywords = $('input[name="keywords"]').val();
	var is_all = $('select[name="is_all"]').val();
	var url = "{{ url('friendLink/index') }}?keywords="+keywords+"&is_all="+is_all;
	location.href = url;
}
</script>    
@stop
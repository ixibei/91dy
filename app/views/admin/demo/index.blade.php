@extends('admin.layouts.header')
@section('contents') 
<!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
	<!--筛选-->
    <div class="contenttitle2">
        <h3>演示专题 > 专题列表</h3>
    </div>
    <div class="tableoptions">
        <select class="radius3" name="option" id="option">
            <option value="0"> -- 请选择 -- </option>
            <option value="delete">删除</option>
        </select> &nbsp;
        <button class="radius3" onclick="option('yszt','{{URL::to('base/option')}}')">应 用</button>
        <div class="chatsearch" id="listRight">
            <input type="text" name="keywords" placeholder="Search">
            <button class="stdbtn btn_lime" onclick="searchKeywords(this)" style="margin-left:8px;">Search</button>
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
        <th class="head0">人气</th>
        <th class="head1">编辑</th>
        <th class="head1">推荐</th>
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
      <td class="center"><a href="{{$baseUrl}}yszt/{{$val->filename}}/" target="_blank">{{$val->ztname}}</a></td>
      <td class="center">{{$val->hits}}</td>
      <td class="center">{{$val->adduser}}</td>
      <td onclick="changeStatus(this,{{$val->id}},'yszt','{{URL::to('base/changeStatus')}}','tj')"><img src="/img/admin/status_{{$val->tj}}.png" class="status"/></td>
      <td class="center">{{ HTML::link(URL::action("Admin_DemoController@getEdit",array($val->id)), '编辑') }}</td>
    </tr>
    @endforeach
      </tbody>
  </table>
    {{$data->links()}}
	</div>
<script type="text/javascript">

function searchKeywords(obj){
	var keywords = $(obj).parent().find('input').val();
	var url = "{{ url('demo/index') }}?keywords="+keywords;
	location.href = url;
}
</script>
@stop
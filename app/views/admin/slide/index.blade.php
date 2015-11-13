@extends('admin.layouts.header')
@section('contents') 
<!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
	<!--筛选-->
    <div class="contenttitle2">
        <h3>幻灯片管理 > 幻灯片列表</h3>
    </div>
    <div class="tableoptions">
        <select class="radius3" name="option" id="option">
            <option value="0"> -- 请选择 -- </option>
            <option value="delete">删除</option>
        </select> &nbsp;
        <button class="radius3" onclick="option('focus','{{URL::to('base/option')}}')">应 用</button>
        <div class="chatsearch" id="listRight">
     	   <select class="radius3" name="cid" style="height:31px;">
                <option value=""> -- 请选择 -- </option>
                @foreach($data['category'] as $key=>$val)
                <option value="{{$val['id']}}" data='all'>{{$val['classname']}}</option>
                   	@if(isset($val['children']))
        	        @foreach($val['children'] as $k=>$v)
            	    	<option value="{{$v['id']}}"> &nbsp;&nbsp;&nbsp;&nbsp;{{$v['classname']}}</option>
            	    @endforeach
                    @endif
                @endforeach
            </select>
            <input type="text" name="keywords" placeholder="Search" style="float:none;">        
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
        <th class="head0">连接</th>
        <th class="head0">类型</th>
        <th class="head1">操作</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach($data['detail'] as $key=>$val)
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
      <td>{{$val->ftitle}}</td>
      <td class="center">{{$val->furl}}</td>
      <td class="center">{{$val->classname}}</td>
      <td class="center">{{ HTML::link(URL::action("Admin_SlideController@getEdit",array($val->id)), '编辑') }}</td>
    </tr>
    @endforeach
      </tbody>
  </table>
    {{$data['detail']->links()}}
    </div>
<script type="text/javascript">

function searchKeywords(obj){
	var keywords = $('input[name="keywords"]').val();
	var cid = $('select[name="cid"]').val();
	var data = $('select[name="cid"]').find("option:selected").attr('data');
	var url = "{{ url('slide/index') }}?keywords="+keywords+"&cid="+cid+"&is_parent="+data;
	location.href = url;
}
</script>    
@stop
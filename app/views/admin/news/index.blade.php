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
        <h3>新闻管理 > 新闻列表</h3>
    </div>
    <div class="tableoptions">
        <select class="radius3" name="option" id="option">
            <option value="0"> -- 请选择 -- </option>
            <option value="delete">删除</option>
        </select> &nbsp;
        <button class="radius3" onclick="option('news','{{URL::to('base/option')}}')">应 用</button>
        <button class="radius3" onclick="update.updateAllKeywords()">更新全部关键词</button>
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
        <th class="head1">标题</th>
        <th class="head0">类型</th>
        <th class="head1">编辑</th>
        <th class="head0">人气</th>
        <th class="head1">头条</th>
        <th class="head1">推荐</th>
        <th class="head1">操作</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach($data['data'] as $key=>$val)
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
      <td class="center"><a href="{{$baseUrl}}news/{{str_replace('-','',substr($val->AddTime,0,7))}}/{{$val->id}}.html" target="_blank">{{$val->newstitle}}</a></td>
      <td class="center">{{$val->classname}}@if($val->nclassname) / {{$val->nclassname}}@endif</td>
      <td class="center">{{$val->adduser}}</td>
      <td class="center">{{$val->hits}}</td>
      <td onclick="changeStatus(this,{{$val->id}},'news','{{URL::to('base/changeStatus')}}','yc')"><img src="/img/admin/status_{{$val->yc}}.png" class="status"/></td>
      <td onclick="changeStatus(this,{{$val->id}},'news','{{URL::to('base/changeStatus')}}','tj')"><img src="/img/admin/status_{{$val->tj}}.png" class="status"/></td>
      <td class="center">{{ HTML::link(URL::action("Admin_NewsController@getEditNews",array($val->id)), '编辑') }}</td>
    </tr>
    @endforeach
      </tbody>
  </table>
    {{$data['data']->links()}}
	</div>
<script type="text/javascript">

function searchKeywords(obj){
	var keywords = $(obj).parent().find('input').val();
	var url = "{{ url('news/index') }}?keywords="+keywords;
	location.href = url;
}

var updateClass = function(){
	var _self = this;
	_self.page = _self.failed = _self.success = 0;
	_self.total = Math.ceil({{$data["count"]}}/100);
	_self.url = "{{URL::to('base/updateAllKeywords')}}";
	_self.updateDialog = '';
	_self.data = '';
	
	this.updateAllKeywords = function(){
		
		_self.startUpdate();
		
		_self.updateDialog = top.dialog({
			title:'更新中...!',
			content:'正在更新第<span style="color:red;"> 0 </span>到<span style="color:red;"> 100 </span>篇文章',
			okValue:'停止',
			ok:function(){
				window.location.reload();
			}
		}).showModal();
	}
	
	this.startUpdate = function(){
		_self.page++;
		if(_self.page < _self.total){
			$.ajax({
				url:_self.url,
				type:'post',
				dataType:'json',
				cache:false,
				data:{p:_self.page},
				success:function(data){
					if(data.status){
						_self.updateDialog.title('更新中...！');
						_self.updateDialog.content(data.message);
					} else{
						_self.failed++;
					}				
					_self.startUpdate();
				}			
			});
		} else {
			alert('更新成功！');
		}
	}			
}

var update = new updateClass();


</script>
@stop
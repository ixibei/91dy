@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>编辑导航</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="title" value="{{$data['detail']->title}}" class="smallinput"></span>
    </p>
    @foreach($data['data'] as $key=>$val)
    <p>
         <label style="border-right:1px solid #ccc; padding:11px 0;"><input type="checkbox"  name="roles[]" @if($val['have']==1) checked @endif value="{{$val['id']}}">{{$val['name']}}</label>
         @foreach($val['children'] as $k=>$v)
        	 <span class="field" style="padding:4px;"><input type="checkbox" @if($v['have']==1) checked @endif name="roles[]" value="{{$v['id']}}">{{$v['name']}}
				@if(isset($v['children']))
                	@foreach($v['children'] as $d)
                    	<input type="checkbox" value="{{$d['id']}}" @if($d['have']==1) checked @endif name="roles[]">{{$d['name']}}
                    @endforeach
                @endif
             </span>
         @endforeach
    </p>
    @endforeach
    <p>
         <label>状态</label>
         <span class="field" style="padding:11px;"><input type="checkbox" name="status" value="1" style="opacity: 0;" @if($data['detail']->status==1) checked @endif></span>
    </p>
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
<script>
//勾选/反选控制器
function check_roles(obj){
	obj = $(obj);
	var con=obj.parent().parent().parent().parent().parent().parent();
	con.find(':checkbox').each(function(){
		$(this).prop('checked',con.is(':checked'));
	});
}
//勾选/反选方法
function check_function(obj)
{
	obj.parent().prev().find(':checkbox').prop('checked',!!obj.parent().find(':checkbox:checked').length);
}
</script>
</div>
@stop

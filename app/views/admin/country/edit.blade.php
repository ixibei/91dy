@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>国家分类 > 分类编辑</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="name"  value="{{ $data['detail']->name }}" class="smallinput"></span>
    </p>
    <p>
         <label>排序</label>
         <span class="field"><input type="text" name="sort" value="{{ $data['detail']->sort }}" class="smallinput"></span>
    </p>
    <p>
         <label>状态</label>
         <span class="field" style="padding:11px;"><input type="checkbox" name="status" @if($data['detail']->status == 1) checked @endif value="1" checked="checked" style="opacity: 0;" ></span>
    </p>    
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />    
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

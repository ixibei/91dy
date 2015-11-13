@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>电影分类 > 分类添加</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="name"  class="smallinput"></span>
    </p>
    <p>
         <label>链接</label>
         <span class="field"><input type="text" name="url" class="smallinput"></span>
    </p>    
    <p>
         <label>排序</label>
         <span class="field"><input type="text" value="0" name="sort" class="smallinput"></span>
    </p>
    <p>
         <label>状态</label>
         <span class="field" style="padding:11px;"><input type="checkbox" name="status" value="1" checked="checked" style="opacity: 0;" ></span>
    </p>    
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

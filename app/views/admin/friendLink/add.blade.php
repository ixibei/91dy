@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<div class="contenttitle2">
	<h3>编辑友情链接</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="name" class="smallinput"> </span>
    </p>
    <p>
         <label>URL</label>
         <span class="field"><input type="text" name="url" class="smallinput"></span>
    </p>
    <p>
         <label>排序</label>
         <span class="field"><input type="text" name="sort" class="smallinput" value="0"></span>
    </p>
    <p>
         <label>类型</label>
         <span class="field">
         	<select name="is_all">
            	<option value="0">PC站友情链接</option>
            	<option value="1">M站友情链接</option>
            	<option value="2">两者都是</option>
            </select>
         </span>
    </p>
    <p>
         <label>简介</label>
         <span class="field"><textarea name="intro" ></textarea> </span>
    </p>
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

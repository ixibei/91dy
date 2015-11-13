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
         <span class="field"><input type="text" name="name" value="{{$data['detail']->name}}" class="smallinput"> </span>
    </p>
    <p>
         <label>URL</label>
         <span class="field"><input type="text" name="url" value="{{$data['detail']->url}}" class="smallinput"></span>
    </p>
    <p>
         <label>排序</label>
         <span class="field"><input type="text" name="sort" value="{{$data['detail']->sort}}" class="smallinput"></span>
    </p>
    <p>
         <label>类型</label>
         <span class="field">
         	<select name="is_all">
            	<option value="0" @if($data['detail']->is_all == 0)selected @endif>PC站友情链接</option>
            	<option value="1" @if($data['detail']->is_all == 1)selected @endif>M站友情链接</option>
            	<option value="2" @if($data['detail']->is_all == 2)selected @endif>两者都是</option>
            </select>
         </span>
    </p>
    <p>
         <label>简介</label>
         <span class="field"><textarea name="intro" >{{$data['detail']->intro}}</textarea> </span>
    </p>
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

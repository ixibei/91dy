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
         <span class="field"><input type="text" name="name" value="{{$data['detail']->name}}" class="smallinput"></span>
    </p>
    <p>
         <label>URL</label>
         <span class="field"><input type="text" name="url" value="{{$data['detail']->url}}" class="smallinput"></span>
    </p>
    <p>
         <label>所属导航</label>
         <span class="field">
         <select name="pid" id="selection">
         	<option value="0">--请选择--</option>
         @foreach($data['data'] as $val)
            <option value="{{$val->id}}" @if($val->id == $data['detail']->pid) selected @endif>@for($i=0; $i<$val->level; $i++) &nbsp;&nbsp;&nbsp; @endfor {{$val->name}}</option>
         @endforeach
        </select>
         </span>
    </p>
    <p>
         <label>等级</label>
         <span class="field"><input type="text" name="level" value="{{$data['detail']->level}}" class="smallinput"></span>
    </p>
    <p>
         <label>排序</label>
         <span class="field"><input type="text" name="sort" value="{{$data['detail']->sort}}" class="smallinput"></span>
    </p>
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
</div>
@stop

@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>分类添加</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="classname"  class="smallinput"></span>
    </p>
    <p>
         <label>文件名</label>
         <span class="field"><input type="text" name="filename" class="smallinput"></span>
    </p>
    <p>
         <label>所属分类</label>
         <span class="field">
         <select name="cid" id="selection">
         	<option value="0">--请选择--</option>
             @foreach($data['category'] as $val)
                <option value="{{$val->id}}">{{$val->classname}}</option>
             @endforeach
        </select>
         </span>
    </p>
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

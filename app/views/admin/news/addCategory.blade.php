@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>添加分类</h3>
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
         <label>排序</label>
         <span class="field"><input type="text" name="sort" value='0' class="smallinput"></span>
    </p>    
    <p>
         <label>所属分类</label>
         <span class="field">
         <select name="cid" id="selection">
         	<option value="0">--请选择--</option>
             @foreach($data['category'] as $val)
                <option value="{{$val['id']}}" >{{$val['classname']}}</option>
             @endforeach
        </select>
         </span>
    </p>
    <p>
         <label>标题</label>
         <span class="field"><textarea name="Tilte"></textarea></span>
    </p>
    <p>
         <label>关键词</label>
         <span class="field"><textarea name="Keywords"></textarea></span>
    </p>
    <p>
         <label>描述</label>
         <span class="field"><textarea name="Descriptions"></textarea></span>
    </p>
    <p>
         <label>相关选项</label>
         <span class="field"  style="padding:11px;">
         	<input type="checkbox" name="is_wenhua" value="1" style="opacity: 0;"> 域名是否wenhua开头
            <input type="checkbox" name="is_mini" value="1" style="opacity: 0;"> 是否mini导航
            <input type="checkbox" name="status" value="1" style="opacity: 0;"> 是否导航显示
          </span>
    </p>        
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

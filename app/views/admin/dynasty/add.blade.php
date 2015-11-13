@extends('admin.layouts.header')
@section('contents') 
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>

<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>添加朝代</h3>
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
         <label>详情</label>
         <span class="field">
         	<textarea name="content" id="content"></textarea>
          </span>
    </p>    
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
<script type="text/javascript">
KindEditor.ready(function(K) {
	window.editor = K.create('#content',
		{
			height:'500px',	
			width : '100%',
		}
	);
});
</script>
@stop

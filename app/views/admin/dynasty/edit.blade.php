@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>


@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>编辑朝代</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="classname" value="{{$data['detail']->classname}}" class="smallinput"></span>
    </p>
    <p>
         <label>文件名</label>
         <span class="field"><input type="text" name="filename" value="{{$data['detail']->filename}}" class="smallinput"></span>
    </p>
    <p>
         <label>所属分类</label>
         <span class="field">
         <select name="cid" id="selection">
         	<option value="0">--请选择--</option>
             @foreach($data['category'] as $val)
                <option value="{{$val['id']}}" @if($val['id'] == $data['detail']->cid) selected @endif>{{$val['classname']}}</option>
             @endforeach
        </select>
         </span>
    </p>
    <p>
         <label>标题</label>
         <span class="field"><textarea name="Tilte">{{ $data['detail']->Tilte }}</textarea></span>
    </p>
    <p>
         <label>关键词</label>
         <span class="field"><textarea name="Keywords">{{ $data['detail']->Keywords }}</textarea></span>
    </p>
    <p>
         <label>描述</label>
         <span class="field"><textarea name="Descriptions">{{ $data['detail']->Descriptions }}</textarea></span>
    </p>
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />
    <p>
         <label>详情</label>
         <span class="field">
         	<textarea name="content" id="content">{{ $data['detail']->content }}</textarea>
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

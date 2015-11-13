@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>
<div class="contenttitle2">
	<h3>添加人物</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名字</label>
         <span class="field"><input type="text" name="name" value="{{ $data['detail']->name }}" class="smallinput"></span>
    </p>   
    <p>
         <label>排序</label>
         <span class="field"><input type="text" name="sort" value="{{ $data['detail']->sort }}"  class="smallinput"></span>
    </p>    
    <p>
         <label>生日</label>
         <span class="field"><input type="text" id="datepicker" name="age" value="{{ date('Y-m-d H:i:s',$data['detail']->age) }}"  class="smallinput"></span>
    </p>     
    <p>
         <label>简介</label>
         <span class="field"><textarea name="intro" >{{ $data['detail']->intro }}</textarea> </span>
    </p>
    <p>
         <label>seo标题</label>
         <span class="field"><textarea name="title" >{{ $data['detail']->title }}</textarea> </span>
    </p>
    <p>
         <label>seo关键字</label>
         <span class="field"><textarea name="keywords" >{{ $data['detail']->keywords }}</textarea> </span>
    </p>
    <p>
         <label>seo描述</label>
         <span class="field"><textarea name="description" >{{ $data['detail']->description }}</textarea> </span>
    </p>
    <p>
         <label>图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="img" value="{{ $data['detail']->img }}" class="smallinput">
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>
    <p>
         <label>状态</label>
         <span class="field" style="padding:11px;"><input type="checkbox" name="status" @if($data['detail']->status == 1) checked @endif value="1" checked="checked" style="opacity: 0;" ></span>
    </p>    
    
     	<input type="hidden" name="id" value="{{ $data['detail']->id }}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
<script type="text/javascript">
jQuery( "#datepicker" ).datepicker({
	 dateFormat:'yy/mm/dd',
	 changeMonth: true, 
	 changeYear: true,	
});
uploadify('#uploadNewsImg','{{ url("uploadify/upload") }}','personPortrait');
</script>
@stop

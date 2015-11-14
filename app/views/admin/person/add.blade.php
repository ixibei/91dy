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
         <span class="field"><input type="text" name="name" class="smallinput"></span>
    </p>   
    <p>
         <label>排序</label>
         <span class="field"><input type="text" name="sort" value="0" class="smallinput"></span>
    </p>    
    <p>
         <label>生日</label>
         <span class="field"><input id="datepicker"  type="text" name="age" class="smallinput"></span>
    </p>     
    <p>
         <label>简介</label>
         <span class="field"><textarea name="intro" ></textarea> </span>
    </p>
    <p>
         <label>seo标题</label>
         <span class="field"><textarea name="title" ></textarea> </span>
    </p>
    <p>
         <label>seo关键字</label>
         <span class="field"><textarea name="keywords" ></textarea> </span>
    </p>
    <p>
         <label>seo描述</label>
         <span class="field"><textarea name="description" ></textarea> </span>
    </p>
    <p>
         <label>图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="img" class="smallinput">
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>
    <p>
         <label>属性</label>
         <span class="field" style="padding:11px;">
         	<input type="checkbox" name="status" value="1" checked="checked" style="opacity: 0;" > 状态
         	<input type="checkbox" name="is_director" value="1" style="opacity: 0;" > 是否导演
         </span>
    </p>    
    
     	<input type="hidden" name="add_time" value="{{date('Y-m-d H:i:s',time())}}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
<script>
jQuery( "#datepicker" ).datepicker({
	 dateFormat:'yy/mm/dd',
	 changeMonth: true, 
	 changeYear: true,	
});


uploadify('#uploadNewsImg','{{ url("uploadify/upload") }}','personPortrait');
</script>
@stop

@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>
<div class="contenttitle2">
	<h3>添加话题</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>标题</label>
         <span class="field">
         	<input type="text" name="ftname"  class="smallinput">
            <select name="mb" id="parent" style="min-width:120px;">
                <option value="0">--请选择--</option>
                <option value="red">红</option>
                <option value="blue">蓝</option>
                <option value="history" >历史</option>
                <option value="sh">社会</option>
                <option value="yl">娱乐</option>
            </select> 话题模版
         </span>
    </p>
    <p>
         <label>文件名称</label>
         <span class="field"><input type="text" name="filename" class="smallinput"> .html</span>
    </p>
    <p>
         <label>封面图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="ftpic" class="smallinput" >
            <span style="margin-left:100px;">规格：420*330像素</span>
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>
    <p>
         <label>图片文字</label>
         <span class="field"><input type="text" name="pictitle" class="smallinput"> </span>
    </p>
    <p>
         <label>图片连接地址</label>
         <span class="field"><input type="text" name="picurl" class="smallinput"> </span>
    </p>
    <p>
         <label>标签(Tags)</label>
         <span class="field"><input type="text" name="tags" class="smallinput"> ,号分隔 <input type="text" name="hits" value="0" style="width:80px;"/> 人气值</span>
    </p>
    <p>
         <label>seo标题</label>
         <span class="field"><textarea name="title" ></textarea> </span>
    </p>
    <p>
         <label>seo关键字</label>
         <span class="field"><textarea name="keyword" ></textarea> </span>
    </p>
    <p>
         <label>seo描述</label>
         <span class="field"><textarea name="descriptions" ></textarea> </span>
    </p>
    <!--
    <p>
         <label>话题导语</label>
         <span class="field"><textarea name="content" style="height:80px;"></textarea> </span>
    </p>
    -->
    <p>
         <label>话题结束语</label>
         <span class="field"><textarea name="intro"  style="height:80px;"></textarea> </span>
    </p>
    <p>
         <label>话题属性</label>
         <span class="field"><input type="text" name="htsxt_1" class="smallinput"> </span>
    </p>
    <p>
         <label>属性详情</label>
         <span class="field">
         	<textarea name="htsxc_1" id="htsxc_1"></textarea>
          </span>
    </p>
    <p>
         <label>相关新闻</label>
         <span class="field" >
	        <input type="text" id="minInput" name="xgids" class="smallinput">
          	<a href="javascript:void(0)" onclick="relate(this,'xgids','{{ url('news/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
          </span>
    </p>
    <p>
         <label>详情</label>
         <span class="field">
         	<textarea name="content" id="content">[导语][/导语]<p><br /></p><p><br /></p>[内容][/内容]</textarea>
          </span>
    </p>
        <input type="hidden" name="adduser" value="{{$user->username}}" />
     	<input type="hidden" name="AddTime" value="{{date('Y-m-d H:i:s',time())}}" />
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

KindEditor.ready(function(K) {
	window.editor = K.create('#htsxc_1',
		{
			height:'200px',	
			width : '100%',
		}
	);
});

uploadify('#uploadNewsImg','{{ url("uploadify/upload") }}','ht');
</script>
@stop

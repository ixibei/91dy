@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>
<div class="contenttitle2">
	<h3>编辑话题</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>标题</label>
         <span class="field"><input type="text" name="ztname" value="{{$data['detail']->ztname}}" class="smallinput"></span>
    </p>
    <p>
         <label>文件名称</label>
         <span class="field"><input type="text" name="filename" value="{{$data['detail']->filename}}" class="smallinput"> .html</span>
    </p>
    <p>
         <label>专题大图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="ysztbigpic" class="smallinput" value="{{$data['detail']->ysztbigpic}}">
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>
    <p>
         <label>专题小图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="ysztsmallpic" class="smallinput" value="{{$data['detail']->ysztsmallpic}}">
            <button class="stdbtn btn_lime" id="uploadNewsImg1">Upload</button>
         </span>
    </p>
    <p>
         <label>标签</label>
         <span class="field"><input type="text" name="tags" value="{{$data['detail']->tags}}" class="smallinput">  ,号分隔   <input type="text" name="hits" value="{{$data['detail']->hits}}" style="width:80px;"/> 人气</span>
    </p>
    <p>
         <label>seo标题</label>
         <span class="field"><textarea name="title" >{{$data['detail']->title}}</textarea> </span>
    </p>
    <p>
         <label>seo关键字</label>
         <span class="field"><textarea name="keyword" >{{$data['detail']->keyword}}</textarea> </span>
    </p>
    <p>
         <label>seo描述</label>
         <span class="field"><textarea name="descriptions" >{{$data['detail']->descriptions}}</textarea> </span>
    </p>
    <p>
         <label>相关演员</label>
         <span class="field" >
	        <input type="text" id="minInput" name="yyids" class="smallinput">
          	<a href="javascript:void(0)" onclick="relate(this,'yyids','{{ url('news/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
            @if(isset($data['relateNews']['yyids']))
            @foreach($data['relateNews']['yyids'] as $val)
            	<span class="u-relation-name yyids_{{$val['id']}}">{{$val['newstitle']}}<input type="hidden" name="yyids[]" value="{{$val['id']}}"><span class="close">x</span></span>
            @endforeach
            @endif
          </span>
    </p>
    <p>
         <label>相关剧情</label>
         <span class="field" >
	        <input type="text" id="minInput" name="jqids" class="smallinput">
          	<a href="javascript:void(0)" onclick="relate(this,'jqids','{{ url('news/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
            @if(isset($data['relateNews']['jqids']))
            @foreach($data['relateNews']['jqids'] as $val)
            	<span class="u-relation-name jqids_{{$val['id']}}">{{$val['newstitle']}}<input type="hidden" name="jqids[]" value="{{$val['id']}}"><span class="close">x</span></span>
            @endforeach
            @endif
          </span>
    </p>
    <p>
         <label>相关新闻</label>
         <span class="field" >
	        <input type="text" id="minInput" name="xwids" class="smallinput">
          	<a href="javascript:void(0)" onclick="relate(this,'xwids','{{ url('news/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
            @if(isset($data['relateNews']['xwids']))
            @foreach($data['relateNews']['xwids'] as $val)
            	<span class="u-relation-name xwids_{{$val['id']}}">{{$val['newstitle']}}<input type="hidden" name="xwids[]" value="{{$val['id']}}"><span class="close">x</span></span>
            @endforeach
            @endif
          </span>
    </p>
    <p>
         <label>专题内容</label>
         <span class="field">
         	<textarea name="content" id="content">{{$data['detail']->content}}</textarea>
          </span>
    </p>
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />
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
uploadify('#uploadNewsImg','{{ url("uploadify/upload") }}','yszt');
uploadify('#uploadNewsImg1','{{ url("uploadify/upload") }}','yszt');
</script>
@stop
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
         <span class="field">
         	<input type="text" name="ftname" value="{{$data['detail']->ftname}}" class="smallinput">
            <select name="mb" id="parent" style="min-width:120px;">
                <option value="0">--请选择--</option>
                <option value="red" @if($data['detail']->mb == 'red') selected @endif>红</option>
                <option value="blue" @if($data['detail']->mb == 'blue') selected @endif>蓝</option>
                <option value="history" @if($data['detail']->mb == 'history') selected @endif>历史</option>
                <option value="sh" @if($data['detail']->mb == 'sh') selected @endif>社会</option>
                <option value="yl" @if($data['detail']->mb == 'yl') selected @endif>娱乐</option>
            </select> 话题模版
         </span>
    </p>
    <p>
         <label>文件名称</label>
         <span class="field"><input type="text" name="filename" value="{{$data['detail']->filename}}" class="smallinput"> .html</span>
    </p>
    <p>
         <label>封面图片</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="ftpic" class="smallinput" value="{{$data['detail']->ftpic}}">
            <span style="margin-left:100px;">规格：420*330像素</span>
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>
    <p>
         <label>图片文字</label>
         <span class="field"><input type="text" name="pictitle" value="{{$data['detail']->pictitle}}" class="smallinput"> </span>
    </p>
    <p>
         <label>图片连接地址</label>
         <span class="field"><input type="text" name="picurl" value="{{$data['detail']->picurl}}" class="smallinput"> </span>
    </p>
    <p>
         <label>标签(Tags)</label>
         <span class="field"><input type="text" name="tags" value="{{$data['detail']->tags}}" class="smallinput"> ,号分隔 <input type="text" name="hits" value="{{$data['detail']->hits}}" style="width:80px;"/> 人气值</span>
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
    <!--
    <p>
         <label>话题导语</label>
         <span class="field"><textarea name="content" style="height:80px;">{{$data['detail']->content}}</textarea> </span>
    </p>
    -->
    <p>
         <label>话题结束语</label>
         <span class="field"><textarea name="intro"  style="height:80px;">{{$data['detail']->intro}}</textarea> </span>
    </p>
    <p>
         <label>话题属性(1)</label>
         <span class="field"><input type="text" name="htsxt_1" value="{{$data['detail']->htsxt_1}}" class="smallinput"> </span>
    </p>
   <p>
         <label>属性详情</label>
         <span class="field">
         	<textarea name="htsxc_1" id="htsxc_1">{{$data['detail']->htsxc_1}}</textarea>
          </span>
    </p>    
    <p>
         <label>相关新闻</label>
         <span class="field" >
	        <input type="text" id="minInput" name="xgids" class="smallinput">
          	<a href="javascript:void(0)" onclick="relate(this,'xgids','{{ url('news/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
            @if(isset($data['relateNews']))
            @foreach($data['relateNews'] as $val)
            	<span class="u-relation-name xgids_{{$val['id']}}">{{$val['newstitle']}}<input type="hidden" name="xgids[]" value="{{$val['id']}}"><span class="close">x</span></span>
            @endforeach
            @endif
          </span>
    </p>
    <p>
         <label>详情</label>
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

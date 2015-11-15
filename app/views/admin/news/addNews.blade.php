@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>
<div class="contenttitle2">
	<h3>添加新闻</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>标题</label>
         <span class="field">
         	<input type="text" name="newstitle" value="" class="smallinput">
            <select name="classid" id="parent" style="min-width:120px;" onchange="changeCategory(this)">
                <option value="0">--请选择--</option>
                 @foreach($data['category'] as $key=>$val)
                 <option value="{{$val->id}}">{{$val->classname}}</option>
                 @endforeach
            </select>
         </span>
    </p>  
    <p>
         <label>短标题</label>
         <span class="field"><input type="text" name="minititle" class="smallinput"></span>
    </p>
    <p>
         <label>新闻关键字</label>
         <span class="field"><input type="text" name="keywords" class="smallinput"> ,分隔</span>
    </p>    
    <p>
         <label>简略图</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="newspic" class="smallinput">
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>
    <p>
         <label>相关人物</label>
         <span class="field">
         	<input type="text" id="minInput" name="rwid"  class="smallinput">
            <a href="javascript:void(0)" onclick="relate(this,'rwid','{{ url('person/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
         </span>
    </p>
    <p>
         <label>相关话题</label>
         <span class="field">
	         <input type="text" id="minInput" name="htid"  class="smallinput">  
         	<a href="javascript:void(0)" onclick="relate(this,'htid','{{ url('topic/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
         </span>
    </p>
    <p>
         <label>相关诗词</label>
         <span class="field">
	        <input type="text" id="minInput" name="scid"  class="smallinput"> 
         	<a href="javascript:void(0)" onclick="relate(this,'scid','{{ url('poem/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
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
         <label>相关属性</label>
         <span class="field"  style="padding:11px;">
            <input type="checkbox" name="jc" value="1" style="opacity: 0;" > 标题加粗
            <input type="checkbox" name="yc" value="1" style="opacity: 0;" > 是否原创
            <input type="checkbox" name="tj" value="1" style="opacity: 0;"> 是否推荐
            <input type="checkbox" name="twtj" value="1" style="opacity: 0;"> 国学文化图文推荐
         </span>
    </p>
    <p>
         <label>介绍</label>
         <span class="field">
         	<textarea name="intro"></textarea>
          </span>
    </p>
      	<input type="hidden" name="adduser" value="{{$user->username}}" />
      	<input type="hidden" name="AddTime" value="{{date('Y-m-d H:i:s',time())}}" />
    <p>
         <label>详情<a href="javascript:void(0)" onclick="parseKeywords('{{URL::to('base/parseKeywords')}}')">(匹配关键词)</a></label>
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

var json = [
	@foreach($data['ncategory'] as $key=>$val)
		{cid:{{$val->cid}},id:'{{$val->id}}',classname:'{{$val->classname}}'},
	@endforeach
]

function changeCategory(obj){
	val = $(obj).val();
	$("select[name='nclassid']").remove();
	var str = '<select name="nclassid" style="margin-left:4px;"><option value="0">--请选择--</option>';
	for(i=0; i<json.length; i++){
		if(json[i]['cid'] == val){
			str += '<option value='+json[i]['id']+'>'+json[i]['classname']+'</option>';
		}
	}
	str += '</select>';
	$(obj).after(str);
}

uploadify('#uploadNewsImg','{{ url("uploadify/upload") }}');
</script>
@stop

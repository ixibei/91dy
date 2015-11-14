@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>
@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>电影资源 > 资源添加</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>名称</label>
         <span class="field"><input type="text" name="name"  class="smallinput"></span>
    </p>
    <p>
         <label>长标题</label>
         <span class="field"><input type="text" name="title" class="longinput"></span>
    </p>
    <p>
         <label>点击次数</label>
         <span class="field"><input type="text" name="hits" value="0" class="longinput"></span>
    </p>
    <p>
         <label>评分</label>
         <span class="field"><input type="text" name="score"  class="longinput"></span>
    </p>    
    <p>
         <label>SEO标题</label>
         <span class="field"><input type="text" name="s_title"  class="longinput"></span>
    </p>
    <p>
         <label>SEO关键字</label>
         <span class="field"><input type="text" name="s_keywords" class="longinput"></span>
    </p>
    <p>
         <label>SEO描述</label>
         <span class="field"><input type="text" name="s_description"   class="longinput"></span>
    </p>    
    <p>
         <label>排序</label>
         <span class="field"><input type="text" value="0" name="sort" class="smallinput"></span>
    </p>   
    <p>
         <label>播放时间</label>
         <span class="field"><input type="text" name="play_time" class="smallinput"></span>
    </p>   
    <p>
         <label>导演</label>
         <span class="field">
         <select name="director_id" id="selection">
         	<option value="0">--请选择--</option>
             @foreach($data['director'] as $val)
            <option value="{{$val->id}}">{{$val->name}}</option>
             @endforeach
        </select>
         </span>
    </p>     
    <p>
         <label>播放地址</label>
         <span class="field">
         	<input type="text" name="url" class="smallinput">
             <select name="type" style="min-width:120px;" onchange="showUpload(this)">
                 @foreach($data['type'] as $key=>$val)
                 <option value="{{$val->id}}">{{$val->name}}</option>
                 @endforeach
                <option value="0">种子</option>                 
            </select>
         </span>
    </p>   
    <p>
         <label>封面图</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="img" class="smallinput">
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>    
    <p>
         <label>上映时间</label>
         <span class="field"><input type="text" value="0" id="datepicker"  name="release_time" class="smallinput"></span>
    </p>   
    <p>
         <label>简介</label>
         <span class="field"><textarea name="intro" ></textarea> </span>
    </p>    
    
    <p>
         <label>电影人物</label>
         <span class="field">
         	<input type="text" id="minInput" name="person_id"  class="smallinput">
            <a href="javascript:void(0)" onclick="relate(this,'person_id','{{ url('person/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
         </span>
    </p>
        
    <p>
         <label>电影分类</label>
         <span class="field">
         	<input type="text" id="minInput" name="category_id"  class="smallinput">
            <a href="javascript:void(0)" onclick="relate(this,'category_id','{{ url('movieCategory/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
         </span>
    </p>
    
    <p>
         <label>所属国家</label>
         <span class="field">
         <select name="country_id" id="selection">
         @foreach(Country::orderBy('sort','desc')->orderBy('id','desc')->get() as $val)
            <option value="{{$val->id}}" >{{$val->name}}</option>
         @endforeach
        </select>
         </span>
    </p>    
    <p>
         <label>内容</label>
         <span class="field"><textarea name="content" id="content" ></textarea> </span>
    </p>     
    <p>
         <label>属性</label>
         <span class="field" style="padding:11px;">
         <input type="checkbox" name="status" value="1" checked="checked" style="opacity: 0;" >状态
         <input type="checkbox" name="tj" value="1" checked="checked" style="opacity: 0;" >推荐
         <input type="checkbox" name="is_news" value="1" checked="checked" style="opacity: 0;" >最新热播
         </span>
    </p>     
    <input type="hidden" name="add_time" value="{{ time() }}"/>
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
<script>
var url = '{{ url("uploadify/upload") }}';
uploadify('#uploadNewsImg',url);

function showUpload(obj){
	val = $(obj).val();
	if(val == 0){
		var html = '<button class="stdbtn btn_lime" id="uploadFile">Upload</button>';
		$(obj).after(html);
		uploadify('#uploadFile',url);
	} else{
		$(obj).parent().find("#uploadFile").remove();
	}
}



jQuery( "#datepicker" ).datepicker({
	 dateFormat:'yy/mm/dd',
	 changeMonth: true, 
	 changeYear: true,	
});

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

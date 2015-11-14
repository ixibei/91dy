@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/admin/kindeditor-4.1.7/lang/zh_CN.js"></script>
@include('admin.layouts.tips')

<div class="contenttitle2">
	<h3>电影资源 > 资源编辑</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>短标题</label>
         <span class="field"><input type="text" name="name" value="{{ $data['detail']->name }}"  class="smallinput"></span>
    </p>
    <p>
         <label>长标题</label>
         <span class="field"><input type="text" name="title" value="{{ $data['detail']->title }}"  class="longinput"></span>
    </p>
    <p>
         <label>点击次数</label>
         <span class="field"><input type="text" name="hits"  value="{{ $data['detail']->hits }}"  class="longinput"></span>
    </p>    
    <p>
         <label>评分</label>
         <span class="field"><input type="text" name="score" value="{{ $data['detail']->score }}"  class="longinput"></span>
    </p>
    <p>
         <label>SEO标题</label>
         <span class="field"><input type="text" name="s_title" value="{{ $data['detail']->s_title }}"  class="longinput"></span>
    </p>
    <p>
         <label>SEO关键字</label>
         <span class="field"><input type="text" name="s_keywords" value="{{ $data['detail']->s_keywords }}"  class="longinput"></span>
    </p>
    <p>
         <label>SEO描述</label>
         <span class="field"><input type="text" name="s_description" value="{{ $data['detail']->s_description }}"  class="longinput"></span>
    </p>
    <p>
         <label>排序</label>
         <span class="field"><input type="text"  value="{{ $data['detail']->sort }}"  name="sort" class="smallinput"></span>
    </p>   
    <p>
         <label>播放时间</label>
         <span class="field"><input type="text"  value="{{ $data['detail']->play_time }}"  name="play_time" class="smallinput"></span>
    </p>   
    <p>
         <label>导演</label>
         <span class="field">
         <select name="director_id" id="selection">
         	<option value="0">--请选择--</option>
         @foreach($data['director'] as $val)
            <option value="{{$val->id}}" @if($data['detail']['director_id'] == $val->id) selected @endif)>{{$val->name}}</option>
         @endforeach
        </select>
         </span>
    </p>     
    <p>
         <label>播放地址</label>
         <span class="field">
         	<input type="text"  name="url" class="smallinput" value="{{ $data['detail']->url }}">
             <select name="type" style="min-width:120px;" onchange="showUpload(this)">
                 @foreach($data['type'] as $key=>$val)
                 <option value="{{$val->id}}" @if($data['detail']->type == $val->id) selected @endif>{{$val->name}}</option>
                 @endforeach
                <option value="0" @if($data['detail']->type == 0) selected @endif>种子</option>                 
            </select>
            @if($data['detail']->type == 0)
            	<button class="stdbtn btn_lime" id="uploadFile">Upload</button>
            @endif
         </span>
    </p>   
    <p>
         <label>封面图</label>
         <span class="field" style="position:relative;">
         	<input type="text" name="img" class="smallinput" value="{{ $data['detail']->img }}">
            <button class="stdbtn btn_lime" id="uploadNewsImg">Upload</button>
         </span>
    </p>     
    <p>
         <label>上映时间</label>
         <span class="field"><input type="text" id="datepicker" value="{{ date('Y/m/d',$data['detail']->release_time) }}" name="release_time" class="smallinput"></span>
    </p>   
    <p>
         <label>简介</label>
         <span class="field"><textarea name="intro" >{{ $data['detail']->intro }}</textarea> </span>
    </p>    
    
    <p>
         <label>电影人物</label>
         <span class="field">
         	<input type="text" id="minInput" name="person_id"  class="smallinput">
            <a href="javascript:void(0)" onclick="relate(this,'person_id','{{ url('person/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
            
            @foreach(MoviePerson::where('movie_id','=',$data['detail']->id)->select('P.name','P.id')->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->get() as $val)
            	<span class="u-relation-name person_{{$val['id']}}">{{$val->name}}<input type="hidden" name="person_id[]" value="{{ $val->id }}"><span class="close">x</span></span>
            @endforeach
            
         </span>
    </p>
        
    <p>
         <label>电影分类</label>
         <span class="field">
         	<input type="text" id="minInput" name="category_id"  class="smallinput">
            <a href="javascript:void(0)" onclick="relate(this,'category_id','{{ url('movieCategory/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
            
            @foreach(MovieCategoryList::where('movie_id','=',$data['detail']->id)->select('C.name','C.id')->leftJoin('m_movie_category as C','C.id','=','m_movie_category_list.category_id')->get() as $val)
            	<span class="u-relation-name category_{{$val['id']}}">{{$val->name}}<input type="hidden" name="category_id[]" value="{{ $val->id }}"><span class="close">x</span></span>
            @endforeach   
                  
         </span>
    </p>
    
    <p>
         <label>所属国家</label>
         <span class="field">
         <select name="country_id" id="selection">
         @foreach(Country::orderBy('sort','desc')->orderBy('id','desc')->get() as $val)
            <option value="{{$val->id}}" @if($data['detail']->country_id == $val->id) selected @endif >{{$val->name}}</option>
         @endforeach
        </select>
         </span>
    </p>    
    <p>
         <label>内容</label>
         <span class="field"><textarea name="content" id="content" >{{ $data['detail']->content }}</textarea> </span>
    </p>     
    <p>
         <label>属性</label>
         <span class="field" style="padding:11px;">
         <input type="checkbox" name="status" value="1" @if($data['detail']->status == 1) checked @endif style="opacity: 0;" >状态
         <input type="checkbox" name="tj" value="1" @if($data['detail']->tj == 1) checked @endif style="opacity: 0;" >推荐
         <input type="checkbox" name="is_news" value="1" @if($data['detail']->is_news == 1) checked @endif style="opacity: 0;" >最新热播
         </span>
    </p>     
    <input type="hidden" name="id"  value="{{ $data['detail']->id }}"/>
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
<script>
var url = '{{ url("uploadify/upload") }}';
uploadify('#uploadNewsImg',url);
uploadify('#uploadFile',url);

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

@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<div class="contenttitle2">
	<h3>编辑话题</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>标题</label>
         <span class="field">
         	<input type="text" name="Poetryname" value="{{$data['detail']->Poetryname}}" class="smallinput">
            <select name="nclassid" id="parent" style="min-width:120px;">
                <option value="0">--请选择--</option>
                <option value="1" @if($data['detail']->nclassid == 1) selected @endif>古诗大全目录</option>
                <option value="2" @if($data['detail']->nclassid == 2) selected @endif>古代诗人</option>
            </select> 类别
         </span>
    </p>
    <p>
         <label>文件名称</label>
         <span class="field"><input type="text" name="filename" value="{{$data['detail']->filename}}" class="smallinput"> </span>
    </p>
    <p>
         <label>关键字</label>
         <span class="field"><input type="text" name="tags" value="{{$data['detail']->tags}}" class="smallinput"> <input type="text" name="hits" value="{{$data['detail']->hits}}" style="width:80px;"/> 人气</span>
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
         <span class="field"><textarea name="Descriptions" >{{$data['detail']->Descriptions}}</textarea> </span>
    </p>
    <p>
         <label>内容</label>
         <span class="field"><textarea name="content" style="height:80px;">{{$data['detail']->content}}</textarea> </span>
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
    	<input type="hidden" name="id" value="{{$data['detail']->id}}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

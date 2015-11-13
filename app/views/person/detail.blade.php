@extends('layouts.header')
@section('contents')
<link href="http://www.qulishi.com/css/topic_20121122_ren.css" rel="stylesheet">
<link href="http://www.qulishi.com/css/common_v.css" rel="stylesheet">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?55f72d6a40530a8c1fc58e713a1c13df";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<div class="box1 clearfix">
		<div class="w288">
			<div class="bigpic">
				<img src="{{$data['detail']['rwbigpic']}}" alt="{{$data['detail']['rwname']}}">
				<strong class="name"><h1>{{$data['detail']['rwname']}}({{$data['detail']['birthday']}}{{$data['detail']['deathday']}})</h1></strong>
			</div>
			<h2>{{$data['detail']['rwname']}}的资料</h2>
			<div class="ziliao">
				<?php $content = explode('<hr style="page-break-after:always;" class="ke-pagebreak" />',$data['detail']['content']);?>
                {{$content[0]}}
			</div>
			<h2>最新人物</h2>
			<div class="renwu clearfix">
            	@foreach($data['newPerson'] as $val)
                <a href="{{$domain}}renwu/{{str_replace('/index','',$val->filename)}}/" target="_blank"><img src="{{$val->rwsmallpic}}">{{$val->rwname}}</a>			
                @endforeach
                </div>
            <h2>其他{{strtoupper(substr($data['detail']['filename'],0,1))}}开头的人物<span style="float:right"><a href="/renwu/list_{{substr($data['detail']['filename'],0,1)}}.htm">更多</a></span></h2>
            <div class="renwut clearfix">
            	@foreach($data['relatePerson'] as $key=>$val)
                @if($key < 24)
            	<a href="{{$domain}}renwu/{{str_replace('/index','',$val->filename)}}/" target="_blank">{{$val->rwname}}</a> 
                @endif
                @endforeach
            </div>
            
            <h2>{{$data['detail']['classname']}}其它的人物<span style="float:right"><a href="/renwu/list_{{str_replace('/index','',$data['detail']['DFilename'])}}.htm">更多</a></span></h2>
            <div class="renwut clearfix"> 
            	@foreach($data['relateDynastyPerson'] as $val)
            	<a href="{{$domain}}renwu/{{str_replace('/index','',$val->filename)}}/" target="_blank">{{$val->rwname}}</a> 
                @endforeach
			</div>
            
           </div>
		<div class="w669">
			{{$content[1]}}
            <h2>与<span>{{$data['detail']['rwname']}}</span>相关的历史人物</h2>
<style type="text/css">
.xg_rw{ width:635px; overflow:hidden; margin:auto; padding:5px 0px 0px 0px;}
.xg_rw a{ display:block; width:70px; float:left; line-height:30px; font-size:14px; color:#333;}
</style>
<div class="xg_rw">
	@if(isset($data['detail']['relatePerson']))
	@foreach($data['detail']['relatePerson'] as $val)
	<a href="{{$domain}}renwu/{{str_replace('/index','',$val['filename'])}}/" target="_blank">{{$val['rwname']}}</a>
    @endforeach
    @endif
</div>	

@for($i=1; $i<6; $i++)
@if($data['detail']['memoname'.$i])
<h2><span>{{$data['detail']['rwname']}}</span>{{$data['detail']['memoname'.$i]}}</h2>
<ul class="newslist clearfix">
	@if(isset($data['detail']['relateNews'.$i]))
    @foreach($data['detail']['relateNews'.$i] as $val)
	<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank" title="{{$val['newstitle']}}">{{$val['newstitle']}}</a></li>
    @endforeach
    @endif
</ul>
@endif
@endfor

			<h2><span>{{$data['detail']['rwname']}}</span>最新文章</h2>
			<ul class="newslist clearfix">
            	@foreach($data['detail']['likeNews'] as $val)
                <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank" title="{{$val['newstitle']}}">{{$val['newstitle']}}</a></li>			
                @endforeach
            </ul>
		</div>
	</div>
		<style>
	.letters_index{ margin:0 auto;width:958px; height:auto; background:#fff; border:1px solid #ccc; margin-top:8px;}
.letters{width:946px; height:100px; line-height:25px; background:#f3f5f7; border:1px solid #fff; border-bottom:none !important; padding:5px;}
.initials{ display:block; float:left;}
.initials span{background:url(/images/strategy_icon.gif) no-repeat 10px 2px;line-height:23px; height:23px; padding-left:26px; color:#711221; font-size:13px;}
.initials a,.initials a:visited,.initials a:hover,.initials a:active{ font-family:Arial, Helvetica, sans-serif; font-size:13px; margin:0 8px;}
.showhot{ display:block; float:right; padding-right:12px; font:normal 12px/28px simsun; position:relative;_top:4px;}
.showhot em{ font-style:normal;height:23px; line-height:23px; color:#666; margin-left:3px; display:inline-block;}
	</style>
    
@include('comman.twentySixLetterAndDynasty')
@include('layouts.footerPerson')
@stop
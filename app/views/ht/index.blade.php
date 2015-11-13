@extends('layouts.header')
@section('contents')
<link href="{{$domain}}/css/common_v.css" rel="stylesheet">
<link href="{{$domain}}/css/list.css" rel="stylesheet">
<link rel="stylesheet" href="{{$domain}}/css/lzpht.css">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?55f72d6a40530a8c1fc58e713a1c13df";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<div class="htMianBd" style=" margin-top:10px;">
	<div class="ht2Location">当前位置：<a href="{{$domain}}">首页</a><i>></i><a href="/huati/">历史话题</a></div>
	<div class="ht2MianList">
		<h4 class="ht2MianListTit">话题（共有<span>{{$data['count']}}</span>个话题）</h4>
		<ul class="ht2MianListCon">
        @foreach(Ht::getHtCondition('tj',1,'id',2) as $val)
			<li>
            	<a href="/huati/{{str_replace('/index','',$val->filename)}}/" target="_blank" title="{{$val->ftname}}" class="ht2Img"><img src="/UploadFile/2015-10/20151012184252.jpg"><span>{{$val->ftname}}列表</span></a><p>{{mb_substr(strip_tags($val->content),0,150,'utf-8')}}... <a href="/huati/{{str_replace('/index','',$val->filename)}}/">【查看更多】</a></p>
            </li>		
         @endforeach
		</ul>
	</div>
	<div class="ht2Special" id="ht2Special">
		<div class="ht2SpecialTitle clearfix">
			<h4 class="ht2Icon">往期话题</h4>
			<ul class="ht2gTabNav clearfix">
				<!--<li class="active">往期专题</li>
				<li>往期专题</li>-->
			</ul>
		</div>
		<ul class="ht2SpecialList clearfix ht2TabList" style="display:block;">
        	@foreach(Ht::getHtpage($data['currentPage']) as $key=>$val)
	            <li><a href="/huati/{{str_replace('/index','',$val->filename)}}/" target="_blank" title="{{$val->ftname}}"><img src="{{$val->ftpic}}"><span>{{$val->ftname}}</span></a></li>		
            @endforeach
            </ul>		
		<div class="lzpTrunPage">
			{{$data['pages']}}
		</div>		
	</div>	
</div>
@include('layouts.footerPerson')
@stop
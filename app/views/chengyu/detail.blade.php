<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$data['detail']->chengyu}}_成语大全-趣历史</title>
<meta name="keywords" content="{{$data['detail']->chengyu}},成语大全,成语故事,成语词典,四字成语,成语接龙" />
<meta name="description" content="趣历史网成语频道为您提供最新成语大全,成语故事,成语词典,四字成语,成语接龙等资料。" />
<meta name="mobile-agent" content="format=xhtml;url=[MURL]" />
<link href="http://www.qulishi.com/css/common_v.css" rel="stylesheet">
<link rel="stylesheet" href="/css/cymian.css">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?55f72d6a40530a8c1fc58e713a1c13df";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<div class="cy-header"></div>
<div class="cy-Nav">
  <ul>
    <li><a href="/chengyu/">首页</a></li>
    <li><a href="/chengyu/">成语检索</a></li>
    <li><a href="{{$domain1}}chengyu/" target="_blank">历史成语故事</a></li>
    <li><a href="/chengyu/#cymr">成语名人</a></li>
    <li><a href="/chengyu/#phb">成语点击排行榜</a></li>
  </ul>
</div>
<div class="cy-search-mod">
  <div class="cy-search-at">
    <form name="search" action="/chengyu_search.html" method="get">
      <input name="keyword" type="text" class="cy-search-text"  placeholder='请输入关键词'>
      <input type="submit" class="cy-search-btn" value="查&nbsp;询">
    </form>
  </div>
  <div class="cy-search-spe"> 按拼音检索：
    @foreach($data['twentySixLetter'] as $val) <a href="/chengyu/{{$val}}/">{{$val}}</a> @endforeach </div>
</div>
<div class="cy-class-all">
  <div class="cy-class-allMod">
    <h2 class="cate_title_de">【成语】{{$data['detail']->chengyu}}</h2>
    
    <div class="ancient_detail">
      <p><em>【读&nbsp;&nbsp;音】：</em><span class="py">{{$data['detail']->duyin}}</span></p>
      <p><em>【释&nbsp;&nbsp;义】：</em><span>{{$data['detail']->shiyi}}</span></p>
      <p><em>【出&nbsp;&nbsp;自】：</em><span>{{$data['detail']->laiyuan}}</span></p>
      <p><em>【近义词】：</em><span>{{$data['detail']->jinyici}}</span></p>
      <p><em>【反义词】：</em><span>{{$data['detail']->fanyici}}</span></p>
    </div>
    
    <div class="cy-class-cate-title">成语接龙</div>
    <div class="ancient_detail">
    	<p>
        	<em>【顺接】：</em>
            <span>
            @if($data['jielongFirst'])
            	@foreach($data['jielongFirst'] as $val)
            	<a href="/chengyu/{{$val['id']}}.html">{{$val['chengyu']}}</a>
                @endforeach
            @else已到龙尾@endif
            </span>
        </p>
        <p>
        <em>【反接】：</em>
	        <span>
			@if(!empty($data['jielongEnd']))
            	@foreach($data['jielongEnd'] as $val)
            	<a href="/chengyu/{{$val['id']}}.html">{{$val['chengyu']}}</a>
                @endforeach
            @else已到龙尾
            @endif      
            </span>  
        </p>
    </div>    
    <div class="cy-class-cate-title">相关成语</div>
    
    <ul class="cy-class-cate-list clearfix">
    	<?php $arr = explode(',',$data['detail']['tags']);?>
    	@foreach(Chengyu::where('tags','like','%'.$arr[0].'%')->select('id','chengyu')->orderBy('id','desc')->take(20)->get() as $val)
    	<li><a href="/chengyu/{{$val->id}}.html">{{$val->chengyu}}</a></li>
        @endforeach
     </ul>    
    
    </div>
</div>
@include('layouts.footerPerson')

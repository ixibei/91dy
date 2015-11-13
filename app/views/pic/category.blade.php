<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{$seo['Tilte']}}</title>
<meta content="{{$seo['Keywords']}}" name="keywords">
<meta content="{{$seo['Descriptions']}}"  name="description">
<meta name="mobile-agent" content="format=xhtml;url=m.qulishi.com{{$_SERVER['REQUEST_URI']}}" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/css/photostyle.css">
<style>
.j31turnPage{ text-align: center;}
.j31turnPage span, .j31turnPage a{ display: inline-block; line-height: 22px; height: 22px; vertical-align: middle;}
.j31turnPage a{ width: 22px; text-align: center; border: 1px solid #cccccc;}
.j31turnPage a:hover, .j31turnPage .active{ text-decoration: none; color: #fff; background: #d31119;}
.j31turnPage .j31Prev, .j31turnPage .j31Next{ width: 56px;}
.j31turnPage span{ margin-right: 10px;}
</style>
</head>
<body>
<div class="photo5Header clearfix">
	<div class="fl clearfix">
		<a href="http://www.qulishi.com" class="photo5Logo"><img src="/images/lzp_logo.jpg" alt="趣历史"></a>
		<i>—</i>
		<span>{{$data['nav']->classname}}</span>
	</div>
		<form target="_blank" name="search" method="get" action="/search/">
	<div class="fr clearfix">
		<a href="/" class="photo5GoHome">首页</a>
<div class="photo5SearchBox">
			<input name="skey" type="text" class="photo5SearchText" value="搜索图片">
			<input type="button"  class="photo5SearchBtn">
		</div>
	</div></form>
</div>
<div class="imgCollection">
	<ul class="w960">
		<li @if($data['nav']['filename'] == 'pic') class="active" @endif><a href="/pic/">全部</a></li>
		<li @if($data['nav']['filename'] == 'niandaixiezhen') class="active" @endif><a href="/niandaixiezhen/">年代写真</a></li>
		<li @if($data['nav']['filename'] == 'junshizhanshi') class="active" @endif>><a href="/junshizhanshi/">战争实录</a></li>
		<li @if($data['nav']['filename'] == 'renwujiuying') class="active" @endif><a href="/renwujiuying/">人物旧影</a></li>
		<li @if($data['nav']['filename'] == 'qiwequtu') class="active" @endif><a href="/qiwequtu/">奇闻趣图</a></li>
	</ul>
</div>
<div class="w960">
	<ul class="clearfix imgCollectionList">
    	@foreach($data['newsList'] as $val)
		<li>
        	<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="imgBox"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}"></a>
            <a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="imgTItle">{{mb_substr($val->minititle,0,12,'utf-8')}}</a>
            <p>{{mb_substr(strip_tags($val->content),0,50,'utf-8')}}</p>
           <div class="liHovers"><span>{{date('m-d H:i:s',strtotime($val->AddTime))}}</span>
           		<?php $arr = explode(',',$val->keywords);?>
                @if($arr)
                @foreach($arr as $v)
        	   	<a href="{{$domain}}search/{{$v}}/">{{$v}}</a>
                @endforeach
                @endif
            </div>
        </li>
        @endforeach
	</ul>
    
    
    <div class="j31turnPage">
		{{$data['pages']}}			
	</div>

</div>
<div class="photo5Footer">
<p>COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
 联系QQ：2506589242 <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
</p></div>	<!-- 广告位：全站富媒体 -->
<script type="text/javascript" src="{{$domain}}bg/qlsfmt.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中国古代美女_趣历史</title>
<meta name="keywords" content="中国古代十大美女排行榜,中国古代十大美女,古代美女,古代,美女,往事" />
<meta name="description" content="趣历史为你提供中国古代十大美女排行榜"/>
<meta name="mobile-agent" content="format=xhtml;url=http://m.qulishi.com/jingdianmeinv/" />
<link rel="stylesheet" href="/css/beaty.css">
<script src="/js/jquery.js"></script>
</head>
<body style="background:#fff;">
<div style="width:100%; height:33px; background:#fff;"><div id="site_nav">
		<span class="site_navl"><a href="http://www.qulishi.com/">趣历史首页</a>|&nbsp;&nbsp;讲述历史上那些有趣的事</span>
		<span class="site_navr"><code id="fav">加入收藏夹</code>-<a href="http://www.qulishi.com/Desktop">放到桌面</a></span>
	</div>
</div>
<div class="anBeautyHeader"></div>

<div class="anBeautyPeople">
	<div class="anBeautyTitle">
		<h4 class="fl">热门推荐</h4>
			<div class="anBeautyPeoPleTurn">{{$data['keyword']}}</div>
</div>
	<ul class="clearfix anBeautyPeoList" style="height:auto">
    @if($data['detail'])
	@foreach($data['detail'] as $val)
		<li>
			<a href="{{$domain}}renwu/{{ $val['filename'] }}">
			<img src="{{ $val['rwsmallpic'] }}" alt="{{ $val['rwname'] }}">
				<span>{{ $val['rwname'] }}</span>
			</a>
		</li>
	@endforeach
    @endif
	</ul>
</div>
<div class="hr hr20"></div>
<!--主体内容    结束-->
<div class="footer">
<p>COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
 联系QQ：2506589242 <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
</p>
</div>

</body>
</html>
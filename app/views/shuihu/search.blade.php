<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>水浒传_趣历史</title>
<meta name="keywords" content="水浒传,水浒传108将,水浒传全集,水浒传人物介绍,新水浒传" />
<meta name="description" content="趣历史为你提供水浒传108将人物介绍"/>
<meta name="mobile-agent" content="format=xhtml;url=http://m.qulishi.com/" />
<link rel="stylesheet" href="/css/beaty.css">
<link rel="stylesheet" href="/css/shz.css">
<script src="/js/jquery.js"></script>
<script src="/js/jqScrollImg.js"></script>
<base target="_blank">
</head>

<body style="background:#fff;">
<div style="width:100%; height:33px; background:#fff;"><div id="site_nav">
		<span class="site_navl"><a href="{{$domain}}">趣历史首页</a>|&nbsp;&nbsp;讲述历史上那些有趣的事</span>
		<span class="site_navr"><code id="fav">加入收藏夹</code>-<a href="{{$domain}}Desktop">放到桌面</a></span>
	</div>
</div>
<div class="shz_banner">
	<div class="shz_banner_main" id="shz_banner_main">
		<!--<h2 class="shz_mian_title"><a href="javascript:;">一百单八将</a></h2>-->
		<div class="shz_bg">
			<span class="shz_prev"></span>
			<div class="shz_banner_box">
				<ul class="clearfix">
                	@foreach(Person::getLikePerson('水浒',16,'tags') as $key=>$val)
					<li>
						<a href="{{$domain}}renwu/{{$val['filename']}}/">
							<img src="{{$val['rwbigpic']}}" alt="{{$val['rwname']}}">
						</a>
					</li>
                    @endforeach
				</ul>
			</div>
			<span class="shz_next"></span>
		</div>
	</div>
</div>
<div class="clearfix shz_p1">

<!--人物推荐-->
<div class="anBeautyPeople" style="border-color:#775947;" id="shz_people">
	<div class="anBeautyTitle">
		<h4 class="fl">热门推荐</h4>
	</div>
	<ul class="clearfix anBeautyPeoList" style="height:auto">
    	@if(!$data['detail'])
        <Div style=" padding:150px;">没有相关内容</Div>
        @else
        @foreach($data['detail'] as $val)
		<li>
		<a href="{{$domain}}renwu/{{$val['filename']}}">
			<img src="{{$val['rwsmallpic']}}" alt="{{$val['rwname']}}">
				<span>{{$val['rwname']}}</span>
			</a>
		</li>
        @endforeach					
        @endif
	</ul>
</div>
<script>
$(function(){

	//banner
	$('#shz_banner_main').jqScrollImg({
		oUl: $('#shz_banner_main ul'),		//无缝滚动的容器
		oLi: $('#shz_banner_main ul li'),	//容器内数列
		oNext: $('#shz_banner_main .shz_next'),	//下一页按钮（选填）
		oPrev: $('#shz_banner_main .shz_prev'),	//上一页按钮（选填）
		//oTtitle:$('#fn105_foucs .n105_foucs_title'),//标题
		//aNum: $('#fn105_foucs .n105_num span'),//索引
		//oPage: $('#foucsImg .foucsPage'),//页码
		//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
		times: false,	//是否自动播放，及播放间隔
		runNum: 1,		//每次滚动的数量（选填）
		timers: 500, //切换时间
		oLeft : 'left'
	});	

	var arrs=[
	@foreach(Slide::getCategorySlide(42,5) as $val)
		{'title': '{{$val->ftitle}}', 'text': '{{$val->ftitle}}...'},
	@endforeach
	]
	

	//焦点图滚动
	$('#shz_p1_scroll_main').jqScrollImg({
		oUl: $('#shz_p1_scroll_main ul'),		//无缝滚动的容器
		oLi: $('#shz_p1_scroll_main ul li'),	//容器内数列
		//oNext: $('#shz_banner_main .shz_next'),	//下一页按钮（选填）
		//oPrev: $('#shz_banner_main .shz_prev'),	//上一页按钮（选填）
		//oTtitle:$('#fn105_foucs .n105_foucs_title'),//标题
		aNum: $('#shz_p1_scroll_main .shz_scroll_num span'),//索引
		//oPage: $('#foucsImg .foucsPage'),//页码
		//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
		times: 5000,	//是否自动播放，及播放间隔
		runNum: 1,		//每次滚动的数量（选填）
		timers: 500, //切换时间
		oLeft : 'left',
		fn: function(i){
			$('#shz_scroll_info h3').html(arrs[i].title);
			$('#shz_scroll_info p').html(arrs[i].text);
		}
	});	

	//热门推荐
	$('#shz_p1_hotList li').each(function(){
		$(this).mouseover(function(){
			$('#shz_p1_hotList li .shz_p1_hotShow').hide();
			$(this).find('.shz_p1_hotShow').show();
		});
	});

	//美女分类
	(function(){
		var oNext = $('#anBeautyClassTrue .anBeatyNext');
		var oPrev = $('#anBeautyClassTrue .anBeatyPrev');
		var oScrollBox = $('#anBeautyClassSrcollBox');
		var aUl = oScrollBox.find('ul');
		var oNe = parseInt(aUl.eq(0).outerWidth(true));
		var iNow = 0;
		function srcollFn(iNow){
			step = iNow * oNe;
			oScrollBox.stop().animate({'left': -step}, 500);
			if(iNow == aUl.length-1){
				oPrev.removeClass('anBeatyOn');
			}else{
				oPrev.addClass('anBeatyOn');
			};
			if(iNow == 0){
				oNext.removeClass('anBeatyOn');
			}else{
				oNext.addClass('anBeatyOn');
			};			
		}
		oPrev.click(function(){
			if(iNow == aUl.length-1){
				return false;
			}else{
				iNow++;
				srcollFn(iNow);				
			}
		});
		oNext.click(function(){
			if(iNow <= 0){
				return false;
			}else{
				iNow--;
				srcollFn(iNow);				
			}
		});		
	})();
	//人物大全
	(function(){
		var oBtn = $('#anBeautyPeoPleTurn');
		var oIcon = oBtn.find('span');
		var oCon = $('#anBeautyPeoList');
		oBtn.toggle(function(){
			oCon.css('height', 'auto');
			$(this).html('收起'+'<span class="anBeatyOn"></span>');
		}, function(){
			oCon.css('height', '360px');
			$(this).html('展开'+'<span></span>');
		});
	})();
});
</script><div class="footer">
<p>COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
 联系QQ：2506589242 <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
</p>
</div>

</body>
</html>
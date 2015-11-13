<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>中国古代美女_趣历史</title>
<meta name="keywords" content="中国古代十大美女排行榜,中国古代十大美女,古代美女,古代,美女,往事" />
<meta name="description" content="趣历史为你提供中国古代十大美女排行榜"/>
<meta name="mobile-agent" content="format=xhtml;url=http://m.qulishi.com/jingdianmeinv/" />
<link rel="stylesheet" href="/css/beaty.css">
<script src="/js/jquery.js"></script>
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
<body style="background:#fff;">
<div style="width:100%; height:33px; background:#fff;"><div id="site_nav">
		<span class="site_navl"><a href="{{$domain}}">趣历史首页</a>|&nbsp;&nbsp;讲述历史上那些有趣的事</span>
		<span class="site_navr"><code id="fav">加入收藏夹</code>-<a href="{{$domain}}Desktop">放到桌面</a></span>
	</div>
</div>
<div class="anBeautyHeader"></div>
<div class="anBeauty clearfix">
	<div class="anBeatyFocus fl" id="anBeatyFocus">
		<ul class="anBeatyFocusBig" id="anBeatyFocusBig">
        	@foreach(Slide::getCategorySlide(41,12) as $key=>$val)
			<li @if($key == 0)style="z-index:1" @endif><a href="{{$val->furl}}"><img src="{{$val->bpic}}" alt="{{$val->ftitle}}"></a></li>
            @endforeach
		</ul>
		<div class="anBeatyFocusSim">
			<div class="anBeatyNext" title="上一张图片"></div>
			<div class="anBeatyScsimIm" id="anBeatyScsimIm">
				<ul>
                   	@foreach(Slide::getCategorySlide(41,12) as $key=>$val)
					<li @if($key == 0)class="active"@endif><img src="{{$val->bpic}}" alt="{{$val->ftitle}}"></li>
                    @endforeach
				</ul>				
			</div>
			<div class="anBeatyPrev" title="下一张图片"></div>
		</div>
	</div>
	<ul class="anBeatyRiImgList clearfix">
    	@foreach(Person::getLikePerson('美女',200,'tags') as $key=>$val)
        @if($key<6)
		<li>
			<a href="{{$domain}}renwu/{{$val['filename']}}/">
				<img src="{{$val['rwsmallpic']}}" alt="{{$val['rwname']}}">
				<span>{{$val['rwname']}}</span>
			</a>
		</li>
        @endif
        @endforeach
	</ul>
</div>
<div class="hr hr20"></div>
<!--推荐 搜索 专题-->
<div class="anBeauty clearfix">
	<!--推荐-->
	<div class="anBeautyRec fl">
		<div class="anBeautyTitle">
			<h4 class="fl">热门推荐</h4>
			<a href="javascript:;" class="anBeautyMore" title="更多"></a>
		</div>
		<ul class="anBeautyRecList">
        	@foreach(News::where('newstitle','like','%美女%')->where('yc','=',1)->orderBy('id','desc')->take(4)->get() as $key=>$val)
			<li class="clearfix">
				<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="anImgBox"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}"></a>
				<dl>
					<dt><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></dt>
					<dd class="anBeautyInfo"><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html"> {{mb_substr(strip_tags($val->content),0,25,'utf-8')}}</a></dd>
					<dd class="anBeautyTimer">{{$val->newstitle}}</dd>
				</dl>
			</li>
            @endforeach
		</ul>
	</div>
	<!--搜索-->
	<div class="anBeautySech fl">
		<h3>搜索</h3>
		<div class="anBeauSearBox">

            					<form target="_blank" name="search" method="get" action="/gudaimeinv/search/">
<input type="text" class="anBeauSearchText" name="skey" >
				<button type="submit" class="anBeauSearchBtn"></button></form>

            
		</div>
		<div class="anBeauBorder"></div>
		<h4>按朝代查询</h4>
		<ul class="anBeauChao clearfix">
			<li><a href="/gudaimeinv/list_19.html">夏朝</a></li>
			<li><a href="/gudaimeinv/list_20.html">商朝</a></li>
			<li><a href="/gudaimeinv/list_21.html">周朝</a></li>
			<li><a href="/gudaimeinv/list_22.html">春秋</a></li>
			<li><a href="/gudaimeinv/list_23.html">秦朝</a></li>
			<li><a href="/gudaimeinv/list_24.html">汉朝</a></li>
			<li><a href="/gudaimeinv/list_25.html">三国</a></li>
			<li><a href="/gudaimeinv/list_26.html">晋朝</a></li>
			<li><a href="/gudaimeinv/list_27.html">南北朝</a></li>
			<li><a href="/gudaimeinv/list_29.html">隋朝</a></li>
			<li><a href="/gudaimeinv/list_30.html">唐朝</a></li>
			<li><a href="/gudaimeinv/list_31.html">五代</a></li>
			<li><a href="/gudaimeinv/list_32.html">宋朝</a></li>
			<li><a href="/gudaimeinv/list_33.html">元朝</a></li>
			<li><a href="/gudaimeinv/list_34.html">明朝</a></li>
			<li><a href="/gudaimeinv/list_35.html">清朝</a></li>
		</ul>
		<h4>按朝代查询</h4>
		<ul class="clearfix anBeauLetter">
        	@foreach($data['twentySixLetter'] as $val)
			<li><a href="/gudaimeinv/list_{{$val}}.html">{{$val}}</a></li>
			@endforeach
		</ul>
	</div>
	<!--专题-->
	<div class="anBeautySpe fr">
		<div class="anBeautySpeCon">
        	@foreach(Ht::where('tags','like','%美女%')->where('tj','=',1)->take(4)->orderBy('id','desc')->get() as $key=>$val)
            @if($key==0)
			<div class="anBeautySpeTops">
				<a href="{{$domain}}huati/{{$val->filename}}/">
					<img src="{{$val->ftpic}}" alt="{{$val->ftname}}">
					<span>{{$val->ftname}}</span>
				</a>
			</div>
            @else
			@if($key==1)<ul>@endif
				<li class="clearfix">
					<a href="{{$domain}}huati/{{$val->filename}}/" class="anImgBox"><img src="{{$val->ftpic}}" alt="{{$val->ftname}}"></a>
					<dl>
						<dt><a href="{{$domain}}huati/{{$val->filename}}/">{{$val->ftname}}</a></dt>
						<dd class="anBeautyInfo"><a href="{{$domain}}huati/{{$val->filename}}/">{{mb_substr(strip_tags($val->content),0,35,'utf-8')}}</a></dd>
					</dl>
				</li>
			@if($key==3)</ul>@endif
            @endif
            @endforeach
		</div>
	</div>
</div>
<div class="hr hr30"></div>
<!--人物推荐-->
<div class="anBeautyPeople">
	<div class="anBeautyTitle">
		<h4 class="fl">热门推荐</h4>
		<div class="anBeautyPeoPleTurn" id="anBeautyPeoPleTurn">展开<span></span></div>
	</div>
	<ul class="clearfix anBeautyPeoList" id="anBeautyPeoList">
	   	@foreach(Person::getLikePerson('美女',200,'tags') as $val)
		<li>
			<a href="{{$domain}}renwu/{{$val['filename']}}/">
				<img src="{{$val['rwsmallpic']}}" alt="{{$val['rwname']}}">
				<span>{{$val['rwname']}}</span>
            </a>
		</li>
	     @endforeach
	</ul>
</div>
<div class="hr hr20"></div>
<!--美女分类   最新动态-->



<div class="anBeauty clearfix">
	<div class="anBeautyClass">
		<div class="anBeautyTitle">
			<h4 class="fl">热门推荐</h4>
			<div class="anBeautyClassTrue" id="anBeautyClassTrue">
				<span class="anBeatyNext anBeatyOn"></span>
				<span class="anBeatyPrev anBeatyOn"></span>
			</div>
		</div>
		<div class="anBeautyClassList clearfix">
			<div class="clearfix anBeautyClassSrcollBox" id="anBeautyClassSrcollBox" style="left:0;">            
            	@foreach(Ht::getHtTagsLike('%美女%','meinv',12) as $key=>$val)
				@if($key==0 || $key==4 || $key == 8)<ul>@endif
                	@if($key%2==0)
					<li class="clearfix anBeautyClassIgL">
						<a href="{{$domain}}huati/{{$val->filename}}/" class="anImgBox">
							<img src="{{$val->ftpic}}" alt="{{$val->ftname}}">
							<span>{{$val->ftname}}</span>
						</a>
						<dl>
							<dt><a href="{{$domain}}huati/{{$val->filename}}/">{{$val->ftname}}</a></dt>
							<dd class="anBeauBorder"></dd>
							<dd class="anBeautyInfo"><a href="{{$domain}}huati/mgsidameinv/">{{$val->descriptions}}</a></dd>
						</dl>
					</li>
                    @else
					<li class="clearfix anBeautyClassIgR">
						<a href="{{$domain}}huati/{{$val->filename}}/" class="anImgBox">
							<img src="{{$val->ftpic}}" alt="{{$val->ftname}}">
							<span>{{$val->ftname}}</span>
						</a>
						<dl>
							<dt><a href="{{$domain}}huati/{{$val->filename}}/">{{$val->ftname}}</a></dt>
							<dd class="anBeauBorder"></dd>
							<dd class="anBeautyInfo"><a href="{{$domain}}huati/{{$val->filename}}/">{{$val->descriptions}}</a></dd>
						</dl>
					</li>
                    @endif
    				@if($key==3 || $key == 7 || $key==11)</ul>@endif
				@endforeach
			</div>					
		</div>
	</div>
    
	<div class="anBeautyNews">
		<div class="anBeautyTitle">
			<h4 class="fl">最新动态</h4>
			<a href="javascript:;" class="anBeautyMore" title="更多"></a>
		</div>
		<ul>
        	@foreach(News::where('newstitle','like','%美女%')->orderBy('id','desc')->take(12)->get() as $val)
 			<li>
				<span>{{substr($val['AddTime'],0,10)}}</span>
				<i></i>
				<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="anImgBox">{{$val->newstitle}}</a>
          </li>					
          @endforeach
		</ul>
	</div>
</div>


<!--主体内容    结束-->
<div class="footer">
<p>COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
 联系QQ：2506589242 <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
</p>
</div>

<script>
$(function(){
	//相册
	(function(){
		var oBox = $('#anBeatyFocus');
		var aBigImg = $('#anBeatyFocusBig li');
		var oNext = $('#anBeatyFocus .anBeatyNext');
		var oPrev = $('#anBeatyFocus .anBeatyPrev');
		var oSimImgBox = $('#anBeatyScsimIm ul');
		var aSimIMg = oSimImgBox.find('li');
		var num = 0;
		var oNe = parseInt(aSimIMg.eq(0).outerHeight(true));
		var timer = null;
		//var mun = 1;

		//初始化
		oSimImgBox.css('height', oNe*aSimIMg.length);
		function int(num){
			aBigImg.css({'opacity': '0.3', 'z-index': 0}).hide();
			aBigImg.eq(num).css({'z-index': 1}).show().stop().animate({'opacity':'1'}, 500);
			aSimIMg.removeClass('active');
			aSimIMg.eq(num).addClass('active');	
			//iNum = num;
			if(num==0 || num==1)
			{
				oSimImgBox.stop().animate({top: 0}, 500);
			}
			else if(num==aSimIMg.length-1)
			{
				oSimImgBox.stop().animate({top: -(num-1)*oNe}, 500);
			}
			else
			{
				oSimImgBox.stop().animate({top: -(num-1)*oNe}, 500);	
			}					
		}
		int(0);
		
		aSimIMg.each(function(){
			$(this).click(function(){
				num = $(this).index();
				int(num);
			});
		});

		function prevPage(){
			num++;
			if(num == aSimIMg.length){
				num=0;
			}
			int(num);			
		}

		oBox.mouseover(function(){
			clearInterval(timer);
		});
		oBox.mouseout(function(){
			timer = setInterval(prevPage, 5000);
		});		

		timer = setInterval(prevPage, 5000);
		oPrev.click(function(){
			prevPage();
		});
		oNext.click(function(){
			num--;
			if(num == -1){
				num=aSimIMg.length-1;
			}
			int(num);
		});
	})();
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
</script>
</body>
</html>
@extends('layouts.header')
@section('contents')
<link href="http://www.qulishi.com/css/common_v.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://www.qulishi.com/css/news_list.css">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?55f72d6a40530a8c1fc58e713a1c13df";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();

function zl07Tab(arg1, arg2){
	//tabNav
	var aNav =$(arg1);
	aNav.each(function(){
		if(!arg2){
			$(this).mouseover(function(){
				var oNavParent =$(this).parents('.zl07NavParent');
				var aList=oNavParent.siblings('.zl07ListParent').find('.zl07ListTab');
				var n=$(this).index();

				$(this).siblings().removeClass('active');
				$(this).addClass('active');

				aList.hide();
				aList.eq(n).show();
			});
		}
	});
}
$(function(){
	function showLi(obj){
		var aLi=$(obj).find('li');
		aLi.each(function(){
			$(this).mouseover(function(){
				$(this).siblings().removeClass('active');
				$(this).addClass('active');
			});			
		});

	}
	showLi('#js31B1Li');

	$('#j31List .js31Item').hover(function(){
		$(this).addClass('active');
	}, function(){
		$(this).removeClass('active');
	});
	//选项卡
	zl07Tab('.j31RightNav li');
});	
</script>
<div class="clearfix j31Cont">
  <div class="js31Loch fl"><a href="/">首页</a> <i>&gt;</i> <span>{{$data['category']->classname}}</span> </div>
  <div id="top_s" class="fr">
    <form target="_blank" name="search" method="get" action="/search/">
      <input name="skey" type="text" x-webkit-grammar="builtin:translate" x-webkit-speech="" autofocus="true" autocomplete="off" placeholder="搜索一下你就知道" id="sear_input" class="top_ss">
      <input type="submit" name="button" id="button" value="" class="top_s_botton">
    </form>
  </div>
</div>
<div class="clearfix j31Cont"> 
  <!--left start-->
  <div class="j31Left fl">
    <div class="j31List" id="j31List">

    	<!--头条-->
        @if($data['headline'])
      <div class="js31Item" onmouseover="setShare('{{$data['headline']['newstitle']}}', '{{$domain}}news/{{substr(str_replace('-','',$data['headline']['AddTime']),0,6)}}/{{$data['headline']['id']}}.html','{{mb_substr(strip_tags($data['headline']['content']),0,40,'utf-8')}}');">
        <h3 class="j31TopItemTitle">
        	<span class="js31TopIcon">头条</span>
            <a href="{{$domain}}news/{{substr(str_replace('-','',$data['headline']['AddTime']),0,6)}}/{{$data['headline']['id']}}.html">{{$data['headline']['newstitle']}}</a>
        </h3>
        <div class="clearfix js31TopItemCon">
        	<a href="{{$domain}}news/{{substr(str_replace('-','',$data['headline']['AddTime']),0,6)}}/{{$data['headline']['id']}}.html" class="js31ItemPic fl"><img src="{{$data['headline']['newspic']}}" alt="{{$data['headline']['newstitle']}}"></a>
           <div class="j31TopCOnRi fr">
            <p class="js31ItemDao">
                {{mb_substr(strip_tags($data['headline']['content']),0,60,'utf-8')}}... 
                <a href="{{$domain}}news/{{substr(str_replace('-','',$data['headline']['AddTime']),0,6)}}/{{$data['headline']['id']}}.html">[详细]</a>
            </p>
            <ul class="clearfix">
              @if(isset($data['headline']['relateNews']))
              @foreach($data['headline']['relateNews'] as $val)
              <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html"><img src="{{$val['newspic']}}" alt="{{$val['newstitle']}}"><span>{{$val['newstitle']}}</span></a></li>
              @endforeach
              @endif
            </ul>
          </div>
        </div>
        <div class="clearfix js31ItemInfo">
	        <span class="js31ItemTitle">{{date('m月d日 H:i',strtotime($data['headline']['AddTime']))}}</span>
            <span class="js31ItemTag">
            	@if(isset($data['headline']['keywords']))
            	@foreach($data['headline']['keywords'] as $val)
            	<a href="{{$domain}}search/{{$val}}/">{{$val}}</a>
                @endforeach
                @endif
            </span>
            <div class="fr js31Share"><a id="ckepop" href="http://www.jiathis.com/share/?uid=1585942" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">分享</a></div>
        </div>
      </div>
      @endif
      <!--头条结束-->
      
      <!--文章列表-->
      <ul>
      	@foreach($data['newsCategoryList'] as $key=>$val)
        @if($key == 0 || $key == 10)
        	<div class="list_ad">
				<script type="text/javascript">var cpro_id = "u1687088";</script>
				<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
			</div>
        @endif
        <li class="js31Item" onmouseover="setShare('{{$val->newstitle}}', '{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html','{{mb_substr(strip_tags($val->content),0,100,'utf-8')}}');">
        <dt>@if($val->yc)<span class="js31TopIcon">头条</span>@endif<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></dt>
        <dd class="clearfix j31ItemCon">
        	<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="js31ItemPic fl">
            	<img src="{{$val->newspic}}" alt="{{$val->newstitle}}">
            </a>
            <p class="js31ItemDao">
            	{{mb_substr(strip_tags($val->content),0,100,'utf-8')}}... 
                <a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">[详细]</a>
            </p>
        </dd>
        <dd class="clearfix js31ItemInfo">
        	<span class="js31ItemTitle">{{date('m月d日 H:i',strtotime($val->AddTime))}}</span>
            <span class="js31ItemTag">
            	<?php $arr = explode(',',trim($val->keywords,','));?>
                @foreach($arr as $val)
            	<a href="{{$domain}}search/{{$val}}/">{{$val}}</a>
				@endforeach
            </span>
            <div class="fr js31Share">
            	<a id="ckepop" href="http://www.jiathis.com/share/?uid=1585942" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">分享</a>
            </div>
         </dd>
        </li>      
        @endforeach
        <div class="list_ad">
            <script type="text/javascript">var cpro_id = "u1687088";</script>
            <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
        </div>                
	  </ul>
      <!--文章列表结束-->
      
      
    </div>
    <script type="text/javascript">
		function setShare(title, url ,summary) {
			jiathis_config.title = title;
			jiathis_config.url = url;
			jiathis_config.summary = summary;
		}
		var jiathis_config = {}
	</script>
    <div class="j31turnPage"> 
    	{{$data['pages']}}
     </div>
    <div style="width:520px;overflow:hidden;margin:0px auto; margin-top:10px;"> 
      <script type="text/javascript" >BAIDU_CLB_SLOT_ID = "911434";</script> 
      <script type="text/javascript" src="http://cbjs.baidu.com/js/o.js"></script></div>
  </div>
  <!--left  end--> 
  <!--right start-->
  <div class="j31Right fr">
    <div class="j31RihgtBan"><script type="text/javascript">
/*趣历史 文章页 右一*/
var cpro_id = "u1552935";
</script> 
      <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div>
    @include('comman.newUpdateAndhotPicAndOrder')
    <style>
.positin{width:100%;position:relative}
.adfixed{position:fixed;_position:absolute;top:0px}
</style>
    <div class="positin">
      <div id="sidebar">
        <div style="margin-top:10px;"> 
          <script type="text/javascript">
/*趣历史 文章页右底 悬浮*/
var cpro_id = "u1552939";
</script> 
          <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
          <style>
.fl{ float:left;}
.ot_main{ width:298px; height:298px; border:1px solid #CCC; margin-top:10px;}
.weixin {
width: 295px;
margin-top:5px;margin-left:10px;

}
.android,.sinaweibo,.qqweibo,.qqkj {
padding: 8px 15px;
width: 248px;
height: 32px;
line-height: 32px;
}
.androidIcons{background: url('/images/az.gif') no-repeat;}
.sinaweiboIcons{background: url('/images/xnwb.gif') no-repeat;}
.qqweiboIcons{background: url('/images/txwb.gif') no-repeat;}
.qqkjIcons{background: url('/images/qqkj.gif') no-repeat;}

.androidIcons,.sinaweiboIcons,.qqweiboIcons,.qqkjIcons {
height: 32px;
width: 32px;
margin-right: 15px;
display: block;
}
.ot_main a {
font-size: 14px;
font-weight: bold;
color: #888888;
}
</style>
          <div class="ot_main">
            <div class="weixin fl"> <img src="/images/weixin.jpg"> </div>
            <div class="android fl"> <a href="http://m.qulishi.com/app/qulishi.apk" target="_blank"> <span class="androidIcons fl"></span> <span class="fl">Android手机客户端</span> </a> </div>
            <div class="sinaweibo fl"> <a href="http://weibo.com/qulishi" target="_blank"> <span class="sinaweiboIcons fl"></span> <span class="fl">趣历史网新浪官方微博</span> </a> </div>
            <div class="qqweibo fl"> <a href="http://t.qq.com/qulishi_v5" target="_blank"> <span class="qqweiboIcons fl"></span> <span class="fl">趣历史的腾讯官方微博</span> </a> </div>
            <div class="qqkj fl"> <a href="http://2506589242.qzone.qq.com" target="_blank"> <span class="qqkjIcons fl"></span> <span class="fl">趣历史的官方QQ空间</span> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--right  end--> 
</div>
<script type="text/javascript"> var jiathis_config = { appkey:{"tsina":"4057402562","tqq":"801181703"} } </script> 
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js?uid=893353" charset="utf-8"></script> 
<script>function scrollfun(){
		if(!$('#sidebar').length) return;
		var top = $('#sidebar').offset().top;
			//footers=$('#footer').offset().top;
			//side_height=$('#sidebar').height();
			//wtop=$(window).height()/2,
			//minheights=footers-(top+side_height);
			$(window).scroll(function(){
			var y = document.body.scrollTop || (document.documentElement && document.documentElement.scrollTop);
			if (y > top){
					$('#sidebar').addClass('adfixed');
			}else{
					$('#sidebar').removeClass('adfixed');
			
			}
		});

	}
	scrollfun();</script> 
@include('layouts.footerPerson')
@stop
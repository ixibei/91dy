<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>{{$data['detail']['newstitle']}}- 趣历史</title>
<meta content="{{$data['detail']['keywords']}}" name="keywords">
<meta content="{{$data['detail']['intro']}}" name="description">
<meta name="mobile-agent" content="format=xhtml;url=[MURL]" />
<link href="{{$domain}}css/common_v.css" rel="stylesheet">
<link href="{{$domain}}css/content.css" rel="stylesheet">
<link href="{{$domain}}css/link.css" rel="stylesheet" >
<link href="{{$domain}}favicon.ico" type="image/ico" rel="Shortcut Icon">
<script type="text/javascript" src="http://cbjs.baidu.com/js/m.js"></script>
<script type="text/javascript">
BAIDU_CLB_preloadSlots("876589");
</script>
<script src="{{$domain}}js/jquery-1.4.2.min.js"></script>
<script>
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
<div id="site_nav"> <span class="site_navl"><a href="{{$domain}}">趣历史首页</a>|&nbsp;&nbsp;讲述历史上那些有趣的事</span> <span class="site_navr"><a href="#" onClick="AddFavorite(window.location.href,document.title);return false;">加入收藏夹</a>-<a href="{{$domain}}Desktop">放到桌面</a></span> </div>
<div class="topbananer"> 
  <script type="text/javascript">
		/*趣历史 文章页顶部*/
		var cpro_id = "u1552921";
		</script> 
  <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
</div>
<div class="clearfix" style="width:960px;margin-top:10px;margin: auto;">
  <style>
	    #BAIDU_DSPUI_FLOWBAR{display:none !important;} .baiduSearchTxt{margin:10px auto;overflow:hidden;position:relative;zoom:1;height:50px;} .baiduSearchTxt .insert{visibility:visible;overflow:hidden;font-size:0;padding-left:1px;padding-right:1px;border-top:1px solid #38F;background:#38F;} .baiduSearchTxt .insert iframe{background:#C9E2F9 !important;margin-top:-1px;} .baiduSearchTxt .insert, .baiduSearchTxt .insert iframe{height:49px;} 
	    </style>
  <iframe id="baiduSearchIframe" align="center,center" allowtransparency="true" frameborder="0" height="51" marginheight="0" marginwidth="0" scrolling="no" src="" width="100%"></iframe>
  <script> var src = ''; title = encodeURIComponent("中国历史_中国历史故事大全_中国历史朝代表百科知识_历史的天空 - 趣历史网"); url = window.location.href; ltu = encodeURIComponent(url); src = "http://entry.baidu.com/rp/home?type=flowbar&di=u2259875&rsi0=auto&rsi1=50&title="+title+"&ltu="+ltu+"&ref=&pageWidth=1436&pageHeight=418&t=1432258027190&rsi0=1436&rsi1=50"; $('#baiduSearchIframe').attr("src",src); </script> 
</div>
<div class="wrap960 clearfix">
  <div class="cur_one"> 
  	<a href="/" class="a_index">首页</a>
    <a href="/{{$data['nav']['classid']['filename']}}/" class="a_titalink">{{$data['nav']['classid']['classname']}}</a>
    	<span>
        	@if(isset($data['nav']['nclassid']))<a href="/{{$data['nav']['nclassid']['filename']}}/">{{$data['nav']['nclassid']['classname']}}</a>@else<a href="/{{$data['nav']['classid']['filename']}}/">{{$data['nav']['classid']['classname']}}</a>@endif<span></span>@if(isset($data['nav']['rw']))><a href="{{$domain}}renwu/{{str_replace('/index','',$data['nav']['rw']['filename'])}}/news.html">{{$data['nav']['rw']['rwname']}}</a>@endif> 正文
		</span>
   </div>
  <div id="top_s"> 
    <script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=11026893453420471092' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script> 
  </div>
</div>
<div class="wrap960 clearfix">
  <div id="news_l">
    <div id="news">
      <div  class="news_tittop">
        <h1>{{$data['detail']['newstitle']}}</h1>
        <div class="bt_ad"> 
          <!--
<script type="text/javascript">
/*趣历史 标题下方关键词*/
var cpro_id = "u1553054";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
-->
          <div style="float:left;"> 
            <script type="text/javascript">
    /*qulishi-标题下-左-290*22*/
    var cpro_id = "u1835665";
</script> 
            <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
          </div>
          <div style="float:right;"> 
            <script type="text/javascript">
    /*qulishi-标题下-右-290*22*/
    var cpro_id = "u1835669";
</script> 
            <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
          </div>
        </div>
        <div class="info"> {{$data['detail']['AddTime']}}  来源：<font color="#B60C0C">趣历史 </font> 责任编辑：{{$data['detail']['adduser']}}
          <div class="fontSize"> 字号：<span id="fontSmall" title="切换到小字体" class="small">T</span>|<span id="fontBig" title="切换到大字体" class="big">T</span> </div>
        </div>
      </div>
      <div id="news_main" class="news_mainbox">
        <div style="width:577px;text-align:center; margin:0 auto"> 
          <script type="text/javascript">
		/*历史-内页开头*/
		var cpro_id = "u1877319";
	</script> 
          <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
        </div>
        <style>
#nrad{clear: right;
    float: right;
	width:360px;
    height: 300px;
    margin: 18px 0 15px 15px;}
#zhan{ clear: right;
    float: right;
    height: 210px;
    width: 1px;}
.bt_ad{ width:590px; height:30px; text-align:center;}
</style>
        <div id="zhan"></div>
        <div id="nrad"> 
          <script type="text/javascript">
/*趣历史 - 文章页正文*/
var cpro_id = "u1552926";
</script> 
          <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
        </div>
        {{$data['detail']['currentContent']}}        
        {{$data['detail']['pages']}}
        
        <div style="width:520px;overflow:hidden;margin:0px auto;">
			<script type="text/javascript">BAIDU_CLB_SLOT_ID = "911434";</script>
			<script type="text/javascript" src="http://cbjs.baidu.com/js/o.js"></script>
        </div>
        @if(isset($data['detail']['relateNews']))
        <p><strong style="COLOR:#333333;">相关阅读推荐：</strong></p>
        @foreach($data['detail']['relateNews'] as $key=>$val)
        <p style="padding-bottom:5px;">
        	<a style="COLOR:#000099;" href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank" title="{{$val['newstitle']}}">{{$val['newstitle']}}</a>
        </p>
        @endforeach
        @endif
        
        @if(isset($data['detail']['relateHt']))
        <p class="xg_zt">
	        相关专题：
            @foreach($data['detail']['relateHt'] as $val)
        	<a href="{{$domain}}renwu/{{str_replace('/index','',$val['filename'])}}/" target="_blank">{{$val['ftname']}}</a>
            @endforeach
        </p>
        @endif
      </div>
    </div>
    <h2 class="news_tit" style="margin-top:10px;">历史热图</h2>
    <div class="clearfix list_photo">
      <div style="margin-top:10px;"> 
        <script type="text/javascript">
					var cpro_id="u2259826";
					(window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"650",rsi1:"140",pat:"6",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"0",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0",ptbg:"90",piw:"150",pih:"110",ptp:"0"}
					</script> 
        <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
      </div>
      @foreach($data['hotPic'] as $val)
      <a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank" title="{{$val->newstitle}}"><img src="{{$val->newspic}}" border="0" alt="{{$val->newstitle}}">{{$val->minititle}}</a>
      @endforeach
       </div>
    <div id="news" style="border-top:1px;">
      <div style=" overflow:hidden; margin:auto; padding-left:10px; margin-top:10px;" > 
        <script type="text/javascript">
var cpro_id="u1980573";
(window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"630",rsi1:"250",pat:"1",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"1",adp:"1",ptt:"2",ptc:"%E7%8C%9C%E4%BD%A0%E6%84%9F%E5%85%B4%E8%B6%A3",ptFS:"14",ptFC:"#000000",ptBC:"#996600",titFF:"%E5%AE%8B%E4%BD%93",titFS:"14",rss2:"#000000",titSU:"0",tft:"0",tlt:"1",ptbg:"70",piw:"0",pih:"0",ptp:"0"}
</script> 
        <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
      </div>
      <div style=" width:580px; overflow:hidden; margin:auto; padding-bottom:10px; margin-top:10px;" > 
        <!-- 广告位：底部内容推荐 --> 
        <script type="text/javascript" >BAIDU_CLB_SLOT_ID = "674062";</script> 
        <script type="text/javascript" src="http://cbjs.baidu.com/js/o.js"></script> 
      </div>
      <div id="news_ad"> 
        <script type="text/javascript">
		 document.write('<a style="display:none!important" id="tanx-a-mm_30646014_6918724_23424097"></a>');
		 tanx_s = document.createElement("script");
		 tanx_s.type = "text/javascript";
		 tanx_s.charset = "gbk";
		 tanx_s.id = "tanx-s-mm_30646014_6918724_23424097";
		 tanx_s.async = true;
		 tanx_s.src = "http://p.tanx.com/ex?i=mm_30646014_6918724_23424097";
		 tanx_h = document.getElementsByTagName("head")[0];
		 if(tanx_h)tanx_h.insertBefore(tanx_s,tanx_h.firstChild);
	</script> 
      </div>
      <div class="xg_zt">
        <div class="xg_zt_l"></div>
        <div class="xg_zt_r"> 
          <!-- Baidu Button BEGIN -->
          <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="bds_t163"></a> <span class="bds_more">更多</span> <a class="shareCount"></a> </div>
          <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6637491" ></script> 
          <script type="text/javascript" id="bdshell_js"></script> 
          <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
          <!-- Baidu Button END --> 
        </div>
      </div>
      <div id="news_other" class="clearfix">
        <div class="wrap_l290">
        @if(isset($data['likeRelateNews']))
          <h6>看过本文的人还看过</h6>
          <ul class="clearfix" style="font-size:12px;">
          @foreach($data['likeRelateNews'] as $val)
            <li>·<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank" title="{{$val->newstitle}}">{{$val->newstitle}}</a></li>
          @endforeach
          </ul>
          @endif
        </div>
        <div class="wrap_r300"> 
          <!-- 广告位：趣历史 - 相关文章 --> 
          <script type="text/javascript" >BAIDU_CLB_SLOT_ID = "919561";</script> 
          <script type="text/javascript" src="http://cbjs.baidu.com/js/o.js"></script> 
        </div>
      </div>
    </div>
    <div class="othercon"> 
      <script type="text/javascript">
    /*qulishi 替换5拆分*/
    var cpro_id = "u1919464";
</script> 
      <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
    </div>
    <div class="othercon"></div>
    <div class="news_itemtit l_bottomtab">
      <h2>热门推荐</h2>
      <ul id="labels_id05">
        <li class="current">风云人物</li>
        <li>历史解密</li>
        <li>战史风云</li>
        <li>野史秘闻</li>
        <li>文史百科</li>
      </ul>
    </div>
    <div class="list_adborder h196" id="labels_con05">
      <?php $arr = array(23,24,25,26,28);?>
      @foreach($arr as $key=>$val)
      <div @if($key != 0) class="hidden" @endif> 
          <div class="m_hlimg">
            <a href="{{$domain}}news/{{substr(str_replace('-','',$data['newsCategoryTj'.$val][0]->AddTime),0,6)}}/{{$data['newsCategoryTj'.$val][0]->id}}.html"><img src="{{$data['newsCategoryTj'.$val][0]->newspic}}" alt="{{$data['newsCategoryTj'.$val][0]->newstitle}}">清朝{{$data['newsCategoryTj'.$val][0]->newstitle}}</a>
      </div>
      <div class="list_itemone">
         <h5><a href="{{$domain}}news/{{substr(str_replace('-','',$data['newsCategoryTj'.$val][1]->AddTime),0,6)}}/{{$data['newsCategoryTj'.$val][1]->id}}.html">{{$data['newsCategoryTj'.$val][1]->newstitle}}</a></h5>
         <ul>
	        @foreach($data['newsCategoryTj'.$val] as $k=>$v)
            @if($k>1 && $k<7)
            <li>·<a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html" target="_blank" title="{{$v->newstitle}}">{{$v->newstitle}}</a></li>
            @endif
            @endforeach
        </ul>
      </div>      
  </div>
  	  @endforeach
    </div>
    <div style="margin-top:10px;"> </div>
  </div>
  <div id="news_r">
    <div class="news_ad1"> 
      <script type="text/javascript">
    /*趣历史 文章页 右一*/
    var cpro_id = "u1552935";
</script> 
      <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
    </div>
    <style>
.xgrw{border: solid 1px #DFD5BA;border-top: solid 3px #553E1C;margin-top: 10px;padding-bottom: 5px;}
.xgrwcon{ padding-left:20px; padding-top:10px; padding-bottom:5px;}
.xgrw img{ width: 75px; height: 75px;}
.xgrw li{ width:92px; text-align: center; font-size: 12px; line-height:30px; float:left}
.xgrw h3{ height: 34px; line-height: 34px; color: #965a08; font-size: 16px; font-weight: normal; font-family: '微软雅黑'; padding-left: 10px;}
.xgrw h3 a{ float:right; padding-right:10px;  color:#965a08;}
</style>
@if(isset($data['nav']['relateRw']))
<div class="xgrw">
	<h3>相关人物 <a href="javascript:;" id="toggle" target="_self">展开 ▽</a></h3>
    <div class="xgrwcon">
        <ul class="clearfix">
        	@foreach($data['nav']['relateRw'] as $key=>$val)
        	<li><a href="{{$domain}}renwu/{{$val['filename']}}/" target="_blank"><img src="{{$val['rwsmallpic']}}" alt="{{$val['rwname']}}"><br>{{$val['rwname']}}</a></li>
            @endforeach
         </ul>
    </div>
</div>
@endif

    @include('comman.newUpdateAndhotPicAndOrder')
    
    <style>
.positin{width:100%;position:relative}
.adfixed{position:fixed;_position:absolute;top:0px}
</style>
    <div class="positin">
      <div id="sidebar">
        <div style="margin-top:10px;"> 
          <script type="text/javascript">
	var cpro_id="u2260986";
	(window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"300",rsi1:"250",pat:"6",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"1",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0",ptbg:"90",piw:"0",pih:"0",ptp:"0"}
	</script> 
          <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
        </div>
        <div style="margin-top:10px;"> 
          <script type="text/javascript">
	    /*qulishi 右底*/
	    var cpro_id = "u1660294";
	</script> 
          <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
        </div>
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
      </div>
    </div>
  </div>
</div>
<style>
	.letters_index{ margin:0 auto;width:958px; height:auto; background:#fff; border:1px solid #ccc;}
.letters{width:946px; height:100px; line-height:25px; background:#f3f5f7; border:1px solid #fff; border-bottom:none !important; padding:5px;}
.initials{ display:block; float:left;}
.initials span{background:url(/images/strategy_icon.gif) no-repeat 10px 2px;line-height:23px; height:23px; padding-left:26px; color:#711221; font-size:13px;}
.initials a,.initials a:visited,.initials a:hover,.initials a:active{ font-family:Arial, Helvetica, sans-serif; font-size:13px; margin:0 8px;}
.showhot{ display:block; float:right; padding-right:12px; font:normal 12px/28px simsun; position:relative;_top:4px;}
.showhot em{ font-style:normal;height:23px; line-height:23px; color:#666; margin-left:3px; display:inline-block;}
	</style>
@include('comman.twentySixLetterAndDynasty')
<div class="links" style="margin-top:5px; border:none;">
  <div class="line2"> </div>
  <div class="box">
    <h4><a href="{{$domain}}" target="_blank">历史</a></h4>
    <ul>
      <li>
        <p><a href="{{$domain}}fengyun/">风云人物</a> | <a href="{{$domain}}jiemi/">历史解密</a><br>
          <a href="{{$domain}}zhanshi/">战史风云</a> | <a href="{{$domain}}yeshi/">野史秘闻</a><br>
          <a href="{{$domain}}wenshi/">文史百科</a> | <a href="{{$domain}}pic/">老照片</a><br>
          <a href="http://wenhua.qulishi.com/">国学文化</a> | <a href="http://wenhua.qulishi.com/shici/">诗词歌赋</a><br>
          <a href="http://wenhua.qulishi.com/chengyu/">成语故事</a> | <a href="http://wenhua.qulishi.com/shenhua/">神话故事</a><br>
          <a href="http://wenhua.qulishi.com/chuantong/">传统文化</a> | <a href="http://wenhua.qulishi.com/guwen/">古文名句</a> </p>
      </li>
    </ul>
  </div>
  <div class="box">
    <h4><a href="#" target="_blank">朝代</a></h4>
    <ul>
      <li>
        <p><a href="{{$domain}}shanggu/">上古历史</a> | <a href="{{$domain}}xiachao/">夏朝历史</a><br>
          <a href="{{$domain}}shangchao/">商朝历史</a> | <a href="{{$domain}}zhouchao/">周朝历史</a><br>
          <a href="{{$domain}}chunqiu/">春秋战国历史</a> | <a href="{{$domain}}qinchao/">秦朝历史</a><br>
          <a href="{{$domain}}hanchao/">汉朝历史</a> | <a href="{{$domain}}sanguo/">三国历史</a><br>
          <a href="{{$domain}}jinchao/">晋朝历史</a> | <a href="{{$domain}}nanbeichao/">南北朝历史</a><br>
          <a href="{{$domain}}suichao/">隋朝历史</a> | <a href="{{$domain}}tangchao/">唐朝历史</a><br>
          <a href="{{$domain}}wudai/">五代十国历史</a> | <a href="{{$domain}}songchao/">宋朝历史</a><br>
          <a href="{{$domain}}yuanchao/">元朝历史</a> | <a href="{{$domain}}mingchao/">明朝历史</a><br>
          <a href="{{$domain}}qinchao/">清朝历史</a> | <a href="{{$domain}}minguo/">民国历史</a></p>
      </li>
    </ul>
  </div>
  <div class="box">
    <h4><a href="#" target="_blank">皇帝列表</a></h4>
    <ul>
      <li>
        <p><a href="{{$domain}}huati/xiachaohdlb/">夏朝皇帝列表</a> | <a href="{{$domain}}huati/shangchaohdlb/">商朝皇帝列表</a><br>
          <a href="{{$domain}}huati/zhouchaohdlb/">周朝皇帝列表</a> | <a href="{{$domain}}huati/qinchaohdlb/">秦朝皇帝列表</a><br>
          <a href="{{$domain}}huati/hanchaohdlb/">汉朝皇帝列表</a> | <a href="{{$domain}}huati/jinchaohdlb/">晋朝皇帝列表</a><br>
          <a href="{{$domain}}huati/suichaohdlb/">隋朝皇帝列表</a> | <a href="{{$domain}}huati/tangchaohdlb/">唐朝皇帝列表</a><br>
          <a href="{{$domain}}huati/songchaohdlb/">宋朝皇帝列表</a> | <a href="{{$domain}}huati/yuanchaohdlb/">元朝皇帝列表</a><br>
          <a href="{{$domain}}huati/mingchaohdlb/">明朝皇帝列表</a> | <a href="{{$domain}}huati/qingchaohdlb/">清朝皇帝列表</a><br>
          <a href="{{$domain}}huati/nanbeichaohdlb/">南北朝皇帝列表</a><br>
          <a href="{{$domain}}huati/wudaisghdlb/">五代十国皇帝列表</a></p>
      </li>
    </ul>
  </div>
  <div class="box">
    <h4><a href="{{$domain}}renwu/" target="_blank">人物</a></h4>
    <ul>
      <li>
        <p> <a href="{{$domain}}renwu/qinshihuang/" target="_blank">秦始皇</a> | <a href="{{$domain}}renwu/hanwudi/" target="_blank">汉武帝</a> | <a href="{{$domain}}renwu/caocao/" target="_blank">曹操</a><br>
          <a href="{{$domain}}renwu/yangguang/" target="_blank">杨广</a> | <a href="{{$domain}}renwu/liyuan/" target="_blank">李渊</a> | <a href="/renwu/lishimin/" target="_blank">李世民</a><br>
          <a href="{{$domain}}renwu/lizhi/" target="_blank">李治</a> | <a href="{{$domain}}renwu/wuzetian/" target="_blank">武则天</a> | <a href="{{$domain}}renwu/shangguanwaner/" target="_blank">上官婉儿</a><br>
          <a href="{{$domain}}renwu/kangxidi/" target="_blank">康熙</a> | <a href="{{$domain}}renwu/yongzhengdi/" target="_blank">雍正</a> | <a href="{{$domain}}renwu/qianlong/" target="_blank">乾隆</a><br>
          <a href="{{$domain}}renwu/cixi/" target="_blank">慈禧</a> | <a href="{{$domain}}renwu/yuanshikai/" target="_blank">袁世凯</a> | <a href="{{$domain}}renwu/puyi/" target="_blank">溥仪</a><br>
          <a href="{{$domain}}renwu/jiangjieshi/" target="_blank">蒋介石</a> | <a href="{{$domain}}renwu/songmeiling/" target="_blank">宋美龄</a> | <a href="{{$domain}}renwu/jiangjingguo/" target="_blank">蒋经国</a><br>
          <a href="{{$domain}}renwu/zhangxueliang/" target="_blank">张学良</a> | <a href="{{$domain}}renwu/duyuesheng/" target="_blank">杜月笙</a> | <a href="{{$domain}}renwu/zhangzuolin/" target="_blank">张作霖</a><br>
          <a href="{{$domain}}renwu/simaqian/" target="_blank">司马迁</a> | <a href="{{$domain}}renwu/kongzi/" target="_blank">孔子</a> | <a href="{{$domain}}renwu/mengzi/" target="_blank">孟子</a><br>
          <a href="{{$domain}}renwu/meilanfang/" target="_blank">梅兰芳</a> | <a href="{{$domain}}renwu/sidalin/" target="_blank">斯大林</a> | <a href="{{$domain}}renwu/xitele/" target="_blank">希特勒</a></p>
      </li>
    </ul>
  </div>
  <div class="box">
    <h4>专题</h4>
    <ul>
      <li>
        <p><a href="{{$domain}}huati/taipingtianguo/" target="_blank">太平天国</a><br>
          <a href="{{$domain}}huati/jiawuzz/" target="_blank">甲午战争</a><br>
          <a href="{{$domain}}huati/wuzetianmu/" target="_blank">武则天墓</a><br>
          <a href="{{$domain}}huati/fengshenyanyi/" target="_blank">封神演义</a><br>
          <a href="{{$domain}}huati/wuguzhihuo/" target="_blank">巫蛊之祸</a><br>
      </li>
      <a href="{{$domain}}huati/qingchaohuanghou/" target="_blank">清朝皇后列表</a><br>
      </li>
      <a href="{{$domain}}huati/manqingkuxing/" target="_blank">满清十大酷刑</a><br>
      </li>
      <a href="{{$domain}}huati/lingyishijian/" target="_blank">中国十大灵异事件</a><br>
      </li>
      <a href="{{$domain}}huati/gudaihuangdi/" target="_blank">中国十大篡位皇帝</a>
      </p>
      </li>
    </ul>
  </div>
  <div class="space10"></div>
</div>
<div class="chaFotNav">
  <div class="clear"></div>
</div>

<!--footer start--> 
<script src="{{$domain}}bg/dl_ad.js"></script> 
<!-- 广告位：全站富媒体 --> 
<script type="text/javascript" src="{{$domain}}bg/qlsfmt.js"></script>
<div id="footer"> COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
  联系QQ：930761060 </div>
<!--footer end--> 
<script src="{{$domain}}js/common_v.js"></script> 
<script src="{{$domain}}js/content.js"></script>
<div class="hidden"> 
  <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script> 
  <script>
	$(function() {
$("#toggle").click(function() {
$(this).text($("#orther").is(":hidden") ? "收起 △" : "展开 ▽");
$("#orther").slideToggle();
});
});

	
	function scrollfun(){
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
	scrollfun();
	function AddFavorite(sUrl, sTitle) {
    sUrl = sUrl ? sUrl : location.href;
    sTitle = sTitle ? sTitle : document.title
    if (document.all) {
        try {
            window.external.addFavorite(sUrl, sTitle);
        } catch (e1) {
            try {
                window.external.addToFavoritesBar(sUrl, sTitle);
            } catch (e2) {
                alert("加入收藏失败，请尝试Ctrl+D快捷键加入收藏夹");
            }
        }
    } else if (window.sidebar) {
        window.sidebar.addPanel(sTitle, sUrl, "");
    } else {
        alert("加入收藏失败，请尝试Ctrl+D快捷键加入收藏夹");
    }
}


	</script> 
</div>
</body>
</html>
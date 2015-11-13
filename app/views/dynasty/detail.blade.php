<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>{{$seo['Tilte']}}</title>
<meta content="{{$seo['Keywords']}}" name="keywords">
<meta content="{{$seo['Descriptions']}}"  name="description">
<meta name="mobile-agent" content="format=xhtml;url=[MURL]" />
<link href="{{$domain}}css/Dynasty.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<body class="body_bg">
<div id="head">
<div class="head_1">
<div class="top_tool">
<div class="tool_r">
<a href="{{$domain}}huati/" target="_blank">历史专题</a> - 
<a href="{{$domain}}renwu/" target="_blank">历史人物</a> - 
<a href="#" target="_blank">加入收藏</a> - 
<a href="#" target="_blank">设为首页</a>
</div>
</div>
<div id="logo"><img src="/images/logo.PNG" width="218" height="117" /></div>
</div>
</div>
<div class="nav">
<div class="nav_1">
<div class="nav_l">
<a href="{{$domain}}" target="_blank">首页</a>
<a href="{{$domain}}fengyun/" target="_blank">风云人物</a>
<a href="{{$domain}}jiemi/" target="_blank">历史解密</a>
<a href="{{$domain}}zhanshi/" target="_blank">战史风云</a>
<a href="{{$domain}}yeshi/" target="_blank">野史秘闻</a>
<a href="{{$domain}}wenshi/" target="_blank">文史百科</a>
<a href="{{$domain1}}" target="_blank">国学文化</a>
<a href="{{$domain}}pic/" target="_blank">老照片</a>
</div>
<div class="nav_r">
<a href="{{$domain1}}shici/" target="_blank">诗词歌赋</a>
<a href="{{$domain1}}chengyu/" target="_blank">成语故事</a>
<a href="{{$domain1}}shenhua/" target="_blank">神话故事</a>
<a href="{{$domain1}}chuantong/" target="_blank">传统文化</a>
<a href="{{$domain1}}guwen/" target="_blank">古文名句</a>
</div>
</div>
<div class="nav_2">
历史人物:
<a href="{{$domain}}renwu/caocao/" target="_blank">曹操</a>
<a href="{{$domain}}renwu/chengjisihan/" target="_blank">成吉思汗</a>
<a href="{{$domain}}renwu/hubilie/" target="_blank">忽必烈</a>
<a href="{{$domain}}renwu/huamulan/" target="_blank">花木兰</a>
<a href="{{$domain}}renwu/meilanfang/" target="_blank">梅兰芳</a>
<a href="{{$domain}}renwu/simaqian/" target="_blank">司马迁</a>
<a href="{{$domain}}renwu/songmeiling/" target="_blank">宋美龄</a>
近代人物:
<a href="/renwu/sunzhongshan/" target="_blank">孙中山</a>
<a href="/renwu/jiangjieshi/" target="_blank">蒋介石</a>
<a href="/renwu/lihongzhang/" target="_blank">李鸿章</a>
<a href="/renwu/yuanshikai/" target="_blank">袁世凯</a>
<a href="/renwu/daili/" target="_blank">戴笠</a>
<a href="/renwu/zhangxueliang/" target="_blank">张学良</a>
外国人物:
<a href="/renwu/xitele/" target="_blank">希特勒</a>
<a href="/renwu/sidalin/" target="_blank">斯大林</a>
</div>
</div>
    <div id="doc">
 <div id="dy_top">
  <div class="dy_bg" style="background:url(/UploadFile/201332913589944.gif) repeat-x;">
   <div style="background:url({{$data['detail']['pic']}}) center no-repeat;">
    <div style="width:980px; height:230px;">
     <ul>
    <li><a href="/shanggu/">上古</a></li>
    <li><a href="/xiachao/">夏</a></li>
    <li><a href="/shangchao/">商</a></li>
    <li><a href="/zhouchao/">周</a></li>
    <li><a href="/chunqiu/">春秋战国</a></li>
    <li><a href="/qinchao/">秦</a></li>
    <li><a href="/hanchao/">汉</a></li>
    <li><a href="/sanguo/">三国</a></li>
    <li><a href="/jinchao/">晋朝</a></li>
    <li><a href="/nanbeichao/">南北朝</a></li>
    <li><a href="/suichao/">隋</a></li>
    <li><a href="/tangchao/">唐</a></li>
    <li><a href="/wudai/">五代</a></li>
    <li><a href="/songchao/">宋</a></li>
    <li><a href="/yuanchao/">元</a></li>
    <li><a href="/mingchao/">明</a></li>
    <li><a href="/qingchao/">清</a></li>
    <li><a href="/minguo/">民国</a></li>
     </ul>
    </div>
   </div>
  </div>
 </div>
 <div id="content">
  <div id="main" style="background-color:#F9F1DA; overflow:hidden;">
   <div class="dy_hd4">
    <div class="title"><h1>{{$data['detail']['classname']}}历史</h1></div>
    <div class="cd3">{{$data['detail']['intro']}}</div>
   </div>

	@if(isset($data['detail']['emperor']) && $data['detail']['emperor'])
    <div class="dy_hd3">
    	<div class="title">
	        <h2>{{$data['detail']['classname']}}皇帝列表</h2>
      	</div>
        <div class="con_hdlb">
        	@foreach($data['detail']['emperor'] as $val)
            @if(strpos($val['tags'],'皇帝')!==false)
        	<p><a href="{{$domain}}renwu/{{$val['filename']}}/" target="_blank"><img src="{{$val['rwsmallpic']}}">{{$val['rwname']}}</a></p>
            @endif
            @endforeach
        </div>
     </div>

    <div class="dy_hd3">
    	<div class="title">
	        <h2>{{$data['detail']['classname']}}人物</h2>
      	</div>
        <div class="con_hdlb">
        	@foreach($data['detail']['emperor'] as $val)
            @if(strpos($val['tags'],'皇帝')===false)
        	<p><a href="{{$domain}}renwu/{{$val['filename']}}/" target="_blank"><img src="{{$val['rwsmallpic']}}">{{$val['rwname']}}</a></p>
            @endif
            @endforeach
        </div>
     </div>
     
	@endif
    
   <div class="dy_hd4">
    <div class="title"><h2>{{$data['detail']['classname']}}的历史新闻</h2></div>
    <div class="cd_1">
   <ul>
   @foreach($data['detail']['relateNews'] as $val)
        <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank" title="{{$val['newstitle']}}">{{$val['newstitle']}}</a></li>   
   @endforeach
    </ul>
   </div>
   </div>  
  
  {{$data['detail']['content']}}
  
  </div>
 </div>
<script src="{{$domain}}bg/dl_ad.js"></script>
 <div id="footer">
  <div class="footer_con" style="background-color:#F9F1DA;">
   <div class="line"></div>
   <div class="footer_nav">
    <span>版权声明：</span>本站部分文章来自互联网，如有侵权，请联系站长，我们将在24小时内处理<br />Copyright &copy; 2003 - 2013 www.qulishi.com All Rights Reserved <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
   </div>
  </div>
 </div>
 </div>
</body>
</html>
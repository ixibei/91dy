<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$data['detail']['title']}}</title>
<meta content="{{$data['detail']['keyword']}}" name="keywords">
<meta content="{{$data['detail']['descriptions']}}"  name="description">
<meta name="mobile-agent" content="format=xhtml;url=[MURL]" />
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
<link href="{{$domain}}css/yszt.css" rel="stylesheet" />
<script src="{{$domain}}js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="{{$domain}}js/jquery.litenav.js" type="text/javascript"></script>
<body>
<div class="lishi">
  <div class="lishi_1">
    <p><a href="{{$domain}}huati/">历史话题</a> - <a href="{{$domain}}renwu/">历史人物</a> - <a href="#">加入收藏</a> - <a href="#">设为首页</a></p>
  </div>
  <div class="lishi_2"><img src="{{$data['detail']['ysztbigpic']}}" width="960" height="202" /></div>
  <div class="lishi_3">
    <p><a href="index.html">首页</a><a href="/yszt/{{$data['index']}}/juqing.html">剧情介绍</a><a href="/yszt/{{$data['index']}}/renwu.html">人物介绍</a><a href="/yszt/{{$data['index']}}/news.html">相关新闻</a><a href="{{$domain}}yszt/">影视专题</a>
  </div>
  @if($data['type']=='index')
  <div class="lishi_4">
    <div class="lishi_5"> 
      <!-- 代码 开始 -->
      <div id="hotpic">
      
        <div id="NewsPic">
        	@foreach(Slide::getCategorySlide(15,8) as $key=>$val)
        	<a href="{{$val->furl}}" @if($key!=0)style="visibility: visible; display: none;"@endif target="_blank"><img width="310" height="340" src="{{$val->bpic}}"/>{{$val->ftitle}}</a>
            @endforeach
          <div class="Nav"> 
          	<span class="Normal">8</span>
            <span class="Normal">7</span>
            <span class="Normal">6</span>
            <span class="Normal">5</span>
            <span class="Normal">4</span>
            <span class="Normal">3</span>
            <span class="Normal">2</span>
            <span class="Cur">1</span> 
          </div>
        </div>
        
      </div>
      <script type="text/javascript">
        $('#hotpic').liteNav(1000);
    </script> 
      <!-- 代码 结束 --> 
    </div>
    <div class="lishi_6">
      <div class="lishi_7">
        <p><strong>故事梗概：</strong> </p>
		@if(isset($data['intro'][3])){{$data['intro'][1]}}@endif
        <p></p>
      </div>
      <div class="lishi_8">
        @if(isset($data['intro'][3])){{$data['intro'][2]}}@endif
      </div>
      <div class="lishi_8">
        @if(isset($data['intro'][3])){{$data['intro'][3]}}@endif
      </div>
    </div>
    <div class="lishi_9">
      <div class="lishi_10"><a href="#" target="_blank">电视剧简介</a></div>
     {{$data['intro'][0]}}
    </div>
  </div>
  @endif
  
  @if($data['type'] == 'renwu' || $data['type'] == 'index')
  <div class="lishi2_1">
    <div class="lishi2_2">主要人物</div>
    @foreach($data['detail']['relateRw'] as $key=>$val)
    <div class="lishi2_3"><a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank"><img src="{{$val['newspic']}}" width="149" height="98"></a><p><a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank">{{$val['newstitle']}}</a></p></div>
    @endforeach
    @endif
<style>
.List_con{ padding:10px; font-size:13px;}
.List_con li{ float:left; width:800px; line-height:25px;}
.List_con li a{ margin-right:20px; width:500px;}
</style>

<div style="clear:both"></div>   
  @if($data['type'] == 'juqing' || $data['type'] == 'index')
<div class="lishi2_6" style="margin-left:0; @if($data['type'] == 'juqing') width:958px; @endif">
  <div class="lishi2_7"><a name="juqing"></a>剧情介绍</div>
<ul>
@foreach($data['detail']['relateJuqing'] as $key=>$val)
<li>·<a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank" title="{{$val['newstitle']}}">{{$val['newstitle']}}</a><span>{{substr($val['AddTime'],0,10)}}</span></li>
@endforeach
</ul>
</div>
@endif

@if($data['type'] == 'news' || $data['type'] == 'index')
<div class="lishi2_6" style="margin-left:8px; @if($data['type'] == 'news') width:958px; @endif">
  <div class="lishi2_7"><a name="xg"></a>相关新闻</div>
<ul>
@foreach($data['detail']['relateNews'] as $key=>$val)
<li>·<a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank" title="{{$val['newstitle']}}">{{$val['newstitle']}}</a><span>{{substr($val['AddTime'],0,10)}}</span></li>
@endforeach</div>
@endif   
   
@if($data['type'] == 'index')
   
<div style="width:960px; overflow:hidden; margin:auto;">
<div class="lishi2_7" style=" margin-top:10px;">相关专题</div>
<div class="zt">
<a href="/yszt/tiantianyouxi/" target="_blank">天天有喜剧情介绍</a>

<a href="/yszt/bubujingxin/" target="_blank">步步惊心剧情介绍</a>

<a href="/yszt/suitangyx/" target="_blank">隋唐英雄剧情介绍</a>

<a href="/yszt/zhenhuanzhuan/" target="_blank">甄嬛传剧情介绍</a>

<a href="/yszt/xinluoshen/" target="_blank">新洛神剧情介绍</a>

<a href="/yszt/xianghuohxhd/" target="_blank">像火花像蝴蝶剧情介绍</a>

<a href="/yszt/huoxian/" target="_blank">火线三兄弟剧情介绍</a>

<a href="/yszt/jingzhongyuefei/" target="_blank">精忠岳飞剧情介绍</a>

<a href="/yszt/bqtzkaifeng/" target="_blank">包青天之开封奇案剧情介绍</a>

<a href="/yszt/dazhaimen1912/" target="_blank">大宅门1912剧情介绍</a>

<a href="/yszt/luzhenchuanqi/" target="_blank">陆贞传奇剧情介绍</a>

<a href="/yszt/tangshanddz/" target="_blank">唐山大地震剧情介绍</a>

<a href="/yszt/zhaoshiguer/" target="_blank">赵氏孤儿剧情介绍</a>
</div>
</div>


<div style="width:960px; overflow:hidden; margin:auto;">
<div class="lishi2_7" style=" margin-top:10px;">朝代大全</div>
<div class="zt">
  <a href="{{$domain}}huati/xiachaohdlb/">夏朝皇帝列表</a> <a href="{{$domain}}huati/shangchaohdlb/">商朝皇帝列表</a> <a href="{{$domain}}huati/zhouchaohdlb/">周朝皇帝列表</a> <a href="{{$domain}}huati/qinchaohdlb/">秦朝皇帝列表</a> <a href="{{$domain}}huati/hanchaohdlb/">汉朝皇帝列表</a> <a href="{{$domain}}huati/jinchaohdlb/">晋朝皇帝列表</a> <a href="{{$domain}}huati/nanbeichaohdlb/">南北朝皇帝列表</a> <a href="{{$domain}}huati/suichaohdlb/">隋朝皇帝列表</a> <a href="{{$domain}}huati/tangchaohdlb/">唐朝皇帝列表</a> <a href="{{$domain}}huati/wudaisghdlb//">五代十国皇帝列表</a> <a href="{{$domain}}huati/songchaohdlb/">宋朝皇帝列表</a> <a href="{{$domain}}huati/yuanchaohdlb/">元朝皇帝列表</a> <a href="{{$domain}}huati/mingchaohdlb/">明朝皇帝列表</a> <a href="{{$domain}}huati/qingchaohdlb/">清朝皇帝列表 </a><a href="/shanggu/">上古历史</a><a href="/xiachao/">夏朝历史</a>
<a href="/shangchao/">商朝历史</a><a href="/zhouchao/">周朝历史</a>
<a href="/chunqiu/">春秋战国历史</a><a href="/qinchao/">秦朝历史</a>
<a href="/hanchao/">汉朝历史</a><a href="/sanguo/">三国历史</a>
<a href="/jinchao/">晋朝历史</a><a href="/nanbeichao/">南北朝历史</a>
<a href="/suichao/">隋朝历史</a><a href="/tangchao/">唐朝历史</a>
<a href="/wudai/">五代十国历史</a><a href="/songchao/">宋朝历史</a>
<a href="/yuanchao/">元朝历史</a><a href="/mingchao/">明朝历史</a>
<a href="/qingchao/">清朝历史</a><a href="/minguo/">民国历史</a>
</div>
</div>
@endif

<div class="debu">
  <p>COPYRIGHT  2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网  联系QQ：930761060 <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script></p>
</div>


</div>
<!-- 广告位：全站富媒体 --> 
<script type="text/javascript" src="{{$domain}}bg/qlsfmt.js"></script>
</body>
</html>
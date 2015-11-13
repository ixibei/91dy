<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>{{$data['detail']['title']}}</title>
<meta name="keywords" content="{{$data['detail']['keyword']}}" />
<meta name="description" content="{{$data['detail']['descriptions']}}" />
<meta name="mobile-agent" content="format=xhtml;url=[MURL]" />
<meta http-equiv="Cache-Control" content="no-transform " /> 
<link href="{{$domain}}css/topic_20121122.css" rel="stylesheet">
<link href="{{$domain}}favicon.ico" type="image/ico" rel="Shortcut Icon">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?55f72d6a40530a8c1fc58e713a1c13df";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<base target="_blank">
</head>
<body[MB]>
	<div id="site_nav">
		<span class="site_navl"><a href="{{$domain}}">趣历史首页</a>|&nbsp;&nbsp;讲述历史上那些有趣的事</span>
		<span class="site_navr"><code id="fav">加入收藏夹</code>-<a href="{{$domain}}">放到桌面</a></span>
	</div>
	<div class="container">
		<div class="topbox">
			<div class="topwrap">
				<div class="top960 clearfix">
					<div class="top_l">
						<div class="sitetit"><a href="{{$domain}}huati/">历史话题 MILITARY TOPIC 探寻历史风云旧事</a></div>
						<span class="hidden">{{$data['detail']['ftname']}}</span>
						<div class="topictit clearfix">
							<span>"</span>
							<h1>{{$data['detail']['ftname']}}</h1>
							<span class="span_r">"</span>
						</div>
                        <?php $str = mb_substr($data['detail']['content'],0,mb_strpos($data['detail']['content'],'[/导语]'),'utf-8')?>
                        <p class="p_one">{{str_replace('[/导语]','',str_replace('[导语]','',$str))}}</p>
					</div>
					<div class="top_r">
						<a href="{{$data['detail']['picurl']}}"><img src="{{$data['detail']['ftpic']}}" alt="{{$data['detail']['ftname']}}"></a>
						<h3>{{$data['detail']['pictitle']}}</h3>
					</div>
				</div>
			</div>
		</div>
		
		<div class="m_box clearfix">
			<div class="w678">
            	@if(isset($data['detail']['relateNews']))
				@foreach($data['detail']['relateNews'] as $key=>$val)
				<div class="post_t"><a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank">{{$val['newstitle']}}</a></div>                
                <div class="post_c">
                	<?php $arr = explode('[$HR getPages$]',$val['content']); echo $arr[0];?>
                	<a href="{{$domain}}news/{{substr(str_replace('-','',$val['AddTime']),0,6)}}/{{$val['id']}}.html" target="_blank"><span style="color:#e53333;">...更多内容</span></a>
                </div>
                @endforeach
                @else
                   <?php 
				   		$str = mb_substr($data['detail']['content'],mb_strpos($data['detail']['content'],'[内容]')+4,-1,'utf-8');
						$str = str_replace('[/内容]','',$str);
				   		$arr = explode('<hr style="page-break-after:always;" class="ke-pagebreak" />',$str);
				   ?>
                   @foreach($arr as $key=>$val)
                   	<?php $arrs = explode('</h1>',$val);$title = explode('<h1>',$arrs[0]);?>
					<div class="post_t">@if(isset($title[1])) {{$title[1]}} @else {{$title[0]}} @endif</div>             
                	<div class="post_c">{{$arrs[1]}}</div>                   
                    @endforeach
                @endif
                
				<div class="jieyu">
					<div>结语</div>
					<p>{{$data['detail']['intro']}}</p>
				</div>
				<div class="xiangguan">
					<div class="post_t xiangguan_t">相关新闻阅读</div>
					<ul class="post_c xiangguan_c clearfix">
                    	@foreach(News::getCategoryNews('0','id',50,'id','!=') as $val)
                        <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank" title="{{$val->newstitle}}">{{$val->newstitle}}</a></li>					
                        @endforeach
                    </ul>
				</div>
                <div class="xiangguan">
					<div class="post_t xiangguan_t">相关话题</div>
					<ul class="post_c xiangguan_c_xg clearfix">
                    	@foreach(Ht::getList('id',50) as $val)
						<li><a href="/huati/{{$val->filename}}/">{{$val->ftname}}</a></li>					
                        @endforeach
					</ul>
				</div>
                </div>
			</div>
			<div class="w270">
	<div id="sidebar">
				<div class="sharebox">
					<h3>看新闻怎么不分享？</h3>
					<!-- Baidu Button BEGIN -->
					<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
					<a class="bds_qzone"></a>
					<a class="bds_tsina"></a>
					<a class="bds_tqq"></a>
					<a class="bds_renren"></a>
					<a class="bds_tsohu"></a>
					<span class="bds_more"></span>
					</div>
					<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=674382" ></script>
					<script type="text/javascript" id="bdshell_js"></script>
					<script type="text/javascript">
					document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
					</script>
					<!-- Baidu Button END -->
				</div>
				<div class="xgzt">相关专题</div>
				<ul class="ztbox clearfix">
                	@foreach(Ht::getList('id',50) as $key=>$val)
                    @if($key<2)
					<li><a href="/huati/{{$val->filename}}/" class="img_a"><img src="{{$val->ftpic}}"></a><a href="/huati/{{$val->filename}}/">{{$val->ftname}}</a><p>{{mb_substr($val->pictitle,0,15,'utf-8')}}...<a href="/huati/{{$val->filename}}/">[详细]</a></p></li>
                    @endif				
                    @endforeach
                 </ul>
				<div class="tabhd">
					<div class="ztph">专题排行</div>
					<ul class="tabnav" id="labels_id">
						<li class="hover">月排行</li>
						<li>年排行</li>
					</ul>
				</div>
				<div class="tabbox" id="labels_con">
					<ul class="clearfix">
                    	@foreach(Ht::getList('hits',20) as $key=>$val)
                        @if($key<10)
						<li><a href="/huati/{{$val->filename}}/">{{$val->ftname}}</a></li>					
                        @endif
                        @endforeach
					</ul>
					<ul class="clearfix hidden">
                    	@foreach(Ht::getList('hits',20) as $key=>$val)
                        @if($key>9)
						<li><a href="/huati/{{$val->filename}}/">{{$val->ftname}}</a></li>					
                        @endif
                        @endforeach
					</ul>
				</div>
<div style=" width:270px; height:33px;"><a href="{{$domain}}huati/" target="_blank"><img src="{{$domain}}images/back.jpg" width="270" height="33" /></a></div>
			</div>
            </div>
		</div>

	</div>
	<div id="footer">
		COPYRIGHT © 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 联系QQ：1032636028
	</div>
	<script src="{{$domain}}js/jquery-1.4.2.min.js"></script>
	<script src="{{$domain}}js/common_v.js"></script>
	<script src="{{$domain}}js/topic.js"></script>
	<div class="hidden">
<script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
	</div>
<!-- 骞垮憡浣嶏細鍏ㄧ珯瀵屽獟浣?-->
<script src="{{$domain}}bg/dl_ad.js"></script>

<script type="text/javascript" src="{{$domain}}bg/qlsfmt.js"></script>
<script type="text/javascript">
    /*鍘嗗彶涓撻涓婁笅鎶樺彔*/
    var cpro_id = "u1904622";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/s.js" type="text/javascript"></script>

</body>
</html>
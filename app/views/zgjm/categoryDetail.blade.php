<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>梦见{{$data['detail']['classname']}}_周公解梦_趣历史</title>
<meta name="Keywords" content="周公解梦,周公解梦大全,周公解梦查询，免费周公解梦"/>
<meta name="Description" content="趣历史为您提供免费周公解梦,周公解梦大全查询,周公解梦查询,周公解梦破解,原版周公解梦,周公解梦梦见蛇,周公解梦梦见怀孕,周公解梦梦见死人等，帮助你分析梦的含义，帮助解答心中的疑惑。" />
<meta name="mobile-agent" content="format=xhtml;url=http://m.qulishi.com/jiemeng/" />
<link rel="stylesheet" href="/css/zgjm.css">
</head>
<body>
<div class="zgjmTop zgjmBg">
	<div class="zgjmTopNav clearfix zgjmBg">
		<h1 class="zgjmTopLogo fl"><a href="/zgjm/"></a></h1>
		<ul class="clearfix zgjmTopNavList">
			<li><a href="/zgjm/">首页</a></li>
			<li><a href="/zgjm/jiemenwenhua/">解梦文化</a></li>
			<li><a href="/zgjm/jiemenggushi/">解梦故事</a></li>
			<li><a href="/zgjm/kantushuomeng/">看图说梦</a></li>
			<li><a href="/zgjm/list/">分类解梦</a></li>
			<li><a href="/zgjm/yuanbanjiemeng/">原版周公解梦</a></li>
		</ul>
	</div>
</div>
<div class="hr hr15"></div>
<ul class="zgjmClass zgjmBg2 clearfix">
	@foreach(ZgjmClass::getZgjmClass('cid',0,'id','asc') as $val)
	<li>
		<a href="/zgjm/list_{{$val->id}}.html">
			<img src="/images/jm_{{$val->id}}.jpg" alt="{{$val->classname}}">
			<span>{{$val->classname}}</span>
		</a>
	</li>
    @endforeach
</ul>
<div class="hr hr10"></div>
<div class="clearfix zbjmB1">
	<div class="fl zbjmB1Left">
		<div class="zbjmB1Search zgjmBg2">
			<div class="zbjmB1SearchBox">
				<span class="zbjmB1SearchTip">梦见：</span>
			<form target="_blank" name="search" method="get" action="/zgjm/search/">
<input type="text" class="zbjmB1SearchText" name="skey">
				<button type="submit" class="zbjmB1SearchBtn"></button></form>
			</div>
			<div class="zbjmSearchHot clearfix">
				<span>梦最多人:</span>
				<a href="/zgjm/jm_157_1.html">梦见怀孕</a>
				<a href="/zgjm/jm_766_1.html">梦见鱼</a>
				<a href="/zgjm/jm_769_1.html">梦见狗</a>
				<a href="/zgjm/search/?skey=杀人">梦见杀人</a>
				<a href="/zgjm/jm_771_1.html">梦见猫</a>
				<a href="/zgjm/jm_363_1.html">梦见屎</a>
				<a href="/zgjm/jm_104_1.html">梦见结婚</a>
			</div>
		</div>
		<div class="zgjmlist">
	    <h3 class="zbjmConTitle"><i></i>梦见{{$data['detail']['classname']}}({{$data['count']}})</h3>
			<ul class="clearfix">
            	@foreach($data['data'] as $val)
	            	<li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
                @endforeach
			</ul>
             <div class="j31turnPage"></div></div>
	</div>



<div class="zbjmB3Right fr">
		<div class="zbjmB3Sider">
<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">最新解梦</h4>
					<i class="sider fl"></i>
				</div>
				
			</div>
			<ul>            
                @foreach(Zgjm::getZgjm('jmpic','""','id','desc','!=',27) as $key=>$val)
                @if($key<9)
                @if($key==0)
				<li class="zbjmRBarFirst">
					<div class="zbjmRBarFistImg">
						<a href="/zgjm/{{$val->id}}.html">
							<img src="{{$val->jmpic}}" alt="{{$val->jmtitle}}">
							<i></i>
						</a>
					</div>
					<div class="zbjmRBarFistText">
						<a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a>
						<p>{{$val->jmtitle}}是什么意思，{{$val->jmtitle}}有什么寓意</p>
					</div>
				</li>
                @else
				<li><i>{{$key}}</i> <a href="/zgjm/{{$val->id}}.html">【<?php $arr = explode(',',$val->tags); echo trim($arr[0]);?>】{{$val->jmtitle}}</a></li>
                @endif
                @endif
                @endforeach
			</ul>
		</div>
		<div class="hr hr10"></div>
		<div class="zbjmB3Sider">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">热门解梦</h4>
					<i class="sider fl"></i>
				</div>
			
			</div>
			<ul>
                @foreach(Zgjm::getZgjm('jmpic','""','hits','desc','!=',27) as $key=>$val)
                @if($key<9)
                @if($key==0)
				<li class="zbjmRBarFirst">
					<div class="zbjmRBarFistImg">
						<a href="/zgjm/{{$val->id}}.html">
							<img src="{{$val->jmpic}}" alt="{{$val->jmtitle}}">
							<i></i>
						</a>
					</div>
					<div class="zbjmRBarFistText">
						<a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a>
						<p>{{$val->jmtitle}}是什么意思，{{$val->jmtitle}}有什么寓意</p>
					</div>
				</li>
                @else
				<li><i>{{$key}}</i> <a href="/zgjm/{{$val->id}}.html">【<?php $arr = explode(',',$val->tags); echo trim($arr[0]);?>】{{$val->jmtitle}}</a></li>
                @endif
                @endif
                @endforeach
			</ul>
		</div>

	</div>
<div class="hr hr10"></div>
<div class="zbjmFooter">
<!-- 广告位：趣历史对联广告 -->
<script src="http://www.qulishi.com/bg/dl_ad.js"></script>
<!-- 广告位：全站富媒体 -->
<script type="text/javascript" src="http://www.qulishi.com/bg/qlsfmt.js"></script>
	<div id="footer">
		COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
 联系QQ：2506589242
	</div>
	<!--footer end-->
	<div class="hidden">
<script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
	</div>
</div>
</body>
</html>
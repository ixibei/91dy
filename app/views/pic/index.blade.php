<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{$seo['Tilte']}}</title>
<meta content="{{$seo['Keywords']}}" name="keywords">
<meta content="{{$seo['Descriptions']}}"  name="description">
<link rel="stylesheet" href="/css/photostyle.css">
</head>
<body>
<div class="photo5Header clearfix">
	<div class="fl clearfix">
		<a href="{{$domain}}" class="photo5Logo"><img src="/images/lzp_logo.jpg" alt="趣历史"></a>
		<i>—</i>
		<span>老照片</span>
	</div><form target="_blank" name="search" method="get" action="/search/">
	<div class="fr clearfix">
		<a href="/" class="photo5GoHome">首页</a>
<div class="photo5SearchBox">
			<input name="skey" type="text" class="photo5SearchText" value="搜索图片">
			<input type="button"  class="photo5SearchBtn">
		</div>
	</div></form>
</div>
<div class="photo5Nav">
	<div class="w960">
		<a href="/niandaixiezhen/">年代写真</a>
		<i>|</i>
		<a href="/junshizhanshi/">战争实录</a>
		<i>|</i>
		<a href="/renwujiuying/">人物旧影</a>
		<i>|</i>
		<a href="/qiwequtu/">奇闻趣图</a>
		<i>|</i>
		<a href="/pic/">历史图库</a>
	</div>
</div>
<div class="photo5Focus" id="photo5Focus">
	<ul class="clearfix">
        @foreach($data['slide44'] as $val)
        <li>
			<a href="{{$val->furl}}" class="imgBox"><img src="{{$val->bpic}}" alt="" data-tag="share_1"></a>
			<h4><a href="{{$val->furl}}">{{$val->ftitle}}</a></h4>
			<div class="photo5FoucsShare">
				<div id="bdshare" class="bdshare_t bds_tools_24 get-codes-bdshare" data="{'text':'{{$val->ftitle}}', 'pic': '{{$val->bpic}}'}">
					<span class="share-title">分享到:</span>
				    <a class="bds_tsina">新浪</a>
				    <span class="bds_more">更多</span>
				</div>
			</div>
		</li>
        @endforeach

	</ul>
	<div class="photo5Num">
		<span class="active"></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	<span class="photo5FocusPrev" title="上一张"></span>
	<span class="photo5FocusNext" title="下一张"></span>
</div>
<div class="w960">
	<div class="photo5Item" id="photo5Item01">
		<h4 class="photo5ItemTitle">精选图集</h4>
		<div class="photo5ItemBox">
			<div class="photo5SrcollBox">
				<div class="photo5Ul">
                	<?php $start = 0;$end = 6;?>
                    @for($i=0; $i<3; $i++)
					<ul class="clearfix">
                     @foreach($data['newsCategory27classid'] as $key=>$val)
                     @if($key>=$start && $key<=$end)
                      <li>
							<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">
								<img src="{{$val->newspic}}">
								<span>{{$val->newstitle}}</span>
							</a>
						</li>
                      @endif
                      @endforeach
					</ul>
                    <?php $start += 7; $end += 7;?>
                    @endfor
				</div>
				<div class="photo5ItemMore">
					<a href="/pic/index_2.htm">
						<span>共{{$data['newsCategory27Count']}}个图集</span>
						<b><i></i><i></i><i></i></b>
					</a>
				</div>
			</div>
			<div class="photo5ItemNext">换一组</div>
		</div>
	</div>
	<div class="photo5Item" id="photo5Item02">
		<h4 class="photo5ItemTitle">年代写真</h4>
		<div class="photo5ItemBox">
			<div class="photo5SrcollBox">
				<div class="photo5Ul">
                	<?php $start = 0;$end = 6;?>
                    @for($i=0; $i<3; $i++)
					<ul class="clearfix">
                     @foreach($data['newsCategory65nclassid'] as $key=>$val)
                     @if($key>=$start && $key<=$end)
                      <li>
							<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">
								<img src="{{$val->newspic}}">
								<span>{{$val->newstitle}}</span>
							</a>
						</li>
                      @endif
                      @endforeach
					</ul>
                    <?php $start += 7; $end += 7;?>
                    @endfor
				</div>
				<div class="photo5ItemMore">
                	<a href="/niandaixiezhen/">
						<span>共{{$data['newsCategory65Count']}}个图集</span>
						<b><i></i><i></i><i></i></b>
					</a>
				</div>
			</div>
			<div class="photo5ItemNext">换一组</div>
		</div>
	</div>
	<div class="photo5Item" id="photo5Item03">
		<h4 class="photo5ItemTitle">战争实录</h4>
		<div class="photo5ItemBox">
			<div class="photo5SrcollBox">
				<div class="photo5Ul">
                	<?php $start = 0;$end = 6;?>
                    @for($i=0; $i<3; $i++)
					<ul class="clearfix">
                     @foreach($data['newsCategory59nclassid'] as $key=>$val)
                     @if($key>=$start && $key<=$end)
                      <li>
							<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">
								<img src="{{$val->newspic}}">
								<span>{{$val->newstitle}}</span>
							</a>
						</li>
                      @endif
                      @endforeach
					</ul>
                    <?php $start += 7; $end += 7;?>
                    @endfor

				</div>
				<div class="photo5ItemMore">
                	<a href="/junshizhanshi/">                
						<span>共{{$data['newsCategory59Count']}}个图集</span>
						<b><i></i><i></i><i></i></b>
					</a>
				</div>
			</div>
			<div class="photo5ItemNext">换一组</div>
		</div>
	</div>
	<div class="photo5Item" id="photo5Item04">
		<h4 class="photo5ItemTitle">人物旧影</h4>
		<div class="photo5ItemBox">
			<div class="photo5SrcollBox">
				<div class="photo5Ul">
					<ul class="clearfix">
                	<?php $start = 0;$end = 6;?>
                    @for($i=0; $i<3; $i++)
					<ul class="clearfix">
                     @foreach($data['newsCategory60nclassid'] as $key=>$val)
                     @if($key>=$start && $key<=$end)
                      <li>
							<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">
								<img src="{{$val->newspic}}">
								<span>{{$val->newstitle}}</span>
							</a>
						</li>
                      @endif
                      @endforeach
					</ul>
                    <?php $start += 7; $end += 7;?>
                    @endfor
				</div>
				<div class="photo5ItemMore">
                	<a href="/renwujiuying/">
						<span>共{{$data['newsCategory60Count']}}个图集</span>
						<b><i></i><i></i><i></i></b>
					</a>
				</div>
			</div>
			<div class="photo5ItemNext">换一组</div>
		</div>
	</div>
	<div class="photo5Item" id="photo5Item05">
		<h4 class="photo5ItemTitle">奇闻趣图</h4>
		<div class="photo5ItemBox">
			<div class="photo5SrcollBox">
				<div class="photo5Ul">
                	<?php $start = 0;$end = 6;?>
                    @for($i=0; $i<3; $i++)
					<ul class="clearfix">
                     @foreach($data['newsCategory61nclassid'] as $key=>$val)
                     @if($key>=$start && $key<=$end)
                      <li>
							<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">
								<img src="{{$val->newspic}}">
								<span>{{$val->newstitle}}</span>
							</a>
						</li>
                      @endif
                      @endforeach
					</ul>
                    <?php $start += 7; $end += 7;?>
                    @endfor
				</div>
				<div class="photo5ItemMore">
                	<a href="/qiwequtu/">                
						<span>共{{$data['newsCategory61Count']}}个图集</span>
						<b><i></i><i></i><i></i></b>
					</a>
				</div>
			</div>
			<div class="photo5ItemNext">换一组</div>
		</div>
	</div>
</div>
<div class="hr hr40"></div>
<div class="photo5Footer">
<p>COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
 联系QQ：2506589242 <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
</p>
</div>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<script src="/js/jquery.js"></script>
<script src="/js/jqScrollImg.js"></script>
<script>
$('#photo5Focus').jqScrollImg({
	oUl: $('#photo5Focus ul'),		//无缝滚动的容器
	oLi: $('#photo5Focus ul li'),	//容器内数列
	oNext: $('#photo5Focus .photo5FocusNext'),	//下一页按钮（选填）
	oPrev: $('#photo5Focus .photo5FocusPrev'),	//上一页按钮（选填）
	//oTtitle:$('#banner h3'),//标题
	aNum: $('#photo5Focus .photo5Num span'),//索引
	//oPage: $('#foucsImg .foucsPage'),//页码
	//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
	times: 7000,	//是否自动播放，及播放间隔
	runNum: 1,		//每次滚动的数量（选填）
	timers: 300, //切换时间
	oLeft : 'left'
});	
$('#photo5Item01').jqScrollImg({
	oUl: $('#photo5Item01 .photo5Ul'),		//无缝滚动的容器
	oLi: $('#photo5Item01 .photo5Ul ul'),	//容器内数列
	oNext: $('#photo5Item01 .photo5ItemNext'),	//下一页按钮（选填）
	//oPrev: $('#banner .prev'),	//上一页按钮（选填）
	//oTtitle:$('#banner h3'),//标题
	//aNum: $('#banner .bannerNum span'),//索引
	//oPage: $('#foucsImg .foucsPage'),//页码
	//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
	times: false,	//是否自动播放，及播放间隔
	runNum: 1,		//每次滚动的数量（选填）
	timers: 300, //切换时间
	oLeft : 'left'
});	
$('#photo5Item02').jqScrollImg({
	oUl: $('#photo5Item02 .photo5Ul'),		//无缝滚动的容器
	oLi: $('#photo5Item02 .photo5Ul ul'),	//容器内数列
	oNext: $('#photo5Item02 .photo5ItemNext'),	//下一页按钮（选填）
	//oPrev: $('#banner .prev'),	//上一页按钮（选填）
	//oTtitle:$('#banner h3'),//标题
	//aNum: $('#banner .bannerNum span'),//索引
	//oPage: $('#foucsImg .foucsPage'),//页码
	//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
	times: false,	//是否自动播放，及播放间隔
	runNum: 1,		//每次滚动的数量（选填）
	timers: 300, //切换时间
	oLeft : 'left'
});	
$('#photo5Item03').jqScrollImg({
	oUl: $('#photo5Item03 .photo5Ul'),		//无缝滚动的容器
	oLi: $('#photo5Item03 .photo5Ul ul'),	//容器内数列
	oNext: $('#photo5Item03 .photo5ItemNext'),	//下一页按钮（选填）
	//oPrev: $('#banner .prev'),	//上一页按钮（选填）
	//oTtitle:$('#banner h3'),//标题
	//aNum: $('#banner .bannerNum span'),//索引
	//oPage: $('#foucsImg .foucsPage'),//页码
	//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
	times: false,	//是否自动播放，及播放间隔
	runNum: 1,		//每次滚动的数量（选填）
	timers: 300, //切换时间
	oLeft : 'left'
});	
$('#photo5Item04').jqScrollImg({
	oUl: $('#photo5Item04 .photo5Ul'),		//无缝滚动的容器
	oLi: $('#photo5Item04 .photo5Ul ul'),	//容器内数列
	oNext: $('#photo5Item04 .photo5ItemNext'),	//下一页按钮（选填）
	//oPrev: $('#banner .prev'),	//上一页按钮（选填）
	//oTtitle:$('#banner h3'),//标题
	//aNum: $('#banner .bannerNum span'),//索引
	//oPage: $('#foucsImg .foucsPage'),//页码
	//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
	times: false,	//是否自动播放，及播放间隔
	runNum: 1,		//每次滚动的数量（选填）
	timers: 300, //切换时间
	oLeft : 'left'
});	
$('#photo5Item05').jqScrollImg({
	oUl: $('#photo5Item05 .photo5Ul'),		//无缝滚动的容器
	oLi: $('#photo5Item05 .photo5Ul ul'),	//容器内数列
	oNext: $('#photo5Item05 .photo5ItemNext'),	//下一页按钮（选填）
	//oPrev: $('#banner .prev'),	//上一页按钮（选填）
	//oTtitle:$('#banner h3'),//标题
	//aNum: $('#banner .bannerNum span'),//索引
	//oPage: $('#foucsImg .foucsPage'),//页码
	//oPlay: $('#foucsImg .palyBtn'),//播放控制铵钮
	times: false,	//是否自动播放，及播放间隔
	runNum: 1,		//每次滚动的数量（选填）
	timers: 300, //切换时间
	oLeft : 'left'
});	
</script>	<!-- 广告位：全站富媒体 -->
<script type="text/javascript" src="{{$domain}}bg/qlsfmt.js"></script>

</body>
</html>
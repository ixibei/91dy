<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  style="height:100%">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$seo['Tilte']}}</title>
    <meta content="{{$seo['Keywords']}}" name="keywords">
    <meta content="{{$seo['Descriptions']}}"  name="description">
    <link rel="stylesheet" href="/css/common_gxwh.css">
    <link rel="stylesheet" href="/css/index_gxwh.css">
    <script src="/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/js/jquery.litenav.js" type="text/javascript"></script>
</head>
	<body><!--header start-->
	  <div class="top">
			<div class="P_bg01">
				<div class="head_w980 clearfix">
					<p>
                       	@foreach($data['nav'] as $key=>$val)
                        @if($val->is_mini == 0)
                        <a href="@if($val->is_wenhua==1){{$domain1}}@else{{$domain}}{{$val->filename}}@if($val->filename!='')/@endif@endif"@if($key==0) class="clo_r" @endiftarget="_blank">{{$val->classname}}</a> 
                        @endif
                        @endforeach
                    </p>
					<span><a href="#">加入收藏</a><a href="#">放到桌面</a></span>
				</div>
			</div>
			<div class="P_bg02">
            <div id="header">
            <div id="logo"><a href="{{$domain1}}">首页</a></div>
            </div>
            </div>
			<div class="P_bg03">
				<div class="nav">
					<a class="special" href="{{$domain1}}">首页</a>@foreach($data['nav'] as $val)@if($val->is_mini)<a href="@if($val->is_wenhua==1){{$domain1}}@else{{$domain}}@endif{{$val->filename}}/" target="_blank">{{$val->classname}}</a>@endif@endforeach
				</div>
			</div>
		</div>
		<!--header end-->		
		<div class="middle">
		<!--middle start-->
			<div class="body_box">
				<div class="clearfix">
					<div class="bodyone_w283px">
							<div id="hotpic">
        <div id="NewsPic">
        	@foreach($data['slide10'] as $key=>$val)
            	<a target="_blank" href="{{$val->furl}}" @if($key==0)style="visibility: visible; display: block;"@else style="visibility: hidden; display: none;" @endif>
                <img width="275px" height="323px" src="{{$val->bpic}}" class="Picture" alt="{{$val->ftitle}}" title="{{$val->ftitle}}" /></a>
			@endforeach
            <div class="Nav">
            	@for($i=1; $i<8; $i++)
                <span class="Normal">{{$i}}</span>
                @endfor
            </div>
        </div>
        <div id="NewsPicTxt" style="width:275px; overflow: hidden"><a target="_blank" href="#"></a></div>
    </div>
     <script type="text/javascript">
        $('#hotpic').liteNav(1000);
    </script>
    <!-- 浠ｇ爜 缁撴潫 -->
							<span class="hot_01">精彩推荐</span>
							<ul>
                            	@foreach($data['newsCategory29classid'] as $key=>$val)
								<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                                @endforeach
							</ul>
						</div>
					<div class="bodyone_w662px">
							<div class="r_top">
								<div class="r_top_l">
									<span class="news_01">新闻资讯</span>
                                    	<?php $arr = array('18nclassid','19nclassid','21nclassid');?>
                                    	@foreach($arr as $key=>$val)
                                        @if($data['newsCategory'.$val])
										<div class="news_box">
											<ul>
                                            	@foreach($data['newsCategory'.$val] as $k=>$v)
												@if($k==0)<h3><a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html">{{$v->newstitle}}</a></h3>@else
												<li><span>{{substr($v->AddTime,0,9)}}</span><a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html">{{$v->newstitle}}</a></li>
                                                @endif
                                                @endforeach
											</ul>
										</div>
                                        @endif
                                        @endforeach
								</div>
								<div class="r_top_r">
									<div class="heigt_511px">
										<img src="images/r_huoxuebg.jpg" alt="">
										<div id="sc_k">
											<div><a href="#" id="sc_l">&nbsp;</a></div>
											<div class="sc_in">
												<a href="#" id="fontbg_01">唐诗三百首</a>
												<a href="#" id="fontbg_02">唐诗三百首</a>
												<a href="#" id="fontbg_03">唐诗三百首</a>
												<a href="#" id="fontbg_04">唐诗三百首</a>
												<a href="#" id="fontbg_05">唐诗三百首</a>												
                                                <ul class="keyword_2">
												<li><a href="{{$domain1}}Poetry/libai/">李白的诗</a></li>
												<li><a href="{{$domain1}}Poetry/sushi/">苏轼的诗</a></li>
												<li><a href="{{$domain1}}Poetry/baijuyi/">白居易的诗</a></li>
												<li><a href="{{$domain1}}Poetry/dufu/">杜甫的诗</a></li>
												<li><a href="{{$domain1}}Poetry/luyou/">陆游的诗</a></li>
												<li><a href="{{$domain1}}Poetry/wangwei/">王维的诗</a></li>
												<li><a href="{{$domain1}}Poetry/menghaoran/">孟浩然的诗</a></li>
												<li><a href="{{$domain1}}Poetry/taoyuanming/">陶渊明的诗</a></li>
												<li><a href="{{$domain1}}Poetry/lishangyin/">李商隐的诗</a></li>
												<li><a href="{{$domain1}}Poetry/dumu/">杜牧的诗</a></li>
												<li><a href="{{$domain1}}Poetry/wangbo/">王勃的诗</a></li>
												<li><a href="{{$domain1}}Poetry/luobinwang/">骆宾王的诗</a></li>
												<li><a href="{{$domain1}}Poetry/censhen/">岑参的诗</a></li>
												<li><a href="{{$domain1}}Poetry/liuzongyuan/">柳宗元的诗</a></li>
												<li><a href="{{$domain1}}Poetry/liuyuxi/">刘禹锡的诗</a></li>
												<li><a href="{{$domain1}}Poetry/yuanzhen/">元稹的诗</a></li>
												<li><a href="{{$domain1}}Poetry/hanyu/">韩愈的诗</a></li>
												<li><a href="{{$domain1}}Poetry/liyu/">李煜的诗</a></li>
												</ul>
												

											</div>
											<div><a href="#" id="sc_r">&nbsp;</a></div>
											
										</div>
										
									</div>
								</div>
							</div>
							<div class="r_bottom clearfix">
								<img src="images/imgread.jpg">
								<ul class="itmeone clearfix">
                                	@foreach($data['newsCategory1twtj'] as $val)
									<li>
										<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}"></a><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a>
									</li>
									@endforeach
								</ul>
							</div>
				  </div>	
                        
				</div>
                
<div class="plate1">
				<div class="l_w296">
					<div class="plalist">
						<a href="{{$domain}}renwu/kongzi/">孔子</a><a href="{{$domain}}renwu/mengzi/">孟子</a><a href="{{$domain}}renwu/chengjisihan/">成吉思汗</a><a href="{{$domain}}renwu/caocao/">曹操</a><a href="{{$domain}}renwu/liyu/">李煜</a><a href="{{$domain}}renwu/lishimin/">李世民</a><a href="{{$domain}}renwu/lilongji/">李隆基</a><a href="{{$domain}}renwu/sushi/">苏轼</a><a href="{{$domain}}renwu/kangxidi/">爱新觉罗·玄烨</a><a href="{{$domain}}renwu/yongzhengdi/">爱新觉罗·胤禛</a><a href="{{$domain}}renwu/qianlong/">爱新觉罗·弘历</a><a href="{{$domain}}renwu/jixiaolan/">纪晓岚</a><a href="{{$domain}}renwu/kangyouwei/">康有为</a><a href="{{$domain}}renwu/liangqichao/">梁启超</a><a href="{{$domain}}renwu/chenduxiu/">陈独秀</a><a href="{{$domain}}renwu/maozedong/">毛泽东</a><a href="{{$domain}}renwu/liangsicheng/">梁思成</a><a href="{{$domain}}renwu/linhuiyin/">林徽因</a><a href="{{$domain}}renwu/maodun/">矛盾</a><a href="{{$domain}}renwu/meilanfang/">梅兰芳</a><a href="{{$domain}}renwu/xiaohong/">萧红</a><a href="{{$domain}}renwu/yandi/">炎帝</a><a href="{{$domain}}renwu/qinshihuang/">嬴政</a><a href="{{$domain}}renwu/zhugeliang/">诸葛亮</a><a href="{{$domain}}renwu/liubang/">刘邦</a><a href="{{$domain}}renwu/xiangyu/">项羽</a><a href="{{$domain}}renwu/hanxin/">韩信</a><a href="{{$domain}}renwu/zhangliang/">张良</a><a href="{{$domain}}renwu/hanwudi/">刘彻</a><a href="{{$domain}}renwu/liuxiu/">刘秀</a><a href="{{$domain}}renwu/liyuan/">李渊</a><a href="{{$domain}}renwu/wuzetian/">武则天</a><a href="{{$domain}}renwu/xuerengui/">薛仁贵</a><a href="{{$domain}}renwu/songtaizu/">赵匡胤</a>
                        <a href="{{$domain}}renwu/baozheng/">包拯</a>
                        <a href="{{$domain}}renwu/yuefei/">岳飞</a>
                        <a href="{{$domain}}renwu/zhuyuanzhang/">朱元璋</a>
                        <a href="{{$domain}}renwu/zhangjuzheng/">张居正</a>
                        <a href="{{$domain}}renwu/huangtaiji/">爱新觉罗·皇太极</a>
                        <a href="{{$domain}}renwu/duoergun/">爱新觉罗·多尔衮</a>
                        <a href="{{$domain}}renwu/xiaozhuanghh/">孝庄文皇后</a>
                        <a href="{{$domain}}renwu/heshen/">和珅</a>
                        <a href="{{$domain}}renwu/guangxudi/">爱新觉罗·载湉</a>
                        <a href="{{$domain}}renwu/niuhulvzhenh/">孝圣宪皇后(甄嬛）</a>
                        <a href="{{$domain}}renwu/puyi/">爱新觉罗·溥仪</a>
                        <a href="{{$domain}}renwu/linzexu/">林则徐</a>
                        <a href="{{$domain}}renwu/zengguofan/">曾国藩</a>
                        <a href="{{$domain}}renwu/lihongzhang/">李鸿章</a>
                        <a href="{{$domain}}renwu/yuanshikai/">袁世凯</a>
                        <a href="{{$domain}}renwu/xiajianbai/">夏坚白</a>
                        <a href="{{$domain}}renwu/duyuesheng/">杜月笙</a>
                        <a href="{{$domain}}renwu/sunzhongshan/">孙中山</a>
                        <a href="{{$domain}}renwu/songqingling/">宋庆龄</a>
                        <a href="{{$domain}}renwu/zhouenlai/">周恩来</a>
                        <a href="{{$domain}}renwu/jiangjieshi/">蒋介石</a>
                        <a href="{{$domain}}renwu/songmeiling/">宋美龄</a>
                        <a href="{{$domain}}renwu/zhangxueliang/">张学良</a>
                        <a href="{{$domain}}renwu/songziwen/">宋子文</a>
                        <a href="{{$domain}}renwu/daili/">戴笠</a>
                        <a href="{{$domain}}renwu/zhanglingfu/">张灵甫</a>
                        <a href="{{$domain}}renwu/jiangjingguo/">蒋经国</a>
					</div>
				</div>
				<div class="w366">
					<div class="w366bg"></div>
					<?php $start = 4; $end = 0?>
                    @for($i=0; $i<2; $i++)
					<div class="news_box">
						<ul>
                        	@foreach($data['newsCategory18NclassidTjAsc'] as $key=>$val)
                            @if($key<=$start && $key>=$end)
							@if($key==0 || $key== 5)<h3><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></h3>@else
							<li><span>{{substr($v->AddTime,0,9)}}</span><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                            @endif
                            @endif
							@endforeach
						</ul>
					</div>
                    <?php $start = 9; $end = 5;?>
                    @endfor
                    
				</div>
				<div class="r_w296">
					<ul>
                        @foreach($data['newsCategory18NclassidHitsDesc'] as $key=>$val)
						<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                        @endforeach
					</ul>
				</div>
			</div>
			<div class="plate2">
			  <div class="l_w296">
					<a href="{{$data['slide11'][0]->furl}}"><img alt="{{$data['slide11'][0]->ftitle}}" style="width:283px; height:320px;" src="{{$data['slide11'][0]->bpic}}"></a>
					<span><a href="{{$data['slide11'][0]->furl}}">{{$data['slide11'][0]->ftitle}}</a></span>
				</div>
				<div class="w366">
					<div class="w366bg2"></div>
					<div class="imgfont clearfix">
                        @foreach($data['newsCategory19NclassidIdDesc'] as $key=>$val)
                        @if($key<2)                    
						<div class="w366f ">
							<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html"><img src="{{$val->newspic}}" style="width:150px; height:110px;" alt="{{$val->newstitle}}"></a><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{mb_substr($val->newstitle,0,10,'utf-8')}}</a>
						</div>
                        @endif
                        @endforeach
					</div>
					<div class="news_box">
						<ul>
                			@foreach($data['newsCategory19NclassidIdDesc'] as $key=>$val)
                            @if($key>1 && $key<5)                        
							<li><span>{{substr($v->AddTime,0,9)}}</span><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
							@endif
                            @endforeach
						</ul>
					</div>
					<ul class="niny_wkey">
						<li><a href="http://wenhua.qulishi.com/news/201303/168.html">草船借箭</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/176.html">卧薪尝胆</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/177.html">负荆请罪</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/178.html">围魏救赵</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/209.html">毛遂自荐</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/210.html">纸上谈兵</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/211.html">高山流水</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201304/1078.html">黔驴技穷</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201304/1079.html">背水一战</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201304/1080.html">闻鸡起舞</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201304/1081.html">破釜沉舟</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201304/1203.html">四面楚歌</a></li> 
					</ul>
				</div>
				<div class="r_w296">
				<div class="hotstory1">
				</div>
				<ul class="conlis">
                			@foreach($data['newsCategory19NclassidIdDesc'] as $key=>$val)
							<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                            @endforeach
					</ul>
				</div>
			</div>
			<div class="plate2">
				<div class="l_w296"> 
					<a href="{{$data['slide12'][0]->furl}}"><img alt="{{$data['slide12'][0]->ftitle}}" style="width:283px; height:320px;" src="{{$data['slide12'][0]->bpic}}"></a>
					<span><a href="{{$data['slide12'][0]->furl}}">{{$data['slide12'][0]->ftitle}}</a></span>
				</div>
				<div class="w366">
					<div class="w366bg3"></div>
					<div class="imgfont clearfix">
                        @foreach($data['newsCategory30NclassidIdDesc'] as $key=>$val)
                        @if($key<2)                    
						<div class="w366f ">
							<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html"><img src="{{$val->newspic}}" style="width:150px; height:110px;" alt="{{$val->newstitle}}"></a><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{mb_substr($val->newstitle,0,10,'utf-8')}}</a>
						</div>
                        @endif
                        @endforeach                        
					</div>
					<div class="news_box">
						<ul>
                			@foreach($data['newsCategory30NclassidIdDesc'] as $key=>$val)
                            @if($key>1 && $key<5)                        
							<li><span>{{substr($v->AddTime,0,9)}}</span><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
							@endif
                            @endforeach
						</ul>
					</div>
					<ul class="niny_wkey">
						<li><a href="http://wenhua.qulishi.com/news/201303/128.html">女娲造人</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/132.html">吴刚伐桂</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/144.html">十个太阳</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/138.html">神农氏和炎帝</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/155.html">夸父逐日</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/158.html">嫦娥奔月</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/164.html">战神蚩尤</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/160.html">黄帝的崛起</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/165.html">牛郎织女</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/166.html">九天玄女</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201304/1232.html">人类起源</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201305/1585.html">大禹治水</a></li> 
					</ul>
				</div>
				<div class="r_w296">
					<div class="hotstory1"></div>
					<ul class="conlis">
                			@foreach($data['newsCategory30NclassidIdDesc'] as $key=>$val)
							<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                            @endforeach
					</ul>
				</div>
			</div>
			<div class="plate3">
				<div class="w662">
					<div class="w662_top">
						<div class="p3l_w296">
					<a href="{{$data['slide13'][0]->furl}}"><img alt="{{$data['slide13'][0]->ftitle}}" style="width:283px; height:320px;" src="{{$data['slide13'][0]->bpic}}"></a>
					<span><a href="{{$data['slide13'][0]->furl}}">{{$data['slide13'][0]->ftitle}}</a></span>
						</div>
						<div class="p3_w366">
							<div class="w366bg4"></div>
							<div class="news_box">
								<ul>
                                	@foreach($data['newsCategory31NclassidIdDesc'] as $key=>$val)
                                    @if($key<9)
                                    @if($key == 0)
									<h3><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></h3>
                                    @else
									<li><span>{{substr($v->AddTime,0,9)}}</span><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                                    @endif
                                    @endif
                                    @endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="p3_bottom">
						<ul class="niny_wkey2">
						<li><a href="{{$domain}}huati/duanwujie/">&middot;&nbsp;端午节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201305/1757.html">&middot;&nbsp;父亲节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201305/1652.html">&middot;&nbsp;母亲节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4479.html">&middot;&nbsp;妇女节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4478.html">&middot;&nbsp;清明节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4480.html">&middot;&nbsp;愚人节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4481.html">&middot;&nbsp;七夕节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4482.html">&middot;&nbsp;中秋节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4483.html">&middot;&nbsp;重阳节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4486.html">&middot;&nbsp;国庆节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4484.html">&middot;&nbsp;腊八节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4487.html">&middot;&nbsp;圣诞节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201307/4485.html">&middot;&nbsp;除夕</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/171.html">&middot;&nbsp;春节</a></li>
                        <li><a href="http://wenhua.qulishi.com/news/201303/169.html">&middot;&nbsp;元宵节</a></li>
					</ul>
					</div>
				</div>
				<div class="r_w296">
					<div class="hotstory1"></div>
					<ul class="conlis">
                			@foreach($data['newsCategory31NclassidIdDesc'] as $key=>$val)
							<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                            @endforeach
					</ul>
				</div>
			</div>
			<div class="plate2">
				<div class="l_w296"> 
					<a href="{{$data['slide14'][0]->furl}}"><img alt="{{$data['slide14'][0]->ftitle}}" style="width:283px; height:320px;" src="{{$data['slide14'][0]->bpic}}"></a>
					<span><a href="{{$data['slide14'][0]->furl}}">{{$data['slide14'][0]->ftitle}}</a></span>
				</div>
				<div class="w366">
					<div class="w366bg5"></div>
					<?php $start = 4; $end = 0?>
                    @for($i=0; $i<2; $i++)
					<div class="news_box">
						<ul>
                        	@foreach($data['newsCategory21NclassidIdDesc'] as $key=>$val)
                            @if($key<=$start && $key>=$end)
							@if($key==0 || $key== 5)<h3><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></h3>@else
							<li><span>{{substr($v->AddTime,0,9)}}</span><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                            @endif
                            @endif
							@endforeach
						</ul>
					</div>
                    <?php $start = 9; $end = 5;?>
                    @endfor
				</div>
				<div class="r_w296">
				<div class="hotstory1">
				</div>
				<ul class="conlis">
                			@foreach($data['newsCategory21NclassidIdDesc'] as $key=>$val)
							<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                            @endforeach
					</ul>
				</div>
			</div>
           
		<!--middle end-->
		<!--footer start-->
			<div class="footer">
					<div class="frd_main">
						<span>友情链接</span>
						<ul>
							<ul><a href="/shanggu/">上古历史</a>
                           <li> <a href="/xiachao/">夏朝历史</a></li>
                            <li><a href="{{$domain}}shangchao/">商朝历史</a></li>
                            <li><a href="{{$domain}}zhouchao/">周朝历史</a></li>
                            <li><a href="{{$domain}}chunqiu/">春秋战国历史</a></li>
                            <li><a href="{{$domain}}qinchao/">秦朝历史</a></li>
                            <li><a href="{{$domain}}hanchao/">汉朝历史</a></li>
                            <li><a href="{{$domain}}sanguo/">三国历史</a></li>
                            <li><a href="{{$domain}}jinchao/">晋朝历史</a></li>
                            <li><a href="{{$domain}}nanbeichao/">南北朝历史</a></li>
                            <li><a href="{{$domain}}suichao/">隋朝历史</a></li>
                            <li><a href="{{$domain}}tangchao/">唐朝历史</a></li>
                            <li><a href="{{$domain}}wudai/">五代十国历史</a></li>
                            <li><a href="{{$domain}}songchao/">宋朝历史</a></li>
                            <li><a href="{{$domain}}yuanchao/">元朝历史</a></li>
                            <li><a href="{{$domain}}mingchao/">明朝历史</a></li>
                            <li><a href="{{$domain}}qingchao/">清朝历史</a></li>
                            <li><a href="{{$domain}}minguo/">民国历史</a></li>
                            </ul>
						</ul>
					</div>
					<div class="fw_key" >
						<a href="{{$domain}}huati/xiachaohdlb/">夏朝皇帝列表</a>
                        <a href="{{$domain}}huati/shangchaohdlb/">商朝皇帝列表</a>
                        <a href="{{$domain}}huati/zhouchaohdlb/">周朝皇帝列表</a>
                        <a href="{{$domain}}huati/qinchaohdlb/">秦朝皇帝列表</a>
                        <a href="{{$domain}}huati/hanchaohdlb/">汉朝皇帝列表</a>
                        <a href="{{$domain}}huati/jinchaohdlb/">晋朝皇帝列表</a>
                        <a href="{{$domain}}huati/nanbeichaohdlb/">南北朝皇帝列表</a> 
                        <a href="{{$domain}}huati/suichaohdlb/">隋朝皇帝列表</a>
                        <a href="{{$domain}}huati/tangchaohdlb/">唐朝皇帝列表</a>
                        <a href="{{$domain}}huati/wudaisghdlb//">五代十国皇帝列表</a>
                        <a href="{{$domain}}huati/songchaohdlb/">宋朝皇帝列表</a> 
                        <a href="{{$domain}}huati/yuanchaohdlb/">元朝皇帝列表</a>
                        <a href="{{$domain}}huati/mingchaohdlb/">明朝皇帝列表</a>
                        <a href="{{$domain}}huati/qingchaohdlb/">清朝皇帝列表 </a>
                    </div>
					<div>
					<div class="down">
					</div>
				</div><!--footer end-->		
			</div>	
		</div>	
       <p style="line-height:30px; height:30px; text-align:center;">COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 友情链接QQ：1801430423 <script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script></p>
         </div>
	</body>             
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>{{ $detail->s_title }}</title>
        <meta name="keywords" content="{{ $detail->s_keywords }}">
        <meta name="description" content="{{ $detail->s_description }}">
        <link href="/css/global.css?v=20131114" rel="stylesheet">
        <link href="/css/common.css?v=20131221" rel="stylesheet">
        <link href="/css/main.css?v=20140113" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="/Tpl/bibiqi_v1.0/js/plugin/html5.js">
            </script>
        <![endif]-->
        <!--[if IE 6]>
            <script src="/Tpl/bibiqi_v1.0/js/plugin/DD_belatedPNG.js">
            </script>
        <![endif]-->
    </head>
    
    <body class="w980 p_play_body">
        <header class="v_header">
            <div class="wrapper clearfix">
                <a class="v_logo fl" href="/" title="91电影网">
                    <img width="74" height="29" src="/img/logo.png" alt="91电影网">
                </a>
                <div class="v_nav fl clearfix">
                    <em>
                    </em>
                    <a class="home" href="http://www.91dy.me/"></a>
                    <em></em>
                    <div class="sel_wrap" id="select1" style="width:0px;">
                        <a class="classify sel_el" href="{{ URL::ROUTE('movieCategory',['kongbu']) }}" target="_blank">
                            恐怖
                        </a>
                        <ul class="sel_ul">
                          @foreach(MovieCategory::where('status','=','1')->orderBy('sort','desc')->orderBy('id','desc')->take(5)->get() as $val)
                          <li @if($uri == $val->url)class="nav_current"@endif><a href="{{ URL::route('movieCategory', [$val->url] ) }}" target="_blank">{{ $val->name }}</a></li>
                          @endforeach
                            <li class="hide_btn" title="隐藏">
                            </li>
                        </ul>
                    </div>
                    <em>
                    </em>
                </div>
                <form id="g_search_form" class="v_search fl clearfix" action="http://www.91dy.me/index.php?s=Home-search-search"
                method="post" target="_blank">
                    <input id="s_ac" class="text fl" type="text" name="wd" autocomplete="off"
                    value="行尸走肉第六季" onfocus="if (value ==&#39;行尸走肉第六季&#39;) value =&#39;&#39;;"
                    onblur="if (value ==&#39;&#39;) value=&#39;行尸走肉第六季&#39;;">
                    <input class="btn fl" type="submit" value="" title="搜索">
                </form>
                <div class="v_hot fl">
                    <ul id="text_scroll" style="top: -28.8729490098387px;">
                        <li>
                            <a href="http://www.91dy.me/omdsj/hszrdlj/" target="_blank">
                                行尸走肉第六季
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="v_rank fl" href="{{ URL::ROUTE('movieNews') }}">排行榜</a>
                <div class="g_tools v_tools fr">
                    <div id="g_box_wrap" class="tool_bar clearfix">
                        <div id="g_login_wrap" class="clearfix fl">
                            <a id="g_login" class="login" href="javascript:;">登录</a>
                            <a class="qq_login pngFix" href="http://www.91dy.me/member/qq" target="_blank" title="QQ账号一键登录"></a>
                            <em>|</em>
                            <a class="reg" href="http://www.91dy.me/member/reg" target="_blank">注册</a>
                            <em>|</em>
                        </div>
                        <a id="g_history" class="history pngFix" href="javascript:;">播放记录</a>
                        <em>|</em>
                        <a id="g_remind" class="remind" href="javascript:;">提醒</a>
                        <section id="g_login_box" class="g_login_box">
                            <div class="bd">
                                <form action="http://www.91dy.me/index.php?s=Home-Member-login" method="post">
                                    <input type="hidden" name="ajax" value="1">
                                    <p>
                                        <label for="g_usr_input">
                                            账号：
                                        </label>
                                        <input type="text" name="username" id="g_usr_input" value="">
                                    </p>
                                    <p>
                                        <label for="g_pwd_input">
                                            密码：
                                        </label>
                                        <input type="password" name="password" id="g_pwd_input" value="">
                                    </p>
                                    <button id="g_smt_button" type="submit">
                                        登录
                                    </button>
                                    <a class="get_pwd" href="http://www.91dy.me/member/getpassword" target="_blank">
                                        找回密码
                                    </a>
                                </form>
                            </div>
                            <div class="ft">
                                还没有账号？ 请
                                <a href="http://www.91dy.me/member/reg" target="_blank">
                                    注册
                                </a>
                            </div>
                        </section>
                        <section id="g_remind_box" class="g_remind_box">
                            <div class="bd">
                                <p>
                                    您尚未设置任何提醒
                                </p>
                            </div>
                            <div class="ft">
                                <a href="http://www.91dy.me/member/collect" target="_blank">
                                    管理我的收藏
                                </a>
                            </div>
                        </section>
                        <section id="g_history_box" class="g_history_box">
                            <div class="bd">
                                <span></span>
                                <dl>
                                    <dt>今天 </dt>
                                    <dd>
                                        <a class="rm" href="javascript:;"> </a>
                                        <a class="con" target="_blank" href="http://www.91dy.me/dzdy/dzd5skgd/">继续观看</a>
                                        <a data-id="" class="name" target="_blank" href="http://www.91dy.me/dzdy/dzd5skgd/">碟中谍5失控国度
                                        </a>
                                    </dd>
                                </dl>
                            </div>
                            <div class="ft clearfix">
                                <a class="fr h_login" href="javascript:;">
                                    登录
                                </a>
                                <a class="empty" href="javascript:;">
                                    清空全部记录
                                </a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </header>
        <section class="p_play_breadnav">
            <div class="wrapper">
                <a class="gb fr" href="http://www.91dy.me/gb-show" target="_blank">[留言报错]</a>
                <section class="breadnav">
                    当前位置：
                    <a href="http://www.91dy.me/">首页</a>&gt;
                    <a href="{{ URL::ROUTE('movieCategory',$category->url) }}">{{ $category->name }}</a> &gt;
                    <a href="{{ URL::ROUTE('movieDetail',[$detail->id]) }}" target="_blank">{{ $detail->name }}</a> BD中英双字 在线观看
                </section>
            </div>
        </section>
        
        
        
        
        <section class="p_play_main">
	<div class="wrapper">
    	<!--not this-->
		<section class="pic960" style="padding-top:3px; padding-bottom:15px;">
			<script type="text/javascript">BAIDU_CLB_fillSlot("933196");</script><div id="BAIDU_DUP_wrapper_933196_0"></div><script charset="utf-8" src="http://dup.baidustatic.com/painter/clb/fixed7o.js"></script><script type="text/javascript" src="http://cpc.88rpg.net/js/c/15990_3001.js"></script><iframe src="http://cpc.88rpg.net/html/click/15990_3001.html" width="960" height="90" marginheight="0" marginwidth="0" scrolling="no" frameborder="0"></iframe>
        </section>
        <!--not this-->
        
		<section class="clearfix">
			<div class="l fl">
				<div class="title clearfix">
					<a class="showlist fr" id="showlist" href="javascript:;">选集</a>
					<a class="prev fr" href="javascript:;">下一集</a>
					    <a class="next fr" href="/omdsj/hszrdlj/player-1-3.html">上一集</a>					<h1>正在播放 <a href="/omdsj/hszrdlj/" target="_blank">行尸走肉第六季</a> 第05集</h1>
				</div>
                <!--play url-->
				<div id="play_wrap" class="play_wrap">
                	<script language="javascript">
                var XgPlayer = {
                    'Url': "ftp://pub:pub@.domain.com:20320/421/00.mp4",  //本集播放地址，需更改
                    'NextcacheUrl': "ftp://pub:pub@.dom ain.com:20320/421/01.mp4",  //缓冲下一集，需更改
                    'LastWebPage': '',
                    'NextWebPage': "http://ww w.xx.co m/xxx.html",  //下一集播放页面地址，需更改
                    'Buffer': 'http://player.xigua.com/xg_loa ding.html',  // 播缓冲AD，需更改
                    'Pase': 'http://player.xigua.com/xg_loading.html',  // 暂停AD，需更改
                    'Width': 680,   // 播放器显示宽度
                    'Height': 490,  // 播放器显示高度
                    'Second': 8,  // 缓冲时间
                    "Installpage":'http://static.xi gua.com/installpage.html'
                };
                document.write('<script language="javascript" src="http://static.xigua.com/xiguaplayer.js" charset="utf-8"><\/script>');
            </script> 
				</div>
                <!--play url-->
				<div class="bottom clearfix">
					<div class="tools fl">
						<a class="see" target="_blank" href="/omdsj/hszrdlj/#cmt_anchor">看评论</a>						<a class="problem" href="#baocuo">影片无法播放</a>
						<a id="light_off" class="light_off" href="javascript:;" style="color: rgb(255, 102, 0);">影院模式</a>
												<div id="light_tip" class="light_tip" style="left: 233px; display: block;">无广告模式，大屏看电影！<a href="javascript:;"></a></div>
					</div>
				</div>
			</div>
			<div class="r fr clearfix">
				<section class="pic300 fr" style="height:250px;"><script>CNZZ_SLOT_RENDER('261405');</script><script src="http://c.andmejs.com/view.php?uid=21819&amp;op=1"></script><div id="__QY_CL_Div_1447595584970_19" height="250" width="300" url="http://c.qiyou.com/popup.php?t=1447595584970&amp;q=MjE4MTl8Mjk0ODB8OTl8MTJ8MHx8MTQ0NzU5NTU4NHxhMTk2NmM2ZTYxZDc0NzU2ZmJiMzg3ZTFhOGJmMTg2MnwwfDEwMHwwfDA%3D&amp;w=300&amp;h=250&amp;logo=2" op="1" style="margin: 0px; display: inline-block; width: 300px; height: 250px; position: relative; padding: 0px; overflow: hidden;" isopen="1"><div style="display: none;"></div>
<iframe src="http://c.qiyou.com/popup.php?t=1447595584970&amp;q=MjE4MTl8Mjk0ODB8OTl8MTJ8MHx8MTQ0NzU5NTU4NHxhMTk2NmM2ZTYxZDc0NzU2ZmJiMzg3ZTFhOGJmMTg2MnwwfDEwMHwwfDA%3D&amp;w=300&amp;h=250&amp;logo=2&amp;attach_var=" hspace="0" vspace="0" frameborder="0" scrolling="no" allowtransparency="true" width="300" height="250" style="width: 300px; height: 250px; margin: 0px; border: 0px;"></iframe></div>
</section>
				<section class="pic300 fr" style="height:250px;"><script>CNZZ_SLOT_RENDER('261406');</script><script type="text/javascript" src="http://cpc.88rpg.net/js/c/15990_3000.js"></script><iframe src="http://cpc.88rpg.net/html/click/15990_3000.html" width="300" height="250" marginheight="0" marginwidth="0" scrolling="no" frameborder="0"></iframe>
</section>
                <div class="playlist c" id="playlist">
                    <a class="player pngFix curr" href="javascript:;">西瓜影音</a>
						<table>
								
									<tbody><tr><td>
                                        <a class="curr" href="/omdsj/hszrdlj/player-1-4.html">第05集</a></td>
									<td>
                                    <a class="" href="/omdsj/hszrdlj/player-1-3.html">第04集</a>                                    </td></tr>
								
									<tr><td>
                                        <a class="" href="/omdsj/hszrdlj/player-1-2.html">第03集</a></td>
									<td>
                                    <a class="" href="/omdsj/hszrdlj/player-1-1.html">第02集</a>                                    </td></tr>
								
									<tr><td>
                                        <a class="" href="/omdsj/hszrdlj/player-1-0.html">第01集</a></td>
									<td>
                                                                        </td></tr>
													</tbody></table><a class="player pngFix " href="javascript:;">吉吉影音</a>
						<table style="display:none">
								
									<tbody><tr><td>
                                        <a class="" href="/omdsj/hszrdlj/player-0-4.html">第05集</a></td>
									<td>
                                    <a class="" href="/omdsj/hszrdlj/player-0-3.html">第04集</a>                                    </td></tr>
								
									<tr><td>
                                        <a class="" href="/omdsj/hszrdlj/player-0-2.html">第03集</a></td>
									<td>
                                    <a class="" href="/omdsj/hszrdlj/player-0-1.html">第02集</a>                                    </td></tr>
								
									<tr><td>
                                        <a class="" href="/omdsj/hszrdlj/player-0-0.html">第01集</a></td>
									<td>
                                                                        </td></tr>
													</tbody></table>				</div>
			</div>
		</section>
        
        <!--not this-->
		<section class="pic960" style="padding-top:18px;"><script>CNZZ_SLOT_RENDER('261617');</script><script type="text/javascript" charset="gbk" src="http://js.adm.cnzz.net/appgcm.php?sid=261617&amp;fn=CNZZ_AD_RSLOT&amp;width=1366&amp;height=768&amp;time=1447595585024&amp;domain=&amp;referer=&amp;href=http%3A%2F%2Fwww.bibiqi.com%2Fomdsj%2Fhszrdlj%2Fplayer-1-4.html"></script></section>
        <!--not this-->
	</div>
</section>


        
        
        <div class="p_play wrapper">
            <div class="sub clearfix">
                <div class="l fl">
                    <section class="rec">
                        <div class="content clearfix type2" style="padding-bottom:0px;">
                            <div class="first special fl">
                                <a class="img_wrap" title="{{ $newsMovie[0]->title }}" href="{{ URL::ROUTE('movieDetail',[$newsMovie[0]->id]) }}"
                                target="_blank">
                                    <img width="259" height="345" alt="{{ $newsMovie[0]->name }}" src="{{ $newsMovie[0]->img }}"/>
                                    <span class="note_adds">
                                        <em class="note_bg"></em>
                                        <em class="note_name_text">{{ $newsMovie[0]->name }}</em>
                                    </span>
                                </a>
                                <p>{{ mb_substr($newsMovie[0]->intro,0,30,'utf-8') }}</p>
                            </div>
                            <ul class="cm_ul fr clearfix">
                            	@foreach($newsMovie as $key=>$val)
                                @if($key>0 && $key<4)
                                <li @if($key==1)class="first"@endif>
                                    <a class="img_wrap" title="{{ $val->title }}" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}"
                                    target="_blank">
                                        <img width="120" height="160" alt="{{ $val->name }}" src="{{ $newsMovie[0]->img }}"/>
                                        <span class="note_adds">
                                            <em class="note_text"></em>
                                            <em class="note_icon"></em>
                                        </span>
                                        <span class="name">{{ $val->name }}</span>
                                    </a>
                                    <p>{{ mb_substr($newsMovie[0]->intro,0,30,'utf-8') }}</p>
                                </li>
                                @endif
                              	@endforeach
                            </ul>
                            <ul class="list fr clearfix">
                               @foreach($newsMovie as $key=>$val)
                                @if($key>3)
                                <li>
                                    <a title="{{ $val->name }}" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" target="_blank">{{ $val->name }}</a>
                                    <span>
                                    </span>
                                </li>
                                 @endif
                              	@endforeach
                            </ul>
                        </div>
                    </section>
                    <section class="pic960" style="margin-bottom:15px;">
                        <div id="__QY_CL_Div_1447549907664_9602" height="90" width="960" url="http://c.qiyou.com/popup.php?t=1447549907664&amp;q=MjE4MTl8Mjk0ODB8OTl8MTJ8MHx8MTQ0NzU0OTkwNXw5MjNlNjA0ZjIwM2NjNGZhMjYyZTM1NzEyYzc0ZGI0NHwwfDEwMHwwfDA%3D&amp;w=960&amp;h=90&amp;logo=2"
                        op="2" style="margin: 0px; display: inline-block; width: 960px; height: 90px; position: relative; padding: 0px; overflow: hidden;"
                        isopen="1">
                            <div style="display: none;">
                            </div>
                        </div>
                    </section>
                    <section class="help">
                        <a id="baocuo">
                        </a>
                        <header>
                            已安装了快播播放器，在网页点播仍提示未安装？
                        </header>
                        <article>
                            <dl>
                                <dt>
                                    出现这类问题可能有以下几种原因：
                                </dt>
                                <dd class="clearfix">
                                    <em class="fl">1. </em>
                                    <div class="fr">
                                        由于您使用的浏览器属于多核心浏览器，如：搜狗、火狐等，
                                        <span>请使用兼容模式点播（点击高速切换），或者使用系统自带IE浏览器进行点播</span>。
                                    </div>
                                </dd>
                                <dd class="clearfix">
                                    <em class="fl">2.</em>
                                    <div class="fr">
                                        由于您的浏览器管理加载项中禁用了快播插件引起。解决办法：
                                        <span> 打开IE浏览器，在菜单栏工具项→找到加载项管理器→"启用"或"禁用"加载项，并在弹出的对话框中启用所有以ShenZhen QVOD 开头的加载项。</span>
                                    </div>
                                </dd>
                                <dd class="clearfix">
                                    <em class="fl">3.</em>
                                    <div class="fr">
                                        由于浏览器加载项没有快播插件，请重新安装
                                        <a href="http://dl.kuaibo.com/QvodSetupPlus5.exe" rel="nofollow">最新版快播</a>
                                        。
                                    </div>
                                </dd>
                                <dd class="clearfix">
                                    <em class="fl">4.</em>
                                    <div class="fr">64位win7、vista系统请用非64位IE或其他32位浏览器点播（如360浏览器、世界之窗浏览器）。</div>
                                </dd>
                            </dl>
                            <p>
                                如果以上方法均无效，请在
                                <a href="http://www.91dy.me/gb-show" target="_blank">求片留言 </a>
                                中反馈。
                            </p>
                        </article>
                    </section>
                    <section class="spe">
                        <ul class="cm_ul clearfix">
                          @foreach(Movie::where("tj",'=',1)->where('status','=',1)->orderBy('id','desc')->take(6)->get() as $key=>$val)
                            <li class="@if($key%3 == 0)first@endif @if($key<3)row@endif">
                                <a class="img_wrap" title="{{ $val->title }}" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}">
                                    <img width="214" height="132" alt="{{ $val->title }}" src="{{ $val->img }}"/>
                                    <span class="note_adds">
                                        <em class="note_bg"></em>
                                        <em class="note_name_text">{{ $val->title }}</em>
                                    </span>
                                </a>
                            </li>
                          @endforeach
                        </ul>
                    </section>
                </div>
                <section class="r fr">
                    <p class="title">
                        <a class="fr" href="{{ URL::route('article') }}" target="_blank">
                            更多&gt;&gt;
                        </a>
                        热点新闻
                    </p>
                    <ul class="con">
                        @foreach(News::orderBy('id','desc')->take(10)->get() as $val)
                        <li>
                            <a href="{{ URL::ROUTE('articleDetail',[$val->id]) }}" target="_blank">
                                {{ $val->newstitle }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </section>
                <section class="r fr" style="margin-top:10px;">
                    <p class="title">热门电影</p>
                    <ul class="con">
                        @foreach(Movie::where('status','=',1)->orderBy('hits','desc')->take(10)->get() as $val)
                        <li>
                            <a href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" target="_blank">
                                {{ $val->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </section>
            </div>
            <section class="pic960" style="margin-top:15px;">
            </section>
        </div>
        
        <section class="pop_wrap">
            <div id="login_wrap" class="login_wrap clearfix">
                <div class="left fl">
                    <h3>
                        请登录比比奇网
                    </h3>
                    <form action="http://www.91dy.me/index.php?s=member-login" method="post">
                        <div>
                            <label>
                                账号
                            </label>
                            <input class="text" name="username" type="text">
                        </div>
                        <div>
                            <label>
                                密码
                            </label>
                            <input class="text" name="password" type="password">
                        </div>
                        <div class="clearfix">
                            <!--<input class="chkbox fl" name="login" value="1" type="checkbox"><label class="s fl">记住我的选择</label>-->
                            <input class="submit fl" type="submit" value="登录">
                        </div>
                    </form>
                </div>
                <div class="right fr">
                    <h3>
                        还没有账号?
                    </h3>
                    <div>
                        <p>
                            <a href="http://www.91dy.me/index.php?s=member-user_reg-url-~kongbu~lsdy81304~">
                                注册一个账号
                            </a>
                        </p>
                        <p>
                        </p>
                        <p>
                            <a class="smt_btn" href="http://www.91dy.me/index.php?s=member-qqreg-url-~kongbu~lsdy81304~">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="g_footer">
            <p>
                本网站提供的最新电影，电视剧和动漫资源均系收集于各大视频网站，本网站只提供web页面服务，并不提供影片资源存储，也不参与录制、上传
            </p>
            <p>
                若本站收录的节目无意侵犯了贵司版权，请发送邮件到bibiqi.com@gmail.com，我们会及时处理和回复，谢谢
            </p>
            <p>
                Copyright @2003-2011 比比奇 www.bibiqi.com ICP备2010111号
            </p>
            <p id="g_footer_links">
                <a href="http://www.91dy.me/gb-show.html" title="求片留言">
                    求片留言
                </a>
                <em>
                    |
                </em>
                <a href="http://www.91dy.me/help/" title="百度影音帮助">
                    百度影音帮助
                </a>
                <em>
                    |
                </em>
                <a href="http://www.91dy.me/allmovie.html" title="网站地图">
                    网站地图
                </a>
                <em>
                    |
                </em>
                <a href="http://www.91dy.me/sitemap.xml" title="">
                    百度地图
                </a>
                <em>
                    |
                </em>
            </p>
        </footer>
    </body>
</html>
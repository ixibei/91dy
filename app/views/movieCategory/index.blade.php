@include('layouts.header') 

<!-- 筛选 -->
<div class="add-wrapper cf aw-mt20">

    <div class="add-filter">
        <div class="af-hd cf">
            <div class="seo-type">
                <h1>{{ $catInfo['name'] }}电影</h1>
            </div>
            <span class="type">电影筛选</span>
            <div class="selected">
                <span class="t">您已选择：</span>
                <span class="c">{{ $catInfo['name'] }}<a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],$param[1],$param[2]] ) }}" class="close">×</a></span>
                
                <span class="n">共<em>{{ $count }}</em>部</span>
            </div>
        </div>
        
        <div class="af-list">
            <dl class="cf">
                <dt>按类型</dt>
                <dd>
                	<span class="c "><a href="{{ URL::route('movieCategory', [$uri] ) }}">全部</a></span>
                	<span class="c @if($uri == 'news')on@endif"><a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],$param[1],$param[2]] ) }}">最新</a></span>
                    @foreach($catList as $key=>$val)
                    <span class="c @if($val->url == $catInfo['url'])on@endif"><a href="{{ URL::route('movieCategorySearch', [$val->url,$param[0],$param[1],$param[2]] ) }}">{{ $val->name }}</a></span>
                    @endforeach
                </dd>
            </dl>
            <dl class="cf">
                <dt>按地区</dt>
                <dd>
 	                <span class="c on"><a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],$param[1],$param[2]] ) }}">全部</a></span>
                   	@foreach($country as $key=>$val)
    	            <span class="c "><a href="{{ URL::route('movieCategorySearch', [$uri,$val->id,$param[1],$param[2]] ) }}">{{ $val->name }}</a></span>
                    @endforeach
                </dd>
            </dl>
            <dl class="cf">
                <dt>按年份</dt>
                <dd>
                    <span class="c on"><a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],$param[1],$param[2]] ) }}">全部</a></span>
                    <?php $arr = [2015,2014,2013,2012,2011,2010,2009,2008,2007,2006,2005,2004,2003,2002,2001,2000];?>
					@foreach($arr as $val)
                    <span class="c "><a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],$val,$param[2]] ) }}">{{ $val }}</a></span>
                    @endforeach
                </dd>
            </dl>
            <dl class="star-list cf">
                <dt>按明星</dt>
                <dd>
                <span class="c on"><a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],$param[1],$param[2]] ) }}">全部</a></span>
                    @foreach($mingxing as $key=>$val)
                    <span class="c "><a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],$param[1],$val->id] ) }}">{{ $val->name }}</a></span>
                    @endforeach                
                </dd>
            </dl>
        </div>
    </div>
    
</div>
<div class="add-wrapper aw-mt30">
    <div class="left-tab-module ">
        <div class="tab-bar mb15">
            <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" class="on btn">热门电影</a>
            <a href="http://kan.sogou.com/dianying/xiju---good-/" class=" btn">好评电影</a>
            <a href="http://kan.sogou.com/dianying/xiju---new-/" class=" btn">最新电影</a>
            <div class="line"></div>
        </div>
        <div class="tabcont tab-1">
                        <div class="add-list-1">
                <ul class="cf">
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180832207/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:58:16</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180832207/" target="_blank">横冲直撞好莱坞</a>
                            </p>
                            <p class="descr">暖萌佟大为喜感大爆棚</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6LW16JaH/" target="_blank">赵薇</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6buE5pmT5piO/" target="_blank">黄晓明</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5L2f5aSn5Li6/" target="_blank">佟大为</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E8%92%82%E5%A7%86%C2%B7%E8%82%AF%E5%BE%B7%E5%B0%94" target="_blank">蒂姆·肯德尔</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>4.6分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186270073&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180832310/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(1)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:26:42</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180832310/" target="_blank">恋爱排班表</a>
                            </p>
                            <p class="descr">激情视频连锁反应 许晴上演小三诱惑</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6K645pm0/" target="_blank">许晴</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6L2m5pmT/" target="_blank">车晓</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5Y2O5bCR/" target="_blank">华少</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E4%B8%81%E4%B9%83%E7%AD%9D" target="_blank">丁乃筝</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>4.4分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186270173&vtype=1" pbtag="." target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180805857/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(2)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 01:47:22</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180805857/" target="_blank">栀子花开</a>
                            </p>
                            <p class="descr">年度最高颜值大片</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5p2O5piT5bOw/" target="_blank">李易峰</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5byg5oWn6Zuv/" target="_blank">张慧雯</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5bC85Z2k/" target="_blank">尼坤</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E4%BD%95%E7%82%85" target="_blank">何炅</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>4.1分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186269172&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180831266/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/20151008174819_645.jpg" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 01:28:53</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180831266/" target="_blank">一路向前</a>
                            </p>
                            <p class="descr">陈赫上演爆笑办公室恋情</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6ZmI6LWr/" target="_blank">陈赫</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5aea5pif5b2k/" target="_blank">姚星彤</a>
                                                                <a href="http://kan.sogou.com/dianying/star//" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E4%BE%AF%E4%BA%AE" target="_blank">侯亮</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>3.3分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186268135&vtype=1" pbtag="." target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180829512/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(3)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:33:49</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180829512/" target="_blank">疯狂外星人</a>
                            </p>
                            <p class="descr">谢耳朵献声Q萌外星人</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5ZCJ5aeGwrfluJXmo67mlq8/" target="_blank">吉姆·帕森斯</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6JW-5ZOI5aic/" target="_blank">蕾哈娜</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5Y-y6JKC5aSrwrfpqazkuIE/" target="_blank">史蒂夫·马丁</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E8%92%82%E5%A7%86%C2%B7%E7%BA%A6%E7%BF%B0%E9%80%8A" target="_blank">蒂姆·约翰逊</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/donghua----/" target="_blank">动画</a>
                                                                <a href="http://kan.sogou.com/dianying/qihuan----/" target="_blank">奇幻</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>7.5分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186265200&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180830177/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(4)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:38:15</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180830177/" target="_blank">土豪520</a>
                            </p>
                            <p class="descr">吴镇宇苦追姚星彤 土豪求爱笑料百出</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5ZC06ZWH5a6H/" target="_blank">吴镇宇</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5aea5pif5b2k/" target="_blank">姚星彤</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6ams5aSp5a6H/" target="_blank">马天宇</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E6%9E%97%E7%88%B1%E5%8D%8E" target="_blank">林爱华</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>3.5分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186266501&vtype=1" pbtag="." target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180826071/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(5)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:50:12</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180826071/" target="_blank">澳门风云2</a>
                            </p>
                            <p class="descr">发哥贱帅赌神再临</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5ZGo5ram5Y-R/" target="_blank">周润发</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5byg5a626L6J/" target="_blank">张家辉</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5YiY5ZiJ546y/" target="_blank">刘嘉玲</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E7%8E%8B%E6%99%B6" target="_blank">王晶</a>
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%BC%A0%E6%95%8F" target="_blank">张敏</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/dongzuo----/" target="_blank">动作</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5.8分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186258485&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180825226/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(6)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 02:06:25</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180825226/" target="_blank">咱们结婚吧</a>
                            </p>
                            <p class="descr">四对情侣的坎坷婚旅</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6auY5ZyG5ZyG/" target="_blank">高圆圆</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5aec5q2m/" target="_blank">姜武</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p2O5pmo/" target="_blank">李晨</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%88%98%E6%B1%9F" target="_blank">刘江</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>6.1分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186257185&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180806163/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(7)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">标清 01:40:07</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180806163/" target="_blank">何以笙箫默</a>
                            </p>
                            <p class="descr">晓明爱上杨幂谱写真爱神话</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6buE5pmT5piO/" target="_blank">黄晓明</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p2o5bmC/" target="_blank">杨幂</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5L2f5aSn5Li6/" target="_blank">佟大为</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E6%9D%A8%E6%96%87%E5%86%9B" target="_blank">杨文军</a>
                                                                <a href="http://kan.sogou.com/search?keyword=%E9%BB%84%E6%96%8C" target="_blank">黄斌</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>3.6分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186256859&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180825048/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(8)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:29:20</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180825048/" target="_blank">将错就错</a>
                            </p>
                            <p class="descr">小沈阳痴恋熊黛林 王李丹妮秀胸</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/55Sw5Lqu/" target="_blank">田亮</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5bCP5rKI6Ziz/" target="_blank">小沈阳</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6ZmI5bCP5pil/" target="_blank">陈小春</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E7%8E%8B%E5%AE%81" target="_blank">王宁</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>3.8分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186256873&vtype=1" pbtag="." target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180824770/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(9)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:48:25</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180824770/" target="_blank">爸爸的假期</a>
                            </p>
                            <p class="descr">星爸相聚互爆糗事</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6YOt5rab/" target="_blank">郭涛</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6YOt5a2Q552_/" target="_blank">郭子睿</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p6X5b-X6aKW/" target="_blank">林志颖</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E7%8E%8B%E5%B2%B3%E4%BC%A6" target="_blank">王岳伦</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>8分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186256081&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180823248/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(10)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:37:20</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180823248/" target="_blank">大喜临门</a>
                            </p>
                            <p class="descr">李东学演绎岳父斗女婿</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/54yq5ZOl5Lqu/" target="_blank">猪哥亮</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p6X5b-D5aaC/" target="_blank">林心如</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p2O5Lic5a2m/" target="_blank">李东学</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E9%BB%84%E6%9C%9D%E4%BA%AE" target="_blank">黄朝亮</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5.5分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186253307&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180823144/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(11)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 02:12:07</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180823144/" target="_blank">重返20岁</a>
                            </p>
                            <p class="descr">杨子姗鹿晗祖孙致青春</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6bm_5pmX/" target="_blank">鹿晗</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5b2S5Lqa6JW-/" target="_blank">归亚蕾</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6ZmI5p-P6ZyW/" target="_blank">陈柏霖</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E9%99%88%E6%AD%A3%E9%81%93" target="_blank">陈正道</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                <a href="http://kan.sogou.com/dianying/qihuan----/" target="_blank">奇幻</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>7.3分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186253188&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180822892/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/20150519184637_659.jpg" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 01:25:39</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180822892/" target="_blank">热血男人帮</a>
                            </p>
                            <p class="descr">陈翔携三大叔打造狗血天团</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6ZmI57-U/" target="_blank">陈翔</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6Iux6L6-/" target="_blank">英达</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5oi056uL5b-N/" target="_blank">戴立忍</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E6%9F%A5%E6%85%95%E6%98%A5" target="_blank">查慕春</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5.2分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186252791&vtype=1" pbtag="." target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180818471/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(12)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:45:06</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180818471/" target="_blank">一路惊喜</a>
                            </p>
                            <p class="descr">郭采洁床压凤小岳 群星贺岁温暖除夕</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6JCn5pWs6IW-/" target="_blank">萧敬腾</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6YOt6YeH5rSB/" target="_blank">郭采洁</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5Yek5bCP5bKz/" target="_blank">凤小岳</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E9%87%91%E4%BE%9D%E8%90%8C%2C%E6%BD%98%E5%AE%89%E5%AD%90%2C%E7%AB%A0%E5%AE%B6%E7%91%9E%2C%E5%AE%8B%E8%BF%AA" target="_blank">金依萌,潘安子,章家瑞,宋迪</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5.1分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=186250515&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180807329/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(13)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 01:27:47</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180807329/" target="_blank">奔跑吧兄弟</a>
                            </p>
                            <p class="descr">巨星云集再次奔跑</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5p2o6aKW/" target="_blank">杨颖</a>
                                                                <a href="http://kan.sogou.com/dianying/star/546L5a6d5by6/" target="_blank">王宝强</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p2O5pmo/" target="_blank">李晨</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E8%83%A1%E7%AC%B3" target="_blank">胡笳</a>
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%B2%91%E4%BF%8A%E4%B9%89" target="_blank">岑俊义</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/jilupian----/" target="_blank">纪录片</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>3.4分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=184236633&vtype=1" pbtag="." target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180807238/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(14)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:40:23</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180807238/" target="_blank">十万个冷笑话</a>
                            </p>
                            <p class="descr">空手接白刃最萌时光鸡</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6Zi_5p2w/" target="_blank">阿杰</a>
                                                                <a href="http://kan.sogou.com/dianying/star/55qH6LSe5a2j/" target="_blank">皇贞季</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5a6d5pyo5Lit6Ziz/" target="_blank">宝木中阳</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%8D%A2%E6%81%92%E5%AE%87" target="_blank">卢恒宇</a>
                                                                <a href="http://kan.sogou.com/search?keyword=%E6%9D%8E%E5%A7%9D%E6%B4%81" target="_blank">李姝洁</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="http://kan.sogou.com/dianying/qihuan----/" target="_blank">奇幻</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>6.4分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=184225546&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180806994/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(15)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 01:46:29</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180806994/" target="_blank">有种你爱我</a>
                            </p>
                            <p class="descr">江一燕郑恺上演夺子大战</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5rGf5LiA54eV/" target="_blank">江一燕</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6YOR5oG6/" target="_blank">郑恺</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5LqO56yR/" target="_blank">于笑</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E6%9D%8E%E6%AC%A3%E8%94%93" target="_blank">李欣蔓</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>4.9分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=184197176&vtype=1" pbtag="d5b10bf14e4ec2cc40c43947c57b3b41.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180806965/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(16)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:35:58</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180806965/" target="_blank">熊出没之雪岭熊风</a>
                            </p>
                            <p class="descr">狗熊岭百年不遇大雪</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5byg5Lyf/" target="_blank">张伟</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5byg56eJ5ZCb/" target="_blank">张秉君</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6LCt56yR/" target="_blank">谭笑</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E4%B8%81%E4%BA%AE" target="_blank">丁亮</a>
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%88%98%E5%AF%8C%E6%BA%90" target="_blank">刘富源</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/donghua----/" target="_blank">动画</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>7.3分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=184181245&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180806839/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(17)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 02:20:34</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180806839/" target="_blank">一步之遥</a>
                            </p>
                            <p class="descr">姜文葛优争议贺岁</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5aec5paH/" target="_blank">姜文</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6JGb5LyY/" target="_blank">葛优</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5ZGo6Z-1/" target="_blank">周韵</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%A7%9C%E6%96%87" target="_blank">姜文</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/yinyue----/" target="_blank">音乐</a>
                                                                <a href="http://kan.sogou.com/dianying/dongzuo----/" target="_blank">动作</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>6.3分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=184166649&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180806460/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(18)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:37:45</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180806460/" target="_blank">爸爸去哪儿2</a>
                            </p>
                            <p class="descr">星爸萌娃再聚首</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6buE56OK/" target="_blank">黄磊</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6buE5b-G5oWI/" target="_blank">黄忆慈</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5pu55qC8/" target="_blank">曹格</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E8%B0%A2%E6%B6%A4%E8%91%B5" target="_blank">谢涤葵</a>
                                                                <a href="http://kan.sogou.com/search?keyword=%E6%9E%97%E5%A6%8D" target="_blank">林妍</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>4.5分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=184140470&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180805859/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(19)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 02:03:06</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180805859/" target="_blank">暴走神探</a>
                            </p>
                            <p class="descr">神探阮经天对戏周冬雨</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6Ziu57uP5aSp/" target="_blank">阮经天</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5ZGo5Yas6Zuo/" target="_blank">周冬雨</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p2o5a2Q5aeX/" target="_blank">杨子姗</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E7%BD%97%E5%8D%93%E7%91%B6" target="_blank">罗卓瑶</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/dongzuo----/" target="_blank">动作</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/xuanyi----/" target="_blank">悬疑</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5.3分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=184081116&vtype=1" pbtag="d5b10bf14e4ec2cc40c43947c57b3b41.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180804128/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(20)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:34:43</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180804128/" target="_blank">我的早更女友</a>
                            </p>
                            <p class="descr">周迅佟大为演绎爱情</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5ZGo6L-F/" target="_blank">周迅</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5L2f5aSn5Li6/" target="_blank">佟大为</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6ZKf5rGJ6Imv/" target="_blank">钟汉良</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E9%83%AD%E5%9C%A8%E5%AE%B9" target="_blank">郭在容</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5.5分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183960636&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180804072/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(21)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:23:21</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180804072/" target="_blank">精武青春</a>
                            </p>
                            <p class="descr">吴千语求爱徐正曦 暴力少女功夫无敌</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5ZC05Y2D6K-t/" target="_blank">吴千语</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5b6Q5q2j5pum/" target="_blank">徐正曦</a>
                                                                <a href="http://kan.sogou.com/dianying/star/55ub5ZCb/" target="_blank">盛君</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E9%82%B1%E7%A4%BC%E6%B6%9B" target="_blank">邱礼涛</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="http://kan.sogou.com/dianying/dongzuo----/" target="_blank">动作</a>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>3.2分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183955408&vtype=1" pbtag="." target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180803593/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(22)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:43:13</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180803593/" target="_blank">男人不可以穷</a>
                            </p>
                            <p class="descr">陈伟霆黄宗泽爆笑比拼</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6buE5a6X5rO9/" target="_blank">黄宗泽</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6ZmI5Lyf6ZyG/" target="_blank">陈伟霆</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6LCi5aSp5Y2O/" target="_blank">谢天华</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E9%92%9F%E6%BE%8D%E4%BD%B3" target="_blank">钟澍佳</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>6.1分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183914736&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180803345/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(23)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">标清 01:33:28</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180803345/" target="_blank">撒娇女人最好命</a>
                            </p>
                            <p class="descr">会撒娇的女人最好命</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5ZGo6L-F/" target="_blank">周迅</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6buE5pmT5piO/" target="_blank">黄晓明</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6ZqL5qOg/" target="_blank">隋棠</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%BD%AD%E6%B5%A9%E7%BF%94" target="_blank">彭浩翔</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>6分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183893739&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180799059/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(24)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 01:58:00</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180799059/" target="_blank">心花路放</a>
                            </p>
                            <p class="descr">黄渤徐峥爆笑猎艳之旅</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/6buE5rik/" target="_blank">黄渤</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5b6Q5bOl/" target="_blank">徐峥</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6KKB5rOJ/" target="_blank">袁泉</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%AE%81%E6%B5%A9" target="_blank">宁浩</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>7分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183809367&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180801734/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(25)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">高清 01:53:08</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180801734/" target="_blank">单身男女2</a>
                            </p>
                            <p class="descr">古天乐高圆圆再续前缘</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5Y-k5aSp5LmQ/" target="_blank">古天乐</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p2o5Y2D5ayF/" target="_blank">杨千嬅</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6auY5ZyG5ZyG/" target="_blank">高圆圆</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E6%9D%9C%E7%90%AA%E5%B3%B0" target="_blank">杜琪峰</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/juqing----/" target="_blank">剧情</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5.3分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183751589&vtype=1" pbtag="7e39d373369b981c0cb229410e5e2676.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180801471/" target="_blank" class="i">
                            <span class="super"></span>                            <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(26)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">超清 01:26:59</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180801471/" target="_blank">求爱大作战</a>
                            </p>
                            <p class="descr">另类求爱大作战</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5rKI6ZyH6L2p/" target="_blank">沈震轩</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6ZmI5aWC5LuB/" target="_blank">陈奂仁</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5byg5bu65aOw/" target="_blank">张建声</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%8F%B6%E5%BF%B5%E7%90%9B" target="_blank">叶念琛</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>4.3分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183707871&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                        <li>
                    <div class="cell cf">
                        <a href="http://kan.sogou.com/player/180797013/" target="_blank" class="i">
                                                        <img src="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/link(27)" alt="">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">标清 01:35:08</p>
                        </a>
                        <div class="infor">
                            <p class="tit">
                                <a href="http://kan.sogou.com/player/180797013/" target="_blank">临时同居</a>
                            </p>
                            <p class="descr">郑秀文张家辉"同居"起底</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                                                                                <a href="http://kan.sogou.com/dianying/star/5byg5a626L6J/" target="_blank">张家辉</a>
                                                                <a href="http://kan.sogou.com/dianying/star/6YOR56eA5paH/" target="_blank">郑秀文</a>
                                                                <a href="http://kan.sogou.com/dianying/star/5p2o6aKW/" target="_blank">杨颖</a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                 
                                                                <a href="http://kan.sogou.com/search?keyword=%E5%8D%93%E9%9F%B5%E8%8A%9D" target="_blank">卓韵芝</a>
                                                                <a href="http://kan.sogou.com/search?keyword=" target="_blank"></a>
                                                                                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                                                <a href="./好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影_files/好看的喜剧电影大全_最新喜剧电影排行榜-搜狗电影.htm" target="_blank">喜剧</a>
                                                                <a href="http://kan.sogou.com/dianying/aiqing----/" target="_blank">爱情</a>
                                                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                                <span>5分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="http://kan.sogou.com/epjump?vid=183971542&vtype=1" pbtag="d819349850ba15fecbbd4a169d407b75.dianying" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
                        </div>
                    </div>
                    </li>
                                </ul></div>
                        <!-- Paging -->
            <div class="sub-pager-bar">
        <span class="current prev">上一页</span>
    	
					<span class="current">1</span>
							<a href="http://kan.sogou.com/dianying/xiju----2/">2</a>
							<a href="http://kan.sogou.com/dianying/xiju----3/">3</a>
							<a href="http://kan.sogou.com/dianying/xiju----4/">4</a>
							<a href="http://kan.sogou.com/dianying/xiju----5/">5</a>
							<span>...</span>
							<a href="http://kan.sogou.com/dianying/xiju----214/">214</a>
				
	    <a href="http://kan.sogou.com/dianying/xiju----2/" class="next">下一页</a>
	</div>
        </div>
    </div>
</div>
@include('layouts.footer')
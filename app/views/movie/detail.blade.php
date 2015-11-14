@include('layouts.header') 
<!-- 详情 -->
<div class="wrapper mt20">
    <div class="left">
	    <div>
    		<dl class="comic-intro movie-intro tv-intro cf">
   				<dt>
					<a class="img-link hover-item" href="{{ URL::ROUTE('moviePlay',[$detail->id]) }}" target="_blank">
                    	<img src="{{ $detail->img }}" alt="{{ $detail->title }}">
				        <span class="p-cover"></span>
				        <i class="pi png-fix"></i>
				    </a>
       				 <div class="db-share cf">
            		 	<div class="dbc">
                        	<a href="{{ URL::ROUTE('moviePlay',[$detail->id]) }}" target="_blank">评分：<i>{{ $detail->score }}</i></a>
                        </div>
        			 </div>
			    </dt>
                <dd>
                    <h1 class="title txt-overflow">
                	    <a href="{{ URL::ROUTE('moviePlay',[$detail->id]) }}" target="_blank" id="video-title" title="{{ $detail->name }}">{{ $detail->name }}</a>
                    </h1>
                    <div class="video-info">
                    	<span class="info-time">中国大陆上映：</span>
                        <span class="info-time">{{ date('Y-m-d',$detail->release_time) }}</span><br>
                        <span class="info-title">主演：</span>
                         @foreach(MoviePerson::select('P.name','P.id')->where('P.id','!=','')->where('movie_id','=',$detail->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->get() as $v)
                        <a href="{{ URL::route('personDetail',[$v->id]) }}" class="link" target="_blank">{{ $v->name }}</a>
                        @endforeach
                        <br>
                        
                        <span class="info-title">导演：</span>
                        <a rel="nofollow" href="{{ URL::route('personDetail',[$detail->director_id]) }}" class="link" target="_blank">{{ Person::where('id','=',$detail->director_id)->pluck('name') }}</a><br>
                        
                        <span class="info-title">类型：</span>
                        <span class="width-250" style="width:500px;">
                          @foreach(MovieCategoryList::select('M.name','M.url')->where('movie_id','=',$detail->id)->leftJoin('m_movie_category as M','M.id','=','m_movie_category_list.category_id')->orderBy('M.sort','desc')->get() as $v)
                          <a href="{{ URL::route('movieCategory',[$v->url]) }}" target="_blank" class="btn-link">{{ $v->name }}</a>
                          @endforeach                         	
                         </span><br />
                         
                         <span class="info-title">地区：</span>
                         <span class="width-250" style="width:200px;">
                         	{{ Country::where('id','=',$detail->country_id)->pluck('name') }}
                         </span>
                         
                         <span class="info-title">时长：</span>
                         <span class="width-250">
                         	<span class="time">{{ $detail->play_time }}</span>
                         </span><br>
                         
                         <span class="info-title">简介：</span>
                         <div id="tv_summary" class="info-cont">
                         	<span class="width-540 close">
                            	{{ mb_substr($detail->content,0,101,'utf-8') }}...<a href="{{ URL::ROUTE('moviePlay',[$detail->id]) }}">[详情]</a>
                           </span>
                       </div>
                </div>
                
                <div class="add-btn-wrap">
                	<a href="{{ URL::ROUTE('moviePlay',[$detail->id]) }}" class="play-btn" target="_blank"><i></i>立即播放</a>
                </div>
                    <!-- 顶踩 -->
                <div class="dingcai" id="updown" style="">
                	<a href="http://kan.sogou.com/player/180825226/#" class="dc-btn ding-btn" data-type="up"></a>
                    
                	<div class="dc-percent">   
                    	<p class="txt">         
                        	<span class="percent-txt"><em><?php $arr = explode('.',$detail->score);echo $arr[0]?></em>.{{ $arr[1] }}</span><i class="tx">分</i>/
                            <span class="total-txt">0</span>人评价      
                        </p>   
                        <div class="percent-bar">    
	                        <div class="ding-percent" style="width: 0%"></div>   
                        </div> 
                    </div>
	                <a href="http://kan.sogou.com/player/180825226/#" class="dc-btn cai-btn" data-type="down"></a>
                </div>
        </dd>
    </dl>
    <!--看点-->
    </div>
    
    <!-- 猜你喜欢 -->
    <div class="left-tab-module js-tab-module mt20" id="recommend_module">
       <div class="tab-bar">
            <a href="http://kan.sogou.com/player/180825226/#" class="on btn js-tab-btn" id="bar_guess">猜你喜欢</a>
            <!--<a href="http://kan.sogou.com/player/180825226/#" class="btn js-tab-btn" id="bar_actor">同主演作品</a>
            <a href="http://kan.sogou.com/player/180825226/#" class="btn js-tab-btn" id="bar_director">同导演作品</a>-->
            <div class="line">
            </div>
        </div>
    
    <div class="tab-content mt20 video-scroll high-scroll js-tab-content" id="content_guess">
	    <ul class="list cf" style="width: 10000px;">
    	<?php 
			$ids = MovieCategoryList::select('category_id')->where('movie_id','=',$detail->id)->get()->toArray();
			$id = '(';
			foreach($ids as $val){
				$id .= $val['category_id'].',';
			}
			$id = trim($id,',').')';
		?>
        @if($id)
    	@foreach(MovieCategoryList::select('M.name','M.title','M.id','M.img','M.intro')->whereRaw('M.id!='.$detail->id.' and category_id in '.$id,array())->leftJoin('m_movie as M','M.id','=','m_movie_category_list.movie_id')->orderBy('M.id','desc')->groupBy('M.id')->take(10)->get() as $key=>$val)
        <li class="video-item high-video-item">
            <a class="img-link hover-item" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" target="_blank">
                <img src="{{ $val->img }}" alt="{{ $val->title }}">
                <span class="p-cover"></span>
                <i class="pi"></i>
                <span class="op-cover">{{ $val->play_time }}</span>
            </a>
            <a href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" target="_blank" class="title">{{ $val->name }}</a>
            <span class="type">{{ mb_substr($val->intro,0,15,'utf-8') }}</span>
        </li>        
        @endforeach
        @endif
        </ul>
    </div>
    
        <div class="tab-content mt20 video-scroll high-scroll js-tab-content" id="content_guess">
	    <ul class="list cf" style="width: 10000px;">
    	<?php 
			$ids = MovieCategoryList::select('category_id')->where('movie_id','=',$detail->id)->get()->toArray();
			$id = '(';
			foreach($ids as $val){
				$id .= $val['category_id'].',';
			}
			$id = trim($id,',').')';
		?>
        @if($id)
    	@foreach(MovieCategoryList::select('M.name','M.title','M.id','M.img','M.intro')->whereRaw('M.id!='.$detail->id.' and category_id in '.$id,array())->leftJoin('m_movie as M','M.id','=','m_movie_category_list.movie_id')->orderBy('M.id','desc')->groupBy('M.id')->take(10)->get() as $key=>$val)
        @if($key>4)
        <li class="video-item high-video-item">
            <a class="img-link hover-item" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" target="_blank">
                <img src="{{ $val->img }}" alt="{{ $val->title }}">
                <span class="p-cover"></span>
                <i class="pi"></i>
                <span class="op-cover">{{ $val->play_time }}</span>
            </a>
            <a href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" target="_blank" class="title">{{ $val->name }}</a>
            <span class="type">{{ mb_substr($val->intro,0,15,'utf-8') }}</span>
        </li>        
        @endif
        @endforeach
        @endif
        </ul>
    </div>
    
    <!--
    <div class="tab-content mt20 video-scroll high-scroll js-tab-content" style="display:none;" id="content_actor">
    <ul class="list cf" style="width: 10000px;">
        <li class="video-item high-video-item">
            <a class="img-link hover-item" href="http://kan.sogou.com/player/180826072/" target="_blank">
                 <img src="./咱们结婚吧在线观看_咱们结婚吧电影高清完整版-搜狗电影_files/20150717115824_856.jpg" alt="">
                <span class="p-cover"></span>
                <i class="pi"></i>
                <span class="op-cover">高清 01:45:55</span>
            </a>
            <a href="http://kan.sogou.com/player/180826072/" target="_blank" class="title">我是女王</a>
            <span class="type">爱情</span>
        </li>
    </ul>
    <a href="" class="left-btn png-fix"></a>
    <a href="" class="right-btn png-fix"></a>
    </div>
    
    <div class="tab-content mt20 video-scroll high-scroll js-tab-content" style="display:none;" id="content_director">
    <ul class="list cf" style="width: 10000px;">
        <li class="video-item high-video-item">
            <a class="img-link hover-item" href="http://kan.sogou.com/player/94632/" target="_blank">
                <img src="./咱们结婚吧在线观看_咱们结婚吧电影高清完整版-搜狗电影_files/link(12)" alt="">
                <span class="p-cover"></span>
                <i class="pi"></i>
                <span class="op-cover">高清 01:32:01</span>
            </a>
            <a href="http://kan.sogou.com/player/94632/" target="_blank" class="title">即日启程</a>
            <span class="type">喜剧/剧情</span>
        </li>
    </ul>
    </div>
    -->
    
    </div>
        <!-- 预告·花絮、剧照 -->
        <!--
    <div class="left-tab-module mt20 js-tab-module" id="pianhua">
        <div class="tab-bar">
        <a href="http://kan.sogou.com/player/180825226/#" class="on btn js-tab-btn">预告·花絮</a>
        <a href="http://kan.sogou.com/player/180825226/#" class=" btn js-tab-btn">剧照</a>
        <div class="line">
    </div>
    </div>
    
    <div class="tab-content mt20 video-scroll lower-scroll js-tab-content" id="pianhua_video" pbflag="wc_0_预告花絮">
        <ul class="list cf" style="width: 10000px;">
        <li class="video-item scroll-item">
        <a rel="nofollow" class="img-link" href="http://www.iqiyi.com/w_19rt9a905p.html?ptag=vsogou" target="_blank">
        <img src="./咱们结婚吧在线观看_咱们结婚吧电影高清完整版-搜狗电影_files/link(14)" alt="">
        <span class="p-cover"></span>
        <i class="pi"></i>
        <span class="gri-cover cf">
        <i class="site">爱奇艺</i>
        <i class="time">4:22</i>
        </span>
        </a>
        <a rel="nofollow" href="http://www.iqiyi.com/w_19rt9a905p.html?ptag=vsogou" target="_blank" class="title">【搞笑趣闻精选】解说《咱们结婚吧》穿帮镜头 何仙姑?</a>
        </li>   
        </ul>
        <a href="http://kan.sogou.com/player/180825226/#" class="left-btn png-fix"></a>
        <a href="http://kan.sogou.com/player/180825226/#" class="right-btn png-fix"></a>
    </div>
    <div class="tab-content mt20 video-scroll lower-scroll juzhao-scroll js-tab-content" style="display:none" id="pianhua_photo" pbflag="wc_0_剧照">
        <ul class="list cf" style="width: 10000px;">
        <li class="juzhao-item video-item">
        <a rel="nofollow" href="http://movie.douban.com/photos/photo/2223385606/" target="_blank">
        <img src="./咱们结婚吧在线观看_咱们结婚吧电影高清完整版-搜狗电影_files/link(34)" alt="">
        </a>
        </li>
        </ul>
        <a href="http://kan.sogou.com/player/180825226/#" class="left-btn png-fix"></a>
        <a href="http://kan.sogou.com/player/180825226/#" class="right-btn png-fix"></a>
    </div>
    </div>
        -->
    <!-- 豆瓣影评 -->
    <!--
    <div class="left-tab-module left-mm-module mt20" id="reviews">
        <div class="tab-bar">
            <span class="t">豆瓣影评</span>
            <div class="line"></div>
            <a rel="nofollow" href="http://movie.douban.com/subject/26140241/reviews" target="_blank" class="more"></a>
        </div>
        <div class="tab-content mt20">
            <div class="douban-item">
                <div class="title">
                <i class="dot"></i>
                <a rel="nofollow" href="http://movie.douban.com/review/7434380/" target="_blank" class="t">直男癌导演太可怕了</a>
                <span class="star star1"></span>
                </div>
                <p class="commit">文/公元1874《咱们结婚吧》来源于去年热播的同名剧集。其实电视剧拍电影这事，国外干过很多次了。汤姆·克鲁斯的《碟中谍》就是翻拍的电视剧，甚至比原版远远有名；《性感都市》在小荧屏上火了，上了大银幕也捞...<a rel="nofollow" href="http://movie.douban.com/review/7434380/" target="_blank" class="btn">(120回应)</a></p>
                <div class="info">
                <span class="d">2015-10-10</span>
                <span class="like">807喜欢</span>
                </div>
            </div>
        </div>
    </div>
    -->
    </div>
    
     <!--右侧内容-->  
    <div class="right">
        <?php 
			$category = MovieCategoryList::select('category_id')->where('movie_id','=',$detail->id)->take(2)->get();
			if($category){
				$info = MovieCategory::where('id','=',$category[0]->category_id)->orderBy('sort','desc')->first();
			}
		?>
        @if($category)
        <div class="right-rank">
            <div class="rank-header">
                <span class="t">{{ $info->name }}排行榜</span>
                <i></i>
                <a target="_blank" href="{{ URL::route('movieCategory', [$info->url] ) }}" class="more"></a>
            </div>
            <div class="list-rank">
            <ul>
				@foreach(MovieCategoryList::select('M.name','M.id','M.score')->whereRaw('category_id = '.$info->id,array())->leftJoin('m_movie as M','M.id','=','m_movie_category_list.movie_id')->orderBy('M.hits','desc')->groupBy('M.id')->take(10)->get() as $key=>$val)
                <li class="cf">
                <span class="num @if($key<3)t3@endif">{{ $key+1 }}</span>
                <a class="l" target="_blank" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}">{{ $val->name }}</a>
                <a target="_blank" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" class="d">{{ $val->score }}</a>
                </li>
                @endforeach
                </ul>
            </div>
        </div>
		
        @if(isset($category[1]))
        <?php $info = MovieCategory::where('id','=',$category[1]->category_id)->orderBy('sort','desc')->first();?>
        <div class="right-rank mt20">
            <div class="rank-header">
                <span class="t">{{ $info->name }}排行榜</span>
                <i></i>
                <a target="_blank" href="{{ URL::route('movieCategory', [$info->url] ) }}" class="more"></a>
            </div>
            <div class="list-rank">
                <ul>
					@foreach(MovieCategoryList::select('M.name','M.id','M.score')->whereRaw('category_id = '.$info->id,array())->leftJoin('m_movie as M','M.id','=','m_movie_category_list.movie_id')->orderBy('M.hits','desc')->groupBy('M.id')->take(10)->get() as $key=>$val)                <li class="cf">
                <span class="num @if($key<3)t3@endif">{{ $key+1 }}</span>
                <a class="l" target="_blank" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}">{{ $val->name }}</a>
                <a target="_blank" href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" class="d">{{ $val->score }}</a>
                </li>
                @endforeach
                </ul>
            </div>
        </div>
        @endif
        @endif
        <!-- 相关资讯 -->
        <div class="right-rank mt20" id="zixun" style="">  
            <div class="rank-header">
                <span class="t">相关资讯</span>
                <a  href="{{ URL::ROUTE('article') }}" target="_blank" class="more"></a>
                 <i></i>
            </div>
            <div class="dot-rank">
                <ul>
                	@foreach(News::orderBy('id','desc')->take(3)->get() as $val)
                    <li class="cf"></li>
                    <li class="cf">
                    	<span class="dot"></span><a href="{{ URL::ROUTE('articleDetail',[$val->id]) }}" target="_blank">{{ $val->newstitle }}</a>
                    </li>
                    @endforeach
                </ul>
            </div> 
        </div>
        <!-- 分类Tab
        <div class="right-tab-m mt30">
            <a target="_blank" href="/news" class="yahei btn tab-btn on">最新</a>
            <a target="_blank" href="/category/kehuan" class="yahei btn tab-btn ">科幻</a>
            <a target="_blank" href="/category/aiqing" class="yahei btn tab-btn ">爱情</a>
            <a target="_blank" href="/category/ganren" class="yahei btn tab-btn ">感人</a>
        </div>
        <div class="hr20"></div>
        <dl class="type-area ta-border">
            <dt>按类型</dt>
            <dd class="mt10">
                <ul class="cf">
                    <li>
                        <a target="_blank" href="/category/kehuan">爱情</a>
                    </li>
                </ul>
            </dd>                
        </dl>
        <dl class="type-area">
            <dt>按地区</dt>
            <dd class="mt10">
                <ul class="cf">
                    <li>
                        <a target="_blank" href="/category/kehuan">韩国</a>
                    </li>
                </ul>
            </dd>                
        </dl>
        </div> -->
	</div>
    
    
    
    
    
</div>
<!-- 热门电影 -->
<div class="wd-module hot-tv">
<div class="his-tele-bar">
<span class="tt">热门喜剧电影</span>
</div>
<div class="hot-tv-list">
<ul class="cf">
	@foreach(Movie::select('name','id')->where('release_time','>',strtotime('2015-1-1'))->where('status','=',1)->orderBy('hits','desc')->take(25)->get() as $val)
    <li>
        <span class="dot"></span>
        <a href="{{ URL::ROUTE('movieDetail',[$val->id]) }}" target="_blank">{{ $val->name }}</a>
     </li>
     @endforeach
 </ul>
</div>
</div>
@include('layouts.footer') 

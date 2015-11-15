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
    

    
    </div>

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

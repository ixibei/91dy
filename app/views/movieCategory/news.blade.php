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
                <span class="c">{{ $catInfo['name'] }}<a href="/" class="close">×</a></span>
                @foreach($breadcrumbs as $key=>$val)
                <?php 
					$bread = $param;
					$bread[$key] = 0;
				?>
                <span class="c">{{ $val }}<a href="{{ URL::route('movieNewsSearch', [$bread[0],$bread[1],$bread[2],$bread[3]] ) }}" class="close">×</a></span>
                @endforeach
                <span class="n">共<em>{{ $count }}</em>部</span>
            </div>
        </div>
        <div class="af-list">
            <dl class="cf">
                <dt>按类型</dt>
                <dd>
                	<span class="c "><a href="/">全部</a></span>
                	<span class="c @if($uri == 'news')on@endif"><a href="{{ URL::route('movieCategorySearch', [$uri,$param[0],0,$param[1],$param[2],1] ) }}">最新</a></span>
                    @foreach($catList as $key=>$val)
                    <span class="c @if($val->url == 1)on@endif"><a href="{{ URL::route('movieCategorySearch', [$val->url,$param[0],0,$param[1],$param[2],1] ) }}">{{ $val->name }}</a></span>
                    @endforeach
                </dd>
            </dl>
            <dl class="cf">
                <dt>按地区</dt>
                <dd>
 	                <span class="c @if($param[0] == 0) on @endif"><a href="{{ URL::route('movieNewsSearch', [0,$param[1],$param[2],1] ) }}">全部</a></span>
                   	@foreach($country as $key=>$val)
    	            <span class="c @if($val->id == $param[0]) on @endif"><a href="{{ URL::route('movieNewsSearch', [$val->id,$param[1],$param[2],$param[3]] ) }}">{{ $val->name }}</a></span>
                    @endforeach
                </dd>
            </dl>
            <dl class="star-list cf">
                <dt>按明星</dt>
                <dd>
                <span class="c @if($param[1] == 0) on @endif"><a href="{{ URL::route('movieNewsSearch', [$param[0],0,$param[2],1] ) }}">全部</a></span>
                    @foreach($mingxing as $key=>$val)
                    <span class="c @if($val->id == $param[1]) on @endif"><a href="{{ URL::route('movieNewsSearch', [$param[0],$val->id,$param[2],$param[3]] ) }}">{{ $val->name }}</a></span>
                    @endforeach                
                </dd>
            </dl>
        </div>
    </div>
</div>
<div class="add-wrapper aw-mt30">
    <div class="left-tab-module ">
        <div class="tab-bar mb15">
            <a href="{{ URL::route('movieNewsSearch', [$param[0],$param[1],1,1] ) }}" class="btn @if($param[2] == 1)on@endif">热门电影</a>
            <a href="{{ URL::route('movieNewsSearch', [$param[0],$param[1],2,1] ) }}" class="btn @if($param[2] == 2)on@endif">好评电影</a>
            <div class="line"></div>
        </div>
        <div class="tabcont tab-1">
            <div class="add-list-1">
        		<ul class="cf">
                @foreach($data as $key=>$val)
                <li>
                	<div class="cell cf">
                   		<a href="{{ URL::route('movieDetail',[$val->id]) }}" target="_blank" class="i">
                            <img src="{{ $val->img }}" alt="{{ $val->title }}">
                            <span class="p-cover"></span>
                            <i class="pi"></i>
                            <p class="text_over">{{ $val->play_time }}</p>
                       </a>
                       <div class="infor">
                       		<p class="tit">
                       			<a href="{{ URL::route('movieDetail',[$val->id]) }}" target="_blank">{{ $val->name }}</a>
                    		</p>
                    		<p class="descr">{{ mb_substr($val->intro,0,15,'utf-8') }}</p>
                            <dl class="cf">
                                <dt>主演：</dt>
                                <dd>
                                    @foreach(MoviePerson::select('P.name','P.id')->where('movie_id','=',$val->id)->where('P.id','!=','')->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->take(3)->get() as $v)
                                    <a href="{{ URL::route('personDetail',[$v->id]) }}" target="_blank">{{ $v->name }}</a>
                                    @endforeach
                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>导演：</dt>
                                <dd>
                                    <a href="{{ URL::route('personDetail',[$val->director_id]) }}" target="_blank">{{ $val->director }}</a>
                                </dd>
                            </dl>
                            <dl class="cf">
                                <dt>类型：</dt>
                                <dd>
                                    @foreach(MovieCategoryList::select('M.name','M.url')->where('movie_id','=',$val->id)->leftJoin('m_movie_category as M','M.id','=','m_movie_category_list.category_id')->orderBy('M.sort','desc')->take(3)->get() as $v)
                                    <a href="{{ URL::route('movieCategory',[$v->url]) }}" target="_blank">{{ $v->name }}</a>
                                    @endforeach                                
                                </dd>
                            </dl>
                            <dl class="commit cf">
                                <dt>评分：</dt>
                                <dd>
                               		<span>{{ $val->score }}分</span>
                                </dd>
                            </dl>
                            <div class="btn-wrap">
                                <a href="{{ URL::route('movieDetail',[$val->id]) }}" target="_blank" class="btn"><i></i>立即播放</a>
                            </div>
               	 		</div>
            		</div>
                </li>
                @endforeach
                </ul>
      	    </div>
            <!-- Paging -->
			{{ $pages }}
        </div>
    </div>
</div>
@include('layouts.footer')
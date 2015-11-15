@include('layouts.header') 
<!-- 下部内容 -->
<div class="wd-module cf tele-bb-content">
  <div class="wd-left-m"> 
    <!-- 热播推荐 --> 
    <!-- 网络首播 -->
    <div class="wd-vv-module">
      <div class="tt-bar"> <a target="_blank" href="/news/" class="tt">最新热播</a> <a target="_blank" href="/news/" class="mm">更多</a> </div>
      <div class="tele-v2-module cf">
      	@foreach(Movie::where("is_news",'=',1)->where('add_time','>',time()-86400*30)->where('status','=',1)->orderBy('id','desc')->take(4)->get() as $val)
        <div class="tele-bw-item tele-bw-item-fix"> <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> <img src="{{ $val->img }}" alt="{{ $val->title }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
          <p class="text_over">{{ $val->play_time }}</p>
          </a>
          <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
          <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
        </div>
        @endforeach
      </div>
    </div>
    <div class="wd-vv-module">
      <div class="tt-bar"> <a target="_blank" href="/category/kehuan/" class="tt">科幻大片</a> <a target="_blank" href="/category/kehuan/" class="mm">更多</a> </div>
      <div class="tele-v2-module cf">
      	@foreach($category5 as $val)
        <div class="tele-bw-item tele-bw-item-fix"> <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> <img src="{{ $val->img }}" alt="{{ $val->title }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
          <p class="text_over">{{ $val->play_time }}</p>
          </a>
          <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
          <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="wd-right-container"> 
    <!-- 热播榜 -->
    <div class="wd-right-m wd-right-m-fix3">
      <div class="tt">热播榜</div>
      <ul class="wd-right-bang">
      	@foreach(Movie::where("is_news",'=',1)->where('add_time','>',time()-86400*30)->where('status','=',1)->orderBy('id','desc')->take(10)->get() as $key=>$val)        
        <li class="cf @if($key<3)tp@endif"> 
        	<a target="_blank" href="movie/{{ $val->id }}.html" class="jishu">赵薇</a>
        	<span class="nm" >{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach
      </ul>
    </div>
    <!-- 好评电影 -->
    <div class="wd-right-m wd-right-m-fix3">
      <div class="tt">好评电影</div>
      <ul class="tele-ws-list height-fix">
      	@foreach(Movie::orderBy('score','desc')->where('add_time','>',time()-86400*30)->where('status','=',1)->orderBy('id','desc')->take(10)->get() as $key=>$val)
        <li class="cf">
            <span class="dot"></span>
			<span class="ws"><em>{{ $val->score }}</em>分</span>            
            <a target="_blank" href="movie/{{ $val->id }}.html">{{ $val->name }}</a>
		</li>
        @endforeach      
        </ul>
    </div>
  </div>
</div>
<!-- 付费频道 -->
<div class="wd-module cf">
  <div class="wd-left-m-fix">
    <div class="wd-vv-module cf">
      <div class="tt-bar"> <a target="_blank" href="/category/aiqing/" class="tt">爱情</a> <a target="_blank" href="/category/aiqing/" class="mm">更多</a> </div>
      <div class="tele-v1-left tele-v1-left-fix tele-v1-left-fix7" id="vip_image_roll">
        <div class="lr-wrap-l"><a href="/category/aiqing/" class="hover-left"><span class="arr"></span></a></div>
        <div class="lr-wrap-r"><a href="/category/aiqing/" class="hover-right"><span class="arr"></span></a></div>
        <div class="roll" style="width: 3040px;">
          @foreach($category1 as $key=>$val)
          <div class="tele-bw-item tele-bw-item-fix7 mr"> 
          <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> 
              <img src="{{ $val->img }}" alt="{{ $val->name }}"> 
              <i class="icon i-movie-vip"></i> 
              <span class="p-cover"></span> 
              <i class="pi png-fix"></i>
              <p class="text_over">{{ $val->play_time }}</p>
         </a>
            <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
            <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
          </div>
          @endforeach 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 预告片 -->
<div class="wd-module cf tele-bb-content">
  <div class="wd-left-m-fix">
    <div class="wd-vv-module cf">
      <div class="tt-bar"> <a target="_blank" href="/category/ganren/" class="tt">感人</a> <a target="_blank" href="/category/ganren/" class="mm">更多</a>  </div>
      <div class="tele-v1-left tele-v1-left-fix" id="trailer_image_roll" pbflag="wc_0_预告片">
        <div class="lr-wrap-l"><a href="/category/ganren/" class="hover-left"><span class="arr"></span></a></div>
        <div class="lr-wrap-r"><a href="/category/ganren/" class="hover-right"><span class="arr"></span></a></div>
        <div class="roll" style="width: 2160px;">
          @foreach($category22 as $key=>$val)
          <div class="tele-bw-item tele-bw-item-fix2 mr"> 
          	<a href="movie/{{ $val->id }}.html" target="_blank" class="i"> 
            	<img src="{{ $val->img }}" alt="{{ $val->name }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
	            <p class="text_over">{{ $val->name }}</p>
            </a> 
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 下部内容 -->
<div class="wd-module cf tele-bb-content">
  <div class="wd-left-m"> 
    <!-- 喜剧片-微电影 -->
    <div class="wd-vv-module">
      <div class="tt-bar"> <a target="_blank" href="/category/xiju/" class="tt">喜剧</a> <a target="_blank" href="/category/xiju/" class="mm">更多</a> </div>
      <div class="tele-v2-module cf">
      	@foreach($category2 as $key=>$val)
        @if($key < 4)
        <div class="tele-bw-item tele-bw-item-fix"> <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> <img src="{{ $val->img }}" alt="{{ $val->name }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
          <p class="text_over">{{ $val->play_time }}</p>
          </a>
          <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
          <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    <!-- 动画-微电影 -->
    <div class="wd-vv-module">
      <div class="tt-bar"> <a target="_blank" href="/category/donghua/" class="tt">动画</a> <a target="_blank" href="/category/donghua/" class="mm">更多</a> </div>
      <div class="tele-v2-module cf">
      	@foreach($category3 as $key=>$val)
        @if($key < 4)      
        <div class="tele-bw-item tele-bw-item-fix"> <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> <img src="{{ $val->img }}" alt="{{ $val->name }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
          <p class="text_over">{{ $val->play_time }}</p>
          </a>
          <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
          <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    <!-- 剧情-微电影 -->
    <div class="wd-vv-module">
      <div class="tt-bar"> <a target="_blank" href="/category/juqing/" class="tt">剧情</a> <a target="_blank" href="/category/juqing/" class="mm">更多</a> </div>
      <div class="tele-v2-module cf">
      	@foreach($category4 as $key=>$val)
        @if($key < 4)      
        <div class="tele-bw-item tele-bw-item-fix"> <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> <img src="{{ $val->img }}" alt="{{ $val->name }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
          <p class="text_over">{{ $val->play_time }}</p>
          </a>
          <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
          <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    <!-- 动作-微电影 -->
    <div class="wd-vv-module">
      <div class="tt-bar"> <a target="_blank" href="/category/dongzuo/" class="tt">动作</a> <a target="_blank" href="/category/dongzuo/" class="mm">更多</a> </div>
      <div class="tele-v2-module cf">
      	@foreach($category6 as $key=>$val)
        @if($key < 4)      
        <div class="tele-bw-item tele-bw-item-fix"> <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> <img src="{{ $val->img }}" alt="{{ $val->name }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
          <p class="text_over">{{ $val->play_time }}</p>
          </a>
          <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
          <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    <!-- 经典-微电影 -->
    <div class="wd-vv-module">
      <div class="tt-bar"> <a target="_blank" href="/category/jingdian/" class="tt">经典</a> <a target="_blank" href="/category/jingdian/" class="mm">更多</a> </div>
      <div class="tele-v2-module cf">
      	@foreach($category7 as $key=>$val)
        @if($key < 4)      
        <div class="tele-bw-item tele-bw-item-fix"> <a href="movie/{{ $val->id }}.html" target="_blank" class="i"> <img src="{{ $val->img }}" alt="{{ $val->name }}"> <span class="p-cover"></span> <i class="pi png-fix"></i>
          <p class="text_over">{{ $val->play_time }}</p>
          </a>
          <p class="nn"> <a href="movie/{{ $val->id }}.html" target="_blank">{{ $val->name }}</a> </p>
          <p class="intr">{{ mb_substr($val->intro,0,15) }} ...</p>
        </div>
        @endif
        @endforeach
      </div>
    </div>

  </div>
  <div class="wd-right-container"> 
    <!-- 喜剧片排行 -->
    <div class="wd-right-m wd-right-m-fix1" id="xiju_rank">
      <div class="tab-right-s trs-add"> <a href="news/" class="select">热播</a><a href="/category/jindian/">经典</a> </div>
      <div class="tt">喜剧片排行</div>
      <ul class="wd-right-bang">
        @foreach($category2 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach
      </ul>
      <ul class="wd-right-bang" style="display:none">
        @foreach($category2 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach      
       </ul>
    </div>
    <!-- 动画片排行 -->
    <div class="wd-right-m wd-right-m-fix1" id="xiju_rank">
      <div class="tab-right-s trs-add"> <a href="news/" class="select">热播</a><a href="/category/jindian/">经典</a> </div>
      <div class="tt">动画片排行</div>
      <ul class="wd-right-bang">
        @foreach($category3 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach
      </ul>
      <ul class="wd-right-bang" style="display:none">
        @foreach($category3 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach      
       </ul>
    </div>
    <!-- 剧情片排行 -->
    <div class="wd-right-m wd-right-m-fix1" id="xiju_rank">
      <div class="tab-right-s trs-add"> <a href="news/" class="select">热播</a><a href="/category/jindian/">经典</a> </div>
      <div class="tt">剧情片排行</div>
      <ul class="wd-right-bang">
        @foreach($category4 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach
      </ul>
      <ul class="wd-right-bang" style="display:none">
        @foreach($category4 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach      
       </ul>
    </div>
    <!-- 动作片排行 -->
    <div class="wd-right-m wd-right-m-fix1" id="xiju_rank">
      <div class="tab-right-s trs-add"> <a href="news/" class="select">热播</a><a href="/category/jindian/">经典</a> </div>
      <div class="tt">动作片排行</div>
      <ul class="wd-right-bang">
        @foreach($category6 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach
      </ul>
      <ul class="wd-right-bang" style="display:none">
        @foreach($category6 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach      
       </ul>
    </div>
    <!-- 经典专题 -->
    <div class="wd-right-m wd-right-m-fix1" id="xiju_rank">
      <div class="tab-right-s trs-add"> <a href="news/" class="select">热播</a><a href="/category/jindian/">经典</a> </div>
      <div class="tt">经典专题</div>
      <ul class="wd-right-bang">
        @foreach($category7 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach
      </ul>
      <ul class="wd-right-bang" style="display:none">
        @foreach($category7 as $key=>$val)
        <li class="cf @if($key<3)tp@endif"> 
        	<?php $person = MoviePerson::where('movie_id','=',$val->id)->leftJoin('m_person as P','P.id','=','m_movie_person.person_id')->first();?>
            @if($person)
        	<a target="_blank" href="mingxing/{{ $person->person_id }}.html" class="jishu">{{ $person->name }}</a> 
            @endif
            <span class="nm">{{ $key+1 }}</span> 
            <a target="_blank" href="movie/{{ $val->id }}.html" class="nn">{{ $val->name }}</a> 
        </li>
        @endforeach      
       </ul>
    </div>
  </div>
</div>
@include('layouts.footer')
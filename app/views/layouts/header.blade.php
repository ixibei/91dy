<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta content="" name="copyright">
<meta content="最新电影，电影排行榜，好看的电影，电影大全" name="keywords">
<meta content="" name="description">
<title>2015最新电影排行榜_好看的电影大全-91电影网</title>
<link rel="stylesheet" href="/css/site.css" type="text/css">
<link rel="icon" href="/img/favicon.ico" mce_href="/img/favicon.ico" type="image/x-icon">
<script src="/js/banner.js"></script> 
<script src="/js/jquery-1.11.1.js"></script> 
<body>

<!--To Top-->
<div class="to-head"> 
	<a href="#" class="b-top" rel="nofollow" id="to_top" style="display: block;"></a>
    <a href="/feedback.html" class="b-b" rel="nofollow" target="_blank"></a> 
</div>
<!--Header-->

<div id="header" pbflag="wc_0_头部">
  <div class="header_sub"> <a href="/" class="logo ct png-fix">91电影</a>
    <div class="search">
      <form action="/search/" target="_blank">
        <div class="search_bg">
          <input type="text" maxlength="20" name="keyword" id="keyword" value="" autocomplete="off">
        </div>
        <a href="javascript:void(0)" class="search_btn ct" id="search">影视搜索</a> <a rel="nofollow" class="search_message png-fix" target="_blank" href="/article/">最新信息</a>
        <p class="search_hotkey"> 
      	@foreach(Movie::where('tj','=',1)->where('add_time','>',time()-86400*30)->where('status','=',1)->orderBy('sort','desc')->take(5)->get() as $key=>$val)
        <a href="/movie/{{ $val->id }}.html" target="_blank" @if($key==4)style="color:red"@endif>{{ $val->name }}</a> 
        @endforeach
        </p>
      </form>
    </div>
  </div>
</div>

<!--Nav-->

<div class="nav_bg" pbflag="wc_0_导航条">
  <div id="nav">
    <ul class="nav_list">
      <li @if(!$uri)class="nav_current"@endif><a href="/" target="_blank">首页</a></li>
      <li @if($uri == 'news')class="nav_current"@endif><a href="{{ URL::route('movieCategory',['news']) }}" target="_blank">最新</a></li>
      @foreach(MovieCategory::where('status','=','1')->orderBy('sort','desc')->orderBy('id','desc')->take(5)->get() as $val)
      <li @if($uri == $val->url)class="nav_current"@endif><a href="{{ URL::route('movieCategory', [$val->url] ) }}" target="_blank">{{ $val->name }}</a></li>
      @endforeach
    </ul>
    <div class="nav_r"> 
      <!--历史记录-->
      <ul class="user_history cf">
      @foreach(MovieCategory::where('status','=','1')->orderBy('sort','desc')->orderBy('id','desc')->skip(7)->take(5)->get() as $val)
      <li><a href="{{ URL::route('movieCategory', [ $val->url ] ) }}" target="_blank" @if($uri == $val->url)style="color:#ff0000"@endif>{{ $val->name }}</a></li>
      @endforeach
      </ul>
    </div>
  </div>
</div>

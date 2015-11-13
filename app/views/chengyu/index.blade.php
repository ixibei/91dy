<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成语大全-成语故事-成语词典-四字成语-成语接龙-趣历史</title>
<meta name="keywords" content="成语大全,成语故事,成语词典,四字成语,成语接龙" />
<meta name="description" content="趣历史网成语频道为您提供最新成语大全,成语故事,成语词典,四字成语,成语接龙等资料。" />
<meta name="mobile-agent" content="format=xhtml;url=[MURL]" />
<link href="http://www.qulishi.com/css/common_v.css" rel="stylesheet">
<link rel="stylesheet" href="/css/cymian.css">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?55f72d6a40530a8c1fc58e713a1c13df";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<div class="cy-header"></div>
<div class="cy-Nav">
	<ul>
		<li><a href="/chengyu/">首页</a></li>
		<li><a href="/chengyu/">成语检索</a></li>
		<li><a href="{{$domain1}}chengyu/" target="_blank">历史成语故事</a></li>
		<li><a href="/chengyu/#cymr">成语名人</a></li>
		<li><a href="/chengyu/#phb">成语点击排行榜</a></li>
	</ul>
</div>
<div class="cy-search-mod">
	<div class="cy-search-at">
		<form name="search" action="/chengyu_search.html" method="get">
			<input name="keyword" type="text" class="cy-search-text" placeholder='请输入关键词'>
			<input type="submit" class="cy-search-btn" value="查&nbsp;询">
		</form>
	</div>
	<div class="cy-search-spe">
   		 按拼音检索：
         @foreach($data['twentySixLetter'] as $val)
         <a href="/chengyu/{{$val}}/">{{$val}}</a>
         @endforeach
    </div>
</div>
<div class="cy-class-all">
	<div class="cy-main-title">
		<span class="cy-title-lefticon"></span>
		<h4 class="cy-title-con">成语归类大全</h4>
		<span class="cy-title-righticon"></span>
	</div>
	<div class="cy-class-allMod">
    	@foreach(ChengyuClass::where('cid','=','0')->get() as $val)
	    <div class="cy-class-cate-title"><a>{{$val->classname}}成语</a></div>
        <ul class="cy-class-cate-list clearfix">
        	@foreach(ChengyuClass::where('cid','=',$val->id)->get() as $val)
        	<li><a href="/chengyu/{{$val->filename}}.htm">{{$val->classname}}成语</a></li>
            @endforeach
        </ul>
        @endforeach
	</div>
</div>
<div class="cy-main-p3 clearfix">
	<!--成语检索-->	
	<div class="cy-retrieve">
		<div class="cy-main-title">
			<span class="cy-title-lefticon"></span>
			<h4 class="cy-title-con">成语归类大全</h4>
			<span class="cy-title-righticon"></span>
		</div>	
		<div class="cy-retrieve-con">
			<ul class="cy-retrive-list clearfix">
            	@foreach(Chengyu::whereRaw('length(chengyu)>4',array())->orderBy('hits','desc')->take(72)->get() as $val)
            	<li><a href="/chengyu/{{$val->id}}.html">{{$val->chengyu}}</a></li>
                @endforeach
			</ul>
		</div>	
	</div><!--成语检索  end-->
	<!--历史成语故事-->	
	<div class="cy-history">
		<div class="cy-main-title">
			<span class="cy-title-lefticon"></span>
			<h4 class="cy-title-con">历史成语故事</h4>
			<span class="cy-title-righticon"></span>
		</div>	
		<div class="cy-history-con">
			<ul class="cy-history-pic clearfix">
            	@foreach(News::getCategoryNews(19,'nclassid','14') as $key=>$val)
                @if($key<6)
	            <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}" width="90" height="90"><span>{{$val->newstitle}}</span></a></li>
                @endif
                @endforeach
			</ul>
			<ul class="cy-histor-list">
            	@foreach(News::getCategoryNews(19,'nclassid','14') as $key=>$val)
                @if($key>5)
                    <li><a href="{{$domain1}}chengyu/" class="cy-class-beg">[成语故事]</a><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>
                @endif
                @endforeach
			</ul>
		</div>	
	</div><!--历史成语故事  end-->
</div>

<div class="cy-main-p4 clearfix" id="cymr">
	<!--成语名人-->
	<div class="cy-celebrity">
		<div class="cy-main-title">
			<span class="cy-title-lefticon"></span>
			<h4 class="cy-title-con">成语名人</h4>
			<span class="cy-title-righticon"></span>
		</div>	
		<ul class="cy-celebrity-list clearfix">
          	@foreach(Person::getLikePerson('成语',20,'tags') as $key=>$val)
                <li><a href="{{$domain}}renwu/{{$val['filename']}}/" target="_blank"><img src="{{$val['rwsmallpic']}}" alt="{{$val['rwname']}}"><span>{{$val['rwname']}}</span>	</a></li>
            @endforeach
		</ul>	
	</div><!--成语名人  end-->
	<!--成语点击排行榜-->
	<div class="cy-click-top" id="phb">
		<div class="cy-main-title">
			<span class="cy-title-lefticon"></span>
			<h4 class="cy-title-con">成语点击排行榜</h4>
			<span class="cy-title-righticon"></span>
		</div>	
		<ul class="cy-clickTop-list clearfix">
            	@foreach(News::where('nclassid','=','19')->where('yc','=','1')->select('AddTime','id','newspic','newstitle')->take(24)->get() as $key=>$val)
	        <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}"><span>{{$val->newstitle}}</span></a></li>
            @endforeach
		</ul>	
	</div><!--成语点击排行榜  end-->
</div>
@include('layouts.footerPerson')
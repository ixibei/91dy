@extends('layouts.header')
@section('contents')
<link href="http://www.qulishi.com/css/common_v.css" rel="stylesheet">
<link href="http://www.qulishi.com/css/channel.css" rel="stylesheet">
<style type="text/css">
#mainbody{width:960px; margin: 0 auto; overflow:hidden;}
.jiachu{ font-weight:bold;}
.jiachu1{ font-weight:bold; font-size:16px;}
#top{ height:226px; background:url(images/1.gif) no-repeat top center #f5f1d8; margin-bottom:14px;}
.hot{ width:952px; height:237px; background-color:#f1f1f1; padding:4px;margin-bottom:12px;}
.hot1{ width:940px; height:225px;border:1px #d9d9d9 solid; background-color:#FFFFFF; line-height:26px; padding:5px;}
.hot1 dd,.hot1 dt{ float:left;}
.hot1 dd{width:535px; height:225px; margin-right:17px;}
.hot1 dt{width:382px; height:215px; padding-top:10px;}
.hot2{width:80px; height:80px;position: absolute;}

#list_yszt a{ display:block; float:left; font-size:12px; text-align:center;text-decoration:none; color:#333333; overflow:hidden; margin:0px 2.5px 5px 2.5px;}
#list_yszt a:link{width:227px; height:28px;border:1px #e0e0e0 solid; background-color:#f5f5f5;line-height:28px; padding:0px 3px 0px 3px;}
#list_yszt a:visited{width:227px; height:28px;border:1px #e0e0e0 solid; background-color:#f5f5f5; line-height:28px;padding:0px 3px 0px 3px;}
#list_yszt a:hover{width:229px; height:30px;background-color:#bc6c10; color:#FFFFFF;border:0px;line-height:30px;padding:0px 3px 0px 3px;}
</style>
<div id="mainbody">
<div class="hot">
<div class="hot2"><img src="images/4.gif"></div>
<div class="hot1">
<dl>
<dd><a href="/yszt/{{$data['tj'][0]->filename}}/" target="_blank" ><img src="{{$data['tj'][0]->ysztsmallpic}}" style="width:535px; height:225px" /></a></dd>
<dt>
<P><a href="/yszt/{{$data['tj'][0]->filename}}/" target="_blank" class="hong"><span class="jiachu1">{{$data['tj'][0]->ztname}}</span></a></P>
<P><span class="jiachu">剧情介绍：</span>
	<a href="/yszt/{{$data['tj'][0]->filename}}/" target="_blank" class="hong">
	{{$data['intro'][1]}}
    </a>
</P>

</dt>
</dl>
</div>
</div>
<div id="list_yszt">
	@foreach(Demo::getYszt('id','0','id',100,'!=') as $val)
	<a href="{{$domain}}yszt/{{$val->filename}}/">{{$val->ztname}}</a>
    @endforeach
</div>
</div>
@include('layouts.footerPerson')
@stop
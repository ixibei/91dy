@extends('layouts.header')
@section('contents')
<link href="/css/list.css" rel="stylesheet">
<link href="/css/common_v.css" rel="stylesheet">

<style type="text/css">
	.j31turnPage span{background:none; color:#000; border:none;}
	.j31turnPage .active{background:#D31119;}
</style>
<div class="list">
<div class="list_l">
<div class="list_list">
<div class="gps">当前位置：<a href="/">首页</a> > <a href="#">搜索：{{$data['keyword']}}</a></div>
<div class="list_list_r">

    <div class="new_page" style="margin-bottom:50px;">
        {{$data['pages']}}
    </div>
    
    @foreach(News::getNewsLikePage($data['keyword'],$data['currentPage']) as $key=>$val)
    @if($key%5 == 0)<ul> @endif
        <li>
            <a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank" title="{{$val->newstitle}}">{{$val->newstitle}}</a>
            <span>{{substr($val->AddTime,0,10)}}</span>
        </li>
    @if($key%5 == 4)</ul> @endif
    @endforeach
    
    <div class="new_page">
        {{$data['pages']}}
    </div>
</div>
</div>
</div>
<div class="list_r">
<div class="sidebarRight" >
	<div class="sidebar1">
		<h3>相关人物</h3>
		<ul class=" clearfix">
        	@foreach(Person::getLikePerson($data['keyword']) as $key=>$val)
            @if($key<4)
       		 <li>
             	<a href="{{$domain}}renwu/{{str_replace('index/','',$val['filename'])}}/" class="sidebarImgBox"><img src="{{$val['rwbigpic']}}" alt="{{$val['rwname']}}"></a>
                <a href="{{$domain}}renwu/{{str_replace('index/','',$val['filename'])}}/" class="sidebarText">{{$val['rwname']}}</a>
        	</li>		
            @endif
            @endforeach
        </ul>
	</div>
	<div class="sidebar2">
		<h3>最新更新</h3>
		<div class="sidebar2Tab" id="sidebar2Tab">
			<ul class="sideTabNav clearfix">
				<li class="active">人物</li>
				<li>解密</li>
				<li>战史</li>
				<li>野史</li>
				<li>文史</li>
				<li>文化</li>
			</ul>
            @foreach($data['arr'] as $key=>$val)
			<ul class="sideTabList" @if($key==0)style="display: block;"@endif>
            	@foreach(News::getCategoryNews($val,'classid',11) as $k=>$v)
                @if($k < 5)
				<li><i @if($k<3) class='red' @endif>{{$k+1}}</i><a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html">{{$v->newstitle}}</a></li>
                @endif
                @endforeach
            </ul>
            @endforeach
		</div>
	</div>
	<div class="sidebar3">
		<h3>热门图文</h3>
		<div class="sidebar3Pic">
			<ul class="sidebar3_1 clearfix">
               	@foreach(News::getCategoryNews(1,'tj',9,'hits') as $key=>$val)
                @if($key<4)
            	<li><a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}">{{mb_substr($val->newstitle,0,8,'utf-8')}}</a></li>
                @endif
                @endforeach
			</ul>			
			<ul class="sidebar3Dian">
               	@foreach(News::getCategoryNews(1,'tj',9,'hits') as $key=>$val)
                @if($key>3)            
            	<li><a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html">{{$val->newstitle}}</a></li>
                @endif
                @endforeach
			</ul>            
		</div>
	</div>

	
</div>
</div>
</div>
@include('layouts.footerPerson')
@stop
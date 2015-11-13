@include('layouts.baijiaxingHeader')
<link href="http://www.qulishi.com/css/common_v.css" rel="stylesheet">
<link href="http://www.qulishi.com/css/list.css" rel="stylesheet">
<link rel="stylesheet" href="http://www.qulishi.com/css/lzpht.css">
<style type="text/css">
	.new_page span{background:none; color:#000; border:none;}
	.new_page .active{background:#D31119;}
	.xnews ul li{background:0;margin:0;text-indent:0;}
</style>
<div class="list">
<div class="list_l">
  <div class="list_list">
    <div class="gps">当前位置：<a href="/">首页</a> > <a href="/baijiaxing/">百家姓</a> > <a href="/baijiaxing/{{$data['selfInfo']->filename}}/">{{$data['selfInfo']->classname}}</a></div>
    <div class="list_list_r">
      <div class="new_page" style="margin-bottom:50px;"> {{$data['pages']}} </div>
      @foreach(NewsClass::getCategoryList($data['selfInfo']->id,$data['currentPage'],0,30) as $key=>$val)
      @if($key%5 == 0)
      <ul>
        @endif
        <li> <a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank" title="{{$val->newstitle}}">{{$val->newstitle}}</a> <span>{{substr($val->AddTime,0,10)}}</span> </li>
        @if($key%5 == 4)
      </ul>
      @endif
      @endforeach
      <div class="new_page"> {{$data['pages']}} </div>
    </div>
  </div>
</div>
<div class="list_r">
  <div class="news_ad1"><script type="text/javascript">
/*趣历史 文章页 右一*/
var cpro_id = "u1552935";
</script> 
    <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div>
  <div class="xnews">
    <div class="xnews_t">最新更新</div>
    @foreach(News::getCategoryNews($data['selfInfo']->id,'nclassid',10) as $key=>$val)
    @if($key==0)
    <div class="xnews_tj">
      <div class="xnews_tj"> <a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="xnews_tjt">{{$val->newstitle}}</a>
        <div class="xnews_tjimg">
          <div class="xnews_tjimg_1"> <a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html"><img src="{{$val->newspic}}" width="120" height="90"></a> </div>
          <div class="xnews_info">{{mb_substr(strip_tags($val->content),0,25,'utf-8')}}<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank">[详细]</a></div>
        </div>
      </div>
      @else
      @if($key==1)
      <ul>
        @endif
        <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank" title="{{$val->newstitle}}">{{$val->newstitle}}</a></li>
        @if($key==9)
      </ul>
      @endif
      @endif
      @endforeach </div>
    <div class="xnews_img">
      <div class="xnews_t">历史图库</div>
      <div class="xnews_img_1">
        @foreach(News::getCategoryNews('1','tj',4) as $key=>$val)
        <div class="xnews_img_in"><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}" width="130" height="85"></a>
          <p><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{mb_substr($val->newstitle,0,8,'utf-8')}}</a></p>
        </div>
     @endforeach
      </div>
    </div>
    
    <div class="xnews_ph">
      <div class="xnews_t">最新排行</div>
      <ul>
        @foreach(News::getCategoryNews('1','id',10,'hits','!=') as $key=>$val)
		<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target="_blank" title="{{$val->newstitle}}">{{$val->newstitle}}</a></li>      
        @endforeach
	 </ul>
    </div>
  </div>
</div>
@include('layouts.footerPerson')
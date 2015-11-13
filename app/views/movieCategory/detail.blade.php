@include('layouts.baijiaxingHeader')
<link href="http://www.qulishi.com/css/common_v.css" rel="stylesheet">
<div class="zlBjxw980 clearfix zlBjxPart1">
  <div class="zjBjxw980Left">
    <style>
.dectxt_head p{ color:#000;}
/*=dectxt*/
.dectxt{ padding:0px; color:#333;}
.dectxt h3{ font-size:38px; font-family:"Microsoft YaHei"; color:#981111; margin-bottom: 10px; } 
.dectxt h4{ font-weight:700; line-height:2;font-size: 14px;color:#333;padding-left: 8px; } 
.dectxt h5{ color:#222; line-height:2; } 
.dectxt p{ line-height:23px; padding-bottom:1em;  color:#000; font-size:13px;} 
.dectxt span{ line-height:23px; padding-bottom:1em;  color:#000; font-size:13px;} 

/********/
.dectxt_head{margin-bottom: 20px; position:relative; *zoom:1; }
.dectxt_head p{ color:#222;padding-right: 160px; }
.dech_photo{ display:block; width:140px; height:140px; border:1px solid #ccc; background:#fafafa; overflow:hidden; position:absolute; right:0px; top:20px; }
/********/
.dectxt_item{ padding:0 0 1em; }
.dectxt_item h4{ border-bottom:1px solid #EEE9DD; margin:0 0 8px;*zoom:1; }
</style>
    <div class="zlBjxSurname" style=" clear:both;height:auto">
      <div class="dectxt">
        <div class="dectxt_head dectxt">
          <h3>{{$data['detail']->xing}}氏</h3>
          <h4>分布地区</h4>
          <p>{{$data['detail']->fbdq}}</p>
          <img src="{{$data['detail']->pic}}" width="140" height="140" alt="" class="dech_photo"></div>
      </div>
      
      <div class="dectxt_item dectxt">
        <h4>历史来源</h4>
        {{$data['detail']->lsly}}
      </div>
      
      <div class="dectxt_item dectxt">
        <h4>家族名人</h4>
        {{$data['detail']->jcmr}}
       </div>
        
    </div>
  </div>
  <div class="zjBjxw980Right">
    <div class="zjBjxSiderBarOne">
      <dl>
        <dt><img src="/images/bjx_1.jpg" alt="" width=90 height=90></dt>
      </dl>
      <div class="zjBjxSiderSearch" style="margin-top:20px;">
        <form target="_blank" name="search" method="get" action="/search/">
          <div class="zjBjxsearchBox">
            <input name="skey" type="text" x-webkit-grammar="builtin:translate" x-webkit-speech="" autofocus="true" autocomplete="off" placeholder="搜索一下你就知道" id="sear_input" class="zjBjxsearchText">
            <input type="submit" name="button" id="button" value="" class="zjBjxsearchBtn bjxBg">
          </div>
        </form>
        <p class="zjBjshotsearch" style="margin-top:20px;"> <span>热门姓氏：</span> <a href="http://www.qulishi.com/baijiaxing/4.htm">李姓</a> <a href="http://www.qulishi.com/baijiaxing/8.htm">王姓</a> <a href="http://www.qulishi.com/baijiaxing/3.htm">孙姓</a> <a href="http://www.qulishi.com/baijiaxing/1.htm">赵姓</a> <a href="http://www.qulishi.com/baijiaxing/333.htm">习姓</a> <a href="http://www.qulishi.com/baijiaxing/5.htm">周姓</a> </p>
      </div>
    </div>
    <div class="zjBjxSiderBarTow">
      <h3 class="zjBjxSider-title bjxBg">姓氏文化</h3>
      <ul>
        @foreach(News::getCategoryNews('43','nclassid',5) as $key=>$val)
        <li class="clearfix">
        	<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="zjBjixImg"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}介" width="90" height="90"></a><dl class="zjbjxImgTxt"><dt><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></dt><dd>{{mb_substr(strip_tags($val->content),0,25,'utf-8')}}...</dd></dl>
         </li>
         @endforeach
      </ul>
    </div>
  </div>
</div>
@include('layouts.footerPerson')
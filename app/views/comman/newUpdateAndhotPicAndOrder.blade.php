    <div class="j31RightBox" style="margin-top:5px;">
      <h4 class="j31RightTitle">最新<span>更新</span></h4>
      <ul class="j31RightNav j31RightNav1 zl07NavParent">
        <li class="active">人物<i></i></li>
        <li>解密<i></i></li>
        <li>战史<i></i></li>
        <li>野史<i></i></li>
        <li>文史<i></i></li>
        <li>文化<i></i></li>
      </ul>
      <div class="zl07ListParent" id="js31B1Li">
      <?php $arr = array(23,24,25,26,28,29);?>
       @foreach($arr as $key=>$val)
        <ul class="js31RightB1 zl07ListTab" @if($key==0)style="display:block"@endif>
        	@foreach($data['newsCategory'.$val] as $k=>$v)
        	<li @if($k==0)class="active"@endif>
            	<h4><a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html">{{$v->newstitle}}</a></h4>
                <div class="j31RB1Li clearfix">
                <a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html" class="js31RB1Img fl"><img src="{{$v->newspic}}" alt="{{$v->newstitle}}"></a><p>{{mb_substr(strip_tags($v->content),0,40,'utf-8')}}<a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html">详情</a></p>
                </div>
            </li>
            @endforeach
        </ul>
        @endforeach
        
      </div>
    </div>
    <div style="margin-top:10px;"> 
      <script type="text/javascript">
		 document.write('<a style="display:none!important" id="tanx-a-mm_30646014_6918724_23170146"></a>');
		 tanx_s = document.createElement("script");
		 tanx_s.type = "text/javascript";
		 tanx_s.charset = "gbk";
		 tanx_s.id = "tanx-s-mm_30646014_6918724_23170146";
		 tanx_s.async = true;
		 tanx_s.src = "http://p.tanx.com/ex?i=mm_30646014_6918724_23170146";
		 tanx_h = document.getElementsByTagName("head")[0];
		 if(tanx_h)tanx_h.insertBefore(tanx_s,tanx_h.firstChild);
	</script> 
    </div>
    <div style="margin-top:10px;"> 
      <script type="text/javascript">
var cpro_id="u2181094";
(window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"300",rsi1:"250",pat:"17",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"1",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0"}
</script> 
      <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
    </div>
    <div class="j31RightBox">
      <h4 class="j31RightTitle">热门<span>图文</span></h4>
      <ul class="clearfix j31RightB2">
        <script src="{{$domain}}bg/1666.js" type="text/javascript"></script> 
        @foreach($data['newsTj'] as $val)
			<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html"><img alt="{{$val->newstitle}}" src="{{$val->newspic}}"><span>{{$val->minititle}}</span></a></li>      
        @endforeach
	  </ul>
      <div style="margin-top:3px;"> 
        <script type="text/javascript">
				var cpro_id="u2259826";
				(window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"285",rsi1:"250",pat:"6",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"0",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0",ptbg:"90",piw:"130",pih:"85",ptp:"0"}
				</script> 
        <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script> 
      </div>
    </div>
    <div class="j31RightBox">
      <h4 class="j31RightTitle">最新<span>排行</span></h4>
      <ul class="j31RightNav j31RightNav3 zl07NavParent">
        <li class="active">点击排行<i></i></li>
        <li>图库排行<i></i></li>
        <li>专题排行<i></i></li>
      </ul>
      <div class="zl07ListParent">
		<?php $arr = array('newsHitsOrder','newsPicOrder')?>
        @foreach($arr as $key=>$val)
            <ul class="js31RightB3 zl07ListTab" @if($key==0)style="display:block"@endif>
            	@foreach($data[$val] as $k=>$v)
            	<li><i @if($k<3)class="js31top"@endif>{{$k}}</i><a href="{{$domain}}news/{{substr(str_replace('-','',$v->AddTime),0,6)}}/{{$v->id}}.html" target="_blank" title="{{$v->newstitle}}">{{$v->newstitle}}</a></li>
                @endforeach
            </ul>            
        @endforeach
        <ul class="js31RightB3 zl07ListTab">
            @foreach($data['newsHtOrder'] as $k=>$v)
            <li><i @if($k<3)class="js31top"@endif>{{$k}}</i><a href="{{$domain}}huati/{{str_replace('index','',$v->filename)}}" target="_blank" title="{{$v->ftname}}">{{$v->ftname}}</a></li>
            @endforeach
        </ul>            
      </div>
    </div>
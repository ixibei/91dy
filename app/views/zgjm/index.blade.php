<html lang="en">
<head>
<meta charset="utf-8">
<title>{{$seo['Tilte']}}</title>
<meta content="{{$seo['Keywords']}}" name="keywords">
<meta content="{{$seo['Descriptions']}}"  name="description">
<meta name="mobile-agent" content="format=xhtml;url=http://m.qulishi.com/jiemeng/" />

<link rel="stylesheet" href="/css/zgjm.css">
<script src="/js/jquery.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?55f72d6a40530a8c1fc58e713a1c13df";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<script>
$(function(){
	function carouselList(obj){
		$(obj).each(function(index){
			var op=false;
			var on=false;
			var _oUl=$(this).find('.zbjmB2ConUl');
			var aLi=_oUl.find('.zbjmB2Con');
			var oPrev=$(this).find('.zjbmTurnPrev');
			var oNext=$(this).find('.zjbmTurnNext');
			_oUl.append(_oUl.html());
			_oUl.width(aLi.outerWidth()*aLi.length*2);
			var w=aLi.outerWidth()*aLi.length;
			var iNow=0;
			oPrev.click(function(){
				if(!op){
					op=true;
					if(parseInt(_oUl.css('left'))<=-w)
					{
						_oUl.css('left', 0);
					}
					if(iNow>=aLi.length){
						iNow=0;
					}
					iNow++;
					_oUl.stop().animate({left: -iNow*(aLi.outerWidth())}, 500,function(){
						op=false;
					});
												
				}else{
					return false;
				}
			});
			oNext.click(function(){
				if(!on){
					on=true;
					if(parseInt(_oUl.css('left'))>=0)
					{
						_oUl.css('left', -w);
					}
					if(iNow<=0){
						iNow=aLi.length;
					}
					iNow--;
					_oUl.stop().animate({left: -iNow*(aLi.outerWidth())}, 500, function(){
						on=false;
					});								
				}else{
					return false;
				}

			});
		})
	}

	carouselList('#zbjmB2');	
});
</script>
</head>
<body>
<div style="width:100%; height:33px; background:#fff;"><div id="site_nav">
		<span class="site_navl"><a href="{{$domain}}">趣历史首页</a>|&nbsp;&nbsp;讲述历史上那些有趣的事</span>
		<span class="site_navr"><code id="fav">加入收藏夹</code>-<a href="{{$domain}}Desktop">放到桌面</a></span>
	</div>
</div>

<div class="zgjmTop zgjmBg">
	<div class="zgjmTopNav clearfix zgjmBg">
		<h1 class="zgjmTopLogo fl"><a href="/zgjm/"></a></h1>
		<ul class="clearfix zgjmTopNavList">
			<li><a href="/zgjm/">首页</a></li>
			<li><a href="/zgjm/jiemenwenhua/">解梦文化</a></li>
			<li><a href="/zgjm/jiemenggushi/">解梦故事</a></li>
			<li><a href="/zgjm/kantushuomeng/">看图说梦</a></li>
			<li><a href="/zgjm/list/">分类解梦</a></li>
			<li><a href="/zgjm/yuanbanjiemeng/">原版周公解梦</a></li>
		</ul>
	</div>
</div>
<div class="hr hr15"></div>
<ul class="zgjmClass zgjmBg2 clearfix">
	@foreach(ZgjmClass::getZgjmClass('cid',0,'id','asc') as $val)
	<li>
		<a href="/zgjm/list_{{$val->id}}.html">
			<img src="/images/jm_{{$val->id}}.jpg" alt="{{$val->classname}}">
			<span>{{$val->classname}}</span>
		</a>
	</li>
    @endforeach
</ul>
<div class="hr hr10"></div>
<div class="clearfix zbjmB1">
	<div class="fl zbjmB1Left">
		<div class="zbjmB1Search zgjmBg2">
			<div class="zbjmB1SearchBox">
				<span class="zbjmB1SearchTip">梦见：</span>
					<form target="_blank" name="search" method="get" action="/zgjm/search/">
<input type="text" class="zbjmB1SearchText" name="skey" value="">
				<button type="submit" class="zbjmB1SearchBtn"></button></form>
			</div>
			<div class="zbjmSearchHot clearfix">
				<span>梦最多人:</span>
				<a href="/zgjm/jm_157_1.html">梦见怀孕</a>
				<a href="/zgjm/jm_766_1.html">梦见鱼</a>
				<a href="/zgjm/jm_769_1.html">梦见狗</a>
				<a href="/zgjm/search/?skey=杀人">梦见杀人</a>
				<a href="/zgjm/jm_771_1.html">梦见猫</a>
				<a href="/zgjm/jm_363_1.html">梦见屎</a>
				<a href="/zgjm/jm_104_1.html">梦见结婚</a>
			</div>
		</div>
		<div class="zbjmB1WenHua zgjmBg2">
			<h3 class="zbjmConTitle"><i></i>梦的介绍</h3>
			<div class="zbjmB1WenHuaCOn">
				<p>梦，是窥探内心的一面隐秘之镜，是另一种虚幻却真实的人生体验。正如庄周梦蝶，我们常常会被奇异怪诞的梦境所震惊，并感到迷惑。它意味着什么？它在暗示些什么？梦是窃听自己潜意识和意识相互交流的机会，它为人们打开了通往自我整合的大门钥匙。梦是一种奇异现象，而做梦的经验，也是人所共有的。但在人类文化中，无论古今中外，对梦的了解，始终是一个谜。</p>
		<p>《周礼·春官》中明确提出六大梦：正梦、噩梦、思梦、寝梦、喜梦、惧梦。明代陈士元集历代诸家梦说，将梦分成九种：气盛之梦、气虚之梦、邪寓之梦、体滞之梦、情溢之梦、直叶之梦、比象之梦、反极之梦、厉妖之梦，大大深化了对梦的研究。下面我们根据不同分类者对梦的认识，概述各类梦的基本含义，以便正确理解古代梦案中的释梦形态。</p>	</div>
		</div>
		<div class="zbjmB1Story zgjmBg2">
			<h3 class="zbjmConTitle"><i></i>解梦心理</h3>
			<ul class="clearfix">
                @foreach(Zgjm::getZgjm('tags','%心理%','id','asc','like',20) as $key=>$val)
                <li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
                @endforeach
			</ul>
		</div>
	</div>

	<div class="fr zbjmB1Right">
		<div class="zbjmB1RiMod">
			<div class="clearfix zbjmRightTitle">
				<h4 class="zbjmRBarH4 sider">解梦故事</h4>
				<a href="/zgjm/jiemenggushi/" class="zbjmrBarMore sider"></a>
			</div>
			<ul>
				<li class="zbjmFrist"><a href="/zgjm/jiemenggushi/"><img src="/images/jm_gs.jpg" alt="解梦故事"></a></li>
				@foreach(News::getCategoryNews(53,'nclassid',4) as $val)
				<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" target=_blank>{{$val->newstitle}}</a></li>
                @endforeach
			</ul>
		</div>
		<div class="hr hr10"></div>
		<div class="zbjmB1RiMod">
			<div class="clearfix zbjmRightTitle">
				<h4 class="zbjmRBarH4 sider">孕妇解梦</h4>
				<a href="/zgjm/jm_12_1.html" class="zbjmrBarMore sider"></a>
			</div>
			<ul>
				<li class="zbjmFrist"><a href="/zgjm/jm_12_1.html"><img src="/images/jm_yf.jpg" alt="孕妇解梦"></a></li>
                @foreach(Zgjm::getZgjm('jmtitle','%孕妇%','id','desc','like',4) as $key=>$val)
				<li><a href="/zgjm/{{$val->id}}.html" class="zbjmTag">[孕妇]</a><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
                @endforeach
			</ul>
		</div>		
	</div>
</div>
<div class="hr hr10"></div>
<div class="zbjmB2" id="zbjmB2">
	<div class="zbjmMianConTItle clearfix p_re">
		<h3 class="zbjmConTitle fl"><i></i>图说解梦</h3>
		<div class="fr zjbmTurnBtn">
			<a href="javascript:;" class="zjbmTurnPrev sider" id="zjbmTurnPrev"></a>
			<a href="javascript:;" class="zjbmTurnNext sider" id="zjbmTurnNext"></a>
		</div>
	</div> 
	<div class="zbjmB2ConBox">
		<!--夹层滚动对象-->
		<div class="clearfix zbjmB2ConUl" id="zbjmB2ConUl">
			<!--1-->
			<div class="clearfix zbjmB2Con">
                @foreach(Zgjm::getZgjm('jmpic','','id','desc','!=',27) as $key=>$val)
                @if($key<9)
                @if($key==0)
				<div class="zbjmB2ConLeft fl">
					<a href="/zgjm/{{$val->id}}.html"><img src="{{$val->jmpic}}" alt=""><span class="zbjmB2Bg"></span><span class="zbjmB2Text">{{$val->jmtitle}}</span></a>
				</div>
                @else
				@if($key==1)<div class="zbjmB2ConRight fr">
					<ul class="clearfix">@endif
                    	<li>
							<a href="/zgjm/{{$val->id}}.html">
								<img src="{{$val->jmpic}}" alt="{{$val->jmtitle}}">
								<span class="zbjmB2Bg"></span>
								<span class="zbjmB2Text">{{$val->jmtitle}}</span>
							</a>
						</li>
                      @if($key==8)</ul>
					<div class="zbjmB2Border"></div>
					<ul class="clearfix">
					</ul>								
				</div>
                @endif
                @endif
                @endif
                @endforeach
			</div>
            <!--1-->	
			<!--2-->
			<div class="clearfix zbjmB2Con">
                @foreach(Zgjm::getZgjm('jmpic','""','id','desc','!=',27) as $key=>$val)
                @if($key>8 && $key<18)
                @if($key==9)
				<div class="zbjmB2ConLeft fl">
					<a href="/zgjm/{{$val->id}}.html"><img src="{{$val->jmpic}}" alt=""><span class="zbjmB2Bg"></span><span class="zbjmB2Text">{{$val->jmtitle}}</span></a>
				</div>
                @else
				@if($key==10)<div class="zbjmB2ConRight fr">
					<ul class="clearfix">@endif
                    	<li>
							<a href="/zgjm/{{$val->id}}.html">
								<img src="{{$val->jmpic}}" alt="{{$val->jmtitle}}">
								<span class="zbjmB2Bg"></span>
								<span class="zbjmB2Text">{{$val->jmtitle}}</span>
							</a>
						</li>
                      @if($key==17)</ul>
					<div class="zbjmB2Border"></div>
					<ul class="clearfix">
					</ul>								
				</div>
                @endif
                @endif
                @endif
                @endforeach
			</div>
			<!--3-->
			<div class="clearfix zbjmB2Con">
                @foreach(Zgjm::getZgjm('jmpic','""','id','desc','!=',27) as $key=>$val)
                @if($key>17)
                @if($key==18)
				<div class="zbjmB2ConLeft fl">
					<a href="/zgjm/{{$val->id}}.html"><img src="{{$val->jmpic}}" alt=""><span class="zbjmB2Bg"></span><span class="zbjmB2Text">{{$val->jmtitle}}</span></a>
				</div>
                @else
				@if($key==19)<div class="zbjmB2ConRight fr">
					<ul class="clearfix">@endif
                    	<li>
							<a href="/zgjm/{{$val->id}}.html">
								<img src="{{$val->jmpic}}" alt="{{$val->jmtitle}}">
								<span class="zbjmB2Bg"></span>
								<span class="zbjmB2Text">{{$val->jmtitle}}</span>
							</a>
						</li>
                      @if($key==26)</ul>
					<div class="zbjmB2Border"></div>
					<ul class="clearfix">
					</ul>								
				</div>
                @endif
                @endif
                @endif
                @endforeach
			</div><!--3-->		
            						
		</div><!--夹层滚动对象-->
	</div>
</div>
<div class="hr hr10"></div>
<div class="clearfix zbjmB3">
	<div class="zbjmB3Left fl">
		<div class="zbjmMianConTItle">
			<h3 class="zbjmConTitle"><i></i>解梦故事</h3>
		</div>	
		@foreach(ZgjmClass::getZgjmClass('cid',0,'id','asc') as $val)
        <?php 
			$where = '';
			$cid = ZgjmClass::where('cid','=',$val->id)->select('classname','id')->take(20)->orderBy('id','desc')->get()->toArray();
			foreach($cid as $k=>$v){
				$where .= 'or jmtitle like "%'.$v['classname'].'%" ';
			}
			$where = trim($where,'or');
		?>
        <div class="zbjmItem">
            <div class="zbjmItemTitle clearfix">
                <h3>{{$val->classname}}</h3>
            <a href="/zgjm/list_{{$val->id}}.html">更多&gt;&gt;</a>
            </div>
            <div class="zbjmB3ListCon">
                <ul class="clearfix zbjmB3ListP1">
                   @foreach(Zgjm::whereRaw($where,array())->select('id','jmpic','jmtitle')->take(2)->orderBy('id','desc')->get() as $k=>$v)
                    <li>
                        <a href="/zgjm/{{$v->id}}.html">
                        <img src="{{$v->jmpic}}" alt="{{$v->jmtitle}}">
                        <span class="zbjmB2Bg"></span>
                        <span class="zbjmB2Text">{{$v->jmtitle}}</span>
                    </a>
                    </li>
                    @endforeach
                </ul>
                <ul class="clearfix zbjmB3ListP2">
                   @foreach(Zgjm::whereRaw($where,array())->select('id','tags','jmtitle')->take(4)->orderBy('hits','desc')->get() as $k=>$v)
                    <li>
                        <a href="javascript:;" class="zbjmTag">[<?php $arr = explode(',',$v->tags); echo trim($arr[0]);?>]</a>
                        <a href="/zgjm/{{$v->id}}.html">{{$v->jmtitle}}</a>
                    </li>
                    @endforeach                    
                </ul>
                <div class="clearfix zbjmB3ListP3">
                	@foreach($cid as $k=>$v)
                    @if($k<10)
                    <a href="/zgjm/jm_{{$v['id']}}_1.html">{{$v['classname']}}</a>
                    @endif
                    @endforeach
                <i class="clear"></i>			
                </div>
            </div>
        </div>
        @endforeach
	</div>
    
	<div class="zbjmB3Right fr">
		<div class="zbjmB3Sider">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">最新解梦</h4>
					<i class="sider fl"></i>
				</div>
			</div>
			<ul>
                @foreach(Zgjm::getZgjm('jmpic','""','id','desc','!=',27) as $key=>$val)
                @if($key<10)
                @if($key==0)
				<li class="zbjmRBarFirst">
					<div class="zbjmRBarFistImg">
						<a href="/zgjm/{{$val->id}}.html">
							<img src="{{$val->jmpic}}" alt="{{$val->jmtitle}}">
							<i></i>
						</a>
					</div>
					<div class="zbjmRBarFistText">
						<a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a>
						<p>{{$val->jmtitle}}是什么意思，{{$val->jmtitle}}有什么寓意</p>
					</div>
				</li>
				@else
               <li><i>{{$key}}</i> <a href="/zgjm/{{$val->id}}.html">【<?php $arr = explode(',',$val->tags); echo $arr[0];?>】{{$val->jmtitle}}</a></li>
               @endif
               @endif
               @endforeach
               
			</ul>
		</div>
		<div class="hr hr10"></div>
		<div class="zbjmB3Sider">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">热门解梦</h4>
					<i class="sider fl"></i>
				</div>
			</div>
			<ul>
                @foreach(Zgjm::getZgjm('jmpic','""','hits','desc','!=',10) as $key=>$val)
                @if($key<10)
                @if($key==0)
				<li class="zbjmRBarFirst">
					<div class="zbjmRBarFistImg">
						<a href="/zgjm/{{$val->id}}.html">
							<img src="{{$val->jmpic}}" alt="{{$val->jmtitle}}">
							<i></i>
						</a>
					</div>
					<div class="zbjmRBarFistText">
						<a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a>
						<p>{{$val->jmtitle}}是什么意思，{{$val->jmtitle}}有什么寓意</p>
					</div>
				</li>
                @else
				<li><i>{{$key}}</i> <a href="/zgjm/{{$val->id}}.html">【<?php $arr = explode(',',$val->tags); echo $arr[0];?>】{{$val->jmtitle}}</a></li>
               @endif
               @endif
               @endforeach                
			</ul>
		</div>
		<div class="hr hr10"></div>
		<div class="zbjmB3SibarNe">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">梦与性的联系</h4>
					<i class="sider fl"></i>
				</div>
				<a href="/zgjm/jm_108_1.html" class="zbjmrBarMore sider"></a>
			</div>	
			<ul>
            	@foreach(Zgjm::where('jmtitle','like','%做爱%')->select('jmtitle','id')->orderBy('id','desc')->take(6)->get() as $key=>$val)
				<li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
                @endforeach
			</ul>		
		</div>
		<div class="hr hr10"></div>
		<div class="zbjmB3SibarNe">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">梦与健康的联系</h4>
					<i class="sider fl"></i>
				</div>
				<a href="/zgjm/jm_270_1.html" class="zbjmrBarMore sider"></a>
			</div>	
			<ul>
              	@foreach(Zgjm::where('jmtitle','like','%多梦%')->select('jmtitle','id')->orderBy('id','desc')->take(6)->get() as $key=>$val)
				<li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
                @endforeach
			</ul>		
		</div>
		<div class="hr hr10"></div>
		<div class="zbjmB3SibarNe">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">祥兆/不祥之梦</h4>
					<i class="sider fl"></i>
				</div>
				<a href="/zgjm/jm_911_1.html" class="zbjmrBarMore sider"></a>
			</div>	
			<ul>
              	@foreach(Zgjm::where('jmtitle','like','%鬼怪%')->select('jmtitle','id')->orderBy('id','desc')->take(6)->get() as $key=>$val)
				<li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
                @endforeach
			</ul>		
		</div>							
	</div>
</div>
<div class="hr hr15"></div>
<div class="zbjmB4">
	<div class="zbjmMianConTItle">
		<h3 class="zbjmConTitle"><i></i>原版周公解梦</h3>
	</div>	
	<div class="clearfix abjmB4Con">
		<div class="zbjmZgItem">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">原版周公解梦</h4>
					<i class="sider fl"></i>
				</div>
				<a href="/zgjm/yuanbanjiemeng/" class="zbjmrBarMore sider"></a>
			</div>
            @foreach(Zgjm::where('jmtitle','like','%原版%')->select('jmtitle','id','jmpic')->orderBy('id','desc')->take(10)->get() as $key=>$val)
            @if($key==0)
			<div class="zbjmZgItemImg">
				<a href="/zgjm/{{$val->id}}.html" class="zbImgBox fl"><img src="/images/jm_yb.jpg" alt="{{$val->jmtitle}}"></a>
				<div class="zbImgText">
					<h4><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></h4>
					<p>{{$val->jmtitle}}是什么意思，{{$val->jmtitle}}有什么寓意</p>
				</div>
			</div>
            @else
			@if($key==1)<ul class="zbjmZgList">@endif
				<li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
			@if($key==9)</ul>@endif
            @endif
            @endforeach
		</div>
		
		<div class="zbjmLines"></div>
		<div class="zbjmZgItem">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">心理学释梦</h4>
					<i class="sider fl"></i>
				</div>
				<a href="/zgjm/jiemenwenhua/" class="zbjmrBarMore sider"></a>
			</div>
            @foreach(Zgjm::where('jmtitle','like','%心理学解析%')->select('jmtitle','id','jmpic')->orderBy('id','desc')->take(10)->get() as $key=>$val)
            @if($key==0)
			<div class="zbjmZgItemImg">
				<a href="/zgjm/{{$val->id}}.html" class="zbImgBox fl"><img src="/images/jm_xl.jpg" alt="{{$val->jmtitle}}"></a>
				<div class="zbImgText">
					<h4><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></h4>
					<p>{{$val->jmtitle}}是什么意思，{{$val->jmtitle}}有什么寓意</p>
				</div>
			</div>
            @else
			@if($key==1)<ul class="zbjmZgList">@endif
				<li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
			@if($key==9)</ul>@endif
            @endif
            @endforeach            
		</div>
		<div class="zbjmLines"></div>
		<div class="zbjmZgItem">
			<div class="clearfix zbjmRightTitle">
				<div class="zbjmXie clearfix fl">
					<h4 class="fl">西方解梦</h4>
					<i class="sider fl"></i>
				</div>
				<a href="/zgjm/1777.html" class="zbjmrBarMore sider"></a>
			</div>
            @foreach(Zgjm::where('jmtitle','like','%心理学%')->where('jmtitle','not like','%解析%')->select('jmtitle','id','jmpic')->orderBy('id','desc')->take(10)->get() as $key=>$val)
            @if($key==0)
			<div class="zbjmZgItemImg">
				<a href="/zgjm/{{$val->id}}.html" class="zbImgBox fl"><img src="/images/jm_xf.jpg" alt="{{$val->jmtitle}}"></a>
				<div class="zbImgText">
					<h4><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></h4>
					<p>{{$val->jmtitle}}是什么意思，{{$val->jmtitle}}有什么寓意</p>
				</div>
			</div>
            @else
			@if($key==1)<ul class="zbjmZgList">@endif
				<li><a href="/zgjm/{{$val->id}}.html">{{$val->jmtitle}}</a></li>
			@if($key==9)</ul>@endif
            @endif
            @endforeach            
		</div>				
	</div>	
</div>

<div class="hr hr20"></div>
<div class="zbjmFooter">
<!-- 广告位：趣历史对联广告 -->
<script src="{{$domain}}bg/dl_ad.js"></script>
<!-- 广告位：全站富媒体 -->
<script type="text/javascript" src="{{$domain}}bg/qlsfmt.js"></script>
	<div id="footer">
		COPYRIGHT &copy; 2003-2013 www.qulishi.com INC. ALL RIGHTS RESERVED. 版权所有 趣历史网 沪ICP备13044239号-2 
 联系QQ：2506589242
	</div>
	<!--footer end-->
	<div class="hidden">
<script src="http://s16.cnzz.com/stat.php?id=5131735&web_id=5131735" language="JavaScript"></script>
	</div>
</div>
</body>
</html>
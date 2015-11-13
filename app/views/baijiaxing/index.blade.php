@include('layouts.baijiaxingHeader')
<div class="zlBjxw980 clearfix zlBjxPart1">
	<div class="zjBjxw980Left">
		<div class="zlBjxReading">
			<h1 class="zlBjxR-tit bjxBg">中文姓氏文化：源远流长的中华百家姓</h1>
			<p>中国是一个历史悠久、民族众多、人数极大的大国，汉族占绝大多数。客家先民原是中原汉民族。故汉民族的姓氏渊源即包含了客家的姓氏渊源。姓氏是代表每个人及其家族的一种符号。在今天的社会里，它没有什么意义了。但是，从它的形成、发展、演变的漫长历史过程来看，它却是构成中华民族文化的一个重要内容。姓氏是怎样产生、发展的？这是一门很有趣的学科，涉及到社会学、历史学、语言学、文字学、地理学、民俗学、人口学、地名学等。... <a href="{{$domain}}news/201401/9722.html">[阅读详细]</a></p>
		</div>
		<div class="zlBjxSurname">
			<div class="zlBjxSurnameContet">
				<h4 class="zlBjxSurTitle bjxBg">姓氏大全</h4>
				<ul>
                	@foreach(Baijiaxing::getList($data['twentySixLetter']) as $key=>$val)
					<li class="clearfix">
						<span>{{$key}}：</span>
                        @foreach($val as $k=>$v)
                        <a href="/baijiaxing/{{$v['id']}}.htm" target="_blank" title="{{$v['xing']}}">{{$v['xing']}}</a>
                        @endforeach
					</li>																
                    @endforeach																																		
				</ul>
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
				<div class="zjBjxsearchBox">	<input name="skey" type="text" x-webkit-grammar="builtin:translate" x-webkit-speech="" autofocus="true" autocomplete="off" placeholder="搜索一下你就知道" id="sear_input" class="zjBjxsearchText"><input type="submit" name="button" id="button" value="" class="zjBjxsearchBtn bjxBg">
		</div>	</form>

				<p class="zjBjshotsearch" style="margin-top:20px;">
					<span>热门姓氏：</span>
					<a href="{{$domain}}baijiaxing/4.htm">李姓</a>
					<a href="{{$domain}}baijiaxing/8.htm">王姓</a>
					<a href="{{$domain}}baijiaxing/3.htm">孙姓</a>
					<a href="{{$domain}}baijiaxing/1.htm">赵姓</a>
					<a href="{{$domain}}baijiaxing/333.htm">习姓</a>
					<a href="{{$domain}}baijiaxing/5.htm">周姓</a>
				</p>
			</div>
		</div>
		<div class="zjBjxSiderBarTow">
			<h3 class="zjBjxSider-title bjxBg">姓氏文化</h3>
			<ul>
            @foreach(News::getCategoryNews(43,'nclassid',5) as $key=>$val)
            	<li class="clearfix">
                	<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="zjBjixImg"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}" width="90" height="90"  /></a>
                    <dl class="zjbjxImgTxt"><dt><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></dt><dd>{{mb_substr(strip_tags($val->content),0,25,'utf-8')}}</dd></dl>
                </li>
            @endforeach
			</ul>
		</div>
	</div>
</div>
<div class="zlBjxw980">
	<div class="zlBjxPart2">
		<h4 class="zlbjxContentTitle">满族八大姓</h4>
		<ul class="clearfix">
		<li><a href="{{$domain}}huati/aixinjueluo/" target="_blank" title="爱新觉罗"><img src="{{$domain}}UploadFile/2014-4/2014421154136.jpg" alt="爱新觉罗"><span>爱新觉罗</span></a></li>
		<li><a href="{{$domain}}huati/niuhulushi/" target="_blank" title="钮祜禄氏"><img src="{{$domain}}UploadFile/2013-6/2013627155128.jpg" alt="钮祜禄氏"><span>钮祜禄氏</span></a></li>
		<li><a href="{{$domain}}huati/fuchashi/" target="_blank" title="富察氏"><img src="{{$domain}}UploadFile/2013-6/2013627173548.jpg" alt="富察氏"><span>富察氏</span></a></li>
		<li><a href="{{$domain}}huati/tongjiashi/" target="_blank" title="佟佳氏 "><img src="{{$domain}}UploadFile/2013-6/2013628174958.jpg" alt="佟佳氏 "><span>佟佳氏 </span></a></li>
		<li><a href="{{$domain}}huati/heshelishi/" target="_blank" title="赫舍里氏 "><img src="{{$domain}}UploadFile/2014-2/2014214170362.jpg" alt="赫舍里氏 "><span>赫舍里氏 </span></a></li>
		<li><a href="{{$domain}}huati/yehenalashi/" target="_blank" title="叶赫那拉 "><img src="{{$domain}}UploadFile/2014-4/2014417152425.jpg" alt="叶赫那拉 "><span>叶赫那拉 </span></a></li>
		<li><a href="{{$domain}}huati/guaerjiashi/" target="_blank" title="瓜尔佳氏 "><img src="{{$domain}}UploadFile/2014-4/2014418170934.jpg" alt="瓜尔佳氏 "><span>瓜尔佳氏 </span></a></li>
		<li><a href="{{$domain}}news/201405/13936.html" target="_blank" title="马佳氏 "><img src="{{$domain}}UploadFile/201452317840290.jpg" alt="马佳氏 "><span>马佳氏 </span></a></li>
		</ul>
	</div>
	<div class="zlBjxPart3 clearfix">
		<div class="zlBjxTitle">姓氏人物</div>
		<div class="zlBjxPart3Left">
			<div class="zlBjxAncient">
				<h4 class="zlbjxContentTitle">古代人物</h4>
				<ul class="clearfix">
                	@foreach(Person::getDynastyPerson('dyid!=37 and dyid!=38','gudai') as $key=>$val)
                    @if($key<10)
                	<li><a href="{{$domain}}renwu/{{str_replace('index/','',$val->filename)}}"><img src="{{$val->rwsmallpic}}" alt="{{$val->rwname}}"><span>{{$val->rwname}}</span></a></li>
                    @endif
                    @endforeach
				</ul>
			</div> 
			<div class="zlBjxModern">
				<h4 class="zlbjxContentTitle">近代人物</h4>
				<ul class="clearfix">
                	@foreach(Person::getDynastyPerson('dyid=38','jindai',38) as $key=>$val)
                    @if($key<10)
                	<li><a href="{{$domain}}renwu/{{str_replace('index/','',$val->filename)}}"><img src="{{$val->rwsmallpic}}" alt="{{$val->rwname}}"><span>{{$val->rwname}}</span></a></li>
                    @endif
                    @endforeach
				</ul>
			</div> 			
		</div>
		<div class="zlBjxPart3Right">
			<div class="zlBjxStory">
				<h4 class="zlbjxContentTitle">姓氏故事</h4>
				<ul>
           		@foreach(News::getCategoryNews(42,'nclassid',11) as $key=>$val)
                @if($key<3)
					<li class="clearfix">
                    	<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html" class="zjBjixImg"><img src="{{$val->newspic}}" alt="{{$val->newstitle}}" width="90" height="90"></a>
                        <dl class="zjbjxImgTxt">
                        	<dt><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></dt>
                            <dd>{{mb_substr(strip_tags($val->content),0,25,'utf-8')}}<a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">[详细]</a></dd>
                        </dl>
                    </li>
                @endif
                @endforeach				
			</ul>
			</div>
			<ul class="zlBjxdian zlBjxdianP3">
                @foreach(News::getCategoryNews(42,'nclassid',11) as $key=>$val)
                @if($key>2 && $key<11)
				<li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>			
                @endif
                @endforeach				
			</ul>
		</div>
	</div>
	<div class="zlBjxPart4">
		<div class="zlBjxTitle">姓氏趣闻</div>
		<div class="clearfix">
		<div class="zjBjxPart4Left">
			<a href="{{$domain}}news/{{substr(str_replace('-','',$data['newsCategory44'][0]->AddTime),0,6)}}/{{$data['newsCategory44'][0]->id}}.html" class="zjBjxPicp4"><img src="{{$data['newsCategory44'][0]->newspic}}" alt="{{$data['newsCategory44'][0]->newstitle}}" width="250" height="247"></a>
            <dl>
            	<dt><a href={{$domain}}news/{{substr(str_replace('-','',$data['newsCategory44'][0]->AddTime),0,6)}}/{{$data['newsCategory44'][0]->id}}.html>{{$data['newsCategory44'][0]->newstitle}}</a></dt>
                <dd class="zuoz">时间：<span>{{substr($data['newsCategory44'][0]->AddTime,0,10)}}</span></dd>
                <dd>{{mb_substr(strip_tags($data['newsCategory44'][0]->content),0,150,'utf-8')}}...<a href="{{$domain}}news/{{substr(str_replace('-','',$data['newsCategory44'][0]->AddTime),0,6)}}/{{$data['newsCategory44'][0]->id}}.html">[详情]</a></dd>
             </dl>
			</div>
            
            
        <div class="zjBjxPart4Right">
            <ul class="zjBjxPart4Pic">
                <li class="clearfix">
                	<a href="{{$domain}}news/{{substr(str_replace('-','',$data['newsCategory44'][1]->AddTime),0,6)}}/{{$data['newsCategory44'][1]->id}}.html" class="zjBjixImg"><img src="{{$data['newsCategory44'][1]->newspic}}" alt="{{$data['newsCategory44'][1]->newstitle}}" width="90" height="90"></a>
                    <dl class="zjbjxImgTxt">
                    	<dt><a href="{{$domain}}news/{{substr(str_replace('-','',$data['newsCategory44'][1]->AddTime),0,6)}}/{{$data['newsCategory44'][1]->id}}.html">{{$data['newsCategory44'][1]->newstitle}}</a></dt><dd>{{mb_substr(strip_tags($data['newsCategory44'][1]->content),0,30,'utf-8')}}...<a href="{{$domain}}news/{{substr(str_replace('-','',$data['newsCategory44'][1]->AddTime),0,6)}}/{{$data['newsCategory44'][1]->id}}.html">[详细]</a>
                    </dd></dl>
                </li>				
            </ul>	
            <ul class="zlBjxdian">
            	@foreach($data['newsCategory44'] as $key=>$val)
                @if($key>1)
                <li><a href="{{$domain}}news/{{substr(str_replace('-','',$val->AddTime),0,6)}}/{{$val->id}}.html">{{$val->newstitle}}</a></li>		
                @endif
                @endforeach
            </ul>							
        </div>
        
        
       </div>
	</div>
</div>
@include('layouts.footerPerson')
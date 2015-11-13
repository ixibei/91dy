@extends('layouts.header')
@section('contents')
<link href="{{$domain}}css/common_v.css" rel="stylesheet">
<link href="{{$domain}}css/index.css" rel="stylesheet" />
<link href="{{$domain}}css/htrw.css" rel="stylesheet" type="text/css" />
<script src="{{$domain}}js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="{{$domain}}js/jquery-easing.js" type="text/javascript"></script>
<script src="{{$domain}}js/jquery-easing-compatibility.js" type="text/javascript"></script>
<script src="{{$domain}}js/coda-slider.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(window).bind("load", function() {
		jQuery("div#slider1").codaSlider()
	});
</script>
<script language="javascript">
var MouseOver=function(_obj){};
var CloseDiv=function(_obj){}
$(function(){
	MouseOver=function(_obj){
		var __obj=$(_obj);
		$(".active").removeClass("active");
		$(".hover").removeClass("hover");
		var __span=__obj.parent().find("span");
		var _li=__obj.parent().parent();
		__span.addClass("active");
		_li.addClass("hover");
		var __div=__span.find("div");
		var _temHeight=	_obj.parentNode.getElementsByTagName("span")[0].getElementsByTagName("div")[0].scrollHeight;
		_temHeight>112?void(0):_temHeight=112;
		if(__div.height()==112){
			__div.animate({
				height:_temHeight+'px'
			});
			_obj.className="control2";
		}else{
			__div.animate({
				height:	'112px'
			});
			_obj.className="control1";
		}
	}
});
function removeDIV(_id){
	_control=document.getElementById(_id);
	_div=_control.parentNode.getElementsByTagName("span")[0].getElementsByTagName("div")[0];			
	if(_div.scrollHeight<=112){
		_control.parentNode.removeChild(_control);
	}
}
function keydwon(c,_fun){

	(parseInt(c)==13)?_fun():0;
}
</script>

<script language="javascript" type="text/javascript">
function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"tbhover":"";
con.style.display=i==cursel?"block":"none";
}
}

$(document).ready(function(){
		$("#ul li").mouseover(function(){
			$(".blk span",this).css("background","#3295cd");
			})
		$("#ul li").mouseout(function(){
			$(".blk span",this).css("background","");
			})
	})
</script>


<script type="text/javascript">
  jQuery.fn.topLink = function (settings) {
	  settings = jQuery.extend({
		  min: 1,
		  fadeSpeed: 200,
		  ieOffset: 150
	  }, settings);
	  return this.each(function () {
		  //listen for scroll
		  var el = $(this);
		  el.css('display', 'none'); //in case the user forgot
		  $(window).scroll(function () {
			  if (!jQuery.support.hrefNormalized) {
				  el.css({
					  'position': 'absolute',
					  'top': $(window).scrollTop() + $(window).height() - settings.ieOffset
				  });
			  }
			  if ($(window).scrollTop() >= settings.min) {
				  el.fadeIn(settings.fadeSpeed);
			  }
			  else {
				  el.fadeOut(settings.fadeSpeed);
			  }
		  });
	  });
  };
  $(document).ready(function () {
	  $('#top-link').topLink({
		  min: 400,
		  fadeSpeed: 500
	  });
	  //smoothscroll
	  $('#top-link').click(function (e) {
		  e.preventDefault();
		  $.scrollTo(0, 300);
	  });
  });
</script>
<style>
	#abcnav .letters_index{height:auto; margin:8px auto 0px auto;}
	#abcnav .letters_index .initials a {margin:0 7px}
</style>
<div class="zcon">
	<div class="zcon_top"></div>
    <div id="new_zj">
    	<h1>最新人物</h1>
        <div class="slider-wrap">
            <div id="slider1" class="csw">
            	<div class="panelContainer">
                <div id="1" class="panel" title="">
                  <ul>
                  	@foreach(Person::getPerson(12) as $key=>$val)
					<li><a href="{{$domain}}renwu/{{str_replace('/index','',$val->filename)}}/" target=_blank><img src="{{$val->rwbigpic}}"><span>{{$val->rwname}}</span></A></li>
                    @endforeach
                  </ul>
	         </div>
                <div id="2" class="panel" title="">
                  <ul>
                    @foreach(Person::getPerson(12,'hits') as $key=>$val)
					<li><a href="{{$domain}}renwu/{{str_replace('/index','',$val->filename)}}/" target=_blank><img src="{{$val->rwbigpic}}"><span>{{$val->rwname}}</span></A></li>
                    @endforeach
                  </ul>
              </div>
            	</div>
            </div>     
        </div>
    </div>
    <div class="clear"></div>
    <div class="zcon_bottom"></div>
</div>
<!--新增专辑 end-->

 <div id="abcnav">
    <div class="letters_index margin08" id="abcnav2" style="height:auto">
    	@include('comman.twentySixLetterAndDynasty')
    </div>
    </div>
    
    <div class="main margin08" style="border:none;">
	<script>
	function showli(e)
	{
		var strValue = $("#"+ e +"_button").html();
		if(strValue == "点击展开")
		{
			$("#"+ e +"_list .lihide").removeClass('lihide').addClass('lishow');

			$("#"+ e +"_button").html("点击收起");

		}else

		{
			$("#"+ e +"_list .lishow").removeClass('lishow').addClass('lihide');

			$("#"+ e +"_button").html("点击展开");
		}
	}
	</script>
    
<div class="strasegy_game_name margin08">
    <div class="strasegy_game_name_tl"><strong>按字母排序查找人物</strong></div>
    	@foreach($data['twentySixLetter'] as $key=>$val)
    	<div class="strasegy_name">
		<a name="{{$val}}"></a>
            <h2>{{$val}}</h2>
            <ul id="{{$val}}_list">
            	@foreach(Person::getRelatePerson($val) as $k=>$v)
                <li><a href="{{$domain}}renwu/{str_replace('index/','',$v->filename)}/">{{$v->rwname}}</a></li>
                @endforeach
            </ul> 
    	</div>
        @endforeach
    </div>
</div>

<script type="text/javascript">
    /*历史专题上下折叠*/
    var cpro_id = "u1904622";
</script>
@include('layouts.footerPerson')
@stop



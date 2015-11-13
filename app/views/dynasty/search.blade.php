@extends('layouts.header')
@section('contents')

<link href="{{$domain}}css/common_v.css" rel="stylesheet">
<link href="{{$domain}}css/index.css" rel="stylesheet" />
<link href="{{$domain}}css/htrw.css" rel="stylesheet" type="text/css" />
<script src="{{$domain}}js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="{{$domain}}js/jquery-easing.js" type="text/javascript"></script>
<script src="{{$domain}}js/jquery-easing-compatibility.js" type="text/javascript"></script>
<script src="{{$domain}}js/coda-slider.js" type="text/javascript"></script>
<style>
	#abcnav .letters_index{height:auto; margin:8px auto 0px auto;}
	#abcnav .letters_index .initials a {margin:0 7px}
</style>
 <div id="abcnav">
  @include('comman.twentySixLetterAndDynasty')
</div>

    <div class="margin08">

<div class="strasegy_game_name margin08">
    <div class="strasegy_game_name_tl"><strong>{{$data['searchTitle']}}</strong></div>
        <div class="strasegy_name">
            <ul>
            	@foreach($data['relatePerson'] as $key=>$val)
					<li><a href="{{$domain}}renwu/{{str_replace('/index','',$val->filename)}}/">{{$val->rwname}}</a></li>            	
                @endforeach
            </ul> 
         </div>
    </div>
</div>
@include('layouts.footerPerson')
@stop

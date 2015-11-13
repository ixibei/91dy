@extends('admin.layouts.header')
@section('contents') 
<div id="contentwrapper" class="contentwrapper">

@include('admin.layouts.tips')
<div class="contenttitle2">
	<h3>编辑话题</h3>
</div>
<form class="stdform stdform2" action="" method="post">
    <p>
         <label>标题</label>
         <span class="field">
         	<input type="text" name="Poetryname" class="smallinput">
            <select name="nclassid" id="parent" style="min-width:120px;">
                <option value="0">--请选择--</option>
                <option value="1">古诗大全目录</option>
                <option value="2">古代诗人</option>
            </select> 类别
         </span>
    </p>
    <p>
         <label>文件名称</label>
         <span class="field"><input type="text" name="filename" class="smallinput"> </span>
    </p>
    <p>
         <label>关键字</label>
         <span class="field"><input type="text" name="tags" class="smallinput"> <input type="text" name="hits" value="0" style="width:80px;"/> 人气</span>
    </p>
    <p>
         <label>seo标题</label>
         <span class="field"><textarea name="title" ></textarea> </span>
    </p>
    <p>
         <label>seo关键字</label>
         <span class="field"><textarea name="keyword" ></textarea> </span>
    </p>
    <p>
         <label>seo描述</label>
         <span class="field"><textarea name="Descriptions" ></textarea> </span>
    </p>
    <p>
         <label>内容</label>
         <span class="field"><textarea name="content" style="height:80px;"></textarea> </span>
    </p>
 
    <p>
         <label>相关新闻</label>
         <span class="field" >
	        <input type="text" id="minInput" name="xgids" class="smallinput">
          	<a href="javascript:void(0)" onclick="relate(this,'xgids','{{ url('news/index') }}')" class="btn  btn_search radius50"><span>Search</span></a>
          </span>
    </p>
        <input type="hidden" name="adduser" value="{{$user->username}}" />
    <p>
         <label>提交</label>
         <span class="field" ><button class="submit radius2">Submit Button</button></span>
    </p>
</form>
</div>
@stop

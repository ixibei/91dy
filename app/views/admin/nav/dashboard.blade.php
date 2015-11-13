@extends('admin.layouts.header')
@section('contents')
<body class="withvernav" style="height:100%">
<div class="bodywrapper"  style="height:100%">  
   <div class="header">
       <ul class="headermenu">
        </ul><!--大导航-->
        
       <div class="headerwidget">
	       <h1 class="logo">Movie.<span>Admin</span></h1>
            <span class="slogan">后台管理系统</span>
	       <div class="right">
        	<!--<div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
        	</div>-->
            <div class="userinfo">
            	<img src="img/admin/thumbs/avatar.png" alt="" />
                <span>{{$user->username}}</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="img/admin/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	切换主题: <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                	<h4>{{$user->username}}</h4>
                    <span class="email">{{$user->email}}</span>
                    <ul>
                    	<li><a href="editprofile.html">编辑资料</a></li>
                        <li><a href="accountsettings.html">账号设置</a></li>
                        <li><a href="help.html">帮助</a></li>
                        <li><a href="logout">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div>
        </div><!--usermessage-->
        
    </div><!--header-->
    
   
    <!--小导航-->
        
    <div class="centercontent">
    	<iframe src="news/index" id="iframeContent" name="iframeContent" width="100%" scrolling="no" frameborder="0" height="100%" style="height:2000px;"></iframe>
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
@stop
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  style="height:100%">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Movie管理后台</title>
<link rel="stylesheet" type="text/css" href="/css/admin/style.default.css">
<link rel="stylesheet" type="text/css" href="/js/admin/art/ui-dialog.css">
<link rel="stylesheet" type="text/css" href="/js/admin/uploadify/uploadify.css">
<script type="text/javascript" src="/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="/js/admin/art/dialog-min.js"></script>
<script type="text/javascript" src="/js/admin/art/dialog-plus-min.js"></script>
<script type="text/javascript" src="/js/admin/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/js/admin/common.js"></script>

<script type="text/javascript" src="/js/admin/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/js/admin/self.js"></script>
<script type="text/javascript" src="/js/admin/function.js"></script>
<script type="text/javascript" src="/js/admin/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/js/admin/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/admin/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="/js/admin/custom/general.js"></script>
<script type="text/javascript" src="/js/admin/custom/index.js"></script>

<script type="text/javascript" src="/js/admin/plugins/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/js/admin/custom/tables.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/admin/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/admin/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/admin/plugins/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body class="loginpage">
	<div class="loginbox">
    	<div class="loginboxinner">
        	
            <div class="logo">
            	<h1 class="logo">Xu.<span>Movie</span></h1>
				<span class="slogan">后台管理系统</span>
            </div><!--logo-->
            
            <br clear="all" /><br />
            
            <div class="nousername">
				<div class="loginmsg">密码不正确.</div>
            </div><!--nousername-->
            
            <div class="nopassword">
				<div class="loginmsg">密码不正确.</div>
                <div class="loginf">
                    <div class="thumb"><img alt="" src="images/thumbs/avatar1.png" /></div>
                    <div class="userlogged">
                        <h4></h4>
                        <a href="index.html">Not <span></span>?</a> 
                    </div>
                </div><!--loginf-->
            </div><!--nopassword-->
            
            <form id="login" action="/" method="post">
            	
                <div class="username">
                	<div class="usernameinner">
                    	<input type="text" name="username" id="username" />
                    </div>
                </div>
                
                <div class="password">
                	<div class="passwordinner">
                    	<input type="password" name="password" id="password" />
                    </div>
                </div>
                
                <button>登录</button>
                
                <div class="keep"><input type="checkbox" /> 记住密码</div>
            
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>
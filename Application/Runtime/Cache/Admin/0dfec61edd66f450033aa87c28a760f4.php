<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台内容管理系统-登录界面</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="/Public/Admin/images/favicon.ico" type="image/x-icon">
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>
    <link href="/Public/Admin/css/1.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/css/2.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#1c77ac; background-image:url(/Public/Admin/images/light.png); background-repeat:no-repeat; background-position:center top; ">
    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  
    <div class="logintop">
        <span style="font-size:18px">欢迎使用后台内容管理系统</span>
        <ul>
            <li><a href="/" style="font-size:16px"><img src="/Public/Admin/images/zhuye.png" style="width:22px;height:22px;position:relative;right:3px;vertical-align: sub;"/>网站首页</a></li>
        </ul>
    </div>
    <div class="loginbody">
    <span></span>
	<div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="/Admin/Login/login.html" method="post">
      <div STYLE="text-align: center; font-size: 30px;color: #FFF;">管 理 员 登 录</div>
	  <div class="row cl">
        <label class="form-label col-3"></label>
        <div class="formControls col-8">
          <input name="username" type="text" placeholder="用户名" class="input-text size-L" >
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-3"></label>
        <div class="formControls col-8">
          <input name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-8 col-offset-3">
          <input class="input-text size-L" type="text" name="chkcode" placeholder="验证码" style="width:150px;">
          <img id="verify_code_img" class="code" width="100" height="40" src="<?php echo U('chkcode'); ?>" onclick="this.src='<?php echo U('chkcode'); ?>#'+Math.random();" />
		  <a style="padding-left:10px" href="javascript:;" onclick="reImg();">看不清，换一张</a> 
		  </div>
      </div>
      <script type="text/javascript">  
        function reImg(){  
            var img = document.getElementById("verify_code_img");  
            img.src = "<?php echo U('chkcode');?>?rnd=" + Math.random();
        }
      </script>
      <div class="row">
        <div class="formControls col-8 col-offset-3">
          <input name="" type="submit" class="btn-success radius size-L" value="登　录" style="pointer-events: auto;padding: 10px 40px;">
          <input name="" type="reset" class="btn-default radius size-L" style="margin-left: 10px;padding: 10px 40px;" value="取　消">
        </div>
      </div>
    </form>
    </div>
    </div>
<style>
	.loginBox .input-text {width: 360px;border-radius: 5px;}
	.btn.size-L {padding: 8px 30px;}
	.input-text{text-indent:10px}
	.chkcode{height:48px;width:150px;text-indent: 20px;border-radius: 2px;background-color: #E6E6FA}
	.code{position: relative; height: 40px; left: 2%; border-radius: 3px;}
</style>	
</body>
</html>
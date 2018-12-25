<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台内容管理系统</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/Public/Admin/images/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script src="/Public/Admin/js/global.js"></script>
<script src="/Public/plugins/uploadify/api-uploadify.js"></script>
</head>

<body style="background:#3c8dbc;">
    <div class="topleft">
		<a target="rightFrame" href="<?php echo U('Index/main');?>"><img src="/Public/Admin/images/zhuye.png"/> 后台内容管理系统</a>
	</div>
    <div class="topright">
		<a href="/" target="_blank"><img src="/Public/Admin/images/ico01.png"/>网站前台</a>
		<a target="rightFrame" href="<?php echo U('/Admin/System/admin');?>"><img src="/Public/Admin/images/sx_1.png"/>清除缓存</a>
		<!--<a href="javascript:;"><img src="/Public/Admin/images/users.png"/>欢迎：<?php echo $_SESSION['username']; ?></a>-->
		<a target="_top" href="<?php echo U('Login/logout');?>"><img src="/Public/Admin/images/out.png"/>安全退出</a>
    </div>
</body>
</html>
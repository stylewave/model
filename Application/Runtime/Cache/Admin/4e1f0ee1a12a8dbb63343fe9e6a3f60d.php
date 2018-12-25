<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<body>
	<div class="place">
		<span>当前位置：</span>
		<ul class="placeul">
			<li><a href="javascript:;">管理员管理</a></li>
			<li><a href="<?php echo U('User/index')?>">管理员列表</a></li>
			<li><a href="javascript:;">编辑资料</a></li>
		</ul>
    </div>
    <div class="formbody">    
		<div class="formtitle"><span>基本信息</span>
		<ul class="toolbar">
			<li style="height:30px;line-height:30px;padding-right:0;text-align: center;width: 100px;background: #3c8dbc;">
				<a href="javascript:;" onclick="javascript:history.back();return false;" style="padding-left:0; padding-right:0;color:#ffffff;">
					<img src="/Public/Admin/images/back.png" class="back"> 返回</a>
			</li>
        </ul>
		</div>    
		<form action="" method="post" enctype="multipart/form-data">		
		<ul class="forminfo">
			<li><label>用户名<b>*</b></label><input name="username" value="<?php echo ($data["username"]); ?>"type="text" class="dfinput" /></li>
			<li><label>新密码<b>*</b></label><input name="password" type="password" class="dfinput" /></li>
			<li><label>确认密码<b>*</b></label><input name="repassword" type="password" class="dfinput" /></li>
			<input type="hidden" name="admin_id" value="<?php echo ($data["admin_id"]); ?>">
		</ul>
			<ul>
				<li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="保　存"/></li>
			</ul>
		</form>
    </div>
</body>
</html>
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
			<li><a href="javascript:void();">后台首页</a></li>
		</ul>
    </div>    
    <div class="mainindex"> 
		<div class="welinfo">
			<span><img src="/Public/Admin/images/sun.png" alt="天气" /></span>
			<b>您好：<?php echo $_SESSION['username']; ?>，
				<?php
 $h=date('G'); if ($h<12) echo '上午好！'; else if ($h<13) echo '中午好！'; else if ($h<18) echo '下午好！'; else echo '晚上好！'; ?>
			</b>
		</div>    
		<div class="welinfo">
			<span><img src="/Public/Admin/images/time.png" alt="时间" /></span>
			<i>您本次登录的时间：<?php echo date('Y-m-d H:i:s',$_SESSION['lastlogin']) ?></i>
		</div>
		<div class="welinfo">
			<span><img src="/Public/Admin/images/ip.jpg" alt="IP" width="22" height="22" style="border-radius:100%;padding-left:5px;" /></span>
			<i>您本次登录的IP：<?php echo $_SESSION['lastip'] ?></i>
		</div>
    
		<div class="xline"></div>
		<ul class="iconlist">
			<li><a href="<?php echo U('System/index')?>"><img src="/Public/Admin/images/ico01.png" /><p>网站设置</p></a></li>
			<li><a href="<?php echo U('Article/add')?>"><img src="/Public/Admin/images/ico02.png" /><p>添加文章</p></a></li>
			 <!--<li><a href="<?php echo U('Friend/index')?>"><img src="/Public/Admin/images/111.jpg" /><p>合作伙伴</p></a></li>-->
			<li><a href="<?php echo U('Ad/index')?>"><img src="/Public/Admin/images/d05.png"/><p>广告管理</p></a></li>
			<li><a href="<?php echo U('User/index')?>"><img src="/Public/Admin/images/user_1.png"/><p>管理员</p></a></li>
		</ul>    
    	<div class="xline"></div>
		<table class="tablelist" style="margin-top:30px !important;width:65%">
        <tbody>
			<tr>
				<td>服务器操作系统：</td>
				<td><?php echo PHP_OS; ?></td>
				<td>服务器IP：</td>
				<td> <?php echo $_SERVER['REMOTE_ADDR']?></td>
			</tr>
			<tr>
				<td>PHP版本：</td>
				<td><?php echo PHP_VERSION; ?></td>
				<td>Mysql 版本：</td>
				<td><?php $ser=M()->query("select VERSION()");echo $ser[0]['version()']; ?></td>
			</tr>
			<tr>
				<td>服务器环境：</td>
				<td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
				<td>程序开发：</td>
				<td>云天下</td>
			</tr>
			
        </tbody>
		</table>  
    </div>
</body>
</html>
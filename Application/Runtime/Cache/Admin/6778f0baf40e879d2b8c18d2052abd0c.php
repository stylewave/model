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

<body style="background:#f0f9fd;">
	<div class="lefttop">
		<span><img src="/Public/Admin/images/user_1.png" style="border-radius:100%"></span>
		<font><?php echo $_SESSION['username']; ?></font>
	</div>
    <dl class="leftmenu">
		<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
				<div class="title">
					<i></i>
					<span><img src="/Public/Admin/images/<?php echo ($vo["icon"]); ?>.png" /></span><?php echo ($vo["name"]); ?>
				</div>
				<ul class="menuson">
					<?php if(is_array($vo["val"])): $i = 0; $__LIST__ = $vo["val"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li><cite></cite><a href="<?php echo ($value["url"]); ?>" target="rightFrame"><?php echo ($value["name"]); ?></a><i></i></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</dd><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
<script type="text/javascript">
$(function(){
	$('.title').click(function(){
	    $(this).parent('dd').siblings('dd').children('.title').find('i').css({"border":"","float":"","height":""});
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
            $(this).parent().find('.title i').css({"border":"","float":"","height":""});
		}else{
			$(this).next('ul').slideDown();
            $(this).parent().find('.title i').css({"border":"2px solid #3c8dbc","float":"left","height":"40px","display":"inlineBlock"});
		}
	});
})
</script>	
</body>
</html>
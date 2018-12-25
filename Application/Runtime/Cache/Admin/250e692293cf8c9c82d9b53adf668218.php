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

<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<body>
	<div class="place">
		<span>当前位置：</span>
		<ul class="placeul">
			<li><a href="#">系统设置</a></li>
			<li><a href="#">合作客户</a></li>
			<li><a href="#">编辑</a></li>
		</ul>
    </div>
    <div class="formbody">
		<form action="" method="post" enctype="multipart/form-data">
			<div id="usual1" class="usual">
				<div class="itab">
					<ul>
						<li><a href="#tab1" class="selected">基本信息</a></li>
					</ul>
					<ul class="toolbar">
						<li style="height:30px;line-height:30px;padding-right:0;text-align: center;width: 100px;background: #3c8dbc;">
							<a href="javascript:;" onclick="javascript:history.back();return false;" style="padding-left:0; padding-right:0;color:#ffffff;"><img src="/Public/Admin/images/back.png" class="back"> 返回</a>
						</li>
					</ul>
				</div>
				<div id="tab1" class="tabson">
					<ul class="forminfo">
						<li><label>链接名称<b>*</b></label><input name="title" value="<?php echo ($data["title"]); ?>" type="text" class="dfinput" /></li>
						<li><label>缩略图<b>*</b></label>
							<a href="javascript:;" class="file">选择文件<input type="file" name="imgsrc" id="file" accept="image/jpeg,image/png"></a>
							<input type="text" value="<?php echo ($data["imgsrc"]); ?>" id="file_road" class="dfinput">
						</li>
						<?php if($data['imgsrc'] != ''): ?><li>
								<img src="<?php echo ($data["imgsrc"]); ?>" style="width:120px;height:60px;margin-left:85px"/>
							</li>
						<?php else: endif; ?>
						<li><label>链接地址<b>*</b></label><input name="url" value="<?php echo ($data["url"]); ?>" type="text" class="dfinput" value="" /></li>
						<li style="height:34px; line-height:34px"><label>是否显示<b>*</b></label>
							<div class="onoff">
								<label for="switch1" class="cb-enable <?php if($data[is_show] == 1): ?>selected<?php endif; ?>">显示</label>
								<label for="switch0" class="cb-disable <?php if($data[is_show] == 0): ?>selected<?php endif; ?>">隐藏</label>
								<input type="radio" id="switch1"  name="is_show" value="1" checked="<?php if($data[is_show] == 1): ?>checked<?php else: ?>checked<?php endif; ?>">
								<input type="radio" id="switch0" name="is_show" value="0" checked="<?php if($data[is_show] == 0): ?>checked<?php endif; ?>">
							</div>
						</li>
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
						<li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="确认保存"/></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
        $("#usual1 ul").idTabs();
        $("#tab1 ul li div.onoff label").click(function (){
            $(this).addClass("selected").siblings("label").removeClass("selected");
        });
	</script>
	<script>
        var file = $('#file'),
            file_road = $('#file_road');
        file.on('change', function( e ){
            //e.currentTarget.files 是一个数组，如果支持多个文件，则需要遍历
            var name = e.currentTarget.files[0].name;
            file_road.val( name );
        });
	</script>
</body>
</html>
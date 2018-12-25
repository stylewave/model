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
			<li><a href="javascript:;">系统设置</a></li>
			<li><a href="<?php echo U('System/index')?>">网站设置</a></li>
		</ul>
    </div>
<div class="formbody">
	<form action="" method="post" enctype="multipart/form-data">
		<div id="usual1" class="usual">
			<div class="itab">
				<ul>
					<li><a href="#tab1" class="selected">网站设置</a></li>
					<!--<li><a href="#tab2">邮件设置</a></li>-->
				</ul>
			</div>
			<div id="tab1" class="tabson">
				<ul class="forminfo">
					<li><label>网站名称</label><input name="name" value="<?php echo ($model["name"]); ?>" type="text" class="dfinput" /></li>
					<li><label>网站标题</label><input name="title" value="<?php echo ($model["title"]); ?>" type="text" class="dfinput" /></li>
					<li><label>关键字</label><textarea name="keywords" rows="5" class="desc"><?php echo ($model["keywords"]); ?></textarea>
					<i>多个关键字用“,”隔开</i></li>
					<li><label>网站描述</label><textarea name="description" rows="5" class="desc"><?php echo ($model["description"]); ?></textarea><i>多个描述用“,”隔开</i></li>
					<!--<li><label>网址</label><input name="url" value="<?php echo ($model["url"]); ?>" type="text" class="dfinput" /></li>-->
					<li><label>备案号</label><input name="records" value="<?php echo ($model["records"]); ?>" type="text" class="dfinput" /></li>
					<li><label>网站Logo</label>
						<a href="javascript:;" class="file">选择文件<input type="file" name="logo" id="file" accept="image/jpeg,image/png"></a>
						<input type="text" value="<?php echo ($model["logo"]); ?>" id="file_road" class="dfinput">
					</li>
					 <?php if($model['logo'] != ''): ?><li>
							<img src="<?php echo ($model["logo"]); ?>" style="width:200px;height:40px;margin-left:85px"/>
						</li><?php endif; ?>
					<li><label>微博二维码</label>
						<a href="javascript:;" class="file">选择文件<input type="file" name="footer_logo" id="files" accept="image/jpeg,image/png"></a>
						<input type="text" value="<?php echo ($model["footer_logo"]); ?>" id="file_roads" class="dfinput">
					</li>
					<?php if($model['footer_logo'] != ''): ?><li>
							<img src="<?php echo ($model["footer_logo"]); ?>" style="width:100px;height:100px;margin-left:85px"/>
						</li><?php endif; ?>
					<li><label>微信二维码</label>
						<a href="javascript:;" class="file">选择文件<input type="file" name="img" id="file_a" accept="image/jpeg,image/png"></a>
						<input type="text" value="<?php echo ($model["img"]); ?>" id="file_road_a" class="dfinput">
					</li>
					<?php if($model['img'] != ''): ?><li>
						<img src="<?php echo ($model["img"]); ?>" style="width:100px;height:100px;margin-left:85px"/>
					</li><?php endif; ?>
					 <li><label>客服QQ</label><input name="qq" value="<?php echo ($model["qq"]); ?>" type="text" class="dfinput" /></li>
					 <li><label>邮编</label><input name="yb" value="<?php echo ($model["yb"]); ?>" type="text" class="dfinput" /></li>
					 <!--<li><label>客服微信</label><input name="wx" value="<?php echo ($model["wx"]); ?>" type="text" class="dfinput" /></li>-->
					 <li><label>传真</label><input name="phone" value="<?php echo ($model["phone"]); ?>" type="text" class="dfinput" /></li>
					 <li><label>邮箱</label><input name="email" value="<?php echo ($model["email"]); ?>" type="text" class="dfinput" /></li>
					 <li><label>服务热线</label><input name="tel" value="<?php echo ($model["tel"]); ?>" type="text" class="dfinput" /></li>
					 <li><label>电话</label><input name="phones" value="<?php echo ($model["phones"]); ?>" type="text" class="dfinput" /></li>
					 <!--<li><label>联系人</label><input name="username" value="<?php echo ($model["username"]); ?>" type="text" class="dfinput" /></li>-->
					 <!--<li><label>联系人电话</label><input name="mobile" value="<?php echo ($model["mobile"]); ?>" type="text" class="dfinput" /></li>-->
					 <li><label>地址</label><textarea name="address" rows="2" class="desc"><?php echo ($model["address"]); ?></textarea></li>
				</ul>
			</div>
			<!--<div id="tab2" class="tabson">-->
				<!--<ul class="forminfo">-->
					<!--<li style="color:#f00">温馨提示：发件人邮件必须开启STMP服务才能使用</li>-->
					<!--<li><label>SMTP服务器</label>-->
						<!--<input name="sms" value="<?php echo ($model["sms"]); ?>" type="text" class="dfinput"/>-->
						<!--<i>发送邮箱的smtp地址。如: smtp.gmail.com或smtp.qq.com</i>-->
					<!--</li>-->
					<!--<li><label>SMTP端口</label>-->
						<!--<input name="smdk" value="<?php echo ($model["smdk"]); ?>" type="text" class="dfinput"/>-->
						<!--<i>smtp的端口。默认为25。具体请参看各STMP服务商的设置说明 （如果使用Gmail，请将端口设为465）</i>-->
					<!--</li>-->
					<!--<li><label>SMTP用户名</label>-->
						<!--<input name="smuser" value="<?php echo ($model["smuser"]); ?>" type="text" class="dfinput"/>-->
						<!--<i>使用发送邮件的邮箱账号</i>-->
					<!--</li>-->
					<!--<li><label>SMTP密码</label>-->
						<!--<input name="smpwd" value="<?php echo ($model["smpwd"]); ?>" type="text" class="dfinput"/>-->
						<!--<i>使用发送邮件的邮箱密码或者授权码。具体请参看各STMP服务商的设置说明</i>-->
					<!--</li>-->
					<!--<li><label>SMTP发件人</label><input name="smname" value="<?php echo ($model["smname"]); ?>" type="text" class="dfinput"/></li>-->
					<!--<li><label>发件人邮件</label>-->
						<!--<input name="sendemail" value="<?php echo ($model["sendemail"]); ?>" type="text" class="dfinput"/>-->
						<!--<i>使用发送邮件的邮箱账号</i>-->
					<!--</li>-->
					<!--<li><label>接收者邮件</label><input name="jieshou" value="<?php echo ($model["jieshou"]); ?>" type="text" class="dfinput" /></li>-->
					<!--<li><label>开启邮件发送</label>-->
						<!--<div class="onoff">-->
							<!--<label for="switch1" class="cb-enable <?php if($model[is_open] == 1): ?>selected<?php endif; ?>">开启</label>-->
							<!--<label for="switch0" class="cb-disable <?php if($model[is_open] == 0): ?>selected<?php endif; ?>">关闭</label>-->
							<!--<input type="radio" id="switch1"  name="is_open" value="1" checked="<?php if($model[is_open] == 1): ?>checked<?php endif; ?>">-->
							<!--<input type="radio" id="switch0" name="is_open" value="0" checked="<?php if($model[is_open] == 0): ?>checked<?php endif; ?>">-->
						<!--</div>-->
					<!--</li>-->
				<!--</ul>-->
			<!--</div>-->
			<ul>
				<li><label>&nbsp;</label><input name="" type="submit" class="btn" value="立即保存"/></li>
			</ul>
	</div>
	</form>
</div>
<script type="text/javascript">
	$("#usual1 ul").idTabs();
	$("#tab1 div.onoff label").click(function (){
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
	<script>
        var files = $('#files'),
            file_roads = $('#file_roads');
        files.on('change', function( e ){
            //e.currentTarget.files 是一个数组，如果支持多个文件，则需要遍历
            var name = e.currentTarget.files[0].name;
            file_roads.val( name );
        });
	</script>
	<script>
        var file_a = $('#file_a'),
            file_road_a = $('#file_road_a');
        file_a.on('change', function( e ){
            //e.currentTarget.files 是一个数组，如果支持多个文件，则需要遍历
            var name = e.currentTarget.files[0].name;
            file_road_a.val( name );
        });
	</script>
</body>
</html>
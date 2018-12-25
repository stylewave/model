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

<script type="text/javascript">
    window.UEDITOR_Admin_URL = "/Public/plugins/Ueditor/";
    var URL_upload = "<?php echo ($URL_upload); ?>";
    var URL_fileUp = "<?php echo ($URL_fileUp); ?>";
    var URL_scrawlUp = "<?php echo ($URL_scrawlUp); ?>";
    var URL_getRemoteImage = "<?php echo ($URL_getRemoteImage); ?>";
    var URL_imageManager = "<?php echo ($URL_imageManager); ?>";
    var URL_imageUp = "<?php echo ($URL_imageUp); ?>";
    var URL_getMovie = "<?php echo ($URL_getMovie); ?>";
    var URL_home = "<?php echo ($URL_home); ?>";    
</script>
<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.all.js"></script>
<body>
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<div class="place">
	<span>当前位置：</span>
	<ul class="placeul">
		<li><a href="<?php echo U('Product/index')?>">商品中心</a></li>
		<li><a href="<?php echo U('Product/index')?>">商品列表</a></li>
		<li><a href="javascript:;">编辑</a></li>
	</ul>
</div>
<div class="formbody">
<form action="/Admin/Product/add/id/54.html" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
	<div id="usual1" class="usual"> 
		<div class="itab">
			<ul> 
				<li><a href="#tab1" class="selected">基本信息</a></li>
				<li><a href="#tab2">商品相册</a></li>
				<li><a href="#tab3">商品详情</a></li>
				<!--<li><a href="#tab4">规格参数</a></li>-->
			</ul>
			<ul class="toolbar">
				<li style="height:30px;line-height:30px;padding-right:0;text-align: center;width: 100px;background: #3c8dbc;">
					<a href="javascript:;" onclick="javascript:history.back();return false;" style="padding-left:0; padding-right:0;color:#ffffff;">
						<img src="/Public/Admin/images/back.png" class="back"> 返回</a>
				</li>
			</ul>
		</div> 
		<div id="tab1" class="tabson">
			<ul class="forminfo">
				<li><label>商品分类<b>*</b></label>
					<select name="cat_id" style="height:34px;border:1px solid #c7c7c7;border-radius:5%;width:20%;text-align:center;">
						<option value="">选择分类</option>
						<?php foreach ($catData as $k => $v): if($v['id'] == $data['cat_id']){ $select = 'selected="selected"'; }else{ $select = ''; } ?>
						<option <?php echo $select;?> value="<?php echo $v['id']; ?>"><?php echo str_repeat('-', 8*$v['level']) . $v['name']; ?></option>
						<?php endforeach; ?>
					</select><font style="color:red;padding-left:20px">必须选择分类</font>
				</li>	
				<li><label>商品名称<b>*</b></label><input name="title" value="<?php echo ($data["title"]); ?>" type="text" class="dfinput" style="width:520px;"/></li>
				<li><label>缩略图<b>*</b></label>
					<a href="javascript:;" class="file">选择文件<input type="file" name="img" id="file" accept="image/jpeg,image/png"></a>
					<input type="text" value="<?php echo ($data["img"]); ?>" id="file_road" class="dfinput">
				</li>
				<?php if($data['img'] != ''): ?><li>
					<img src="<?php echo ($data["img"]); ?>" style="width:130px;height:100px;margin-left:85px"/>
                    <input type="hidden" value="<?php echo ($data["img"]); ?>" name="files" />
                </li><?php endif; ?>
				<li><label>商品编号<b>*</b></label><input name="model" value="<?php echo ($data["model"]); ?>" type="text" class="dfinput" style="width:520px;"/></li>
				<li><label>商品规格<b>*</b></label><input name="brand" value="<?php echo ($data["brand"]); ?>" type="text" class="dfinput" style="width:520px;"/></li>
				<!--<li><label>扭矩范围<b>*</b></label><input name="price" value="<?php echo ($data["price"]); ?>" type="text" class="dfinput" style="width:520px;"/></li>-->
				<li><label>描述<b>*</b></label><textarea name="description" rows="4" class="desc"><?php echo ($data["description"]); ?></textarea></li>
				<li style="height:34px; line-height:34px"><label>是否显示<b>*</b></label>
					<div class="onoff">
						<label for="switch1" class="cb-enable <?php if($data[is_floor] == 1): ?>selected<?php endif; ?>">显示</label>
						<label for="switch0" class="cb-disable <?php if($data[is_floor] == 0): ?>selected<?php endif; ?>">隐藏</label>
						<input type="radio" id="switch1"  name="is_floor" value="1" checked="<?php if($data[is_floor] == 1): ?>checked<?php else: ?>checked<?php endif; ?>">
						<input type="radio" id="switch0" name="is_floor" value="0" checked="<?php if($data[is_floor] == 0): ?>checked<?php endif; ?>">
					</div>
				</li>
			</ul>			
		</div> 
		<div id="tab2" class="tabson">
			<input id="btn_add_pic" type="button" value="添加一张" style="padding: 6px 10px;background: #3c8dbc;color:#ffffff;"/>
			<hr />
			<ul id="ul_pic_list"></ul>
			<hr />
			<ul id="old_pic_list" style="height: 150px">
				<?php foreach ($gpData as $k => $v): ?>
					<li>
						<img src="<?php echo ($v["pic"]); ?>" alt="" width="100" height="80"><br />
						<input pic_id="<?php echo $v['id']; ?>" class="btn_del_pic" type="button" value="删除" style="padding:3px;color:blue"/>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div id="tab3" class="tabson">  
			<textarea class="span12 ckeditor" id="content" name="content" title=""><?php echo (htmlspecialchars_decode($data["content"])); ?></textarea>
		</div>
		<!--<div id="tab4" class="tabson">-->
			<!--<textarea class="span12 ckeditor" id="content_a" name="contents" title=""><?php echo (htmlspecialchars_decode($data["contents"])); ?></textarea>-->
		<!--</div>-->
		<ul>
			<li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="保　存"/></li>
		</ul>
	</div>
</form>
</div> 
<style>
	#ul_pic_list li{margin:5px;list-style-type:none;}
	#old_pic_list li{float:left;width:auto;height:auto;margin:10px;list-style-type:none;}
	#cat_list{background:#EEE;margin:0;}
	#cat_list li{margin:5px;}
</style> 
</body>
</html>
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
<script type="text/javascript">
    $("#usual1 ul").idTabs(); 
	$("#btn_add_pic").click(function(){
		var file = '<li><input type="file" name="pic[]" accept="image/jpeg,image/png"/></li>';
		$("#ul_pic_list").append(file);
	});
	// 删除图片
	$(".btn_del_pic").click(function(){
		if(confirm('确定要删除吗？')){
			// 先选中删除按钮所在的li标签
			var li = $(this).parent();
			// 从这个按钮上获取pic_id属性
			var pid = $(this).attr("pic_id");
			$.ajax({
				type : "GET",
				url : "<?php echo U('ajaxDelPic', '', FALSE); ?>/picid/"+pid,
				success : function(data){
					li.remove();// 把图片从页面中删除掉
				}
			});
		}
	});
</script>
<script type="text/javascript">  
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js  中
        var options = {
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 400, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign', //允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true,
        	toolbars: [
                   ['fullscreen', 'source', '|', 'undo', 'redo',
                       '|', 'bold', 'italic', 'underline', 'fontborder',
                       'strikethrough', 'superscript', 'subscript',
                       'removeformat', 'formatmatch', 'autotypeset',
                       'blockquote', 'pasteplain', '|', 'forecolor',
                       'backcolor', 'insertorderedlist',
                       'insertunorderedlist', 'selectall', 'cleardoc', '|',
                       'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                       'customstyle', 'paragraph', 'fontfamily', 'fontsize',
                       '|', 'directionalityltr', 'directionalityrtl',
                       'indent', '|', 'justifyleft', 'justifycenter',
                       'justifyright', 'justifyjustify', '|', 'touppercase',
                       'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
                       'imagenone', 'imageleft', 'imageright', 'imagecenter',
                       '|', 'insertimage', 'emotion', 'insertvideo',
                       'attachment', 'map', 'gmap', 'insertframe',
                       'insertcode', 'webapp', 'pagebreak', 'template',
                       'background', '|', 'horizontal', 'date', 'time',
                       'spechars', 'wordimage', '|',
                       'inserttable', 'deletetable',
                       'insertparagraphbeforetable', 'insertrow', 'deleterow',
                       'insertcol', 'deletecol', 'mergecells', 'mergeright',
                       'mergedown', 'splittocells', 'splittorows',
                       'splittocols', '|', 'print', 'preview', 'searchreplace']
               ]
        };
        editor = new UE.ui.Editor(options);
        editor.render("content_a");  //  指定 textarea 的  id 为 content
    }); 
</script>
<script type="text/javascript">
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js  中
        var options = {
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 400, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign', //允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true,
            toolbars: [
                ['fullscreen', 'source', '|', 'undo', 'redo',
                    '|', 'bold', 'italic', 'underline', 'fontborder',
                    'strikethrough', 'superscript', 'subscript',
                    'removeformat', 'formatmatch', 'autotypeset',
                    'blockquote', 'pasteplain', '|', 'forecolor',
                    'backcolor', 'insertorderedlist',
                    'insertunorderedlist', 'selectall', 'cleardoc', '|',
                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                    'customstyle', 'paragraph', 'fontfamily', 'fontsize',
                    '|', 'directionalityltr', 'directionalityrtl',
                    'indent', '|', 'justifyleft', 'justifycenter',
                    'justifyright', 'justifyjustify', '|', 'touppercase',
                    'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
                    'imagenone', 'imageleft', 'imageright', 'imagecenter',
                    '|', 'insertimage', 'emotion', 'insertvideo',
                    'attachment', 'map', 'gmap', 'insertframe',
                    'insertcode', 'webapp', 'pagebreak', 'template',
                    'background', '|', 'horizontal', 'date', 'time',
                    'spechars', 'wordimage', '|',
                    'inserttable', 'deletetable',
                    'insertparagraphbeforetable', 'insertrow', 'deleterow',
                    'insertcol', 'deletecol', 'mergecells', 'mergeright',
                    'mergedown', 'splittocells', 'splittorows',
                    'splittocols', '|', 'print', 'preview', 'searchreplace']
            ]
        };
        editor = new UE.ui.Editor(options);
        editor.render("content");  //  指定 textarea 的  id 为 content
    });
</script>
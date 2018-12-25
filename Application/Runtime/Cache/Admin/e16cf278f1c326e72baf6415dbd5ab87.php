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
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--时间、日期-->
<link href="/Public/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<script src="/Public/plugins/daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="/Public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<div class="place">
	<span>当前位置：</span>
	<ul class="placeul">
		<li><a href="javascript:;">文章管理</a></li>
		<li><a href="<?php echo U('Article/index')?>">文章列表</a></li>
		<li><a href="javascript:;">编辑文章</a></li>
	</ul>
</div>
<div class="formbody">
<form action="/Admin/Article/add.html" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
	<div id="usual1" class="usual"> 
		<div class="itab">
			<ul> 
				<li><a href="#tab1" class="selected">基本信息</a></li>
				<li><a href="#tab2">文章内容</a></li> 
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
				<li><label>文章分类<b>*</b></label>
					<select name="cat_id" style="height:34px;border:1px solid #c7c7c7;border-radius:5%;width:20%;text-align:center;">
						<option value="">选择分类</option>
						<?php foreach ($catData as $k => $v): if($v['id'] == $data['cat_id']){ $select = 'selected="selected"'; }else{ $select = ''; } ?>
						<option <?php echo ($select); ?> value="<?php echo ($v["id"]); ?>"><?php echo str_repeat('-',8*$v['level']).$v['name'];?></option>
						<?php endforeach;?>
					</select><font style="color:red;padding-left:20px">必须选择文章分类</font>
				</li>	
				<li><label>文章标题<b>*</b></label><input name="title" value="<?php echo ($data["title"]); ?>" type="text" class="dfinput" style="width:520px;"/></li>
				<li><label>文章缩略图<b>*</b></label>
					<a href="javascript:;" class="file">选择文件<input type="file" name="imgsrc" id="file" accept="image/jpeg,image/png"></a>
					<input type="text" value="<?php echo ($data["imgsrc"]); ?>" id="file_road" class="dfinput">
				</li>
                <?php if($data['imgsrc'] != ''): ?><li>
					<img src="<?php echo ($data["imgsrc"]); ?>" style="width:120px;height:60px;margin-left:85px"/>
				</li><?php endif; ?>
				<!--<li><label>首页缩略图<b>*</b></label>-->
					<!--<a href="javascript:;" class="file">选择文件<input type="file" name="thumb" id="files" accept="image/jpeg,image/png"></a>-->
					<!--<input type="text" value="<?php echo ($data["thumb"]); ?>" id="file_roads" class="dfinput" style="width:357px;vertical-align: top;">-->
				<!--</li>-->
				<!--<?php if($data['thumb'] != ''): ?>-->
					<!--<li>-->
						<!--<img src="<?php echo ($data["thumb"]); ?>" style="width:120px;height:80px;margin-left:85px"/>-->
					<!--</li>-->
				<!--<?php endif; ?>-->
				<li><label>文章描述<b>*</b></label> 
					<textarea name="description" rows="5" class="desc"><?php echo ($data["description"]); ?></textarea>
				</li>
				<li style="height:34px; line-height:34px"><label>是否显示<b>*</b></label>
					<div class="onoff">
						<label for="switch1" class="cb-enable <?php if($data[is_floor] == 1): ?>selected<?php endif; ?>">显示</label>
						<label for="switch0" class="cb-disable <?php if($data[is_floor] == 0): ?>selected<?php endif; ?>">隐藏</label>
						<input type="radio" id="switch1"  name="is_floor" value="1" checked="<?php if($data[is_floor] == 1): ?>checked<?php else: ?>checked<?php endif; ?>">
						<input type="radio" id="switch0" name="is_floor" value="0" checked="<?php if($data[is_floor] == 0): ?>checked<?php endif; ?>">
					</div>
				</li>
				<!--<li><label>时间<b>*</b></label>-->
					<!--<input name="add_time" id="start_time" value="<?php echo (date('Y-m-d',$data["add_time"])); ?>" type="text" class="dfinput" style="width:160px;text-indent:40px"/>-->
					<!--<span style="border-radius:0;border-color:#d2d6de;background-color:#fff;padding:7px 10px;position:relative;border-right:1px solid #cfcfcf; bottom:0px;right:162px;">-->
						<!--<i class="glyphicon glyphicon-calendar fa fa-calendar" style="padding-left:0"></i>-->
					<!--</span>-->
				<!--</li>-->
				<!--<li><label>链接<b>*</b></label><input name="url" value="<?php echo ($data["url"]); ?>" type="text" class="dfinput" style="width:520px;"/></li>-->
				<!--<li><label>首页简述<b>*</b></label>-->
					<!--<textarea class="span12 ckeditor" id="post_contents" name="contents"  style="padding-left: 85px;"><?php echo htmlspecialchars_decode($data['contents'])?></textarea>-->
				<!--</li>-->
			</ul>
		</div> 
		<div id="tab2" class="tabson">
			<textarea class="span12 ckeditor" id="post_content" name="content" title=""><?php echo (htmlspecialchars_decode($data["content"])); ?></textarea>
		</div> 
		<ul>
			<li><label>&nbsp;</label><input name="submit" type="submit" class="btn" value="保　存"/></li>
		</ul>
	</div>
</form>
</div>  
</body>
</html>
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
<script>
    var files = $('#files'),
        file_roads = $('#file_roads');
    files.on('change', function( e ){
        //e.currentTarget.files 是一个数组，如果支持多个文件，则需要遍历
        var name = e.currentTarget.files[0].name;
        file_roads.val( name );
    });
</script>
<script type="text/javascript">
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js 中
        var options = {
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 400, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true,
        };
        editor = new UE.ui.Editor(options);
        editor.render("post_content");
    });
</script>
<script type="text/javascript">
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js 中
        var options = {
            zIndex: 999,
            initialFrameWidth: "50%", //初化宽度
            initialFrameHeight: 200, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true,
        };
        editor = new UE.ui.Editor(options);
        editor.render("post_contents");
    });
</script>
<!--时间、日期js-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#start_time').daterangepicker({
            format:"YYYY-MM-DD",
            singleDatePicker: true,
            showDropdowns: true,
            minDate:'1970-01-01',
            maxDate:'2050-01-01',
            startDate:'<?php echo (date("Y-m-d",$data["addt_ime"])); ?>',
            locale : {
                applyLabel : '确定',
                cancelLabel : '取消',
                fromLabel : '起始时间',
                toLabel : '结束时间',
                customRangeLabel : '自定义',
                daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
                monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月','七月', '八月', '九月', '十月', '十一月', '十二月' ],
                firstDay : 1
            }
        });
    });
</script>
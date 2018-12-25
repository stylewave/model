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
			<li><a href="javascript:;">广告管理</a></li>
			<li><a href="<?php echo U('Ad/indexs')?>">广告位置</a></li>
			<li><a href="<?php echo U('Ad/indexs')?>">列表</a></li>
		</ul>
    </div>
<div class="rightinfo">
    <div class="tools"> 
		<ul class="toolbar">
			<li style="background: #3c8dbc;"><a href="<?php echo U('adds')?>"><span><img src="/Public/Admin/images/t01.png" /></span>添加广告位置</a></li>
        </ul>
    </div>
    <table class="tablelist">
    	<thead>
			<tr>
				<th width="80">广告ID</th>
				<th>广告位置</th>
				<th>添加时间</th>
				<th width="220">操作</th>
			</tr>
        </thead>
        <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo (date("Y-m-d H:i",$v["addtime"])); ?></td>
				<td>
					<a href="<?php echo U('Ad/index',array('pid'=>$v['id']))?>" class="tablelinksave"><img src="/Public/Admin/images/look.png" class="look">查看</a>
					<a href="<?php echo U('adds',array('id'=>$v['id']));?>" class="tablelinks"><img src="/Public/Admin/images/edit.png" class="edit">编辑</a>
					<a onclick="return confirm('确定要删除吗？');" href="<?php echo U('aDels')?>?id=<?php echo $v['id']?>&active=delete" class="tablelink"><img src="/Public/Admin/images/del.png" class="del">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pagin">
        <div class="paginList">
			<?php echo $page ?>
        </div>
    </div>
</div>    
<script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
</script>
</body>
</html>
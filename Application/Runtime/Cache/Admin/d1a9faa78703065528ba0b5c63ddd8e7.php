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

<script src="/Public/Admin/js/myAjax.js" type="text/javascript"></script>
<script src="/Public/Admin/js/layer/layer.js"></script>
<body>
	<div class="place">
		<span>当前位置：</span>
		<ul class="placeul">
			<li><a href="javascript:;">广告管理</a></li>
			<li><a href="<?php echo U('Ad/index')?>">广告列表</a></li>
			<li><a href="<?php echo U('Ad/index')?>">列表</a></li>
		</ul>
    </div>
<div class="rightinfo">
    <div class="tools">		
		<ul class="seachform"> 
		<form action="/Admin/Ad/index" method="GET">
			<li><input value="<?php echo I('get.ad_name'); ?>" name="ad_name" type="text" class="scinput" placeholder="请输入广告名称或关键字..."/></li>
			<li> 
				<?php $pid = I('get.pid'); ?>
				<select name="pid" style="height: 34px; border: 1px solid #c7c7c7; border-radius: 5%; width: 200px; text-align:left;">
					<option value="0">查看所有</option>
					<?php foreach ($ad as $k => $v): if($v['id'] == $pid) $select = 'selected="selected"'; else $select = ''; ?>
						<option <?php echo $select; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option>
					<?php endforeach; ?>
				</select>
			</li>
			<li><label>&nbsp;</label>
				<input type="submit" class="scbtn" value="查 询" style="position: absolute;width:100px;height:33px"/>
				<img src="/Public/Admin/images/serach.png" style="position: relative;top:10px;left:15px">
			</li>
		</form>
		<ul class="toolbar">
			<li style="background: #dd4b39;"><a href="javascript:;" onclick="submit_form()"><span><img src="/Public/Admin/images/del.png" /></span>批量删除</a></li>
			<li style="background: #3c8dbc;"><a href="<?php echo U('add')?>"><span><img src="/Public/Admin/images/t01.png" /></span>添加广告</a></li>
        </ul>
		</ul>
    </div>
    <table class="tablelist">
    	<thead>
			<tr>
				<th width="50"><input type="checkbox" onclick="swapCheck()"></th>
				<th>广告名称</th>
				<th>广告位置</th>
				<th>链接地址</th>
				<th width="150">图片</th>
				<th width="100">是否显示</th>
				<th style="text-align:center" width="200">操作</th>
			</tr>
        </thead>
        <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
				<td><input type="checkbox" value="<?php echo ($v["id"]); ?>" id="idarr" name="idarr[]"></td>
				<td><?php echo ($v["ad_name"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["url"]); ?></td>
				<td style="padding:5px 0"><img src="<?php echo ($v["imgsrc"]); ?>" width="120" height="50"></td>
				<td>
					<img width="20" height="20" src="/Public/Admin/images/<?php if($v[is_show] == 1): ?>yes.png<?php else: ?>cancel.png<?php endif; ?>" onclick="changeTableVal('ad','id','<?php echo ($v["id"]); ?>','is_show',this)"/>
				</td>
				<td>
					<a href="<?php echo U('add',array('id'=>$v['id']))?>" class="tablelinks"><img src="/Public/Admin/images/edit.png" class="edit">编辑</a>
					<a onclick="return confirm('确定要删除吗？');" href="<?php echo U('aDel')?>?id=<?php echo $v['id']?>&active=delete" class="tablelink"><img src="/Public/Admin/images/del.png" class="del">删除</a>
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
<script>
	function submit_form(){
        var check_val =[];//定义一个数组
        $('input[name="idarr[]"]:checked').each(function(){
            check_val.push($(this).val());
        });
		var del = confirm('确定要删除吗？');
		if(del == true){
			if(check_val == ''){
				alert('请选择要删除的内容！');
			}else{
				window.location.href="<?php echo U('Admin/Ad/index');?>?idarr="+check_val;
			}
		}else{
			return false;
		}
	};
</script>
<script type="text/javascript">
	//checkbox 全选/取消全选
	var isCheckAll = false;
	function swapCheck() {
		if (isCheckAll) {
			$("input[type='checkbox']").each(function() {
				this.checked = false;
			});
			isCheckAll = false;
		} else {
			$("input[type='checkbox']").each(function() {
				this.checked = true;
			});
			isCheckAll = true;
		}
	}
</script>
</body>
</html>
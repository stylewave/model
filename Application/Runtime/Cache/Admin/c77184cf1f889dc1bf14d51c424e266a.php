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
			<li><a href="javascript:;">人才招聘</a></li>
			<li><a href="<?php echo U('Zhaopin/index')?>">职位列表</a></li>
		</ul>
    </div>
<div class="rightinfo">
    <div class="tools">
	<form action="/Admin/Zhaopin/index" method="GET">
		<ul class="seachform">    
		<li><input name="title" value="<?php echo I('get.title'); ?>" type="text" class="scinput" placeholder="请输入职位名称或关键字..." /></li>
		<li><label>&nbsp;</label>
			<input type="submit" class="scbtn" value="查 询" style="position: absolute;width:100px;height:33px"/>
			<img src="/Public/Admin/images/serach.png" style="position: relative;top:10px;left:15px">
		</li>
	</form>
		<ul class="toolbar">
			<li style="background: #dd4b39;"><a href="javascript:;" onclick="submit_form()"><span><img src="/Public/Admin/images/del.png" /></span>批量删除</a></li>
			<li style="background: #3c8dbc;"><a href="<?php echo U('add')?>"><span><img src="/Public/Admin/images/t01.png" /></span>添加职位</a></li>
        </ul>
    </ul>
    </div>
    <table class="tablelist">	 
    	<thead>
			<tr>
				<th width="60"><input type="checkbox" onclick="swapCheck()"></th>
				<th>职位名称</th>
				<th>职位类别</th>
				<th>招聘人数</th>
				<th>工作地点</th>
				<th width="100">是否显示</th>
				<th width="100">排序</th>
				<th width="100">发布时间</th>
				<th width="200">操作</th>
			</tr>
        </thead>
        <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
				<td><input type="checkbox" value="<?php echo ($v["id"]); ?>" id="idarr" name="idarr[]"></td>
				<td><?php echo ($v["title"]); ?></td>
				<td><?php echo ($v["cate"]); ?></td>
				<td><?php echo ($v["num"]); ?></td>
				<td><?php echo ($v["address"]); ?></td>
				<td>
					<img width="20" height="20" src="/Public/Admin/images/<?php if($v[is_floor] == 1): ?>yes.png<?php else: ?>cancel.png<?php endif; ?>" onclick="changeTableVal('zp','id','<?php echo ($v["id"]); ?>','is_floor',this)"/>
				</td>
				<td>
					<input type="text" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onchange="updateSort('zp','id','<?php echo ($v["id"]); ?>','orderby',this)" size="3" value="<?php echo ($v["orderby"]); ?>" style="height: 20px; border: 1px solid #cfcfcf;opacity: 0.6;text-indent:15px" />
				</td>
				<td><?php echo (date("Y-m-d",$v["addtime"])); ?></td>
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
                    window.location.href="<?php echo U('Admin/Zhaopin/index');?>?idarr="+check_val;
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
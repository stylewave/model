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
			<li><a href="javascript:;">系统设置</a></li>
			<li><a href="<?php echo U('Nav/index')?>">分类管理</a></li>
			<li><a href="<?php echo U('Nav/index')?>">分类列表</a></li>
		</ul>
    </div>
<div class="rightinfo">
    <div class="tools">
		<ul class="seachform">
			<li style="background: #00c0ef;color: #fff;padding: 8px 8px;border-radius: 3px;cursor: pointer;"><span onclick="tree_open(this);"><img src="/Public/Admin/images/zhan.png" style="vertical-align: text-top;margin-right: 5px;"/>展开分类</span></li>
			<ul class="toolbar">
				<li style="background: #3c8dbc;"><a href="<?php echo U('add')?>"><span><img src="/Public/Admin/images/t01.png" /></span>新增分类</a></li>
			</ul>
		</ul>
    </div>
    <table class="tablelist" id="article_cat_table">
    	<thead>
			<tr>
				<th width="3%"></th>
				<th width="32%">分类名称</th>
				<th width="25%">链接地址</th>
				<th width="10%">是否显示</th>
				<th width="10%">排序</th>
				<th width="10%">添加时间</th>
				<th width="10%">操作</th>
			</tr>
        </thead>
        <tbody>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr id="<?php echo ($v["level"]); ?>_<?php echo ($v["id"]); ?>" nctype="0" <?php if($v[parent_id] != 0): ?>style="display:none;"<?php endif; ?> class="parent_id_<?php echo ($v[parent_id]); ?>" data-level="<?php echo ($v[level]); ?>" style="cursor: pointer;">
				<td><img id="icon_<?php echo ($v["level"]); ?>_<?php echo ($v["id"]); ?>" src="/Public/Admin/images/tv-expandable.gif" nc_type="flex" onClick="treeClicked(this,<?php echo ($v[id]); ?>)"></td>
				<td style="text-align:left;padding-left: 4%;"><?php echo str_repeat(' - ', 4*$v['level']) . $v['name']; ?></td>
				<td><?php echo ($v["url"]); ?></td>
				<td>
					<img width="20" height="20" src="/Public/Admin/images/<?php if($v[is_show] == 1): ?>yes.png<?php else: ?>cancel.png<?php endif; ?>" onclick="changeTableVal('nav','id','<?php echo ($v["id"]); ?>','is_show',this)"/>
				</td>
				<td>
					<input type="text" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onchange="updateSort('nav','id','<?php echo ($v["id"]); ?>','orderby',this)" size="3" value="<?php echo ($v["orderby"]); ?>" style="height: 20px; border: 1px solid #cfcfcf;opacity: 0.6;text-align:center" />
				</td>
				<td><?php echo (date("Y-m-d H:i",$v["addtime"])); ?></td>
				<td>
					<a href="<?php echo U('edit',array('id'=>$v['id']))?>" class="tablelinks"><img src="/Public/Admin/images/edit.png" class="edit">编辑</a>
					<a onclick="return confirm('确定要删除吗？');" href="<?php echo U('aDel')?>?id=<?php echo $v['id']?>&active=delete"" class="tablelink"><img src="/Public/Admin/images/del.png" class="del">删除</a>
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
<script>
        // 点击展开 收缩节点
        function treeClicked(obj,cat_id){
            var src = $(obj).attr('src');
            if(src == '/Public/Admin/images/tv-expandable.gif'){
                $(".parent_id_"+cat_id).show();
                $(obj).attr('src','/Public/Admin/images/tv-collapsable-last.gif');
            }else{
                $(obj).attr('src','/Public/Admin/images/tv-expandable.gif');
                // 如果是点击减号, 遍历循环他下面的所有都关闭
                var tbl = document.getElementById("article_cat_table");
                	cur_tr = obj.parentNode.parentNode;
                var fnd = false;
                for (i = 0; i < tbl.rows.length; i++)
                {
                    var row = tbl.rows[i];
                    if (row == cur_tr){
                        fnd = true;
                    }else{
                        if (fnd == true){
                            var level = parseInt($(row).data('level'));
                            var cur_level = $(cur_tr).data('level');
                            if (level > cur_level){
                                $(row).hide();
                                $(row).find('img').attr('src','/Public/Admin/images/tv-expandable.gif');
                            }else{
                                fnd = false;
                                break;
                            }
                        }
                    }
                }
            }
        }
        //全部展开
        function  tree_open(obj)
        {
            var tree = $('#article_cat_table tr[id^="1_"],#article_cat_table tr[id^="2_"], #list-table tr[id^="3_"] '); //,'table-row'
            if(tree.css('display')  == 'table-row')
            {
                $(obj).html("<img src='/Public/Admin/images/zhan.png' style='vertical-align: text-top;margin-right: 5px;'>展开分类");
                tree.css('display','none');
                $("img[id^='icon_']").attr('src','/Public/Admin/images/tv-expandable.gif');
            }else
            {
                $(obj).html("<img src='/Public/Admin/images/shou.png' style='vertical-align: text-top;margin-right: 5px;'>收起分类");
                tree.css('display','table-row');
                $("img[id^='icon_']").attr('src','/Public/Admin/images/tv-collapsable-last.gif');
            }
        }
	</script>
<script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
</script>
</body>
</html>
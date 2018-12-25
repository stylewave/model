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

<script type="Text/Javascript" language="JavaScript">
    if (window.top != window) {
        window.top.location.href = document.location.href;
    }
    //按下F5时，只刷新rightFrame，兼容IE、FF
    function mykeyDown(e){
      var ev = e ? e :event;
      if(window.addEventListener){
          if(ev.keyCode==116){
              parent.frames['rightFrame'].location.reload();
              ev.preventDefault();
              return false;
          }
      }else{
          if(ev.keyCode==116){
              ev.keyCode=0;
              ev.returnValue=false;
              parent.frames('rightFrame').location.reload();
              return false;
          }
      }
    }
    //给每个frame都绑定onkeydown事件
    window.onload = function(){
        document.onkeydown = mykeyDown;
        for(var i=0;i<frames.length;i++){
           if(typeof document.addEventListener != "undefined") {
               frames[i].document.addEventListener("keydown",mykeyDown,true);
           }else{
               frames[i].document.attachEvent("onkeydown",mykeyDown);
           }
        }
    };
</script>
<frameset rows="45,*" cols="*" frameborder="no" border="0" framespacing="0" id="indexFrame">
  <frame src="<?php echo U('top')?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset cols="187,*" frameborder="no" border="0" framespacing="0">
    <frame src="<?php echo U('left')?>" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="<?php echo U('main')?>" name="rightFrame" id="rightFrame" title="rightFrame" />
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
<?php
return array(
    /** 数据库设置 **/
    'DB_TYPE'               =>  'mysqli',          // 数据库类型
    'DB_HOST'               =>  '127.0.0.1',   // 服务器地址
    'DB_NAME'               =>  '8903',             // 数据库名
    'DB_USER'               =>  'root',   // 用户名
    'DB_PWD'                =>  'root',// 密码
    'DB_PORT'               =>  '3306',            // 端口
    'DB_PREFIX'             =>  'yx_',             // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',            // 数据库编码默认采用utf8
     /** 路由 **/
	 'URL_ROUTER_ON' => true, //开启路由
	 'URL_MODEL' => 2,  //访问模式
                        // 0：http://localhost/index.php?m=模块&c=控制器&a=操作方法          [get模式/普通模式]
                        // 1：http://localhost/index.php/模块[模块文件夹]/控制器/操作方法      [pathinfo模式]  /*默认*/
                        // 2：http://localhost/模块[模块文件夹]/控制器/操作方法                [rewite重写模式]
                        // 3：http://localhost/index.php?s=/模块[模块文件夹]/控制器/操作方法   [兼容模式]
	 'URL_HTML_SUFFIX' =>'.html',  //伪静态后缀
	/** 图片相关的配置 **/
    'IMAGE_CONFIG' => array(
    	'maxSize' => 1024*1024*10,
    	'exts' => array('jpg','gif','jpeg','bmp','png','swf','doc','docx','pdf','txt'),
    	'rootPath' => './Public/Uploads/',  // 上传图片的保存路径  -> PHP要使用的路径，硬盘上的路径
    ),
);
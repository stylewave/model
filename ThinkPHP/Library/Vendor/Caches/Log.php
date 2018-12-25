<?php
// 日志类

class Log {

    static public $path = LOG_PATH.'Logic';


    static public function record($content, $file) {
        $logpath = self::$path.'/'.date('Ymd');
        $files = $logpath.'/'.$file;
        if (!file_exists($logpath)){
            mkdir($logpath,0777,true);
            chmod($logpath,0777);
        }
        $now = date('Y-m-d H:i:s');
        $content = "[文件-".__FILE__.',行数-'.__LINE__.",时间-{$now}]: {$content}\r\n";
        file_put_contents($files,$content, FILE_APPEND);
        chmod($files,0777);
    }

}
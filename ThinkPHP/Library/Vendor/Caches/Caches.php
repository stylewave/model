<?php
// 缓存类

class Caches {

    //设置缓存
    static public function setCache($table, $cachekey=false, $key='id', $order=[], $w=[]) {
        if(!$cachekey) $cachekey = strtolower($table).'_cache_data_file';
        $data = M($table)->where($w)->order($order)->select();
        $data = array_under_reset($data, $key);
        F($cachekey, $data);
        return $data;
    }


    //获取缓存
    static public function getCache($table, $cachekey=false, $key='id', $order=[], $w=[]) {
        if(!$cachekey) $cachekey = strtolower($table).'_cache_data_file';
        $data = F($cachekey);
        if(empty($data)) {
            $data = self::setCache($table, $cachekey, $key, $order, $w);
        }
        return $data;
    }

    //获取图片缓存
    static  public  function getAdCache($id) {
        $data = self::getCache('Ad', false, 'id', "orderby asc,id asc");
        if(empty($data)) return [];
        $r = [];
        foreach($data as $v) {
            if($v['pid'] == $id) $r[] = $v;
        }
        return $r;
    }

}
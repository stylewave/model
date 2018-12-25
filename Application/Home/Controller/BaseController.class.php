<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize(){
        //初始化方式，每次进入控制器都会先执行此方法
        // 如果是手机跳转到 手机模块
        if(true == isMobile()){
            header("Location: ".U('Mobile/Index/index'));
        }
		$this->getNav();
    }
	
	public function getNav(){
	    // 导航
		$dh = M('nav'); 
		$nav = $dh->where(array(
                'is_show' => 1,
				'parent_id' => 0,
            ))->order('orderby asc')->select();
//        foreach($nav as $key=>$val){
//            $abc = array(
//                'is_show' => 1,
//                'parent_id' => $val['id'],
//            );
//            $nav[$key]['nav'] = M('nav')->where($abc)->order('addtime asc')->select();
//        }
		$message = M('config'); 
		$config = $message->find();//系统项
        $ad = M('ad')->where('is_show=1')->select();//页面banner图
		$this->assign(array(
				'nav' => $nav,
				'config' => $config,
				'ad' => $ad,
		));
	}
	
}
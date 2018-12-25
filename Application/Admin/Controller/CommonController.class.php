<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller 
{
 public function _initialize(){
        //初始化方式，每次进入控制器都会先执行此方法
		if(!session('?username')){
			$this->redirect('Login/login');die;
		}
        $this->assign('menu',$this->AdminMenu());
		$this->getNav();
    }
    //后台MENU
    private function AdminMenu() {
        return [
            'system' => [
                'name' => '系统设置',
                'icon' => 'set',
                'val'  =>[
                     0 => ['name' => '网站设置','url'  => U('Admin/System/index')],
//                     1 => ['name' => 'seo设置','url'  => U('Admin/System/seo')],
                     2 => ['name' => '合作客户','url'  => U('Admin/System/friendLink')],
                ]
            ],
            'ad' => [
                'name' => '广告管理',
                'icon' => 'tp',
                'val'  =>[
                     0 => ['name' => '广告列表','url'  => U('Admin/Ad/index')],
                     1 => ['name' => '广告位置','url'  => U('Admin/Ad/indexs')]
                ]
            ],
            'nav' => [
                'name' => '分类管理',
                'icon' => 'cate',
                'val'  =>[
                     0 => ['name' => '分类列表','url'  => U('Admin/Nav/index')]
                ]
            ],
            'article' => [
                'name' => '文章管理',
                'icon' => 'content',
                'val'  =>[
                     0 => ['name' => '文章列表','url'  => U('Admin/Article/index')],
                ]
            ],
            'product' => [
                'name' => '商品中心',
                'icon' => 'cp',
                'val'  =>[
                    0 => ['name' => '商品列表','url'  => U('Admin/Product/index')]
                ]
            ],
            'zhaopin' => [
                'name' =>'人才招聘',
                'icon' => 'rc',
                'val'  =>[
                    0 => ['name' => '招聘职位','url'  => U('Admin/zhaopin/index')],
                    1 => ['name' => '申请列表','url'  => U('Admin/zhaopin/indexs')],
                ]
            ],
//            'message' => [
//                'name' => '留言管理',
//                'icon' => 'ly',
//                'val'  =>[
////                     0 => ['name' => '户型规划申请','url'  => U('Admin/Message/lst')],
//                     0 => ['name' => '在线留言列表','url'  => U('Admin/Message/index')],
//                ]
//            ],
            'user' => [
                'name' => '管理员管理',
                'icon' => 'user',
                'val'  =>[
                     0 => ['name' => '管理员列表','url' => U('Admin/User/index')]
                ]
            ],
        ];
    }
	public function getNav(){}
}
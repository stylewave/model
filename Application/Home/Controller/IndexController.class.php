<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class IndexController extends BaseController {
    //首页
    public function index(){
		$art = M('article');
		$about = $art->where(['cat_id'=>145])->find();//关于我们
        //产品展示
        $product = M('nav')->where('parent_id=107')->select();
        foreach($product as $key=>$value){
            $product[$key]['list'] = M('product')->where(['cat_id'=>$value['id'],'is_on_seal'=>1])->limit(8)->select();
        }
        $news = $art->where(['cat_id'=>151,'is_index'=>1])->order('id desc')->limit(2)->select();
        $news2 = $art->where(['cat_id'=>152,'is_index'=>1])->order('id desc')->limit(4)->select();
        //合作客户
        $friend = M('friendlink')->select();
		$this->assign(array(
			'about' => $about,
			'product' => $product,
			'news' => $news,
			'news2' => $news2,
			'friend' => $friend,
		));
		$this->display();
	}
    //关于我们
    public function about(){
        $id = isset($_GET['id'])?$_GET['id']:145;
        $title = M('nav')->where('parent_id=106')->select();
        $data = M('article')->where('cat_id='.$id)->find();//内容
        $this->assign(array(
            'data' => $data,
            'title' => $title,
        ));
        $this->display();
    }
    //产品中心
    public function ProductShow(){
        $id = isset($_GET['id'])?$_GET['id']:array('in','108,127,132,133');
        $model = M('product');
        $newsNav = M('nav')->where('parent_id=107')->select();
        $where = ['is_floor' => 1,'cat_id' => $id];
        $count = $model->where($where)->count();
        $Page = getpage($count,15);
        $show = $Page->show();// 分页显示输出
        $list = $model->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign(array(
            'list' => $list,
            'page' => $show,
            'newsNav' => $newsNav,
        ));
        $this->display();
    }
    //产品详情
    public function Productdetail(){
        $id = I('get.id');
        $model = M('product');
        $newsNav = M('nav')->where('parent_id=107')->select();
        //显示文章
        $data = $model->find($id);
        $model->where('id='.$id)->save(array('click'=>$data['click']+1 ));
        $img = M('goods_pic')->where('goods_id='.$id)->select();
        $detail = $model->where('a.id='.$id)->alias('a')->join('join __NAV__ b on a.cat_id=b.id')->find();
        $this->assign(array(
            'data' => $data,
            'img' => $img,
            'newsNav' => $newsNav,
            'detail' => $detail,
        ));
        $this->display();
    }
	//新闻中心
	public function news(){
        $id = isset($_GET['id'])?$_GET['id']:array('in','151,152');
        $newsNav = M('nav')->where('parent_id=109')->select();
		$model = M('article');//内容
		$where = array(
		    'cat_id' => $id,
			'is_floor' => 1,
		);
		$count = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = getpage($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(2)
		$show = $Page->show();// 分页显示输出
		$list = $model->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign(array(
			'list' => $list,
			'page' => $show,
			'newsNav' => $newsNav,
		));
		$this->display();
	}
	//新闻详情
	public function newsDetail(){
		$id = I('get.id');
		$model = M('article');
		$data = $model->find($id);//显示文章
        $model->where('id='.$id)->save(array('click'=>$data['click']+1 ));
        $newsNav = M('nav')->where('parent_id=109')->select();
        $detail = $model->where('a.id='.$id)->alias('a')->join('join __NAV__ b on a.cat_id=b.id')->find();
//        //上一个
//        $where['cat_id'] = 109;
//        $where['id'] = array('lt',$id);
//        $front = $model->where($where)->order('id desc')->limit('1')->find();
//        if (!$front){
//            $front['title'] = '已经是最后一篇了';
//        }
//        $this->assign('front',$front);
//
//        //下一个
//        $map['cat_id'] = 109;
//        $map['id'] = array('gt',$id);
//        $after = $model->where($map)->order('id asc')->limit('1')->find();
//        if (!$after){
//            $after['title'] = '已经是最后一篇了';
//        }
//        $this->assign('after',$after);
		$this->assign(array(
			'data' => $data,
			'newsNav' => $newsNav,
			'detail' => $detail,
		));
		$this->display();
	}
    //人才招聘
    public function job(){
        $id = I('get.cid');
        $data = M('nav')->field('id,name')->find($id);
        $this->assign('data',$data);
        //列表
        $count = M('zp')->count();// 查询满足要求的总记录数
        $Page = getpage($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        $info = M('zp')->order('orderby asc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('info',$info);
        $floor = M('zp')->order('id desc')->select();
        $this->assign(array(
            'data' => $data,
            'info' => $info,
            'page' => $show,
            'floor' => $floor,
        ));
        $this->display();
    }
    //职位申请
    public function jobdetail(){
        $id = I('get.cid');
        $data = M('nav')->field('id,name')->find($id);
        $this->assign('data',$data);
        $new = M('zp');
        $about = $new->field('id,title')->select();
        if(IS_POST)
        {
            $model = M('comment');
            $rules = array(
                array('username','require','请输入您的姓名！'),
                array('tel','require','请填写您的电话号码，方便我们及时与您取得联系！'),
                array('tel','/^((0\d{2,3}-\d{7,8})|(1[35784]\d{9}))$/','请输入正确的电话号码！'),
                array('email','require','请填写您的邮箱，方便我们以邮件的形式与您取得联系！'),
                array('email','email','邮箱格式不正确！'),
            );
            if($model->validate($rules)->create())
            {

                $model->addtime = time();
                if($model->add())
                    $this->success(array(
                        'title' => I('post.title'),
                        'username' => I('post.username'),
                        'sex' => I('post.sex'),
                        'birthday' => I('post.birthday'),
                        'area' => I('post.area'),
                        'tel' => I('post.tel'),
                        'yb' => I('post.yb'),
                        'email' => I('post.email'),
                        'xl' => I('post.xl'),
                        'zy' => I('post.zy'),
                        'school' => I('post.school'),
                        'address' => I('post.address'),
                        'content' => I('post.content'),
                        'content_a' => I('post.content_a'),
                        'content_b' => I('post.content_b'),
                    ), '');
            }
            $this->error($model->getError(), '');
        }
        $this->assign(array(
            'about' => $about,
        ));
        $this->display();
    }
    //联系我们
    public function contact(){
        $this->display();
    }
    //合作品牌
    public function Cooperation(){
        $model = M('friendlink');
        $count = $model->where('is_show=1')->count();// 查询满足要求的总记录数
        $Page = getpage($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        $list = $model->where('is_show=1')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }
    //搜索
    public function search(){
        $model = M('product');
        $where = array();
        if(isset($_GET['title'])){
            $search = I('get.title');
            $where['title|description'] = array('LIKE',"%$search%");
        }
        $count = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        $list = $model->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
            'count' => $count,
        ));
	    $this->display();
    }
}
<?php
namespace Admin\Controller;
use Think\Controller;
class NavController extends CommonController {
	public function index(){
		$model = D('nav');
		$data = $model->getTree();
		$this->assign(array(
			'data' => $data,
		));
		$this->display();
    }
	public function add(){
		
		$model = D('nav');
		if(IS_POST)
    	{
    		if($model->create(I('post.'), 1))
    		{
//                $ret['images'][0] = '';
//                if($_FILES['cat_img']['error'] == 0)
//                {
//                    $ret = uploadOne('cat_img', 'Nav');
//                    $model->cat_img = $ret['images'][0];
//                }
				$model->addtime = time();
    			if($id = $model->add())
    			{
    				$this->success('添加成功！', U('index'));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
    	// 取出所有的分类做下拉框
    	$catData = $model->getTree();
		$this->assign(array(
			'catData' => $catData,
		));
		$this->display();
    }
	public function edit(){
		$id = I('get.id');//等同于where('id='.$id)->save();
		$model = D('nav');
		$data = $model->find($id);
		if(IS_POST)
    	{
    		if($model->create(I('post.'), 2))
    		{
//                $ret['images'][0] = '';
//                if($_FILES['cat_img']['error'] == 0)
//                {
//                    $ret = uploadOne('cat_img', 'Nav');
//                    $model->cat_img = $ret['images'][0];
//                }
				$model->addtime = time();
    			if($model->save() !== FALSE)
    			{
    				$this->success('修改成功！', U('index'));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
		// 取出所有的分类做下拉框
    	$catData = $model->getTree();
    	// 取出当前分类的子分类
    	$children = $model->getChildren($id);
		$this->assign(array(
    		'children' => $children,
    		'data' => $data,
    		'catData' => $catData,
    	));
		$this->display();
    }
    public function aDel(){
        $model = M('nav');
        if(IS_GET) {
            $id = I('get.id');
            // 判断子分类
            $count = $model->where('parent_id='.$id)->count('id');
            if($count > 0) $this->error('该分类下还有分类不得删除!',U('Admin/Nav/index'));
            // 判断是否存在文章
            $article_count = M('article')->where('cat_id='.$id)->count('id');
            if($article_count > 0) $this->error('该分类下还有内容不得删除!',U('Admin/Nav/index'));
            $oldimgsrc = $model->field('id,cat_img')->find($id);
            deleteImage($oldimgsrc);
            // 删除分类
            $res = $model->delete($id);
            if ($res) {
                $this->redirect('Admin/Nav/index');die;
            } else {
                $this->error($model->getError());
                exit;
            }
        }
    }
   
}
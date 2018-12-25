<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends CommonController {
	// 处理AJAX删除图片的请求
	public function ajaxDelPic()
	{
		$picId = I('get.picid');
		// 根据ID从硬盘上数据删除中删除图片
		$gpModel = D('goods_pic');
		$pic = $gpModel->field('id,pic,mid_pic')->find($picId);
		// 从硬盘删除图片
		deleteImage($pic);
		// 从数据库中删除记录
		$gpModel->delete($picId);
	}
	
    public function index(){
		$model = D('Product');
		$data = $model->search();
		$this->assign($data);
		// 取出所有的分类做下拉框
		$catModel = D('nav');
    	$catData = $catModel->getTree();
        //批量删除
        $id = I('get.idarr');
        if($id){
            $result = $model->delete($id);
            if($result){
                $this->success('删除成功',U('Admin/Product/index'));die;
            }else{
                $this->error('删除失败');die;
            }
        }
		$this->assign(array(
			'catData' => $catData,
		));
		$this->display();
    }
	public function add(){
        $id = I('get.id');
        $model = D('Product');
        $catModel = D('nav');
        $catData = $catModel->getTree();
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            $rules = array(
                array('cat_id', 'require', '必须选择产品分类！', 1),
                array('title', 'require', '产品名称不能为空', 1),
            );
            if ($model->validate($rules)->create()) {
                if ($data) {
                    if(FALSE !== $model->save())  // save()的返回值是，如果失败返回false,如果成功返回受影响的条数【如果修改后和修改前相同就会返回0】
                    {
                        $this->success('修改成功！', U('index'));
                        exit;
                    }
                    $this->error($model->getError());
                } else {
                    if($model->add())  // 在add()里又先调用了_before_insert方法
                    {
                        $this->success('添加成功！', U('index'));
                        exit;
                    }
                    $this->error($model->getError());
                }
            }else{
                $this->error($model->getError());
            }
        }
        // 取出相册中现有的图片
        $gpModel = D('goods_pic');
        $gpData = $gpModel->field('id,pic,mid_pic')->where(array(
            'goods_id' => array('eq', $id),
        ))->select();
        $this->assign(array(
            'catData' => $catData,
            'gpData' => $gpData,
            'data' => $data,
        ));
		$this->display();
    }

	public function aDel(){
		$model = D('Product');
		if(FALSE !== $model->delete(I('get.id')))
			$this->success('删除成功！', U('index'));
		else
            $this->error($model->getError());exit;
	}
}
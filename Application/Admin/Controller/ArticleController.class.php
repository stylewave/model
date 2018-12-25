<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    //文章列表
    public function index(){
		$model = D('Article');
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
                $this->success('删除成功',U('Admin/Article/index'));die;
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
        $model = M('Article');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            $rules = array(
                array('cat_id', 'require', '必须选择文章分类！', 1),
                array('title', 'require', '标题不能为空', 1),
            );
            if ($model->validate($rules)->create()) {
                if ($data) {
                    //先删除原来的图片
//                    $oldimgsrc = $model->field('id,imgsrc,thumb')->find($id);
//                    deleteImage($oldimgsrc);
                    $ret['images'][0] = '';
                    if($_FILES['imgsrc']['error'] == 0)
                    {
                        $ret = uploadOne('imgsrc', 'article');
                        $model->imgsrc = $ret['images'][0];
                    }
//                     if($_FILES['thumb']['error'] == 0)
//                     {
//                         $ret = uploadOne('thumb', 'article');
//                         $model->thumb = $ret['images'][0];
//                     }
//                    $time = I('post.add_time');
                    $model->addtime = time();
//                    $model->add_time = strtotime($time);
                    $res = $model->where('id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('index'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {
                    $ret['images'][0] = '';
                    if($_FILES['imgsrc']['error'] == 0)
                    {
                        $ret = uploadOne('imgsrc', 'article');
                        $model->imgsrc = $ret['images'][0];
                    }
//                     if($_FILES['thumb']['error'] == 0)
//                     {
//                         $ret = uploadOne('thumb', 'article');
//                         $model->thumb = $ret['images'][0];
//                     }
//                    $time = I('post.add_time');
                    $model->addtime = time();
//                    $model->add_time = strtotime($time);
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('index'));exit;
                    }else{
                        $this->error('添加失败');
                    }
                }
            }else{
                $this->error($model->getError());
            }
        }
        $catModel = D('nav');
        $catData = $catModel->getTree();
        $this->assign(array(
            'catData' => $catData,
            'data' => $data,
        ));
        $this->initEditor();
		$this->display();
    }
	public function aDel(){
		$model = D('Article');
        $oldimgsrc = $model->field('id,imgsrc,thumb')->find(I('get.id'));
        deleteImage($oldimgsrc);
		if(FALSE !== $model->delete(I('get.id')))
			$this->success('删除成功！', U('index'));
		else 
			$this->error('删除失败！原因：'.$model->getError());
	}
    //初始化编辑器链接
    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'article')));
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'article')));
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'article')));
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'article')));
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'article')));
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'article')));
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'article')));
        $this->assign("URL_Home", "");
    }
    //设计师团队
    public function teamList(){
        $model = M('team');
        $count = $model->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $list = $model->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();

        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }
    public function team(){
        $id = I('get.id');
        $model = M('team');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            if ($model->create()) {
                if ($data) {
                    //先删除原来的图片
                    $oldimgsrc = $model->field('id,pic')->find($id);
                    deleteImage($oldimgsrc);
                    $ret['images'][0] = '';
                    if($_FILES['pic']['error'] == 0)
                    {
                        $ret = uploadOne('pic', 'team');
                        $model->pic = $ret['images'][0];
                    }
                    $model->addtime = time();
                    $res = $model->where('id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('Admin/Article/teamList'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {
                    $ret['images'][0] = '';
                    if($_FILES['pic']['error'] == 0)
                    {
                        $ret = uploadOne('pic', 'team');
                        $model->pic = $ret['images'][0];
                    }

                    $model->addtime = time();
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('Admin/Article/teamList'));exit;
                    }else{
                        $this->error('添加失败');
                    }
                }
            }else{
                $this->error($model->getError());
            }
        }
        $this->assign(array(
            'data' => $data,
        ));
        $this->initEditor();
        $this->display();
    }
    public function del(){
        $id = I('get.id');
        $model = D('team');
        if (IS_GET) {
            $oldimgsrc = $model->field('id,pic')->find($id);
            deleteImage($oldimgsrc);
            $res = $model->delete($id);
            if ($res)
            {
                $this->redirect('/Admin/Article/teamList');die;
            } else {
                echo "<script>alert('删除失败！');history.back();</script>";exit;
            }
        }
    }
}
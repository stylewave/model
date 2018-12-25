<?php
namespace Admin\Controller;
use Think\Cache;
class SystemController extends CommonController{
	
	/*
	 * 配置入口
	 */
	public function index()
	{          
		$message = M('config');
		$model = $message->find();
		if(IS_POST){
            $message->create();
            $ret['images'][0] = '';
            if($_FILES['logo']['error'] == 0)
            {
                $ret = uploadOne('logo', 'config');
                $message->logo = $ret['images'][0];
            }
            if($_FILES['footer_logo']['error'] == 0)
            {
                $ret = uploadOne('footer_logo', 'config');
                $message->footer_logo = $ret['images'][0];
            }
            if($_FILES['img']['error'] == 0)
            {
                $ret = uploadOne('img', 'config');
                $message->img = $ret['images'][0];
            }
            $message->addtime = time();
			$res = $message->where('id=1')->save();
			if($res){
				$this->success('保存成功',U('index'));die;
			}else{
				$this->error('保存失败');die;
			}
		}
		$this->assign('model',$model);
		$this->display();
	}

	//友情连链接
    public function friendLink(){
        $message = M('friendlink');
        $where = "1=1";
        $title = trim(I('get.title')); // 文章标题
        $title && $where.=" and title like '%$title%' ";
        $count = $message->where($where)->count();
        $Page = new \Think\Page($count,10);
        $show = $Page->show();// 分页显示输出
        $list = $message->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //批量删除
        $id = I('get.idarr');
        if($id){
            $result = $message->delete($id);
            if($result){
                $this->success('删除成功',U('Admin/System/friendLink'));die;
            }else{
                $this->error('删除失败');die;
            }
        }
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }
    public function friend(){
        $id = I('get.id');
        $model = D('friendlink');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            if ($model->create()) {
                if ($data) {
                    $ret['images'][0] = '';
                    if($_FILES['imgsrc']['error'] == 0)
                    {
                        $ret = uploadOne('imgsrc', 'friendLink');
                        $model->imgsrc = $ret['images'][0];
                    }
                    $model->addtime = time();
                    $res = $model->where('id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('/Admin/System/friendLink'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {
                    $ret['images'][0] = '';
                    if($_FILES['imgsrc']['error'] == 0)
                    {
                        $ret = uploadOne('imgsrc', 'friendLink');
                        $model->imgsrc = $ret['images'][0];
                    }
                    $model->addtime = time();
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('/Admin/System/friendLink'));exit;
                    }else{
                        $this->error('添加失败');
                    }
                }
            }else{
                $this->error($model->getError());
            }
        }
        $this->assign('data',$data);
        $this->display();
    }
    public function aDel(){
        //单条删除
        if(IS_GET){
            $id = I('get.id');
            $oldimgsrc = M('friendlink')->field('id,imgsrc')->find($id);
            deleteImage($oldimgsrc);
            $res = M('friendlink')->delete($id);
            if($res){
                $this->redirect('/Admin/System/friendLink');die;
            }else{
                echo "<script>alert('删除失败！');history.back();</script>";
                exit;
            }
        }
    }

    //seo
    public function seo(){
        $model = M('nav');
        $count = $model->alias('a')->join('join __SEO__ b on b.pid=a.id')->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $list = $model->alias('a')->join('join __SEO__ b on b.pid=a.id')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }
    public function add(){
        $id = I('get.id');
        $model = D('seo');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            $rules = array(
                array('pid', 'require', '必须选择栏目名称！', 1),
            );
            if ($model->validate($rules)->create()) {
                if ($data) {

                    $model->addtime = time();
                    $res = $model->where('id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('/Admin/System/seo'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {

                    $model->addtime = time();
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('/Admin/System/seo'));exit;
                    }else{
                        $this->error('添加失败');
                    }
                }
            }else{
                $this->error($model->getError());
            }
        }
        $catModel = D('nav');
        $nav = $catModel->getTree();
        $this->assign(array(
            'nav' => $nav,
        ));
        $this->assign('data',$data);
        $this->display();
    }
    public function aDels(){
        //单条删除
        if(IS_GET){
            $id = I('get.id');
            $res = M('seo')->delete($id);
            if($res){
                $this->redirect('/Admin/System/seo');die;
            }else{
                echo "<script>alert('删除失败！');history.back();</script>";
                exit;
            }
        }
    }
    /**
     * 清空系统缓存
     */ 
	//后台页面
	public function admin(){
		 header("Content-type: text/html; charset=utf-8");
		 //清文件缓存
		 $dirs = array('./Application/Runtime/');
		 @mkdir('Runtime',0777,true);
		 //清理缓存
		 foreach($dirs as $value) {
		  $this->rmdirr($value);
		 }
		 echo "<script>alert('系统缓存清除成功！');window.history.back();</script>";
	}
	 
	//处理方法
	public function rmdirr($dirname) {
		if (!file_exists($dirname)) {
		 return false;
		}
		if (is_file($dirname) || is_link($dirname)) {
		 return unlink($dirname);
		}
		$dir = dir($dirname);
		if($dir){
		 while (false !== $entry = $dir->read()) {
	   if ($entry == '.' || $entry == '..') {
		continue;
	   }
	   //递归
	   $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
		 }
		}
		$dir->close();
		return rmdir($dirname);
	}
 
}
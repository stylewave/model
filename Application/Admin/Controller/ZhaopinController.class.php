<?php
namespace Admin\Controller;
use Think\Controller;
class ZhaopinController extends CommonController {
	//首页
    public function index(){
        $model = M('zp');
        $where = "1=1";
        $ad_name = trim(I('title'));
        $ad_name && $where.=" and title like '%$ad_name%' ";
        $count = $model->where($where)->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $list = $model->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        //批量删除
        $id = I('get.idarr');
        if($id){
            $result = $model->delete($id);
            if($result){
                $this->success('删除成功',U('Admin/Zhaopin/index'));die;
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
    public function add(){
        $id = I('get.id');
        $model = D('zp');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            if ($model->create()) {
                if ($data) {
                    $model->addtime = time();
                    $res = $model->where('id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('/Admin/Zhaopin/index'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {
                    $model->addtime = time();
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('/Admin/Zhaopin/index'));exit;
                    }else{
                        $this->error('添加失败');
                    }
                }
            }else{
                $this->error('操作失败！原因：'.$model->getError());
            }
        }
        $this->assign(array(
            'data' => $data,
        ));
        $this->initEditor();
        $this->display();
    }
	public function aDel(){
		
		//单条删除
		if(IS_GET){
			$id = I('get.id');
			$res = M('zp')->delete($id);
			if($res){
				$this->redirect('Zhaopin/index');die;
			}else{
				echo "<script>alert('删除失败！');</script>";
				exit;
			}
		}
	}
    /**
     * 初始化编辑器链接
     * @param $post_id post_id
     */
    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'zp')));
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'zp')));
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'zp')));
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'zp')));
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'zp')));
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'zp')));
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'zp')));
        $this->assign("URL_Home", "");
    }
    //申请列表
    public function indexs(){
        $model = M('comment');
        $count = $model->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $list = $model->limit($Page->firstRow.','.$Page->listRows)->select();
        //批量删除
        $id = I('get.idarr');
        if($id){
            $result = $model->delete($id);
            if($result){
                $this->success('删除成功',U('Admin/Zhaopin/indexs'));die;
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
    //详细信息
    public function edits(){
        $id = I('get.id');
        $model = M('comment');
        $data = $model->find($id);
        $this->assign(array(
            'data' => $data,
        ));
        $this->display();
    }
    public function aDels(){

        //单条删除
        if(IS_GET){
            $id = I('get.id');
            $res = M('comment')->delete($id);
            if($res){
                $this->redirect('Zhaopin/indexs');die;
            }else{
                echo "<script>alert('删除失败！');history.back();</script>";
                exit;
            }
        }
    }
}
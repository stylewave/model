<?php
namespace Admin\Controller;
use Think\Controller;
class AdController extends CommonController {
    public function index(){
		$model = M('AdPosition');		
		$where = "1=1";
        if(I('get.pid')){
        	$where = "pid=".I('get.pid');
        }
        $ad_name = trim(I('ad_name')); 
		$ad_name && $where.=" and ad_name like '%$ad_name%' ";
		$pid = I('pid',0);
		$pid && $where.=" and pid = $pid ";
		
		$count = $model->where($where)->alias('a')->join('join __AD__ b on b.pid=a.id')->count();
		$Page = new \Think\Page($count,20);
		$show = $Page->show();// 分页显示输出
		$list = $model->where($where)->alias('a')->join('join __AD__ b on b.pid=a.id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$ad = M('AdPosition')->select();
        //批量删除
        $id = I('get.idarr');
        if($id){
            $result = $model->delete($id);
            if($result){
                $this->success('删除成功',U('Admin/Ad/index'));die;
            }else{
                $this->error('删除失败');die;
            }
        }
		$this->assign(array(
			'list' => $list,
			'page' => $show,
			'ad' => $ad,
		));
		$this->display();
    }
	public function add(){
        $id = I('get.id');
        $model = D('ad');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            $rules = array(
                array('pid', 'require', '必须选择广告位置！', 1),
            );
            if ($model->validate($rules)->create()) {
                if ($data) {
                    $ret['images'][0] = '';
                    if($_FILES['imgsrc']['error'] == 0)
                    {
                        $ret = uploadOne('imgsrc', 'ad');
                        $model->imgsrc = $ret['images'][0];
                    }
                    $model->addtime = time();
                    $res = $model->where('id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('/Admin/Ad/index'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {
                    $ret['images'][0] = '';
                    if($_FILES['imgsrc']['error'] == 0)
                    {
                        $ret = uploadOne('imgsrc', 'ad');
                        $model->imgsrc = $ret['images'][0];
                    }
                    $model->addtime = time();
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('/Admin/Ad/index'));exit;
                    }else{
                        $this->error('添加失败');
                    }
                }
            }else{
                $this->error('操作失败！原因：'.$model->getError());
            }
        }
        $position = M('AdPosition');
        $ad = $position->select();
        $this->assign(array(
            'ad' => $ad,
        ));
		$this->assign('data',$data);
		$this->display();
    }
	public function aDel(){
		
		//单条删除
		if(IS_GET){
			$id = I('get.id');
			$oldimgsrc = M('ad')->field('id,imgsrc')->find($id);
            deleteImage($oldimgsrc);
            $res = M('ad')->delete($id);
			if($res){
				$this->redirect('/Admin/Ad/index');die;
			}else{
				echo "<script>alert('删除失败！');history.back();</script>";
				exit;
			}
		}
	}

    public function indexs(){
        $model = M('AdPosition');
        $where = array();
        $count = $model->where($where)->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $list = $model->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //echo $model->getLastSql();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
        $this->display();
    }
    public function adds(){
        $id = I('get.id');
        $model = D('AdPosition');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            if ($model->create()) {
                if ($data) {
                    $model->addtime = time();
                    $res = $model->where('id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('/Admin/Ad/indexs'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {
                    $model->addtime = time();
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('/Admin/Ad/indexs'));exit;
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
    public function aDels(){
        $model = M('AdPosition');
        //单条删除
        if(IS_GET){
            $id = I('get.id');
            // 判断是否存在内容
            $article_count = M('ad')->where('pid='.$id)->count('id');
            if($article_count > 0) $this->error('该分类下还有内容不得删除!',U('Admin/Ad/indexs'));

            $res = $model->delete($id);
            if($res){
                $this->redirect('/Admin/Ad/indexs');die;
            }else{
                echo "<script>alert('删除失败！');history.back();</script>";
                exit;
            }
        }
    }
}
?>
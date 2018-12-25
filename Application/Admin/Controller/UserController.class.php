<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
		// 实例化表对象
		$message = M('admin');
		$where = array();
		$count = $message->where($where)->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();// 分页显示输出
		$list = $message->where($where)->order('admin_id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//echo $message->getLastSql();
		$this->assign(array(
			'list' => $list,
			'page' => $show,
		));
		$this->display();
    }
	public function add(){
        $id = I('get.id');
        $model = M('admin');
        if($id > 0) $data = $model->find($id);
        if(IS_POST) {
            $rules = array(
                array('username','require','请输入用户名！'),
                array('username','','用户名称已经存在！',0,'unique',1),
                array("password", "require", "密码不能为空"),
                array("repassword", "require", "确认密码不能为空"),
                array('repassword','password','两次输入的密码不一致',0,'confirm'),
            );
            if ($model->validate($rules)->create()) {
                if ($data) {
                    $model->addtime = time();
                    $model->password = md5($_POST['password']);
                    $res = $model->where('admin_id='.$id)->save();
                    if($res){
                        $this->success('修改成功',U('/Admin/User/index'));die;
                    }else{
                        $this->error('修改失败');die;
                    }
                } else {
                    $model->username = $_POST['username'];
                    $model->password = encrypt($_POST['password']);
                    $model->addtime = time();
                    $res = $model->add();
                    if($res){
                        $this->success('添加成功！', U('/Admin/User/index'));exit;
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
	//用户删除
	public function aDel(){
		
		//单条删除
		if(IS_GET){
			$id = I('get.id');
			if(I('get.id') == '1'){
				echo "<script>alert('超级管理员无法删除！');history.back();</script>";
			}else{
			$res = M('admin')->delete($id);
			}
			if($res){
				$this->redirect('index');die;
			}else{
				echo "<script>alert('删除失败！');history.back();</script>";
				exit;
			}
		}
	}
}
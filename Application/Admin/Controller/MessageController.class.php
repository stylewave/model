<?php
namespace Admin\Controller;
use Think\Cache;
class MessageController extends CommonController{
	//在线留言
	public function index()
	{
        $model = M('message');
        $count = $model->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $list = $model->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign(array(
            'list' => $list,
            'page' => $show,
        ));
		$this->display();
	}
    public function aDel(){

        //单条删除
        if(IS_GET){
            $id = I('get.id');
            $res = M('message')->delete($id);
            if($res){
                $this->redirect('index');die;
            }else{
                echo "<script>alert('删除失败！');history.back();</script>";exit;
            }
        }
    }
    //户型规划申请
//    public function lst()
//    {
//        $model = M('comment');
//        $count = $model->count();
//        $Page = new \Think\Page($count,20);
//        $show = $Page->show();// 分页显示输出
//        $list = $model->limit($Page->firstRow.','.$Page->listRows)->select();
//        $this->assign(array(
//            'list' => $list,
//            'page' => $show,
//        ));
//        $this->display();
//    }
//    public function del(){
//
//        //单条删除
//        if(IS_GET){
//            $id = I('get.id');
//            $res = M('comment')->delete($id);
//            if($res){
//                $this->redirect('lst');die;
//            }else{
//                echo "<script>alert('删除失败！');history.back();</script>";exit;
//            }
//        }
//    }
}
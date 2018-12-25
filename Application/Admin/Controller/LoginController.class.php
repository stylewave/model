<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller 
{
	public function chkcode()
	{
		$Verify = new \Think\Verify(array(
		    'fontSize'    =>    40,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		    'useCurve' => true,
            'useNoise' => false,
		));
		$Verify->entry();
	}
   public function login()
   {
       if(session('?admin_id') && session('admin_id')>0){
           $this->error("您已登录",U('Admin/Index/index'));
       }
   		if(IS_POST)
   		{
   			$model = D('Admin');
            $login['username']=I('post.username');
            $login['password']=md5(I('post.password'));
            $user = $model->where($login)->find();
   			if($model->validate($model->_login_validate)->create())
   			{
   				if($model->login())
   				{
                   $data['lastlogin'] = time();
                   $data['lastip'] = $_SERVER['REMOTE_ADDR'];
                   $model->where('admin_id='.$user['admin_id'])->save($data);
                   $url = session('from_url') ? session('from_url') : 'Admin/Index/index';
                   $this->redirect($url); exit;
   				}
   			}
   			$this->error($model->getError());
   		}
   		$this->display();
   }
   public function logout()
   {
		session_unset();
        session_destroy();
   		$model = D('Admin');
   		$model->logout();
   		redirect('login');
   }
}
<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model 
{
	protected $insertFields = array('username','password','cpassword','chkcode');
	protected $updateFields = array('admin_id','username','password','cpassword');

	// 为登录的表单定义一个验证规则 
	public $_login_validate = array(
		array('username', 'require', '用户名不能为空！', 1),
		array('password', 'require', '密码不能为空！', 1),
		array('chkcode', 'require', '验证码不能为空！', 1),
		array('chkcode', 'check_verify', '验证码不正确！', 1, 'callback'),
	);
	// 验证验证码是否正确
	function check_verify($code, $id = ''){
	    $verify = new \Think\Verify();
	    return $verify->check($code, $id);
	}
	public function login()
	{
		// 从模型中获取用户名和密码
		$username = $this->username;
		$password = $this->password;
		// 先查询这个用户名是否存在
		$user = $this->where(array(
			'username' => array('eq', $username),
		))->find();
		
		if($user)
		{
			if($user['password'] == md5($password))
			{
				// 登录成功存session
				session('admin_id', $user['admin_id']);
				session('username', $user['username']);
				$lastlogin = time();
                $lastip = $_SERVER["REMOTE_ADDR"];
                session('lastlogin', $lastlogin);
                session('lastip', $lastip);
				return TRUE;
			}
			else 
			{
				$this->error = '密码不正确！';
				return FALSE;
			}
		}
		else 
		{
			$this->error = '用户名不存在！';
			return FALSE;
		}
	}
	public function logout()
	{
		session_unset();
        session_destroy();
		session(null);
	}
	/************************************ 其他方法 ********************************************/
}
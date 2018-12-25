<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller 
{
	// AJAX发表评论或留言
	public function add()
	{
		if(IS_POST)
		{
			$model = D('Message');
			if($model->create(I('post.'), 1))
			{
                $info = M('config')->where('id=1')->find();
                //发送邮件
                $to = $info['jieshou'];
                $title = $info['smname'];
                $user['username'] = I('post.username');
                $user['title'] = $info['smname'].'-'.'在线留言';
                $name = implode('-',$user);
                $data['username'] = 'username：'.I('post.username').'<br />';
                $data['tel'] = 'tel：'.I('post.tel').'<br />';
                $data['email'] = 'email：'.I('post.email').'<br />';
//                $data['phone'] = 'address：'.I('post.phone').'<br />';
//                $data['content'] = 'content：'.I('post.content');
                $body = implode(' ',$data);
                //发送邮件 - 调用think_send_mail函数
                if($info['is_open'] == 1){
                    think_send_mail($to,$title,$name,$body);
                }
				$model->addtime = time();
				if($model->add())
					$this->success(array(
						'username' => I('post.username'),
                        'tel' => I('post.tel'),
                        'email' => I('post.email'),
//						'phone' => I('post.phone'),
//						'content' => I('post.content'),
					), '');
			}
			$this->error($model->getError(), '');
		}
	}
}






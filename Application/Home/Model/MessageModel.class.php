<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model 
{
	protected $insertFields = 'username,email,phone,tel,content,addtime';
	// 添加时使用的表单验证规则
	protected $_validate = array(
        array('username','require','请输入您的姓名！'),
        array('email','require','请填写您的邮箱，方便我们以邮件的形式与您取得联系！',self::EXISTS_VALIDATE),
        array('email','email','邮箱格式不正确！',self::EXISTS_VALIDATE),
        array('tel','require','请填写您的手机号码，方便我们及时与您取得联系！'),
        array('tel','/^((0\d{2,3}-\d{7,8})|(1[35784]\d{9}))$/','请输入正确的手机号码！',self::EXISTS_VALIDATE),
//        array('phone','require','请填写您的电话号码，方便我们及时与您取得联系！'),
//        array('phone','/^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$/','请输入正确的电话号码！',self::EXISTS_VALIDATE),
//        array('content', '1,600', '请填写留言内容，内容在1~200个字之间！', 1, 'length'),
    );
}
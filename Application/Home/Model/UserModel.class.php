<?php
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
	protected $_validate = array(
		array('phone','require','请填写手机号！'), 
		array('account','require','请填写账号！'), 
		array('password','require','请填写密码！'), 
		array('account','','帐号名称已经存在！',0,'unique',1), 
		array('phone','','手机号已经存在！',0,'unique',1), 
		array('repassword','require','请确认密码！'),
		array('repassword','password','确认密码错误！',0,'confirm'),
		array('account','/^[0-9a-zA-Z]{3,30}$/','账号不符合要求！',0,'regex'),
		array('password','/^[0-9a-zA-Z_!?]{6,20}$/','账号不符合要求！',0,'regex')
	);
}
?>
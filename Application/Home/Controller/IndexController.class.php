<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller 
{
    public function index()
    {
    	$this->display('index'); 
    }

    public function reg()
    {
    	if (!I('post.submit')){
    		$this->display('reg');
    	}
    	else {
    		$user = D('User');
            // $date['account'] = I('post.account');
            // $date['password'] = I('post.password');
            // $date['phone'] = I('post.phone');
            // $date['repassword'] = I('post.repassword');
    		$result = $user->create();
    		if ($result)
    			// $this->success('Well Done!','Index/index');
                {
                    $user->add();
                    $this->success('Welcome');
                }
            else
                $this->error($user->getError());
    	}
    }

    public function login()
    {
    	if (!I('post.submit')){
    		$this->display('login');
    	}
    	else {
    		$user = D('User');
    		$post = array(
    			'account' => I('post.account'),
    			'password'=> I('post.password')
    		);
    		$data = $user->getByAccount(trim($post['account']));
    		if (count($data) == 0) $this->error('No such a user!');
    		else if ($data['password']!=$post['password']) $this->error('Password Wrong!');
    		else $this->success('Well Done!','Index/index');
    	}
    }

    public function sms($phone)
    {
        $SMS  = D('SMSend');
        $rand = rand(1000,9999);
        $_SESSION['verify'] = $rand;
        $post_data = "account=wsx248&password=wsxwsx&mobile=".$phone."&content=".rawurlencode("您的订单编码：".$rand."。如需帮助请联系客服。");
        $target = "http://sms.106jiekou.com/utf8/sms.aspx";
        $result = $SMS->Post($post_data,$target);
    }
}
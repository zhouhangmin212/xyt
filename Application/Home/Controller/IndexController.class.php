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
            $date['account'] = I('post.account');
            $date['password'] = I('post.password');
            $date['phone'] = I('post.phone');
            $date['repassword'] = I('post.repassword');
    		$result = $user->create($date);
    		if ($result)
    			//$this->success('Well Done!','Index/index');
                {
                    $user->add();
                    $this->success('Welcome,'. var_dump($result));
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
    		$user = M('User');
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
}
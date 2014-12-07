<?php
namespace Home\Controller;

use Think\Controller;

class GoodsController extends Controller
{
	public function upload()
	{
		if (!I('post.submit')){
			$this->display('upload');
		}
		else {
			$goods = D('GoodsInfo');
			if (!$goods->create()){
                $this->error($user->getError());
			}
			else {
				$goods->add();
				$this->success('Upload Succeed');
			}
		}
	}

	public function change()
	{
		if (!I('post.submit')){
			$this->display('change');
		}
		else {
			$goods = D('GoodsInfo');
			$data['id'] = I('post.id');
			$data['name'] = I('post.name');
			$data['picture'] = I('post.picture');
			$data['describe'] = I('post.describe');
			$data['price'] = I('post.price');
			$data['number'] = I('post.number');
			$goods->save($data);
		}
	}

	public function soldout()
	{
		$goods = D('GoodsInfo');
		$goods->where('number=0')->setField('is_selling',0);
		if (I('post.submit')) $goods->where('id='.I('post.id'))->setField('is_selling',0);
		else $this->display('goodsmng');
	}
}
?>
<?php
namespace Home\Model;

use Think\Model;

class GoodsInfoModel extends Model
{
	protected $_validate = array(
		array('name','require','请输入商品名称！'),
		array('class','require','请选择商品种类！'),
		array('picture','require','请上传商品图片！'),
		array('describe','require','请填写商品描述信息！'),
		array('price','number','请正确填写价格！'),
		array('number','number','请输入合适的商品数量！'),
	);
}
?>
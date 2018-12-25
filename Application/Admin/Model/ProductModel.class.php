<?php
namespace Admin\Model;
use Think\Model;
class ProductModel extends Model 
{
	// 添加时调用create方法允许接收的字段
	protected $insertFields = 'title,description,content,contents,click,is_floor,orderby,cat_id,addtime,imgsrc,img,model,brand,price';
	// 修改时调用create方法允许接收的字段
	protected $updateFields = 'id,title,description,content,contents,click,is_floor,orderby,cat_id,addtime,imgsrc,img,model,brand,price';
	//定义验证规则
	protected $_validate = array(
		array('cat_id', 'require', '必须选择产品分类！', 1),
		array('title', 'require', '标题不能为空', 1),
	);
	
// 这个方法在添加之前会自动被调用 --》 钩子方法
	// 第一个参数：表单中即将要插入到数据库中的数据->数组
	// &按引用传递：函数内部要修改函数外部传进来的变量必须按钮引用传递，除非传递的是一个对象,因为对象默认是按引用传递的
	protected function _before_insert(&$data, $option)
	{
		/**************** 处理imgsrc *******************/
		// 判断有没有选择图片
		$ret['images'][0] = '';
		if($_FILES['img']['error'] == 0)
		{
			$ret = uploadOne('img', 'Product');
			$data['img'] = $ret['images'][0];
		}
		$data['addtime'] = time();
	}
	
	protected function _before_update(&$data, $option)
	{
		$id = $option['where']['id'];  // 要修改的文章的ID
		/**************** 处理imgsrc *******************/
        //先删除原来的图片
//        $oldimgsrc = $this->field('id,img')->find($id);
//        deleteImage($oldimgsrc);
		//判断有没有选择图片
		$ret['images'][0] = '';
		if($_FILES['img']['error'] == 0){
			$ret = uploadOne('img', 'Product');
			$data['img'] = $ret['images'][0];
		}
		$data['addtime'] = time();
		//return $id;
		/************ 处理相册图片 *****************/
		if(isset($_FILES['pic']))
		{
			$pics = array();
			foreach ($_FILES['pic']['name'] as $k => $v)
			{
				$pics[] = array(
					'name' => $v,
					'type' => $_FILES['pic']['type'][$k],
					'tmp_name' => $_FILES['pic']['tmp_name'][$k],
					'error' => $_FILES['pic']['error'][$k],
					'size' => $_FILES['pic']['size'][$k],
				);
			}
			$_FILES = $pics;  // 把处理好的数组赋给$_FILES，因为uploadOne函数是到$_FILES中找图片
			$gpModel = D('goods_pic');
			// 循环每个上传
			foreach ($pics as $k => $v)
			{
				if($v['error'] == 0)
				{
					$ret = uploadOne($k, 'ProductImg', array(
						array(100, 100),
					));
					if($ret['ok'] == 1)
					{
						$gpModel->add(array(
							'pic' => $ret['images'][0],
							'mid_pic' => $ret['images'][1],
							'goods_id' => $id,
						));
					}
				}
			}
		}
		/************ 处理相册图片 *****************/	
	}
	
	protected function _before_delete($option){
		$id = $option['where']['id'];   // 要删除的产品的ID
		/************** 删除相册中的图片 ********************/
		// 先从相册表中取出相册所在硬盘的路径
		$gpModel = D('goods_pic');
		$pics = $gpModel->field('pic,mid_pic')->where(array(
			'id' => array('eq', $id),
		))->select();
		// 循环每个图片从硬盘上删除图片
		foreach ($pics as $k => $v)
			deleteImage($v);  //删除pic,sm_pic,mid_pic,big_pic四张
		// 从数据库中把记录删除
		$gpModel->where(array(
			'id' => array('eq', $id),
		))->delete();
		/*************** 删除原来的图片 *******************/
		 $oldimgsrc = $this->field('id,img')->find($id);
		deleteImage($oldimgsrc); 
	}
	
	/**
	 * 实现翻页、搜索、排序
	 */
	public function search($perPage = 20)
	{
		/*************** 搜索 ******************/
		$where = " 1 = 1 ";
		$title = trim(I('title')); // 文章标题
		$title && $where.=" and title like '%$title%' ";
		if(I('get.cat_id')){
        	$where = "cat_id=".I('get.cat_id');
        }
		$catId = I('cat_id',0);
        $catId && $where.=" and cat_id = $catId ";
		/*************** 翻页 ****************/		
		$count = $this->where($where)->count();// 取出总的记录数		
		$Page = getpage($count,$perPage); 	
		$pageString = $Page->show();		
		/************** 取某一页的数据 ***************/	
	
		$data = $this->where($where)
		->order("a.id desc")   
		->field('a.*,b.name')
		->alias('a')
		->join('JOIN __NAV__ b ON a.cat_id=b.id')
		->limit($Page->firstRow.','.$Page->listRows)
		->select();		
		/************** 返回数据 ******************/
		return array(
			'data' => $data,  // 数据
			'page' => $pageString,  // 翻页字符串
		);
	}
	/**
	 * 商品添加之后会调用这个方法，其中$data['id']就是新添加的商品的ID
	 */
	protected function _after_insert($data, $option)
	{
		
		/************ 处理相册图片 *****************/
		if(isset($_FILES['pic']))
		{
			$pics = array();
			foreach ($_FILES['pic']['name'] as $k => $v)
			{
				$pics[] = array(
					'name' => $v,
					'type' => $_FILES['pic']['type'][$k],
					'tmp_name' => $_FILES['pic']['tmp_name'][$k],
					'error' => $_FILES['pic']['error'][$k],
					'size' => $_FILES['pic']['size'][$k],
				);
			}
			$_FILES = $pics;  // 把处理好的数组赋给$_FILES，因为uploadOne函数是到$_FILES中找图片
			$gpModel = D('goods_pic');
			// 循环每个上传
			foreach ($pics as $k => $v)
			{
				if($v['error'] == 0)
				{
					$ret = uploadOne($k, 'ProductImg', array(
						array(100, 100),
					));
					if($ret['ok'] == 1)
					{
						$gpModel->add(array(
							'pic' => $ret['images'][0],
							'mid_pic' => $ret['images'][1],
							'goods_id' => $data['id'],
						));
					}
				}
			}
		}		
	}

	/**
	 * 取出一个分类下所有文章的ID
	 *
	 * @param unknown_type $catId
	 */
	public function getArticleIdByCatId($catId)
	{
		// 先取出所有子分类的ID
		$catModel = D('Admin/Category');
		$children = $catModel->getChildren($catId);
		$children[] = $catId;// 和子分类放一起
		// 取出主分类下的文章ID
		$gids = $this->field('id')->where(array('cat_id' => array('in', $children),))->select();
		if($gids)
			$gids = array_merge($gids);
		// 二维转一维并去重
		$id = array();
		foreach ($gids as $k => $v)
		{
			if(!in_array($v['id'], $id))
				$id[] = $v['id'];
		}
		return $id;
	}	
}













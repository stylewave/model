<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model 
{
	// 添加时调用create方法允许接收的字段
	protected $insertFields = 'title,description,content,contents,is_floor,orderby,cat_id,addtime,add_time,imgsrc,img,source,url,label,click';
	// 修改时调用create方法允许接收的字段
	protected $updateFields = 'id,title,description,content,contents,is_floor,orderby,cat_id,addtime,add_time,imgsrc,img,source,url,label,click';
	//定义验证规则
	protected $_validate = array(
		array('cat_id', 'require', '必须选择文章分类！', 1),
		array('title', 'require', '标题不能为空', 1),
	);
	
	/**
	 * 取出一个分类下所有文章的ID	 *
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
    // 获取树形数据
    public function getTree()
    {
        $data = $this->select();
        return $this->_getTree($data);
    }
    private function _getTree($data, $parent_id=0, $level=0)
    {
        static $_ret = array();
        foreach ($data as $k => $v)
        {
            if($v['parent_id'] == $parent_id)
            {
                $v['level'] = $level;  // 用来标记这个分类是第几级的
                $_ret[] = $v;
                // 找子分类
                $this->_getTree($data, $v['id'], $level+1);
            }
        }
        return $_ret;
    }
	/**
	 * 实现翻页、搜索、排序	 *
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
		$cat_Id = I('cat_id',0);
        $cat_Id && $where.=" and cat_id = $cat_Id ";
		/*************** 翻页 ****************/		
		$count = $this->where($where)->count();// 取出总的记录数		
		$pageObj = new \Think\Page($count, $perPage);// 生成翻页类的对象		
		$pageObj->setConfig('next', '下一页');
		$pageObj->setConfig('prev', '上一页');		
		$pageString = $pageObj->show();		
		/************** 取某一页的数据 ***************/	
	
		$data = $this->where($where)
		->order("a.id desc")
		->field('a.*,b.name')
		->alias('a')
		->join('JOIN __NAV__ b ON a.cat_id = b.id')
		->limit($pageObj->firstRow.','.$pageObj->listRows)
		->select();		
		/************** 返回数据 ******************/
		return array(
			'data' => $data,  // 数据
			'page' => $pageString,  // 翻页字符串
		);
	}
}













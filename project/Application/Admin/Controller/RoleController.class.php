<?php
/**
 * 系统权限配置，用户角色管理
 */
namespace Admin\Controller;
use Common\Controller\AdminBase;

class RoleController extends AdminBase {

    //初始化
    protected function _initialize() {
        parent::_initialize();
    }

    // 角色授权
    public function authorize() {
        if (! IS_AJAX) {
        	//角色ID
        	$roleid = intval(I("get.id"));
        	if (!$roleid) {
        		$this->error("参数错误！");
        	}
        	$menu = new \Tree();
        	$menu->icon = array('│ ', '├─ ', '└─ ');
        	$menu->nbsp = '&nbsp;&nbsp;&nbsp;';
        	$result = D('Menu')->order(array("listorder" => "ASC"))->select();
        	$newmenus=array();
        	foreach ($result as $m){
        		$newmenus[$m['id']]=$m;
        	}
        	foreach ($result as $n => $t) {
        		$result[$n]['checked'] = ($this->_is_checked($t, $roleid)) ? ' checked' : '';
        		$result[$n]['level'] = $this->_get_level($t['id'], $newmenus);
        		$result[$n]['parentid_node'] = ($t['parentid']) ? ' class="child-of-node-' . $t['parentid'] . '"' : '';
        	}
        	$str = "<tr id='node-\$id' \$parentid_node>
                       <td style='padding-left:30px;'>\$spacer<input type='checkbox' name='menuid[]' value='\$id' level='\$level' \$checked onclick='javascript:checknode(this);'> \$title</td>
	    			</tr>";
        	$menu->init($result);
        	$categorys = $menu->get_tree(0, $str);
        	$this->assign("categorys", $categorys);
        	$this->assign("roleid", $roleid);
        	$this->display();
        } else {
        	$roleid = intval(I("post.roleid"));
        	if(!$roleid){
        		$this->error("需要授权的角色不存在！");
        	}
        	$menuArray = I('menuid');
        	$menuStr = arr2str(array_values($menuArray));
        	$model = $this->_initModel();
        	$result =$model->where(array('id'=>$roleid))->save(array('rules'=>$menuStr));
        	if ($result) {
        		$this->success('授权成功', cookie('__forward__'));
        	} else {
        		$this->error($model->getError());
        	}
        }
        
    }
    
    /**
     *  检查指定菜单是否有权限
     * @param array $menu menu表中数组
     * @param int $roleid 需要检查的角色ID
     */
    private function _is_checked($menu, $roleid) { 
    	$rules = D('role')->where(array('id'=>$roleid))->getField('rules');
    	$rules = str2arr($rules);
    	if (in_array($menu['id'], $rules)) {
    		return true;
    	} else {
    		return false;
    	}	 
    }
    
    /**
     * 获取菜单深度
     * @param $id
     * @param $array
     * @param $i
     */
    protected function _get_level($id, $array = array(), $i = 0) {
    	if ($array[$id]['parentid']==0 || empty($array[$array[$id]['parentid']]) || $array[$id]['parentid']==$id){
    		return  $i;
    	}else{
    		$i++;
    		return $this->_get_level($array[$id]['parentid'],$array,$i);
    	}
    }
}
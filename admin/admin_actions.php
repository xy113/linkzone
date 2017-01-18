<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-11
 * $ID: admin_actions.php
*/ 
define("CURSCRIPT",'admin_actions');
require_once dirname(__FILE__).'/include/common.inc.php';

if ($inajax){
	//================================
	/**AJAX修改菜单排序**/
	//=================================
	if($_GET['action']=='edit_myorder'){
	    $action_id    = !empty($_GET['id'])  ? intval($_GET['id'])  : 0;
		$action_order = !empty($_GET['val']) ? intval($_GET['val']) : 0;
		$db->query("UPDATE sdw_admin_action SET action_order=$action_order WHERE action_id=$action_id");
		dexit($action_order);
	}
	//================================
	/**AJAX修改菜单名称**/
	//=================================
	if($_GET['action']=='edit_name') {
	    $action_id   = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
		$action_name = !empty($_GET['val']) ? trim($_GET['val']) : '';
		$db->query("UPDATE sdw_admin_action SET action_name='$action_name' WHERE action_id=$action_id");
		dexit($action_name);
	}
}
//================================
/**保存菜单信息**/
//=================================
if($_GET['action']=='save'){
	$action['action_id']   = !empty($_POST['action_id'])   ? intval($_POST['action_id']) : 0;
    $action['action_up']   = !empty($_POST['action_up'])   ? intval($_POST['action_up']) : 0;
    $action['action_name'] = !empty($_POST['action_name']) ? trim($_POST['action_name']) : '';
    $action['action_code'] = !empty($_POST['action_code']) ? trim($_POST['action_code']) : '';
    $action['action_link'] = !empty($_POST['action_link']) ? trim($_POST['action_link']) : '';
    
    if ($action['action_id']>0){
   
	    $update_sql = "UPDATE sdw_admin_action SET action_up='$action[action_up]',
		action_name='$action[action_name]', action_code='$action[action_code]',
		action_link='$action[action_link]' WHERE action_id=".$action['action_id'];
		 
	    if($db->query($update_sql)){
	        showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);
	    }
    }else {
    	$insert_sql = "INSERT INTO sdw_admin_action(action_up,action_name,action_code,action_link)VALUES".
	    "('$action[action_up]','$action[action_name]','$action[action_code]','$action[action_link]')";
	   
	    if($db->query($insert_sql)){
	        showmsg($LANG['save_success'],0);
	    }    	
    }
}
/**删除菜单信息**/
elseif($_GET['action']=='drop'){
    $action_id = isset($_GET['action_id']) ? intval($_GET['action_id']) : 0;
    $sql = "DELETE FROM sdw_admin_action WHERE action_id=".$action_id;
    if($db->query($sql)){
        showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
    }
}
/**获取要修改的菜单信息**/
elseif($_GET['action']=='edit'){
	$action_id = isset($_GET['action_id']) ? intval($_GET['action_id']) : 0;
	$myaction  = $db->get_one("SELECT * FROM sdw_admin_action WHERE action_id=$action_id");
	$action_up = $myaction['action_up'];
	$smarty->assign('myaction',$myaction);
}else{
	$action_up = isset($_GET['action_up']) ? intval($_GET['action_up']) : 0;
}

$smarty->assign('actions',list_action());
$smarty->assign('action_up',$action_up);
$smarty->assign('manage_title',$LANG['action_set']);
$smarty->display('admin_actions.htm');
if (!$inajax)page_end();
//======================================
//function
//======================================
function list_action(){
   global $db;
   $query = $db->query("SELECT * FROM sdw_admin_action ORDER BY action_order ASC,action_id ASC");
   while($actionrs = $db->fetch_array($query)){
	  $action[$actionrs['action_up']][] = $actionrs;
   }
   return $action;
}
?>
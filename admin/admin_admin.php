<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_admin.php
*/ 
define("CURSCRIPT",'admin_admin');
require_once dirname(__FILE__).'/include/common.inc.php';
/*
 * 检测用户名是否可用
 */
if ($_GET['action']=='checkuser'){
	$username = isset($_GET['val']) ? trim($_GET['val']) : '';
	checkname($username) ? dexit('1') : dexit('0');
}
//================================
/**保存管理员信息**/
//=================================
if($_GET['action']=='save'){
	$user['admin_id']    = !empty($_POST['admin_id'])   ? intval($_POST['admin_id']) : 0;
    $user['admin_user']  = !empty($_POST['admin_user']) ? trim($_POST['admin_user']) : showmsg($LANG['admin_user_empty'],1);
    $user['admin_pass']  = !empty($_POST['admin_pass']) ? trim($_POST['admin_pass']) : '';
    $user['admin_type']  = !empty($_POST['admin_type']) ? trim($_POST['admin_type']) : '';
    $user['admin_tel']   = !empty($_POST['admin_tel'])  ? trim($_POST['admin_tel'])  : '';
    $user['admin_email'] = !empty($_POST['admin_email'])? trim($_POST['admin_email']): '';
    $user['admin_qq']    = !empty($_POST['admin_qq'])   ? trim($_POST['admin_qq'])   : '';
    $user['admin_msn']   = !empty($_POST['admin_msn'])  ? trim($_POST['admin_msn'])  : '';
    $user['competence']  = !empty($_POST['competence']) ? implode("||",$_POST['competence']) : '';
    
    if ($user['admin_id']>0){    	
	    if (!empty($user['admin_pass'])){
	    	$user['admin_pass'] = md5($user['admin_pass']);
	    }else {
	    	if (!empty($_POST['oldpass'])){
	    		$user['admin_pass'] = trim($_POST['oldpass']);
	    	}else {
	    		showmsg($LANG['admin_pass_empty']);
	    	}
	    }
    	$update_sql = "UPDATE sdw_admin_user SET admin_pass='$user[admin_pass]',
		admin_type='$user[admin_type]',admin_tel='$user[admin_tel]',admin_email='$user[admin_email]',
		admin_qq='$user[admin_qq]',admin_msn='$user[admin_msn]', competence='$user[competence]' WHERE admin_id=".$user['admin_id'];
		   
	    if($db->query($update_sql)){
	        showmsg($LANG['edit_success'],0,'admin_admin.php');
	    }
    }else {
    	$user['admin_pass'] = !empty($user['admin_pass']) ? md5($user['admin_pass']) : showmsg($LANG['admin_pass_empty'],1);

    	if (checkuser($user['admin_user'])){
    		showmsg($LANG['admin_exists'],1);
    	}else {
	    	$insert_sql = "INSERT INTO sdw_admin_user(admin_user,admin_pass,admin_type,admin_tel,admin_email,admin_qq,admin_msn,admin_ip,lastlogin,competence)VALUES".
	    	"('$user[admin_user]','$user[admin_pass]','$user[admin_type]','$user[admin_tel]','$user[admin_email]',".
	    	"'$user[admin_qq]','$user[admin_msn]','$ip','$timestamp','$user[competence]')";
	    	
	    	$db->query($insert_sql);
	    	showmsg($LANG['save_success'],0);
    	}
    }
}

//================================
/**删除管理员信息**/
//=================================
if($_GET['action']=='drop'){
	$admin_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($admin_id)){
		$admin_id = explode(',',$admin_id);
		foreach ($admin_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_admin_user WHERE admin_id=$id");
		}
		if (!$inajax)showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
	}
}

//================================
/**获取要修改的管理员信息**/
//=================================
if($_GET['action']=='edit'){
	$admin_id = isset($_GET['admin_id']) ? intval($_GET['admin_id']) : 0;
	$user = $db->get_one("SELECT * FROM sdw_admin_user WHERE admin_id=$admin_id");
	if ($user){
		$smarty->assign('myactions',list_myactions(explode('||',$user['competence']),$user['admin_type']));
		$smarty->assign('admin_user',$user);
	}else{
		showmsg($LANG['admin_notexists'],1);
	}
}elseif ($_GET['action']=='addnew'){
	$smarty->assign('myactions',list_myactions());
	
}elseif($_GET['action']=='list' || $inajax){
	$admin_users = array();
	$pagesize = 20;
	$page  = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page  = $page<1 ? 1 : $page;
	$count = $db->get_rows("SELECT * FROM sdw_admin_user");
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page > $pagecount ? $pagecount : $page;
	$start_limit = ($page-1)*$pagesize;
    $query = $db->query("SELECT admin_id,admin_user,admin_type,admin_tel,admin_email,admin_qq,admin_msn,admin_ip,lastlogin,logintimes FROM sdw_admin_user ORDER BY admin_id ASC");
    while($userrs = $db->fetch_array($query)){
	    $admin_users[] = $userrs;
   }
   $smarty->assign('pagelink',page_ajax($page,$pagecount));
   $smarty->assign('admin_users',$admin_users);
}
$smarty->assign('manage_title',$LANG['admin_manage']);
$smarty->display('admin_admin.htm');
if (!$inajax)page_end();
//======================================
//function
//========================================
function list_myactions($cp=array(),$admin_type=0){
    global $db;
    $actions = array();
    $query = $db->query("SELECT action_id,action_name,action_up FROM sdw_admin_action ORDER BY action_order ASC,action_id ASC");
    while($actionrs = $db->fetch_array($query)){   	
	    $actionrs['checked'] = in_array($actionrs['action_id'],$cp) || $admin_type==0 ? ' checked="checked"' : '';
	    $actions[$actionrs['action_up']][] = $actionrs;
    }
    return $actions;
}

function checkuser($username=''){
	global $db;
	if (!empty($username)){
		$userinfo = $db->get_one("SELECT admin_user FROM sdw_admin_user WHERE admin_user='$username'");
		return !empty($userinfo);
	}else {
		return false;
	}
}
?>
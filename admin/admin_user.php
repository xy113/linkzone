<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-09-09
 * $ID: admin_user.php
*/ 

define("CURSCRIPT",'admin_user');
require_once dirname(__FILE__).'/include/common.inc.php';
//==================================
/**AJAX修改电子邮件信息**/
//==================================
if($_GET['action']=='edit_email'){
    $uid = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $email = isset($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_user SET email='$email' WHERE uid=$uid");
    dexit($email);
}

//==================================
/**保存用户信息**/
//==================================
if($_GET['action']=='save'){
    $user['uid'] = !empty($_POST['uid']) ? intval($_POST['uid']) : 0;
    $user['username'] = !empty($_POST['username']) ? trim($_POST['username']) : '';
    $user['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
    $user['email'] = !empty($_POST['email']) ? trim($_POST['user_email']) : '';
    $user['groupid'] = !empty($_POST['groupid']) ? intval($_POST['groupid']) : 0;
    $user['sex'] = !empty($_POST['sex']) ? intval($_POST['sex']) : 1;
    
    if ($user['uid']>0){
    	if (empty($user['password'])){
    		$user['password'] = !empty($_POST['oldpass']) ? trim($_POST['oldpass']) : '';
    	}
    	
    	if (!empty($user['password'])){
    		$user['password'] = md5($user['password']);
    	}else {
    		showmsg($LANG['user_pass_empty'],1);
    	}
    	
	    $update_sql = "UPDATE sdw_user SET username='$user[username]', password='$user[password]',email='$user[email]',
	    groupid='$user[groupid]',sex='$user[sex]', WHERE uid=".$user['uid'];
	   
	    if($db->query($update_sql)){
	        showmsg($LANG['edit_success'],0,'?');
	    }
    }else {
    	if (empty($user['username'])){
    		showmsg($LANG['user_name_empty'],1);
    	}
    	
    	if (checkuser($user['username'])){
    		showmsg($LANG['user_exists'],1);
    	}
    	
    	if (empty($user['password'])){
    		showmsg($LANG['user_pass_empty'],1);
    	}else {
    		$user['password'] = md5($user['password']);
    	}
    	
        $insert_sql = "INSERT INTO sdw_user(username,password,email,groupid,sex,lastlogin,lastip)VALUES".
	    "('$user[username]','$user[password]','$user[email]','$user[groupid]','$user[sex]','$timestamp','$ip')";
	   
	    $db->query($insert_sql);
	    if (!$inajax)showmsg($LANG['save_success'],0); 	
    }
}
//==================================
/**删除用户信息**/
//==================================
if($_GET['action']=='drop'){
	$uid = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($uid)){
		$uid = explode(',',$uid);
		foreach ($uid as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_user WHERE uid=$id");
		}
		if ($inajax){
			showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}
//==================================
/**获取要修改的用户信息**/
//==================================
if($_GET['action']=='edit'){
	$uid = isset($_GET['uid']) ? intval($_GET['uid']) : 0;
    $user = $db->get_one("SELECT * FROM sdw_user WHERE uid=$uid");
    if ($user){
	    $smarty->assign('user',$user);
    }else {
    	showmsg($LANG['user_notexists'],1);
    }
}

if($_GET['action']=='list' || $inajax){
	$users = array();
	$pagesize = 20;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page = $page<1 ? 1 : $page;
	$count = $db->get_rows("SELECT * FROM sdw_user");
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;
	$start_limit = ($page-1)*$pagesize;
	$query = $db->query("SELECT u.*,g.groupname FROM sdw_user u LEFT JOIN sdw_usergroups g ON u.groupid=g.groupid ORDER BY u.uid DESC LIMIT $start_limit,$pagesize");
	while($userrs = $db->fetch_array($query)){
	   $users[] = $userrs;
	}
	$smarty->assign('page',$page);
	$smarty->assign('users',$users);
	$smarty->assign('pagelink',page_ajax($page,$pagecount));
}

$smarty->assign('groups',get_usergroups());
$smarty->assign('manage_title',$LANG['user_manage']);
$smarty->display('admin_user.htm');
if ($inajax)page_end();
//==================================
/**function**/
//==================================
function get_usergroups(){
   global $db;
   $groups = array();
   $query = $db->query("SELECT * FROM sdw_usergroups ORDER BY groupid ASC");
   while($grouprs = $db->fetch_array($query)){
      $groups[] = $grouprs;
   }
   return $groups;
}
?>
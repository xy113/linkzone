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
 * $ID: admin_user_group.php
*/ 
define("CURSCRIPT",'admin_user_group');
require_once dirname(__FILE__).'/include/common.inc.php';
//===================================
/**AJAX修改用户组名称**/
//===================================
if($_GET['action']=='edit_name'){
    $groupid = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $groupname = isset($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_usergroups SET groupname='$groupname' WHERE groupid=$groupid");
    dexit($groupname);
}
//===================================
/**AJAX修改用户组积分下限**/
//===================================
if($_GET['action']=='edit_min'){
    $groupid = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $minexp = isset($_GET['val']) ? intval($_GET['val']) : '';
    $db->query("UPDATE sdw_usergroups SET minexp='$minexp' WHERE groupid=$groupid");
    dexit($minexp);
}
//===================================
/**AJAX修改用户组积分上限**/
//===================================
if($_GET['action']=='edit_max'){
    $groupid = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $maxexp = isset($_GET['val']) ? intval($_GET['val']) : '';
    $db->query("UPDATE sdw_usergroups SET maxexp='$maxexp' WHERE groupid=$groupid");
    dexit($maxexp);
}
//===================================
/**AJAX修改用户组特殊组**/
//===================================
if($_GET['action']=='edit_type'){
    $group_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $groupinfo = $db->get_one("SELECT type FROM sdw_usergroups WHERE groupid=$groupid");
    $type = $groupinfo['type']==1 ? 0 : 1;
    $db->query("UPDATE sdw_usergroups SET type='$type' WHERE groupid=$groupid");
    dexit($type);;
}
//===================================
/**AJAX修改用户组备注**/
//===================================
if($_GET['action']=='edit_desc'){
    $groupid = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
    $notes = !empty($_GET['val']) ? addslashes(trim($_GET['val'])) : '';
    $db->query("UPDATE sdw_usergroups SET notes='$notes' WHERE groupid=$groupid");
    dexit($notes);
}

//===================================
/**保存用户组信息**/
//===================================
if($_GET['action']=='save'){
    $group['groupid'] = !empty($_POST['groupid']) ? intval($_POST['groupid']) : 0;
    $group['groupname'] = !empty($_POST['groupname']) ? trim($_POST['groupname']) : '';
    $group['minexp'] = !empty($_POST['minexp']) ? intval($_POST['minexp']) : 0;
    $group['maxexp'] = !empty($_POST['maxexp']) ? intval($_POST['maxexp']) : 0;
    $group['type'] = !empty($_POST['type']) ? intval($_POST['type']) : 0;
    $group['notes'] = !empty($_POST['notes']) ? trim($_POST['notes']) : '';
   
    if (empty($group['groupname'])){
    	showmsg($LANG['group_name_empty'],1);
    }
    
    if ($group['groupid']>0){
	    $update_sql = "UPDATE sdw_usergroups SET groupname='$group[groupname]', minexp='$group[minexp]',
	    maxexp='$group[maxexp]', type='$group[type]',notes='$group[notes]' WHERE groupid=".$group['groupid'];
	    
	    $db->query($update_sql);
	    if ($inajax)showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);
    }else {
        $insert_sql = "INSERT INTO sdw_usergroups(groupname,minexp,maxexp,type,notes)VALUES".
	    "('$group[groupname]','$group[minexp]','$group[maxexp]','$group[type]','$group[notes]')";
	    
        $db->query($insert_sql);
        if ($inajax)showmsg($LANG['save_success'],0,$_SERVER['HTTP_REFERER']); 	
    }
}
//===================================
/**删除用户组信息**/
//===================================
if($_GET['action']=='drop'){
	$groupid = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($groupid)){
		$groupid = explode(',',$groupid);
		foreach ($groupid as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_usergroups WHERE groupid=$id");
		}
		if ($inajax)showmsg($LANG['delete_success'],0);
	}
}
//===================================
/**获取要修改的用户组信息**/
//===================================
if($_GET['action']=='edit'){
	$groupid = isset($_GET['groupid']) ? intval($_GET['groupid']) : 0;
	$group = $db->get_one("SELECT * FROM sdw_usergroups WHERE groupid=$groupid");
	if ($group){
		$smarty->assign('group',$group);
	}else {
		showmsg($LANG['group_notexists'],1);
	}
}

//===================================
/**用户组列表**/
//===================================
if($_GET['action']=='list' || $inajax){
	$groups = array();
	$query = $db->query("SELECT * FROM sdw_usergroups ORDER BY minexp ASC");
	while($grouprs = $db->fetch_array($query)){
	    $groups[] = $grouprs;
	}
	$smarty->assign('groups',$groups);
}

$smarty->assign('manage_title',$LANG['group_manage']);
$smarty->display('admin_user_group.htm');
if ($inajax)page_end();
?>
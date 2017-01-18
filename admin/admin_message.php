<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 	WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_message.php
*/ 
define("CURSCRIPT",'admin_message');
require_once dirname(__FILE__).'/include/common.inc.php';

if($inajax && $_GET['action']=='edit_title'){
    $id    = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
	$title = !empty($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_admin_message SET title='$title' WHERE id=$id");
	dexit($title);
}
//================================
/**保存信息**/
//=================================
if($_GET['action']=='save'){
	$msg['id']      = !empty($_POST['id'])      ? intval($_POST['id']) : 0;
    $msg['send_id'] = !empty($_POST['send_id']) ? intval($_POST['send_id']) : 0;
    $msg['title']   = !empty($_POST['title'])   ? addslashes(trim($_POST['title'])) : '';
    $msg['message'] = !empty($_POST['message']) ? addslashes(trim($_POST['message'])) : '';
    if ($msg['id']>0){
	    $update_sql = "UPDATE sdw_admin_message SET title='$msg[title]',message='$msg[message]' WHERE id=".$msg['id'];
	    $db->query($update_sql);
	    if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);
    }else {
	    $insert_sql = "INSERT INTO sdw_admin_message(send_id,send_time,title,message)VALUES".
	    "('$msg[send_id]','$timestamp','$msg[title]','$msg[message]')";
	    $db->query($insert_sql);
	    if (!$inajax)showmsg($LANG['save_success'],0,$_SERVER['HTTP_REFERER']);
    }
}

//================================
/**删除信息**/
//=================================
if($_GET['action']=='drop'){
	$msg_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($msg_id)){
		$msg_id = explode(',',$msg_id);
		foreach ($msg_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_message WHERE id=$id");
		}
	}
	if (!$inajax)showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
}
//================================
/**获取要修改的信息**/
//=================================
if($_GET['action']=='edit'){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$msg = $db->get_one("SELECT * FROM sdw_admin_message WHERE id=$id");
	if ($msg){
		$smarty->assign('msg',$msg);
	}else {
		showmsg($LANG['msg_notexists'],1,$_SERVER['PHP_SELF']);
	}   
}

//================================
/**消息列表**/
//=================================
if($_GET['action']=='list' || $inajax){
	$message = array();
	$pagesize = 20;
    $page   = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $page   = $page<1 ? 1 : $page;
    $count  = $db->get_rows("SELECT * FROM sdw_admin_message");
    $pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
    $page = $page>$pagecount ? $pagecount : $page;
    $start_limit = ($page-1)*$pagesize;
    $query = $db->query("SELECT m.id,m.send_time,m.title,m.message,u.admin_user FROM sdw_admin_message m LEFT JOIN sdw_admin_user u ON u.admin_id=m.send_id ORDER BY m.id DESC LIMIT $start_limit,$pagesize");
    while($msgrs = $db->fetch_array($query)){
        $message[] = $msgrs;
    }
    $smarty->assign('page',$page);
    $smarty->assign('message',$message);
    $smarty->assign('pagelink',page_ajax($page,$pagecount));
}

$smarty->assign('manage_title',$LANG['message_manage']);
$smarty->display('admin_message.htm');
page_end();
?>
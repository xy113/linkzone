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
 * $ID: admin_log.php
*/ 
define("CURSCRIPT",'admin_log');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**删除日志**/
//=================================
if($_GET['action']=='drop'){
	$log_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($log_id)){
		$log_id = explode(',',$log_id);
		foreach ($log_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_admin_log WHERE log_id=$id");
		}
		if (!$inajax)showmsg($LANG['delete_success'],0);
	}
}

//================================
/**清空日志**/
//=================================
if($_GET['action']=='clear_all'){
    $db->query("DELETE FROM sdw_admin_log");
    if (!$inajax)showmsg($LANG['delete_success'],0);
}

//================================
/**日志列表**/
//=================================
if ($_GET['action'] == 'list' || $inajax){
	$logs = array();
	$pagesize = 30;
	$page  = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page  = $page<1 ? 1 : $page;	
	$count = $db->get_rows("SELECT log_id FROM sdw_admin_log");
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;
	$start_limit = ($page-1)*$pagesize;
	$query = $db->query("SELECT * FROM sdw_admin_log ORDER BY log_id DESC LIMIT $start_limit,$pagesize");
	while($logrs = $db->fetch_array($query)){
	  $logs[]=$logrs;
	}
	$smarty->assign('page',$page);
	$smarty->assign('pagelink',page_ajax($page,$pagecount));
	$smarty->assign('logs',$logs);
}

$smarty->assign('manage_title',$LANG['log_manage']);
$smarty->display('admin_log.htm');
if(!$inajax)page_end();
?>
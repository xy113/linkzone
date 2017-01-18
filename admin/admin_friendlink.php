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
 * $ID: admin_friendlink.php
*/ 
define("CURSCRIPT",'admin_friendlink');
require_once dirname(__FILE__).'/include/common.inc.php';
/***AJAX部分***/
if($inajax && $_GET['action']=='edit_name'){
    $link_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$link_name = isset($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_friendlink SET link_name='$link_name' WHERE link_id=$link_id");
	dexit($link_name);
}

if($inajax && $_GET['action']=='edit_info'){
    $link_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$link_info = isset($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_friendlink SET link_info='$link_info' WHERE link_id=$link_id");
	dexit($link_info);
}

if($inajax && $_GET['action']=='edit_order'){
    $link_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$link_order = isset($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_friendlink SET link_order='$link_order' WHERE link_id=$link_id");
	dexit($link_order);
}

if($inajax && $_GET['action']=='edit_url'){
    $link_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$link_url = isset($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_friendlink SET link_url='$link_url' WHERE link_id=$link_id");
	dexit($link_url);
}

if($inajax && $_GET['action']=='edit_show'){
    $link_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$linkinfo = $db->get_one("SELECT link_show FROM sdw_friendlink WHERE link_id=$link_id");
	$link_show = $linkinfo['link_show']==1 ? 0 : 1;
	$db->query("UPDATE sdw_friendlink SET link_show='$link_show' WHERE link_id=$link_id");
	dexit($link_show);
}
/****AJAX部分结束**/
//================================
/**保存链接信息**/
//=================================
if($_GET['action']=='save'){
	$link['link_id']    = !empty($_POST['link_id'])   ? intval($_POST['link_id']) : 0;
    $link['link_name']  = !empty($_POST['link_name']) ? trim($_POST['link_name']) : '';
    $link['link_url']   = !empty($_POST['link_url'])  ? trim($_POST['link_url'])  : '';
    $link['link_logo']  = !empty($_POST['link_logo']) ? trim($_POST['link_logo']) : '';
    $link['link_order'] = !empty($_POST['link_order'])? intval($_POST['link_order']) : 100;
    $link['link_show']  = !empty($_POST['link_show']) ? intval($_POST['link_show'])  : 0;
    $link['link_info']  = !empty($_POST['link_info']) ? trim($_POST['link_info']) : '';
    
    if ($link['link_id']>0){
	    $update_sql = "UPDATE sdw_friendlink SET link_name='$link[link_name]', 
	    link_url='$link[link_url]',link_logo='$link[link_logo]', link_order='$link[link_order]', 
	    link_show='$link[link_show]',link_info='$link[link_info]' WHERE link_id=".$link['link_id'];
	   
	    if($db->query($update_sql)){
	   	    if ($islog)writelog($LANG['edit_link'].':'.$link['link_name']);
	        showmsg($LANG['save_success'],0,$_SERVER['PHP_SELF']);
	    }
    }else {
	    $insert_sql = "INSERT INTO sdw_friendlink(link_name,link_url,link_logo,link_order,link_show,link_info)VALUES".
	    "('$link[link_name]','$link[link_url]','$link[link_logo]','$link[link_order]','$link[link_show]','$link[link_info]')";
	    
	    if($db->query($insert_sql)){
	   	    if ($islog)writelog($LANG['add_link'].':'.$link['link_name']);
	        showmsg($LANG['save_success'],0);
	    }
    }
}

//================================
/**删除链接信息**/
//=================================
if($_GET['action']=='drop'){
    $link_id = isset($_GET['id'])? trim($_GET['id']) : '';
    if (!empty($link_id)){
    	$link_id = explode(',',$link_id);
    	foreach ($link_id as $id){
    		$id = intval($id);
    		$linkinfo = $db->get_one("SELECT link_name FROM sdw_friendlink WHERE link_id=$id");
    		if ($linkinfo){
    			$db->query("DELETE FROM sdw_friendlink WHERE link_id=$id");
    			if ($islog)writelog($LANG['drop_link'].':'.$linkinfo['link_name']);
    		}
    	}
    }
    if (!$inajax)showmsg($LANG['delete_success'],0);
}
//================================
/**获取要修改的链接信息**/
//=================================
if($_GET['action']=='edit'){
	$link_id = isset($_GET['link_id']) ? intval($_GET['link_id']) : 0;
	$linkinfo = $db->get_one("SELECT * FROM sdw_friendlink WHERE link_id=$link_id");
	if (!empty($linkinfo)){
		$smarty->assign('flink',$linkinfo);
	}else {
		showmsg($LANG['link_notexists'],1);
	}
   
}

//================================
/**链接列表**/
//=================================
if($_GET['action']=='list' || $inajax){
	$friendlinks = array();
    $pagesize = 30;
    $page  = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $page = $page<1 ? 1 : $page;
    $count = $db->get_rows("SELECT * FROM sdw_friendlink");
    $pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
    $page = $page>$pagecount ? $pagecount : $page;
    $start_limit = ($page-1)*$pagesize;
   
    $query = $db->query("SELECT * FROM sdw_friendlink ORDER BY link_order ASC,link_id ASC LIMIT $start_limit,$pagesize");
    while($linkrs = $db->fetch_array($query)){
        $friendlinks[] = $linkrs;
    }
    $smarty->assign('friendlinks',$friendlinks);
    $smarty->assign('page',$page);
    $smarty->assign('pagelink',page_ajax($page,$pagecount));
}

$smarty->assign('manage_title',$LANG['link_manage']);
$smarty->display('admin_friendlink.htm');
if (!$inajax)page_end();
?>
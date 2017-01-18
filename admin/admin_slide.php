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
 * $ID: admin_slide.php
*/ 
define("CURSCRIPT",'admin_slide');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**AJAX修改标题**/
//=================================
if($inajax && $_GET['action']=='edit_title'){
    $flash_id    = !empty($_GET['id'])  ? intval($_GET['id']) : 1;
    $flash_title = !empty($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_slide SET flash_title='$flash_title' WHERE flash_id=$flash_id");
    dexit($flash_title);
}
/*
 * ===================================
 * AJAX修改说明文字
 * ===================================
 */
if ($inajax && $_GET['action']=='edit_desc'){
    $flash_id   = !empty($_GET['id'])  ? intval($_GET['id']) : 1;
    $flash_desc = !empty($_GET['val']) ? addslashes(trim($_GET['val'])) : '';
    $db->query("UPDATE sdw_slide SET flash_desc='$flash_desc' WHERE flash_id=$flash_id");
    dexit($flash_desc);
}

//================================
/**保存信息**/
//=================================
if($_GET['action']=='save'){
	$flash['flash_id']    = !empty($_POST['flash_id'])    ? intval($_POST['flash_id']) : 0;
    $flash['flash_title'] = !empty($_POST['flash_title']) ? trim($_POST['flash_title']) : '';
    $flash['flash_link']  = !empty($_POST['flash_link'])  ? trim($_POST['flash_link'])  : '';
    $flash['flash_desc']  = !empty($_POST['flash_desc'])  ? trim($_POST['flash_desc'])  : '';
    $flash['flash_pic']   = !empty($_POST['flash_pic'])   ? trim($_POST['flash_pic'])   : '';
    
    if ($flash['flash_id']>0){
	    $update_sql = "UPDATE sdw_slide SET flash_title='$flash[flash_title]',
	    flash_pic='$flash[flash_pic]',flash_link='$flash[flash_link]',
		flash_desc='$flash[flash_desc]'  WHERE flash_id=".$flash['flash_id'];
	    if($db->query($update_sql)){
	        showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);
	    }
    }else {
	    $insert_sql = "INSERT INTO sdw_slide(flash_title,flash_pic,flash_link,flash_desc,flash_time)VALUES".
	    "('$flash[flash_title]','$flash[flash_pic]','$flash[flash_link]','$flash[flash_desc]','$timestamp')";
	    
	    if($db->query($insert_sql)){
	        showmsg($LANG['save_success'],0);
	    }
    }  
}

//================================
/**删除信息**/
//=================================
if($_GET['action']=='drop'){
	$flash_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($flash_id)){
		$flash_id = explode(',',$flash_id);
		foreach ($flash_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_slide WHERE flash_id=$id");
		}
	}
	if (!$inajax)showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
 }

//================================
/**获取要修改的标题信息**/
//=================================
if($_GET['action']=='edit'){
	$flash_id = isset($_GET['flash_id']) ? intval($_GET['flash_id']) : 0;
	$slideinfo = $db->get_one("SELECT * FROM sdw_slide WHERE flash_id=".$flash_id);
	if ($slideinfo){
		$smarty->assign('flash',$slideinfo);
	}else {
		showmsg($LANG['article_notexists'],1);
	}
}

//================================
/**文章标题列表**/
//=================================
if($_GET['action']=='list' || $inajax){
	$flashes = array();
	$pagesize = 20;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page = $page<1 ? 1 : $page;
    $count  = $db->get_rows("SELECT * FROM sdw_slide");
    $pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
    $page = $page>$pagecount ? $pagecount : $page;
    $start_limit = ($page-1)*$pagesize;
    $query  = $db->query("SELECT * FROM sdw_slide ORDER BY flash_id DESC LIMIT $start_limit,$pagesize");
    while($sliders = $db->fetch_array($query)){
        $flashes[] = $sliders;
    }
    $smarty->assign('page',$page);
    $smarty->assign('flashes',$flashes);
    $smarty->assign('pagelink',page_ajax($page,$pagecount));
}

$smarty->assign('manage_title',$LANG['flash_manage']);
$smarty->display('admin_slide.htm');
page_end();
?>
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
 * $ID: admin_image.php
*/ 
define("CURSCRIPT",'admin_image');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**AJAX修改图片标题**/
//=================================
if($_GET['action']=='edit_title'){
    $id = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
    $title = !empty($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_image SET title='$title' WHERE id=$id");
    dexit($title);
}
//================================
/**AJAX修改图片推荐**/
//=================================
if($_GET['action']=='toggle_recommend'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $imageinfo = $db->get_one("SELECT recommend FROM sdw_image WHERE id=$id");
    $recommend = intval($imageinfo['recommend'])==1 ? 0 :1;
    $db->query("UPDATE sdw_image SET recommend=$recommend WHERE id=$id");
    dexit($recommend);
}

if($_GET['action']=='toggle_audited'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $imageinfo = $db->get_one("SELECT audited FROM sdw_image WHERE id=$id");
    $audited = intval($imageinfo['audited'])==1 ? 0 :1;
    $db->query("UPDATE sdw_image SET audited=$audited WHERE id=$id");
    dexit($audited);
}

/*
 * 检测标题
 */
if ($_GET['action']=='checktitle'){
	$title = isset($_GET['val']) ? trim($_GET['val']) : '';
	if (checktitle($title)){
		dexit('1');
	}else {
		dexit('0');
	}
}
//================================
/**保存图片信息**/
//=================================
if($_GET['action']=='save'){
	require_once ADMIN_PATH.'/include/image.inc.php';    
}
//================================
/**删除图片信息**/
//=================================
if($_GET['action']=='drop'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($image_id)){
		$image_id = explode(',',$image_id);
		foreach ($image_id as $id){
			$id = intval($id);
			$imageinfo = $db->get_one("SELECT title FROM sdw_image WHERE id=$id");
			if ($imageinfo){
				$db->query("DELETE FROM sdw_image WHERE id=$id");
			}else {
				continue;
			}
		}
	}
    if (!$inajax)showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
}

//================================
/**图片推荐**/
//=================================
if($_GET['action']=='recommend'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($image_id)){
		$image_id = explode(',',$image_id);
		foreach ($image_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_image SET recommend=1 WHERE id=$id");
		}
	}
    if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
}
//================================
/**取消推荐**/
//=================================
if($_GET['action']=='unrecommend'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($image_id)){
		$image_id = explode(',',$image_id);
		foreach ($image_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_image SET recommend=0 WHERE id=$id");
		}
	}
    if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
}

//================================
/**批量移除到回收站**/
//=================================
if($_GET['action']=='remove'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($image_id)){
		$image_id = explode(',',$image_id);
		foreach ($image_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_image SET status=-1 WHERE id=$id");
		}
	}
    if (!$inajax)showmsg($LANG['remove_success'],0,$_SERVER['HTTP_REFERER']);
}

//================================
/**批量还原图片**/
//=================================
if($_GET['action']=='restore'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($image_id)){
		$image_id = explode(',',$image_id);
		foreach ($image_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_image SET status=0 WHERE id=$id");
		}
	}
    if (!$inajax)showmsg($LANG['restore_success'],0,$_SERVER['HTTP_REFERER']);
}

//================================
/**审核**/
//=================================
if($_GET['action']=='audited'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($image_id)){
		$image_id = explode(',',$image_id);
		foreach ($image_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_image SET audited=1 WHERE id=$id");
		}
	}
    if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
}

//================================
/**取消审核**/
//=================================
if($_GET['action']=='unaudited'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($image_id)){
		$image_id = explode(',',$image_id);
		foreach ($image_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_image SET audited=0 WHERE id=$id");
		}
	}
    if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
}

//================================
/**批量移动图片**/
//=================================
if($_GET['action']=='move'){
	$image_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	if ($cid>0){
		if (!empty($image_id)){
			$image_id = explode(',',$image_id);
			foreach ($image_id as $id){
				$id = intval($id);
				$db->query("UPDATE sdw_image SET cid=$cid WHERE id=$id");
			}
		}
	}
    if (!$inajax)showmsg($LANG['remove_success'],0,$_SERVER['PHP_SELF']."?cid=$cid");
}
//================================
/**获取要修改的图片信息**/
//=================================
if($_GET['action']=='edit'){
   $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
   $image = $db->get_one("SELECT * FROM sdw_image WHERE id=$id");   
   if ($image){	   
	   $cid = intval($image['cid']); 
	   $smarty->assign('image',$image); 	
   }else{
   	   showmsg($LANG['image_notexists'],0);
   }
}

//================================
/**图组列表**/
//=================================
if($_GET['action']=='list' || $inajax){
	$images = array();
	$cid = $q = $t = $ob = $page = $orderby = $ordersort = '';
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$t  = isset($_GET['t']) ? trim($_GET['t']) : '';		
	$q  = isset($_GET['q']) ? addslashes(trim($_GET['q'])) : '';
	$ob = isset($_GET['ob']) ? trim($_GET['ob']) : '';
	$status = isset($_GET['status']) ? intval($_GET['status']) : 0;
    if (!empty($ob)){
    	$_SESSION['obs'] = $ob;
    }else {
    	$ob = isset($_SESSION['obs']) ? $_SESSION['obs'] : '';
    }

	switch($ob){
		case 'views':
		$orderby = 'i.views'	;
		break;
		case 'time' :
		$orderby = 'i.dateline';
		break;
		default:$orderby = 'i.id';
		break;
	}
	
	if (isset($_GET['os'])){
		$ordersort = trim($_GET['os']);
		$_SESSION['oss'] = $ordersort;
	}else {
		$ordersort = isset($_SESSION['oss']) ? $_SESSION['oss'] : 'DESC';
		if ($_GET['action']=='sort'){			
			$ordersort = $ordersort == 'ASC' ? 'DESC' : 'ASC';
			$_SESSION['oss'] = $ordersort;			
		}
	}	
	$ordersort = ($ordersort == 'ASC' || $ordersort == 'DESC') ? $ordersort : 'DESC';
	
	$wheresql = $cid>0 ? "  AND (c.cid=$cid OR c.cup=$cid) " : "";
	$wheresql.= $t == 'unaudited' ? " AND i.audited=0 " : '';
	$wheresql.= $t == 'recommend' ? " AND i.recommend=1 " : '';
	$wheresql.= $t == 'myimg' ? "AND i.authorid=".intval($_SESSION['admin_id']) : '';
	$wheresql.= $q != '' ? " AND i.title LIKE '%".$q."%'" : '';
	$count = $db->get_rows("SELECT i.title FROM sdw_image i LEFT JOIN sdw_image_cat c ON c.cid=i.cid WHERE i.status=$status $wheresql");
	
	$pagesize = 20;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page = $page<1 ? 1 : $page;  
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page; 
	$start_limit = ($page-1)*$pagesize;
    $sql = "SELECT i.* FROM sdw_image i LEFT JOIN sdw_image_cat c ON c.cid=i.cid WHERE i.status=$status $wheresql ORDER BY $orderby $ordersort LIMIT $start_limit,$pagesize";
    $query = $db->query($sql);
    while($imagers = $db->fetch_array($query)){
    	$imagers['imgurl'] = '../views.php?id='.$imagers['id'];
        $images[] = $imagers;
    }
    
    $curl = "cid=$cid&status=$status&t=$t&ob=$ob&q=$q";
    $smarty->assign('page',$page);
    $smarty->assign('curl',$curl);
    $smarty->assign('records',$count);
    $smarty->assign('pagelink',page_ajax($page,$pagecount,$curl));
    $smarty->assign('images',$images);
}

if($_GET['action']=='addnew'){
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0; 
}
$smarty->assign('cid',$cid);
$smarty->assign('category',get_image_category($cid));
$smarty->assign('manage_title',$LANG['image_manage']);
$smarty->display('admin_image.htm');
if (!$inajax)page_end();
//=============================================
//function
//==============================================
function checktitle($title){
	global $db;
	if (!empty($title)){
		$imageinfo = $db->get_one("SELECT title FROM sdw_image WHERE title='$title'");
		return !empty($imageinfo);
	}else {
		return false;
	}
}
?>
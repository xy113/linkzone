<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_video.php
*/ 
define("CURSCRIPT",'admin_video');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**AJAX修改视频标题**/
//=================================
if($_GET['action']=='edit_title'){ 
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$title = !empty($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_video SET title='$title' WHERE id=$id");
	dexit($title);
}
//================================
/**AJAX修改视频推荐**/
//=================================
if($_GET['action']=='toggle_recommend'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$videoinfo = $db->get_one("SELECT recommend FROM sdw_video WHERE id=$id");
	$recommend = intval($videoinfo['recommend'])==1 ? 0 : 1;
	$db->query("UPDATE sdw_video SET recommend=$recommend WHERE id=$id");
	dexit($recommend);
}

/*
 * 审核主题
 */
if ($_GET['action'] == 'toggle_audited'){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$videoinfo = $db->get_one("SELECT audited FROM sdw_video WHERE id=$id");
	$audited = $videoinfo['audited'] == 1 ? 0 : 1;
	$db->query("UPDATE sdw_video SET audited=$audited WHERE id=$id");
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
/**保存视频信息**/
//=================================
if($_GET['action']=='save'){
	require_once ADMIN_PATH.'/include/video.inc.php';  
}

//================================
/**删除视频信息**/
//=================================
if($_GET['action']=='drop'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($video_id)){
		$video_id = explode(',',$video_id);
		foreach ($video_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_video WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

//================================
/**视频推荐**/
//=================================
if($_GET['action']=='recommend'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($video_id)){
		$video_id = explode(',',$video_id);
		foreach ($video_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_video SET recommend=1 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

//================================
/**取消推荐**/
//=================================
if($_GET['action']=='unrecommend'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($video_id)){
		$video_id = explode(',',$video_id);
		foreach ($video_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_video SET recommend=0 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

//================================
/**移动视频**/
//=================================
if($_GET['action']=='move'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	if ($cat_id>0){
		if (!empty($video_id)){
			$video_id = explode(',',$video_id);
			foreach ($video_id as $id){
				$id = intval($id);
				$db->query("UPDATE sdw_video SET cid=$cid WHERE id=$id");
			}
			if (!$inajax){
				showmsg($LANG['move_success'],0,$_SERVER['PHP_SELF'].'?cid='.$cid);
			}
		}    
	}
}
//================================
/**移除到回收站**/
//=================================
if($_GET['action']=='remove'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($video_id)){
		$video_id = explode(',',$video_id);
		foreach ($video_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_video SET status=-1 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['remove_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}
//================================
/**从回收站还原**/
//=================================
if($_GET['action']=='restore'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($video_id)){
		$video_id = explode(',',$video_id);
		foreach ($video_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_video SET status=0 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['remove_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

/*
 * 审核视频
 */
if ($_GET['action']=='audited'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($video_id)){
		$video_id = explode(',',$video_id);
		foreach ($video_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_video SET audited=1 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['remove_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}	
}

/*
 * 取消审核视频
 */
if ($_GET['action']=='unaudited'){
	$video_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($video_id)){
		$video_id = explode(',',$video_id);
		foreach ($video_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_video SET audited=0 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['remove_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}	
}

//================================
/**获取要修改的视频信息**/
//=================================
if($_GET['action']=='edit'){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $video = $db->get_one("SELECT * FROM sdw_video WHERE id=$id");
    if ($video){   
	    $cid = intval($video['cid']);
	    $smarty->assign('video',$video);
    }else {
    	if (!$inajax)showmsg($LANG['video_notexists'],1);
    }
}

if($_GET['action']=='list' || $inajax){
	$videos = array();
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
		$orderby = 'v.views'	;
		break;
		case 'time' :
		$orderby = 'v.dateline';
		break;
		default:$orderby = 'v.id';
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
	$wheresql.= $t == 'unaudited' ? " AND v.audited=0 " : '';
	$wheresql.= $t == 'recommend' ? " AND v.recommend=1 " : '';
	$wheresql.= $t == 'myvod' ? "AND v.authorid=".intval($_SESSION['admin_id']) : '';
	$wheresql.= $q != '' ? " AND v.title LIKE '%".$q."%'" : '';
    $count = $db->get_rows("SELECT v.title FROM sdw_video v LEFT JOIN sdw_video_cat c ON c.cid=v.cid WHERE v.status=$status $wheresql");
    
    $pagesize = 20;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $page = $page<1 ? 1 : $page;
    $pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
    $page = $page>$pagecount ? $pagecount : $page;
    $start_limit = ($page-1)*$pagesize;
    $sql = "SELECT v.id,v.title,v.dateline,v.views,v.comments,v.recommend,v.audited,v.status,c.cid,c.name FROM sdw_video v LEFT JOIN sdw_video_cat c ON c.cid=v.cid WHERE v.status=$status $wheresql ORDER BY $orderby $ordersort LIMIT $start_limit,$pagesize";
    $query = $db->query($sql);
    while($videors = $db->fetch_array($query)){
    	$videors['vodurl'] = '../play.php?id='.$videors['id'];
        $videos[]= $videors;
    }
    
    $curl = "cid=$cid&status=$status&t=$t&ob=$ob&q=$q";
    $smarty->assign('page',$page);
    $smarty->assign('curl',$curl);
    $smarty->assign('records',$count);
    $smarty->assign('pagelink',page_ajax($page,$pagecount,$curl));
    $smarty->assign('videos',$videos);
}

if($_GET['action']=='addnew'){
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
}
$smarty->assign('cid', $cid);
$smarty->assign('category',get_video_category($cid));
$smarty->assign('manage_title',$LANG['video_manage']);
$smarty->display('admin_video.htm');
if (!$inajax)page_end();
/*
 * funciton
 */
function checktitle($title){
	global $db;
	if (!empty($title)){
		$videoinfo = $db->get_one("SELECT title FROM sdw_video WHERE title='$title'");
		return !empty($videoinfo);
	}else {
		return false;
	}
}
?>
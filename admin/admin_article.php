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
 * $ID: admin_article.php
*/ 
define("CURSCRIPT",'admin_article');
require_once dirname(__FILE__).'/include/common.inc.php';
$cid = '';
//================================
/**AJAX修改文章推荐**/
//=================================
if($inajax && $_GET['action']=='toggle_recommend'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$arcinfo = $db->get_one("SELECT title,recommend FROM sdw_articles WHERE id=$id");
	$recommend = $arcinfo['recommend']==1 ? 0 : 1;
	$db->query("UPDATE sdw_articles SET recommend=$recommend WHERE id=$id");
	if ($islog)writelog($LANG['edit_article'].':'.$arcinfo['title']);
	dexit($recommend);
}

//================================
/**AJAX审核文章**/
//=================================
if($inajax && $_GET['action']=='toggle_audited'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$arcinfo = $db->get_one("SELECT title,audited FROM sdw_articles WHERE id=$id");
	$audited = $arcinfo['audited']==1 ? 0 : 1;
	$db->query("UPDATE sdw_articles SET audited=$audited WHERE id=$id");
	if ($islog)writelog($LANG['edit_article'].':'.$arcinfo['title']);
	dexit($audited);
}

/*
 * 检测文章是否已存在
 */
if ($inajax && $_GET['action'] == 'checktitle'){
	$title = isset($_GET['val']) ? trim($_GET['val']) : '';
	if (checktitle($title)){
		exit('1');
	}else {
		exit('0');
	}
}
//================================
/**删除文章内容**/
//=================================
if($_GET['action']=='drop'){
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id)){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("DELETE FROM sdw_articles WHERE id=$id");
				if ($islog)writelog($LANG['drop_article'].':'.$arcinfo['title']);				
			}else {
				continue;			
			}
		}
	}else {
		if (!$inajax)showmsg($LANG['article_notexists'],1);
	}
}

//================================
/**移除文章到回收站**/
//=================================
if($_GET['action']=='remove'){
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id)){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("UPDATE sdw_articles SET status=-1 WHERE id=$id");
				if ($islog)writelog($LANG['remove_article'].':'.$arcinfo['title']);
			}else {
				continue;
			}
		}
		if (!$inajax)showmsg($LANG['remove_success'],0,$_SERVER['HTTP_REFERER']);
	}else {
		if (!$inajax)showmsg($LANG['article_notexists'],0,$_SERVER['HTTP_REFERER']);
	}   
}

//================================
/**从回收站还原**/
//=================================
if($_GET['action']=='restore'){
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id)){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("UPDATE sdw_articles SET status=0 WHERE id=$id");
				if ($islog)writelog($LANG['edit_article'].':'.$arcinfo['title']);
			}else {
				continue;
			}
		}
		if (!$inajax)showmsg($LANG['remove_success'],0,$_SERVER['HTTP_REFERER']);
	}else {
		if (!$inajax)showmsg($LANG['article_notexists'],0,$_SERVER['HTTP_REFERER']);
	}   
}

//================================
/**推荐文章**/
//=================================
if($_GET['action']=='recommend'){
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id)){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("UPDATE sdw_articles SET recommend=1 WHERE id=$id");
				if ($islog)writelog($LANG['edit_article'].':'.$arcinfo['title']);
			}else {
				continue;
			}
		}
		if (!$inajax)showmsg($LANG['edit_success'],1);
	}else {
		if (!$inajax)showmsg($LANG['article_notexists'],1);
	}
}

//================================
/**取消推荐文章**/
//=================================
if($_GET['action']=='unrecommend'){
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id)){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("UPDATE sdw_articles SET recommend=0 WHERE id=$id");
				if ($islog)writelog($LANG['edit_article'].':'.$arcinfo['title']);
			}else {
				continue;
			}
		}
		if (!$inajax)showmsg($LANG['edit_success'],1);
	}else {
		if (!$inajax)showmsg($LANG['article_notexists'],1);
	}
}

//================================
/**移动文章**/
//=================================
if($_GET['action']=='move'){
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id) && $cid>0){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("UPDATE sdw_articles SET cid=$cid WHERE id=$id");
				if ($islog)writelog($LANG['move_article'].':'.$arcinfo['title']);
			}else {
				continue;
			}
		}		
	}
	if (!$inajax)showmsg($LANG['move_success'],0,$_SERVER['HTTP_REFERER']);
}

/*
 * 通过审核
 */
if ($_GET['action']=='audited'){
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id)){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("UPDATE sdw_articles SET audited=1 WHERE id=$id");
				if ($islog)writelog($LANG['edit_article'].':'.$arcinfo['title']);
			}else {
				continue;
			}
		}
		if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
	}else {
		if (!$inajax)showmsg($LANG['article_notexists'],1,$_SERVER['HTTP_REFERER']);
	}
}

/*
 * 取消审核
 */
if ($_GET['action']=='unaudited'){
	$article_id = isset($_GET['id']) ? $_GET['id'] : '';
	if (!empty($article_id)){
		$article_id = explode(',',$article_id);
		foreach ($article_id as $id){
			$id = intval($id);
			$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE id=$id");
			if ($arcinfo){
				$db->query("UPDATE sdw_articles SET audited=0 WHERE id=$id");
				if ($islog)writelog($LANG['edit_article'].':'.$arcinfo['title']);
			}else {
				continue;
			}
		}
		if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
	}else {
		if (!$inajax)showmsg($LANG['article_notexists'],1,$_SERVER['HTTP_REFERER']);
	}
}

if ($_GET['action']=='save'){
	require_once ADMIN_PATH.'/include/article.inc.php';
}
/*
 * 添加新文档
 */
if($_GET['action']=='addnew') {
    $smarty->assign('editor',get_editor('content'));
}

//================================
/**获取要修改的文章内容**/
//=================================
if($_GET['action']=='edit'){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$article = $db->get_one("SELECT * FROM sdw_articles WHERE id=$id");	
    if (!empty($article)){
    	$cid = $article['cid'];
	    $smarty->assign('article',$article);
	    $smarty->assign('editor',get_editor('content',$article['content']));
	    $smarty->assign('article_source',get_article_source());	    	   
    }else {
   	    showmsg($LANG['article_notexists'],1);
    }
}

//================================
/**文章列表**/
//=================================
if ($_GET['action']=='list' || $inajax){
	$articles = array();
	$cid = $q = $t = $ob = $page = $orderby = $ordersort = '';
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$t  = isset($_GET['t']) ? trim($_GET['t']) : '';		
	$q  = isset($_GET['q']) ? trim($_GET['q']) : '';
	$ob = isset($_GET['ob']) ? trim($_GET['ob']) : '';
	$status = isset($_GET['status']) ? intval($_GET['status']) : 0;
    if (!empty($ob)){
    	$_SESSION['obs'] = $ob;
    }else {
    	$ob = isset($_SESSION['obs']) ? $_SESSION['obs'] : '';
    }

	switch($ob){
		case 'views':
		$orderby = 'a.views'	;
		break;
		case 'time' :
		$orderby = 'a.dateline';
		break;
		default:$orderby = 'a.id';
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
	$wheresql.= $t == 'unaudited' ? " AND a.audited=0 " : '';
	$wheresql.= $t == 'recommend' ? " AND a.recommend=1 " : '';
	$wheresql.= $t == 'img' ? " AND a.image<>'' " : '';
	$wheresql.= $t == 'myarc' ? "AND a.authorid=".intval($_SESSION['admin_id']) : '';
	$wheresql.= $q != '' ? " AND a.title LIKE '%".$q."%'" : '';
	$count = $db->get_rows("SELECT a.title FROM sdw_articles a LEFT JOIN sdw_article_cat c ON c.cid=a.cid WHERE a.status=$status $wheresql");
	
	$pagesize = 20;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  
	$page = $page<1 ? 1 : $page; 
	$pagecount = $count<$pagesize ? 1 :ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;	
	$start_limit = ($page-1)*$pagesize;
	$sql = "SELECT a.id,a.title,a.dateline,a.views,a.recommend,a.status,a.comments,a.audited,c.* FROM sdw_articles a LEFT JOIN ".
	"sdw_article_cat c ON c.cid=a.cid WHERE a.status=$status $wheresql ORDER BY $orderby $ordersort LIMIT $start_limit,$pagesize";
	$query = $db->query($sql);
	
	while($arcrs = $db->fetch_array($query)){
		$arcrs['arcurl'] = '../article.php?id='.$arcrs['id'];
	    $articles[] = $arcrs;
	}
	$curl = "cid=$cid&status=$status&t=$t&ob=$ob&q=$q";
	$smarty->assign('curl',$curl);
	$smarty->assign('page',$page);
	$smarty->assign('records',$count);
	$smarty->assign('articles',$articles);
	$smarty->assign('pagelink',page_ajax($page,$pagecount,$curl));
}

if($_GET['action']=='addnew'){
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$smarty->assign('article_source',get_article_source());
}

//$cid = isset($cid) ? $cid : isset($_GET['cid']) ? intval($_GET['cid']) : 0;
$smarty->assign('cid',$cid);
$smarty->assign('category',get_article_category($cid));
$smarty->assign('manage_title',$LANG['article_manage']);
$smarty->display('admin_article.htm');
if(!$inajax)page_end();
unset($article,$query,$arcrs);
//=====================================
//function
//=====================================
function get_article_source(){
    global $db;
	$query=$db->query("SELECT * FROM sdw_article_source ORDER BY source_order ASC,source_id ASC");
	while($rs=$db->fetch_array($query)){
	   $source[]=$rs;
	}
	return $source;
}

function checktitle($title) {
	global $db;
	if (!empty($title)){
		$arcinfo = $db->get_one("SELECT title FROM sdw_articles WHERE title='$title'");
		return !empty($arcinfo);
	}else {
		return false; 
	}
}
?>
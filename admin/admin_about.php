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
 * $ID: admin_about.php
*/ 
define("CURSCRIPT",'admin_about');
require_once dirname(__FILE__).'/include/common.inc.php';

if ($inajax){
	/**AJAX修改文章标题**/
	if($_GET['action']=='edit_title'){
	    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	    $title = isset($_GET['val'])? trim($_GET['val']) : '';
	    $db->query("UPDATE sdw_about SET title='$title' where id=$id");
	    if ($islog)writelog($LANG['edit_article'].':'.$title);
	    dexit($title);
	    unset($id,$title);
	    
	}elseif($_GET['action']=='edit_kw'){
		/**AJAX修改文章关键词**/
	    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	    $keywords = isset($_GET['val']) ? trim($_GET['val']) : '';
	    $db->query("UPDATE sdw_about SET keywords='$keywords' where id=$id");
	    if ($islog)writelog($LANG['edit_article'].':'.get_about_title($id));
	    dexit($keywords);
	    unset($id,$keywords);
	    
	}elseif ($_GET['action'] == 'checktitle'){
		/**检测标题是否重复**/
		$title = isset($_GET['title']) ? trim($_GET['title']) : '';
		if (!empty($title)){
			$aboutinfo = $db->get_one("SELECT title FROM sdw_about WHERE title='$title'");
			$aboutinfo ? dexit('1') : dexit('0');;
			unset($aboutinfo,$title);
		}
	}elseif($_GET['action']=='drop'){
		/**删除文章内容**/
		$article_id = isset($_GET['id']) ? $_GET['id'] : '';
		if (!empty($article_id)){
			$article_id = explode(',',$article_id);
			foreach ($article_id as $id){
				$id = intval($id);
				$arcinfo = $db->get_one("SELECT title FROM sdw_about WHERE id=$id");
				if ($arcinfo){
					$db->query("DELETE FROM sdw_about WHERE id=$id");
					if ($islog)writelog($LANG['drop_article'].':'.$arcinfo['title']);
				}else {
					continue;
				}
			}
		}
	    
	}
}

//================================
/**保存文章内容**/
//=================================
if($_GET['action']=='save'){
	$about['id']       = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $about['uid']      = intval($_SESSION['admin_id']);
    $about['title']    = !empty($_POST['title'])    ? cutstr(trim($_POST['title']),30) : '';
    $about['keywords'] = !empty($_POST['keywords']) ? cutstr(trim($_POST['keywords']),100) : '';
    $about['content']  = !empty($_POST['content'])  ? trim($_POST['content']) : '';

    if ($about['id']>0){    	
	    $update_sql = "UPDATE sdw_about SET title='$about[title]',content='$about[content]', uid='$about[uid]',".
	    "keywords='$about[keywords]',dateline='$timestamp' WHERE id=".$about['id'];
	    
	    if($db->query($update_sql)){
	        if ($islog)writelog($LANG['edit_article'].':'.$about['title']);
	        if (isset($_POST['add_to_nav']) && $_POST['add_to_nav']==1){
	        	$navinfo = $db->get_one("SELECT nav_name FROM sdw_nav WHERE nav_name='$about[title]'");
	        	if (!$navinfo){
	        		$db->query("INSERT INTO sdw_nav(nav_name,nav_position,nav_link,nav_display)VALUES('$about[title]','mid','about.php?id=".$about['id']."','1')");
	        	}
	        }
	        showmsg($LANG['save_success'],0,$_SERVER['HTTP_REFERER']);
	    }
    }else {   	
        $insert_sql = "INSERT INTO sdw_about(title,content,dateline,uid,keywords)".
        "VALUES('$about[title]','$about[content]','$timestamp','$about[uid]','$about[keywords]')";
  
        if($db->query($insert_sql)){
            if ($islog)writelog($LANG['add_article'].':'.$about['title']);
            if (isset($_POST['add_to_nav']) && $_POST['add_to_nav']==1){
            	$db->query("INSERT INTO sdw_nav(nav_name,nav_position,nav_link,nav_display)VALUES('$about[title]','mid','about.php?id=".$db->insert_id()."','1')");
            }
            if (!$inajax)showmsg($LANG['save_success'],0,$_SERVER['HTTP_REFERER']);
        }  	
    }

}elseif($_GET['action']=='edit'){
	/**获取文章内容**/
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $article = $db->get_one("SELECT * FROM sdw_about WHERE id=$id");
    if (!empty($article)){
	    $smarty->assign('editor',get_editor('content',$article['content']));
	    $smarty->assign('article',$article);
    }else {
    	showmsg($LANG['article_notexists'],1);
    }

}elseif ($_GET['action']=='addnew'){
	$smarty->assign('editor',get_editor('content'));
	
}elseif ($_GET['action']=='list' || $inajax){
	/**获取文章列表**/
	$pagesize = 20;
	$articles = array();
	$page  = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page  = $page<1 ? 1 : $page;	
	$count = $db->get_rows("SELECT * FROM sdw_about");
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;
	$start_limit = ($page-1)*$pagesize;
	$query = $db->query("SELECT a.id,a.title,a.keywords,a.dateline,u.admin_user FROM sdw_about a LEFT JOIN sdw_admin_user u ON u.admin_id=a.uid ORDER BY a.id ASC LIMIT $start_limit,$pagesize");
	while ($aboutrs = $db->fetch_array($query)){
		$articles[] = $aboutrs;
	}
	$smarty->assign('page',$page);
	$smarty->assign('records',$count);
	$smarty->assign('pagelink',page_ajax($page,$pagecount));
	$smarty->assign('articles',$articles);
}

$smarty->assign('manage_title',$LANG['about_manage']);
$smarty->display('admin_about.htm');
if (!$inajax)page_end();
/*
 * function 
 */
function get_about_title($id){
	global $db;
	$aboutinfo = $db->get_one("SELECT title FROM sdw_about WHERE id=$id");
	return $aboutinfo['title'];
}
?>
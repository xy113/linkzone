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
 * $ID: admin_article_source.php
*/ 
define("CURSCRIPT",'admin_article_source');
require_once dirname(__FILE__).'/include/common.inc.php';
/*
 * AJAX修改名称
 */
if($inajax && $_GET['action']=='edit_name'){
    $source_id   = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
    $source_name = !empty($_GET['val']) ? trim($_GET['val'])  : '';
    $db->query("UPDATE sdw_article_source SET source_name='$source_name' WHERE source_id=$source_id");
    dexit($source_name);
}

if($inajax && $_GET['action']=='edit_url'){
    $source_id  = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
    $source_url = !empty($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_article_source SET source_url='$source_url' WHERE source_id=$source_id");
    dexit($source_url);
}

if($inajax && $_GET['action']=='edit_order'){
    $source_id    = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
    $source_order = !empty($_GET['val']) ? intval($_GET['val'])  : 0;
    $db->query("UPDATE sdw_article_source SET source_order='$source_order' WHERE source_id=$source_id");
    dexit($source_order);
}

if($_GET['action']=='save'){
   $source_name  = !empty($_POST['source_name'])  ? utf2gbk(trim($_POST['source_name'])) : '';
   $source_url   = !empty($_POST['source_url'])   ? trim($_POST['source_url']) : '';
   $source_order = !empty($_POST['source_order']) ? intval($_POST['source_order']) : 0;
   $db->query("INSERT INTO sdw_article_source(source_name,source_url,source_order)VALUES('$source_name','$source_url','$source_order')");
}

if($_GET['action']=='drop'){
	$source_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($source_id)){
		$source_id = explode(',',$source_id);
		foreach ($source_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_article_source WHERE source_id=$id");
		}
	}
    if (!$inajax) showmsg($LANG['delete_success'],0);
}

$query = $db->query("SELECT * FROM sdw_article_source ORDER BY source_order ASC,source_id ASC");
while($result = $db->fetch_array($query)){
   $source_list[]=$result;
}

$smarty->assign('source_list',$source_list);
$smarty->assign('manage_title',$LANG['article_source_manage']);
$smarty->display('admin_article_source.htm');
if(!$inajax) page_end();
?>
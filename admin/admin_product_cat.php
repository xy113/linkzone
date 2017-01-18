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
 * $ID: admin_product_cat.php
*/ 
define("CURSCRIPT",'admin_product_cat');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**AJAX修改分类名称**/
//=================================
if($inajax && $_GET['action']=='edit_name'){
    $cid = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
    $name = !empty($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_product_cat SET name='$name' WHERE cid=$cid");
    dexit($name);
}

//================================
/**AJAX修改分类关键字**/
//=================================
if($inajax && $_GET['action']=='edit_kw'){
    $cid = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $keywords = !empty($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_product_cat SET keywords='$keywords' WHERE cid=$cid");
    dexit($keywords);
}

if ($inajax && $_GET['action']=='toggle_disabled'){
	$cid = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$categoryinfo = $db->get_one("SELECT disabled FROM sdw_article_cat WHERE cid=$cid");
	$disabled = $categoryinfo['disabled']==0 ? 1 : 0;
	$db->query("UPDATE sdw_article_cat SET disabled='$disabled'  WHERE cid=$cid");
	dexit($disabled);
}
//================================
/**AJAX修改分类排序**/
//=================================
if($inajax && $_GET['action']=='edit_order'){
    $cid = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $displayorder = !empty($_GET['val']) ? intval($_GET['val'])  : '';
    $db->query("UPDATE sdw_product_cat SET displayorder='$displayorder' WHERE cid=$cid");
    dexit($displayorder);
}

//================================
/**保存分类信息**/
//=================================
if($_GET['action']=='save'){
	$cat['cid'] = !empty($_POST['cid']) ? intval($_POST['cid']) : 0;
    $cat['name'] = !empty($_POST['name']) ? utf2gbk(trim($_POST['name'])) : '';
    $cat['cup']  = !empty($_POST['cup']) ? intval($_POST['cup']) : 0;
    $cat['keywords'] = !empty($_POST['keywords']) ? utf2gbk(trim($_POST['keywords'])) : '';
    $cat['description'] = !empty($_POST['description'])  ? utf2gbk(trim($_POST['description'])) : '';
    $cat['displayorder'] = !empty($_POST['displayorder']) ? intval($_POST['displayorder'])  : 0;
    $cat['directory'] = !empty($_POST['directory']) ? trim($_POST['directory']) : '';
    $cat['domain'] = !empty($_POST['domain']) ? trim($_POST['domain']): '';
    $cat['disabled'] = !empty($_POST['disabled']) ? intval($_POST['disabled']) : 0;
    
    if (empty($cat['name'])){
    	showmsg($LANG['cat_name_empty'],1);
    }
    
    if (!empty($cat['directory'])){
    	makedir(ROOT_PATH.$cfg['pagedir'].'/'.$cat['directory']);
    }
    
    if ($cat['cid']>0){
	    $update_sql = "UPDATE sdw_product_cat SET cup='$cat[cup]',name='$cat[name]',
		keywords='$cat[keywords]',description='$cat[description]',displayorder='$cat[displayorder]',
		directory='$cat[directory]',domain='$cat[domain]',disabled='$cat[disabled]' WHERE cid=".$cat['cid'];
	    if($db->query($update_sql)){	  
	    	if ($islog){
	    		writelog($LANG['edit'].$LANG['article'].$LANG['category'].':'.$cat['name']);  	
	    	}
	        if (!$inajax){
	        	showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);
	        }
	    }
    }else {
	    $insert_sql = "INSERT INTO sdw_product_cat(cup,name,keywords,description,displayorder,directory,domain,disabled)VALUES".
	    "('$cat[cup]','$cat[name]','$cat[keywords]','$cat[description]','$cat[displayorder]','$cat[directory]','$cat[domain]','$cat[disabled]')";
	   
	    if($db->query($insert_sql)){
	    	if ($islog){
	    		writelog($LANG['add'].$LANG['article'].$LANG['category'].':'.$cat['name']); 
	    	}
	        if (!$inajax){
	        	showmsg($LANG['save_success'],0,$_SERVER['HTTP_REFERER']);
	        }
	    }
    }
}


//================================
/**删除分类信息**/
//=================================
if($_GET['action']=='drop'){
    $cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
    if ($cid>0){
	    $catequery = $db->query("SELECT cid,name FROM sdw_product_cat WHERE cup='$cid' OR cid='$cid'");
	    while($categoryrs = $db->fetch_array($catequery)){
	    	$db->query("DELETE FROM sdw_product_cat WHERE cid=".$categoryrs['cid']);
	    	if ($islog){
	    		writelog($LANG['drop'].$LANG['article'].$LANG['category'].':'.$categoryrs['name']);
	    	}
	    }
	    if (!$inajax){
	    	showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
	    }
    }else {
    	if (!$inajax){
    		showmsg($LANG['cat_notexists'],0);
    	}
    }
}
//================================
/**获取要修改的分类信息**/
//=================================
if($_GET['action']=='edit'){
    $cid = !empty($_GET['cid']) ? intval($_GET['cid']) : 0;
    $category = $db->get_one("SELECT * FROM sdw_product_cat WHERE cid=$cid");
    if(!empty($category)){
    	$smarty->assign('categories',get_article_category($category['cup']));
   	    $smarty->assign('category',$category);
    }else {
   	    showmsg($LANG['cat_notexists'],1);
    }   
}else {
	$cup = isset($_GET['cup']) ? intval($_GET['cup']) : 0;
	$smarty->assign('categories',get_product_category($cup));
}
$smarty->assign('manage_title',$LANG['product_cat_manage']);
$smarty->display('admin_category.htm');
if(!$inajax)page_end();
//=======================================
//function
//=======================================
function checkcategory($name){
	global $db;
	if (!empty($name)){	
	    $category = $db->get_one("SELECT name FROM sdw_product_cat WHERE name='$name'");
	    return !empty($category);
	}else {
		return false;
	}
}
?>
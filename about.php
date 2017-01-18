<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.maomaoc.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-18
 * $Id: about.php
*/ 
define('CURSCRIPT','about');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id<=0)header('location:err.php');
$about = $db->get_one("SELECT * FROM sdw_about WHERE id=$id");
if (!$about){
	header('location:err.php');
}else {
	$smarty->assign('about',$about);
}

$articles['about'] = get_abouts();
$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->assign('slides',get_slide());
$smarty->display('about.htm');
/*
 * function
 */
function get_abouts(){
	global $db,$cfg;
	$abouts = array();
	$query = $db->query("SELECT id,title FROM sdw_about ORDER BY id ASC");
	while ($aboutrs = $db->fetch_array($query)){
		$aboutrs['arcurl'] = $cfg['isstatic']==1 ? 'about-'.$aboutrs['id'].'.html' : 'about.php?id='.$aboutrs['id'];
		$abouts[] = $aboutrs;
	}
	return $abouts;
}
?>
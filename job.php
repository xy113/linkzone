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
 * $Id: job.php
*/ 
define('CURSCRIPT','job');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id<=0)header('location:err.php');
$db->query("UPDATE sdw_jobs SET views=views+1 WHERE id=$id");
$job = $db->get_one("SELECT j.*,c.name,c.keywords,c.description FROM sdw_jobs j,sdw_jobs_cat c WHERE c.cid=j.cid AND j.id=$id");
if (!$job){
	header('location:err.php');
}else {
	$job['jobdescription'] = str_replace(array("\n","　"),array('<br />','&nbsp;'),$job['jobdescription']);
	$smarty->assign('job',$job);
}

$category['jobs'] = get_jobs_category();
$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->display('job.htm');
?>
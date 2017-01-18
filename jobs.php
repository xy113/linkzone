<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-18
 * $Id: jobs.php
*/ 
define('CURSCRIPT', 'jobs');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $jobs = $category = array();

$pagesize = 10;
$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page<1 ? 1 : $page;
$wheresql = $cid>0 ? " AND (c.cid=$cid OR c.cup=$cid)" : '';
$sql = "SELECT j.*,c.keywords,c.description FROM sdw_jobs j LEFT JOIN sdw_jobs_cat c ON c.cid=j.cid ".
"WHERE j.audited=1 $wheresql ORDER BY j.id DESC";
$count = $db->get_rows($sql);
$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
$page = $page>$pagecount ? $pagecount : $page;
$start_limit = ($page-1)*$pagesize;
$query = $db->query($sql." LIMIT $start_limit,$pagesize");
while ($jobrs = $db->fetch_array($query)){
	$jobrs['joburl'] = $cfg['isstatic']==1 ? 'job-'.$jobrs['id'].'.html' : 'job.php?id='.$jobrs['id'];
	$jobs['list'][] = $jobrs;
}
$smarty->assign('pagelink',$cfg['isstatic']==1?jobspage($page,$pagecount,$cid):pagination($page,$pagecount,'cid='.$cid));
$curcategory = get_curcategory($cid);
$topcategoryid = $curcategory['cup']==0 ? $curcategory['cid'] : $curcategory['cup']; 
$smarty->assign('curcategory',$curcategory);
$smarty->assign('topcategoryid',$topcategoryid);

$category['jobs'] = get_jobs_category($cid);
$smarty->assign('category',$category);
$smarty->assign('jobs',$jobs);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->display('jobs.htm');
/*
 *function 
 */
function jobspage($page,$total,$cid){ 
	$prevs=$page-5;  
	if($prevs<=0)$prevs=1; 
	$prev =$page-1;
	if($prev<=0) $prev=1;
	$nexts=$page+5;
	if($nexts>$total)$nexts=$total; 
	$next=$page+1;
	if($next>$total)$next=$total; 
	$pagenavi="<a href =\"jobs-{$cid}-1.html\">首页</a>"; 
	$pagenavi.="<a href =\"jobs-{$cid}-{$prev}.html\">上一页</a>"; 
	for($i=$prevs;$i<=$page-1;$i++){ 
	   $pagenavi.="<a href = \"jobs-{$cid}-{$i}.html\">$i</a>"; 
	} 

	$pagenavi.="<span class=\"cur\">$page</span>"; 
	for($i=$page+1;$i<=$nexts;$i++){ 
	   $pagenavi.="<a href =\"jobs-{$cid}-{$i}.html\">$i</a>"; 

	} 
	$pagenavi.="<a href=\"jobs-{$cid}-{$next}.html\">下一页</a>"; 
	$pagenavi.="<a href=\"jobs-{$cid}-{$total}.html\">尾页</a>"; 
	return $pagenavi ; 
}

function get_curcategory($cid){
	global $db;
	$categoryrs = $db->get_one("SELECT * FROM sdw_jobs_cat WHERE cid=$cid LIMIT 1");
	if (!$categoryrs){
		$categoryrs['name'] = '职位列表';
		$categoryrs['cid'] = 0;
		$categoryrs['cup'] = 0;
		return $categoryrs;
	}
	return $categoryrs;
}
?>
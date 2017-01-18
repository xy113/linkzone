<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Author: David Song
 * $Date: 2010-12-13
 * $Id: images.php
*/ 
define('CURSCRIPT','images');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();
$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;

$pagesize = 30;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page<1 ? 1 : $page;

$wheresql = $cid>0 ? " AND (c.cid=$cid OR c.cup=$cid)" : "";
$sql = "SELECT i.id,i.title,i.image,i.dateline,i.views,c.* FROM sdw_image i LEFT JOIN ".
"sdw_image_cat c ON c.cid=i.cid WHERE i.status=0 AND i.audited=1 $wheresql ORDER BY i.id DESC";
$count = $db->get_rows($sql);
$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
$page = $page>$pagecount ? $pagecount : $page;
$start_limit = ($page-1)*$pagesize;
$query = $db->query($sql." LIMIT $start_limit,$pagesize");
while ($imagers = $db->fetch_array($query)){
	$imagers['imgurl'] = $cfg['isstatic']==1 ? 'views-'.$imagers['id'].'.html' : 'views.php?id='.$imagers['id'];
	$images['list'][] = $imagers;
}
$smarty->assign('pagelink',$cfg['isstatic']==1 ? imagespage($page,$pagecount,$cid) : pagination($page,$pagecount,'cid='.$cid));
$curcategory = get_curcategory($cid);
$topcategoryid = $curcategory['cup']==0 ? $curcategory['cid'] : $curcategory['cup']; 
$smarty->assign('curcategory',$curcategory);
$smarty->assign('topcategoryid',$topcategoryid);

$category['image'] = get_image_category($cid);
$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->display('images.htm');
/*
 * funcion
 */
function imagespage($page,$total,$cid){ 
	$prevs=$page-5;  
	if($prevs<=0)$prevs=1; 
	$prev =$page-1;
	if($prev<=0) $prev=1;
	$nexts=$page+5;
	if($nexts>$total)$nexts=$total; 
	$next=$page+1;
	if($next>$total)$next=$total; 
	$pagenavi="<a href =\"images-{$cid}-1.html\">��ҳ</a>"; 
	$pagenavi.="<a href =\"images-{$cid}-{$prev}.html\">��һҳ</a>"; 
	for($i=$prevs;$i<=$page-1;$i++){ 
	   $pagenavi.="<a href = \"images-{$cid}-{$i}.html\">$i</a>"; 
	} 

	$pagenavi.="<span class=\"cur\">$page</span>"; 
	for($i=$page+1;$i<=$nexts;$i++){ 
	   $pagenavi.="<a href =\"images-{$cid}-{$i}.html\">$i</a>"; 

	} 
	$pagenavi.="<a href=\"images-{$cid}-{$next}.html\">��һҳ</a>"; 
	$pagenavi.="<a href=\"images-{$cid}-{$total}.html\">βҳ</a>"; 
	return $pagenavi ; 
}

function get_curcategory($cid){
	global $db;
	$categoryrs = $db->get_one("SELECT * FROM sdw_image_cat WHERE cid=$cid LIMIT 1");
	if (!$categoryrs){
		$categoryrs['name'] = '����ͼ��';
		$categoryrs['cid'] = 0;
		$categoryrs['cup'] = 0;
		return $categoryrs;
	}
	return $categoryrs;
}
?>
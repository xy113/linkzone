<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Author: David Song
 * $Date: 2010-12-14
 * $Id: product.php
*/ 
define('CURSCRIPT', 'product');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();

$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
$pagesize = 20;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page<1 ? 1 : $page;
$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
$sql = "SELECT p.id,p.proname,p.price,p.size,p.image,p.listingdate,p.views,p.dateline,c.* FROM sdw_product p LEFT JOIN sdw_product_cat c ".
"ON c.cid=p.cid WHERE p.status=0 AND p.audited=1 $wheresql ORDER BY p.id DESC";
$count = $db->get_rows($sql);
$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
$start_limit = ($page-1)*$pagesize;
$query = $db->query($sql." LIMIT $start_limit,$pagesize");
while ($productrs = $db->fetch_array($query)){
	$productrs['prourl'] = $cfg['isstatic'] == 1 ? 'detail-'.$productrs['id'].'.html' : 'detail.php?id='.$productrs['id'];
	$products['list'][] = $productrs;
}

$smarty->assign('pagelink',$cfg['isstatic']==1 ? productpage($page,$pagecount,$cid) : pagination($page,$pagecount,'cid='.$cid));
$curcategory = get_curcategory($cid);
$topcategoryid = $curcategory['cup']==0 ? $curcategory['cid'] : $curcategory['cup']; 
$smarty->assign('curcategory',$curcategory);
$smarty->assign('topcategoryid',$topcategoryid);

$category['product'] = get_product_category($cid);
$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->display('product.htm');
/*
 *function 
 */
function productpage($page,$total,$cid){ 
	$prevs=$page-5;  
	if($prevs<=0)$prevs=1; 
	$prev =$page-1;
	if($prev<=0) $prev=1;
	$nexts=$page+5;
	if($nexts>$total)$nexts=$total; 
	$next=$page+1;
	if($next>$total)$next=$total; 
	$pagenavi="<a href =\"product-{$cid}-1.html\">首页</a>"; 
	$pagenavi.="<a href =\"product-{$cid}-{$prev}.html\">上一页</a>"; 
	for($i=$prevs;$i<=$page-1;$i++){ 
	   $pagenavi.="<a href = \"product-{$cid}-{$i}.html\">$i</a>"; 
	} 

	$pagenavi.="<span class=\"cur\">$page</span>"; 
	for($i=$page+1;$i<=$nexts;$i++){ 
	   $pagenavi.="<a href =\"product-{$cid}-{$i}.html\">$i</a>"; 

	} 
	$pagenavi.="<a href=\"product-{$cid}-{$next}.html\">下一页</a>"; 
	$pagenavi.="<a href=\"product-{$cid}-{$total}.html\">尾页</a>"; 
	return $pagenavi ; 
}

function get_curcategory($cid){
	global $db;
	$categoryrs = $db->get_one("SELECT * FROM sdw_product_cat WHERE cid=$cid LIMIT 1");
	if (!$categoryrs){
		$categoryrs['name'] = '产品列表';
		$categoryrs['cid'] = 0;
		$categoryrs['cup'] = 0;
		return $categoryrs;
	}
	return $categoryrs;
}
?>
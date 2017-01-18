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
 * $Id: detail.php
*/ 
define('CURSCRIPT', 'product');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id<=0)header('location:err.php');

$product = $db->get_one("SELECT p.*,c.name,c.keywords FROM sdw_product p,sdw_product_cat c WHERE c.cid=p.cid AND p.status=0 AND p.id=$id");
if (!$product){
	header('location:err.php');
}else {
	$product['caturl'] = $cfg['isstatic']==1 ? 'product-'.$product['cid'].'-1.html' : 'product.php?cid='.$product['cid'];
	$product['tagarray'] = explode(',',$product['tags']);
	$smarty->assign('product',$product);
}

$products['recommend'] = get_products(0,3,1);
$products['related'] = get_products($product['cid'],4);

$articles['hot'] = get_articles(0,10,36,0,0,'click');
$images['hot'] = get_images(0,4,36,0,0,'click');
$videos['hot'] = get_videos(0,3,36,0,0,'click');

$category['product'] = get_product_category($product['cid']);
$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->display('detail.htm');
?>
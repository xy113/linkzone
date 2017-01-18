<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-13
 * $Id: content.func.php
*/

if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
/*
 * 获取文章分类
 */
function get_article_category($cid=0){
	global $db,$cfg;
	$category = array();
	$categoryquery = $db->query("SELECT * FROM sdw_article_cat ORDER BY displayorder ASC,cid ASC");
	while ($categoryrs = $db->fetch_array($categoryquery)){
		$categoryrs['caturl'] = $cfg['isstatic']==1 ? 'arclist-'.$categoryrs['cid'].'-1.html' : 'arclist.php?cid='.$categoryrs['cid'];
		$categoryrs['selected'] = $categoryrs['cid'] == $cid ? ' selected="selected"' : '';
		//$categoryrs['disabled'] = $categoryrs['disabled']==1 ? ' disabled="disabled"' : '';
		$category[$categoryrs['cup']][] = $categoryrs;
	}
	return $category;
}
/*
 * 获取视频分类
 */
function get_video_category($cid=0){
	global $db,$cfg;
	$category = array();
	$categoryquery = $db->query("SELECT * FROM sdw_video_cat ORDER BY displayorder ASC,cid ASC");
	while ($categoryrs = $db->fetch_array($categoryquery)){
		$categoryrs['caturl'] = $cfg['isstatic']==1 ? 'video-'.$categoryrs['cid'].'-1.html' : 'video.php?cid='.$categoryrs['cid'];
		$categoryrs['selected'] = $categoryrs['cid'] == $cid ? ' selected="selected"' : '';
		$category[$categoryrs['cup']][] = $categoryrs;
	}
	return $category;
}
/*
 * 获取图片分类
 */
function get_image_category($cid=0){
	global $db,$cfg;
	$category = array();
	$categoryquery = $db->query("SELECT * FROM sdw_image_cat ORDER BY displayorder ASC,cid ASC");
	while ($categoryrs = $db->fetch_array($categoryquery)){
		$categoryrs['caturl'] = $cfg['isstatic'] == 1 ? 'images-'.$categoryrs['cid'].'-1.html' : 'images.php?cid='.$categoryrs['cid'];
		$categoryrs['selected'] = $categoryrs['cid'] == $cid ? ' selected="selected"' : '';
		$category[$categoryrs['cup']][] = $categoryrs;
	}
	return $category;
}
/*
 * 获取产品分类
 */
function get_product_category($cid=0){
	global $db,$cfg;
	$category = array();
	$categoryquery = $db->query("SELECT * FROM sdw_product_cat ORDER BY displayorder ASC,cid ASC");
	while ($categoryrs = $db->fetch_array($categoryquery)){
		$categoryrs['caturl'] = $cfg['isstatic']==1 ? 'product-'.$categoryrs['cid'].'-1.html' : 'product.php?cid='.$categoryrs['cid'];
		$categoryrs['selected'] = $categoryrs['cid'] == $cid ? ' selected="selected"' : '';
		$category[$categoryrs['cup']][] = $categoryrs;
	}
	return $category;
}

/*
 * 获取招聘分类
 */
function get_jobs_category($cid=0){
	global $db,$cfg;
	$category = array();
	$categoryquery = $db->query("SELECT * FROM sdw_jobs_cat ORDER BY displayorder ASC,cid ASC");
	while ($categoryrs = $db->fetch_array($categoryquery)){
		$categoryrs['caturl'] = $cfg['isstatic']==1 ? 'jobs-'.$categoryrs['cid'].'-1.html' : 'jobs.php?cid='.$categoryrs['cid'];
		$categoryrs['selected'] = $categoryrs['cid'] == $cid ? ' selected="selected"' : '';
		$category[$categoryrs['cup']][] = $categoryrs;
	}
	return $category;
}

/*
 * 获取文章列表
 */
function get_articles($cid=0,$num=10,$titlelen=36,$infolen=0,$recommend=0,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$articles = array();
	switch ($orderby){
		case 'id' : $order_by = 'a.id';
		break;
		case 'click' : $order_by = 'a.views';
		break;
		case 'time' : $order_by = 'a.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'a.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
	$wheresql.= $recommend==1 ? " AND a.recommend=1 " : '';
	$sql = "SELECT a.id,a.title,a.views,a.dateline,a.summary,a.image,c.* FROM sdw_articles a LEFT JOIN sdw_article_cat c ON c.cid=a.cid WHERE a.status=0 AND a.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT 0,$num";
	$query = $db->query($sql);
	while ($arcrs = $db->fetch_array($query)){
		$arcrs['title']   = cutstr($arcrs['title'],$titlelen);
		$arcrs['summary'] = cutstr($arcrs['summary'],$infolen);
		$arcrs['arcurl']  = $cfg['isstatic']==1 ? 'article-'.$arcrs['id'].'.html' : 'article.php?id='.$arcrs['id'];
		$arcrs['caturl']  = $cfg['isstatic']==1 ? 'arclist-'.$arcrs['cid'].'-1.html' : 'arclist.php?cid='.$arcrs['cid'];
		$articles[] = $arcrs;
	}
	return $articles;
}
/*
 * 获取文章分页列表
 */
function get_article_list($cid=0,$page=1,$pagesize=20,$titlelen=36,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$articles = array();
	switch ($orderby){
		case 'id' : $order_by = 'a.id';
		break;
		case 'click' : $order_by = 'a.views';
		break;
		case 'time' : $order_by = 'a.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'a.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
	$start_limit = ($page-1)*$pagesize;
	$sql = "SELECT a.id,a.title,a.views,a.dateline,a.summary,a.image,c.* FROM sdw_articles a LEFT JOIN sdw_article_cat c ON c.cid=a.cid WHERE a.status=0 AND a.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT $start_limit,$pagesize";
	$query = $db->query($sql);
	while ($arcrs = $db->fetch_array($query)){
		$arcrs['title'] = cutstr($arcrs['title'],$titlelen);
		//$arcrs['summary'] = cutstr($arcrs['summary'],$infolen);
		$arcrs['arcurl'] = $cfg['isstatic']==1 ? 'article-'.$arcrs['id'].'.html' : 'article.php?id='.$arcrs['id'];
		$arcrs['caturl']  = $cfg['isstatic']==1 ? 'arclist-'.$arcrs['cid'].'-1.html' : 'arclist.php?cid='.$arcrs['cid'];
		$articles[] = $arcrs;
	}
	return $articles;
}
/*
 * 获取视频列表
 */
function get_videos($cid=0,$num=10,$titlelen=36,$infolen=0,$recommend=0,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$videos = array();
	switch ($orderby){
		case 'id' : $order_by = 'v.id';
		break;
		case 'click' : $order_by = 'v.views';
		break;
		case 'time' : $order_by = 'v.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'v.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
	$wheresql.= $recommend==1 ? " AND v.recommend=1 " : '';
	$sql = "SELECT v.*,c.* FROM sdw_video v LEFT JOIN sdw_video_cat c ON c.cid=v.cid WHERE v.status=0 AND v.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT 0,$num";
	$query = $db->query($sql);
	while ($videors = $db->fetch_array($query)){
		$videors['title']   = cutstr($videors['title'],$titlelen);
		$videors['content'] = cutstr(strip_html($videors['content']),$infolen);
		$videors['vodurl']  = $cfg['isstatic']==1 ? 'play-'.$videors['id'].'.html' : 'play.php?id='.$videors['id'];
		$videors['caturl']  = $cfg['isstatic']==1 ? 'video-'.$videors['cid'].'-1.html' : 'video.php?cid'.$videors['cid'];
		$videos[] = $videors;
	}
	return $videos;
}

/*
 * 获取视频分页列表
 */
function get_video_list($cid=0,$page=1,$pagesize=20,$titlelen=36,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$videos = array();
	switch ($orderby){
		case 'id' : $order_by = 'v.id';
		break;
		case 'click' : $order_by = 'v.views';
		break;
		case 'time' : $order_by = 'v.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'v.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
    $start_limit = ($page-1)*$pagesize;
	$sql = "SELECT v.*,c.* FROM sdw_video v LEFT JOIN sdw_video_cat c ON c.cid=v.cid WHERE v.status=0 AND v.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT $start_limit,$pagesize";
	$query = $db->query($sql);
	while ($videors = $db->fetch_array($query)){
		$videors['title']  = cutstr($videors['title'],$titlelen);
		//$videors['content'] = cutstr(strip_html($videors['content']),$infolen);
		$videors['vodurl'] = $cfg['isstatic']==1 ? 'play-'.$videors['id'].'.html' : 'play.php?id='.$videors['id'];
		$videors['caturl']  = $cfg['isstatic']==1 ? 'video-'.$videors['cid'].'-1.html' : 'video.php?cid'.$videors['cid'];
		$videos[] = $videors;
	}
	return $videos;
}

/*
 * 获取图组列表
 */
function get_images($cid=0,$num=10,$titlelen=36,$infolen=0,$recommend=0,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$images = array();
	switch ($orderby){
		case 'id' : $order_by = 'i.id';
		break;
		case 'click' : $order_by = 'i.views';
		break;
		case 'time' : $order_by = 'i.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'i.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
	$wheresql.= $recommend==1 ? " AND i.recommend=1 " : '';
	$sql = "SELECT i.*,c.* FROM sdw_image i LEFT JOIN sdw_image_cat c ON c.cid=i.cid WHERE i.status=0 AND i.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT 0,$num";
	$query = $db->query($sql);
	while ($imagers = $db->fetch_array($query)){
		$imagers['title']   = cutstr($imagers['title'],$titlelen);
		$imagers['content'] = cutstr(strip_html($imagers['content']),$infolen);
		$imagers['imgurl']  = $cfg['isstatic']==1 ? 'views-'.$imagers['id'].'.html' : 'views.php?id='.$imagers['id'];
		$imagers['caturl']  = $cfg['isstatic']==1 ? 'images-'.$imagers['cid'].'-1.html' : 'images.php?cid='.$imagers['cid'];
		$images[] = $imagers;
	}
	return $images;
}
/*
 * 获取图组分页列表
 */
function get_image_list($cid=0,$page=1,$pagesize=20,$titlelen=36,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$images = array();
	switch ($orderby){
		case 'id' : $order_by = 'i.id';
		break;
		case 'click' : $order_by = 'i.views';
		break;
		case 'time' : $order_by = 'i.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'i.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
    $start_limit = ($page-1)*$pagesize;
	$sql = "SELECT i.*,c.* FROM sdw_image i LEFT JOIN sdw_image_cat c ON c.cid=i.cid WHERE i.status=0 AND i.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT $start_limit,$pagesize";
	$query = $db->query($sql);
	while ($imagers = $db->fetch_array($query)){
		$imagers['title']  = cutstr($imagers['title'],$titlelen);
		//$imagers['content'] = cutstr(strip_html($imagers['content']),$infolen);
		$imagers['imgurl'] = $cfg['isstatic']==1 ? 'views-'.$imagers['id'].'.html' : 'views.php?id='.$imagers['id'];
		$imagers['caturl'] = $cfg['isstatic']==1 ? 'images-'.$imagers['cid'].'-1.html' : 'images.php?cid='.$imagers['cid'];
		$images[] = $imagers;
	}
	return $images;
}

/*
 * 获取产品列表
 */
function get_products($cid=0,$num=10,$recommend=0,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$products = array();
	switch ($orderby){
		case 'id' : $order_by = 'p.id';
		break;
		case 'click' : $order_by = 'p.views';
		break;
		case 'time' : $order_by = 'p.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'p.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
	$wheresql.= $recommend==1 ? " AND p.recommend=1 " : '';	
	$sql = "SELECT p.id,p.proname,p.price,p.size,p.thumb,p.image,c.* FROM sdw_product p LEFT JOIN sdw_product_cat c ON c.cid=p.cid WHERE p.status=0 AND p.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT 0,$num";
	$query = $db->query($sql);
	while ($productrs = $db->fetch_array($query)){
		$productrs['prourl'] = $cfg['isstatic']==1 ? 'detail-'.$productrs['id'].'.html' : 'detail.php?id='.$productrs['id'];
		$productrs['caturl'] = $cfg['isstatic']==1 ? 'product-'.$productrs['cid'].'-1.html' : 'product.php?cid='.$productrs['cid'];
		$products[] = $productrs;
	}
	return $products;
}

/*
 * 获取产品分页列表
 */
function get_products_list($cid=0,$page=1,$pagesize,$orderby='',$ordersort='DESC'){
	global $db,$cfg;
	$products = array();
	switch ($orderby){
		case 'id' : $order_by = 'p.id';
		break;
		case 'click' : $order_by = 'p.views';
		break;
		case 'time' : $order_by = 'p.dateline';
		break;
		case 'rand' : $order_by = 'RAND()';
		break;
		default: $order_by = 'p.id';
		break;
	}
	$cid = isset($cid) ? $cid : 0;
	$wheresql = $cid>0 ? "AND (c.cid=$cid OR c.cup=$cid)" : '';
	$start_limit = ($page-1)*$pagesize;
	$sql = "SELECT p.id,p.proname,p.price,p.size,p.thumb,p.image,c.* FROM sdw_product p LEFT JOIN sdw_product_cat c ON c.cid=p.cid WHERE p.status=0 AND p.audited=1 $wheresql ORDER BY $order_by $ordersort LIMIT $start_limit,$pagesize";
	$query = $db->query($sql);
	while ($productrs = $db->fetch_array($query)){
		$productrs['prourl'] = $cfg['isstatic']==1 ? 'detail-'.$productrs['id'].'.html' : 'detail.php?id='.$productrs['id'];
		$productrs['caturl'] = $cfg['isstatic']==1 ? 'product-'.$productrs['cid'].'-1.html' : 'product.php?cid='.$productrs['cid'];
		$products[] = $productrs;
	}
	return $products;
}

/*
 * 获取导航栏
 */
function get_navs($displayall=false){
	global $db;
	$navarray = array();
	$wheresql = !$displayall ? "WHERE nav_display=1" : '';
	$query = $db->query("SELECT * FROM sdw_nav $wheresql ORDER BY nav_order ASC,nav_id ASC");
	while ($navrs = $db->fetch_array($query)){
		$navrs['target'] = $navrs['nav_open']==1 ? ' target="_blank"' : '';
		$navarray[$navrs['nav_position']][$navrs['nav_up']][] = $navrs;
	}
	return $navarray;
}

/*
 * 获取幻灯片图片
 */
function get_slide($num=5){
	global $db;
	$slides = array();
	$query = $db->query("SELECT * FROM sdw_slide ORDER BY flash_id DESC LIMIT 0,$num");
	while ($sliders = $db->fetch_array($query)){
		$slides[] = $sliders;
	}
	return $slides;
}

/*
 * 获取友情链接
 */
function get_friendlink($num=30){
	global $db;
	$linkarray = array();
	$linkquery = $db->query("SELECT * FROM sdw_friendlink WHERE link_show=1 ORDER BY link_order ASC,link_id ASC LIMIT 0,$num");
	while ($linkrs = $db->fetch_array($linkquery)){
		$linkarray[] = $linkrs;
	}
	return $linkarray;
}

function get_tags($num=10,$orderby='hot'){
	global $db;
	$tagarray = array();
	$ordersql = $orderby=='hot' ? ' ORDER BY num DESC' : 'ORDER BY id DESC';
	$query = $db->query("SELECT * FROM sdw_tags $ordersql LIMIT 0,$num");
	while ($tagrs = $db->fetch_array($query)){
		$tagarray[] = $tagrs;
	}
	return $tagarray;
}

function get_contactinfo(){
	global $db;
	$contact = array();
	$contact = $db->get_one("SELECT * FROM sdw_contact LIMIT 1");
	$contact['men'] = explode('||',$contact['con_man']);
	$contact['fax'] = explode('||',$contact['con_fax']);
	$contact['tel'] = explode('||',$contact['con_tel']);
	$contact['email'] = explode('||',$contact['con_email']);
	$contact['ww'] = explode('||',$contact['con_oicq']);
	$contact['msn'] = explode('||',$contact['con_msn']);
	$contact['ww'] = explode('||',$contact['con_ww']);
	$contact['mobile'] = explode('||',$contact['con_mobile']);
	return $contact;
}
?>
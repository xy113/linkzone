<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-10
 * $Id: index.php
*/ 
define('CURSCRIPT', 'index');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $slides = $category = array();
$articles['news'] = get_articles(1,5);
$about = $db->get_one("SELECT id,title,content FROM sdw_about WHERE id=1");
$about['content'] = cutstr(strip_html($about['content']),800,'...');
$smarty->assign('about',$about);
//$products['new'] = get_products(0,5);
//$images['new'] = get_images(0,5);
//$videos['recommend'] = get_videos(0,1,36,0,1);
//$videos['new'] = get_videos(0,8);

$smarty->assign('slides',get_slide(5));
$smarty->assign('friendlink',get_friendlink());
//$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
//$smarty->assign('products',$products);
//$smarty->assign('videos',$videos);
//$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
//$smarty->assign('tags',get_tags());
$smarty->display('index.htm');
?>
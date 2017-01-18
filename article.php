<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-11
 * $Id: article.php
*/ 
define('CURSCRIPT','article');
$articles = $images = $videos = $products = $category = array();
require_once dirname(__FILE__).'/include/common.inc.php';$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$db->query("UPDATE sdw_articles SET views=views+1 WHERE id=$id");
$article = $db->get_one("SELECT a.*,c.cup,c.name,c.keywords,c.description FROM sdw_articles AS a,sdw_article_cat AS c WHERE c.cid=a.cid AND a.status=0 AND a.id=$id");
if (!$article){
	message('您要查看的信息可能已被删除!',1,'index.php');
}else {	$smarty->assign('article',$article);	
}
$category['article'] = get_article_category();
//$articles['related'] = get_articles($article['cid'],5);
//$articles['hot'] = get_articles(0,10,36,0,0,'click');

//$images['hot'] = get_images(0,4,36,0,0,'click');
//$videos['hot'] = get_videos(0,10,36,0,0,'click');
$result = $db->get_one("SELECT id,title FROM sdw_articles WHERE cid=$article[cid] AND id<$id AND audited=1 ORDER BY id DESC LIMIT 0,1");
if ($result){
	$smarty->assign('nextpage','下一篇:<a href="article.php?id='.$result['id'].'">'.$result['title'].'</a>');
}else {
	$smarty->assign('nextpage','下一篇:没有了');
}

$result = $db->get_one("SELECT id,title FROM sdw_articles WHERE cid=$article[cid] AND id>$id AND audited=1 ORDER BY id ASC LIMIT 0,1");
if ($result){
	$smarty->assign('prevpage','上一篇:<a href="article.php?id='.$result['id'].'">'.$result['title'].'</a>');
}else {
	$smarty->assign('prevpage','上一篇:没有了');
}

if ($article['cid']==2){
	$articles[2] = get_articles(2,20,36,0,0,'','ASC');
}
$category = get_article_category();
$smarty->assign('category',$category[$article['cup']]);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->assign('slides',get_slide());
$smarty->display('article.htm');
?>
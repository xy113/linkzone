<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-13
 * $Id: views.php
*/ 
define('CURSCRIPT','views');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$fid = isset($_GET['fid']) ? intval($_GET['fid']) : 0;
if ($id<=0){
	header('location:/err.php');
}

$db->query("UPDATE sdw_image SET views=views+1 WHERE id=$id");
$image = $db->get_one("SELECT i.*,c.name FROM sdw_image i,sdw_image_cat c WHERE c.cid=i.cid AND i.status=0 AND i.id=$id");
if ($image){
	$smarty->assign('image',$image);
}else {
	header('location:/err.php');
}

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$filearray = array();
$query = $db->query("SELECT * FROM sdw_image_files WHERE gid=$id ORDER BY fid ASC");
while ($filers = $db->fetch_array($query)){
	$filers['filesize'] = round(($filers['filesize']/1024),2).'KB';
	$filearray[] = $filers;
}
$pagecount = count($filearray);
$smarty->assign('file',$filearray[$page-1]);
$smarty->assign('pageno','['.$page.'/'.$pagecount.']');
$smarty->assign('pagelink',viewspage($page,$pagecount,$id));

$prev = $next = '';
$nextinfo = $db->get_one("SELECT id FROM sdw_image WHERE cid=$image[cid] AND id<$id ORDER BY id DESC LIMIT 0,1");
if ($nextinfo){
	$next = 'views-'.$nextinfo['id'].'.html';
}else {
	$nextinfo = $db->get_one("SELECT id FROM sdw_image WHERE cid=$image[cid] ORDER BY id DESC LIMIT 0,1");
	$next = 'views-'.$nextinfo['id'].'.html';
}

$previnfo = $db->get_one("SELECT id FROM sdw_image WHERE cid=$image[cid] AND id>$id ORDER BY id ASC LIMIT 0,1");
if ($previnfo){
	$prev = 'views-'.$previnfo['id'].'.html';
}else {
	$previnfo = $db->get_one("SELECT id FROM sdw_image WHERE cid=$image[cid] ORDER BY id ASC LIMIT 0,1");
	$prev = 'views-'.$previnfo['id'].'.html';
}

$smarty->assign('prev',$prev);
$smarty->assign('next',$next);

if ($page<=1){
	$prevpage = $prev;
}else {
	$prevpage = 'views-'.$id.'-'.($page-1).'.html';
}

if ($page>=$pagecount){
	$nextpage = $next;
}else {
	$nextpage = 'views-'.$id.'-'.($page+1).'.html';
}

$smarty->assign('prevpage',$prevpage);
$smarty->assign('nextpage',$nextpage);

$articles['hot'] = get_articles(0,10,36,0,0,'click');
$images['hot'] = get_images(0,4,36,0,0,'click');
$images['related'] = get_images($image['cid'],4);
$videos['hot'] = get_videos(0,3,36,0,0,'click');

//$category['video'] = get_video_category($video['cid']);
$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->display('views.htm');

/*
 * function
 */
function viewspage($page,$total,$mid){ 
	$prevs  = $page-5;  
	if($prevs<=0)$prevs=1; 
	$prev = $page==1 ? 1 :$page-1;
	if($prev<=0) $prev=1;
	$nexts = $page+5;
	if($nexts>$total)$nexts=$total; 
	$next = $page==$total ? $total :$page+1;
	if($next>$total)$next=$total; 
	$pagenavi = '';
	//$pagenavi="<a href =\"views-$mid-1.html\">首页</a>"; 
	if ($page>1)$pagenavi.="<a href =\"views-$mid-$prev.html\">上一页</a>"; 
	for($i=$prevs;$i<=$page-1;$i++){ 
	   $pagenavi.="<a href = \"views-$mid-$i.html\">$i</a>"; 
	} 

	$pagenavi.="<span class=\"cur\">$page</span>"; 
	for($i=$page+1;$i<=$nexts;$i++){ 
	   $pagenavi.="<a href =\"views-$mid-$i.html\">$i</a>"; 
	} 

	if ($page<$total)$pagenavi.="<a href=\"views-$mid-$next.html\">下一页</a>"; 
	//$pagenavi.="<a href=\"/views/$mid/$total/\">尾页</a>"; 
	return $pagenavi ; 
}
?>
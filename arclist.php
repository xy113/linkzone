<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.maomaoc.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-10
 * $Id: arclist.php
*/ 
define('CURSCRIPT','arclist');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();
$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
$pagesize = 20;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page<1 ? 1 : $page;
$wheresql = $cid>0 ? " AND (c.cid=$cid OR c.cup=$cid)" : "";
$sql = "SELECT a.id,a.title,a.dateline,a.views,a.author,a.content, c.* FROM sdw_articles a LEFT JOIN sdw_article_cat c ON c.cid=a.cid WHERE a.status=0 AND a.audited=1 $wheresql";
$count = $db->get_rows($sql);
$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
$start_limit = ($page-1)*$pagesize;
//$articles['list'] = get_article_list($cat_id,$page,$pagesize);
$query = $db->query($sql." ORDER BY a.id DESC LIMIT $start_limit,$pagesize");
while ($arcrs = $db->fetch_array($query)){
	$arcrs['arcurl'] = $cfg['isstatic']==1 ? 'article-'.$arcrs['id'].'.html' : 'article.php?id='.$arcrs['id'] ;
	$arcrs['content'] = cutstr(strip_html($arcrs['content']),290,'...');
	$articles['list'][] = $arcrs;
}
$smarty->assign('pagelink',$cfg['isstatic']==1 ? articlepage($page,$pagecount,$cid) : pagination($page,$pagecount,'cid='.$cid));
$curcategory = get_curcategory($cid);
$topcategoryid = $curcategory['cup']==0 ? $curcategory['cid'] : $curcategory['cup']; 
$smarty->assign('curcategory',$curcategory);
$smarty->assign('topcategoryid',$topcategoryid);

$category['article'] = get_article_category($cid);
$articles['hot'] = get_articles(0,10,36,0,0,'click');

$images['hot'] = get_images(0,4,36,0,0,'click');
$videos['hot'] = get_videos(0,10,36,0,0,'click');

$smarty->assign('category',$category['article'][$topcategoryid]);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->assign('slides',get_slide());
$smarty->display('arclist.htm');/*
 *function 
 */
function articlepage($page,$total,$cid){ 
	$prevs=$page-5;  
	if($prevs<=0)$prevs=1; 
	$prev =$page-1;
	if($prev<=0) $prev=1;
	$nexts=$page+5;
	if($nexts>$total)$nexts=$total; 
	$next=$page+1;
	if($next>$total)$next=$total; 
	$pagenavi="<a href =\"arclist-{$cid}-1.html\">首页</a>"; 
	$pagenavi.="<a href =\"arclist-{$cid}-{$prev}.html\">上一页</a>"; 
	for($i=$prevs;$i<=$page-1;$i++){ 
	   $pagenavi.="<a href = \"arclist-{$cid}-{$i}.html\">$i</a>"; 
	} 
	$pagenavi.="<span class=\"cur\">$page</span>"; 
	for($i=$page+1;$i<=$nexts;$i++){ 
	   $pagenavi.="<a href =\"arclist-{$cid}-{$i}.html\">$i</a>"; 
	} 
	$pagenavi.="<a href=\"arclist-{$cid}-{$next}.html\">下一页</a>"; 
	$pagenavi.="<a href=\"arclist-{$cid}-{$total}.html\">尾页</a>"; 
	return $pagenavi ; 
}

function get_curcategory($cid){
	global $db;
	$categoryrs = $db->get_one("SELECT * FROM sdw_article_cat WHERE cid=$cid LIMIT 1");
	if (!$categoryrs){
		$categoryrs['name'] = '文章列表';
		$categoryrs['cid'] = 0;
		$categoryrs['cup'] = 0;
		return $categoryrs;
	}
	return $categoryrs;
}
?>
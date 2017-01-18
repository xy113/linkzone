<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2011-04-18
 * $Id: team.php
*/ 
define('CURSCRIPT', 'team');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $teams = $members = $category = array();

$pagesize = 30;
$tid = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page<1 ? 1 : $page;
$start_limit = ($page-1)*$pagesize;
$sql = $tid>0 ? "SELECT m.mid,m.name,m.tid,m.tel,m.email,m.photo,t.name as tname FROM sdw_team_members m ".
"LEFT JOIN sdw_teams t ON t.tid=m.tid WHERE m.tid=$tid"
:
"SELECT m.mid,m.name,m.tid,m.tel,m.email,m.photo,t.name as tname FROM sdw_team_members m ".
"LEFT JOIN sdw_teams t ON t.tid=m.tid";
$count = $db->get_rows($sql);
$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
$page = $page<$pagecount ? $pagecount : $page;
$query = $db->query($sql." ORDER BY m.ordernum ASC,m.mid ASC LIMIT $start_limit,$pagesize");
while ($result = $db->fetch_array($query)){
	$members['list'][] = $result;
}
$smarty->assign('members',$members);
$smarty->assign('pagelink',pagination($page,$pagecount,'tid='.$tid));

$query = $db->query("SELECT tid,name FROM sdw_teams ORDER BY tid ASC");
while ($result = $db->fetch_array($query)){
	$teams[] = $result;
}
$smarty->assign('tid',$tid);
$smarty->assign('teams',$teams);
$smarty->assign('articles',$articles);
$smarty->assign('navs',get_navs());
$smarty->display('team.htm');
?>
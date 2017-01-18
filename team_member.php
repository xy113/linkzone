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
 * $Id: team_member.php
*/ 
define('CURSCRIPT', 'team_member');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $teams = $members = $category = array();

$mid = isset($_GET['mid']) ? intval($_GET['mid']) : 0;
$memberdata = $db->get_one("SELECT m.*,t.name as tname FROM sdw_team_members m,sdw_teams t WHERE t.tid=m.tid AND m.mid=$mid");
if ($memberdata){
	$smarty->assign('member',$memberdata);
}else {
	message('您所查看的信息可能已经被删除!',1,'index.php');
}

$query = $db->query("SELECT tid,name FROM sdw_teams ORDER BY tid ASC");
while ($result = $db->fetch_array($query)){
	$teams[] = $result;
}

$smarty->assign('teams',$teams);
$smarty->assign('articles',$articles);
$smarty->assign('navs',get_navs());
$smarty->display('team_member.htm');
?>
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
 * $ID: admin_teams.php
*/ 
define("CURSCRIPT",'admin_teams');
require_once dirname(__FILE__).'/include/common.inc.php';
if ($_GET['action']=='edit_order'){
	$mid = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$ordernum = isset($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_team_members SET ordernum='$ordernum' WHERE mid=$mid");
	dexit($ordernum);
}
$_GET['action2'] = isset($_GET['action2']) ? trim($_GET['action2']) : '';
if ($_GET['action2'] == 'saveteam'){
	$name = isset($_GET['name']) ? trim($_GET['name']) : '';
	if (!empty($name)){
		$db->query("INSERT INTO sdw_teams(name)VALUES('$name')");
		$tid = $db->insert_id();
	}
	$teams = get_teams($tid ? $tid : 0);
	foreach ($teams as $team) {
		echo '<option value="'.$team['tid'].'"'.$team['selected'].'>'.$team['name'].'　ID:'.$team['tid'].'</option>\n';
	}
	dexit();
}

if ($_GET['action2'] == 'dropteam'){
	$tid = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
	$db->query("DELETE FROM sdw_teams WHERE tid=$tid");
	$teams = get_teams($tid ? $tid : 0);
	foreach ($teams as $team) {
		echo '<option value="'.$team['tid'].'"'.$team['selected'].'>'.$team['name'].'　ID:'.$team['tid'].'</option>\n';
	}
	dexit();
}

if ($_GET['action']=='save'){
	$member['mid'] = isset($_POST['mid']) ? intval($_POST['mid']) : 0;
	$member['name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
	$member['tel'] = isset($_POST['tel']) ? trim($_POST['tel']) : '';
	$member['tid'] = isset($_POST['tid']) ? intval($_POST['tid']) : 0;
	$member['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
	$member['homepage'] = isset($_POST['homepage']) ? trim($_POST['homepage']) : '';
	$member['photo'] = isset($_POST['photo']) ? trim($_POST['photo']) : '';
	$member['profile'] = isset($_POST['profile']) ? trim($_POST['profile']) : '';
	
	if ($member['mid']>0){
		$db->query("UPDATE sdw_team_members SET name='$member[name]',tel='$member[tel]',tid='$member[tid]',
		email='$member[email]',homepage='$member[homepage]', photo='$member[photo]',profile='$member[profile]' WHERE mid=$member[mid]");
		if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);
	}else {
		$db->query("INSERT INTO sdw_team_members(name,tid,tel,email,homepage,photo,profile,ordernum)VALUES
		('$member[name]','$member[tid]','$member[tel]','$member[email]','$member[homepage]','$member[photo]','$member[profile]','0')");
		if (!$inajax)showmsg($LANG['save_success'],0);
	}
}

if ($_GET['action']=='addnew'){
	//$tid = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
	$smarty->assign('editor',get_editor('profile'));
}

if ($_GET['action'] == 'edit'){
	$mid = isset($_GET['mid']) ? intval($_GET['mid']) : 0;
	$memberdata = $db->get_one("SELECT * FROM sdw_team_members WHERE mid=$mid");
	if ($memberdata){
		$smarty->assign('member',$memberdata);
		$smarty->assign('editor',get_editor('profile',$memberdata['profile']));
	}
}

if ($_GET['action']=='drop'){
	$memberid = isset($_GET['id']) ? trim($_GET['id']) : '0';
	$db->query("DELETE FROM sdw_team_members WHERE mid IN ($memberid)");
	if (!$inajax)showmsg($LANG['delete_success']);
}

if ($_GET['action'] == 'moveto'){
	$tid = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
	$memberid = isset($_GET['id']) ? trim($_GET['id']) : '0';
	$db->query("UPDATE sdw_team_members SET tid=$tid WHERE mid IN ($memberid)");
}

if ($_GET['action']=='list' || $inajax){
	$members = array();
	$pagesize = 20;
	$os = isset($_GET['os']) ? trim($_GET['os']) : 'DESC';
	$tid = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page = $page < 1 ? 1 : $page;
	$start_limit = ($page-1)*$pagesize;
	$sql = $tid>0 ? " SELECT m.mid,m.tid,m.name,m.tel,m.email,m.homepage,m.ordernum,t.name as tname FROM sdw_team_members m ".
	"LEFT JOIN sdw_teams t ON t.tid=m.tid WHERE m.tid=$tid"
	:
	" SELECT m.mid,m.tid,m.name,m.tel,m.email,m.homepage,m.ordernum,t.name as tname FROM sdw_team_members m ".
	"LEFT JOIN sdw_teams t ON t.tid=m.tid";
	$count = $db->get_rows($sql);
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;
	
	$query = $db->query($sql." ORDER BY m.ordernum $os,m.mid $os LIMIT $start_limit,$pagesize");
	while ($result = $db->fetch_array($query)){
		$result['mmurl'] = '../team_member.php?mid='.$result['mid'];
		$members[] = $result;
	}
	$smarty->assign('records',$count);
	$smarty->assign('page',$page);
	$smarty->assign('pagelink',page_ajax($page,$pagecount,'tid='.$tid));
	$smarty->assign('members',$members);
}
$tid = isset($tid) ? $tid : isset($_GET['tid']) ? intval($_GET['tid']) : 0;
$smarty->assign('teams',get_teams($tid));
$smarty->display('admin_teams.htm');
if (!$inajax)page_end();
/*
 * function
 */
function get_teams($tid=0){
	global $db;
	$teams = array();
	$query = $db->query("SELECT tid,name FROM sdw_teams ORDER BY tid ASC");
	while ($result = $db->fetch_array($query)){
		$result['selected'] = $result['tid']==$tid ? ' selected="selected"' : '';
		$teams[] = $result;
	}
	return $teams;
}
?>
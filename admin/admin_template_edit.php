<?php
/**
 * ============================================================================
 * 版权所有 (C)2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Author: David Song
 * $Date: 2009-08-13
 * $ID: admin_template_edit.php
*/ 
define("CURSCRIPT",'admin_template_edit');
require_once './include/common.inc.php';
/* act操作项的初始化 */
if (empty($_GET['action'])){
    $_GET['action'] = 'list';
}else{
    $_GET['action'] = trim($_GET['action']);
}

//=====================
if($_GET['action']=='edit_name') {
    $tpl_id   = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
	$tpl_name = !empty($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_template_detail SET tpl_name='$tpl_name' WHERE tpl_id=$tpl_id");
	echo $tpl_name;
	exit();
}

//=====================
if($_GET['action']=='edit_file') {
    $tpl_id   = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
	$tpl_file = !empty($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_template_detail SET tpl_file='$tpl_file' WHERE tpl_id=$tpl_id");
	echo $tpl_file;
	exit();
}

//=====================
if($_GET['action']=='edit_author') {
    $tpl_id   = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
	$tpl_author = !empty($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_template_detail SET tpl_author='$tpl_author' WHERE tpl_id=$tpl_id");
	echo $tpl_author;
	exit();
}

//=====================
if($_GET['action']=='edit_order') {
    $tpl_id   = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
	$tpl_order = !empty($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_template_detail SET tpl_order='$tpl_order' WHERE tpl_id=$tpl_id");
	echo $tpl_order;
	exit();
}

//=====================
if($_GET['action']=='save'){
    $tpl['tpl_name']   = !empty($_GET['tpl_name'])   ? trim($_GET['tpl_name']) : '';
	$tpl['tpl_file']   = !empty($_GET['tpl_file'])   ? trim($_GET['tpl_file']) : '';
	$tpl['tpl_author'] = !empty($_GET['tpl_author']) ? trim($_GET['tpl_author']) : '';
	$tpl['tpl_order']  = !empty($_GET['tpl_order'])  ? intval($_GET['tpl_order']) : 0;
	$tpl_query = "INSERT INTO sdw_template_detail(tpl_name,tpl_file,tpl_author,tpl_order)VALUES".
	"('".$tpl['tpl_name']."','".$tpl['tpl_file']."','".$tpl['tpl_author']."','".$tpl['tpl_order']."')";
	$db->query($tpl_query);
}

//======================
if($_GET['action']=='del'){
    $db->query("DELETE FROM sdw_template_detail WHERE tpl_id=".intval($_GET['tpl_id']));
}

//=====================

if($_GET['action']=='savefile') {
    $tpl_detail = !empty($_POST['tpl_detail']) ? stripslashes(trim($_POST['tpl_detail'])) : '';
	$tpl_file   = !empty($_POST['tpl_file'])   ? trim($_POST['tpl_file'])   : '';
	$tpl_detail = str_replace(array('&lt;','&gt;'),array('<','>'),$tpl_detail);
	if(php_write('../template/'.$_cfg['sys_template'].'/'.$tpl_file,$tpl_detail)) {
	   showmsg($LANG['edit_success'],0,'?');
	}
}

//======================
if($_GET['action']=='edit') {
    $tplrs = $db->get_one("SELECT * FROM sdw_template_detail WHERE tpl_id=".intval($_GET['tpl_id']));
	$tpl_detail = php_read('../template/'.$_cfg['sys_template'].'/'.$tplrs['tpl_file']);
	$tpl_detail = str_replace(array('<','>'),array('&lt;','&gt;'),$tpl_detail);
	$smarty->assign('tpl_name',$tplrs['tpl_name']);
	$smarty->assign('tpl_detail',$tpl_detail);
	$smarty->assign('tpl_file',$tplrs['tpl_file']);
}else {
	$query=$db->query("SELECT * FROM sdw_template_detail ORDER BY tpl_order ASC,tpl_id ASC");
	while($rs=$db->fetch_array($query)){
		$tpl_list[]=$rs;
	}
	
	$smarty->assign('tpl_list',$tpl_list);
}
$smarty->assign('type',trim($_REQUEST['type']));
$smarty->assign('act',trim($_GET['action']));
$smarty->assign('manage_title',$LANG['tpl_edit']);
if($_GET['action']=='edit') $smarty->assign('ur_here','<a href="?act=list">'.$LANG['tpl_list'].'</a>');
$smarty->display('admin_template_edit.htm');
if(trim($_GET['type']!=='ajax')) page_end();
?>
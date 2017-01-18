<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-05-26
 * $ID: admin_email.php
*/ 
define("CURSCRIPT",'admin_email');
require_once dirname(__FILE__).'/include/common.inc.php';

if ($_GET['action']=='view'){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$smarty->assign('abc',$db->get_one("SELECT * FROM sdw_services WHERE id=$id"));
}

if ($_GET['action'] == 'reply'){
	$mail['mailto'] = isset($_POST['mailto']) ? trim($_POST['mailto']) : '';
	$mail['content'] = isset($_POST['content']) ? trim($_POST['content']) : '';
	
	if (empty($mail['mailto']))showmsg('收件人地址不能为空，请重新填写',1);
	if (empty($mail['content']))showmsg('回复内容不能为空,请重新填写!',1);
	
	// 当发送 HTML 电子邮件时，请始终设置 content-type
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=gb2312" . "\r\n";
	
	// 更多报头
	$headers .= 'From: '.$msg['email']. "\r\n";
	@mail($mail['mailto'],$cfg['sysname'].'回复',$mail['content'],$headers);
	if (!$inajax)showmsg('系统已成功向'.$mail['mailto'].'发送了一封电子邮件。',0,$_SERVER['PHP_SELF']);
}

if ($_GET['action']=='drop'){
	$id = isset($_GET['id']) ? trim($_GET['id']) : '0';
	$db->query("DELETE FROM sdw_services WHERE id IN ('$id')");
	if (!$inajax)showmsg($LANG['drop_success']);
}

if ($_GET['action']=='list' || $inajax){
	$servics = array();
	$pagesize = 20;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page = $page<1 ? 1 : $page;
	$start_limit = ($page-1)*$pagesize;
	$count = $db->get_rows("SELECT  id FROM sdw_services ORDER BY id DESC");
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;
	$query = $db->query("SELECT id,name,tel,email,company,dateline FROM sdw_services ORDER BY id DESC LIMIT $start_limit,$pagesize");
	while ($result = $db->fetch_array($query)){
		$servics[] = $result;
	}
	$smarty->assign('services',$servics);
	$smarty->assign('pagelink',page_ajax($page,$pagecount));
}
$smarty->display('admin_services.htm');
if (!$inajax)page_end();
?>
<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.maomaoc.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-18
 * $Id: service.php
*/ 
define('CURSCRIPT','service');
require_once dirname(__FILE__).'/include/common.inc.php';
$articles = $images = $videos = $products = $category = array();
if ($_GET['action']=='save'){
	$msg['name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
	$msg['tel']  = isset($_POST['tel']) ? trim($_POST['tel']) : '';
	$msg['company'] = isset($_POST['company']) ? trim($_POST['company']) : '';
	$msg['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
	$msg['content'] = isset($_POST['content']) ? trim($_POST['content']) : '';
	
	$db->query("INSERT INTO sdw_services(name,tel,company,email,content,dateline,ipaddr)VALUES
	('$msg[name]','$msg[tel]','$msg[company]','$msg[email]','$msg[content]','$timestamp','$ip')");
	// ������ HTML �����ʼ�ʱ����ʼ������ content-type
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=gb2312" . "\r\n";
	
	// ���౨ͷ
	$headers .= 'From: '.$msg['email']. "\r\n";
	@mail($adminemail,$msg['name'].' Tel:'.$msg['tel'],$msg['content'],$headers);
	message('���������ѳɹ��ύ�����ǻᾡ������ȡ����ϵ!',0,'index.php');
}
$smarty->assign('category',$category);
$smarty->assign('articles',$articles);
$smarty->assign('products',$products);
$smarty->assign('videos',$videos);
$smarty->assign('images',$images);
$smarty->assign('navs',get_navs());
$smarty->display('service.htm');
?>
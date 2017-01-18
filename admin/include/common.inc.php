<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-13
 * $ID: common.inc.php
*/ 
session_start();
set_time_limit(600);
set_magic_quotes_runtime(0);
//==========================================
//��ʼ����ҳ��ִ��ʱ��
//==========================================
$start_time = $end_time = 0;
$mtime = explode(' ', microtime());
$start_time = $mtime[1] + $mtime[0];

define('IN_XSCMS',true);
define('IN_ADMIN',true);
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
!defined('CURSCRIPT') && define('CURSCRIPT', '');
/* ȡ�õ�ǰϵͳ���ڵĸ�Ŀ¼ */
define('ROOT_PATH', str_replace("/admin/include/common.inc.php", '', str_replace('\\', '/', __FILE__)));
define('ADMIN_PATH', str_replace("/include/common.inc.php", '', str_replace('\\', '/', __FILE__)));

if (__FILE__ == ''){
    die('Fatal error code: 0');
}

require_once  ROOT_PATH."/include/config.inc.php";
header("Content-type: text/html;charset=$charset"); 
header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');

@ini_set('session.gc_maxlifetime',60); 
@ini_set('session.auto_start',0);
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies',   1);
@ini_set('max_execution_time',600);
if(PHP_VERSION < '4.1.0') {
	$_GET    = &$HTTP_GET_VARS;
	$_POST   = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV    = &$HTTP_ENV_VARS;
	$_FILES  = &$HTTP_POST_FILES;
	$_SESSION = &$HTTP_SESSION_VARS;
}

if(CURSCRIPT!='index' && CURSCRIPT!='showmsg'){
   if(!($_SESSION['admin_id']||$_SESSION['admin_user'])){
	   echo "<script language='javascript'>window.top.location.href='index.php';</script>";
	   exit();
   }
}

require_once  ROOT_PATH."/include/common.func.php";
require_once  ADMIN_PATH."/include/common.func.php";
if (!MAGIC_QUOTES_GPC){
	if (!empty($_GET)){
		$_GET = daddslashes($_GET);
	}
	if (!empty($_POST)){
		$_POST = daddslashes($_POST);
	}
	
	$_COOKIE = daddslashes($_POST);
	$_REQUEST = daddslashes($_REQUEST);
	$_SESSION = daddslashes($_SESSION);
}

$timestamp = time();
$ip = $_SERVER['REMOTE_ADDR'];
$inajax = !empty($_GET['inajax']);
$_GET['act'] = isset($_GET['act']) ? trim($_GET['act']) : 'list'; 
$_GET['action'] = isset($_GET['action']) ? trim($_GET['action']) : 'list'; 
$_SERVER['HTTP_REFERER'] = isset($_SERVER['HTTP_REFERER']) ?  $_SERVER['HTTP_REFERER'] : 'index.php?act=main';
$_SERVER['PHP_SELF'] = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];

require_once  ROOT_PATH."/include/db_mysql.php";
require_once  ROOT_PATH."/include/content.func.php";
//==========================================
//Mysql Connection
//==========================================
$db = new DB($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
unset($dbhost, $dbuser, $dbpw, $pconnect);
//=================================================
//Smarty
//=================================================
if(!file_exists(ROOT_PATH.'/sysdata/templates_c/admin')){
    @mkdir(ROOT_PATH.'/sysdata/templates_c/admin',0777);
    @chmod(ROOT_PATH.'/sysdata/templates_c/admin',0777);
}

if(!file_exists(ROOT_PATH.'/sysdata/configs')){
    @mkdir(ROOT_PATH.'/sysdata/configs',0777);
    @chmod(ROOT_PATH.'/sysdata/configs',0777);
}

if(!file_exists(ROOT_PATH.'/sysdata/cache/admin')){
    @mkdir(ROOT_PATH.'/sysdata/cache/admin',0777);
    @chmod(ROOT_PATH.'/sysdata/cache/admin',0777);
}
require_once ROOT_PATH."/include/libs/Smarty.class.php";
$smarty=new Smarty();
$smarty->template_dir = ADMIN_PATH.'/templates';
$smarty->compile_dir  = ROOT_PATH.'/sysdata/templates_c/admin';
$smarty->config_dir   = ROOT_PATH.'/sysdata/configs';
$smarty->cache_dir    = ROOT_PATH.'/sysdata/cache';
/*===============================
//װ�����԰�
===============================*/
require_once ADMIN_PATH.'/include/lang.zh_cn.php';
$smarty->assign('lang',$LANG);
/*===============================
//��ȡϵͳ����
================================*/
$sysquery = $db->query("SELECT variable,value FROM sdw_settings");
while(list($key,$value)=$db->fetch_row($sysquery)){
   $cfg[$key] = $value;
}
$islog = !($cfg['islog']==0);
$smarty->assign('cfg',$cfg);
$smarty->assign('act',$_GET['act']);
$smarty->assign('inajax',$inajax);
$smarty->assign('action',$_GET['action']);
/* �ж��Ƿ�֧��gzipģʽ */
/*
if (function_exists('ob_gzhandler')){
    ob_start('ob_gzhandler');
}*/
?>
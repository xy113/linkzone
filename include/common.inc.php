<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-10
 * $ID: common.inc.php
*/ 

@set_time_limit(600);
@set_magic_quotes_runtime(0);
//==========================================
//开始计算页面执行时间
//==========================================
$start_time = $end_time = 0;
$mtime = explode(' ', microtime());
$start_time = $mtime[1] + $mtime[0];

define('IN_XSCMS',true);
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
!defined('CURSCRIPT') && define('CURSCRIPT', '');
/* 取得当前系统所在的根目录 */
define('ROOT_PATH',getcwd());

if (__FILE__ == ''){
    die('Fatal error code: 0');
}
@mkdir(ROOT_PATH.'/sysdata/sessions',0777,true);
@ini_set('session.save_path', ROOT_PATH.'/sysdata/sessions');
session_start();
require_once  ROOT_PATH."/include/config.inc.php";
header("Content-type: text/html;charset=$charset"); 

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


require_once  ROOT_PATH."/include/common.func.php";
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
/*===============================
//获取系统参数
================================*/
$sysquery = $db->query("SELECT variable,value FROM sdw_settings");
while(list($key,$value)=$db->fetch_row($sysquery)){
   $cfg[$key] = $value;
}

if ($cfg['isclosed']==1){
	dexit('<p>'.$cfg['closenotic'].'</p>');
}
//=================================================
//Smarty
//=================================================
if(!file_exists(ROOT_PATH.'/sysdata/templates_c')){
    @mkdir(ROOT_PATH.'/sysdata/templates_c',0777);
    @chmod(ROOT_PATH.'/sysdata/templates_c',0777);
}

if(!file_exists(ROOT_PATH.'/sysdata/configs')){
    @mkdir(ROOT_PATH.'/sysdata/configs',0777);
    @chmod(ROOT_PATH.'/sysdata/configs',0777);
}

if(!file_exists(ROOT_PATH.'/sysdata/cache')){
    @mkdir(ROOT_PATH.'/sysdata/cache',0777);
    @chmod(ROOT_PATH.'/sysdata/cache',0777);
}
require_once ROOT_PATH."/include/libs/Smarty.class.php";
$smarty=new Smarty();
$smarty->template_dir = ROOT_PATH.'/templates/'.$cfg['template'];
$smarty->compile_dir  = ROOT_PATH.'/sysdata/templates_c';
$smarty->config_dir   = ROOT_PATH.'/sysdata/configs';
$smarty->cache_dir    = ROOT_PATH.'/sysdata/cache';

$smarty->assign('cfg',$cfg);
$smarty->assign('action',$_GET['action']);
$smarty->assign('inajax',$inajax);
/* 判断是否支持gzip模式 */
/*
if (function_exists('ob_gzhandler')){
    ob_start('ob_gzhandler');
}*/
?>
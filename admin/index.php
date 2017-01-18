<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-07-10
 * $ID: index.php
*/ 
define("CURSCRIPT",'index');
require_once dirname(__FILE__).'/include/common.inc.php';
//============管理员登录====================
if($_GET['action']=='login'){
	$admin_user = $admin_pass = '';
    $admin_user = trim($_POST['admin_user']);
    $admin_pass = md5(trim($_POST['admin_pass']));
    $checkcode  = trim($_POST['checkcode']);
    if($checkcode != $_SESSION['randcode']){
        if ($islog){
        	writelog($LANG['login_failed'].','.$LANG['checkcode_error'],$admin_user);
        }
        showmsg($LANG['check_code_error'],1);
    }
   
   $userinfo = array();
   $userinfo = $db->get_one("SELECT admin_id,admin_pass FROM sdw_admin_user WHERE admin_user='$admin_user'");
   if(!$userinfo){
        if ($islog){
        	writelog($LANG['login_failed'].','.$LANG['user_not_exist'],$admin_user);
        }
        showmsg($LANG['user_name_error'],1);
   }elseif($userinfo['admin_pass'] != $admin_pass){
        if ($islog){
        	writelog($LANG['login_failed'].','.$LANG['password_error'],$admin_user);
        }
        showmsg($LANG['user_pass_error'],1);
   }else{
        if ($islog)writelog($LANG['login_successful'],$admin_user);
        $_SESSION['admin_id']   = $userinfo['admin_id'];
	    $_SESSION['admin_user'] = $admin_user;
	    $_SESSION['admin_pass'] = $admin_pass;
	    $user_sql = "UPDATE sdw_admin_user SET lastlogin='$timestamp',logintimes=logintimes+1,
		admin_ip='$ip' WHERE admin_id=".$userinfo['admin_id'];
	    $db->query($user_sql);
        header('location:index.php');
	    dexit();
   }
}

//===================退出登录====================
if($_GET['action']=='loginout'){
   //session_destroy();
   $_SESSION['admin_id'] = NULL;
   $_SESSION['admin_user'] = NULL;
   $_SESSION['admin_pass'] = NULL;
   header('location:index.php');
   exit();
}

if ($_GET['action']=='clear_cache'){
	$smarty->clear_cache();
	$smarty->clear_compiled_tpl();
	$smarty->compile_dir  = ROOT_PATH.'/sysdata/templates_c';
	$smarty->clear_cache();
	$smarty->clear_compiled_tpl();
	showmsg($LANG['cache_cleared'],0,'index.php?act=main',false);
}
//===============================================
if(!empty($_SESSION['admin_id']) && !empty($_SESSION['admin_user'])){	
		
    if($_GET['action']=='main'){
    	$counts = array();
    	/*文章统计*/
    	$counts['article_all'] = get_article_count('all');
    	$counts['article_trash'] = get_article_count('trash');
    	$counts['article_unaudited'] = get_article_count('unaudited');
    	$counts['article_commend'] = get_article_count('commend');
    	$counts['article_today'] = get_article_count('today');
        /*产品统计*/
    	$counts['product_all'] = get_product_count('all');
    	$counts['product_commend'] = get_product_count('commend');
    	$counts['product_trash'] = get_product_count('trash');
    	$counts['product_today'] = get_product_count('today');
    	$counts['product_unaudited'] = get_product_count('unaudited');

		/*图库统计*/
    	$counts['image_all'] = get_image_count('all');
    	$counts['image_commend'] = get_image_count('commend');
    	$counts['image_trash'] = get_image_count('trash');
    	$counts['image_unaudited'] = get_image_count('unaudited');
    	$counts['image_today'] = get_image_count('today');

		/*视频统计*/
    	$counts['video_all'] = get_video_count('all');
    	$counts['video_commend'] = get_video_count('commend');
    	$counts['video_trash'] = get_video_count('trash');
    	$counts['video_unaudited'] = get_video_count('unaudited');
    	$counts['video_today'] = get_video_count('today');

		/* 系统信息 */
		$gd_info=gd_info();
		$sys_info['os']            = PHP_OS;
		$sys_info['ip']            = $_SERVER['SERVER_ADDR'];
		$sys_info['web_server']    = $_SERVER['SERVER_SOFTWARE'];
		$sys_info['php_ver']       = PHP_VERSION;
		$sys_info['mysql_ver']     = $db->server_info();
		$sys_info['zlib']          = function_exists('gzclose') ? $LANG['yes']:$LANG['no'];
		$sys_info['safe_mode']     = (boolean) ini_get('safe_mode') ? $LANG['yes']:$LANG['no'];
		$sys_info['safe_mode_gid'] = (boolean) ini_get('safe_mode_gid') ? $LANG['yes'] : $LANG['no'];
		//$sys_info['timezone']      = function_exists("date_default_timezone_get") ? date_default_timezone_get() : $_LANG['no_timezone'];
		$sys_info['socket']        = function_exists('fsockopen') ? $LANG['yes'] : $LANG['no'];
		/* 允许上传的最大文件大小 */
		$sys_info['max_filesize']  = ini_get('upload_max_filesize');
		$sys_info['gd']            = $gd_info['GD Version'];
		$sys_info['charset']       = $charset;
		
        $smarty->assign('sys_info',$sys_info);
        $smarty->assign('counts',$counts);
		$smarty->assign('manage_title',$LANG['admin_home']);
        $smarty->display('admin_main.htm');
	    page_end();
   }else{
   	    $action = $competence = $userinfo = array();
	    $userinfo = getadmininfo($_SESSION['admin_id']);
	    $competence = explode('||',$userinfo['competence']);

        $query = $db->query("SELECT * FROM sdw_admin_action WHERE action_show=1 ORDER BY action_order ASC,action_id ASC");
	    while($actionrs = $db->fetch_array($query)){
	   	   if (in_array($actionrs['action_id'],$competence)||$userinfo['admin_type']==0){
	   	   	   $action[$actionrs['action_up']][] = $actionrs;
	   	   }
	    }
	    $smarty->assign('action',$action);
        $smarty->display('admin_index.htm');
   }
}else{
   $smarty->display('admin_login.htm');
}

//========================
//function
//===================
function get_product_count($key='all'){
   global $db;
   switch($key){
      case 'all':$sql="SELECT COUNT(*) FROM sdw_product";
	  break;
	  case 'trash':$sql="SELECT COUNT(*) FROM sdw_product WHERE status=-1";
	  break;
	  case 'commend':$sql="SELECT COUNT(*) FROM sdw_product WHERE status=0 AND recommend=1";
	  break;
	  case 'today':$sql="SELECT COUNT(*) FROM sdw_product WHERE TO_DAYS(from_unixtime(dateline,'%Y-%m-%d %H:%i:%s'))=TO_DAYS(now())";
	  break;
	  case 'unaudited' : $sql="SELECT COUNT(*) FROM sdw_product WHERE audited=0";
	  break;
	  default:return 0;
   }
   $rs=$db->get_one($sql);
   return $rs['COUNT(*)'];
}

//==================================
function get_article_count($key='all'){
   global $db;
   switch($key){
      case 'all' : $sql="SELECT * FROM sdw_articles";
	  break;
	  case 'trash' : $sql="SELECT * FROM sdw_articles WHERE status=-1";
	  break;
	  case 'unaudited' : $sql="SELECT * FROM sdw_articles WHERE status=0 AND audited=0";
	  break;
	  case 'commend' : $sql="SELECT * FROM sdw_articles WHERE status=0 AND recommend=1";
	  break;
	  case 'today' : $sql="SELECT * FROM sdw_articles WHERE TO_DAYS(from_unixtime(dateline,'%Y-%m-%d %H:%i:%s'))=TO_DAYS(now())";
	  break;
	  default:return 0;
   }
   $count = $db->get_rows($sql);
   return $count;
}

//===========================================
function get_image_count($key='all'){
   global $db;
   switch($key){
      case 'all':$sql="SELECT COUNT(*) FROM sdw_image";
	  break;
	  case 'trash':$sql="SELECT COUNT(*) FROM sdw_image WHERE status=-1";
	  break;
	  case 'commend':$sql="SELECT COUNT(*) FROM sdw_image WHERE status=0 AND recommend=1";
	  break;
	  case 'today':$sql="SELECT COUNT(*) FROM sdw_image WHERE TO_DAYS(from_unixtime(dateline,'%Y-%m-%d %H:%i:%s'))=TO_DAYS(now())";
	  break;
	  case 'unaudited':$sql="SELECT COUNT(*) FROM sdw_image WHERE audited=0";
	  break;
	  default:return 0;
   }
   $rs=$db->get_one($sql);
   return $rs['COUNT(*)'];
}

//===========================
function get_video_count($key='all'){
   global $db;
   switch($key){
      case 'all':$sql="SELECT COUNT(*) FROM sdw_video";
	  break;
	  case 'trash':$sql="SELECT COUNT(*) FROM sdw_video WHERE status=-1";
	  break;
	  case 'commend':$sql="SELECT COUNT(*) FROM sdw_video WHERE status=0 AND recommend=1";
	  break;
	  case 'today':$sql="SELECT COUNT(*) FROM sdw_video WHERE TO_DAYS(from_unixtime(dateline,'%Y-%m-%d %H:%i:%s'))=TO_DAYS(now())";
	  break;
	  case 'unaudited':$sql="SELECT COUNT(*) FROM sdw_video WHERE audited=0";
	  break;
	  default:return 0;
   }
   $rs=$db->get_one($sql);
   return $rs['COUNT(*)'];
}
?>
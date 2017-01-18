<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_template_select.php
*/ 
define("CURSCRIPT",'admin_template_select');
require_once dirname(__FILE__).'/include/common.inc.php';

if ($_GET['action']=='save'){
	$template = isset($_GET['tmp']) ? trim($_GET['tmp']) : 'default';
	$db->query("UPDATE sdw_settings SET value='$template' WHERE variable='template'");
	$smarty->clear_cache();
	$smarty->clear_compiled_tpl();
	$smarty->template_dir = ROOT_PATH.'/templates/'.$cfg['template'];
	$smarty->compile_dir = ROOT_PATH.'/sysdata/templates_c';
	$smarty->clear_cache();
	$smarty->clear_compiled_tpl();
	header('location:'.$_SERVER['HTTP_REFERER']);
}

$templatepath = '../templates';
$dir = dir($templatepath);
while ($file = $dir->read()){
	$filepath = $templatepath.'/'.$file;
	if(is_dir($filepath)){
		if(eregi("^_(.*)$",$file)){
			continue; 
			//#屏蔽FrontPage扩展目录和linux隐蔽目录
		}
		if(eregi("^\.(.*)$",$file)){
			continue;
		}
		$tmp['name'] = $file;
		$tmp['img'] = file_exists($filepath.'/thumb.jpg') ? $filepath.'/thumb.jpg' : 'images/nothumb.jpg';
		$templets[] = $tmp;
	}else {
		continue;	
	}
}

$smarty->assign('templets',$templets);
$smarty->assign('manage_title',$LANG['tmp_manage']);
$smarty->display('admin_template_select.htm');
if (!$inajax)page_end();
?>
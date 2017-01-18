<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-04-26
 * $ID: admin_about_us.php
*/ 
define("CURSCRIPT",'admin_about_us');
require_once './include/common.inc.php';

$smarty->assign('manage_title',$LANG['about_us']);
$smarty->display('admin_about_us.htm');
?>
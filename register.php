<?php
/**
 * ============================================================================
 * 版权所有 (C) WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Author: David Song
 * $Date: 2009-01-12
 * $Id: register.php
*/ 
define('CURSCRIPT', 'login');
define('IN_TOKING',true);
require_once './include/common.inc.php';
$smarty->display('register.htm');
?>
<?php
/**
 * ============================================================================
 * 版权所有 (C) 2008-2009 北京拓垦科技有限公司 All Rights Reserved。
 * 网站地址: http://www.tokingtec.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Author: David Song
 * $Date: 2009-01-12
 * $Id: login.php
*/ 
define('CURSCRIPT', 'login');
define('IN_TOKING',true);
require_once './include/common.inc.php';
$smarty->display('login.htm');
?>
<?php
/**
 * ============================================================================
 * 版权所有 (C)2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_sql.php
*/ 

define("CURSCRIPT",'admin_sql');
require_once dirname(__FILE__).'/include/common.inc.php';

$mysqlmsg = array();
$querynum = 0;
if($_GET['action']=='sqlexecu'){
	require_once ADMIN_PATH.'/include/import.class.php';
	$imp = new import();
    $sql_code = isset($_POST['sql_code']) ? trim($_POST['sql_code']) : '';
	$sql_code = $imp->remove_comment($sql_code);
	$sql_code = str_replace("\r",'',$sql_code);
	$query_items = explode(";\n",$sql_code);
	foreach($query_items as $key=>$value){
		if (!$value)continue;		
		if (!mysql_query($value)){
			$mysqlmsg[] = mysql_error();
			continue;
		}else {
			$mysqlmsg[] = 'Query OK!';
			$querynum++;
		}
	}
	if ($mysqlmsg){
		echo '<ol>';
		foreach ($mysqlmsg as $msg){
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}else {
	$smarty->assign('manage_title',$LANG['import_data']);
	$smarty->display('admin_sql.htm');
	page_end();
}
?>
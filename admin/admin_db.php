<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-07-14
 * $ID: admin_db.php
*/ 
define("CURSCRIPT",'admin_db');
require_once dirname(__FILE__).'/include/common.inc.php';
/*检测表*/
if ($_GET['action']=='checkdb'){
	$op = $sqladd = '';
	$op = isset($_GET['op']) ? trim($_GET['op']) : 'optimiz';
	switch ($op){
		case 'optimiz' : $sqladd = 'OPTIMIZE TABLE ';
		break;
		case 'repair' : $sqladd = 'REPAIR TABLE ';
		break;
		default:$sqladd = 'OPTIMIZE TABLE ';
		break;
	}
	
	$tables = isset($_GET['table']) ? trim($_GET['table']) : '';
	if (!empty($tables)){
		$tables = explode(',',$tables);
		foreach ($tables as $table){
			$db->query($sqladd.$table);
		}
	}
}

/*
 * 备份数据
 */
if ($_GET['action']=='export'){
	$maxsize = 2097152;
	$sqlstr = '';
	$sqlpath = ROOT_PATH.'/sysdata/backup/'.date('Ymd');
	makedir($sqlpath);
	$tables = !empty($_POST['table']) ? $_POST['table'] : null;
	if (!$tables){
		$table = fetchtablelist($tablepre);
		foreach ($table as $tab){
			$tables[] = $tab['Name'];
		}
	}
	foreach ($tables as $table){
		$sql = '';
		$sql .= get_table_df($table);
		$sql .= dump_table($table);
		if (strlen($sqlstr.$sql)>$maxsize){
			$sqlstr = make_head().$sqlstr;
			phpwrite($sqlpath.'/'.get_rand_name().'.sql',$sqlstr);
			$sqlstr = $sql;
		}else {
			$sqlstr .= $sql;
		}
	}
	if (strlen($sqlstr)>0){
		$sqlstr = make_head().$sqlstr;
		phpwrite($sqlpath.'/'.get_rand_name().'.sql',$sqlstr);
	}
	
	showmsg($LANG['bak_success'],0);
}

/*
 * 恢复备份
 */
if ($_GET['action']=='resumefiles'){
	$files = !empty($_POST['file']) ? $_POST['file'] : null;
	require_once ADMIN_PATH.'/include/import.class.php';
	$imp = new import();
	if ($files){
		foreach ($files as $file){
			$file = ROOT_PATH.'/sysdata/backup'.$file;
			$imp->run_all($file);
		}
	}
	showmsg($LANG['import_success'],0);
}

/*
 * 导入文件
 */
if ($_GET['action']=='import'){
	$sqlfile = ROOT_PATH.'/sysdata/backup/database_tmp.sql';
	if (file_exists($sqlfile))@unlink($sqlfile);
	if (!$_FILES['sqlfile']['name']){
		showmsg($LANG['fail_import_file'],1);
	}
	if (!is_uploaded_file($_FILES['sqlfile']['tmp_name'])){
		showmsg($LANG['fail_import_file'],1);
	}
	if (!move_uploaded_file($_FILES['sqlfile']['tmp_name'],$sqlfile)){
		showmsg($LANG['fail_import_file'],1);
	}
	require_once ADMIN_PATH.'/include/import.class.php';
	$imp = new import();
	$imp->run_all($sqlfile);
	if (file_exists($sqlfile))@unlink($sqlfile);
	showmsg($LANG['import_success'],0);
}

/*
 * 数据恢复
 */
if ($_GET['action']=='resume'){
	$bakpath = ROOT_PATH.'/sysdata/backup';
	$curpath = isset($_GET['curpath']) ? trim($_GET['curpath']) : '';
	$curpath = str_replace('.','',$curpath);
	$curpath = ereg_replace('/{1,}','/',$curpath);
	$filetree = array();
	$files = array();
	$bakpath .= $curpath; 
	$dir = dir($bakpath);
	while($file = $dir->read()){
		$filepath = $bakpath.'/'.$file;
		if($file == '.'){
			continue;
		}elseif ($file == '..'){
			if ($curpath=='')continue;
			$folders[] = array(
			   'filename'=>'Parent Directory',
			   'folderlink'=>$_SERVER['PHP_SELF'].'?action=resume&curpath='.urlencode(eregi_replace("[/][^/]*$","",$curpath)),
			   'img'=>'images/img/dir2.gif'
		    );
		}elseif(is_dir($filepath)){
			if(eregi("^_(.*)$",$file)){
				continue; 
				//#屏蔽FrontPage扩展目录和linux隐蔽目录
			}
			if(eregi("^\.(.*)$",$file)){
				continue;
			}
			$folders[] = array(
			   'filename'=>$file,
			   'folderlink'=>$_SERVER['PHP_SELF'].'?action=resume&curpath='.urlencode($curpath.'/'.$file),
			   'img'=>'images/img/dir.gif'
		    );
		}else {
			$filesize = filesize($filepath);
			$filesize = round(($filesize/1024),2).'KB';
			$filetime = filemtime($filepath);
			$filetime = date("Y-m-d H:i:s",$filetime);
			
			$files['filename'] = $file;
			$files['filesize'] = $filesize;
			$files['filetime'] = $filetime;
			$files['filepath'] = $curpath.'/'.$file;
			if (eregi(".(sql|txt)",$file)){
				$files['img'] = 'images/img/txt.gif';
			}else {
				continue;
			}
			$filetree[]=$files;
		}
	}
	$dir->close();
	$smarty->assign('folders',$folders);
	$smarty->assign('filetree',$filetree);
}else {
	$dbsize = 0;
	$tables = fetchtablelist($tablepre);
	$tbcount = count($tables);
	foreach ($tables as $table){
		$dbsize+=$table['Data_length'];
	}
	$dbsize = round(($dbsize/1048576),2);
	$smarty->assign('dbsize',$dbsize);
	$smarty->assign('tbcount',sprintf($LANG['tb_total'],$tbcount));
	$smarty->assign('tables',$tables);
}
$smarty->assign('manage_title',$LANG['data_backup']);
$smarty->display('admin_db.htm');
if (!$inajax)page_end();
/*
 * function
 */
function fetchtablelist($tablepre = '') {
	global $db;
	$arr = explode('.', $tablepre);
	$dbname = isset($arr[1]) ? $arr[0] : '';
	$sqladd = $dbname ? " FROM $dbname LIKE '$arr[1]%'" : "LIKE '$tablepre%'";
	!$tablepre && $tablepre = '*';
	$tables = $table = array();
	$query = $db->query("SHOW TABLE STATUS $sqladd");
	while($table = $db->fetch_array($query)) {
		$table['Name'] = ($dbname ? "$dbname." : '').$table['Name'];
		$tables[] = $table;
	}
	return $tables;
}

function dump_table($table){
	$sql="\r\n-- ----------------------------\r\n-- Table Records for {$table}\r\n-- ----------------------------\r\n";
	$query = mysql_query("SELECT * FROM `{$table}`");
	while ($row = mysql_fetch_row($query)) {
		$sql.=get_insert_sql($table, $row);
	}
	mysql_free_result($query);
	return $sql;
}

function get_insert_sql($table, $row){
	$sql = "INSERT INTO `{$table}` VALUES (";
	$values = array();
	foreach ($row as $value) {
		$values[] = "'" . mysql_real_escape_string($value) . "'";
	}
	$sql .= implode(', ', $values) . ");\n";
	return $sql;
}

 /**
 *  生成备份文件头部
 *
 * @access  public
 * @param   int     文件卷数
 *
 * @return  string  $str    备份文件头部
 */
function make_head(){
	/* 系统信息 */
	global $db;
	$sys_info['os']         = PHP_OS;
	$sys_info['php_ver']    = PHP_VERSION;
	$sys_info['mysql_ver']  = $db->server_info();
	$sys_info['date']       = date('Y-m-d H:i:s');

	$head = "-- SQL Dump Program\r\n".
			 "-- http://www.songdewei.com\r\n".
			 "-- \r\n".
			 "-- DATE : ".$sys_info["date"]."\r\n".
			 "-- MYSQL SERVER VERSION : ".$sys_info['mysql_ver']."\r\n".
			 "-- PHP VERSION : ".$sys_info['php_ver']."\r\n".
			 "-- Author:David Song\r\n";

	return $head;
}
/**
 *  获取指定表的定义
 *
 * @access  public
 * @param   string      $table      数据表名
 * @param   boolen      $add_drop   是否加入drop table
 *
 * @return  string      $sql
 */
function get_table_df($table, $add_drop = false)
{
	global $db;
	$table_df="\r\n-- ----------------------------\r\n-- Table structure for {$table}\r\n-- ----------------------------\r\n";
	if ($add_drop)
	{
		$table_df .= "DROP TABLE IF EXISTS `$table`;\r\n";
	}
	else
	{
		$table_df .= '';
	}
	$res = mysql_query("SHOW CREATE TABLE `$table`");
	$tmp_arr = mysql_fetch_assoc($res);
	$tmp_sql = $tmp_arr['Create Table'];
	$tmp_sql = substr($tmp_sql, 0, strrpos($tmp_sql, ")") + 1); //去除行尾定义。

	if ($db->server_info() >= '4.1')
	{
		$table_df .= $tmp_sql . " ENGINE=MyISAM DEFAULT CHARSET={$GLOBALS['dbcharset']};\r\n";
	}
	else
	{
		$table_df .= $tmp_sql . " TYPE=MyISAM;\r\n\r\n";
	}
	return $table_df;
}
/**
 *  返回一个随机的名字
 *
 * @access  public
 * @param
 *
 * @return      string      $str    随机名称
 */
function get_rand_name(){
	$str = '';
	for ($i = 0; $i < 6; $i++)
	{
		$str .= chr(mt_rand(97, 122));
	}
	$str .= date('Ymd');
	return $str;
}
?>
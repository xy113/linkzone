<?php
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
Class DB {
	var $query_num = 0;
	function DB($dbhost, $dbuser, $dbpw, $dbname, $pconnect = 0) {
		$this->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
	}
	function connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect = 0) {
		$pconnect==0 ? @mysql_connect($dbhost, $dbuser, $dbpw) : @mysql_pconnect($dbhost, $dbuser, $dbpw);
		mysql_errno()!=0 && $this->halt("Connect($pconnect) to MySQL failed");
		if($this->server_info() > '4.1' && $GLOBALS['charset']){
			mysql_query("SET character_set_connection=".$GLOBALS['dbcharset'].", character_set_results=".$GLOBALS['dbcharset'].", character_set_client=binary");
		}
		if($this->server_info() > '5.0'){
			mysql_query("SET sql_mode=''");
		}
		if($dbname) {
			if (!@mysql_select_db($dbname)){
				$this->halt('Cannot use database');
			}
		}
	}
	function close() {
		return mysql_close();
	}
	function select_db($dbname){
		if (!@mysql_select_db($dbname)){
			$this->halt('Cannot use database');
		}
	}
	function server_info(){
		return mysql_get_server_info();
	}
	function query($SQL,$method=''){
		$GLOBALS['tablepre']=='sdw_' or $SQL=str_replace('sdw_',$GLOBALS['tablepre'],$SQL);
		if($method=='U_B' && function_exists('mysql_unbuffered_query')){
			$query = mysql_unbuffered_query($SQL);
		}else{
			$query = mysql_query($SQL);
		}
		$this->query_num++;
		if (!$query) $this->halt('Query Error: ' . $SQL);
		return $query;
	}

	function get_one($SQL){
		$query=$this->query($SQL,'U_B');
		$rs =&mysql_fetch_array($query, MYSQL_ASSOC);
		return $rs;
	}
	
	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}
	
	function fetch_row($query){
	    return mysql_fetch_row($query);
	}

	function affected_rows() {
		return mysql_affected_rows();
	}

	function num_rows($query) {
		$rows = mysql_num_rows($query);
		return $rows;
	}
	
	function get_rows($sql){
	    $query = $this->query($sql);
		$rows = mysql_num_rows($query);
		return $rows;
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		$id = mysql_insert_id();
		return $id;
	}

	function halt($msg='') {
//		echo "{$msg}<br>";
//		echo "Error Message£º".mysql_error();
//		exit();
        $this->DB_ERROR($msg);
	}
	function DB_ERROR($msg) {
		global $dbhost;
		$sqlerror = mysql_error();
		$sqlerrno = mysql_errno();
		$sqlerror = str_replace($dbhost,'dbhost',$sqlerror);
		echo"<html><head><title>SQL Error</title><style type='text/css'>P,BODY{FONT-FAMILY:tahoma,arial,sans-serif;}A { TEXT-DECORATION: none;}a:hover{ text-decoration: underline;}TD { BORDER-RIGHT: 1px; BORDER-TOP: 0px; COLOR: #000000;}</style><body>\n\n";
		echo"<table style='TABLE-LAYOUT:fixed;WORD-WRAP: break-word'><tr><td>$msg";
		echo"<br><br><b>The URL Is</b>:<br>http://$_SERVER[HTTP_HOST]";
		echo"<br><br><b>MySQL Server Error</b>:<br>$sqlerror  ( $sqlerrno )";
		echo"<br><br><b>You Can Get Help In</b>:<br><a target=_blank href=http://www.songdewei.com/><b>http://www.songdewei.com</b></a>";
		echo"</td></tr></table></body></html>";
		exit;
	}
}
?>
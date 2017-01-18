<?php
/**
 * ============================================================================
 * 版权所有 (C)2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-07-14
 * $ID: dump_db.class.php
*/ 

if(!defined('IN_XSCMS')){
   die('Access Denied!');
}

class database{
    var $database='';
	var $max_size  = 2097152; // 2M
	function database($database){
	   $this->database=$database;
	}
	/*****************
	* @列出所有数据表
	*****************/
    function _list_tables(){
      if($this->database){
		 $rs = mysql_list_tables($this->database);
		 $tables = array();
		 while ($row = mysql_fetch_row($rs)) {
			$tables[] = $row[0];
		 }
		 mysql_free_result($rs);
		 return $tables;
	  }
    }
    function cc(){
    	mysql();
    }
	/*****************
	* @导出所有数据表
	*****************/
	function _dump_all_table($filename=''){
	    $tables=$this->_list_tables();
		$db_sql=$this->_make_head();
		if(!$filename)$filename=$this->_get_rand_name().'.sql';
		foreach($tables as $table){
		   $tb_sql.=$this->_get_table_df($table);
		   $query.=$this->_dump_table($table);
		}
		$fp = fopen($filename, 'w');
		$db_sql.=$tb_sql."\r\n-- ----------------------------\r\n-- Records\r\n-- ----------------------------\r\n".$query;
		fwrite($fp,$db_sql);
	}
	/*****************
	* @导出所有表结构
	*****************/
	function _dump_table_struct($filename=''){
	    $tables=$this->_list_tables();
		$db_sql=$this->_make_head();
		if(!$filename)$filename=$this->_get_rand_name().'.sql';
		foreach($tables as $table){
		   $db_sql.=$this->_get_table_df($table);
		}
		$fp = fopen($filename, 'w');
		fwrite($fp,$db_sql);
	}
	/*****************
	* @导出所有表数据
	*****************/
	function _dump_table_data($filename=''){
	    $tables=$this->_list_tables();
		$db_sql=$this->_make_head();
		if(!$filename)$filename=$this->_get_rand_name().'.sql';
		foreach($tables as $table){
		   $db_sql.=$this->_dump_table($table);
		}
		$fp = fopen($filename, 'w');
		fwrite($fp,$db_sql);
	}
	/*****************
	* @导出指定表结构
	*****************/
	function _dump_tables($tables=array(),$filename=''){
		$db_sql=$this->_make_head();
		if(!$filename)$filename=$this->_get_rand_name().'.sql';
		foreach($tables as $table){
		   $tb_sql.=$this->_get_table_df($table);
		   $query.=$this->_dump_table($table);
		}
		$fp = fopen($filename, 'w');
		$db_sql.=$tb_sql."\r\n-- ----------------------------\r\n-- Records\r\n-- ----------------------------\r\n".$query;
		fwrite($fp,$db_sql);
	}
	/*****************
	* @导出单个数据表
	*****************/
	function _dump_table($table){
	    $sql="\r\n-- ----------------------------\r\n-- Table Records for {$table}\r\n-- ----------------------------\r\n";
		$rs = mysql_query("SELECT * FROM `{$table}`");
		while ($row = mysql_fetch_row($rs)) {
			$sql.=$this->_get_insert_sql($table, $row);
		}
		mysql_free_result($rs);
		return $sql;
	}
	
	function _get_insert_sql($table, $row){
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
    function _make_head(){
        /* 系统信息 */
		global $db;
        $sys_info['os']         = PHP_OS;
        $sys_info['php_ver']    = PHP_VERSION;
        $sys_info['mysql_ver']  = $db->server_info();
        $sys_info['date']       = date('Y-m-d H:i:s');

        $head = "-- quchy SQL Dump Program\r\n".
                 "-- http://www.quchy.com\r\n".
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
    function _get_table_df($table, $add_drop = false)
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
}
?>
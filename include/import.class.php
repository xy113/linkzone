<?php
class import
{
    var $current_file;
    /**
     * 替换前表前缀
     *
     * @access  private
     * @var     string      $source_prefix
     */
    var $source_prefix = 'sdw_';

    /**
     * 替换后表前缀
     *
     * @access  private
     * @var     string      $target_prefix
     */
    var $target_prefix = 'sdw_';
	/*****************
	* @类构造函数
	*****************/
    function import($dbhost, $dbuser, $dbpw, $dbname, $pconnect = 0){
	   $this->_connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
	}
	/*****************
	* @连接数据库
	*****************/
	function _connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect = 0) {
		$pconnect==0 ? @mysql_connect($dbhost, $dbuser, $dbpw) : @mysql_pconnect($dbhost, $dbuser, $dbpw);
		mysql_errno()!=0 && die("Connect($pconnect) to MySQL failed");
		if($this->server_info() > '4.1' && $GLOBALS['charset']){
			mysql_query("SET character_set_connection=".$GLOBALS['dbcharset'].", character_set_results=".$GLOBALS['dbcharset'].", character_set_client=binary");
		}
		if($this->server_info() > '5.0'){
			mysql_query("SET sql_mode=''");
		}
		if($dbname) {
			if (!@mysql_select_db($dbname)){
				die('Cannot use database');
			}
		}
	}
	/*****************
	* @关闭数据库
	*****************/
	function _close() {
		return mysql_close();
	}
	/*****************
	* @选择数据库
	*****************/
	function _select_db($dbname){
		if (!@mysql_select_db($dbname)){
			$this->halt('Cannot use database');
		}
	}
	/*****************
	* @取得MYSQL版本信息
	*****************/
	function server_info(){
		return mysql_get_server_info();
	}
	function _query($sql){
	   $sql=trim($sql);
	   if(!$sql)return false;
	   if(!@mysql_query($sql))return false;
	   return true;
	}
    /**
     * 执行所有SQL文件中所有的SQL语句
     *
     * @access  public
     * @param   array       $sql_files     文件绝对路径组成的一维数组
     * @return  boolean     执行成功返回true，失败返回false。
     */
    function _run_all($sql_file){
	    if(!$sql_file)return false;
		$query_items = $this->parse_sql_file($sql_file);
		/* 如果解析失败，则跳过 */
		if (!$query_items){
			return false;
		}
		foreach ($query_items AS $query_item){
			/* 如果查询项为空，则跳过 */
			if (!$query_item){
				continue;
			}
			if (!$this->_query($query_item)){
				continue;
			}
		}
    }
    /**
     * 替换查询串中数据表的前缀。该方法只对下列查询有效：CREATE TABLE,
     * DROP TABLE, ALTER TABLE, UPDATE, REPLACE INTO, INSERT INTO
     *
     * @access  public
     * @param   string      $sql        SQL查询串
     * @return  string      返回已替换掉前缀的SQL查询串。
     */
    function replace_prefix($sql)
    {
        $keywords = 'CREATE\s+TABLE(?:\s+IF\s+NOT\s+EXISTS)?|'
                  . 'DROP\s+TABLE(?:\s+IF\s+EXISTS)?|'
                  . 'ALTER\s+TABLE|'
                  . 'UPDATE|'
                  . 'REPLACE\s+INTO|'
                  . 'INSERT\s+INTO';

        $pattern = '/(' . $keywords . ')(\s*)`?' . $this->source_prefix . '(\w+)`?(\s*)/i';
        $replacement = '\1\2`' . $this->target_prefix . '\3`\4';
        $sql = preg_replace($pattern, $replacement, $sql);

        $pattern = '/(UPDATE.*?WHERE)(\s*)`?' . $this->source_prefix . '(\w+)`?(\s*\.)/i';
        $replacement = '\1\2`' . $this->target_prefix . '\3`\4';
        $sql = preg_replace($pattern, $replacement, $sql);

        return $sql;
    }

    /**
     * 过滤SQL查询串中的注释。该方法只过滤SQL文件中独占一行或一块的那些注释。
     *
     * @access  public
     * @param   string      $sql        SQL查询串
     * @return  string      返回已过滤掉注释的SQL查询串。
     */
    function remove_comment($sql)
    {
        /* 删除SQL行注释，行注释不匹配换行符 */
        $sql = preg_replace('/^\s*(?:--|#).*/m', '', $sql);

        /* 删除SQL块注释，匹配换行符，且为非贪婪匹配 */
        //$sql = preg_replace('/^\s*\/\*(?:.|\n)*\*\//m', '', $sql);
        $sql = preg_replace('/^\s*\/\*.*?\*\//ms', '', $sql);

        return $sql;
    }
    /**
     * 获得分散的查询项
     *
     * @access  public
     * @param   string      $file_path      文件的绝对路径
     * @return  mixed       解析成功返回分散的查询项数组，失败返回false。
     */
    function parse_sql_file($file_path)
    {
        /* 如果SQL文件不存在则返回false */
        if (!file_exists($file_path))
        {
            return false;
        }

        /* 记录当前正在运行的SQL文件 */
        $this->current_file = $file_path;

        /* 读取SQL文件 */
        $sql = implode('', file($file_path));

        /* 删除SQL注释，由于执行的是replace操作，所以不需要进行检测。下同。 */
        $sql = $this->remove_comment($sql);

        /* 删除SQL串首尾的空白符 */
        $sql = trim($sql);

        /* 如果SQL文件中没有查询语句则返回false */
        if (!$sql)
        {
            return false;
        }

        /* 替换表前缀 */
        $sql = $this->replace_prefix($sql);

        /* 解析查询项 */
        $sql = str_replace("\r", '', $sql);
        $query_items = explode(";\n", $sql);

        return $query_items;
    }
}
?>
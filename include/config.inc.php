<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-04-30
 * $Id: config.inc.php
*/ 
//数据库相关变量设置
	$dbhost = 'localhost';			// 数据库服务器
	$dbuser = 'root';			    // 数据库用户名
	$dbpw   = '307718818';		    // 数据库密码
	$dbname = 'lianzong';			    // 数据库名
	$pconnect = '0';		        // 是否持久连接
//系统投入使用后不能修改的变量
	$tablepre = 'sdw_';			// 表名前缀, 同一数据库安装多个系统请修改此处
//COOKIE相关变量设置 
	$cookiepre='sdw_';      // cookie 前缀
	$cookiedomain='';       // cookie 作用域
	$cookiepath='/';        // cookie 作用路径
//小心修改以下变量, 否则可能导致系统无法正常使用

	$database = 'mysql';		// 系统数据库类型，请勿修改
	$dbcharset = 'gbk';			// MySQL 字符集, 可选 'gbk', 'big5', 'utf8', 'latin1', 留空为按照系统字符集设定
	$charset = 'gb2312';			// 系统页面默认字符集, 可选 'gbk', 'big5', 'utf-8'
// [CH] 系统安全设置, 调整以下设置，可以增强系统的安全性能和防御性能
    $adminemail='admin@domain.com';  //系统管理员EMAIL
	$systemfounders = '1';  //系统创始人ID
//判断是否本地服务器
    if(stristr($_SERVER['HTTP_HOST'],'local')||(substr($_SERVER['HTTP_HOST'],0,7)=='192.168')){	   
		$local=true;
	}else{	   
		$local=false;
	}
//是否显示错误信息
    if($local){
	   $debug=true;
	   //Define the constacts
	   define('BASE_URI','/');
	   define('BASE_URL','http://localhost/');
	   //error_reporting(0);
	}else{	   $debug=false;
	   //Define the constacts
	   //error_reporting(0);
	   define('BASE_URI','/');
	   define('BASE_URL','http://www.songdewei.com/');
	}
?>
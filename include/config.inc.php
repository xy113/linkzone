<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010 www.songdewei.com All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-04-30
 * $Id: config.inc.php
*/ 
//���ݿ���ر�������
	$dbhost = 'localhost';			// ���ݿ������
	$dbuser = 'root';			    // ���ݿ��û���
	$dbpw   = '307718818';		    // ���ݿ�����
	$dbname = 'lianzong';			    // ���ݿ���
	$pconnect = '0';		        // �Ƿ�־�����
//ϵͳͶ��ʹ�ú����޸ĵı���
	$tablepre = 'sdw_';			// ����ǰ׺, ͬһ���ݿⰲװ���ϵͳ���޸Ĵ˴�
//COOKIE��ر������� 
	$cookiepre='sdw_';      // cookie ǰ׺
	$cookiedomain='';       // cookie ������
	$cookiepath='/';        // cookie ����·��
//С���޸����±���, ������ܵ���ϵͳ�޷�����ʹ��

	$database = 'mysql';		// ϵͳ���ݿ����ͣ������޸�
	$dbcharset = 'gbk';			// MySQL �ַ���, ��ѡ 'gbk', 'big5', 'utf8', 'latin1', ����Ϊ����ϵͳ�ַ����趨
	$charset = 'gb2312';			// ϵͳҳ��Ĭ���ַ���, ��ѡ 'gbk', 'big5', 'utf-8'
// [CH] ϵͳ��ȫ����, �����������ã�������ǿϵͳ�İ�ȫ���ܺͷ�������
    $adminemail='admin@domain.com';  //ϵͳ����ԱEMAIL
	$systemfounders = '1';  //ϵͳ��ʼ��ID
//�ж��Ƿ񱾵ط�����
    if(stristr($_SERVER['HTTP_HOST'],'local')||(substr($_SERVER['HTTP_HOST'],0,7)=='192.168')){	   
		$local=true;
	}else{	   
		$local=false;
	}
//�Ƿ���ʾ������Ϣ
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
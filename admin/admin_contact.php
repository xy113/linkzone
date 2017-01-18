<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_contact.php
*/ 
define("CURSCRIPT",'admin_contact');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**保存修改后的**/
//=================================
if($_GET['action']=='saveedit'){
   $update_sql = "UPDATE sdw_contact SET con_man='".trim($_POST['con_man'])."', 
      con_tel='".trim($_POST['con_tel'])."',
      con_fax='".trim($_POST['con_fax'])."',
      con_mobile='".trim($_POST['con_mobile'])."',
	  con_oicq='".intval($_POST['con_oicq'])."', 
	  con_email='".trim($_POST['con_email'])."', 
	  con_msn='".trim($_POST['con_msn'])."',
	  con_ww='".trim($_POST['con_ww'])."', 
	  con_postcode='".trim($_POST['con_postcode'])."', 
	  con_address='".trim($_POST['con_address'])."'";
   if($db->query($update_sql)){
      showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
   }
}
$smarty->assign('contact',$db->get_one("SELECT * FROM sdw_contact LIMIT 0,1"));
$smarty->assign('manage_title',$LANG['contact_set']);
$smarty->display('admin_contact.htm');
page_end();
?>
<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_setting.php
*/ 
define("CURSCRIPT",'admin_setting');
require_once dirname(__FILE__).'/include/common.inc.php';
$_GET['op'] = isset($_GET['op']) ? trim($_GET['op']) : 'basic';
//===============更新网站基本信息================
if($_GET['action']=='saveconfig'){
   foreach($_POST as $key=>$value){
      $db->query("UPDATE sdw_settings SET value='$value' WHERE variable='$key'");
      //echo $key.'&nbsp;&nbsp;'.$value.'<br>';
   }
   showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF'].'?op='.$_GET['op']);
}
$handler = array('basic'=>$LANG['basic_set'],'optimization'=>$LANG['optimization_set'],'img'=>$LANG['img_attach_set'],'attachment'=>$LANG['attachments_set']);
$smarty->assign('handler',$handler[$_GET['op']]);
$smarty->assign('manage_title',$LANG['global_set']);
$smarty->assign('op',$_GET['op']);
$smarty->display('admin_settings.htm');
page_end();
?>
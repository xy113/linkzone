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
 * $ID: admin_nav.php
*/ 
define("CURSCRIPT",'admin_nav');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**AJAX修改导航名称**/
//=================================
if($_GET['action']=='edit_name'){
    $nav_id = intval($_GET['id']);
    $nav_name = trim($_GET['val']);
    $db->query("UPDATE sdw_nav SET nav_name='$nav_name' WHERE nav_id=$nav_id");
    dexit($nav_name);
}

if($_GET['action']=='edit_link'){
    $nav_id = intval($_GET['id']);
    $nav_link = trim($_GET['val']);
    $db->query("UPDATE sdw_nav SET nav_link='$nav_link' WHERE nav_id=$nav_id");
    dexit($nav_link);
}
//================================
/**AJAX修改导航排序**/
//=================================
if($_GET['action']=='edit_order'){
    $nav_id = intval($_GET['id']);
    $nav_order = intval($_GET['val']);
    $db->query("UPDATE sdw_nav SET nav_order='$nav_order' WHERE nav_id=$nav_id");
    dexit($nav_order);
}
//================================
/**AJAX切换导航打开方式**/
//=================================
if($_GET['action']=='toggle_open'){
    $nav_id = intval($_GET['id']);
    $navinfo = $db->get_one("SELECT nav_open FROM sdw_nav WHERE nav_id=$nav_id");
    $nav_open = intval($navinfo['nav_open'])==1 ? 0 :1;
    $db->query("UPDATE sdw_nav SET nav_open=$nav_open WHERE nav_id=$nav_id");
    dexit($nav_open);
}
//================================
/**AJAX修改导航是否显示**/
//=================================
if($_GET['action']=='toggle_display'){
    $nav_id = intval($_GET['id']);
    $navinfo = $db->get_one("SELECT nav_display FROM sdw_nav WHERE nav_id=$nav_id");
    $nav_display = intval($navinfo['nav_display'])==1 ? 0 :1;
    $db->query("UPDATE sdw_nav SET nav_display=$nav_display WHERE nav_id=$nav_id");
    dexit($nav_display);
}
//================================
/**保存导航信息**/
//=================================
if($_GET['action']=='save'){
	$nav['nav_id']       = !empty($_POST['nav_id'])       ? intval($_POST['nav_id']) : 0;
	$nav['nav_up']       = !empty($_POST['nav_up'])       ? intval($_POST['nav_up']) : 0;
    $nav['nav_name']     = !empty($_POST['nav_name'])     ? trim($_POST['nav_name']) : '';
    $nav['nav_link']     = !empty($_POST['nav_link'])     ? trim($_POST['nav_link']) : '';
    $nav['nav_position'] = !empty($_POST['nav_position']) ? trim($_POST['nav_position']) : '';
    $nav['nav_open']     = !empty($_POST['nav_open'])     ? intval($_POST['nav_open']) : 0;
    $nav['nav_order']    = !empty($_POST['nav_order'])    ? intval($_POST['nav_order']) : 0;
    
    if ($nav['nav_id']>0){
	    $update_sql = "UPDATE sdw_nav SET nav_up='$nav[nav_up]',nav_name='$nav[nav_name]', nav_link='$nav[nav_link]',nav_position='$nav[nav_position]'".
	    ",nav_open='$nav[nav_open]',nav_order='$nav[nav_order]' WHERE nav_id=".$nav['nav_id'];
	    $db->query($update_sql);
	    if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);    	
    }else {
	    $insert_sql = "INSERT INTO sdw_nav(nav_up,nav_name,nav_link,nav_position,nav_open,nav_order,nav_display,nav_type)VALUES".
	    "('$nav[nav_up]','$nav[nav_name]','$nav[nav_link]','$nav[nav_position]','$nav[nav_open]','$nav[nav_order]','1','1')";
	    $db->query($insert_sql);
	    if ($nav['nav_up']>0){
	    	$db->query("UPDATE sdw_nav SET nav_subs=nav_subs+1 WHERE nav_id=".$nav['nav_up']);
	    }
	    if (!$inajax)showmsg($LANG['save_success'],0,$_SERVER['PHP_SELF']);
    }
}

//================================
/**删除导航信息**/
//=================================
if($_GET['action']=='drop'){
   $nav_id = intval($_GET['nav_id']);
   $navrs = $db->get_one("SELECT nav_type FROM sdw_nav WHERE nav_id='$nav_id' LIMIT 1");
   if($navrs['nav_type']==0) {
      showmsg($LANG['nav_cant_delete'],1,$_SERVER['HTTP_REFERER']);
   }else{
      $db->query("DELETE FROM sdw_nav WHERE nav_id='$nav_id'");
      showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
   }
}

//================================
/**获取导航信息**/
//=================================
if($_GET['action']=='edit'){
	$nav_id = isset($_GET['nav_id']) ? intval($_GET['nav_id']) : 0;
    $nav = $db->get_one("SELECT * FROM sdw_nav WHERE nav_id=$nav_id");
    $smarty->assign('nav',$nav);
}

//================================
/**导航列表**/
//=================================
//printr(get_navs(true));
$smarty->assign('navs',get_navs(true));
$smarty->assign('manage_title',$LANG['nav_set']);
$smarty->display('admin_nav.htm');
if (!$inajax)page_end();
?>
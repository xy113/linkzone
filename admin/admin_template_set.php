<?php
/**
 * ============================================================================
 * 版权所有 (C) 2008-2009 北京毛毛虫工作室 All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Author: David Song
 * $Date: 2009-08-13
 * $ID: admin_template_edit.php
*/ 
define("CURSCRIPT",'admin_template_edit');
require_once './include/common.inc.php';
/* act操作项的初始化 */
if (empty($_GET['action'])){
    $_GET['action'] = 'list';
}else{
    $_GET['action'] = trim($_GET['action']);
}

$smarty->assign('template',get_template());
$smarty->assign('product_category',get_product_category());
$smarty->assign('article_category',get_article_category());
$smarty->assign('image_category',get_image_category());
$smarty->assign('video_category',get_video_category());
$smarty->assign('manage_title',$LANG['tmp_set']);
$smarty->display('admin_template_set.htm');
page_end();

//======================
//======================
function get_template(){
   global $db;
   $query = $db->query("SELECT * FROM sdw_template_detail ORDER BY tpl_order ASC,tpl_id ASC");
   while($rs=$db->fetch_array($query)){
      $template[]=$rs;
   }
   return $template;
}

function get_product_category(){
   global $db;
   $query = $db->query("SELECT * FROM sdw_product_cat ORDER BY cat_order ASC,cat_id ASC");
   while($rs=$db->fetch_array($query)){
      $category[] = $rs;
   }
   return $category;
}

function get_article_category(){
   global $db;
   $query = $db->query("SELECT * FROM sdw_article_cat ORDER BY cat_order ASC,cat_id ASC");
   while($rs=$db->fetch_array($query)){
      $category[] = $rs;
   }
   return $category;
}

function get_image_category(){
   global $db;
   $query = $db->query("SELECT * FROM sdw_image_cat ORDER BY cat_order ASC,cat_id ASC");
   while($rs=$db->fetch_array($query)){
      $category[] = $rs;
   }
   return $category;
}

function get_video_category(){
   global $db;
   $query = $db->query("SELECT * FROM sdw_video_cat ORDER BY cat_order ASC,cat_id ASC");
   while($rs=$db->fetch_array($query)){
      $category[] = $rs;
   }
   return $category;
}

?>
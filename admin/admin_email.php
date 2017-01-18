<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-05-26
 * $ID: admin_email.php
*/ 
define("CURSCRIPT",'admin_email');
require_once dirname(__FILE__).'/include/common.inc.php';
//======================================
/**AJAX修改邮件标题**/
//======================================
if($_GET['action']=='edit_subject'){
   $mail_id    = !empty($_GET['id'])  ? intval($_GET['id']) : 0;
   $mail_title = !empty($_GET['val']) ? addslashes(trim($_GET['val'])) : '';
   $db->query("UPDATE sdw_email SET mail_title='$mail_title' WHERE mail_id=$mail_id");
   echo $mail_title;
   exit();
}

//======================================
/**保存邮件信息**/
//======================================
if($_GET['action']=='save'){
    $mail['mail_id']      = !empty($_POST['mail_id'])      ? intval($_POST['mail_id'])    : 0;
    $mail['mail_from']    = !empty($_POST['mail_from'])    ? trim($_POST['mail_from'])    : $_cfg['sys_email'];
    $mail['mail_to']      = !empty($_POST['mail_to'])      ? trim($_POST['mail_to'])      : '';
    $mail['mail_toall']   = !empty($_POST['mail_toall'])   ? intval($_POST['mail_toall']) : 0;
    $mail['mail_subject'] = !empty($_POST['mail_subject']) ? trim($_POST['mail_subject']) : '';
    $mail['mail_content'] = !empty($_POST['mail_content']) ? trim($_POST['mail_content']) : '';
    $mail['mail_author']  = !empty($_POST['mail_author'])  ? trim($_POST['mail_author'])  : '';
    
    if ($mail['mail_subject']==''){
    	showmsg($LANG['mail_subject_empty'],1);
    }
    
    if (empty($mail['mail_content'])){
    	showmsg($LANG['mail_content_empty'],1);
    }
    
    if (empty($mail['mail_author'])){
    	$mail['mail_author'] = $_SESSION['admin_user'];
    }
    
    if (empty($mail['mail_to'])){
    	showmsg($LANG['mail_to_empty'],1);
    }
    
    $mailarray = array();
    if (isset($_POST['mail_toall']) && intval($_POST['mail_toall'])==1){
    	$query = $db->query("SELECT user_email FROM sdw_user");
    	while ($mailrs = $db->fetch_array($query)){
    		if (isemail($mailrs['user_email'])){
    			$mailarray[] = $mailrs['user_email'];
    		}
    	}
    }

    foreach (explode(',',$mail['mail_to']) as $mailto){
    	if (isemail($mailto)){
    		array_unshift($mailarray,$mailto);
    	}else{
    		continue;
    	}
    }   
    
    $mailarray = array_unique($mailarray);
    $email_to = implode(',',$mailarray);
    // 当发送 HTML 电子邮件时，请始终设置 content-type
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=gb2312" . "\r\n";
	
	// 更多报头
	$headers .= 'From: '.$mail['mail_from']. "\r\n";
	//$headers .= 'Cc: myboss@example.com' . "\r\n";
    
    if ($mail['mail_id']>0){
    	$update_sql = "UPDATE sdw_email SET mail_from='$mail[mail_from]',
    	mail_to='$mail[mail_to]',mail_toall='$mail[mail_toall]',mail_subject='$mail[mail_subject]', 
    	mail_author='$mail[mail_author]',mail_content='$mail[mail_content]',mail_time='$timestamp' WHERE mail_id=".$mail['mail_id'];
    	
    	$db->query($update_sql);
    	if (function_exists('mail')){
	    	if (isset($_GET['send']) && intval($_GET['send'])==1){
	    		mail($email_to,$mail['mail_subject'],$mail['mail_content'],$headers);
	    	}
    	}else{
    		showmsg('SMTP server Unable to relay',1);
    	}
    	if ($inajax!=1)showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']);
    }else {
        $insert_sql = "INSERT INTO sdw_email(mail_from,mail_to,mail_toall,mail_subject,mail_content,mail_author,mail_time)VALUES".
	    "('$mail[mail_from]','$mail[mail_to]','$mail[mail_toall]','".$mail['mail_subject']."','".$mail['mail_content']."','".$mail['mail_author']."','".time()."')";
	    
        $db->query($insert_sql);
        if (function_exists('mail')){
	    	if (isset($_GET['send']) && intval($_GET['send'])==1){
	    		mail($email_to,$mail['mail_subject'],$mail['mail_content'],$headers);
	    	}
    	}else{
    		showmsg('SMTP server Unable to relay',1);
    	}       
        if ($inajax!=1)showmsg($LANG['save_success'],0);
    }
}
//======================================
/**删除邮件信息**/
//======================================
if($_GET['action']=='drop'){
	$mail_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($mail_id)){
		$mail_id = explode(',',$mail_id);
		foreach ($mail_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_email WHERE mail_id=$id");
		}
		if (!$inajax)showmsg($LANG['delete_success'],0);
	} 
}
//======================================
/**获取要修改的邮件信息**/
//======================================
if($_GET['action']=='edit'){
	$mail_id = isset($_GET['mail_id']) ? intval($_GET['mail_id']) : 0;
	$mail = $db->get_one("SELECT * FROM sdw_email WHERE mail_id=$mail_id");
	if ($mail){
		$smarty->assign('maileditor',get_editor('mail_content',$mail['mail_content']));
		$smarty->assign('mail',$mail);
	}else {
		showmsg($LANG['mail_not_exists'],1);
	}
}
//======================================
/**邮件列表**/
//======================================
if($_GET['action']=='list' || $inajax){
	$mails = array();
	$pagesize = 20;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
	$page = $page<1 ? 1 : $page;
    $count = $db->get_rows("SELECT * FROM sdw_email");
    $pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
    $page = $page>$pagecount ? $pagecount : $page;
    $start_limit = ($page-1)*$pagesize;
    $query = $db->query("SELECT * FROM sdw_email ORDER BY mail_id DESC LIMIT $start_limit,$pagesize");
    while($mailrs = $db->fetch_array($query)){
      $mails[] = $mailrs;
    }
    
    $smarty->assign('page',$page);
    $smarty->assign('pagelink',page_ajax($page,$pagecount));
    $smarty->assign('mails',$mails);
}

if ($_GET['action'] == 'addnew')$smarty->assign('maileditor',get_editor('mail_content'));
$smarty->assign('manage_title',$LANG['mail_manage']);
$smarty->display('admin_email.htm');
if (!$inajax)page_end();
?>
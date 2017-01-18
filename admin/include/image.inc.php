<?php
$img = array();
$img['id']      = !empty($_POST['id'])      ? intval($_POST['id']) : 0;
$img['title']   = !empty($_POST['title'])   ? trim($_POST['title']) : '';
$img['cid']     = !empty($_POST['cid'])     ? intval($_POST['cid']) : 0;
$img['tags']    = !empty($_POST['tags'])    ? trim($_POST['tags']) : '';
$img['content'] = !empty($_POST['content']) ? trim($_POST['content']): '';
$img['image']   = !empty($_POST['image'])   ? trim($_POST['image'])  : '';
$img['allowcomment'] = !empty($_POST['allowcomment']) ? intval($_POST['allowcomment']) : 0;
$img['allowvote'] = !empty($_POST['allowvote']) ? intval($_POST['allowvote']) : 0;
$img['recommend'] = !empty($_POST['recommend'])  ? intval($_POST['recommend']) : 0;
$img['audited'] = !empty($_POST['audited']) ? intval($_POST['audited']) : 0;
$img['author'] = $_SESSION['admin_user'];
$img['authorid'] = $_SESSION['admin_id'];

if (empty($img['title'])){
	showmsg($LANG['title_empty'],1);
}else {
	$img['title'] = cutstr($img['title'],50);
}

if ($img['cid']==0){
	showmsg($LANG['please_select_category'],1);
}

if (!empty($img['tags'])){
	$img['tags'] = str_replace(array(' ','กก'),array(',',','),$img['tags']);
	checktags(explode(',',$img['tags']));
}

if ($img['id']>0){
    $update_sql = "UPDATE sdw_image SET title='$img[title]',cid='$img[cid]',tags='$img[tags]',image='$img[image]',
    author='$img[author]',authorid='$img[authorid]',authorip='$ip',content='$img[content]',dateline='$timestamp',allowcomment='$img[allowcomment]',
    allowvote='$img[allowvote]',recommend='$img[recommend]',audited='$img[audited]' WHERE id=".$img['id'];
    
    $db->query($update_sql);
    if (!$inajax){
    	showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF'].'?cid='.$img['cid']);
    }
}else {
	
    $insert_sql = "INSERT INTO sdw_image(title,cid,tags,image,dateline,author,authorid,authorip,content,allowcomment,allowvote,recommend,audited)VALUES".
    "('$img[title]','$img[cid]','$img[tags]','$img[image]','$timestamp','$img[author]','$img[authorid]','$ip',".
    "'$img[content]','$img[allowcomment]','$img[allowvote]','$img[recommend]','$img[audited]')";
   
    if($db->query($insert_sql)){
	    if (!$inajax){
	    	showmsg($LANG['save_success'],0,$_SERVER['PHP_SELF'].'?act=addnew&cid='.$img['cid']);
	    }
    }
}  
?>
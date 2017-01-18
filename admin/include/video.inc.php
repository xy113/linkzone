<?php
$vod = array();
$vod['id']       = !empty($_POST['id'])       ? intval($_POST['id']) : 0;
$vod['title']    = !empty($_POST['title'])    ? trim($_POST['title']) : '';
$vod['cid']      = !empty($_POST['cid'])      ? intval($_POST['cid']) : 0;
$vod['type']     = !empty($_POST['type'])     ? intval($_POST['type']) : 0;
$vod['tags']     = !empty($_POST['tags'])     ? trim($_POST['tags']) : '';
$vod['videourl'] = !empty($_POST['videourl']) ? trim($_POST['videourl']) : '';
$vod['content']  = !empty($_POST['content'])  ? trim($_POST['content']) : '';
$vod['image']    = !empty($_POST['image'])    ? trim($_POST['image']) : '';
$vod['allowcomment']= !empty($_POST['allowcomment'])? intval($_POST['allowcomment']) : 0;
$vod['allowvote']   = !empty($_POST['allowvote'])   ? intval($_POST['allowvote']) : 0;
$vod['recommend']   = !empty($_POST['recommend'])   ? intval($_POST['recommend']) : 0;
$vod['audited']  = !empty($_POST['audited'])  ? intval($_POST['audited']): 0;

$vod['author'] = $_SESSION['admin_user'];
$vod['authorid'] = $_SESSION['admin_id'];

if (!empty($vod['title'])){
	$vod['title'] = cutstr($vod['title'],50);
}else {
	showmsg($LANG['video_title_empty'],1);
}

if (!empty($vod['tags'])){
	$vod['tags'] = cutstr($vod['tags'],50);
	$vod['tags'] = str_replace(array('бб',' ','гм'),array(',',',',','),$vod['tags']);
	checktags(explode(',',$vod['tags']));
}

if ($vod['cid']==0){
	showmsg($LANG['please_select_category'],1);
}

if ($vod['id']>0){
    $update_sql = "UPDATE sdw_video SET title='$vod[title]',cid='$vod[cid]',tags='$vod[tags]',
	image='$vod[image]',videourl='$vod[videourl]',type='$vod[type]',author='$vod[author]',authorid='$vod[authorid]',
	authorip='$ip',dateline = '$timestamp',content='$vod[content]',allowcomment='$vod[allowcomment]',allowvote='$vod[allowvote]',
	recommend='$vod[recommend]',audited='$vod[audited]' WHERE id=".$vod['id'];
    $db->query($update_sql);
    if (!$inajax){
    	showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF'].'?cid='.$vod['cid']);	
    }
}else {
	
    $insert_sql = "INSERT INTO sdw_video(title,cid,tags,image,videourl,type,dateline,author,authorid,authorip,content,allowcomment,recommend,allowvote,audited)VALUES".
    "('$vod[title]','$vod[cid]','$vod[tags]','$vod[image]','$vod[videourl]','$vod[type]','$timestamp',".
    "'$vod[author]','$vod[authorid]','$ip','$vod[content]','$vod[allowcomment]','$vod[recommend]','$vod[allowvote]','$vod[audited]')";
   
    $db->query($insert_sql);
    if (!$inajax){
    	showmsg($LANG['save_success'],0,$_SERVER['PHP_SELF'].'?act=addnew&cid='.$vod['cid']);
    }
}
?>
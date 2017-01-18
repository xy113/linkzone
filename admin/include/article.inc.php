<?php
$arc = array();
if (isset($_POST['title']) && !empty($_POST['title'])){
	//标题不超过50个字节
	$arc['title'] = cutstr(trim($_POST['title']),50);
}else {
	$arc['title'] = '';
	showmsg($LANG['article_title_empty'],1);
}

if (isset($_POST['tags']) && !empty($_POST['tags'])){
	$arc['tags'] = cutstr(trim($_POST['tags']),50);
	$arc['tags'] = str_replace(' ',',',$arc['tags']);
	checktags(explode(',',$arc['tags']));
}else {
	$arc['tags'] = '';
}

if (isset($_POST['source']) && !empty($_POST['source'])){
	$arc['source'] = trim($_POST['source']);
	$sourceinfo = $db->get_rows("SELECT * FROM sdw_article_source WHERE source_name='$arc[source]'");
	if ($sourceinfo==0){
		$db->query("INSERT INTO sdw_article_source(source_name,source_url,source_order)VALUES('$arc[source]','#','100')");
	}
}else {
	$arc['source'] = '';
	showmsg($LANG['article_source_empty'],1);
}


$arc['cid'] = !empty($_POST['cid']) ? intval($_POST['cid']) : 0;
$arc['summary']  = !empty($_POST['summary']) ? cutstr($_POST['summary'],500) : '';
$arc['content']  = !empty($_POST['content']) ? trim($_POST['content']) : '';
$arc['image']    = !empty($_POST['image']) ? trim($_POST['image']) : ''; 
$arc['recommend'] = !empty($_POST['recommend']) ? intval($_POST['recommend']) : 0;
$arc['allowcomment'] = !empty($_POST['allowcomment'])? intval($_POST['allowcomment']) : 0;
$arc['allowvote'] = !empty($_POST['allowvote']) ? intval($_POST['allowvote']) : 0;
$arc['audited']  = !empty($_POST['audited']) ? intval($_POST['audited']) : 0;
$arc['autopage'] = !empty($_POST['autopage']) ? intval($_POST['autopage']) : 0;
$arc['pagesize'] = !empty($_POST['pagesize']) ? intval($_POST['pagesize']) : 0;
$arc['author'] = $_SESSION['admin_user'];
$arc['authorid'] = $_SESSION['admin_id'];
$arc['authorip'] = $_SERVER['REMOTE_ADDR'];

$arc['id'] = isset($_POST['id']) ? intval($_POST['id']) : 0;
if ($arc['id']>0){
	$update_sql = "UPDATE sdw_articles SET title='$arc[title]',tags='$arc[tags]',
	source='$arc[source]',author='$arc[author]',authorid='$arc[authorid]',authorip='$arc[authorip]',cid='$arc[cid]',
	image='$arc[image]',summary='$arc[summary]',content='$arc[content]',dateline='".time()."',
	recommend='$arc[recommend]',allowcomment='$arc[allowcomment]',allowvote='$arc[allowvote]',
	audited='$arc[audited]',autopage='$arc[autopage]',pagesize='$arc[pagesize]' WHERE id=".$arc['id'];
	if ($db->query($update_sql)){
   	    if($islog)writelog($LANG['edit_article'].':'.$arc['title']);
        showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF'].'?cid='.$arc['cid']);
	}
}else{
	/*
	if (checktitle($arc['title'])){
		showmsg($LANG['article_exists'],1);
	}
	*/
	$insert_sql = "INSERT INTO sdw_articles(title,tags,source,author,authorid,authorip,cid,image,summary,content,dateline,recommend,allowcomment,allowvote,autopage,pagesize,audited)VALUES".
	"('$arc[title]','$arc[tags]','$arc[source]','$arc[author]','$arc[authorid]','$arc[authorip]','$arc[cid]','$arc[image]','$arc[summary]',".
	"'$arc[content]','".time()."','$arc[recommend]','$arc[allowcomment]','$arc[allowvote]','$arc[autopage]','$arc[pagesize]','$arc[audited]')";
	   
	if($db->query($insert_sql)){
		$db->query("UPDATE sdw_article_cat SET records=records+1 WHERE cid=$arc[cid] OR cup=$arc[cid]");
	   	if ($islog)writelog($LANG['add_article'].':'.$arc['title']);
		showmsg($LANG['post_success'],0,$_SERVER['PHP_SELF'].'?action=addnew&cid='.$arc['cid']);
	}
}
?>
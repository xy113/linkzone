<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-12-18
 * $ID: admin_jobs.php
*/ 
define("CURSCRIPT",'admin_image');
require_once dirname(__FILE__).'/include/common.inc.php';

if ($_GET['action']=='toggle_audited' && $inajax){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$jobinfo = $db->get_one("SELECT audited FROM sdw_jobs WHERE id=$id");
	$audited = intval($jobinfo['audited'])==1 ? 0 : 1;
	$db->query("UPDATE sdw_jobs SET audited=$audited WHERE id=$id");
	dexit($audited);
}

if ($_GET['action']=='edit_salary' && $inajax){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$salary = isset($_GET['val']) ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_jobs SET salary='$salary' WHERE id=$id");
	dexit($salary);
}

if ($_GET['action']=='edit_numbers' && $inajax){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$numbers = isset($_GET['val']) ? intval($_GET['val']) : 1;
	$db->query("UPDATE sdw_jobs SET numbers='$numbers' WHERE id=$id");
	dexit($numbers);
}

if ($_GET['action']=='save'){
	$job['id'] = !empty($_POST['id']) ? intval($_POST['id']) : 0;
	$job['cid'] = !empty($_POST['cid']) ? intval($_POST['cid']) : 0;
	$job['jobtitle'] = !empty($_POST['jobtitle']) ? trim($_POST['jobtitle']) : '';
	$job['numbers'] = !empty($_POST['numbers']) ? trim($_POST['numbers']) : 1;
	$job['salary'] = !empty($_POST['salary']) ? trim($_POST['salary']) : '';
	$job['jobdescription'] = !empty($_POST['jobdescription']) ? trim($_POST['jobdescription']) : '';
	$job['content'] = !empty($_POST['content']) ? trim($_POST['content']) : '';
	
	if ($job['id']>0){
		$update_sql = "UPDATE sdw_jobs SET jobtitle='$job[jobtitle]',numbers='$job[numbers]',".
		"salary='$job[salary]',jobdescription='$job[jobdescription]',content='$job[content]' WHERE id=".$job['id'];
		$db->query($update_sql);
		if (!$inajax)showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF'].'?cid='.$job['cid']);
	}else {
		$insert_sql = "INSERT INTO sdw_jobs(cid,jobtitle,numbers,salary,jobdescription,content,dateline)VALUES".
		"('$job[cid]','$job[jobtitle]','$job[numbers]','$job[salary]','$job[jobdescription]','$job[content]','$timestamp')";
		$db->query($insert_sql);
		if (!$inajax)showmsg($LANG['save_success']);
	}
}

if ($_GET['action']=='addnew'){
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$smarty->assign('editor',get_editor('content','','98%','240'));
}

if ($_GET['action']=='edit'){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$job = $db->get_one("SELECT * FROM sdw_jobs WHERE id=$id");
	if ($job){
		$cid = $job['cid'];
		$smarty->assign('editor',get_editor('content',$job['content'],'98%','240'));
		$smarty->assign('job',$job);
	}else {
		showmsg('Records do not exist!',1);
	}
}

if ($_GET['action']=='drop'){
	$jobid = isset($_GET['id']) ? trim($_GET['id']) : '';
	$jobid = explode(',',$jobid);
	foreach ($jobid as $id){
		$id = intval($id);
		$db->query("DELETE FROM sdw_jobs WHERE id=$id");
	}
	if (!$inajax)showmsg($LANG['drop_success']);
}

if ($_GET['action']=='list' || $inajax){
	$jobs = array();
	$q = isset($_GET['q']) ? trim($_GET[q]) : '';
	$cid  = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page = $page<1 ? 1 : $page;
	$pagesize = 20;
	$wheresql = $cid>0 ? " AND (c.cid=$cid OR c.cup=$cid)" : '';
	$sql = "SELECT j.id,j.jobtitle,j.numbers,j.salary,j.dateline,j.views,j.audited,c.cid,c.name FROM sdw_jobs j ".
	"LEFT JOIN sdw_jobs_cat c ON c.cid=j.cid WHERE j.jobtitle LIKE '%$q%' $wheresql ORDER BY j.id DESC";
	$count = $db->get_rows($sql);
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;
	$start_limit = ($page-1)*$pagesize;
	$query = $db->query($sql." LIMIT $start_limit,$pagesize");
	while ($jobrs = $db->fetch_array($query)){
		$jobrs['joburl'] = '../job.php?id='.$jobrs['id'];
		$jobs[] = $jobrs;
	}
	
	$smarty->assign('page',$page);
	$smarty->assign('records',$count);
	$smarty->assign('pagelink',page_ajax($page,$pagecount,'cid='.$cid));
	$smarty->assign('jobs',$jobs);
}

$smarty->assign('category',get_jobs_category($cid));
$smarty->assign('manage_title',$LANG['job_manage']);
$smarty->display('admin_jobs.htm');
if (!$inajax)page_end();
?>
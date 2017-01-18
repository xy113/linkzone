<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2011-04-13
 * $ID: admin_image_file.php
*/ 
define("CURSCRIPT",'admin_image_file');
require_once dirname(__FILE__).'/include/common.inc.php';
/*
 * ajax修改说明
 */
if($_GET['action']=='edit_desc') {
    $fid = $_GET['fid']  ? intval($_GET['fid']) : 0;
	$description = $_GET['val'] ? trim($_GET['val']) : '';
	$db->query("UPDATE sdw_image_files SET description='$description' WHERE fid=$fid");
	dexit($description);
}

/*
 * 上传文件
 */
if($_GET['action']=='save') {
	$files['gtype'] = isset($_POST['gtype']) ? intval($_POST['gtype']) : 0;
	$files['gid'] = isset($_GET['gid']) ? intval($_GET['gid']) : 0;
	$uid = $_SESSION['admin_id'];
	
	if ($files['gtype']==0){//本地上传
		$files['description'] = isset($_POST['description1']) ? $_POST['description1'] : '';
		if (isset($_FILES['imagefiles']['name'])&&!empty($_FILES['imagefiles']['name'])){
			require_once ROOT_PATH.'/include/image.class.php';
			$upload = new upload('imagefiles');
		    $upload->upload_save_path = ROOT_PATH.'/'.$cfg['attachdir'] ;
		    $upload->allowed_file_ext = explode("|",$cfg['img_type']);
		    $upload->water_mark       = $cfg['watermark'] ==1 ? true : false;
		    $upload->max_file_size    = $cfg['attachmax'];
		    $upload->small_width      = $cfg['img_width'];
		    $upload->small_height     = $cfg['img_height'];
		    $upload->water_mark       = $cfg['watermark'] == 1 ? true : false;
		    $upload->water_type       = $cfg['watertype'];
		    $upload->water_image      = ROOT_PATH.'/'.$cfg['waterimg'];		    
		    $upload->water_fontfile   = ROOT_PATH.'/'.$cfg['waterfont'];
		    $upload->water_text       = $cfg['watertext'];
		    $upload->water_fontsize   = $cfg['watersize'];
		    $upload->water_fontcolor  = $cfg['watercolor'];
		    $upload->water_pos        = $cfg['waterpos'];
		    $upload->water_alpha      = $cfg['wateralpha'];
		    $upload->water_xoffset    = $cfg['waterxoffset'];
		    $upload->water_yoffset    = $cfg['wateryoffset'];
		    
			$upload->save_local_image();
			if ($debug)$upload->shoError();
			
			$files['filename']   = $upload->parsed_file_name;
			$files['attachment'] = $upload->upload_file_name;
			$files['thumbnail']  = $upload->upload_file_small;
			$files['filesize']   = $upload->upload_file_size;
			
			if (is_array($files['filename']) && !empty($files['filename'])){
				foreach ($files['filename'] as $key=>$value){
					if (!empty($files['filename'][$key])){
						$arr = getimagesize(ROOT_PATH.'/'.$cfg['attachdir'].$files['attachment'][$key]);
						$filesize2 = $arr[0].'x'.$arr[1];
					    $insert_sql = "INSERT INTO sdw_image_files(gid,uid,filename,attachment,thumbnail,filesize,filesize2,dateline,description)VALUES".
					    "('$files[gid]','$uid','".$files['filename'][$key]."','".$files['attachment'][$key]."','".$files['thumbnail'][$key]."','".$files['filesize'][$key]."','$filesize2','$timestamp','".$files['description'][$key]."')";
					    $db->query($insert_sql);
					}else {
						continue;
					}
				}
				if (!$inajax)showmsg($LANG['save_success'],0,$_SERVER['PHP_SELF'].'?gid='.$files['gid'].'&gtype='.$files['gtype']);
			}else {
				showmsg('no file uploaded.',1);
			}
		}else {
			showmsg('no file uploaded.',1);
		}
	}elseif ($files['gtype']==1) {//远程抓取
		$files['description'] = isset($_POST['description2']) ? $_POST['description2'] : '';
		if (isset($_POST['imageurls'])&&!empty($_POST['imageurls'])){
			//print_r($_POST['file_name']);exit();
			require_once ROOT_PATH.'/include/image.class.php';
			$upload = new upload('imageurls');
		    $upload->upload_save_path = ROOT_PATH.'/'.$cfg['attachdir'];
		    $upload->allowed_file_ext = explode("|",$cfg['img_type']);
		    $upload->max_file_size    = $cfg['attachmax'];
		    $upload->small_width      = $cfg['img_width'];
		    $upload->small_height     = $cfg['img_height'];
		    $upload->water_mark       = $cfg['watermark'] == 1 ? true : false;
		    $upload->water_type       = $cfg['watertype'];
		    $upload->water_image      = ROOT_PATH.'/'.$cfg['waterimg'];		    
		    $upload->water_fontfile   = ROOT_PATH.'/'.$cfg['waterfont'];
		    $upload->water_text       = $cfg['watertext'];
		    $upload->water_fontsize   = $cfg['watersize'];
		    $upload->water_fontcolor  = $cfg['watercolor'];
		    $upload->water_pos        = $cfg['waterpos'];
		    $upload->water_alpha      = $cfg['wateralpha'];
		    $upload->water_xoffset    = $cfg['waterxoffset'];
		    $upload->water_yoffset    = $cfg['wateryoffset'];
		    		    
			$upload->save_remote_image();
			if ($debug)$upload->shoError();
			
			$files['filename']   = $upload->parsed_file_name;
			$files['attachment'] = $upload->upload_file_name;
			$files['thumbnail']  = $upload->upload_file_small;
			$files['filesize']   = $upload->upload_file_size;
			
			if (is_array($files['filename']) && !empty($files['filename'])){
				foreach ($files['filename'] as $key=>$value){
					if (!empty($files['filename'][$key])){
						$arr = getimagesize(ROOT_PATH.'/'.$cfg['attachdir'].$files['attachment'][$key]);
						$filesize2 = $arr[0].'x'.$arr[1];
					    $insert_sql = "INSERT INTO sdw_image_files(gid,uid,filename,attachment,thumbnail,filesize,filesize2,dateline,description)VALUES".
					    "('$files[gid]','$uid','".$files['filename'][$key]."','".$files['attachment'][$key]."','".$files['thumbnail'][$key]."','".$files['filesize'][$key]."','$filesize2','$timestamp','".$files['description'][$key]."')";
					    $db->query($insert_sql);
					}else {
						continue;
					}
				}
				if (!$inajax)showmsg($LANG['save_success'],0,$_SERVER['PHP_SELF'].'?gid='.$files['gid'].'&gtype='.$files['gtype']);
			}else {
				showmsg('no file uploaded.',1);
			}
		}else {
			showmsg('',1);
		}	
	}
}

if($_GET['action']=='drop') {
    $file_id = isset($_GET['id']) ? $_GET['id'] : 0;
    if (!empty($file_id)){
    	$file_id = explode(',',$file_id);
    	foreach ($file_id as $fid){
    		$fid = intval($fid);
			$filers = $db->get_one("SELECT attachment,thumbnail FROM sdw_image_files WHERE fid=$fid");
			if ($filers){
				$filepath = ROOT_PATH.'/'.$cfg['attachdir'];
				if(file_exists($filepath.$filers['attachment'])) {
				   @unlink($filepath.$filers['attachment']);
				}
				
				if(file_exists($filepath.$filers['thumbnail'])) {
				   @unlink($filepath.$filers['thumbnail']);
				}
				$db->query("DELETE FROM sdw_image_files WHERE fid=$fid");  
			}else {
				continue; 		
			}
    	}
    }
	if (!$inajax)showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
}

if ($_GET['action']=='edit'){
	$fid = isset($_GET['fid']) ? intval($_GET['fid']) : 0;
	$file = $db->get_one("SELECT * FROM sdw_image_files WHERE fid=$fid");
	if ($file){
		$smarty->assign('file',$file);
	}else {
		showmsg('File Not Exists.',1,$_GET['gourl']);
	}
}

if ($_GET['action']=='saveedit'){
	$fid = isset($_GET['fid']) ? intval($_GET['fid']) : 0;
	$gid = isset($_GET['gid']) ? intval($_GET['gid']) : 0;
	$filename = isset($_GET['filename']) ? trim($_POST['filename']) : '';
	$attachment  = isset($_GET['attachment']) ? trim($_POST['attachment']) : '';
	$thumbnail   = isset($_POST['thumbnail']) ? trim($_POST['thumbnail']) : '';
	$filesize    = isset($_POST['filesize']) ? trim($_POST['filesize']) : '';
	$description = isset($_POST['description']) ? trim($_POST['description']) : '';
	
	if (isset($_FILES['imgfile']['name']) && !empty($_FILES['imgfile']['name'])){
		require_once ROOT_PATH.'/include/image.class.php';
		$upload = new upload('imgfile');
		$upload->upload_save_path = ROOT_PATH.'/'.$cfg['attachdir'];
		$upload->allowed_file_ext = explode("|",$cfg['img_type']);
		$upload->max_file_size    = $cfg['attachmax'];
		$upload->small_width      = $cfg['img_width'];
		$upload->small_height     = $cfg['img_height'];
		$upload->water_mark       = $cfg['watermark'] == 1 ? true : false;
		$upload->water_type       = $cfg['watertype'];
		$upload->water_image      = ROOT_PATH.'/'.$cfg['waterimg'];		    
		$upload->water_fontfile   = ROOT_PATH.'/'.$cfg['waterfont'];
		$upload->water_text       = $cfg['watertext'];
		$upload->water_fontsize   = $cfg['watersize'];
		$upload->water_fontcolor  = $cfg['watercolor'];
		$upload->water_pos        = $cfg['waterpos'];
		$upload->water_alpha      = $cfg['wateralpha'];
		$upload->water_xoffset    = $cfg['waterxoffset'];
		$upload->water_yoffset    = $cfg['wateryoffset'];
					
		$upload->save_local_image();
		if (!empty($upload->upload_file_name)){
			$arr = getimagesize(ROOT_PATH.'/'.$cfg['attachdir'].$upload->upload_file_name);
			$filename   = $upload->parsed_file_name;
			$attachment = $upload->upload_file_name;
			$filesize   = $upload->upload_file_size;
			$filesize2  = $arr[0].'x'.$arr[1];
			$update_sql = "UPDATE sdw_image_files SET filename='$filename',attachment='$attachment',
			thumbnail='$thumbnail',filesize='$filesize',filesize2='$filesize2',date='$timestamp',
			description='$description' WHERE fid=$fid";
		}
	}else {
		$update_sql = "UPDATE sdw_image_files SET filename='$filename',attachment='$attachment',
		thumbnail='$thumbnail',filesize='$filesize',description='$description' WHERE fid=$fid";
	}
	
	
	$db->query($update_sql);
	if (!$inajax)showmsg($LANG['edit_success'],0,$_GET['gourl']);
}

if($_GET['action']=='list'||$inajax) {
	$files = array();
	$pagesize = 10;
    $gid   = isset($_GET['gid']) ? intval($_GET['gid']) : 0;
	$page  = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$page  = $page<1 ? 1 : $page;
	$count = $db->get_rows("SELECT * FROM sdw_image_files WHERE gid=$gid");
	$pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
	$page = $page>$pagecount ? $pagecount : $page;
	$start_limit = ($page-1)*$pagesize;
    $query = $db->query("SELECT f.*,i.id,i.title FROM sdw_image_files f LEFT JOIN sdw_image i ON i.id=f.gid WHERE f.gid=$gid ORDER BY f.fid ASC LIMIT $start_limit,$pagesize");
	while($filers = $db->fetch_array($query)) {
		$filers['filesize'] = round(($filers['filesize']/1024),2);
		$filers['attachment'] = $cfg['attachdir'].$filers['attachment'];
		$filers['thumbnail'] = $cfg['attachdir'].$filers['thumbnail'];
	    $files[] = $filers;
	}
	$smarty->assign('page',$page);
	$smarty->assign('gid',$gid);
	$smarty->assign('files',$files);
	$smarty->assign('pagelink',page_admin($page,$pagecount,$_SERVER['PHP_SELF'],'gid='.$gid));
}

$smarty->assign('gtype',isset($_GET['gtype']) ? $_GET['gtype'] : 0);
$smarty->assign('manage_title',$LANG['image_manage']);
$smarty->display('admin_image_file.htm');
if (!$inajax)page_end();
?>
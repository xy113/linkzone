<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2011-04-13
 * $ID: select_image.php
*/ 
define('CURSCRIPT','select_image');
require_once dirname(__FILE__).'/include/common.inc.php';

$inpath = $curpath = $f = $activeurl = '';
$inpath = ROOT_PATH.'/'.$cfg['attachdir'];
$f = isset($_GET['f']) ? trim($_GET['f']) : '';

if ($_GET['action']=='upload'&&!empty($_FILES['file']['name'])){
	require_once ROOT_PATH.'/include/image.class.php';
	$createsmall = !(intval($_POST['createsmall'])==0);
	$upload = new upload('file');
    $upload->create_small = true;
    $upload->upload_save_path = ROOT_PATH.'/'.$cfg['attachdir'];
    $upload->allowed_file_ext = explode("|",$cfg['img_type']);
    $upload->water_mark     = (intval($_POST['watermark'])==1);
    $upload->max_file_size  = $cfg['attachmax'];
    $upload->small_width    = isset($_POST['width']) ? intval($_POST['width']) : $cfg['img_width'];
    $upload->small_height   = isset($_POST['height']) ? intval($_POST['height']) : $cfg['img_height'];
    $upload->water_type     = $cfg['watertype'];
    $upload->water_image    = ROOT_PATH.'/'.$cfg['waterimg'];
    $upload->water_text     = $cfg['watertext'];
    $upload->water_fontfile = ROOT_PATH.'/'.$cfg['waterfont'];
    $upload->water_fontsize = $cfg['watersize'];
    $upload->water_pos      = $cfg['waterpos'];
    $upload->water_alpha    = $cfg['wateralpha'];
    $upload->water_xoffset  = $cfg['waterxoffset'];
    $upload->water_yoffset  = $cfg['wateryoffset'];
    $upload->save_local_image();
    $filepath = $createsmall ? $upload->upload_file_small : $upload->upload_file_name;
    
    $attacharray = array();
    $attacharray['filename']   = $upload->parsed_file_name;
    $attacharray['filesize']   = $upload->upload_file_size;
    $attacharray['filetype']   = $upload->upload_file_type;
    $attacharray['attachment'] = $upload->upload_file_name;
    $attacharray['dateline']   = time();
    $_SESSION['attach'] = $attacharray;
    if($islog)writelog($LANG['upload_file'].':'.$upload->upload_file_name);
    dexit("<script language=javascript>window.opener.document.{$f}.value='$filepath';window.close();</script>");
}
$curpath = isset($_GET['curpath']) ? trim($_GET['curpath']) : '';
$curpath = str_replace('.','',$curpath);
$curpath = ereg_replace('/{1,}','/',$curpath);
$activeurl = '..'.$curpath;
$filetree = $files = $folders = array();
$inpath .= $curpath; 
$dir = dir($inpath);
while($file = $dir->read()) {
	//-----计算文件大小和创建时间
	$filepath = $inpath.'/'.$file;
	if($file == '.'){
		continue;
	}elseif ($file == '..'){
		if ($curpath=='')continue;
		$folders[] = array(
		   'filename'=>'上级目录',
		   'folderlink'=>'select_image.php?f='.$f.'&curpath='.urlencode(eregi_replace("[/][^/]*$","",$curpath)),
		   'img'=>'images/img/dir2.gif'
	    );
	}elseif(is_dir($filepath)){
		if(eregi("^_(.*)$",$file)){
			continue; 
			//#屏蔽FrontPage扩展目录和linux隐蔽目录
		}
		if(eregi("^\.(.*)$",$file)){
			continue;
		}
		$folders[] = array(
		   'filename'=>$file,
		   'folderlink'=>'select_image.php?f='.$f.'&curpath='.urlencode($curpath.'/'.$file),
		   'img'=>'images/img/dir.gif'
	    );
	}else {
		$filesize = filesize($filepath);
		$filesize = round(($filesize/1024),2).'KB';
		$filetime = filemtime($filepath);
		$filetime = date("Y-m-d H:i:s",$filetime);
		
		$files['filename'] = $file;
		$files['filesize'] = $filesize;
		$files['filetime'] = $filetime;
		$files['filepath'] = $cfg['attachdir'].$curpath.'/'.$file;
		if (eregi(".(gif|png)",$file)){
			$files['img'] = 'images/img/gif.gif';
		}elseif (eregi(".(jpg)",$file)){
			$files['img'] = 'images/img/jpg.gif';
		}else {
			continue;
			//$files['img'] = 'images/img/txt.gif';
		}
		$filetree[]=$files;
	}
}
//End Loop
$dir->close();
$smarty->assign('f',$f);
$smarty->assign('folders',$folders);
$smarty->assign('filetree',$filetree);
$smarty->display('select_image.htm');
?>
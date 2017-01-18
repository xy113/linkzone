<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 www.songdewei.com All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-15
 * $ID: admin_template.php
*/ 
define("CURSCRIPT",'admin_template');
require_once dirname(__FILE__).'/include/common.inc.php';

$templatepath = ROOT_PATH.'/templates';
$curpath = isset($_GET['curpath']) ? trim($_GET['curpath']) : '';
$curpath = str_replace('.','',$curpath);
$curpath = ereg_replace('/{1,}','/',$curpath);

if ($_GET['action']=='edit'){
	$file = isset($_GET['file']) ? trim($_GET['file']) : '';
	$filepath = $templatepath.$file;
	if (!file_exists($filepath)){
		showmsg($LANG['file_not_exists'],1);
	}else {
		$tmpcontent = phpread($filepath);
		$tmpcontent = str_replace(array('<','>'),array('&lt;','&gt;'),$tmpcontent);
		$smarty->assign('file',$file);
		$smarty->assign('tmpcontent',$tmpcontent);
		//$smarty->assign('editor',get_editor('tmpcontent',$tmpcontent));
	}
}

if ($_GET['action']=='save'){
	$file = isset($_GET['file']) ? trim($_GET['file']) : '';
	$tmpcontent = isset($_POST['tmpcontent']) ? $_POST['tmpcontent'] : '';
	$tmpcontent = str_replace(array('&lt;','&gt;'),array('<','>'),$tmpcontent);
	$tmpcontent = stripslashes($tmpcontent);
	$filepath = $templatepath.$file;
	//echo $filepath;exit();
	if (phpwrite($filepath,$tmpcontent)){
		showmsg($LANG['tmp_modify_ok'],0);
	}else{
		showmsg($LANG['file_not_exists'],1);
	}
}

if ($_GET['action']=='list'){
	$filetree = $files = $folders = $folderup = array();
	$templatepath .= $curpath; 
	$dir = dir($templatepath);
	while($file = $dir->read()){
		$filepath = $templatepath.'/'.$file;
		if($file == '.'){
			continue;
		}elseif ($file == '..'){
			if ($curpath=='')continue;
			$folderup = array(
			   'filename'=>'Parent Directory',
			   'folderlink'=>$_SERVER['PHP_SELF'].'?curpath='.urlencode(eregi_replace("[/][^/]*$","",$curpath)),
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
			   'folderlink'=>'?curpath='.urlencode($curpath.'/'.$file),
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
			$files['filepath'] = $curpath.'/'.$file;
			//$files['img'] = 'images/img/txt.gif';
			if (eregi(".(htm|html)",$file)){
				$files['img'] = 'images/img/html.gif';
			}elseif (eregi(".(php)",$file)){
				$files['img'] = 'images/img/php.gif';
			}elseif (eregi(".(js)",$file)){
				$files['img'] = 'images/img/js.gif';
			}elseif (eregi(".(txt)",$file)){
				$files['img'] = 'images/img/txt.gif';
			}elseif (eregi(".(css)",$file)){
				$files['img'] = 'images/img/css.gif';
			}else {
				continue;
				//$files['img'] = 'images/img/txt.gif';
			}
			$filetree[]=$files;
		}
	}
	$dir->close();
	$smarty->assign('folderup',$folderup);
	$smarty->assign('folders',$folders);
	$smarty->assign('filetree',$filetree);
}

$smarty->assign('curpath',$curpath);
$smarty->assign('manage_title',$LANG['tmp_manage']);
$smarty->display('admin_template.htm');
page_end();
?>
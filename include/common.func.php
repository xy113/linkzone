<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2010-08-13
 * $Id: common.func.php
*/ 
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}

function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key ? $key : $GLOBALS['auth_key']);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}

}

function daddslashes($string, $force = 0) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}
/*
 * 字符串截取
 */
function cutstr($string, $length, $dot ='') {
	global $charset;
	if(strlen($string) <= $length) {
		return $string;
	}
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
	$strcut = '';
	if(strtolower($charset) == 'utf-8') {
		$n = $tn = $noc = 0;
		while($n < strlen($string)) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);
	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);
	return $strcut.$dot;
}

function dexit($message=''){
	echo $message;
	exit();
}

function site(){
	return $_SERVER['HTTP_HOST'];
}

function phpread($file){
	if($fb = @fopen($file,"r")){
		return @fread($fb,filesize($file));
	}else{
	    dexit("read error!");
	}
	@fclose($fb);
}
//====================================
//=======将字符串写入文件
//====================================
function phpwrite($file,$content){
    if($fp = @fopen($file, "w")){
	    return @fwrite($fp,$content);
	    @fclose($fp);
	}else {
		return false;
	}
}
//========================
//=========================
function makedir($folder){
    if(!file_exists($folder)){
        if(@mkdir($folder,0777)){
        	@chmod($folder,0777);
	        return true;
	    }else{
	        return false;
	    }
    }else {
    	return true;
    }
}
//=================================
//=================================
function get_editor($inputname,$value='',$width='100%',$height='400',$toolbarset='Default') {
   require_once ROOT_PATH.'/include/fckeditor/fckeditor.php';
   $fck = new FCKeditor($inputname);
   $fck->Width  = $width;
   $fck->Height = $height;
   $fck->Value  = $value;
   $fck->ToolbarSet = $toolbarset;
   $fck->BasePath = '../include/fckeditor/';
   return $fck->CreateHtml();
}

function isemail($email) {
	return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
}

function utf2gbk($string){
   return mb_convert_encoding($string,'GB2312','UTF-8');
}
function gbk2utf($string){
   return mb_convert_encoding($string,'UTF-8','GB2312');
}

/*
 * 去除HTML标签
 */
function strip_html($str){
	$search = array ("'<script[^>]*?>.*?</script>'si",  // 去掉 javascript
                 "'<[\/\!]*?[^<>]*?>'si",           // 去掉 HTML 标记
                 "'([\r\n])[\s]+'",                 // 去掉空白字符
                 "'&(quot|#34);'i",                 // 替换 HTML 实体
                 "'&(amp|#38);'i",
                 "'&(lt|#60);'i",
                 "'&(gt|#62);'i",
                 "'&(nbsp|#160);'i",
                 "'&(iexcl|#161);'i",
                 "'&(cent|#162);'i",
                 "'&(pound|#163);'i",
                 "'&(copy|#169);'i",
                 "'&#(\d+);'e");                    // 作为 PHP 代码运行

	$replace = array ("",
	                  "",
	                  "\\1",
	                  "\"",
	                  "&",
	                  "<",
	                  ">",
	                  " ",
	                  chr(161),
	                  chr(162),
	                  chr(163),
	                  chr(169),
	                  "chr(\\1)");
	
	$str = preg_replace ($search, $replace, $str);
	$str = str_replace(array('&amp;ldquo;','&ldquo;','&amp;rdquo;','&rdquo;'),array('“','“','”','”'),$str);
	$str = str_replace('　','',$str);
	return $str;
}

function printr($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

/*
 * google风格分页
 */
function pagination($page,$total,$para='',$scr=''){ 
	$para = isset($para) ? '&'.$para : '';
	$scr = isset($scr) ? $scr : $_SERVER['PHP_SELF'];
	$prevs = $page-5;  
	if($prevs<=0)$prevs = 1; 
	$prev  = $page-1;
	if($prev<=0) $prev = 1;
	$nexts = $page+5;
	if($nexts>$total)$nexts=$total; 
	$next  = $page+1;
	if($next>$total)$next=$total; 
	$pagenavi ="<a href =\"{$scr}?page=1{$para}\">首页</a>"; 
	$pagenavi.="<a href =\"{$scr}?page=$prev{$para}\">上一页</a>"; 
	for($i=$prevs;$i<=$page-1;$i++){ 
	   $pagenavi.="<a href = \"{$scr}?page=$i{$para}\">$i</a>"; 
	} 
	$pagenavi.="<span class=\"cur\">$page</span>"; 
	for($i=$page+1;$i<=$nexts;$i++){ 
	   $pagenavi.="<a href =\"{$scr}?page=$i{$para}\">$i</a>"; 
	} 
	$pagenavi.="<a href=\"{$scr}?page=$next{$para}\">下一页</a>"; 
	$pagenavi.="<a href=\"{$scr}?page=$total{$para}\">尾页</a>"; 
	return $pagenavi ; 
} 
/*
 * Discuz风格分页
 */
function  multi($curr_page,$num,$perpage,$para='',$scr=''){ 
	$multipage=''; 
	$para = isset($para) ? '&'.$para : '';
	$scr = isset($scr) ? $scr : $_SERVER['PHP_SELF'];
	if($num>$perpage){ 
		$page=10; 
		$offset=2; 
		$pages=ceil($num/$perpage); 
		$from=$curr_page-$offset; 
		$to=$curr_page+$page-$offset-1; 
		if($page>$pages){ 
			$from=1; 
			$to=$pages; 
		}else{ 
			if($from<1){ 
				$to=$curr_page+1-$from; 
				$from=1; 
				if(($to-$from)<$page&&($to-$from)<$pages){ 
					$to=$page; 
				} 
			}elseif($to>$pages){ 
				$from=$curr_page-$pages+$to; 
				$to=$pages; 
				if(($to-$from)<$page&&($to-$from)<$pages){ 
					$from=$pages-$page+1; 
				} 
			} 
		} 
		$multipage .= "<a href =\"{$scr}?page=1{$para}\">首页</a>"; 
		for($i=$from;$i<=$to;$i++){ 
			if($i!=$curr_page){ 
				$multipage.="<a href =\"{$scr}?page=$i{$para}\">[$i]</a>"; 
			}else{ 
				$multipage.="<span class=\"cur\">$i</span>"; 
			}
		} 
		$multipage.= $pages>$page ? "…<a href=\"{$scr}?page=$pages{$para}\">尾页</a>" : "<a href =\"{$scr}?page=$pages{$para}\">首页</a>"; 
	} 
	return   $multipage ; 
}

function message($msg_detail='',$msg_type=0,$forwardurl='',$auto_redirect=true){
   global $db,$smarty;   
   $smarty->assign('msg_detail',$msg_detail);
   $smarty->assign('msg_type',$msg_type);
   $smarty->assign('forwardurl',$forwardurl ? $forwardurl : $_SERVER['HTTP_REFERER']);
   $smarty->assign('auto_redirect',$auto_redirect);
   $smarty->display('message.htm');
   dexit();
}
?>
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
if(!defined('IN_XSCMS')){
   die('Access Denied!');
}

function page_end(){
   global $start_time,$end_time,$db,$smarty,$LANG,$inajax;
   if ($inajax)return ;
   $mtime = explode(' ', microtime());
   $end_time = $mtime[1] + $mtime[0];
   $time_spend = round(($end_time - $start_time),5);
   $smarty->assign('query_info',sprintf($LANG['query_info'],$db->query_num,$time_spend));
   $smarty->display('page_footer.htm');
}

function showmsg($msg_detail='',$msg_type=0,$forwardurl='',$auto_redirect=true){
   global $db,$LANG,$smarty;   
   $links['text'] = $LANG['go_back'];
   $links['href'] = $_SERVER['HTTP_REFERER'];
   $smarty->assign('links',$links);
   $smarty->assign('page_title',$LANG['system_message']);
   $smarty->assign('msg_detail',$msg_detail);
   $smarty->assign('msg_type',$msg_type);
   $smarty->assign('forwardurl',$forwardurl ? $forwardurl : $_SERVER['HTTP_REFERER']);
   $smarty->assign('auto_redirect',$auto_redirect);
   $smarty->display('message.htm');
   //page_end();
   dexit();
}

function getadmininfo($user){
    global $db,$LANG;
    $userinfo = $db->get_one("SELECT * FROM sdw_admin_user WHERE admin_user='$user' OR admin_id='$user'");
    if ($userinfo){  	
        return $userinfo;
    }else {
    	showmsg($LANG['admin_notexists'],1);
    }
}
/*
*写后台日志
*/
function writelog($message='',$username=''){
    global $db;
	$username = !empty($username) ? $username : $_SESSION['admin_user'];
	$insert_query = "INSERT INTO sdw_admin_log(log_user,log_info,log_time,log_ip)VALUES".
	"('$username','$message','".time()."','".$_SERVER['REMOTE_ADDR']."')";
	$db->query($insert_query);
}

/*
 * 标签处理
 */
function checktags($tags){
	global $db;
	if (is_array($tags)){
		foreach ($tags as $tag){
			if (!empty($tag)){
				$tag = cutstr($tag,10);
				$taginfo = $db->get_rows("SELECT * FROM sdw_tags WHERE tag='$tag'");
				if ($taginfo>0){
					$db->query("UPDATE sdw_tags SET num=num+1 WHERE tag='$tag'");
				}else {
					$db->query("INSERT INTO sdw_tags(tag,num)VALUES('$tag','1')");
				}
			}else {
				continue;
			}
		}
	}else {
		if (!empty($tags)){
			$tags = cutstr($tags,10);
			$taginfo = $db->get_rows("SELECT * FROM sdw_tags WHERE tag='$tags'");
			if ($taginfo>0){
				$db->query("UPDATE sdw_tags SET num=num+1 WHERE tag='$tags'");
			}else {
				$db->query("INSERT INTO sdw_tags(tag,num)VALUES('$tags','1')");
			}
		}else {
			return ;
		}
	}
}

/*
 * 后台分页
 */
function page_admin($page,$pagecount,$scr='',$para=''){  
  $page = isset($page)? $page : 1;
  $page = $page>$pagecount ? $pagecount : $page;
  $para = (isset($para) && $para!='') ? '&'.$para : '';
  $scr = (isset($scr) && $scr!='') ? $scr : $_SERVER['PHP_SELF'];
  if ($pagecount==1){
	  $link = "首页&nbsp;上页&nbsp;下页&nbsp;末页";
  }elseif($page==1){
	  $next_page =$page+1;
	  $link="首页&nbsp;上页&nbsp;<a href=\"$scr?page=$next_page{$para}\">下页</a>&nbsp;<a href=\"$scr?page=$pagecount{$para}\">末页</a>";
   }else{
	  $next_page = $page+1;
	  $prev_page = $page-1;
	  if ($page==$pagecount){
		  $link = "<a href=\"$scr?page=1{$para}\">首页</a>&nbsp;<a href=\"$scr?page=$prev_page{$para}\">上页</a>&nbsp;下页&nbsp;末页";
	  }else{
		  $link = "<a href=\"$scr?page=1{$para}\">首页</a>&nbsp;<a href=\"$scr?page=$prev_page{$para}\">上页</a>&nbsp;<a href=\"$scr?page=$next_page{$para}\">下页</a>&nbsp;<a href=\"$scr?page=$pagecount{$para}\">末页</a>";
	  }
	}
    $goto="<select name=\"page\" id=\"page\" style=\"height:18px;padding:0px;\" onChange=\"javascript:window.location.href='".$scr."?page='+this.value+'{$para}';\">\n";
    for($i=1;$i<=$pagecount;$i++){  
	    if($page==$i){
	        $goto.="<option value=\"$i\" selected>$i/$pagecount</option>\n";
	    }else{
		    $goto.="<option value=\"$i\">$i/$pagecount</option>\n";
	    }
    }
	$goto.="</select>\n";
	return $link.'&nbsp;'.$goto;
}

function page_ajax($page,$pagecount,$para=''){  
    $page = isset($page)? $page : 1;
    $page = $page>$pagecount ? $pagecount : $page;
    $para = (isset($para) && $para!='') ? '&'.$para : '';
    if ($pagecount==1){
	    $link = "首页&nbsp;上页&nbsp;下页&nbsp;末页";
    }elseif($page==1){
	    $next_page =$page+1;
	    $link="首页&nbsp;上页&nbsp;<a href=\"javascript:;\" onclick=\"GoPage($next_page,'$para')\">下页</a>&nbsp;<a href=\"javascript:;\" onclick=\"GoPage($pagecount,'$para')\">末页</a>";
   }else{
	  $next_page = $page+1;
	  $prev_page = $page-1;
	  if ($page==$pagecount){
		  $link = "<a href=\"javascript:;\" onclick=\"GoPage(1,'$para')\">首页</a>&nbsp;<a href=\"javascript:;\" onclick=\"GoPage($prev_page,'$para')\">上页</a>&nbsp;下页&nbsp;末页";
	  }else{
		  $link = "<a href=\"javascript:;\" onclick=\"GoPage(1,'$para')\">首页</a>&nbsp;<a href=\"javascript:;\" onclick=\"GoPage($prev_page,'$para')\">上页</a>&nbsp;<a href=\"javascript:;\"  onclick=\"GoPage($next_page,'$para')\">下页</a>&nbsp;<a href=\"javascript:;\" onclick=\"GoPage($pagecount,'$para')\">末页</a>";
	  }
	}
    $goto="<select style=\"height:18px;padding:0px;\" onChange=\"javascript:GoPage(this.value,'$para');\">\n";
    for($i=1;$i<=$pagecount;$i++){  
	    if($page==$i){
	        $goto.="<option value=\"$i\" selected>$i/$pagecount</option>\n";
	    }else{
		    $goto.="<option value=\"$i\">$i/$pagecount</option>\n";
	    }
    }
	$goto.="</select>\n";
	return $link.'&nbsp;'.$goto;
}
?>
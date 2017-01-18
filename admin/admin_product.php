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
 * $ID: admin_product.php
*/ 
define("CURSCRIPT",'admin_product');
require_once dirname(__FILE__).'/include/common.inc.php';
//================================
/**AJAX修改产品名称**/
//=================================
if($inajax && $_GET['action']=='edit_name'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $proname = !empty($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_product SET proname='$proname' WHERE id=$id");
    dexit($proname);
}
//================================
/**AJAX修改产品价格**/
//=================================
if($inajax && $_GET['action']=='edit_price'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $price = !empty($_GET['val']) ? trim($_GET['val']) : '';
    $db->query("UPDATE sdw_product SET price='$price' WHERE id=$id");
    dexit($price);
}
//================================
/**AJAX修改产品规格**/
//=================================
if($_GET['action']=='edit_size'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $size = !empty($_GET['val']) ? addslashes(trim($_GET['val'])) : '';
    $db->query("UPDATE sdw_product SET size='$size' WHERE id=$id");
    dexit($size);
}
//================================
/**AJAX切换产品推荐状态**/
//=================================
if($_GET['action']=='toggle_recommend'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $productinfo = $db->get_one("SELECT recommend FROM sdw_product WHERE id=$id");
    $recommend = $productinfo['recommend']==1 ? 0 : 1;
    $db->query("UPDATE sdw_product SET recommend=$recommend WHERE id=$id");
    dexit($recommend);
}

//================================
/**AJAX切换审核状态**/
//=================================
if($_GET['action']=='toggle_audited'){
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    $productinfo = $db->get_one("SELECT audited FROM sdw_product WHERE id=$id");
    $audited = $productinfo['audited']==1 ? 0 : 1;
    $db->query("UPDATE sdw_product SET audited=$audited WHERE id=$id");
    dexit($audited);
}

/*
 * 检测产品是否存在
 */
if ($_GET['action']=='checkname'){
	$name = isset($_GET['val']) ? trim($_GET['val']) : '';
	checkname($name) ? dexit('1') : dexit('0');
}
//================================
/**保存产品信息**/
//=================================
if($_GET['action']=='save'){
	require_once ADMIN_PATH.'/include/product.inc.php';
}
//================================
/**删除产品信息**/
//=================================
if($_GET['action']=='drop'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($product_id)){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("DELETE FROM sdw_product WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['delete_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}
/*
 * 移除产品
 */
if($_GET['action']=='remove'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($product_id)){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_product SET status=-1 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

//================================
/**还原产品**/
//=================================
if($_GET['action']=='restore'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($product_id)){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_product SET status=0 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}
//================================
/**推荐产品**/
//=================================
if($_GET['action']=='recommend'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($product_id)){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_product SET recommend=1 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

//================================
/**取消推荐**/
//=================================
if($_GET['action']=='unrecommend'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($product_id)){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_product SET recommend=0 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

//================================
/**通过审核**/
//=================================
if($_GET['action']=='audited'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($product_id)){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_product SET audited=1 WHERE id=$id");
		}
		if ($inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}

//================================
/**取消审核**/
//=================================
if($_GET['action']=='unrecommend'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	if (!empty($product_id)){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_product SET audited=0 WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['edit_success'],0,$_SERVER['HTTP_REFERER']);
		}
	}
}
//================================
/**批量移动产品**/
//=================================
if($_GET['action']=='move'){
	$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	if ($cid>0){
		$product_id = explode(',',$product_id);
		foreach ($product_id as $id){
			$id = intval($id);
			$db->query("UPDATE sdw_product SET cid=$cid WHERE id=$id");
		}
		if (!$inajax){
			showmsg($LANG['move_success'],0,$_SERVER['PHP_SELF']."?cid=$cid");
		}
	}  
}
//================================
/**获取要修改的产品信息**/
//=================================
if($_GET['action']=='edit'){
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $product = $db->get_one("SELECT * FROM sdw_product WHERE id=$id");
    if ($product){
	    $smarty->assign('editor',get_editor('description',$product['description']));
	    $smarty->assign('product',$product);
	    $cid = $product['cid'];
    }else {
    	if (!$inajax){
    		showmsg($LANG['product_notexists'],1);
    	}
    }
}

//================================
/**产品列表**/
//=================================
if($_GET['action']=='list' || $inajax){
	$products = array();
	$cid = $q = $t = $ob = $page = $orderby = $ordersort = '';
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$t  = isset($_GET['t']) ? trim($_GET['t']) : '';		
	$q  = isset($_GET['q']) ? trim($_GET['q']) : '';
	$ob = isset($_GET['ob']) ? trim($_GET['ob']) : '';
	$status = isset($_GET['status']) ? intval($_GET['status']) : 0;
    if (!empty($ob)){
    	$_SESSION['obs'] = $ob;
    }else {
    	$ob = isset($_SESSION['obs']) ? $_SESSION['obs'] : '';
    }

	switch($ob){
		case 'views':
		$orderby = 'p.views'	;
		break;
		case 'time' :
		$orderby = 'p.dateline';
		break;
		case 'price' :
		$orderby = 'p.price';
		break;		
		default:$orderby = 'p.id';
		break;
	}
	
	if (isset($_GET['os'])){
		$ordersort = trim($_GET['os']);
		$_SESSION['oss'] = $ordersort;
	}else {
		$ordersort = isset($_SESSION['oss']) ? $_SESSION['oss'] : 'DESC';
		if ($_GET['action']=='sort'){			
			$ordersort = $ordersort == 'ASC' ? 'DESC' : 'ASC';
			$_SESSION['oss'] = $ordersort;			
		}
	}	
	$ordersort = ($ordersort == 'ASC' || $ordersort == 'DESC') ? $ordersort : 'DESC';
	
	$wheresql = $cid>0 ? "  AND (c.cid=$cid OR c.cup=$cid) " : "";
	$wheresql.= $t == 'unaudited' ? " AND p.audited=0 " : '';
	$wheresql.= $t == 'recommend' ? " AND p.recommend=1 " : '';
	$wheresql.= $t == 'myproduct' ? "AND p.authorid=".intval($_SESSION['admin_id']) : '';
	$wheresql.= $q != '' ? " AND p.title LIKE '%".$q."%'" : '';
    $count = $db->get_rows("SELECT p.id FROM sdw_product p LEFT JOIN sdw_product_cat c ON c.cid=p.cid WHERE p.status=$status $wheresql");

    $pagesize = 20;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $page = $page<1 ? 1 : $page;
    $pagecount = $count<$pagesize ? 1 : ceil($count/$pagesize);
    $page = $page>$pagecount ? $pagecount : $page;
    $start_limit = ($page-1)*$pagesize;
    
    $query = $db->query("SELECT p.id,p.proname,p.price,p.size,p.listingdate,p.dateline,p.recommend,p.comments,p.views,p.audited,c.cid,c.name as cname FROM sdw_product p LEFT JOIN sdw_product_cat c ON c.cid=p.cid WHERE p.status=$status $wheresql ORDER BY $orderby $ordersort LIMIT $start_limit,$pagesize");
    while($productrs = $db->fetch_array($query)){
    	$productrs['prdurl'] = '../detail.php?id='.$productrs['id'];
        $products[] = $productrs;
    }
    
    $curl = "cid=$cid&status=$status&t=$t&ob=$ob&q=$q";
    $smarty->assign('page',$page);
    $smarty->assign('curl',$curl);
    $smarty->assign('records',$count);
    $smarty->assign('pagelink',page_ajax($page,$pagecount,$curl));
    $smarty->assign('products',$products);
}

if($_GET['action']=='addnew'){
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$smarty->assign('editor',get_editor('description'));
}
$smarty->assign('cid',$cid);
$smarty->assign('category',get_product_category($cid));
$smarty->assign('manage_title',$LANG['product_manage']);
$smarty->display('admin_product.htm');
if (!$inajax)page_end();
/*
 * function
 */
function checkname($name){
	global $db;
	if (!empty($name)){
		$productinfo = $db->get_one("SELECT proname FROM sdw_product WHERE proname='$name'");
		return !empty($productinfo);
	}else {
		return false;
	}
}
?>
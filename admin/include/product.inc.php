<?php
$product['id']   = !empty($_POST['id']) ? intval($_POST['id']) : 0;
$product['proname'] = !empty($_POST['proname'])? trim($_POST['proname']) : '';
$product['cid']     = !empty($_POST['cid']) ? intval($_POST['cid']) : 0;
$product['tags']    = !empty($_POST['tags']) ? trim($_POST['tags']) : '';
$product['price']   = !empty($_POST['price']) ? trim($_POST['price']) : 0;
$product['size']    = !empty($_POST['size'])  ? trim($_POST['size']) : '';
$product['description']  = !empty($_POST['description']) ? trim($_POST['description']) : '';
$product['image']        = !empty($_POST['image'])   ? trim($_POST['image']) : '';
$product['recommend']    = !empty($_POST['recommend']) ? intval($_POST['recommend']) : 0;
$product['audited']      = !empty($_POST['audited']) ? intval($_POST['audited']) : 0;
$product['allowcomment'] = !empty($_POST['allowcomment']) ? intval($_POST['allowcomment']) : 0;
$product['allowvote']    = !empty($_POST['allowvote']) ? intval($_POST['allowvote']) : 0;
$product['listingdate']  = !empty($_POST['listingdate']) ? trim($_POST['listingdate']) : '';
$product['author']   = $_SESSION['admin_user'];
$product['authorid'] = $_SESSION['admin_id'];

if (empty($product['proname'])){
	showmsg($LANG['product_name_empty'],1);
}else {
	$product['name'] = cutstr($product['name'],30);
}

if ($product['cid']==0){
	showmsg('category no selected',1);
}

if ($product['tags']){
	$product['tags'] = cutstr($product['tags'],30);
	$product['tags'] = str_replace(' ',',',$product['tags']);
	checktags(explode(',',$product['tags']));
}

if ($product['id']>0){
	$update_sql = "UPDATE sdw_product SET proname='$product[proname]',cid='$product[cid]',
	price='$product[price]',size='$product[size]',tags='$product[tags]',
	description='$product[description]',image='$product[image]',author='$product[author]',
	authorid='$product[authorid]',authorip='$ip',recommend='$product[recommend]',listingdate='$product[listingdate]',
	dateline='$timestamp',allowcomment='$product[allowcomment]',allowvote='$product[allowvote]',
	audited='$product[audited]' WHERE id=".$product['id'];
	
	$db->query($update_sql);
	if (!$inajax){
		showmsg($LANG['edit_success'],0,$_SERVER['PHP_SELF']."?cid=".$product['cid']);
	}
}else {
	
    $insert_sql = "INSERT INTO sdw_product(proname,cid,tags,price,size,image,listingdate,author,authorid,authorip,description,recommend,allowcomment,allowvote,audited,dateline)VALUES".
    "('$product[proname]','$product[cid]','$product[tags]','$product[price]','$product[size]','$product[image]','$product[listingdate]',".
    "'$product[author]','$product[authorid]','$ip','$product[description]','$product[recommend]','$product[allowcomment]','$product[allowvote]','$product[audited]','$timestamp')";
    
    $db->query($insert_sql);
    if (!$inajax){
    	showmsg($LANG['save_success'],0,$_SERVER['PHP_SELF'].'?act=addnew&cid='.$product['cid']);	
    }
}
?>
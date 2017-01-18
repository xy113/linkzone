<?php /* Smarty version 2.6.19, created on 2011-04-19 14:50:35
         compiled from admin_login.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['lang']['cp_home']; ?>
</title>
<link rel="stylesheet" type="text/css" href="images/style.css">
<script language="javascript" src="include/javascript/common.js"></script>
<script language="javascript" src="include/lang.zh_cn.js"></script>
<?php echo '
<script type="text/javascript">
function check_admin_login(obj){
    if(obj.admin_user.value && obj.admin_pass.value && obj.checkcode.value){
	    return true;
	}else{
	    return false;
	}
}
</script>
'; ?>

</head>
<body>
<div class="loginbox">
	<form action="index.php?action=login" method="post" name="login" target="_top" id="login" onsubmit="return check_admin_login(this);">
    <div class="left">
	     <div><img src="images/ctr.gif" border="0" /></div>
		 <p><?php echo $this->_tpl_vars['lang']['logininfo']; ?>
</p>
	</div>
	<ul class="right">
	    <li><span class="lable"><?php echo $this->_tpl_vars['lang']['username']; ?>
</span><input name="admin_user" type="text" class="linput"/></li>
		<li><span class="lable"><?php echo $this->_tpl_vars['lang']['password']; ?>
</span><input name="admin_pass" type="password" class="linput"/></li>
		<li><span class="lable"><?php echo $this->_tpl_vars['lang']['checkcode']; ?>
</span><input name="checkcode" type="text" class="linput" style="width:65px; float:left;" maxlength="4" />
		 <img src="../include/checkcode.php" onclick="this.src='../include/checkcode.php?'+Math.random()" style="float:left; margin-left:4px;"/>
		</li>
		<li class="li2">
		<input name="b1" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_login']; ?>
" class="button" style="width:100px; margin-left:44px;" tabindex="0" />
		</li>
	</ul>
	</form>
</div>
<p style="margin-top:100px; font-size:12px; color:#666666; text-align:center; font:Arial, Helvetica, sans-serif;"><?php echo $this->_tpl_vars['lang']['copyright']; ?>
</p>
</body>
</html>
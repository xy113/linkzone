<?php /* Smarty version 2.6.19, created on 2011-04-19 14:32:46
         compiled from contactus.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>联系连纵_<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
</title>
<meta name="keywords" content="<?php echo $this->_tpl_vars['cfg']['keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['cfg']['description']; ?>
" />
<link href="templates/lianzong/images/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
</head>

<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="area">
	<div class="left01">
		<div class="banner"><img src="templates/lianzong/images/banner_1.jpg" border="0" /></div>
		<div class="yourpos"><a href="index.php">首页</a> >> 联系连纵</div>
		<div class="title-gray">联系连纵</div>
		<ul class="contactus">
			<li>北京市连纵律师事务所</li>
			<li>地址：<?php echo $this->_tpl_vars['condata']['con_address']; ?>
</li>
			<li>电话：<?php $_from = $this->_tpl_vars['condata']['tel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tel']):
?><?php echo $this->_tpl_vars['tel']; ?>
 <?php endforeach; endif; unset($_from); ?>　传真：<?php $_from = $this->_tpl_vars['condata']['fax']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fax']):
?><?php echo $this->_tpl_vars['fax']; ?>
 <?php endforeach; endif; unset($_from); ?></li>
			<li>邮箱：<?php $_from = $this->_tpl_vars['condata']['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['email']):
?><?php echo $this->_tpl_vars['email']; ?>
 <?php endforeach; endif; unset($_from); ?></li>
			<li>网址：<a href="http://www.linkzone.cn">www.linkzone.cn</a></li>
		</ul>
		<p><img src="templates/lianzong/images/map.jpg" border="0" /></p>
	</div>
	<div class="right01">
		<div class="title-big">联系连纵</div>
		<div><img src="templates/lianzong/images/pic-2.jpg" width="245" border="0" /></div>
	</div>
	<div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
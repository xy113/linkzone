<?php /* Smarty version 2.6.19, created on 2011-04-20 06:34:30
         compiled from about.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['about']['title']; ?>
_<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
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
	<div class="left01" id="left">
		<div class="banner"><script src="js/banner.js"></script></div>
		<div class="yourpos"><a href="index.php">首页</a> >> 关于连纵 >> <?php echo $this->_tpl_vars['about']['title']; ?>
</div>
		<div class="title-gray"><?php echo $this->_tpl_vars['about']['title']; ?>
</div>
		<p><?php echo $this->_tpl_vars['about']['content']; ?>
</p>
	</div>
	<div class="right01" id="right">
		<div class="title-big">关于连纵</div>
		<ul class="titlelist">
			<li><a href="about.php?id=1"<?php if ($_GET['id'] == 1): ?> class="selected"<?php endif; ?>>连纵简介</a></li>
			<li><a href="about.php?id=2"<?php if ($_GET['id'] == 2): ?> class="selected"<?php endif; ?>>连纵宗旨</a></li>
			<li><a href="about.php?id=3"<?php if ($_GET['id'] == 3): ?> class="selected"<?php endif; ?>>社会责任</a></li>
		</ul>
		<div class="blank"></div>
		<div id="lhhz"><img src="templates/lianzong/images/pic-2.jpg" width="245" border="0" /></div>
	</div>
	<div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
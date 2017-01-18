<?php /* Smarty version 2.6.19, created on 2011-04-20 02:05:32
         compiled from article.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['article']['title']; ?>
_<?php echo $this->_tpl_vars['article']['name']; ?>
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
		<div class="banner"><img src="templates/lianzong/images/banner02.jpg" border="0" /></div>
		<div class="yourpos"><a href="index.php">首页</a> >> <a href="arclist.php?cid=<?php echo $this->_tpl_vars['article']['cid']; ?>
"><?php echo $this->_tpl_vars['article']['name']; ?>
</a> >> <?php echo $this->_tpl_vars['article']['title']; ?>
</div>
		<div class="title-gray"><?php echo $this->_tpl_vars['article']['title']; ?>
</div>
		<p><?php echo $this->_tpl_vars['article']['content']; ?>
</p>
		<div class="pagelink">
			<div id="prevpage"><?php echo $this->_tpl_vars['prevpage']; ?>
</div>
			<div id="nextpage"><?php echo $this->_tpl_vars['nextpage']; ?>
</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="right01" id="right">
		<div class="title-big">最新消息</div>
		<ul class="titlelist">
			<?php if ($this->_tpl_vars['article']['cid'] == 2): ?>
			<?php $_from = $this->_tpl_vars['articles']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arc']):
?>
			<li><a href="<?php echo $this->_tpl_vars['arc']['arcurl']; ?>
"<?php if ($this->_tpl_vars['article']['id'] == $this->_tpl_vars['arc']['id']): ?> class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['arc']['title']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
			<?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
			<li><a href="<?php echo $this->_tpl_vars['aa']['caturl']; ?>
"<?php if ($this->_tpl_vars['article']['cid'] == $this->_tpl_vars['aa']['cid']): ?> class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
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
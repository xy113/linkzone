<?php /* Smarty version 2.6.19, created on 2011-04-19 15:21:38
         compiled from arclist.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'arclist.htm', 22, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['curcategory']['name']; ?>
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
		<div class="banner"><img src="templates/lianzong/images/banner_1.jpg" border="0" /></div>
		<div class="yourpos"><a href="index.php">首页</a> >> 最新信息 >> <?php echo $this->_tpl_vars['curcategory']['name']; ?>
</div>
		<div class="title-gray"><?php echo $this->_tpl_vars['curcategory']['name']; ?>
</div>
		<ul>
			<?php $_from = $this->_tpl_vars['articles']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arc']):
?>
			<li><span><?php echo ((is_array($_tmp=$this->_tpl_vars['arc']['dateline'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
</span> ·<a href="<?php echo $this->_tpl_vars['arc']['arcurl']; ?>
" title="<?php echo $this->_tpl_vars['arc']['title']; ?>
"><?php echo $this->_tpl_vars['arc']['title']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<div class="pagelink"><?php echo $this->_tpl_vars['pagelink']; ?>
</div>
	</div>
	<div class="right01" id="right">
		<div class="title-big">专业领域</div>
		<ul class="titlelist">
			<?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
			<li><a href="<?php echo $this->_tpl_vars['aa']['caturl']; ?>
"<?php if ($_GET['cid'] == $this->_tpl_vars['aa']['cid']): ?> class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
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
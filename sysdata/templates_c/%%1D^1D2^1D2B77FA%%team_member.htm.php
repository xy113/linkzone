<?php /* Smarty version 2.6.19, created on 2011-04-18 07:10:50
         compiled from team_member.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['member']['name']; ?>
_<?php echo $this->_tpl_vars['member']['tname']; ?>
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
	<div class="left01" id="teammember">
		<div class="banner"><img src="templates/lianzong/images/banner_1.jpg" border="0" /></div>
		<div class="yourpos"><a href="index.php">首页</a> >> <?php echo $this->_tpl_vars['member']['tname']; ?>
 >> <?php echo $this->_tpl_vars['member']['name']; ?>
</div>
		<div class="title-gray"><?php echo $this->_tpl_vars['member']['tname']; ?>
</div>
		<p><img src="<?php echo $this->_tpl_vars['member']['photo']; ?>
" border="0" /></p>
		<p><strong><?php echo $this->_tpl_vars['member']['name']; ?>
</strong></p>
		<p>联系电话：<?php echo $this->_tpl_vars['member']['tel']; ?>
</p>
		<p>电子邮箱：<a href="mailto:<?php echo $this->_tpl_vars['member']['email']; ?>
"><?php echo $this->_tpl_vars['member']['email']; ?>
</a></p>
		<p>个人主页：<a href="<?php echo $this->_tpl_vars['member']['homepage']; ?>
" target="_blank"><?php echo $this->_tpl_vars['member']['homepage']; ?>
</a></p>
		<p><?php echo $this->_tpl_vars['member']['profile']; ?>
</p>
	</div>
	<div class="right01">
		<div class="title-big">连纵团队</div>
		<ul class="titlelist">
			<?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
			<li><a href="team.php?tid=<?php echo $this->_tpl_vars['aa']['tid']; ?>
"<?php if ($this->_tpl_vars['member']['tid'] == $this->_tpl_vars['aa']['tid']): ?> class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
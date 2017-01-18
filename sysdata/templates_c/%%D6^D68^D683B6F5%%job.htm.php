<?php /* Smarty version 2.6.19, created on 2011-04-19 14:30:42
         compiled from job.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'job.htm', 22, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['job']['jobtitle']; ?>
_<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
</title>
<meta name="keywords" content="<?php echo $this->_tpl_vars['job']['keywords']; ?>
,<?php echo $this->_tpl_vars['cfg']['keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['job']['description']; ?>
,<?php echo $this->_tpl_vars['cfg']['description']; ?>
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
		<div class="banner"><img src="templates/lianzong/images/banner02.jpg" border="0" /></div>
		<div class="yourpos"><a href="index.php">首页</a> >> <a href="jobs.php?cid=<?php echo $this->_tpl_vars['job']['cid']; ?>
"><?php echo $this->_tpl_vars['job']['name']; ?>
</a> >> <?php echo $this->_tpl_vars['job']['jobtitle']; ?>
</div>
		<div class="title-gray"></div>
		<div class="jobsbox">
			<h3><?php echo $this->_tpl_vars['job']['jobtitle']; ?>
</h3>
			<div class="jobs-item">招聘人数：<?php echo $this->_tpl_vars['job']['numbers']; ?>
　薪资：<?php echo $this->_tpl_vars['job']['salary']; ?>
　发布时间：<?php echo ((is_array($_tmp=$this->_tpl_vars['job']['dateline'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</div>
			<div class="jobs-content"><strong>职位描述：</strong><br /><br /><?php echo $this->_tpl_vars['job']['jobdescription']; ?>
</div>
			<div class="jobs-content"><strong>能力要求：</strong><br /><br /><?php echo $this->_tpl_vars['job']['content']; ?>
</div>
		</div>
		<!--<div class="apply"><a href="mailto:service@songdewei.com?subject=应聘：<?php echo $this->_tpl_vars['job']['jobtitle']; ?>
&body=请将您的简历以附件的形式发给我们。">立即申请</a></div>-->
		<div class="blank"></div>
	</div>
	<div class="right01">
		<div class="title-big">加入连纵</div>
		<ul class="titlelist">
			<?php $_from = $this->_tpl_vars['category']['jobs']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
			<li><a href="<?php echo $this->_tpl_vars['aa']['caturl']; ?>
"<?php if ($_GET['cid'] == $this->_tpl_vars['aa']['cid']): ?> class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<div><img src="templates/lianzong/images/pic-2.jpg" width="245" border="0" /></div>
	</div>
	<div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
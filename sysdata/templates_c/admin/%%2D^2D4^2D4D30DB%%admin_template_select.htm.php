<?php /* Smarty version 2.6.19, created on 2011-04-13 14:06:29
         compiled from admin_template_select.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main-div">
<div class="pos-div2"><h2><?php echo $this->_tpl_vars['lang']['cp_home']; ?>
 &raquo; <?php echo $this->_tpl_vars['lang']['tpl_select']; ?>
</h2></div>
<div class="blank"></div>
<h2 style="padding-left:10px;"><?php echo $this->_tpl_vars['lang']['tpl_current']; ?>
</h2>
<div class="tmp-box">
   <img src="../templates/<?php echo $this->_tpl_vars['cfg']['template']; ?>
/thumb.jpg" width="160" height="120" border="0" />
   <div class="tmp-name"><b><?php echo $this->_tpl_vars['cfg']['template']; ?>
</b></div>
</div>
<div class="blank" style="border-bottom:1px #CCCCCC solid;"></div>
<div class="blank"></div>
<h2 style="padding-left:10px;"><?php echo $this->_tpl_vars['lang']['tpl_list']; ?>
</h2>
<?php $_from = $this->_tpl_vars['templets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tmp']):
?>
<div class="tmp-box">
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save&tmp=<?php echo $this->_tpl_vars['tmp']['name']; ?>
"><img src="<?php echo $this->_tpl_vars['tmp']['img']; ?>
" title="<?php echo $this->_tpl_vars['lang']['click_choose']; ?>
" width="160" height="120" border="0"/></a>
<div class="tmp-name"><?php echo $this->_tpl_vars['tmp']['name']; ?>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>
<div class="blank"></div>
</div>
<div class="bottom-line"></div>
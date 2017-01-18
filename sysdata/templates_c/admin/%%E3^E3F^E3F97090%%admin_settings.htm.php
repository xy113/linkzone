<?php /* Smarty version 2.6.19, created on 2011-04-13 15:45:58
         compiled from admin_settings.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main-div">
<div class="toolbar">
    <span class="btn btn-dft" onclick="document.settings.submit()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<form name="settings" method="post" action="?action=saveconfig&op=<?php echo $this->_tpl_vars['op']; ?>
">
<div class="blank"></div>
<?php if ($this->_tpl_vars['op'] == 'basic'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'libs/basic_set.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['op'] == 'optimization'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'libs/optimization_set.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['op'] == 'attachment'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'libs/attachments_set.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['op'] == 'img'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'libs/image_set.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<div class="blank"></div>
</form>
<div class="toolbar">
    <span class="btn btn-dft" onclick="document.settings.submit()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
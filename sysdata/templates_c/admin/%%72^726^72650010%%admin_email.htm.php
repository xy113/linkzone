<?php /* Smarty version 2.6.19, created on 2011-04-17 16:03:51
         compiled from admin_email.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_email.htm', 88, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
<div class="toolbar">
	<span class="btn btn-dft" onclick="SendMail(document.form1)" onmouseover="this.className=btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['mail_post']; ?>
</span></span>
	<span class="btn btn-dft" onclick="SaveMail(document.form1)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save">
    <input type="hidden" name="mail_id" value="<?php echo $this->_tpl_vars['mail']['mail_id']; ?>
" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table">
      <tr>
        <td><?php echo $this->_tpl_vars['lang']['mail_to']; ?>
£º</td>
        <td><input name="mail_to" type="text" value="<?php echo $this->_tpl_vars['mail']['mail_to']; ?>
" class="textinput" style="width:480px;" /> <input type="checkbox" name="mail_toall" value="1"<?php if ($this->_tpl_vars['mail']['mail_toall'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['mail_toall']; ?>
</td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['lang']['mail_subject']; ?>
£º</td>
        <td><input name="mail_subject" type="text" value="<?php echo $this->_tpl_vars['mail']['mail_subject']; ?>
" class="textinput" style="width:480px;" /></td>
      </tr>
      <tr>
        <td width="50"><?php echo $this->_tpl_vars['lang']['mail_from']; ?>
£º</td>
        <td><input name="mail_from" type="text" value="<?php if ($this->_tpl_vars['mail']['mail_from'] == ''): ?><?php echo $this->_tpl_vars['cfg']['sys_email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['mail']['mail_from']; ?>
<?php endif; ?>" class="textinput" style="width:480px;" /></td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['lang']['mail_content']; ?>
£º</td>
        <td><?php echo $this->_tpl_vars['maileditor']; ?>
</td>
      </tr>
    </table>
  </form>
<div class="toolbar">
	<span class="btn btn-dft" onclick="SendMail(document.form1)" onmouseover="this.className=btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['mail_post']; ?>
</span></span>
	<span class="btn btn-dft" onclick="SaveMail(document.form1)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php echo '
<script type="text/javascript">
function SendMail(obj){
    if(!obj.mail_to.value && obj.mail_toall.checked==false){
	    showError(mail_to_empty);
		return false;
	}
    if(!obj.mail_subject.value){
	    showError(mail_subject_empty);
		return false;
	}
	obj.action = \'admin_email.php?action=save&send=1\';
	obj.submit();
}

function SaveMail(obj){
    if(!obj.mail_to.value && obj.mail_toall.checked==false){
	    showError(mail_to_empty);
		return false;
	}
    if(!obj.mail_subject.value){
	    showError(mail_subject_empty);
		return false;
	}
	obj.action = \'admin_email.php?action=save\';
	obj.submit();
}
</script>
'; ?>

<?php else: ?>
<div class="main-div">
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('mail_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['mail_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
    <tr>
      <th width="20"><input type="checkbox" onclick="checkAll(this,'mail_id[]')" /></td>
      <th><?php echo $this->_tpl_vars['lang']['mail_subject']; ?>
</th>
      <th width="80"><?php echo $this->_tpl_vars['lang']['mail_author']; ?>
</th>
      <th width="120" class="last"><?php echo $this->_tpl_vars['lang']['mail_time']; ?>
</th>
    </tr>
	<?php $_from = $this->_tpl_vars['mails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mail']):
?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td><input type="checkbox" name="mail_id[]" value="<?php echo $this->_tpl_vars['mail']['mail_id']; ?>
" onclick="checkThis(this)" /></td>
      <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&mail_id=<?php echo $this->_tpl_vars['mail']['mail_id']; ?>
"><?php echo $this->_tpl_vars['mail']['mail_subject']; ?>
</a></td>
      <td><?php echo $this->_tpl_vars['mail']['mail_author']; ?>
</td>
      <td><span class="mdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['mail']['mail_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span></td>
    </tr>
	<?php endforeach; endif; unset($_from); ?>
    <tr>
      <td colspan="4"><?php echo $this->_tpl_vars['lang']['select']; ?>
£º
			<a href="javascript:;" onclick="selectAll('mail_id[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
			<a href="javascript:;" onclick="cancelAll('mail_id[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
			<a href="javascript:;" onclick="reverseAll('mail_id[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
	  </td>
  </tr>
  </table>
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('mail_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['mail_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
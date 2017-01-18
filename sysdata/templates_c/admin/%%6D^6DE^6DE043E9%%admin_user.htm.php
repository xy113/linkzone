<?php /* Smarty version 2.6.19, created on 2011-04-17 15:04:44
         compiled from admin_user.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_user.htm', 120, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
	<div class="toolbar">
		<span class="btn btn-dft" onclick="return check_user_submit(document.form1)" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php if ($this->_tpl_vars['action'] == 'add'): ?><?php echo $this->_tpl_vars['lang']['save']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
<?php endif; ?></span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload();" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
	</div>
	  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save">
		<input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['user']['user_id']; ?>
" />
		<table border="0" cellspacing="0" cellpadding="0" class="form-table">
		  <tr>
			<td width="70"><?php echo $this->_tpl_vars['lang']['user_name']; ?>
£º</td>
			<td><input name="username" type="text" class="textinput" style="width:240px;" onblur="checkValue(this.value,'&action=checkname','<?php echo $this->_tpl_vars['lang']['user_exists']; ?>
')" value="<?php echo $this->_tpl_vars['user']['username']; ?>
"<?php if ($this->_tpl_vars['action'] == 'add'): ?><?php endif; ?> /></td>
		  </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_pass']; ?>
£º</td>
			<td>
			    <input name="password" type="password" class="textinput" style="width:240px;" />
			    <input type="hidden" name="oldpass" value="<?php echo $this->_tpl_vars['user']['password']; ?>
" />
			</td>
		  </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_email']; ?>
£º</td>
			<td><input name="email" type="text" class="textinput" id="email" style="width:240px;" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" /></td>
		  </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_group']; ?>
£º</td>
			<td>
			<select name="groupid" id="groupid">
			<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
			<option value="<?php echo $this->_tpl_vars['group']['groupid']; ?>
" <?php if ($this->_tpl_vars['user']['groupid'] == $this->_tpl_vars['group']['groupid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['group']['groupname']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select>		
			</td>
		  </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_sex']; ?>
£º</td>
			<td>
			<input type="radio" name="sex" value="1"<?php if ($this->_tpl_vars['user']['sex'] == 1): ?> checked<?php endif; ?>> <?php echo $this->_tpl_vars['lang']['male']; ?>

			<input type="radio" name="sex" value="0"<?php if ($this->_tpl_vars['user']['sex'] == 0): ?> checked<?php endif; ?>> <?php echo $this->_tpl_vars['lang']['female']; ?>

			</td>
		  </tr>
<!--		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_question']; ?>
£º</td>
			<td><input name="user_question" type="text" value="<?php echo $this->_tpl_vars['user']['user_question']; ?>
" class="textinput" style="width:240px;"></td>
		  </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_answer']; ?>
£º</td>
			<td><input name="user_answer" type="text" value="<?php echo $this->_tpl_vars['user']['user_answer']; ?>
" class="textinput" style="width:240px;"></td>
		  </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_tel']; ?>
£º</td>
			<td><input name="user_tel" type="text" value="<?php echo $this->_tpl_vars['user']['user_tel']; ?>
" class="textinput" style="width:240px;"></td>
		  </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['user_company']; ?>
£º</td>
			<td><input name="user_company" type="text" value="<?php echo $this->_tpl_vars['user']['user_company']; ?>
" class="textinput" style="width:240px;"></td>
		  </tr>
-->		 </table>
	  </form>
	<div class="toolbar">
		<span class="btn btn-dft" onclick="return check_user_submit(document.form1)" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php if ($this->_tpl_vars['action'] == 'add'): ?><?php echo $this->_tpl_vars['lang']['save']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
<?php endif; ?></span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload();" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
	</div>
</div>
<script language="javascript" type="text/javascript">
var user_name_empty='<?php echo $this->_tpl_vars['lang']['user_name_empty']; ?>
';
var user_pass_empty='<?php echo $this->_tpl_vars['lang']['user_pass_empty']; ?>
';
var user_email_empty='<?php echo $this->_tpl_vars['lang']['user_email_empty']; ?>
';
<?php echo '
function check_user_submit(obj){
   if(!trimStr(obj.username.value)){
	  showError(user_name_empty)
	  return false;
   }
   if(!obj.password.value&&!obj.oldpass.value){
	  showError(user_pass_empty);
	  return false;
   }
   if(!obj.email.value){
	  showError(user_email_empty);
	  return false;
   }
   obj.submit();
   return true;
}
'; ?>

</script>
<?php else: ?>
<div class="main-div">
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
    <span class="btn btn-dft" onclick="Drop('user_id[]','&page=<?php echo $_GET['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['user_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $_GET['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
    <tr>
      <th width="20"><input type="checkbox" onclick="checkAll(this,'uid[]')" /></td>
      <th><?php echo $this->_tpl_vars['lang']['user_name']; ?>
</td>
      <th width="80"><?php echo $this->_tpl_vars['lang']['user_group']; ?>
</td>
      <th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['user_sex']; ?>
</td>
      <th width="200"><?php echo $this->_tpl_vars['lang']['user_email']; ?>
</td>
      <th width="90"><?php echo $this->_tpl_vars['lang']['user_lastip']; ?>
</td>
      <th width="60" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['user_logintimes']; ?>
</td>
	  <th width="120" class="last"><?php echo $this->_tpl_vars['lang']['user_lastlogin']; ?>
</td>
    </tr>
	<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td><input type="checkbox" name="uid[]" value="<?php echo $this->_tpl_vars['user']['uid']; ?>
" onclick="checkThis(this)" /></td>
      <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&uid=<?php echo $this->_tpl_vars['user']['uid']; ?>
"><?php echo $this->_tpl_vars['user']['username']; ?>
</a></td>
      <td><?php echo $this->_tpl_vars['user']['groupname']; ?>
</td>
      <td style="text-align:center;"><?php if ($this->_tpl_vars['user']['sex'] == 1): ?><?php echo $this->_tpl_vars['lang']['male']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['female']; ?>
<?php endif; ?></td>
      <td><span onclick="javascript:Edit(this,'edit_email',<?php echo $this->_tpl_vars['user']['uid']; ?>
);"><?php echo $this->_tpl_vars['user']['email']; ?>
</span></td>
      <td><?php echo $this->_tpl_vars['user']['lastip']; ?>
</td>
      <td style="text-align:center;"><?php echo $this->_tpl_vars['user']['logintimes']; ?>
</span></td>
	  <td><span class="mdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['lastlogin'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span></td>
    </tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
	    <td colspan="8"><?php echo $this->_tpl_vars['lang']['select']; ?>
£º
			<a href="javascript:;" onclick="selectAll('uid[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
			<a href="javascript:;" onclick="cancelAll('uid[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
			<a href="javascript:;" onclick="reverseAll('uid[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
		</td>
	</tr>
  </table>
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
    <span class="btn btn-dft" onclick="Drop('user_id[]','&page=<?php echo $_GET['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['user_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $_GET['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
<?php /* Smarty version 2.6.19, created on 2011-06-10 16:24:13
         compiled from admin_admin.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_admin.htm', 139, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
<div class="toolbar">
	<span class="btn btn-dft" onclick="check_admin_submit(document.admin)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save" method="post" name="admin" style="margin:10px 0px;">
<input type="hidden" name="admin_id" value="<?php echo $this->_tpl_vars['admin_user']['admin_id']; ?>
" /> 
<input type="hidden" name="oldpass" value="<?php echo $this->_tpl_vars['admin_user']['admin_pass']; ?>
" /> 
<table border="0" cellspacing="0" cellpadding="0" class="form-table">
  <tr>
	<td width="80"><?php echo $this->_tpl_vars['lang']['admin_account']; ?>
£º</td>
	<td><input name="admin_user" type="text" value="<?php echo $this->_tpl_vars['admin_user']['admin_user']; ?>
" class="textinput" style="width:220px;"<?php if ($this->_tpl_vars['action'] == 'edit'): ?> readonly<?php else: ?> onblur="checkValue(this.value,'&action=checkuser','<?php echo $this->_tpl_vars['lang']['admin_exists']; ?>
')"<?php endif; ?>/></td>
  </tr>
  <tr>
	<td><?php echo $this->_tpl_vars['lang']['admin_password']; ?>
£º</td>
	<td><input name="admin_pass" type="password" class="textinput" style="width:220px;" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['admin_type']; ?>
£º</td>
    <td>
	<select name="admin_type" id="admin_type">
      <option value="0" <?php if ($this->_tpl_vars['admin_user']['admin_type'] == 0): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['lang']['system_admin']; ?>
</option>
      <option value="1" <?php if ($this->_tpl_vars['admin_user']['admin_type'] == 1): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['lang']['content_admin']; ?>
</option>
    </select>	
    </td>
  </tr>
  <tr>
	<td><?php echo $this->_tpl_vars['lang']['admin_tel']; ?>
£º</td>
	<td><input name="admin_tel" type="text" value="<?php echo $this->_tpl_vars['admin_user']['admin_tel']; ?>
" class="textinput" style="width:220px;" /></td>
  </tr>
  <tr>
	<td><?php echo $this->_tpl_vars['lang']['admin_email']; ?>
£º</td>
	<td><input name="admin_email" type="text" value="<?php echo $this->_tpl_vars['admin_user']['admin_email']; ?>
" class="textinput" style="width:220px;" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['admin_qq']; ?>
£º</td>
    <td><input name="admin_qq" type="text" value="<?php echo $this->_tpl_vars['admin_user']['admin_qq']; ?>
" class="textinput" style="width:220px;" /></td>
  </tr>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['admin_msn']; ?>
£º</td>
    <td><input name="admin_msn" type="text" value="<?php echo $this->_tpl_vars['admin_user']['admin_msn']; ?>
" class="textinput" style="width:220px;" /></td>
  </tr>
  <?php if ($this->_tpl_vars['admin_user']['admin_type'] == 0): ?>
  <tr>
    <td><?php echo $this->_tpl_vars['lang']['admin_competence']; ?>
£º</td>
    <td style="line-height:20px;">
	<?php $_from = $this->_tpl_vars['myactions']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['group']):
?>
	<input type="checkbox" name="competence[]" value="<?php echo $this->_tpl_vars['group']['action_id']; ?>
"<?php echo $this->_tpl_vars['group']['checked']; ?>
 onclick="CheckSub(this,<?php echo $this->_tpl_vars['key']; ?>
)" /> <strong><?php echo $this->_tpl_vars['group']['action_name']; ?>
</strong><br />
	<span id="sub_<?php echo $this->_tpl_vars['key']; ?>
">
	<?php $this->assign('sub', $this->_tpl_vars['group']['action_id']); ?>
	<?php $_from = $this->_tpl_vars['myactions'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
	¡¡<input type="checkbox" name="competence[]" value="<?php echo $this->_tpl_vars['menu']['action_id']; ?>
"<?php echo $this->_tpl_vars['menu']['checked']; ?>
 /> <?php echo $this->_tpl_vars['menu']['action_name']; ?>
<br />
	<?php endforeach; endif; unset($_from); ?>
	</span>
	<?php endforeach; endif; unset($_from); ?>	
	</td>
  </tr>
  <?php endif; ?>
</table>
</form>
<div class="toolbar">
	<span class="btn btn-dft" onclick="check_admin_submit(document.admin)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
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
function check_admin_submit(obj){
   pattern1 = /[a-zA-Z]/;
   pattern2 = /[a-zA-z]+[0-9]/;
   if(!trimStr(obj.admin_user.value)){
        showError(admin_user_empty);
	    return false;
   }
   if(!(pattern1.test(obj.admin_user.value)||pattern2.test(obj.admin_user.value))){
        showError(admin_user_incorrect);
	    return false;
   }
   
   var password = obj.admin_pass.value;
   if(password) {
	   if(password.length<5||password.length>16){
	       showError(admin_pass_incorrect);
		   return false;
	   }
   }else {
       password = obj.oldpass.value;
	   if(!password){
		  showError(admin_pass_empty);
		  return false;
	   }
   }
   
   obj.submit();
   return true;
}

function CheckSub(theobj,key){
	var items = $(\'sub_\'+key).getElementsByTagName(\'input\');
	for(var i=0;i<items.length;i++){
		if(theobj.checked){
			items[i].checked = true;
		}else{
			items[i].checked = false;
		}
	}
}
</script>
'; ?>

<?php else: ?>
<div class="main-div">
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('admin_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['admin_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="list">
  <tr>
    <th width="20"><input type="checkbox" onclick="checkAll(this,'admin_id[]')" /></th>
    <th><?php echo $this->_tpl_vars['lang']['admin_account']; ?>
</th>
	<th width="100"><?php echo $this->_tpl_vars['lang']['admin_type']; ?>
</th>
    <th width="140"><?php echo $this->_tpl_vars['lang']['admin_last_login']; ?>
</th>
    <th width="60"><?php echo $this->_tpl_vars['lang']['admin_login_times']; ?>
</th>
    <th width="90"><?php echo $this->_tpl_vars['lang']['admin_login_ip']; ?>
</th>
    <th width="100"><?php echo $this->_tpl_vars['lang']['admin_tel']; ?>
</th>
    <th width="100" class="last"><?php echo $this->_tpl_vars['lang']['admin_qq']; ?>
</th>
  </tr>
  <?php $_from = $this->_tpl_vars['admin_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
  <tr onmouseover="this.className='active'" onmouseout="this.className=''">
    <td><input type="checkbox" name="admin_id[]" value="<?php echo $this->_tpl_vars['user']['admin_id']; ?>
" onclick="checkThis(this)" /></td>
    <td><a href="admin_admin.php?action=edit&admin_id=<?php echo $this->_tpl_vars['user']['admin_id']; ?>
"><?php echo $this->_tpl_vars['user']['admin_user']; ?>
</a></td>
	<td><?php if ($this->_tpl_vars['user']['admin_type'] == 0): ?><font color="#FF0000"><?php echo $this->_tpl_vars['lang']['system_admin']; ?>
</font><?php else: ?><?php echo $this->_tpl_vars['lang']['content_admin']; ?>
<?php endif; ?></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['lastlogin'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</td>
    <td><?php echo $this->_tpl_vars['user']['logintimes']; ?>
</td>
    <td><?php echo $this->_tpl_vars['user']['admin_ip']; ?>
</td>
    <td><?php echo $this->_tpl_vars['user']['admin_tel']; ?>
</td>
    <td><?php echo $this->_tpl_vars['user']['admin_qq']; ?>
</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
</table>
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('admin_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['admin_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
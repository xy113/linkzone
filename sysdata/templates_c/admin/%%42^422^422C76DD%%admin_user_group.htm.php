<?php /* Smarty version 2.6.19, created on 2011-04-18 03:25:00
         compiled from admin_user_group.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
<div class="toolbar">
	<span class="btn btn-dft" onclick="check_group_submit(document.group)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php if ($this->_tpl_vars['action'] == 'add'): ?><?php echo $this->_tpl_vars['lang']['save']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
<?php endif; ?></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<form name="group" method="post" action="<?php echo $_SERVER['PHP_SLEF']; ?>
?action=save">
  <input type="hidden" name="group_id" value="<?php echo $this->_tpl_vars['group']['group_id']; ?>
" />
  <table border="0" cellspacing="0" cellpadding="0" class="form-table">
    <tr>
      <td width="90"><?php echo $this->_tpl_vars['lang']['group_name']; ?>
£º</td>
      <td><input name="groupname" type="text" class="textinput" id="groupname" style="width:240px;" value="<?php echo $this->_tpl_vars['group']['groupname']; ?>
" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['group_min']; ?>
£º</td>
      <td><input name="minexp" type="text" class="textinput" id="minexp" style="width:240px;" value="<?php echo $this->_tpl_vars['group']['minexp']; ?>
" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['group_max']; ?>
£º</td>
      <td><input name="maxexp" type="text" class="textinput" id="maxexp" style="width:240px;" value="<?php echo $this->_tpl_vars['group']['maxexp']; ?>
" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['group_special']; ?>
£º</td>
      <td>
	    <input type="radio" name="type" value="1"<?php if ($this->_tpl_vars['group']['type'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
¡¡
        <input type="radio" name="type" value="0"<?php if ($this->_tpl_vars['group']['type'] != 1): ?> checked="checked"<?php endif; ?>  /> <?php echo $this->_tpl_vars['lang']['no']; ?>

	  </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['remark']; ?>
£º</td>
      <td><textarea name="notes" id="notes" style="width:500px; height:50px;"><?php echo $this->_tpl_vars['group']['notes']; ?>
</textarea></td>
    </tr>
  </table>
</form>
<div class="toolbar">
	<span class="btn btn-dft" onclick="check_group_submit(document.group)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php if ($this->_tpl_vars['action'] == 'add'): ?><?php echo $this->_tpl_vars['lang']['save']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
<?php endif; ?></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<script language="javascript" type="text/javascript">
var group_name_empty='<?php echo $this->_tpl_vars['lang']['group_name_empty']; ?>
';
var group_min_empty='<?php echo $this->_tpl_vars['lang']['group_min_empty']; ?>
';
var group_max_empty='<?php echo $this->_tpl_vars['lang']['group_max_empty']; ?>
';
<?php echo '
function check_group_submit(obj){
   if(!obj.groupname.value){
	  showError(group_name_empty);
	  return false;
   }
   if(!obj.minexp.value){
       showError(group_min_empty);
	   return false;
   }
   if(!obj.maxexp.value){
	  showError(group_max_empty)
	  return false;
   }
   obj.submit();
   return true;
}'; ?>

</script>
<?php else: ?>
<div class="main-div">
<div class="toolbar">
	<span class="btn btn-dft" onclick="Drop('group_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=add')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['group_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
    <tr>
	  <th width="20"><input type="checkbox" onclick="checkAll(this,'group_id[]')" /></th>
      <th width="15" style="text-align:center;">ID</th>
      <th width="200"><?php echo $this->_tpl_vars['lang']['group_name']; ?>
</th>
      <th width="60"><?php echo $this->_tpl_vars['lang']['group_min']; ?>
</th>
      <th width="60"><?php echo $this->_tpl_vars['lang']['group_max']; ?>
</th>
      <th width="60" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['group_special']; ?>
</th>
      <th class="last"><?php echo $this->_tpl_vars['lang']['remark']; ?>
</th>
    </tr>
	<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['gp']):
?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
	  <td><input type="checkbox" name="groupid[]" value="<?php echo $this->_tpl_vars['gp']['groupid']; ?>
" /></td>
      <td style="text-align:center;"><?php echo $this->_tpl_vars['gp']['groupid']; ?>
</td>
      <td onmouseover="showMenuBox(<?php echo $this->_tpl_vars['key']; ?>
)" onmouseout="hideMenuBox(<?php echo $this->_tpl_vars['key']; ?>
)"><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_name',<?php echo $this->_tpl_vars['gp']['groupid']; ?>
)"><?php echo $this->_tpl_vars['gp']['groupname']; ?>
</span>
	      <span class="c_box" id="box_<?php echo $this->_tpl_vars['key']; ?>
">
		       <b class="icon-edit" title="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" onclick="window.location='<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&groupid=<?php echo $this->_tpl_vars['gp']['groupid']; ?>
'"></b>
			   <b class="icon-drop" title="<?php echo $this->_tpl_vars['lang']['drop']; ?>
" onclick="DropOne(<?php echo $this->_tpl_vars['gp']['groupid']; ?>
)"></b>
		  </span>
	  </td>
      <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_min',<?php echo $this->_tpl_vars['gp']['groupid']; ?>
)"><?php echo $this->_tpl_vars['gp']['minexp']; ?>
</span></td>
      <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_max',<?php echo $this->_tpl_vars['gp']['groupid']; ?>
)"><?php echo $this->_tpl_vars['gp']['maxexp']; ?>
</span></td>
      <td style="text-align:center;"><img title="<?php echo $this->_tpl_vars['lang']['click_switch']; ?>
" src="<?php if ($this->_tpl_vars['gp']['type'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" onclick="javascript:toggle(this,'edit_type',<?php echo $this->_tpl_vars['gp']['groupid']; ?>
)" /></td>
      <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_desc',<?php echo $this->_tpl_vars['gp']['groupid']; ?>
)"><?php echo $this->_tpl_vars['gp']['notes']; ?>
</span></td>
    </tr>
	<?php endforeach; endif; unset($_from); ?>
  </table>
<div class="toolbar">
	<span class="btn btn-dft" onclick="Drop('group_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=add')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['group_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
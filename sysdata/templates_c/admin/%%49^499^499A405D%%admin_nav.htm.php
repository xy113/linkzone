<?php /* Smarty version 2.6.19, created on 2011-04-14 07:39:27
         compiled from admin_nav.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
<div class="toolbar">
    <span class="btn btn-dft" onclick="check_nav_submit(document.formnav)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
    <span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<form name="formnav" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save">
  <input type="hidden" name="nav_id" value="<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
" />
  <table border="0" cellspacing="0" cellpadding="0" class="form-table">
    <tr>
      <td height="10" colspan="2"></td>
    </tr>
    <tr>
      <td width="80"><?php echo $this->_tpl_vars['lang']['nav_up']; ?>
：</td>
      <td>
	     <select name="nav_up">
		 <option value="0">设为顶级导航</option>
		 <?php $_from = $this->_tpl_vars['navs']['top']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['navitem']):
?>
		 <option value="<?php echo $this->_tpl_vars['navitem']['nav_id']; ?>
"><?php echo $this->_tpl_vars['navitem']['nav_name']; ?>
</option>
		 <?php endforeach; endif; unset($_from); ?>
		 <?php $_from = $this->_tpl_vars['navs']['mid']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['navitem']):
?>
		 <option value="<?php echo $this->_tpl_vars['navitem']['nav_id']; ?>
"><?php echo $this->_tpl_vars['navitem']['nav_name']; ?>
</option>
		 <?php endforeach; endif; unset($_from); ?>
		 <?php $_from = $this->_tpl_vars['navs']['bot']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['navitem']):
?>
		 <option value="<?php echo $this->_tpl_vars['navitem']['nav_id']; ?>
"><?php echo $this->_tpl_vars['navitem']['nav_name']; ?>
</option>
		 <?php endforeach; endif; unset($_from); ?>
		 </select>
	  </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['nav_open']; ?>
：</td>
      <td>
      <input type="radio" name="nav_open" id="radio" value="1"<?php if ($this->_tpl_vars['nav']['nav_open'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>

      <input type="radio" name="nav_open" id="radio2" value="0"<?php if ($this->_tpl_vars['nav']['nav_open'] != 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>

      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['nav_position']; ?>
：</td>
      <td><select name="nav_position" id="nav_position">
        <option value="top" <?php if ($this->_tpl_vars['nav']['nav_position'] == 'top'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['nav_top']; ?>
</option>
        <option value="mid" <?php if ($this->_tpl_vars['nav']['nav_position'] == 'mid'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['nav_mid']; ?>
</option>
        <option value="bot" <?php if ($this->_tpl_vars['nav']['nav_position'] == 'bot'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['nav_bottom']; ?>
</option>
      </select>
      </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['nav_name']; ?>
：</td>
      <td><input name="nav_name" type="text" class="textinput" style="width:200px;" value="<?php echo $this->_tpl_vars['nav']['nav_name']; ?>
"<?php if ($this->_tpl_vars['action'] == 'edit' && $this->_tpl_vars['nav']['nav_type'] == 0): ?> readonly<?php endif; ?> /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['nav_link']; ?>
：</td>
      <td><input name="nav_link" type="text" class="textinput" style="width:200px;" value="<?php echo $this->_tpl_vars['nav']['nav_link']; ?>
" <?php if ($this->_tpl_vars['action'] == 'edit' && $this->_tpl_vars['nav']['nav_type'] == 0): ?> readonly<?php endif; ?> /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['nav_order']; ?>
：</td>
      <td><input name="nav_order" type="text" class="textinput" style="width:200px;" value="<?php echo $this->_tpl_vars['nav']['nav_order']; ?>
" /></td>
    </tr>
  <tr>
      <td height="10" colspan="2"></td>
  </tr>
  </table>
</form>
<div class="toolbar">
    <span class="btn btn-dft" onclick="check_nav_submit(document.formnav)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
    <span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php echo '
<script language="javascript" type="text/javascript">
function check_nav_submit(obj){
   if(!obj.nav_name.value){
	  showError(nav_name_empty);
	  return false;
   }else if(!obj.nav_link.value){
	  showError(nav_link_empty);
	  return false;
   }else{
      obj.submit();
	  return true;
   }
}
</script>
'; ?>

<?php else: ?>
<div class="main-div">
<div class="toolbar">
	<span class="btn btn-dft" onclick="Drop('nav_id[]')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><strong><?php echo $this->_tpl_vars['lang']['drop']; ?>
</strong></span></span>
    <span class="btn btn-dft" onclick="Location('admin_nav.php?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['nav_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <table border="0" cellspacing="0" cellpadding="0" class="list">
    <tr>
      <th width="15"><input type="checkbox" onclick="checkAll(this,'nav_id[]')" /></th>
      <th width="120" colspan="2"><?php echo $this->_tpl_vars['lang']['nav_name']; ?>
</th>
	  <th><?php echo $this->_tpl_vars['lang']['nav_link']; ?>
</th>
      <th width="60"><?php echo $this->_tpl_vars['lang']['nav_position']; ?>
</th>
      <th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['sort']; ?>
</th>
	  <th width="60"><?php echo $this->_tpl_vars['lang']['nav_type']; ?>
</th>
      <th width="50" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['nav_open']; ?>
</th>
      <th width="50" class="last"><?php echo $this->_tpl_vars['lang']['nav_display']; ?>
</th>
    </tr>
	<?php $_from = $this->_tpl_vars['navs']['top']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
	<?php $this->assign('sub', $this->_tpl_vars['nav']['nav_id']); ?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td><input type="checkbox" name="nav_id[]" value="<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
" onclick="checkThis(this)" /></td>
      <td colspan="2"><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&nav_id=<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
"><b><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</b></a></td>
      <td><span onclick="Edit(this,'edit_link',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_link']; ?>
</span></td>
	  <td style="color:#0000FF;"><?php echo $this->_tpl_vars['lang']['nav_top']; ?>
</td>
      <td style="text-align:center;"><span onclick="javascript:Edit(this,'edit_order',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_order']; ?>
</span></td>
      <td><?php if ($this->_tpl_vars['nav']['nav_type'] == 0): ?><span style="color:#FF0000;"><?php echo $this->_tpl_vars['lang']['nav_system']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['lang']['nav_user']; ?>
<?php endif; ?></td>
	  <td style="text-align:center;"><img onclick="toggle(this,'toggle_open',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_open'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
      <td style="text-align:center;"><img onclick="toggle(this,'toggle_display',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_display'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
    </tr>
		<?php $_from = $this->_tpl_vars['navs']['top'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
		<tr onmouseover="this.className='active'" onmouseout="this.className=''">
		  <td></td>
		  <td width="15"><input type="checkbox" name="nav_id[]" value="<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
" onclick="checkThis(this)" /></td>
		  <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&nav_id=<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
"><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></td>
		  <td><span onclick="Edit(this,'edit_link',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_link']; ?>
</span></td>
		  <td style="color:#0000FF;"><?php echo $this->_tpl_vars['lang']['nav_top']; ?>
</td>
		  <td style="text-align:center;"><span onclick="javascript:Edit(this,'edit_order',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_order']; ?>
</span></td>
		  <td><?php if ($this->_tpl_vars['nav']['nav_type'] == 0): ?><span style="color:#FF0000;"><?php echo $this->_tpl_vars['lang']['nav_system']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['lang']['nav_user']; ?>
<?php endif; ?></td>
		  <td style="text-align:center;"><img onclick="toggle(this,'toggle_open',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_open'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		  <td style="text-align:center;"><img onclick="toggle(this,'toggle_display',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_display'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
	<tr bgcolor="#FFFFFF"><td colspan="9" style="height:10px;"></td></tr>
	<?php $_from = $this->_tpl_vars['navs']['mid']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
	<?php $this->assign('sub', $this->_tpl_vars['nav']['nav_id']); ?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td><input type="checkbox" name="nav_id[]" value="<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
" onclick="checkThis(this)" /></td>
      <td colspan="2"><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&nav_id=<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
"><b><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</b></a></td>
      <td><span onclick="Edit(this,'edit_link',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_link']; ?>
</span></td>
	  <td style="color:#FF0000;"><?php echo $this->_tpl_vars['lang']['nav_mid']; ?>
</td>
      <td style="text-align:center;"><span onclick="javascript:Edit(this,'edit_order',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_order']; ?>
</span></td>
      <td><?php if ($this->_tpl_vars['nav']['nav_type'] == 0): ?><span style="color:#FF0000;"><?php echo $this->_tpl_vars['lang']['nav_system']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['lang']['nav_user']; ?>
<?php endif; ?></td>
	  <td style="text-align:center;"><img onclick="toggle(this,'toggle_open',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_open'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
      <td style="text-align:center;"><img onclick="toggle(this,'toggle_display',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_display'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
    </tr>
		<?php $_from = $this->_tpl_vars['navs']['mid'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
		<tr onmouseover="this.className='active'" onmouseout="this.className=''">
		  <td></td>
		  <td width="15"><input type="checkbox" name="nav_id[]" value="<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
" onclick="checkThis(this)" /></td>
		  <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&nav_id=<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
"><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></td>
		  <td><span onclick="Edit(this,'edit_link',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_link']; ?>
</span></td>
		  <td style="color:#FF0000;"><?php echo $this->_tpl_vars['lang']['nav_mid']; ?>
</td>
		  <td style="text-align:center;"><span onclick="javascript:Edit(this,'edit_order',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_order']; ?>
</span></td>
		  <td><?php if ($this->_tpl_vars['nav']['nav_type'] == 0): ?><span style="color:#FF0000;"><?php echo $this->_tpl_vars['lang']['nav_system']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['lang']['nav_user']; ?>
<?php endif; ?></td>
		  <td style="text-align:center;"><img onclick="toggle(this,'toggle_open',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_open'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		  <td style="text-align:center;"><img onclick="toggle(this,'toggle_display',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_display'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
	<tr bgcolor="#FFFFFF"><td colspan="9" style="height:10px;"></td></tr>
	<?php $_from = $this->_tpl_vars['navs']['bot']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
	<?php $this->assign('sub', $this->_tpl_vars['nav']['nav_id']); ?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td><input type="checkbox" name="nav_id[]" value="<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
" onclick="checkThis(this)" /></td>
      <td colspan="2"><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&nav_id=<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
"><b><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</b></a></td>
      <td><span onclick="Edit(this,'edit_link',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_link']; ?>
</span></td>
	  <td style="color:#006600"><?php echo $this->_tpl_vars['lang']['nav_bottom']; ?>
</td>
      <td style="text-align:center;"><span onclick="javascript:Edit(this,'edit_order',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_order']; ?>
</span></td>
      <td><?php if ($this->_tpl_vars['nav']['nav_type'] == 0): ?><span style="color:#006600;"><?php echo $this->_tpl_vars['lang']['nav_system']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['lang']['nav_user']; ?>
<?php endif; ?></td>
	  <td style="text-align:center;"><img onclick="toggle(this,'toggle_open',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_open'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
      <td style="text-align:center;"><img onclick="toggle(this,'toggle_display',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_display'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
    </tr>
		<?php $_from = $this->_tpl_vars['navs']['bot'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
		<tr onmouseover="this.className='active'" onmouseout="this.className=''">
		  <td></td>
		  <td width="15"><input type="checkbox" name="nav_id[]" value="<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
" onclick="checkThis(this)" /></td>
		  <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&nav_id=<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
"><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></td>
		  <td><span onclick="Edit(this,'edit_link',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_link']; ?>
</span></td>
		  <td style="color:#006600"><?php echo $this->_tpl_vars['lang']['nav_bottom']; ?>
</td>
		  <td style="text-align:center;"><span onclick="javascript:Edit(this,'edit_order',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)"><?php echo $this->_tpl_vars['nav']['nav_order']; ?>
</span></td>
		  <td><?php if ($this->_tpl_vars['nav']['nav_type'] == 0): ?><span style="color:#FF0000;"><?php echo $this->_tpl_vars['lang']['nav_system']; ?>
</span><?php else: ?><?php echo $this->_tpl_vars['lang']['nav_user']; ?>
<?php endif; ?></td>
		  <td style="text-align:center;"><img onclick="toggle(this,'toggle_open',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_open'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		  <td style="text-align:center;"><img onclick="toggle(this,'toggle_display',<?php echo $this->_tpl_vars['nav']['nav_id']; ?>
)" src="<?php if ($this->_tpl_vars['nav']['nav_display'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
	<tr><td colspan="9"><?php echo $this->_tpl_vars['lang']['select']; ?>
:
		<a href="javascript:;" onclick="selectAll('nav_id[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
		<a href="javascript:;" onclick="cancelAll('nav_id[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
		<a href="javascript:;" onclick="reverseAll('nav_id[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
	</td></tr>
  </table>
<div class="toolbar">
	<span class="btn btn-dft" onclick="Drop('nav_id[]')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><strong><?php echo $this->_tpl_vars['lang']['drop']; ?>
</strong></span></span>
    <span class="btn btn-dft" onclick="Location('admin_nav.php?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['nav_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
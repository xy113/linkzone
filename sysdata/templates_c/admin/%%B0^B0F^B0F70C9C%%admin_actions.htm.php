<?php /* Smarty version 2.6.19, created on 2011-04-17 16:40:46
         compiled from admin_actions.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
<div class="toolbar">
    <span class="btn btn-dft" onclick="check_action_submit(document.actions)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
    <span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<form name="actions" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save">
  <input type="hidden" name="action_id" value="<?php echo $this->_tpl_vars['myaction']['action_id']; ?>
" />
  <table border="0" cellspacing="0" class="form-table">
    <tr>
      <td width="90"><?php echo $this->_tpl_vars['lang']['action_name']; ?>
£º</td>
      <td><input name="action_name" type="text" id="action_name" value="<?php echo $this->_tpl_vars['myaction']['action_name']; ?>
" class="textinput" style="width:300px;" /></td>
    </tr>
	<?php if ($this->_tpl_vars['action_up'] != 0 || $this->_tpl_vars['myaction']['action_up'] != 0): ?>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['action_up']; ?>
£º</td>
      <td>
	  <select name="action_up" id="action_up">
	  <?php $_from = $this->_tpl_vars['actions']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
	  <option value="<?php echo $this->_tpl_vars['group']['action_id']; ?>
" <?php if ($this->_tpl_vars['group']['action_id'] == $this->_tpl_vars['action_up']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['group']['action_name']; ?>
</option>
	  <?php endforeach; endif; unset($_from); ?>
      </select>
      </td>
    </tr>
	<?php endif; ?>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['action_code']; ?>
£º</td>
      <td><input name="action_code" type="text" id="action_code" value="<?php echo $this->_tpl_vars['myaction']['action_code']; ?>
"  class="textinput" style="width:300px;"<?php if ($this->_tpl_vars['action'] == 'edit' && $this->_tpl_vars['myaction']['action_type'] == 0): ?> readonly<?php endif; ?> /></td>
    </tr>
    
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['action_link']; ?>
£º</td>
      <td><input name="action_link" type="text" id="action_link" value="<?php echo $this->_tpl_vars['myaction']['action_link']; ?>
"  class="textinput" style="width:300px;"<?php if ($this->_tpl_vars['action'] == 'edit' && $this->_tpl_vars['myaction']['action_type'] == 0): ?> readonly<?php endif; ?> /></td>
    </tr>
	  <tr>
      <td height="10" colspan="2"></td>
  </tr>
  </table>
</form>
<div class="toolbar">
    <span class="btn btn-dft" onclick="check_action_submit(document.actions)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
    <span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php else: ?>
<div class="main-div">
<div class="toolbar">
    <span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['action_group']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<div class="blank"></div>
<?php $_from = $this->_tpl_vars['actions']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
   <div style="padding-left:15px; font-size:13px; height:24px; line-height:24px; text-align:left; clear:both;">
        <img src="images/menu_plus.gif" border="0" align="absmiddle" id="img_<?php echo $this->_tpl_vars['group']['action_id']; ?>
" onclick="ChangeMenu(<?php echo $this->_tpl_vars['group']['action_id']; ?>
)"/>
        <b><span onclick="Edit(this,'edit_name',<?php echo $this->_tpl_vars['group']['action_id']; ?>
)"><?php echo $this->_tpl_vars['group']['action_name']; ?>
</span></b> - 
        <?php echo $this->_tpl_vars['lang']['action_order']; ?>
 <span onclick="javascript:Edit(this,'edit_myorder',<?php echo $this->_tpl_vars['group']['action_id']; ?>
);"><?php echo $this->_tpl_vars['group']['action_order']; ?>
</span> - 
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&action_up=<?php echo $this->_tpl_vars['group']['action_id']; ?>
" style="font-weight:100;">[<?php echo $this->_tpl_vars['lang']['action_menu']; ?>
]</a> 
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&action_id=<?php echo $this->_tpl_vars['group']['action_id']; ?>
">[<?php echo $this->_tpl_vars['lang']['edit']; ?>
]</a> 
        <?php if ($this->_tpl_vars['group']['action_type'] != 0): ?>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=drop&action_id=<?php echo $this->_tpl_vars['group']['action_id']; ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['lang']['drop_confirm']; ?>
')">[<?php echo $this->_tpl_vars['lang']['drop']; ?>
]</a>
        <?php endif; ?>
  </div>
  <span id="sub_menu_<?php echo $this->_tpl_vars['group']['action_id']; ?>
" style="display:none;">
  <?php $this->assign('sub', $this->_tpl_vars['group']['action_id']); ?>
  <?php $_from = $this->_tpl_vars['actions'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
  <div style="padding-left:30px; font-size:12px; height:24px; line-height:24px; text-align:left; clear:both;">
        <img src="images/menu_arrow.gif" border="0" align="absmiddle" />
        <span onclick="Edit(this,'edit_name',<?php echo $this->_tpl_vars['menu']['action_id']; ?>
)"><?php echo $this->_tpl_vars['menu']['action_name']; ?>
</span> - 
        <?php echo $this->_tpl_vars['lang']['action_order']; ?>
 <span onclick="Edit(this,'edit_myorder',<?php echo $this->_tpl_vars['menu']['action_id']; ?>
);"><?php echo $this->_tpl_vars['menu']['action_order']; ?>
</span>  -  
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&action_id=<?php echo $this->_tpl_vars['menu']['action_id']; ?>
">[<?php echo $this->_tpl_vars['lang']['edit']; ?>
]</a> 
        <?php if ($this->_tpl_vars['menu']['action_type'] != 0): ?>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=drop&action_id=<?php echo $this->_tpl_vars['menu']['action_id']; ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['lang']['drop_confirm']; ?>
')">[<?php echo $this->_tpl_vars['lang']['drop']; ?>
]</a>
        <?php endif; ?>
  </div>
  <?php endforeach; endif; unset($_from); ?>
  </span>
<?php endforeach; endif; unset($_from); ?>
</div>
<div class="toolbar">
    <span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['action_group']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<?php endif; ?>
<script language="javascript" type="text/javascript">
var action_name_empty='<?php echo $this->_tpl_vars['lang']['action_name_empty']; ?>
';
var action_code_empty='<?php echo $this->_tpl_vars['lang']['action_code_empty']; ?>
';
var action_link_empty='<?php echo $this->_tpl_vars['lang']['action_link_empty']; ?>
';
<?php echo '
function check_action_submit(obj){
   if(!obj.action_name.value){
	  showError(action_name_empty);
	  return false;
   }else if(!obj.action_code.value){
	  showError(action_code_empty);
	  return false;
   }else if(!obj.action_link.value){
	  showError(action_link_empty);
	  return false
   }else{
	  obj.submit();
	  return true;
   }
}

function ChangeMenu(id){
   var img=document.getElementById(\'img_\'+id);
   var sub_menu=document.getElementById(\'sub_menu_\'+id);
   if(sub_menu.style.display==\'block\'){
      img.src=\'images/menu_plus.gif\';
	  sub_menu.style.display=\'none\';
   }else{
      img.src=\'images/menu_minus.gif\';
	  sub_menu.style.display=\'block\';
   }
}
'; ?>

</script>
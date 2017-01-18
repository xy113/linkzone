<?php /* Smarty version 2.6.19, created on 2011-04-18 09:25:42
         compiled from admin_friendlink.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'add' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
<div class="toolbar">
	<span class="btn btn-dft" onclick="check_link_submit(document.link)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<form name="link" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save">
  <input type="hidden" name="link_id" value="<?php echo $this->_tpl_vars['flink']['link_id']; ?>
" />
  <table border="0" cellpadding="0" cellspacing="0" align="center" class="form-table">
	<tr>
	   <td colspan="2" height="10"></td>
	</tr>
    <tr>
      <td width="70"><?php echo $this->_tpl_vars['lang']['link_name']; ?>
£º</td>
      <td><input name="link_name" type="text" class="textinput" value="<?php echo $this->_tpl_vars['flink']['link_name']; ?>
" style="width:400px;" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['link_url']; ?>
£º</td>
      <td><input name="link_url" type="text" class="textinput" value="<?php echo $this->_tpl_vars['flink']['link_url']; ?>
" style="width:400px;" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['link_logo']; ?>
£º</td>
      <td>
	      <input name="link_logo" type="text"  class="textinput" value="<?php echo $this->_tpl_vars['flink']['link_logo']; ?>
" style="width:400px;" />
		  <span class="btn btn-dft" onclick="OpenDialog('link.link_logo')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['upload']; ?>
</span></span>
	  </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['link_info']; ?>
£º</td>
      <td><textarea name="link_info" style="width:480px; height:50px;"><?php echo $this->_tpl_vars['flink']['link_info']; ?>
</textarea></td>
    </tr>
	<tr>
	   <td colspan="2" height="10"></td>
	</tr>
  </table>
</form>
<div class="toolbar">
	<span class="btn btn-dft" onclick="check_link_submit(document.link)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
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
function check_link_submit(obj){
	if(!trimStr(obj.link_name.value)){
		showError(link_name_empty);
		return false;
	}else if(!obj.link_url.value){
		showError(link_url_empty);
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
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('link_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('admin_friendlink.php?action=add')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['link_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="list">
  <tr>
    <th width="25"><input type="checkbox" onclick="checkAll(this,'link_id[]')" /></td>
    <th width="150" style="cursor:pointer;" title="<?php echo $this->_tpl_vars['lang']['click_resort']; ?>
" onclick="Sort()"><?php echo $this->_tpl_vars['lang']['link_name']; ?>
</td>
    <th width="200"><?php echo $this->_tpl_vars['lang']['link_url']; ?>
</td>
    <th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['enabled']; ?>
</td>
    <th width="30" style="text-align:center;cursor:pointer;" title="<?php echo $this->_tpl_vars['lang']['click_resort']; ?>
" onclick="Sort()"><?php echo $this->_tpl_vars['lang']['sort']; ?>
</td>
    <th class="last"><?php echo $this->_tpl_vars['lang']['link_info']; ?>
</td>
  </tr>
  <?php $_from = $this->_tpl_vars['friendlinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['flink']):
?>
  <tr onmouseover="this.className='active'" onmouseout="this.className=''">
    <td><input type="checkbox" name="link_id[]" value="<?php echo $this->_tpl_vars['flink']['link_id']; ?>
" onclick="checkThis(this)" /></td>
    <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_name',<?php echo $this->_tpl_vars['flink']['link_id']; ?>
);"><?php echo $this->_tpl_vars['flink']['link_name']; ?>
</span></td>
    <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_url',<?php echo $this->_tpl_vars['flink']['link_id']; ?>
);"><?php echo $this->_tpl_vars['flink']['link_url']; ?>
</span></td>
    <td style="text-align:center;"><img src="<?php if ($this->_tpl_vars['flink']['link_show'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" title="<?php echo $this->_tpl_vars['lang']['click_switch']; ?>
" onclick="javascript:toggle(this,'edit_show',<?php echo $this->_tpl_vars['flink']['link_id']; ?>
);" /></td>
    <td style="text-align:center;"><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_order',<?php echo $this->_tpl_vars['flink']['link_id']; ?>
);"><?php echo $this->_tpl_vars['flink']['link_order']; ?>
</span></td>
    <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_info',<?php echo $this->_tpl_vars['flink']['link_id']; ?>
);"><?php echo $this->_tpl_vars['flink']['link_info']; ?>
</span></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
      <td colspan="6"><?php echo $this->_tpl_vars['lang']['select']; ?>
£º
		<a href="javascript:;" onclick="selectAll('link_id[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
		<a href="javascript:;" onclick="cancelAll('link_id[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
		<a href="javascript:;" onclick="reverseAll('link_id[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
	 </td>
  </tr>
</table>
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('link_id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('admin_friendlink.php?action=add')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['link_add']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
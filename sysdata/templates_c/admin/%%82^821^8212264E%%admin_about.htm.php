<?php /* Smarty version 2.6.19, created on 2011-04-13 15:46:00
         compiled from admin_about.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_about.htm', 90, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
<div class="toolbar">
    <span class="btn btn-dft" onclick="checkSubmit(document.form1)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
    <span class="ctrlenter">¡¡<?php echo $this->_tpl_vars['lang']['ctrlenter']; ?>
</span>
</div>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save" method="post" name="form1">
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
    <table border="0" cellspacing="0" cellpadding="0" class="form-table">
      <tr>
        <td width="80"><?php echo $this->_tpl_vars['lang']['about_title']; ?>
£º</td>
        <td>
		   <input name="title" type="text" value="<?php echo $this->_tpl_vars['article']['title']; ?>
" class="textinput" style="width:386px;" />
		   <span class="btn btn-dft" onclick="checkValue(document.form1.title.value,'&action=checktitle','<?php echo $this->_tpl_vars['lang']['article_exists']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['checkrepeat']; ?>
</span></span>
		</td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['lang']['add_to_nav']; ?>
£º</td>
        <td>
		   <input type="radio" name="add_to_nav" value="1"<?php if ($this->_tpl_vars['article']['nav_show'] !== 0): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
¡¡
           <input type="radio" name="add_to_nav" value="0"<?php if ($this->_tpl_vars['article']['nav_show'] == 0): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>

		</td>
      </tr>
      <tr>
        <td><?php echo $this->_tpl_vars['lang']['keywords']; ?>
£º</td>
        <td><textarea name="keywords"  class="textinput" style="width:460px; height:60px;"><?php echo $this->_tpl_vars['article']['keywords']; ?>
</textarea></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo $this->_tpl_vars['editor']; ?>
</td>
        </tr>
    </table>
  </form>
<div class="toolbar">
    <span class="btn btn-dft" onclick="checkSubmit(document.form1)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php echo '
<script language="javascript">
var hassubmited = false;
function checkSubmit(theForm){
	if(hassubmited)return false;
	if(!trimStr(theForm.title.value)){
		showError(about_title_empty);
		return false;
	}else{
		hassubmited = true;
		theForm.submit();
		return true;
	}
}

document.onkeydown = function(e){
	e=window.event||e;
	if(e.ctrlKey&&e.keyCode==13){
	   checkSubmit(document.form1);
	}
}
</script>
'; ?>

<?php else: ?>
<div class="main-div">
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'"><span><?php echo $this->_tpl_vars['lang']['add_article']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
    <tr>
      <th width="20"><input type="checkbox" onclick="checkAll(this,'id[]')" /></th>
	  <th width="15" class="tocenter"><img src="images/icon_view.gif" /></th>
      <th width="160"><?php echo $this->_tpl_vars['lang']['about_title']; ?>
</th>
	  <th><?php echo $this->_tpl_vars['lang']['keywords']; ?>
</th>
	  <th width="80"><?php echo $this->_tpl_vars['lang']['author']; ?>
</th>
	  <th width="145" class="last"><?php echo $this->_tpl_vars['lang']['dateline']; ?>
</td>
    </tr>
	<?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arc']):
?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['arc']['id']; ?>
" onclick="checkThis(this)" /></td>
	  <td class="tocenter"><a href="../about.php?id=<?php echo $this->_tpl_vars['arc']['id']; ?>
" target="_blank"><img src="images/icon_view.gif" border="0" title="<?php echo $this->_tpl_vars['lang']['views']; ?>
" /></a></td>
      <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&id=<?php echo $this->_tpl_vars['arc']['id']; ?>
"><?php echo $this->_tpl_vars['arc']['title']; ?>
</a></td>
	  <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="Edit(this,'edit_kw',<?php echo $this->_tpl_vars['arc']['id']; ?>
)"><?php echo $this->_tpl_vars['arc']['keywords']; ?>
</span></td>
	  <td><?php echo $this->_tpl_vars['arc']['admin_user']; ?>
</td>
	  <td><span class="mdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['arc']['dateline'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span></td>
    </tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr><td colspan="5"><?php echo $this->_tpl_vars['lang']['select']; ?>
:
		<a href="javascript:;" onclick="selectAll('id[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
		<a href="javascript:;" onclick="cancelAll('id[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
		<a href="javascript:;" onclick="reverseAll('id[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
	</td></tr>
  </table>
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'"><span><?php echo $this->_tpl_vars['lang']['add_article']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
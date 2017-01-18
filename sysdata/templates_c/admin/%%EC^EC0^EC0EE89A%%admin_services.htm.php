<?php /* Smarty version 2.6.19, created on 2011-04-17 17:13:25
         compiled from admin_services.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_services.htm', 73, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'view'): ?>
<div class="main-div">
<div class="toolbar">
	<span class="btn btn-dft" onclick="SendMail(document.form1)" onmouseover="this.className=btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span>发送回复</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=reply">
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['mail']['id']; ?>
" />
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table">
      <tr>
        <td width="60">联系人：</td>
        <td><?php echo $this->_tpl_vars['abc']['name']; ?>
</td>
      </tr>
      <tr>
        <td>联系电话：</td>
        <td><?php echo $this->_tpl_vars['abc']['tel']; ?>
</td>
      </tr>
      <tr>
        <td width="50">所在单位：</td>
        <td><?php echo $this->_tpl_vars['abc']['company']; ?>
</td>
      </tr>
      <tr>
        <td>电子邮件：</td>
        <td><input type="text" name="mailto" class="textinput" style="width:400px;" value="<?php echo $this->_tpl_vars['abc']['email']; ?>
" /></td>
      </tr>
	  <tr>
        <td>回复内容：</td>
        <td><textarea name="content" style="width:96%; height:200px;"></textarea></td>
      </tr>
    </table>
  </form>
<div class="toolbar">
	<span class="btn btn-dft" onclick="SendMail(document.form1)" onmouseover="this.className=btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span>发送回复</span></span>
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
    if(!obj.content.value){
	    alert(\'回复内容不能为空!\');
		return false;
	}
	obj.submit();
}
</script>
'; ?>

<?php else: ?>
<div class="main-div">
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
    <tr>
      <th width="20"><input type="checkbox" onclick="checkAll(this,'id[]')" /></td>
      <th><?php echo $this->_tpl_vars['lang']['mail_subject']; ?>
</th>
	  <th width="100">联系电话</th>
      <th width="160">电子邮件</th>
      <th width="120" class="last">提问时间</th>
    </tr>
	<?php $_from = $this->_tpl_vars['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['aa']['id']; ?>
" onclick="checkThis(this)" /></td>
      <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=view&id=<?php echo $this->_tpl_vars['aa']['id']; ?>
"><?php echo $this->_tpl_vars['aa']['company']; ?>
 <?php echo $this->_tpl_vars['aa']['name']; ?>
</a></td>
	  <td><?php echo $this->_tpl_vars['aa']['tel']; ?>
</td>
      <td><?php echo $this->_tpl_vars['aa']['email']; ?>
</td>
      <td><span class="mdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['aa']['dateline'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span></td>
    </tr>
	<?php endforeach; endif; unset($_from); ?>
    <tr>
      <td colspan="4"><?php echo $this->_tpl_vars['lang']['select']; ?>
：
			<a href="javascript:;" onclick="selectAll('id[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
			<a href="javascript:;" onclick="cancelAll('id[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
			<a href="javascript:;" onclick="reverseAll('id[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
	  </td>
  </tr>
  </table>
<div class="toolbar">
    <span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
	<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
<?php /* Smarty version 2.6.19, created on 2011-04-17 15:04:47
         compiled from admin_db.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($_GET['action'] == 'resume'): ?>
<div class="pos-div">
	<form name="importform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=import" enctype="multipart/form-data" onsubmit="if(!this.sqlfile.value)return false;">
	本地文件：<input type="file" size="40" name="sqlfile" style="height:24px; vertical-align:middle;" />
	<span class="btn btn-dft" onclick="window.document.importform.submit()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['export']; ?>
</span></span>
	</form>
</div>
<div class="main-div">
   <div class="toolbar">
		<span class="btn btn-dft" onclick="document.files.submit()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['resume']; ?>
</span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['data_backup']; ?>
</span></span>
		<span class="btn btn-dft" onclick="document.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
   </div>
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
    <form name="files" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=resumefiles" method="post">
     <tr>
       <th scope="col" width="20"><input type="checkbox" onclick="checkAll(this,'file[]')" /></th>
       <th scope="col"><?php echo $this->_tpl_vars['lang']['filename']; ?>
</th>
       <th scope="col" width="100"><?php echo $this->_tpl_vars['lang']['filesize']; ?>
</th>
       <th scope="col" width="140" class="last"><?php echo $this->_tpl_vars['lang']['filetime']; ?>
</th>
     </tr>
	 <?php if ($this->_tpl_vars['folders']): ?>
	 <?php $_from = $this->_tpl_vars['folders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dir']):
?>
     <tr onmouseover="this.className='active'" onmouseout="this.className=''">
       <td>&nbsp;</td>
	   <td><a href="<?php echo $this->_tpl_vars['dir']['folderlink']; ?>
"><img src="<?php echo $this->_tpl_vars['dir']['img']; ?>
" border="0" /> <?php echo $this->_tpl_vars['dir']['filename']; ?>
</a></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
	 <?php endforeach; endif; unset($_from); ?>
	 <?php endif; ?>
	 <?php if ($this->_tpl_vars['folders']): ?>
	 <?php $_from = $this->_tpl_vars['filetree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tree']):
?>
     <tr onmouseover="this.className='active'" onmouseout="this.className=''">
       <td><input type="checkbox" name="file[]" value="<?php echo $this->_tpl_vars['tree']['filepath']; ?>
" onclick="checkThis(this)" /></td>
	   <td><img src="<?php echo $this->_tpl_vars['tree']['img']; ?>
" border="0" /> <?php echo $this->_tpl_vars['tree']['filename']; ?>
</td>
       <td><?php echo $this->_tpl_vars['tree']['filesize']; ?>
</td>
       <td><?php echo $this->_tpl_vars['tree']['filetime']; ?>
</td>
     </tr>
	 <?php endforeach; endif; unset($_from); ?>
	 <?php endif; ?>
	 </form>
	  <tr>
		  <td colspan="4"><?php echo $this->_tpl_vars['lang']['select']; ?>
：
			<a href="javascript:;" onclick="selectAll('file[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
			<a href="javascript:;" onclick="cancelAll('file[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
			<a href="javascript:;" onclick="reverseAll('file[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
		 </td>
	  </tr>
   </table>
   <div class="toolbar">
		<span class="btn btn-dft" onclick="document.files.submit()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['resume']; ?>
</span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['data_backup']; ?>
</span></span>
		<span class="btn btn-dft" onclick="document.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
   </div>
</div>
<?php else: ?>
<div class="main-div">
<div class="toolbar">
    <span class="btn btn-dft" onclick="document.tables.submit()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['bak_start']; ?>
</span></span>
	<span class="btn btn-dft" onclick="checkDB('optimiz')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className=' btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['db_optimiz']; ?>
</span></span>
	<span class="btn btn-dft" onclick="checkDB('repair')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['db_repair']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=resume')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['data_resume']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
<form method="post" name="tables" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=export">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
  <tr>
    <th scope="col" width="20"><input type="checkbox" onclick="checkAll(this,'table[]')" /></th>
    <th scope="col"><?php echo $this->_tpl_vars['lang']['tb_name']; ?>
</th>
    <th scope="col" width="60"><?php echo $this->_tpl_vars['lang']['tb_type']; ?>
</th>
	<th scope="col" width="100"><?php echo $this->_tpl_vars['lang']['tb_rowformat']; ?>
</th>
    <th scope="col" width="60"><?php echo $this->_tpl_vars['lang']['tb_records']; ?>
</th>
    <th scope="col" width="80"><?php echo $this->_tpl_vars['lang']['tb_data']; ?>
</th>
    <th scope="col" width="60"><?php echo $this->_tpl_vars['lang']['tb_index']; ?>
</th>
    <th scope="col" width="60"><?php echo $this->_tpl_vars['lang']['tb_free']; ?>
</th>
    <th scope="col" width="60" class="last"><?php echo $this->_tpl_vars['lang']['handler']; ?>
<?php echo $this->_tpl_vars['lang']['options']; ?>
</th>
  </tr>
  <?php $_from = $this->_tpl_vars['tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['table']):
?>
  <tr onmouseover="this.className='active'" onmouseout="this.className=''">
    <td><input type="checkbox" name="table[]" value="<?php echo $this->_tpl_vars['table']['Name']; ?>
" onclick="checkThis(this)" /></td>
    <td><?php echo $this->_tpl_vars['table']['Name']; ?>
</td>
    <td><?php echo $this->_tpl_vars['table']['Engine']; ?>
</td>
	<td><?php echo $this->_tpl_vars['table']['Row_format']; ?>
</td>
    <td><?php echo $this->_tpl_vars['table']['Rows']; ?>
</td>
    <td><?php echo $this->_tpl_vars['table']['Data_length']; ?>
</td>
    <td><?php echo $this->_tpl_vars['table']['Index_length']; ?>
</td>
    <td><?php echo $this->_tpl_vars['table']['Data_free']; ?>
</td>
    <td><a href="javascript:;" onclick="checkOneDB('<?php echo $this->_tpl_vars['table']['Name']; ?>
','repair')"><?php echo $this->_tpl_vars['lang']['repair']; ?>
</a> <a href="javascript:;" onclick="checkOneDB('<?php echo $this->_tpl_vars['table']['Name']; ?>
','optimiz')"><?php echo $this->_tpl_vars['lang']['optimiz']; ?>
</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
      <td colspan="9">
	    <span style="float:right; margin-right:10px;"><?php echo $this->_tpl_vars['tbcount']; ?>
，<?php echo $this->_tpl_vars['lang']['db_space']; ?>
<?php echo $this->_tpl_vars['dbsize']; ?>
MB。</span>
		<?php echo $this->_tpl_vars['lang']['select']; ?>
：
		<a href="javascript:;" onclick="selectAll('table[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
		<a href="javascript:;" onclick="cancelAll('table[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
		<a href="javascript:;" onclick="reverseAll('table[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a>
	 </td>
  </tr>
</table>
</form>
<div class="toolbar">
    <span class="btn btn-dft" onclick="document.tables.submit()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['bak_start']; ?>
</span></span>
	<span class="btn btn-dft" onclick="checkDB('optimiz')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className=' btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['db_optimiz']; ?>
</span></span>
	<span class="btn btn-dft" onclick="checkDB('repair')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['db_repair']; ?>
</span></span>
	<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=resume')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['data_resume']; ?>
</span></span>
	<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
</div>
</div>
<?php endif; ?>
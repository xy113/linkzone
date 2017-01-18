<?php /* Smarty version 2.6.19, created on 2011-04-17 15:03:09
         compiled from admin_jobs.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_jobs.htm', 159, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($_GET['action'] == 'addnew' || $_GET['action'] == 'edit'): ?>
<div class="main-div">
	<div class="toolbar">
		<span class="btn btn-dft" onclick="checkSubmit(document.jobs)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
		<span class="ctrlenter">　<?php echo $this->_tpl_vars['lang']['ctrlenter']; ?>
</span>
	</div>
	<form name="jobs" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save" method="post">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['job']['id']; ?>
" />
	<table border="0" cellspacing="0" cellpadding="0" class="form-table">
	  <tr>
		<td width="60"><?php echo $this->_tpl_vars['lang']['job_category']; ?>
：</td>
		<td>
		<select name="cid">
			<?php $_from = $this->_tpl_vars['category']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
			<option class="big" value="<?php echo $this->_tpl_vars['group']['cid']; ?>
"<?php echo $this->_tpl_vars['group']['selected']; ?>
<?php if ($this->_tpl_vars['group']['disabled'] == 1): ?> disabled="disabled"<?php endif; ?>><?php echo $this->_tpl_vars['group']['name']; ?>
</option>
			<?php $this->assign('sub', $this->_tpl_vars['group']['cid']); ?>
			<?php $_from = $this->_tpl_vars['category'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
			<option value="<?php echo $this->_tpl_vars['menu']['cid']; ?>
"<?php echo $this->_tpl_vars['menu']['selected']; ?>
<?php if ($this->_tpl_vars['menu']['disabled'] == 1): ?> disabled="disabled"<?php endif; ?>><?php echo $this->_tpl_vars['menu']['name']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			<?php endforeach; endif; unset($_from); ?>
		</select>
		</td>
	  </tr>
	  <tr>
		<td><?php echo $this->_tpl_vars['lang']['job_jobtitle']; ?>
：</td>
		<td><input type="text" class="textinput" name="jobtitle" size="55" value="<?php echo $this->_tpl_vars['job']['jobtitle']; ?>
" /></td>
	  </tr>
	  <tr>
		<td><?php echo $this->_tpl_vars['lang']['job_numbers']; ?>
：</td>
		<td><input type="text" class="textinput" name="numbers" size="55" value="<?php echo $this->_tpl_vars['job']['numbers']; ?>
" /></td>
	  </tr>
	  <tr>
		<td><?php echo $this->_tpl_vars['lang']['job_salary']; ?>
：</td>
		<td><input type="text" class="textinput" name="salary" size="55" value="<?php echo $this->_tpl_vars['job']['salary']; ?>
" /></td>
	  </tr>
	  <tr>
		<td><?php echo $this->_tpl_vars['lang']['job_description']; ?>
：</td>
		<td><textarea name="jobdescription" style="width:480px; height:100px;"><?php echo $this->_tpl_vars['job']['jobdescription']; ?>
</textarea></td>
	  </tr>
	  <tr>
		<td><?php echo $this->_tpl_vars['lang']['job_content']; ?>
：</td>
		<td><?php echo $this->_tpl_vars['editor']; ?>
</td>
	  </tr>
	</table>
	</form>
	<div class="toolbar">
		<span class="btn btn-dft" onclick="checkSubmit(document.jobs)" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload()" onmouseover="this.className='btn btn-hover'" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
		<span class="ctrlenter">　<?php echo $this->_tpl_vars['lang']['ctrlenter']; ?>
</span>
	</div>
</div>
<?php echo '
<script type="text/javascript">
var hassubmited = false;
function checkSubmit(theForm){
	if(hassubmited)return false;
	if(!theForm.jobtitle.value){
		showError(\'职位名称不能为空!\');
		return false;
	}
	
	if(!theForm.numbers.value || isNaN(theForm.numbers.value)){
		showError(\'请正确填写招聘人数!\');
		return false;
	}
	hassubmited = true;
	theForm.submit();
	return true;
}
document.onkeydown = function(e){
	e=window.event||e;
	if(e.ctrlKey&&e.keyCode==13){
	   checkSubmit(document.jobs);
	}
}
</script>
'; ?>

<?php else: ?>
<div class="main-div">
    <div class="pos-div">
	     <h2><?php echo $this->_tpl_vars['lang']['cp_home']; ?>
 &raquo; <?php echo $this->_tpl_vars['lang']['job_manage']; ?>
</h2>
		 <div class="searchbox">
		      <input type="text" name="q" id="q" value="<?php echo $_GET['q']; ?>
" class="textinput" style="width:145px;" />
			  <span class="btn btn-dft" onclick="ListTable('&q='+document.getElementById('q').value)" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['search']; ?>
</span></span>
		 </div>
	</div>
	<div class="toolbar">
		<span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
		<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
');" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&cid=<?php echo $this->_tpl_vars['cid']; ?>
');" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['image_add']; ?>
</span></span>
		<span id="btnbox">
		   <span class="btnL" onclick="ShowSubMenu(this);" onmouseup="this.className='btnL-hover'" onmousedown="this.className='btnL-active'" onmouseout="this.className='btnL'" onmouseover="this.className='btnL-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['markas']; ?>

			<ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
			     <li><a href="javascript:;" onclick="toggleTable('id[]','&action=audited&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['audited']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=unaudited&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['unaudited']; ?>
</a></li>
			</ul>
	       </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['moveto']; ?>

			<ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <?php $_from = $this->_tpl_vars['category']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=move&cid=<?php echo $this->_tpl_vars['group']['cid']; ?>
')"><b><?php echo $this->_tpl_vars['group']['name']; ?>
</b></a></li>
				 <?php $this->assign('sub', $this->_tpl_vars['group']['cid']); ?>
				 <?php $_from = $this->_tpl_vars['category'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=move&cid=<?php echo $this->_tpl_vars['menu']['cid']; ?>
')">　&raquo;<?php echo $this->_tpl_vars['menu']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
		   </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['view']; ?>

			<ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
			     <li><a href="javascript:;" onclick="ListTable('&t=unaudited')"><?php echo $this->_tpl_vars['lang']['unaudited']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="ListTable('&t=all')"><?php echo $this->_tpl_vars['lang']['image_all']; ?>
</a></li>
				 <?php $_from = $this->_tpl_vars['category']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
				 <li><a href="javascript:;" onclick="ListTable('&cid=<?php echo $this->_tpl_vars['group']['cid']; ?>
')"><b><?php echo $this->_tpl_vars['group']['name']; ?>
</b></a></li>
				 <?php $this->assign('sub', $this->_tpl_vars['group']['cid']); ?>
				 <?php $_from = $this->_tpl_vars['category'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
				 <li><a href="javascript:;" onclick="ListTable('&cid=<?php echo $this->_tpl_vars['menu']['cid']; ?>
')">　&raquo;<?php echo $this->_tpl_vars['menu']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
		   </span><b class="arr"></b>
		   <span class="btnR" onclick="ShowSubMenu(this)" onmouseover="this.className='btnR-hover'" onmouseup="this.className='btnR-hover'" onmousedown="this.className='btnR-active'" onmouseout="this.className='btnR'" tabindex="0">
		     <span><?php echo $this->_tpl_vars['lang']['more']; ?>

			    <ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				    <li><a href="javascript:;" onclick="Sort('','&status=<?php echo $_GET['status']; ?>
&os=ASC')"><?php echo $this->_tpl_vars['lang']['ascorder']; ?>
<b class="arr-asc"></b></a></li>
					<li><a href="javascript:;" onclick="Sort('','&status=<?php echo $_GET['status']; ?>
&os=DESC')"><?php echo $this->_tpl_vars['lang']['descorder']; ?>
<b class="arr-desc"></b></a></li>
				</ul>
				</span><b class="arr"></b>
	       </span>
		</span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
    </div>
	<form method="post" name="jobs" id="jobs" style="margin:0; padding:0;">
	<table border="0" cellpadding="0" cellspacing="0" class="list" width="100%">
		<tr>
			<th width="20"><input type="checkbox" name="checkall" onclick="checkAll(this,'id[]')" /></th>
			<th width="20"><img src="images/icon_view.gif" border="0" /></th>
			<th><?php echo $this->_tpl_vars['lang']['job_jobtitle']; ?>
</th>
			<th width="60" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['job_salary']; ?>
</th>
			<th width="60" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['job_numbers']; ?>
</th>
			<th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['audited']; ?>
</th>
			<th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['clicks']; ?>
</th>
			<th class="last" width="140"><?php echo $this->_tpl_vars['lang']['pubdate']; ?>
</th>
		</tr>
		<?php $_from = $this->_tpl_vars['jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
		<tr>
			<td><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['job']['id']; ?>
" onclick="checkThis(this)" /></td>
			<td><a href="<?php echo $this->_tpl_vars['job']['joburl']; ?>
" target="_blank"><img src="images/icon_view.gif" border="0" /></a></td>
			<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&id=<?php echo $this->_tpl_vars['job']['id']; ?>
"><?php echo $this->_tpl_vars['job']['jobtitle']; ?>
</a></td>
			<td style="text-align:center;"><span onClick="Edit(this,'edit_salary',<?php echo $this->_tpl_vars['job']['id']; ?>
)"><?php echo $this->_tpl_vars['job']['salary']; ?>
</span></td>
			<td style="text-align:center;"><span onClick="Edit(this,'edit_numbers',<?php echo $this->_tpl_vars['job']['id']; ?>
)"><?php echo $this->_tpl_vars['job']['numbers']; ?>
</span></td>
			<td style="text-align:center;"><img src="<?php if ($this->_tpl_vars['job']['audited'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" title="<?php echo $this->_tpl_vars['lang']['click_switch']; ?>
" onclick="toggle(this,'toggle_audited',<?php echo $this->_tpl_vars['job']['id']; ?>
);" /></td>
			<td style="text-align:center;"><?php echo $this->_tpl_vars['job']['views']; ?>
</td>
			<td><span class="mdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['job']['dateline'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%I:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%I:%S')); ?>
</span></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="8">
			<?php echo $this->_tpl_vars['lang']['select']; ?>
:
			<a href="javascript:;" onclick="selectAll('id[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
			<a href="javascript:;" onclick="cancelAll('id[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
			<a href="javascript:;" onclick="reverseAll('id[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a> - 
			<a href="javascript:;" onclick="ListTable('&t=unaudited')"><?php echo $this->_tpl_vars['lang']['unaudited']; ?>
</a>
			</td>
		</tr>
	</table>
	</form>
	<div class="toolbar">
		<span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
		<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
');" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&cid=<?php echo $this->_tpl_vars['cid']; ?>
');" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['image_add']; ?>
</span></span>
		<span id="btnbox">
		   <span class="btnL" onclick="ShowSubMenu(this);" onmouseup="this.className='btnL-hover'" onmousedown="this.className='btnL-active'" onmouseout="this.className='btnL'" onmouseover="this.className='btnL-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['markas']; ?>

			<ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
			     <li><a href="javascript:;" onclick="toggleTable('id[]','&action=audited&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['audited']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=unaudited&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['unaudited']; ?>
</a></li>
			</ul>
	       </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['moveto']; ?>

			<ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <?php $_from = $this->_tpl_vars['category']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=move&cid=<?php echo $this->_tpl_vars['group']['cid']; ?>
')"><b><?php echo $this->_tpl_vars['group']['name']; ?>
</b></a></li>
				 <?php $this->assign('sub', $this->_tpl_vars['group']['cid']); ?>
				 <?php $_from = $this->_tpl_vars['category'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=move&cid=<?php echo $this->_tpl_vars['menu']['cid']; ?>
')">　&raquo;<?php echo $this->_tpl_vars['menu']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
		   </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['view']; ?>

			<ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
			     <li><a href="javascript:;" onclick="ListTable('&t=unaudited')"><?php echo $this->_tpl_vars['lang']['unaudited']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="ListTable('&t=all')"><?php echo $this->_tpl_vars['lang']['image_all']; ?>
</a></li>
				 <?php $_from = $this->_tpl_vars['category']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
				 <li><a href="javascript:;" onclick="ListTable('&cid=<?php echo $this->_tpl_vars['group']['cid']; ?>
')"><b><?php echo $this->_tpl_vars['group']['name']; ?>
</b></a></li>
				 <?php $this->assign('sub', $this->_tpl_vars['group']['cid']); ?>
				 <?php $_from = $this->_tpl_vars['category'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
				 <li><a href="javascript:;" onclick="ListTable('&cid=<?php echo $this->_tpl_vars['menu']['cid']; ?>
')">　&raquo;<?php echo $this->_tpl_vars['menu']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
		   </span><b class="arr"></b>
		   <span class="btnR" onclick="ShowSubMenu(this)" onmouseover="this.className='btnR-hover'" onmouseup="this.className='btnR-hover'" onmousedown="this.className='btnR-active'" onmouseout="this.className='btnR'" tabindex="0">
		     <span><?php echo $this->_tpl_vars['lang']['more']; ?>

			    <ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				    <li><a href="javascript:;" onclick="Sort('','&status=<?php echo $_GET['status']; ?>
&os=ASC')"><?php echo $this->_tpl_vars['lang']['ascorder']; ?>
<b class="arr-asc"></b></a></li>
					<li><a href="javascript:;" onclick="Sort('','&status=<?php echo $_GET['status']; ?>
&os=DESC')"><?php echo $this->_tpl_vars['lang']['descorder']; ?>
<b class="arr-desc"></b></a></li>
				</ul>
				</span><b class="arr"></b>
	       </span>
		</span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
    </div>
</div>
<?php endif; ?>
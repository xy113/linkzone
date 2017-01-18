<?php /* Smarty version 2.6.19, created on 2011-04-17 15:04:47
         compiled from admin_video.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin_video.htm', 94, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'libs/video_info.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<div class="main-div">
    <div class="pos-div">
	     <h2><?php echo $this->_tpl_vars['lang']['cp_home']; ?>
 &raquo; <?php echo $this->_tpl_vars['lang']['video_manage']; ?>
　Total Records: <?php echo $this->_tpl_vars['records']; ?>
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
		<?php if ($_GET['status'] == -1): ?>
		<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
&status=-1')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
		<span class="btn btn-dft" onclick="toggleTable('id[]','&action=restore&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['video_restore']; ?>
</span></span>
		<?php else: ?>
		<span class="btn btn-dft" onclick="toggleTable('id[]','&action=remove&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
		<?php endif; ?>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&cid=<?php echo $this->_tpl_vars['cid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['video_add']; ?>
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
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=recommend&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['recommend']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=unrecommend&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['unrecommend']; ?>
</a></li>
			</ul>
	       </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['moveto']; ?>

			<ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=remove&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['trash']; ?>
</a></li>
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
				 <li><a href="javascript:;" onclick="ListTable('&t=all')"><?php echo $this->_tpl_vars['lang']['video_all']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="ListTable('&t=recommend')"><?php echo $this->_tpl_vars['lang']['video_commend']; ?>
</a></li>
				 <li onmouseover="ShowSubMenu(this)" onmouseout="HideSubMenu(this)"><a href="javascript:;"><?php echo $this->_tpl_vars['lang']['video_cat']; ?>
<b class="arr2"></b></a>
				     <ul>
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
				 </li>
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
	<form  name="videos" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	  <tr>
		<th width="20"><input class="list" type="checkbox" onclick="checkAll(this,'id[]')" /></th>
		<th width="15" style="text-align:center;"><img src="images/icon_view.gif" title="<?php echo $this->_tpl_vars['lang']['view']; ?>
" border="0" /></th>
		<th style="cursor:pointer;" onclick="Sort('id','&status=<?php echo $_GET['status']; ?>
')" title="<?php echo $this->_tpl_vars['lang']['click_resort']; ?>
"><?php echo $this->_tpl_vars['lang']['video_title']; ?>
</th>
		<th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['comment']; ?>
</th>
		<th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['audited']; ?>
</th>
		<th width="30" style="text-align:center;"><?php echo $this->_tpl_vars['lang']['recommend']; ?>
</th>
		<th width="35" style="text-align:center; cursor:pointer;" onclick="Sort('views','&status=<?php echo $_GET['status']; ?>
')" title="<?php echo $this->_tpl_vars['lang']['click_resort']; ?>
"><?php echo $this->_tpl_vars['lang']['clicks']; ?>
</th>
		<th width="120" class="last" style="cursor:pointer;" onclick="Sort('time','&status=<?php echo $_GET['status']; ?>
')" title="<?php echo $this->_tpl_vars['lang']['click_resort']; ?>
"><?php echo $this->_tpl_vars['lang']['pubdate']; ?>
</th>
	  </tr>
	  <?php $_from = $this->_tpl_vars['videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vod']):
?>
	  <tr onmouseover="this.className='active'" onmouseout="this.className=''">
		<td><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['vod']['id']; ?>
" onclick="checkThis(this)" /></td>
		<td style="text-align:center;"><a href="<?php echo $this->_tpl_vars['vod']['vodurl']; ?>
" target="_blank"><img src="images/icon_view.gif" title="<?php echo $this->_tpl_vars['lang']['view']; ?>
" border="0" /></a></td>
		<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&id=<?php echo $this->_tpl_vars['vod']['id']; ?>
"><?php echo $this->_tpl_vars['vod']['title']; ?>
</a></td>
		<td style="text-align:center;"><?php echo $this->_tpl_vars['vod']['comments']; ?>
</td>
		<td style="text-align:center;"><img onclick="toggle(this,'toggle_audited',<?php echo $this->_tpl_vars['vod']['id']; ?>
)" title="<?php echo $this->_tpl_vars['lang']['click_switch']; ?>
" src="<?php if ($this->_tpl_vars['vod']['audited'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		<td style="text-align:center;"><img onclick="toggle(this,'toggle_recommend',<?php echo $this->_tpl_vars['vod']['id']; ?>
)" title="<?php echo $this->_tpl_vars['lang']['click_switch']; ?>
" src="<?php if ($this->_tpl_vars['vod']['recommend'] == 1): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" /></td>
		<td style="text-align:center;"><?php echo $this->_tpl_vars['vod']['views']; ?>
</td>
		<td><span class="mdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['vod']['dateline'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
</span></td>
	  </tr>
	  <?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="8"><?php echo $this->_tpl_vars['lang']['select']; ?>
��
			<a href="javascript:;" onclick="selectAll('id[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
			<a href="javascript:;" onclick="cancelAll('id[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
			<a href="javascript:;" onclick="reverseAll('id[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a> - 
			<a href="javascript:;" onclick="ListTable('&t=recommend')"><?php echo $this->_tpl_vars['lang']['recommend']; ?>
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
		<?php if ($_GET['status'] == -1): ?>
		<span class="btn btn-dft" onclick="Drop('id[]','&page=<?php echo $this->_tpl_vars['page']; ?>
&status=-1')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
		<span class="btn btn-dft" onclick="toggleTable('id[]','&action=restore&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['video_restore']; ?>
</span></span>
		<?php else: ?>
		<span class="btn btn-dft" onclick="toggleTable('id[]','&action=remove&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['drop']; ?>
</b></span></span>
		<?php endif; ?>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&cid=<?php echo $this->_tpl_vars['cid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['video_add']; ?>
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
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=recommend&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['recommend']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=unrecommend&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['unrecommend']; ?>
</a></li>
			</ul>
	       </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['moveto']; ?>

			<ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <li><a href="javascript:;" onclick="toggleTable('id[]','&action=remove&page=<?php echo $this->_tpl_vars['page']; ?>
&<?php echo $this->_tpl_vars['curl']; ?>
')"><?php echo $this->_tpl_vars['lang']['trash']; ?>
</a></li>
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
				 <li><a href="javascript:;" onclick="ListTable('&t=all')"><?php echo $this->_tpl_vars['lang']['video_all']; ?>
</a></li>
				 <li><a href="javascript:;" onclick="ListTable('&t=recommend')"><?php echo $this->_tpl_vars['lang']['video_commend']; ?>
</a></li>
				 <li onmouseover="ShowSubMenu(this)" onmouseout="HideSubMenu(this)"><a href="javascript:;"><?php echo $this->_tpl_vars['lang']['video_cat']; ?>
<b class="arr2"></b></a>
				     <ul>
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
				 </li>
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
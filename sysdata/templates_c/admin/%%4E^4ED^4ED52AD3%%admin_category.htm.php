<?php /* Smarty version 2.6.19, created on 2011-04-14 08:55:18
         compiled from admin_category.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'libs/category_info.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<div class="main-div">
  <div class="toolbar">
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['cat_add']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload()" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
  </div>
  <table border="0" cellspacing="0" cellpadding="0" class="list">
    <tr>
      <th width="240"><?php echo $this->_tpl_vars['lang']['cat_name']; ?>
</th>
	  <th width="20" style="text-align:center;"><img src="images/icon_view.gif" border="0" /></th>
      <th width="30" style="text-align:center; cursor:pointer;" onclick="Sort()" title="<?php echo $this->_tpl_vars['lang']['click_resort']; ?>
"><?php echo $this->_tpl_vars['lang']['sort']; ?>
</th>
	  <th width="80" class="tocenter">允许发布内容</th>
      <th height="24" class="last"><?php echo $this->_tpl_vars['lang']['keywords']; ?>
</th>
    </tr>
	<?php $_from = $this->_tpl_vars['categories']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['group']):
?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td style="font-weight:bold;" onmouseover="showMenuBox(<?php echo $this->_tpl_vars['key']; ?>
)" onmouseout="hideMenuBox(<?php echo $this->_tpl_vars['key']; ?>
)">
	      <img src="images/menu_minus.gif" border="0" align="absmiddle" /> 
	      <span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_name',<?php echo $this->_tpl_vars['group']['cid']; ?>
)"><?php echo $this->_tpl_vars['group']['name']; ?>
</span> [ID:<?php echo $this->_tpl_vars['group']['cid']; ?>
] 
	      <span class="c_box" id="box_<?php echo $this->_tpl_vars['key']; ?>
">
			  <b class="icon-edit" title="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&cid=<?php echo $this->_tpl_vars['group']['cid']; ?>
')"></b>
			  <b class="icon-drop" title="<?php echo $this->_tpl_vars['lang']['drop']; ?>
" onclick="DropCategory(<?php echo $this->_tpl_vars['group']['cid']; ?>
)"></b>
			  <b class="icon-add" title="<?php echo $this->_tpl_vars['lang']['add']; ?>
" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&cup=<?php echo $this->_tpl_vars['group']['cid']; ?>
')"></b>
		  </span>
	  </td>
	  <td class="tocenter"><a href="<?php echo $this->_tpl_vars['group']['caturl']; ?>
" target="_blank"><img src="images/icon_view.gif" title="<?php echo $this->_tpl_vars['lang']['view']; ?>
" border="0" /></a></td>
      <td class="tocenter"><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="Edit(this,'edit_order',<?php echo $this->_tpl_vars['group']['cid']; ?>
)"><?php echo $this->_tpl_vars['group']['displayorder']; ?>
</span></td>
      <td class="tocenter"><img src="<?php if ($this->_tpl_vars['group']['disabled'] == 0): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" title="<?php echo $this->_tpl_vars['lang']['click_switch']; ?>
" onclick="toggle2(this,'toggle_disabled',<?php echo $this->_tpl_vars['group']['cid']; ?>
)" /></td>
	  <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="Edit(this,'edit_kw',<?php echo $this->_tpl_vars['group']['cid']; ?>
)"><?php echo $this->_tpl_vars['group']['keywords']; ?>
</span></td>
    </tr>
	<?php $this->assign('sub', $this->_tpl_vars['group']['cid']); ?>
    <?php $_from = $this->_tpl_vars['categories'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
    <tr onmouseover="this.className='active'" onmouseout="this.className=''">
      <td style="padding-left:20px;" onmouseover="showMenuBox(<?php echo $this->_tpl_vars['menu']['cid']; ?>
)" onmouseout="hideMenuBox(<?php echo $this->_tpl_vars['menu']['cid']; ?>
)">
	       <img src="images/menu_arrow.gif" border="0" align="absmiddle" /> 
		   <span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="javascript:Edit(this,'edit_name',<?php echo $this->_tpl_vars['menu']['cid']; ?>
)"><?php echo $this->_tpl_vars['menu']['name']; ?>
</span>  [ID:<?php echo $this->_tpl_vars['menu']['cid']; ?>
]
	       <span class="c_box" id="box_<?php echo $this->_tpl_vars['menu']['cid']; ?>
"> 
			  <b class="icon-edit" title="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&cid=<?php echo $this->_tpl_vars['menu']['cid']; ?>
')"></b>
			  <b class="icon-drop" title="<?php echo $this->_tpl_vars['lang']['drop']; ?>
" onclick="DropCategory(<?php echo $this->_tpl_vars['menu']['cid']; ?>
)"></b>
			  <b class="icon-add" title="<?php echo $this->_tpl_vars['lang']['add']; ?>
" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&cup=<?php echo $this->_tpl_vars['menu']['cid']; ?>
')"></b>
		   </span>
	  </td>
	  <td style="text-align:center;"><a href="<?php echo $this->_tpl_vars['menu']['caturl']; ?>
" target="_blank"><img src="images/icon_view.gif" title="<?php echo $this->_tpl_vars['lang']['view']; ?>
" border="0" /></a></td>
      <td style="text-align:center;"><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="Edit(this,'edit_order',<?php echo $this->_tpl_vars['menu']['cid']; ?>
)"><?php echo $this->_tpl_vars['menu']['displayorder']; ?>
</span></td>
      <td class="tocenter"><img src="<?php if ($this->_tpl_vars['menu']['disabled'] == 0): ?>images/yes.gif<?php else: ?>images/no.gif<?php endif; ?>" border="0" title="<?php echo $this->_tpl_vars['lang']['click_switch']; ?>
" onclick="toggle2(this,'toggle_disabled',<?php echo $this->_tpl_vars['menu']['cid']; ?>
)" /></td>
	  <td><span title="<?php echo $this->_tpl_vars['lang']['click_edit']; ?>
" onclick="Edit(this,'edit_kw',<?php echo $this->_tpl_vars['menu']['cid']; ?>
)"><?php echo $this->_tpl_vars['menu']['keywords']; ?>
</span></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
  </table>
  <div class="toolbar">
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['cat_add']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload()" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
  </div>
</div>
<?php endif; ?>
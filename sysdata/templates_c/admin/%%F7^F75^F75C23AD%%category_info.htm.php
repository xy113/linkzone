<?php /* Smarty version 2.6.19, created on 2011-04-14 09:12:08
         compiled from libs/category_info.htm */ ?>
<div class="main-div">
  <div class="toolbar">
        <span class="btn btn-dft" onclick="SaveCategory(document.category)" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload()" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
  </div>
 <form name="category" method="post">
  <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['category']['cid']; ?>
" />
  <table border="0" cellspacing="0" cellpadding="0" class="form-table">
    <tr>
      <td width="100"><?php echo $this->_tpl_vars['lang']['cat_name']; ?>
：</td>
      <td><input name="name" type="text" maxlength="10" value="<?php echo $this->_tpl_vars['category']['name']; ?>
" class="textinput" style="width:200px;" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['cat_up']; ?>
：</td>
      <td>
	  <select name="cup" id="cup">
        <option value="0"><?php echo $this->_tpl_vars['lang']['cat_to_top']; ?>
</option>
		<?php $_from = $this->_tpl_vars['categories']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
		<option value="<?php echo $this->_tpl_vars['group']['cid']; ?>
"<?php echo $this->_tpl_vars['group']['selected']; ?>
><?php echo $this->_tpl_vars['group']['name']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
      </select>	  
	 </td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['add_to_nav']; ?>
：</td>
      <td>
	      <input name="add_to_nav" type="radio" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>

		  <input name="add_to_nav" type="radio" value="0" checked="checked" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</td>
    </tr>
	<tr>
      <td>允许发布内容：</td>
      <td>
	      <input name="disabled" type="radio" value="0" checked="checked" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>

		  <input name="disabled" type="radio" value="1" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['keywords']; ?>
：</td>
      <td><input name="keywords" type="text" value="<?php echo $this->_tpl_vars['category']['keywords']; ?>
" class="textinput" style="width:400px;" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_tpl_vars['lang']['remark']; ?>
：</td>
      <td><textarea name="description" class="textinput" style="width:400px; height:50px;" ><?php echo $this->_tpl_vars['category']['description']; ?>
</textarea></td>
    </tr>
  </table>
</form>
  <div class="toolbar">
        <span class="btn btn-dft" onclick="SaveCategory(document.category)" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload()" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
  </div>
</div>
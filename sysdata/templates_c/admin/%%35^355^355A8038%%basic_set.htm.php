<?php /* Smarty version 2.6.19, created on 2011-04-13 15:45:59
         compiled from libs/basic_set.htm */ ?>
<table border="0" cellpadding="0" cellspacing="0" class="form-table">
<tr>
  <td width="80"><?php echo $this->_tpl_vars['lang']['site_name']; ?>
��</td>
  <td><input name="sysname" type="text" value="<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
" class="textinput" style="width:520px;" /></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['site_url']; ?>
��</td>
  <td><input name="sysurl" type="text" value="<?php echo $this->_tpl_vars['cfg']['sysurl']; ?>
" class="textinput" style="width:520px;" /></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['site_keywords']; ?>
��</td>
  <td><textarea name="keywords"  style="width:520px; height:60px;"><?php echo $this->_tpl_vars['cfg']['keywords']; ?>
</textarea></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['site_description']; ?>
��</td>
  <td><textarea name="description"  style="width:520px; height:60px;"><?php echo $this->_tpl_vars['cfg']['description']; ?>
</textarea></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['closesite']; ?>
��</td>
  <td>
	<input name="isclosed" type="radio" value="1"<?php if ($this->_tpl_vars['cfg']['isclosed'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
��
	<input name="isclosed" type="radio" value="0"<?php if ($this->_tpl_vars['cfg']['isclosed'] == 0): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>
      
  </td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['whyclose']; ?>
��</td>
  <td><textarea name="closenotic"  style="width:520px; height:60px;"><?php echo $this->_tpl_vars['cfg']['closenotic']; ?>
</textarea></td>
</tr>

<tr>
  <td><?php echo $this->_tpl_vars['lang']['icp_info']; ?>
��</td>
  <td><input name="icp" type="text" value="<?php echo $this->_tpl_vars['cfg']['icp']; ?>
" class="textinput"  style="width:520px;" /></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['copyright_info']; ?>
��</td>
  <td><textarea name="copyright"  style="width:520px; height:60px;"><?php echo $this->_tpl_vars['cfg']['copyright']; ?>
</textarea></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['writelog']; ?>
��</td>
  <td>
	  <input type="radio" name="islog"  value="1"<?php if ($this->_tpl_vars['cfg']['islog'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
��
	  <input type="radio" name="islog"  value="0"<?php if ($this->_tpl_vars['cfg']['islog'] == 0): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>
		  
  </td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['checkcode']; ?>
��</td>
  <td>
	  <input type="radio" name="ischeckcode"  value="1"<?php if ($this->_tpl_vars['cfg']['ischeckcode'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
��
	  <input type="radio" name="ischeckcode"  value="0"<?php if ($this->_tpl_vars['cfg']['ischeckcode'] == 0): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>
			
  </td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['tongjicode']; ?>
��</td>
  <td><textarea name="tongjicode" style="width:520px; height:60px;"><?php echo $this->_tpl_vars['cfg']['tongjicode']; ?>
</textarea></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['slide_width']; ?>
��</td>
  <td><input type="text" name="slide_width" value="<?php echo $this->_tpl_vars['cfg']['slide_width']; ?>
" class="textinput" /></td>
</tr>
<tr>
  <td><?php echo $this->_tpl_vars['lang']['slide_height']; ?>
��</td>
  <td><input type="text" name="slide_height" value="<?php echo $this->_tpl_vars['cfg']['slide_height']; ?>
" class="textinput" /></td>
</tr>
</table>
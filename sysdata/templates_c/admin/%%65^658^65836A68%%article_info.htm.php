<?php /* Smarty version 2.6.19, created on 2011-06-10 16:11:44
         compiled from libs/article_info.htm */ ?>
<div class="main-div">
	<div class="toolbar">
		<span class="btn btn-dft" onclick="return check_article_submit(document.article)" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php if ($this->_tpl_vars['action'] == 'addnew'): ?><?php echo $this->_tpl_vars['lang']['save_article']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
<?php endif; ?></span></span>
		<?php if ($_GET['action'] == 'edit'): ?>
		<span class="btn btn-dft" onclick="DropOne(<?php echo $this->_tpl_vars['article']['id']; ?>
,'&cid=<?php echo $this->_tpl_vars['article']['cid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['drop']; ?>
</span></span>
		<?php endif; ?>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?cid=<?php echo $this->_tpl_vars['cid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload();" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
	    <span class="ctrlenter">°°<?php echo $this->_tpl_vars['lang']['ctrlenter']; ?>
</span>
	</div>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save" method="post" name="article">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
	<table cellspacing="0" cellpadding="0" class="form-table">
		<tr>
			<td width="65"><?php echo $this->_tpl_vars['lang']['article_title']; ?>
£∫</td>
		    <td>
			<input name="title" class="textinput" type="text" value="<?php echo $this->_tpl_vars['article']['title']; ?>
" tabindex="5" size="55" maxlength="50" />
			<span class="btn btn-dft" onclick="checkValue(document.article.title.value,'&action=checktitle','<?php echo $this->_tpl_vars['lang']['article_exists']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span>ºÏ≤‚÷ÿ∏¥</span></span>
			</td>
		</tr>
	    <tr>
		  <td><?php echo $this->_tpl_vars['lang']['tags']; ?>
£∫</td>
		  <td><input name="tags" class="textinput" type="text" value="<?php echo $this->_tpl_vars['article']['tags']; ?>
" size="55" tabindex="5" maxlength="50" /></td>
		</tr>
		<tr>
		  <td><?php echo $this->_tpl_vars['lang']['article_cat']; ?>
£∫</td>
		  <td>
			<select name="cid" id="cid">
				<?php $_from = $this->_tpl_vars['category']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
				<option value="<?php echo $this->_tpl_vars['group']['cid']; ?>
"<?php echo $this->_tpl_vars['group']['selected']; ?>
 class="big"<?php if ($this->_tpl_vars['group']['disabled'] == 1): ?> disabled="disabled"<?php endif; ?>><?php echo $this->_tpl_vars['group']['name']; ?>
</option>
				<?php $this->assign('sub', $this->_tpl_vars['group']['cid']); ?>
				<?php $_from = $this->_tpl_vars['category'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
				<option value="<?php echo $this->_tpl_vars['menu']['cid']; ?>
"<?php echo $this->_tpl_vars['menu']['selected']; ?>
<?php if ($this->_tpl_vars['menu']['disabled'] == 1): ?> disabled="disabled"<?php endif; ?>>°°&raquo;<?php echo $this->_tpl_vars['menu']['name']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				<?php endforeach; endif; unset($_from); ?>
			</select>°°
			<?php echo $this->_tpl_vars['lang']['article_source']; ?>
£∫
		    <input name="source" class="textinput" type="text" style="width:75px;" value="<?php echo $this->_tpl_vars['article']['source']; ?>
" />
			  <select name="selectf" onchange="article.source.value=this.value">
			   <option value=""><?php echo $this->_tpl_vars['lang']['please_select']; ?>
..</option>
               <?php $_from = $this->_tpl_vars['article_source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['source']):
?>
			   <option value="<?php echo $this->_tpl_vars['source']['source_name']; ?>
"><?php echo $this->_tpl_vars['source']['source_name']; ?>
</option>
               <?php endforeach; endif; unset($_from); ?>
			</select>
			</td>
		</tr>
		<tr>
		  <td><?php echo $this->_tpl_vars['lang']['article_image']; ?>
£∫</td>
		  <td>
			<input name="image" class="textinput" type="text" id="image" size="55" value="<?php echo $this->_tpl_vars['article']['image']; ?>
" tabindex="5" /> 	
			<span class="btn btn-dft" onclick="OpenDialog('article.image')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['upload']; ?>
</span></span> 
		  </td>
       </tr>
		  <tr>
			<td><?php echo $this->_tpl_vars['lang']['article_summary']; ?>
£∫</td>
			<td><textarea name="summary" tabindex="5" style="width:98%; height:80px;"><?php echo $this->_tpl_vars['article']['summary']; ?>
</textarea></td>
		  </tr>
		  <tr>
			<td colspan="2">
				<?php echo $this->_tpl_vars['lang']['article_autopage']; ?>
£∫<input name="autopage" type="checkbox" style="vertical-align:middle;" value="1"<?php if ($this->_tpl_vars['article']['autopage'] == 1): ?> checked="checked"<?php endif; ?> />°°
				<?php echo $this->_tpl_vars['lang']['article_pagesize']; ?>
£∫<input type="text" class="textinput" name="pagesize" value="<?php if ($_GET['action'] == 'addnew'): ?>5000<?php else: ?><?php echo $this->_tpl_vars['article']['pagesize']; ?>
<?php endif; ?>" style="width:60px;" />
			</td>
		  </tr>
		  <tr>
		  	<td colspan="2"><?php echo $this->_tpl_vars['editor']; ?>
</td>
		  </tr>
		  <tr>
			<td colspan="2">
			   <input type="checkbox" name="allowcomment" value="1"<?php if ($this->_tpl_vars['article']['allowcomment'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['allowcomment']; ?>
°°
			   <input type="checkbox" name="allowvote" value="1"<?php if ($this->_tpl_vars['article']['allowvote'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['allowvote']; ?>
°°
			   <input type="checkbox" name="recommend" value="1"<?php if ($this->_tpl_vars['article']['recommend'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['setrecommend']; ?>
°°
			   <input type="checkbox" name="audited" value="1"<?php if ($this->_tpl_vars['article']['audited'] == 1): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['passaudited']; ?>
°°
			</td>
		  </tr>
		</tr>
    </table>
    </form>
	<div class="toolbar">
		<span class="btn btn-dft" onclick="return check_article_submit(document.article)" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php if ($this->_tpl_vars['action'] == 'addnew'): ?><?php echo $this->_tpl_vars['lang']['save_article']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['save_edit']; ?>
<?php endif; ?></span></span>
		<?php if ($_GET['action'] == 'edit'): ?>
		<span class="btn btn-dft" onclick="DropOne(<?php echo $this->_tpl_vars['article']['id']; ?>
,'&cid=<?php echo $this->_tpl_vars['article']['cid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['drop']; ?>
</span></span>
		<?php endif; ?>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?cid=<?php echo $this->_tpl_vars['cid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onclick="window.location.reload();" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
	</div>
</div>
<?php echo '
<script language="javascript" type="text/javascript">
var hassubmited = false;
function check_article_submit(formobj){ 
	if(hassubmited) return false;
	if(!trimStr(formobj.title.value)){
		showError(article_title_empty);
		return false;
	}  
	if(!formobj.source.value){
		showError(article_source_empty);
		return false;
	}
	hassubmited = true;
	formobj.submit();
}

window.document.onkeydown = function(e){
	e=window.event||e;
	if(e.ctrlKey&&e.keyCode==13){
	   check_article_submit(document.article);
	   return false;
	}
}
</script>
'; ?>
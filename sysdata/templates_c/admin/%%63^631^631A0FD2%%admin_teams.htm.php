<?php /* Smarty version 2.6.19, created on 2011-06-10 16:12:54
         compiled from admin_teams.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="msg_r" id="msg"></div>
<?php if ($this->_tpl_vars['action'] == 'addnew' || $this->_tpl_vars['action'] == 'edit'): ?>
<div class="main-div">
	<div class="toolbar">
		<span class="btn btn-dft" onClick="return checksubmit(document.form1)" onMouseUp="this.className='btn btn-hover'" onMouseDown="this.className='btn btn-active'" onMouseOver="this.className='btn btn-hover'" onMouseOut="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
		<span class="btn btn-dft" onClick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?tid=<?php echo $this->_tpl_vars['tid']; ?>
')" onMouseUp="this.className='btn btn-hover'" onMouseDown="this.className='btn btn-active'" onMouseOver="this.className='btn btn-hover'" onMouseOut="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onClick="window.location.reload();" onMouseUp="this.className='btn btn-hover'" onMouseDown="this.className='btn btn-active'" onMouseOver="this.className='btn btn-hover'" onMouseOut="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
		<span class="ctrlenter">　<?php echo $this->_tpl_vars['lang']['ctrlenter']; ?>
</span>
	</div>
	<form name="form1" id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?action=save">
	<input type="hidden" name="mid" value="<?php echo $this->_tpl_vars['member']['mid']; ?>
" />
	<table border="0"cellpadding="0" cellspacing="0" class="form-table">
		<tr>
		  <td width="60">姓　　名：</td>
		  <td>
		   <input name="name" type="text" class="textinput" id="name" style="width:400px;" tabindex="5" value="<?php echo $this->_tpl_vars['member']['name']; ?>
" maxlength="50" />
		   </td>
		</tr>
		<tr>
		  <td>联系电话：</td>
		  <td><input name="tel" type="text" class="textinput" id="tel" style="width:400px;" tabindex="5" value="<?php echo $this->_tpl_vars['member']['tel']; ?>
" maxlength="50" /></td>
		</tr>
		<tr>
		  <td>所属分组：</td>
		  <td>
			  <select name="tid" id="tid" style="vertical-align:middle;">
				<?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
				<option value="<?php echo $this->_tpl_vars['aa']['tid']; ?>
"<?php echo $this->_tpl_vars['aa']['selected']; ?>
><?php echo $this->_tpl_vars['aa']['name']; ?>
　ID:<?php echo $this->_tpl_vars['aa']['tid']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			  </select>　
			  <a href="javascript:;" onClick="toggle3('formdiv')">创建分组</a>　	
			  <a href="javascript:;" onClick="DropTeam('&action=<?php echo $this->_tpl_vars['action']; ?>
&mid=<?php echo $this->_tpl_vars['member']['mid']; ?>
')">删除分组</a>	
			  <div style="margin:5px 0; clear:both; display:none;" id="formdiv">
			  	  <input type="text" name="tname" id="tname" value="" size="20" class="textinput">
				  <input type="button" value="确定" style="padding:2px 5px; vertical-align:middle;" onClick="SaveTeam('&action=<?php echo $this->_tpl_vars['action']; ?>
&mid=<?php echo $this->_tpl_vars['member']['mid']; ?>
')">
			  </div>	  
		</td>
		</tr>
		<tr>
		  <td>电子邮件：</td>
		  <td><input name="email" type="text" class="textinput" id="email" value="<?php echo $this->_tpl_vars['member']['email']; ?>
" size="55" /></td>
	  </tr>
		<tr>
		  <td>个人主页：</td>
		  <td><input name="homepage" type="text" class="textinput" id="homepage" value="<?php echo $this->_tpl_vars['member']['homepage']; ?>
" size="55" /></td>
	  </tr>
		<tr>
		  <td>形 象 照：</td>
		  <td>
		   <input name="photo" type="text" class="textinput" id="photo" value="<?php echo $this->_tpl_vars['member']['photo']; ?>
" size="55" />
		   <span class="btn btn-dft" onClick="OpenDialog('form1.photo')" onMouseUp="this.className='btn btn-hover'" onMouseDown="this.className='btn btn-active'" onMouseOver="this.className='btn btn-hover'" onMouseOut="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['upload']; ?>
</span></span>		 </td>
		</tr>
		<tr>
		  <td>个人简介：</td>
		  <td><?php echo $this->_tpl_vars['editor']; ?>
</td>
		</tr>
	</table>
	</form>
	<div class="toolbar">
		<span class="btn btn-dft" onClick="return checksubmit(document.form1)" onMouseUp="this.className='btn btn-hover'" onMouseDown="this.className='btn btn-active'" onMouseOver="this.className='btn btn-hover'" onMouseOut="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['save']; ?>
</span></span>
		<span class="btn btn-dft" onClick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?tid=<?php echo $this->_tpl_vars['tid']; ?>
')" onMouseUp="this.className='btn btn-hover'" onMouseDown="this.className='btn btn-active'" onMouseOver="this.className='btn btn-hover'" onMouseOut="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['back_list']; ?>
</span></span>
		<span class="btn btn-dft" onClick="window.location.reload();" onMouseUp="this.className='btn btn-hover'" onMouseDown="this.className='btn btn-active'" onMouseOver="this.className='btn btn-hover'" onMouseOut="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
	</div>
</div>
<?php echo '
<script language="javascript" type="text/javascript">
var hassubmited = false;
function checksubmit(obj){
	if(hassubmited)return false;
	if(!trimStr(obj.name.value)){
		alert(\'姓名不能留空!\');
		return false;
	}
	if(!obj.tel.value){
		alert(\'联系电话不能留空!\');
		return false;
	}
	if(!obj.tid.value){
		alert(\'请选择一个分组!\');
		return false;
	}
	if(!obj.email.value){
		alert(\'电子邮件不能留空!\');
		return false;
	}
	hassubmited = true;
	obj.submit();
	return true;
}

document.onkeydown = function(e){
	e=window.event||e;
	if(e.ctrlKey&&e.keyCode==13){
	   checksubmit(document.form1);
	   return false;
	}
}
</script>
'; ?>

<?php else: ?>
<div class="main-div">
    <div class="pos-div">
	     <h2><?php echo $this->_tpl_vars['lang']['cp_home']; ?>
 &raquo; 团队管理　Total Records: <?php echo $this->_tpl_vars['records']; ?>
</h2>
	</div>
	<div class="toolbar">
		<span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
		<span class="btn btn-dft" onclick="Drop('mid[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&tid=<?php echo $_GET['tid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span>添加成员</span></span>
		<span id="btnbox">
		   <span class="btnL" onclick="ShowSubMenu(this);" onmouseup="this.className='btnL-hover'" onmousedown="this.className='btnL-active'" onmouseout="this.className='btnL'" onmouseover="this.className='btnL-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['moveto']; ?>

			<ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
				 <li><a href="javascript:;" onclick="toggleTable('mid[]','&action=moveto&tid=<?php echo $this->_tpl_vars['aa']['tid']; ?>
')"><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
	       </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['view']; ?>

			<ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
				 <li><a href="javascript:;" onclick="ListTable('&tid=<?php echo $this->_tpl_vars['aa']['tid']; ?>
')"><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
		   </span><b class="arr"></b>
		   <span class="btnR" onclick="ShowSubMenu(this)" onmouseover="this.className='btnR-hover'" onmouseup="this.className='btnR-hover'" onmousedown="this.className='btnR-active'" onmouseout="this.className='btnR'" tabindex="0">
		     <span><?php echo $this->_tpl_vars['lang']['more']; ?>

			    <ul class="submenu" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				    <li><a href="javascript:;" onclick="Sort('','&os=ASC')"><?php echo $this->_tpl_vars['lang']['ascorder']; ?>
<b class="arr-asc"></b></a></li>
					<li><a href="javascript:;" onclick="Sort('','&os=DESC')"><?php echo $this->_tpl_vars['lang']['descorder']; ?>
<b class="arr-desc"></b></a></li>
				</ul>
				</span><b class="arr"></b>
	       </span>
		</span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
  </div>

<form method="post" name="images" id="images" style="margin:0; padding:0;">
<table border="0" cellpadding="0" cellspacing="0" class="list">
	<tr>
		<th width="20"><input type="checkbox" onclick="checkAll(this,'mid[]');" /></th>
		<th width="15" style="text-align:center;"><img src="images/icon_view.gif" title="<?php echo $this->_tpl_vars['lang']['view']; ?>
" border="0" /></th>
		<th>成员姓名</th>
		<th width="30" class="tocenter">排序</th>
		<th width="90">联系电话</th>
		<th width="160">电子邮件</th>
        <th width="90" class="last">所属团队</th>
	</tr>
    <?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mm']):
?>
	<tr onmouseover="this.className='active'" onmouseout="this.className=''">
		<td><input type="checkbox" name="mid[]" value="<?php echo $this->_tpl_vars['mm']['mid']; ?>
" onclick="checkThis(this)" /></td>
		<td style="text-align:center;"><a href="<?php echo $this->_tpl_vars['mm']['mmurl']; ?>
" target="_blank"><img src="images/icon_view.gif" title="<?php echo $this->_tpl_vars['lang']['view']; ?>
" border="0" /></a></td>
		<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?action=edit&mid=<?php echo $this->_tpl_vars['mm']['mid']; ?>
"><?php echo $this->_tpl_vars['mm']['name']; ?>
</a></td>
		<td class="tocenter"><span onclick="Edit(this,'edit_order',<?php echo $this->_tpl_vars['mm']['mid']; ?>
)"><?php echo $this->_tpl_vars['mm']['ordernum']; ?>
</span></td>
		<td><?php echo $this->_tpl_vars['mm']['tel']; ?>
</td>
		<td><?php echo $this->_tpl_vars['mm']['email']; ?>
</td>
		<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?tid=<?php echo $this->_tpl_vars['mm']['tid']; ?>
"><?php echo $this->_tpl_vars['mm']['tname']; ?>
</a></td>
	</tr>
    <?php endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="6"><?php echo $this->_tpl_vars['lang']['select']; ?>
：
		<a href="javascript:;" onclick="selectAll('mid[]')"><?php echo $this->_tpl_vars['lang']['selectall']; ?>
</a> - 
		<a href="javascript:;" onclick="cancelAll('mid[]')"><?php echo $this->_tpl_vars['lang']['noselect']; ?>
</a> - 
		<a href="javascript:;" onclick="reverseAll('mid[]')"><?php echo $this->_tpl_vars['lang']['reverseselect']; ?>
</a> 
		</td>
	</tr>
   </table>
</form>
	<div class="toolbar">
		<span class="pagebox"><?php echo $this->_tpl_vars['pagelink']; ?>
</span>
		<span class="btn btn-dft" onclick="Drop('mid[]','&page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><b><?php echo $this->_tpl_vars['lang']['delete']; ?>
</b></span></span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?action=addnew&tid=<?php echo $_GET['tid']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span>添加成员</span></span>
		<span id="btnbox">
		   <span class="btnL" onclick="ShowSubMenu(this);" onmouseup="this.className='btnL-hover'" onmousedown="this.className='btnL-active'" onmouseout="this.className='btnL'" onmouseover="this.className='btnL-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['moveto']; ?>

			<ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
				 <li><a href="javascript:;" onclick="toggleTable('mid[]','&action=moveto&tid=<?php echo $this->_tpl_vars['aa']['tid']; ?>
')"><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
	       </span><b class="arr"></b>
		   <span class="btnM" onclick="ShowSubMenu(this)" onmouseup="this.className='btnM-hover'" onmousedown="this.className='btnM-active'" onmouseout="this.className='btnM'" onmouseover="this.className='btnM-hover'" tabindex="0"><?php echo $this->_tpl_vars['lang']['view']; ?>

			<ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				 <?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
				 <li><a href="javascript:;" onclick="ListTable('&tid=<?php echo $this->_tpl_vars['aa']['tid']; ?>
')"><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
				 <?php endforeach; endif; unset($_from); ?>
			</ul>
		   </span><b class="arr"></b>
		   <span class="btnR" onclick="ShowSubMenu(this)" onmouseover="this.className='btnR-hover'" onmouseup="this.className='btnR-hover'" onmousedown="this.className='btnR-active'" onmouseout="this.className='btnR'" tabindex="0">
		     <span><?php echo $this->_tpl_vars['lang']['more']; ?>

			    <ul class="submenu-bottom" onmouseover="ShowMenu(this)" onmouseout="HideMenu(this)">
				    <li><a href="javascript:;" onclick="Sort('','&os=ASC')"><?php echo $this->_tpl_vars['lang']['ascorder']; ?>
<b class="arr-asc"></b></a></li>
					<li><a href="javascript:;" onclick="Sort('','&os=DESC')"><?php echo $this->_tpl_vars['lang']['descorder']; ?>
<b class="arr-desc"></b></a></li>
				</ul>
				</span><b class="arr"></b>
	       </span>
		</span>
		<span class="btn btn-dft" onclick="Location('<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['page']; ?>
')" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</span></span>
  </div>
</div>
<?php endif; ?>
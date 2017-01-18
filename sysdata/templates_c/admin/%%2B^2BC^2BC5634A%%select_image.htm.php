<?php /* Smarty version 2.6.19, created on 2011-04-18 06:14:52
         compiled from select_image.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>图片选择器</title>
<script src="include/lang.zh_cn.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="images/style.css" /></head>
<?php echo '
<style type="text/css">
body{font-family:"宋体";}
.napisdiv {position:absolute;z-index:3;display:none; margin:10px auto; top:5px; left:150px;}
.napisdiv img{
    border:1px #333333 solid;
	max-width:320px;
	max-height:300px;
}
.list td a {
    display:block;
}
</style>
'; ?>

</head>

<body>
<div class="main-div" style="height:340px; overflow:auto;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
		<tr bgcolor="#FFFFFF">
			<th height="24">目录和文件名</td>
			</th><th width="70">文件大小</td>
			</th><th width="130">修改时间</td>
			</th><th width="40" class="last">预览</td>
		</th></tr>
		<?php $_from = $this->_tpl_vars['folders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fd']):
?>
		<tr onmouseover="this.className='active'" onmouseout="this.className=''">
			<td height="24" class="td-right"><a href="<?php echo $this->_tpl_vars['fd']['folderlink']; ?>
"><img src="<?php echo $this->_tpl_vars['fd']['img']; ?>
" border="0" /> <?php echo $this->_tpl_vars['fd']['filename']; ?>
</a></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php $_from = $this->_tpl_vars['filetree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tree']):
?>
		<tr onmouseover="this.className='active'" onmouseout="this.className=''">
			<td  height="24" class="td-right"><a href="javascript:;" title="<?php echo $this->_tpl_vars['lang']['click_choose']; ?>
" onclick="ReturnImg('<?php echo $this->_tpl_vars['tree']['filepath']; ?>
')"><img src="<?php echo $this->_tpl_vars['tree']['img']; ?>
" border="0" /> <?php echo $this->_tpl_vars['tree']['filename']; ?>
</a></td>
			<td  align="center"><?php echo $this->_tpl_vars['tree']['filesize']; ?>
</td>
			<td  align="center"><?php echo $this->_tpl_vars['tree']['filetime']; ?>
</td>
			<td  align="center"><a href="javascript:;" onclick="ChangeImage('../<?php echo $this->_tpl_vars['tree']['filepath']; ?>
');"><img src="../images/img/picviewnone.gif" width="16" height="16" border="0" align="absmiddle" title="预览" /></a></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
</div>
<form action="select_image.php?action=upload&f=<?php echo $this->_tpl_vars['f']; ?>
" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return CheckUpload(this)">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
		<tr>
			<td height="35" style="vertical-align:middle; text-align:center;">
				<input type="file" name="file" class="textinput" style="height:24px;" />
				水印:<input type="checkbox" name="watermark" value="1" checked="checked" style="vertical-align:middle;" /> 
				缩略图:<input type="checkbox" name="createsmall" value="1" checked="checked" style="vertical-align:middle;" />
				宽:<input name="width" type="text" value="<?php echo $this->_tpl_vars['cfg']['img_width']; ?>
" class="textinput" style="width:40px;" />
				高:<input name="height" type="text" value="<?php echo $this->_tpl_vars['cfg']['img_height']; ?>
"  class="textinput" style="width:40px;" />
				<span class="btn btn-dft" onclick="document.form1.submit()" onmouseup="this.className='btn btn-hover'" onmousedown="this.className='btn btn-active'" onmouseover="this.className='btn btn-hover'" onmouseout="this.className='btn btn-dft'" tabindex="0"><span>上传</span></span>
			</td>
		</tr>
	</table>
</form>
<div id="floater" class="napisdiv">
<a href="javascript:;" onclick="document.getElementById('floater').style.display='none';"><img src="../images/img/picviewnone.gif" id="picview" border="0" title="单击关闭预览" /></a></div>
<script language="JavaScript" type="text/javascript">var f = window.opener.document.<?php echo $this->_tpl_vars['f']; ?>
;</script>
<?php echo '
<script language="JavaScript" type="text/javascript">
function ReturnImg(reimg)
{
	f.value=reimg;
	if(document.all) window.opener=true;
    window.close();
}

function ChangeImage(surl){ 
	document.getElementById(\'floater\').style.display=\'block\';
	document.getElementById(\'picview\').src = surl; 
}

function CheckUpload(fileobj){
    if(!fileobj.file.value){
	   alert(upload_file_empty);
		 return false;
	}
	return true;
}
</script>
'; ?>

</body>
</html>
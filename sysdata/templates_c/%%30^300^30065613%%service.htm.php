<?php /* Smarty version 2.6.19, created on 2011-04-17 16:18:57
         compiled from service.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������ѯ_<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
</title>
<meta name="keywords" content="<?php echo $this->_tpl_vars['cfg']['keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['cfg']['description']; ?>
" />
<link href="templates/lianzong/images/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
</head>

<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="area">
  <div class="left01">
		<div class="banner"><img src="templates/lianzong/images/banner_1.jpg" border="0" /></div>
		<div class="yourpos"><a href="index.php">��ҳ</a> >> ������ѯ</div>
		<div class="title-gray">��ϵ����</div>
		
	    <form id="form1" name="form1" method="post" action="service.php?action=save" onsubmit="return checkSubmit(this)">
	      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formtable">
            <tr>
              <td width="11%">��ϵ�ˣ�</td>
              <td width="89%"><label>
                <input name="name" type="text" id="name" />
              </label></td>
            </tr>
            <tr>
              <td>��ϵ�绰��</td>
              <td><label>
                <input name="tel" type="text" id="tel" />
              </label></td>
            </tr>
            <tr>
              <td>��λ���ƣ�</td>
              <td><label>
                <input name="company" type="text" id="company" />
              </label></td>
            </tr>
            <tr>
              <td>�������䣺</td>
              <td><label>
                <input name="email" type="text" id="email" size="35" />
              </label></td>
            </tr>
            <tr>
              <td>��Ҫ���⣺<br />
                (300����)</td>
              <td><label>
                <textarea name="content" cols="50" rows="10" id="content" style="width:98%;"></textarea>
              </label>              
			  </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>
			  	<input type="submit" name="btnsubmit" value="�ᡡ��" class="apply" />
                <input type="reset" name="btnreset" value="�ء���" class="apply" />
			  </td>
            </tr>
          </table>
          </form>
    </div>
	<div class="right01">
		<div class="title-big">������ѯ</div>
	</div>
	<div class="clear"></div>
</div>
<?php echo '
<script type="text/javascript">
function checkSubmit(theForm){
	if(!theForm.name.value){
		alert(\'��ϵ�˲������գ���������д!\');
		return false;
	}
	
	if(!theForm.tel.value){
		alert(\'��ϵ�绰�������գ���������д!\');
		return false;
	}
	if(!theForm.content.value){
		alert(\'����ȷ��д��Ҫ��ѯ������!\');
		return false;
	}
	theForm.btnsubmit.disabled=true;
	theForm.btnreset.disabled=true;
	return true;
}
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
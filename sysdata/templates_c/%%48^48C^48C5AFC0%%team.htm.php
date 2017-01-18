<?php /* Smarty version 2.6.19, created on 2011-04-19 15:22:00
         compiled from team.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['teams']['0']['name']; ?>
_<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
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
	<div class="left01" id="left">
		<div class="banner"><img src="templates/lianzong/images/banner_1.jpg" border="0" /></div>
		<div class="yourpos"><a href="index.php">首页</a> >> 连纵团队 >> <?php echo $this->_tpl_vars['teams']['0']['name']; ?>
</div>
		<div class="title-gray"><?php echo $this->_tpl_vars['teams']['0']['name']; ?>
</div>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable">
          <tr class="gray">
            <td width="140">姓名</td>
            <td width="160">联系电话</td>
            <td>电子邮件</td>
          </tr>
		  <?php $_from = $this->_tpl_vars['members']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['mm']):
?>
          <tr<?php if (( $this->_tpl_vars['key']+1 ) % 2 == 0): ?> class="gray"<?php endif; ?>>
            <td><a href="team_member.php?mid=<?php echo $this->_tpl_vars['mm']['mid']; ?>
" target="_blank"><?php echo $this->_tpl_vars['mm']['name']; ?>
</a></td>
            <td><?php echo $this->_tpl_vars['mm']['tel']; ?>
</td>
            <td><?php echo $this->_tpl_vars['mm']['email']; ?>
</td>
          </tr>
		  <?php endforeach; endif; unset($_from); ?>
        </table>
		<div class="pagelink"><?php echo $this->_tpl_vars['pagelink']; ?>
</div>
	</div>
	<div class="right01" id="right">
		<div class="title-big">连纵团队</div>
		<ul class="titlelist">
			<?php $_from = $this->_tpl_vars['teams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aa']):
?>
			<li><a href="team.php?tid=<?php echo $this->_tpl_vars['aa']['tid']; ?>
"<?php if ($this->_tpl_vars['tid'] == $this->_tpl_vars['aa']['tid']): ?> class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['aa']['name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<div class="blank"></div>
		<div id="lhhz"><img src="templates/lianzong/images/pic-2.jpg" width="245" border="0" /></div>
	</div>
	<div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
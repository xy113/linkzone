<?php /* Smarty version 2.6.19, created on 2011-04-14 03:41:41
         compiled from admin_index.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['lang']['app_name']; ?>
</title>
<link rel="stylesheet" type="text/css" href="images/index.css">
<script src="javascript/common.js" type="text/javascript"></script>
<script src="javascript/common.js" type="text/javascript"></script>
</head>

<body>
<span id="load-div"><img src="images/loading.gif" border="0" /> 正在处理您的请求...</span>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="mainFrame">
  <tr>
    <td colspan="2" valign="top">
	   <div id="top-div">
		  <span style="padding-right:20px; text-align:left; display:inline; float:right;">
		      <a href="javascript:document.location.reload();"><?php echo $this->_tpl_vars['lang']['refresh']; ?>
</a> |
			  <a href="admin_about_us.php" target="mainframes"><?php echo $this->_tpl_vars['lang']['about_us']; ?>
</a> |
			  <a href="../" target="_blank"><?php echo $this->_tpl_vars['lang']['view_homepage']; ?>
</a> |
			  <a href="admin_message.php" target="mainframes"><?php echo $this->_tpl_vars['lang']['view_message']; ?>
</a> |
			  <a href="admin_admin.php?action=edit&admin_id=<?php echo $_SESSION['admin_id']; ?>
" target="mainframes"><?php echo $this->_tpl_vars['lang']['view_myinfo']; ?>
</a> |
			  <a href="index.php?action=clear_cache" target="mainframes"><?php echo $this->_tpl_vars['lang']['clear_cache']; ?>
</a> |
			  <a href="index.php?action=loginout" target="_top"><?php echo $this->_tpl_vars['lang']['quit']; ?>
</a>
		  </span>
	      <span style="font:Arial,sans-serif;">欢迎你,<?php echo $_SESSION['admin_user']; ?>
,您的IP:<?php echo $_SERVER['REMOTE_ADDR']; ?>
</span> 
	   </div>
	   <div id="logo"></div>
	   <div id="topmenu">
		   <ul>
		      <li><a href="javascript:;" id="header_index" onclick="toggleMenu('index','home')" class="cur"><?php echo $this->_tpl_vars['lang']['admin_home']; ?>
</a></li>
			  <?php $_from = $this->_tpl_vars['action']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['group']):
?>
			  <li><a href="javascript:;" hidefocus="true" id="header_<?php echo $this->_tpl_vars['key']; ?>
" onclick="toggleMenu('<?php echo $this->_tpl_vars['key']; ?>
','<?php echo $this->_tpl_vars['group']['action_link']; ?>
');"><?php echo $this->_tpl_vars['group']['action_name']; ?>
</a></li>
			  <?php endforeach; endif; unset($_from); ?>
		   </ul>
	   </div>
	</td>
  </tr>
  <tr>
    <td class="menutd" width="191" valign="top">
	    <div class="top-tab"></div>
	    <div class="menu-tab">
		     <a  href="index.php?action=loginout" target="_top" class="check"><?php echo $this->_tpl_vars['lang']['quit']; ?>
</a>
			 <a href="../" class="compose" target="_blank"><?php echo $this->_tpl_vars['lang']['home']; ?>
</a>
		</div>
	    <ul id="menu">
		    <li><a href="index.php?action=main" hidefocus="true" onclick="SwitchMenu(this)" target="mainframes"><?php echo $this->_tpl_vars['lang']['data_statistics']; ?>
</a></li>
			<li><a href="admin_admin.php?action=edit&admin_id=<?php echo $_SESSION['admin_id']; ?>
" hidefocus="true" onclick="SwitchMenu(this)" target="mainframes"><?php echo $this->_tpl_vars['lang']['view_myinfo']; ?>
</a></li>
		    <li><a href="admin_message.php" hidefocus="true" onclick="SwitchMenu(this)" target="mainframes"><?php echo $this->_tpl_vars['lang']['view_message']; ?>
</a></li>
			<li><a href="index.php?action=clear_cache" hidefocus="true" onclick="SwitchMenu(this)" target="mainframes"><?php echo $this->_tpl_vars['lang']['clear_cache']; ?>
</a></li>
			<li><a href="admin_about_us.php" hidefocus="true" onclick="SwitchMenu(this)" target="mainframes"><?php echo $this->_tpl_vars['lang']['about_us']; ?>
</a></li>
		</ul>
	</td>
    <td valign="top" width="100%">
	    <div class="top-tr"></div>
		<div style="height:100%; width:100%;">
		<iframe name="mainframes" id="mainframes" style="height:100%; width:100%; overflow:visible;" src="index.php?action=main" frameborder="0"></iframe>
	    </div>
	</td>
  </tr>
</table>
<script type="text/javascript">
var menu = new Array();
menu['index'] = new Array();
<?php $_from = $this->_tpl_vars['action']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['group']):
?>
menu[<?php echo $this->_tpl_vars['key']; ?>
] = new Array();
<?php $this->assign('sub', $this->_tpl_vars['group']['action_id']); ?>
<?php $_from = $this->_tpl_vars['action'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['menu']):
?>
menu[<?php echo $this->_tpl_vars['key']; ?>
][<?php echo $this->_tpl_vars['key2']; ?>
] = '<li><a href="<?php echo $this->_tpl_vars['menu']['action_link']; ?>
" hidefocus="true" onclick="SwitchMenu(this)" target="mainframes"><?php echo $this->_tpl_vars['menu']['action_name']; ?>
</a></li>';
<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
</script>
<?php echo '
<script type="text/javascript">
var mainFrame = $(\'mainFrame\');
mainFrame.style.height = (document.documentElement.clientHeight)+\'px\';
$(\'mainframes\').style.height = (document.documentElement.clientHeight-80)+\'px\';

function SwitchMenu(obj){
    var items = $(\'menu\').getElementsByTagName(\'a\');
	for(i=0;i<items.length;i++){
	    if(obj==items[i]){
		    items[i].parentNode.className = \'cur\';
		}else{
		    items[i].parentNode.className = \'\';
		}
	}
}

function toggleMenu(key,murl){
    if(key==\'index\'&& murl==\'home\'){
	    //window.location.href = \'index.php\';
		parent.location.href = \'index.php\';
		return false;
	}
    var items = $(\'topmenu\').getElementsByTagName(\'a\');
	for(i=0;i<items.length;i++){
	    items[i].className=\'\';
	}
	$(\'header_\'+key).className = \'cur\';
	if(murl){
		$(\'menu\').innerHTML = menu[key].join(\'\');
		if(murl!=\'#\' && murl!=\'\') parent.mainframes.location = murl;
	}
	return false;
}
</script>
'; ?>

</body>
</html>
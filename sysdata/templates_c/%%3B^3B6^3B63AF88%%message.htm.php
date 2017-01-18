<?php /* Smarty version 2.6.19, created on 2011-04-17 16:36:47
         compiled from message.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>系统提示_<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
</title>
<meta name="keywords" content="<?php echo $this->_tpl_vars['cfg']['keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['cfg']['description']; ?>
" />
<link href="templates/lianzong/images/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="messagebox">
	<?php if ($this->_tpl_vars['msg_type'] == 1): ?>
	<h2 class="error"><?php echo $this->_tpl_vars['msg_detail']; ?>
</h2>
	<?php else: ?>
	<h2 class="ok"><?php echo $this->_tpl_vars['msg_detail']; ?>
</h2>
	<?php endif; ?>
	<div class="blank"></div>
	<?php if ($this->_tpl_vars['auto_redirect']): ?>
	<div class="messagediv"><a href="<?php echo $this->_tpl_vars['forwardurl']; ?>
">页面将在<span id="thetimer">3</span>后自动跳转到下一页，如果页面长时间没有跳转，请点击从此处。</a></div>
	<?php endif; ?>
	<!--<div class="messagediv"><img src="templates/lianzong/images/arrow.gif" border="0" align="absmiddle" /> <a href="<?php echo $this->_tpl_vars['links']['href']; ?>
"><?php echo $this->_tpl_vars['links']['text']; ?>
</a></div> -->
</div>
<?php if ($this->_tpl_vars['auto_redirect']): ?>
<script type="text/javascript">
var num=3;
var forwardurl='<?php echo $this->_tpl_vars['forwardurl']; ?>
';
<?php echo '
function goback(){
   num--;
   if(num<1){
      if(forwardurl){
         window.location.href=forwardurl;
	  }else{
	     history.go(-1);
	  }
   }else{
      document.getElementById(\'thetimer\').innerHTML=num;
   }
}
'; ?>

setInterval('goback()',1000);
</script>
<?php endif; ?>
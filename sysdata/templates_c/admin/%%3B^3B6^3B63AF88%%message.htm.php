<?php /* Smarty version 2.6.19, created on 2011-04-19 15:52:24
         compiled from message.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['page_title']; ?>
 <?php echo $this->_tpl_vars['lang']['cp_home']; ?>
</title>
<link rel="stylesheet" type="text/css" href="images/style.css">
<script src="javascript/common.js" type="text/javascript"></script>
<script src="lang.zh_cn.js" type="text/javascript"></script>
<?php echo '
<style type="text/css">
.messagebox {
    padding:20px 20px; 
	width:60%; 
	margin:50px auto; 
	clear:both; 
	border:1px #CCCCCC solid;
}
.messagediv {
    clear:both; 
	height:30px; 
	line-height:30px;
}
</style>
'; ?>

</head>
<body>
<div class="main-div">
<div class="messagebox">
<?php if ($this->_tpl_vars['msg_type'] == 0): ?>
<img src="images/information.gif" border="0" align="absmiddle" />
<?php else: ?>
<img src="images/warning.gif" border="0" align="absmiddle" />
<?php endif; ?>
<b style="font-size:14px;"><?php echo $this->_tpl_vars['msg_detail']; ?>
</b>
<div class="blank"></div>
<?php if ($this->_tpl_vars['auto_redirect']): ?>
<div class="messagediv"><?php echo $this->_tpl_vars['lang']['auto_redirect']; ?>
</div>
<?php endif; ?>
<div class="messagediv"><img src="images/arrow.gif" border="0" align="absmiddle" /> <a href="<?php echo $this->_tpl_vars['links']['href']; ?>
"><?php echo $this->_tpl_vars['links']['text']; ?>
</a></div>
</div>
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
      document.getElementById(\'timer\').innerHTML=num;
	  window.clearInterval();
   }
}
'; ?>

setInterval('goback()',1000);
</script>
<?php endif; ?>
</BODY>
</HTML>
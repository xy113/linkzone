<?php /* Smarty version 2.6.19, created on 2011-04-19 14:40:49
         compiled from index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index.htm', 68, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['cfg']['sysname']; ?>
_首页</title>
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
	<div id="slide">
		<div id="slideshow">
			<?php $_from = $this->_tpl_vars['slides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['fl']):
?>
			<div class="current">
				<a href="<?php echo $this->_tpl_vars['fl']['flash_link']; ?>
"><img src="<?php echo $this->_tpl_vars['fl']['flash_pic']; ?>
" alt="<?php echo $this->_tpl_vars['fl']['flash_title']; ?>
" /></a>
				<span><?php echo $this->_tpl_vars['fl']['flash_title']; ?>
</span>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		</div>	
	</div>
	<?php echo '
	<script type="text/javascript">
	function slideSwitch() {
		var $current = $("#slideshow div.current");
		
		// 判断div.current个数为0的时候 $current的取值
		if ( $current.length == 0 ) $current = $("#slideshow div:last");
		
		// 判断div.current存在时则匹配$current.next(),否则转到第一个div
		var $next =  $current.next().length ? $current.next() : $("#slideshow div:first");
		$current.addClass(\'prev\');
		
		$next.css({opacity: 0.0}).addClass("current").animate({opacity: 1.0}, 1000, function() {
			//因为原理是层叠,删除类,让z-index的值只放在轮转到的div.current,从而最前端显示
			$current.removeClass("current prev");
		});
	}
	
	$(function() {
		$("#slideshow span").css({"opacity":"0.7","display":"block"});
		$(".current").css("opacity","1.0");
		
		// 设定时间为3秒(1000=1秒)
		setInterval( "slideSwitch()", 3000 ); 
	});
	</script>
	'; ?>

	<ul id="slideright">
		<li><img src="templates/lianzong/images/pic-1.jpg" border="0" /></li>
		<li class="blank"></li>
		<li><img src="templates/lianzong/images/pic-2.jpg" border="0" /></li>
	</ul>
	<div class="clear"></div>
</div>
<div class="blank"></div>
<div class="area">
	<div class="left01">
		<div class="title-gray">连纵律师事务所</div>
		<p><?php echo $this->_tpl_vars['about']['content']; ?>
</p>
		<div class="title-brown"><a href="arclist.php" class="more">更多>></a>连纵动态</div>
		<ul>
			<?php $_from = $this->_tpl_vars['articles']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arc']):
?>
			<li><span><?php echo ((is_array($_tmp=$this->_tpl_vars['arc']['dateline'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span> ·<a href="<?php echo $this->_tpl_vars['arc']['arcurl']; ?>
" title="<?php echo $this->_tpl_vars['arc']['title']; ?>
"><?php echo $this->_tpl_vars['arc']['title']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
</div>
<div class="blank"></div>
<div class="area">
	<div class="title-gray">友情链接</div>
	<div id="flinks">
		<?php $_from = $this->_tpl_vars['friendlink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['flink']):
?>
		 <a href="<?php echo $this->_tpl_vars['flink']['link_url']; ?>
" title="<?php echo $this->_tpl_vars['flink']['link_info']; ?>
" target="_blank"><?php echo $this->_tpl_vars['flink']['link_name']; ?>
</a>
		 <?php endforeach; endif; unset($_from); ?>
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
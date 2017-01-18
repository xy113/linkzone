<?php /* Smarty version 2.6.19, created on 2011-04-17 15:00:33
         compiled from header.htm */ ?>
<div class="topdiv">
	<div class="logo"><img src="templates/lianzong/images/logo.png" border="0" title="<?php echo $this->_tpl_vars['cfg']['sysname']; ?>
" /></div>
	<div class="topright"><?php $_from = $this->_tpl_vars['navs']['top']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?><a href="<?php echo $this->_tpl_vars['nav']['nav_link']; ?>
"<?php echo $this->_tpl_vars['nav']['target']; ?>
><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a>¡¡<?php endforeach; endif; unset($_from); ?></div>
	<div class="clear"></div>
</div>
<ul class="nav">
   <li><a href="/">Ê×¡¡Ò³</a></li>
   <?php $_from = $this->_tpl_vars['navs']['mid']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['midnav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['midnav']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['midnav']['iteration']++;
?>
   <?php $this->assign('sub', $this->_tpl_vars['nav']['nav_id']); ?>
   <li<?php if ($this->_tpl_vars['navs']['mid'][$this->_tpl_vars['sub']]): ?> onmouseover="ShowSubMenu(this)" onmouseout="HideSubMenu(this)"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['nav']['nav_link']; ?>
"<?php echo $this->_tpl_vars['nav']['target']; ?>
><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a>
   		<?php if ($this->_tpl_vars['navs']['mid'][$this->_tpl_vars['sub']]): ?>
		<ul>
			<?php $_from = $this->_tpl_vars['navs']['mid'][$this->_tpl_vars['sub']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subnav']):
?>
			<li><a href="<?php echo $this->_tpl_vars['subnav']['nav_link']; ?>
"<?php echo $this->_tpl_vars['subnav']['target']; ?>
><?php echo $this->_tpl_vars['subnav']['nav_name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<?php endif; ?>
   </li>
   <?php endforeach; endif; unset($_from); ?>
</ul>
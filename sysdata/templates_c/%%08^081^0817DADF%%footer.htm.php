<?php /* Smarty version 2.6.19, created on 2011-04-20 02:02:29
         compiled from footer.htm */ ?>
<!--<script type="text/javascript">$("#right").css('height',$("#left").height()+'px');</script>-->
<div class="blank"></div>
<div class="area">
    <div class="footer" id="bottom">
	<?php $_from = $this->_tpl_vars['navs']['bot']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['botnav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['botnav']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['botnav']['iteration']++;
?>
	<a href="<?php echo $this->_tpl_vars['nav']['nav_link']; ?>
"<?php echo $this->_tpl_vars['nav']['target']; ?>
><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a><?php if (! ($this->_foreach['botnav']['iteration'] == $this->_foreach['botnav']['total'])): ?> | <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="footer"><?php echo $this->_tpl_vars['cfg']['copyright']; ?>
 Powered By <a href="http://www.songdewei.com/" target="_blank">XSCMS</a></div>
	<div class="footer">备案号:<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $this->_tpl_vars['cfg']['icp']; ?>
</a> - <?php echo $this->_tpl_vars['cfg']['tongjicode']; ?>
 - <a href="http://www.songdewei.com" target="_blank">小宋工作室</a></div>
</div>
</body>
</html>
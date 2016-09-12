<?php if ($this->_var['user_info']): ?>
<em><?php echo $this->_var['user_info']['username']; ?> <?php echo $this->_var['lang']['welcome_return']; ?>！</em>
<a class="sn-login" href="user.php" target="_top"><?php echo $this->_var['lang']['user_center']; ?></a><a class="sn-register" href="user.php?act=logout" target="_top"><?php echo $this->_var['lang']['user_logout']; ?></a>

<?php else: ?>

<em><?php echo $this->_var['lang']['welcome']; ?>!

<?php endif; ?>
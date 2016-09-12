<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,common.min.js')); ?>

<div class="top">
	<div class="auto">
    		<div class="pull-left top-left">
    		<?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
            </div>
    		<div class="pull-right">
            <?php if (! $_SESSION['user_id']): ?>
    		<a href="user.php" class="top-link">登录</a><span>|</span><a href="user.php?act=register" class="top-link">注册</a><span>|</span>
            <?php endif; ?>
    		<span class="w26"></span><a href="#">帮助中心<img src="themes/68ecshopcom_360buy/img/ico1.jpg" alt="" /></a><span class="w26"></span>
    		<a href="#">网站导航<img src="themes/68ecshopcom_360buy/img/ico1.jpg" alt="" /></a>
    </div>
	</div>
</div>

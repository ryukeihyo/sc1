<?php
$GLOBALS['smarty']->assign('cat_recommend_type',get_cat_recommend_type($GLOBALS['smarty']->_var['goods_cat']['id']));
?>

<div class="floor-common">
 <b>1F <?php echo htmlspecialchars($this->_var['goods_cat']['name']); ?></b>
 <div class="pull-right">
              <?php
                $GLOBALS['smarty']->assign('child_cat',get_child_cat($GLOBALS['smarty']->_var['goods_cat']['id'], 5));
               ?>
           <?php $_from = $this->_var['child_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_item');$this->_foreach['child_cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat_item']):
        $this->_foreach['child_cat']['iteration']++;
?>
           <a href="category.php?id=<?php echo $this->_var['cat_item']['id']; ?>"><?php echo htmlspecialchars($this->_var['cat_item']['name']); ?></a>
           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<a href="category.php?id=<?php echo $this->_var['goods_cat']['id']; ?>" class="more pull-right">更多<img src="img/more.jpg" alt="" /></a>
 </div>
</div>
<div class="floor-list">
<?php
$GLOBALS['smarty']->assign('best_goods', get_cat_recommend_goods('best', get_children($GLOBALS['smarty']->_var['goods_cat']['id']), 10));
?>

 <div class="w237 pull-left">
 <a href="#"><img src="img/ad1.jpg" alt="" /></a>
 </div>

 
 <ul class="w722 pull-left">
 <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_84705300_1472202706');$this->_foreach['cat_item_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_item_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_84705300_1472202706']):
        $this->_foreach['cat_item_goods']['iteration']++;
?>
    <?php if ($this->_foreach['cat_item_goods']['iteration'] < 5): ?>
	<li>
	<div class="floor-pf">
	<?php echo $this->_var['goods_0_84705300_1472202706']['short_style_name']; ?> <br/>
	<font class="yellow"><?php echo $this->_var['goods_0_84705300_1472202706']['brief']; ?></font>
	</div>
	<div class="main_img">
	<a href="<?php echo $this->_var['goods_0_84705300_1472202706']['url']; ?>">
	<img src=".<?php echo $this->_var['goods_0_84705300_1472202706']['original_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_84705300_1472202706']['name']); ?>" height="178" width="355" />
	</a></div>
	</li>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

 </ul>

 
 <div class="w240">
  <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_84705300_1472202706');$this->_foreach['cat_item_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_item_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_84705300_1472202706']):
        $this->_foreach['cat_item_goods']['iteration']++;
?>
     <?php if ($this->_foreach['cat_item_goods']['iteration'] == 5): ?>
 <div class="floor-pf">
	<?php echo $this->_var['goods_0_84705300_1472202706']['short_style_name']; ?> <br/>
	<font class="yellow"><?php echo $this->_var['goods_0_84705300_1472202706']['brief']; ?></font>
	</div>
	<div class="main_img">
	<a href="<?php echo $this->_var['goods_0_84705300_1472202706']['url']; ?>">
	<img src=".<?php echo $this->_var['goods_0_84705300_1472202706']['original_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_84705300_1472202706']['name']); ?>" height="357" width="239" />
	</a></div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </div>

 
 <ul class="floor-list2">
   <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_84705300_1472202706');$this->_foreach['cat_item_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_item_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_84705300_1472202706']):
        $this->_foreach['cat_item_goods']['iteration']++;
?>
<?php if ($this->_foreach['cat_item_goods']['iteration'] > 5 && $this->_foreach['cat_item_goods']['iteration'] < 10): ?>

 <li <?php if ($this->_foreach['cat_item_goods']['iteration'] == 6 || $this->_foreach['cat_item_goods']['iteration'] == 9): ?> class="w237" <?php else: ?>class="w238"<?php endif; ?>>
	<div class="floor-pf">
	<b><?php echo $this->_var['goods_0_84705300_1472202706']['short_style_name']; ?></b> <br/>
	<p class="gray"><?php echo $this->_var['goods_0_84705300_1472202706']['brief']; ?></p>
	<font class="red price">￥<?php echo $this->_var['goods_0_84705300_1472202706']['market_price']; ?></font>
	</div>
	<div class="main_img">
	<a href="<?php echo $this->_var['goods_0_84705300_1472202706']['url']; ?>"><img  src=".<?php echo $this->_var['goods_0_84705300_1472202706']['original_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_84705300_1472202706']['name']); ?>" height="181" />
	</a></div>
 </li>


<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

 </ul>

 </div>



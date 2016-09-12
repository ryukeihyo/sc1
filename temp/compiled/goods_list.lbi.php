上架 <a href="#"></a>
<a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter=<?php echo $this->_var['filterid']; ?>&mystock=<?php echo $this->_var['mystock']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=goods_id&order=<?php if ($this->_var['pager']['sort'] == 'goods_id' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list">
<?php if ($this->_var['pager']['sort'] == 'goods_id' && $this->_var['pager']['order'] == 'DESC'): ?>
<img src="img/up2.jpg" alt="" />
<?php else: ?>
<img src="img/down.jpg" alt="" />
<?php endif; ?>
</a>
销量
<a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter=<?php echo $this->_var['filterid']; ?>&mystock=<?php echo $this->_var['mystock']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=salenum&order=<?php if ($this->_var['pager']['sort'] == 'salenum' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list">
<?php if ($this->_var['pager']['sort'] == 'salenum' && $this->_var['pager']['order'] == 'DESC'): ?>
<img src="img/up2.jpg" alt="" />
<?php else: ?>
<img src="img/down.jpg" alt="" />
<?php endif; ?>
</a>
价格
<a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter=<?php echo $this->_var['filterid']; ?>&mystock=<?php echo $this->_var['mystock']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list">
<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>
<img src="img/up2.jpg" alt="" />
<?php else: ?>
<img src="img/down.jpg" alt="" />
<?php endif; ?>
</a>
人气
<a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter=<?php echo $this->_var['filterid']; ?>&mystock=<?php echo $this->_var['mystock']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=click_count&order=<?php if ($this->_var['pager']['sort'] == 'click_count' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list" rel='nofollow'>
<?php if ($this->_var['pager']['sort'] == 'click_count' && $this->_var['pager']['order'] == 'DESC'): ?>
<img src="img/up2.jpg" alt="" />
<?php else: ?>
<img src="img/down.jpg" alt="" />
<?php endif; ?>
</a>
<span class="pull-right pages">
  <font class="red">共<?php echo $this->_var['pager']['record_count']; ?>件商品</font> &nbsp;&nbsp;
  <font class="red"><?php echo $this->_var['pager']['page']; ?></font>/<?php echo $this->_var['pager']['page_count']; ?> &nbsp;&nbsp;
  <?php if ($this->_var['pager']['page_prev']): ?>
     <a href="<?php echo $this->_var['pager']['page_prev']; ?>" > < </a>
     <?php else: ?>
     <span class="prev-disabled"><a> < </a> </span>
     <?php endif; ?>
     <?php if ($this->_var['pager']['page_next']): ?>
     <a href="<?php echo $this->_var['pager']['page_next']; ?>" > > </a>
     <?php else: ?>
     <a>></a>
   <?php endif; ?>
</span>


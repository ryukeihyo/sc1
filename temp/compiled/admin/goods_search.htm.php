<!-- $Id: goods_search.htm 16790 2009-11-10 08:56:15Z wangleisvn $ -->
<div class="form-div">
  <form action="javascript:searchGoods()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    <?php if ($_GET['act'] != "trash"): ?>
    <!-- 分类 -->
    <select name="cat_id"><option value="0"><?php echo $this->_var['lang']['goods_cat']; ?></option><?php echo $this->_var['cat_list']; ?></select>
    <!-- 品牌 -->
    <select name="brand_id"><option value="0"><?php echo $this->_var['lang']['goods_brand']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['brand_list'])); ?></select>
    <!-- 推荐 -->
	<?php if ($this->_var['suppliers_exists'] == 0): ?>
    <select name="intro_type"><option value="0"><?php echo $this->_var['lang']['intro_type']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['intro_list'],'selected'=>$_GET['intro_type'])); ?></select>
	<?php endif; ?>
     <?php if ($this->_var['suppliers_exists'] == 1): ?>    
      <!-- 供货商 -->
      <select name="suppliers_id"><option value="0"><?php echo $this->_var['lang']['intro_type']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['suppliers_list_name'],'selected'=>$_GET['suppliers_id'])); ?></select>
      
	
	  
	  <select name="supplier_status"><option value="">审核状态</option>
	  <?php $_from = $this->_var['supplier_status_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('supplier_key', 'supplier_status');if (count($_from)):
    foreach ($_from AS $this->_var['supplier_key'] => $this->_var['supplier_status']):
?>
	  <option value="<?php echo $this->_var['supplier_key']; ?>" <?php if ($this->_var['supplier_key'] != '' && $this->_var['supplier_key'] == $_GET['supplier_status']): ?>selected<?php endif; ?>><?php echo $this->_var['supplier_status']; ?></option>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	  </select>
	  
	  <?php endif; ?>
      <!-- 上架 -->
      <select name="is_on_sale"><option value=''><?php echo $this->_var['lang']['intro_type']; ?></option><option value="1"><?php echo $this->_var['lang']['on_sale']; ?></option><option value="0"><?php echo $this->_var['lang']['not_on_sale']; ?></option></select>
    <?php endif; ?>
    <!-- 关键字 -->
    <?php echo $this->_var['lang']['keyword']; ?> <input type="text" name="keyword" size="15" />
    <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" class="button" />
  </form>
</div>


<script language="JavaScript">
    function searchGoods()
    {

        <?php if ($_GET['act'] != "trash"): ?>
        listTable.filter['cat_id'] = document.forms['searchForm'].elements['cat_id'].value;
        listTable.filter['brand_id'] = document.forms['searchForm'].elements['brand_id'].value;
		<?php if ($this->_var['suppliers_exists'] == 0): ?>
        listTable.filter['intro_type'] = document.forms['searchForm'].elements['intro_type'].value;
		<?php endif; ?>
          <?php if ($this->_var['suppliers_exists'] == 1): ?>
          listTable.filter['suppliers_id'] = document.forms['searchForm'].elements['suppliers_id'].value;
		  /* 代码增加_start  By  www.68ecshop.com */
		listTable.filter['supplier_status'] = document.forms['searchForm'].elements['supplier_status'].value;
		/* 代码增加_end  By  www.68ecshop.com */
          <?php endif; ?>
        listTable.filter['is_on_sale'] = document.forms['searchForm'].elements['is_on_sale'].value;
        <?php endif; ?>

        listTable.filter['keyword'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
		
        listTable.filter['page'] = 1;

        listTable.loadList();
    }
</script>

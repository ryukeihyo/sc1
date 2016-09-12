<!-- $Id: wholesale_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>



<form method="post" action="wholesale.php" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
<!-- start wholesale list -->
<div class="list-div" id="listDiv">
<?php endif; ?>

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th><?php echo $this->_var['lang']['record_id']; ?></th>
      <th><?php echo $this->_var['lang']['sub_name']; ?></th>
      <th><?php echo $this->_var['lang']['address']; ?></th>
      <th><?php echo $this->_var['lang']['mianji']; ?></th>
	  <th><?php echo $this->_var['lang']['sub_fuzeren']; ?></th>
      <th><?php echo $this->_var['lang']['handler']; ?></th>
    </tr>

    <?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
    <tr>
	<td align=center><?php echo $this->_var['store']['store_id']; ?></td>
      <td><?php echo $this->_var['store']['store_name']; ?></td>
      <td><?php echo htmlspecialchars($this->_var['store']['province_name']); ?><?php echo htmlspecialchars($this->_var['store']['city_name']); ?><?php echo htmlspecialchars($this->_var['store']['district_name']); ?></td>
      <td><?php echo $this->_var['store']['mianji']; ?></td>
      <td style="line-height:18px;"><?php echo $this->_var['store']['adminer']; ?></td>
      <td align="center">
        <a href="store_manage.php?act=edit_sub&amp;id=<?php echo $this->_var['store']['store_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>"><img src="images/icon_edit.gif" border="0" height="16" width="16" /></a>
        <a href="store_manage.php?act=sub_remove&id=<?php echo $this->_var['store']['store_id']; ?>&pid=<?php echo $this->_var['store']['parent_id']; ?>" onclick="return confirm('您确认要删除吗？')" title="<?php echo $this->_var['lang']['remove']; ?>"><img src="images/icon_drop.gif" border="0" height="16" width="16" /></a>      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>



<?php if ($this->_var['full_page']): ?>
</div>
<!-- end wholesale list -->
</form>

<script type="text/javascript" language="JavaScript">
<!--

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  
  onload = function()
  {
    document.forms['searchForm'].elements['keyword'].focus();

    startCheckOrder();
  }


  
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>
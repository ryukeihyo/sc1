<!-- $Id: area_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader_citytree.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js,../js/region.js')); ?>
<?php echo $this->fetch('store_shipping_demo_lib.htm'); ?>
<!-- start category list -->
<div class="list-div">
<table cellspacing='1' cellpadding='3' id='listTable'>
  <tr>
    <th>当前仓库：<?php echo $this->_var['store_name']; ?></th>
  </tr>
</table>
</div>
<div class="list-div" id="listDiv">
<?php endif; ?>

<table cellspacing='1' cellpadding='3' id='listTable'>
  <tr><td colspan='3'><input type="checkbox" name="allc" id="allc" onclick="$('.areacb').attr('checked',this.checked);">全选</td></tr><tr>
    <?php $_from = $this->_var['area_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');$this->_foreach['area_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['area_name']['total'] > 0):
    foreach ($_from AS $this->_var['list']):
        $this->_foreach['area_name']['iteration']++;
?>
      <?php if ($this->_foreach['area_name']['iteration'] > 1 && ( $this->_foreach['area_name']['iteration'] - 1 ) % 3 == 0): ?>
      </tr><tr>
      <?php endif; ?>
      <td class="first-cell" align="left">
	  <form action="" method="post" id="areaform" name="areaform">
	  <table width="100%" cellpadding=0 cellspacing=0 border=0>
	  <tr><td width="50%" align=right style="padding-right:30px;font-weight:bold;">
	  <input type="checkbox" name="areas[]" class="areacb" value="<?php echo $this->_var['list']['rec_id']; ?>">
       <span onclick="listTable.edit(this, 'edit_store_name', '<?php echo $this->_var['list']['store_id']; ?>'); return false;"><?php echo htmlspecialchars($this->_var['list']['area_name']); ?></span>
	   </td><td width="50%">
       <span class="link-span">       
	   <a href="store_manage.php?act=shipping_area_fee&id=<?php echo $this->_var['list']['rec_id']; ?>" title="<?php echo $this->_var['lang']['shipping_area_fee']; ?>"><?php echo $this->_var['lang']['shipping_area_fee']; ?></a>&nbsp;&nbsp;
       <a href="store_manage.php?act=shipping_area_remove&store_id=<?php echo $this->_var['store_id']; ?>&id=<?php echo $this->_var['list']['rec_id']; ?>" onclick="return confirm('你确认要删除吗？');" title="<?php echo $this->_var['lang']['drop']; ?>"><?php echo $this->_var['lang']['drop']; ?></a>
       </span>
	   </td></tr></table>
	   </form>
      </td>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </tr>
</table>
<br><br>
<?php 
$k = array (
  'name' => 'get_all_regions',
  'store_id' => $this->_var['store_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
<input type="button" value="运费模板" onclick="javascript:showDiv()">
<!--
<form action="store_manage.php" method="post" name="theForm">
<table cellspacing='1' cellpadding='3' id='listTable2'>
<tr>
    <td align=center>
        <span  style="vertical-align: top"><?php echo $this->_var['lang']['label_country']; ?> </span>
        <select name="country" id="selCountries" onchange="region.changed(this, 1, 'selProvinces')" size="10" style="width:80px">
          <?php $_from = $this->_var['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
          <option value="<?php echo $this->_var['country']['region_id']; ?>"><?php echo htmlspecialchars($this->_var['country']['region_name']); ?></option>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </select>
        <span  style="vertical-align: top"><?php echo $this->_var['lang']['label_province']; ?> </span>
        <select name="province" id="selProvinces" onchange="region.changed(this, 2, 'selCities')" size="10" style="width:80px">
          <option value=''><?php echo $this->_var['lang']['select_please']; ?></option>
        </select>
        <span  style="vertical-align: top"><?php echo $this->_var['lang']['label_city']; ?> </span>
        <select name="city" id="selCities" onchange="region.changed(this, 3, 'selDistricts')" size="10" style="width:80px">
          <option value=''><?php echo $this->_var['lang']['select_please']; ?></option>
        </select>
        <span  style="vertical-align: top"><?php echo $this->_var['lang']['label_district']; ?></span>
        <select name="district" id="selDistricts" onchange="region.changed(this, 4, 'selXiangcuns')"  size="10" style="width:130px">
          <option value=''><?php echo $this->_var['lang']['select_please']; ?></option>
        </select>
		<span  style="vertical-align: top"><?php echo $this->_var['lang']['label_district']; ?></span>
        <select name="xiangcun" id="selXiangcuns"  size="10" style="width:130px">
          <option value=''><?php echo $this->_var['lang']['select_please']; ?></option>
        </select>
		
		
        <span  style="vertical-align: top">
		<input type="hidden" name="parent_id" value="<?php echo $this->_var['store_id']; ?>">
		<input type="button" value="+" class="button" style="cursor:pointer;" onclick="addRegion()" /></span>
    </td>
  </tr>
  </table >
  </form>
 -->

<?php if ($this->_var['full_page']): ?>
</div>


<script language="JavaScript">
<!--
region.isAdmin = true;
onload = function() {
  // 开始检查订单
  startCheckOrder();
}

/**
 * 新建区域
 */
function addRegion()
{
	var parent_id = Utils.trim(document.forms['theForm'].elements['parent_id'].value);
    var province = Utils.trim(document.forms['theForm'].elements['province'].value);
    var city   = Utils.trim(document.forms['theForm'].elements['city'].value);
	var district   = Utils.trim(document.forms['theForm'].elements['district'].value);
	var xiangcun   = Utils.trim(document.forms['theForm'].elements['xiangcun'].value);

    if (province.length == 0 || city.length == 0)
    {
        alert('省份或城市不能为空');
    }
    else
    {
      Ajax.call('store_manage.php?is_ajax=1&act=add_shipping_area',
        'parent_id=' + parent_id + '&province=' + province+ '&city=' + city+ '&district=' + district+ '&xiangcun=' + xiangcun,
        listTable.listCallback, 'POST', 'JSON');
    }

    return false;
}

//-->
</script>




<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>
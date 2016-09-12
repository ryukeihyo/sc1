<!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/region.js')); ?>

<div class="main-div" style="background:#fff;">
<form method="post" action="<?php if ($this->_var['script_file']): ?><?php echo $this->_var['script_file']; ?><?php else: ?>store_inout_in.php<?php endif; ?>" enctype="multipart/form-data" name="theForm"  onsubmit="return validate()">

<table width="100%">
<tr>
<td width="30%" align=right>请选择文件：</td>
<td ><input type="file" name="csv_file"></td>
</tr>
  <tr><td></td>
    <td >
      <input type="submit" class="button" value="批量导入" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
      <input type="hidden" name="store_id" value="<?php echo $this->_var['store_id']; ?>" />
      <input type="hidden" name="sub_id" value="<?php echo $this->_var['sub_id']; ?>" />
	  <input type="hidden" name="inout_type" value="<?php echo $this->_var['inout_type']; ?>" />
	  <input type="hidden" name="takegoods_man" value="<?php echo $this->_var['takegoods_man']; ?>" />
    </td>
  </tr>
</table>
</form>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>

<script language="JavaScript">
<!--
region.isAdmin = true;
onload = function()
{
    // 开始检查订单
    startCheckOrder();
}  

//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
<!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<div class="main-div">
<form method="post" action="store_inout_type.php" name="theForm"  onsubmit="return validate()">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label"><?php if ($_REQUEST['in_out'] == 1): ?><?php echo $this->_var['lang']['type_name1']; ?><?php else: ?><?php echo $this->_var['lang']['type_name2']; ?><?php endif; ?></td>
    <td><input type="text" name="type_name" maxlength="60" value="<?php echo $this->_var['type']['type_name']; ?>" /><?php echo $this->_var['lang']['require_field']; ?></td>
  </tr>

  <tr>
    <td class="label"><?php echo $this->_var['lang']['is_valid']; ?></td>
    <td><input type="radio" name="is_valid" value="1" <?php if ($this->_var['type']['is_valid'] == 1): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_var['lang']['yes']; ?>
        <input type="radio" name="is_valid" value="0" <?php if ($this->_var['type']['is_valid'] == 0): ?>checked="checked"<?php endif; ?> /> <?php echo $this->_var['lang']['no']; ?>
        
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br />
      <input type="submit" class="button" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
      <input type="reset" class="button" value="<?php echo $this->_var['lang']['button_reset']; ?>" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
      <input type="hidden" name="old_typename" value="<?php echo $this->_var['type']['type_name']; ?>" />
      <input type="hidden" name="id" value="<?php echo $this->_var['type']['type_id']; ?>" />
	  <input type="hidden" name="in_out" value="<?php echo $this->_var['in_out']; ?>" />
    </td>
  </tr>
</table>
</form>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>

<script language="JavaScript">
<!--
document.forms['theForm'].elements['type_name'].focus();
onload = function()
{
    // 开始检查订单
    startCheckOrder();
}
/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("type_name",  no_typename);
    return validator.passed();
}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
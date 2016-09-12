<!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/region.js')); ?>
<div class="main-div">
<form method="post" action="store_manage.php" name="theForm"  onsubmit="return validate()">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label"><?php echo $this->_var['lang']['sub_name2']; ?></td>
    <td><input type="text" name="store_name" maxlength="60" value="<?php echo $this->_var['store']['store_name']; ?>" /><?php echo $this->_var['lang']['require_field']; ?></td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['sub_address']; ?></td>
    <td>
	<select name="province" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
     <option value=''><?php echo $this->_var['lang']['select_please']; ?></option>
     <?php $_from = $this->_var['provinces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
      <option value="<?php echo $this->_var['region']['region_id']; ?>" <?php if ($this->_var['region']['region_id'] == $this->_var['store']['province']): ?>selected<?php endif; ?>><?php echo $this->_var['region']['region_name']; ?></option>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
	<select name="city" id="selCities" onchange="region.changed(this, 3, 'selDistricts')">
    <option value=''><?php echo $this->_var['lang']['select_please']; ?></option>
     <?php $_from = $this->_var['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
     <option value="<?php echo $this->_var['region']['region_id']; ?>" <?php if ($this->_var['region']['region_id'] == $this->_var['store']['city']): ?>selected<?php endif; ?>><?php echo $this->_var['region']['region_name']; ?></option>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </select>
	 <select name="district" id="selDistricts">
          <option value=""><?php echo $this->_var['lang']['select_please']; ?></option>
			 <?php $_from = $this->_var['district']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
			<option value="<?php echo $this->_var['region']['region_id']; ?>" <?php if ($this->_var['region']['region_id'] == $this->_var['store']['district']): ?>selected<?php endif; ?>><?php echo $this->_var['region']['region_name']; ?></option>
			 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </select>
	</td>
  </tr>
  <tr>
    <td class="label">仓库面积</td>
    <td><input type="text" name="mianji" value="<?php echo $this->_var['store']['mianji']; ?>">平米</td>
	</tr>

  <tr>
    <td class="label"><?php echo $this->_var['lang']['sub_fuzeren']; ?></td>
    <td>
	<?php $_from = $this->_var['admin_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'admin');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['admin']):
?>
	<?php if ($this->_var['key'] > 0 && $this->_var['key'] % 4 == 0): ?><br><?php endif; ?>
	<input type="checkbox" name="admin_id[]"  <?php if ($this->_var['admin']['checked'] == 'checked'): ?>checked=checked<?php endif; ?> value="<?php echo $this->_var['admin']['user_id']; ?>" onclick="addAdminTel(this)" > <?php echo $this->_var['admin']['user_name']; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['sub_contact']; ?></td>
    <td valign=top >
	（前面输入框填写移动电话 ，后面输入框填写固定电话。）
	<table cellpadding=0 cellspacing=0  width="300" id="tabzhyh">
	<?php if ($this->_var['list_adminer']): ?>
	<?php $_from = $this->_var['list_adminer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'adminer_item');if (count($_from)):
    foreach ($_from AS $this->_var['adminer_item']):
?>
	<tr id="<?php echo $this->_var['adminer_item']['admin_id']; ?>"><td><?php echo $this->_var['adminer_item']['admin_name']; ?>&nbsp;<input type='hidden' name='adminname_<?php echo $this->_var['adminer_item']['admin_id']; ?>' value='<?php echo $this->_var['adminer_item']['admin_name']; ?>' ><input type='text' name='mobile_<?php echo $this->_var['adminer_item']['admin_id']; ?>' value="<?php echo empty($this->_var['adminer_item']['mobile']) ? '移动电话' : $this->_var['adminer_item']['mobile']; ?>">&nbsp;<input type='text' name='tel_<?php echo $this->_var['adminer_item']['admin_id']; ?>' value="<?php echo empty($this->_var['adminer_item']['tel']) ? '固定电话' : $this->_var['adminer_item']['tel']; ?>"></td></tr>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<?php endif; ?>
	</table>
	</td>
  </tr>

  <tr>
    <td colspan="2" align="center"><br />
      <input type="submit" class="button" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
      <input type="reset" class="button" value="<?php echo $this->_var['lang']['button_reset']; ?>" onclick="document.getElementById('tabzhyh').innerHTML='';" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
      <input type="hidden" name="store_id" value="<?php echo $this->_var['store']['store_id']; ?>" />
      <input type="hidden" name="parent_id" value="<?php echo $this->_var['store']['parent_id']; ?>" />
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
/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("store_name",  no_subname);
	validator.required("province",  no_province);
	validator.required("city",  no_city);
	validator.required("district",  '没有选择区（县）');
	validator.required("mianji",  '仓储面积不能为空');
	var admin_list= document.getElementsByName('admin_id[]');
	var admin_checked=0;
	for(var k=0;k<admin_list.length;k++)
	{
		if (admin_list[k].checked)
		{
			admin_checked++;
		}		
	}
	if(!admin_checked)
	{
		validator.addErrorMsg(no_admin);
	}
    return validator.passed();
}

  function addAdminTel(obj)
  {
	  var tbl  = document.getElementById('tabzhyh');
	  if (obj.checked)
	  {
		  //alert(obj.value);
		  //alert(obj.nextSibling.nodeValue);		   
           var row  = tbl.insertRow();
		   row.setAttribute("id", obj.value);
           var cell1 = row.insertCell(-1);
		   cell1.innerHTML= obj.nextSibling.nodeValue+"&nbsp;<input type='hidden' name='adminname_"+ obj.value +"' value='"+ obj.nextSibling.nodeValue +"' ><input type='text' name='mobile_"+ obj.value +"' value='移动电话' onfocus=\"if(this.value=='移动电话')this.value='';\">&nbsp;<input type='text' name='tel_"+ obj.value +"' value='固定电话' onfocus=\"if(this.value=='固定电话')this.value='';\">";
	  }
	  else
	  {
			var ok= tbl.getElementsByTagName("tr");
			for(var k=0;k<ok.length;k++)
			{
                if(ok[k].id==obj.value)
				{
					tbl.deleteRow(k);
					//k=k-1;
				}
			}
	  }
	  
  }
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
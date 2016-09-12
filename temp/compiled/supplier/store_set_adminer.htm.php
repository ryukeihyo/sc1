<!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/region.js')); ?>
<div class="main-div">
<form method="post" action="store_manage.php" name="theForm"  onsubmit="return validate()">
<table cellspacing="1" cellpadding="3" width="100%">
  

  <tr>
    <td class="label"><?php echo $this->_var['lang']['sub_fuzeren']; ?></td>
    <td>
	<?php $_from = $this->_var['admin_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'admin');if (count($_from)):
    foreach ($_from AS $this->_var['admin']):
?>
	<input type="checkbox" name="admin_id[]"  <?php if ($this->_var['admin']['checked'] == 'checked'): ?>checked=checked<?php endif; ?> value="<?php echo $this->_var['admin']['user_id']; ?>" onclick="addAdminTel(this)" > <?php echo $this->_var['admin']['user_name']; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['sub_contact']; ?></td>
    <td valign=top >
	<table cellpadding=0 cellspacing=0  width="300" id="tabzhyh">
	<?php if ($this->_var['list_adminer']): ?>
	<?php $_from = $this->_var['list_adminer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'adminer_item');if (count($_from)):
    foreach ($_from AS $this->_var['adminer_item']):
?>
	<tr id="<?php echo $this->_var['adminer_item']['admin_id']; ?>"><td><?php echo $this->_var['adminer_item']['admin_name']; ?>&nbsp;<input type='hidden' name='adminname_<?php echo $this->_var['adminer_item']['admin_id']; ?>' value='<?php echo $this->_var['adminer_item']['admin_name']; ?>' ><input type='text' name='mobile_<?php echo $this->_var['adminer_item']['admin_id']; ?>' value="<?php echo $this->_var['adminer_item']['mobile']; ?>">&nbsp;<input type='text' name='tel_<?php echo $this->_var['adminer_item']['admin_id']; ?>' value="<?php echo $this->_var['adminer_item']['tel']; ?>"></td></tr>
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
      <input type="hidden" name="store_id" value="<?php echo $this->_var['store_id']; ?>" />
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
		   cell1.innerHTML= obj.nextSibling.nodeValue+"&nbsp;<input type='hidden' name='adminname_"+ obj.value +"' value='"+ obj.nextSibling.nodeValue +"' ><input type='text' onfocus=\"if(this.value=='移动电话')this.value='';\" value='移动电话' name='mobile_"+ obj.value +"'>&nbsp;<input type='text' name='tel_"+ obj.value +"' value='固定电话' onfocus=\"if(this.value=='固定电话')this.value='';\">";
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
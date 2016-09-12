<!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<div id="bg" class="bg" style="display:none;"></div>
<?php echo $this->fetch('store_inout_notice.htm'); ?>

<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/region.js')); ?>
<style>
.product_box tr{background:#ffffff;}
</style>
<div class="main-div" style="background:#fff;">
<form method="post" action="store_inout_in.php" name="theForm"  onsubmit="return validate()">

<table cellspacing="1" cellpadding="5"  align="center" style="background:#cccccc;">
<tr bgcolor=#eeeeee>
<td  align=center>入库单号</td>
<td   align=center>收货库房</td>
<td   align=center>库房仓管</td>
<td   align=center>入库类型</td>
<td   align=center>关联订单号</td>
<td   align=center>交货人</td>
<td   align=center>入库日期</td>
<?php if ($_GET['act'] == 'edit'): ?>
<td   align=center>操作</td>
<?php endif; ?>
</tr>
<tr bgcolor=#ffffff>
<td align=center><?php echo $this->_var['inout']['inout_sn']; ?></td>
<td align=center>
<select name="store_id" id="store_id" onchange="getSubStore_ecshop120(this, 'sub_id');">
<option value="">收货仓库</option>
<?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
<option value="<?php echo $this->_var['store']['store_id']; ?>" <?php if ($this->_var['inout']['store_id'] == $this->_var['store']['store_id']): ?>selected<?php endif; ?>><?php echo $this->_var['store']['store_name']; ?></option>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</select>
<select name="sub_id"  id="sub_id" onchange="getSubAdmin_ecshop120(this);" >
<option value="">收货库房</option>
<?php if ($this->_var['inout']['sub_id_list']): ?>
<?php $_from = $this->_var['inout']['sub_id_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sub_ecshop120');if (count($_from)):
    foreach ($_from AS $this->_var['sub_ecshop120']):
?>
<option value="<?php echo $this->_var['sub_ecshop120']['store_id']; ?>" <?php if ($this->_var['inout']['sub_id'] == $this->_var['sub_ecshop120']['store_id']): ?>selected<?php endif; ?>><?php echo $this->_var['sub_ecshop120']['store_name']; ?></option>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>
</select>
</td>
<td id="admin_box"> </td>
<td align=center>
<select name="inout_type">
<option value="">入库类型</option>
<?php $_from = $this->_var['inout_type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');if (count($_from)):
    foreach ($_from AS $this->_var['type']):
?>
<option value="<?php echo $this->_var['type']['type_id']; ?>" <?php if ($this->_var['inout']['inout_type'] == $this->_var['type']['type_id']): ?>selected=selected<?php endif; ?> ><?php echo $this->_var['type']['type_name']; ?></option>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</select>
</td>
<td align=center><input type="text" name="order_sn" onkeyup="add_product(this);" value="<?php echo $this->_var['inout']['order_sn']; ?>" ></td>
<?php if ($_REQUEST['ismanagestore']): ?>
<td align=center><input type="text" name="takegoods_man" value="<?php echo $this->_var['inout']['takegoods_man']; ?>" ></td>
<?php else: ?>
<td align=center>
<?php echo $this->_var['inout']['takegoods_man']; ?>
<input type="hidden" name="takegoods_man" value="<?php echo $this->_var['inout']['takegoods_man']; ?>" >
</td>
<?php endif; ?>
<td  align=center ><?php echo $this->_var['inout']['add_time_date']; ?></td>
<?php if ($_GET['act'] == 'edit'): ?>
<td   align=center>
<a href="store_inout_in.php?act=remove&id=<?php echo $this->_var['inout']['rec_id']; ?>" onclick="return confirm('你确认要删除吗？')" >删除</a>&nbsp;&nbsp;
<a href="javascript:showDiv(<?php echo $this->_var['inout']['rec_id']; ?>, '2', '提交审核');">提交审核</a>
</td>
<?php endif; ?>
</tr>
</table>
<ul style="width:100%;list-style-type:none;">
   <li style="float:left;padding-right:8px;">货号：<input type="text" name="goods_sn" size="20" value="" onkeyup="get_goodsInfo_bysn(this)"   autocomplete="off"/></li>
   <li style="float:left;padding-right:8px;">商品名称：<input type="text" name="goods_name" id="goods_name" size="40" disabled readonly /></li>
    <li style="float:left;padding-right:8px;" id="attr_box" > </li>
    <li style="float:left;padding-right:8px;">数量：<input type="text" name="goods_number" size="10" value="1" />
	<input type="hidden" name="goods_thumb" id="goods_thumb" value="" >
	<input type="hidden" name="goods_id" id="goods_id" value="" >
	<input type="button" class="button" value="<?php echo $this->_var['lang']['button_submit']; ?>" onclick="add_product2()" />
    <input type="button" class="button" value="批量导入" onclick="import_goodslist();" />
	</li>
  </ul>

<table cellspacing="1" cellpadding="5"  align="center" style="background:#cccccc;"  id="product_box" class="product_box">
<tr style="background:#eeeeee"  id="firstTr">
<td width="15%" align=center>产品图片</td>
<td width="15%" align=center>产品货号</td>
<td width="15%" align=center>产品名称</td>
<td width="15%" align=center>产品属性</td>
<td width="10%" align=center>应收数量</td>
<td width="10%" align=center>实收数量</td>
<td width="10%" align=center>操作</td>
</tr>
<?php if ($this->_var['goods_list']): ?>
<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
<tr>
<td><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width=50 height=50><input type="hidden" name="goods_id[]" value="<?php echo $this->_var['goods']['goods_id']; ?>"></td>
<td><?php echo $this->_var['goods']['goods_sn']; ?><input type="hidden" name="goods_sn[]" value="<?php echo $this->_var['goods']['goods_sn']; ?>"></td>
<td><?php echo $this->_var['goods']['goods_name']; ?></td>
<td><?php echo nl2br($this->_var['goods']['goods_attr1']); ?><input type="hidden" name="goods_attr[]" value="<?php echo $this->_var['goods']['goods_attr2']; ?>" ></td>
<td><?php echo $this->_var['goods']['number_yingshou']; ?><input type="hidden" name="number_yingshou[]" value="<?php echo $this->_var['goods']['number_yingshou']; ?>"></td>
<td><input type="text" name="number_shishou[]" value="<?php echo $this->_var['goods']['number_shishou']; ?>"></td>
<td><a href="javascript:void(0);" onclick="removeProduct(this)" >删除</a> </td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>

</table>
<table width="100%">
  <tr>
    <td  align="center"><br />
	   <font id="is_submit_txt" style="color:#ff3300;"></font><br>
      <input type="submit" class="button" value="提交入库单" id="is_submit" />	
	  <input type="hidden" name="rec_id" value="<?php echo $this->_var['inout']['rec_id']; ?>">
      <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
	  <br><br>注意：使用“关联订单号”或“货号”获取入库商品时，请尽量使用键盘输入或者使用 ctrl+v 快捷键进行粘贴，尽量不要使用鼠标右键进行粘贴。
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
*  批量导入
*/
function import_goodslist()
{
	var theform=document.forms['theForm'];
	theform.elements['act'].value='batch_import';
	theform.submit();
}


/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
    validator.required("sub_id",  '收货库房不能为空');
	validator.required("inout_type",  '入库类型不能为空');
	validator.required("takegoods_man",  '交货人不能为空');
	var goods_list= document.getElementsByName('goods_id[]');
	var shishou_list= document.getElementsByName('number_shishou[]');
	var goods_checked=0;
	var shishou_checked=0;
	for(var k=0;k<goods_list.length;k++)
	{
		if (goods_list[k])
		{
			goods_checked++;
		}		
	}	
	var re=/^[0-9]{1,30}$/
	for(var k=0;k<shishou_list.length;k++)
	{
		if (re.test(shishou_list[k].value) && shishou_list[k].value >0)
		{
			shishou_checked++;
		}		
	}

	if(!goods_checked)
	{
		validator.addErrorMsg('没有添加任何商品');
	}
	else
	{
		if (goods_checked>shishou_checked)
		{
			validator.addErrorMsg('请将所有实收数量填写完整，并且要填写正确！');
		}
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
		   cell1.innerHTML= obj.nextSibling.nodeValue+"&nbsp;<input type='hidden' name='adminname_"+ obj.value +"' value='"+ obj.nextSibling.nodeValue +"' ><input type='text' name='mobile_"+ obj.value +"'>&nbsp;<input type='text' name='tel_"+ obj.value +"'>";
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
  
  //通过goods_sn获取商品列表
  function add_product2()
  {
		var tbl  = document.getElementById('product_box');
		trs = tbl.getElementsByTagName("tr");           
		for(var i = trs.length-1; i > 0; i--) 
		{
			if (trs[i].getAttribute('id')=='order_sn_tr')
			{
				tbl.deleteRow(i);
			}				  
	    }
		var theform=document.forms['theForm'];
		var goods_id=theform.elements['goods_id'].value;
		var attr_val=document.getElementsByName('attr_val');		
		var attr_name=document.getElementsByName('attr_name');
		var ecshop120_dd="";
		var ecshop120_tt="";
		for (var i=0;i<attr_val.length;i++)
		{   
			ecshop120_dd += ecshop120_dd ? '<br>' : '';
			ecshop120_dd += attr_name[i].value+':';
			var selectIndex = attr_val[i].selectedIndex;
			ecshop120_dd += attr_val[i].options[selectIndex].text;
			ecshop120_tt += ecshop120_tt ? '|' : '';
			ecshop120_tt += attr_val[i].value;
		}
      
	  if (!goods_id)
	  {
		  return false;
	  }
		
		var firstTr= document.getElementById('firstTr');
		var idx   = rowindex(firstTr);
		var row  = tbl.insertRow(idx+1);
		var cell1 = row.insertCell(-1);
		cell1.innerHTML= '<img src="../'+theform.elements['goods_thumb'].value+'" width=50 height=50><input type="hidden" name="goods_id[]" value="'+ theform.elements['goods_id'].value +'">';
		var cell1 = row.insertCell(-1);
		cell1.innerHTML= theform.elements['goods_sn'].value+'<input type="hidden" name="goods_sn[]" value="'+theform.elements['goods_sn'].value+'">';
		var cell1 = row.insertCell(-1);
		cell1.innerHTML= theform.elements['goods_name'].value
		var cell1 = row.insertCell(-1);
		cell1.innerHTML= ecshop120_dd+'<input type="hidden" name="goods_attr[]" value="'+ ecshop120_tt +'" >';
		var cell1 = row.insertCell(-1);
		cell1.innerHTML= theform.elements['goods_number'].value+'<input type="hidden" name="number_yingshou[]" value="'+theform.elements['goods_number'].value+'">';
		var cell1 = row.insertCell(-1);
		cell1.innerHTML= '<input type="text" name="number_shishou[]" >';
		var cell1 = row.insertCell(-1);
		cell1.innerHTML= '<a href="javascript:void(0);" onclick="removeProduct(this)" >删除</a>';
  }
   //通过order_sn获得商品列表
   function add_product(obj)
   {
		var order_sn = obj.value;
		if(order_sn)
		{
			Ajax.call('store_inout_in.php?act=get_goodslist_byOrdersn&sjs='+Math.random(), "order_sn="+ order_sn , add_product_Response, "GET", "JSON");
		}
   }
   function add_product_Response(result)
   {
	   var tbl  = document.getElementById('product_box');
		trs = tbl.getElementsByTagName("tr");           
		for(var i = trs.length-1; i > 0; i--) 
		{
				  tbl.deleteRow(i);
	  }
	  
	  if(result.error)
	  {
		  //dddd
		  //alert('ddd');
	  }
	  else
	  {			

			var firstTr= document.getElementById('firstTr');
			var idx   = rowindex(firstTr);
			var result2=result.goods_list
			for(var i=0;i<result2.length;i++)
		  {
				var row  = tbl.insertRow(idx+1);
				row.setAttribute("id", "order_sn_tr");
				var cell1 = row.insertCell(-1);
				cell1.innerHTML= '<img src="../'+ result2[i]['goods_thumb']+'" width=50 height=50><input type="hidden" name="goods_id[]" value="'+ result2[i]['goods_id'] +'">';
				var cell1 = row.insertCell(-1);
				cell1.innerHTML= result2[i]['goods_sn']+'<input type="hidden" name="goods_sn[]" value="'+ result2[i]['goods_sn'] +'">';
				var cell1 = row.insertCell(-1);
				cell1.innerHTML= result2[i]['goods_name'];
				var cell1 = row.insertCell(-1);
				cell1.innerHTML= result2[i]['goods_attr_name']+'<input type="hidden" name="goods_attr[]" value="'+ result2[i]['goods_attr'] +'">';
				var cell1 = row.insertCell(-1);
				cell1.innerHTML= result2[i]['back_goods_number']+'<input type="hidden" name="number_yingshou[]" value="'+result2[i]['back_goods_number']+'">';
				var cell1 = row.insertCell(-1);
				cell1.innerHTML= "<input type='text' name='number_shishou[]' >";
				var cell1 = row.insertCell(-1);
				cell1.innerHTML= '<a href="javascript:void(0);" onclick="removeProduct(this)" >删除</a>';
		  }
	   }
   }
   function removeProduct(obj)
   {
		 var row = rowindex(obj.parentNode.parentNode);
		 var tbl = document.getElementById('product_box');
		 tbl.deleteRow(row);
   }


  //通过goods_sn 货号获得商品信息
  function get_goodsInfo_bysn(obj)
  {	   
	  var sn=obj.value;
	  if(sn)
	  {
		Ajax.call('store_inout_in.php?act=get_goodsInfo_bysn&sjs='+Math.random(), "goods_sn="+ sn , get_goodsInfo_bysn_response, "GET", "JSON");
	  }
  }
  function get_goodsInfo_bysn_response(result)
  {
	  if (result.cuowu)
	  {
		  //alert(result.cuowu);
		  document.getElementById('goods_thumb').value= '';
		  document.getElementById('goods_name').value= '';
		  document.getElementById('goods_id').value= '';
		  document.getElementById('attr_box').innerHTML= '';
	  }
	  else
	  {
			document.getElementById('goods_thumb').value= result.goods_thumb;
			document.getElementById('goods_name').value= result.goods_name;
			document.getElementById('goods_id').value= result.goods_id;
			document.getElementById('attr_box').innerHTML= result.optionss;
	  }
  }

  /* 获取库房管理员 */
  function getSubAdmin_ecshop120(obj)
  {
		var parentid = obj.options[obj.selectedIndex].value;
		Ajax.call('store_inout_in.php?act=get_store_admin&sjs='+Math.random(), "store_id=" + parentid , getSubAdmin_ecshop120_response, "GET", "JSON");
  }
  function getSubAdmin_ecshop120_response(result)
  {
		var admin_box = document.getElementById('admin_box');
		var is_submit_txt =document.getElementById('is_submit_txt');
		var is_submit =document.getElementById('is_submit');
	  
		if(result.admin_isme == '0')
	    {
			is_submit_txt.innerHTML='您不是这个库房的管理员，无权提交入库单！提交按钮已经锁定！请选择您管理的库房！';
			is_submit.disabled='disabled';
	   }
	   else
	   {
			is_submit_txt.innerHTML='';
			is_submit.disabled=false;
	    }
		admin_box.innerHTML = result.admin_name;
  }

  //仓库 库房两级下拉联动
  function getSubStore_ecshop120(obj, target)
  {
		var parentid = obj.options[obj.selectedIndex].value;
		Ajax.call('store_ajax.php?sjs='+Math.random(), "target="+ target+"&parentid=" + parentid , getSubStore_ecshop120_response, "GET", "JSON");
  }
  function getSubStore_ecshop120_response(result)
  {
		var sel = document.getElementById(result.target);
		sel.length = 1;
		sel.selectedIndex = 0;
		if (result.store_list)
		{
			for (i = 0; i < result.store_list.length; i ++ )
			{
				var opt = document.createElement("OPTION");
				opt.value = result.store_list[i].store_id;
				opt.text  = result.store_list[i].store_name;
				sel.options.add(opt);
			}
		}
  }
  

//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
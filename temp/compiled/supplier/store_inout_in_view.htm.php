<!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<div id="bg" class="bg" style="display:none;"></div>
<?php echo $this->fetch('store_inout_notice.htm'); ?>

<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/region.js')); ?>
<style>
.product_box tr{background:#ffffff;}
.note_box tr{background:#ffffff;}
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
<?php if ($_GET['act'] == 'check'): ?>
<td   align=center>操作</td>
<?php endif; ?>
</tr>
<tr bgcolor=#ffffff>
<td align=center><?php echo $this->_var['inout']['inout_sn']; ?></td>
<td align=center><?php echo $this->_var['inout']['store_name']; ?></td>
<td align=center><?php echo $this->_var['inout']['admin_name']; ?></td>
<td align=center><?php echo $this->_var['inout']['inout_type_name']; ?></td>
<td align=center><?php echo $this->_var['inout']['order_sn']; ?></td>
<td align=center><?php echo $this->_var['inout']['takegoods_man']; ?></td>
<td  align=center ><?php echo $this->_var['inout']['add_time_date']; ?></td>
<?php if ($_GET['act'] == 'check'): ?>
<td  align=center >
<a href="javascript:showDiv(<?php echo $this->_var['inout']['rec_id']; ?>, '3', '通过审核');" >通过审核</a>&nbsp;&nbsp;
<a href="javascript:showDiv(<?php echo $this->_var['inout']['rec_id']; ?>, '4', '拒绝审核');" >拒绝审核</a>&nbsp;&nbsp;
<a href="javascript:showDiv(<?php echo $this->_var['inout']['rec_id']; ?>, '1', '退回');" >退回</a>
</td>
<?php endif; ?>
</tr>
</table>

<table cellspacing="1" cellpadding="5"  align="center" style="background:#cccccc;"  id="product_box" class="product_box">
<tr style="background:#eeeeee"  id="firstTr">
<td width="10%" align=center>序号</td>
<td width="15%" align=center>产品图片</td>
<td width="15%" align=center>产品货号</td>
<td width="15%" align=center>产品名称</td>
<td width="15%" align=center>产品属性</td>
<td width="10%" align=center>应收数量</td>
<td width="10%" align=center>实收数量</td>
</tr>
<?php $_from = $this->_var['inout']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['inout_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['inout_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['inout_goods_list']['iteration']++;
?>
<tr>
<td ><?php echo $this->_foreach['inout_goods_list']['iteration']; ?></td>
<td ><img src="../<?php echo $this->_var['goods']['goods_thumb']; ?>" width=50 height=50></td>

<td ><?php echo $this->_var['goods']['goods_sn']; ?></td>
<td ><?php echo $this->_var['goods']['goods_name']; ?></td>
<td ><?php echo $this->_var['goods']['attr_value']; ?></td>
<td ><?php echo $this->_var['goods']['number_yingshou']; ?></td>
<td ><?php echo $this->_var['goods']['number_shishou']; ?></td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>

<table cellspacing="1" cellpadding="5"  align="center" style="background:#cccccc;" class="note_box">
<tr style="background:#eee;">
<td width="15%" align=center>操作者</td>
<td width="15%" align=center>操作时间</td>
<td width="15%" align=center>操作</td>
<td width="15%" align=center>入库单状态</td>
<td width="40%" align=left>备注</td>
</tr>
<?php $_from = $this->_var['inout']['note_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'note');if (count($_from)):
    foreach ($_from AS $this->_var['note']):
?>
<tr>
<td align=center><?php echo $this->_var['note']['adminer_name']; ?></td>
<td align=center><?php echo $this->_var['note']['add_time']; ?></td>
<td align=center><?php echo $this->_var['note']['action_val']; ?></td>
<td align=center><?php echo $this->_var['note']['inout_status']; ?></td>
<td ><?php echo $this->_var['note']['inout_note']; ?></td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<table>

<table width="100%">
  <tr>
    <td  align="center"><br />
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
    validator.required("order_sn",  no_subname);
	validator.required("province",  no_province);
	validator.required("city",  no_city);
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
  
   //通过order_sn获得商品列表
   function add_product(obj)
   {
      var tbl  = document.getElementById('product_box');
	  firstTr= document.getElementById('firstTr');
	  var idx   = rowindex(firstTr);
	  var row  = tbl.insertRow(idx+1);
      var cell1 = row.insertCell();
	  cell1.innerHTML= "44";
	  var cell1 = row.insertCell(-1);
	  cell1.innerHTML= "44";
	  var cell1 = row.insertCell(-1);
	  cell1.innerHTML= "44";
	  var cell1 = row.insertCell(-1);
	  cell1.innerHTML= "44";
	  var cell1 = row.insertCell(-1);
	  cell1.innerHTML= "44";
	  var cell1 = row.insertCell(-1);
	  cell1.innerHTML= "44";
	  var cell1 = row.insertCell(-1);
	  cell1.innerHTML= "44";
	  var cell1 = row.insertCell(-1);
	  cell1.innerHTML= "44";
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
		  document.getElementById('goods_name').value= '';
		  document.getElementById('attr_box').innerHTML= '';
	  }
	  else
	  {
		document.getElementById('goods_name').value= result.goods_name;
		document.getElementById('attr_box').innerHTML= result.optionss;
	  }
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
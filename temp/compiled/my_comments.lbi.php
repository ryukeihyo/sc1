<style type="text/css">
li.pre dl{height:25px}
</style>
<div class="goods-pj1">
	<p style="padding:10px 0;color:#333;font-size:15px;;">商品评价</p>
	<div class="pj-1">
	<font><?php echo $this->_var['rank_num']['rank_pa']; ?>%</font><br/>
	好评度
	</div>
	<div class="pj-2">
		<li><span class="pull-left">好评度(<?php echo $this->_var['rank_num']['rank_pa']; ?>%)</span> <span class="dengji bg1"></span></li>
		<li><span class="pull-left">中评度(<?php echo $this->_var['rank_num']['rank_pb']; ?>%)</span> <span class="dengji bg2"></span></li>
		<li><span class="pull-left">差评度(<?php echo $this->_var['rank_num']['rank_pc']; ?>%)</span> <span class="dengji bg2"></span></li>
	</div>
	
	<div class="pingjia">
	
	<ul class="tabs" id="tabs01">
	  <li id="current">
	      <a id="mct_0" onClick="ShowMyComments(<?php echo $this->_var['goods']['goods_id']; ?>,0,1)" title="tab5">全部评价(<?php echo $this->_var['rank_num']['rank_total']; ?>)</a></li>
	  <li><a id="mct_1" onClick="ShowMyComments(<?php echo $this->_var['goods']['goods_id']; ?>,1,1)" title="tab6">好评(<?php echo $this->_var['rank_num']['rank_a']; ?>)</a></li>
	  <li><a id="mct_2" onClick="ShowMyComments(<?php echo $this->_var['goods']['goods_id']; ?>,2,1)" title="tab7">中评(<?php echo $this->_var['rank_num']['rank_b']; ?>)</a></li>
	  <li><a id="mct_3" onClick="ShowMyComments(<?php echo $this->_var['goods']['goods_id']; ?>,3,1)" title="tab8">差评(<?php echo $this->_var['rank_num']['rank_c']; ?>)</a></li>
	</ul>
	
<div id="ECS_MYCOMMENTS">

</div>
<script language="javascript">

　window.onload=ShowMyComments(<?php echo $this->_var['goods']['goods_id']; ?>,0,1);

function ShowMyComments(goods_id, type, page)
{
	for (var i = 0; i <= 3 ; i ++)
	{
		document.getElementById("mct_"+i).className = (type == i) ? 'current' : '';
	}
	Ajax.call('goods_comment.php?act=list_json', 'goods_id=' + goods_id + '&type=' + type + '&page='+page, ShowMyCommentsResponse, 'GET', 'JSON');
}

function ShowMyCommentsResponse(result)
{
  if (result.error)
  {

  }

  try
  {
    var layer = document.getElementById("ECS_MYCOMMENTS");
    layer.innerHTML = result.content;
  }
  catch (ex) {}
}


function show_good(comment_id)
{
	Ajax.call('goods_comment.php?act=good_json', 'comment_id=' + comment_id, show_goodResponse, 'GET', 'JSON');
}
function show_goodResponse(result)
{
	if (result.error == 1)
	{
		alert("您已经评过分了哦！");
	}
	else
	{
		var layer = document.getElementById("good_num_"+result.comment_id);
		layer.innerHTML = result.good_num;
	}
}

</script>
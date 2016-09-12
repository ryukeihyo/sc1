<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="UTF-8"/>
<title>产品内页</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="shortcut icon" href="favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/style.css"/>

<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/pshow.css" />

<SCRIPT src="themes/68ecshopcom_360buy/js/jquery-1.2.6.pack.js" type="text/javascript"></SCRIPT>
<SCRIPT src="themes/68ecshopcom_360buy/js/base.js" type="text/javascript"></SCRIPT>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/magiczoom.js" ></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/magiczoom_plus.js" ></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>

<script type="text/javascript">
function $id(element) {
  return document.getElementById(element);
}
//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str){
  var bt=$id(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++){
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function(){
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"":"h2bg");
      }
    }
  }
  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}
</script>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>

</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="auto">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
<div class="goods-box">

<div class="goods-box1">
	<div id="preview">
	<div class="jqzoom" id="spec-n1" >
	  <?php if ($this->_var['pictures']): ?>
       <img  src=".<?php echo $this->_var['pictures']['0']['img_url']; ?>" jqimg=".<?php echo $this->_var['pictures']['0']['img_url']; ?>" width="417"  height="360" id="" />
       <?php else: ?>
       <img src="<?php echo $this->_var['goods']['goods_img']; ?>"  jqimg="<?php echo $this->_var['goods']['goods_img']; ?>"  width="417" class="" id=""  />
       <?php endif; ?>
	</div>
	<?php if ($this->_var['pictures']): ?>
	<div id="spec-n5">
		<div class="control" id="spec-left">
			<img src="img/left.gif" />
		</div>
		<div id="spec-list">
			<ul class="list-h">
				 <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');if (count($_from)):
    foreach ($_from AS $this->_var['picture']):
?>
                          <li>

                	    <img src=".<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>"   />

                          </li>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
		<div class="control" id="spec-right">
			<img src="img/right.gif" />
		</div>

    </div>
      <script>
          function $gg(id){
            return (document.getElementById) ? document.getElementById(id): document.all[id]
          }

                var boxwidth=62;//跟图片的实际尺寸相符

          var box=$gg("demo");
          var obox=$gg("demo1");
          var dulbox=$gg("demo2");
          obox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
          dulbox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
          box.style.width=obox.getElementsByTagName("li").length*boxwidth*5+'px';
          var canroll = false;
          if (obox.getElementsByTagName("li").length >= 5) {
            canroll = true;
            dulbox.innerHTML=obox.innerHTML;
          }
          var step=5;temp=1;speed=50;
          var awidth=obox.offsetWidth;
          var mData=0;
          var isStop = 1;
          var dir = 1;

          function s(){
            if (!canroll) return;
            if (dir) {
          if((awidth+mData)>=0)
          {
          mData=mData-step;
          }
          else
          {
          mData=-step;
          }
          } else {
            if(mData>=0)
            {
            mData=-awidth;
            }
            else
            {
            mData+=step;
            }
          }

          obox.style.marginLeft=mData+"px";

          if (isStop) return;

          setTimeout(s,speed)
          }


          function moveLeft() {
              var wasStop = isStop;
              dir = 1;
              speed = 50;
              isStop=0;
              if (wasStop) {
                setTimeout(s,speed);
              }
          }

          function moveRight() {
              var wasStop = isStop;
              dir = 0;
              speed = 50;
              isStop=0;
              if (wasStop) {
                setTimeout(s,speed);
              }
          }

          function scrollStop() {
            isStop=1;
          }

          function clickLeft() {
              var wasStop = isStop;
              dir = 1;
              speed = 25;
              isStop=0;
              if (wasStop) {
                setTimeout(s,speed);
              }
          }

          function clickRight() {
              var wasStop = isStop;
              dir = 0;
              speed = 25;
              isStop=0;
              if (wasStop) {
                setTimeout(s,speed);
              }
          }
          </script>
    <?php endif; ?>
</div>
<SCRIPT type="text/javascript">
	$(function(){			
	   $(".jqzoom").jqueryzoom({
			xzoom:417,
			yzoom:417,
			offset:10,
			position:"right",
			preload:1,
			lens:1
		});
		$("#spec-list").jdMarquee({
			deriction:"left",
			width:417,
			height:56,
			step:2,
			speed:4,
			delay:10,
			control:true,
			_front:"#spec-right",
			_back:"#spec-left"
		});
		$("#spec-list img").bind("mouseover",function(){
			var src=$(this).attr("src");
			$("#spec-n1 img").eq(0).attr({
				src:src.replace("\/n5\/","\/n1\/"),
				jqimg:src.replace("\/n5\/","\/n0\/")
			});
			$(this).css({
				"border":"2px solid #ff6600",
				"padding":"1px"
			});
		}).bind("mouseout",function(){
			$(this).css({
				"border":"1px solid #ccc",
				"padding":"2px"
			});
		});				
	})
	</SCRIPT>

<SCRIPT src="themes/68ecshopcom_360buy/js/lib.js" type="text/javascript"></SCRIPT>
<SCRIPT src="themes/68ecshopcom_360buy/js/163css.js" type="text/javascript"></SCRIPT>



<div class="goods-share">
<a href="#"><img src="img/cp_i1.jpg" alt="" />(2)</a>
<a href="#"><img src="img/cp_i2.jpg" alt="" />(0)</a>
<a href="#"><img src="img/cp_i3.jpg" alt="" />(2)</a>
<div class="bdsharebuttonbox"><span class="pull-left">分享到:</span><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</div>


</div>
<form id="ECS_FORMBUY" name="ECS_FORMBUY" method="post" action="javascript:addToCart(136)">
<div class="goods-box2">
	<h3><?php echo $this->_var['goods']['goods_style_name']; ?></h3>
	<p>市场价：<span class="line-through">￥<?php echo $this->_var['goods']['market_price']; ?></span></p>
	<div class="red tejia">特惠价：￥<b>
	 <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
        <?php echo $this->_var['goods']['promote_price']; ?>
     <?php else: ?>
        <?php echo $this->_var['goods']['shop_price_formated']; ?>
     <?php endif; ?> </b></div>
	<p>已成交：(<font class="blue"><?php echo $this->_var['review_count']; ?>人评价</font>)</p>
	<p>商品编号：<font class="gray"><?php echo $this->_var['goods']['goods_sn']; ?></font></p>
	<p>
	  
    			<?php 
$k = array (
  'name' => 'select_region',
  'from' => 'good',
  'title' => '配&nbsp;送&nbsp;至：',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    			<?php echo $this->smarty_insert_scripts(array('files'=>'select_region.js?0705')); ?>
    		
    				  <div id="youhuo" style="float:left;height:28px;line-height:28px;padding: 5px;position: relative;color:#ff3300;font-weight:bold">加载中... </div>
	</p>
	<div class="xian"></div>

	
                  <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
                  <div class="cp-size">
                  <span class="pull-left"><?php echo $this->_var['spec']['name']; ?>：</span>
                      
                      <?php if ($this->_var['spec']['attr_type'] == 1): ?>
                          <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
                            <input type="hidden" name="spec_attr_type" value="<?php echo $this->_var['spec_key']; ?>">
                           <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>

                                <a <?php if ($this->_var['value']['selected_key_ecshop68'] == '1'): ?>class="on"<?php endif; ?> onclick="show_attr_status(this,<?php echo $this->_var['goods']['goods_id']; ?>, <?php echo $this->_var['attr_id']; ?>);<?php if ($this->_var['spec_key'] == $this->_var['attr_id']): ?>get_gallery_attr(<?php echo $this->_var['id']; ?>, <?php echo $this->_var['value']['id']; ?>);<?php endif; ?>"   name="<?php echo $this->_var['value']['id']; ?>" id="xuan_a_<?php echo $this->_var['value']['id']; ?>"  title="[<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>]">
                                <?php echo $this->_var['value']['label']; ?>
                              </a>
                          <input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['value']['selected_key_ecshop68'] == '1'): ?>checked<?php endif; ?> />

                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                      <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                      
                      <?php else: ?>
                      <select name="spec_<?php echo $this->_var['spec_key']; ?>">
                        <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                        <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      </select>
                      <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                      <?php endif; ?>
                      <?php else: ?>
                      <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                        <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                        <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>]
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                      <?php endif; ?>
                   </div>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  
                  <script type="text/javascript">
    var myString=new Array();
    
    <?php $_from = $this->_var['prod_exist_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('pkey', 'prod');if (count($_from)):
    foreach ($_from AS $this->_var['pkey'] => $this->_var['prod']):
?>
    myString[<?php echo $this->_var['pkey']; ?>]="<?php echo $this->_var['prod']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
    </script>
                  
                  

	<div class="cp-gmsl"><span class="pull-left">数&nbsp;&nbsp;&nbsp;量：</span>
	<span id="demo">
    <div class="i_box">
                        <script language="javascript" type="text/javascript">  function goods_cut(){var num_val=document.getElementById('number');  var new_num=num_val.value;  var Num = parseInt(new_num);  if(Num>1)Num=Num-1;  num_val.value=Num;}  function goods_add(){var num_val=document.getElementById('number');  var new_num=num_val.value;  var Num = parseInt(new_num);  Num=Num+1;  num_val.value=Num;} </script>
    <a href="javascript:;" class="J_minus"  onclick="goods_cut();changePrice();">-</a>
    <input name="number" type="text" class="text"  id="number" value="1" onblur="changePrice();" />
     <a href="javascript:;"  onclick="goods_add();changePrice();" class="J_add">+</a>（库存<font id="shows_number"><?php echo $this->_var['goods']['goods_number']; ?> </font>）
     </div>
</span> 
	
	</div>
	<div class="xian"></div>
	<div class="buy">
		<a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="buy">立即购买</a>
		<a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" name="bi_addToCart" class="buy buy-cart">
		<img src="img/cp_cart.jpg" alt="" />加入购物车</a>
	</div>
	<p>
	100%正品保证&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	配送安装&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	包维修
	</p>
</div>  
 </form>
      
      <?php if ($this->_var['goods']['supplier_id']): ?>
        <?php echo $this->fetch('library/ghs_info.lbi'); ?>
        <?php else: ?>
        <?php echo $this->fetch('library/ziying_info.lbi'); ?>
        <?php endif; ?>

</div>


<div class="goods-cont">

<div class="goods-left">
	<div class="goods-left1">
	 <?php
    		 $parent_cat_id = get_parent_cat_id($GLOBALS['smarty']->_var['goods']['cat_id']);
    		 $GLOBALS['smarty']->assign('child_cat',get_child_cat($parent_cat_id));
      ?>
		<h4>相关分类</h4>
		<ul class="goods-left1-list">
		<?php $_from = $this->_var['child_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['child_cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['child_cat']['iteration']++;
?>
		 <li><a href="<?php echo $this->_var['cat']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['cat']['name']); ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></li>
		 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
	
	
	 <?php if ($this->_var['bought_goods']): ?>
		<div class="side2">
			<h5>购买了该商品的用户还购买了</h5>
			<ul>
			 <?php $_from = $this->_var['bought_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bought_goods_data');$this->_foreach['bought_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bought_goods']['total'] > 0):
    foreach ($_from AS $this->_var['bought_goods_data']):
        $this->_foreach['bought_goods']['iteration']++;
?>
				<li>
				<div class="main_img">
				<a href="<?php echo $this->_var['bought_goods_data']['url']; ?>"><img src=".$bought_goods_data.goods_name}" alt="" /></a>
				</div>
				<h6><a href="<?php echo $this->_var['bought_goods_data']['url']; ?>"><?php echo $this->_var['bought_goods_data']['goods_name']; ?></a></h6>
				<div class="cp-price"><font class="red">￥<b><?php if ($this->_var['bought_goods_data']['promote_price'] != 0): ?>
                <?php echo $this->_var['bought_goods_data']['formated_promote_price']; ?>
                <?php else: ?>
                <?php echo $this->_var['bought_goods_data']['shop_price']; ?>
                <?php endif; ?> </b></font>
				<span class="pull-right">已售<font class="red">件</font></span></div>
				</li>
	     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
	  <?php endif; ?>
</div>





<div class="goods-right">
<ul id="tabs">
  <li><a href="" title="tab1">商品介绍</a></li>
  <li><a href="" title="tab2">商品购买评价(<?php echo $this->_var['rank_num']['rank_total']; ?>)</a></li>
  <li><a href="" title="tab3">售后保障</a></li>
</ul>
<div id="content">
  <dl id="tab1">
   
   <div class="goods-canshu">
	<p class="csm">产品参数</p>
	 <ul class="detail-list">
      <li >商品名称：<?php echo $this->_var['goods']['goods_style_name']; ?></li>
      <li>商品编号：<?php echo $this->_var['goods']['goods_sn']; ?></li>
      <li>品牌：<a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>" ><?php echo $this->_var['goods']['goods_brand']; ?></a></li>
      <li>上架时间：<?php echo $this->_var['goods']['add_time']; ?></li>
      <li>商品毛重：<?php echo $this->_var['goods']['goods_weight']; ?></li>
      <li>库存：
        <?php if ($this->_var['goods']['goods_number'] == 0): ?>
        <?php echo $this->_var['lang']['stock_up']; ?>
       <?php else: ?>
        <?php echo $this->_var['goods']['goods_number']; ?> <?php echo $this->_var['goods']['measure_unit']; ?>
        <?php endif; ?>
      </li>
     </ul>
   </div>
   <div class="goods-xq">
   <p style="text-align:center;">
	<?php echo $this->_var['goods']['goods_desc']; ?>
	</p>
   </div>
   
   
  </dl>
  <dl id="tab2">



	<?php echo $this->fetch('library/my_comments.lbi'); ?>

  </dl>
  <dl id="tab3">
  <p style="text-align:center;">
    <?php echo $this->_var['goods']['goods_after_sales']; ?>
  </p>


  </dl>
  
</div>






<script>
$(document).ready(function() {
	$("#content dl").hide(); // Initially hide all content
	$("#tabs li:first").attr("id","current"); // Activate first tab
	$("#content dl:first").fadeIn(); // Show first tab content
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        $("#content dl").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('title')).fadeIn(); // Show content for current tab
    });
})();

</script>

</div>

</div>	




<div class="fuwu-box clearfix">
<img src="img/fuwu.jpg" alt="" />
</div> 




</div>




 
<script>
$.fn.iVaryVal=function(iSet,CallBack){
	/*
	 * Minus:点击元素--减小
	 * Add:点击元素--增加
	 * Input:表单元素
	 * Min:表单的最小值，非负整数
	 * Max:表单的最大值，正整数
	 */
	iSet=$.extend({Minus:$('.J_minus'),Add:$('.J_add'),Input:$('.J_input'),Min:0,Max:20},iSet);
	var C=null,O=null;
	//插件返回值
	var $CB={};
	//增加
	iSet.Add.each(function(i){
		$(this).click(function(){
			O=parseInt(iSet.Input.eq(i).val());
			(O+1<=iSet.Max) || (iSet.Max==null) ? iSet.Input.eq(i).val(O+1) : iSet.Input.eq(i).val(iSet.Max);
			//输出当前改变后的值
			$CB.val=iSet.Input.eq(i).val();
			$CB.index=i;
			//回调函数
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		});
	});
	//减少
	iSet.Minus.each(function(i){
		$(this).click(function(){
			O=parseInt(iSet.Input.eq(i).val());
			O-1<iSet.Min ? iSet.Input.eq(i).val(iSet.Min) : iSet.Input.eq(i).val(O-1);
			$CB.val=iSet.Input.eq(i).val();
			$CB.index=i;
			//回调函数
			if (typeof CallBack == 'function') {
				CallBack($CB.val,$CB.index);
		  	}
		});
	});
	//手动
	iSet.Input.bind({
		'click':function(){
			O=parseInt($(this).val());
			$(this).select();
		},
		'keyup':function(e){
			if($(this).val()!=''){
				C=parseInt($(this).val());
				//非负整数判断
				if(/^[1-9]\d*|0$/.test(C)){
					$(this).val(C);
					O=C;
				}else{
					$(this).val(O);
				}
			}
			//键盘控制：上右--加，下左--减
			if(e.keyCode==38 || e.keyCode==39){
				iSet.Add.eq(iSet.Input.index(this)).click();
			}
			if(e.keyCode==37 || e.keyCode==40){
				iSet.Minus.eq(iSet.Input.index(this)).click();
			}
			//输出当前改变后的值
			$CB.val=$(this).val();
			$CB.index=iSet.Input.index(this);
			//回调函数
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		},
		'blur':function(){
			$(this).trigger('keyup');
			if($(this).val()==''){
				$(this).val(O);
			}
			//判断输入值是否超出最大最小值
			if(iSet.Max){
				if(O>iSet.Max){
					$(this).val(iSet.Max);
				}
			}
			if(O<iSet.Min){
				$(this).val(iSet.Min);
			}
			//输出当前改变后的值
			$CB.val=$(this).val();
			$CB.index=iSet.Input.index(this);
			//回调函数
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		}
	});
}
//调用
$( function() {
	
	$('.i_box').iVaryVal({},function(value,index){
		$('.i_tips').html('');
	});
	
});
</script>





<div class="footer">
<div class="auto">
	<ul class="pull-left footer-nav">
		<li>
		<b>关于我们</b>
			<p><a href="#">关于我们</a></p>
			<p><a href="#">新闻中心</a></p>
			<p><a href="#">企业优势</a></p>
			<p><a href="#">联系我们</a></p>
		</li>
		
		<li>
		<b>新手指南</b>
			<p><a href="#">关于我们</a></p>
			<p><a href="#">新闻中心</a></p>
			<p><a href="#">企业优势</a></p>
			<p><a href="#">联系我们</a></p>
		</li>
		
		
		<li>
		<b>配送方式</b>
			<p><a href="#">关于我们</a></p>
			<p><a href="#">新闻中心</a></p>
			<p><a href="#">企业优势</a></p>
			<p><a href="#">联系我们</a></p>
		</li>
		
		
		<li>
		<b>售后服务</b>
			<p><a href="#">关于我们</a></p>
			<p><a href="#">新闻中心</a></p>
			<p><a href="#">企业优势</a></p>
			<p><a href="#">联系我们</a></p>
		</li>
	</ul>
	
	<div class="footer-tel pull-right">
	<p><img src="img/ico_tel.jpg" alt="" />全国热线</p>
	<h3>400-518-1111</h3>
	<p class="fw-time">周一至周日8:00-18:00</p>
	<p class="tel-btn">24小时在线服务</p>
	</div>
	<div class="bottom">
	<p class="gray">Copyright © 2013-2017 惠民建材网（www.huimin.com）——在线家装领导者 All Rights Reserved.</p>
	装房子 买建材 就上惠民建材网 蒙ICP备123456789<br/>
	鄂尔多斯市斯创有限公司<br/>
	</div>
</div>
</div>
</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  fixpng();
  ShowMyComments(<?php echo $this->_var['goods']['goods_id']; ?>,0,1);
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT')){
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
    }
    if(document.getElementById('shows_number')){
	document.getElementById('shows_number').innerHTML = res.attr_num;
	/* morestock_morecity start*/
	if(parseInt(res.attr_num)>0 && $('#youhuo').length>0){
		$('#youhuo').html('有货');
	}else{
		$('#youhuo').html('无货');
	}
	/* morestock_morecity end*/
    }
  }
}


</script>

</html>
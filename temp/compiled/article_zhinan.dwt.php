<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="UTF-8"/>
<title>选购指南</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="shortcut icon" href="favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/style.css"/>

<script type="text/javascript">
function openShutManager(oSourceObj,oTargetObj,shutAble,oOpenTip,oShutTip){
var sourceObj = typeof oSourceObj == "string" ? document.getElementById(oSourceObj) : oSourceObj;
var targetObj = typeof oTargetObj == "string" ? document.getElementById(oTargetObj) : oTargetObj;
var openTip = oOpenTip || "";
var shutTip = oShutTip || "";
if(targetObj.style.display!="none"){
   if(shutAble) return;
   targetObj.style.display="none";
   if(openTip  &&  shutTip){
    sourceObj.innerHTML = shutTip; 
   }
} else {
   targetObj.style.display="block";
   if(openTip  &&  shutTip){
    sourceObj.innerHTML = openTip; 
   }
}
}
</script>
</head>
<body>

<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="auto">
	<div class="position">
		<a href="index.php">首页</a> >><a href="#">选购指南</a>
	</div>

	
	
	<div class="zhinan-left">
		<ul>
		    <?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
			<li>
				<div class="zhinan-pic">
				<div class="main_img">
					<a href="<?php echo $this->_var['article']['url']; ?>"><img src="<?php echo $this->_var['article']['file_url']; ?>" alt="" /></a>
				</div>
				</div>
				<div class="zhinan-info">
				 <h4><a href="<?php echo $this->_var['article']['url']; ?>"><?php echo $this->_var['article']['short_title']; ?></a></h4>
				 <div class="zhinan-desc"><?php echo $this->_var['article']['description']; ?></div>
				</div>
			</li>
			 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

		</ul>
		
			
		<div class="fenye">
		  <?php echo $this->fetch('library/pages.lbi'); ?>
		</div>
	</div>
	
	
	
	<div class="zhinan-right">
		<div class="zhinan-right1">
		最新文章
		</div>
		<ul class="zhinan-list1">
		<?php $_from = $this->_var['new_artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
			<li><a href="<?php echo $this->_var['article']['url']; ?>"><?php echo $this->_var['article']['short_title']; ?></a></li>
			 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		
		<div class="zhinan-right2">
			<h4>热卖爆款</h4>
			<div class="side2">
			<ul>

			<?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
				<li>
				<div class="main_img">
				<a href="<?php echo $this->_var['goods']['url']; ?>"><img src=".<?php echo $this->_var['goods']['thumb']; ?>" alt="" /></a>
				</div>
				<h6><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['goods_style_name']; ?></a></h6>
				<div class="cp-price"><font class="red">￥<b><?php echo $this->_var['goods']['shop_price']; ?></b></font><font class="line-through pull-right">原价：￥<?php echo $this->_var['goods']['market_price']; ?></font></div>
				</li>
			 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


				
				
				
			</ul>
			</div>
		</div>
	</div>
		
<div class="fuwu-box clearfix">
<img src="img/fuwu.jpg" alt="" />
</div> 


</div>



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
</html>
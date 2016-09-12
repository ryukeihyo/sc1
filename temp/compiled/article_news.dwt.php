<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="UTF-8"/>
<title>资讯动态</title>
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
		<a href="index.php">首页</a> >><a href="#">资讯动态</a> >>
	</div>
	
	<div class="news-left">
		
		<div class="news-left1">
			<div class="news-lm">资讯分类</div>
			<ul>
               <?php $_from = $this->_var['article_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
				<li><a href="<?php echo $this->_var['article']['url']; ?>"><?php echo $this->_var['article']['name']; ?></a></li>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
		
		<div class="news-left2">
			<div class="news-lm">热点推荐</div>
			<ul>
                <?php $_from = $this->_var['article_hot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
				<li><a href="<?php echo $this->_var['article']['url']; ?>"><?php echo $this->_var['article']['title']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
		
		
		<div class="news-left3">
			<div class="news-lm">最新资讯</div>
			<ul>
			    <?php $_from = $this->_var['new_artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
				<li><a href="<?php echo $this->_var['article']['url']; ?>"><?php echo $this->_var['article']['title']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
	</div>
	
	<div class="news-right">
		<div class="news-lm">网址导航</div>
		<ul class="news-ul">
		    <?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
			<li>
			<h5><a href="<?php echo $this->_var['article']['url']; ?>"><?php echo $this->_var['article']['title']; ?></a></h5>
			<div class="news-ul-date">发布时间：<?php echo $this->_var['article']['add_time']; ?>&nbsp; &nbsp;&nbsp;&nbsp;浏览次数：1</div>
			<div class="news-ul-desc"><?php echo $this->_var['article']['content']; ?> <a href="<?php echo $this->_var['article']['url']; ?>">[查看全文]</a></div>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

		</ul>
		
			
		<div class="fenye">
		 <?php echo $this->fetch('library/pages.lbi'); ?>
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
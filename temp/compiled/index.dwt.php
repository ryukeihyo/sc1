<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<title><?php echo $this->_var['page_title']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<link rel="shortcut icon" href="favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/style.css"/>

<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery.js"></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/superslide.2.1.js"></script>


<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<script>
function guanzhu(sid){
	Ajax.call('supplier.php', 'go=other&act=add_guanzhu&suppId=' + sid, selcartResponse, 'GET', 'JSON');
}

function selcartResponse(result){
	alert(result.info);
}
</script>
</head>
<body>

<?php echo $this->fetch('library/user_header.lbi'); ?>


<div class="neck">
<div class="auto">
 <div class="logo pull-left"><a href="index.php"><img src="img/logo.jpg" alt="" /></a></div>
 <div class="top-ad pull-right"><img src="img/top_ad.jpg" alt="" /></div>
</div>
</div>


<div class="menu clearfix">
<div class="auto">
 <div class="menu-1">
 <a href="#">全部分类<img src="img/ico2.jpg" alt="" /></a>
 </div>
 <div class="menu-2">
	<a href="index.php" class="on">首页</a>
	  <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
        <a href="<?php echo $this->_var['nav']['url']; ?>"  ><?php echo $this->_var['nav']['name']; ?></a>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </div>
 <span class="pull-right menu-3">400 123456</span>
</div>
</div>






<div class="slide-pf">

<div class="auto">

<div class="cp-fenlei">
 <?php $_from = get_categories_tree(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['cat0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat0']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['cat0']['iteration']++;
?>
	 <div class="cp-fenlei1">
	  <h3><a href="<?php echo $this->_var['cat']['url']; ?>"><i class="s<?php echo $this->_foreach['cat0']['iteration']; ?>"></i><?php echo $this->_var['cat']['name']; ?></a></h3>
	  <ul>
	  <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['namechild'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['namechild']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['namechild']['iteration']++;
?>
		<li>
		    <a href="<?php echo $this->_var['child']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['child']['name']); ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
		</li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	  </ul>
	 </div>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	 
	</div>

	

<div class="pf-kuaibao">
	<div class="kb-box">
		<h3>惠民快报</h3>
		<ul class="kb-list">
         <?php $_from = $this->_var['new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'articles');$this->_foreach['namearticles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['namearticles']['total'] > 0):
    foreach ($_from AS $this->_var['articles']):
        $this->_foreach['namearticles']['iteration']++;
?>
		   <li><a href="article.php?id=<?php echo $this->_var['articles']['id']; ?>"><span>●</span><?php echo htmlspecialchars($this->_var['articles']['title']); ?></a></li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
	</div>
	
</div>
</div>

</div>



  
<div class="fullSlide">
  <div class="bd">
    <ul>
        <?php $_from = $this->_var['flash']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash_0_81585300_1472202706');$this->_foreach['myflash'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myflash']['total'] > 0):
    foreach ($_from AS $this->_var['flash_0_81585300_1472202706']):
        $this->_foreach['myflash']['iteration']++;
?>
      <li _src="url(<?php echo $this->_var['flash_0_81585300_1472202706']['src']; ?>)" style="background:center 0 no-repeat;" onClick="location='<?php echo $this->_var['flash_0_81585300_1472202706']['url']; ?>'">
       </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
  </div>
  <div class="hd">
    <ul>
     <?php $_from = $this->_var['flash']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash_0_81585300_1472202706');$this->_foreach['myflash'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myflash']['total'] > 0):
    foreach ($_from AS $this->_var['flash_0_81585300_1472202706']):
        $this->_foreach['myflash']['iteration']++;
?>
       <li></li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
  </div>
 </div>
<script type="text/javascript">
jQuery(".fullSlide").hover(function() {
    jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
},
function() {
    jQuery(this).find(".prev,.next").fadeOut()
});
jQuery(".fullSlide").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    effect: "fold",
    autoPlay: true,
    autoPage: true,
    trigger: "click",
    startFun: function(i) {
        var curLi = jQuery(".fullSlide .bd li").eq(i);
        if ( !! curLi.attr("_src")) {
            curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
        }
    }
});
</script>


<div class="main-box">

<div class="auto">

<div class="common-box">
 <h3>热卖推荐</h3>
</div>
<ul class="hot-list">
  <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['index_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['index_goods']['iteration']++;
?>
     <?php if ($this->_foreach['index_goods']['iteration'] < 6): ?>
	   <li>
	     <div class="main_img">
	       <a href="<?php echo $this->_var['goods']['url']; ?>"><img src=".<?php echo $this->_var['goods']['thumb']; ?>" alt="" /></a>
	     </div>
	     <h5><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['short_name']; ?></a></h5>
	   </li>
	 <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</ul>



<div class="common-box">
 <h3>热卖品牌</h3>
</div>
<ul class="brand-list">
     <?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand_0_81585300_1472202706');$this->_foreach['name_brand'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name_brand']['total'] > 0):
    foreach ($_from AS $this->_var['brand_0_81585300_1472202706']):
        $this->_foreach['name_brand']['iteration']++;
?>
         <?php if ($this->_foreach['name_brand']['iteration'] < 13): ?>
	       <li>
	          <a href="<?php echo $this->_var['brand_0_81585300_1472202706']['url']; ?>">
	          <img src="data/brandlogo/<?php echo $this->_var['brand_0_81585300_1472202706']['brand_logo']; ?>" alt="<?php echo $this->_var['brand_0_81585300_1472202706']['brand_name']; ?>"   width="183" height="62"/>
	          </a>
	       </li>
	     <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>

 


<?php $this->assign('cat_goods',$this->_var['cat_goods_521']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_521']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>


 
<?php $this->assign('cat_goods',$this->_var['cat_goods_522']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_522']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 

 
<?php $this->assign('cat_goods',$this->_var['cat_goods_523']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_523']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 

 

 
 

    



 
 

<div class="floor-common floor-5">
 <b>5F 建材选购技巧</b>
 <div class="pull-right">
	<a href="article_cat.php?id=25" class="more pull-right">更多选购技巧</a>
 </div>
</div> 

<div class="fl5-list">

<script language="javascript" type="text/javascript">
function doClick_jy(o){
o.className="current";
var j;
var id;
var e;
for(var i=1;i<=8;i++){
id ="jy"+i;
j = document.getElementById(id);
e = document.getElementById("jy_con"+i);
if(id != o.id){
 j.className="";
 e.style.display = "none";
}else{
e.style.display = "block";
}
}
}

</script>

<div class="fl5-left">
<div class="box infopublish">
<div class="box_1 clearfix">

<ul class="v-tab">
<li><a href="##" class="current" id="jy1" onclick="javascript:doClick_jy(this)"><i class="jq1"></i>厨房卫浴</a></li>
<li><a href="##" id="jy2" onclick="javascript:doClick_jy(this)"><i class="jq2"></i>家装五金</a></li>
<li><a href="##" id="jy3" onclick="javascript:doClick_jy(this)"><i class="jq3"></i>墙面地板</a></li>
<li><a href="##" id="jy4" onclick="javascript:doClick_jy(this)"><i class="jq4"></i>定制家具</a></li>
</ul>

<ul class="left_box" style="display:block;" id="jy_con1">

<?php $_from = $this->_var['chufang_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'chufang');$this->_foreach['chufang'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['chufang']['total'] > 0):
    foreach ($_from AS $this->_var['chufang']):
        $this->_foreach['chufang']['iteration']++;
?>
 <li>
 <div class="main_img">
 <a href="<?php echo $this->_var['chufang']['url']; ?>" class="pull-left"><img src="<?php echo $this->_var['chufang']['file_url']; ?>" alt="" width="127" height="125"/></a></div>
 <div class="jq-info">
 <h5><a href="#"><?php echo $this->_var['chufang']['title']; ?></a></h5>
 <div class="jq-desc"><?php echo $this->_var['chufang']['content']; ?></div>
 <p><a href="<?php echo $this->_var['chufang']['url']; ?>" class="lanmu"><?php echo $this->_var['chufang']['keywords']; ?></a></p>
 </div>
 </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>


<ul class="left_box disable"  id="jy_con2">
 <?php $_from = $this->_var['wujin_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'wujin');$this->_foreach['wujin'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wujin']['total'] > 0):
    foreach ($_from AS $this->_var['wujin']):
        $this->_foreach['wujin']['iteration']++;
?>
  <li>
  <div class="main_img">
  <a href="<?php echo $this->_var['wujin']['url']; ?>" class="pull-left"><img src="<?php echo $this->_var['wujin']['file_url']; ?>" alt="" width="127" height="125"/></a></div>
  <div class="jq-info">
  <h5><a href="#"><?php echo $this->_var['wujin']['title']; ?></a></h5>
  <div class="jq-desc"><?php echo $this->_var['chufang']['content']; ?></div>
  <p><a href="<?php echo $this->_var['wujin']['url']; ?>" class="lanmu"><?php echo $this->_var['wujin']['keywords']; ?></a></p>
  </div>
  </li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>


<ul class="left_box disable"  id="jy_con3">
 <?php $_from = $this->_var['diban_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'diban');$this->_foreach['diban'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['diban']['total'] > 0):
    foreach ($_from AS $this->_var['diban']):
        $this->_foreach['diban']['iteration']++;
?>
  <li>
  <div class="main_img">
  <a href="<?php echo $this->_var['diban']['url']; ?>" class="pull-left"><img src="<?php echo $this->_var['diban']['file_url']; ?>" alt="" width="127" height="125"/></a></div>
  <div class="jq-info">
  <h5><a href="#"><?php echo $this->_var['diban']['title']; ?></a></h5>
  <div class="jq-desc"><?php echo $this->_var['diban']['content']; ?></div>
  <p><a href="<?php echo $this->_var['diban']['url']; ?>" class="lanmu"><?php echo $this->_var['diban']['keywords']; ?></a></p>
  </div>
  </li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>


<ul class="left_box disable" id="jy_con4">
 <?php $_from = $this->_var['jiaju_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'jiaju');$this->_foreach['jiaju'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['jiaju']['total'] > 0):
    foreach ($_from AS $this->_var['jiaju']):
        $this->_foreach['jiaju']['iteration']++;
?>
  <li>
  <div class="main_img">
  <a href="<?php echo $this->_var['jiaju']['url']; ?>" class="pull-left"><img src="<?php echo $this->_var['jiaju']['file_url']; ?>" alt="" width="127" height="125"/></a></div>
  <div class="jq-info">
  <h5><a href="#"><?php echo $this->_var['jiaju']['title']; ?></a></h5>
  <div class="jq-desc"><?php echo $this->_var['jiaju']['content']; ?></div>
  <p><a href="<?php echo $this->_var['jiaju']['url']; ?>" class="lanmu"><?php echo $this->_var['jiaju']['keywords']; ?></a></p>
  </div>
  </li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>


</div>
</div> 
</div>



<div class="fl5-right">
<div class="fl5-tab1">
<div class="slideTxtBox">
<div class="hd">
	<ul>
	<li><i></i>建材品牌</li><li><i></i>建材评测</li>
	</ul>
</div>
	<div class="bd">
	<ul>
         <?php $_from = $this->_var['jiancai_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'articles');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['articles']):
        $this->_foreach['foo']['iteration']++;
?>
            <?php if ($this->_foreach['foo']['iteration'] == 1): ?>
            <div class="tui">
            <a href="<?php echo $this->_var['articles']['url']; ?>" class="pull-left"><img src="<?php echo $this->_var['articles']['file_url']; ?>" width="80" height="80" alt="" /></a>
            <div class="tui-desc">
            <h5><a href="<?php echo $this->_var['articles']['url']; ?>"><?php echo $this->_var['articles']['title']; ?></a></h5>
            <div class="tui-info"><?php echo $this->_var['articles']['description']; ?></div>
            </div>
            </div>
            <?php else: ?>
        	<li><a href="article.php?id=<?php echo $this->_var['articles']['id']; ?>"><?php echo htmlspecialchars($this->_var['articles']['title']); ?></a></li>
        	<?php endif; ?>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
	<ul>

		<?php $_from = $this->_var['pingce_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'articles');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['articles']):
        $this->_foreach['foo']['iteration']++;
?>
         <?php if ($this->_foreach['foo']['iteration'] == 1): ?>
          <div class="tui">
          <a href="<?php echo $this->_var['articles']['url']; ?>" class="pull-left"><img src="<?php echo $this->_var['articles']['file_url']; ?>" width="80" height="80" alt="" /></a>
          <div class="tui-desc">
          <h5><a href="<?php echo $this->_var['articles']['url']; ?>"><?php echo $this->_var['articles']['title']; ?></a></h5>
          <div class="tui-info"><?php echo $this->_var['articles']['description']; ?></div>
          </div>
          </div>
          <?php else: ?>
          <li><a href="article.php?id=<?php echo $this->_var['articles']['id']; ?>"><?php echo htmlspecialchars($this->_var['articles']['title']); ?></a></li>
          <?php endif; ?>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
	</div>
		</div>
		<script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
</div>


<div class="fl5-daquan">
<h4><i></i>建材知识大全</h4>
</div>
<ul class="fl5-dqlist">
<?php $_from = $this->_var['daquan_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'articles');$this->_foreach['namearticles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['namearticles']['total'] > 0):
    foreach ($_from AS $this->_var['articles']):
        $this->_foreach['namearticles']['iteration']++;
?>
     <a href="article.php?id=<?php echo $this->_var['articles']['id']; ?>"><?php echo htmlspecialchars($this->_var['articles']['title']); ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</ul>
</div>
</div>
 
 
 

<div class="dianpu-box">
 <div class="dianpu-1">
	<b>推荐店铺</b>
 </div>
 <ul class="dianpu-2">
<?php $_from = $this->_var['tuijian']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['type']):
        $this->_foreach['name']['iteration']++;
?>
	<?php if ($this->_var['type']['shoplist']): ?>
    <?php $_from = $this->_var['type']['shoplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'shop');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['shop']):
?>	<li>
	<div class="main_img">
	<a href="supplier.php?suppId=<?php echo $this->_var['shop']['supplier_id']; ?>">
	<img height="90px" alt="<?php echo $this->_var['shop']['supplier_name']; ?>" data-original=".<?php echo $this->_var['shop']['logo']; ?>" src=".<?php echo $this->_var['shop']['logo']; ?>" class="dpimg" alt="" />
	</a></div>
	<div class="dianpu-btn1">	
		<a href="#" class="on"><img src="img/ico3.jpg" alt="" />在线客服</a>
		<a onclick='guanzhu(<?php echo $this->_var['shop']['supplier_id']; ?>);' >收藏店铺</a>
	</div>
	<div class="dianpu-txt1">
	<p>公司名称：<a href="supplier.php?suppId=<?php echo $this->_var['shop']['supplier_id']; ?>"><?php echo $this->_var['shop']['supplier_name']; ?></a></p>
	<p>正规备案：<img src="img/ico4.jpg" alt="" /></p>
	<p>所在地：<?php echo $this->_var['shop']['region']; ?></p>
	</div>
	<div class="dianpu-btn2"><a href="supplier.php?suppId=<?php echo $this->_var['shop']['supplier_id']; ?>">进入店铺</a></div>
	</li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

 </ul>
</div>
 
<div class="fuwu-box clearfix">
<img src="img/fuwu.jpg" alt="" />
</div> 
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
<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="UTF-8"/>
<title>产品列表</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="shortcut icon" href="favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/style.css"/>
<link rel="stylesheet" type="text/css" href="themes/68ecshopcom_360buy/css/category.css" />


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
<?php
if($_REQUEST['id'])
{
	$id = $_REQUEST['id'];
}
else
{
	$id = $_REQUEST['category'];
}
function get_categories($cat_id = 0)
{
    if ($cat_id > 0)
    {
			  $parent_id = $cat_id;
    }
    else
    {
        $parent_id = 0;
    }

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$cat_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, a.sort_order AS parent_order, a.cat_id, a.is_show,' .
                    'b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order AS child_order ' .
                'FROM ' . $GLOBALS['ecs']->table('category') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ecs']->table('category') . ' AS b ON b.parent_id = a.cat_id AND b.is_show = 1 ' .
                "WHERE a.parent_id = '$parent_id' ORDER BY parent_order ASC, a.cat_id ASC, child_order ASC";
    }
    else
    {
        /* 获取当前分类及其父分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order, b.is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ecs']->table('category') . ' AS b ON b.parent_id = a.cat_id AND b.is_show = 1 ' .
                "WHERE b.parent_id = '$parent_id' ORDER BY sort_order ASC";
    }
    $res = $GLOBALS['db']->getAll($sql);

    $cat_arr = array();
    foreach ($res AS $row)
    {
        if ($row['is_show'])
        {
            $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
            $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
            $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

            if ($row['child_id'] != NULL)
            {
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['id']   = $row['child_id'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['name'] = $row['child_name'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['url']  = build_uri('category', array('cid' => $row['child_id']), $row['child_name']);
            }
        }
    }

    return $cat_arr;
}
function get_cat_name_add($id)
{
    $sql = 'SELECT cat_name ' . 'FROM ' . $GLOBALS['ecs']->table('category')  . "WHERE cat_id =$id " ;
		$cat_name = $GLOBALS['db']->getOne($sql);
		return $cat_name;
}
function get_parent($value,$id='')
{

    if($value!=0)
    {
			$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$value'";
			$res = $GLOBALS['db']->getOne($sql);
			return get_parent($res,$value);
    }
		else
		{
			return $id;
		}
}
include_once("includes/lib_goods.php");
$this->assign('categories1'     ,    get_categories(get_parent($id)));
$this->assign('cat_name'     ,       get_cat_name_add(get_parent($id)))
?>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery_006.js"></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/search_goods.js"></script>
<script type="text/javascript" src="themes/68ecshopcom_360buy/js/jquery-lazyload.js" ></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>




<div class="product-box">
	<div class="auto">
	
	<div class="sidebar">
		
<?php echo $this->fetch('library/category_tree2.lbi'); ?>

		
		 <?php if ($this->_var['hot_goods']): ?>
		   <div class="side2">
			<h4>人气推荐</h4>
			<ul>
                <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['hot_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['hot_goods']['iteration']++;
?>
				<li>
				<div class="main_img">
				<a href="<?php echo $this->_var['goods']['url']; ?>"><img src=".<?php echo $this->_var['goods']['thumb']; ?>" alt="" /></a>
				</div>
				<h6><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['name']; ?></a></h6>
				<div class="cp-price"><font class="red">特约价：￥<b><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></b>
				</font><font class="line-through">￥<?php echo $this->_var['goods']['market_price']; ?></font></div>
				</li>
				 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

			</ul>
		  </div>
		 <?php endif; ?>
	 </div>
	
	
	<div class="right-box">
		
		<div class="position"><a href="index.php">家装建材网</a>><a href="#" class="on"><?php echo $this->_var['cat_name_curr']; ?></a></div>
		
		<div class="cp-jiage">
			<table width="100%">
				<tr>
					<td width="115" align="center" class="jg-bg1"><b>价格</b></td>
					<td>
					<div class="jg-list">
					 <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');$this->_foreach['price_grade_ecshop120'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['price_grade_ecshop120']['total'] > 0):
    foreach ($_from AS $this->_var['grade']):
        $this->_foreach['price_grade_ecshop120']['iteration']++;
?>
                    	     <?php if (($this->_foreach['price_grade_ecshop120']['iteration'] - 1) > 0): ?>
                    	     <a href="<?php echo $this->_var['grade']['url']; ?>"><?php echo $this->_var['grade']['price_range']; ?></a>
                    	     <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
					</td>
				</tr>
				
				<tr>
					<td width="115" align="center" class="jg-bg1"><b>品牌</b></td>
					<td>
					<div class="jg-list">
					   <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brands_ecshop120'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brands_ecshop120']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brands_ecshop120']['iteration']++;
?>
                    	     <?php if (($this->_foreach['brands_ecshop120']['iteration'] - 1) > 0): ?>
                    	     <input type="checkbox" style="display:none;" name="checkbox_brand[]" id="chk_brand_<?php echo $this->_foreach['brands_ecshop120']['iteration']; ?>" value="<?php echo $this->_var['brand']['brand_id_ecshop120']; ?>">
                    	     <a href="<?php echo $this->_var['brand']['url']; ?>" onclick="return duoxuan_Onclick('brand','<?php echo $this->_foreach['brands_ecshop120']['iteration']; ?>', this);">
                    	     <?php echo $this->_var['brand']['brand_name']; ?>
                    	     </a>
                    	     <?php endif; ?>
                       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                     </div>
					</td>
				</tr>
			</table>
		</div>
		
		<div class="cp-paixu clearfix">

		排序：  <?php echo $this->fetch('library/goods_list.lbi'); ?>
		<br/><?php 
$k = array (
  'name' => 'select_region',
  'from' => 'list',
  'title' => '配&nbsp;送&nbsp;至：',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        <?php echo $this->smarty_insert_scripts(array('files'=>'select_region.js?0705')); ?>
		</div>
		
		
		<div class="list-product">
	   <?php if ($this->_var['category'] > 0): ?>
          <form name="compareForm" action="compare.php" method="post" onSubmit="return compareGoods(this);">
       <?php endif; ?>
		<ul>
         <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>
			<li>
			<div class="main_img">
			<a href="<?php echo $this->_var['goods']['url']; ?>"><img  data-original="<?php echo $this->_var['goods']['goods_thumb']; ?>" src=".<?php echo $this->_var['goods']['goods_thumb']; ?>" title=".<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a>
			</div>
			<h5><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo htmlspecialchars($this->_var['goods']['name']); ?></a></h5>
			<p class="cp-jg">特惠价￥
			<b><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></b>
			</p>
			<p>原价：￥<span class="line-through"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['shop_price']; ?><?php else: ?><?php echo $this->_var['goods']['market_price']; ?><?php endif; ?></span></p>
			<p>已成交：<font class="red"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" class="status"><?php echo $this->_var['goods']['count']; ?></a></font></p>
			<div class="cp-btn">
			<img src="img/cp_btn1.jpg" alt="" /><a class="chat chat_offline" href="javascript:;"><?php echo $this->_var['goods']['click_count']; ?></a> &nbsp;
			<img src="img/cp_btn2.jpg" alt="" />9 &nbsp;
			<img src="img/cp_btn3.jpg" alt="" /><a href="<?php echo $this->_var['goods']['url']; ?>#product-detail" target="_blank"><?php echo $this->_var['goods']['comment_count']; ?></a>
			 </div>
			<p><?php 
$k = array (
  'name' => 'is_youhuo',
  'goodid' => $this->_var['goods']['goods_id'],
  'attr' => '',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
			</li>
		    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		
		

		<div class="fenye">

		 <?php echo $this->fetch('library/pages.lbi'); ?>
		</div>
		
		

		<div class="tui-list">
		 <h4>特别推荐</h4>
		 <ul>
        <?php if ($this->_var['best_goods']): ?>
              <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['best_goods']['iteration']++;
?>
			 <li>
			 <div class="main_img">
			 <a href="<?php echo $this->_var['goods']['url']; ?>"><img src=".<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a> </div>
			 <div class="tui-title"><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['name']; ?></a></div>
			 <h6 class="red">特惠价：￥<?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></h6>
			 </li>
			 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>

		 </ul>
		</div>
		
		</div>
		
		
		<div class="cplist-search">
		 <b>重新搜索</b> 
<form action="">
 <input type="text"  onfocus="if(this.value=='请输入关键词...'){this.value='';}"  onblur="if(this.value==''){this.value='请输入关键词...';}"  value="请输入关键词..."/>
 <button>搜索</button>
 </form>
		</div>
		
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
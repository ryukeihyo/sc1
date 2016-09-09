<?php

/**
 * 商品仓库相关执行方法
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

/**
*根据收货人地址和选择的配送方式来获取对应的商家所设置的对应配送方式运费
*@param array $address  城市数组
*@param int $feeid     ecs_store_shipping_fee表主键
*@param int    $stocktype 仓库类型(租:0;自创:店铺id)
*/
function get_address_shipping_fee($address,$feeid,$stocktype){
	global $db,$ecs;
	$result = false;
	while(!$result && count($address)>1){
		$where = '';
		foreach($address as $k=>$v){
				$where.=" and ssr.".$k."=".$v;
		}
		$sql = "select ssf.* from ".$ecs->table('store_shipping_region')." as ssr, ".$ecs->table('store_shipping_fee')." as ssf where ssr.supplier_id=".$stocktype." and ssf.fee_id=".$feeid.$where." and ssr.rec_id = ssf.shipping_region_id limit 1";
		$result = $db->getRow($sql);
		if(!$result){
			get_address_string(array_pop($address),$feeid,$stocktype);
		}
	}
	return $result;
}

/**
*获取地址的条件字符串
*@param array $address  城市数组
*@param int    $parentid 大仓库(虚拟仓库)id
*/
function get_address_string($address,$parentid){
	global $db,$ecs;
	$result = false;
	while(!$result && count($address)>1){
		$where = '';
		foreach($address as $k=>$v){
				$where.=" and ".$k."=".$v;
		}
		$sql = "select count(rec_id) from ".$ecs->table('store_shipping_region')." where store_id=".$parentid.$where;
		$result = $db->getOne($sql);
		if($result>0){
			$result = true;
		}else{
			get_address_string(array_pop($address),$parentid);
		}
	}
	return $result;
}

/**
 * 根据仓库id获取仓库对应的地址
 * @param int $stockid 仓库id
 * 此方法可以加缓存处理
 */
function get_stock_info($stockid){
	global $db,$ecs;
	$sql = "select parent_id from ".$ecs->table('store_main')." where store_id=".$stockid;
	$parentid = $db->getOne($sql);//获取主虚拟仓库id
	if($parentid>0){
		//$where = '';
		$address = cookie_to_str();
		return get_address_string($address,$parentid);
		/*
		foreach($address as $k=>$v){
			$where.=" and ".$k."=".$v;
		}
		$sql = "select count(rec_id) from ".$ecs->table('store_shipping_region')." where store_id=".$parentid.$where;
		$result = $db->getOne($sql);
		if($result>0){
			return $result;
		}*/
	}
	return false;
}

/**
* 根据城市来获取商品有哪些
*/
function get_goods_by_address(){
	global $db,$ecs;
	$address = cookie_to_str();
	$stockArray = get_address_by_store($address);
	if(is_array($stockArray)){
		$sql = "select DISTINCT(s.goods_id) from ". $ecs->table('store_goods_stock')." AS s left join ".$ecs->table('store_main') .
				"AS m on s.store_id=m.store_id where m.parent_id in (".implode(',',$stockArray).") and s.store_number>0 ";
		$goods_list_s = $db->getColCached($sql);
		if($goods_list_s){
			return db_create_in($goods_list_s, 'g.goods_id');
		}
	}
	return false;
}
function get_address_by_store($address){
	global $db,$ecs;
	while(count($address)>1){
		$where = '';
		foreach($address as $k=>$v){
				$where.=" and ".$k."=".$v;
		}
		$sql = "select store_id from ".$ecs->table('store_shipping_region')." where 1".$where;
		$result = $db->getColCached($sql);
		if(count($result)>0){
			return $result;
		}else{
			get_address_by_store(array_pop($address));
		}
	}
	return false;
}

/**
 * 将cookie中的地址转换
 */
function cookie_to_str(){
	$address = array();
	foreach($_REQUEST['datainfo'] as $k=>$v){
		if(isset($_COOKIE['region_'.$k])){
			$address[$v] = $_COOKIE['region_'.$k];
		}else{
			$address[$v] = 0;
		}
	}
	return $address;
}

/**
* 获取当前商品对应的仓库信息
*/
function get_goods_send_stock($goods_id,$attr=''){
	$attr = trim($attr);
	$attr = str_replace(',','|',$attr);
	$sql = "select sm.* from ".$GLOBALS['ecs']->table('store_goods_stock')." as sgs , ".$GLOBALS['ecs']->table('store_shipping_region')." as ssr, 
			".$GLOBALS['ecs']->table('store_main')." as sm
			where sgs.goods_id=".$goods_id." and sgs.goods_attr='".$attr."' and sm.store_id = sgs.store_id 
			and ssr.province=".$_COOKIE["region_1"]." and ssr.city=".$_COOKIE["region_2"]." and ssr.district=".$_COOKIE["region_3"]." and ssr.xiangcun=".$_COOKIE["region_4"]." and ssr.store_id=sm.parent_id";
	$row = $GLOBALS['db']->getRow($sql);
	return $row;
}

?>
<?php

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}
/**
* 以下配置是多城市多仓库配置信息，请务轻易修改，后果自负!
**/

$province	= 10;//初始省id  必填
$city		= 145;//初始市id  必填
$district		= 1114;//初始县id  可选
$xiangcun		= 3400;//初始区，街道id 可选

/*以上四个值，可选的值可标记为空或者零，但不可在前面注释*/



/*以下代码不可去掉，如果去掉，后果自负*/
$_REQUEST['province']	= (isset($_COOKIE['region_1'])) ? intval($_COOKIE['region_1']) : $province;
$_REQUEST['city'] 		= (isset($_COOKIE['region_2'])) ? intval($_COOKIE['region_2']) : $city;
$_REQUEST['district'] 	= (isset($_COOKIE['region_3'])) ? intval($_COOKIE['region_3']) : $district;
$_REQUEST['xiangcun'] 	= (isset($_COOKIE['region_4'])) ? intval($_COOKIE['region_4']) : $xiangcun;

if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0  && !isset($_COOKIE['islogin'])){

	if(!empty($addr_info['province']) && !empty($addr_info['city'])){
		$_REQUEST['province']	= intval($addr_info['province']);
		$_REQUEST['city']		= intval($addr_info['city']);
		$_REQUEST['district'] 	= intval($addr_info['district']);
		$_REQUEST['xiangcun'] 	= (isset($addr_info['xiangcun'])) ? intval($addr_info['xiangcun']) : 0;
		setcookie('islogin','1');
	}
}

$_REQUEST['datainfo'] = array(1=>'province',2=>'city',3=>'district',4=>'xiangcun');//ecs_store_shipping_region表中地区的字段名子

foreach($_REQUEST['datainfo'] as $k=>$v){
	setcookie('region_'.$k,$_REQUEST[$v]);
}
?>
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
$mlecms->caching = false; 
USER_LOGIN or msgbox('',$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); 
define('SEND_EMAIL',1); 
$order = shopping::get_order($_GET['id'],USER_ID);
isset($order['id']) or msgbox($language['page']['nodata'],'order.php');
$order['pid'] = explode(',',$order['pid']); 
$order['number'] = explode(',',$order['number']); 
$order['price'] = explode(',',$order['price']); 
$order['attribute'] = explode(STRING_DELIMITED,$order['attribute']); 
$order['addtime'] = date(MLE_DATE_FORMAT_LONG,$order['addtime']);
$order['reply'] = nl2br($order['reply']);
$mle['allows_modify'] = ($order['status'] == 0 && $_GET['action'] != 'view') ? true : false; 
if(isset($_POST['payment']) && true === $mle['allows_modify']){
	$shipping_address = array(
		'consignee' => $_POST['consignee'],
		'email' => $_POST['email'],
		'address' => $_POST['address'],
		'zipcode' => $_POST['zipcode'],
		'tel' => $_POST['tel'],
		'mobile' => $_POST['mobile'],
		'besttime' => $_POST['besttime'],
		'building' => $_POST['building'],
	);
	array2php($shipping_address,'shipping_address',MLEINC.'/tmp/other/shipping_address_'.$mle_user_info['id'].'.php');
	$freight = $insure = $amount = 0; 
	$sp = array(); 
	foreach($order['pid'] as $e => $pid){
		$amount += numeric($order['price'][$e]) * numeric($order['number'][$e]);
	}
	$amount = $amount * $mle_user_info['rank_discount'] / 10; 
	$in_kind = shopping::in_kind(implode(',',$order['pid'])); 
	if($in_kind){ 
		empty($_POST['consignee']) && msgbox($language['page']['msg'][0]);
		is_email($_POST['email']) or msgbox($language['page']['msg'][1]);
		empty($_POST['address']) && msgbox($language['page']['msg'][2]);
		empty($_POST['zipcode']) && msgbox($language['page']['msg'][3]);
		empty($_POST['tel']) && empty($_POST['mobile']) && msgbox($language['page']['msg'][4]);
		is_numeric($_POST['dispatching']) or msgbox($language['page']['msg'][5]);
		$sp = shopping::get_shipping(1,numeric($_POST['dispatching']));
		if(isset($sp['id'])){
			$freight = ($sp['topay'] == 1 && $_POST['customer'] == 1) ? 0 : $sp['freight'];
			$insure = ($sp['insure'] > 0 && $_POST['vouch'] == 1) ? ($sp['insure'] * $amount) : 0;
		} else { 
			msgbox($language['page']['msg'][6]);
		}
	}
	$amount = number_format(($amount + $freight + $insure),2,'.',''); 
	$sql = "UPDATE `{$DB['prefix']}order` SET `amount` = '{$amount}',`dispatching` = '".numeric($sp['id'])."',`freight` = '".(number_format(($freight + $insure),2,'.',''))."',
	`customer` = '".(($sp['topay'] == 1 && $_POST['customer'] == 1) ? 1 : 0)."',`vouch` = '".(($sp['insure'] > 0 && $_POST['vouch'] == 1) ? 1 : 0)."',`consignee` = '{$_POST['consignee']}',
	`email` = '{$_POST['email']}',`address` = '{$_POST['address']}',`zipcode` = '{$_POST['zipcode']}',`tel` = '{$_POST['tel']}',`mobile` = '{$_POST['mobile']}',`building` = '{$_POST['building']}',
	`besttime` = '{$_POST['besttime']}',`message` = '{$_POST['message']}' WHERE `id` = '{$order['id']}'";
	if($db->execute($sql)){
		member::transaction($order['oid'],USER_ID,4,$amount,1,$language['page']['log_info'][0]); 
		if(SEND_EMAIL){
			$content = str_replace(array('{#web}','{#name}','{#web_url}','{#id}','{#time}','{#oid}','{#amount}'),array(WEB_TITLE,$mle_user_info['username'],$config['url'],$order['id'],date(MLE_DATE_FORMAT_LONG,$gmt_time),$order['oid'],$amount),$language['page']['email'][1]);
			misc::email($mle_user_info['email'],$mle_user_info['username'],$language['page']['email'][0],$content);
		}
		$_POST['payment'] == 1 ? msgbox('','order.php?action=pay&id='.$order['id']) : msgbox($language['page']['msg'][7],'CURRENTS');
	} else {
		member::transaction($oid,USER_ID,4,$amount,0,$language['page']['log_info'][1]); 
		msgbox($language['page']['msg'][8]);
	}
}
$shipping_address = array();
$f = MLEINC.'/tmp/other/shipping_address_'.$mle_user_info['id'].'.php';
is_file($f) && require_once($f);
if(empty($order['consignee'])){
	$order['consignee'] = $shipping_address['consignee'];
	$order['email'] = $shipping_address['email'];
	$order['address'] = $shipping_address['address'];
	$order['zipcode'] = $shipping_address['zipcode'];
	$order['tel'] = $shipping_address['tel'];
	$order['mobile'] = $shipping_address['mobile'];
	$order['besttime'] = $shipping_address['besttime'];
	$order['building'] = $shipping_address['building'];
}
$shipping = $order['dispatching'] > 0 ? shopping::get_shipping(0,$order['dispatching']) : array();
$shipping['freight'] = numeric($shipping['freight']);
$shipping['insure'] = numeric($shipping['insure']);
$mle['shipping'] = $shipping;
$mle['order'] = $order;
require_once(MLEINC.'/include/footer.php');
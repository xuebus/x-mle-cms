<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$mlecms->caching = false; 
if(is_array($_POST['cart'])){
	count($_POST['number']) > 30 && msgbox($language['page']['malicious'],'cart.php');
	if(true === USER_LOGIN){
		$pid = $number = $price = $attribute = $product = array(); 
		$amount = 0; 
		foreach($_POST['cart'] as $e => $n){
			$product = product::data(0,0,0,0,0,$n['id']); 
			if($product['status'] == 1){ 
				$pid[] = $n['id']; $number[] = numeric($n['number']); $price[] = numeric($product['price']);
				$attribute[] = is_array($n['attribute']) ? implode(',',$n['attribute']) : '';
				$amount += numeric($product['price']) * numeric($n['number']);
			}
		}
		if($pid){
			$amount = number_format(($amount * $mle_user_info['rank_discount'] / 10),2,'.',''); 
			$oid = 'ES'.date('YmdHis',$gmt_time).random(3,1);
			$pid = implode(',',$pid); $number = implode(',',$number);$price = implode(',',$price);
			$attribute = implode(STRING_DELIMITED,$attribute);
			$sql = "INSERT INTO `{$DB['prefix']}order` (`lang`,`oid`,`uid`,`pid`,`number`,`price`,`amount`,`attribute`,`status`,`dispatching`,`waybill`,`freight`,`consignee`,`email`,`address`,`zipcode`,`tel`,`mobile`,`building`,`besttime`,`message`,`reply`,`addtime`) VALUES (";
			$sql .= "'".LANG."','{$oid}','".USER_ID."','{$pid}','{$number}','{$price}','{$amount}','{$attribute}',0,0,'',0,'','','','','','','','','','',{$gmt_time})";
			if($db->execute($sql)){
				$pid = $db->get_last_id();
				shopping::del_cart(0,true); 
				member::transaction($oid,USER_ID,4,$amount,1,$language['page']['log_info']); 
				msgbox('','member/checkout.php?id='.$pid); 
			} else {
				msgbox($language['common']['failed'],'cart.php');
			}
		} else {
			msgbox($language['page']['cart_null'],'cart.php'); 
		}
	} else {
		msgbox($language['page']['not_logged'],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); 
	}
}
is_numeric($_GET['del']) && shopping::del_cart($_GET['del']) && msgbox('','cart.php');
'all' == $_GET['del'] && shopping::del_cart(0,true) && msgbox('','cart.php');
$mle['cart']['data'] = shopping::get_cart_data();
$mle['cart']['discount'] = USER_LOGIN ? $mle_user_info['rank_discount'] : 10;
$mle['cart']['amount_total'] = 0;
foreach($mle['cart']['data'] as $n){
	$mle['cart']['amount_total'] += numeric($n['price']);
}
$mle['cart']['amount_total'] = number_format($mle['cart']['amount_total'],2,'.','');
$mle['cart']['amount_discount'] = $mle['cart']['discount'] < 10 ? number_format(($mle['cart']['amount_total']*$mle['cart']['discount'] /10),2,'.','') : $mle['cart']['amount_total'];
require_once(MLEINC.'/include/footer.php');
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
$payment_config = array(); 
require_once('../../../inc/include/common.inc.php');
require_once(MLEINC.'/plugins/payment/alipay.class.php'); 
require_once(MLEINC.'/config/payment.config.php'); 
require_once(MLEINC.'/lib/member.lib.php');
require_once(MLEINC.'/language/frontend/'.$web['dir'].'/payment_return.lang.php'); 
$alipay = new alipay_notify($payment_config['alipay']['id'],$payment_config['alipay']['key'],'MD5','utf-8',$payment_config['alipay']['transport']);    
$verify_result = $alipay->notify_verify();  
$goto_page = $config['url'].'member/center.php'; 
$oid = $_POST['out_trade_no']; 
$uid = numeric($_POST['extra_common_param']); 
$amount = number_format($_POST['price'],2,'.',''); 
$pay_result = $_POST['trade_status']; 
if($verify_result){ 
	if($payment_config['alipay']['service'] == 'create_direct_pay_by_user'){
		if($pay_result == 'TRADE_FINISHED' || $pay_result == 'TRADE_SUCCESS'){ 
			$result = $db->query("SELECT * FROM `{$DB['prefix']}transaction` WHERE `oid` = '{$oid}' && `uid` = '{$uid}'");
			if(count($result) == 1){ 
				if($result[0]['result'] == 0){ 
					if($db->execute("UPDATE `{$DB['prefix']}transaction` SET `result` = '1',`amount` = '{$amount}' WHERE `oid` = '{$oid}' && `uid` = '{$uid}'")){
						if(!member::recharge(array('id' => $uid,'amount' => $amount,'type' => 6,'log' => 0))){ 
							member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][1]); 
						}
					} else { 
						member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][3]); 
					}
				}
			} else {
				member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][0].$_SERVER['QUERY_STRING']); 
			}
		} else { 
			member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][12]); 
		}
	} elseif ($payment_config['alipay']['service'] == 'create_partner_trade_by_buyer'){
		switch ($pay_result){
			case 'WAIT_BUYER_PAY' : 
				member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][7].$oid);
			break;
			case 'WAIT_SELLER_SEND_GOODS' : 
				member::transaction('LG',$uid,6,$amount,1,$language['page']['msg'][8].$oid);
			break;
			case 'WAIT_BUYER_CONFIRM_GOODS' : 
				member::transaction('LG',$uid,6,$amount,1,$language['page']['msg'][9].$oid);
			break;
			case 'TRADE_FINISHED' : 
				member::transaction('LG',$uid,6,$amount,1,$language['page']['msg'][10].$oid);
			break;
			default : 
				member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][11].$oid);
			break;
		}		
	} else {
		member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][6]); 
	}
	die('success'); 
} else {  
	member::transaction('LG',$uid,6,$amount,0,$language['page']['msg'][5]); 
	die('fail');
}
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
USER_LOGIN or msgbox('',$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI']));
$mlecms->caching = false; 
$payment_config = array(); 
require_once(MLEINC.'/config/payment.config.php'); 
if(isset($_POST['amount']) && !empty($_POST['pay_bank'])){
	$amount = number_format(numeric($_POST['amount']),2,'.','');
	($amount < 0.01 || $amount > 200000) && msgbox($language['page']['msg'][1],'recharge.php');
	$pay_bank = explode('_',$_POST['pay_bank']); 
	(isset($pay_bank[1]) && in_array($pay_bank[0],array('tenpay','alipay'))) or msgbox($language['page']['msg'][3],'recharge.php');
	$oid = 'NR'.date('YmdHis',$gmt_time).random(3,1); 
	member::transaction($oid,USER_ID,1,$amount,0,$language['page']['log_info'].$pay_bank[0].' - '.$pay_bank[1]) or msgbox($language['page']['msg'][5],'recharge.php');
	if($pay_bank[0] == 'tenpay'){ 
		$amount *= 100; 
		($payment_config['tenpay']['enable'] != 1 || empty($payment_config['tenpay']['id']) || empty($payment_config['tenpay']['key'])) && msgbox($language['page']['msg'][6],'recharge.php'); 
		require_once(MLEINC.'/plugins/payment/tenpay.class.php'); 
		$reqHandler = new PayRequestHandler();
		$reqHandler->init();
		$reqHandler->setKey($payment_config['tenpay']['key']); 
		$reqHandler->setParameter('bargainor_id',$payment_config['tenpay']['id']); 
		$reqHandler->setParameter('sp_billno',$oid); 
		$reqHandler->setParameter('transaction_id',$payment_config['tenpay']['id'].date('Ymd',$gmt_time).random(10,1)); 
		$reqHandler->setParameter('total_fee',$amount); 
		$reqHandler->setParameter('return_url',$config['url'].'inc/plugins/payment/tenpay_return.php'); 
		$reqHandler->setParameter('cs','utf-8'); 
		$reqHandler->setParameter('desc',$language['page']['pay_name']); 
		$reqHandler->setParameter('bank_type',$pay_bank[1]); 
		$reqHandler->setParameter('spbill_create_ip',get_ip()); 
		$reqHandler->setParameter('attach',USER_ID); 
		$reqUrl = $reqHandler->getRequestURL(); 
		$reqHandler->doSend(); 
		exit();			
	} elseif ($pay_bank[0] == 'alipay'){ 
		($payment_config['alipay']['enable'] != 1 || empty($payment_config['alipay']['id']) || empty($payment_config['alipay']['key']) || empty($payment_config['alipay']['email'])) && msgbox($language['page']['msg'][7],'recharge.php'); 
		require_once(MLEINC.'/plugins/payment/alipay.class.php'); 
		$parameter = array(
			'service' => $payment_config['alipay']['service'], 
			'payment_type' => '2', 
			'partner' => $payment_config['alipay']['id'], 
			'seller_email' => $payment_config['alipay']['email'], 
			'return_url' => $config['url'].'member/center.php', 
			'notify_url' => $config['url'].'inc/plugins/payment/alipay_return.php', 
			'_input_charset' => 'utf-8', 
			'show_url' => $config['url'].'member/order.php', 
			'out_trade_no' => $oid, 
			'subject' => $language['page']['pay_name'], 
			'body' => '注册会员帐户资金充值', 
			'price' => $amount,
			'quantity' => '1', 
			'logistics_fee' => '0.00', 
			'logistics_type' => 'EXPRESS', 
			'logistics_payment'	=> 'SELLER_PAY', 
			'paymethod' => ($pay_bank[1] == 'directPay' ? 'directPay' : 'bankPay'), 
			'defaultbank' => ($pay_bank[1] == 'directPay' ? '' : $pay_bank[1]), 
			'buyer_email' => ' ', 
			'extra_common_param' => USER_ID,
		);
		$alipay = new alipay_service($parameter,$payment_config['alipay']['key'],'MD5');
		$sHtmlText = $alipay->build_form();
		die($sHtmlText);
	} else {
		msgbox($language['page']['msg'][4],'recharge.php'); 
	}
}
$mle['payment'] = $payment_config;
$mle['amount'] = numeric($_GET['amount']);
$mle['amount'] = $mle['amount'] <= 0 ? '' : number_format($mle['amount'],2,'.','');
require_once(MLEINC.'/include/footer.php');
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
$mlecms->caching = false; 
USER_LOGIN or msgbox('',$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); 
if(!empty($_GET['action']) && is_numeric($_GET['id'])){
	$id = numeric($_GET['id']);
	$id > 0 or die('Illegal Operation.'); 
	$o = shopping::get_order($id,USER_ID,0,0);
	if(is_numeric($o['id'])){
		if(isset($o['status']) && $o['status'] == 0){ 
			if($_GET['action'] == 'del' || $_GET['action'] == 'return'){ 
				if(shopping::del_order($o['id'],$_GET['action'] == 'return' ? $o['pid'] : '')){
					member::transaction($o['oid'],USER_ID,4,0,1,$language['page']['msg'][1].$o['oid']); 
					msgbox('','order.php');
				} else {
					msgbox($language['page']['msg'][0],'order.php');
				}
			} elseif ($_GET['action'] == 'pay') { 
				$in_kind = shopping::in_kind($o['pid']);
				$in_kind && (empty($o['dispatching'])|| empty($o['consignee']) || empty($o['email']) || empty($o['address']) || empty($o['zipcode']) || (empty($o['tel']) && empty($o['mobile']))) && msgbox($language['page']['msg'][3],'checkout.php?id='.$o['id']);
				$user_money = numeric($mle_user_info['money']);
				$order_amount = numeric($o['amount']);
				if($user_money < $order_amount){ 
					msgbox($language['page']['msg'][2],'recharge.php?amount='.$order_amount);
				} else { 
					if($db->execute("UPDATE `{$DB['prefix']}members` SET `money` = '".($user_money - $order_amount)."',`usemoney` = '".($mle_user_info['usemoney'] + $order_amount)."' WHERE `id` = '".USER_ID."'")){
						$db->execute("UPDATE `{$DB['prefix']}order` SET `status` = '1' WHERE `id` = '{$o['id']}'");
						$pid = explode(',',$o['pid']); 
						$number = explode(',',$o['number']); 
						foreach($pid as $i => $n){
							$db->execute("UPDATE `{$DB['prefix']}product` SET `inventory` = (`inventory` - {$number[$i]}),`sales` = (`sales` + {$number[$i]}) WHERE `id` = '{$n}'");
						}						
						member::transaction($o['oid'],USER_ID,3,$order_amount,1,$language['page']['msg'][4]);
						msgbox($language['page']['msg'][5],'order.php');
					} else {
						msgbox($language['page']['msg'][0],'order.php');
					}
				}
			} else {
				die('Illegal Operation.');
			}
		} elseif ($o['status'] == 3 && $_GET['action'] == 'receipt'){ 
			shopping::receipt_order($o['id']) ? msgbox('','order.php') : die('Illegal Operation.');
		} else {
			die('Illegal Operation.');
		}
	} else {
		die('Illegal Operation.');
	}
}
$mle['order_list'] = shopping::get_order(0,USER_ID,0,10);
require_once(MLEINC.'/include/footer.php');
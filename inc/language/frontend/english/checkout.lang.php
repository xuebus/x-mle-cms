<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
$language['page'] = array(
	'title' => 'My Order',
	'home' => 'Home',
	'center' => 'Member Center',
	'order_manage' => 'Order Management',
	'location' => 'You Are Here:',	
	'nodata' => 'Order does not exist or has been deleted.',
	'return' => 'Ensure that all the back into the shopping cart?',
	'product' => array(
		0 => 'Product List',
		1 => 'Back Cart',
		2 => 'Product Name',
		3 => 'Unit Price',
		4 => 'Quantity',
		5 => 'Attribute Selection',
		6 => 'Subtotal',
		7 => 'Amount:',
		8 => 'Discounts',
		9 => 'Order Management',
	),
	'consignee' => array(
		0 => 'Consignee',
		1 => 'Consignee Name:',
		2 => 'E-mail Address:',
		3 => 'Shipping Address:',
		4 => 'Zip Code:',
		5 => 'Phone:',
		6 => 'Mobile:',
		7 => 'Best Delivery Time:',
		8 => 'Landmark Building:',
	),
	'dispatching' => array(
		0 => 'Shipping Method',
		1 => 'S',
		2 => 'Shipping Name',
		3 => 'Distribution Description',
		4 => 'Freight',
		5 => 'Insurance',
		6 => 'Fee',
		7 => 'Yes',
		8 => 'No',
		9 => 'Fee to pay',
		10 => 'Whether the protect the price',
	),
	'message' => array(
		0 => 'Order Message',
		1 => 'Business Reply:',
		2 => 'No replies.',
	),
	'fees' => array(
		0 => 'Calculation of charge',
		1 => 'Order Status:',
		2 => 'Submitted:',		
		3 => 'Funds Available:',
		4 => 'Total Amount:',
		5 => 'Transport Costs:',
		6 => 'Amount Payable:',
		7 => 'Recharge Now',
		8 => 'Order No.:',
	),
	'status' => array(
		0 => 'Waiting for user-pay',
		1 => 'Paid, waiting for delivery.',
		2 => 'Order has been confirmed,Transit',
		3 => 'Has Sent',
		4 => 'Transaction is completed',
		-1 => 'Request a return',
		-2 => 'Has refused to return',
		-3 => 'Return completed',
	), 
	'submit' => array(
		0 => 'Payment',
		1 => 'Save Order',
	),
	'msg' => array(
		0 => 'Please fill in the name of the consignee.',
		1 => 'Please fill in the recipient e-mail.',
		2 => 'Please fill in the full address of consignee',
		3 => 'Please fill in the zip code.',
		4 => 'Telephone or mobile phone number to contact the consignee at least one complete.',
		5 => 'Please select the logistics and distribution methods.',
		6 => 'Parameter error, the shipping method you choose does not exist or has been disabled.',
		7 => 'Order saved successfully.',
		8 => 'Operation fails, check your submitted data is correct.',
	),
	'log_info' => array(
		0 => 'Orders successfully modified.',
		1 => 'Failed to modify the order.',
	),
	'email' => array(
		0 => '您有一笔交易，等待付款',
		1 => '<div style="font-size:13px; line-height:20px; font-family:Verdana,Geneva,sans-serif;">尊敬的 {#name}，您好:<br />
		感谢您选购我们的商品.<br />
		这是由 {#web} 发送的一封订单通知邮件，如果这不是您所操作，请立即忽略并删除这封邮件.<br /><br />
		-------------------------------------------------------------<br /><br />
		登录用户名:{#name}，<a href="{#web_url}member/checkout.php?id={#id}">点击这里查看订单信息</a><br />
		订单号:{#oid}<br />
		订单应付金额:{#amount}<br />
		订单提交时间:{#time}<br />
		立即支付:<a href="{#web_url}member/order.php?action=pay&id={#id}">{#web_url}member/order.php?action=pay&id={#id}</a><br /><br />
		-------------------------------------------------------------<br /><br />
		<strong>相关链接:</strong><br />
		我的订单管理:<a href="{#web_url}member/order.php">{#web_url}member/order.php</a><br />
		会员管理中心:<a href="{#web_url}member/center.php">{#web_url}member/center.php</a><br />
		在线充值:<a href="{#web_url}member_recharge.php?amount={#amount}">{#web_url}member_recharge.php</a><br />
		网站首页地址:<a href="{#web_url}">{#web_url}</a><br />
		会员登录:<a href="{#web_url}member/login.php">{#web_url}member/login.php</a><br />
		本邮件为系统自动发出，请勿回复.<br /><br />
		谢谢订购！<br /><br />
		{#web}<br />
		{#time}</div>',
	),
);
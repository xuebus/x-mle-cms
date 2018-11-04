<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
$language['page'] = array(
	'title' => '我的订单',
	'home' => '首页',
	'center' => '会员中心',
	'order_manage' => '订单管理',
	'location' => '您的位置：',	
	'nodata' => '订单不存在或者已经删除。',
	'return' => '确定要取消该订单并将所有商品放入购物车吗？',
	'product' => array(
		0 => '商品列表',
		1 => '放回购物车',
		2 => '商品名称',
		3 => '购买单价',
		4 => '购买数量',
		5 => '选择属性',
		6 => '金额',
		7 => '商品总金额：',
		8 => '优惠折扣',
		9 => '订单管理',
	),
	'consignee' => array(
		0 => '收货人信息',
		1 => '收货人姓名：',
		2 => '电子邮箱：',
		3 => '收货人详细地址：',
		4 => '邮政编码：',
		5 => '联系电话：',
		6 => '收货人手机号：',
		7 => '最佳送货时间：',
		8 => '标志性建筑：',
	),
	'dispatching' => array(
		0 => '配送方式',
		1 => '选择',
		2 => '配送方式名称',
		3 => '配送方式描述',
		4 => '手续费到付',
		5 => '保价费用',
		6 => '手续费',
		7 => '支持',
		8 => '不支持',
		9 => '手续费到付',
		10 => '配送是否需要保价',
	),
	'message' => array(
		0 => '订单附言',
		1 => '商家回复：',
		2 => '还没有回复',
	),
	'fees' => array(
		0 => '费用计算',
		1 => '订单状态：',
		2 => '下单时间：',		
		3 => '您的帐号可用资金：',
		4 => '商品总金额：',
		5 => '配送手续费：',
		6 => '应付款金额：',
		7 => '立即充值',
		8 => '订单号：',
	),
	'status' => array(
		0 => '等待用户付款，可以修改订单',
		1 => '已支付，等待发货。',
		2 => '订单已确认，配货中',
		3 => '已发货，等待用户签收',
		4 => '已签收，交易完毕',
		-1 => '要求退货',
		-2 => '已拒绝退货',
		-3 => '退货完毕',
	), 
	'submit' => array(
		0 => '立即支付',
		1 => '保存订单',
	),
	'msg' => array(
		0 => '请填写收货人姓名。',
		1 => '请填写收货人电子邮箱。',
		2 => '请填写收货人详细地址',
		3 => '请填写邮政编码。',
		4 => '收货人联系电话或手机号码至少填写一项。',
		5 => '请选择物流配送方式。',
		6 => '参数错误，您选择的配送方式不存在或者已经禁用。',
		7 => '订单保存成功。',
		8 => '操作失败，请检查您提交的数据是否正确。',
	),
	'log_info' => array(
		0 => '修改订单信息，操作成功，未付款，等待用户支付。',
		1 => '修改订单信息，操作失败，未付款，等待用户支付。',
	),
	'email' => array(
		0 => '您有一笔交易，等待付款',
		1 => '<div style="font-size:13px; line-height:20px; font-family:Verdana,Geneva,sans-serif;">尊敬的 {#name}，您好：<br />
		感谢您选购我们的商品。<br />
		这是由 {#web} 发送的一封订单通知邮件，如果这不是您所操作，请立即忽略并删除这封邮件。<br /><br />
		-------------------------------------------------------------<br /><br />
		登录用户名：{#name}，<a href="{#web_url}member/checkout.php?id={#id}">点击这里查看订单信息</a><br />
		订单号：{#oid}<br />
		订单应付金额：{#amount}<br />
		订单提交时间：{#time}<br />
		立即支付：<a href="{#web_url}member/order.php?action=pay&id={#id}">{#web_url}member/order.php?action=pay&id={#id}</a><br /><br />
		-------------------------------------------------------------<br /><br />
		<strong>相关链接：</strong><br />
		我的订单管理：<a href="{#web_url}member/order.php">{#web_url}member/order.php</a><br />
		会员管理中心：<a href="{#web_url}member/index.php">{#web_url}member/index.php</a><br />
		在线充值：<a href="{#web_url}member_recharge.php?amount={#amount}">{#web_url}member_recharge.php</a><br />
		网站首页地址：<a href="{#web_url}">{#web_url}</a><br />
		会员登录：<a href="{#web_url}member/login.php">{#web_url}member/login.php</a><br />
		本邮件为系统自动发出，请勿回复。<br /><br />
		谢谢订购！<br /><br />
		{#web}<br />
		{#time}</div>',
	),
);
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => '会员交易及充值记录管理',
	'transactions' => '交易记录',
	'select_all' => '全选/取消',
	'keyword' => '关键字',
	'enter_keywords' => '请输入搜索关键字。',
	'type' => array(
		0 => '请选择交易类型',
		1 => '会员在线充值',
		2 => '管理员充值[银行转帐]',
		3 => '购买商品[消费支付]',
		4 => '提交或修改订单',
		5 => '购买浏览权限[消费支付]',
		6 => '操作日志',
	),
	'record' => '记录',
	'delete_log' => '删除所有选中项',
	'determine_delete' => '确定要删除所有选中项吗？',
	'no_data' => '没有相关数据',
	'remove' => '删除充值/交易记录',
	'select' => '选择',
	'username' => '会员帐号',
	'transaction_type' => '交易类型',
	'amount' => '金额',
	'view' => '查看详情',
	'results' => array('失败','成功','操作结果'),
	'oid' => '订单号/流水号',
	'attention' => '为了系统安全，最近 2 天的交易记录必须保留，无法删除。',
	'info' => '订单号：{oid}<br />会员帐号：{username}<br />交易类型：{type}<br />金额：{amount} 元<br />交易结果：{result}<br />交易事件：{info}<br />操作者IP：{ip}<br />发生时间：{addtime}',
);
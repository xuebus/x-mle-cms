<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => array(
		'update' => array('添加配送方式','修改配送方式'),
		'manage' => '配送方式管理',
	),
	'field' => array(
		0 => '配送方式名称：',
		1 => array('手续费：','元','发货时所用的手续费(配送费用)，若要收取，请填写。'),
		2 => array('手续费到付：','支持','不支持','如果支持手续费到付功能，用户购买物品时可以自由选择：<br />是：购买时不计算手续费，由收件人支付手续费，这取决于配送方<br />　　式和部分地区是否支持邮资到付业务。<br />否：在用户购买时扣除手续费。'),
		3 => array('保价费比例：','一个小数，为0时不支持保价。如：值为0.01则保价费是商品交易总金额的1%。注：物品交易总金额 × 保价费比例 = 保价费金额'),
		4 => array('配送方式描述：','配送方式简要说明，不得超过 255 个字符。'),
		5 => array('是否启用：','启用','禁用','停用的配送方式不在前台购买流程中显示。'),
	),
	'other' => array(
		0 => '添加',
		1 => '修改',
		2 => '删除',
		3 => '确定要删除该配送方式吗？',
		4 => '已禁用，点击启用',
		5 => '已启用，点击禁用',
		6 => '没有相关数据',
		7 => '返回',
	),
	'head' => array(
		0 => '配送方式名称',
		1 => '手续费',
		2 => '手续费到付',
		3 => '保价费比例',
		4 => '简要描述',
		5 => '操作',
		6 => '支持',
		7 => '不支持',
	),
);
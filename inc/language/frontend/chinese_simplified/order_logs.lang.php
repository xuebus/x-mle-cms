<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
$language['page'] = array(
	'title' => '操作日志及交易记录',
	'home' => '首页',
	'center' => '会员中心',
	'location' => '您的位置：',	
	'notdata' => '没在交易记录',
	'menu' => array(
		0 => '会员中心首页',
		1 => '修改图像',
		2 => '修改会员资料',
		3 => '我的订单管理',
		4 => '在线充值',
		5 => '操作日志及交易记录',
		6 => '修改注册邮箱及密码',
		7 => '安全退出',
	),
	'th' => array(
		0 => '订单号/发生时间',
		1 => '金额/类型',
		2 => '事件',
		3 => '结果',
	),
	'type' => array(
		1 => '在线充值',
		2 => '管理员手动充值',
		3 => '购买商品',
		4 => '提交或变更订单',
		5 => '购买浏览权限',
		6 => '操作日志',
	),
	'result' => array(
		0 => '操作失败、未结束或交易出现异常的记录',
		1 => '操作成功或交易已经结束的记录',
	),
);
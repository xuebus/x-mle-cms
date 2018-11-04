<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'添加管理员','修改管理员',
	'list' => array(
		'用户名：','5 - 20个字符组成，只能使用数字、字母和下划线','密码：','留空则不修改','确认密码：','角色：','普通管理员','超级管理员','普通管理员管理权限：'
	),
	'info' => array(
		'用户名必须由5 - 20个字符组成，只能使用数字、字母和下划线。',
		'密码必须由5 - 20个字符组成，只能使用数字、字母和下划线。',
		'当前帐号已经登录，不可以降低权限级别。',
		'两次输入的密码不一致。',
		'1、普通管理员：无权管理系统角色，管理权限可单独设定；超级管理员：拥有最高管理权限，无限制。<br />2、为确保系统中至少有一个超级管理员帐号，不可以对当前已登录的帐号进行删除和降级操作。',
	),
);
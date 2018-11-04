<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'page_setup' => '后台菜单及页面设置',
	'template_name' => '菜单名称',
	'is_open' => '功能开启',
	'icon_file' => '图标文件',
	'file_name' => '程序文件',
	'menu_display' => '菜单显示',
	'purviews' => '权限分配',
	'sort' => '排序',
	'title' => array(
		'关闭后的模块所有管理员均无法访问',
		'模块名称及菜单显示名称。',
		'位于 <span class=\'green\'>inc/templates/manage/icon</span> 目录下的一个图片文件',
		'后台目录下的一个PHP文件名称，区分大小写',
		'一个整数：<br />&nbsp;&nbsp;0：不在任何地方显示<br />&nbsp;&nbsp;1：只在左侧菜单中显示，<br />&nbsp;&nbsp;2：只在顶部菜单中显示(暂不支持)<br />&nbsp;&nbsp;3：全部显示',
		'是否在普通管理员权限分配项中显示 (0不显示，1显示)<br />该参数会在添加普通管理员或修改普通管理员时用到',
		'菜单排列顺序(升序)，值越小越靠前',
		'点击 显示/隐藏 子菜单',
	),
	'failure' => '操作失败，无法更新配置文件！\r请确认您是否有相应文件的写入权限：\rinc/config/file.config.php',
	'notes' => '点击 <img src="../inc/templates/manage/images/go_down.png" width="16" height="16" /> 可以展开或隐藏子菜单。',
	'update_page' => '修改后台菜单设置',
);
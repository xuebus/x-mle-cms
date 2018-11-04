<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => '系统频道管理',
	'remove_channel' => '确定删除该频道？',
	'no_data' => '当前语言站点下没有频道，请添加。',
	'content_exists' => '删除失败，该频道下有内容存在。',
	'category_exists' => '删除失败，该频道下有栏目存在。',
	'del_channel' => '删除频道',
	'show' => '显示',
	'hide' => '隐藏',
	'head' => array(
		0 => 'ID',
		1 => '频道名称',
		2 => '使用模块',
		3 => '导航栏显示',
		4 => '自定义排序',
		5 => '操作',
	),
	'links' => '外部链接',
	'operation' => array('修改频道信息','删除该频道','发布内容','添加产品(商品)','添加图片','添加下载资源','添加友情链接'),
	'restricted' => '访问受限',
	'attention' => '含有分类及内容的频道无法删除，必须先删除频道下的所有栏目及内容。',
);
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => '资源下载管理',
	'recycle' => '回收站',
	'manage' => '资源管理',
	'all_channel' => '所有下载频道',
	'all_category' => '所有分类',
	'no_data' => '没有相关数据。',
	'keyword' => '关键字',
	'enter_keywords' => '请输入搜索关键字。',
	'select_all' => '全选/取消',
	'volume' => array('审核选中的资源','取消审核','删除选中的资源','彻底删除选中的资源','','','将选中的资源设置为推荐','取消推荐','还原选中的资源'),
	'determine' => array(
		'确定审核选中的资源？',
		'确定取消审核？',
		'确定删除选中的资源？',
		'确定永久性删除选中的资源？',
		'',
		'',
		'确定将选中的资源设置为推荐？',
		'确定取消推荐？',
		'确定还原选中的资源？',		
	),
	'completely_clear' => '确定永久性删除该资源？',
	'sort_text' => array(
		'发布日期(降序)',
		'发布日期(升序)',
		'浏览次数(降序)',
		'浏览次数(升序)',
		'评论人数(降序)',
		'评论人数(升序)',
		'自定义排序值(降序)',
		'下载次数(降序)',
		'下载次数(升序)',
	),
	'filter_text' => array(
		'数据筛选',
		'推荐的资源',
		'不推荐的资源',
		'已审核的资源',
		'未审核的资源',
		'访问受限的资源',
		'出售的资源',
		'允许评论的资源',
		'不允许评论的资源',
	),	
	'head' => array('选择','ID','频道','栏目','标题','发布日期','浏览/评论/下载','操作'),
	'title_img' => array('访问受限','购买所需金钱：','购买所需积分：','查看评论'),
	'operation' => array('已经通过审核，点击取消审核','还没有通过审核，点击通过审核','修改下载资源','删除下载资源','','','已经推荐，点击取消推荐','还没有推荐，点击设置为推荐','还原','彻底删除'),
	'parameter_error' => '参数错误。',
);
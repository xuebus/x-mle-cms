<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => '文章及内容管理',
	'recycle' => '回收站',
	'manage' => '文章管理',
	'all_channel' => '所有文章频道',
	'all_category' => '所有分类',
	'no_data' => '没有相关数据。',
	'keyword' => '关键字',
	'enter_keywords' => '请输入搜索关键字。',
	'select_all' => '全选/取消',
	'volume' => array('审核选中的内容','取消审核','删除选中的内容','彻底删除选中的内容','将选中的内容设为草稿','发布选中的内容','将选中的内容设置为推荐','取消推荐','还原选中的内容'),
	'determine' => array(
		'确定审核选中的内容？',
		'确定取消审核？',
		'确定删除选中的内容？',
		'确定永久性删除选中的内容？',
		'确定将所有选中的内容设置为草稿？',
		'确定发布选定的内容？',
		'确定将选中的内容设置为推荐？',
		'确定取消推荐？',
		'确定还原选中的内容？',		
	),
	'completely_clear' => '确定永久性删除该内容？',
	'sort_text' => array(
		'发布日期(降序)',
		'发布日期(升序)',
		'浏览次数(降序)',
		'浏览次数(升序)',
		'评论人数(降序)',
		'评论人数(升序)',
		'自定义排序值(降序)',
	),
	'filter_text' => array(
		'数据筛选',
		'推荐的内容',
		'不推荐的内容',
		'已发布的内容',
		'草稿',
		'已审核的内容',
		'未审核的内容',
		'访问受限的内容',
		'出售的内容',
		'允许评论的内容',
		'不允许评论的内容',
	),
	'head' => array('选择','ID','频道','栏目','标题','发布日期','浏览/评论','操作'),
	'title_img' => array('访问受限','购买所需金钱：','购买所需积分：','查看评论'),
	'operation' => array('已经通过审核，点击取消审核','还没有通过审核，点击通过审核','修改文章内容','删除文章内容','已经发布，点击设置为草稿','还没有发布，点击发布','已经推荐，点击取消推荐','还没有推荐，点击设置为推荐','还原','彻底删除'),
	'parameter_error' => '参数错误。',
);
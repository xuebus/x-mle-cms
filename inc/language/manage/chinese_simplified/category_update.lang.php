<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => array('添加栏目','修改栏目信息'),
	'unlimited' => '开放栏目(无限制)',
	'select_channel' => '请选择频道',
	'nodata' => '栏目不存在或者已经删除。',
	'as_root' => '作为一级栏目',
	'there_category' => '当前栏目下有子栏目存在，不可以移到其它栏目中。',
	'there_content' => '当前栏目下有内容存在，不可以移到其它栏目中。',
	'detect' => array('请填写栏目名称。','请填写栏目列表页模板文件名称。'),
	'channel' => '所属频道：',
	'channel_title' => '添加后不可以对所属频道进行修改。',
	'channel_add' => '添加新频道',
	'category' => '所属栏目：',
	'category_name' => '栏目名称：',
	'seotitle' => 'SEO标题：',
	'seotitle_title' => '栏目列表页标题。',
	'seokey' => 'SEO关键字：',
	'seokey_title' => '多个关键字用逗号隔开。',
	'seodescr' => 'SEO描述：',
	'seodescr_title' => '不得超过 255 个字符。',
	'permission' => '访问权限：',
	'permission_title' => '可以按住 CTRL 多选，权限设置对该栏目下的所有子栏目及内容均有效。',
	'add_level' => '添加会员级别。',
	'templatelist' => '栏目列表页模板文件：',
	'templatelist_title' => '栏目列表页使用的模板文件名称。不含文件后缀名，<br />如：<span class=\'green\'>news_list</span>，不填写将采用当前页程序文件名作为缺省值。',
	'templatecontent' => '内容页模板文件：',
	'templatecontent_title' => '该栏目下的内容页所使用的模板文件名称。多级分类时将采用最后一级<br />分类填写的内页模板文件。不填写将会继承父级栏目中设定的模板文件。',
	'picture' => '栏目图片：',
	'picture_title' => '栏目相关图片或图标，部分模板可能会用到。',
	'introduction' => '栏目介绍：',
	'introduction_title' => '栏目简要介绍，支持HTML语法，部分模板可能会用到。',
	'sort' => '栏目排序：',
	'sort_title' => '升序，栏目排列顺序。',
	'attention' => '有子栏目或是内容存在的栏目不可以移动。',
	'information' => array('关于静态部署：如果填写的静态目录不存在系统将会自动创建。修改静态目录部署规则时请重新生成与之相关的静态页面。','多语言请使用不同的静态目录或者使用语言参数区分，注意不同语言生成规则，不要有文件冲突。'),
);
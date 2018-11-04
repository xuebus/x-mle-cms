<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => '模块及插件管理',
	'name' => '名称',
	'code' => '识别码',
	'development' => '开发者',
	'type' => '类型',
	'style' => array('模块','插件','补丁'),
	'installation' => '是否安装',
	'operation' => '操作',
	'remark' => '模块信息及使用说明：',
	'delete_failed' => '操作失败，请确认是否有相应的写入权限，无法删除相关文件：\r',
	'extract_failed' => '操作失败，无法创建文件，请确认是否有相应的写入权限：',
	'install' => '安装模块',
	'repeat' => '安装失败，无法写入数据，请确定是否重复安装。',
	'uninst' => '卸载模块',
	'remplates_require' => '操作失败，当前使用的模板必须该模块支持，无法卸载。',
	'delpack' => '删除安装文件',
	'delpack_failed' => '无法删除安装文件，请确认是否有相应的操作权限。',
	'ok_del' => '确定要删除该模块吗？\r系统将会删除与该模块相关的所有数据及文件。',
	'ok_install' => '确定安装该模块吗？',
	'remove' => '删除安装文件',
	'ok_remove' => '确定删除该模块的安装文件吗？',
	'have_removed' => '安装文件已经删除',
	'no_data' => '没有相关数据',
	'channel_use' => '有频道正在使用该模块，请先删除相关频道。',
	'notes' => array(
		'模块卸载将会删除与之相关的所有文件、程序、功能、附件、相关语言文件、部分模板文件、数据库中的表及数据，请谨慎操作。',
		'您当前正在使用的模板中有用到的模块将无法卸载。可以在模板编辑中修改模板配置文件 config.default.php 中删除要卸载的模块识别码后进行强行卸载。',
		'在模块安装完后建议删掉其安装文件，删除安装文件对已安装的功能和数据没有任何影响。',
		'如何安装当前列表中没有的模块？进入官方网站下载模块安装包解压至网站的 <font color="#FF0000">inc/install/pack/</font> 目录下后进入该页即可开始安装。',
	), 
);
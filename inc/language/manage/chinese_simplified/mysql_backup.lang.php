<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'数据库备份与恢复','备份文件名','备份时间','文件大小','操作','没有备份文件！','备份数据库','文件不存在。','恢复数据库','删除数据库备份文件','检查数据库', // 0 - 10
	'优化数据库','修复数据库','分析数据库','返回','操作失败，请确认您是否有相应目录的写入权限：\rinc/tmp/database_backup/', // 11 - 15
	'本操作只对数据库中当前网站数据进行备份。如果您的数据库中有多个网站，其它站点数据不会被备份。', // 16
	'备份后的数据可以进行恢复操作或通过 phpMyAdmin 导入。', // 17
	'全部备份均不包含模板文件和附件文件。模板、附件的备份只需通过 FTP 等下载，MLECMS 不提供单独备份。', // 18
	'确定要进行数据库恢复操作吗？这将覆盖现有的全部数据！', // 19
	'确定要删除该备份文件吗？', // 20
	'下载备份文件','恢复数据库','删除备份文件', // 21 - 23
	'本功能只适用于对一般中小型数据库进行备份，大型数据库请采用专业的 MySQL 管理工具进行备份。', // 24
	'请稍候 . . .', // 25
	'数据库备份文件保存目录：inc/tmp/database_backup/', // 26
	'optitle' => array(
		'check' => '检查数据库',
		'optimize' => '优化数据库',
		'repair' => '修复数据库',
		'analyze' => '分析数据库',
	),
);
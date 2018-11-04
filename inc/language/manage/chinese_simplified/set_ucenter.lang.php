<?php
/*
* @Multi-Language Enterprise Content Management System
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => 'UCenter 配置',
	'failure' => '操作失败，无法更新配置文件！\r请确认您是否有相应文件的写入权限：\rinc/plugins/ucenter/config.inc.php',
	'update_page' => '修改 UCenter 配置参数',
	'field' => array(
		'enabled' => array('同步通讯：','开启','禁用','同步开关，是否开启 UCenter 会员同步'),
		'connect' => array('连接方式：','MySQL 数据库连接方式','Fsockopen 接口方式','根据您的服务器环境选择适当的连接方式'), 
		'dbhost' => array('数据库主机：','UCenter 服务端数据库连接地址，默认：localhost'),
		'dbport' => array('数据库端口：','MySQL 数据连接端口默认是 3306，如果不是请修改'),
		'dbuser' => array('数据库用户名：','UCenter 服务端 MySQL 数据库登录用户名'),
		'dbpw' => array('数据库密码：','UCenter 服务端 MySQL 数据库登录密码'),
		'dbname' => array('数据库名称：','UCenter 服务端 MySQL 数据库名称'),
		'dbtablepre' => array('数据表前缀：','UCenter 服务端数据表前缀，一般为 uc_'),
		'key' => array('通信密钥：','将该密钥复制到 UCenter 应用管理中与UC服务端保持一致'),
		'api' => array('服务端地址：','UCenter 服务端通讯 URL，如：http://www.site.com/uc_server','在新窗口中打开链接'),
		'ip' => array('服务端 IP：','UCenter 服务端IP地址，正常情况下留空即可'),
		'appid' => array('服务端应用ID：','UCenter 服务端应用ID号'),
	),
	'info' => array(
		0 => '与 UCenter 服务端数据库连接成功&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UCenter 客户端程序版本：',
		1 => '与 UCenter 服务端建立通讯失败。不存在的数据库：',
		2 => '与 UCenter 服务端建立通讯失败。无法连接数据库，请检查数据库地址、端口、用户名、密码填写是否正确。',
		3 => 'UCenter 配置图文教程',
	),
);
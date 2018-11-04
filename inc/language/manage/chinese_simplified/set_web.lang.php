<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => '网站基本设置',
	'name' => '语言名称：',
	'dir' => '语言包：',
	'dir_title' => '前台启用的语言包，这应该是位于 <span class=\'green\'>inc/language/frontend</span> 下的<br />一个目录名。添加新的语言包请在该路径下创建目录，将翻译好的语言<br />包文件复制到新的目录下，系统会自动检测。',
	'template' => '使用模板：',
	'template_title' => '请选择该语言站点所使用的模板',
	'static' => '首页静态部署：',
	'static_title' => '设置当前语言站首页静态生成和访问路径，相对于网站根目录路径，含完整文件名。<br />如：第一种语言设置为：<span class=\'green\'>index.html</span><br />　　第二种语言可以设置为： <span class=\'green\'>en/index.html</span> 或 <span class=\'green\'>index_2.html</span><br />如果设置的目录不存在程序会自动创建。如果首页填写成 index.html 时您的服务器<br />必须将 index.php 设置为第一默认首页，顺序必须 index.php 排在 index.html 前面。',
	'webtitle' => '网站名称：',
	'logo' => '网站LOGO：',
	'keyword' => 'SEO关键字：',
	'keyword_title' => '用逗号隔开，主要用于网站首页及一些插件页缺省关键字。',
	'description' => 'SEO描述：',
	'copyright' => '版权信息：',
	'email' => '企业邮箱：',
	'email_title' => '可以填写多个邮箱地址，用逗号隔开。调用：{:$web[\'email\'][n]:}，<br />n为索引值：0调用第一个邮箱地址,1第二个,2第三个,依此类推。数<br />量不限。',
	'qq' => '腾讯QQ：',
	'qq_title' => '可以填写多个QQ号，用逗号隔开。调用：{:$web[\'qq\'][n]:}，<br />n为索引值：0调用第一个QQ号,1第二个,2第三个,依此类推。<br />数量不限。',
	'msn' => 'MSN帐号：',
	'msn_title' => '可以填写多个MSN帐号，用逗号隔开。调用：{:$web[\'msn\'][n]:}，<br />n为索引值：0调用第一个MSN帐号,1第二个,2第三个,依此类推。数<br />量不限。',
	'phone' => '客服电话：',
	'phone_title' => '可以填写多个电话号码，用逗号隔开。调用：{:$web[\'phone\'][n]:}，<br />n为索引值：0调用第一个电话号码,1第二个,2第三个,依此类推。数<br />量不限。',
	'fax' => '传真号码：',
	'fax_title' => '可以填写多个传真号码，用逗号隔开。调用：{:$web[\'fax\'][n]:}，<br />n为索引值：0调用第一个传真号码,1第二个,2第三个,依此类推。数<br />量不限。',
	'address' => '公司地址：',
	'log' => '修改网站基本设置',
	'attention' => array('网站基本设置对每一种语言下的站点进行设置。如果您的网站开启了多种语言，请点击顶部的下拉菜单切换至其它语言进行设置。'),
);
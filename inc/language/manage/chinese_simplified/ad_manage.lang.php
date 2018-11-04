<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'广告管理','','ID','广告位识别码','广告名称','调用代码','点击','状态','操作','没有相关数据','没有开启广告统计功能', // 0 - 10
	'已关闭','永不过期','已过期','还没开始','还剩 ',' 天','修改广告','删除广告','已经启用，点击禁用该广告','已经禁用，点击启用该广告', // 11 - 20
	'确定要删除该广告吗？','启用广告','禁用广告','删除广告','调用同一广告位下的多个广告数据可以使用 {:ad::data($aid):} 方法调用，具体调用参数及方法见官方技术文档。', // 21 - 25
	'开启点击统计时将会使用一个跳转页，关闭统计功能将会直接使用真实的链接地址。','如需开启点击统计功能，对自定义或Flash类型的广告时请使用跳转页作为自定义代码及Flash内的链接URL，链接形式：<span class=\'green\'>app.php?a=ad&id=广告ID号</span>', // 26 - 27
	'广告点击统计同一IP地址 8 小时内只计数一次。当然你可以在 app.php 文件顶部修改点击有效间隔时间。','同一广告位下添加有多个广告时，系统将按权重值随机选取一个，当然你也可以调用同一广告位下的所有广告列表数据。', // 28 - 
);
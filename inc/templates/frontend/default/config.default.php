<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/

//模板配置文件

defined('MLEROOT') or die('Access Denied.');

$template_info = array(
	'tid' => 'a02_2', //模板识别码，英文、数字或下划线组成，不得含有中文，不得与其它模板识别码重复
	'name' => '系统默认模板(红色)', //模板名称
	'module' => 'MO00x,MO002x,MO003x,MO004x,MO002x,MO002x,PL005x,PL006x,PL007x,PL008x,PL009x,PL010x,PL011x', //所需(涉及)的模块，该模板必须相关模块支持
	'production' => 'MLECMS官方', //模板作者
	'website' => 'http://www.mlecms.com',  //作者网址
	'version' => 'v2.3', //模板适用版本
	'date' => "2013-06-21", //模板发布时间
	'thumbnail' => 'images/preview.jpg', //模板缩略图，相对于当前模板目录  120 * 160px
	'other' => '该模板缩略图最佳规格：下载(135*90px)、图片集(135*90px)、商品(100*100px)、文章内容(120*90px)', //模板介绍
);
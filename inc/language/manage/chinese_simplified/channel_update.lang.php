<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => array('添加新频道','修改频道信息'),
	'nodata' => '当前语言站点没有该频道，数据不存在或已经删除。',
	'detect' => array(
		0 => '频道名称必须填写。',
		1 => '请选择使用模块。',
		3 => '请填写外部链接网址。',
	),
	'channel_name' => '频道名称：',
	'type' => '频道属性：',
	'internal' => '内部频道',
	'external' => '自定义链接(外部链接)',
	'external_title' => '外部链接：在导航栏中显示，直接链接到外部站点，请填写链接网址。',
	'external_link' => '链接网址：',
	'external_link_title' => '请填写外部链接网址。',
	'target' => '窗口打开方式：',
	'blank' => '新窗口',
	'self' => '当前窗口',
	'target_title' => '请选择外部链接打开方式。',
	'module' => '使用模块：',
	'select' => '请选择使用模块',
	'select_title' => '频道建立后，不可以对使用模块进行修改。',
	'pathhome' => '频道首页静态规则：',
	'pathhome_title' => '当前频道首页静态文件生成路径，含完整文件名。如填写： <span class=\'green\'>news/index.html</span>，<br />即可通过 <span class=\'green\'>http://您的域名/news</span> 的形式访问该频道首页。可以使用的变量：<br />1、<span class=\'green\'>{PID}</span>：当前频道ID<br />2、<span class=\'green\'>{L}</span>：语言，当前频道所属第几种语言<br />缺省规则为：<span class=\'green\'>html/{PID}/index.html</span>，不填写时使用缺省规则。',
	'pathcategory' => '栏目列表页静态规则：',
	'pathcategory_title' => '当前频道下的所有栏目列表页静态部署规则，可以使用的变量：<br />1、<span class=\'green\'>{PID}</span>：栏目所属的频道ID<br />2、<span class=\'green\'>{L}</span>：站点语言，栏目所属第几种语言<br />3、<span class=\'green\'>{CID}</span>：栏目ID<br />缺省规则为：<span class=\'green\'>html/{PID}/{CID}.html</span>，不填写时使用缺省规则。',
	'pathcontent' => '内容页静态规则：',
	'pathcontent_title' => '当前频道下的所有内容页静态部署规则，启用真静态时有效，如果在发布内<br />容时填写了自定义文件名则采用发布时单独定义的规则，可以使用的变量：<br />1、<span class=\'green\'>{PID}</span>：内容所属的频道ID<br />2、<span class=\'green\'>{L}</span>：站点语言，内容所属第几种语言<br />3、<span class=\'green\'>{CID}</span>：内容所属的栏目ID，多级分类将采用最后一级栏目ID<br />4、内容发布日期：<span class=\'green\'>{Y}</span>年、<span class=\'green\'>{M}</span>月、<span class=\'green\'>{D}</span>日<br />5、<span class=\'green\'>{ID}</span>：内容ID<br />缺省规则为：<span class=\'green\'>html/{PID}/{Y}{M}/{ID}.html</span>，不填写时使用缺省规则。',
	'seotitle' => 'SEO标题：',
	'seotitle_title' => '频道首页标题',
	'seokey' => 'SEO关键字：',
	'seokey_title' => '将被搜索引擎用来搜索频道首页的关键内容，多个关键字用英文逗号隔开。',
	'seodescr' => 'SEO描述：',
	'seodescr_title' => '将被搜索引擎用来说明频道首页的主要内容，最多255个字符。',
	'template' => '模板文件：',
	'template_title' => '频道首页使用的模板文件，不含文件后缀名，如：<span class=\'green\'>news_index</span><br />不填写将采用当前页程序文件名作为缺省值。',
	'show' => '导航栏显示：',
	'whether' => array('是','否'),
	'hide_title' => '是：将在导航栏中显示。<br />否：不在导航栏中显示，属于隐藏频道，可以正常添加分<br />类和数据，只是不在导航栏中显示，隐藏频道内的数据前<br />台模板可以正常调用。',
	'sort' => '导航栏排序：',
	'sort_title' => '升序排列，该排序主要针对导航栏中的排列顺序。',
	'information' => '多语言网站请注意静态规则不要有文件冲突，多语言生成静态规则可以使用不同的频道目录名或是添加上语言区别参数{L}。<br />本页标签只能在以上指定的频道首页模板文件中调用。',
	'permission' => '访问权限设置：',
	'permission_title' => '可以按住 CTRL 多选，权限设置对该频道下的所有栏目及内容均有效。',
	'add_level' => '添加会员等级',
	'unlimited' => '开放频道(无限制)',
	'add_module' => '安装、卸载模块。',
);
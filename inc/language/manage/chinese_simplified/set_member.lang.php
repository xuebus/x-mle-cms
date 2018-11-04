<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'注册会员及相关功能设置','新用户注册：','开启','关闭','是否允许新用户注册，关闭后所有用户将无法注册会员','会员注册验证：','无需验证','邮件验证','手工验证','注册帐号是否需要验证后生效：<br />1、无需验证：会员注册后即可登录。<br />2、邮件验证：注册后系统自动发送一封验证邮件至用户邮箱，<br />&nbsp;　&nbsp;用户接收邮件并点击激活链接后即可登录。<br />3、手工验证：注册需后台管理员手工设置会员验证状态。', // 0 - 9         
	'严格限制注册帐号：','是','否','用户注册帐号限制：<br />1、是：注册帐号只允许使用字母、数字和下划线组成且必须由字母开头。<br />&nbsp;　&nbsp;这个设置对后续版本中会员使用二级域名等功能非常有用。<br />2、否：注册用户名可以使用中文，可能有部分特殊字符会被限制。', // 10 -13
	'禁止使用的帐号：','不允许注册的帐号，用英文逗号隔开。','站内搜索：','完全开放','只允许会员搜索','禁用搜索功能','全文搜索：','完全开放','会员全文搜索','禁止全文搜索','为提升程序执行效率可以禁用全文搜索，禁用后将只对标题、关键字及TAG进行搜索。', // 14 - 24
	'搜索请求间隔时间：','秒','在规定的时间内同一IP地址的用户只允许搜索<br />一次，为0时无限制，单位：秒','游客发表评论：','允许未登录评论','必须会员登录发表','评论功能开启：','设置开启评论功能的模块。','评论间隔时间：','分钟','同一IP的用户在规定的时间内只允许对同一ID的<br />内容发表一次评论，为0时无限制，单位：分钟', // 25 - 35
	'在线留言：','完全开放','只允许会员留言','关闭留言','留言间隔时间：','分钟','同一IP的用户在规定的时间内只允许提交<br />一次留言，为0时无限制，单位：分钟', // 36 - 42
	'金钱兑换积分：','开启','关闭','是否允许用户使用金钱购买积分。','金钱与积分兑换比例：','1元钱可以兑换多少积分。','会员注册默认积分：','会员注册后的基础积分','登录增加积分：','在12小时内只计一次，有效的时间内登录增加相应积分。', // 43 - 52
	'评论增加积分：','12小时内只计一次，有效的时间内发表评论增加相应积分。','在线反馈：','完全开放','只允许会员提交反馈','关闭反馈','反馈间隔时间','同一IP的用户在规定的时间内只允许提交<br />一次反馈，为0时无限制，单位：分钟', // 53 -60
	'评论显示模式：','需管理员审核后显示','不用审核直接显示','不建议开启审核功能，建议设置：<br />1、启用 &quot;不用审核直接显示&quot; 模式。<br />2、开启 &quot;必须会员登录发表 &quot; 或是开启会员审核功能。'// 61 - 
);
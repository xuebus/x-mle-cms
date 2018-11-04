<?php
defined('MLEROOT') or die('Access Denied.');
$admin_file = array(
	0 => array(
		'attribute' => array(1,'网站内容管理','',1),
		'submenu' => array(
			array(1,'网站频道管理','channel.png','channel_manage.php',3,1,1),
			array(1,'栏目及分类管理','category.png','category_manage.php',3,1,2),
			array(1,'文章内容管理','paper.png','article_manage.php',3,1,3),
			array(1,'商品管理','goods.png','product_manage.php',3,1,4),
			array(1,'图片集管理','picture.png','picture_manage.php',3,1,5),
			array(1,'下载资源管理','download.png','download_manage.php',3,1,5),
			array(1,'生成静态页面','html.png','html_make.php',3,1,7),
			array(1,'添加频道','channel_add.png','channel_update.php',0,1,21), 
			array(1,'添加栏目','category_add.png','category_update.php',0,1,22),
			array(1,'发布内容','add_paper.png','article_update.php',0,1,23),
			array(1,'添加商品','add_product.png','product_update.php',0,1,24),
			array(1,'发布新图集','picture_add.png','picture_update.php',0,1,5),
			array(1,'添加下载资源','download_add.png','download_update.php',0,1,5),
		),
	),
	1 => array (
		'attribute' => array(1,'系统设置','',2),
		'submenu' => array(
			array(1,'系统全局设置','set_1.png','set_globals.php',3,1,1),
			array(1,'语言站点设置','set_2.png','set_web.php',3,1,2),
			array(1,'会员与功能设置','member_set.png','set_member.php',3,1,3), 
			array(1,'验证安全设置','security.png','set_captcha.php',3,1,4), 
			array(1,'图片裁切及水印','picture.png','set_picture.php',3,1,5),
			array(1,'系统角色管理','user.png','admin_manage.php',3,1,6),
			array(1,'后台菜单及文件','set_3.png','set_file.php',3,1,7),
			array(1,'添加管理员','user_add.png','admin_update.php',0,1,8),
			array(1,'修改密码','','admin_password.php',0,1,9),
			array(1,'上传文件','','upload.php',0,1,10),		
		),
	),
	2 => array(
		'attribute' => array(1,'注册会员管理','18.png',3),
		'submenu' => array(
			array(1,'会员及充值管理','member.png','member_manage.php',3,1,1), 
			array(1,'会员等级设置','user.png','member_rank.php',3,1,2), 
			array(1,'交易及充值记录','log.png','member_transactions.php',3,1,3), 
			array(1,'修改会员资料','','member_update.php',0,1,0),
		),
	),
	4 => array(
		'attribute' => array(1,'数据库及资源管理','05.png',4),
		'submenu' => array(
			array(1,'数据操作日志','log.png','log.php',3,1,1),
			array(1,'数据备份与恢复','database.png','mysql_backup.php',3,1,2),
			array(1,'服务器附件管理','workgroup.png','attachment_manage.php',3,1,3),
		),
	),
	5 => array(
		'attribute' => array(1,'模块及插件管理','05.png',5),
		'submenu' => array(
			array(1,'模块及插件管理','set_3.png','module_manage.php',3,1,1),
			array(1,'UCenter配置','member.png','set_ucenter.php',3,1,2),
			array(1,'留言信息管理','log.png','guestbook_manage.php',3,1,3),
			array(1,'广告管理','ad.png','ad_manage.php',3,1,4),
			array(1,'友情链接管理','link.png','links_manage.php',3,1,5),
			array(1,'添加友情链接','link_add.png','links_update.php',0,1,10),
			array(1,'添加新广告','ad.png','ad_update.php',0,1,11),
			array(1,'回复留言','log.png','guestbook_reply.php',0,1,12),
		),		
	),
	6 => array(
		'attribute' => array(1,'模板风格及语言包','05.png',6),
		'submenu' => array(
			array(1,'安装新模板','set_4.png','template_install.php',3,1,1),
			array(1,'网站模板管理','set_3.png','template_manag.php',3,1,2),
			array(1,'编辑网站模板','log.png','template_update.php',3,1,3),
			array(1,'模板语言包管理','global.png','template_language.php',3,1,4),
		),		
	),
);
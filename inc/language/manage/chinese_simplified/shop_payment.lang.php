<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('ADMIN_PATH') or die('Access Denied.');
// @后台页面语言包（简体中文）
$language['page'] = array(
	'title' => array('支付宝接口设置','财付通接口设置'),
	'alipay' => array(
		0 => '支付宝登录帐号：',
		1 => '合作者身份(PID)：',
		2 => '安全校验码(Key)：',
		3 => array('接口服务类型：','即时到账收款','担保交易收款','双功能收款'),
		4 => '访问模式：',
		5 => array('是否启用：','启用','禁用'),
		6 => '您的签约支付宝登录帐号，通常是一个 Email 地址或手机号。',
		7 => '合作身份者ID，以2088开头的16位纯数字 (partnerID)，您可以通<br />过注册获得一个支付宝的合作者身份ID，拥有该ID，您可以在支付<br />宝网站上查询到该ID产生的所有交易历史。在支付宝商家服务中可<br />以查看您的合作者ID。',
		8 => '安全检验码，以数字和字母组成的32位字符，<br />您可以在支付宝商家服务中查询您的接口key',
		9 => '您签约的接口服务类型名称，强烈建议使用即时到帐收款。<br />即时到帐收款：用户支付后会自动将金额充值到会员帐号下。<br />担保到帐收款：这种方式需支付宝担保进行交易，不会将支<br />付金额充值到会员帐号下，整个交易需要您登录支付宝操作<br />完成。<br />',
		10 => '请求通知访问模式，根据自己的服务器情况进行选择：<br />若支持 SSL 访问请选择 https，若不支持请选择 http',
	),
	'tenpay' => array(
		0 => '财付通商户号：',
		1 => '财付通密钥：',
		2 => array('接口服务类型：','即时到账交易','中介担保交易'),
		3 => array('是否启用：','启用','禁用'),
		4 => '商户ID号，通常为 10 个数字组成 (bargainorID)',
		5 => '财付通密钥，32个字符，只允许输入数字和英文大小写字母的组合 (key)',
		6 => '暂不支持财付通中介担保交易接口',
	),
	'msg' => array(
		0 => '修改电子商务接口参数',
		1 => '操作失败，无法更新配置文件！\r请确认您是否有相应文件的写入权限：\rinc/config/payment.config.php',
	),
	'information' => '1、即时到帐交易：该系统所有电子商业业务均采用会员将资金先充值到会员帐号下然后进行消费的方式，属于虚拟充值类型业务。所以建议使用即时到帐收款，即用户支付成功后会将资金充值到该用户会员帐号下进行消费。<br />2、担保交易：为了方便部分用户的商品可能需要担保交易或其它需要，您可以选择担保交易，担保交易充值不会将资金充值到会员帐号下，用户支付后您需要登录支付宝进行发货、通知用户签收等操作，整个交易过程在支付宝担保的情况下操作完成，该系统的数据会与支付宝同步，用户是否支付成功、支付金额、发货状态、用户是否签收等状态与支付宝是同步的，在交易及充值记录中可以查看。<br />3、网银直联充值：这取决于您签约的平台是否支持。如果在充值时不会直接进入选择的银行支付页面(出现填写收货人信息、会员登录、银行选择等页面)，这可能是您签约的支付平台不支持网银直联方试或您使用了担保交易。',
	'attention' => '支付宝接口无法在本地测试，您必须上传至服务器通过正常域名访问进行测试。本地无法接收到支付宝返回异步通知。',
	// 直联，这取决于您的签约平台是否支持
);
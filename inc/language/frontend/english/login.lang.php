<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
$language['page'] = array(
	'title' => 'User Login',
	'home' => 'Home',
	'location' => 'You Are Here:',
	'not_exist' => 'Sorry, the user does not exist or has been deleted.',
	'password_error' => 'Wrong password, please try again.',
	'mail_activation' => 'The account has not been activated, please log in to your registered email address to receive activation email.',
	'manage_activation' => 'The account has not been verified, please be patient or to notify you of our administrator validation.',
	'refused_login' => 'Sorry, the account has been banned login.',
	'unknown_error' => 'Login failed.',
	'captcha_error' => 'captcha error, please re-enter.',
	'enter_username' => 'Enter Username',
	'warning_enter_username' => 'Please enter the correct login account.',
	'warning_enter_password' => 'Please enter the correct password.',
	'captcha' => 'Captcha',
	'warning_captcha' => 'Enter the captcha.',
	'username' => 'Username:',
	'password' => 'Password:',
	'login' => 'Log in',
	'register' => 'Join Free',
	'tips' => array(
		0 => 'You have not registered? <a href="'.misc::url('register').'">Join Free</a>',
		1 => 'Forgot your password? <a href="member/login.php?action=getpwd">Forgot Password</a>',
		2 => 'Has been registered, have not received activation email? <a href="member/register.php?action=activate">Resend activation email</a>',
	),
	'getpwd' => 'Forgot Your Password?',
	'email' => 'E-mail Address:',
	'submit' => 'Submit',
	'not_match' => 'Username and Email do not match, please re-enter.',
	'reset' => 'Reset Password',
	'new_password' => 'Enter the new password:',
	'confirm_password' => 'Confirm New Password:',
	'submit_button' => 'Submit',
	'pwd_match' => 'Password entries do not match.',
	'pwd_error' => 'Password must be 6-20 characters.',
	'modify_failure' => 'Operation failed, Invalid request.',
	'modify_success' => 'Password reset successfully.',
	'url_invalid' => 'Invalid request, the link has expired.',
	'mail_success' => 'Operation was successful, receiving mail.',
	'mail_failure' => 'Your e-mail has been sent.',
	'mail_title' => '找回用户密码',
	'mail_content' =>  '<div style="font-size:13px; line-height:20px; font-family:Verdana,Geneva,sans-serif;">尊敬的 {#name}，您好：<br />
		这封信是由 {#web} 发送的。<br /><br />
		您收到这封邮件，是因为在我们的网站上这个邮箱地址被登记为用户邮箱，<br />
		且该用户请求使用 Email 重置密码所致。如果您没有提交密码重置的请求<br />
		或不是我们网站的注册用户，请立即忽略并删除这封邮件。只在您确认需<br />
		要重置密码的情况下，才继续阅读下面的内容。<br /><br />
		-------------------------------------------------------------<br /><br />
		您只需在提交请求后的三天之内，通过点击下面的链接重置您的密码：<br />
		注册用户名：{#name}，<a href="{#code_url}">点击这里重置密码</a><br />
		如果上面的链接无法点击，您也可以复制以下链接，粘贴到您浏览器的地址<br />
		栏内，然后按"回车"键打开页面进行操作：<br />
		{#code_url}<br /><br />
		上面的页面打开后，输入新的密码后提交，之后您即可使用新的密码登录网<br />
		站了。您可以在用户控制面板中随时修改您的密码。<br /><br />
		-------------------------------------------------------------<br /><br />
		网站首页地址：<a href="{#web_url}">{#web_url}</a><br />
		重发激活码及修改注册邮箱：<a href="{#web_url}member/register.php?action=activate">{#web_url}member/register.php?action=activate</a><br />
		找回用户密码：<a href="{#web_url}member/login.php?action=getpwd">{#web_url}member/login.php?action=getpwd</a><br />
		会员登录：<a href="{#web_url}member/login.php">{#web_url}member/login.php</a><br />
		新用户注册：<a href="{#web_url}member/register.php">{#web_url}member/register.php</a><br /><br />
		本邮件为系统自动发出，请勿回复。<br /><br />
		此致<br /><br />
		{#web}<br />
		{#time}</div>',
);
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
define(GET_PWD_EFFECTIVE_TIME,259200); 
$uc_config = MLEINC.'/plugins/ucenter/config.inc.php';
is_file($uc_config) && require_once($uc_config);
$member_config = member::get_config(); 
if($action == 'logout'){
	member::logout(); 
	if(true === UC_ENABLED){
		require_once(MLEINC.'/plugins/ucenter/uc_client/client.php');
		echo uc_user_synlogout();
	}
	msgbox('',$config['url']); 
}
USER_LOGIN && empty($_GET) && msgbox('','./'); 
$mle['email_auth'] = $member_config['register_audit'] == '1' ? true : false; 
if($_GET['action'] == 'getpwd'){ 
	$language['page']['title'] = $language['page']['getpwd'];
	$mle['action'] = $template_file = 'getpwd'; 
}
if(is_numeric($_GET['id']) && !empty($_GET['code'])){
	if(true === ip::query(2,GET_PWD_EFFECTIVE_TIME,$_GET['id'],false,false) && member::get_activate_code($_GET['id'],false) == $_GET['code']){ 
		$template_file = 'getpwd'; 
		$mle['action'] = 'reset';
		$language['page']['title'] = $language['page']['reset'];
		$user = member::get_user($_GET['id']); 
		$mle['username'] = $user['username'];
		$mle['userid'] = $_GET['id'];
		$mle['code'] = $_GET['code'];
	} else {
		die($language['page']['url_invalid']); 
	}
}
if($_POST['action'] == 'reset'){
	$url = "login.php?id={$_POST['userid']}&code={$_POST['code']}";
	if(true === member::check_password($_POST['password'])){ 
		if(true === ip::query(2,GET_PWD_EFFECTIVE_TIME,$_POST['userid'],false,false) && member::get_activate_code($_POST['userid'],false) == $_POST['code']){ 
			if(ip::delete(2,GET_PWD_EFFECTIVE_TIME) && $db->execute("DELETE FROM `{$DB['prefix']}ipvisit` WHERE `type` = '2' && `oid` = '{$_POST['userid']}'")){ 
				if(member::modify_password($_POST['userid'],$_POST['password'])){
					if(true === UC_ENABLED){
						require_once(MLEINC.'/plugins/ucenter/uc_client/client.php');
						$u = member::get_user($_POST['userid'],0);
						$err = uc_user_edit($u['username'],'',$_POST['password'],'',1);
						if($err != 1){
							msgbox('Error:UCenter - uc_user_edit() - return '.$err,$url);
						}
					}
					msgbox($language['page']['modify_success'],$config['url'].misc::url('login'));
				} else {
					msgbox($language['page']['modify_failure'],$url);
				}				
			} else {
				msgbox($language['page']['modify_failure'],$url);
			}
		} else {
			msgbox($language['page']['modify_failure'],$url);
		}
	} else {
		msgbox($language['page']['pwd_error'],$url);
	}	
}
if($_POST['action'] == 'getpwd'){
	$username = preg_replace('/[\'\"\\\\\/]/','',trim($_POST['username']));
	$email = preg_replace('/[\'\"\\\\\/]/','',trim($_POST['email']));
	$result = $db->query("SELECT `id` FROM `{$DB['prefix']}members` WHERE `username` = '{$username}' && `email` = '{$email}' LIMIT 1",1);
	$uid = $result['id'];
	if(is_numeric($uid) && ip::add(2,GET_PWD_EFFECTIVE_TIME,$uid)){ 
		$title = $language['page']['mail_title'].' - '.WEB_TITLE;
		$url = $config['url'].'member/login.php?id='.$uid.'&code='.member::get_activate_code($uid,false);
		$content = str_replace(array('{#web}','{#name}','{#web_url}','{#code_url}','{#time}'),array(WEB_TITLE,$username,$config['url'],$url,date(MLE_DATE_FORMAT_LONG,$gmt_time)),$language['page']['mail_content']);
		if(misc::email($email,$username,$title,$content) === true){
			msgbox($language['page']['mail_success'],$config['url'].misc::url('login'));
		} else {
			msgbox($language['page']['mail_failure'],'login.php?action=getpwd');
		}		
	} else {
		msgbox($language['page']['not_match'],'login.php?action=getpwd');
	}
}
if(!empty($_POST['username']) && !empty($_POST['password'])){
	$login_page = $config['url'].'member/login.php'; 
	empty($_GET['goto']) or $login_page .= '?goto='.$_GET['goto'];
	$captcha = true;
	if($mle['login_captcha']){
		$img = new captcha();
		$captcha = $img->check($_POST['captcha']);
	}
	if($captcha === true){
		true === UC_ENABLED && $uc_login_data = member::ucenter_login($_POST['username'],$_POST['password'],array($language['page']['not_exist'],$language['page']['password_error']),$login_page);
		switch(member::login($_POST['username'],$_POST['password'],numeric($expire))){
			case 0 : msgbox($language['page']['not_exist'],$login_page); break; 
			case -1 : msgbox($language['page']['password_error'],$login_page); break; 
			case -2 : msgbox($language['page']['mail_activation'],$login_page); break; 
			case -3 : msgbox($language['page']['manage_activation'],$login_page); break; 
			case -4 : msgbox($language['page']['refused_login'],$login_page); break; 
			case -5 : msgbox($language['page']['unknown_error'],$login_page); break; 
			default : 
				if(true === UC_ENABLED && $uc_login_data[0] > 0){
					echo uc_user_synlogin($uc_login_data[0]);
				}
				$goto = @base64_decode($_GET['goto']); 
				empty($goto) ? msgbox('',$config['url'].'member/') : msgbox('',$goto);
			break; 
		}
	} else { 
		msgbox($language['page']['captcha_error'],$login_page);
	}
}
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = misc::url('login');
	$content = $mlecms->fetch($template_file); 
	$html->make($content,$static_path);
}
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
$uc_config = MLEINC.'/plugins/ucenter/config.inc.php';
is_file($uc_config) && require_once($uc_config);
$member_config = member::get_config(); 
$mle['captcha'] = is_array($captcha_config['open']) && in_array(1,$captcha_config['open']) ? true : false; 
$mle['strictly'] = $member_config['username_strictly'] == 1 ? true : false; 
$mle['email_auth'] = $member_config['register_audit'] == '1' ? true : false; 
is_numeric($_GET['id']) && isset($_GET['code']) && (member::activate($_GET['id'],$_GET['code']) ? msgbox($language['page']['activate_success'],$config['url'].misc::url('login')) : msgbox($language['page']['activate_failure'],'register.php?action=activate'));
if($_POST['act'] == 'activate' && !empty($_POST['username']) && !empty($_POST['password'])){
	$member_config['allow_reg'] != 1 && msgbox($language['page']['prohibit_register']); 
	$_login = member::login($_POST['username'],$_POST['password']); 
	member::logout(); 
	if($_login == -2){ 
		if($_POST['modify_mail'] != '1' || ($_POST['modify_mail'] == '1' && member::modify_mail($_POST['username'],$_POST['email']))){
			$user = member::get_user($_POST['username'],1); 
			$title = $language['page']['activate_subject'].' - '.WEB_TITLE;
			$url = $config['url'].'member/register.php?id='.$user['id'].'&code='.member::get_activate_code($user['id']);
			$content = str_replace(array('{#web}','{#name}','{#web_url}','{#code_url}','{#time}'),array(WEB_TITLE,$_POST['username'],$config['url'],$url,date(MLE_DATE_FORMAT_LONG,$gmt_time)),$language['page']['activate_email']);
			if(misc::email($user['email'],$user['username'],$title,$content) === true){
				msgbox($language['page']['resent_success'],$config['url'].misc::url('login'));
			} else {
				msgbox($language['page']['resent_failure'],'register.php?action=activate');
			}
		} else {
			msgbox($language['page']['modify_failure'],'register.php?action=activate');
		}
	} elseif ($_login > 0 || $_login < -2) { 
		msgbox($language['page']['has_activate'],'CURRENTS');
	} else { 
		msgbox($language['page']['login_error'],'CURRENTS');
	}
}
if($_POST['act'] == 'register' && !empty($_POST['username']) && !empty($_POST['password'])){
	$member_config['allow_reg'] != 1 && msgbox($language['page']['prohibit_register']); 
	if($mle['captcha']){
		$img = new captcha();
		$img->check(trim($_POST['captcha'])) or msgbox($language['page']['captcha_error'],'CURRENT');
	}
	if(true === UC_ENABLED){ 
		$msg = array(
			0 => $language['page']['strictly_username'],
			1 => $language['page']['ban_username'],
			2 => $language['page']['username_exists'],
			3 => $language['page']['mail_error'],
			4 => $language['page']['email_exists'],
		);
		$uc_reg_id = member::ucenter_register($_POST['username'],$_POST['password'],$_POST['email'],$msg); 
	}
	$uid = member::register($_POST['username'],$_POST['password'],$_POST['email']);
	if($uid > 0){ 
		switch ($member_config['register_audit']){
			case 0 : 
				if(member::login($_POST['username'],$_POST['password']) > 0){ 
					if(true === UC_ENABLED){  
						list($ucid,$username,$password,$email) = uc_user_login($_POST['username'], $_POST['password']);
						$ucid > 0 or msgbox($language['page']['login_failed'].'[UCenter:'.$ucid.']',$config['url'].misc::url('login')); 
						echo uc_user_synlogin($ucid);
					}
					msgbox('','center.php');
				} else { 
					msgbox($language['page']['login_failed'],$config['url'].misc::url('login')); 
				}
			break; 
			case 1 : 
				$title = $language['page']['activate_subject'].' - '.WEB_TITLE;
				$url = $config['url'].'member/register.php?id='.$uid.'&code='.member::get_activate_code($uid);
				$content = str_replace(array('{#web}','{#name}','{#web_url}','{#code_url}','{#time}'),array(WEB_TITLE,$_POST['username'],$config['url'],$url,date(MLE_DATE_FORMAT_LONG,$gmt_time)),$language['page']['activate_email']);
				if(misc::email($_POST['email'],$_POST['username'],$title,$content) === true){
					msgbox($language['page']['receive_mail'],$config['url']);
				} else {
					msgbox($language['page']['mail_failure'],'register.php?action=activate');
				}
			break; 
			case 2 : 
				msgbox($language['page']['admin_audit'],$config['url']); 
			break; 
			default: break;
		}		
	} else {
		true === UC_ENABLED && $uc_reg_id > 0 && @uc_user_delete($uc_reg_id);
		switch($uid){
			case 0 : msgbox($language['page']['general_error'],'CURRENT'); break; 
			case -1 : msgbox($mle['strictly'] ? $language['page']['strictly_username'] : $language['page']['general_username'],'CURRENT'); break; 
			case -2 : msgbox($language['page']['mail_error'],'CURRENT'); break; 
			case -3 : msgbox($language['page']['pwd_error'],'CURRENT'); break; 
			case -4 : msgbox($language['page']['ban_username'],'CURRENT'); break; 
			case -5 : msgbox($language['page']['username_exists'],'CURRENT'); break; 
			case -6 : msgbox($language['page']['email_exists'],'CURRENT'); break; 
			default : die('Undefined Options.'); break;
		}	
	}
}
$_GET['action'] == 'activate' && $template_file = 'activate';
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = misc::url('register');
	$content = $mlecms->fetch($template_file); 
	$html->make($content,$static_path);
}
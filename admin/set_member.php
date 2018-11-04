<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$member_config = member::get_config();
if(isset($_POST['allow_reg'])){
	$_POST['search_interval'] = numeric($_POST['search_interval']);
	$_POST['comment_enabled'] = (array)$_POST['comment_enabled']; 
	$_POST['comment_interval'] = numeric($_POST['comment_interval']);
	$_POST['message_interval'] = numeric($_POST['message_interval']);
	$_POST['feedback_interval'] = numeric($_POST['feedback_interval']);
	$_POST['ratio_scores'] = numeric($_POST['ratio_scores']);
	$_POST['register_scores'] = numeric($_POST['register_scores']);
	$_POST['login_scores'] = numeric($_POST['login_scores']);
	$_POST['comment_scores'] = numeric($_POST['comment_scores']);
	if(array2php($_POST,'member_config',MLEINC.'/config/member.config.php')){
		admin::logs(3,$language['page'][0]."({$language['common']['successful']})"); 
		msgbox($language['common']['successful'],'CURRENT');
	} else {
		admin::logs(3,$language['page'][0]."({$language['common']['failed']})"); 
		msgbox($language['common']['failed'],'CURRENT'); 
	}
}
$mle['member'] = $member_config;
require_once(ADMIN_PATH.'/footer.php'); 
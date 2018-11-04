<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
$mlecms->caching = false; 
USER_LOGIN or msgbox('',$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI']));
if(isset($_POST['old_password'])){
	$mle_user_info['password'] == md5(md5($_POST['old_password']).md5($mle_user_info['encryption'])) or msgbox($language['page']['msg'][6]); 
	!empty($mle_user_info['problem']) && $mle_user_info['answer'] != $_POST['old_answer'] && msgbox($language['page']['msg'][7]); 
	is_email($_POST['email']) or msgbox($language['page']['msg'][2]); 
	$mle_user_info['email'] != $_POST['email'] && member::is_used($_POST['email'],1) && msgbox($language['page']['msg'][8]); 
	!empty($_POST['new_password']) && !member::check_password($_POST['new_password']) && msgbox($language['page']['msg'][4]); 
	(!empty($_POST['new_problem']) && empty($_POST['new_answer'])) || (empty($_POST['new_problem']) && !empty($_POST['new_answer'])) && msgbox($language['page']['msg'][5]); 
	$sql = "UPDATE `{$DB['prefix']}members` SET `email` = '{$_POST['email']}' ";
	empty($_POST['new_password']) or $sql .= ",`password` = '".md5(md5($_POST['new_password']).md5($mle_user_info['encryption']))."' ";
	empty($_POST['new_answer']) or $sql .= ",`problem` = '{$_POST['new_problem']}',`answer` = '{$_POST['new_answer']}' ";
	$sql .= "WHERE `id` = '".USER_ID."'";
	if($db->execute($sql)){
		$n_pwd = empty($_POST['new_password']) ? $mle_user_info['password'] : md5(md5($_POST['new_password']).md5($mle_user_info['encryption']));
		setcookie('mlecms_user_auth',encryption(USER_ID.$n_pwd.$mle_user_info['encryption'],'ENCOD',WEBKEY),0,'/');
		$uc_config = MLEINC.'/plugins/ucenter/config.inc.php';
		is_file($uc_config) && require_once($uc_config);
		if(true === UC_ENABLED){
			require_once(MLEINC.'/plugins/ucenter/uc_client/client.php');
			$err = uc_user_edit($_POST['username'],$_POST['old_password'],$_POST['new_password'],$_POST['email'],1); 
			if($err != 1){
				msgbox('Error:UCenter - uc_user_edit() - return '.$err,$url);
			}
		}
		msgbox($language['page']['msg'][9],'pwd_modify.php');
	} else {
		msgbox($language['page']['msg'][10]);
	}
}
require_once(MLEINC.'/include/footer.php');
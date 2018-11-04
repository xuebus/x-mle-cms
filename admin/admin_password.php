<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(isset($_POST['password1'])){
	$aid = $_SESSION['admin']['login']['id'];
	$old_pwd = $db->query("SELECT * FROM `{$db->prefix}admin` WHERE `ID` = '{$aid}' LIMIT 1",1);
	if(md5(md5($_POST['password1']).md5($old_pwd['encryption'])) != $old_pwd['password']){
		msgbox($language['page'][9],'CURRENTS'); 
	}
	if(!preg_match('/^[\w]{5,20}$/',$_POST['password2'])){
		msgbox($language['page'][6],'CURRENTS'); 
	} else {
		$new_password = md5(md5($_POST['password2']).md5($old_pwd['encryption']));
		if($db->execute("UPDATE `{$db->prefix}admin` SET `password` = '{$new_password}' WHERE `id` = '{$aid}';")){
			admin::logs(3,$language['page'][0].'，'.$language['common']['successful'].'(id:'.$id.')'); 
			msgbox($language['page'][10],'login.php?action=logout'); 	
		} else {
			admin::logs(3,$language['page'][0].','.$language['common']['failed']); 
			msgbox($language['common']['failed'],'CURRENTS');				
		}	
	}	
}
require_once(ADMIN_PATH.'/footer.php'); 
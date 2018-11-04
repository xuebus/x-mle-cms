<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
is_numeric($id) or die('Parameter Error.');
if(isset($reply)){
	$reply = nl2br($_POST['reply']);
	if($db->execute("UPDATE  `{$DB['prefix']}guestbook` SET `reply` =  '{$reply}',`replyadmin` = '{$_SESSION['admin']['login']['username']}',`replytime` = '{$gmt_time}' WHERE `id` = '{$id}';")){
		admin::logs(3,$language['page'][0]."，{$language['common']['successful']}(id:{$id})"); 
		msgbox($language['common']['successful'],'guestbook_manage.php'); 
	} else { 
		admin::logs(3,$language['page'][0]."，{$language['common']['failed']}(id:{$id})"); 
		msgbox($language['common']['failed'],'BACK'); 
	}
}
if(!$mle['guestbook'] = $db->query("SELECT * FROM `{$DB['prefix']}guestbook` WHERE `lang` = '".LANG."' && `id` = '{$_GET['id']}' LIMIT 1",1)){
	msgbox($language['page'][1],'BACK');	
}
require_once(ADMIN_PATH.'/footer.php'); 
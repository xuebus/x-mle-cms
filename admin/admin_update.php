<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$language['page']['title'] = is_numeric($_GET['id']) ? $language['page'][1] : $language['page'][0]; 
if(!is_numeric($_GET['id'])){
	$mle['action'] = 'add'; 
	$mle['user']['purviews'] = $mle['user'] = array(); 
} else {
	$mle['action'] = 'update'; 
	$mle['user'] = $db->query("SELECT * FROM `{$DB['prefix']}admin` WHERE `id` = '{$_GET['id']}' LIMIT 1",1);
	$mle['user'] or die('Parameter Error.');
	$mle['user']['purviews'] = explode(',',$mle['user']['purviews']);
}
if($action == 'add' || ($action == 'update' && is_numeric($_GET['id']))){
	if(!preg_match('/^[\w]{5,20}$/',$_POST['username'])){
		msgbox($language['page']['info'][0],'CURRENTS');
	}
	if($db->query("SELECT `id` FROM `{$DB['prefix']}admin` WHERE `username` = '{$_POST['username']}' && `id` != '{$_GET['id']}' LIMIT 1")){
		msgbox('用户名已经存在。','CURRENTS');
	}
	$purviews = is_array($_POST['purviews']) ? implode(',',$_POST['purviews']) : ''; 
	if($action == 'add'){
		if(!preg_match('/^[\w]{5,20}$/',$_POST['password'])){
			msgbox($language['page']['info'][1],'CURRENTS');
		}		
		$log_type = 2;
		$encryption = random(8); 
		$password = md5(md5($_POST['password']).md5($encryption));
		$sql = "INSERT INTO `{$DB['prefix']}admin`(`username`,`password`,`encryption`,`loginip`,`loginaddress`,`logintime`,`frequency`,`purviews`,`level`) VALUES (";
		$sql .="'{$_POST['username']}', '{$password}', '{$encryption}','','','','0','{$purviews}','".($_POST['level'] == 1 ? 1 : 0)."');";
	} else {
		if($_POST['password'] != '' && !preg_match('/^[\w]{5,20}$/',$_POST['password'])){
			msgbox($language['page']['info'][1],'CURRENTS');
		}
		if($_GET['id'] == $_SESSION['admin']['login']['id'] && $_POST['level'] != 1){
			msgbox($language['page']['info'][2],'CURRENTS');	
		}
		$log_type = 3;
		$password = empty($_POST['password']) ? $mle['user']['password'] : md5(md5($_POST['password']).md5($mle['user']['encryption']));
		$sql = "UPDATE `{$DB['prefix']}admin` SET `username` = '{$_POST['username']}',`password` = '{$password}',`purviews` = '{$purviews}',`level` = '".($_POST['level'] == 1 ? 1 : 0)."' WHERE `id` = '{$_GET['id']}';";	
	}	
	if($db->execute($sql)){
		$id = $action == 'add' ? $db->get_last_id() : $_GET['id'];
		admin::logs($log_type,$language['page']['title'].'，'.$language['common']['successful'].'(id:'.$id.')'); 
		msgbox($language['common']['successful'],'admin_manage.php'); 	
	} else {
		admin::logs($log_type,$language['page']['title'].','.$language['common']['failed']); 
		msgbox($language['common']['failed'],'CURRENTS');		
	}
}
$file_list = array();
$excluded = array('admin_update.php','admin_manage.php'); 
foreach($admin_file as $n){
	if($n['attribute'][0] == 1){
		foreach($n['submenu'] as $u){
			$u[5] == 1 && $u[0] == 1 && !in_array($u[3],$excluded) && $file_list[] = array($u[3],$u[1]); 
		}	
	}	
}
$mle['file_list'] = $file_list;
require_once(ADMIN_PATH.'/footer.php'); 
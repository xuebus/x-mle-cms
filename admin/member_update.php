<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
is_numeric($id) or die($language['page']['non_numeric']);
$mle['user'] = $db->query("SELECT * FROM `{$DB['prefix']}members` WHERE `id` = '{$id}' LIMIT 1",1);
$mle['user'] or die($language['page']['nodata']); 
if(isset($_POST['username'])){
	$money = numeric($money);
	$usemoney = numeric($usemoney);
	$scores = numeric($scores);
	$frequency = numeric($frequency);
	$jointime = $mle['user']['jointime']; 
	$logintime = $mle['user']['logintime']; 
	$joinaddress = $mle['user']['joinaddress']; 
	$loginaddress = $mle['user']['loginaddress']; 
	$sql = '';
	$password = empty($_POST['password']) ? $mle['user']['password'] : md5(md5($_POST['password']).md5($mle['user']['encryption']));
	$field = $db->get_fields('members',array('id','encryption')); 
	$sex = is_numeric($sex) ? $sex : 2;
	$level = is_numeric($level) ? $level : 0;
	foreach($field as $n){$sql .= "`{$n}` = '${$n}',";}
	if($db->execute("UPDATE `{$DB['prefix']}members` SET ".rtrim($sql,',')." WHERE `id` = '{$id}';")){
		admin::logs(3,$language['page']['title'].'，'.$language['common']['successful'].'(id:'.$id.')'); 
		msgbox($language['common']['successful'],'member_manage.php'); 	
	} else {
		admin::logs(3,$language['page']['title'].','.$language['common']['failed'].'(id:'.$id.')'); 
		msgbox($language['common']['failed'],'CURRENTS');			
	}
}
$mle['member_rank'] = member::rank();
$mle['user']['jointime'] = date('Y-m-d H:i:s',$mle['user']['jointime']);
$mle['user']['logintime'] = explode(',',$mle['user']['logintime']);
$mle['user']['logintime'][0] = is_numeric($mle['user']['logintime'][0]) ? date('Y-m-d H:i:s',$mle['user']['logintime'][0]) : 0;
$mle['user']['logintime'][1] = is_numeric($mle['user']['logintime'][1]) ? date('Y-m-d H:i:s',$mle['user']['logintime'][1]) : 0;
$mle['user']['logintime'] = $mle['user']['logintime'][0].' 、'.$mle['user']['logintime'][1];
require_once(ADMIN_PATH.'/footer.php'); 
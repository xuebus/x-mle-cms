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
	$mle['links'] = array('sort' => 100,'type' => 0,'audit' => 1,'weburl' => 'http://',);
} else {
	$mle['action'] = 'update';
	$mle['links'] = array();
	$sql = "SELECT * FROM `{$DB['prefix']}links` WHERE `lang` = '".LANG."' && `id` = '{$_GET['id']}' LIMIT 1";
	if(!$mle['links'] = $db->query($sql,1)){
		msgbox($language['page'][25],'BACK');	
	}	
	$mle['links']['preview_logo_url'] = empty($mle['links']['logourl']) ? NULL : (substr($mle['links']['logourl'],0,7) == 'http://' ? $mle['links']['logourl'] : '../'.$mle['links']['logourl']); //Logo预览URL
}
if($action == 'add' || ($action == 'update' && is_numeric($_GET['id']))){
	$_POST = html_chars($_POST);
	$type = $type == 1 ? 1 : 0;
	$sort = numeric($sort);
	$audit = $audit == 1 ? 1 : 0;
	if($action == 'add'){
		$sql = "INSERT INTO `{$DB['prefix']}links` (`lang`,`type`,`webname`,`color`,`weburl`,`logourl`,`webmaster`,`contact`,`info`,`sort`,`audit`,`addtime`) VALUES ";
		$sql .= "({$lang},'{$type}','{$_POST['webname']}','{$_POST['color']}','{$_POST['weburl']}','{$_POST['logourl']}','{$_POST['webmaster']}','{$_POST['contact']}','{$_POST['info']}','{$sort}','{$audit}', '{$gmt_time}');";
		$ad = 2;
	} else {
		$ad = 3;
		$sql = "UPDATE `{$DB['prefix']}links` SET `type` = '{$type}',`webname` = '{$_POST['webname']}',`color` = '{$_POST['color']}',`weburl` = '{$_POST['weburl']}',`logourl` = '{$_POST['logourl']}',`webmaster` = '{$_POST['webmaster']}',`contact` = '{$_POST['contact']}',`info` = '{$_POST['info']}',`sort` = '{$sort}',`audit` = '{$audit}' WHERE `id` = '{$_GET['id']}';";	
	}
	if($db->execute($sql)){
		$id = $db->get_last_id();
		admin::logs($ad,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
		msgbox($language['common']['successful'],'links_manage.php'); 
	} else { 
		admin::logs($ad,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'BACK'); 
	}	
}
require_once(ADMIN_PATH.'/footer.php'); 
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(is_numeric($_GET['del'])){
	if($db->query("SELECT `id` FROM `{$DB['prefix']}category` WHERE `nexus` LIKE '%,{$_GET['del']},%' && `id` != '{$_GET['del']}' LIMIT 1",1)){
		admin::logs(4,$language['page']['delete_section'].'，'.$language['common']['failed'].'(id:'.$_GET['del'].')，'.$language['page']['sub_exist']);
		msgbox($language['page']['sub_exist'],'CURRENT'); 
	}
	switch ($_GET['module']){
		case 'MO001x' : $table = 'article'; break;
		case 'MO002x' : $table = 'product'; break;
		case 'MO003x' : $table = 'picture'; break;
		case 'MO004x' : $table = 'download'; break;
		default: die('Undefined Parameters.'); break;
	}
	$table = $DB['prefix'].$table;
	if($db->query("SELECT `id` FROM `{$table}` WHERE `category` LIKE '%,{$_GET['del']},%';",1)){
		admin::logs(4,$language['page']['delete_section'].'，'.$language['common']['failed'].'(id:'.$_GET['del'].')，'.$language['page']['content_exist']);
		msgbox($language['page']['content_exist'],'CURRENT'); 
	}
	if($db->execute("DELETE FROM `{$DB['prefix']}category` WHERE `id` = '{$_GET['del']}'")){
		admin::logs(4,$language['page']['delete_section'].'，'.$language['common']['successful'].'(id:'.$_GET['del'].')'); 
		msgbox('','CURRENT'); 	
	} else {
		admin::logs(4,$language['page']['delete_section'].'，'.$language['common']['failed'].'(id:'.$_GET['del'].')');
		msgbox($language['common']['failed'],'CURRENT'); 
	}
}
$mle['channel'] = $db->query("SELECT a.* FROM `{$DB['prefix']}channel` a LEFT JOIN `{$DB['prefix']}module` b ON a.`module` = b.`modcode` WHERE a.`lang` = '".LANG."' && b.`type` = '1' ORDER BY a.`sort` ASC,a.`id` ASC");
$mle['category_all'] = category::order($db->query("SELECT * FROM `{$DB['prefix']}category` ORDER BY `sort` ASC,`id` ASC")); 
foreach($mle['channel'] as &$n){
	$mle['category'][$n['id']] = array();
	foreach($mle['category_all'] as &$m){
		$m['div_indentation'] = 40*$m['level'];		
		$m['channel'] == $n['id'] && $mle['category'][$n['id']][] = $m;
	}
	$n['div_height'] = 40*count($mle['category'][$n['id']]);
}
require_once(ADMIN_PATH.'/footer.php'); 
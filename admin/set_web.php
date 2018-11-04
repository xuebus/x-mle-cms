<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(isset($_POST['name'])){
	$copyright = $_POST['copyright']; 
	$_POST = html_chars($_POST);
	$_POST['copyright'] = $copyright;
	$field = $val = $field_val = NULL;
	foreach($_POST as $i => $n){
		$field .= '`'.$i.'`,'; 
		$val .= "'".$n."',";
		$field_val .= '`'.$i."` = '".$n."',";
	}
	$field .= '`lang`';
	$val .= "'{$lang}'";
	$field_val .= "`lang` = '{$lang}'";
	if($db->execute("INSERT INTO `{$DB['prefix']}website` ({$field}) values ({$val}) ON DUPLICATE KEY UPDATE {$field_val}")){
		admin::logs(2,$language['page']['log']."，{$language['common']['successful']}"); 
		msgbox($language['common']['successful'],'CURRENTS'); 
	} else {
		admin::logs(2,$language['page']['log']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'CURRENTS'); 
	}
}
$mle['template_list'] = template::get_list();
$lang_path = '../inc/language/frontend/';
$folder = scan_dir($lang_path);
$mle['lang_dir'] = array();
foreach($folder as $n){
	is_dir($lang_path.$n) && $mle['lang_dir'][] = $n;
}
$web['copyright'] = html_chars($web['copyright']);
require_once(ADMIN_PATH.'/footer.php'); 
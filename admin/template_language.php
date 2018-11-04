<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$lang_path = '../inc/language/frontend/'; 
$_GET['dir'] = preg_replace("/[^0-9a-zA-Z_-]/",'',$_GET['dir']);
$_GET['file'] = preg_replace("/[^0-9a-zA-Z._-]/",'',$_GET['file']);
$folder = scan_dir($lang_path);
$mle['lang_dir'] = array();
foreach($folder as $n){
	is_dir($lang_path.$n) && $mle['lang_dir'][] = $n;
}
if(!empty($_GET['dir']) && is_dir($lang_path.$_GET['dir'])){
	$dir = $_GET['dir'];
} else {
	if(!empty($mle['lang_dir'][0])){
		$dir = $mle['lang_dir'][0];
	} else {
		die($language['page'][2].$lang_path);		
	}
}
$lang_path .= $dir.'/'; 
is_dir($lang_path) or die($language['page'][3].$lang_path); 
$mle['dir'] = $dir; 
$mle['file_name'] = is_file($lang_path.$_GET['file']) ? $_GET['file'] : 'common.lang.php';
$mle['file_title'] = isset($language['page'][$mle['file_name']]) ? $language['page'][$mle['file_name']] : ''; 
$mle['file_code'] = htmlspecialchars(@file_get_contents($lang_path.$mle['file_name']));
if(isset($_POST['code'])){
	if(@file_put_contents($lang_path.$mle['file_name'],stripcslashes($_POST['code']))){
		admin::logs(3,$language['page'][0].'，'.$language['common']['successful'].'：'.$lang_path.$mle['file_name']);
		msgbox($language['common']['successful'],'CURRENTS'); 
	} else {
		admin::logs(3,$language['page'][0].'，'.$language['common']['failed'].'：'.$lang_path.$mle['file_name']);
		msgbox($language['page'][7].$lang_path.$mle['file_name']); 
	}
}
$file = $file_list = array();
$file = scan_dir($lang_path);
foreach($file as $i => $n){
	$fn = $lang_path.$n;
	if(is_file($fn) && !preg_match('/[\x80-\xff]./',$n) && substr($n,-9) == '.lang.php'){ 
		$file_list[$i][0] = $n; 
		$file_list[$i][1] = isset($language['page'][$n]) ? $language['page'][$n] : ''; 
	}
}
$mle['file_list'] = $file_list;
require_once(ADMIN_PATH.'/footer.php');
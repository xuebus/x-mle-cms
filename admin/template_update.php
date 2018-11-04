<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$mle['template_list'] = template::get_list();
$template_path = '../inc/templates/frontend/'; 
$suffix = TEMPLATE_SUFFIX; 
$_GET['dir'] = preg_replace("/[^0-9a-zA-Z_-]/",'',$_GET['dir']);
$_GET['file'] = preg_replace("/[^0-9a-zA-Z._-]/",'',$_GET['file']);
if(!empty($_GET['dir']) && is_dir($template_path.$_GET['dir'])){
	$dir = $_GET['dir'];
} else {
	if(!empty($mle['template_list'][0]['dir'])){
		$dir = $mle['template_list'][0]['dir'];
	} else {
		die($language['page'][2].$template_path);		
	}
}
$template_path .= $dir.'/'; 
is_dir($template_path) or die($language['page'][3].$template_path); 
$mle['dir'] = $dir; 
$mle['file_name'] = is_file($template_path.$_GET['file']) ? $_GET['file'] : ('index'.$suffix);
$mle['file_title'] = isset($language['page'][rtrim($mle['file_name'],$suffix)]) ? $language['page'][rtrim($mle['file_name'],$suffix)] : ''; 
$mle['file_code'] = htmlspecialchars(@file_get_contents($template_path.$mle['file_name']));
if(isset($_POST['code'])){
	if(@file_put_contents($template_path.$mle['file_name'],stripcslashes($_POST['code']))){
		admin::logs(3,$language['page'][0].'，'.$language['common']['successful'].'：'.$template_path.$mle['file_name']);
		msgbox($language['common']['successful'],'CURRENTS'); 
	} else {
		admin::logs(3,$language['page'][0].'，'.$language['common']['failed'].'：'.$template_path.$mle['file_name']);
		msgbox($language['page'][7].$template_path.$mle['file_name']); 
	}
}
$file = $file_list = array();
$file = scan_dir($template_path);
foreach($file as $i => $n){
	$fn = $template_path.$n;
	$fn_suffix = '.'.pathinfo($n,PATHINFO_EXTENSION);
	if(is_file($fn) && ($fn_suffix == $suffix || $fn_suffix == '.css' || $fn_suffix == '.php') && !preg_match('/[\x80-\xff]./',$n)){ 
		$file_list[$i][0] = $n; 
		$pure = basename($n,$fn_suffix); 
		$file_list[$i][1] = isset($language['page'][$pure]) ? $language['page'][$pure] : ''; 
		$fn_suffix == '.css' && $file_list[$i][1] = $language['page'][8];
	}
}
$mle['file_list'] = $file_list;
require_once(ADMIN_PATH.'/footer.php');
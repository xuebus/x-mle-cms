<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
require_once(MLEINC.'/config/picture.config.php');
$mle['module'] = module::get(1);
if(isset($_POST['watermark'])){
	$pics_cfg = $_POST;
	foreach($mle['module'] as $m){
		foreach ($pics_cfg[$m['modcode']] as &$n){
			$n[0] = $n[0] == 1 ? 1 : 0;
			$n[1] = $n[1] < 10 ? 10 : $n[1];
			$n[2] = $n[2] < 10 ? 10 : $n[2];
			$n[3] = $n[3] == 1 ? 1 : 0;
			ksort($n); 
		}
	}
	is_numeric($pics_cfg['cut']['conditions'][0]) or $pics_cfg['cut']['conditions'][0] = 0;
	is_numeric($pics_cfg['cut']['conditions'][1]) or $pics_cfg['cut']['conditions'][1] = 0;
	is_numeric($pics_cfg['watermark']['request'][0]) or $pics_cfg['watermark']['request'][0] = 0;
	is_numeric($pics_cfg['watermark']['request'][1]) or $pics_cfg['watermark']['request'][1] = 0;
	is_numeric($pics_cfg['watermark']['x']) or $pics_cfg['watermark']['x'] = 0;
	is_numeric($pics_cfg['watermark']['y']) or $pics_cfg['watermark']['y'] = 0;
	is_numeric($pics_cfg['watermark']['size']) or $pics_cfg['watermark']['size'] = 20;
	is_numeric($pics_cfg['watermark']['angle']) or $pics_cfg['watermark']['angle'] = 0;
	substr($pics_cfg['watermark']['pics'],0,3) == '../' or $pics_cfg['watermark']['pics'] = '../'.$pics_cfg['watermark']['pics'];
	$pics_cfg['watermark']['truetype'] = '../inc/fonts/'.$pics_cfg['watermark']['truetype'];
	if(array2php($pics_cfg,'picture_config',MLEINC.'/config/picture.config.php')){
		admin::logs(3,$language['page']['update_page']."({$language['common']['successful']})"); 
		msgbox($language['common']['successful'],'CURRENT');
	} else {
		admin::logs(3,$language['page']['update_page']."({$language['common']['failed']})"); 
		msgbox($language['page']['failure'],'CURRENT'); 
	}	
}
$mle['picture_config'] = $picture_config; 
$mle['gd_info'] = (function_exists("gd_info") && extension_loaded('gd')) ? gd_info() : NULL; 
$ttf_dir = MLEINC.'/fonts/';
$ttf_files = scan_dir($ttf_dir);
$mle['ttf_files'] = array();
foreach($ttf_files as $n){
	$ns = $ttf_dir.$n;
	if(is_file($ns) && strtolower(pathinfo($ns,PATHINFO_EXTENSION)) == 'ttf'){
		$mle['ttf_files'][] = $n;
	}
}
$mle['preview_failed'] = 1;
$mle['watermark_preview'] = '../inc/tmp/other/watermark_preview.jpg';
$pics = new picture();
$pics->watermark['file'] = '../inc/images/watermark_preview_bg.jpg';
$pics->watermark['rename'] = $mle['watermark_preview'];
if($pics->watermark() === false) $mle['preview_failed'] = $pics->info;	
require_once(ADMIN_PATH.'/footer.php'); 
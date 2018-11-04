<?php
/*
* Copyright © 2010-2012 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
$mlecms->assign('config',$config);
$mlecms->assign('web',$web); 
$mlecms->assign('lang',$language); 
$template_variable = array(
	'get' => $_GET, 
	'cookie' => $_COOKIE, 
	'edition' => MLECMS_EDITION, 
	'version' => MLECMS_VERSION, 
	'release' => MLECMS_RELEASE, 
	'dynamic_mode' => MLE_URL_MODE == 1 ? true : false, 
	'is_login' =>  USER_LOGIN, 
	'user' => $mle_user_info, 
);
$mlecms->assign('mle',array_merge($mle,$template_variable));
empty($template_file) && $template_file = basename($PHP_SELF,'.php');
$template_file .= TEMPLATE_SUFFIX;
$fp = $mlecms->template_dir[0].$template_file;
if(HTML_MAKE_MODE && !is_file($fp)){
	$mlecms->template_dir = array(MLEINC.'/data/'); 
	$template_file = 'not_template.tpl';
} else {
	is_file($fp) or (DEBUGGING ? die($language['common']['not_found_template'] .$fp) : die());
}
if(!HTML_MAKE_MODE){
	if($config['static'] != 3){
		$mlecms->display($template_file,MLE_TEMPLATE_CACHE_ID);
	} else { 
		$content = $mlecms->fetch($template_file,MLE_TEMPLATE_CACHE_ID);
		$pattern = array(
			'/\"(article|product|photo|download)\.php\?pid\=([0-9]+)&page\=([0-9]+)\"/i',
			'/\"(article|product|photo|download)\.php\?pid\=([0-9]+)\"/i',
			'/\"(article|product|photo|download)\.php\?page\=([0-9]+)\"/i',
			'/\"(list|category|slide|soft)\.php\?cid\=([0-9]+)&page\=([0-9]+)\"/i',
			'/\"(list|category|slide|soft)\.php\?cid\=([0-9]+)\"/i',
			'/\"(view|detail|show|down)\.php\?id\=([0-9]+)&page\=([0-9]+)\"/i',
			'/\"(view|detail|show|down)\.php\?id\=([0-9]+)\"/i',
			'/\"member\/(.*?)\.php\"/',
			'/\"(article|product|photo|download|cart|tag|guestbook|feedback|search|app|comment)\.php/i', 
		);
		$replacement = array(
			'"$1-$2-$3.html"',
			'"$1-$2.html"',
			'"$1--$2.html"',
			'"$1-$2-$3.html"',
			'"$1-$2.html"',
			'"$1-$2-$3.html"',
			'"$1-$2.html"',
			'"member/$1.html"',	
			'"$1.html',
		);
		$content = preg_replace($pattern,$replacement,$content);
		echo $content;
	}
	unset($LANGUAGE,$mle,$language,$config,$web,$mle_user_info);
	is_object($db) && $db->close();
}
function db_query_count(){
	global $db;
	return $db->query_count;	
}
function page_run_time(){
	global $mle_start_time;
	$mtime = explode(' ',microtime());
	return number_format(($mtime[1] + $mtime[0] - $mle_start_time),6);
}
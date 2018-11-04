<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
$mle_start_time = explode(' ',microtime()); 
$mle_start_time = $mle_start_time[1] + $mle_start_time[0];
require_once(str_replace('\\','/',dirname(__FILE__)).'/globals.php');
defined('WEBKEY') or die('Missing files. $version.config.php');
define('MLE_URL_MODE',$config['static'] == 2 ? 2 : 1); 
define('MLE_DATE_FORMAT_LONG','Y-m-d H:i:s'); 
define('MLE_DATE_FORMAT_SHORT','Y-m-d'); 
define('MLE_TEMPLATE_CACHE_ID',substr(md5($_SERVER['QUERY_STRING'].$lang),-16)); 
define('USER_UNIQUE',DEBUGGING ? 0 : 1); 
define('USER_ID',encryption($_COOKIE['mlecms_user_id'],'DECODE',WEBKEY)); 
define('USER_LOGIN',(encryption($_COOKIE['mlecms_user_login'],'DECODE',WEBKEY) == 'mlecms' && is_numeric(USER_ID)) ? true : false); 
define('WEB_TITLE',$web['title']); 
$path = MLEINC.'/language/frontend/'.$web['dir'].'/';
$html_make_mode = false;
if(isset($_GET['html_make_data'])){
	session_start();
	if($_SESSION['admin']['login']['condition'] == 'mlecms'){
		$html_make_mode = true;
	}
}
define('HTML_MAKE_MODE',$html_make_mode);
$cl = $path.'common.lang.php';
is_file($cl) && require_once($cl);
$dl = rtrim($path.$PHP_SELF,'php').'lang.php';
is_file($dl) && require_once($dl);
$config['status'] or ($PHP_SELF != 'app.php' && die($config['maintenance']));
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(str_replace('\\','/',dirname(__FILE__)).'/common.inc.php');
include_once(MLEINC.'/tools/smarty/Smarty.class.php');
$mlecms = new Smarty();
$mlecms->caching = ($config['template']['caching'] == 1 && !DEBUGGING && !HTML_MAKE_MODE) ? true : false; 
$mlecms->force_compile = $config['template']['force_compile'] == 1 ? true : false; 
$mlecms->cache_lifetime = $config['template']['cache_lifetime']; 
$mlecms->template_dir = array(MLEINC.'/templates/frontend/'.$web['template'].'/'); 
$mlecms->compile_dir = MLEINC.'/tmp/translation_frontend/'; 
$mlecms->cache_dir  = MLEINC.'/tmp/cache_frontend/'; 
$mlecms->left_delimiter = '{:'; 
$mlecms->right_delimiter = ':}'; 
function __autoload($class){
	$lib = MLEINC.'/lib/'.$class.'.lib.php';
	$cls = MLEINC.'/class/'.$class.'.class.php';
	(is_file($lib) && require($lib)) or (is_file($cls) && require($cls));
}
if(function_exists('__autoload')){ 
	spl_autoload_register('__autoload'); 
}
$mle_user_info = array();
if(true === USER_LOGIN){
	$mle_user_info = $db->query("SELECT a.*,b.`id` as rank_id,b.`rankname` as rank_rankname,b.`discount` as rank_discount,b.`scores` as rank_scores,b.`money` as rank_money,b.`auto` as rank_auto,b.`enable` as rank_enable FROM `{$db->prefix}members` a,`{$db->prefix}rank` b WHERE a.`level` = b.`id` && a.`id` = '".USER_ID."' LIMIT 1",1);
	if(!isset($mle_user_info['id'])){ 
		member::logout();
		msgbox($language['common']['account_delete'],$config['url']); 
	} elseif ($mle_user_info['audit'] != 0){ 
		member::logout();
		msgbox($language['common']['account_verification'],$config['url']);
	} elseif ($mle_user_info['effective'] != 1){ 
		member::logout();
		msgbox($language['common']['account_disabled'],$config['url']); 
	} elseif ($mle_user_info['rank_enable'] != 1){	
		member::logout();
		msgbox($language['common']['rank_disabled'],$config['url']); 
	} elseif (encryption($_COOKIE['mlecms_user_auth'],'DECODE',WEBKEY) != (USER_ID.$mle_user_info['password'].$mle_user_info['encryption'])){ 
		member::logout();
		msgbox($language['common']['abnormal'],$config['url']); 
	} elseif (USER_UNIQUE == 1 && $_COOKIE['mlecms_user_frequency'] != $mle_user_info['frequency']){ 
		member::logout();
		msgbox($language['common']['kicked'],$config['url']); 
	} else { 
		($mle_user_info['rank_discount'] <= 0 || $mle_user_info['rank_discount'] > 10) && $mle_user_info['rank_discount'] = 10;
		$mle_user_info['rankname_format'] = explode(',',$mle_user_info['rank_rankname']);
		$mle_user_info['rankname_format'] = $mle_user_info['rankname_format'][$lang - 1];
		$mle_user_info['logintime_format'] = explode(',',$mle_user_info['logintime']);
		$mle_user_info['logintime_format'] = is_numeric($mle_user_info['logintime_format'][0]) ? date(MLE_DATE_FORMAT_LONG,$mle_user_info['logintime_format'][0]) : '';
		$mle_user_info['loginip_format'] = explode(',',$mle_user_info['loginip']);
		$mle_user_info['loginaddress_format'] = explode(STRING_DELIMITED,$mle_user_info['loginaddress']);
		setcookie('mlecms_user_money',$mle_user_info['money'],0,'/'); 
		setcookie('mlecms_user_usemoney',$mle_user_info['usemoney'],0,'/'); 
		setcookie('mlecms_user_scores',$mle_user_info['scores'],0,'/'); 
	}
}
require_once(MLEINC.'/config/captcha.config.php');
$mle['login_captcha'] = is_array($captcha_config['open']) && in_array(2,$captcha_config['open']) ? true : false; 
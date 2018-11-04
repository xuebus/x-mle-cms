<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/globals.php');
require_once(MLEINC.'/config/admin.config.php');
$PHP_SELF == 'header.php' && die('Access Denied.');
session_start(); 
include_once(MLEINC.'/tools/smarty/Smarty.class.php');
$mlecms = new Smarty();
$mlecms->caching = false; 
$mlecms->force_compile = false; 
$mlecms->cache_lifetime = 0; 
$mlecms->template_dir = array(MLEINC.'/templates/manage/'); 
$mlecms->compile_dir = MLEINC.'/tmp/translation_manage/'; 
$mlecms->cache_dir  = MLEINC.'/tmp/cache_manage/'; 
$mlecms->left_delimiter = '{:'; 
$mlecms->right_delimiter = ':}'; 
if($config['template']['auto_clear_caching'] == 1 && (isset($_GET['action']) || !empty($_POST))){
	$mlecms->cache_dir  = MLEINC.'/tmp/cache_frontend/'; 
	$mlecms->clearAllCache();
}
function __autoload($class){
	$cls = MLEINC.'/class/'.$class.'.class.php';
	$lib = MLEINC.'/lib/'.$class.'.lib.php';
	(is_file($cls) && require($cls)) or (is_file($lib) && require($lib));
}
if(function_exists('__autoload')){ 
	spl_autoload_register('__autoload'); 
}
define('ADMIN_PATH',MLEROOT.'/'.$config['admin_dir']);
$lang_path = MLEINC.'/language/manage/chinese_simplified/';
$language['common'] = $language['page'] = array(); 
$cl = $lang_path.'common.lang.php';
is_file($cl) && require_once($cl);
$dl = rtrim($lang_path.$PHP_SELF,'php').'lang.php';
is_file($dl) && require_once($dl); 
require_once(MLEINC.'/config/file.config.php');
if(!defined('FULL_ACCESS')){ 
	$gotopage = ($PHP_SELF != 'index.php' && !empty($_SERVER['REQUEST_URI'])) ? 'login.php?goto='.rawurlencode($_SERVER['REQUEST_URI']) : 'login.php';
	switch(admin::purview()){
		case 9 : break; 
		case 0 : admin::logout(); msgbox($language['common']['not_exist'],$gotopage); break; 
		case 1 : msgbox($language['common']['insufficient_privileges'],'./'); break; 
		case 2 : admin::logout(); msgbox($language['common']['offline'],$gotopage); break; 
		case 3 : msgbox('',$gotopage); break; 
		default : die('Undefined Operation.'); break; 
	}
}
$menu = array();
foreach($admin_file as $i => &$n){
	if($n['attribute'][0] == 1){
		$menu[$i] = $n;
	}
	unset($menu[$i]['submenu']); 
	foreach($n['submenu'] as $i2 => &$n2){
		$f_n = parse_url($n2[3]);
		$f_n = basename($f_n['path']); 
		if($n['attribute'][0] == 1 && $n2[0] == 1){ 
			switch($PHP_SELF){
				case $f_n : $n2['current'] = true; break; 
				case 'article_update.php' : $f_n == 'article_manage.php' && $n2['current'] = true; break; 
				case 'channel_update.php' : $f_n == 'channel_manage.php' && $n2['current'] = true; break;
				case 'category_update.php' : $f_n == 'category_manage.php' && $n2['current'] = true; break;
				case 'product_update.php' : $f_n == 'product_manage.php' && $n2['current'] = true; break;
				case 'picture_update.php' : $f_n == 'picture_manage.php' && $n2['current'] = true; break;
				case 'download_update.php' : $f_n == 'download_manage.php' && $n2['current'] = true; break;
				case 'member_update.php' : $f_n == 'member_manage.php' && $n2['current'] = true; break;
				case 'links_update.php' : $f_n == 'links_manage.php' && $n2['current'] = true; break;
				case 'admin_update.php' : $f_n == 'admin_manage.php' && $n2['current'] = true; break;
				case 'guestbook_reply.php' : $f_n == 'guestbook_manage.php' && $n2['current'] = true; break;
				case 'ad_update.php' : $f_n == 'ad_manage.php' && $n2['current'] = true; break;
				case 'shop_order_update.php' : $f_n == 'shop_order_manage.php' && $n2['current'] = true; break;
				default : $n2['current'] = false; break;
			}
			(($n2[4]==2 || $n2[4]==3) && file_exists($f_n)) && $menu[$i]['submenu'][] = $n2;
		} elseif ($PHP_SELF == $f_n){
			msgbox($language['common']['page_off'],'BACK'); 
		}
	}
}
$mle['menu'] = $menu; 
unset($n,$f_n,$menu,$i,$n2,$i2); 
$mle['title_lang'] = $config['lang_total'] > 1 ? ' ('.(empty($web['name']) ? $language['common']['not_set'] : $web['name']) .')' : NULL;
$opp_info = admin::opp_info();
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$referer = empty($_SERVER['HTTP_REFERER']) ? './' : $_SERVER['HTTP_REFERER']; 
switch ($a){
	case 'switch' : 
		$admin_config['theme'][$lang] = $_GET['theme'];
		if(array2php($admin_config,'admin_config',MLEINC.'/config/admin.config.php')){
			msgbox('',$referer);
		} else {
			msgbox($language['page']['failure'],'BACK');
		} 
	break;
	case 'lang' : 
		($_GET['i'] > $config['lang_total'] || $_GET['i'] < 1) && die('Parameter Error.');
		setcookie('mlecms_global_language',$_GET['i'],$gmt_time + 2592000,'/'); 
		$referer = parse_url($referer);
		$referer = $referer['path'];
		header('Location: ' . $referer);
		exit();
		break;
	case 'phpinfo' : 
		phpinfo();
		die();
	break;
	case 'install' : 
		@set_time_limit(0);
		$zipname = basename($zipurl = $_POST['zipurl']); 
		$tmp_zip = MLEINC.'/tmp/other/'.$zipname; 
		if(@file_put_contents($tmp_zip,@file_get_contents($zipurl))){
			$remplate = new pclzip($tmp_zip);
			$v_result_list = $remplate->extract(PCLZIP_OPT_PATH,MLEROOT.'/',PCLZIP_OPT_REPLACE_NEWER); 
			@unlink($tmp_zip); 
			if ($v_result_list == 0) {
				die('var result = 2;'); 
			} else {
				die('var result = 9;'); 
			}
		} else {
			die('var result = 1;'); 
		}
	break;
	case 'cache' : 
		include_once(MLEINC.'/tools/smarty/Smarty.class.php');
		$mlecms = new Smarty();
		$mlecms->cache_dir  = MLEINC.'/tmp/cache_frontend/'; 
		$mlecms->clearAllCache();
		msgbox($language['common']['successful'],$referer);
	break;
	case 'compile' : 
		include_once(MLEINC.'/tools/smarty/Smarty.class.php');
		$mlecms = new Smarty();
		$mlecms->compile_dir = MLEINC.'/tmp/translation_frontend/';
		$mlecms->clearCompiledTemplate();
		msgbox($language['common']['successful'],$referer);
	break;
	default: die('Undefined Operation.'); break;
}
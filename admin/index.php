<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$logs_gmt = $gmt_time - (86400 * 20); 
if($action == 'unlog'){ 
	if($db->execute("DELETE FROM `{$DB['prefix']}logs` WHERE `addtime` < '{$logs_gmt}'")){
		admin::logs(4,$language['page'][39].'，'.$language['common']['successful']); 
		msgbox('','CURRENT');
	} else {
		admin::logs(4,$language['page'][39].'，'.$language['common']['failed']); 
		msgbox($language['common']['failed'],'CURRENT');
	}
} elseif ($action == 'clear'){ 
	include_once(MLEINC.'/tools/smarty/Smarty.class.php');
	$clear = new Smarty();
	$clear->compile_dir = MLEINC.'/tmp/translation_manage/';
	$clear->clearCompiledTemplate();
	msgbox($language['common']['successful'],'CURRENT');
}
$mle['count'] = array(
	'members' => get_count('members'), 
	'article' => get_count('article','`lang` = '.LANG),
	'product' => get_count('product','`lang` = '.LANG),
	'picture' => get_count('picture','`lang` = '.LANG),
	'download' => get_count('download','`lang` = '.LANG),
	'guestbook'=> array(get_count('guestbook','`lang` = '.LANG),get_count('guestbook','`lang` = '.LANG.' && `audit` = 0')), 
	'un_log' => get_count('logs','`addtime` < '.$logs_gmt), 
	'comment' => array(
		1 => array(get_count('comment','`lang` = '.LANG.' && `type` = 1'),get_count('comment','`lang` = '.LANG.' && `type` = 1 && `audit` = 0')),
		2 => array(get_count('comment','`lang` = '.LANG.' && `type` = 2'),get_count('comment','`lang` = '.LANG.' && `type` = 2 && `audit` = 0')),
		3 => array(get_count('comment','`lang` = '.LANG.' && `type` = 3'),get_count('comment','`lang` = '.LANG.' && `type` = 3 && `audit` = 0')),
		4 => array(get_count('comment','`lang` = '.LANG.' && `type` = 4'),get_count('comment','`lang` = '.LANG.' && `type` = 4 && `audit` = 0')),
	),
);
function get_count($table,$condition = NULL){
	global $db;
	$sql = "SELECT count(*) FROM `{$db->prefix}{$table}`";
	empty($condition) or $sql .= " WHERE {$condition}";
	$count = $db->query($sql,1,0);
	return numeric($count[0]);
}
function getcon($varName){
	switch($res = get_cfg_var($varName)){
		case 0 : return '<font color="red">×</font>'; break;
		case 1 : return '<font color="green">√</font>'; break;
		default : return $res; break;
	}
}
$mle['edition'] = MLECMS_EDITION; 
$mle['version'] = MLECMS_VERSION;
$mle['release'] = MLECMS_RELEASE;
$mle['smarty_version'] = Smarty::SMARTY_VERSION;
$mle['authorization'] = MLECMS_AUTHORIZATION;
$mle['SERVER'] = $_SERVER;
$mle['PHP_VERSION'] = PHP_VERSION;
$mle['MySQL_VERSION'] = $db->version(false);
$mle['upload_max'] = getcon("upload_max_filesize");
$mle['post_max'] = getcon("post_max_size");
$mle['script_file'] = str_replace('\\','/',dirname(dirname(__FILE__)));
$mle['zend'] = (get_cfg_var("zend_optimizer.optimization_level") || get_cfg_var("zend_extension_manager.optimizer_ts") || get_cfg_var("zend_extension_ts")) ? '<font color="green">√</font>' : '<font color="red">×</font>';
$disable_functions = get_cfg_var("disable_functions");
$mle['disable_functions'] = empty($disable_functions) ? '<em>NULL</em>' : $disable_functions;
if(function_exists("gd_info") && extension_loaded('gd')){
	$mle['gd_info'] = gd_info();
	$mle['gd_info'] = $mle['gd_info']['GD Version'];
} else {
	$mle['gd_info'] = '<font color="#FF0000">'.$language['page'][31].'</font>'; 
}
require_once(ADMIN_PATH.'/footer.php');
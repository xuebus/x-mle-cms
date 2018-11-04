<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
$mlecms->assign('config',$config);
$mlecms->assign('web',$web); 
$admin_config['theme'] = in_array($admin_config['theme'][$lang],array('blue','gray','green','red')) ? $admin_config['theme'][$lang] : 'green';
$mlecms->assign('admin',$admin_config);
$mlecms->assign('lang',$language); 
$mle['session'] = $_SESSION;
$mle['get'] = $_GET;
$mle['cookie'] = $_COOKIE;
require_once(MLEINC.'/config/shortcut.config.php');
empty($shortcut[$PHP_SELF]) or $mle['icon'] = admin::icon($shortcut[$PHP_SELF]); 
$mlecms->assign('mle',$mle);
isset($template_file) or $template_file = basename($PHP_SELF,'.php');
$template_file .= $admin_config['template_suffix'];
$fp = $mlecms->template_dir[0].$template_file;
is_file($fp) or exit($language['common']['not_template_file'].$fp);
if($opp_info === false){
	$mlecms->display($template_file);
} else {
	die($mlecms->fetch($template_file).$opp_info);
}
unset($LANGUAGE,$mle,$language,$config,$web);
is_object($db) && $db->close();
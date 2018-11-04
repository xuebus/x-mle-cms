<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
define('MLEROOT',dirname(__FILE__));
if(file_exists(MLEROOT.'/inc/install/index.php')){ header('Location:inc/install/index.php'); exit(); }
require_once(MLEROOT.'/inc/include/header.php');
if($config['static'] == 2 && empty($_GET)){ header("Location:{$web['all_data'][LANG]['static']}"); exit(); } 
if($config['home'] != 'index.php' && empty($_GET)){	header("Location:{$config['home']}"); exit(); }
$mle['channel_id'] = 1; 
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$html->make($mlecms->fetch($template_file),empty($web['static']) ? (LANG.'/index.html') : $web['static']);
}
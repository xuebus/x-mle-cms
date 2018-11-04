<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
require_once(MLEINC.'/config/captcha.config.php');
if(isset($_POST['code_length'])){
	is_numeric($_POST['image_width']) or $_POST['image_width'] = 80;
	is_numeric($_POST['image_height']) or $_POST['image_height'] = 30;	
	is_numeric($_POST['text_angle_minimum']) or $_POST['text_angle_minimum'] = 0;
	is_numeric($_POST['text_angle_maximum']) or $_POST['text_angle_maximum'] = 0;
	is_numeric($_POST['text_x_start']) or $_POST['text_x_start'] = 0;
	$_POST['image_bg_imgae'] = $_POST['image_bg_imgae'] == 1 ? 1 : 0;
	$_POST['use_multi_text'] = $_POST['use_multi_text'] == 1 ? 1 : 0;
	is_numeric($_POST['code_length']) or $_POST['code_length'] = 4;
	is_array($_POST['charset']) or $_POST['charset'] = array(1,2);
	is_numeric($_POST['num_lines']) or $_POST['num_lines'] = 0;
	if(array2php($_POST,'captcha_config',MLEINC.'/config/captcha.config.php')){
		admin::logs(3,$language['page'][44]."({$language['common']['successful']})"); 
		msgbox($language['common']['successful'],'CURRENT');
	} else {
		admin::logs(3,$language['page'][44]."({$language['common']['failed']})"); 
		msgbox($language['page'][45],'CURRENT'); 
	}
}
$mle['captcha'] = $captcha_config;
is_array($mle['captcha']['open']) or $mle['captcha']['open'] = array();
require_once(ADMIN_PATH.'/footer.php'); 
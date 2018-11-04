<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
if ($_GET['m'] == 'user'){
	$avatar = new avatar();
	$a = $_GET['a'];
	$release = intval($_GET['release']);
	$method = 'on'.$a; 
	if(method_exists($avatar, $method) && $a{0} != '_') {
		$data = $avatar->$method();
		echo is_array($data) ? $avatar->serialize($data, 1) : $data;
		exit;
	} elseif(method_exists($control, '_call')) {
		$data = $control->_call('on'.$a, '');
		echo is_array($data) ? $control->serialize($data, 1) : $data;
		exit;
	} else {
		exit('Action not found!');
	}
} else {
	msgbox('','center.php');
}
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$result = 0; 
if(is_numeric($_GET['id'])){
	if($_GET['action'] == 'del' && $_GET['id'] != 1){
		$db->execute("UPDATE `{$DB['prefix']}members` SET `level` = '1' WHERE `id` != 1 && `level` = '{$_GET['id']}';"); 
		$result = $db->delete('rank',$_GET['id']) ? 1 : 2;
	} else {
		$set = NULL;
		switch ($_GET['action']){
			case 'auto' : $set = 'SET `auto` = 1'; break;
			case 'unauto' : $set = 'SET `auto` = 0'; break;
			case 'enable' : $set = 'SET `enable` = 1'; break;
			case 'unenable' : $set = 'SET `enable` = 0'; break;
			default: die('Undefined parameters.'); break;
		}
		$result = $db->execute("UPDATE `{$DB['prefix']}rank` {$set} WHERE `id` = '{$_GET['id']}'") ? 1 : 2;
	}
} elseif (is_array($_POST['id'])){
	foreach($_POST['id'] as $i => $n){
		$rankname_all = explode(',',$_POST['rankname_all'][$i]); 
		$rankname_all[$lang-1] = str_replace(',','',html_chars($_POST['rankname'][$i])); 
		$rankname_all = implode(',',$rankname_all); 
		$discount = !is_numeric($_POST['discount'][$i]) || $_POST['discount'][$i] > 10 ? 10 : $_POST['discount'][$i];
		$scores = is_numeric($_POST['scores'][$i]) ? $_POST['scores'][$i] : 0;
		$money = is_numeric($_POST['money'][$i]) ? $_POST['money'][$i] : 0;
		$_POST['id'][$i] == 1 && ($scores = $money = 0);
		$sql = "UPDATE `{$DB['prefix']}rank` SET `rankname` = '{$rankname_all}',`discount` = '{$discount}',`scores` = '{$scores}',`money` = '{$money}' WHERE `id` = '{$_POST['id'][$i]}';";
		$result = $db->execute($sql) ? ($result == 2 ? 2 : 1) : 2;
	}
}
if (!empty($_POST['rankname_add'])){
	$rankname_add = str_repeat(',',$lang-1).str_replace(',','',html_chars($rankname_add));
	$sql = "INSERT INTO `{$DB['prefix']}rank` (`rankname`,`discount`,`scores`,`money`,`auto`,`enable`)VALUES ";
	$sql .= "('{$rankname_add}','".(!is_numeric($_POST['discount']) || $_POST['discount'] > 10 ? 10 : $_POST['discount'])."','".(is_numeric($_POST['scores']) ? $_POST['scores'] : 0)."',  '".(is_numeric($_POST['money']) ? $_POST['money'] : 0)."','0','1');";
	$result = $db->execute($sql) ? ($result == 2 ? 2 : 1) : 2;
}
if($result == 1){
	admin::logs(3,$language['page']['update']."({$language['common']['successful']})");
	isset($_POST['id']) ? msgbox($language['common']['successful'],'CURRENT') : msgbox('','CURRENT'); 
} elseif ($result == 2){
	admin::logs(3,$language['page']['update']."({$language['common']['failed']})"); 
	msgbox($language['common']['failed'],'CURRENT'); 
}
$mle['rank_list'] = member::rank(1);
require_once(ADMIN_PATH.'/footer.php'); 
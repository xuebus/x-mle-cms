<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
define('AD_INTERVAL_TIME',28800);
require_once(dirname(__FILE__).'/inc/include/header.php');
$referer = empty($_SERVER['HTTP_REFERER']) ? './' : $_SERVER['HTTP_REFERER']; 
switch ($a){
	case 'lang' : 
		($_GET['i'] > $config['lang_total'] || $_GET['i'] < 1) && die('Parameter Error.');
		if(isset($_COOKIE['mlecms_global_language'])){
			setcookie('mlecms_global_language',$_GET['i'],$gmt_time + 2592000,'/');
			header('Location: ./?'.$_GET['i']);	exit();
		} else {		
			msgbox($language['page']['open_cookie'],'./');	
		}
	break;
	case 'register' : 
		@set_time_limit(0);
		usleep(200000);
		$uid = trim(preg_replace('/[\'\"\\\\\/]/','',$_POST['uid']));
		$member_config = member::get_config();
		$disable = explode(',',$member_config['disable']);
		in_array($uid,$disable) && die('var result = false;');
		if(!empty($uid)){
			$result = $db->query("SELECT count(*) FROM `{$DB['prefix']}members` WHERE `username` = '{$uid}' || `email` = '{$uid}'",1,0);
			if($result[0] == 1){
				die('var result = false;');	
			} else {
				die('var result = true;');	
			}
		} else {
			die('var result = true;');	
		}
	break;
	case 'browse' : 
		if(true === USER_LOGIN && is_numeric($mle_user_info['id']) && is_numeric($_GET['id'])){
			switch($_GET['type']){ 
				case 1 : $table = 'article'; break;
				case 2 : $table = 'product'; break;
				case 3 : $table = 'picture'; break;
				case 4 : $table = 'download'; break;
				default: die('Undefined Operation. browse->type'); break;
			}
			$table = $DB['prefix'].$table;
			$result = $db->query("SELECT `id`,`money`,`integral`,`buyuser` FROM `{$table}` WHERE `id` = '{$_GET['id']}'",1);
			if(is_numeric($result['id']) && $result['money'] > 0){ 
				$topup = false;
				$money = numeric($result['money']);
				$integral = numeric($result['integral']);
				if($mle_user_info['money'] >= $money && $mle_user_info['scores'] >= $integral){ 
					if($topup = $db->execute("UPDATE `{$DB['prefix']}members` SET `money` = '".($mle_user_info['money'] - $money)."',`scores` = '".($mle_user_info['scores'] - $integral)."',`usemoney` = '".($mle_user_info['usemoney'] + $money)."' WHERE `id` = '{$mle_user_info['id']}'")){
						$db->execute("UPDATE `{$table}` SET `buyuser` = '".(empty($result['buyuser']) ? $mle_user_info['id'] : $result['buyuser'].','.$mle_user_info['id'])."' WHERE `id` = '{$_GET['id']}'");
					}
					$info = $language['page']['buy_type'][$_GET['type']].'(id:'.$_GET['id'].'),'.$language['page']['buy_info'][0].$money.$language['page']['buy_info'][1].$integral.$language['page']['buy_info'][2];
					member::transaction('BP',$mle_user_info['id'],5,$money,($topup ? 1 : 0),$info);
					$topup ? msgbox($language['page']['buy_result'][0],$referer) : msgbox($language['page']['buy_result'][1],$referer);
				} else { 
					msgbox($language['page']['failure_purchase'],$config['url'].'member/recharge.php?amount='.$money );
				}
			} else { 
				msgbox('Illegal Operation.','./'); 
			}
		} else {
			msgbox($language['page']['logged'],misc::url('login')); 
		}
	break;
	case 'hits' :
		$type = numeric($_GET['type']);
		$id = numeric($_GET['id']);
		if($id > 0){
			switch($type){
				case 0 : $table = 'article'; break; 
				case 1 : $table = 'product'; break;
				case 2 : $table = 'picture'; break;
				case 3 : $table = 'download'; break;
				default : $table = 'article'; break;
			}
			$table = $DB['prefix'].$table;
			$db->execute("UPDATE `{$table}` SET `click` = (`click`+1) WHERE `ID` = '{$id}' LIMIT 1"); 
			if($_GET['show'] == 1){ 
				$count = $db->query("SELECT `click` FROM `{$table}` WHERE `ID` = '{$id}'",1);
				$count = numeric($count['click']);
				die("document.write('{$count}');");				
			}			
		}
	break;
	case 'comments' :
		$type = numeric($_GET['type']);
		$id = numeric($_GET['id']);
		if($id > 0){
			switch($type){
				case 0 : $table = 'article'; break; 
				case 1 : $table = 'product'; break;
				case 2 : $table = 'picture'; break;
				case 3 : $table = 'download'; break;
				default : $table = 'article'; break;
			}
			$table = $DB['prefix'].$table;
			if($_GET['show'] == 1){ 
				$commenttotal = $db->query("SELECT `commenttotal` FROM `{$table}` WHERE `ID` = '{$id}'",1);
				$commenttotal = numeric($commenttotal['commenttotal']);
				die("document.write('{$commenttotal}');");				
			}			
		}
	break;
	case 'agree' :
		$type = numeric($_GET['type']);
		$id = numeric($_GET['id']);
		if($id > 0){
			switch($type){
				case 0 : $table = 'article'; break; 
				case 1 : $table = 'product'; break;
				case 2 : $table = 'picture'; break;
				case 3 : $table = 'download'; break;
				default : $table = 'article'; break;
			}
			$table = $DB['prefix'].$table;
			if($_GET['show'] == 1){
				$agree = $db->query("SELECT `agree` FROM `{$table}` WHERE `ID` = '{$id}'",1);
				$agree = numeric($agree['agree']);
				die("document.write('{$agree}');");				
			}			
		}
	break;
	case 'attend' :
		$type = numeric($_GET['type']);
		$id = numeric($_GET['id']);
		if($id > 0){
			switch($type){
				case 0 : $table = 'article'; break; 
				case 1 : $table = 'product'; break;
				case 2 : $table = 'picture'; break;
				case 3 : $table = 'download'; break;
				default : $table = 'article'; break;
			}
			$table = $DB['prefix'].$table;
			if($_GET['show'] == 1){
				$attend = $db->query("SELECT (`commenttotal`+`agree`) as attend FROM `{$table}` WHERE `ID` = '{$id}'",1);
				$attend = numeric($attend['attend']);
				die("document.write('{$attend}');");				
			}			
		}
	break;
	case 'ad' :
		$id = numeric($_GET['id']);
		if($id > 0){
			$ad_data = $db->query("SELECT * FROM `{$DB['prefix']}ad` WHERE `enable` = 1 && `id` = '{$id}'",1);
			if(isset($ad_data['id'])){ 
				ip::gap(3,AD_INTERVAL_TIME,$id) or $db->execute("UPDATE `{$DB['prefix']}ad` SET `click` = (`click`+1) WHERE `ID` = '{$id}' LIMIT 1");
				header("Location: {$ad_data['url']}"); die();				
			} else {
				die('This is not an effective ad.'); 
			}
		} else {
			die('Parameter Error.');
		}
	break;
	case 'html' :
		session_start(); 
		if($_SESSION['admin']['login']['condition'] == 'mlecms'){
			$html = new html();
			empty($_GET['back']) or $html->back_page = $_GET['back'];
			$html->next_page();
		} else {
			die('Undefined Operation.');
		}
	break;
	case 'login' :
		die('var result = '.member::login($_POST['username'],$_POST['password'],12).';'); 
	break;
	case 'support' :
		$result = comment::support($_POST['id'],8);
		if($result == 1){ 
			$tmp = $db->query("SELECT `aid`,`type` FROM `{$DB['prefix']}comment` WHERE `id` = '".numeric($_POST['id'])."' LIMIT 1",1);
			comment::update($tmp['aid'],$tmp['type']);
		}
		die('var result = '.$result.';');
	break;
	default: 
		$c = empty($config['template']['customize_page']) ? array() : explode(',',$config['template']['customize_page']); 
		if(in_array($_GET['a'],$c)){
			$LP = MLEINC.'/language/frontend/'.$web['dir'].'/'.$_GET['a'].'.lang.php'; 
			is_file($LP) && require_once($LP);
			$template_file = $_GET['a'];
			require_once(MLEINC.'/include/footer.php');
		} else {	
			die('Undefined Operation.');
		}
	break;
}
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(isset($_POST['url'])){
	$_POST['url'] = rtrim($_POST['url'],'/').'/';
	($_POST['lang_total'] < 1 || $_POST['lang_total'] > 255) && $_POST['lang_total'] = 2;
	$d_url = 'set_globals.php'; 
	$old_admin_dir = $config['admin_dir']; 
	$new_admin_dir = trim($_POST['admin_dir']);
	if($old_admin_dir != $new_admin_dir){ 
		preg_match('/^[a-zA-Z][a-zA-Z0-9_]{4,20}$/',$new_admin_dir) or msgbox($language['page']['msg'][0],'CURRENT');
		if(true === @rename('../'.$old_admin_dir,'../'.$new_admin_dir)){
			$d_url = '../'.$new_admin_dir.'/'.$d_url;
		} else { 
			msgbox($language['page']['msg'][1],'CURRENT');
		}
	}
	if($config['static'] != 3 && $_POST['static'] == 3){
		if(!@copy('../inc/data/.htaccess','../.htaccess')){ 
			$_POST['static'] = 1;
			msgbox($language['page']['msg'][2],'CURRENT');
		}
	}
	if($config['static'] == 3 && $_POST['static'] != 3){
		if(file_exists('../.htaccess') && !@unlink('../.htaccess')){ 
			$_POST['static'] = 3;
			msgbox($language['page']['msg'][3],'CURRENT');
		}
	}
	if(array2php($_POST,'config',MLEINC.'/config/globals.config.php')){
		admin::logs(3,$language['page']['update_page']."({$language['common']['successful']})"); 
		if($_POST['mail']['istest'] == 1 && is_email($_POST['mail']['testaddress'])){
			require(MLEINC.'/config/globals.config.php');
			$content = $language['page']['test_mail'][1].'http://'.$_SERVER['SERVER_NAME'].get_url().'<br />';
			$content .= $language['page']['test_mail'][2].$config['mail']['mailer'].'<br />';
			$content .= $language['page']['test_mail'][3].$config['mail']['frommail'].'<br />';
			$content .= $language['page']['test_mail'][4].$config['mail']['fromname'].'<br />';
			$content .= $language['page']['test_mail'][5].date('Y-m-d H:i:s',$gmt_time).'<br />';
			$mail = misc::email($_POST['mail']['testaddress'],$web['title'],$language['page']['test_mail'][0],$content);
			if(true === $mail){
				msgbox($language['page']['test_mail'][6].$_POST['mail']['testaddress'],$d_url);
			} else {
				msgbox($language['page']['test_mail'][7].$mail,$d_url);
			}
		} else {
			msgbox($language['common']['successful'],$d_url);
		}
	} else {
		$d_url != 'set_globals.php' && @rename('../'.$new_admin_dir,'../'.$old_admin_dir);
		$d_url = 'set_globals.php';
		admin::logs(3,$language['page']['update_page']."({$language['common']['failed']})");
		msgbox($language['page']['failure'],$d_url);
	}
}
$config = html_chars($config);
require_once(ADMIN_PATH.'/footer.php'); 
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if($_POST['action'] == 'make' || $_GET['action'] == 'fast'){
	@set_time_limit(0);
	$config['static'] != 2 && msgbox($language['page']['msg'][0],'html_make.php');
	$mle['show_status'] = 'make'; 
	$html = new html();
	$html->clear_tmp();	
	$mle['channel_list'] = array();
	if($_GET['action'] == 'fast'){
		switch($_GET['event']){
			case 'homepage' : $html->create_tmp(array('index.php')); break; 
			case 'article' : $html->channel_tmp('MO001x'); $html->category_tmp('MO001x'); break; 
			case 'product' : $html->channel_tmp('MO002x'); $html->category_tmp('MO002x'); break; 
			case 'photo' : $html->channel_tmp('MO003x'); $html->category_tmp('MO003x'); break; 
			case 'download' : $html->channel_tmp('MO004x'); $html->category_tmp('MO004x'); break; 
			case 'other' : 
				$html_make_file = array('tag.php','member/login.php','member/register.php','links.php','guestbook.php','feedback.php');
				$html->create_tmp($html_make_file,5);
			break;
			case 'whole' : 
				$html->create_tmp(array('index.php','tag.php','member/login.php','member/register.php','links.php','guestbook.php','feedback.php'),1); 
				$html->channel_tmp('MO001x'); $html->category_tmp('MO001x'); $html->content_tmp('MO001x');	
				$html->channel_tmp('MO002x'); $html->category_tmp('MO002x'); $html->content_tmp('MO002x');	
				$html->channel_tmp('MO003x'); $html->category_tmp('MO003x'); $html->content_tmp('MO003x');	
				$html->channel_tmp('MO004x'); $html->category_tmp('MO004x'); $html->content_tmp('MO004x');	
			break;
			default : die('Undefined Operation.'); break;
		}
	} else { 
		if(is_array($_POST['pathhome'])){ 
			foreach($_POST['pathhome'] as $pid){
				$html->channel_tmp(0,$pid);
			}
		}
		if(is_array($_POST['pathcategory'])){ 
			foreach($_POST['pathcategory'] as $pid){
				$html->category_tmp(0,$pid);
			}
		}
		if(is_array($_POST['pathcontent'])){ 
			foreach($_POST['pathcontent'] as $mp){
				$arr = explode(',',$mp);
				$html->content_tmp($arr[0],$arr[1]);
			}
		}
		is_array($_POST['other_make']) && $html->create_tmp($_POST['other_make'],0);
		if($_POST['content_type'] == 'date' && !empty($_POST['date_start']) && !empty($_POST['date_end'])){ 
			$start_time = numeric(strtotime($_POST['date_start']));
			$end_time = numeric(strtotime($_POST['date_end']));
			$html->content_tmp($_POST['content_module'],0,0,0,$start_time,$end_time);
		} elseif ($_POST['content_type'] == 'id' && is_numeric($_POST['id_start']) && is_numeric($_POST['id_end'])){ 
			$html->content_tmp($_POST['content_module'],0,0,0,0,0,$_POST['id_start'],$_POST['id_end']);
		}
	}
} else { 
	$mle['show_status'] = 'normal'; 
	$sql = "SELECT * FROM `{$DB['prefix']}channel` WHERE `module` != '0' && `lang` = '".LANG."' ORDER BY `sort` ASC,`id` ASC";
	$mle['channel_list'] = $db->query($sql);
	$m = module::get(); 
	$modcode = array(); 
	foreach($m as $n){ $modcode[] = $n['modcode']; }	
	$mle['other_list'] = array(
		array($language['page']['other_make'][0],'index.php',1), 
		array($language['page']['other_make'][3],'tag.php',1), 
		array($language['page']['other_make'][4],'member/login.php',0), 
		array($language['page']['other_make'][5],'member/register.php',0), 
	);
	in_array('PL005x',$modcode) && $mle['other_list'][] = array($language['page']['other_make'][2],'links.php',0); 
	in_array('PL006x',$modcode) && $mle['other_list'][] = array($language['page']['other_make'][1],'guestbook.php',1); 
	in_array('PL007x',$modcode) && $mle['other_list'][] = array($language['page']['other_make'][6],'feedback.php',1); 
	$mle['content_module'] = $m;
}
require_once(ADMIN_PATH.'/footer.php'); 
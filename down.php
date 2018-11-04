<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$page_limit = false; 
$id = numeric($_GET['id']);
$download = $d = array();
$download = $id > 0 ? download::data(0,1,0,0,0,$id,0,0,0,0,0,0,0,1) : array();
$d = $download['current']; 
isset($d['id']) or error(404);
$d['data_prev'] = $download['prev']; 
$d['data_next'] = $download['next']; 
switch(member::browse($d['channel_id'],$d['category_id'])){
	case 2 : break; 
	case 0 : HTML_MAKE_MODE ? ($page_limit = true) : msgbox($language['page']['logged'],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); break; 
	case 1 : HTML_MAKE_MODE ? ($page_limit = true) : msgbox($language['page']['permissions_visit'],'./'); break; 
	default: die('Undefined Options.$Id:category.php'); break;
}
$split_id = explode(',',trim($d['category_id'],','));
$d['category_split'] = array(
	'root_id' => reset($split_id), 
	'end_id' => end($split_id), 
	'end_name' => $d['category'], 
);
empty($d['introduction']) && $d['introduction'] = misc::html2txt($d['content'],250,''); 
$template_file = empty($d['template']) ? template::get_content_page($d['category_id']) : $d['template']; 
$d['page'] && $d['content'] = misc::content_page($d['content'],$d['URL']); 
$d['format_permission'] = ''; 
if(!empty($d['permission'])){ 
	$dfp = member::rank(0,$d['permission']);
	foreach($dfp as $n){
		$d['format_permission'][] = $n['rankname'];
	}
	$d['format_permission'] = '<font color="#FF0000">'.implode(',',$d['format_permission']).'</font>';
} elseif ($d['money'] > 0 || $d['integral'] > 0) { 
	$d['format_permission'] = '<font color="#FF0000">'.$language['page']['format_permission'].'</font>';
} else {
	$d['format_permission'] = 	$language['page']['open'];
}
$d['format_url'] = empty($d['mirror']) ? array() : explode("\r\n",$d['mirror']); 
empty($d['local']) or $d['format_url'] = array_merge(array($language['page']['local'].'|'.$d['local']),$d['format_url']); 
foreach($d['format_url'] as $ix => &$rn){
	$rn = explode('|',$rn); 
	$rn[2] = 'down.php?id='.$d['id'].'&do='.$ix; 
}
if(isset($_GET['do'])){
	$do = numeric($_GET['do']);
	$do > $ix && $do = 0;
	if(!empty($d['permission']) || $d['money'] > 0 || $d['integral'] > 0){
		if(true === USER_LOGIN && !in_array(USER_ID,explode(',',$d['buyuser']))){ 
			if(!empty($d['permission'])){ 
				$permission = explode(',',$d['permission']);
				if(!is_numeric($mle_user_info['level']) || !in_array($mle_user_info['level'],$permission)){
					msgbox($language['page']['permissions'],'./'); 
				}
			} else { 
				$msg = ($d['money'] > 0 && $d['integral'] > 0) ? $language['page']['msg'][1].$d['money'].$language['page']['msg'][2].'，'.$language['page']['msg'][3].$d['integral'].$language['page']['msg'][4] : ($d['money'] > 0 ? $language['page']['msg'][1].$d['money'].$language['page']['msg'][2] : $language['page']['msg'][3].$d['integral'].$language['page']['msg'][4]);
				$msg = $language['page']['msg'][0].$msg.'\r\n'.$language['page']['msg'][5];
				die('<script type="text/javascript">if(confirm("'.$msg.'")){ location = "app.php?a=browse&type=4&id='.$d['id'].'"; } else { history.back(-1); }</script> ');
			}
		} elseif (false === USER_LOGIN) {
			msgbox($language['page']['logged'],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); 
		}
	}	
	$db->execute("UPDATE `{$DB['prefix']}download` SET `count` = (`count`+1) WHERE `ID` = '{$d['id']}' LIMIT 1");
	$do == 0 && $d['mode'] == 0 && is_file($d['format_url'][$do][1]) ? download::read($d['format_url'][$do][1]) : msgbox('',$d['format_url'][$do][1]); 
	die();
}
$mle['channel_id'] = $d['channel_id']; 
$mle['channel_title'] = $d['channel']; 
$mlecms->assign('d',$d); 
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = $d['URL'];
	$content = $page_limit === false ? $mlecms->fetch($template_file) : $html->limit2php($config['url'].$PHP_SELF.'?id='.$d['id']); 
	$html->make($content,$static_path);
}
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$page_limit = false; 
$id = numeric($_GET['id']);
$photo = $id > 0 ? photo::data(0,1,0,0,0,$id,0,0,0,0,0,0,0,1) : array();
$pic = $photo['current']; 
isset($pic['id']) or error(404);
$pic['data_prev'] = $photo['prev']; 
$pic['data_next'] = $photo['next']; 
switch(member::browse($pic['channel_id'],$pic['category_id'])){
	case 2 : 
		if(!empty($pic['permission']) || $pic['money'] > 0 || $pic['integral'] > 0){
			$page_limit = true; 
			if(!HTML_MAKE_MODE){ 
				if(true === USER_LOGIN && !in_array(USER_ID,explode(',',$pic['buyuser']))){ 
					if(!empty($pic['permission'])){ 
						$permission = explode(',',$pic['permission']);
						if(!is_numeric($mle_user_info['level']) || !in_array($mle_user_info['level'],$permission)){
							msgbox($language['page']['permissions'],'./'); 
						}
					} else { 
						$msg = ($pic['money'] > 0 && $pic['integral'] > 0) ? $language['page']['msg'][1].$pic['money'].$language['page']['msg'][2].'，'.$language['page']['msg'][3].$pic['integral'].$language['page']['msg'][4] : ($pic['money'] > 0 ? $language['page']['msg'][1].$pic['money'].$language['page']['msg'][2] : $language['page']['msg'][3].$pic['integral'].$language['page']['msg'][4]);
						$msg = $language['page']['msg'][0].$msg.'\r\n'.$language['page']['msg'][5];
						die('<script type="text/javascript">if(confirm("'.$msg.'")){ location = "app.php?a=browse&type=3&id='.$pic['id'].'"; } else { history.back(-1); }</script> ');
					}
				} elseif (false === USER_LOGIN) {
					msgbox($language['page']['logged'],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); 
				}
			}
		}
		break; 
	case 0 : HTML_MAKE_MODE ? ($page_limit = true) : msgbox($language['page']['logged'],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); break; 
	case 1 : HTML_MAKE_MODE ? ($page_limit = true) : msgbox($language['page']['permissions'],'./'); break; 
	default: die('Undefined Options.$Id:category.php'); break;
}
$split_id = explode(',',trim($pic['category_id'],','));
$pic['category_split'] = array(
	'root_id' => reset($split_id), 
	'end_id' => end($split_id), 
	'end_name' => $pic['category'], 
);
empty($pic['introduction']) && $pic['introduction'] = misc::html2txt($pic['content'],250,''); 
$template_file = empty($pic['template']) ? template::get_content_page($pic['category_id']) : $pic['template']; 
$pic['img_jsstring'] = $pic['des_jssering'] = '';
unset($pic['picture'][0],$pic['description'][0]); 
$pic['img_jsstring'] = "['".str_replace("\r\n",'',implode("','",$pic['picture']))."']"; 
$pic['des_jssering'] = "['".str_replace("\r\n",'',implode("','",$pic['description']))."']"; 
$mle['channel_id'] = $pic['channel_id']; 
$mle['channel_title'] = $pic['channel']; 
$mlecms->assign('pic',$pic); 
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = $pic['URL'];
	$content = $page_limit === false ? $mlecms->fetch($template_file) : $html->limit2php($config['url'].$PHP_SELF.'?id='.$pic['id']); 
	$html->make($content,$static_path);
}
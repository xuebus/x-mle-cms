<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$page_limit = false; 
$id = numeric($_GET['id']);
$product = $id > 0 ? product::data(0,1,0,0,0,$id,0,0,0,0,0,0,0,1) : array();
$p = $product['current']; 
isset($p['id']) or error(404);
$p['data_prev'] = $product['prev']; 
$p['data_next'] = $product['next']; 
switch(member::browse($p['channel_id'],$p['category_id'])){
	case 2 : 
		if(!empty($p['permission']) || $p['money'] > 0 || $p['integral'] > 0){ 
			$page_limit = true; 
			if(!HTML_MAKE_MODE){ 
				if(true === USER_LOGIN && !in_array(USER_ID,explode(',',$p['buyuser']))){ 
					if(!empty($p['permission'])){ 
						$permission = explode(',',$p['permission']);
						if(!is_numeric($mle_user_info['level']) || !in_array($mle_user_info['level'],$permission)){
							msgbox($language['page']['permissions'],'./'); 
						}
					} else { 
						$msg = ($p['money'] > 0 && $p['integral'] > 0) ? $language['page']['msg'][1].$p['money'].$language['page']['msg'][2].'，'.$language['page']['msg'][3].$p['integral'].$language['page']['msg'][4] : ($p['money'] > 0 ? $language['page']['msg'][1].$p['money'].$language['page']['msg'][2] : $language['page']['msg'][3].$p['integral'].$language['page']['msg'][4]);
						$msg = $language['page']['msg'][0].$msg.'\r\n'.$language['page']['msg'][5];
						die('<script type="text/javascript">if(confirm("'.$msg.'")){ location = "app.php?a=browse&type=2&id='.$p['id'].'"; } else { history.back(-1); }</script> ');
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
$split_id = explode(',',trim($p['category_id'],','));
$p['category_split'] = array(
	'root_id' => reset($split_id), 
	'end_id' => end($split_id), 
	'end_name' => $p['category'], 
);
empty($p['introduction']) && $p['introduction'] = misc::html2txt($p['content'],250,''); 
$template_file = empty($p['template']) ? template::get_content_page($p['category_id']) : $p['template']; 
$p['page'] && $p['content'] = misc::content_page($p['content'],$p['URL']); 
$mle['channel_id'] = $p['channel_id']; 
$mle['channel_title'] = $p['channel']; 
$mlecms->assign('p',$p); 
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = $p['URL'];
	if($page_limit === false){
		$content = $mlecms->fetch($template_file); 
		$page_data = $mlecms->getTemplateVars('page_data');	
		if(is_numeric($page_data['total_page']) && $page_data['total_page'] > 1){
			if($page_data['page'] == 1){
				$html_url_head = $config['url'].$PHP_SELF.'?id='.$p['id'].'&page=';
				$html_make_file = array();
				for($i=2; $i<=$page_data['total_page']; $i++){ $html_make_file[] = $i; }
				$html->create_tmp($html_make_file,9,$html_url_head);
			}
			$page_data['page'] > 1 && $static_path = substr($static_path,0,-5).'-'.$page_data['page'].'.html'; 
		}
	} else {
		$content = $html->limit2php($config['url'].$PHP_SELF.'?id='.$p['id']);
	}
	$html->make($content,$static_path);
}
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$page_limit = false; 
$category = category::show($_GET['cid']); 
isset($category['id']) or error(404);
empty($category['templatelist']) or $template_file = $category['templatelist']; 
switch(member::browse($category['channel_id'],$category['nexus'])){
	case 2 : break; 
	case 0 : HTML_MAKE_MODE ? ($page_limit = true) : msgbox($language['page']['logged'],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); break; 
	case 1 : HTML_MAKE_MODE ? ($page_limit = true) : msgbox($language['page']['permissions'],'./'); break; 
	default: die('Undefined Options.$Id:category.php'); break;
}
empty($category['seotitle']) && $category['seotitle'] = $category['title']; 
$mle['category'] = $category;
$mle['channel_id'] = $category['channel_id']; 
$mle['channel_title'] = $category['channel']; 
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = $category['URL'];
	if($page_limit === false){
		$content = $mlecms->fetch($template_file); 
		$page_data = $mlecms->getTemplateVars('page_data');	
		if(is_numeric($page_data['total_page']) && $page_data['total_page'] > 1){
			if($page_data['page'] == 1){
				$html_url_head = $config['url'].$PHP_SELF.'?cid='.$category['id'].'&page=';
				$html_make_file = array();
				for($i=2; $i<=$page_data['total_page']; $i++){ $html_make_file[] = $i; }
				$html->create_tmp($html_make_file,9,$html_url_head);
			}
			$page_data['page'] > 1 && $static_path = substr($static_path,0,-5).'-'.$page_data['page'].'.html'; 
		}
	} else {
		$content = $html->limit2php($config['url'].$PHP_SELF.'?cid='.$category['id']);
	}
	$html->make($content,$static_path);
}
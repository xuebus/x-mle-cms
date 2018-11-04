<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$member_config = member::get_config();
$member_config['search_open'] == 2 && msgbox($language['page']['disable']); 
$member_config['search_open'] == 1 && encryption($_COOKIE['mlecms_user_login'],'DECODE',WEBKEY) != 'mlecms' && msgbox($language['page']['member_search'],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); 
$web['title'] = $language['page']['title']; 
if(!empty($_GET['word']) || !empty($_GET['tag'])){
	$mlecms -> caching = false; 
	$member_config['search_interval'] > 0 && ip::gap(1,$member_config['search_interval']) && msgbox(str_replace('{#search_interval}',$member_config['search_interval'],$language['page']['timeout'])); 
	$search = new search();
	$search -> word = $_GET['word']; 
	$search -> type = numeric($_GET['type'],1,4); 
	$search -> channel = numeric($_GET['pid']) > 0 ? $_GET['pid'] : 0; 
	$search -> category = numeric($_GET['cid']) > 0 ? $_GET['cid'] : 0; 
	$search -> tag = $_GET['tag']; 
	$search -> limit = 10; 
	$search -> max_limit = 1000; 
	$search -> sort = 0; 
	$search -> fulltext = ($member_config['search_fulltext'] == 0 || ($member_config['search_fulltext'] == 1 && encryption($_COOKIE['mlecms_user_login'],'DECODE',WEBKEY) == 'mlecms')) ? true : false; 
	$search -> title_length = 56; 
	$search -> content_length = 180; 
	$search -> numeric_page = 4; 
	$search -> word_css = 'search_keyword'; 
	$mle['search_data'] = $search -> data(); 
	$mle['search_keyword'] = $search -> keyword; 
	$mle['search_is_tag'] = $search -> is_tag; 
	$mlecms->assign('page_data',$search -> page_data);
	$search -> keyword && $web['title'] .= ' - ' . $search -> keyword;
} else {
	$mle['search_data'] = array();
}
$mle['search_type'] = numeric($_GET['type'],1,4); 
$mle['search_type_url'] = $search -> is_tag ? 'search.php?tag='.urlencode($_GET['word']).'&pid=0&cid=0&type=' : 'search.php?word='.urlencode($_GET['word']).'&pid=0&cid=0&type='; 
require_once(MLEINC.'/include/footer.php');
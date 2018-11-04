<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$mlecms->caching = false; 
$mle['msg_captcha'] = is_array($captcha_config['open']) && in_array(4,$captcha_config['open']) ? true : false; 
if(isset($_POST['title'])){
	$member_config = member::get_config(); 
	$member_config['message'] == 2 ? msgbox($language['page']['form'][18],'guestbook.php') : ($member_config['message'] == 1 && USER_LOGIN !== true && msgbox($language['page']['form'][19],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])));
	$post = html_chars($_POST,ENT_QUOTES);
	strlen(trim($post['title'])) < 3 && msgbox($language['page']['form'][0]);
	strlen(trim($post['content'])) < 3 && msgbox($language['page']['form'][1]);
	strlen(trim($post['nickname'])) < 3 && msgbox($language['page']['form'][2]);
	if($mle['msg_captcha']){
		$img = new captcha();
		true !== $img->check($post['captcha']) && msgbox($language['page']['captcha_error']);
	}
	$member_config['message_interval'] > 0 && ip::gap(4,$member_config['message_interval']*60,0,true,true) && msgbox($language['page']['form'][20],'guestbook.php');
	$sql = "INSERT INTO `{$DB['prefix']}guestbook` (`lang`,`nickname`,`email`,`phone`,`fax`,`company`,`address`,`qq`,`sex`,`title`,`content`,`visible`,`username`,`ip`,`addtime`,`audit`,`reply`,`replyadmin`,`replytime`) VALUES ('".LANG."','{$post['nickname']}','{$post['email']}','{$post['phone']}','{$post['fax']}','{$post['company']}','{$post['address']}','{$post['qq']}','".numeric($post['sex'])."','{$post['title']}','".trim($post['content'])."','".numeric($post['visible'])."','".$mle_user_info['username']."','".get_ip()."','".$gmt_time."','0','','','0')";
	$db->execute($sql) ? msgbox($language['page']['form'][21],'guestbook.php') : msgbox($language['page']['form'][22],'guestbook.php');
}
function msg_data($limit = 10){
	global $_GET,$mlecms,$config,$db;
	$sql = "SELECT * FROM `{$db->prefix}guestbook` WHERE `lang` = '".LANG."' ";
	$config['guestbook_show'] == 1 && $sql .= "&& `audit` = '1' "; 
	$page_data['limit'] = $limit; 
	$page_data['total'] = $db->query(str_replace('*','count(*)',$sql),1,0); 
	$page_data['total'] = $page_data['total'][0];
	$page_data['total_page'] = ceil($page_data['total'] / $limit); 
	$page_data['page'] = is_numeric($_GET['page']) ? $_GET['page'] : 1;
	$page_data['page'] > $page_data['total_page'] && $page_data['page'] = $page_data['total_page'];	
	$page_data['page'] < 1 && $page_data['page'] = 1;
	$start = $limit * ($page_data['page'] - 1);
	$page_data['limit'] = $limit; 
	$range = 2;
	$x = $page_data['page'] - $range;
	$y = $page_data['page'] + $range;
	if($x < 1){$y += 1-$x; $x = 1;}
	if($y > $page_data['total_page']){$x -= $y - $page_data['total_page']; $y = $page_data['total_page'];}
	$x < 1 && $x = 1;
	if(MLE_URL_MODE == 1){ 
		$page_data['start_url'] = durl('page',1,NULL); 
		$page_data['first_url'] = durl('page',$page_data['page'] > 2 ? ($page_data['page'] - 1) : 1,NULL); 
		$page_data['next_url'] = durl('page',($page_data['page'] + 1) < $page_data['total_page'] ? ($page_data['page'] + 1) : $page_data['total_page'],NULL);  
		$page_data['end_url'] = durl('page',$page_data['total_page'],NULL); 
		for($i = $x; $i <= $y; $i++){
			$page_data['number'][$i] = durl('page',$i,NULL);
		}
	} else { 
		$static_path = misc::url('guestbook'); 
		$html_file = substr($static_path,0,-5); 
		$page_data['start_url'] = $static_path; 
		$page_data['first_url'] = $page_data['page'] > 2 ? ($html_file.'-'.($page_data['page'] - 1).'.html') : $static_path; 
		$page_data['next_url'] = $html_file.'-'.($page_data['page'] + 1).'.html';  
		$page_data['end_url'] = $html_file.'-'.$page_data['total_page'].'.html'; 
		for($i = $x; $i <= $y; $i++){
			$page_data['number'][$i] = $i > 1 ? ($html_file.'-'.$i.'.html') : $static_path;
		}
	}
	$mlecms->assign('page_data',$page_data); 
	$sql .= "ORDER BY `id` DESC LIMIT {$start},{$limit}";
	$result = $db->query($query_sql.$sql);
	return $result;	
}
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = misc::url('guestbook');
	$content = $mlecms->fetch($template_file); 
	$page_data = $mlecms->getTemplateVars('page_data');	
	if(is_numeric($page_data['total_page']) && $page_data['total_page'] > 1){
		if($page_data['page'] == 1){
			$html_url_head = $config['url'].$PHP_SELF.'?page=';
			$html_make_file = array();
			for($i=2; $i<=$page_data['total_page']; $i++){ $html_make_file[] = $i; }
			$html->create_tmp($html_make_file,9,$html_url_head);
		}
		$page_data['page'] > 1 && $static_path = substr($static_path,0,-5).'-'.$page_data['page'].'.html'; 
	}
	$html->make($content,$static_path);
}
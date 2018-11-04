<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
$mle['enabled_captcha'] = is_array($captcha_config['open']) && in_array(5,$captcha_config['open']) ? true : false; 
$member_config = member::get_config();
if(!HTML_MAKE_MODE){
	$member_config['feedback'] == 2 ? msgbox($language['page']['msg'][8]) : ($member_config['feedback'] == 1 && USER_LOGIN !== true && msgbox('',$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])));
}
if(!empty($_POST)){
	$member_config['feedback_interval'] > 0 && ip::gap(6,$member_config['feedback_interval']*60,0,true,true) && msgbox($language['page']['msg'][9],misc::get_url('feedback'));
	if($mle['enabled_captcha']){
		$img = new captcha();
		true !== $img->check($_POST['captcha']) && msgbox($language['page']['msg'][7]);
	}
	$content = NULL;
	$title = $language['page']['title'] . ' - ' .$config['url'];
	foreach ($_POST as $i => $n){
		if($i != 'captcha' && !empty($n)) $content .= $i . '：' . str_replace(chr(10),'<br />',$n) . '<br /><br />';
	}
	if(USER_LOGIN){
		$content .= '<br />User Name: '.$mle_user_info['username'].'<br />User ID: '.$mle_user_info['id'].'<br />User Email: '.$mle_user_info['email'];	
	}
	$content .= '<br />Source: <a target="_blank" href="'.$config['url'].'feedback.php">'.$config['url'].'</a><br />Date Of Submission: '.date(MLE_DATE_FORMAT_LONG,$gmt_time).'<br />User IP: <a target="_blank" href="http://www.ip138.com/ips.asp?ip='.get_ip().'">'.get_ip().'</a><br />';
	$msg = misc::email($web['email'][0],'Service',$title,$content);
	if($msg === true){
		msgbox($language['page']['msg'][5],'./');
	} else {
		msgbox($language['page']['msg'][6]);
	}
}
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = misc::url('feedback');
	$content = $mlecms->fetch($template_file); 
	$html->make($content,$static_path);
}
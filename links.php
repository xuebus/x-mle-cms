<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
if(!empty($_POST['webname'])){
	USER_LOGIN or msgbox($language['page']['msg'][2],$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI'])); 
	is_webaddr($_POST['weburl']) or msgbox($language['page']['msg'][4]); 
	ip::gap(5,1200,0,true,true) && msgbox($language['page']['msg'][3],'./'); 
	$type = empty($_POST['logourl']) ? 0 : 1;
	$sql = "INSERT INTO `{$DB['prefix']}links`(`lang`,`type`,`webname`,`weburl`,`logourl`,`webmaster`,`contact`,`info`,`color`,`sort`,`audit`,`addtime`) VALUES ('".LANG."','{$type}','{$_POST['webname']}','{$_POST['weburl']}','{$_POST['logourl']}','{$_POST['webmaster']}','{$_POST['contact']}','{$_POST['info']}','',100,0,'{$gmt_time}')";
	$db->execute($sql) ? msgbox($language['page']['msg'][0],'./') : msgbox($language['page']['msg'][1],'./');
}
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = misc::url('links');
	$content = $mlecms->fetch($template_file); 
	$html->make($content,$static_path);
}
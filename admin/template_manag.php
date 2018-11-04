<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(!empty($_GET['enable']) && is_dir(MLEINC.'/templates/frontend/'.$_GET['enable'])){
	if($db->execute("UPDATE `{$DB['prefix']}website` SET `template` = '{$_GET['enable']}' WHERE `lang` = ".LANG.";")){
		admin::logs(3,$language['page'][18]."({$_GET['enable']})，{$language['common']['successful']}");
		msgbox('','CURRENT');
	} else {
		admin::logs(3,$language['page'][18]."({$_GET['enable']})，{$language['common']['failed']}");
		msgbox($language['common']['failed'],'CURRENT'); 
	}
}
$template_data = template::get_list();
$total = count($template_data); 
$limit = $_SESSION['admin']['limit'];
is_numeric($limit) or $limit = 20; 
$total_page = ceil($total / $limit); 
$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
$page > $total_page && $page = $total_page;	
$page < 1 && $page = 1;
$mle['page'] = admin::page($total,$page,$limit,$total_page,1,10);
$template_list = array();
for($i=0; $i<$limit; $i++){
	$xi = (($page - 1) * $limit) + $i;
	$n = $file_list[$xi];
	if(($total % $limit != 0 && $page >= $total_page && $i >= $total % $limit) || $total == 0 || $xi > $total){
		break;
	} else {
		$template_list[] = $template_data[$xi];
	}
}
$is_use_dir = array(); 
foreach ($template_list as &$n){
	$n['use_web'] = '';
	foreach ($web['all_data'] as $e){
		$e['template'] == $n['dir'] && $n['use_web'] .= $e['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	
	}
	if($n['use_web'] == ''){
		$n['use_web'] = '<em>NULL</em>'; 
		$n['is_use'] = false; 
	} else {
		$n['use_web'] = '<font color="#FF0000">'.$n['use_web'].'</font>'; 
		$n['is_use'] = true;
		$is_use_dir[] = $n['dir'];
	}
	$n['dlang_use'] = $web['template'] == $n['dir'] ? true : false;
}
$mle['template_list'] = $template_list;
$mle['template_path'] = '../inc/templates/frontend/';
if(!empty($_GET['del']) && is_dir($mle['template_path'].$_GET['del'])){
	if(in_array($_GET['del'],$is_use_dir)){
		msgbox($language['page'][17],'CURRENT');	
	} else {
		if(remove_dir($mle['template_path'].$_GET['del'])){
			admin::logs(4,$language['page'][12]."，{$language['common']['successful']}");
			msgbox($language['common']['successful'],'CURRENT'); 
		} else {
			admin::logs(4,$language['page'][12]."，{$language['common']['failed']}");
			msgbox($language['common']['failed'],'CURRENT'); 
		}
	}
}
require_once(ADMIN_PATH.'/footer.php');
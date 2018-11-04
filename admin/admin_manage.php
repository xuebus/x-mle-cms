<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(is_numeric($_GET['id'])){
	if($_GET['id'] != $_SESSION['admin']['login']['id']){
		if($db->delete('admin',$_GET['id'])){
			admin::logs(4,$language['page'][10].'，'.$language['common']['successful'].'(id:'.$_GET['id'].')');
			msgbox('','CURRENT');		
		} else {
			admin::logs(4,$language['page'][10].','.$language['common']['failed'].'(id:'.$_GET['id'].')'); 
			msgbox($language['common']['failed'],'CURRENT');			
		}
	} else {
		msgbox($language['page'][12],'CURRENT');	
	}
}
$admin_list = $db->query("SELECT * FROM `{$db->prefix}admin` ORDER BY `id` ASC");
foreach($admin_list as &$n){
	$n['level'] = $n['level'] == 1 ? '<font color="#FF0000">'.$language['page'][8].'</font>' : $language['page'][7];
	$n['loginip'] = str_replace(',',' , ',$n['loginip']);
	$n['loginaddress'] = str_replace(STRING_DELIMITED,' , ',$n['loginaddress']);
	$sdate = explode(",",$n['logintime']);
	$sdate[0] = $sdate[0] < 1 ? '<em>NULL</em>' : date('Y-m-d H:i:s',$sdate[0]);
	$sdate[1] = $sdate[1] < 1 ? '<em>NULL</em>' : date('Y-m-d H:i:s',$sdate[1]);
	$n['logintime'] = $sdate[0] . ' , ' . $sdate[1];
}
$mle['admin_list'] = $admin_list;
require_once(ADMIN_PATH.'/footer.php'); 
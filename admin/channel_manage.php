<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(is_numeric($_GET['del'])){
	$ass = $db->query("SELECT `id` FROM `{$DB['prefix']}category` WHERE `channel` = '{$_GET['del']}' LIMIT 1",1);
	if(empty($ass['id'])){ 
		if($db->execute("DELETE FROM `{$DB['prefix']}channel` WHERE `id` = '{$_GET['del']}'")){ 
			admin::logs(4,$language['page']['del_channel'].'，'.$language['common']['successful'].'(id:'.$_GET['del'].')'); 
			msgbox('','CURRENT'); 	
		} else {
			admin::logs(4,$language['page']['del_channel'].'，'.$language['common']['failed'].'(id:'.$_GET['del'].')');
			msgbox($language['common']['failed'],'CURRENT'); 		
		}	
	} else {
		msgbox($language['page']['category_exists'],'CURRENT'); 
	}
}
$sql = "SELECT a.*,b.`modname` FROM `{$DB['prefix']}channel` a LEFT JOIN `{$DB['prefix']}module` b ON a.`module` = b.`modcode` WHERE a.`lang` = '".LANG."' ORDER BY a.`sort` ASC,a.`id` ASC";
$mle['channel_list'] = $db->query($sql);
foreach($mle['channel_list'] as &$n){
	$n['module_text'] = '';
	$n['show_text'] = $n['show'] ? '<img src="../inc/templates/manage/images/operation/accept.png" width="16" height="16" title="'.$language['page']['show'].'" />' : '<img src="../inc/templates/manage/images/operation/ban.png" width="16" height="16" title="'.$language['page']['hide'].'" />';
	empty($n['modname']) && $n['modname'] = $language['page']['links']; 
}
require_once(ADMIN_PATH.'/footer.php');
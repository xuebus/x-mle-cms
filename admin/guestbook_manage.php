<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$ids = is_numeric($_GET['id']) ? array($_GET['id']) : $_POST['id'];
if(isset($action) && is_array($ids)){
	switch ($action){
		case 'audit' : 
			$lid = 3;
			$log_info = $language['page'][21];
			$result = $db->execute("UPDATE `{$DB['prefix']}guestbook` SET `audit` = 1 WHERE `id` in ('".implode("','",$ids)."');");
			break;
		case 'unaudit' : 
			$lid = 3;
			$log_info = $language['page'][22];
			$result = $db->execute("UPDATE `{$DB['prefix']}guestbook` SET `audit` = 0 WHERE `id` in ('".implode("','",$ids)."');");
			break;
		case 'del' : 
			$lid = 4;
			$log_info = $language['page'][23];
			$result = $db->delete('guestbook',$ids);
			break;
		default: die('Undefined parameters.'); break;
	}
	if($result === true){
		admin::logs($lid,$log_info.'，'.$language['common']['successful'].'(id:'.implode(",",$ids).')');
		msgbox('',durl()); 
	} else { 
		admin::logs($lid,$log_info.'，'.$language['common']['failed'].'(id:'.implode(",",$ids).')'); 
		msgbox($language['common']['failed']);	
	}		
}
$sql = "SELECT * FROM `{$DB['prefix']}guestbook` WHERE `lang` = '{$lang}' ";
$limit = $_SESSION['admin']['limit'];
is_numeric($limit) or $limit = 20; 
$total = $db->query(str_replace('*','count(*)',$sql),1,0);
$total = $total[0];		
$total_page = ceil($total / $limit);		
$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
$page > $total_page && $page = $total_page;	
$page < 1 && $page = 1;
$start = $limit * ($page - 1);
$sql .= "ORDER BY `id` DESC LIMIT {$start},{$limit}";
$mle['guestbook_list'] = $db->query($sql);
$mle['page'] = admin::page($total,$page,$limit,$total_page);
$mle['dpage'] = $page;
require_once(ADMIN_PATH.'/footer.php'); 
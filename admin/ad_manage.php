<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(isset($action) && is_numeric($id)){
	switch ($action){
		case 'enable' : 
			$lid = 3;
			$log_info = $language['page'][22];
			$result = $db->execute("UPDATE `{$DB['prefix']}ad` SET `enable` = 1 WHERE `id` = '{$id}';");
			break;
		case 'unenable' : 
			$lid = 3;
			$log_info = $language['page'][23];
			$result = $db->execute("UPDATE `{$DB['prefix']}ad` SET `enable` = 0 WHERE `id` = '{$id}';");
			break;
		case 'del' : 
			$lid = 4;
			$log_info = $language['page'][24];
			$result = $db->delete('ad',$id);
			break;
		default: die('Undefined parameters.'); break;
	}
	if($result === true){
		admin::logs($lid,$log_info.'，'.$language['common']['successful'].'(id:'.$id.')');
		msgbox('',durl()); 
	} else { 
		admin::logs($lid,$log_info.'，'.$language['common']['failed'].'(id:'.$id.')'); 
		msgbox($language['common']['failed']);	
	}		
}
$sql = "SELECT * FROM `{$DB['prefix']}ad` WHERE `lang` = '{$lang}' ";
$limit = $_SESSION['admin']['limit'];
is_numeric($limit) or $limit = 20; 
$total = $db->query(str_replace('*','count(*)',$sql),1,0);
$total = $total[0];		
$total_page = ceil($total / $limit);		
$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
$page > $total_page && $page = $total_page;	
$page < 1 && $page = 1;
$start = $limit * ($page - 1);
$sql .= "ORDER BY `aid` ASC,`sort` ASC LIMIT {$start},{$limit}";
$mle['ad_list'] = $db->query($sql);
$mle['page'] = admin::page($total,$page,$limit,$total_page);
$mle['dpage'] = $page;
$mle['gmt_time'] = $gmt_time;
require_once(ADMIN_PATH.'/footer.php'); 
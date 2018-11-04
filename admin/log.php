<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$mle['prohibition_day'] = 20; 
if(is_array($ids)){
	$atitme = $gmt_time - ($mle['prohibition_day']*86400);
	$a = $db->query($sql = "SELECT `id` FROM `{$DB['prefix']}logs` WHERE `id` in('".implode("','",$ids)."') && `addtime` < {$atitme};");
	$oid = array();
	foreach($a as $n){
		$oid[] = $n['id'];	
	}
	if(count($oid) >= 1){
		$log_info = $language['page']['remove'];
		if($db->delete('logs',$oid)){
			admin::logs(4,$log_info.'，'.$language['common']['successful'].'(id:'.implode(',',$oid).')'); 
			msgbox($language['page']['success'],'CURRENTS'); 	
		} else { 
			admin::logs(4,$log_info.'，'.$language['common']['failed'].'(id:'.implode(',',$oid).')'); 
			msgbox($language['common']['failed']);
		}
	} else {
		msgbox($language['page']['no_del'],'CURRENTS');
	}
}
function logs(){	
		global $db,$_GET,$DB;
		$sql = "SELECT * FROM `{$DB['prefix']}logs` WHERE `lang` = '".LANG."' ";
		is_numeric($_GET['type']) && $sql .= "&& `type` = '{$_GET['type']}' ";
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
		$result = array(
			'page' => $page, 
			'limit' => $limit, 
			'total' => $total, 
			'total_page' => $total_page, 
			'data' => $db->query($sql), 
		);
		return $result;	
}	
$list = logs();
foreach($list['data'] as &$n){
	$n['info'] = '<a href="javascript:void(0);" title="'.$n['info'].'" class="title2div">'.cut_str($n['info'],50).'</a>';
	$n['type'] = '<a href="javascript:void(0);" title="'.$language['page']['url'].$n['pageurl'].'" class="title2div">'.$language['page']['type'.$n['type']].'</a>';
}
$mle['list'] = $list['data']; 
$mle['page'] = admin::page($list['total'],$list['page'],$list['limit'],$list['total_page']);
require_once(ADMIN_PATH.'/footer.php'); 
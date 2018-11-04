<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(is_array($ids)){
	$log_info = $language['page']['remove'];
	if($db->execute("DELETE FROM `{$DB['prefix']}transaction` WHERE `addtime` < ".($gmt_time - 172800)." && `id` in ('".implode("','",$ids)."')")){
		admin::logs(4,$log_info.'，'.$language['common']['successful'].'(id:'.implode(',',$ids).')'); 
		msgbox('','CURRENTS'); 	
	} else { 
		admin::logs(4,$log_info.'，'.$language['common']['failed'].'(id:'.implode(',',$ids).')'); 
		msgbox($language['common']['failed']);
	}
}
$list = transaction_list(array('type' => $type,'id' => $id,'name' => $name,'word' => $word));
$mle['list'] = $list['data']; 
$mle['page'] = admin::page($list['total'],$list['page'],$list['limit'],$list['total_page']);
function transaction_list($params){	
	global $db,$_GET;
	extract($params);
	$sql = "SELECT a.*,b.`id` as uid,b.`username` FROM `{$db->prefix}transaction` a LEFT JOIN `{$db->prefix}members` b ON a.`uid` = b.`id` WHERE 1 ";
	is_numeric($type) && $type > 0 && $sql .= "&& a.`type` = {$type} ";
	is_numeric($id) && $sql .= "&& b.`id` = {$id} ";
	empty($name) or $sql .= "&& b.`username` = '{$name}' ";
	empty($word) or $sql .= "&& (b.`username` LIKE '%{$word}%' || a.`oid` LIKE '%{$word}%' || a.`amount` LIKE '%{$word}%' || a.`info` LIKE '%{$word}%') ";
	$limit = $_SESSION['admin']['limit'];
	is_numeric($limit) or $limit = 20; 
	$total = $db->query(str_replace('a.*,b.`username`','count(*)',$sql),1,0);
	$total = $total[0];		
	$total_page = ceil($total / $limit);		
	$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
	$page > $total_page && $page = $total_page;	
	$page < 1 && $page = 1;
	$start = $limit * ($page - 1);
	$sql .= "ORDER BY a.`id` DESC LIMIT {$start},{$limit}";
	$result = array(
		'page' => $page, 
		'limit' => $limit, 
		'total' => $total, 
		'total_page' => $total_page, 
		'data' => $db->query($sql), 
	);
	return $result;	
}
require_once(ADMIN_PATH.'/footer.php');
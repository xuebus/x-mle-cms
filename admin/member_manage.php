<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$mle['level'] = is_numeric($level) ? $level : 0;
$mle['word'] = trim($word);
$url = 'member_manage.php?level='.$mle['level'].'&word='.$mle['word'].'&sort=';
$mle['ourl'] = $url.$sort.'&page='.$page;
$x_result = $log_info = $log_type = 0; 
if(($action == 'del' && is_array($id)) || (is_numeric($del) && $id = $del)){
	$ids = (array)$id;
	if(member::delete($ids)){
		admin::logs(4,$language['page']['remove_member'].','.$language['common']['successful'].'(id:'.implode(',',$ids).')'); 
		msgbox('',durl('','','del,action')); 
	} else {
		admin::logs(4,$language['page']['remove_member'].','.$language['common']['failed'].'(id:'.implode(',',$ids).')'); 
		msgbox($language['common']['failed']);	
	}
}
if(($action == 'allow' || $action == 'ban') && (is_array($id) || is_numeric($id))){
	$log_type = 3;
	$log_info = $language['page']['change_status'];
	$whether = $action == 'allow' ? 1 : 0;
	$x_result = member::audit($id,$whether,'effective') ? 1 : 2;
}
if(($action == 'audit' || $action == 'unaudit') && (is_array($id) || is_numeric($id))){
	$log_type = 3;
	$log_info = $language['page']['audit'][7];
	$whether = $action == 'audit' ? 0 : 2;
	$x_result = member::audit($id,$whether,'audit') ? 1 : 2;
}
if($action == 'change_level' && is_array($id) && is_numeric($change_level)){
	$log_type = 3;
	$log_info = $language['page']['change_level'];
	$x_result = member::mobile($id,$change_level);
}
if($action == 'funds'){
	$amount > 500000 && msgbox($language['page']['overflow']);
	$log_type = 3;
	$log_info = $language['page']['recharge'];
	$x_result = member::recharge(array('id'=>$id,'amount'=>$amount,'amount'=>$amount,'type'=>2,'info'=>$info)) ? 1 : 2;
}
if($x_result == 1){ 
	admin::logs($log_type,$log_info.'，'.$language['common']['successful'].'(id:'.(is_array($id) ?  implode(',',$id) : $id).')'); 
	msgbox('',$mle['ourl']); 	
} elseif ($x_result == 2){ 
	admin::logs($log_type,$log_info.'，'.$language['common']['failed'].'(id:'.(is_array($id) ?  implode(',',$id) : $id).')'); 
	msgbox($language['common']['failed']);	
}
$mle['member_rank'] = member::rank();
$list = member::get_list(array('level' => $mle['level'],'sort' => (is_numeric($sort) ? $sort : 0),'word' => $mle['word']));
$mle['list'] = $list['data']; 
$mle['page'] = admin::page($list['total'],$list['page'],$list['limit'],$list['total_page']);
$mle['sort']['id'] = admin::cutover(0,$sort,$language['page']['id'],$url); 
$mle['sort']['name'] = admin::cutover(2,$sort,$language['page']['username'],$url); 
$mle['sort']['money'] = admin::cutover(4,$sort,$language['page']['money'],$url); 
$mle['sort']['scores'] = admin::cutover(6,$sort,$language['page']['scores'],$url); 
$mle['sort']['loginaddress'] = admin::cutover(8,$sort,$language['page']['loginaddress'],$url); 
$mle['sort']['join'] = admin::cutover(10,$sort,$language['page']['join'],$url); 
require_once(ADMIN_PATH.'/footer.php'); 
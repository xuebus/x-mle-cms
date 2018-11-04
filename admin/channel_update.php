<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$language['page']['title'] = is_numeric($_GET['id']) ? $language['page']['title'][1] : $language['page']['title'][0]; 
if($action == 'add'){
	$_POST = html_chars($_POST);
	$permission = is_array($_POST['permission']) ? (in_array('0',$_POST['permission']) ? '0' : implode(',',$_POST['permission'])) : 0;
	$sql = "INSERT INTO `{$DB['prefix']}channel`(`lang`,`title`,`url`,`target`,`module`,`permission`,`show`,`pathhome`,`pathcategory`,`pathcontent`,`seotitle`,`seokey`,`seodescr`,`template`,`sort`,`addtime`)";
	$sql .= "VALUES('".LANG."','".trim($_POST['title'])."','{$_POST['url']}','".($_POST['tmp_px'] == '1' ? $_POST['target'] : '_self')."','".($_POST['tmp_px'] != 1 ? $_POST['module'] : 0)."','{$permission}','{$_POST['show']}','".trim($_POST['pathhome'])."','".trim($_POST['pathcategory'])."','".trim($_POST['pathcontent'])."','{$_POST['seotitle']}','{$_POST['seokey']}','{$_POST['seodescr']}','{$_POST['template']}','".(is_numeric($_POST['sort']) ? $_POST['sort'] : 20)."','{$gmt_time}');";
	if($db->execute($sql)){
		$id = $db->get_last_id();
		admin::logs(2,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
		msgbox($language['common']['successful'],'channel_manage.php'); 
	} else {
		admin::logs(2,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'CURRENTS'); 
	}
}
if($action == 'update' && is_numeric($_GET['id'])){
	$_POST = html_chars($_POST);
	$permission = is_array($_POST['permission']) ? (in_array('0',$_POST['permission']) ? '0' : implode(',',$_POST['permission'])) : 0;
	$sql = "UPDATE `{$DB['prefix']}channel` SET `title` = '".trim($_POST['title'])."',`url` = '{$_POST['url']}',`target` = '".($_POST['tmp_px'] == '1' ? $_POST['target'] : '_self')."',`permission` = '{$permission}',`show` = '{$_POST['show']}',`pathhome` = '".trim($_POST['pathhome'])."',`pathcategory` = '".trim($_POST['pathcategory'])."',`pathcontent` = '".trim($_POST['pathcontent'])."',`seotitle` = '{$_POST['seotitle']}',`seokey` = '{$_POST['seokey']}',`seodescr` = '{$_POST['seodescr']}',`template` = '{$_POST['template']}',`sort` = '".(is_numeric($_POST['sort']) ? $_POST['sort'] : 20)."' WHERE `id` = '{$_GET['id']}';";
	if($db->execute($sql)){
		admin::logs(3,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
		msgbox($language['common']['successful'],'channel_manage.php'); 
	} else {
		admin::logs(3,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'CURRENTS'); 
	}	
}
if(!is_numeric($_GET['id'])){
	$mle['action'] = 'add'; 
	$mle['channel'] = array(); 
	$mle['channel']['sort'] = 20; 
	$mle['channel']['module_text'] = '<option value="" selected="selected">'.$language['page']['select'].'</option>';
	$mod = module::get(1);
	foreach($mod as $n){
		$mle['channel']['module_text'] .= '<option value="'.$n['modcode'].'">'.$n['modname'].'</option>';
	}
	$member_rank = member::rank();		
	$mle['channel']['permission_text'] = '<option value="0" selected>'.$language['page']['unlimited'].'</option>';
	foreach ($member_rank as $n){
		$mle['channel']['permission_text'] .= '<option value="'.$n['id'].'">'.$n['rankname'].'</option>';
	}
} else {
	$mle['action'] = 'update'; 
	$sql = "SELECT * FROM `{$DB['prefix']}channel` WHERE `lang` = '".LANG."' && `id` = '{$id}' LIMIT 1";
	if(!$mle['channel'] = $db->query($sql,1)){
		msgbox($language['page']['nodata'],'channel_manage.php');	
	}
	$member_rank = member::rank();
	$mle['channel']['permission_text'] = empty($mle['channel']['permission']) ? '<option selected value="0">'.$language['page']['unlimited'].'</option>' : '<option value="0">'.$language['page']['unlimited'].'</option>';
	$darr = explode(',',$mle['channel']['permission']);
	foreach ($member_rank as $n){
		$mle['channel']['permission_text'] .= in_array($n['id'],$darr) ? '<option selected value="'.$n['id'].'">'.$n['rankname'].'</option>' : '<option value="'.$n['id'].'">'.$n['rankname'].'</option>';
	}
}
require_once(ADMIN_PATH.'/footer.php');
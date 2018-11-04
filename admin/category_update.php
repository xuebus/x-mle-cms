<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$language['page']['title'] = is_numeric($_GET['id']) ? $language['page']['title'][1] : $language['page']['title'][0]; 
$mle['channel_show'] = $mle['category_show'] = true; 
if(!is_numeric($_GET['id'])){
	$mle['action'] = 'add'; 
	$mle['category'] = $cat = array(); 
	$sql = "SELECT * FROM `{$DB['prefix']}channel` WHERE `module` != '0' && `lang` = '".LANG."' ORDER BY `sort` ASC";
	$cat = $db->query($sql);
	$mle['category']['channel_text'] = empty($_GET['channel']) ? '<option selected="selected" value="">'.$language['page']['select_channel'].'</option>' : '<option value="category_update.php?channel=0">'.$language['page']['select_channel'].'</option>';
	foreach($cat as $n){
		$mle['category']['channel_text'] .= $_GET['channel'] != $n['id'] ? '<option value="category_update.php?channel='.$n['id'].'">'.$n['title'].'</option>' : '<option selected="selected" value="">'.$n['title'].'</option>';
	}
	unset($cat);
	$mle['category']['nexus_text'] = '<option selected="selected" value="">'.$language['page']['as_root'].'</option>';
	if(is_numeric($_GET['channel'])){
		$sql = "SELECT * FROM `{$DB['prefix']}category` WHERE `lang` = '".LANG."' && `channel` = '{$_GET['channel']}'";	
		$cat = category::order($db->query($sql));
		foreach($cat as $n){
			$inden = $n['level'] > 1 ? '├'.str_repeat('────',$n['level']-1) : '';
			$mle['category']['nexus_text'] .= $_GET['category'] == $n['id'] ? '<option selected="selected" value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>' : '<option value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>';
		}
	}
	$member_rank = member::rank();	
	$mle['category']['permission_text'] = '<option value="0" selected>'.$language['page']['unlimited'].'</option>';
	foreach ($member_rank as $n){
		$mle['category']['permission_text'] .= '<option value="'.$n['id'].'">'.$n['rankname'].'</option>';
	}	
	$mle['category']['sort'] = 20; 
} else {
	$mle['action'] = 'update'; 
	$mle['channel_show'] = false;
	$sql = "SELECT * FROM `{$DB['prefix']}category` WHERE `lang` = '".LANG."' && `id` = '{$_GET['id']}' LIMIT 1";
	if(!$mle['category'] = $db->query($sql,1)){
		msgbox($language['page']['nodata'],'BACK');	
	}	
	$sql = "SELECT * FROM `{$DB['prefix']}category` WHERE `lang` = '".LANG."' && `channel` = '{$mle['category']['channel']}'";	
	$cat = category::order($db->query($sql));
	$parent = $mle['category']['nexus'];
	$parent = substr($parent,0,strripos($parent,',',-2)+1);
	$mle['category']['nexus_text'] = ($parent == ',' || empty($parent)) ? '<option selected="selected" value="">'.$language['page']['as_root'].'</option>' : '<option value="">'.$language['page']['as_root'].'</option>';
	foreach($cat as $n){
		if($n['nexus'] != $mle['category']['nexus']){ 
			$inden = $n['level'] > 1 ? '├'.str_repeat('────',$n['level']-1) : '';
			$mle['category']['nexus_text'] .= ($parent != $n['nexus']) ? '<option value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>' : '<option selected="selected" value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>';
		}
	}
	$member_rank = member::rank();		
	$mle['category']['permission_text'] = empty($mle['category']['permission']) ? '<option value="0" selected>'.$language['page']['unlimited'].'</option>' : '<option value="0">'.$language['page']['unlimited'].'</option>';
	$darr = explode(',',$mle['category']['permission']);
	foreach ($member_rank as $n){
		$mle['category']['permission_text'] .= in_array($n['id'],$darr) ? '<option selected value="'.$n['id'].'">'.$n['rankname'].'</option>' : '<option value="'.$n['id'].'">'.$n['rankname'].'</option>';
	}		
}
if($action == 'add'){
	$introduction = $_POST['introduction']; 
	$_POST = html_chars($_POST); 
	(is_numeric($_GET['channel']) && $_GET['channel'] > 0) or msgbox($language['page']['select_channel'],'BACK'); 
	$cha = $db->query("SELECT `id`,`module` FROM `{$DB['prefix']}channel` WHERE `id` = '{$_GET['channel']}' LIMIT 1",1);
	empty($cha['module']) && die('Channel Parameter Error.');
	$level = empty($_POST['nexus']) ? 1 : count(explode(',',$_POST['nexus']))-1; 
	$permission = is_array($_POST['permission']) ? (in_array('0',$_POST['permission']) ? '0' : implode(',',$_POST['permission'])) : 0; 
	$sql = "INSERT INTO `{$DB['prefix']}category` (`lang`,`title`,`module`,`channel`,`level`,`nexus`,`htmllist`,`htmlcontent`,`seotitle`,`seokey`,`seodescr`,`permission`,`templatelist`,`templatecontent`,`picture`,`introduction`,`sort`,`addtime`) VALUES ";
	$sql .= "('".LANG."','".trim($_POST['title'])."','{$cha['module']}','{$cha['id']}','{$level}','','{$_POST['htmllist']}','{$_POST['htmlcontent']}','{$_POST['seotitle']}','{$_POST['seokey']}','{$_POST['seodescr']}','{$permission}','{$_POST['templatelist']}','{$_POST['templatecontent']}','{$_POST['picture']}','{$introduction}','".(is_numeric($_POST['sort']) ? $_POST['sort'] : 20)."','{$gmt_time}');";
	if($db->execute($sql)){
		$id = $db->get_last_id();
		$nexus = empty($_POST['nexus']) ? ','.$id.',' : $_POST['nexus'].$id.','; 
		if($db->execute("UPDATE `{$DB['prefix']}category` SET `nexus` = '{$nexus}' WHERE `id` = '{$id}';")){ 
			admin::logs(2,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
			msgbox($language['common']['successful'],'category_manage.php'); 
		} else { 
			$db->execute("DELETE FROM `{$DB['prefix']}category` WHERE `id` = '{$id}'");
			admin::logs(2,$language['page']['title']."，{$language['common']['failed']}"); 
			msgbox($language['common']['failed'],'BACK'); 
		}
	} else { 
		admin::logs(2,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'BACK'); 
	}
}
if($action == 'update' && is_numeric($_GET['id'])){
	$introduction = $_POST['introduction']; 
	$_POST = html_chars($_POST);
	$nexus = empty($_POST['nexus']) ? ','.$_GET['id'].',' : $_POST['nexus'].$_GET['id'].','; 
	if($mle['category']['nexus'] != $nexus){
		if($db->query("SELECT `id` FROM `{$DB['prefix']}category` WHERE `lang` = '".LANG."' && `nexus` LIKE '%,{$mle['category']['id']},%' && `id` != '{$_GET['id']}' LIMIT 1",1)){
			admin::logs(2,$language['page']['title']."，{$language['common']['failed']}(id:{$_GET['id']})。{$language['page']['there_category']}"); 
			msgbox($language['common']['failed'].','.$language['page']['there_category'],'BACK'); 
		}
		switch ($mle['category']['module']){
			case 'MO001x' : $table = 'article'; break;
			case 'MO002x' : $table = 'product'; break;
			case 'MO003x' : $table = 'picture'; break;
			case 'MO004x' : $table = 'download'; break;
			default: die('Undefined Parameters.'); break;
		}
		$table = $DB['prefix'].$table;
		if($db->query("SELECT `id` FROM `{$table}` WHERE `category` LIKE '%,{$mle['category']['id']},%';",1)){
			admin::logs(2,$language['page']['title']."，{$language['common']['failed']}(id:{$_GET['id']})。{$language['page']['there_content']}"); 
			msgbox($language['common']['failed'].','.$language['page']['there_content'],'BACK'); 
		}
	}
	$level = empty($_POST['nexus']) ? 1 : count(explode(',',$_POST['nexus']))-1; 
	$permission = is_array($_POST['permission']) ? (in_array('0',$_POST['permission']) ? '0' : implode(',',$_POST['permission'])) : 0; 
	$sql = "UPDATE `{$DB['prefix']}category` SET `title` = '".trim($_POST['title'])."',`level` = '{$level}',`nexus` = '{$nexus}',`htmllist` = '{$_POST['htmllist']}',`htmlcontent` = '{$_POST['htmlcontent']}',`seotitle` = '{$_POST['seotitle']}',`seokey` = '{$_POST['seokey']}',`seodescr` = '{$_POST['seodescr']}',`permission` = '{$permission}',`templatelist` = '{$_POST['templatelist']}',`templatecontent` = '{$_POST['templatecontent']}',`picture` = '{$_POST['picture']}',`introduction` = '{$introduction}',`sort` = '".(is_numeric($_POST['sort']) ? $_POST['sort'] : 20)."' WHERE `id` = '{$_GET['id']}';";
	if($db->execute($sql)){
		admin::logs(3,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
		msgbox($language['common']['successful'],'category_manage.php'); 
	} else {
		admin::logs(3,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'BACK'); 
	}	
}
require_once(ADMIN_PATH.'/footer.php'); 
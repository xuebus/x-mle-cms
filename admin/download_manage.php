<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$mle['channel_show'] = true; 
$mle['op_url'] = 'download_manage.php?channel='.(is_numeric($_GET['channel']) ? $_GET['channel'] : 0).'&category='.(is_numeric($_GET['category']) ? $_GET['category'] : 0).'&sort='.(is_numeric($_GET['sort']) ? $_GET['sort'] : 0).'&page='.((is_numeric($_GET['page']) && $_GET['page'] > 1) ? $_GET['page'] : 1).'&trash='.($_GET['trash'] == 1 ? 1 : 0).'&filter='.(is_numeric($_GET['filter']) ? $_GET['filter'] : 0); 
empty($_GET['word']) or $mle['op_url'] .= '&word='.$_GET['word'];
$ids = is_numeric($_GET['id']) ? array($_GET['id']) : $_POST['id'];
if(isset($action) && is_array($ids)){
	$result = $log_type = $log_info = 0; 
	switch ($action){
		case 'clear' : $log_type = 4; $log_info = $language['page']['volume'][3]; break; 
		case 'audit' : $log_type = 3; $log_info = $language['page']['volume'][0]; $update = '`audit` = 1'; break;
		case 'unaudit' : $log_type = 3; $log_info = $language['page']['volume'][1]; $update = '`audit` = 0'; break;
		case 'del' : $log_type = 4; $log_info = $language['page']['volume'][2]; $update = '`recycle` = 1'; comment::delete($ids,'aid',4); break; 
		case 'restore' : $log_type = 4; $log_info = $language['page']['volume'][8]; $update = '`recycle` = 0'; break;
		case 'recom' : $log_type = 3; $log_info = $language['page']['volume'][6]; $update = '`recom` = 1'; break;
		case 'unrecom' : $log_type = 3; $log_info = $language['page']['volume'][7]; $update = '`recom` = 0'; break;
		default: die('Undefined parameters.'); break;
	}
	if($action == 'clear'){ 
		$wait_tag = $db->query("SELECT `tag` FROM `{$db->prefix}download` WHERE `id` in ('".implode("','",$ids)."');");
		$tag = '';
		foreach($wait_tag as $n){
			empty($n['tag']) or $tag .= ','.$n['tag'];	
		}
		$tag = explode(',',trim($tag,','));
		tag::delete($tag,'MO004x');
		admin::remove_upload($ids,'MO004x');
		comment::delete($ids,'aid',4);
		$result = $db->delete('download',$ids);
	} else {
		$result = $db->execute("UPDATE `{$db->prefix}download` SET {$update} WHERE `id` in ('".implode("','",$ids)."');");			
	}
	if($result === true){
		admin::logs($log_type,$log_info.'，'.$language['common']['successful'].'(id:'.implode(",",$ids).')');
		msgbox('',$mle['op_url']); 
	} else { 
		admin::logs($log_type,$log_info.'，'.$language['common']['failed'].'(id:'.implode(",",$ids).')'); 
		msgbox($language['common']['failed']);	
	}	
}
$list = download_list($_GET['channel'],$_GET['category'],$_GET['word'],$_GET['sort'],$_GET['filter'],$_GET['trash']);
$mle['list'] = $list['data']; 
$mle['page'] = admin::page($list['total'],$list['page'],$list['limit'],$list['total_page']);
$sql = "SELECT * FROM `{$DB['prefix']}channel` WHERE `module` != '0' && `module` = 'MO004x' && `lang` = '".LANG."' ORDER BY `sort` ASC";
$cat = $db->query($sql);
if(count($cat) == 1){
	$mle['channel_show'] = false; 
} else {
	$mle['channel_text'] = empty($_GET['channel']) ? '<option selected="selected" value="">'.$language['page']['all_channel'].'</option>' : '<option value="'.durl('channel',0,'category').'">'.$language['page']['all_channel'].'</option>';
	foreach($cat as $n){
		$mle['channel_text'] .= $_GET['channel'] != $n['id'] ? '<option value="'.durl('channel',$n['id'],'category').'">'.$n['title'].'</option>' : '<option selected="selected" value="">'.$n['title'].'</option>';
	}
}
$mle['category_text'] = !is_numeric($_GET['category']) ? '<option selected="selected" value="">'.$language['page']['all_category'].'</option>' : '<option value="'.durl('category',0).'">'.$language['page']['all_category'].'</option>';
$sql = "SELECT * FROM `{$DB['prefix']}category` WHERE `lang` = '".LANG."' && `module` = 'MO004x' ";
is_numeric($_GET['channel']) && $_GET['channel'] >= 1 && $sql .= "&& `channel` = '{$_GET['channel']}'";	
$cat = category::order($db->query($sql));
foreach($cat as $n){
	$inden = $n['level'] > 1 ? '├'.str_repeat('──',$n['level']-1) : '';
	$mle['category_text'] .= $_GET['category'] == $n['id'] ? '<option selected="selected" value="'.durl('category',$n['id']).'">'.$inden.$n['title'].'</option>' : '<option value="'.durl('category',$n['id']).'">'.$inden.$n['title'].'</option>';
}
$mle['filter_text'] = '';
$filter = is_numeric($_GET['filter']) ? $_GET['filter'] : 0;
for($i=0; $i<9; $i++){ 
	$mle['filter_text'] .= $filter == $i ? '<option selected="selected" value="">'.$language['page']['filter_text'][$i].'</option>' : '<option value="'.durl('filter',$i).'">'.$language['page']['filter_text'][$i].'</option>';
}
$mle['sort_text'] = '';
$sort = is_numeric($_GET['sort']) ? $_GET['sort'] : 0;
for($i=0; $i<9; $i++){ 
	$mle['sort_text'] .= $sort == $i ? '<option selected="selected" value="">'.$language['page']['sort_text'][$i].'</option>' : '<option value="'.durl('sort',$i).'">'.$language['page']['sort_text'][$i].'</option>';
}
function download_list(){
	global $db,$_GET;
	$param = func_get_args();
	$sql = "SELECT a.*,b.`title` as `channel_title`,c.`title` as `category_title` FROM `{$db->prefix}download` a LEFT JOIN `{$db->prefix}channel` b ON a.`channel` = b.`id` LEFT JOIN `{$db->prefix}category` c ON a.`category` = c.`nexus` WHERE a.`lang` = '".LANG."' ";
	(is_numeric($param[0]) && $param[0] > 0) && $sql .= "&& a.`channel` = '{$param[0]}' ";
	empty($param[1]) or $sql .= " && a.`category` LIKE '%,{$param[1]},%' ";
	empty($param[2]) or $sql .= " && (a.`title` LIKE '%{$param[2]}%' || a.`tag` LIKE '%{$param[2]}%' || a.`keyword` LIKE '%{$param[2]}%') ";
	switch($param[4]){
		case 1 : $sql .= "&& a.`recom` = '1' "; break;
		case 2 : $sql .= "&& a.`recom` = '0' "; break;
		case 3 : $sql .= "&& a.`audit` = '1' "; break;
		case 4 : $sql .= "&& a.`audit` = '0' "; break;
		case 5 : $sql .= "&& a.`permission` != '0' "; break;
		case 6 : $sql .= "&& (a.`money` > 0 || `integral` > 0) "; break;
		case 7 : $sql .= "&& a.`comment` = '1' "; break;
		case 8 : $sql .= "&& a.`comment` = '0' "; break;
		default: break;
	}
	$sql .= $param[5] == 1 ? "&& a.`recycle` = '1' " : "&& a.`recycle` = '0' ";
	$limit = $_SESSION['admin']['limit'];
	is_numeric($limit) or $limit = 20; 
	$total = $db->query(str_replace('a.*,b.`title` as `channel_title`,c.`title` as `category_title`','count(*)',$sql),1,0);
	$total = $total[0];		
	$total_page = ceil($total / $limit);		
	$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
	$page > $total_page && $page = $total_page;	
	$page < 1 && $page = 1;
	$start = $limit * ($page - 1);		
	switch($param[3]){
		case 0 : $sql .= "ORDER BY a.`addtime` DESC,a.`id` DESC "; break;
		case 1 : $sql .= "ORDER BY a.`addtime` ASC "; break;
		case 2 : $sql .= "ORDER BY a.`click` DESC,a.`id` DESC "; break;
		case 3 : $sql .= "ORDER BY a.`click` ASC,a.`id` ASC "; break;
		case 4 : $sql .= "ORDER BY a.`commenttotal` DESC,a.`id` DESC "; break;
		case 5 : $sql .= "ORDER BY a.`commenttotal` ASC,a.`id` ASC "; break;
		case 6 : $sql .= "ORDER BY a.`sort` DESC,a.`id` DESC "; break;
		case 7 : $sql .= "ORDER BY a.`count` DESC,a.`id` DESC "; break;
		case 8 : $sql .= "ORDER BY a.`count` ASC,a.`id` ASC "; break;
		default: $sql .= "ORDER BY a.`addtime` DESC,a.`id` DESC "; break;
	}
	$sql .= "LIMIT {$start},{$limit}";
	$data = $db->query($sql);
	foreach($data as &$n){
		$n['title'] = cut_str($n['title'],60);
		$n['title_format'] = empty($param[2]) ? $n['title'] : str_replace($param[2],'<span class="b red">'.$param[2].'</span>',$n['title']);
		empty($n['color']) or $n['title_format'] = '<font color="'.$n['color'].'">'.$n['title_format'].'</font>';
		$n['bold'] && $n['title_format'] = '<b>'.$n['title_format'].'</b>';
		$n['addtime'] = date('Y-m-d',$n['addtime']);
	}
	$result = array(
		'page' => $page, 
		'limit' => $limit, 
		'total' => $total, 
		'total_page' => $total_page, 
		'data' => $data, 
	);
	return $result;
}
require_once(ADMIN_PATH.'/footer.php'); 
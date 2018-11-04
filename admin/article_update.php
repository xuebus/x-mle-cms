<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$language['page']['title'] = is_numeric($_GET['id']) ? $language['page']['title'][1] : $language['page']['title'][0]; 
$mle['channel_show'] = true; 
if(!is_numeric($_GET['id'])){
	$mle['action'] = 'add'; 
	$mle['article'] = array(); 
	$mle['article']['items_'] = 2; 
	$sql = "SELECT * FROM `{$DB['prefix']}channel` WHERE `module` != '0' && `module` = 'MO001x' && `lang` = '".LANG."' ORDER BY `sort` ASC";
	$cat = $db->query($sql);
	if(count($cat) == 1){ 
		$mle['channel_show'] = false;
		if(!isset($_GET['channel'])){
			header('Location: article_update.php?channel='.$cat[0]['id']);
			exit();
		}
	}
	$mle['article']['channel_text'] = empty($_GET['channel']) ? '<option selected="selected" value="">'.$language['page']['select_channel'].'</option>' : '<option value="article_update.php?channel=0">'.$language['page']['select_channel'].'</option>';
	foreach($cat as $n){
		$mle['article']['channel_text'] .= $_GET['channel'] != $n['id'] ? '<option value="article_update.php?channel='.$n['id'].'">'.$n['title'].'</option>' : '<option selected="selected" value="">'.$n['title'].'</option>';
	}
	$mle['article']['nexus_text'] = is_numeric($_GET['category']) ? '<option selected="selected" value="">'.$language['page']['select_category'].'</option>' : '<option value="">'.$language['page']['select_category'].'</option>';
	if(is_numeric($_GET['channel'])){
		$sql = "SELECT * FROM `{$DB['prefix']}category` WHERE `lang` = '".LANG."' && `channel` = '{$_GET['channel']}'";	
		$cat = category::order($db->query($sql));
		foreach($cat as $n){
			$inden = $n['level'] > 1 ? '├'.str_repeat('────',$n['level']-1) : '';
			$mle['article']['nexus_text'] .= $_GET['category'] == $n['id'] ? '<option selected="selected" value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>' : '<option value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>';
		}
	}		
	$member_rank = member::rank();
	$mle['article']['permission_text'] = '<option value="0" selected>'.$language['page']['unlimited'].'</option>';
	foreach ($member_rank as $n){
		$mle['article']['permission_text'] .= '<option value="'.$n['id'].'">'.$n['rankname'].'</option>';
	}
	require_once(MLEINC.'/config/picture.config.php');
	$mle['article']['picture_config_js'] = $mle['article']['picture_js'] = '';
	for($i=0; $i<30; $i++){ 
		if($i > 0){
			$mle['article']['picture_config_js'] .= ',';
			$mle['article']['picture_js'] .= ',';
		}
		$mle['article']['picture_config_js'] .= '['.implode(',',$picture_config['MO001x'][($i>3 ? 3 : $i)]).']'; 
		$mle['article']['picture_js'] .= "''"; 
	}	
	$mle['article']['bold'] = $mle['article']['page'] = $mle['article']['recom'] = $mle['article']['permission'] = $mle['article']['money'] = $mle['article']['integral'] = $mle['article']['sort'] = 0;
	$mle['article']['published'] = $mle['article']['comment'] = $mle['article']['audit'] = 1;
	$mle['article']['click'] = rand(0,1000);
	$mle['article']['addtime'] = date('Y-m-d',$gmt_time);
	$mle['article']['page'] = 0;
} else {
	$mle['action'] = 'update'; 
	$mle['article'] = array(); 
	$mle['channel_show'] = false;
	$sql = "SELECT * FROM `{$DB['prefix']}article` WHERE `lang` = '".LANG."' && `id` = '{$_GET['id']}' LIMIT 1";
	if(!$mle['article'] = $db->query($sql,1)){
		msgbox($language['page']['nodata'],'BACK');	
	}
	$mle['article']['content'] = html_chars($mle['article']['content']);
	$mle['article']['nexus_text'] = '<option value="">'.$language['page']['select_category'].'</option>';
	$sql = "SELECT * FROM `{$DB['prefix']}category` WHERE `lang` = '".LANG."' && `channel` = '{$mle['article']['channel']}'";	
	$cat = category::order($db->query($sql));
	foreach($cat as $n){
		$inden = $n['level'] > 1 ? '├'.str_repeat('────',$n['level']-1) : '';
		$mle['article']['nexus_text'] .= $mle['article']['category'] == $n['nexus'] ? '<option selected="selected" value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>' : '<option value="'.$n['nexus'].'">'.$inden.$n['title'].'</option>';
	}
	$member_rank = member::rank();	
	$mle['article']['permission_text'] = empty($mle['article']['permission']) ? '<option value="0" selected>'.$language['page']['unlimited'].'</option>' : '<option value="0">'.$language['page']['unlimited'].'</option>';
	$darr = explode(',',$mle['article']['permission']);
	foreach ($member_rank as $n){
		$mle['article']['permission_text'] .= in_array($n['id'],$darr) ? '<option selected value="'.$n['id'].'">'.$n['rankname'].'</option>' : '<option value="'.$n['id'].'">'.$n['rankname'].'</option>';
	}
	require_once(MLEINC.'/config/picture.config.php');
	$mle['article']['picture_config_js'] = $mle['article']['picture_js'] = '';
	$mle['article']['picture'] = explode(',',$mle['article']['picture']); 
	$mle['article']['items_'] = count($mle['article']['picture']); 
	for($i=0; $i<30; $i++){ 
		if($i > 0){
			$mle['article']['picture_config_js'] .= ',';
			$mle['article']['picture_js'] .= ',';
		}
		$picture_config['MO001x'][$i][0] = $picture_config['MO001x'][$i][3] = 0; 
		$mle['article']['picture_config_js'] .= '['.implode(',',$picture_config['MO001x'][($i>3 ? 3 : $i)]).']'; 
		$mle['article']['picture_js'] .= "'".$mle['article']['picture'][$i]."'"; 
	}	
	is_numeric($mle['article']['addtime']) && $mle['article']['addtime'] = date('Y-m-d',$mle['article']['addtime']);	
}
if($action == 'add'){
	if($aid!=''){
		if(!preg_match('/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/',$aid)){
			msgbox($language['page']['aid_title'],'BACK');
		}
	}
	is_numeric($_GET['channel']) or msgbox($language['page']['select_channel'],'BACK'); 
	$content = $_POST['content']; 
	$_POST = html_chars($_POST); 
	$picture = is_array($_POST['picture_url']) ? implode(',',$_POST['picture_url']) : ''; 
	$permission = is_array($_POST['permission']) ? (in_array('0',$_POST['permission']) ? '0' : implode(',',$_POST['permission'])) : 0; 
	$page_size = $_POST['page'] == 2 ? numeric($_POST['page_size']) : numeric($_POST['page']);
	$page_size >= 2 && $content = misc::content_add_page_break($content,$page_size); 
	$_POST['tag'] = str_replace('，',',',trim($_POST['tag'])); 
	$sql = "INSERT INTO `{$DB['prefix']}article`(`lang`,`channel`,`category`,`title`,`brief`,`color`,`bold`,`tag`,`author`,`source`,
		`sourceurl`,`keyword`,`introduction`,`content`,`template`,`comment`,`picture`,`recom`,`published`,`audit`,`permission`,
		`filename`,`click`,`money`,`integral`,`buyuser`,`page`,`sort`,`publisher`,`addtime`,`aid`) VALUES (
		'".LANG."','{$_GET['channel']}','{$_POST['category']}','".trim($_POST['title'])."','".trim($_POST['brief'])."','{$_POST['color']}','".($_POST['bold'] == 1 ? 1 : 0)."','{$_POST['tag']}','{$_POST['author']}','{$_POST['source']}',
		'{$_POST['sourceurl']}','{$_POST['keyword']}','{$_POST['introduction']}','{$content}','{$_POST['template']}','".($_POST['comment'] == 0 ? 0 : 1)."','{$picture}','".($_POST['recom'] == 1 ? 1 : 0)."','".($_POST['published'] == 0 ? 0 : 1)."','".($_POST['audit'] == 1 ? 1 :0)."','{$permission}',
		'{$_POST['filename']}','".(is_numeric($_POST['click']) ? $_POST['click'] : 0)."','".(is_numeric($_POST['money']) ? $_POST['money'] : 0)."','".(is_numeric($_POST['integral']) ? $_POST['integral'] : 0)."','{$_POST['buyuser']}','{$page_size}',
		'".(is_numeric($_POST['sort']) ? $_POST['sort'] : 0)."','{$_SESSION['admin']['login']['username']}','".date2time($_POST['addtime'])."','{$aid}');";
	if($db->execute($sql)){
		$id = $db->get_last_id();
		tag::update(explode(',',$_POST['tag']),'MO001x');
		$pic_info = '';
		foreach($_POST['picture_url'] as $i => $n){
			$pics = new picture();
			$url = '../'.$n;
			if(is_file($url)){
				if($_POST['picture_cut'][$i] == 1){
					$pics->cut['file'] = $url;
					$pics->cut['width'] = $_POST['picture_width'][$i];
					$pics->cut['save_name'] = false;
					$pics->cut['height'] = $_POST['picture_height'][$i];
					$pics->cut() === true or $pic_info = $pics->info;	
				}
				if($_POST['picture_watermark'][$i] == 1){
					$pics->watermark['file'] = $url;
					$pics->watermark() === true or $pic_info = $pics->info;
				}
			}
		}
		admin::logs(2,$language['page']['title']."，{$language['common']['successful']}(id:{$id}){$pic_info}"); 
		$config['static'] == 2 && $_POST['make_html'] == '1' && admin::make_html(1,$id,'article_manage.php'); 
		msgbox($language['common']['successful'].($pic_info == '' ? '' : '，'.$pic_info),'article_manage.php'); 
	} else { 
		admin::logs(2,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'BACK'); 
	}
}
if($action == 'update' && is_numeric($_GET['id'])){
	if($aid!=''){
		if(!preg_match('/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/',$aid)){
			msgbox($language['page']['aid_title'],'BACK');
		}
	}
	$content = $_POST['content']; 
	$_POST = html_chars($_POST); 
	$picture = is_array($_POST['picture_url']) ? implode(',',$_POST['picture_url']) : ''; 
	$permission = is_array($_POST['permission']) ? (in_array('0',$_POST['permission']) ? '0' : implode(',',$_POST['permission'])) : 0; 
	$page_size = $_POST['page'] == 2 ? numeric($_POST['page_size']) : numeric($_POST['page']);
	$page_size >= 2 && $content = misc::content_add_page_break($content,$page_size); 
	$_POST['tag'] = str_replace('，',',',trim($_POST['tag'])); 
	$sql = "UPDATE `{$DB['prefix']}article` SET `aid` = '{$aid}',`category` = '{$_POST['category']}',`title` = '".trim($_POST['title'])."',`brief` = '".trim($_POST['brief'])."',`color` = '{$_POST['color']}',`bold` = '".($_POST['bold'] == 1 ? 1 : 0)."',
		`tag` = '{$_POST['tag']}',`author` = '{$_POST['author']}',`source` = '{$_POST['source']}',`sourceurl` = '{$_POST['sourceurl']}',`keyword` = '{$_POST['keyword']}',`introduction` = '{$_POST['introduction']}',
		`content` = '{$content}',`template` = '{$_POST['template']}',`comment` = '".($_POST['comment'] == 0 ? 0 : 1)."',`picture` = '{$picture}',`recom` = '".($_POST['recom'] == 1 ? 1 :0)."',
		`published` = '".($_POST['published'] == 0 ? 0 : 1)."',`audit` = '".($_POST['audit'] == 1 ? 1 : 0)."',`permission` = '{$permission}',`filename` = '{$_POST['filename']}',`click` = '".(is_numeric($_POST['click']) ? $_POST['click'] : 0)."',
		`money` = '".(is_numeric($_POST['money']) ? $_POST['money'] : 0)."',`integral` = '".(is_numeric($_POST['integral']) ? $_POST['integral'] : 0)."',`buyuser` = '{$_POST['buyuser']}',`page` = '{$page_size}',
		`sort` = '".(is_numeric($_POST['sort']) ? $_POST['sort'] : 0)."',`publisher` = '{$_SESSION['admin']['login']['username']}',`addtime` = '".date2time($_POST['addtime'])."'	WHERE `id` = '{$_GET['id']}';";
	if($db->execute($sql)){
		tag::modify(explode(',',$mle['article']['tag']),explode(',',$_POST['tag']),'MO001x');
		$pic_info = '';
		foreach($_POST['picture_url'] as $i => $n){
			$pics = new picture();
			$url = '../'.$n;
			if(is_file($url)){
				if($_POST['picture_cut'][$i] == 1){
					$pics->cut['file'] = $url;
					$pics->cut['width'] = $_POST['picture_width'][$i];
					$pics->cut['save_name'] = false;
					$pics->cut['height'] = $_POST['picture_height'][$i];
					$pics->cut() === true or $pic_info = $pics->info;	
				}
				if($_POST['picture_watermark'][$i] == 1){
					$pics->watermark['file'] = $url;
					$pics->watermark() === true or $pic_info = $pics->info;
				}
			}
		}		
		admin::logs(3,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
		$config['static'] == 2 && $_POST['make_html'] == '1' && admin::make_html(1,$id,'article_manage.php'); 
		msgbox($language['common']['successful'],'article_manage.php'); 
	} else {
		admin::logs(3,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'BACK'); 
	}	
}
$mle['article_aid_often'] = $db->query("SELECT `aid` FROM `{$DB['prefix']}article` WHERE  `aid`!='' AND `lang` = '".LANG."' GROUP BY `aid` ORDER BY COUNT(`aid`) DESC LIMIT 0,50");
require_once(ADMIN_PATH.'/footer.php'); 
<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$language['page']['title'] = is_numeric($_GET['id']) ? $language['page'][0] : $language['page'][1]; 
if($action == 'add'){
	$code = $_POST['code']; 
	$expired = $_POST['expired'];
	$_POST = html_chars($_POST);
	if(!preg_match('/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/',$aid)){
		msgbox($language['page'][48],'BACK');
	}	
	$weight = $weight > 20 ? 20 : ($weight < 1 ? 1 : $weight);
	$click = $click_open ? numeric($click) : -1;
	$start = strtotime($start);
	is_int($start) or $start = $gmt_time;
	$end = strtotime($end);
	is_int($end) or $end = $gmt_time + 2592000;
	$start < $end or msgbox($language['page'][54],'BACK');
	switch ($ad_type){
		case 1 :
			break; 
		case 2 :
			$code = '<a target="_blank" href="'.$url.'"><img src="'.$ad_image.'" width="'.$ad_width.'" height="'.$ad_height.'" alt="'.$ad_alt.'" title="'.$ad_alt.'" border="0" /></a>';
			break;
		case 3 :
			if (!empty($ad_color) && !empty($ad_size)) {
				$style = 'style="color:'.$ad_color.'; font-size:'.$ad_size.'px;"';
			} elseif (!empty($ad_color)){
				$style = 'style="color:'.$ad_color.'"';
			} elseif (!empty($ad_size)){
				$style = 'style="font-size:'.$ad_size.'px;"';
			} else {
				$style = '';	
			}
			$code = '<a target="_blank" href="'.$url.'"';
			$style == '' or $code .= ' '.$style;
			$code .= '>'.$ad_text.'</a>';
			break;
		case 4 :
			pathinfo($ad_flash,PATHINFO_EXTENSION) == 'swf' or msgbox($language['page'][52],'BACK');
			$code = '<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$ad_flash_width.'" height="'.$ad_flash_height.'">'."\r\n";
			$code .= '	<param name="movie" value="'.$ad_flash.'" />'."\r\n";
			$code .= '	<param name="quality" value="high" />'."\r\n";
			$code .= '	<param name="wmode" value="opaque" />'."\r\n";
			$code .= '	<param name="swfversion" value="7.0.70.0" />'."\r\n";
			$code .= '	<object type="application/x-shockwave-flash" data="'.$ad_flash.'" width="'.$ad_flash_width.'" height="'.$ad_flash_height.'">'."\r\n";
			$code .= '		<param name="quality" value="high" />'."\r\n";
			$code .= '		<param name="wmode" value="opaque" />'."\r\n";
			$code .= '		<param name="swfversion" value="7.0.70.0" />'."\r\n";
			$code .= '	</object>'."\r\n";
			$code .= '</object>';
			break;
		default: die('Undefined Operation.'); break;
	}
	$sql = "INSERT INTO `{$DB['prefix']}ad` (`lang`,`aid`,`title`,`url`,`code`,`weight`,`click`,`limit`,`start`,`end`,`expired`,`sort`,`enable`,`addtime`) VALUES (";
	$sql .= "'{$lang}','{$aid}','".trim($_POST['title'])."','{$_POST['url']}','{$code}','{$weight}', '{$click}', '".numeric($limit)."','{$start}','{$end}','{$expired}','".numeric($sort)."','".numeric($enable)."','{$gmt_time}')";
	if($db->execute($sql)){
		$id = $db->get_last_id();
		$href = 'href="app.php?a=ad&id='.$id.'"';
		$code = stripcslashes($code);
		$nurl = 'href="'.$url.'"';
		if($click == 0 && $ad_type != 4 && strstr($code,$nurl)){ 
			$code = str_replace($nurl,$href,$code);
			$db->execute("UPDATE `{$DB['prefix']}ad` SET `code` = '{$code}' WHERE `id` = '{$id}';");
		}
		admin::logs(2,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
		msgbox($language['common']['successful'],'ad_manage.php'); 
	} else { 
		admin::logs(2,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'BACK'); 
	}
} elseif ($action == 'update' && is_numeric($id)){
	$code = $_POST['code']; 
	$expired = $_POST['expired'];
	$_POST = html_chars($_POST);
	if(!preg_match('/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/',$aid)){
		msgbox($language['page'][48],'BACK');
	}	
	switch ($ad_type){
		case 1 :
			break; 
		case 2 :
			$code = '<a target="_blank" href="'.$url.'"><img src="'.$ad_image.'" width="'.$ad_width.'" height="'.$ad_height.'" alt="'.$ad_alt.'" title="'.$ad_alt.'" border="0" /></a>';
			break;
		case 3 :
			if (!empty($ad_color) && !empty($ad_size)) {
				$style = 'style="color:'.$ad_color.'; font-size:'.$ad_size.'px;"';
			} elseif (!empty($ad_color)){
				$style = 'style="color:'.$ad_color.'"';
			} elseif (!empty($ad_size)){
				$style = 'style="font-size:'.$ad_size.'px;"';
			} else {
				$style = '';	
			}
			$code = '<a target="_blank" href="'.$url.'"';
			$style == '' or $code .= ' '.$style;
			$code .= '>'.$ad_text.'</a>';
			break;
		case 4 :
			pathinfo($ad_flash,PATHINFO_EXTENSION) == 'swf' or msgbox($language['page'][52],'BACK');
			$code = '<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$ad_flash_width.'" height="'.$ad_flash_height.'">'."\r\n";
			$code .= '	<param name="movie" value="'.$ad_flash.'" />'."\r\n";
			$code .= '	<param name="quality" value="high" />'."\r\n";
			$code .= '	<param name="wmode" value="opaque" />'."\r\n";
			$code .= '	<param name="swfversion" value="7.0.70.0" />'."\r\n";
			$code .= '	<object type="application/x-shockwave-flash" data="'.$ad_flash.'" width="'.$ad_flash_width.'" height="'.$ad_flash_height.'">'."\r\n";
			$code .= '		<param name="quality" value="high" />'."\r\n";
			$code .= '		<param name="wmode" value="opaque" />'."\r\n";
			$code .= '		<param name="swfversion" value="7.0.70.0" />'."\r\n";
			$code .= '	</object>'."\r\n";
			$code .= '</object>';
			break;
		default: die('Undefined Operation.'); break;
}
	$weight = $weight > 20 ? 20 : ($weight < 1 ? 1 : $weight);
	$click = $click_open ? numeric($click) : -1;
	$start = strtotime($start);
	is_int($start) or $start = $gmt_time;
	$end = strtotime($end);
	is_int($end) or $end = $gmt_time + 2592000;
	$start < $end or msgbox($language['page'][54],'BACK');
	$sql = "UPDATE `{$DB['prefix']}ad` SET `aid` = '{$aid}',`title` = '".trim($_POST['title'])."',`url` = '{$_POST['url']}',`code` = '{$code}',`weight` = '{$weight}',`click` = '{$click}',";
	$sql .= "`limit` = '".numeric($limit)."',`start` = '{$start}',`end` = '{$end}',`expired` = '{$expired}',`sort` = '".numeric($sort)."',`enable` = '".numeric($enable)."' WHERE `id` = '{$id}';";
	if($db->execute($sql)){
		admin::logs(3,$language['page']['title']."，{$language['common']['successful']}(id:{$id})"); 
		msgbox($language['common']['successful'],'ad_manage.php'); 
	} else {
		admin::logs(3,$language['page']['title']."，{$language['common']['failed']}"); 
		msgbox($language['common']['failed'],'BACK'); 
	}
}
if(!is_numeric($_GET['id'])){
	$mle['action'] = 'add'; 
	$mle['ad'] = array(
		'url' => 'http://',
		'weight' => 1,
		'limit' => 0,
		'start' => date('Y-m-d H:i:s',$gmt_time),
		'end' => date('Y-m-d H:i:s',$gmt_time + 2592000), 
		'click' => -1,
		'enable' => 1,
		'sort' => 0,
	);
} else {
	$mle['action'] = 'update'; 
	$mle['ad'] = array(); 
	$sql = "SELECT * FROM `{$DB['prefix']}ad` WHERE `lang` = '".LANG."' && `id` = '{$_GET['id']}' LIMIT 1";
	if(!$mle['ad'] = $db->query($sql,1)){
		msgbox($language['page'][53],'BACK');	
	}
	if(preg_match('/<img/',$mle['ad']['code'])){
			$mle['ad']['img_checked'] ="checked='checked'";
			$mle['ad']['type_event'] ="$('.ad_type').hide();$('.image').show();";
			preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$mle['ad']['code'],$img_url);
			$mle['ad']['img_url'] =$img_url[1];
			if(file_exists("../".$img_url[1])){
				$mle['ad']['img_preview']='<img border=\'0\' src=\'../'.$img_url[1].'\' class=\'upload_preview\' />';
				list($img_width, $img_height) = getimagesize("../".$img_url[1]); 
				$mle['ad']['img_width']=$img_width;
				$mle['ad']['img_height']=$img_height;
				preg_match('/<img.+alt=\"?([\s\S]*)\"?.+>/i',$mle['ad']['code'],$img_alt);
				$mle['ad']['img_alt'] =$img_alt[1];
			}else{
				$mle['ad']['file_not_exists']="mle.top_error('图片文件不存在');top_error_isshow=true;return false;";
				}
		}
	elseif(preg_match('/<object/',$mle['ad']['code'])){
			$mle['ad']['flash_checked'] ="checked='checked'";
			$mle['ad']['type_event'] ="$('.ad_type').hide();$('.flash').show();";
			preg_match('/<param.+value=\"?(.+\.swf)\"?.+>/i',$mle['ad']['code'],$flash_url);
			$mle['ad']['flash_url'] =$flash_url[1];
			if(file_exists("../".$flash_url[1])){
				list($flash_width, $flash_height) = getimagesize("../".$flash_url[1]); 
				$mle['ad']['flash_width']=$flash_width;
				$mle['ad']['flash_height']=$flash_height;
			}else{
				$mle['ad']['file_not_exists']="mle.top_error('flash文件不存在');top_error_isshow=true;return false;";
				}
		}
	$mle['ad']['expired'] = html_chars($mle['ad']['expired']);
	$mle['ad']['start'] = date('Y-m-d H:i:s',$mle['ad']['start']);
	$mle['ad']['end'] = date('Y-m-d H:i:s',$mle['ad']['end']);
}
$mle['aid_often'] = $db->query("SELECT `aid`,`title` FROM `{$DB['prefix']}ad` WHERE `lang` = '".LANG."' GROUP BY `aid` ORDER BY COUNT(`aid`) DESC LIMIT 0,50");
require_once(ADMIN_PATH.'/footer.php'); 
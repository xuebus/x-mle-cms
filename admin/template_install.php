<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
define('XML_INTERFACE','http://client.mlecms.com/_client/template/'); 
$mle['type'] = $type < 1 ? 1 : ($type > 3 ? 3 : $type); 
switch ($mle['type']){
	case 1 :
		$xml_dir = 'xml_free'; 
		break;
	case 2 :
		$xml_dir = 'xml_vip';
		break;
	case 3 : 
		$xml_dir = 'xml_business';
		break;
	default: die('Undefined Options.'); break;
}
$mle['xml_status'] = true;
$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
$page < 1 && $page = 1;
$template_list = array();
$xml_path = XML_INTERFACE.$xml_dir.'/';
$xml = new xml(); 
$total_page = $xml->xml2array($xml_path.'total_page.xml');
$total_page = $total_page[0];
if(is_numeric($total_page)){
	$page > $total_page && $page = $total_page;	
	$xml = new xml(); 
	$template_list = $xml->xml2array($xml_path.$page.'.xml');
	empty($template_list) && $mle['xml_status'] = false;
} else {
	$mle['xml_status'] = false;
}
$mle['template_list'] = $template_list;
$mle['page'] = page($page,$total_page);
function page($page,$total_page){
	global $_GET,$language;
	$url = NULL;
	foreach($_GET as $i => $n){
		$i != 'page' && $i != 'display' && $i != '' && $n != '' && $url .= $i.'='.$n.'&'; 
	}
	$url = 'template_install.php?'.$url.'page=';
	$html = '<table class="page" cellpadding="0" cellspacing="5"><tr>';
	if($page > 1){
		$html .= '<td><a class="start" href="'.$url.'1">'.$language['common']['start'].'</a></td>';
		$html .= '<td><a class="first" href="'.$url.($page-1).'">'.$language['common']['first'].'</a></td>';
	} else {
		$html .= '<td class="start_off">'.$language['common']['start'].'</td>';
		$html .= '<td class="first_off">'.$language['common']['first'].'</td>';			
	}
	$html .= '<td><table cellspacing="0" cellpadding="0" border="0"><tr><td class="fleft"></td>';
	$x = $page - 5;
	$y = $page + 5;
	if($x < 1){$y += 1-$x; $x = 1;}
	if($y > $total_page){$x -= $y - $total_page; $y = $total_page;}
	$x < 1 && $x = 1;
	for($x; $x<=$y; $x++){
		$html .= $x != $page ? '<td class="fcenter"><a href="'.$url.$x.'">'.$x.'</a></td>' : '<td class="fcenter"><font color="#FF0000">'.$x.'</font></td>';
	}
	$html .= '<td class="fright"></td></tr></table></td>';
	if($page < $total_page){
		$html .= '<td><a class="next" href="'.$url.($page+1).'">'.$language['common']['next'].'</a></td>';
		$html .= '<td><a class="end" href="'.$url.$total_page.'">'.$language['common']['end'].'</a></td>';
	} else {
		$html .= '<td class="next_off">'.$language['common']['next'].'</td>';
		$html .= '<td class="end_off">'.$language['common']['end'].'</td>';			
	}
	$html .= '<td>'.$language['common']['total'].$total_page.$language['common']['page'].'</td><td></td></tr></table>';
	return $html;
}
$mle['template_tid'] = array();
$template_list = template::get_list();
foreach($template_list as $n){
	$mle['template_tid'][] = $n['tid'];
}
require_once(ADMIN_PATH.'/footer.php');
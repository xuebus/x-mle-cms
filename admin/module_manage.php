<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
@set_time_limit(0);
if($action == 'install' && !empty($dir)){
	require_once(MLEINC.'/install/pack/'.$dir.'/install.config.php');
	$archive = new PclZip('../'.$install_info['install_path']); 
	$v_result_list = $archive->extract(PCLZIP_OPT_PATH,'../',PCLZIP_OPT_REPLACE_NEWER); 
	$result = '';
	foreach($v_result_list as $n){
		if($n['status'] != 'ok' && $n['status'] != 'already_a_directory'){
			$result	= $n['filename'];
		} 
	}
	if($result){ 
		admin::logs(2,$language['page']['install'].'，'.$language['common']['failed'].'(modcode:'.$install_info['modcode'].')'); 
		msgbox($language['page']['extract_failed'].$result,'CURRENT');		
	} else { 
		if(strtolower($config['admin_dir']) != 'admin'){
			@copy_dir('../admin','../'.$config['admin_dir']) && @remove_dir('../admin');
		}
		switch (module::install($dir)){
			case 1 : 
				admin::logs(2,$language['page']['install'].'，'.$language['common']['successful'].'(modcode:'.$install_info['modcode'].')'); 
				msgbox($language['common']['successful'],'CURRENT');	
				break;
			case 2 : 
				admin::logs(2,$language['page']['install'].'，'.$language['common']['failed'].'(modcode:'.$install_info['modcode'].')'); 
				msgbox($language['page']['repeat'],'CURRENT');		
				break;
			default: die('Undefined Operation.'); break;
		}
	}
}
if($action == 'uninst' && !empty($modcode)){
	switch (module::uninst($modcode)){
		case 1 : 
			admin::logs(4,$language['page']['uninst'].'，'.$language['common']['successful'].'(modcode:'.$modcode.')'); 
			msgbox($language['common']['successful'],'CURRENT');	
			break;
		case 2 : 
			$data = $db->query("SELECT `files` FROM `{$DB['prefix']}module` WHERE `modcode` = '{$modcode}';",1);
			admin::logs(4,$language['page']['uninst'].'，'.$language['page']['failed'].'(modcode:'.$modcode.')'); 
			msgbox($language['page']['delete_failed'].str_replace(',','\r\n',$data['files']),'CURRENT');		
			break;
		case 3 : 
			admin::logs(4,$language['page']['uninst'].'，'.$language['common']['failed'].'(modcode:'.$modcode.')'); 
			msgbox($language['page']['remplates_require'],'CURRENT');		
			break;
		case 4 : 
			admin::logs(4,$language['page']['uninst'].'，'.$language['common']['failed'].'(modcode:'.$modcode.')'); 
			msgbox($language['page']['channel_use'],'CURRENT');		
			break;		
		default: die('Undefined Operation.'); break;
	}
}
if($action == 'delpack' && !empty($dir)){
	$dir = '../inc/install/pack/'.$dir;
	if(@remove_dir($dir)){
		admin::logs(4,$language['page']['delpack'].'，'.$language['common']['successful'].'(dir:'.$dir.')'); 
		msgbox('','CURRENT');			
	} else {
		admin::logs(4,$language['page']['delpack'].'，'.$language['common']['failed'].'(dir:'.$dir.')'); 
		msgbox($language['page']['delpack_failed'],'CURRENT');		
	}
}
$x = $y = $i = $n = 0;
$mods = array();
$list = module::get_list();
$mle['list'] = $list['data']; 
foreach($mle['list'] as $x => &$n){
	$mods[] = $n['modcode']; 
	$n['type'] = $n['type'] == 1 ? $language['page']['style'][0] : ($n['type'] == 2 ? $language['page']['style'][1] : $language['page']['style'][2]);
	$n['status'] = '<font color="#009900">√</font>';
	$n['package'] = is_file('../'.$n['installpath']) ? 1 : 0; 
	$n['isinstall'] = 1; 
	$n['dir'] = basename(dirname($n['installpath'])); 
}
$path = '../inc/install/pack/';
if (is_dir($path)) {
	$packs = scan_dir($path);
	foreach($packs as $y => &$n){
		$cfg = $path.$n.'/install.config.php';
		if(is_file($cfg)){
			require_once($cfg);
			if(!in_array($install_info['modcode'],$mods)){
				$i = $x+$y+1;
				$mle['list'][$i]['modcode'] = $install_info['modcode'];
				$mle['list'][$i]['type'] = $install_info['type'] == 1 ? '模块' : ($install_info['type'] == 2 ? '插件' : '补丁');
				$mle['list'][$i]['status'] = '<font color="#FF0000">×</font>';
				$mle['list'][$i]['modname'] = $install_info['modname'];
				$mle['list'][$i]['develop'] = $install_info['develop'];
				$mle['list'][$i]['info'] = $install_info['info'];
				$mle['list'][$i]['package'] = 1;  
				$mle['list'][$i]['isinstall'] = 0; 
				$mle['list'][$i]['dir'] = $n; 
			}
		}
	}
}
$mle['list'] = array_values($mle['list']); 
$mle['page'] = admin::page($list['total'],$list['page'],$list['limit'],$list['total_page']);
require_once(ADMIN_PATH.'/footer.php'); 
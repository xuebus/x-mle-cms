<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$backup_file_path = MLEINC.'/tmp/database_backup/'; 
$language['page']['title'] = $language['page'][0];
if(isset($action)){
	@set_time_limit(0);
	$db_config = array(
		'host' => $DB['host'],
		'userName' => $DB['user'],
		'userPassword' => $DB['pass'],
		'dbprefix' => $DB['prefix'],
		'path' => $backup_file_path,
		'newFileName' => date('YmdHis',$gmt_time).'_'.random(16).'.sql', 
	);
	switch($action){
	 	case 'backup' : 
			is_file($backup_file_path.'index.html') or @file_put_contents($backup_file_path.'index.html','<!-- /// -->');
			$b = new mysqlbackup($db_config);
			$b -> setDBName($DB['name']);
			if($b->backup() === true){
				admin::logs(0,$language['page'][6]."，{$language['common']['successful']}");
				msgbox($language['common']['successful'],'CURRENT');
			} else {
				admin::logs(0,$language['page'][6]."，{$language['common']['failed']}");
				msgbox($language['common']['failed'],'CURRENT');		
			}
			break;
		case 'recover' : 
			$r = new mysqlbackup($db_config);
			$r -> setDBName($DB['name']);
			is_file($backup_file_path.$file) or msgbox($language['page'][7],'CURRENT');
			if($r->recover($file) === true){
				admin::logs(0,$language['page'][8]."，{$language['common']['successful']}");
				msgbox($language['common']['successful'],'CURRENT'); 
			} else {
				admin::logs(0,$language['page'][8]."，{$language['common']['failed']}");
				msgbox($language['common']['failed'],'CURRENT'); 
			}		
			break;
		case 'del' : 
			$f = $backup_file_path.$file;
			if(is_file($f) && @unlink($f)){
				admin::logs(0,$language['page'][9]."，{$language['common']['successful']}");
				msgbox('','CURRENT'); 
			} else {
				admin::logs(0,$language['page'][9]."，{$language['common']['failed']}");
				msgbox($language['page'][15],'CURRENT'); 
			}	
			break;
		case 'download' : 
			$file = $backup_file_path.preg_replace('/[^\w]/','',basename($file));
			$file = substr($file,0,-3).'.sql';
			is_file($file) or msgbox($language['page'][7],'CURRENT');
			download::read($file);
			break;
		case ($action == 'check' || $action == 'optimize' || $action == 'repair' || $action == 'analyze') : 
			$tables = implode('`,`',$db->get_tables());
			$mle['operation'] = $db->query(strtoupper($action)." TABLE `{$tables}`",0,0);
			$language['page']['title'] = $language['page']['optitle'][$action];
			break;
		default : die('Undefined Operation.'); break;
	}
}
$backup_files = array();
$files = scan_dir($backup_file_path);
foreach($files as $i => $n){
	$f = $backup_file_path.$n;
	if(is_file($f) && pathinfo($n,PATHINFO_EXTENSION) == 'sql'){
		$backup_files[$i]['name'] = $n;
		$size = filesize($f)/1024; 
		$backup_files[$i]['size'] = $size > 1024 ? number_format($size/1024,2,'.','').' MB' : number_format($size,2,'.','').' KB';
		$backup_files[$i]['time'] = date('Y-m-d H:i:s',filemtime($f)); 
	}
}
$mle['backup_files'] = array_values($backup_files);
is_array($mle['operation']) or $mle['operation'] = false; 
require_once(ADMIN_PATH.'/footer.php'); 
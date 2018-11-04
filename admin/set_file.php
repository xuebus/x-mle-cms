<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
if(is_array($_POST['afcs'])){
	foreach($_POST['afcs'] as $i => &$n) {
		$n['attribute'][2] = preg_replace("/[^0-9a-zA-Z._]/",'',$n['attribute'][2]);
		foreach($n['submenu'] as $i2 => &$n2){
			$n2[2] = preg_replace("/[^0-9a-zA-Z._]/",'',$n2[2]);
			$n2[3] = preg_replace("/[^0-9a-zA-Z.=?&_]/",'',$n2[3]);
			$n2[4] = preg_replace("/[^0-9]/",'',$n2[4]);
			$n2[5] = preg_replace("/[^0-9]/",'',$n2[5]);
			$n2[6] = preg_replace("/[^0-9]/",'',$n2[6]);
			$v2[$i2] = $n2[6];
		}
		@array_multisort($v2,SORT_ASC,$n['submenu']);
		$v1[$i]  = $n['attribute'][3];
	}
	@array_multisort($v1,SORT_ASC,$_POST['afcs']);
	if(array2php($_POST['afcs'],'admin_file',MLEINC.'/config/file.config.php','ADMIN_PATH')){
		admin::logs(3,$language['page']['update_page']."({$language['common']['successful']})"); 
		msgbox($language['common']['successful'],'CURRENT');
	} else {
		admin::logs(3,$language['page']['update_page']."({$language['common']['failed']})"); 
		msgbox($language['page']['failure'],'CURRENT'); 
	}
}
$mle['afc'] = html_chars($admin_file);
require_once(ADMIN_PATH.'/footer.php'); 
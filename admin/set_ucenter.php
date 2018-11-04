<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
$uc_ini_file = MLEINC.'/plugins/ucenter/config.inc.php';
require_once($uc_ini_file);
require_once(MLEINC.'/plugins/ucenter/uc_client/client.php');
if(isset($_POST['enabled'])){
	$dbport = trim($_POST['dbport']);
	$dbport = is_numeric($dbport) ? $dbport : 3306;
	$html = array(
		'<?php',
		'define(\'UC_ENABLED\','.($_POST['enabled'] ? 'true' : 'false').');', 
		'define(\'UC_CONNECT\',\''.$_POST['connect'].'\');', 
		'define(\'UC_DBHOST\',\''.trim($_POST['dbhost']).':'.$dbport.'\');', 
		'define(\'UC_DBUSER\',\''.trim($_POST['dbuser']).'\');', 
		'define(\'UC_DBPW\',\''.trim($_POST['dbpw']).'\');', 
		'define(\'UC_DBNAME\',\''.trim($_POST['dbname']).'\');', 
		'define(\'UC_DBTABLEPRE\',\''.trim(stristr($_POST['dbtablepre'],'.') ? $_POST['dbtablepre'] : '`'.trim($_POST['dbname']).'`.'.$_POST['dbtablepre']).'\');', 
		'define(\'UC_DBCHARSET\',\'utf8\');', 
		'define(\'UC_DBCONNECT\',\'0\');', 
		'define(\'UC_KEY\',\''.trim($_POST['key']).'\');', 
		'define(\'UC_API\',\''.trim($_POST['api'],' \/\\').'\');', 
		'define(\'UC_CHARSET\',\'utf-8\');', 
		'define(\'UC_IP\',\''.trim($_POST['ip']).'\');', 
		'define(\'UC_APPID\',\''.numeric(trim($_POST['appid']),1).'\');', 
		'define(\'UC_PPP\',\'20\');', 
		'',
		'',
		'$cookiedomain = \'\';',
		'$cookiepath = \'/\';',
	);
	if(@file_put_contents($uc_ini_file,implode("\r\n",$html))){
		admin::logs(3,$language['page']['update_page']."({$language['common']['successful']})"); 
		msgbox($language['common']['successful'],'CURRENT');
	} else {
		admin::logs(3,$language['page']['update_page']."({$language['common']['failed']})"); 
		msgbox($language['page']['failure'],'CURRENT'); 
	}		
}
list($dbhost,$dbport) = explode(':',UC_DBHOST);
$mle['ucini'] = array(
	'enabled' => UC_ENABLED, 
	'connect' => UC_CONNECT, 
	'dbhost' => $dbhost, 
	'dbport' => $dbport, 
	'dbuser' => UC_DBUSER, 
	'dbpw' => UC_DBPW, 
	'dbname' => UC_DBNAME, 
	'dbcharset' => UC_DBCHARSET, 
	'dbtablepre' => UC_DBTABLEPRE, 
	'dbconnect' => UC_DBCONNECT, 
	'key' => UC_KEY == '' ? strtoupper(random(32,0)) : UC_KEY, 
	'api' => UC_API, 
	'charset' => UC_CHARSET, 
	'ip' => UC_IP, 
	'appid' => UC_APPID, 
	'ppp' => UC_PPP, 
);
if(UC_ENABLED){ 
	$mle['status'] = '';
	if(UC_CONNECT == 'mysql'){ 
		if($eid = @mysql_connect(UC_DBHOST,UC_DBUSER,UC_DBPW)){ 
			if(@mysql_select_db(UC_DBNAME,$eid)){
				$mle['status']['result'] = 'success'; 
				$mle['status']['info'] = $language['page']['info'][0].UC_CLIENT_VERSION . ' Release ' . UC_CLIENT_RELEASE;
			} else { 
				$mle['status']['result'] = 'failure';
				$mle['status']['info'] = $language['page']['info'][1].UC_DBNAME;
			}
		} else { 
			$mle['status']['result'] = 'failure';
			$mle['status']['info'] = $language['page']['info'][2];			
		}
	} else { 
	}
}
$mle['status']['info'] .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.mlecms.com/view.php?id=77" target="_blank">'.$language['page']['info'][3].'</a>';
require_once(ADMIN_PATH.'/footer.php');
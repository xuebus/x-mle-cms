<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
$mlecms->caching = false; 
USER_LOGIN or msgbox('',$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI']));
if(isset($_POST['nickname'])){
	$sql = "UPDATE `{$DB['prefix']}members` SET `qq` = '{$_POST['qq']}',`sex` = '{$_POST['sex']}',`nickname` = '{$_POST['nickname']}',
		`companyname` = '{$_POST['companyname']}',`companyweb` = '{$_POST['companyweb']}',`companyaddress` = '{$_POST['companyaddress']}',
		`phone` = '{$_POST['phone']}',`fax` = '{$_POST['fax']}' WHERE `id` = '".USER_ID."'";
	$db->execute($sql) ? msgbox($language['page']['msg'][2],'info_modify.php') : msgbox($language['page']['msg'][3]);
}
require_once(MLEINC.'/include/footer.php');
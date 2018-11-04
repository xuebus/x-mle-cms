<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once('../inc/include/header.php');
$mlecms->caching = false; 
USER_LOGIN or msgbox('',$config['url'].'member/login.php?goto='.base64_encode($_SERVER['REQUEST_URI']));
require_once(MLEINC.'/include/footer.php');
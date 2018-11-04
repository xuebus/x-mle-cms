<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/inc/include/header.php');
require_once(MLEINC.'/include/footer.php');
if(HTML_MAKE_MODE){
	$html = new html();
	$static_path = misc::url('tag');
	$content = $mlecms->fetch($template_file); 
	$html->make($content,$static_path);
}
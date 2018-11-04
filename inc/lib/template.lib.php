<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class template{
	public static function get_list(){
		$path = MLEINC.'/templates/frontend/';
		$dirs = scan_dir($path);
		$result = array();
		foreach($dirs as $n){
			$pf = $path.$n.'/config.default.php';
			if(is_file($pf) && require_once($pf)){
				$template_info['dir'] = $n;
				$result[] = $template_info;
			}
		}
		return $result; 
	}
	public static function get_content_page($cid){
		$cid = trim(preg_replace('/[^\d,]/','',$cid),','); 
		if(!empty($cid)){
			global $db;
			$sql = "SELECT `templatecontent` FROM `{$db->prefix}category` WHERE `id` in($cid) ORDER BY `level` DESC";
			$c =  $db->query($sql);
			foreach($c as $n){
				if(!empty($n['templatecontent'])){
					return $n['templatecontent'];
				}
			}
		}
		return '';
	}
}
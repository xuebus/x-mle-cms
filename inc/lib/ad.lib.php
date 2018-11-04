<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class ad{
	public static function show($aid){
		global $db;
		$result = $db->query("SELECT `weight`,`code`,`limit`,`start`,`end`,`expired` FROM `{$db->prefix}ad` WHERE `lang` = '".LANG."' && `aid` = '{$aid}' && `enable` = 1");
		$result = self::weight_rand($result);
		return $result;
	}
	public static function data($aid){
		global $db,$gmt_time;
		$result = $db->query("SELECT * FROM `{$db->prefix}ad` WHERE `lang` = '".LANG."' && `aid` = '{$aid}' && `enable` = 1 && (`limit` = 0 || (`start` < $gmt_time && `end` > $gmt_time)) ORDER BY `sort` ASC,`id` DESC");
		return $result;
	}
	private static function weight_rand($data){
		global $gmt_time;
		$weight = 0;
		$tempdata = array();
		foreach ($data as &$n){
			if($n['limit'] == 1 && ($n['start'] > $gmt_time || $n['end'] < $gmt_time)){
				$n['code'] = empty($n['expired']) ? 'This Posting Has Expired.' : $n['expired'];
			}
			$weight += $n['weight'];
			for ($i = 0; $i < $n['weight']; $i ++) {
				$tempdata[] = $n;
			}
		}
		$result = $weight > 0 ? mt_rand(0,$weight - 1) : 0;
		return $tempdata[$result]['code'];
	}
}
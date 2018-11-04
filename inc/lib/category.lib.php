<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class category{
	public static function data(){
		global $db;
		$args = func_get_args();
		switch($args[0]){
			case 1 : $module = 'MO001x'; break; 
			case 2 : $module = 'MO002x'; break; 
			case 3 : $module = 'MO003x'; break; 
			case 4 : $module = 'MO004x'; break; 
			default: $module = 'MO001x'; break;
		}
		$sql = "SELECT a.*,b.`title` as `channel_title`,b.`pathcategory` FROM `{$db->prefix}category` a LEFT JOIN `{$db->prefix}channel` b ON a.`channel` = b.`id` WHERE a.`lang` = '".LANG."' ";
		$args[0] != 0 && $sql .= "&& a.`module` = '{$module}' ";
		$args[1] != 0 && $sql .= "&& a.`channel` = '{$args[1]}' ";
		$args[2] != 0 && $sql .= "&& a.`nexus` LIKE  '%,{$args[2]},%' && a.`id` != '{$args[2]}' ";
		$args[3] != 0 && $sql .= "&& a.`level` = '{$args[3]}' ";
		$sql .= "ORDER BY a.`sort` ASC,a.`id` ASC ";
		$args[4] != 0 && $sql .= "LIMIT 0,{$args[4]} ";
		$result = self::order($db->query($sql));
		foreach($result as $i => &$n){
			$n['addtime'] = date(MLE_DATE_FORMAT_SHORT,$n['addtime']); 
			$n['next_level'] = numeric($result[$i+1]['level']);  
			$n['channel_id'] = $n['channel']; 
			$n['channel'] = $n['channel_title']; 
			unset($n['channel_title']);			
			$n['URL'] = self::url($n['module'],$n['id'],$n['channel_id'],$n['pathcategory']);		
		}
		return $result;		
	}
	public static function order($data){
		if(!is_array($data) || empty($data)) return array();
		$max_level = 0;
		foreach($data as $n){
			$n['level'] > $max_level && $max_level = $n['level'];
		}
		foreach($data as $i => $n){
			for($x=1; $x<=$max_level; $x++){
				$n['level'] == $x && $filter[$x][] = $n;
			}
		}
		for($i=1; $i<=$max_level; $i++){
			if(is_array($filter[$i])){
				foreach ($filter[$i] as $o => $p) {
					$x_sort[$i][$o] = $p['sort'];
				}
				array_multisort($x_sort[$i],SORT_ASC,$filter[$i]);
			}
		}
		if(is_array($filter[1])){
			foreach($filter[1] as $n){
				$result[1][] = $n;
				if(!is_array($filter[2])) break; 
				foreach($filter[2] as $y){
					stristr($y['nexus'],$n['nexus']) && $result[1][] = $y;
				}
			}
		}
		empty($filter[1]) && $result[1] = $filter[2]; 
		for($i=2; $i<$max_level; $i++){
			empty($filter[$i]) && $result[$i] = $filter[$i+1]; 
			if(is_array($result[$i-1])){
				foreach($result[$i-1] as $p){
					$result[$i][] = $p;
					if($p['level'] == $i){
						foreach($filter[$i+1] as $r){
							stristr($r['nexus'],$p['nexus']) && $result[$i][] = $r;
						}
					}
				}
			}
		}
		$result = $result[($max_level-1)]; 
		(empty($result) || $max_level == 1) && $result = $filter[1]; 
		return $result;
	}
	public static function show($cid){
		global $db;
		$cid = numeric($cid);
		if(empty($cid)) { return array(); }
		$sql = "SELECT a.*,b.`title` as `channel_title`,b.`pathcategory` FROM `{$db->prefix}category` a,`{$db->prefix}channel` b WHERE a.`channel` = b.`id` && a.`lang` = '".LANG."' && a.`id` = '{$cid}'";
		$result = $db->query($sql,1);
		if(isset($result['id'])){
			$result['addtime'] = date(MLE_DATE_FORMAT_SHORT,$result['addtime']); 
			$result['channel_id'] = $result['channel']; 
			$result['channel'] = $result['channel_title']; 
			$result['URL'] = self::url($result['module'],$result['id'],$result['channel_id'],$result['pathcategory']);
			unset($result['channel_title']);		
		}
		return $result;
	}
	public static function cut($nexus,$rank = 0){
		$result = explode(',',trim($nexus,','));
		$result = $rank == 0 ? end($result) : $result[$rank - 1];
		return $result;
	}
	public static function cid2name($nexus,$interval = ' ',$addurl = false){
		global $db;
		if(!empty($nexus)){
			$sql = "SELECT a.`id`,a.`title`,a.`module`,a.`channel`,b.`pathcategory` FROM `{$db->prefix}category` a left join `{$db->prefix}channel` b on a.`channel` = b.`id` WHERE a.`ID` IN(".trim($nexus,',').") ORDER BY a.`level` ASC";
			$part = $db->query($sql);
			$result = array();
			foreach($part as $n){
				$result[] = $addurl ? '<a href="'.self::url($n['module'],$n['id'],$n['channel'],$n['pathcategory']).'">'.$n['title'].'</a>' : $n['title']; 
			}
			$result = implode($interval,$result);
			return $result;
		} else {
			return NULL;
		}
	}
	public static function url($module = '',$cid = '',$pid = '',$pathcategory = ''){
		if(MLE_URL_MODE == 1){ 
			switch ($module){
				case 'MO001x' : return 'list.php?cid='.$cid; break; 
				case 'MO002x' : return 'category.php?cid='.$cid; break; 
				case 'MO003x' : return 'slide.php?cid='.$cid; break; 
				case 'MO004x' : return 'soft.php?cid='.$cid; break; 
				default: die('Undefined Options.$Id:category.lib.php url()'); break;
			}
		} else { 
			$static_path = empty($pathcategory) ? 'html/{PID}/{CID}.html' : $pathcategory;
			$static_path = str_replace(array('{L}','{PID}','{CID}'),array(LANG,$pid,$cid),$static_path);
			return $static_path;
		}
	}	
}
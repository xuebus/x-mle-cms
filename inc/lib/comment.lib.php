<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class comment{
	public static function add(){
		global $db,$gmt_time,$mle_user_info,$member_config;
		member::get_config(); 
		$args = func_get_args();
		$args[0] = numeric($args[0],1,5);
		$args[1] = numeric($args[1]);
		if($member_config['comment_traveler'] == 0 && USER_LOGIN != true){
			return 0; 
		} elseif ($member_config['comment_interval'] > 0 && ip::gap(numeric($args[0]) + 6,$member_config['comment_interval']*60,numeric($args[1]),true,true)){ 
			return -1; 
		} else {
			$args[3] = explode(',',$args[3]);
			$tmp = array();
			foreach($args[3] as $rg){
				is_numeric($rg) && $rg > 0 && $tmp[] = $rg;
			}
			$args[3] = implode(',',count($tmp) > 30 ? end($tmp) : $tmp);
			empty($args[3]) && $args[3] = 0;
			$comment_content = str_replace(array("\r\n","\r","\n"),'<br />',html_chars(trim($args[2]),ENT_QUOTES)); 
			if(strlen($comment_content) < 2 || strlen($comment_content) > 2000){ 
				return -2;
			} else {
				$ip = get_ip();
				$sql = "INSERT INTO `{$db->prefix}comment` (`lang`,`type`,`aid`,`agree`,`quote`,`content`,`audit`,`ip`,`address`,`user`,`nickname`,`passive`,`addtime`) ";
				$sql .= "VALUES ('".LANG."','{$args['0']}','{$args[1]}','0','{$args[3]}','{$comment_content}','0','".$ip."','".ip::get_address($ip)."','".numeric($mle_user_info['id'])."','{$mle_user_info['username']}','0','{$gmt_time}');";
				return $db->execute($sql) ? 1 : -3;
			}
		}
	}
	public static function single($id){
		global $db;
		return $db->query("SELECT * FROM `{$db->prefix}comment` WHERE `id` = '{$id}'",1);
	}
	public static function data(){
		global $db;
		$args = func_get_args();
		numeric($args[1]) == 0 && $args[1] = 10;
		$args[2] = numeric($args[2],1,4);
		$args[3] = numeric($args[3]);
		$args[5] = numeric($args[5]);
		$args[9] = numeric($args[9]);
		$query_sql = "SELECT a.*,b.`username`,c.`title` FROM ";
		$count_sql = "SELECT count(*) FROM ";
		$sql = "`{$db->prefix}comment` a LEFT JOIN `{$db->prefix}members` b ON a.`user` = b.`id` LEFT JOIN `{$db->prefix}".self::type2table($args[2])."` c ON a.`aid` = c.`id` ";
		$sql .= "WHERE a.`lang` = ".LANG." && `a`.type = {$args[2]} ";
		$args[3] > 0 && $sql .= "&& a.`aid` = {$args[3]} ";
		$args[4] == 1 && $sql .= "&& a.`audit` = 1 ";
		$args[4] == 2 && $sql .= "&& a.`audit` = 0 ";
		$args[5] > 0 && $sql .= "&& a.`user` = {$args[5]} ";
		$args[9] == 0 && $sql .= "&& a.`passive` = 0 ";
		$page_data['limit'] = is_int($args[1]) ? $args[1] : 10; 
		if($args[7] == 1){
			global $_GET,$mlecms;
			$page_data['total'] = $db->query($count_sql.$sql,1,0);
			$page_data['total'] = $page_data['total'][0];
			$page_data['total_page'] = ceil($page_data['total'] / $args[1]); 
			$page_data['page'] = is_numeric($_GET['page']) ? $_GET['page'] : 1;
			$page_data['page'] > $page_data['total_page'] && $page_data['page'] = $page_data['total_page'];	
			$page_data['page'] < 1 && $page_data['page'] = 1;
			$start = $args[1] * ($page_data['page'] - 1);
			is_int($args[8]) or $args[8] = 2;
			$x = $page_data['page'] - $args[8];
			$y = $page_data['page'] + $args[8];
			if($x < 1){$y += 1-$x; $x = 1;}
			if($y > $page_data['total_page']){$x -= $y - $page_data['total_page']; $y = $page_data['total_page'];}
			$x < 1 && $x = 1;
			$page_data['start_url'] = durl('page',1,NULL); 
			$page_data['first_url'] = durl('page',$page_data['page'] > 2 ? ($page_data['page'] - 1) : 1,NULL); 
			$page_data['next_url'] = durl('page',($page_data['page'] + 1) < $page_data['total_page'] ? ($page_data['page'] + 1) : $page_data['total_page'],NULL);  
			$page_data['end_url'] = durl('page',$page_data['total_page'],NULL); 
			for($i = $x; $i <= $y; $i++){
				$page_data['number'][$i] = durl('page',$i,NULL);
			}
			$mlecms->assign('page_data',$page_data); 
		} else { 
			$start = is_int($args[6]) ? $args[6] : 0; 
		}
		switch($args[0]){ 
			case 0 : $sql .= "ORDER BY a.`id` DESC "; break;
			case 1 : $sql .= "ORDER BY a.`id` ASC "; break;
			case 2 : $sql .= "ORDER BY a.`agree` DESC,`id` DESC "; break;
			case 3 : $sql .= "ORDER BY a.`agree` ASC,`id` ASC "; break;
			default: $sql .= "ORDER BY a.`id` DESC "; break;
		}
		$sql .= "LIMIT {$start},{$page_data['limit']}";
		$result = $db->query($query_sql.$sql);
		return $result;
	}
	public static function quote($ids,$type = 1,$audit = 0){
		global $db;
		$sql_id = array();
		foreach(explode(',',$ids) as $id){
			is_numeric($id) && $sql_id[] = $id;
		}
		if(!empty($sql_id)){
			$sql_id = "'".implode("','",$sql_id)."'";
			$sql = "SELECT a.*,b.`username`,c.`title` FROM `{$db->prefix}comment` a LEFT JOIN `{$db->prefix}members` b ON a.`user` = b.`id` LEFT JOIN `{$db->prefix}".self::type2table($type)."` c ON a.`aid` = c.`id` ";
			$sql .= "WHERE a.`lang` = ".LANG." && a.`type` = {$type} && a.`id` in({$sql_id}) ";
			$audit == 1 && $sql .= "&& a.`audit` = 1 ";
			$audit == 2 && $sql .= "&& a.`audit` = 0 ";
			$result = array();
			foreach($db->query($sql) as $r){ 
				$result[$r['id']] = $r;
			}
			return $result;
		} else {
			return array();	
		}
	}
	public static function passive($ids,$set = 1){
		global $db;
		$sql_id = array();
		foreach(explode(',',$ids) as $id){
			is_numeric($id) && $sql_id[] = $id;
		}
		if(!empty($sql_id)){
			$sql_id = "'".implode("','",$sql_id)."'";
			$sql = "UPDATE `{$db->prefix}comment` SET `passive` = '{$set}' WHERE `id` in({$sql_id});";
			return $db->execute($sql);
		}
		return true;
	}
	public function type2table($type){
		switch($type){
			case  1: return 'article'; break;
			case  2: return 'product'; break;
			case  3: return 'picture'; break;
			case  4: return 'download'; break;
			default : return 'article'; break;
		}
	}
	public static function support($id,$gap = 8){
		global $db;
		if(ip::gap(11,$gap*3600,$id,false,true)){ 
			return -1;	
		} else {
			$sql = "UPDATE `{$db->prefix}comment` SET `agree` = (`agree` + 1) WHERE `id` = '{$id}';";
			return $db->execute($sql) ? 1 : 0;
		}
	}
	public static function update($id,$type = 1){
		global $db;
		$id = numeric($id); $type = numeric($type,1,5);
		$sql = "SELECT COUNT(*) as commenttotal,SUM(`agree`) as agree FROM  `{$db->prefix}comment` WHERE `type` = '{$type}' && `aid` = '{$id}'"; 
		$count = $db->query($sql,1);
		$commenttotal = numeric($count['commenttotal']);
		$agree = numeric($count['agree']);
		$sql = "UPDATE `{$db->prefix}".self::type2table($type)."` SET `commenttotal` = '{$commenttotal}',`agree` = '{$agree}' WHERE `id` = '{$id}';"; 
		return $db->execute($sql);
	}
	public static function delete($rela,$field = 'id',$type = 0){
		global $db;
		$rela = (array)$rela;
		if($field != 'aid'){ 
			if($field == 'id'){
				$ids = $rela;
			} elseif ($field == 'user') {
				$d = $db->query("SELECT `id` FROM `{$db->prefix}comment` WHERE `user` in('".implode("','",$rela)."')");
				foreach($d as $n){
					$ids[] = $n['id'];
				}
			} else {
				$ids = array();	
			}
			$all = array();
			foreach((array)$ids as $n){
				$current = self::single($n); 
				if($current['passive'] == 0 && $current['quote'] != 0){
					$dx = explode(',',$current['quote']); 
					self::passive(end($dx),0);
				}
				$t = $db->query("SELECT `id`,`quote` FROM `{$db->prefix}comment` WHERE `quote` LIKE '%{$n}%'"); 
				foreach($t as $m){ 
					in_array($m['id'],$ids) or $all[$m['id']] = $m;
				}
			}
			foreach($all as &$o){
				foreach($ids as $d){
					$d == $o['quote'] && $o['quote'] = ''; 
					$pattern = array(
						0 => '/^'.$d.'\,/', 
						1 => '/\,'.$d.'\,/', 
						2 => '/\,'.$d.'$/', 
					);
					$replacement = array(
						0 => '',
						1 => ',',
						2 => '',
					);
					$o['quote'] = preg_replace($pattern,$replacement,$o['quote']); 
					empty($o['quote']) && $o['quote'] = '0';
				}
			}
			foreach($all as $q){
				$db->execute("UPDATE `{$db->prefix}comment` SET `quote` = '{$q['quote']}' WHERE `id` = '{$q['id']}'");
			}
		}
		$sql = "DELETE FROM `{$db->prefix}comment` WHERE `{$field}` in ('".implode("','",$rela)."')";
		$type > 0 && $sql .= " && `type` = '{$type}'";
		return $db->execute($sql); 		
	}
}
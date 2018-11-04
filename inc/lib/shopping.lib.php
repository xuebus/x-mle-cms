<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class shopping{
	public static function get_cart_count(){
		return count(self::get_cart_sid(true));
	}
	public static function get_cart_sid($array = true){
		$ids = trim(preg_replace('/[^\d,]/','',$_COOKIE['mlecms_cart_sid']),','); 
		return $array ? (empty($ids) ? array() : explode(',',$ids)) : $ids;
	}
	public static function get_cart_data(){
		global $db;
		$ids = self::get_cart_sid(true);
		$ins = array();
		foreach($ids as $n){
			is_numeric($n) && $ins[] = $n;
		}
		$ins = implode(',',$ins);
		if(empty($ins)){
			return array();
		} else {
			$result = $db->query("SELECT * FROM `{$db->prefix}product` WHERE `id` in ({$ins})");
			foreach ($result as &$n){
				$n['URL'] = 'detail.php?id='.$n['id'];	
			}
			return $result;
		}
	}
	public static function del_cart($id = 0,$empty = false){
		if($empty){
			global $gmt_time;
			setcookie('mlecms_cart_sid','',($gmt_time - 3600),'/');
		} elseif(is_numeric($id)) {
			$sid = self::get_cart_sid(true);
			$sid = array_diff($sid,array($id));
			setcookie('mlecms_cart_sid',implode(',',$sid),0,'/');
		}
		return true;
	}
	public static function get_shipping($enable = 0,$id = 0){
		global $db;
		$sql = "SELECT * FROM `{$db->prefix}shipping` WHERE `lang` = '".LANG."' ";
		$enable && $sql .= "&& `enable` = '1' ";
		$id && $sql .= "&& `id` = '{$id}' ";
		$sql .= "ORDER BY `id` ASC ";
		$result = $db->query($sql,($id ? 1 : 0));
		return $result;
	}
	public static function get_order($id = 0,$uid = 0,$oid = 0,$page = 0){
		global $db;
		$id = numeric($id);
		$uid = numeric($uid);
		$page = numeric($page);
		$sql = "SELECT a.*,b.`username`,b.`email` as uemail,c.`discount` FROM `{$db->prefix}order` a LEFT JOIN `{$db->prefix}members` b ON a.`uid` = b.`id` LEFT JOIN `{$db->prefix}rank` c ON c.`id` = b.`level` WHERE a.`lang` = '".LANG."' ";
		$id > 0 && $sql .= "&& a.`id` = '{$id}' ";
		$uid > 0 && $sql .= "&& a.`uid` = '{$uid}' ";
		empty($oid) or $sql .= "&& a.`oid` = '{$oid}' ";
		if($page > 0){ 
			global $_GET,$mlecms;
			$page_data['limit'] = is_int($page) ? $page : 10; 
			$page_data['total'] = $db->query(str_replace('a.*,b.`username`,b.`email` as uemail,c.`discount`','count(*)',$sql),1,0); 
			$page_data['total'] = $page_data['total'][0];
			$page_data['total_page'] = ceil($page_data['total'] / $page); 
			$page_data['page'] = is_numeric($_GET['page']) ? $_GET['page'] : 1;
			$page_data['page'] > $page_data['total_page'] && $page_data['page'] = $page_data['total_page'];	
			$page_data['page'] < 1 && $page_data['page'] = 1;
			$start = $page * ($page_data['page'] - 1);
			$page_data['limit'] = $page; 
			$digital = 2;
			$x = $page_data['page'] - $digital;
			$y = $page_data['page'] + $digital;
			if($x < 1){$y += 1-$x; $x = 1;}
			if($y > $page_data['total_page']){$x -= $y - $page_data['total_page']; $y = $page_data['total_page'];}
			$x < 1 && $x = 1;
			$page_data['start_url'] = 'member/'.durl('page',1,NULL); 
			$page_data['first_url'] = 'member/'.durl('page',$page_data['page'] > 2 ? ($page_data['page'] - 1) : 1,NULL); 
			$page_data['next_url'] = 'member/'.durl('page',($page_data['page'] + 1) < $page_data['total_page'] ? ($page_data['page'] + 1) : $page_data['total_page'],NULL);  
			$page_data['end_url'] = 'member/'.durl('page',$page_data['total_page'],NULL); 
			for($i = $x; $i <= $y; $i++){
				$page_data['number'][$i] = 'member/'.durl('page',$i,NULL);
			}
			$mlecms->assign('page_data',$page_data); 
		} else {
			$start = 0;
			$page_data['limit'] = 1;
		}
		$sql .= "ORDER BY a.`id` DESC LIMIT {$start},{$page_data['limit']} ";
		$result = $db->query($sql,($id > 0 || !empty($oid) ? 1 : 0));	
		return $result;
	}
	public static function del_order($id = 0,$cart = ""){
		global $db;
		$id = numeric($id);
		$sql = "DELETE FROM `{$db->prefix}order` WHERE `status` = 0 && `uid` = ".USER_ID." && `id` = '{$id}'";
		if($db->execute($sql)){
			empty($cart) or setcookie('mlecms_cart_sid',$cart,0,'/');
			return true;	
		} else {
			return false;
		}		
	}
	public static function receipt_order($id){
		global $db;
		return $db->execute("UPDATE `{$db->prefix}order` SET `status` = '4' WHERE `status` = 3 && `uid` = ".USER_ID." && `id` = '{$id}'");
	}
	public static function in_kind($ids){
		global $db;
		$ids = explode(',',$ids);
		$xid = array();
		foreach($ids as $n){ 
			is_numeric($n) && $xid[] = $n;
		}
		$xid = implode(',',$xid);
		$sql = "SELECT * FROM `{$db->prefix}product` WHERE `id` in({$xid}) && `virtual` = '0' LIMIT 1";
		$result = empty($xid) ? false : ($db->query($sql) ? true : false);
		return $result;
	}
}
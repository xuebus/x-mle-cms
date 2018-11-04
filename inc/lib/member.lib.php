<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class member{
	public static function data($limit = 10,$sort = 0,$level = 0,$type = 0,$audit = 0,$effective = 0){
		global $db;
		$sql = "SELECT * FROM `{$db->prefix}members` WHERE 1 ";
		$level > 0 && $sql .= "&& `level` = '{$level}' ";
		$type > 0 && ($sql .= $type == 1 ? "&& `type` = 0 " : "&& `type` = 1 "); 
		$audit > 0 && ($sql .= $audit == 1 ? "&& `audit` = 0 " : "&& `audit` = 1 ");
		$effective > 0 && ($sql .= $effective == 1 ? "&& `effective` = 1 " : "&& `effective` = 0 ");
		switch ($sort){
			case 0 : $sql .= "ORDER BY `id` DESC ";	break;
			case 1 : $sql .= "ORDER BY `id` ASC "; break;
			case 2 : $sql .= "ORDER BY `money` DESC,`id` DESC ";	break;
			case 3 : $sql .= "ORDER BY `money` ASC,`id` ASC "; break;
			case 4 : $sql .= "ORDER BY `scores` DESC,`id` DESC ";	break;
			case 5 : $sql .= "ORDER BY `scores` ASC,`id` ASC "; break;
			case 6 : $sql .= "ORDER BY `usemoney` DESC,`id` DESC ";	break;
			case 7 : $sql .= "ORDER BY `usemoney` ASC,`id` ASC "; break;
			case 8 : $sql .= "ORDER BY `frequency` DESC,`id` DESC "; break;
			case 9 : $sql .= "ORDER BY `frequency` ASC,`id` ASC "; break;
			default : $sql .= "ORDER BY `id` DESC "; break;
		}
		$sql .= "LIMIT {$limit}";
		return $db->query($sql);
	}
	public static function get_avatar($id,$type = 1,$reg_date = 0){
		global $config;
		if($reg_date == 0){
			$user = self::get_user($id);
			$reg_date = $user['jointime'];
		}
		$type = $type == 1 ? 'small' : ($type == 2 ? 'middle' : 'big');
		$file_name = $id.'_'.$type.'.jpg';
		$url = 'inc/uploads/avatar/'.date('Ym',$reg_date).'/'.$file_name;
		is_file(MLEROOT.'/'.$url) or $url = 'inc/images/noavatar_'.$type.'.jpg';
		return $config['url'].$url;
	}
	public static function get_user($param,$type = 0){
		global $db;
		$field = $type == 0 ? 'id' : ($type == 1 ? 'username' : 'email');
		return $db->query("SELECT * FROM `{$db->prefix}members` WHERE `{$field}` = '{$param}' LIMIT 1",1);
	}
	public static function get_activate_code($id,$audit = true){
		global $db;
		$sql = $audit ? "SELECT * FROM `{$db->prefix}members` WHERE `id` = '{$id}' && `audit` = 1 LIMIT 1" : "SELECT * FROM `{$db->prefix}members` WHERE `id` = '{$id}' LIMIT 1";
		$result = $db->query($sql,1);
		if(isset($result['username']) && defined('WEBKEY')){
			return md5($result['id'].$result['username'].$result['password'].$result['email'].WEBKEY);
		} else {
			return '';	
		}
	}
	public static function activate($id,$code){
		global $db;
		if(is_numeric($id) && !empty($code)){
			if(self::get_activate_code($id) == $code){
				return $db->execute("UPDATE `{$db->prefix}members` SET `audit` = '0' WHERE `id` = '{$id}';");
			} else {
				return false;	
			}
		} else {
			return false;
		}
	}
	public static function modify_mail($username,$mail){
		global $db;
		if(is_email($mail) && !self::is_used($mail,1) && $db->execute("UPDATE `{$db->prefix}members` SET `email` = '{$mail}' WHERE `username` = '{$username}'")){
			return true;
		} else {
			return false;	
		}
	}	
	public static function modify_password($id,$password){
		global $db;
		$user = self::get_user($id);
		if(self::check_password($password) && isset($user['encryption'])){
			$password = md5(md5($password).md5($user['encryption']));
			return $db->execute("UPDATE `{$db->prefix}members` SET `password` = '{$password}' WHERE `id` = '{$id}'");
		} else {
			return false;	
		}
	}
	public static function register($username,$password,$email){
		$username = trim($username);
		$password = trim($password);
		$email = trim($email);
		$mbc = self::get_config(); 
		if(empty($username) || empty($password) || empty($email)){ return 0; }
		elseif(!self::check_username($username,$mbc['username_strictly'] != 1 ? false : true)){	return -1; } 
		elseif(!is_email($email)){ return -2; } 
		elseif(!self::check_password($password)){ return -3; } 
		elseif(self::username_is_disable($username,$mbc['disable'])){ return -4; } 
		elseif(self::is_used($username,0)){ return -5; } 
		elseif(self::is_used($email,1)){ return -6; } 
		else{$uid = self::add_user($username,$password,$email); return numeric($uid); } 
	}
	public static function check_username($username,$strictly){
		$strlen = strlen(iconv('utf-8','gbk',$username)); 
		if(($strictly && !preg_match('/^[a-zA-Z][a-zA-Z0-9_]{4,20}$/',$username)) || (false === $strictly && (preg_match('/[\"\'\\\\\/\@\$\%<>\?\|\:#&]/',$username) || $strlen < 5 || $strlen > 20))){
			return false;		
		} else {
			return true;	
		}
	}
	public static function username_is_disable($username,$str_disable){
		return in_array($username,explode(',',$str_disable));
	}
	public static function is_used($uoe,$type = 0){
		global $db;
		$result = $db->query("SELECT count(*) FROM `{$db->prefix}members` WHERE `".($type == 0 ? 'username' : 'email')."` = '{$uoe}' LIMIT 1",1,0);
		$result = $result[0] == 1 ? true : false;
		return $result;
	}
	public static function check_password($password){
		if(preg_match('/[\'\"\\\\\/]/',$password) || strlen($password) < 6 || strlen($password) > 20){
			return false;
		} else {
			return true;	
		}
	}
	public static function get_config(){
		global $member_config;
		is_array($member_config) or	require_once(MLEINC.'/config/member.config.php');
		return $member_config;
	}
	public static function add_user($username,$password,$email){
		global $db,$gmt_time;
		$uid = 0;
		$mbc = self::get_config();
		$encryption = random(8); 
		$password = md5(md5($password).md5($encryption));
		$scores = numeric($mbc['register_scores']); 
		$audit = numeric($mbc['register_audit']); 
		$sql = "INSERT INTO `{$db->prefix}members` (`username`,`password`,`encryption`,`type`,`email`,`qq`,`sex`,`nickname`,`money`,`usemoney`,`scores`,`level`,`problem`,";
		$sql .= "`answer`,`companyname`,`companyweb`,`companyaddress`,`phone`,`fax`,`frequency`,`jointime`,`joinip`,`joinaddress`,`logintime`,`loginip`,`loginaddress`,`audit`,`effective`) VALUES (";
		$sql .= "'{$username}','{$password}','{$encryption}','0','{$email}','','2','','0','0','{$scores}','1','','','','','','','','0','{$gmt_time}','".get_ip()."','".ip::get_address(get_ip())."','','','','{$audit}','1')";
		$db->execute($sql) && $uid = $db->get_last_id();
		return numeric($uid);
	}
	public static function delete($ids){
		global $db;
		$ids = (array)$ids;
		$uc_config = MLEINC.'/plugins/ucenter/config.inc.php'; 
		is_file($uc_config) && require_once($uc_config);
		if(true === UC_ENABLED){
			require_once(MLEINC.'/plugins/ucenter/uc_client/client.php');
			$user = $db->query("SELECT `id`,`username` FROM `{$db->prefix}members` WHERE `id` in('".implode("','",$ids)."')");
			foreach($user as $u){
				$uid = uc_get_user($u['username']);
				uc_user_delete($uid[0]);
			}
		}		
		if($db->delete('members',$ids)){ 
			$db->execute("DELETE FROM `{$db->prefix}transaction` WHERE `uid` in('".implode("','",$ids)."');");
			comment::delete($ids,'user');
			return true;
		} else {
			return false;	
		}
	}
	public static function get_list($params = array()){
		global $db,$_GET;
		extract($params);
		$sql = "SELECT * FROM `{$db->prefix}members` WHERE 1 ";
		$level > 0 && $sql .= "&& `level` = {$level} ";
		empty($word) or $sql .= "&& (`username` LIKE '%{$word}%' || `email` LIKE '%{$word}%' || `qq` LIKE '%{$word}%' || `nickname` LIKE '%{$word}%' || `companyname` LIKE '%{$word}%' || `companyweb` LIKE '%{$word}%' || `companyaddress` LIKE '%{$word}%' || `phone` LIKE '%{$word}%') ";
		$limit = $_SESSION['admin']['limit'];
		is_numeric($limit) or $limit = 20; 
		$total = $db->query(str_replace('*','count(*)',$sql),1,0);
		$total = $total[0];		
		$total_page = ceil($total / $limit);		
		$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
		$page > $total_page && $page = $total_page;	
		$page < 1 && $page = 1;
		$start = $limit * ($page - 1);
		switch ($sort){
			case 0 : $sql .= "ORDER BY `id` DESC ";	break;
			case 1 : $sql .= "ORDER BY `id` ASC "; break;
			case 2 : $sql .= "ORDER BY `username` DESC ";	break;
			case 3 : $sql .= "ORDER BY `username` ASC "; break;
			case 4 : $sql .= "ORDER BY `money` DESC ";	break;
			case 5 : $sql .= "ORDER BY `money` ASC "; break;
			case 6 : $sql .= "ORDER BY `scores` DESC ";	break;
			case 7 : $sql .= "ORDER BY `scores` ASC "; break;
			case 8 : $sql .= "ORDER BY `loginaddress` DESC ";	break;
			case 9 : $sql .= "ORDER BY `loginaddress` ASC "; break;
			case 10 : $sql .= "ORDER BY `jointime` DESC,`id` DESC "; break;
			case 11 : $sql .= "ORDER BY `jointime` ASC,`id` ASC "; break;
			default : $sql .= "ORDER BY `id` DESC "; break;
		}
		$sql .= "LIMIT {$start},{$limit}";
		$data = $db->query($sql);
		$result = array(
			'page' => $page, 
			'limit' => $limit, 
			'total' => $total, 
			'total_page' => $total_page, 
			'data' => $data, 
		);
		return $result;
	}
	public static function audit($id,$whether = 0,$field = 'effective'){
		global $db;
		is_numeric($id) && $id = array($id);
		if(!is_array($id)) return true;
		$result = $db->execute("UPDATE `{$db->prefix}members` SET `{$field}` = '{$whether}' WHERE `id` in ('".implode("','",$id)."');");
		return $result;		
	}
	public static function mobile($id,$group){
		global $db;
		is_numeric($id) && $id = array($id);
		if(!is_array($id)) return true;
		$result = $db->execute("UPDATE `{$db->prefix}members` SET `level` = '{$group}' WHERE `id` in ('".implode("','",$id)."');");
		return $result;		
	}	
	public static function recharge($params = array()){
		global $db;
		extract($params);
		if(!is_numeric($id) || !is_numeric($amount) || !is_numeric($type)) return false;
		$result = $db->execute("UPDATE `{$db->prefix}members` SET `money` = (`money` + {$amount}) WHERE `id` = '{$id}';");
		switch ($type){
			case 1 : $oid = 'NR'; break;
			case 2 : $oid = 'AR'; break;
			case 3 : $oid = 'CS'; break;
			case 4 : $oid = 'ES'; break;
			case 5 : $oid = 'BP'; break;
			case 6 : $oid = 'LG'; break;
			default: $oid = 'TE'; break;
		}
		($log == 1 || !isset($log)) && self::transaction($oid,$id,$type,$amount,($result ? 1 : 0),$info);
		return $result;	
	}
	public static function transaction($oid,$uid,$type = 1,$amount = 0,$result = 1,$info = ''){
		global $db,$gmt_time;
		strlen($oid) == 2 && $oid .= date('YmdHis',$gmt_time).random(3,1);
		$sql = "INSERT INTO `{$db->prefix}transaction`(`oid`,`uid`,`type`,`amount`,`result`,`info`,`ip`,`addtime`)";
		$sql .= "VALUES('{$oid}','{$uid}','{$type}','{$amount}','{$result}','{$info}','".get_ip()."','".$gmt_time."');";
		return $db->execute($sql);		
	}
	public static function rank($disable = 0,$ids = ''){
		global $db;
		$sql = "SELECT * FROM `{$db->prefix}rank` WHERE 1 ";
		$disable == 0 && $sql .= "&& `enable` = 1 ";
		$ids = trim(preg_replace('/[^\d,]/','',$ids),',');
		empty($ids) or $sql .= "&& `id` in({$ids}) ";
		$sql .= "ORDER BY `id` ASC";
		$result = $db->query($sql);
		foreach($result as &$n){ 
			$n['rankname_all'] = $n['rankname']; 
			$rankname = explode(',',$n['rankname']);
			$n['rankname'] = $rankname[LANG-1];
		}
		return $result;
	}
	public static function login($username,$password,$expire = 0){
		global $db,$gmt_time;
		$username = trim(preg_replace('/[\'\"\\\\\/]/','',$username));
		$password = trim(preg_replace('/[\'\"\\\\\/]/','',$password));
		if(!empty($username) && !empty($password)){
			$row = $db->query("SELECT a.*,b.`rankname` FROM `{$db->prefix}members` a,`{$db->prefix}rank` b WHERE (a.`username` = '{$username}' || a.`email` = '{$username}') && a.`level` = b.`id` LIMIT 1",1);
			if(isset($row['username'])){
				if(md5(md5($password).md5($row['encryption'])) == $row['password']){ 
					if($row['audit'] == 0 && $row['effective']){ 
						self::set_login_cookie($row,$expire);
						self::update_last($row);
						return is_numeric($row['id']) ? $row['id'] : -5; 
					} elseif ($row['audit'] == 1){
						return -2;	
					} elseif ($row['audit'] == 2){
						return -3;
					} elseif ($row['effective'] == 0){
						return -4;	
					} else {
						return -5;	
					}
				} else {
					return -1; 
				}
			} else {
				return 0; 
			}
		} else {
			return 0;	
		}
	}
	public static function set_login_cookie($user,$expire = 0){
		global $gmt_time;
		$expire != 0 && $expire = $gmt_time + ($expire * 3600); 
		setcookie('mlecms_user_login',encryption('mlecms','ENCOD',WEBKEY),$expire,'/'); 
		setcookie('mlecms_user_id',encryption($user['id'],'ENCOD',WEBKEY),$expire,'/'); 
		setcookie('mlecms_user_auth',encryption($user['id'].$user['password'].$user['encryption'],'ENCOD',WEBKEY),$expire,'/'); 
		setcookie('mlecms_user_name',$user['username'],$expire,'/'); 
		setcookie('mlecms_user_email',$user['email'],$expire,'/'); 
		setcookie('mlecms_user_frequency',$user['frequency'] + 1,$expire,'/'); 
		$rankname = explode(',',$user['rankname']);
		$rankname = $rankname[LANG - 1];
		setcookie('mlecms_user_rankname',$rankname ,$expire,'/'); 
		setcookie('mlecms_user_money',$user['money'],$expire,'/'); 
		setcookie('mlecms_user_usemoney',$user['usemoney'],$expire,'/'); 
		setcookie('mlecms_user_scores',$user['scores'],$expire,'/'); 
	}
	public static function logout(){
		$expire = time() - 3600;
		setcookie('mlecms_user_login','',$expire,'/'); 
		setcookie('mlecms_user_id','',$expire,'/'); 
		setcookie('mlecms_user_auth','',$expire,'/'); 
		setcookie('mlecms_user_name','',$expire,'/'); 
		setcookie('mlecms_user_email','',$expire,'/'); 
		setcookie('mlecms_user_frequency','',$expire,'/'); 
		setcookie('mlecms_user_rankname','',$expire,'/'); 
		setcookie('mlecms_user_money','',$expire,'/'); 
		setcookie('mlecms_user_usemoney','',$expire,'/'); 
		setcookie('mlecms_user_scores','',$expire,'/'); 
		return true;	
	}
	public static function update_last($user){
		global $db;
		$gmt_time = time();
		$ip = explode(',',$user['loginip']);
		$ip = $ip[1].','.get_ip();
		$loginaddress = explode(STRING_DELIMITED,$user['loginaddress']);
		$loginaddress = $loginaddress[1].STRING_DELIMITED.ip::get_address(get_ip());
		$tm = explode(',',$user['logintime']);
		$last_time = is_numeric($tm[1]) ? $tm[1] : numeric($tm[0]); 
		$tm = $tm[1].','.$gmt_time;
		$integral = numeric($user['scores']);
		if($last_time && $last_time < ($gmt_time - 43200)){
			$member_config = self::get_config();
			$integral += $member_config['login_scores'];
		}
		$level = self::get_upgrade_rank($user['level'],$integral,$user['money']);
		$db->execute("UPDATE `{$db->prefix}members` SET `loginip` = '{$ip}',`loginaddress` = '{$loginaddress}',`logintime` = '{$tm}',`frequency` = (`frequency`+1),`scores` = '{$integral}',`level` = '{$level}' WHERE `id` = '{$user['id']}';");
	}
	public static function get_upgrade_rank($rankid,$scores,$money){
		global $db;
		is_numeric($rankid) or $rankid = 1;
		$now = $db->query("SELECT `scores`,`money` FROM `{$db->prefix}rank` WHERE `id` = '{$rankid}'",1);
		$now['scores'] = numeric($now['scores']);
		$now['money'] = numeric($now['money']);
		$scores = numeric($scores);
		$money = numeric($money);
		$sql = "SELECT `id` FROM `{$db->prefix}rank` WHERE `enable` = 1 && `auto` = 1 && `id` != 1 && {$scores} >= `scores` && {$money} >= `money` && `money` >= {$now['money']} && `scores` >= {$now['scores']} ORDER BY `money` DESC,`scores` DESC,`id` DESC LIMIT 1";
		$result = $db->query($sql,1);
		$result = is_numeric($result['id']) ? $result['id'] : $rankid;
		return $result;
	}
	public static function browse($channel = 0,$category = 0){
		$result = 2;
		empty($channel) or ($result == 2 && $result = self::browse_channel($channel));
		empty($category) or ($result == 2 && $result = self::browse_category($category));
		return $result;
	}
	private static function browse_channel($pid){
		global $db,$mle_user_info;
		$result = $db->query("SELECT `permission` FROM `{$db->prefix}channel` WHERE `id` = '{$pid}'",1);
		if(empty($result['permission'])){
			return 2;
		} else {
			if(true === USER_LOGIN){
				$permission = explode(',',$result['permission']);
				if(is_numeric($mle_user_info['level']) && in_array($mle_user_info['level'],$permission)){
					return 2;
				} else {
					return 1;
				}
			} else {
				return 0; 
			}
		}
	}
	private static function browse_category($cid){
		global $db,$mle_user_info;
		$permission = array();
		if(is_numeric($cid)){
			$nexus = $db->query("SELECT `nexus` FROM `{$db->prefix}category` WHERE `id` = '{$cid}'",1);
			$nexus = $nexus['nexus'];
		} else {
			$nexus = $cid;
		}
		$nexus = trim($nexus,','); 
		$result = $db->query("SELECT `permission` FROM `{$db->prefix}category` WHERE `id` in({$nexus})");
		foreach ($result as $n){
			if(!empty($n['permission'])){
				if(true === USER_LOGIN){
					$permission = explode(',',$n['permission']);
					if(!is_numeric($mle_user_info['level']) || !in_array($mle_user_info['level'],$permission)){
						return 1;
					}
				} else {
					return 0; 
				}
			}
		}
		return 2;
	}
	public static function get_logs($limit = 10,$ispage = false){
		global $db,$mlecms,$_GET;
		$sql = "SELECT * FROM `{$db->prefix}transaction` WHERE `uid` = '".USER_ID."' ";
		if($ispage){
			$page_data['total'] = $db->query(str_replace('*','count(*)',$sql),1,0);
			$page_data['total'] = $page_data['total'][0];
			$page_data['total_page'] = ceil($page_data['total'] / $limit); 
			$page_data['page'] = is_numeric($_GET['page']) ? $_GET['page'] : 1;
			$page_data['page'] > $page_data['total_page'] && $page_data['page'] = $page_data['total_page'];	
			$page_data['page'] < 1 && $page_data['page'] = 1;
			$p = 2;
			$x = $page_data['page'] - $p;
			$y = $page_data['page'] + $p;
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
			$start = $limit * ($page_data['page'] - 1);
			$page_data['limit'] = $limit; 
			$mlecms->assign('page_data',$page_data); 
		} else { 
			$start = 0; 
		}
		$sql .= "ORDER BY `id` DESC LIMIT {$start},{$limit}";
		$result = $db->query($sql);
		return $result;	
	}
	public static function ucenter_login($username,$password,$msg,$gourl = ''){
		defined('UC_API') or require_once(MLEINC.'/plugins/ucenter/config.inc.php');
		defined('IN_UC') or require_once(MLEINC.'/plugins/ucenter/uc_client/client.php');
		$id_mail = is_email($username) ? 2 : 0; 
		$uc_login = uc_user_login($username,$password,$id_mail,0); 
		if($uc_login[0] > 0){ 
			$mle_data = self::get_user($username,is_email($username) ? 2 : 1);
			if(empty($mle_data)){ 
				self::add_user($username,$password,$uc_login[3]); 
			} else { 
				if($mle_data['password'] != md5(md5($password).md5($mle_data['encryption']))){
					self::modify_password($mle_data['id'],$password); 
				}
				if($mle_data['email'] != $uc_login[3]){
					self::modify_mail($username,$uc_login[3]); 
				}
			}
			return $uc_login;	
		} else { 
			switch($uc_login[0]){
				case -1 : 
					$tid = self::login($username,$password,0);
					if($tid > 0){ 
						$mle_data = self::get_user($tid,0);
						$uid = uc_user_register($username,$password,$mle_data['email'],'','',get_ip()); 
						if($uid > 0){
							return array($uid,$username,$password,$mle_data['email'],false); 
						} else {
							msgbox($msg[0].'(UCenter)',$gourl);	
						}
					} else {
						msgbox($msg[0].'(UCenter)',$gourl); 
					}
				break; 
				case -2 : msgbox($msg[1].'(UCenter)',$gourl); break; 
				case -3 : die('Is Not Enabled. (UCenter)'); break; 
				default : die('Undefined Options. (UCenter)'); break;
			}
		}
	}
	public static function ucenter_register($username,$password,$email,$msg){
		defined('UC_API') or require_once(MLEINC.'/plugins/ucenter/config.inc.php');
		defined('IN_UC') or require_once(MLEINC.'/plugins/ucenter/uc_client/client.php');
		$ucid = uc_user_register($username,$password,$email); 
		switch($ucid){
			case -1 : msgbox($msg[0].'(UCenter)','CURRENT'); break; 
			case -2 : msgbox($msg[1].'(UCenter)','CURRENT'); break; 
			case -3 : msgbox($msg[2].'(UCenter)','CURRENT'); break; 
			case -4 : msgbox($msg[3].'(UCenter)','CURRENT'); break; 
			case -5 : msgbox($msg[4].'(UCenter)','CURRENT'); break; 
			case -6 : msgbox($msg[4].'(UCenter)','CURRENT'); break; 
			case 0 : die('Undefined Options.'); break;
			default : return $ucid; break; 
		}		
	}
}
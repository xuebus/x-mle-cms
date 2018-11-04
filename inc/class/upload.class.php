<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class upload{
	public $info = true;
	public $ispics = true; 
	public $annex_type = 'jpg,gif,png,rar';
	public $max_annex_size = 10240;
	public $max_pics_size = 800;
	public $save_dir = '../inc/uploads/';
	public $save_son_dir = true;
	public $naming = 2;
	public $field_name = 'field';
	public $is_del_tmp = true;
	public $field = array();
	public $new_filename = 'Auto';
	public $URL;
    private $chmod_files = 0777;
    private $chmod_folders = 0755;
	public function __construct(){
	}
	private function mistake($code){
		switch($code){
			case 0 : $result = "在{$this->save_dir}下创建子目录失败。"; break;
			case 1 : $result = "不存在的文件保存目录：{$this->save_dir}"; break;
			case 2 : $result = "只允许上传后缀名为 {$this->annex_type} 的文件。"; break;
			case 3 : $result = "文件上传失败，请确认是否有相应的写入权限。"; break;
			case 4 : $result = "非法的图片格式。"; break;
			case 5 : $result = "只允许上传小于 {$this->max_pics_size} KB以下的图片文件。"; break;
			case 6 : $result = "只允许上传小于 {$this->max_annex_size} KB以下的附件。"; break;
			case 7 : $result = "请选择要上传的文件。"; break;
		}
		$this->info = $result;
		return false;
	}	
	public function perform(){
		if(!$this->initialization()) return false; 
		$target = $this->save_dir.$this->new_filename;
		if(@copy($this->field['tmp_name'],$target) || (function_exists('move_uploaded_file') && @move_uploaded_file($this->field['tmp_name'],$target))){
			@chmod ($target,$this->chmod_files); 
			if($this->is_del_tmp) @unlink($this->field['tmp_name']);
			$this->URL = $target;
			return true;
		} else {
			$this->mistake(3);
			return false;	
		}		
	}
	private function initialization(){
		@set_time_limit(0);
		global $_FILES;
		$this->field = $_FILES["$this->field_name"];
		$this->field['suffix'] = preg_replace('/.*\.(.*[^\.].*)*/iU','\\1',strtolower($this->field['name']));
		$this->field['size'] = number_format($this->field['size']/1024,2,".",""); 
		if(!is_dir($this->save_dir)){$this->mistake(1); return false;}
		if(empty($this->field['name'])){$this->mistake(7); return false;}
		if($this->save_son_dir){
			$son_dir = date("Ym");
			if(!file_exists($this->save_dir.$son_dir)){
				if(@mkdir($this->save_dir.$son_dir)){
					@chmod($this->save_dir.$son_dir,$this->chmod_folders); 
					@file_put_contents($this->save_dir.$son_dir.'/index.html',''); 
				} else { 
					$this->mistake(0);
					return false;	
				}
			}
			$this->save_dir .= $son_dir.'/';
			unset($son_dir);
		}
		$annex_type = explode(',',strtolower($this->annex_type));
		if(!in_array($this->field['suffix'],$annex_type)){
			$this->mistake(2);
			return false;	
		}
		if($this->ispics){
			$picsarr = array(1,2,3,5,6); 
			$getimg = getimagesize($this->field['tmp_name']);
			if(!in_array($getimg[2],$picsarr)){
				$this->mistake(4);
				return false;
			}
			if($this->field['size'] > $this->max_pics_size){
				$this->mistake(5);
				return false;	
			}
			unset($picsarr,$getimg);
		} else {
			if($this->field['size'] > $this->max_annex_size){
				$this->mistake(6);
				return false;	
			}			
		}
		if(preg_match('/[\x80-\xff]./',$this->field['name'])) $this->naming = 0; 
		if($this->new_filename == 'Auto'){
			switch($this->naming){
				case 0 : 
					$this->new_filename = strtolower(date("YmdHis").sprintf("%03d",mt_rand(0,999)).'.'.$this->field['suffix']);
					break;
				case 1 : 
					$this->new_filename = strtolower($this->field['name']);
					break;
				case 2 : 
					$this->new_filename = strtolower($this->field['name']);
					if(is_file($this->save_dir.$this->new_filename)){
						$i = 1;
						while($i != 0){
							$xfname = basename($this->new_filename,".{$this->field['suffix']}");
							$xfname .= "({$i}).{$this->field['suffix']}";
							if(!is_file($this->save_dir.$xfname)){
								$this->new_filename = $xfname;
								$i = 0;
							} else {
								$i++;
							}
						}
						unset($i,$xfname);
					}
					break;
			}
		} else {
			$this->new_filename .= '.'.$this->field['suffix'];
		}
		unset($annex_type);
		return true;
	}
}
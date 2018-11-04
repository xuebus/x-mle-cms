<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
defined('MLEROOT') or die('Access Denied.');
class xml{
	public $parser;
	public $document;
	public $stack;
	public $data;
	public $last_opened_tag;
	public $isnormal = false;
	public $attrs = array();
	public $failed = false;
	public $encoding = 'UTF-8'; 
	public function __construct() {
		$this->parser = xml_parser_create($this->encoding);
		xml_parser_set_option($this->parser,XML_OPTION_CASE_FOLDING,false);
		xml_parser_set_option($this->parser,XML_OPTION_SKIP_WHITE,1);
		xml_parser_set_option($this->parser,XML_OPTION_TARGET_ENCODING,$this->encoding);		
		xml_set_object($this->parser,$this);
		xml_set_element_handler($this->parser,'open','close');
		xml_set_character_data_handler($this->parser,'data');
	}
	public function array2xml($arr,$htmlon=false,$isnormal=false,$level=1) {
		$result = $level == 1 ? "<?xml version=\"1.0\" encoding=\"".$this->encoding."\"?>\r\n<root>\r\n" : '';
		$space = str_repeat("\t",$level);
		is_array($arr) or $arr = array();
		foreach($arr as $i => $n){
			if(!is_array($n)){
				$result .= $space."<item id=\"{$i}\">".($htmlon ? '<![CDATA[' : '').$n.($htmlon ? ']]>' : '')."</item>\r\n";
			} else {
				$result .= $space."<item id=\"{$i}\">\r\n".$this->array2xml($n,$htmlon,$isnormal,$level+1).$space."</item>\r\n";
			}
		}
		$result = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $result);
		return $level == 1 ? $result."</root>" : $result;
	}	
	public function xml2array($data,$isfile=true){
		$isfile && $data = @file_get_contents($data);
		$this->document = array();
		$this->stack = array();
		$array = @xml_parse($this->parser,$data,true) && !$this->failed ? $this->document : '';
		@xml_parser_free($this->parser); 
		is_array($array) or $array = array();
		return $array;
	}
	private function open(&$parser,$tag,$attributes) {
		$this->data = '';
		$this->failed = FALSE;
		if(!$this->isnormal) {
			if(isset($attributes['id']) && !is_string($this->document[$attributes['id']])) {
				$this->document  = &$this->document[$attributes['id']];
			} else {
				$this->failed = TRUE;
			}
		} else {
			if(!isset($this->document[$tag]) || !is_string($this->document[$tag])) {
				$this->document  = &$this->document[$tag];
			} else {
				$this->failed = TRUE;
			}
		}
		$this->stack[] = &$this->document;
		$this->last_opened_tag = $tag;
		$this->attrs = $attributes;
	}
	private function data(&$parser,$data) {
		if($this->last_opened_tag != NULL) {
			$this->data .= $data;
		}
	}
	private function close(&$parser,$tag) {
		if($this->last_opened_tag == $tag) {
			$this->document = $this->data;
			$this->last_opened_tag = NULL;
		}
		array_pop($this->stack);
		if($this->stack) {
			$this->document = &$this->stack[count($this->stack)-1];
		}
	}
}
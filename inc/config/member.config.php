<?php
defined('MLEROOT') or die('Access Denied.');
$member_config = array (
  'allow_reg' => '1',
  'register_audit' => '0',
  'username_strictly' => '0',
  'disable' => 'mail,user,users,admin,administrator,member,manager,mlecms',
  'search_open' => '0',
  'search_fulltext' => '0',
  'search_interval' => '0',
  'comment_enabled' => 
  array (
    0 => 'MO001x',
    1 => 'MO002x',
    2 => 'MO003x',
    3 => 'MO004x',
  ),
  'comment_audit' => '1',
  'comment_traveler' => '0',
  'comment_interval' => '0',
  'message' => '0',
  'message_interval' => '0',
  'feedback' => '0',
  'feedback_interval' => '0',
  'allow_exchange' => '1',
  'ratio_scores' => '10000',
  'register_scores' => '100',
  'login_scores' => '20',
  'comment_scores' => '20',
);
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:49:29
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321035bd9c0f9eae654-08984239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1ebbbaa5633fd7ec30da0b57017d4e9b54f261d' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/show.tpl',
      1 => 1371785430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321035bd9c0f9eae654-08984239',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('pic')->value['title'];?>
</title>
<base href="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
">
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('pic')->value['keyword'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('pic')->value['introduction'];?>
" />
<meta name="copyright" content="2009-2011 MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/photo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/script/hd_pics.js"></script>
<script type="text/javascript">
var PICS_FILE = <?php echo $_smarty_tpl->getVariable('pic')->value['img_jsstring'];?>
; var PICS_DESCRIPTION = <?php echo $_smarty_tpl->getVariable('pic')->value['des_jssering'];?>
;
</script>
</head>
<body class="show_body">
<div class="show_top">
	<ol class="logo"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['logo'];?>
" height="35" /></ol>
	<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <a href="<?php echo misc::get_url('channel',3,$_smarty_tpl->getVariable('mle')->value['channel_id']);?>
"><?php echo $_smarty_tpl->getVariable('pic')->value['channel'];?>
</a> &gt;&gt; <?php echo category::cid2name($_smarty_tpl->getVariable('pic')->value['category_id'],' &gt;&gt; ',true);?>
 &gt;&gt; <?php echo $_smarty_tpl->getVariable('lang')->value['page']['main'];?>
</ol>
	<ol class="right">
		<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> |
		<?php if ($_smarty_tpl->getVariable('mle')->value['is_login']){?><a href="member/center.php"><?php echo $_smarty_tpl->getVariable('mle')->value['user']['username'];?>
</a> | <a href="member/login.php?action=logout"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['logout'];?>
</a>
		<?php }else{ ?><a href="<?php echo misc::url('login');?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['login'];?>
</a> |	<a href="<?php echo misc::url('register');?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['register'];?>
</a><?php }?>
		<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = category::data(3,$_smarty_tpl->getVariable('pic')->value['channel_id'],0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?> | <a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a><?php }} ?>
	</ol>
</div>
<div class="show_title"><?php echo $_smarty_tpl->getVariable('pic')->value['title'];?>
</div>
<table class="show_misc">
	<tr>
		<td><?php echo $_smarty_tpl->getVariable('lang')->value['page']['tips'];?>
</td>
		<td><?php echo $_smarty_tpl->getVariable('lang')->value['page']['hits'];?>
<script type="text/javascript" src="app.php?a=hits&type=2&id=<?php echo $_smarty_tpl->getVariable('pic')->value['id'];?>
&show=1"></script></td>
		<td><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['published']).($_smarty_tpl->getVariable('pic')->value['addtime']);?>
</td>
	</tr>
</table>
<table align="center" class="show_display">
	<tr>
		<td align="center" colspan="2" class="image_td">
			<img id="index_img" src="<?php echo $_smarty_tpl->getVariable('pic')->value['picture'][1];?>
" usemap="#map" border="0" /><a href="javascript:mle.pics.click_left()"><img id="arrow_left" src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/arrow_left.png" onfocus="this.blur()" border="0" /></a><a href="javascript:mle.pics.click_right()"><img id="arrow_right" src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/arrow_right.png" onfocus="this.blur()" border="0" /></a>
			<map name="map" id="map">
				<area shape="rect" coords="0,0,400,300" id="map_left" href="javascript:mle.pics.click_left()" onfocus="this.blur()" />
				<area id="map_right" shape="rect" coords="400,0,800,300" href="javascript:mle.pics.click_right()" onfocus="this.blur()" />
			</map>
		</td>
	</tr>
	<tr>
		<td id="index_description"></td>
		<td class="show_number"><span class="index_current">1</span>/<?php echo count($_smarty_tpl->getVariable('pic')->value['picture']);?>
</td>
	</tr>
</table>
<div class="show_content">
	<ol class="content"><?php echo $_smarty_tpl->getVariable('pic')->value['content'];?>
</ol>
	<ol class="related">
		<?php echo $_smarty_tpl->getVariable('lang')->value['page']['similar_prev'];?>
<?php if ($_smarty_tpl->getVariable('pic')->value['data_prev']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('pic')->value['data_prev']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('pic')->value['data_prev']['title'];?>
"><?php echo $_smarty_tpl->getVariable('pic')->value['data_prev']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?><br />
		<?php echo $_smarty_tpl->getVariable('lang')->value['page']['similar_next'];?>
<?php if ($_smarty_tpl->getVariable('pic')->value['data_next']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('pic')->value['data_next']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('pic')->value['data_next']['title'];?>
"><?php echo $_smarty_tpl->getVariable('pic')->value['data_next']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?>
	</ol>
</div>
<div class="show_footer">
	Copyright © 2010-2011 MLECMS. All Rights Reserved.<br />
	<a target="_blank" href="http://www.mlecms.com">Powered by mlecms <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
 <?php echo $_smarty_tpl->getVariable('mle')->value['edition'];?>
</a>
</div>
</body>
</html>
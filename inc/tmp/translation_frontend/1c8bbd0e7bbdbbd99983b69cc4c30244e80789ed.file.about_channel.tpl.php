<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:50:19
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/about_channel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:316775bd9c12b93d643-40397163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c8bbd0e7bbdbbd99983b69cc4c30244e80789ed' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/about_channel.tpl',
      1 => 1346786732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316775bd9c12b93d643-40397163',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(array_shift(article::data(2,1,0,$_smarty_tpl->getVariable('mle')->value['channel_id'])), null, null);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('mle')->value['channel']['seotitle'];?>
</title>
<base href="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
">
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('mle')->value['channel']['seokey'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('mle')->value['channel']['seodescr'];?>
" />
<meta name="copyright" content="2009-2011 MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/article.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="app.php?a=hits&id=<?php echo $_smarty_tpl->getVariable('a')->value['id'];?>
"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="box">
	<div class="frame_side">
		<div class="left_head"></div>
		<div class="menu_box">
			<ol class="menu_top"></ol>
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = article::data(2,30,0,$_smarty_tpl->getVariable('mle')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
			<ol class="menu_middle">
				<img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/common2.gif" width="9" height="15" />
				<a href="<?php echo $_smarty_tpl->tpl_vars['c']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
</a>
			</ol>
			<?php }} ?>
			<ol class="menu_bottom"></ol>
		</div>
		<div class="left_footer"></div>
	</div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title"><?php echo cut_str($_smarty_tpl->getVariable('a')->value['title'],40,'');?>
</ol>
			<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <a href="<?php echo misc::get_url('channel',1,$_smarty_tpl->getVariable('mle')->value['channel_id']);?>
"><?php echo $_smarty_tpl->getVariable('mle')->value['channel_title'];?>
</a> &gt;&gt; <?php echo $_smarty_tpl->getVariable('a')->value['title'];?>
</ol>
		</div>
		<div class="content_common">
			<?php if ($_smarty_tpl->getVariable('a')->value['page']>0){?><?php if (!isset($_smarty_tpl->tpl_vars['a']) || !is_array($_smarty_tpl->tpl_vars['a']->value)) $_smarty_tpl->createLocalArrayVariable('a', null, null);
$_smarty_tpl->tpl_vars['a']->value['content'] = misc::content_page($_smarty_tpl->getVariable('a')->value['content'],$_smarty_tpl->getVariable('a')->value['page'],$_smarty_tpl->getVariable('a')->value['id']);?><?php }?>
			<?php echo $_smarty_tpl->getVariable('a')->value['content'];?>
		
		</div>
		
		<?php if ($_smarty_tpl->getVariable('a')->value['page']>0){?><?php $_template = new Smarty_Internal_Template('component_page_style.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?><?php }?>
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
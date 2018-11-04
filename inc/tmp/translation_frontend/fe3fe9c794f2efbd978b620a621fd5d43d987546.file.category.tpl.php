<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:56:58
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64825bd9c2ba7f0d76-29952841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe3fe9c794f2efbd978b620a621fd5d43d987546' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/category.tpl',
      1 => 1371786008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64825bd9c2ba7f0d76-29952841',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('mle')->value['category']['seotitle'];?>
</title>
<base href="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
">
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('mle')->value['category']['seokey'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('mle')->value['category']['seodescr'];?>
" />
<meta name="copyright" content="2009-2011 MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/product.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/script/shopping.js"></script>
<script type="text/javascript">
mle.shopping.language['add_failed'] = "<?php echo $_smarty_tpl->getVariable('lang')->value['page']['add_failed'];?>
";
mle.shopping.language['sid_exists'] = "<?php echo $_smarty_tpl->getVariable('lang')->value['page']['sid_exists'];?>
";
mle.shopping.language['sid_success'] = "<?php echo $_smarty_tpl->getVariable('lang')->value['page']['sid_success'];?>
";
</script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_smarty_tpl->tpl_vars['sub'] = new Smarty_variable(category::data(0,0,$_smarty_tpl->getVariable('mle')->value['category']['id'],$_smarty_tpl->getVariable('mle')->value['category']['level']+1), null, null);?>
<?php if ($_smarty_tpl->getVariable('sub')->value){?><div class="classify"><?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sub')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['n']->value['next_level']){?>&nbsp;|&nbsp;<?php }?><?php }} ?></div><?php }?>
<div class="box">
	<div class="frame_side"><?php $_template = new Smarty_Internal_Template('component_product.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?></div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title"><?php echo $_smarty_tpl->getVariable('mle')->value['category']['title'];?>
</ol>
			<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <a href="<?php echo misc::get_url('channel',2,$_smarty_tpl->getVariable('mle')->value['channel_id']);?>
"><?php echo $_smarty_tpl->getVariable('mle')->value['category']['channel'];?>
</a> &gt;&gt; <?php echo category::cid2name($_smarty_tpl->getVariable('mle')->value['category']['nexus'],' &gt;&gt; ',true);?>
</ol>
		</div>
		
		<div class="search">
			<form name="searchform" method="get" target="_blank" action="search.php">
			<span class="left"></span>
			<input class="word" type="text" name="word" id="word" tabindex="5" maxlength="50" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
" onfocus="if(this.value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
'){this.value = '';this.style.color = '#000';}" onblur="if(this.value==''){this.value='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
';this.style.color = '#999';}" />
			<input class="button" type="submit" name="" tabindex="6" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'];?>
" onclick="if(document.getElementById('word').value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
'){ alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords_msg'];?>
');return false;}" />
			<input type="hidden" name="type" value="2" />
			</form>
		</div>
		
		<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = product::data(0,10,0,0,$_smarty_tpl->getVariable('mle')->value['category']['id'],0,0,0,0,1,0,0,3); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
?>
		<div class="list">
			<div class="photo">
				<ol><a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['p']->value['picture'][0];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
" width="100" height="100" onload="mle.img_auto_size(this)" /></a></ol>
			</div>
			<div class="content">
				<ol class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['title_format'];?>
</a></ol>
				<ol class="info">
					<?php echo $_smarty_tpl->tpl_vars['p']->value['addtime'];?>
&nbsp;&nbsp;&nbsp;
					<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['hits']).($_smarty_tpl->tpl_vars['p']->value['click']);?>
&nbsp;&nbsp;&nbsp;
					<?php if ($_smarty_tpl->tpl_vars['p']->value['sales']){?><?php echo (($_smarty_tpl->getVariable('lang')->value['page']['sold']).($_smarty_tpl->tpl_vars['p']->value['sales'])).($_smarty_tpl->tpl_vars['p']->value['units']);?>
&nbsp;&nbsp;&nbsp;<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['p']->value['tag']){?><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['tag']).($_smarty_tpl->tpl_vars['p']->value['tag']);?>
<?php }?>
				</ol>
				<ol class="summary"><?php echo misc::html2txt($_smarty_tpl->tpl_vars['p']->value['content'],170);?>
</ol>
			</div>
			<div class="misc">
				<ol class="price"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['market'];?>
<span class="num_market"><?php echo $_smarty_tpl->tpl_vars['p']->value['market'];?>
</span></ol>
				<ol class="price"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['price'];?>
<span class="num_price"><?php echo $_smarty_tpl->tpl_vars['p']->value['price'];?>
</span></ol>
			</div>
		</div>
		<?php }} else { ?>
		<div class="notdata"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['notdata'];?>
</div>
		<?php } ?>
		<?php $_template = new Smarty_Internal_Template('component_page_style.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
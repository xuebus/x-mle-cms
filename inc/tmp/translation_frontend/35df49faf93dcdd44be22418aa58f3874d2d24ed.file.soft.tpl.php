<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:55:31
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/soft.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314885bd9c263470107-28204310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35df49faf93dcdd44be22418aa58f3874d2d24ed' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/soft.tpl',
      1 => 1331461770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314885bd9c263470107-28204310',
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
style/download.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!-- 有子类时显示子类 -->
<?php $_smarty_tpl->tpl_vars['sub'] = new Smarty_variable(category::data(4,0,$_smarty_tpl->getVariable('mle')->value['category']['id'],$_smarty_tpl->getVariable('mle')->value['category']['level']+1), null, null);?>
<?php if ($_smarty_tpl->getVariable('sub')->value){?><?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sub')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?><div class="classify"><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['n']->value['next_level']){?>&nbsp;|&nbsp;<?php }?><?php }} ?></div><?php }?>

<div class="box">
	<div class="main">
		<div class="titlebar">
			<ol class="title"><?php echo $_smarty_tpl->getVariable('mle')->value['category']['title'];?>
</ol>
			<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <a href="<?php echo misc::get_url('channel',4,$_smarty_tpl->getVariable('mle')->value['channel_id']);?>
"><?php echo $_smarty_tpl->getVariable('mle')->value['category']['channel'];?>
</a> &gt;&gt; <?php echo category::cid2name($_smarty_tpl->getVariable('mle')->value['category']['nexus'],' &gt;&gt; ',true);?>
</ol>
		</div>
		
		<!-- 列表数据，全部分类 -->
		<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = download::data(0,10,0,0,$_smarty_tpl->getVariable('mle')->value['category']['id'],0,0,0,0,1,0,0,3); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
		<div class="data">
			<ul class="image"><li><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['d']->value['picture'][0];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
" width="135" height="90" border="0" onload="mle.img_auto_size(this)" /></a></li></ul>
			<ul class="content">
				<li class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['title_format'];?>
</a></li>
				<li class="misc">
					<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['misc'][0]).($_smarty_tpl->tpl_vars['d']->value['addtime']);?>
&nbsp;&nbsp;&nbsp;
					<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['misc'][1]).($_smarty_tpl->tpl_vars['d']->value['size']);?>
&nbsp;&nbsp;&nbsp;
					<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['misc'][2]).($_smarty_tpl->tpl_vars['d']->value['count']);?>
&nbsp;&nbsp;&nbsp;
					<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['misc'][3]).($_smarty_tpl->tpl_vars['d']->value['click']);?>

				</li>
				<li class="abstract"><?php echo misc::html2txt($_smarty_tpl->tpl_vars['d']->value['content'],220);?>
</li>
			</ul>
		</div>
		<?php }} else { ?><div class="notdata"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['notdata'];?>
</div><?php } ?>
		<?php $_template = new Smarty_Internal_Template('component_page_style.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	</div>
	<div class="sidebar">
		<!-- 搜索 -->
		<div class="search" <?php if (!$_smarty_tpl->getVariable('sub')->value){?>style="padding:20px 0 0 0;"<?php }?>>
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
			<input type="hidden" name="type" value="4" />
			</form>
		</div>		

		<!-- TAG -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['tag'];?>
</ol>
			<ol class="more"><a href="<?php echo misc::url('tag');?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
		</div>
		<div class="tag">
		<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = tag::data(0,4,50); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
			<?php if ($_smarty_tpl->tpl_vars['t']->value['total']>30){?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
" class="hot1"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>
			<?php }elseif($_smarty_tpl->tpl_vars['t']->value['click']>50){?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
" class="top1"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>
			<?php }elseif($_smarty_tpl->tpl_vars['t']->value['total']>15){?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
" class="hot2"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>
			<?php }elseif($_smarty_tpl->tpl_vars['t']->value['click']>30){?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
" class="top2"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>
			<?php }elseif($_smarty_tpl->tpl_vars['t']->value['total']>5){?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
" class="hot3"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>
			<?php }elseif($_smarty_tpl->tpl_vars['t']->value['click']>10){?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
" class="top3"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>
			<?php }else{ ?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
" class="gen"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a><?php }?>
		<?php }} ?>
		</div>	
	
		<!-- 推荐资源 begin -->
		<div class="caption"><ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][0];?>
</ol></div>
		<div class="well">
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = download::data(0,10,1,$_smarty_tpl->getVariable('mle')->value['category']['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
			<ul>
				<li class="num"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</li>
				<li class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['title_format'];?>
</a></li>
			</ul>
			<?php }} ?>
		</div>
		<!-- 推荐资源 end -->
		
		<!-- 下载排行 begin -->
		<div class="caption"><ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][2];?>
</ol></div>
		<div class="well">
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = download::data(9,10,0,$_smarty_tpl->getVariable('mle')->value['category']['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
			<ul>
				<li class="num"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</li>
				<li class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['d']->value['title_format'];?>
</a> <font color="#666666">(<?php echo $_smarty_tpl->tpl_vars['d']->value['count'];?>
)</font></li>
			</ul>
			<?php }} ?>
		</div>		
		<!-- 下载排行 end -->
		
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
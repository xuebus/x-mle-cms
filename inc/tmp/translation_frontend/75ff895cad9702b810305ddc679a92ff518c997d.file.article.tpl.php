<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:50:02
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:277095bd9c11a006ac0-35646845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75ff895cad9702b810305ddc679a92ff518c997d' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/article.tpl',
      1 => 1346786678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277095bd9c11a006ac0-35646845',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
<script type="text/javascript" src="inc/script/focus_classic.js"></script>
<script type="text/javascript">
$(function(){
	$.getScript('inc/script/msclass.js',function(){new marquee('thumbnail',2,1,620,115,20,0,0);});// 滚动图片新闻
	mle.focus_classic('focus',3000,1,60); // 焦点图
}); 
</script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="classify"><?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = category::data(1,$_smarty_tpl->getVariable('mle')->value['channel_id'],0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['n']->value['next_level']){?>&nbsp;|&nbsp;<?php }?><?php }} ?></div>
<div class="box">
	<div class="main">
		<div class="first_screen">
			<div class="left_column">
				<!-- 焦点图 -->
				<div id="focus">
					<div></div> 
					<ul> 
						<?php $_smarty_tpl->tpl_vars['pic'] = new Smarty_variable(photo::data(0,0,0,0,0,'news_focus'), null, null);?>
						<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pic')->value['picture']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?> <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(explode("\r\n",$_smarty_tpl->getVariable('pic')->value['description'][$_smarty_tpl->tpl_vars['i']->value]), null, null);?> 
						<li><a href="<?php echo $_smarty_tpl->getVariable('p')->value[0];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('p')->value[1];?>
" width="278" height="248" /></a></li> 
						<?php }} ?>
					</ul> 
				</div>
				
				<!-- 搜索 -->
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
					<input type="hidden" name="type" value="1" />
					</form>
				</div>
			</div>
			
			<!-- 最新发布，发布日期降序 -->
			<div class="new">
				<div class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['latest'];?>
</div>
				<div class="list">
					<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(1,12,0,$_smarty_tpl->getVariable('mle')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
					<ol>
						<a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a>
						<span><?php echo $_smarty_tpl->tpl_vars['a']->value['addtime'];?>
</span>
					</ol>
					<?php }} ?>
				</div>		
			</div>
		</div>
		
		<!-- 图片 -->
		<div class="thumbnail">
			<div id="thumbnail">
			<table cellpadding="0" cellspacing="0" border="0"><tr>
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(0,5,0,$_smarty_tpl->getVariable('mle')->value['channel_id'],0,0,22,'',0,0,0,0,0,0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
				<td>
					<div class="pic"><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['a']->value['picture'][0];?>
" width="120" height="90" onload="mle.img_auto_size(this)" /></a></div>
					<div class="text"><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></div>
				</td>
			<?php }} ?>
			</tr></table>
			</div>
		</div>
		
		<!-- 类别数据调用，自定义字段排序 -->
		<div class="column_data">
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = category::data(1,$_smarty_tpl->getVariable('mle')->value['channel_id'],0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
			<div class="recom">
				<div class="caption">
					<ol class="heading"><?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
</ol>
					<ol class="more"><a href="<?php echo $_smarty_tpl->tpl_vars['c']->value['URL'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
				</div>
				<div class="circle">
				<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(0,10,0,$_smarty_tpl->getVariable('mle')->value['channel_id'],$_smarty_tpl->tpl_vars['c']->value['id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
					<ol><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></ol>
				<?php }} ?>
				</div>
			</div>
			<?php }} ?>
		</div>
	
	</div>
	
	<!-- 右边栏 -->
	<div class="sidebar">
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
 $_from = tag::data(0,1,50); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		
		<!-- 广告 276*108px -->
		<div class="ad"><?php echo ad::show('article_1');?>
</div> 
		
		<!-- 推荐 -->
		<div class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'];?>
</div>
		<div class="well">
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(0,10,1,$_smarty_tpl->getVariable('mle')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
			<ol><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></ol>
			<?php }} ?>
		</div>
		
		<!-- 广告 276*108px -->
		<div class="ad"><?php echo ad::show('article_2');?>
</div> 
		
		<!-- 热门 -->
		<div class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['hot'];?>
</div>
		<div class="well">
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(5,10,0,$_smarty_tpl->getVariable('mle')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
			<ol><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a> (<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['hits']).($_smarty_tpl->tpl_vars['a']->value['click']);?>
)</ol>
			<?php }} ?>
		</div>					
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:55:09
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/down.tpl" */ ?>
<?php /*%%SmartyHeaderCode:297375bd9c24d46a659-80545389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca8da552d5f99fc1728248f68dfef3ebd8f1c81b' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/down.tpl',
      1 => 1371785358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '297375bd9c24d46a659-80545389',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('d')->value['title'];?>
</title>
<base href="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
">
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('d')->value['keyword'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('d')->value['introduction'];?>
" />
<meta name="copyright" content="2009-2011 MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/download.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<link rel="stylesheet" type="text/css" href="inc/tools/highslide/highslide.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/tools/highslide/highslide-with-gallery.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!-- 有子类时显示子类 -->
<div class="classify">
<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = category::data(4,$_smarty_tpl->getVariable('d')->value['channel_id'],0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['n']->value['next_level']){?>&nbsp;|&nbsp;<?php }?><?php }} ?>
</div>

<div class="box">
	<div class="main">
		<div class="down_titlebar">
			<ol class="down_location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <a href="<?php echo misc::get_url('channel',4,$_smarty_tpl->getVariable('mle')->value['channel_id']);?>
"><?php echo $_smarty_tpl->getVariable('d')->value['channel'];?>
</a> &gt;&gt; <?php echo category::cid2name($_smarty_tpl->getVariable('d')->value['category_id'],' &gt;&gt; ',true);?>
</ol>
			<ol class="down_title"><?php echo $_smarty_tpl->getVariable('d')->value['title'];?>
</ol>
		</div>
		
		<!-- 软件基本信息 -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['info'][0];?>
</ol>
			<ol class="right_lines"></ol>
		</div>
		<div class="basic">
			<div class="misc">
				<ul>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][0];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['size'];?>
</li>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][1];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['authorization'];?>
</li>
				</ul>
				<ul>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][2];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['softlang'];?>
</li>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][3];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['environment'];?>
</li>
				</ul>
				<ul>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][4];?>
</strong><script type="text/javascript" src="app.php?a=hits&type=3&id=<?php echo $_smarty_tpl->getVariable('d')->value['id'];?>
&show=1"></script></li>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][5];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['count'];?>
</li>
				</ul>
				<ul>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][6];?>
</strong><?php if ($_smarty_tpl->getVariable('d')->value['sourceurl']){?><a target="_blank" href="<?php echo $_smarty_tpl->getVariable('d')->value['sourceurl'];?>
">Home Page</a><?php }?></li>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][7];?>
</strong><?php if ($_smarty_tpl->getVariable('d')->value['demourl']){?><a target="_blank" href="<?php echo $_smarty_tpl->getVariable('d')->value['demourl'];?>
">Demo Url</a><?php }?></li>
				</ul>
				<ul>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][8];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['addtime'];?>
</li>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][9];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['format_permission'];?>
</li>
				</ul>
				<ul>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][10];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['integral'];?>
</li>
					<li><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][11];?>
</strong><?php echo $_smarty_tpl->getVariable('d')->value['money'];?>
</li>
				</ul>
			</div>
			<div class="photo">
				<ol class="img">
					<a href="<?php echo $_smarty_tpl->getVariable('d')->value['picture'][1];?>
" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['photo_title'];?>
" onclick="return hs.expand(this)"><img src="<?php echo $_smarty_tpl->getVariable('d')->value['picture'][1];?>
" width="226" height="176" onload="mle.img_auto_size(this)" /></a>
					<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('d')->value['picture']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?><?php if ($_smarty_tpl->tpl_vars['i']->value>1&&file_exists($_smarty_tpl->tpl_vars['n']->value)){?><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" onclick="return hs.expand(this)"></a><?php }?><?php }} ?>		
				</ol>
				<ol class="txt"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['photo_caption'];?>
</ol>
			</div>
		</div>
		
		<!-- 详细介绍 -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['info'][1];?>
</ol>
			<ol class="right_lines"></ol>
		</div>
		<div class="down_content"><?php echo $_smarty_tpl->getVariable('d')->value['content'];?>
</div>
		
		<!-- 下载地址 -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['info'][2];?>
</ol>
			<ol class="right_lines"></ol>
		</div>
		<div class="down_url">
		<?php  $_smarty_tpl->tpl_vars['dd'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('d')->value['format_url']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['dd']->key => $_smarty_tpl->tpl_vars['dd']->value){
?><ol><a href="<?php echo $_smarty_tpl->tpl_vars['dd']->value[2];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['dd']->value[0];?>
</a></ol> <?php }} ?>
		</div>
		
		<!-- 下载说明 -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['info'][3];?>
</ol>
			<ol class="right_lines"></ol>
		</div>
		<div class="down_content"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['download_explain'];?>
</div>
		
		<div class="share">
			<!-- Baidu Button BEGIN -->
			<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
				<span class="bds_more"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['share'];?>
</span>
				<a class="bds_tsina"></a>
				<a class="bds_tqq"></a>
				<a class="bds_qzone"></a>
				<a class="bds_renren"></a>
				<a class="bds_tqf"></a>
				<a class="bds_kaixin001"></a>
				<a class="bds_douban"></a>
				<a class="bds_fbook"></a>
				<a class="shareCount"></a>
			</div>
			<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
				document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
			</script>
			<!-- Baidu Button END -->
		</div>
		
		<!-- 上、下相关 -->
		<div class="down_content">
			<strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['similar_prev'];?>
</strong><?php if ($_smarty_tpl->getVariable('d')->value['data_prev']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('d')->value['data_prev']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('d')->value['data_prev']['title'];?>
"><?php echo $_smarty_tpl->getVariable('d')->value['data_prev']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?><br />
			<strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['similar_next'];?>
</strong><?php if ($_smarty_tpl->getVariable('d')->value['data_next']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('d')->value['data_next']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('d')->value['data_next']['title'];?>
"><?php echo $_smarty_tpl->getVariable('d')->value['data_next']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?>
		</div>
		
	</div>
	<div class="sidebar">
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
			<?php  $_smarty_tpl->tpl_vars['dd'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = download::data(0,10,1,$_smarty_tpl->getVariable('d')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['dd']->key => $_smarty_tpl->tpl_vars['dd']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['dd']->key;
?>
			<ul>
				<li class="num"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</li>
				<li class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['dd']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['dd']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['dd']->value['title_format'];?>
</a></li>
			</ul>
			<?php }} ?>
		</div>
		<!-- 推荐资源 end -->
		
		<!-- 下载排行 begin -->
		<div class="caption"><ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][2];?>
</ol></div>
		<div class="well">
			<?php  $_smarty_tpl->tpl_vars['dd'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = download::data(9,10,0,$_smarty_tpl->getVariable('d')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['dd']->key => $_smarty_tpl->tpl_vars['dd']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['dd']->key;
?>
			<ul>
				<li class="num"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</li>
				<li class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['dd']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['dd']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['dd']->value['title_format'];?>
</a> <font color="#666666">(<?php echo $_smarty_tpl->tpl_vars['dd']->value['count'];?>
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
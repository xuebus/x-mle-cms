<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:54:43
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236025bd9c23311a8f4-13943587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9428c661ee882f9ff0354c347c10e199ec7e07c1' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/view.tpl',
      1 => 1371785411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236025bd9c23311a8f4-13943587',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('a')->value['title'];?>
</title>
<base href="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
">
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('a')->value['keyword'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('a')->value['introduction'];?>
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
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="box">
	<div class="frame_side"><?php $_template = new Smarty_Internal_Template('component_article.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?></div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title"><?php echo $_smarty_tpl->getVariable('a')->value['channel'];?>
</ol>
			<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <a href="<?php echo misc::get_url('channel',1,$_smarty_tpl->getVariable('mle')->value['channel_id']);?>
"><?php echo $_smarty_tpl->getVariable('a')->value['channel'];?>
</a> &gt;&gt; <?php echo category::cid2name($_smarty_tpl->getVariable('a')->value['category_id'],' &gt;&gt; ',true);?>
 &gt;&gt; <?php echo $_smarty_tpl->getVariable('lang')->value['page']['main'];?>
</ol>
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
		
		<!-- 详细信息 -->
		<div class="details">
			<ol class="caption"><?php echo $_smarty_tpl->getVariable('a')->value['title'];?>
</ol>
			<ol class="misc">
				<?php if ($_smarty_tpl->getVariable('a')->value['author']){?><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][0];?>
<span><?php echo $_smarty_tpl->getVariable('a')->value['author'];?>
</span>&nbsp;&nbsp;<?php }?>
				<?php if ($_smarty_tpl->getVariable('a')->value['source']){?><?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][1];?>
<span><?php echo $_smarty_tpl->getVariable('a')->value['source'];?>
</span>&nbsp;&nbsp;<?php }?>
				<?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][2];?>
<span><script type="text/javascript" src="app.php?a=hits&id=<?php echo $_smarty_tpl->getVariable('a')->value['id'];?>
&show=1"></script></span>&nbsp;&nbsp;
				<?php echo $_smarty_tpl->getVariable('lang')->value['page']['misc'][3];?>
<span><?php echo $_smarty_tpl->getVariable('a')->value['addtime'];?>
</span>&nbsp;&nbsp;
			</ol>
			<ol class="content_common"><?php echo $_smarty_tpl->getVariable('a')->value['content'];?>
</ol>
		</div>
		
		<!-- 内容分页、启用了内容分页且有1页以上时显示 -->
		<?php $_template = new Smarty_Internal_Template('component_page_style.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		
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

		<!-- 上一篇、下一篇 -->
		<div class="similar">
			<ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['similar_prev'];?>
<?php if ($_smarty_tpl->getVariable('a')->value['data_prev']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('a')->value['data_prev']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('a')->value['data_prev']['title'];?>
"><?php echo $_smarty_tpl->getVariable('a')->value['data_prev']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?></ol>
			<ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['similar_next'];?>
<?php if ($_smarty_tpl->getVariable('a')->value['data_next']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('a')->value['data_next']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('a')->value['data_next']['title'];?>
"><?php echo $_smarty_tpl->getVariable('a')->value['data_next']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?></ol>
		</div>
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
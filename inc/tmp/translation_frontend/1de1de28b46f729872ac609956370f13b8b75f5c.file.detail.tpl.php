<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:56:54
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91345bd9c2b630fce1-90125155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1de1de28b46f729872ac609956370f13b8b75f5c' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/detail.tpl',
      1 => 1371785504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91345bd9c2b630fce1-90125155',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('p')->value['title'];?>
</title>
<base href="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
">
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('p')->value['keyword'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('p')->value['introduction'];?>
" />
<meta name="copyright" content="2009-2011 MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/product.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<link rel="stylesheet" type="text/css" href="inc/tools/highslide/highslide.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/script/shopping.js"></script>
<script type="text/javascript" src="inc/tools/highslide/highslide-with-gallery.js"></script>
<script type="text/javascript">
// 购买相关语言
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
<div class="box">
	<div class="frame_side"><?php $_template = new Smarty_Internal_Template('component_product.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?></div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title"><?php echo cut_str($_smarty_tpl->getVariable('p')->value['title'],40,'');?>
</ol>
			<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <a href="<?php echo misc::get_url('channel',2,$_smarty_tpl->getVariable('mle')->value['channel_id']);?>
"><?php echo $_smarty_tpl->getVariable('p')->value['channel'];?>
</a> &gt;&gt; <?php echo category::cid2name($_smarty_tpl->getVariable('p')->value['category_id'],' &gt;&gt; ',true);?>
 &gt;&gt; <?php echo $_smarty_tpl->getVariable('lang')->value['page']['main'];?>
</ol>
		</div>
		
		<!-- 搜索 -->
		<div class="search">
			<form name="searchform" method="get" target="_blank" action="search.php">
			<span class="left"></span>
			<input class="word" type="text" name="word" id="word" tabindex="5" maxlength="50" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
" onFocus="if(this.value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
'){this.value = '';this.style.color = '#000';}" onBlur="if(this.value==''){this.value='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
';this.style.color = '#999';}" />
			<input class="button" type="submit" name="" tabindex="6" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'];?>
" onClick="if(document.getElementById('word').value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
'){ alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords_msg'];?>
');return false;}" />
			<input type="hidden" name="type" value="2" />
			</form>
		</div>
		
		<!-- 商品基本信息 -->
		<div class="basic">
			<div class="photo">
				<ol class="show">
					<a href="<?php echo $_smarty_tpl->getVariable('p')->value['picture'][1];?>
" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['photo_title'];?>
" onclick="return hs.expand(this)"><img src="<?php echo $_smarty_tpl->getVariable('p')->value['picture'][1];?>
" width="280" height="300" onload="mle.img_auto_size(this)" /></a>
					<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('p')->value['picture']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?><?php if ($_smarty_tpl->tpl_vars['i']->value>1&&file_exists($_smarty_tpl->tpl_vars['n']->value)){?><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" onclick="return hs.expand(this)"></a><?php }?><?php }} ?><br />
				</ol>
				<ol class="related"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['related'];?>
<!-- 分享、收藏等扩展保留位 --></ol>
			</div>
			<div class="parameter">
				<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['heading'];?>
</ol>
				<ul class="half">
					<li><?php echo $_smarty_tpl->getVariable('lang')->value['page']['price'];?>
<span class="num_price"><?php echo $_smarty_tpl->getVariable('p')->value['price'];?>
</span></li>
					<li><?php echo $_smarty_tpl->getVariable('lang')->value['page']['market'];?>
：<span class="num_market"><?php echo $_smarty_tpl->getVariable('p')->value['market'];?>
</span></li>
				</ul>
				<ul class="half">
					<li><?php echo ((($_smarty_tpl->getVariable('lang')->value['page']['inventory']).($_smarty_tpl->getVariable('p')->value['inventory'])).(' ')).($_smarty_tpl->getVariable('p')->value['units']);?>
</li>
					<li><?php echo ((($_smarty_tpl->getVariable('lang')->value['page']['sales']).($_smarty_tpl->getVariable('p')->value['sales'])).(' ')).($_smarty_tpl->getVariable('p')->value['units']);?>
</li>
				</ul>
				<ul class="half">
					<li><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['model']).($_smarty_tpl->getVariable('p')->value['model']);?>
</li>
					<li><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['speci']).($_smarty_tpl->getVariable('p')->value['speci']);?>
</li>
				</ul>
				<ul class="half">
					<li><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['optional']).($_smarty_tpl->getVariable('p')->value['optional']);?>
</li>
					<li><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['addtime']).($_smarty_tpl->getVariable('p')->value['addtime']);?>
</li>
				</ul>
				<ul class="half">
					<li><?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][0];?>
<?php if ($_smarty_tpl->getVariable('p')->value['status']){?><?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][1];?>
<?php }else{ ?><font color="#FF0000"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][2];?>
</font><?php }?></li>
					<li><?php echo $_smarty_tpl->getVariable('lang')->value['page']['click'];?>
<script type="text/javascript" src="app.php?a=hits&type=1&id=<?php echo $_smarty_tpl->getVariable('p')->value['id'];?>
&show=1"></script></li>
				</ul>
				<ul>
					<li><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['category']).(category::cid2name($_smarty_tpl->getVariable('p')->value['category_id'],' → ',true));?>
</li>
				</ul>
				<ul>
					<li>TAG：<?php echo $_smarty_tpl->getVariable('p')->value['tag'];?>
</li>
				</ul>
			</div>
		</div>
		
		<!-- 详细信息 -->
		<div class="details">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['details'];?>
</ol>
			<ol class="content_common"><?php echo $_smarty_tpl->getVariable('p')->value['content'];?>
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
<?php if ($_smarty_tpl->getVariable('p')->value['data_prev']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('p')->value['data_prev']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value['data_prev']['title'];?>
"><?php echo $_smarty_tpl->getVariable('p')->value['data_prev']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?></ol>
			<ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['similar_next'];?>
<?php if ($_smarty_tpl->getVariable('p')->value['data_next']['title']){?><a href="<?php echo $_smarty_tpl->getVariable('p')->value['data_next']['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value['data_next']['title'];?>
"><?php echo $_smarty_tpl->getVariable('p')->value['data_next']['title'];?>
</a><?php }else{ ?><em>NULL</em><?php }?></ol>
		</div>
		
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
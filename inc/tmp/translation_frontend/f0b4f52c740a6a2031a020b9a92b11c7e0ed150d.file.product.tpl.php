<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:50:06
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304845bd9c11ef35ad4-42677553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0b4f52c740a6a2031a020b9a92b11c7e0ed150d' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/product.tpl',
      1 => 1346786678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304845bd9c11ef35ad4-42677553',
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
style/product.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/script/focus_classic.js"></script>
<script type="text/javascript">
$(function(){mle.focus_classic('focus',3000,1,60);}); // 焦点图
</script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="classify"><?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = category::data(2,$_smarty_tpl->getVariable('mle')->value['channel_id'],0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a><?php if ($_smarty_tpl->tpl_vars['n']->value['next_level']){?>&nbsp;|&nbsp;<?php }?><?php }} ?></div>
<div class="box">
	<div class="frame_side">
		<!-- 焦点图 -->
		<div id="focus">
			<div></div> 
			<ul> 
				<?php $_smarty_tpl->tpl_vars['pic'] = new Smarty_variable(photo::data(0,0,0,0,0,'product_focus'), null, null);?>
				<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pic')->value['picture']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?> <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(explode("\r\n",$_smarty_tpl->getVariable('pic')->value['description'][$_smarty_tpl->tpl_vars['i']->value]), null, null);?> <!-- //// 以换行符为间隔将图片简介转成数组 -->
				<li><a href="<?php echo $_smarty_tpl->getVariable('p')->value[0];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('p')->value[1];?>
" width="278" height="348" /></a></li> 
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
			<input type="hidden" name="type" value="2" />
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
 $_from = tag::data(0,2,50); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		
		<!-- 左侧广告位（278*118px） -->
		<div class="ad_1"><?php echo ad::show('product_1');?>
</div> 
	</div>
	<div class="frame_main">
		
		<!-- 推荐 -->
		<div class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'];?>
</div>
		<div class="recom">
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(product::data(0,20,1,$_smarty_tpl->getVariable('mle')->value['channel_id']), null, null);?>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->getVariable('i')->value<4){ for ($_foo=true;$_smarty_tpl->getVariable('i')->value<4; $_smarty_tpl->tpl_vars['i']->value++){
?>
			<div class="circle">
				<ul class="image">
					<li><?php if ($_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0]!=''){?><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0];?>
" onload="mle.img_auto_size(this)" width="100" height="100" alt="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
" /></a><?php }?></li>
				</ul>
				<ul class="text">
					<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x']->value = 0;
  if ($_smarty_tpl->getVariable('x')->value<5){ for ($_foo=true;$_smarty_tpl->getVariable('x')->value<5; $_smarty_tpl->tpl_vars['x']->value++){
?>
					<li <?php if ($_smarty_tpl->tpl_vars['x']->value==0){?>class="first"<?php }else{ ?>class="routine"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title_format'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
			<?php }} ?>
		</div>
		
		<!-- 间隔 -->
		<div class="interval"></div>

		<!-- 最新 -->
		<div class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['latest'];?>
</div>
		<div class="recom">
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(product::data(1,30,0,$_smarty_tpl->getVariable('mle')->value['channel_id']), null, null);?>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->getVariable('i')->value<6){ for ($_foo=true;$_smarty_tpl->getVariable('i')->value<6; $_smarty_tpl->tpl_vars['i']->value++){
?>
			<div class="circle">
				<ul class="image">
					<li><?php if ($_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0]!=''){?><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0];?>
" onload="mle.img_auto_size(this)" width="100" height="100" alt="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
" /></a><?php }?></li>
				</ul>
				<ul class="text">
					<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x']->value = 0;
  if ($_smarty_tpl->getVariable('x')->value<5){ for ($_foo=true;$_smarty_tpl->getVariable('x')->value<5; $_smarty_tpl->tpl_vars['x']->value++){
?>
					<li <?php if ($_smarty_tpl->tpl_vars['x']->value==0){?>class="first"<?php }else{ ?>class="routine"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title_format'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
			<?php }} ?>
		</div>
		
	</div>
</div>

<!-- 中部通栏广告位（930*100px） -->
<div class="ad_2"><?php echo ad::show('product_2');?>
</div>

<!-- 栏目 -->
<div class="box categories">
	<div class="frame_main">
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = category::data(2,$_smarty_tpl->getVariable('mle')->value['channel_id'],0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
</ol>
			<ol class="more"><a href="<?php echo $_smarty_tpl->tpl_vars['c']->value['URL'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
		</div>
		<div class="recom">
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(product::data(0,10,0,$_smarty_tpl->getVariable('mle')->value['channel_id'],$_smarty_tpl->tpl_vars['c']->value['id']), null, null);?>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->getVariable('i')->value<2){ for ($_foo=true;$_smarty_tpl->getVariable('i')->value<2; $_smarty_tpl->tpl_vars['i']->value++){
?>
			<div class="circle">
				<ul class="image">
					<li><?php if ($_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0]!=''){?><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0];?>
" onload="mle.img_auto_size(this)" width="100" height="100" alt="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
" /></a><?php }?></li>
				</ul>
				<ul class="text">
					<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x']->value = 0;
  if ($_smarty_tpl->getVariable('x')->value<5){ for ($_foo=true;$_smarty_tpl->getVariable('x')->value<5; $_smarty_tpl->tpl_vars['x']->value++){
?>
					<li <?php if ($_smarty_tpl->tpl_vars['x']->value==0){?>class="first"<?php }else{ ?>class="routine"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title_format'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
			<?php }} ?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['c']->value['next_level']!=0){?><div class="interval"></div><?php }?> <!-- 最后一个栏目不显示间隔线 -->
		<?php }} ?>
	</div>
	
	<div class="frame_side">
		<div class="ad_3"><?php echo ad::show('product_3');?>
</div> <!-- 右侧广告位（278*218px） -->
		<!-- 畅销 -->
		<div class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['sell_well'];?>
</div>
		<div class="well">
			<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = product::data(13,10,0,$_smarty_tpl->getVariable('mle')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
?>
			<ol><a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['title_format'];?>
</a> (<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['sold']).($_smarty_tpl->tpl_vars['p']->value['sales']);?>
)</ol>
			<?php }} ?>
		</div>
		
		<!-- 热门 -->
		<div class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['hot'];?>
</div>
		<div class="well">
			<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = product::data(5,10,0,$_smarty_tpl->getVariable('mle')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
?>
			<ol><a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['title_format'];?>
</a> (<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['hits']).($_smarty_tpl->tpl_vars['p']->value['click']);?>
)</ol>
			<?php }} ?>
		</div>
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:48:20
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/component_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87825bd9c0b4a25c98-03899291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4fca2935fb28207c83643af7431271fb39c2a6a' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/component_header.tpl',
      1 => 1371785482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87825bd9c0b4a25c98-03899291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="header box">
	<div class="top">
		<div class="left">
			<ol class="logo"><a href="./"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['logo'];?>
" border="0" /></a></ol>
			<ol class="weather"><?php echo ad::show('weather');?>
</ol>
		</div>
		<div class="right">
			<div class="rtop">
				<ul>
					<li>
						<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 1;
  if ($_smarty_tpl->getVariable('i')->value<=$_smarty_tpl->getVariable('config')->value['lang_total']){ for ($_foo=true;$_smarty_tpl->getVariable('i')->value<=$_smarty_tpl->getVariable('config')->value['lang_total']; $_smarty_tpl->tpl_vars['i']->value++){
?>
						<a href="app.php?a=lang&i=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php if ($_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->tpl_vars['i']->value]['name']!=''){?><?php echo $_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->tpl_vars['i']->value]['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['common']['not_set'];?>
<?php }?></a><?php if ($_smarty_tpl->tpl_vars['i']->value==1){?>（<a title="點擊以繁體中文方式浏覽" id="StranLink" href="javascript:void(0);">繁體</a>）<?php }?> |
						<?php }} ?>
						<!-- 已登录 -->
						<span id="has_login"><a href="member/center.php"><span id="head_login_username"></span><?php echo $_smarty_tpl->getVariable('lang')->value['common']['member_center'];?>
</a> | <a href="member/login.php?action=logout"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['logout'];?>
</a></span>
						<!-- 未曾登录 -->
						<span id="no_login"><a href="<?php echo misc::url('login');?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['login'];?>
</a> |	<a href="<?php echo misc::url('register');?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['register'];?>
</a></span>
					</li>
				</ul>
			</div>
			<div class="rbottom">
				<div class="ad"><?php echo ad::show('header');?>
</div>
				<div class="service">
					<ol class="people"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/services.png" width="146" height="134" /></ol>
					<ol><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/services<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.gif" width="90" height="25" /></ol>
					<ol class="tel"><?php echo $_smarty_tpl->getVariable('web')->value['phone'][0];?>
</ol>
				</div>
			</div>
			
			
			
		</div>
	</div>
	<div class="navigation"> <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = channel::navigation(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?> <a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['n']->value['target'];?>
"<?php if ($_smarty_tpl->getVariable('mle')->value['channel_id']==$_smarty_tpl->tpl_vars['n']->value['id']){?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a> <?php }} ?> </div>
</div>
<script type="text/javascript">
// 已登录
if(mle.getcookie('mlecms_user_login') != ''){$('#no_login').hide(); $('#has_login').show();$('#head_login_username').html(mle.getcookie('mlecms_user_name'));}
// 购物车数量
var count = mle.getcookie('mlecms_cart_sid');
$('#cart_count').html(count == '' ? 0 : (count.split(',')).length);
</script>
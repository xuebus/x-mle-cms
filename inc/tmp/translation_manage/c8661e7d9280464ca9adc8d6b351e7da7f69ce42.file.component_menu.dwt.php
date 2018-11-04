<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:48:48
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/component_menu.dwt" */ ?>
<?php /*%%SmartyHeaderCode:23095bd9c0d0dc2ae3-69582161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8661e7d9280464ca9adc8d6b351e7da7f69ce42' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/component_menu.dwt',
      1 => 1302347098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23095bd9c0d0dc2ae3-69582161',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="frame_side">
	<div class="logo"></div>
	<div class="welcome"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['welcome'];?>
<a href="admin_password.php" class="left_url"><?php echo $_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['username'];?>
</a> , <a target="_blank" href="../?<?php echo time();?>
" class="left_url"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['front'];?>
</a> | <a href="login.php?action=logout" class="left_url"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['exit'];?>
</a></div>
	<div id="menu">
		<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
		<ol>
			<a href="javascript:void(0);" onfocus="this.blur();" class="item"><?php echo $_smarty_tpl->tpl_vars['n']->value['attribute'][1];?>
</a>
			<ul><?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['n']->value['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?><li><a href="<?php echo $_smarty_tpl->tpl_vars['x']->value[3];?>
" onfocus="this.blur();" <?php if ($_smarty_tpl->tpl_vars['x']->value['current']){?>id="current"<?php }?>><?php echo $_smarty_tpl->tpl_vars['x']->value[1];?>
</a></li><?php }} ?></ul>
		</ol>
		<?php }} ?>
	</div>
</div>
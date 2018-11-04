<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:54:43
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/component_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116515bd9c23352f370-92637692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9580bf323b676512d92a6aea03b9e04c14e513be' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/component_article.tpl',
      1 => 1300983134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116515bd9c23352f370-92637692',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="left_head"></div>
<div class="menu_box">
	<ol class="menu_top"></ol>
	<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = category::data(1,$_smarty_tpl->getVariable('mle')->value['channel_id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
	<ol class="menu_middle">
		<?php echo str_repeat('　　',$_smarty_tpl->tpl_vars['n']->value['level']-1);?>

		<?php if ($_smarty_tpl->tpl_vars['n']->value['level']==1){?><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/common.gif" width="9" height="15" />
		<?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/common2.gif" width="9" height="15" /><?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a>
	</ol>
	<?php }} ?>
	<ol class="menu_bottom"></ol>
</div>
<div class="left_footer"></div>
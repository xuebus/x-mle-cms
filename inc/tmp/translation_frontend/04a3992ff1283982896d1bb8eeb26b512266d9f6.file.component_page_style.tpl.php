<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:50:15
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/component_page_style.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134165bd9c127da7794-53970664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04a3992ff1283982896d1bb8eeb26b512266d9f6' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/component_page_style.tpl',
      1 => 1369992894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134165bd9c127da7794-53970664',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('page_data')->value['total_page']>1){?>
<table class="page_style" align="center" cellpadding="0" cellspacing="0"><tr>
	<?php if ($_smarty_tpl->getVariable('page_data')->value['page']>1){?>
	<td class="effective"><a href="<?php echo $_smarty_tpl->getVariable('page_data')->value['start_url'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['start'];?>
</a></td>
	<td class="space"></td>
	<td class="effective"><a href="<?php echo $_smarty_tpl->getVariable('page_data')->value['first_url'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['first'];?>
</a></td>
	<?php }else{ ?>
	<td class="invalid"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['start'];?>
</td>
	<td class="space"></td>
	<td class="invalid"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['first'];?>
</td>
	<?php }?>
	<td class="space"></td>
	<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('page_data')->value['number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['i']->value!=$_smarty_tpl->getVariable('page_data')->value['page']){?><td class="numeric"><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></td>
		<?php }else{ ?><td class="numeric current"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td><?php }?>
		<td class="space"></td>
	<?php }} ?>	
	<?php if ($_smarty_tpl->getVariable('page_data')->value['page']<$_smarty_tpl->getVariable('page_data')->value['total_page']){?>
	<td class="effective"><a href="<?php echo $_smarty_tpl->getVariable('page_data')->value['next_url'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['next'];?>
</a></td>
	<td class="space"></td>
	<td class="effective"><a href="<?php echo $_smarty_tpl->getVariable('page_data')->value['end_url'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['end'];?>
</a></td>
	<?php }else{ ?>
	<td class="invalid"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['next'];?>
</td>
	<td class="space"></td>
	<td class="invalid"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['end'];?>
</td>
	<?php }?>
</tr></table>
<?php }?>
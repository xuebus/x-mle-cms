<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:48:48
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/component_header.dwt" */ ?>
<?php /*%%SmartyHeaderCode:195805bd9c0d0c77b75-77778248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a935ef5e62dc09e04799498bf768e99d94c0474' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/component_header.dwt',
      1 => 1302271402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195805bd9c0d0c77b75-77778248',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="height:60px; overflow:hidden">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="header">
	<tr>
		<td width="5"></td>
		<td>
			<a href="javascript:mle.switchbar();" onfocus="this.blur();" class="button" id="switch"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['close_menu'];?>
</a>
			<a href="javascript:void(0);" onfocus="this.blur();" class="button" id="menu_option"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['down_menu'];?>
</a>
			<?php if ($_smarty_tpl->getVariable('config')->value['lang_total']>1){?><a href="javascript:void(0);" onfocus="this.blur();" class="button" id="lang_button"><?php if ($_smarty_tpl->getVariable('web')->value['name']!=''){?><?php echo $_smarty_tpl->getVariable('web')->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['common']['not_set'];?>
<?php }?></a><?php }?>

			<span class="top_menu options">
				<a href="../" target="_blank"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['front_page'];?>
</a>
				<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['back_home'];?>
</a>
				<a href="app.php?a=cache"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['empty_cache'];?>
</a>
				<a href="app.php?a=compile"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['empty_compile'];?>
</a>
				<a href="admin_password.php"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['change_password'];?>
</a>
				<a href="login.php?action=logout"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['logout'];?>
</a>
			</span>
			<span class="top_menu" id="lang_menu">
				<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 1;
  if ($_smarty_tpl->getVariable('i')->value<=$_smarty_tpl->getVariable('config')->value['lang_total']){ for ($_foo=true;$_smarty_tpl->getVariable('i')->value<=$_smarty_tpl->getVariable('config')->value['lang_total']; $_smarty_tpl->tpl_vars['i']->value++){
?><a href="app.php?a=lang&i=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php if ($_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->tpl_vars['i']->value]['name']!=''){?><?php echo $_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->tpl_vars['i']->value]['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['common']['not_set'];?>
<?php }?></a><?php }} ?>
			</span>		</td>
		<td class="right">
			<a href="app.php?a=switch&theme=blue" title="<?php echo $_smarty_tpl->getVariable('lang')->value['common']['switch_theme'];?>
" class="<?php if ($_smarty_tpl->getVariable('admin')->value['theme']!='blue'){?>blue_a<?php }else{ ?>blue_b<?php }?>"></a>
			<a href="app.php?a=switch&theme=gray" title="<?php echo $_smarty_tpl->getVariable('lang')->value['common']['switch_theme'];?>
" class="<?php if ($_smarty_tpl->getVariable('admin')->value['theme']!='gray'){?>gray_a<?php }else{ ?>gray_b<?php }?>"></a>
			<a href="app.php?a=switch&theme=red" title="<?php echo $_smarty_tpl->getVariable('lang')->value['common']['switch_theme'];?>
" class="<?php if ($_smarty_tpl->getVariable('admin')->value['theme']!='red'){?>red_a<?php }else{ ?>red_b<?php }?>"></a>
			<a href="app.php?a=switch&theme=green" title="<?php echo $_smarty_tpl->getVariable('lang')->value['common']['switch_theme'];?>
" class="<?php if ($_smarty_tpl->getVariable('admin')->value['theme']!='green'){?>green_a<?php }else{ ?>green_b<?php }?>"></a>
		</td>
	</tr>
</table>
</div>
<?php $_template = new Smarty_Internal_Template('component_menu.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
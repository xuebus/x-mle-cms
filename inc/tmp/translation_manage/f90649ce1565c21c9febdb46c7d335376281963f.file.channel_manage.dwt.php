<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:49:09
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/channel_manage.dwt" */ ?>
<?php /*%%SmartyHeaderCode:46295bd9c0e53b4bf6-40225493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90649ce1565c21c9febdb46c7d335376281963f' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/channel_manage.dwt',
      1 => 1297370482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46295bd9c0e53b4bf6-40225493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('lang')->value['common']['web_title'];?>
 - Powered by mlecms</title>
<link rel="stylesheet" type="text/css" href="../inc/templates/manage/css/common_<?php echo $_smarty_tpl->getVariable('admin')->value['theme'];?>
.css" />
<script type="text/javascript" src="../inc/script/jquery.js"></script>
<script type="text/javascript" src="../inc/templates/manage/js/common.js"></script>
<script type="text/javascript">
$(function(){mle.alternately('list');});
</script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div id="body_box">
	<table cellpadding="0" cellspacing="0" border="0" class="icon">
		<tr><td><?php echo $_smarty_tpl->getVariable('mle')->value['icon'];?>
</td></tr>
	</table>
	<div class="rounded table">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="box_top">
			<tr><td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['title_lang'];?>
</td></tr>
		</table>
		
		<table class="list td_align" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="field_head" width="50"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['head'][0];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['head'][1];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['head'][2];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['head'][3];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['head'][4];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['head'][5];?>
</td>
			</tr>		
			<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['channel_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['n']->value['permission']!='0'){?> <img title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['restricted'];?>
" src="../inc/templates/manage/images/operation/lock.png" width="16" height="16"><?php }?></td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['modname'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['show_text'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['sort'];?>
</td>
				<td class="operation">
					<a href="channel_update.php?id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/pencil.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][0];?>
"></a>
					<a href="channel_manage.php?del=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" onclick="return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['remove_channel'];?>
');"><img src="../inc/templates/manage/images/operation/delete.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][1];?>
"></a>
					<?php if ($_smarty_tpl->tpl_vars['n']->value['module']=='MO001x'){?><a href="article_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][2];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['module']=='MO002x'){?><a href="product_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][3];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['module']=='MO003x'){?><a href="picture_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][4];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['module']=='MO004x'){?><a href="download_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][5];?>
"></a>
					<?php }else{ ?><img src="../inc/templates/manage/images/operation/disabled.png"><?php }?>
				</td>
			</tr>
			<?php }} else { ?><tr><td colspan="6" class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['no_data'];?>
</td></tr>
			<?php } ?>
		</table>
		<?php if ($_smarty_tpl->getVariable('admin')->value['attention']){?><div class="attention rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['attention'];?>
</div><?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
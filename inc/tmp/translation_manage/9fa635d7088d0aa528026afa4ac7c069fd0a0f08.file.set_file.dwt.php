<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:59:23
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/set_file.dwt" */ ?>
<?php /*%%SmartyHeaderCode:196425bd9c34bba2563-32765443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fa635d7088d0aa528026afa4ac7c069fd0a0f08' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/set_file.dwt',
      1 => 1297370482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196425bd9c34bba2563-32765443',
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
function showrow(i){
	if($('.son'+i).css('display') == 'none'){
		$('.list tr').not($('.father,.nothide')).hide();
		$('.son'+i).fadeIn(800);
	} else {
		$('.son'+i).hide();
	}
}
$(function(){
	mle.title2div('title2div');
	mle.alternately('list');
	mle.keysubmit('afc','keysubmit',true);
	$('.list .son0').fadeIn(800);
	$('.father,.nothide').show();
});
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
			<tr>
				<td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['page_setup'];?>
</td>
				<td>
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>	
	
		<form name="afc" action="" id="afc" method="post">
		<table class="list td_align" cellpadding="0" cellspacing="1" border="0">
			<tr class="nothide">
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template_name'];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['is_open'];?>
<img src="../inc/templates/manage/images/operation/help.png" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][0];?>
" width="16" height="16" /></td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['icon_file'];?>
<img src="../inc/templates/manage/images/operation/help.png" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][2];?>
" width="16" height="16" /></td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['file_name'];?>
<img src="../inc/templates/manage/images/operation/help.png" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][3];?>
" width="16" height="16" /></td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['menu_display'];?>
<img src="../inc/templates/manage/images/operation/help.png" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][4];?>
" width="16" height="16" /></td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['purviews'];?>
<img src="../inc/templates/manage/images/operation/help.png" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][5];?>
" width="16" height="16" /></td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['sort'];?>
<img src="../inc/templates/manage/images/operation/help.png" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][6];?>
" width="16" height="16" /></td>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['afc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
			<tr class="father">
				<td style="text-align:left;"><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][attribute][1]" size="15" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['attribute'][1];?>
" /> <a href="javascript:showrow(<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
);"><img src="../inc/templates/manage/images/go_down.png" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][7];?>
" border="0" width="16" height="16" /></a></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][attribute][0]" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['n']->value['attribute'][0]==1){?>checked="checked"<?php }?> /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][attribute][2]" size="10" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['attribute'][2];?>
" /></td>
				<td><img src="../inc/templates/manage/images/operation/disabled.png" /></td>
				<td><img src="../inc/templates/manage/images/operation/disabled.png" /></td>
				<td><img src="../inc/templates/manage/images/operation/disabled.png" /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][attribute][3]" size="2" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['attribute'][3];?>
" /></td>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['n2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['n']->value['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n2']->key => $_smarty_tpl->tpl_vars['n2']->value){
 $_smarty_tpl->tpl_vars['i2']->value = $_smarty_tpl->tpl_vars['n2']->key;
?>
			<tr class="son<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="display:none;">
				<td style="padding:0 0 0 80px; text-align:left;"><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][submenu][<?php echo $_smarty_tpl->tpl_vars['i2']->value;?>
][1]" size="15" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n2']->value[1];?>
" /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][submenu][<?php echo $_smarty_tpl->tpl_vars['i2']->value;?>
][0]" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['n2']->value[0]==1){?>checked="checked"<?php }?> /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][submenu][<?php echo $_smarty_tpl->tpl_vars['i2']->value;?>
][2]" size="10" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n2']->value[2];?>
" /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][submenu][<?php echo $_smarty_tpl->tpl_vars['i2']->value;?>
][3]" size="15" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n2']->value[3];?>
" /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][submenu][<?php echo $_smarty_tpl->tpl_vars['i2']->value;?>
][4]" size="2" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n2']->value[4];?>
" /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][submenu][<?php echo $_smarty_tpl->tpl_vars['i2']->value;?>
][5]" size="2" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n2']->value[5];?>
" /></td>
				<td><input name="afcs[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][submenu][<?php echo $_smarty_tpl->tpl_vars['i2']->value;?>
][6]" size="2" type="text" class="input rounded" value="<?php echo $_smarty_tpl->tpl_vars['n2']->value[6];?>
" /></td>
			</tr>	
			<?php }} ?><?php }} ?>
		</table>
		<table class="table">
			<tr>
				<td align="right" height="60"><a id="keysubmit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"></td>
				<td><a class="submit reset" href="javascript:afc.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
</a></td>
			</tr>
		</table>
		</form>
		<?php echo $_smarty_tpl->getVariable('mle')->value['page'];?>

		<?php if ($_smarty_tpl->getVariable('admin')->value['information']){?><div class="information rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['notes'];?>
</div><?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 23:04:15
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/template_update.dwt" */ ?>
<?php /*%%SmartyHeaderCode:294145bd9c46fe21fe9-31254105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea2d49f34ea6b99dcc3d7e4364c53335c73b990a' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/template_update.dwt',
      1 => 1297370482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294145bd9c46fe21fe9-31254105',
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
$(function(){
	mle.alternately('file_list');
	mle.keysubmit('form','submit',true);
});
</script>
<style type="text/css">
textarea{width:96%; height:800px; border:1px #999 solid; color:#093; padding:5px; font-size:13px; font-family:'新宋体','宋体';}
.frame{margin:10px auto; width:98%;}
.frame_right{border-right:1px solid #666;}
.file_list td{height:25px;}
.file_list a{color:#F60;}
.file_list a:hover{color:#000;}
.field_head{border-bottom:1px solid #666;}
.path{color:#090; font-size:13px;}
</style>
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
				<td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][0];?>
</td>
				<td>
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][1];?>
</td>
							<td>
								<select class="select rounded" onChange="window.open(this.options[this.selectedIndex].value,'_self')" size="1">
								<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['template_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
								<?php if ($_smarty_tpl->getVariable('mle')->value['dir']==$_smarty_tpl->tpl_vars['n']->value['dir']){?>
								<option value="template_update.php?dir=<?php echo $_smarty_tpl->tpl_vars['n']->value['dir'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</option>
								<?php $_smarty_tpl->tpl_vars['template_title_tmp'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value['name'], null, null);?>
								<?php }else{ ?>
								<option value="template_update.php?dir=<?php echo $_smarty_tpl->tpl_vars['n']->value['dir'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</option>
								<?php }?>
								<?php }} ?>
								</select>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		<form action="" method="post" name="form" id="form">
		<table cellpadding="0" class="frame" cellspacing="0" border="0">
			<tr>
				<td class="field_head frame_right" height="30"><?php echo $_smarty_tpl->getVariable('template_title_tmp')->value;?>
 - <?php echo $_smarty_tpl->getVariable('lang')->value['page'][4];?>
</td>
				<td class="field_head"><?php if ($_smarty_tpl->getVariable('mle')->value['file_title']!=''){?><?php echo $_smarty_tpl->getVariable('mle')->value['file_title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][5];?>
<?php }?> - <?php echo $_smarty_tpl->getVariable('mle')->value['file_name'];?>
</td>
			</tr>
			<tr><td height="10" class="frame_right"></td><td>&nbsp;</td></tr>
			<tr>
				<td rowspan="3" class="frame_right" valign="top" width="300">
					<table class="file_list" cellpadding="0" width="290" cellspacing="0" border="0">
					<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['file_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
					<tr>
						<td align="right" <?php if ($_smarty_tpl->getVariable('mle')->value['file_name']==$_smarty_tpl->tpl_vars['n']->value[0]){?>class="b red"<?php }?>><?php if ($_smarty_tpl->tpl_vars['n']->value[1]!=''){?><?php echo $_smarty_tpl->tpl_vars['n']->value[1];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][5];?>
<?php }?>：</td>
						<td><a href="template_update.php?dir=<?php echo $_smarty_tpl->getVariable('mle')->value['dir'];?>
&file=<?php echo $_smarty_tpl->tpl_vars['n']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value[0];?>
</a></td>
					</tr>					
					<?php }} ?>
					</table>
				</td>
				<td align="center">
					<table cellpadding="0" cellspacing="0" border="0" width="96%">
						<tr>
							<td></td>
							<td align="right"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][6];?>
<span class="path">inc/templates/frontend/<?php echo $_smarty_tpl->getVariable('mle')->value['dir'];?>
/<?php echo $_smarty_tpl->getVariable('mle')->value['file_name'];?>
</span></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top"><textarea name="code" wrap="off" class="rounded"><?php echo $_smarty_tpl->getVariable('mle')->value['file_code'];?>
</textarea></td>
			</tr>
			<tr>
				<td valign="top">
					<table class="table">
						<tr>
							<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
							<td width="80"></td>
							<td><a class="submit reset" href="javascript:form.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
</a></td>
							</tr>
						</table>				
				</td>
			</tr>
		</table>
		</form>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
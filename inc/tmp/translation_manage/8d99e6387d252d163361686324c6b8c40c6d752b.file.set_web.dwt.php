<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:59:48
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/set_web.dwt" */ ?>
<?php /*%%SmartyHeaderCode:235925bd9c3642eefa4-05823525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d99e6387d252d163361686324c6b8c40c6d752b' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/set_web.dwt',
      1 => 1302487440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235925bd9c3642eefa4-05823525',
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
	mle.alternately('list');
	mle.title2div('title2div');	
	mle.keysubmit('form_globals','submit',true);
});
</script>
<style type="text/css">
.logo ol{float:left; padding:0 5px 0 0; height:30px;}
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
				<td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['title_lang'];?>
</td>
			</tr>
		</table>
		<form name="form_globals" id="form_globals" action="" method="post" enctype="multipart/form-data">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['name'];?>
</td>
				<td>
					<input type="text" name="name" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['name'];?>
" size="20" />
				</td>
				<td class="field">{:$web['name']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['dir'];?>
</td>
				<td>
					<select name="dir" class="select rounded">
						<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['lang_dir']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
						<?php if ($_smarty_tpl->getVariable('web')->value['dir']==$_smarty_tpl->tpl_vars['n']->value){?><option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</option>
						<?php }else{ ?><option value="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</option><?php }?>
						<?php }} ?>
					</select>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['dir_title'];?>
">					
				</td>
				<td class="field">{:$web['dir']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template'];?>
</td>
				<td>
					<select name="template" class="select rounded">
						<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['template_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
						<option <?php if ($_smarty_tpl->getVariable('web')->value['template']==$_smarty_tpl->tpl_vars['n']->value['dir']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['n']->value['dir'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['n']->value['dir'];?>
</option>
						<?php }} ?>
					</select>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template_title'];?>
">					
				</td>
				<td class="field">{:$web['dir']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['static'];?>
</td>
				<td>
					<input type="text" name="static" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['static'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['static_title'];?>
">					
				</td>
				<td class="field">{:$web['static']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['webtitle'];?>
</td>
				<td>
					<input type="text" name="title" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['title'];?>
" size="40" />
				</td>
				<td class="field">{:$web['title']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['logo'];?>
</td>
				<td>
					<div class="logo">
					<ol><img src="../inc/templates/manage/images/operation/picture.png" width="16" height="16" border="0" class="title2div" title="<img width='200' border='0' src='../<?php echo $_smarty_tpl->getVariable('web')->value['logo'];?>
' />"></ol>
					<ol><input type="text" name="logo" id="logo" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['logo'];?>
" size="20" /></ol>
					<ol><iframe src="upload.php?dir=other&preview=upload_preview&return_id=logo" width="183" height="30" border="0" scrolling="no" frameborder="0"></iframe></ol>
					</div>				
				</td>
				<td class="field"><div id="upload_preview">{:$web['logo']:}</div></td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword'];?>
</td>
				<td>
					<input type="text" name="keyword" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['keyword'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword_title'];?>
">					
				</td>
				<td class="field">{:$web['keyword']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['description'];?>
</td>
				<td>
					<textarea name="description" class="rounded" style="padding:5px;" rows="3" cols="40"><?php echo $_smarty_tpl->getVariable('web')->value['description'];?>
</textarea>
				</td>
				<td class="field">{:$web['description']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['copyright'];?>
</td>
				<td>
					<textarea name="copyright" class="rounded" style="padding:5px;" rows="3" cols="40"><?php echo $_smarty_tpl->getVariable('web')->value['copyright'];?>
</textarea>
				</td>
				<td class="field">{:$web['copyright']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['email'];?>
</td>
				<td>
					<input type="text" name="email" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->getVariable('web')->value['lang']]['email'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['email_title'];?>
">					
				</td>
				<td class="field">{:$web['email'][n]:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['qq'];?>
</td>
				<td>
					<input type="text" name="qq" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->getVariable('web')->value['lang']]['qq'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['qq_title'];?>
">					
				</td>
				<td class="field">{:$web['qq'][n]:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['msn'];?>
</td>
				<td>
					<input type="text" name="msn" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->getVariable('web')->value['lang']]['msn'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msn_title'];?>
">					
				</td>
				<td class="field">{:$web['msn'][n]:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['phone'];?>
</td>
				<td>
					<input type="text" name="phone" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->getVariable('web')->value['lang']]['phone'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['phone_title'];?>
">					
				</td>
				<td class="field">{:$web['phone'][n]:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fax'];?>
</td>
				<td>
					<input type="text" name="fax" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['all_data'][$_smarty_tpl->getVariable('web')->value['lang']]['fax'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['fax_title'];?>
">					
				</td>
				<td class="field">{:$web['fax'][n]:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['address'];?>
</td>
				<td>
					<input type="text" name="address" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('web')->value['address'];?>
" size="40" />
				</td>
				<td class="field">{:$web['address']:}</td>
			</tr>
		</table>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"></td>
				<td><a class="submit reset" href="javascript:form_globals.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
</a></td>
			</tr>
		</table>
		</form>		
		<?php if ($_smarty_tpl->getVariable('admin')->value['attention']){?><div class="attention rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['attention'][0];?>
</div><?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:52:43
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/set_globals.dwt" */ ?>
<?php /*%%SmartyHeaderCode:188685bd9c1bbcfdb43-02697829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'deb788866361e54f4a154b35530cc1a13f7babb1' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/set_globals.dwt',
      1 => 1302485812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188685bd9c1bbcfdb43-02697829',
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
	<?php if ($_smarty_tpl->getVariable('config')->value['mail']['mailer']!='smtp'&&$_smarty_tpl->getVariable('config')->value['mail']['mailer']!='gmail'){?>$('.smtp').hide();<?php }?> 
	$('#mailer').change(function(){if($(this).val() != 'smtp' && $(this).val() != 'gmail'){$('.smtp').hide();} else {$('.smtp').show();}});
	<?php if ($_smarty_tpl->getVariable('mle')->value['get']['tip']){?>$('.<?php echo $_smarty_tpl->getVariable('mle')->value['get']['tip'];?>
').css({'border':'2px #F00 solid','background':'#FEE7E0'});<?php }?> 
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
				<td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
</td>
			</tr>
		</table>		
		<form name="form_globals" id="form_globals" action="" method="post">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['debugging'][0];?>
</td>
				<td>
					<input name="debugging" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['debugging']==0){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['debugging'][1];?>
 &nbsp; &nbsp;
					<input name="debugging" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['debugging']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['debugging'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['debugging_title'];?>
">				
				</td>
				<td class="field">{:$config['debugging']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['static'][0];?>
</td>
				<td>
					<input name="static" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['static']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['static'][1];?>
 &nbsp; &nbsp;
					<input name="static" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('config')->value['static']==2){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['static'][2];?>
 &nbsp;&nbsp;
					<input name="static" type="radio" value="3" <?php if ($_smarty_tpl->getVariable('config')->value['static']==3){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['static'][3];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['static_title'];?>
">				
				</td>
				<td class="field">{:$config['static']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['url'];?>
</td>
				<td>
					<input type="text" name="url" class="input rounded url" value="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['config_title'];?>
">				
				</td>
				<td class="field">{:$config['url']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</td>
				<td>
					<input type="text" name="home" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['home'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['home_title'];?>
">					
				</td>
				<td class="field">{:$config['home']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['lang_total'];?>
</td>
				<td>
					<input type="text" name="lang_total" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['lang_total'];?>
" size="6" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['lang_total_title'];?>
">
				</td>
				<td class="field">{:$config['lang_total']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['lang_default'];?>
</td>
				<td>
					<select name="lang_default" class="select rounded">
					<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('web')->value['all_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['n']->value['lang'];?>
" <?php if ($_smarty_tpl->getVariable('config')->value['lang_default']==$_smarty_tpl->tpl_vars['n']->value['lang']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</option>
					<?php }} ?>
					</select>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['lang_default_title'];?>
">
				</td>
				<td class="field">{:$config['lang_default']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][0];?>
</td>
				<td>
					<input name="status" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['status']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][1];?>
 &nbsp; &nbsp;
					<input name="status" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['status']==0){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['status_title'];?>
">				
				</td>
				<td class="field">{:$config['status']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['admin_dir'];?>
</td>
				<td>
					<input type="text" name="admin_dir" class="input rounded admin_dir" value="<?php echo $_smarty_tpl->getVariable('config')->value['admin_dir'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['admin_dir_title'];?>
">					
				</td>
				<td class="field">{:$config['admin_dir']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['maintenance'];?>
</td>
				<td>
					<textarea name="maintenance" class="rounded" style="padding:5px;" rows="3" cols="40"><?php echo $_smarty_tpl->getVariable('config')->value['maintenance'];?>
</textarea>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['maintenance_title'];?>
">				
				</td>
				<td class="field">{:$config['maintenance']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['zone'];?>
</td>
				<td>
					<input type="text" name="zone" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['zone'];?>
" size="6" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['zone_title'];?>
">				
				</td>
				<td class="field">{:$config['zone']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['icp'];?>
</td>
				<td>
					<input type="text" name="icp" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['icp'];?>
" size="40" />
				</td>
				<td class="field">{:$config['icp']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['traffic_statistics'];?>
</td>
				<td>
					<textarea name="traffic_statistics" class="rounded" style="padding:5px;" rows="3" cols="40"><?php echo $_smarty_tpl->getVariable('config')->value['traffic_statistics'];?>
</textarea>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['traffic_statistics_title'];?>
">				
				</td>
				<td class="field">{:$config['traffic_statistics']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['guestbook_show'][0];?>
</td>
				<td>
					<input name="guestbook_show" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['guestbook_show']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['guestbook_show'][1];?>
 &nbsp; &nbsp;
					<input name="guestbook_show" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['guestbook_show']==0){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['guestbook_show'][2];?>

				</td>
				<td class="field">{:$config['guestbook_show']:}</td>
			</tr>
<!-- template **********************************************************************************-->
			<tr class="td_top_line">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['caching'][0];?>
</td>
				<td>
					<input name="template[caching]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['template']['caching']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['caching'][1];?>
 &nbsp; &nbsp;
					<input name="template[caching]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['template']['caching']==0){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['caching'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['caching_title'];?>
">				
				</td>
				<td class="field">{:$config['template']['caching']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['cache_lifetime'][0];?>
</td>
				<td>
					<input type="text" name="template[cache_lifetime]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['template']['cache_lifetime'];?>
" size="6" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['cache_lifetime_title'];?>
">				
				</td>
				<td class="field">{:$config['template']['cache_lifetime']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['auto_clear_caching'][0];?>
</td>
				<td>
					<input name="template[auto_clear_caching]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['template']['auto_clear_caching']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['auto_clear_caching'][1];?>
 &nbsp; &nbsp;
					<input name="template[auto_clear_caching]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['template']['auto_clear_caching']==0){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['auto_clear_caching'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['auto_clear_caching_title'];?>
">				
				</td>
				<td class="field">{:$config['template']['auto_clear_caching']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['force_compile'][0];?>
</td>
				<td>
					<input name="template[force_compile]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['template']['force_compile']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['force_compile'][1];?>
 &nbsp; &nbsp;
					<input name="template[force_compile]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['template']['force_compile']==0){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['force_compile'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['force_compile_title'];?>
">				
				</td>
				<td class="field">{:$config['template']['force_compile']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['customize_page'];?>
</td>
				<td>
					<input type="text" name="template[customize_page]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['template']['customize_page'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template']['customize_page_title'];?>
">				
				</td>
				<td class="field">{:$config['template']['customize_page']:}</td>
			</tr>
			
<!-- upload **********************************************************************************-->
			<tr class="td_top_line">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['type'];?>
</td>
				<td>
					<input type="text" name="upload[type]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['upload']['type'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['type_title'];?>
">				
				</td>
				<td class="field">{:$config['upload']['type']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['max_annex'];?>
</td>
				<td>
					<input type="text" name="upload[max_annex]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['upload']['max_annex'];?>
" size="10" /> KB 
				</td>
				<td class="field">{:$config['upload']['max_annex']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['max_picture'];?>
</td>
				<td>
					<input type="text" name="upload[max_picture]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['upload']['max_picture'];?>
" size="10" /> KB 
				</td>
				<td class="field">{:$config['upload']['max_picture']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['date_dir'][0];?>
</td>
				<td>
					<input name="upload[date_dir]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['upload']['date_dir']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['date_dir'][1];?>
 &nbsp;&nbsp;&nbsp; 
					<input name="upload[date_dir]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['upload']['date_dir']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['date_dir'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['date_dir_title'];?>
">				
				</td>
				<td class="field">{:$config['upload']['date_dir']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['naming'][0];?>
</td>
				<td>
					<select name="upload[naming]" class="select rounded">
						<option value="0" <?php if ($_smarty_tpl->getVariable('config')->value['upload']['naming']==0){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['naming'][1];?>
</option>
						<option value="1" <?php if ($_smarty_tpl->getVariable('config')->value['upload']['naming']==1){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['naming'][2];?>
</option>
						<option value="2" <?php if ($_smarty_tpl->getVariable('config')->value['upload']['naming']==2){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['naming'][3];?>
</option>
					</select>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload']['naming_title'];?>
">				
				</td>
				<td class="field">{:$config['upload']['naming']:}</td>
			</tr>
<!-- mail **********************************************************************************-->
			<tr class="td_top_line">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['mailer'][0];?>
</td>
				<td>
					<select name="mail[mailer]" class="select rounded" id="mailer">
						<option value="smtp" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['mailer']=='smtp'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['mailer'][1];?>
</option>
						<option value="mail" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['mailer']=='mail'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['mailer'][2];?>
</option>
						<option value="sendmail" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['mailer']=='sendmail'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['mailer'][3];?>
</option>
						<option value="gmail" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['mailer']=='gmail'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['mailer'][4];?>
</option>
					</select>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['title'];?>
">				
				</td>
				<td class="field">{:$config['mail']['mailer']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['frommail'];?>
</td>
				<td>
					<input type="text" name="mail[frommail]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['mail']['frommail'];?>
" size="40" />
				</td>
				<td class="field">{:$config['mail']['frommail']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['fromname'];?>
</td>
				<td>
					<input type="text" name="mail[fromname]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['mail']['fromname'];?>
" size="40" />
				</td>
				<td class="field">{:$config['mail']['fromname']:}</td>
			</tr>
			<tr class="smtp">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['smtphost'];?>
</td>
				<td>
					<input type="text" name="mail[smtphost]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['mail']['smtphost'];?>
" size="40" />
				</td>
				<td class="field">{:$config['mail']['smtphost']:}</td>
			</tr>
			<tr class="smtp">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['smptport'];?>
</td>
				<td>
					<input type="text" name="mail[smptport]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['mail']['smptport'];?>
" size="10" />
				</td>
				<td class="field">{:$config['mail']['smptport']:}</td>
			</tr>
			<tr class="smtp">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['smtpauth'][0];?>
</td>
				<td>
					<input name="mail[smtpauth]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['smtpauth']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['smtpauth'][1];?>
 &nbsp;&nbsp;&nbsp; 
					<input name="mail[smtpauth]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['smtpauth']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['smtpauth'][2];?>
			
				</td>
				<td class="field">{:$config['mail']['smtpauth']:}</td>
			</tr>
			<tr class="smtp">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['smtpuser'];?>
</td>
				<td>
					<input type="text" name="mail[smtpuser]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['mail']['smtpuser'];?>
" size="40" />
				</td>
				<td class="field">{:$config['mail']['smtpuser']:}</td>
			</tr>
			<tr class="smtp">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['smtppass'];?>
</td>
				<td>
					<input type="password" name="mail[smtppass]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['mail']['smtppass'];?>
" size="40" />
				</td>
				<td class="field">{:$config['mail']['smtppass']:}</td>
			</tr>
			<tr class="gmail smtp">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['starttls'];?>
</td>
				<td>
					<select name="mail[starttls]" class="select rounded">
						<option value="" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['starttls']==''){?>selected="selected"<?php }?>>NONE</option>
						<option value="ssl" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['starttls']=='ssl'){?>selected="selected"<?php }?>>SSL</option>
						<option value="tls" <?php if ($_smarty_tpl->getVariable('config')->value['mail']['starttls']=='tls'){?>selected="selected"<?php }?>>TLS</option>
					</select>
				</td>
				<td class="field">{:$config['mail']['starttls']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['test'][0];?>
</td>
				<td>
					<input name="mail[istest]" type="checkbox" value="1" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['test'][1];?>

					<input type="text" name="mail[testaddress]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['mail']['testaddress'];?>
" size="20" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['mail']['test'][2];?>
">				
				</td>
				<td class="field"><em>NULL</em></td>				
			</tr>
<!-- ftp **********************************************************************************-->
			<tr class="td_top_line">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['enable'][0];?>
</td>
				<td>
					<input name="ftp[enable]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['ftp']['enable']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['enable'][1];?>
 &nbsp;&nbsp;&nbsp; 
					<input name="ftp[enable]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('config')->value['ftp']['enable']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['enable'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['title'];?>
">				
				</td>
				<td class="field">{:$config['ftp']['enable']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['host'];?>
</td>
				<td>
					<input type="text" name="ftp[host]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['ftp']['host'];?>
" size="40" />
				</td>
				<td class="field">{:$config['ftp']['host']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['port'];?>
</td>
				<td>
					<input type="text" name="ftp[port]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['ftp']['port'];?>
" size="10" />
				</td>
				<td class="field">{:$config['ftp']['port']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['user'];?>
</td>
				<td>
					<input type="text" name="ftp[user]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['ftp']['user'];?>
" size="40" />
				</td>
				<td class="field">{:$config['ftp']['user']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['pwd'];?>
</td>
				<td>
					<input type="password" name="ftp[pwd]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['ftp']['pwd'];?>
" size="40" />
				</td>
				<td class="field">{:$config['ftp']['pwd']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['ftp']['root'];?>
</td>
				<td>
					<input type="text" name="ftp[root]" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('config')->value['ftp']['root'];?>
" size="40" />
				</td>
				<td class="field">{:$config['ftp']['root']:}</td>
			</tr>			
		</table>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"></td>
				<td><a class="submit reset" href="javascript:category.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
</a></td>
			</tr>
		</table>		
		</form>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
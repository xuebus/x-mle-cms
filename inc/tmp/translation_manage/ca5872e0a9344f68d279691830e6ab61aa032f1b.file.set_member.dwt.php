<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:59:45
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/set_member.dwt" */ ?>
<?php /*%%SmartyHeaderCode:149235bd9c3612b6a53-50481549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca5872e0a9344f68d279691830e6ab61aa032f1b' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/set_member.dwt',
      1 => 1337140994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149235bd9c3612b6a53-50481549',
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
<script type="text/javascript" src="../inc/script/color_select.js"></script>
<script type="text/javascript">
$(function(){
	mle.alternately('list');
	mle.title2div('title2div');	
	mle.keysubmit('form_member','submit',true);
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
				<td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][0];?>
</td>
			</tr>
		</table>
		
		<form name="form_member" id="form_member" action="" method="post">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][1];?>
</td>
				<td>
					<input name="allow_reg" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['allow_reg']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][2];?>
 &nbsp;&nbsp;&nbsp;
					<input name="allow_reg" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['allow_reg']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][3];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][4];?>
">				
				</td>
				<td class="field">{:$member['allow_reg']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][5];?>
</td>
				<td>
					<input name="register_audit" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['register_audit']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][6];?>
 &nbsp;&nbsp;&nbsp;
					<input name="register_audit" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['register_audit']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][7];?>
 &nbsp;&nbsp;&nbsp;
					<input name="register_audit" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['register_audit']==2){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][8];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][9];?>
">				
				</td>
				<td class="field">{:$member['register_audit']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][10];?>
</td>
				<td>
					<input name="username_strictly" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['username_strictly']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][11];?>
 &nbsp;&nbsp;&nbsp;
					<input name="username_strictly" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['username_strictly']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][12];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][13];?>
">				
				</td>
				<td class="field">{:$member['username_strictly']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][14];?>
</td>
				<td>
					<input name="disable" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['disable'];?>
" size="40" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][15];?>
">				
				</td>
				<td class="field">{:$member['disable']:}</td>
			</tr>
			<tr class="td_top_line">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][16];?>
</td>
				<td>
					<input name="search_open" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['search_open']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][17];?>
 &nbsp;&nbsp;&nbsp;
					<input name="search_open" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['search_open']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][18];?>
 &nbsp;&nbsp;&nbsp;
					<input name="search_open" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['search_open']==2){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][19];?>

				</td>
				<td class="field">{:$member['search_open']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][20];?>
</td>
				<td>
					<input name="search_fulltext" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['search_fulltext']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][21];?>
 &nbsp;&nbsp;&nbsp;
					<input name="search_fulltext" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['search_fulltext']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][22];?>
 &nbsp;&nbsp;&nbsp;
					<input name="search_fulltext" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['search_fulltext']==2){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][23];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][24];?>
">				
				</td>
				<td class="field">{:$member['search_fulltext']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][25];?>
</td>
				<td>
					<input class="input rounded" name="search_interval" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['search_interval'];?>
" size="4" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][26];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][27];?>
">				
				</td>
				<td class="field">{:$member['search_interval']:}</td>
			</tr>
			<?php if (module::is_install('PL012x')){?><!-- /// 评论插件是否安装 -->
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][31];?>
</td>
				<td>
					<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = module::get(1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
					<input name="comment_enabled[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['modcode'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['m']->value['modcode'],$_smarty_tpl->getVariable('mle')->value['member']['comment_enabled'])){?>checked="checked"<?php }?> /> <?php echo $_smarty_tpl->tpl_vars['m']->value['modname'];?>
 &nbsp;
					<?php }} ?>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][32];?>
">
				</td>
				<td class="field">{:$member['comment_enabled']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][61];?>
</td>
				<td>
					<input name="comment_audit" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['comment_audit']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][62];?>
 &nbsp;&nbsp;&nbsp;
					<input name="comment_audit" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['comment_audit']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][63];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][64];?>
">				
				</td>
				<td class="field">{:$member['comment_audit']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][28];?>
</td>
				<td>
					<input name="comment_traveler" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['comment_traveler']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][29];?>
 &nbsp;&nbsp;&nbsp;
					<input name="comment_traveler" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['comment_traveler']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][30];?>

				</td>
				<td class="field">{:$member['comment_traveler']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][33];?>
</td>
				<td>
					<input class="input rounded" name="comment_interval" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['comment_interval'];?>
" size="4" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][34];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][35];?>
">				
				</td>
				<td class="field">{:$member['comment_interval']:}</td>
			</tr>
			<?php }?>
			<?php if (module::is_install('PL006x')){?><!-- /// 留言插件是否安装 -->
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][36];?>
</td>
				<td>
					<input name="message" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['message']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][37];?>
 &nbsp;&nbsp;&nbsp;
					<input name="message" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['message']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][38];?>
 &nbsp;&nbsp;&nbsp;
					<input name="message" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['message']==2){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][39];?>

				</td>
				<td class="field">{:$member['message']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][40];?>
</td>
				<td>
					<input class="input rounded" name="message_interval" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['message_interval'];?>
" size="4" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][41];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][42];?>
">				
				</td>
				<td class="field">{:$member['message_interval']:}</td>
			</tr>
			<?php }?>
			<?php if (module::is_install('PL007x')){?><!-- /// 在线反馈插件是否安装 -->
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][55];?>
</td>
				<td>
					<input name="feedback" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['feedback']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][56];?>
 &nbsp;&nbsp;&nbsp;
					<input name="feedback" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['feedback']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][57];?>
 &nbsp;&nbsp;&nbsp;
					<input name="feedback" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['feedback']==2){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][58];?>

				</td>
				<td class="field">{:$member['feedback']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][59];?>
</td>
				<td>
					<input class="input rounded" name="feedback_interval" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['feedback_interval'];?>
" size="4" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][41];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][60];?>
">				
				</td>
				<td class="field">{:$member['feedback_interval']:}</td>
			</tr>
			<?php }?>
			<tr class="td_top_line">
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][43];?>
</td>
				<td>
					<input name="allow_exchange" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['allow_exchange']==1){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][44];?>
 &nbsp;&nbsp;&nbsp;
					<input name="allow_exchange" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['member']['allow_exchange']==0){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page'][45];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][46];?>
">				
				</td>
				<td class="field">{:$member['allow_exchange']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][47];?>
</td>
				<td>
					<input class="input rounded" name="ratio_scores" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['ratio_scores'];?>
" size="4" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][48];?>
">				
				</td>
				<td class="field">{:$member['ratio_scores']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][49];?>
</td>
				<td>
					<input class="input rounded" name="register_scores" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['register_scores'];?>
" size="4" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][50];?>
">				
				</td>
				<td class="field">{:$member['register_scores']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][51];?>
</td>
				<td>
					<input class="input rounded" name="login_scores" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['login_scores'];?>
" size="4" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][52];?>
">				
				</td>
				<td class="field">{:$member['login_scores']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][53];?>
</td>
				<td>
					<input class="input rounded" name="comment_scores" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['member']['comment_scores'];?>
" size="4" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][54];?>
">				
				</td>
				<td class="field">{:$member['comment_scores']:}</td>
			</tr>
		</table>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"></td>
				<td><a class="submit reset" href="javascript:form_member.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
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
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 23:00:05
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/ad_manage.dwt" */ ?>
<?php /*%%SmartyHeaderCode:18995bd9c375552256-21213450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28ce4937016cb5ffa71c1f2e55f7960c897cb9e3' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/ad_manage.dwt',
      1 => 1300178852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18995bd9c375552256-21213450',
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
<?php echo $_smarty_tpl->getVariable('mle')->value['title_lang'];?>
</td>
			</tr>
		</table>
		
		<table class="list td_align" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="field_head" width="25"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][2];?>
</td>			
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][3];?>
</td>			
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][4];?>
</td>			
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][5];?>
</td>			
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][6];?>
</td>			
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][7];?>
</td>			
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][8];?>
</td>			
			</tr>
			<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['ad_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['aid'];?>
</td>
				<td><a href="../app.php?a=ad&id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</a></td>
				<td class="field">{:ad::show('<?php echo $_smarty_tpl->tpl_vars['n']->value['aid'];?>
'):}</td>
				<td><?php if ($_smarty_tpl->tpl_vars['n']->value['click']!=-1){?><?php echo $_smarty_tpl->tpl_vars['n']->value['click'];?>
<?php }else{ ?><img width="16" height="16" border="0" src="../inc/templates/manage/images/operation/disabled.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][10];?>
" /><?php }?></td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['n']->value['enable']=='0'){?><span class="red"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][11];?>
</span> <!-- 已关闭 -->
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['limit']=='0'){?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][12];?>
 <!-- 永不过期 -->
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['end']<$_smarty_tpl->getVariable('mle')->value['gmt_time']){?><span class="blue"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][13];?>
</span> <!-- 已过期 -->
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['start']>$_smarty_tpl->getVariable('mle')->value['gmt_time']){?><span class="green"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][14];?>
</span> <!-- 还没开始 -->
					<?php }else{ ?><?php echo (($_smarty_tpl->getVariable('lang')->value['page'][15]).(ceil(($_smarty_tpl->tpl_vars['n']->value['end']-$_smarty_tpl->getVariable('mle')->value['gmt_time'])/86400))).($_smarty_tpl->getVariable('lang')->value['page'][16]);?>
 <!-- 正常范围内 -->
					<?php }?>
				</td>
				<td class="operation">
					<?php if ($_smarty_tpl->tpl_vars['n']->value['enable']){?><a href="ad_manage.php?page=<?php echo $_smarty_tpl->getVariable('mle')->value['dpage'];?>
&action=unenable&id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/accept.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][19];?>
" /></a><?php }else{ ?><a href="ad_manage.php?page=<?php echo $_smarty_tpl->getVariable('mle')->value['dpage'];?>
&action=enable&id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/ban.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][20];?>
" /></a><?php }?>
					<a href="ad_update.php?id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img width="16" height="16" border="0" src="../inc/templates/manage/images/operation/pencil.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][17];?>
" /></a>
					<a href="ad_manage.php?page=<?php echo $_smarty_tpl->getVariable('mle')->value['dpage'];?>
&action=del&id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" onclick="return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['page'][21];?>
');"><img width="16" height="16" border="0" src="../inc/templates/manage/images/operation/delete.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][18];?>
" /></a>
				</td>
			</tr>
			<?php }} else { ?><tr><td colspan="8" class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][9];?>
</td></tr>
			<?php } ?>
		</table>
		<?php echo $_smarty_tpl->getVariable('mle')->value['page'];?>

		<?php if ($_smarty_tpl->getVariable('admin')->value['information']){?><div class="information rounded"><ol></ol>
		1、<?php echo $_smarty_tpl->getVariable('lang')->value['page'][29];?>
<br />
		2、<?php echo $_smarty_tpl->getVariable('lang')->value['page'][25];?>
<br />
		3、<?php echo $_smarty_tpl->getVariable('lang')->value['page'][26];?>
<br />
		4、<?php echo $_smarty_tpl->getVariable('lang')->value['page'][27];?>
<br />
		5、<?php echo $_smarty_tpl->getVariable('lang')->value['page'][28];?>

		</div><?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
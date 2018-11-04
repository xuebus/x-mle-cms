<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:59:54
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/set_ucenter.dwt" */ ?>
<?php /*%%SmartyHeaderCode:74895bd9c36ab21cb9-63230204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65a215bbd359498ad5e0f70d6a0b1e940654792e' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/set_ucenter.dwt',
      1 => 1341335478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74895bd9c36ab21cb9-63230204',
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
	mle.keysubmit('form','submit',true);
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
				<td>&nbsp;</td>
			</tr>
		</table>
		<?php if ($_smarty_tpl->getVariable('mle')->value['ucini']['enabled']){?>
			<?php if ($_smarty_tpl->getVariable('mle')->value['status']['result']=='success'){?>
				<div class="success rounded" style="margin:10px 10px 0 10px;"><ol></ol><?php echo $_smarty_tpl->getVariable('mle')->value['status']['info'];?>
</div>
			<?php }elseif($_smarty_tpl->getVariable('mle')->value['status']['result']=='failure'){?>
				<div class="error rounded" style="margin:10px 10px 0 10px;"><ol></ol><span><?php echo $_smarty_tpl->getVariable('mle')->value['status']['info'];?>
</span></div>
			<?php }?>
		<?php }?>
		<form action="" method="post" name="form" id="form">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['enabled'][0];?>
</td>
				<td>
					<input name="enabled" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['ucini']['enabled']==true){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['enabled'][1];?>
 &nbsp; &nbsp;
					<input name="enabled" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['ucini']['enabled']==false){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['enabled'][2];?>

				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['enabled'][3];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['connect'][0];?>
</td>
				<td>
					<select name="connect" class="select rounded">
					<option value="mysql"<?php if ($_smarty_tpl->getVariable('mle')->value['ucini']['connect']=='mysql'){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['connect'][1];?>
</option>
					<option value=""<?php if ($_smarty_tpl->getVariable('mle')->value['ucini']['connect']==''){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['connect'][2];?>
</option>
					</select>
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['connect'][3];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbhost'][0];?>
</td>
				<td>
					<input name="dbhost" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['dbhost'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbhost'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbport'][0];?>
</td>
				<td>
					<input name="dbport" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['dbport'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbport'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbuser'][0];?>
</td>
				<td>
					<input name="dbuser" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['dbuser'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbuser'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbpw'][0];?>
</td>
				<td>
					<input name="dbpw" type="password" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['dbpw'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbpw'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbname'][0];?>
</td>
				<td>
					<input name="dbname" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['dbname'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbname'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbtablepre'][0];?>
</td>
				<td>
					<input name="dbtablepre" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['dbtablepre'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['dbtablepre'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['key'][0];?>
</td>
				<td>
					<input name="key" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['key'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['key'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['api'][0];?>
</td>
				<td>
					<input name="api" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['api'];?>
" size="30" class="input rounded" />
					<a href="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['api'];?>
" target="_blank" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['api'][2];?>
"><img src="../inc/templates/manage/images/operation/world_link.png" width="16" height="16" /></a>
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['api'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['ip'][0];?>
</td>
				<td>
					<input name="ip" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['ip'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['ip'][1];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['appid'][0];?>
</td>
				<td>
					<input name="appid" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['ucini']['appid'];?>
" size="30" class="input rounded" />
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['field']['appid'][1];?>
</td>
			</tr>
			
		</table>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"><input type="hidden" name="action" value="<?php echo $_smarty_tpl->getVariable('mle')->value['action'];?>
" /></td>
				<td><a class="submit reset" href="javascript:form.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
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
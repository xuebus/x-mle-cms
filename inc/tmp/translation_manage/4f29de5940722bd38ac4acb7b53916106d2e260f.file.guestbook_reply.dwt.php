<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:53:07
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/guestbook_reply.dwt" */ ?>
<?php /*%%SmartyHeaderCode:39885bd9c1d30408c0-72627445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f29de5940722bd38ac4acb7b53916106d2e260f' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/guestbook_reply.dwt',
      1 => 1350002612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39885bd9c1d30408c0-72627445',
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
				<td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][0];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['title_lang'];?>
</td>
			</tr>
		</table>
		
		<form action="" method="post" name="form" id="form">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][2];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['title'];?>
</td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][3];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['nickname'];?>
</td>
				<td class="field">{:$msg['title']:}、{:$msg['nickname']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][4];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['email'];?>
</td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][5];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['phone'];?>
</td>
				<td class="field">{:$msg['email']:}、{:$msg['phone']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][6];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['fax'];?>
</td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][7];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['qq'];?>
</td>
				<td class="field">{:$msg['fax']:}、{:$msg['qq']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][8];?>
</td>
				<td><?php if ($_smarty_tpl->getVariable('mle')->value['guestbook']['sex']=='0'){?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][9];?>
<?php }elseif($_smarty_tpl->getVariable('mle')->value['guestbook']['sex']=='1'){?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][10];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][11];?>
<?php }?></td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][12];?>
</td>
				<td><?php if ($_smarty_tpl->getVariable('mle')->value['guestbook']['username']==''){?><em>NULL</em><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['username'];?>
<?php }?></td>
				<td class="field">{:$msg['sex']:}、{:$msg['username']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][13];?>
</td>
				<td colspan="3"><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['title'];?>
</td>
				<td class="field">{:$msg['title']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][14];?>
</td>
				<td colspan="3"><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['content'];?>
</td>
				<td class="field">{:$msg['content']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][15];?>
</td>
				<td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->getVariable('mle')->value['guestbook']['addtime']);?>
</td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][16];?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['ip'];?>
</td>
				<td class="field">{:$msg['addtime']:}、{:$msg['ip']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][17];?>
</td>
				<td><?php if ($_smarty_tpl->getVariable('mle')->value['guestbook']['visible']){?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][19];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][18];?>
<?php }?></td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][20];?>
</td>
				<td><?php if ($_smarty_tpl->getVariable('mle')->value['guestbook']['audit']){?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][21];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][22];?>
<?php }?></td>
				<td class="field">{:$msg['visible']:}、{:$msg['audit']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][23];?>
</td>
				<td colspan="3"><textarea name="reply" class="rounded" style="padding:5px;" rows="3" cols="40"><?php echo $_smarty_tpl->getVariable('mle')->value['guestbook']['reply'];?>
</textarea></td>
				<td class="field">{:$msg['reply']:}</td>
			</tr>
		</table>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"></td>
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
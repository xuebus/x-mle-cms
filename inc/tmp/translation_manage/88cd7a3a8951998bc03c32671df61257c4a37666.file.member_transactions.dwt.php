<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:58:24
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/member_transactions.dwt" */ ?>
<?php /*%%SmartyHeaderCode:258205bd9c310404de0-51566068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88cd7a3a8951998bc03c32671df61257c4a37666' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/member_transactions.dwt',
      1 => 1322546786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258205bd9c310404de0-51566068',
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
function check(){
	var key = $('#word').val();
	if(key == '' || key == "<?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword'];?>
"){
		alert("<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_keywords'];?>
");
		return false;		
	} else {
		return true;	
	}
}
$(function(){
	mle.alternately('list');
	mle.title2div('title2div');
	mle.acsubmit('manage','del','<?php echo $_smarty_tpl->getVariable('lang')->value['page']['determine_delete'];?>
','del',false);
	mle.keysubmit('search_form','search','check()');
});
</script>
<style type="text/css">.title_div{width:400px; overflow:hidden;}</style>
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
				<td>
					<form action="" method="get" name="search_form" id="search_form">
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>
								<select class="select rounded" onChange="window.open(this.options[this.selectedIndex].value,'_self')" size="1">
								<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lang')->value['page']['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
								<option <?php if ($_smarty_tpl->getVariable('mle')->value['get']['type']==$_smarty_tpl->tpl_vars['i']->value){?>selected="selected"<?php }?> value="member_transactions.php?type=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</option>
								<?php }} ?>
								</select>
							</td>
							<td>
								<input type="text" name="word" id="word" class="input rounded" size="20" onfocus="if(this.value=='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword'];?>
'){this.value='';}" onblur="if(this.value==''){this.value='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword'];?>
';}" value="<?php if ($_smarty_tpl->getVariable('mle')->value['get']['word']){?><?php echo $_smarty_tpl->getVariable('mle')->value['get']['word'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword'];?>
<?php }?>" />
								<input type="text" style="display:none;" />
							</td>
							<td><a class="button_2" id="search" href="javascript:void(0);"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['search'];?>
</a></td>
							<td><a class="button_2" href="member_transactions.php?<?php echo rand();?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['refresh'];?>
</a></td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>
		
		<form action="" method="post" name="manage" id="manage">
		<table class="list td_align" cellpadding="0" cellspacing="1">
			<tr>
				<td class="field_head" width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['select'];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['oid'];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['username'];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['transaction_type'];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['amount'];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['results'][2];?>
</td>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
			<tr>
				<td><input name="ids[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" /></td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['oid'];?>
</td>
				<td><a href="member_update.php?id=<?php echo $_smarty_tpl->tpl_vars['n']->value['uid'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['username'];?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('lang')->value['page']['type'][$_smarty_tpl->tpl_vars['n']->value['type']];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['amount'];?>
</td>
				<td>
					<font color="<?php if ($_smarty_tpl->tpl_vars['n']->value['result']==1){?>#0000FF<?php }else{ ?>#FF0000<?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['results'][$_smarty_tpl->tpl_vars['n']->value['result']];?>
</font>
					[<a href="javascript:void(0)" title="<?php echo html_chars(str_replace(array('{oid}','{username}','{type}','{amount}','{result}','{info}','{ip}','{addtime}'),array($_smarty_tpl->tpl_vars['n']->value['oid'],$_smarty_tpl->tpl_vars['n']->value['username'],$_smarty_tpl->getVariable('lang')->value['page']['type'][$_smarty_tpl->tpl_vars['n']->value['type']],$_smarty_tpl->tpl_vars['n']->value['amount'],$_smarty_tpl->getVariable('lang')->value['page']['results'][$_smarty_tpl->tpl_vars['n']->value['result']],$_smarty_tpl->tpl_vars['n']->value['info'],$_smarty_tpl->tpl_vars['n']->value['ip'],date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['n']->value['addtime'])),$_smarty_tpl->getVariable('lang')->value['page']['info']));?>
" class="title2div"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['view'];?>
</a>]
				</td>
			</tr>
			<?php }} else { ?><tr><td colspan="6" class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['no_data'];?>
</td></tr>
			<?php } ?>	
		</table>
		<table border="0" cellpadding="0" cellspacing="0" class="table top_line">
			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td class="all_action"><input name="all" id="all" type="checkbox" onclick="mle.select_all(this.form);" /></td>
							<td> &nbsp<?php echo $_smarty_tpl->getVariable('lang')->value['page']['select_all'];?>
 &nbsp;</td>
							<td class="operation">
								<input type="hidden" name="action" id="action" value="" />
								<a href="javascript:void(0);"><img id="del" src="../inc/templates/manage/images/operation/delete.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['delete_log'];?>
" width="16" height="16" border="0" /></a>
							</td>					
						</tr>
					</table>
				</td>
			</tr>
		</table>
		</form>
		<?php echo $_smarty_tpl->getVariable('mle')->value['page'];?>

		<?php if ($_smarty_tpl->getVariable('admin')->value['attention']){?><div class="attention rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['attention'];?>
</div><?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
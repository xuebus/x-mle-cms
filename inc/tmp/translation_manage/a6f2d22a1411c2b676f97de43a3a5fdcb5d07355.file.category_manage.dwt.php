<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:49:11
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/category_manage.dwt" */ ?>
<?php /*%%SmartyHeaderCode:45705bd9c0e715bfa5-55627315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6f2d22a1411c2b676f97de43a3a5fdcb5d07355' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/category_manage.dwt',
      1 => 1302268798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45705bd9c0e715bfa5-55627315',
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
	$('.go_down').click(function(){
		$('.part').not($(this).parents('table').nextAll('div').first()).slideUp('slow'); //隐藏全部(排除当前)
		$(this).parents('table').nextAll('div').first().slideToggle('slow'); // 显示当前
	});
	
	//显示第一个 div
	//$('.part').first().slideDown('slow');
});
</script>
<style type="text/css">
.list td{padding:0; margin:0; height:40px;}
.list .cont{background:#F0FFFC;} /* #F0FFFC */
.list .cont td{border-bottom:1px #999 solid;}
.list .l1{background:url(../inc/templates/manage/images/sprite_green.png) -35px -34px no-repeat; width:24px;}
.list .l2{float:left; width:100px; height:40px; line-height:40px; background:url(../inc/templates/manage/images/0101.gif) 0 19px repeat-x;}
.list .l3{float:left; height:40px; padding:0 0 0 5px; line-height:40px;}
.part{display:none;}
.go_down{cursor:pointer;}
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
			<tr><td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['title_lang'];?>
</td></tr>
		</table>
		<br />
		<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['channel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
		<table class="list" cellpadding="0" cellspacing="0" border="0">
			<tr class="cont go_down">	
				<td width="36px" align="center"><img src="../inc/templates/manage/images/go_down.png" width="16" height="16" /></td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
 （ID：<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
） <?php if ($_smarty_tpl->tpl_vars['n']->value['permission']!='0'){?> <img title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['restricted'];?>
" src="../inc/templates/manage/images/operation/lock.png" width="16" height="16"><?php }?></td>
				<td align="right" style="padding:0 20px 0 0;" class="operation">
					<a href="category_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/folder.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['add_root'];?>
"></a>
					<a href="channel_update.php?id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/pencil.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['modify_channel'];?>
"></a>
					<a href="channel_manage.php?del=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" onclick="return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['ok_delete'];?>
');"><img src="../inc/templates/manage/images/operation/delete.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['delete_channel'];?>
"></a>
					<?php if ($_smarty_tpl->tpl_vars['n']->value['module']=='MO001x'){?><a href="article_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][0];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['module']=='MO002x'){?><a href="product_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][1];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['module']=='MO003x'){?><a href="picture_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][2];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['n']->value['module']=='MO004x'){?><a href="download_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][3];?>
"></a>
					<?php }else{ ?><img src="../inc/templates/manage/images/operation/disabled.png"><?php }?>	
				</td>
			</tr>
		</table>
		<div class="part" style="height:<?php echo $_smarty_tpl->tpl_vars['n']->value['div_height'];?>
px;">
		<table class="list" cellpadding="0" cellspacing="0" border="0">
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['category'][$_smarty_tpl->tpl_vars['n']->value['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
			<tr>
				<td class="l1"></td>
				<td><div style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['div_indentation'];?>
px;" class="l2"></div><div class="l3"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
 （ID：<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
） <?php if ($_smarty_tpl->tpl_vars['m']->value['permission']!='0'){?> <img title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['restricted'];?>
" src="../inc/templates/manage/images/operation/lock.png" width="16" height="16"><?php }?></div></td>
				<td align="right" style="padding:0 20px 0 0;" class="operation">
					<a href="category_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
&category=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/folder.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['add_category'];?>
"></a>
					<a href="category_update.php?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/pencil.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['modify_columns'];?>
"></a>
					<a href="category_manage.php?module=<?php echo $_smarty_tpl->tpl_vars['m']->value['module'];?>
&del=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" onclick="return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['ok_delete_category'];?>
');"><img src="../inc/templates/manage/images/operation/delete.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['delete_category'];?>
"></a>
					<?php if ($_smarty_tpl->tpl_vars['m']->value['module']=='MO001x'){?><a href="article_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
&category=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][0];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['m']->value['module']=='MO002x'){?><a href="product_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
&category=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][1];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['m']->value['module']=='MO003x'){?><a href="picture_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
&category=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][2];?>
"></a>
					<?php }elseif($_smarty_tpl->tpl_vars['m']->value['module']=='MO004x'){?><a href="download_update.php?channel=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
&category=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/page_add.png" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['operation'][3];?>
"></a>
					<?php }else{ ?><img src="../inc/templates/manage/images/operation/disabled.png"><?php }?>					
				</td>
			</tr>
			<?php }} ?>
		</table>
		</div>
		<?php }} ?>
		<?php if ($_smarty_tpl->getVariable('admin')->value['information']){?>
		<div class="information rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['information'];?>
</div>
		<?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
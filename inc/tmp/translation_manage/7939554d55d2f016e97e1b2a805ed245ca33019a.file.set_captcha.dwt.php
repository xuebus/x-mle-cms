<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:59:40
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/set_captcha.dwt" */ ?>
<?php /*%%SmartyHeaderCode:181375bd9c35cb153a7-01370821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7939554d55d2f016e97e1b2a805ed245ca33019a' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/set_captcha.dwt',
      1 => 1331306820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181375bd9c35cb153a7-01370821',
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
	mle.keysubmit('form_captcha','submit',true);
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
		
		<form name="form_captcha" id="form_captcha" action="" method="post">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][1];?>
</td>
				<td colspan="2">
					<input name="open[]" type="checkbox" value="1" <?php if (in_array(1,$_smarty_tpl->getVariable('mle')->value['captcha']['open'])){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][2];?>
&nbsp;&nbsp;&nbsp;
					<input name="open[]" type="checkbox" value="2" <?php if (in_array(2,$_smarty_tpl->getVariable('mle')->value['captcha']['open'])){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][3];?>
&nbsp;&nbsp;&nbsp;
					<input name="open[]" type="checkbox" value="3" <?php if (in_array(3,$_smarty_tpl->getVariable('mle')->value['captcha']['open'])){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][4];?>
&nbsp;&nbsp;&nbsp;
					<input name="open[]" type="checkbox" value="4" <?php if (in_array(4,$_smarty_tpl->getVariable('mle')->value['captcha']['open'])){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][5];?>
&nbsp;&nbsp;&nbsp;
					<input name="open[]" type="checkbox" value="5" <?php if (in_array(5,$_smarty_tpl->getVariable('mle')->value['captcha']['open'])){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][6];?>
&nbsp;&nbsp;&nbsp;
					<input name="open[]" type="checkbox" value="6" <?php if (in_array(6,$_smarty_tpl->getVariable('mle')->value['captcha']['open'])){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][7];?>

				</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][8];?>
</td>
				<td>
					<?php echo $_smarty_tpl->getVariable('lang')->value['page'][9];?>
 <input type="text" size="5" class="input rounded" name="image_width" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['image_width'];?>
" />  × 
					<?php echo $_smarty_tpl->getVariable('lang')->value['page'][10];?>
 <input type="text" size="5" class="input rounded" name="image_height" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['image_height'];?>
" /> Px
				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][11];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][12];?>
</td>
				<td><input type="text" size="10" class="input rounded" name="perturbation" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['perturbation'];?>
" /></td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][13];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][14];?>
</td>
				<td>
					<?php echo $_smarty_tpl->getVariable('lang')->value['page'][15];?>
 <input type="text" size="5" class="input rounded" name="text_angle_minimum" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['text_angle_minimum'];?>
" /> 
					<?php echo $_smarty_tpl->getVariable('lang')->value['page'][16];?>
 <input type="text" size="5" class="input rounded" name="text_angle_maximum" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['text_angle_maximum'];?>
" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][17];?>

				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][18];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][19];?>
</td>
				<td><input type="text" size="10" class="input rounded" name="text_x_start" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['text_x_start'];?>
" /></td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][20];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][21];?>
</td>
				<td>
					<input name="image_bg_imgae" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['captcha']['image_bg_imgae']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][22];?>
&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="image_bg_imgae" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['captcha']['image_bg_imgae']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][23];?>

				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][24];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][25];?>
</td>
				<td><input type="text" size="10" class="input rounded iColorPicker" id="image_bg_color" name="image_bg_color" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['image_bg_color'];?>
" /></td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][26];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][27];?>
</td>
				<td>
					<input name="use_multi_text" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['captcha']['use_multi_text']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][28];?>
&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="use_multi_text" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['captcha']['use_multi_text']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][29];?>

				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][30];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][31];?>
</td>
				<td><input type="text" size="10" class="input rounded iColorPicker" name="text_color" id="text_color" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['text_color'];?>
" /></td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][32];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][33];?>
</td>
				<td><input type="text" size="10" class="input rounded" name="code_length" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['code_length'];?>
" /></td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][34];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][35];?>
</td>
				<td>
					<input name="charset[]" type="checkbox" <?php if (in_array(1,$_smarty_tpl->getVariable('mle')->value['captcha']['charset'])){?>checked<?php }?> value="1" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][36];?>
&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="charset[]" type="checkbox" <?php if (in_array(2,$_smarty_tpl->getVariable('mle')->value['captcha']['charset'])){?>checked<?php }?> value="2" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page'][37];?>

				</td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][38];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][39];?>
</td>
				<td><input type="text" size="10" class="input rounded" name="num_lines" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['num_lines'];?>
" /></td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][40];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][41];?>
</td>
				<td><input type="text" size="10" class="input rounded iColorPicker" name="line_color" id="line_color" value="<?php echo $_smarty_tpl->getVariable('mle')->value['captcha']['line_color'];?>
" /></td>
				<td class="field"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][42];?>
</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][43];?>
</td>
				<td><a href="#" onClick="document.getElementById('siimage').src = '../inc/include/captcha.php?sid=' + Math.random(); return false;"><img id="siimage" src="../inc/include/captcha.php?sid=<?php echo time();?>
" /></a></td>
				<td class="field"></td>
			</tr>
		</table>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"></td>
				<td><a class="submit reset" href="javascript:form_captcha.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
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
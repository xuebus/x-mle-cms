<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:50:36
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184485bd9c13c32c3b8-51644555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecdfcb8a905747acdd8b4945661745e079a6045e' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/feedback.tpl',
      1 => 1331317722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184485bd9c13c32c3b8-51644555',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
</title>
<base href="<?php echo $_smarty_tpl->getVariable('config')->value['url'];?>
">
<meta name="copyright" content="2009-2011 MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/misc.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript">
var _s = function(){
	if($('#feedback_type').val() == ''){
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][0];?>
');
	} else if($('#feedback_title').val() == ''){
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][1];?>
');
		$('#feedback_title').focus();
	} else if($('#contact').val() == ''){
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][2];?>
');
		$('#contact').focus();
	} else if($('#email').val() == ''){
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][3];?>
');
		$('#email').focus();	
	<?php if ($_smarty_tpl->getVariable('mle')->value['enabled_captcha']){?>
	} else if($('#captcha').val() == ''){
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][4];?>
');
		$('#captcha').focus();
	<?php }?>
	} else {
		$('#feedback_form').submit();
	}
}
</script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="box">
	<div class="frame_side"><?php $_template = new Smarty_Internal_Template('component_product.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?></div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
</ol>
			<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
</ol>
		</div>
		<div class="feedback">
		<!-- 表单里可以随便添加、删除字段(文本域)，提交后所有字段数据都将以邮件的形式发送到 "语言站点设置" 中设置的 "企业邮箱" 中 -->
		<form name="feedback" id="feedback_form" action="feedback.php" method="post">
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][0];?>
：</li>
				<li class="b">
					<select class="rounded" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][0];?>
" id="feedback_type">
						<option value="" selected="selected"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][1];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][2];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][2];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][3];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][3];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][4];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][4];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][5];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][5];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][6];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][6];?>
</option>
					</select>
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][7];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][7];?>
" id="feedback_title" maxlength="50" /> <font color="#FF0000">*</font>
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][8];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][9];?>
" id="contact" maxlength="20" /> <font color="#FF0000">*</font>
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][10];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][10];?>
" id="email" maxlength="20" /> <font color="#FF0000">*</font>
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][11];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][11];?>
" maxlength="20" />
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][12];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][12];?>
" maxlength="20" />
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][13];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][13];?>
" maxlength="20" />
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][14];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][14];?>
" maxlength="20" />
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][15];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][15];?>
" maxlength="20" />
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][16];?>
：</li>
				<li class="b">
					<input type="text" class="rounded" value="" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][16];?>
" maxlength="20" />
				</li>
			</ul>
			<ul class="textarea">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][17];?>
：</li>
				<li class="b">
					<textarea name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][17];?>
" class="rounded"></textarea>
				</li>
			</ul>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][18];?>
：</li>
				<li class="b">
					<select class="rounded" name="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][18];?>
">
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][19];?>
" selected="selected"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][20];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][21];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][21];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][22];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][22];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][23];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][23];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][24];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][24];?>
</option>
						<option value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][25];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][25];?>
</option>
					</select>
				</li>
			</ul>
			<?php if ($_smarty_tpl->getVariable('mle')->value['enabled_captcha']){?>
			<ul class="input">
				<li class="a"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][26];?>
：</li>
				<li class="b">
					<input type="text" class="rounded captcha" name="captcha" id="captcha" maxlength="12" value="" onfocus="document.getElementById('captcha_box').style.display='block';" onchange="document.getElementById('captcha_box').style.display='none'" /> <font color="#FF0000">*</font>
					<span id="captcha_box"><a href="#" onClick="document.getElementById('siimage').src = 'inc/include/captcha.php?sid=' + Math.random(); return false;"><img id="siimage" src="inc/include/captcha.php?sid=<?php echo time();?>
" /></a></span>
				</li>
			</ul>
			<?php }?>
			<ul class="submit">
				<a href="javascript:_s();" onFocus="this.blur()"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['form'][27];?>
</a>
			</ul>
		</form>
		</div>
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
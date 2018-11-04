<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:53:34
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271975bd9c1eea78878-26673777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc0e1bbda61125a9dd42967f6adc006fbf13c614' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/login.tpl',
      1 => 1341255468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271975bd9c1eea78878-26673777',
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
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('web')->value['keyword'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('web')->value['description'];?>
" />
<meta name="copyright" content="2009-2011 MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/login.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript">	
function check(){
	var username = document.loginform.username.value; var password = document.loginform.password.value;
	if(username.length < 2 || username == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_username'];?>
'){alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['warning_enter_username'];?>
'); document.loginform.username.focus(); return false;	}
	if(password.length < 2){alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['warning_enter_password'];?>
'); document.loginform.password.focus(); return false;}
	<?php if ($_smarty_tpl->getVariable('mle')->value['login_captcha']){?>if(document.loginform.captcha.value == ''){alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['warning_captcha'];?>
'); document.loginform.captcha.focus(); return false;}<?php }?>
	return true;
}
</script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="box list">
	<div class="titlebar">
		<ol class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
</ol>
		<ol class="location"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['location'];?>
<a href="./"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['home'];?>
</a> &gt;&gt; <?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
</ol>
	</div>
	<div class="head">
		<?php echo $_smarty_tpl->getVariable('lang')->value['page']['tips'][0];?>
<br /><?php echo $_smarty_tpl->getVariable('lang')->value['page']['tips'][1];?>
<?php if ($_smarty_tpl->getVariable('mle')->value['email_auth']){?><br /><?php echo $_smarty_tpl->getVariable('lang')->value['page']['tips'][2];?>
<?php }?>
	</div>
	<div class="loginbox">
		<form name="loginform" method="post" action="member/login.php?goto=<?php echo $_smarty_tpl->getVariable('mle')->value['get']['goto'];?>
" onsubmit="return check()">
		<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'];?>
</ol>
		<ol class="text"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['username'];?>
</ol>
		<ol class="field">
			<span class="left"></span>
			<input name="username" class="username" maxlength="30" type="text" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_username'];?>
" onfocus="if(this.value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_username'];?>
'){this.value = '';this.style.color = '#000';}" onblur="if(this.value==''){this.value='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['enter_username'];?>
';this.style.color = '#999';}" />
			<span class="right"></span>
		</ol>
		<ol class="text"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['password'];?>
</ol>
		<ol class="field"><input name="password" class="password" maxlength="20" type="password" tabindex="2" value="" /></ol>
		
		<?php if ($_smarty_tpl->getVariable('mle')->value['login_captcha']){?>
		<ol class="text"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['captcha'];?>
：</ol>
		<ol class="field">
			<input type="text" name="captcha" class="password" style="text-transform:uppercase;" tabindex="3"  maxlength="20" onfocus="document.getElementById('siimage_div').style.display='block';" onchange="document.getElementById('siimage_div').style.display='none'" />
			<div id="siimage_div"><a href="#" onClick="document.getElementById('siimage').src = 'inc/include/captcha.php?sid=' + Math.random(); return false;"><img id="siimage" src="inc/include/captcha.php?sid=<?php echo time();?>
" /></a></div>
		</ol>
		<?php }?>
		
		<ol class="signinbutton"><input type="submit" name="submit" tabindex="4" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'];?>
" /></ol>
		<ol class="register"><a href="<?php echo misc::url('register');?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['register'];?>
</a></ol>
		</form>	
	</div>
</div>
<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
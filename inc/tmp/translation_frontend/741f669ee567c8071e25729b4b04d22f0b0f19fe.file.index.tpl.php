<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:48:20
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187615bd9c0b4226864-09193011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '741f669ee567c8071e25729b4b04d22f0b0f19fe' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/frontend/default/index.tpl',
      1 => 1370059087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187615bd9c0b4226864-09193011',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('web')->value['title'];?>
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
style/home.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
style/language_<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/script/swfobject.js"></script>
<script type="text/javascript" src="inc/script/msclass.js"></script>
<script type="text/javascript">
// 会员登录表单检测
function check(){
	var username = document.loginform.username.value; var password = document.loginform.password.value;
	if(username.length < 2 || username == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][0];?>
'){alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][1];?>
'); document.loginform.username.focus(); return false;	}
	if(password.length < 2){alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][2];?>
'); document.loginform.password.focus(); return false;}
	<?php if ($_smarty_tpl->getVariable('mle')->value['login_captcha']){?>if(document.loginform.captcha.value == '' || document.loginform.captcha.value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][0];?>
'){alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][3];?>
'); document.loginform.captcha.focus(); return false;}<?php }?>
	return true;
}
$(function(){ 
	// 焦点图
	var xmlData = "<list>";	<?php $_smarty_tpl->tpl_vars['pic'] = new Smarty_variable(photo::data(0,0,0,0,0,'home_focus'), null, null);?>
	<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pic')->value['picture']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['n']->key;
?>xmlData += "<item><img><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</img><url><?php echo $_smarty_tpl->getVariable('pic')->value['description'][$_smarty_tpl->tpl_vars['i']->value];?>
</url></item>";<?php }} ?>
	xmlData += "</list>"; var flashvars = {xmlData:xmlData}; var params = {menu:false,wmode:'opaque'}; var attributes = {wmode:'transparent'};
	swfobject.embedSWF('<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/photo_player.swf','photo_player','650','260','7','expressInstall.swf',flashvars,params,attributes);
	// 本地时间
	if(navigator.appVersion.indexOf('AppleWebKit') > 0){setInterval("$('#instant_date').html(new Date().toLocaleDateString())",1000);
	} else {setInterval("$('#instant_date').html(new Date().toLocaleString())",1000);}
	// 滚动公告
	new marquee("information",0,2,600,25,5,3000,3000,25); // 滚动公告
	new marquee('thumbnail',2,1,620,115,20,0,0); // 滚动图集
	if(mle.getcookie('mlecms_user_login') != ''){ // 已登录
		$('#not_logged').hide(); $('#have_logged').show();
		$('#login_username').html(mle.getcookie('mlecms_user_name'));
		$('#login_rankname').html(mle.getcookie('mlecms_user_rankname'));
		$('#login_money').html(mle.getcookie('mlecms_user_money'));
		$('#login_usemoney').html(mle.getcookie('mlecms_user_usemoney'));
		$('#login_frequency').html(mle.getcookie('mlecms_user_frequency'));
		$('#login_scores').html(mle.getcookie('mlecms_user_scores'));
	}
});
</script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template('component_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div class="box">
	<!-- 滚动公告 -->
	<div class="notice">
		<ol class="speaker"></ol>
		<ol class="information" id="information">
			<?php if ($_smarty_tpl->getVariable('web')->value['lang']==1){?><?php $_smarty_tpl->tpl_vars['pid'] = new Smarty_variable(9, null, null);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['pid'] = new Smarty_variable(19, null, null);?><?php }?><!-- 这里修改公告所属的频道ID、根据不同的语言调用不同的频道 -->
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(3,99,0,$_smarty_tpl->getVariable('pid')->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a> &nbsp;&nbsp;&nbsp; <?php echo $_smarty_tpl->tpl_vars['a']->value['addtime'];?>
<br /> 
			<?php }} ?>
		</ol>
		<ol class="date" id="instant_date">Loading ...</ol>
	</div>
	<!-- 焦点图 -->
	<div class="photo"><ol id="photo_player"></ol></div>
	<!-- 登录框 -->
	<div class="loginbox">
	
		<!-- 登录框 -->
		<div id="not_logged">
			<form name="loginform" method="post" action="member/login.php" onsubmit="return check()">
			<ol class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][1];?>
</ol>
			<ol class="text"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][2];?>
</ol>
			<ol class="field">
				<span class="left"></span>
				<input name="username" class="username" maxlength="30" type="text" tabindex="1" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][0];?>
" onfocus="if(this.value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][0];?>
'){this.value = '';this.style.color = '#000';}" onblur="if(this.value==''){this.value='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['msg'][0];?>
';this.style.color = '#999';}" />
				<span class="right"></span>
			</ol>
			<ol class="text"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][3];?>
</ol>
			<ol class="field"><input name="password" class="password" maxlength="20" type="password" tabindex="2" value="" /></ol>
			<ol class="signinbutton"><input type="submit" name="submit" tabindex="4" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][4];?>
" /></ol>
			<?php if ($_smarty_tpl->getVariable('mle')->value['login_captcha']){?><!-- 验证码 -->
			<ol class="captcha">
				<input type="text" name="captcha" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][0];?>
" tabindex="3"  maxlength="20" onblur="if(this.value==''){this.value='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][0];?>
';this.style.color = '#999';}" onfocus="document.getElementById('siimage_div').style.display='block'; if(this.value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][0];?>
'){this.value = '';this.style.color = '#000';}" onchange="document.getElementById('siimage_div').style.display='none'" />
				<a href="<?php echo misc::url('register');?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][5];?>
</a>
				<div id="siimage_div"><a href="#" onClick="document.getElementById('siimage').src = 'inc/include/captcha.php?sid=' + Math.random(); return false;"><img id="siimage" src="inc/include/captcha.php?sid=<?php echo time();?>
" /></a></div>
			</ol>
			<?php }else{ ?><ol class="register"><a href="<?php echo misc::url('register');?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][5];?>
</a></ol><?php }?>
			</form>
			<ol class="interval"></ol>
		</div>
		
		<!-- 已登录，显示信息 -->
		<div id="have_logged">
			<ol class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][6];?>
</ol>
			<ol class="logged">
				<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][7];?>
<font color="#FF0000" id="login_username"></font><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][8];?>
<br />
				<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][9];?>
<span id="login_rankname"></span><br />
				<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][10];?>
<span class="number" id="login_money"></span><br />
				<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][11];?>
<span class="number_green" id="login_usemoney"></span><br />
				<?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][12];?>
<span class="number_green" id="login_frequency"></span> &nbsp;&nbsp;&nbsp; <?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][13];?>
<span class="number_green" id="login_scores"></span><br />
				<a href="member/center.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][14];?>
</a>&nbsp;|&nbsp;<a href="member/recharge.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][15];?>
</a>&nbsp;|&nbsp;<a href="member/login.php?action=logout"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['login'][16];?>
</a>
			</ol>
			<ol class="interval_info"></ol>
		</div>

		<!-- 其它图片链接 -->
		<div>
			<ol class="other">
				<a href="<?php echo misc::get_url('guestbook');?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/homeandleft_guestbook<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.png" width="100" height="50" /></a> &nbsp;
				<a href="<?php echo misc::get_url('feedback');?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/homeandleft_service<?php echo $_smarty_tpl->getVariable('web')->value['lang'];?>
.png" width="100" height="50" /></a>
			</ol>
		</div>
	</div>
</div>
<div class="box">
	<div class="frame_side">
		<!-- 搜索框 -->
		<div class="search">
			<form name="searchform" method="get" action="search.php">
			<span class="left"></span>
			<input class="word" type="text" name="word" id="word" tabindex="5" maxlength="50" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'][0];?>
" onfocus="if(this.value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'][0];?>
'){this.value = '';this.style.color = '#000';}" onblur="if(this.value==''){this.value='<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'][0];?>
';this.style.color = '#999';}" />
			<input class="button" type="submit" name="" tabindex="6" value="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'][2];?>
" onclick="if(document.getElementById('word').value == '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'][0];?>
'){ alert('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'][1];?>
');return false;}" />
			<input type="hidden" name="type" value="1" /><!-- 1文章、2商品、3图集、4下载 -->
			</form>
		</div>
		<div class="hot_search"><ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['search'][3];?>
<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = tag::data(4,0,10,0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['t']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>&nbsp;<?php }} ?></ol></div>
		
		<!-- 最新发布 -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][0];?>
</ol>
			<!--ol class="more"><a href="#"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol-->
		</div>
		<div class="ctitle">
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(1,12); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
			<ol><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/common.gif" width="9" height="15" border="0" /> <a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></ol>
			<?php }} ?>
		</div>
		
		<!-- 左侧广告位（278*100px） -->
		<div class="ad_1"><?php echo ad::show('home_1');?>
</div> 
		
	</div>
	
	<div class="frame_main">
		<!-- 推荐商品 -->
		<div class="caption timeline">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][1];?>
</ol>
			<ol class="more"><a href="<?php echo misc::get_url('channel',2);?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
		</div>
		<div class="recom">
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(product::data(0,20,1,$_smarty_tpl->getVariable('mle')->value['channel']['id']), null, null);?>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->getVariable('i')->value<4){ for ($_foo=true;$_smarty_tpl->getVariable('i')->value<4; $_smarty_tpl->tpl_vars['i']->value++){
?>
			<div class="circle">
				<ul class="image">
					<li><?php if ($_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0]!=''){?><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0];?>
" onload="mle.img_auto_size(this)" width="100" height="100" alt="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
" /></a><?php }?></li>
				</ul>
				<ul class="text">
					<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x']->value = 0;
  if ($_smarty_tpl->getVariable('x')->value<5){ for ($_foo=true;$_smarty_tpl->getVariable('x')->value<5; $_smarty_tpl->tpl_vars['x']->value++){
?>
					<li <?php if ($_smarty_tpl->tpl_vars['x']->value==0){?>class="first"<?php }else{ ?>class="routine"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title_format'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
			<?php }} ?>
		</div>
		
		<!-- 最新商品 -->
		<div class="caption timeline">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][2];?>
</ol>
			<ol class="more"><a href="<?php echo misc::get_url('channel',2);?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
		</div>
		<div class="recom">
			<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(product::data(1,20,0,$_smarty_tpl->getVariable('mle')->value['channel']['id']), null, null);?>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 0;
  if ($_smarty_tpl->getVariable('i')->value<4){ for ($_foo=true;$_smarty_tpl->getVariable('i')->value<4; $_smarty_tpl->tpl_vars['i']->value++){
?>
			<div class="circle">
				<ul class="image">
					<li><?php if ($_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0]!=''){?><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['picture'][0];?>
" onload="mle.img_auto_size(this)" width="100" height="100" alt="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
" /></a><?php }?></li>
				</ul>
				<ul class="text">
					<?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['x']->value = 0;
  if ($_smarty_tpl->getVariable('x')->value<5){ for ($_foo=true;$_smarty_tpl->getVariable('x')->value<5; $_smarty_tpl->tpl_vars['x']->value++){
?>
					<li <?php if ($_smarty_tpl->tpl_vars['x']->value==0){?>class="first"<?php }else{ ?>class="routine"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title'];?>
"><?php echo $_smarty_tpl->getVariable('p')->value[$_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['i']->value*5]['title_format'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
			<?php }} ?>
		</div>
	</div>
</div>

<!-- 中部通栏广告位（930*100px） -->
<div class="ad_2"><?php echo ad::show('home_2');?>
</div>

<div class="box">
	<div class="frame_side">
		<!-- 推荐内容 -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][3];?>
</ol>
			<!--ol class="more"><a href="#"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol-->
		</div>
		<div class="ctitle">
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(0,10,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
			<ol><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/common.gif" width="9" height="15" border="0" /> <a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></ol>
			<?php }} ?>
		</div>
		
		<!-- 推荐内容 -->
		<div class="caption">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][4];?>
</ol>
			<!--ol class="more"><a href="#"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol-->
		</div>
		<div class="ranking">
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(5,10); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
			<ol><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></ol>
			<?php }} ?>
		</div>
	</div>
	<!-- 主体 -->
	<div class="frame_main">
		<!-- 图片 -->
		<div class="caption timeline">
			<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][5];?>
</ol>
			<ol class="more"><a href="<?php echo misc::get_url('channel',3);?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
		</div>
		<div class="thumbnail">
			<div id="thumbnail">
			<table cellpadding="0" cellspacing="0" border="0"><tr>
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = photo::data(0,5); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
				<td>
					<div class="pic"><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['a']->value['picture'][0];?>
" width="135" height="90" onload="mle.img_auto_size(this)" /></a></div>
					<div class="text"><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></div>
				</td>
			<?php }} ?>
			</tr></table>
			</div>
		</div>
		
		<div class="parallel">
			<!-- 最新发布，从第 10 条开始调用(接着上面的10条记录)，调用10条记录 -->
			<div class="portfolio">
				<div class="caption">
					<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][6];?>
</ol>
					<ol class="more"><a href="<?php echo misc::get_url('channel',1);?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
				</div>
				<div class="rows">
				<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(1,10,0,0,0,0,0,0,10); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
					<ol><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></ol>
				<?php }} ?>
				</div>
			</div>
			<!-- 软件下载 -->
			<div class="portfolio vertical">
				<div class="caption">
					<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][7];?>
</ol>
					<ol class="more"><a href="<?php echo misc::get_url('channel',4);?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
				</div>
				<div class="rows">
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = download::data(0,10); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					<ol><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['title_format'];?>
</a> (<?php echo $_smarty_tpl->tpl_vars['d']->value['count'];?>
)</ol>
				<?php }} ?>
				</div>
			</div>
			<!-- 图文资讯 -->
			<div class="caption timeline">
				<ol class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][8];?>
</ol>
				<ol class="more"><a href="<?php echo misc::get_url('channel',1);?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></ol>
			</div>
			<div class="t_photo">
				<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = article::data(0,4,0,0,0,0,22,'',0,0,0,0,0,0,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
				<ul>
					<li class="t_pic"><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['a']->value['picture'][0];?>
" width="120" height="90" onload="mle.img_auto_size(this)" /></a></li>
					<li class="t_text"><a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['title_format'];?>
</a></li>
				</ul>
				<?php }} ?>
			</div>
		</div>
	</div>
</div>

<!-- 友情链接 -->
<div class="links">
	<ul>
		<li class="heading"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][9];?>
</li>
		<li class=""></li>
		<li class="add_link"><a href="<?php echo misc::get_url('links');?>
" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][10];?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/modify.gif" width="13" height="13" /></a></li>
		<li class="more_link"><a href="<?php echo misc::get_url('links');?>
" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['title'][11];?>
"><img src="<?php echo $_smarty_tpl->getVariable('web')->value['path'];?>
images/more.gif" width="42" height="20" /></a></li>
	</ul>
	<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = misc::links(30,2); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
	<ol><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['weburl'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['n']->value['webname'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['n']->value['logourl'];?>
" width="88" height="31" border="0" /></a></ol>
	<?php }} ?>
</div>

<?php $_template = new Smarty_Internal_Template('component_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>
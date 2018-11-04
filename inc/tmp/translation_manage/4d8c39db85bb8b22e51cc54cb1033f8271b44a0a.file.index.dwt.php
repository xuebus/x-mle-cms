<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:48:48
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/index.dwt" */ ?>
<?php /*%%SmartyHeaderCode:100955bd9c0d05314d8-56703362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d8c39db85bb8b22e51cc54cb1033f8271b44a0a' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/index.dwt',
      1 => 1337169870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100955bd9c0d05314d8-56703362',
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
<style type="text/css">
.center_top{border-bottom:1px #CCC solid; height:30px; padding:0 0 0 10px; font-weight:bold; background:url(../inc/templates/manage/images/content_box_bg.gif) #F6F6F6; width:100%;}
.center{margin:10px auto;}
.center .news{width:100%;}
.center .news .news_top{border-bottom:1px #CCC solid; height:30px; padding:0 0 0 10px; font-weight:bold; background:url(../inc/templates/manage/images/content_box_bg.gif) #F6F6F6; width:100%;}
.center .news .row{padding:5px 10px 15px 10px;}
.center .news .row table{width:100%;}
.center .news .row table td{height:30px; line-height:30px; background:url(../inc/templates/manage/images/0101.gif) repeat-x bottom; padding:0 0 0 10px;}
.center .news .row table td a:hover{color:#F00; text-decoration:underline;}
.welcome{padding:0 10px;}
.welcome td{word-break:break-all;} /* 防止禁用的函数过多导致表格变形 */
.server td{height:30px; line-height:30px; padding:0 0 0 10px;}
.attention,.information{margin:0 0 10px 0;}
.attention a,.information a{text-decoration:underline; color:#F00;}
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
			<tr>
				<td class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][0];?>
</td>
				<td>
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="error rounded top_error hide" id="client_security"></div>
		<table class="table center" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top">
					<table cellpadding="0" cellspacing="1" border="0" width="100%" class="rounded">
						<tr>
						<tr>
							<td class="center_top"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][38];?>
</td>
						</tr>
						<td class="welcome">
								<table cellpadding="0" cellspacing="0" border="0" class="server" width="100%">
									<tr><td><?php echo (($_smarty_tpl->getVariable('lang')->value['page'][12]).($_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['username'])).($_smarty_tpl->getVariable('lang')->value['page'][13]);?>
<a href="login.php?action=logout"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][14];?>
</a></td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][15];?>
<?php if ($_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['level']==1){?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][16];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page'][17];?>
<?php }?> &nbsp;&nbsp;&nbsp; <?php echo $_smarty_tpl->getVariable('lang')->value['page'][18];?>
<span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['frequency'];?>
</span><?php echo $_smarty_tpl->getVariable('lang')->value['page'][19];?>
</td></tr>
									<?php if ($_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['logintime'][2]>1){?><tr><td>
									<?php echo $_smarty_tpl->getVariable('lang')->value['page'][42];?>
<?php echo date('Y-m-d H:i:s',$_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['logintime'][2]);?>
 , <?php echo $_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['loginaddress'][2];?>

									<?php }?></td></tr>
									<?php if ($_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['logintime'][1]>1){?><tr><td>
									<?php echo $_smarty_tpl->getVariable('lang')->value['page'][20];?>
<?php echo date('Y-m-d H:i:s',$_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['logintime'][1]);?>
 , <?php echo $_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['loginaddress'][1];?>

									<?php }?></td></tr>
									<?php if ($_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['logintime'][0]>1){?><tr><td>
									<?php echo $_smarty_tpl->getVariable('lang')->value['page'][20];?>
<?php echo date('Y-m-d H:i:s',$_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['logintime'][0]);?>
 , <?php echo $_smarty_tpl->getVariable('mle')->value['session']['admin']['login']['loginaddress'][0];?>

									</td></tr><?php }?>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][21];?>
MLECMS <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
 <?php echo $_smarty_tpl->getVariable('mle')->value['edition'];?>
 (<?php echo $_smarty_tpl->getVariable('mle')->value['release'];?>
)
									<span class="green"><?php if ($_smarty_tpl->getVariable('mle')->value['authorization']){?><?php echo $_smarty_tpl->getVariable('lang')->value['page']['22'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['page']['23'];?>
<?php }?></span></td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page']['24'];?>
<span id="mle_new_version"><img src="../inc/templates/manage/images/wait.gif" width="16" height="16" border="0" /></span></td></tr>
									<tr><td>Smarty Version：<a target="_blank" href="http://www.smarty.net/"><?php echo $_smarty_tpl->getVariable('mle')->value['smarty_version'];?>
</a></td></tr>
									<tr><td>jQuery Version：<a target="_blank" href="http://www.jquery.com/"><script type="text/javascript">document.write($.fn.jquery)</script></a></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="1" border="0" width="100%" class="rounded" style="margin:10px 0;">
						<tr>
							<td class="center_top"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][25];?>
</td>
						</tr>
						<tr>
							<td class="welcome">
								<table cellpadding="0" cellspacing="0" border="0" class="server" width="100%">
									<tr></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][26];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['SERVER']['SERVER_SOFTWARE'];?>
 &nbsp; <a target="_blank" href="app.php?a=phpinfo"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][27];?>
</a></td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][28];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['PHP_VERSION'];?>
</td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][29];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['MySQL_VERSION'];?>
</td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][30];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['gd_info'];?>
</td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][32];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['upload_max'];?>
</td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][33];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['post_max'];?>
</td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][34];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['script_file'];?>
</td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][35];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['zend'];?>
</td></tr>
									<tr><td><?php echo $_smarty_tpl->getVariable('lang')->value['page'][36];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['disable_functions'];?>
</td></tr>
								</table>								
							</td>
						</tr>
					</table>
					<?php if (!$_smarty_tpl->getVariable('mle')->value['authorization']){?><div class="information rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page'][37];?>
</div><?php }?>
				</td>
				<td width="10"></td>
				<td width="280" valign="top">
					<table class="news rounded" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td class="news_top" colspan="2"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][1];?>
</td>
						</tr>
						<tr>
							<td class="row">
								<table cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td><a href="member_manage.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][3];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['members'];?>
</a></td>
										<td width="10"></td>
										<td><a href="article_manage.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][4];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['article'];?>
</a></td>
									</tr>
									<tr>
										<td><a href="product_manage.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][5];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['product'];?>
</a></td>
										<td></td>
										<td><a href="picture_manage.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][6];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['picture'];?>
</a></td>
									</tr>
									<tr>
										<td><a href="download_manage.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][7];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['download'];?>
</a></td>
										<td></td>
										<td><a href="guestbook_manage.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][8];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['guestbook'][0];?>
/<?php if ($_smarty_tpl->getVariable('mle')->value['count']['guestbook'][1]>0){?><span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['count']['guestbook'][1];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mle')->value['count']['guestbook'][1];?>
<?php }?></a></td>
									</tr>
									<?php if (module::is_install('PL012x')){?><!-- /// 评论插件是否安装 -->
									<tr>
										<td><a href="comment_manage.php?type=1&audit=2"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][43];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][1][0];?>
</a></td>
										<td></td>
										<td><a href="comment_manage.php?type=1&audit=0"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][44];?>
<?php if ($_smarty_tpl->getVariable('mle')->value['count']['comment'][1][1]>0){?><span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][1][1];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][1][1];?>
<?php }?></a></td>
									</tr>
									<tr>
										<td><a href="comment_manage.php?type=2&audit=2"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][45];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][2][0];?>
</a></td>
										<td></td>
										<td><a href="comment_manage.php?type=2&audit=0"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][44];?>
<?php if ($_smarty_tpl->getVariable('mle')->value['count']['comment'][2][1]>0){?><span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][2][1];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][2][1];?>
<?php }?></a></td>
									</tr>
									<tr>
										<td><a href="comment_manage.php?type=3&audit=2"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][46];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][3][0];?>
</a></td>
										<td></td>
										<td><a href="comment_manage.php?type=3&audit=0"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][44];?>
<?php if ($_smarty_tpl->getVariable('mle')->value['count']['comment'][3][1]>0){?><span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][3][1];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][3][1];?>
<?php }?></a></td>
									</tr>
									<tr>
										<td><a href="comment_manage.php?type=4&audit=2"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][47];?>
<?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][4][0];?>
</a></td>
										<td></td>
										<td><a href="comment_manage.php?type=4&audit=0"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][44];?>
<?php if ($_smarty_tpl->getVariable('mle')->value['count']['comment'][4][1]>0){?><span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][4][1];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mle')->value['count']['comment'][4][1];?>
<?php }?></a></td>
									</tr>
									<?php }?>
									<tr>
										<td colspan="3">
											<a href="log.php"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][9];?>
<?php if ($_smarty_tpl->getVariable('mle')->value['count']['un_log']>1000){?><span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['count']['un_log'];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mle')->value['count']['un_log'];?>
<?php }?></a>
											<?php if ($_smarty_tpl->getVariable('mle')->value['count']['un_log']>1000){?> &nbsp;&nbsp;&nbsp;<a href="index.php?action=unlog" class="red"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][11];?>
</a><?php }?>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											<a href="index.php?action=clear"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][40];?>
</a>
											<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page'][41];?>
">
										</td>
									</tr>
									<!--
									<tr>
										<td colspan="3">
											<?php echo $_smarty_tpl->getVariable('lang')->value['page'][10];?>
<span class="red"><?php echo $_smarty_tpl->getVariable('mle')->value['count']['un_tmp'];?>
</span>
											<?php if ($_smarty_tpl->getVariable('mle')->value['count']['un_tmp']>0){?>&nbsp;&nbsp;&nbsp;<a href="index.php?action=untmp"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][11];?>
</a><?php }?>
										</td>
									</tr>
									-->
								</table>
							</td>
						</tr>
					</table>
					<table class="news rounded" style="margin:10px auto;" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td class="news_top"><?php echo $_smarty_tpl->getVariable('lang')->value['page'][2];?>
</td>
						</tr>
						<tr>
							<td id="client_news" class="row"><img src="../inc/templates/manage/images/loading.gif" width="32" height="32" style="margin:50px auto 50px 120px;" /></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
<script type="text/javascript">
$('.server tr:odd').addClass('odd'); $('.server tr:even').addClass('even');
mle.title2div('title2div');	
</script>
</body>
</html>
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 23:15:08
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/html_make.dwt" */ ?>
<?php /*%%SmartyHeaderCode:48205bd9c6fcf16899-37651244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11024b5caf8df88f1079070e959383a9338c6f12' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/html_make.dwt',
      1 => 1324443384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48205bd9c6fcf16899-37651244',
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
<link rel="stylesheet" type="text/css" href="../inc/templates/manage/css/datepicker.css" />
<script type="text/javascript" src="../inc/script/jquery.js"></script>
<script type="text/javascript" src="../inc/templates/manage/js/common.js"></script>
<script type="text/javascript" src="../inc/templates/manage/js/datepicker.js"></script>
<style type="text/css">
#html_make_info{line-height:25px; text-align:center; padding:20px 0;} /* 进度消息显示 */
#html_make_action{text-align:center; line-height:25px; padding:28px 0; font-size:14px; background:url(../inc/templates/manage/images/progress.gif) center 0 no-repeat;} /* 操作 */
.make_error_info{color:#F00; padding:0 0 20px 0; overflow:hidden;} /* 生成出错、进程意外终止信息显示样式 */
.current_make_info{color:#060; font-size:14px;} /* 正在生成信息样式 */
.current_make_info .submit{margin:5px auto 0 auto;}
.current_make_info span{font-family:georgia; font-weight:bold; color:#F00; font-size:14px;} /* 数字 */
.other_t{padding:0 20px 0 0; overflow:hidden;}
.shortcut_button{display:block; float:left; margin:0 10px 0 0 ; width:128px; height:44px; font-size:13px; line-height:34px; text-align:center; color:black; text-decoration:none; background:url(../inc/templates/manage/images/background.gif) no-repeat;}
.shortcut_button:hover{background:url(../inc/templates/manage/images/background-hover.gif) no-repeat; color:white;}
.content_id{display:none;}
</style>
<script type="text/javascript">
$(function(){
	mle.title2div('title2div');	
	mle.alternately('list');
	$('.content_date').datepicker();
	mle.keysubmit('form_html','submit',true);
});
// 全选、取消全选
function as(t,n){if($(t).attr('checked')){$('input[name="'+n+'"]').attr('checked',true);}else{$('input[name="'+n+'"]').attr('checked',false);}}
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
<?php echo $_smarty_tpl->getVariable('mle')->value['title_lang'];?>
</td>
			</tr>
		</table>
		<?php if ($_smarty_tpl->getVariable('mle')->value['show_status']=='make'){?><!-- 显示进度及操作按钮 -->
		<table cellpadding="0" cellspacing="0" border="0" class="table">
			<tr><td id="html_make_info"><!-- 消息区 --></td></tr>
			<tr><td id="html_make_action"><!-- 操作区 --></td></tr>
		</table>
		<?php }else{ ?> <!-- 显示提交表单 -->
		<table class="table"><tr><td height="30" valign="bottom"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][0];?>
</strong></td></tr></table>
		<table class="table rounded" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td style="padding:10px 10px 0 10px;">
					<a href="html_make.php?action=fast&event=homepage" class="shortcut_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][1];?>
</a>
					<a href="html_make.php?action=fast&event=whole" class="shortcut_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][2];?>
</a>
					<a href="html_make.php?action=fast&event=article" class="shortcut_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][3];?>
</a>
					<a href="html_make.php?action=fast&event=product" class="shortcut_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][4];?>
</a>
					<a href="html_make.php?action=fast&event=photo" class="shortcut_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][5];?>
</a>
					<a href="html_make.php?action=fast&event=download" class="shortcut_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][6];?>
</a>
					<a href="html_make.php?action=fast&event=other" class="shortcut_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['fast'][7];?>
</a>
				</td>
			</tr>
		</table>
		<form action="" method="post" name="form_html" id="form_html">
		<!-- 所有频道 -->
		<table class="table"><tr><td height="30" valign="bottom"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][0];?>
</strong></td></tr></table>
		<table class="list td_align rounded" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="field_head" width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][1];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][2];?>
</td>
				<td class="field_head"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][3];?>
</td>
				<td class="field_head"><input name="" type="checkbox" value="" onclick="as(this,'pathhome[]')" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][4];?>
</td>
				<td class="field_head"><input name="" type="checkbox" value="" onclick="as(this,'pathcategory[]')" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][5];?>
</td>
				<td class="field_head"><input name="" type="checkbox" value="" onclick="as(this,'pathcontent[]')" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][6];?>
</td>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['channel_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
			<?php if ($_smarty_tpl->tpl_vars['n']->value['pathhome']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['n']) || !is_array($_smarty_tpl->tpl_vars['n']->value)) $_smarty_tpl->createLocalArrayVariable('n', null, null);
$_smarty_tpl->tpl_vars['n']->value['pathhome'] = 'html/{PID}/index.html';?><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['n']->value['pathcategory']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['n']) || !is_array($_smarty_tpl->tpl_vars['n']->value)) $_smarty_tpl->createLocalArrayVariable('n', null, null);
$_smarty_tpl->tpl_vars['n']->value['pathcategory'] = 'html/{PID}/{CID}.html';?><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['n']->value['pathcontent']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['n']) || !is_array($_smarty_tpl->tpl_vars['n']->value)) $_smarty_tpl->createLocalArrayVariable('n', null, null);
$_smarty_tpl->tpl_vars['n']->value['pathcontent'] = 'html/{PID}/{Y}{M}/{ID}.html';?><?php }?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['n']->value['pathhome'];?>
 <a href="channel_update.php?id=<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><img src="../inc/templates/manage/images/operation/edit.png" class="title2div" title="<?php echo ($_smarty_tpl->getVariable('lang')->value['page']['channel'][7]).($_smarty_tpl->tpl_vars['n']->value['pathhome']);?>
<br /><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['channel'][8]).($_smarty_tpl->tpl_vars['n']->value['pathcategory']);?>
<br /><?php echo ($_smarty_tpl->getVariable('lang')->value['page']['channel'][9]).($_smarty_tpl->tpl_vars['n']->value['pathcontent']);?>
" /></a></td>
				<td><input name="pathhome[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['n']->value['show']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][10];?>
</td>
				<td><input name="pathcategory[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['n']->value['show']==1){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][10];?>
</td>
				<td><input name="pathcontent[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['n']->value['module'];?>
,<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'][10];?>
</td>
			</tr>
			<?php }} ?>
		</table>
		
		<!-- 生成其它页面 -->
		<table class="table" cellpadding="0" cellspacing="1" border="0">
			<tr><td height="30" valign="bottom"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][0];?>
</strong></td></tr>
			<tr>
				<td height="40" valign="top">
					<table>
						<tr>
							<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['other_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
							<td><input name="other_make[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['n']->value[1];?>
" <?php if ($_smarty_tpl->tpl_vars['n']->value[2]){?>checked<?php }?> /></td>
							<td class="other_t"><?php echo $_smarty_tpl->tpl_vars['n']->value[0];?>
</td>
							<?php }} ?>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		<!-- 按ID或时间生成 -->
		<table class="table top_line" cellpadding="0" cellspacing="1" border="0">
			<tr><td height="30" valign="bottom"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][1];?>
</strong></td></tr>
			<tr>
				<td height="40" valign="top">
					<table>
						<tr>
							<td height="40"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][2];?>
</td>
							<td>
								<select name="content_module" class="select rounded">
									<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['content_module']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?><?php if ($_smarty_tpl->tpl_vars['n']->value['type']==1){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['n']->value['modcode'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['modname'];?>
</option>
									<?php }?><?php }} ?>
								</select>
							</td>
							<td>
								<select name="content_type" class="select rounded" onchange="if ($(this).val() == 'id'){$('.content_date').hide(); $('.content_id').show();} else {$('.content_date').show(); $('.content_id').hide();}">
									<option value="date" selected="selected"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][3];?>
</option>
									<option value="id"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][4];?>
</option>
								</select>
							</td>
							<td> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][5];?>
 </td>
							<td>
								<input name="date_start" type="text" class="input rounded content_date" size="10" readonly="readonly" />
								<input type="text" name="id_start" class="input rounded content_id" value="" size="10" />
							</td>
							<td> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][6];?>
 </td>
							<td>
								<input name="date_end" type="text" class="input rounded content_date" value="<?php echo date('Y-m-d');?>
" size="10" readonly="readonly" />
								<input type="text" name="id_end" class="input rounded content_id" value="9999999" size="10" />
							</td>
							<td><?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][7];?>
</td>
						</tr>
						<tr>
							<td class="dark_gray" colspan="8" height="25" valign="top"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['other'][8];?>
</td>
						</tr>
					</table>
				</td>
			</tr>		
		</table>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"><input type="hidden" name="action" value="make" /></td>
				<td><a class="submit reset" href="javascript:form_html.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
</a></td>
			</tr>
		</table>		
		</form>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('admin')->value['information']){?><div class="information rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['information'];?>
</div><?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
<?php if ($_smarty_tpl->getVariable('mle')->value['show_status']=='make'){?>
<iframe src="../app.php?a=html" width="0" height="0" scrolling="no" frameborder="0" name="html_make_frame" id="html_make_frame"></iframe>
<script type="text/javascript">
// 获取框架当前动态URL，用于重新尝试或跳过用
var iframe_src,make_url,make_data,t_info;
var frame_capture = setInterval(function(){
	iframe_src = html_make_frame.location.href;
	make_url = iframe_src.substring(0,iframe_src.indexOf('html_make_data=') + 15); // 截取URL中的前非数据部分，类似 http://www.abc.com/a.php?
	make_data = iframe_src.substring(iframe_src.indexOf('html_make_data=') + 15); // 截取URL中的生成数据，类似 1,0,6,0,1 字串
	t_info = '如果长时间没有反应，可能是网络问题或页面出错，请选择：<br />';
	t_info += '<a target="html_make_frame" href="' + iframe_src + '">再次尝试</a>&nbsp;|&nbsp;';
	make_data = make_data.split(',');
//	make_data[1] = parseInt(make_data[1]) + 1; // 跳过当前，下一文件
//	make_data[2] = parseInt(make_data[2]) - 1; // 成功文件减 1
	make_data[4] = parseInt(make_data[4]) + 1; // 跳过文件加 1
	make_data = make_data.join(',');
	t_info += '<a target="html_make_frame" href="../app.php?a=html&html_make_data='+ make_data +'">跳过当前页</a>&nbsp;|&nbsp;';
	t_info += '<a target="_blank" href="' + (make_url.substring(0,iframe_src.indexOf('html_make_data=') - 1)) + '">查看动态页</a>&nbsp;|&nbsp;';
	t_info += '<a href="html_make.php">强行中止</a>';
	
	$('#html_make_action').html(t_info);
},1000);
// 取消定时器，子框架中应用
function clear_time(){clearInterval(frame_capture);}
</script>
<?php }?>
</body>
</html>
<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:57:50
         compiled from "D:/soft/wamp/www/upload/inc/templates/manage/product_update.dwt" */ ?>
<?php /*%%SmartyHeaderCode:259355bd9c2ee08d026-72068209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba66d404bfd39a0b3e1c18cf0b9e79ca470cc4fd' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/manage/product_update.dwt',
      1 => 1369640806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259355bd9c2ee08d026-72068209',
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
<script type="text/javascript" src="../inc/script/color_select.js"></script>
<script type="text/javascript" src="../inc/tools/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../inc/templates/manage/js/datepicker.js"></script>
<script type="text/javascript">
var items = <?php echo $_smarty_tpl->getVariable('mle')->value['product']['items_'];?>
; //图片张数
//图片配置缺省值，PHP字串转Js数组
var picture = new Array(<?php echo $_smarty_tpl->getVariable('mle')->value['product']['picture_config_js'];?>
); 
//修改时，多图片URL转成js数组
var picture_url = new Array(<?php echo $_smarty_tpl->getVariable('mle')->value['product']['picture_js'];?>
);
// 多图上传及裁切设置
// var ,1减，2加，其它参数没有变化
function sheets(val){
	items = (val==1 && items > 1) ? items - 1 : ((val == 2 && items <= 30) ? items + 1 : items);
	var upload = '';
	var cut = '';
	for(i=0; i<items; i++){
		upload += '<div class="upload"><ul>';
		//添加图片上传数量时保留原上传的表单数据
		if($('#picture'+i).val() != undefined) picture_url[i] = $('#picture'+i).val();

		<?php if ($_smarty_tpl->getVariable('mle')->value['action']=='update'){?>
		if (picture_url[i] != ''){
			upload += '<li class="upload_pre"><img src="../inc/templates/manage/images/operation/picture.png" width="16" height="16" class="title2div" title="<img width=180 src=../'+  picture_url[i] +' />" /></li>';
		} else {
			upload += '<li class="upload_pre"><img src="../inc/templates/manage/images/operation/disabled.png" width="16" height="16" /></li>';
		}
		<?php }?>
		
		upload += '<li><input type="text" title="" class="input rounded" name="picture_url[]" id="picture'+ i +'" size="20" value="'+ picture_url[i] +'" /></li>';
		upload += '<li><iframe src="upload.php?dir=product&preview=upload_preview&return_id=picture'+ i +'" width="183" height="30" border="0" scrolling="no" frameborder="0"></iframe></li><li>';
		if(i == 0){
			upload += '<a href="javascript:sheets(2);"><img src="../inc/templates/manage/images/operation/add_2.png" width="16" height="16" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['add_upload'];?>
" /></a>&nbsp;';
			upload += '<a href="javascript:sheets(1);"><img src="../inc/templates/manage/images/operation/cut_2.png" width="16" height="16" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['del_upload'];?>
" /></a>';
		}
		upload += '</li></ul></div>';
		
		//裁切及水印参数
		cut += '<div class="upload"><ul><li><?php echo $_smarty_tpl->getVariable('lang')->value['page']['section'][0];?>
 '+ (i+1) +' <?php echo $_smarty_tpl->getVariable('lang')->value['page']['section'][1];?>
&nbsp;</li>';
		cut += picture[i][0] == 1 ? '<li><input name="picture_cut['+i+']" type="checkbox" checked value="1" /> ' : '<li><input name="picture_cut['+i+']" type="checkbox" value="1" /> ';
		cut += '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['section'][2];?>
 <input name="picture_width['+i+']" type="text" value="'+ picture[i][1] +'" size="5" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['section'][3];?>
 <input name="picture_height['+i+']" type="text" value="'+ picture[i][2] +'" size="5" /> Px&nbsp;</li>';
		cut += picture[i][3] == 1 ? '<li><input name="picture_watermark['+i+']" type="checkbox" checked value="1" /> ' : '<li><input name="picture_watermark['+i+']" type="checkbox" value="1" /> ';
		cut += '<?php echo $_smarty_tpl->getVariable('lang')->value['page']['section'][4];?>
&nbsp;</li><li>';
		if(i == 0) cut += '<a target="_blank" href="set_picture.php"><img src="../inc/templates/manage/images/operation/hammer_screwdriver.png" width="16" height="16" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['section'][5];?>
" /></a>';
		cut += '</li></ul></div>';
	}
	$('#items').html(upload);
	$('#cut').html(cut);
	if(val != 0) $('.upload_pre').hide(); //点击增、减按钮隐藏图片预览图标
}
var top_error_isshow = false;
function detect(){
	if($('#category').val() == ''){
		mle.top_error('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['detect'][0];?>
');
		top_error_isshow = true;
		return false;
	}
	
	if($('#title').val() == ''){
		mle.top_error('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['detect'][1];?>
');
		top_error_isshow = true;
		return false;
	}
	if($('#aid').val()!=''){
		if($('#aid').val().match(/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/) == null){
			mle.top_error('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['aid_title'];?>
');
			top_error_isshow = true;
			return false;
		}//检查aid格式
	}	
	return true;
}
$(function(){
	sheets(0);
	mle.alternately('list');
	mle.keysubmit('form_product','submit','detect()');
	mle.title2div('title2div');	
	<?php if ($_smarty_tpl->getVariable('mle')->value['action']=='add'){?>$('#tag').change(function(){$('#keyword').val($(this).val())	});<?php }?>
	mle.option();
	CKEDITOR.replace('content');
	$("#addtime").datepicker();
	$('form input,form select,form textarea').change(function(){
		if(top_error_isshow){
			$('.top_error').fadeTo(400,0,function(){$(this).slideUp(400);});
			top_error_isshow = false;
		}
	});		
})
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
				<td>
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td><a href="javascript:void(0);" class="basic_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['basic'];?>
</a></td>
							<td><a href="javascript:void(0);" class="advanced_button"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['advanced'];?>
</a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="error rounded top_error hide"><ol></ol><span></span></div>
		<form name="form_product" id="form_product" action="" method="post">
		<div id="basic">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<?php if ($_smarty_tpl->getVariable('mle')->value['channel_show']){?>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'];?>
</td>
				<td colspan="3">
					<select class="select rounded" onchange="window.open(this.options[this.selectedIndex].value,'_self')" size="1"><?php echo $_smarty_tpl->getVariable('mle')->value['product']['channel_text'];?>
</select> <span class="red">*</span>
					<a href="channel_update.php"><img src="../inc/templates/manage/images/operation/add.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel_add'];?>
"></a>								
				</td>
				<td class="field">{:$p['channel']:}、{:$p['channel_id']:}</td>			
			</tr>
			<?php }?>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['category'];?>
</td>
				<td colspan="3">
					<select name="category" id="category" class="select rounded" style="font-family:'Courier New',Courier,monospace;"><?php echo $_smarty_tpl->getVariable('mle')->value['product']['nexus_text'];?>
</select> <span class="red">*</span>
					<a href="category_update.php?channel=<?php echo $_smarty_tpl->getVariable('mle')->value['get']['channel'];?>
"><img src="../inc/templates/manage/images/operation/add.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['category_add'];?>
"></a>
				</td>
				<td class="field">{:$p['category']:}、{:$p['category_id']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['full_title'];?>
</td>
				<td colspan="3">
					<input type="text" name="title" id="title" class="input rounded rule" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['title'];?>
" size="58" maxlength="255" /> <span class="red">*</span>
				</td>
				<td class="field">{:$p['title']:}、{:$p['title_format']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['brief'];?>
</td>
				<td colspan="3">
					<input type="text" name="brief" class="input rounded rule" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['brief'];?>
" size="40" maxlength="50" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['brief_title'];?>
">
				</td>
				<td class="field">{:$p['brief']:}、{:$p['brief_format']:}</td>			
			</tr>
            <tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['aid'];?>
</td>
				<td colspan="3">
					<input name="aid" id="aid" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['aid'];?>
" size="15" class="input rounded" />				
					<select name="aid_often" size="0" class="select rounded" style="width:145px; overflow:hidden;" onChange="document.getElementById('aid').value=this.value; this.selectedIndex=0;">
						<option value="" selected="selected"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['aid_option'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['product_aid_often']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['n']->value['aid'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['aid'];?>
</option>
						<?php }} ?>
					</select>
                   	<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['aid_title'];?>
">
				</td>
				<td class="field">{:$p['aid']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['virtual'][0];?>
</td>
				<td colspan="3">
					<input name="virtual" type="radio" value="0"  <?php if ($_smarty_tpl->getVariable('mle')->value['product']['virtual']=='0'){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page']['virtual'][1];?>
 &nbsp;&nbsp;  
					<input name="virtual" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['virtual']=='1'){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page']['virtual'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['virtual_title'];?>
">				
				</td>
				<td class="field">{:$p['virtual']:}</td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['attribute'];?>
</td>
				<td colspan="3">
					<?php echo $_smarty_tpl->getVariable('lang')->value['page']['color'];?>
 <input id="mycolor" name="color" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['color'];?>
" size="7" maxlength="7" class="input rounded iColorPicker" style="text-transform:uppercase;" /> &nbsp;&nbsp;&nbsp;
					<input name="bold" type="checkbox" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['bold']){?>checked="checked"<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['bold'];?>
 &nbsp;
				</td>
				<td class="field">{:$p['color']:}、{:$p['bold']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['model'];?>
</td>
				<td colspan="3"><input name="model" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['model'];?>
" size="40"  maxlength="50" /></td>
				<td class="field">{:$p['model']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['market'];?>
</td>
				<td><input name="market" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['market'];?>
" size="7"  maxlength="10" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['yuan'];?>
</td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['price'];?>
</td>
				<td>
					<input name="price" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['price'];?>
" size="7"  maxlength="10" /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['yuan'];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['price_title'];?>
">				
				</td>
				<td class="field">{:$p['market']:}、{:$p['price']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['inventory'];?>
</td>
				<td><input name="inventory" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['inventory'];?>
" size="7" maxlength="10" /></td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['sales'];?>
</td>
				<td><input name="sales" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['sales'];?>
" size="7" /></td>
				<td class="field">{:$p['inventory']:}、{:$p['sales']:}</td>			
			</tr>			
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['units'];?>
</td>
				<td colspan="3">
					<input name="units" id="units" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['units'];?>
" size="7" maxlength="20" /> 
					<select name="units_often" size="0" class="select rounded" onChange="document.getElementById('units').value=this.value; this.selectedIndex=0;">
						<option value="" selected="selected"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['select'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mle')->value['units_often']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['n']->value['units'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['units'];?>
</option>
						<?php }} ?>
					</select>
				</td>
				<td class="field">{:$p['units']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['tag'];?>
</td>
				<td colspan="3">
					<input name="tag" id="tag" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['tag'];?>
" size="40"  maxlength="100" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['tag_title'];?>
">
				</td>
				<td class="field">{:$p['tag']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload'];?>
</td>
				<td colspan="3" id="items"></td>
				<td class="field"><div id="upload_preview">{:$p['picture'][n]:} <?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload_title'];?>
</div></td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['cut'];?>
</td>
				<td colspan="3" id="cut"></td>
				<td class="field"><em>NULL</em></td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword'];?>
</td>
				<td colspan="3"><input name="keyword" id="keyword" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['keyword'];?>
" size="40" maxlength="100" /></td>
				<td class="field">{:$p['keyword']:}</td>			
			</tr>			
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['introduction'];?>
</td>
				<td colspan="3">
					<textarea class="rounded" name="introduction" style="width:300px; height:50px; padding:5px;"><?php echo $_smarty_tpl->getVariable('mle')->value['product']['introduction'];?>
</textarea>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['introduction_title'];?>
">
				</td>
				<td class="field">{:$p['introduction']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['make'][0];?>
</td>
				<td colspan="3"><input name="make_html" type="checkbox" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['static']==2){?>checked<?php }else{ ?>disabled="disabled"<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['make'][1];?>
</td>
				<td class="field">{:$a['make_html']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['page'][0];?>
</td>
				<td colspan="3">
					<input name="page" type="radio" value="0"  <?php if ($_smarty_tpl->getVariable('mle')->value['product']['page']=='0'){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page']['page'][1];?>
 &nbsp;&nbsp;  
					<input name="page" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['page']=='1'){?>checked<?php }?> /><?php echo $_smarty_tpl->getVariable('lang')->value['page']['page'][2];?>
 &nbsp;&nbsp;
					<input name="page" type="radio" value="2" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['page']>1){?>checked<?php }?> id="auto_page" /><?php echo $_smarty_tpl->getVariable('lang')->value['page']['page'][3];?>

					<input name="page_size" type="text" maxlength="5" onclick="$('#auto_page').attr('checked','checked')" value="<?php if ($_smarty_tpl->getVariable('mle')->value['product']['page']>1){?><?php echo $_smarty_tpl->getVariable('mle')->value['product']['page'];?>
<?php }else{ ?>2000<?php }?>" size="5" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['page_title'];?>
">
				</td>
				<td class="field">{:$a['page']:}</td>			
			</tr>
			<tr>
				<td colspan="5" style="height:540px;">
					&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('lang')->value['page']['content'];?>
 <span class="field">{:$p['content']:}</span><br /><br />
					<textarea id="content" name="content"><?php echo $_smarty_tpl->getVariable('mle')->value['product']['content'];?>
</textarea><br />
				</td>
			</tr>
		</table>
		</div>
		<div id="advanced" style="display:none;">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['brand'];?>
</td>
				<td colspan="3"><input name="brand" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['brand'];?>
" size="40" class="input rounded" maxlength="50" /></td>
				<td class="field">{:$p['brand']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['coding'];?>
</td>
				<td colspan="3"><input name="coding" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['coding'];?>
" size="40" class="input rounded" maxlength="50" /></td>
				<td class="field">{:$p['coding']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['speci'];?>
</td>
				<td colspan="3"><input name="speci" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['speci'];?>
" size="40" class="input rounded" maxlength="50" /></td>
				<td class="field">{:$p['speci']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['optional'];?>
</td>
				<td colspan="3">
					<input name="optional" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['optional'];?>
" size="40" class="input rounded" maxlength="255" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['optional_title'];?>
">
				</td>
				<td class="field">{:$p['optional']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template'];?>
</td>
				<td colspan="3">
					<input name="template" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['template'];?>
" size="20" class="input rounded" maxlength="50" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template_title'];?>
">
				</td>
				<td class="field">{:$p['template']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['comment'][0];?>
</td>
				<td colspan="3">
					<input name="comment" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['comment']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['comment'][1];?>
 &nbsp;&nbsp;  
					<input name="comment" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['comment']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['comment'][2];?>

				</td>
				<td class="field">{:$p['comment']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'][0];?>
</td>
				<td colspan="3">
					<input name="recom" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['recom']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'][1];?>
 &nbsp;&nbsp;  
					<input name="recom" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['recom']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'][2];?>
				
				</td>
				<td class="field">{:$p['recom']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['published'][0];?>
</td>
				<td colspan="3">
					<input name="published" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['published']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['published'][1];?>
 &nbsp;&nbsp;  
					<input name="published" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['published']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['published'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['published_title'];?>
">
				</td>
				<td class="field">{:$p['published']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][0];?>
</td>
				<td colspan="3">
					<input name="status" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['status']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][1];?>
 &nbsp;&nbsp;  
					<input name="status" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['status']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['status'][2];?>

					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['status_title'];?>
">
				</td>
				<td class="field">{:$p['status']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['audit'][0];?>
</td>
				<td colspan="3">
					<input name="audit" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['audit']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['audit'][1];?>
 &nbsp;&nbsp;  
					<input name="audit" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['product']['audit']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['audit'][2];?>
				
				</td>
				<td class="field">{:$p['audit']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['permission'];?>
</td>
				<td colspan="3">
					<select name="permission[]" class="rounded" style="width:205px; height:80px;" multiple id="select"><?php echo $_smarty_tpl->getVariable('mle')->value['product']['permission_text'];?>
</select>				
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['permission_title'];?>
">
				</td>
				<td class="field">{:$p['permission']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['filename'];?>
</td>
				<td colspan="3">
					<input name="filename" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['filename'];?>
" size="20" maxlength="50" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['filename_title'];?>
">
				</td>
				<td class="field">{:$p['filename']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['click'];?>
</td>
				<td><input name="click" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['click'];?>
" size="7" maxlength="10" /></td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['favorite'];?>
</td>
				<td><input name="favorite" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['favorite'];?>
" size="7" maxlength="10" /></td>
				<td class="field">{:$p['click']:}、{:$p['favorite']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['money'];?>
</td>
				<td>
					<input name="money" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['money'];?>
" size="7" maxlength="10" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['money_title'];?>
">
				</td>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['integral'];?>
</td>
				<td>
					<input name="integral" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['integral'];?>
" size="7" maxlength="10" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['integral_title'];?>
">
				</td>				
				<td class="field">{:$p['money']:}、{:$p['integral']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['buyuser'];?>
</td>
				<td colspan="3">
					<textarea name="buyuser" style="width:300px; height:40px; padding:5px;" class="rounded"><?php echo $_smarty_tpl->getVariable('mle')->value['product']['buyuser'];?>
</textarea>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['buyuser_title'];?>
">
				</td>
				<td class="field">{:$p['buyuser']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['sort'];?>
</td>
				<td colspan="3">
					<input name="sort" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['sort'];?>
" size="20" maxlength="10" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['sort_title'];?>
">
				</td>
				<td class="field">{:$p['sort']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['addtime'];?>
</td>
				<td colspan="3"><input name="addtime" type="text" class="input rounded" id="addtime" value="<?php echo $_smarty_tpl->getVariable('mle')->value['product']['addtime'];?>
" size="20" maxlength="10" readonly="readonly" /></td>
				<td class="field">{:$p['addtime']:}</td>			
			</tr>
		</table>
		</div>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"><input type="hidden" name="action" value="<?php echo $_smarty_tpl->getVariable('mle')->value['action'];?>
" /></td>
				<td><a class="submit reset" href="javascript:form_product.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
</a></td>
			</tr>
		</table>		
		</form>
		<?php if ($_smarty_tpl->getVariable('admin')->value['information']){?>
			<div class="information rounded"><ol></ol>
				1、<?php echo $_smarty_tpl->getVariable('lang')->value['page']['notes'][0];?>
<br />
				2、<?php echo $_smarty_tpl->getVariable('lang')->value['page']['notes'][1];?>

			</div>
		<?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
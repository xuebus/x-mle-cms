<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:49:35
         compiled from "D:/soft/wamp/www/x-mle-cms/inc/templates/manage/picture_update.dwt" */ ?>
<?php /*%%SmartyHeaderCode:229325bd9c0ff7b0bb2-57015198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a84c86d7edc42c3c5f9aa1525696b65c235a9998' => 
    array (
      0 => 'D:/soft/wamp/www/x-mle-cms/inc/templates/manage/picture_update.dwt',
      1 => 1319352802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229325bd9c0ff7b0bb2-57015198',
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
var items = <?php echo $_smarty_tpl->getVariable('mle')->value['picture']['items_'];?>
; //图片张数
//图片配置缺省值，PHP字串转Js数组
var picture = new Array(<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['picture_config_js'];?>
); 

//修改时，多图片URL转成js数组
var picture_url = new Array(<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['picture_js'];?>
);

//修改时，图片描述转成js数组
var description = new Array(<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['description_js'];?>
);

//修改时，图片预览URL转换
var img_html = new Array(<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['img_html_js'];?>
);

// 多图上传及裁切设置
// var ,1减，2加，其它参数没有变化
function sheets(val){
	items = (val==1 && items > 1) ? items - 1 : ((val == 2 && items <= 50) ? items + 1 : items);
	var upload = '';
	var cut = '';
	var pic = '';
	for(i=0; i<items; i++){
		upload += '<div class="upload"><ul>';
		//添加、减少图片上传数量时保留原上传的表单数据
		if($('#picture'+i).val() != undefined) picture_url[i] = $('#picture'+i).val();

		<?php if ($_smarty_tpl->getVariable('mle')->value['action']=='update'){?>
		if (picture_url[i] != ''){
			upload += '<li class="upload_pre"><img src="../inc/templates/manage/images/operation/picture.png" width="16" height="16" class="title2div" title="<img width=180 src=../'+  picture_url[i] +' />" /></li>';
		} else {
			upload += '<li class="upload_pre"><img src="../inc/templates/manage/images/operation/disabled.png" width="16" height="16" /></li>';
		}
		<?php }?>
		
		upload += '<li><input type="text" title="" class="input rounded" name="picture_url[]" id="picture'+ i +'" size="20" value="'+ picture_url[i] +'" /></li>';
		upload += '<li><iframe src="upload.php?dir=picture&preview=pic_preview_'+ i +'&return_id=picture'+ i +'" width="183" height="30" border="0" scrolling="no" frameborder="0"></iframe></li><li>';
		if(i == 0){
			upload += '<a href="javascript:sheets(2);"><img src="../inc/templates/manage/images/operation/add_2.png" width="16" height="16" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['add_upload'];?>
" /></a>&nbsp;';
			upload += '<a href="javascript:sheets(1);"><img src="../inc/templates/manage/images/operation/cut_2.png" width="16" height="16" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['del_upload'];?>
" /></a>';
		}
		upload += '</li></ul></div>';
		
		//图片描述
		if($('#description'+i).val() != undefined) description[i] = $('#description'+i).val(); //添加、减少图片上传数量时保留原文本域数据
		if($('#pic_preview_'+i).html() != undefined) img_html[i] = $('#pic_preview_'+i).html(); //添加、减少图片保存图片预览数据		
		pic += '<div class="divrows"><ul>';
		pic += '<li><textarea name="description[]" id="description'+ i +'" style="width:300px; height:50px; padding:5px;" class="rounded">'+ description[i] +'</textarea></li>';
		pic += '<li id="pic_preview_'+ i +'">'+ img_html[i] +'</li>';
		pic += '<li class="field">{:$pic[\'description\']['+ i +']:}</li>';
		pic += '</ul></div>';
		
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
	$('#pic').html(pic);
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
	
	if($('#aid').val() != '' && $('#aid').val().match(/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/) == null){
		mle.top_error('<?php echo $_smarty_tpl->getVariable('lang')->value['page']['code_warning'];?>
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
		
	return true;
}

$(function(){
	sheets(0);
	mle.alternately('list');
	mle.keysubmit('form_picture','submit','detect()');
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
<style type="text/css">
.upload_preview{width:auto; height:60px;}
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
		<form name="form_picture" id="form_picture" action="" method="post">
		<div id="basic">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<?php if ($_smarty_tpl->getVariable('mle')->value['channel_show']){?>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel'];?>
</td>
				<td>
					<select class="select rounded" onchange="window.open(this.options[this.selectedIndex].value,'_self')" size="1"><?php echo $_smarty_tpl->getVariable('mle')->value['picture']['channel_text'];?>
</select> <span class="red">*</span>
					<a href="channel_update.php"><img src="../inc/templates/manage/images/operation/add.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['channel_add'];?>
"></a>								
				</td>
				<td class="field">{:$pic['channel']:}、{:$pic['channel_id']:}</td>			
			</tr>
			<?php }?>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['category'];?>
</td>
				<td>
					<select name="category" id="category" class="select rounded" style="font-family:'Courier New',Courier,monospace;"><?php echo $_smarty_tpl->getVariable('mle')->value['picture']['nexus_text'];?>
</select> <span class="red">*</span>
					<a href="category_update.php?channel=<?php echo $_smarty_tpl->getVariable('mle')->value['get']['channel'];?>
"><img src="../inc/templates/manage/images/operation/add.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['category_add'];?>
"></a>
				</td>
				<td class="field">{:$pic['category']:}、{:$pic['category_id']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['full_title'];?>
</td>
				<td>
					<input type="text" name="title" id="title" class="input rounded rule" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['title'];?>
" size="58" maxlength="255" /> <span class="red">*</span>
				</td>
				<td class="field">{:$pic['title']:}、{:$pic['title_format']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['brief'];?>
</td>
				<td>
					<input type="text" name="brief" class="input rounded rule" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['brief'];?>
" size="40" maxlength="50" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['brief_title'];?>
">
				</td>
				<td class="field">{:$pic['brief']:}、{:$pic['brief_format']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['attribute'];?>
</td>
				<td>
					<?php echo $_smarty_tpl->getVariable('lang')->value['page']['color'];?>
 <input id="mycolor" name="color" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['color'];?>
" size="7" maxlength="7" class="input rounded iColorPicker" style="text-transform:uppercase;" /> &nbsp;&nbsp;&nbsp;
					<input name="bold" type="checkbox" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['picture']['bold']){?>checked="checked"<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['bold'];?>
 &nbsp;
				</td>
				<td class="field">{:$pic['color']:}、{:$pic['bold']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['code'];?>
</td>
				<td>
					<input name="aid" id="aid" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['aid'];?>
" size="20" maxlength="30" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['code_title'];?>
">
				</td>
				<td class="field">{:$pic['aid']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['tag'];?>
</td>
				<td>
					<input name="tag" id="tag" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['tag'];?>
" size="40" maxlength="100" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['tag_title'];?>
">
				</td>
				<td class="field">{:$pic['tag']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload'];?>
</td>
				<td id="items"></td>
				<td class="field"><div id="upload_preview">{:$pic['picture'][n]:} <?php echo $_smarty_tpl->getVariable('lang')->value['page']['upload_title'];?>
</div></td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['description'];?>
</td>
				<td id="pic" colspan="2"></td>
			</tr>			
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['cut'];?>
</td>
				<td id="cut"></td>
				<td class="field"><em>NULL</em></td>
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['keyword'];?>
</td>
				<td><input name="keyword" id="keyword" type="text" class="input rounded" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['keyword'];?>
" size="40" maxlength="100" /></td>
				<td class="field">{:$pic['keyword']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['make'][0];?>
</td>
				<td><input name="make_html" type="checkbox" value="1" <?php if ($_smarty_tpl->getVariable('config')->value['static']==2){?>checked<?php }else{ ?>disabled="disabled"<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['make'][1];?>
</td>
				<td class="field">{:$a['make_html']:}</td>			
			</tr>		
			<tr>
				<td colspan="3" style="height:540px;">
					&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('lang')->value['page']['content'];?>
 <span class="field">{:$pic['content']:}</span>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['content_title'];?>
"><br /><br />
					<textarea id="content" name="content"><?php echo $_smarty_tpl->getVariable('mle')->value['picture']['content'];?>
</textarea><br />
				</td>
			</tr>
		</table>
		</div>
		<div id="advanced" style="display:none;">
		<table class="list" cellpadding="0" cellspacing="1" border="0">
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['author'];?>
</td>
				<td><input name="author" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['author'];?>
" size="40" class="input rounded" maxlength="50" /></td>
				<td class="field">{:$pic['author']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['source'];?>
</td>
				<td><input name="source" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['source'];?>
" size="40" class="input rounded" maxlength="50" /></td>
				<td class="field">{:$pic['source']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['sourceurl'];?>
</td>
				<td><input name="sourceurl" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['sourceurl'];?>
" size="40" class="input rounded" maxlength="50" /></td>
				<td class="field">{:$pic['sourceurl']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['template'];?>
</td>
				<td>
					<input name="template" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['template'];?>
" size="20" class="input rounded" maxlength="50" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['template_title'];?>
">
				</td>
				<td class="field">{:$pic['template']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['comment'][0];?>
</td>
				<td>
					<input name="comment" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['picture']['comment']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['comment'][1];?>
 &nbsp;&nbsp;  
					<input name="comment" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['picture']['comment']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['comment'][2];?>

				</td>
				<td class="field">{:$pic['comment']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'][0];?>
</td>
				<td>
					<input name="recom" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['picture']['recom']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'][1];?>
 &nbsp;&nbsp;  
					<input name="recom" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['picture']['recom']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['recom'][2];?>
				
				</td>
				<td class="field">{:$pic['recom']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['audit'][0];?>
</td>
				<td>
					<input name="audit" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('mle')->value['picture']['audit']=='1'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['audit'][1];?>
 &nbsp;&nbsp;  
					<input name="audit" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('mle')->value['picture']['audit']=='0'){?>checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('lang')->value['page']['audit'][2];?>
				
				</td>
				<td class="field">{:$pic['audit']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['permission'];?>
</td>
				<td>
					<select name="permission[]" class="rounded" style="width:205px; height:80px;" multiple id="select"><?php echo $_smarty_tpl->getVariable('mle')->value['picture']['permission_text'];?>
</select>				
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['permission_title'];?>
">
				</td>
				<td class="field">{:$pic['permission']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['filename'];?>
</td>
				<td>
					<input name="filename" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['filename'];?>
" size="20" maxlength="50" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['filename_title'];?>
">
				</td>
				<td class="field">{:$pic['filename']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['click'];?>
</td>
				<td><input name="click" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['click'];?>
" size="20" maxlength="10" /></td>
				<td class="field">{:$pic['click']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['money'];?>
</td>
				<td>
					<input name="money" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['money'];?>
" size="20" maxlength="10" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['money_title'];?>
">
				</td>
				<td class="field">{:$pic['money']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['integral'];?>
</td>
				<td>
					<input name="integral" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['integral'];?>
" size="20" maxlength="10" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['integral_title'];?>
">
				</td>
				<td class="field">{:$pic['integral']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['buyuser'];?>
</td>
				<td>
					<textarea name="buyuser" style="width:300px; height:40px; padding:5px;" class="rounded"><?php echo $_smarty_tpl->getVariable('mle')->value['picture']['buyuser'];?>
</textarea>
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['buyuser_title'];?>
">
				</td>
				<td class="field">{:$pic['buyuser']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['sort'];?>
</td>
				<td>
					<input name="sort" class="input rounded" type="text" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['sort'];?>
" size="20" maxlength="10" />
					<img src="../inc/templates/manage/images/operation/help.png" width="16" height="16" class="title2div" title="<?php echo $_smarty_tpl->getVariable('lang')->value['page']['sort_title'];?>
">
				</td>
				<td class="field">{:$pic['sort']:}</td>			
			</tr>
			<tr>
				<td class="name"><?php echo $_smarty_tpl->getVariable('lang')->value['page']['addtime'];?>
</td>
				<td><input name="addtime" type="text" class="input rounded" id="addtime" value="<?php echo $_smarty_tpl->getVariable('mle')->value['picture']['addtime'];?>
" size="20" readonly="readonly" maxlength="10" /></td>
				<td class="field">{:$pic['addtime']:}</td>			
			</tr>
		</table>
		</div>
		<table class="table top_line">
			<tr>
				<td align="right" height="60"><a id="submit" class="submit" href="#"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['submit'];?>
</a></td>
				<td width="80"><input type="hidden" name="action" value="<?php echo $_smarty_tpl->getVariable('mle')->value['action'];?>
" /></td>
				<td><a class="submit reset" href="javascript:form_picture.reset();"><?php echo $_smarty_tpl->getVariable('lang')->value['common']['reset'];?>
</a></td>
			</tr>
		</table>		
		</form>
		<?php if ($_smarty_tpl->getVariable('admin')->value['information']){?><div class="information rounded"><ol></ol><?php echo $_smarty_tpl->getVariable('lang')->value['page']['information'];?>
</div><?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template('component_footer.dwt', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
</body>
</html>
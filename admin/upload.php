<?php
/*
* Copyright © 2010-2013 MLECMS. All Rights Reserved.
* @Multi-Language Enterprise Content Management System
* This Is Not a Freeware, Use Is Subject To License Terms.
*/
require_once(dirname(__FILE__).'/header.php');
@set_time_limit(0);
$_GET['annex'] == 1 or $_GET['annex'] = 0;
(empty($_GET['return_id']) || empty($_GET['dir'])) && die('Parameter Error.'); 
$cpurl = 'upload.php?';
foreach($_GET as $i => $n){
	$cpurl .= $i.'='.$n.'&';
}
$cpurl = rtrim($cpurl,'&');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.file{border:1px #CCC solid; font-size:12px; width:180px; height:27px; line-height:27px; background:#FFF; -moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;}
body,form{padding:0; margin:0; font-size:12px;}
div{padding:5px 0 0 10px;}
div a{color:#666;}
</style>
<script type="text/javascript">
window.onerror = function(){return true;}
function uploads(){
	document.getElementById('upload').submit();
	document.body.innerHTML = '<div><img border="0" width="16" height="16" src="../inc/templates/manage/images/wait.gif" /></div>';
}
</script>
</head>
<body>
<?php
if(!empty($_FILES['field'])){ 
	$upload = new upload();
	$upload->save_dir = "../inc/uploads/{$_GET['dir']}/";
	$upload->ispics = $_GET['annex'] == 1 ? false : true; 
	$upload->annex_type = $config['upload']['type'];
	$upload->max_annex_size = $config['upload']['max_annex'];
	$upload->max_pics_size = $config['upload']['max_picture'];
	$upload->save_son_dir = $config['upload']['date_dir'] == 1 ? true : false;
	$upload->naming = $config['upload']['naming'];
	$upload->new_filename = empty($_GET['fixed']) ? 'Auto' : $_GET['fixed'];
	if($upload->perform()){ 
		$url = str_replace('../','',$upload->URL);
		echo '<script language="javascript">';
		echo 'parent.document.getElementById("'.$_GET['return_id'].'").value = "'.$url.'";';
		list($ad_width, $ad_height) = getimagesize("../".$url); 
		if(!empty($_GET['preview'])){ 
			echo 'parent.document.getElementById("'.$_GET['preview'].'").innerHTML = "<img border=\'0\' src=\'../'.$url.'\' class=\'upload_preview\' />";';
			echo 'parent.document.getElementById(\'ad_width\').value = "'.$ad_width.'";';
			echo 'parent.document.getElementById(\'ad_height\').value = "'.$ad_height.'";';
		}
		echo '</script>';
		die('<div><a href="'.$cpurl.'"><img border="0" width="16" height="16" title="文件上传成功，点击重新上传。" src="../inc/templates/manage/images/operation/accept.png" /></a><div>');
	} else {
		echo '<script language="javascript">alert("'.$upload->info.'");</script>';	
		die('<div><a href="'.$cpurl.'"><img border="0" title="'.$upload->info.'" width="16" height="16" src="../inc/templates/manage/images/operation/exclamation_2.png" /></a><div>');
	}
} else { 
	echo '<form name="upload" id="upload" method="post" action="" enctype="multipart/form-data"><input type="file" onchange="uploads();" class="file" name="field" /></form>';
}
?>
<script type="text/javascript">
function uploads(){
	document.getElementById('upload').submit();
	document.body.innerHTML = '<div><img border="0" width="16" height="16" src="../inc/templates/manage/images/wait.gif" /></div>';
}
</script>
</body>
</html>
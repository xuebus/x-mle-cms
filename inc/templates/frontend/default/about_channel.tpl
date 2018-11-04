{:$a = array_shift(article::data(2,1,0,$mle['channel_id'])):}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{:$mle['channel']['seotitle']:}</title>
<base href="{:$config['url']:}">
<meta name="keywords" content="{:$mle['channel']['seokey']:}" />
<meta name="description" content="{:$mle['channel']['seodescr']:}" />
<meta name="copyright" content="2009-2011 MLECMS {:$mle['version']:}" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/article.css" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/language_{:$web['lang']:}.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="app.php?a=hits&id={:$a['id']:}"></script>
</head>
<body>
{:include file='component_header.tpl':}
<div class="box">
	<div class="frame_side">
		<div class="left_head"></div>
		<div class="menu_box">
			<ol class="menu_top"></ol>
			{:foreach article::data(2,30,0,$mle['channel_id']) as $c:}
			<ol class="menu_middle">
				<img src="{:$web['path']:}images/common2.gif" width="9" height="15" />
				<a href="{:$c['URL']:}">{:$c['title']:}</a>
			</ol>
			{:/foreach:}
			<ol class="menu_bottom"></ol>
		</div>
		<div class="left_footer"></div>
	</div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title">{:cut_str($a['title'],40,''):}</ol>
			<ol class="location">{:$lang['page']['location']:}<a href="./">{:$lang['page']['home']:}</a> &gt;&gt; <a href="{:misc::get_url('channel',1,$mle['channel_id']):}">{:$mle['channel_title']:}</a> &gt;&gt; {:$a['title']:}</ol>
		</div>
		<div class="content_common">
			{:if $a['page'] > 0:}{:$a['content'] = misc::content_page($a['content'],$a['page'],$a['id']):}{:/if:}{:*<!--内容分页，如果不需要对内容进行分页时可以删除-->*:}
			{:$a['content']:}		
		</div>
		
		{:*<!--内容分页、启用了内容分时显示，可以删除 -->*:}
		{:if $a['page'] > 0:}{:include file='component_page_style.tpl':}{:/if:}
	</div>
</div>
{:include file='component_footer.tpl':}
</body>
</html>
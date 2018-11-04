<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{:$mle['category']['seotitle']:}</title>
<base href="{:$config['url']:}">
<meta name="keywords" content="{:$mle['category']['seokey']:}" />
<meta name="description" content="{:$mle['category']['seodescr']:}" />
<meta name="copyright" content="2009-2011 MLECMS {:$mle['version']:}" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/photo.css" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/language_{:$web['lang']:}.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
</head>
<body>
{:include file='component_header.tpl':}
<!-- 有子类时显示子类 -->
{:$sub = category::data(3,0,$mle['category']['id'],$mle['category']['level']+1):}
{:if $sub:}{:foreach $sub as $n:}<div class="classify"><a href="{:$n['URL']:}">{:$n['title']:}</a>{:if $n['next_level']:}&nbsp;|&nbsp;{:/if:}{:/foreach:}</div>{:/if:}

<div class="position">
	<div class="titlebar">
		<ol class="title">{:$mle['category']['title']:}</ol>
		<ol class="location">{:$lang['page']['location']:}<a href="./">{:$lang['page']['home']:}</a> &gt;&gt; <a href="{:misc::get_url('channel',3,$mle['channel_id']):}">{:$mle['category']['channel']:}</a> &gt;&gt; {:category::cid2name($mle['category']['nexus'],' &gt;&gt; ',true):}</ol>
	</div>
</div>

<!-- 列表 - 带分页 -->
<div class="list">
	{:foreach photo::data(0,20,0,0,$mle['category']['id'],0,0,0,0,1) as $pic:}
	<ul>
		<li class="pic"><a href="{:$pic['URL']:}" title="{:$pic['title']:}" target="_blank"><img src="{:$pic['picture'][0]:}" alt="{:$pic['title']:}" width="135" height="90" border="0" onload="mle.img_auto_size(this)" /></a></li>
		<li class="txt"><a href="{:$pic['URL']:}" title="{:$pic['title']:}" target="_blank">{:$pic['title_format']:}</a></li>
	</ul>
	{:foreachelse:}
	<div class="notdata">{:$lang['page']['notdata']:}</div>
	{:/foreach:}
</div>
<div class="opppage">{:include file='component_page_style.tpl':}</div>
{:include file='component_footer.tpl':}
</body>
</html>
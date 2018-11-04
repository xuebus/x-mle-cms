<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{:$web['title']:}</title>
<base href="{:$config['url']:}">
<meta name="copyright" content="2009-2011 MLECMS {:$mle['version']:}" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/search.css" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/language_{:$web['lang']:}.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
</head>
<body>
<div class="top{:if $mle['search_keyword'] == '':} nosearch{:/if:}">
	<div class="logo"><img src="{:$web['logo']:}" /></div>
	<div class="form">
		<div class="type">
			<a href="{:$mle['search_type_url']:}1"{:if $mle['search_type'] == 1:} class="current"{:/if:}>{:$lang['page']['type'][0]:}</a>　
			<a href="{:$mle['search_type_url']:}2"{:if $mle['search_type'] == 2:} class="current"{:/if:}>{:$lang['page']['type'][1]:}</a>　
			<a href="{:$mle['search_type_url']:}3"{:if $mle['search_type'] == 3:} class="current"{:/if:}>{:$lang['page']['type'][2]:}</a>　
			<a href="{:$mle['search_type_url']:}4"{:if $mle['search_type'] == 4:} class="current"{:/if:}>{:$lang['page']['type'][3]:}</a>
		</div>
		<div class="input">
		<form name="search" method="get" action="">
			<ol class="word"><input type="text" name="word" value="{:$mle['search_keyword']:}" maxlength="30" /></ol>
			<ol class="submit"><input type="submit" name="" value="{:$lang['page']['submit']:}" /><input type="hidden" name="type" value="{:$mle['search_type']:}" /></ol>
		</form>
		</div>
	</div>
	<div class="login">
		<a href="./">{:$lang['page']['home']:}</a>&nbsp;&nbsp;|&nbsp;
		{:nocache:}{:if $mle['is_login']:}<a href="member/center.php">{:$mle['user']['username']:}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="member/login.php?action=logout">{:$lang['page']['logout']:}</a>{:else:}<a href="{:misc::url('login'):}">{:$lang['page']['login']:}</a>{:/if:}{:/nocache:}
	</div>
</div>
{:foreach $mle['search_data'] as $i => $n:}
<div class="data">
	{:if file_exists($n['picture'][0]):}<div class="image"><ol><a target="_blank" href="{:$n['URL']:}" title="{:$n['title']:}"><img src="{:$n['picture'][0]:}" width="100" height="75" onload="mle.img_auto_size(this)" alt="{:$n['title']:}" /></a></ol></div>{:/if:}
	<div class="cntent">
		<ol class="title"><a target="_blank" href="{:$n['URL']:}" title="{:$n['title']:}">{:$n['title_format']:}</a></ol>
		<ol class="text{:if $n['picture'][0] == '':} nophoto{:/if:}">{:$n['content_format']:}</ol>
		<ol class="url">{:$n['URL']:} &nbsp;&nbsp;&nbsp; {:$n['addtime']:} &nbsp;&nbsp;&nbsp; Hits:{:$n['click']:} {:if $mle['search_is_tag']:}&nbsp;&nbsp;&nbsp; TAG:{:$n['tag']:}{:/if:}</ol>
	</div>
</div>
{:foreachelse:}
{:if $mle['search_keyword'] != '':}<div class="notdata">{:str_replace('{#keyword}',$mle['search_keyword'],$lang['page']['no_data']):}</div>{:/if:}
{:/foreach:}
{:include file='component_page_style.tpl':}
<div class="footer" {:if $mle['search_keyword'] == '':}style="text-align:center;"{:/if:}>
	This Is Not a Freeware, Use Is Subject To License Terms.<br />
	Copyright © 2010 <a target="_blank" href="http://www.mlecms.com">mlecms</a>. All Rights Reserved.<br />
	{:nocache:}Processed in {:page_run_time():} second(s), {:db_query_count():} queries<br />{:/nocache:}
</div>
{:if $mle['search_keyword'] != '' && count($mle['search_data']) == $page_data['limit']:}<div class="ad">{:ad::show('search_right'):}</div>{:/if:}{:*<!--//// 当搜索结果满一页并且有搜索字符时显示广告 -->*:}
</body>
</html>
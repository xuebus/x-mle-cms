<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{:$mle['category']['seotitle']:}</title>
<base href="{:$config['url']:}">
<meta name="keywords" content="{:$mle['category']['seokey']:}" />
<meta name="description" content="{:$mle['category']['seodescr']:}" />
<meta name="copyright" content="2009-2011 MLECMS {:$mle['version']:}" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/product.css" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/language_{:$web['lang']:}.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/script/shopping.js"></script>
<script type="text/javascript">
mle.shopping.language['add_failed'] = "{:$lang['page']['add_failed']:}";
mle.shopping.language['sid_exists'] = "{:$lang['page']['sid_exists']:}";
mle.shopping.language['sid_success'] = "{:$lang['page']['sid_success']:}";
</script>
</head>
<body>
{:include file='component_header.tpl':}
{:* 有子类时显示 *:}
{:$sub = category::data(0,0,$mle['category']['id'],$mle['category']['level']+1):}
{:if $sub:}<div class="classify">{:foreach $sub as $n:}<a href="{:$n['URL']:}">{:$n['title']:}</a>{:if $n['next_level']:}&nbsp;|&nbsp;{:/if:}{:/foreach:}</div>{:/if:}
<div class="box">
	<div class="frame_side">{:include file='component_product.tpl':}</div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title">{:$mle['category']['title']:}</ol>
			<ol class="location">{:$lang['page']['location']:}<a href="./">{:$lang['page']['home']:}</a> &gt;&gt; <a href="{:misc::get_url('channel',2,$mle['channel_id']):}">{:$mle['category']['channel']:}</a> &gt;&gt; {:category::cid2name($mle['category']['nexus'],' &gt;&gt; ',true):}</ol>
		</div>
		
		{:* 搜索 *:}
		<div class="search">
			<form name="searchform" method="get" target="_blank" action="search.php">
			<span class="left"></span>
			<input class="word" type="text" name="word" id="word" tabindex="5" maxlength="50" value="{:$lang['page']['enter_keywords']:}" onfocus="if(this.value == '{:$lang['page']['enter_keywords']:}'){this.value = '';this.style.color = '#000';}" onblur="if(this.value==''){this.value='{:$lang['page']['enter_keywords']:}';this.style.color = '#999';}" />
			<input class="button" type="submit" name="" tabindex="6" value="{:$lang['page']['search']:}" onclick="if(document.getElementById('word').value == '{:$lang['page']['enter_keywords']:}'){ alert('{:$lang['page']['enter_keywords_msg']:}');return false;}" />
			<input type="hidden" name="type" value="2" />
			</form>
		</div>
		
		{:* 列表 - 带分页 *:}
		{:foreach product::data(0,10,0,0,$mle['category']['id'],0,0,0,0,1,0,0,3) as $p:}
		<div class="list">
			<div class="photo">
				<ol><a href="{:$p['URL']:}" title="{:$p['title']:}"><img src="{:$p['picture'][0]:}" alt="{:$p['title']:}" width="100" height="100" onload="mle.img_auto_size(this)" /></a></ol>
			</div>
			<div class="content">
				<ol class="title"><a href="{:$p['URL']:}" title="{:$p['title']:}">{:$p['title_format']:}</a></ol>
				<ol class="info">
					{:$p['addtime']:}&nbsp;&nbsp;&nbsp;
					{:$lang['page']['hits']|cat:$p['click']:}&nbsp;&nbsp;&nbsp;
					{:if $p['sales']:}{:$lang['page']['sold']|cat:$p['sales']|cat:$p['units']:}&nbsp;&nbsp;&nbsp;{:/if:}
					{:if $p['tag']:}{:$lang['page']['tag']|cat:$p['tag']:}{:/if:}
				</ol>
				<ol class="summary">{:misc::html2txt($p['content'],170):}</ol>
			</div>
			<div class="misc">
				<ol class="price">{:$lang['page']['market']:}<span class="num_market">{:$p['market']:}</span></ol>
				<ol class="price">{:$lang['page']['price']:}<span class="num_price">{:$p['price']:}</span></ol>
			</div>
		</div>
		{:foreachelse:}
		<div class="notdata">{:$lang['page']['notdata']:}</div>
		{:/foreach:}
		{:include file='component_page_style.tpl':}
	</div>
</div>
{:include file='component_footer.tpl':}
</body>
</html>
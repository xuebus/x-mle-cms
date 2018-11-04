<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{:$p['title']:}</title>
<base href="{:$config['url']:}">
<meta name="keywords" content="{:$p['keyword']:}" />
<meta name="description" content="{:$p['introduction']:}" />
<meta name="copyright" content="2009-2011 MLECMS {:$mle['version']:}" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/product.css" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/language_{:$web['lang']:}.css" />
<link rel="stylesheet" type="text/css" href="inc/tools/highslide/highslide.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="inc/script/shopping.js"></script>
<script type="text/javascript" src="inc/tools/highslide/highslide-with-gallery.js"></script>
<script type="text/javascript">
// 购买相关语言
mle.shopping.language['add_failed'] = "{:$lang['page']['add_failed']:}";
mle.shopping.language['sid_exists'] = "{:$lang['page']['sid_exists']:}";
mle.shopping.language['sid_success'] = "{:$lang['page']['sid_success']:}";
</script>
</head>
<body>
{:include file='component_header.tpl':}
<div class="box">
	<div class="frame_side">{:include file='component_product.tpl':}</div>
	<div class="frame_main">
		<div class="titlebar">
			<ol class="title">{:cut_str($p['title'],40,''):}</ol>
			<ol class="location">{:$lang['page']['location']:}<a href="./">{:$lang['page']['home']:}</a> &gt;&gt; <a href="{:misc::get_url('channel',2,$mle['channel_id']):}">{:$p['channel']:}</a> &gt;&gt; {:category::cid2name($p['category_id'],' &gt;&gt; ',true):} &gt;&gt; {:$lang['page']['main']:}</ol>
		</div>
		
		<!-- 搜索 -->
		<div class="search">
			<form name="searchform" method="get" target="_blank" action="search.php">
			<span class="left"></span>
			<input class="word" type="text" name="word" id="word" tabindex="5" maxlength="50" value="{:$lang['page']['enter_keywords']:}" onFocus="if(this.value == '{:$lang['page']['enter_keywords']:}'){this.value = '';this.style.color = '#000';}" onBlur="if(this.value==''){this.value='{:$lang['page']['enter_keywords']:}';this.style.color = '#999';}" />
			<input class="button" type="submit" name="" tabindex="6" value="{:$lang['page']['search']:}" onClick="if(document.getElementById('word').value == '{:$lang['page']['enter_keywords']:}'){ alert('{:$lang['page']['enter_keywords_msg']:}');return false;}" />
			<input type="hidden" name="type" value="2" />
			</form>
		</div>
		
		<!-- 商品基本信息 -->
		{:nocache:}
		<div class="basic">
			<div class="photo">
				<ol class="show">
					<a href="{:$p['picture'][1]:}" title="{:$lang['page']['photo_title']:}" onclick="return hs.expand(this)"><img src="{:$p['picture'][1]:}" width="280" height="300" onload="mle.img_auto_size(this)" /></a>
					{:foreach $p['picture'] as $i => $n:}{:if $i > 1 && file_exists($n):}<a href="{:$n:}" onclick="return hs.expand(this)"></a>{:/if:}{:/foreach:}<br />
				</ol>
				<ol class="related">{:$lang['page']['related']:}<!-- 分享、收藏等扩展保留位 --></ol>
			</div>
			<div class="parameter">
				<ol class="heading">{:$lang['page']['heading']:}</ol>
				<ul class="half">
					<li>{:$lang['page']['price']:}<span class="num_price">{:$p['price']:}</span></li>
					<li>{:$lang['page']['market']:}：<span class="num_market">{:$p['market']:}</span></li>
				</ul>
				<ul class="half">
					<li>{:$lang['page']['inventory']|cat:$p['inventory']|cat:' '|cat:$p['units']:}</li>
					<li>{:$lang['page']['sales']|cat:$p['sales']|cat:' '|cat:$p['units']:}</li>
				</ul>
				<ul class="half">
					<li>{:$lang['page']['model']|cat:$p['model']:}</li>
					<li>{:$lang['page']['speci']|cat:$p['speci']:}</li>
				</ul>
				<ul class="half">
					<li>{:$lang['page']['optional']|cat:$p['optional']:}</li>
					<li>{:$lang['page']['addtime']|cat:$p['addtime']:}</li>
				</ul>
				<ul class="half">
					<li>{:$lang['page']['status'][0]:}{:if $p['status']:}{:$lang['page']['status'][1]:}{:else:}<font color="#FF0000">{:$lang['page']['status'][2]:}</font>{:/if:}</li>
					<li>{:$lang['page']['click']:}<script type="text/javascript" src="app.php?a=hits&type=1&id={:$p['id']:}&show=1"></script></li>
				</ul>
				<ul>
					<li>{:$lang['page']['category']|cat:category::cid2name($p['category_id'],' → ',true):}</li>
				</ul>
				<ul>
					<li>TAG：{:$p['tag']:}</li>
				</ul>
			</div>
		</div>
		{:/nocache:}
		
		<!-- 详细信息 -->
		<div class="details">
			<ol class="heading">{:$lang['page']['details']:}</ol>
			<ol class="content_common">{:$p['content']:}</ol>
		</div>
		
		<!-- 内容分页、启用了内容分页且有1页以上时显示 -->
		{:include file='component_page_style.tpl':}
		
		<div class="share">
			<!-- Baidu Button BEGIN -->
			<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
				<span class="bds_more">{:$lang['page']['share']:}</span>
				<a class="bds_tsina"></a>
				<a class="bds_tqq"></a>
				<a class="bds_qzone"></a>
				<a class="bds_renren"></a>
				<a class="bds_tqf"></a>
				<a class="bds_kaixin001"></a>
				<a class="bds_douban"></a>
				<a class="bds_fbook"></a>
				<a class="shareCount"></a>
			</div>
			<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
				document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
			</script>
			<!-- Baidu Button END -->
		</div>	
		
		<!-- 上一篇、下一篇 -->
		<div class="similar">
			<ol>{:$lang['page']['similar_prev']:}{:if $p['data_prev']['title']:}<a href="{:$p['data_prev']['URL']:}" title="{:$p['data_prev']['title']:}">{:$p['data_prev']['title']:}</a>{:else:}<em>NULL</em>{:/if:}</ol>
			<ol>{:$lang['page']['similar_next']:}{:if $p['data_next']['title']:}<a href="{:$p['data_next']['URL']:}" title="{:$p['data_next']['title']:}">{:$p['data_next']['title']:}</a>{:else:}<em>NULL</em>{:/if:}</ol>
		</div>
		
	</div>
</div>
{:include file='component_footer.tpl':}
</body>
</html>
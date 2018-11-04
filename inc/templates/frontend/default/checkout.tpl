<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{:$lang['page']['title']:}</title>
<base href="{:$config['url']:}">
<meta name="copyright" content="2009-2011 MLECMS {:$mle['version']:}" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/member.css" />
<link rel="stylesheet" type="text/css" href="{:$web['path']:}style/language_{:$web['lang']:}.css" />
<script type="text/javascript" src="inc/script/jquery.js"></script>
<script type="text/javascript" src="inc/script/common.js"></script>
<script type="text/javascript" src="{:$web['path']:}/script/member_checkout.js"></script>
<script type="text/javascript">
var allows_modify = {:if $mle['allows_modify']:}true{:else:}false{:/if:}; // 是否允许修改订单
var d_ = parseFloat({:$mle['shipping']['insure']:}); // 原保价比例
var t_ = parseFloat({:$mle['shipping']['freight']:}); // 原纯手续费
var f_ = parseInt({:$mle['shipping']['topay']:}); // 原是否支付到付，0或1
</script>
</head>
<body>
{:include file='component_header.tpl':}
<div class="box list">
	<div class="titlebar">
		<ol class="title">{:$lang['page']['title']:}</ol>
		<ol class="location">
			{:$lang['page']['location']:}<a href="./">{:$lang['page']['home']:}</a> &gt;&gt;
			<a href="member/center.php">{:$lang['page']['center']:}</a> &gt;&gt;
			<a href="member/order.php">{:$lang['page']['order_manage']:}</a> &gt;&gt;
			{:$lang['page']['title']:}
		</ol>
	</div>
	<div class="caption">
		<ol class="heading">{:$lang['page']['product'][0]:}</ol>
		<ol class="clear"><a href="member/order.php">{:$lang['page']['product'][9]:}</a></ol>
		<ol class="clear">{:if $mle['allows_modify']:}<a onclick="return confirm('{:$lang['page']['return']:}');" href="member/order.php?action=return&id={:$mle['order']['id']:}">{:$lang['page']['product'][1]:}</a>{:/if:}</ol>
	</div>
	<form action="" method="post" name="order">
	<!--商品列表-->
	<div class="order">
		<ul class="head">
			<li class="a">{:$lang['page']['product'][2]:}</li>
			<li class="b">{:$lang['page']['product'][3]:}</li>
			<li class="b">{:$lang['page']['product'][4]:}</li>
			<li class="a">{:$lang['page']['product'][5]:}</li>
			<li class="b">{:$lang['page']['product'][6]:}</li>
		</ul>
		{:$total = 0:}{:$show_virtual = false:}
		{:foreach $mle['order']['pid'] as $e => $id:}
		{:$p = product::data(0,0,0,0,0,$id):}
		{:if $p['virtual'] != 1:}{:$show_virtual = true:}{:/if:}
		<ul>
			<li class="a"><a href="{:$p['URL']:}" target="_blank">{:$p['title']:}</a></li>
			<li class="b">{:$mle['order']['price'][$e]:}</li>
			<li class="b">{:$mle['order']['number'][$e]:}</li>
			<li class="a">{:$mle['order']['attribute'][$e]:}</li>
			<li class="b">
				{:$amount = $mle['order']['price'][$e] * $mle['order']['number'][$e]:}
				{:$total = number_format($total + $amount,2,'.',''):}
				{:number_format($amount,2,'.',''):}			
			</li>
		</ul>
		{:/foreach:}
		<ul class="total">
			<li>
				{:$lang['page']['product'][7]:}
				{:if $mle['order']['discount'] < 10:}
					{:$total:} × {:$lang['page']['product'][8]:}({:$mle['order']['discount']/10:}) =
					{:$total = number_format($total*$mle['order']['discount']/10,2,'.',''):}
				{:/if:}
				<span class="number">{:$total:}</span>
			</li>
		</ul>
	</div>
	
	{:if $show_virtual:} <!--如果购买的商品中有实物(非虚拟)商品时显示配送等信息-->
	<!--收货人信息-->
	<div class="caption">
		<ol class="heading">{:$lang['page']['consignee'][0]:}</ol>
		<ol class="clear"></ol>
	</div>	
	<div class="consignee">
		<ul>
			<li class="a">{:$lang['page']['consignee'][1]:}</li>
			<li class="b"><input type="text" name="consignee" value="{:$mle['order']['consignee']:}" maxlength="50" class="input" /> <span class="red">*</span></li>
			<li class="a">{:$lang['page']['consignee'][2]:}</li>
			<li class="b"><input type="text" name="email" value="{:$mle['order']['email']:}" maxlength="50" class="input" /> <span class="red">*</span></li>
		</ul>
		<ul>
			<li class="a">{:$lang['page']['consignee'][3]:}</li>
			<li class="b"><input type="text" name="address" value="{:$mle['order']['address']:}" maxlength="200" class="input" /> <span class="red">*</span></li>
			<li class="a">{:$lang['page']['consignee'][4]:}</li>
			<li class="b"><input type="text" name="zipcode" value="{:$mle['order']['zipcode']:}" maxlength="20" class="input" /> <span class="red">*</span></li>
		</ul>
		<ul>
			<li class="a">{:$lang['page']['consignee'][5]:}</li>
			<li class="b"><input type="text" name="tel" value="{:$mle['order']['tel']:}" maxlength="30" class="input" /> <span class="red">*</span></li>
			<li class="a">{:$lang['page']['consignee'][6]:}</li>
			<li class="b"><input type="text" name="mobile" value="{:$mle['order']['mobile']:}" maxlength="30" class="input" /></li>
		</ul>
		<ul>
			<li class="a">{:$lang['page']['consignee'][7]:}</li>
			<li class="b"><input type="text" name="besttime" value="{:$mle['order']['besttime']:}" maxlength="100" class="input" /></li>
			<li class="a">{:$lang['page']['consignee'][8]:}</li>
			<li class="b"><input type="text" name="building" value="{:$mle['order']['building']:}" maxlength="50" class="input" /></li>
		</ul>
	</div>
	
	<!--配送方式-->
	<div class="caption">
		<ol class="heading">{:$lang['page']['dispatching'][0]:}</ol>
		<ol class="clear"></ol>
	</div>
	<div class="dispatching">
		<ul class="head">
			<li class="a">{:$lang['page']['dispatching'][1]:}</li>
			<li class="b">{:$lang['page']['dispatching'][2]:}</li>
			<li class="c">{:$lang['page']['dispatching'][3]:}</li>
			<li class="d">{:$lang['page']['dispatching'][4]:}</li>
			<li class="d">{:$lang['page']['dispatching'][5]:}</li>
			<li class="d">{:$lang['page']['dispatching'][6]:}</li>
		</ul>
		{:foreach shopping::get_shipping(1) as $e:}
		<ul>
			<li class="a"><input name="dispatching" type="radio" value="{:$e['id']:}" {:if $mle['order']['dispatching'] == $e['id']:}checked{:/if:} onclick="dispatch({:$e['insure']:},{:$e['topay']:},{:$e['freight']:})" /></li>
			<li class="b">{:$e['title']:}</li>
			<li class="c">{:$e['description']:}</li>
			<li class="d">{:if $e['topay']:}{:$lang['page']['dispatching'][7]:}{:else:}{:$lang['page']['dispatching'][8]:}{:/if:}</li>
			<li class="d">{:if $e['insure'] > 0:}{:number_format(($total * $e['insure']),2,'.',''):}{:else:}{:$lang['page']['dispatching'][8]:}{:/if:}</li>
			<li class="d">{:$e['freight']:}</li>
		</ul>
		{:/foreach:}
		<ul class="options">
			<li id="customer">
				<input name="customer" type="checkbox" value="1" {:if $mle['order']['customer'] == '1':}checked="checked"{:/if:} />{:$lang['page']['dispatching'][9]:}
			</li>
			<li id="vouch">
				<input name="vouch" type="checkbox" value="1" {:if $mle['order']['vouch'] == '1':}checked="checked"{:/if:} />{:$lang['page']['dispatching'][10]:}
			</li>
		</ul>
	</div>
	{:/if:}
	
	<!--订单附言及费用-->
	<div class="parallel">
		<!--计费-->
		<div class="fees">
			<ol class="heading">{:$lang['page']['fees'][0]:}</ol>
			<ol class="info"><strong>{:$lang['page']['fees'][8]:}</strong>{:$mle['order']['oid']:}</ol>
			<ol class="info"><strong>{:$lang['page']['fees'][1]:}</strong>{:$lang['page']['status'][$mle['order']['status']]:}</ol>
			<ol class="info"><strong>{:$lang['page']['fees'][2]:}</strong>{:$mle['order']['addtime']:}</ol>
			<ol class="info"><strong>
				{:$lang['page']['fees'][3]:}</strong>{:$mle['user']['money']:}
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="member/recharge.php?amount={:$mle['order']['amount']:}"><font color="#F00">{:$lang['page']['fees'][7]:}</font></a>
			</ol>
			<ol class="info">
				<strong>{:$lang['page']['fees'][4]:}</strong><span id="total">{:$total:}</span>
			</ol>
			<ol class="info"><strong>{:$lang['page']['fees'][5]:}</strong><span id="freight">{:$mle['order']['freight']:}</span></ol>
			<ol class="info" style="background:none;"><strong>{:$lang['page']['fees'][6]:}</strong><span id="amount" class="number">{:$mle['order']['amount']:}</span></ol>
		</div>
			
		<!--订单附言-->
		<div class="message">
			<ol class="heading">{:$lang['page']['message'][0]:}</ol>
			<ol class="input"><textarea name="message" class="rounded" onkeyup="if(value.length>255){value=value.substr(0,255);}">{:$mle['order']['message']:}</textarea></ol>
			<ol class="reply">
				<strong>{:$lang['page']['message'][1]:}</strong><br />
				{:if $mle['order']['reply'] == '':}<font color="#666666">{:$lang['page']['message'][2]:}</font>
				{:else:}<span style="color:#F00; font-size:13px;">{:$mle['order']['reply']:}</span>{:/if:}
			</ol>
		</div>
	</div>
	
	<!--提交-->
	{:if $mle['allows_modify']:}
	<input name="payment" id="payment" type="hidden" value="0" />
	<div class="submit_order">
		<ol><a href="#" onclick="$('#payment').val(1); order.submit(); return false;">{:$lang['page']['submit'][0]:}</a></ol>
		<ol><a href="#" onclick="order.submit(); return false;">{:$lang['page']['submit'][1]:}</a></ol>
	</div>
	{:/if:}
	</form>
</div>
{:include file='component_footer.tpl':}
</body>
</html>
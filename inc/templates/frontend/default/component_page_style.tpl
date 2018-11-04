{:if $page_data['total_page'] > 1:}
<table class="page_style" align="center" cellpadding="0" cellspacing="0"><tr>
	{:if $page_data['page'] > 1:}
	<td class="effective"><a href="{:$page_data['start_url']:}">{:$lang['common']['start']:}</a></td>
	<td class="space"></td>
	<td class="effective"><a href="{:$page_data['first_url']:}">{:$lang['common']['first']:}</a></td>
	{:else:}
	<td class="invalid">{:$lang['common']['start']:}</td>
	<td class="space"></td>
	<td class="invalid">{:$lang['common']['first']:}</td>
	{:/if:}
	<td class="space"></td>
	{:foreach $page_data['number'] as $i => $n:}
		{:if $i != $page_data['page']:}<td class="numeric"><a href="{:$n:}">{:$i:}</a></td>
		{:else:}<td class="numeric current">{:$i:}</td>{:/if:}
		<td class="space"></td>
	{:/foreach:}	
	{:if $page_data['page'] < $page_data['total_page']:}
	<td class="effective"><a href="{:$page_data['next_url']:}">{:$lang['common']['next']:}</a></td>
	<td class="space"></td>
	<td class="effective"><a href="{:$page_data['end_url']:}">{:$lang['common']['end']:}</a></td>
	{:else:}
	<td class="invalid">{:$lang['common']['next']:}</td>
	<td class="space"></td>
	<td class="invalid">{:$lang['common']['end']:}</td>
	{:/if:}
</tr></table>
{:/if:}
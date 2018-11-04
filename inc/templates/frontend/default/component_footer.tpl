<div class="footer">
{:$web['copyright']:}<br />
{:if $mle['dynamic_mode']:}{:nocache:}Processed in {:page_run_time():} second(s), {:db_query_count():} queries<br />{:/nocache:}{:/if:}
<a target="_blank" href="http://www.mlecms.com">Powered by mlecms {:$mle['version']:} {:$mle['edition']:}</a><br />
<a target="_blank" href="http://www.miibeian.gov.cn">{:$config['icp']:}</a><br />
{:$config['traffic_statistics']:}
</div>
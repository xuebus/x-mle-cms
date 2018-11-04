<?php /* Smarty version Smarty-3.0.9, created on 2018-10-31 22:48:20
         compiled from "D:/soft/wamp/www/upload/inc/templates/frontend/default/component_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39515bd9c0b4d08285-71382742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ee823321df039e7cbbac6225a0474d7f0f72fc2' => 
    array (
      0 => 'D:/soft/wamp/www/upload/inc/templates/frontend/default/component_footer.tpl',
      1 => 1358172676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39515bd9c0b4d08285-71382742',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="footer">
<?php echo $_smarty_tpl->getVariable('web')->value['copyright'];?>
<br />
<?php if ($_smarty_tpl->getVariable('mle')->value['dynamic_mode']){?>Processed in <?php echo page_run_time();?>
 second(s), <?php echo db_query_count();?>
 queries<br /><?php }?>
<a target="_blank" href="http://www.mlecms.com">Powered by mlecms <?php echo $_smarty_tpl->getVariable('mle')->value['version'];?>
 <?php echo $_smarty_tpl->getVariable('mle')->value['edition'];?>
</a><br />
<a target="_blank" href="http://www.miibeian.gov.cn"><?php echo $_smarty_tpl->getVariable('config')->value['icp'];?>
</a><br />
<?php echo $_smarty_tpl->getVariable('config')->value['traffic_statistics'];?>

</div>
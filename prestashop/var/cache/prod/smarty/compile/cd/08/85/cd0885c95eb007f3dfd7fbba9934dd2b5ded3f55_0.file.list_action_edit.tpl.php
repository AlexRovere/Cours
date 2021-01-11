<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-11 11:13:37
  from 'C:\wamp64\www\prestashop\admin159mlocu6\themes\default\template\helpers\list\list_action_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ffc24d1285a62_02479915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd0885c95eb007f3dfd7fbba9934dd2b5ded3f55' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\admin159mlocu6\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1610356886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffc24d1285a62_02479915 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['href']->value,'html','UTF-8' ));?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>

</a>
<?php }
}

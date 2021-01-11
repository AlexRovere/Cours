<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-11 10:36:01
  from 'C:\wamp64\www\prestashop\admin159mlocu6\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ffc1c0103bcf2_00458284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1209e597eae8b85be8f139ab4d0cd78402f9a213' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\admin159mlocu6\\themes\\default\\template\\content.tpl',
      1 => 1610356884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffc1c0103bcf2_00458284 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>

<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}

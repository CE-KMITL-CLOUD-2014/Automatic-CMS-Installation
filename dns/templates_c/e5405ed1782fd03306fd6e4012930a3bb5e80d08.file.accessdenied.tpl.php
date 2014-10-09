<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 14:34:41
         compiled from "../templates/accessdenied.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39850582354300581d64153-43964015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5405ed1782fd03306fd6e4012930a3bb5e80d08' => 
    array (
      0 => '../templates/accessdenied.tpl',
      1 => 1168807717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39850582354300581d64153-43964015',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'reason' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54300581db6ec4_96868190',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54300581db6ec4_96868190')) {function content_54300581db6ec4_96868190($_smarty_tpl) {?><font size="-1" face="Arial,Helvetica">
A general error has occurred. 
<strong>Reason: </strong>
<?php if ($_smarty_tpl->tpl_vars['reason']->value) {?><?php echo $_smarty_tpl->tpl_vars['reason']->value;?>

<?php } else { ?>Perhaps you are trying to view a page that you are not allowed to view, or that one of the filters has detected an injection attack. If you are seeing this message, there's a good chance we haven't written a decent error message yet.
<?php }?>
</font>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 14:34:10
         compiled from "../templates/deletezone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:461606832543005620a0ce8-56214847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdcbf6b68a3d963999313a3bb7161b9c49e7f097' => 
    array (
      0 => '../templates/deletezone.tpl',
      1 => 1168807772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '461606832543005620a0ce8-56214847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'zone' => 0,
    'zoneid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54300562104bb2_08611071',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54300562104bb2_08611071')) {function content_54300562104bb2_08611071($_smarty_tpl) {?><font size="-1" face="Arial,Helvetica">
Please confirm that you wish to delete the zone <strong><?php echo $_smarty_tpl->tpl_vars['zone']->value;?>
</strong>.

<br><br>
All resource records associated with this zone will be deleted.
<br><br>
<a class="class" href="./zonelist.php?i=<?php echo $_smarty_tpl->tpl_vars['zoneid']->value;?>
&amp;delete=y">Yes</a> - <a class="class" href="./zonelist.php">No</a>.
</font>
<?php }} ?>

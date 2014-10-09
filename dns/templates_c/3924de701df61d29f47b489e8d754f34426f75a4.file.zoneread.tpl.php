<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 13:54:53
         compiled from "../templates/zoneread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90268620542ffc2d641bf1-38835182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3924de701df61d29f47b489e8d754f34426f75a4' => 
    array (
      0 => '../templates/zoneread.tpl',
      1 => 1407703805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90268620542ffc2d641bf1-38835182',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'zonelist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542ffc2d70df27_97135552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ffc2d70df27_97135552')) {function content_542ffc2d70df27_97135552($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<font size="-1" face="Arial,Helvetica">
<a class="class" href="./newzone.php">Create a new zone</a>
</font>
<br><br>
<table width="100%"  border="0" cellspacing="1">
  <tr>
    <td><font size="-1" face="Arial,Helvetica"><strong>Name</strong></font></td>
    <td><font size="-1" face="Arial,Helvetica"><strong>Serial</strong></font></td>
    <td><center><font size="-1" face="Arial,Helvetica"><strong>Changed</strong></font></center></td>
    <td><center><font size="-1" face="Arial,Helvetica"><strong>Valid</strong></font></center></td>
    <td><font size="-1" face="Arial,Helvetica"><strong>Delete</strong></font></td>
  </tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['zonelist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
  <tr>
    <td><font size="-1" face="Arial,Helvetica"><a class="class" href="./record.php?i=<?php echo $_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</a></font></td>
    <td><font size="-1" face="Arial,Helvetica"><?php echo $_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['serial'];?>
</font></td>
    <td><center><font size="-1">
<?php if ($_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['updated']=="yes") {?><IMG ALT="YES" WIDTH="20" HEIGHT="20" SRC="../images/yes.png">
<?php } elseif ($_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['updated']=="no") {?><IMG ALT="NO" WIDTH="20" HEIGHT="20" SRC="../images/no.png">
<?php }?>
   </font></center></td>
    <td><center><font size="-1">
<?php if ($_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['valid']=="yes") {?><IMG ALT="YES" WIDTH="20" HEIGHT="20" SRC="../images/yes.png">
<?php } elseif ($_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['valid']=="no") {?><IMG ALT="NO" WIDTH="20" HEIGHT="20" SRC="../images/no.png">
<?php } else { ?><IMG ALT="UNKNOWN" WIDTH="20" HEIGHT="20" SRC="../images/unknown.png">
<?php }?>
   </font></center></td>
    <td><font size="-1" face="Arial,Helvetica"><a class="class" href="./deletezone.php?i=<?php echo $_smarty_tpl->tpl_vars['zonelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">Delete</a></font></td>
  </tr>
<?php endfor; endif; ?>
</table>
<?php echo $_smarty_tpl->getSubTemplate ("pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

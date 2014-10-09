<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 14:56:02
         compiled from "../templates/userlistread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98190785454300a82675ac3-29111702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0b3af290cb3b4b7ba5f54a7760e25c8e492d70d' => 
    array (
      0 => '../templates/userlistread.tpl',
      1 => 1407703893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98190785454300a82675ac3-29111702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54300a82744b80_29822701',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54300a82744b80_29822701')) {function content_54300a82744b80_29822701($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<font size="-1" face="Arial,Helvetica">
<a class="class" href="./newuser.php">Add a new user</a>
</font>
<br><br>
<table width="100%"  border="0" cellspacing="1">
  <tr>
    <td><font size="-1" face="Arial,Helvetica"><strong>Username</strong></font></td>
    <td><center><font size="-1" face="Arial,Helvetica"><strong>Administrator</strong></font></center></td>
    <td><font size="-1" face="Arial,Helvetica"><strong>Delete</strong></font></td>
  </tr>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userlist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
    <td><font face="Arial,Helvetica" size="-1">
<?php if ($_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']!="admin") {?>
<a class="class" href="./user.php?i=<?php echo $_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username'];?>
</a>
<?php } else { ?>
<?php echo $_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username'];?>

<?php }?>
   </font></td>
    <td><center><font face="Arial,Helvetica" size="-1">
<?php if ($_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['admin']=="yes") {?><IMG ALT="YES" WIDTH="20" HEIGHT="20" SRC="../images/yes.png">
<?php } elseif ($_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['admin']=="no") {?><IMG ALT="NO" WIDTH="20" HEIGHT="20" SRC="../images/no.png">
<?php }?>
   </font></center></td>
    <td><font face="Arial,Helvetica" size="-1">
<?php if ($_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username']!="admin") {?>
<a class="class" href="./deleteuser.php?i=<?php echo $_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">Delete</a>
<?php } else { ?>
Delete
<?php }?>
   </font></td>
  </tr>
<?php endfor; endif; ?>
</table>
<?php echo $_smarty_tpl->getSubTemplate ("pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

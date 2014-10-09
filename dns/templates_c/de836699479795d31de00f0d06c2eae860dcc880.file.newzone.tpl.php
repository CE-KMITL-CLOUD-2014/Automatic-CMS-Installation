<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 13:54:55
         compiled from "../templates/newzone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83424210542ffc2f4c8720-77671470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de836699479795d31de00f0d06c2eae860dcc880' => 
    array (
      0 => '../templates/newzone.tpl',
      1 => 1168755957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83424210542ffc2f4c8720-77671470',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pri_dns' => 0,
    'sec_dns' => 0,
    'userlist' => 0,
    'current_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542ffc2f552c81_21311787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ffc2f552c81_21311787')) {function content_542ffc2f552c81_21311787($_smarty_tpl) {?>
<form name="form1" method="post" action="./zonelist.php">
<table width="320"  border="0">
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Zone:</strong></font></div></td>
    <td><input type="text" name="name" class="a1"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Refresh:</strong></font></div></td>
    <td><input type="text" name="refresh" class="a1" value="28800"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Retry:</strong></font></div></td>
    <td><input type="text" name="retry" class="a1" value="7200"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Expire:</strong></font></div></td>
    <td><input type="text" name="expire" class="a1" value="1209600"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Time To Live:</strong></font></div></td>
    <td><input type="text" name="ttl" class="a1" value="86400"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Primary NS: </strong></font></div></td>
    <td><input type="text" name="pri_dns" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['pri_dns']->value;?>
"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Secondary NS:</strong></font></div></td>
    <td><input type="text" name="sec_dns" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['sec_dns']->value;?>
"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Web Server IP:</strong></font></div></td>
    <td><input type="text" name="www" class="a1" value=""></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Mail Server IP:</strong></font></div></td>
    <td><input type="text" name="mail" class="a1" value=""></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>FTP Server IP:</strong></font></div></td>
    <td><input type="text" name="ftp" class="a1" value=""></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Owner: </strong></font></div></td>
    <td><select name="owner" class="a1">
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
		<option value="<?php echo $_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['current_user']->value==$_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username'];?>
</option>
	<?php endfor; endif; ?>
	</select>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="Submit" type="submit" class="a" value="Add zone"></td>
  </tr>
</table>
</form>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 14:56:04
         compiled from "../templates/chpass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43443424054300a844ae892-55462776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a7f534d0ebd47767b907ea349cfddf6693d94d9' => 
    array (
      0 => '../templates/chpass.tpl',
      1 => 1168809929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43443424054300a844ae892-55462776',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54300a844f1963_70816166',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54300a844f1963_70816166')) {function content_54300a844f1963_70816166($_smarty_tpl) {?><form name="form1" method="post" action="./savepass.php">
<table width="320"  border="0">
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Old password:</strong></font></div></td>
    <td><input type="password" name="password_old" class="a1"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>New password:</strong></font></div></td>
    <td><input type="password" name="password_one" class="a1"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Confirm new password:</strong></font></div></td>
    <td><input type="password" name="confirm_password" class="a1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="Submit" type="submit" class="a" value="Save"></td>
  </tr>
</table>
</form>
<?php }} ?>

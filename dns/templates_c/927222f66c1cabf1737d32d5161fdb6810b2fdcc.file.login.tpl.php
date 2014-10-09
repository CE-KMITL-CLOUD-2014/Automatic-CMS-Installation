<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 13:54:44
         compiled from "../templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1619345747542ffc24a18ad9-62631345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '927222f66c1cabf1737d32d5161fdb6810b2fdcc' => 
    array (
      0 => '../templates/login.tpl',
      1 => 1168754266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1619345747542ffc24a18ad9-62631345',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542ffc24a1b205_58187117',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ffc24a1b205_58187117')) {function content_542ffc24a1b205_58187117($_smarty_tpl) {?><form method="post" name="login" action="">
<table align="center">
<tr><td>
	<table align="center">
		<tr>
		   <td align="right"><font face="Arial,Helvetica" size="-1"><strong>Username:</strong></font></td>
		   <td align="left"><input type="text" name="username"></td>
		</tr>
		<tr>
		   <td align="right" width="30%"><font face="Arial,Helvetica" size="-1"><strong>Password:</strong></font></td>
		   <td align="left"><input type="password" name="password"></td>
	    	</tr>
	</table>
</td></tr>
<tr><td>
	<center><input type="submit" name="Submit" value="Login"></center>
</td></tr>
</table>
</form>
<?php }} ?>

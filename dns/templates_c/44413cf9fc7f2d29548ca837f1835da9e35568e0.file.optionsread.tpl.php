<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 16:18:50
         compiled from "../templates/optionsread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171438754554301dea3cf571-14537186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44413cf9fc7f2d29548ca837f1835da9e35568e0' => 
    array (
      0 => '../templates/optionsread.tpl',
      1 => 1168790859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171438754554301dea3cf571-14537186',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'records' => 0,
    'options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54301dea4a08b8_55730016',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54301dea4a08b8_55730016')) {function content_54301dea4a08b8_55730016($_smarty_tpl) {?>
<form name="form1" method="post" action="./options.php">
<font face="Arial,Helvetica" size="-0"><strong>Record Types</strong></font>
<table width="100%"  border="0" cellspacing="1">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['x'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['x']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['name'] = 'x';
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['records']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total']);
?>
	    <tr>
		    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['y'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['y']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['name'] = 'y';
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['records']->value[$_smarty_tpl->getVariable('smarty')->value['section']['x']['index']]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total']);
?>
		<td align="right">
		    <input type="checkbox" name=<?php echo $_smarty_tpl->tpl_vars['records']->value[$_smarty_tpl->getVariable('smarty')->value['section']['x']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['prefkey'];?>
 <?php if ($_smarty_tpl->tpl_vars['records']->value[$_smarty_tpl->getVariable('smarty')->value['section']['x']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['prefval']=="on") {?>checked<?php }?>>
		</td>
		<td align="left">
		   <font face="Arial,Helvetica" size="-1">
		   <?php echo $_smarty_tpl->tpl_vars['records']->value[$_smarty_tpl->getVariable('smarty')->value['section']['x']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['prefkey'];?>

		   </font>
		</td>
		<?php endfor; endif; ?>
	    </tr>
	<?php endfor; endif; ?>
</table>
<table>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['name'] = 'prefkey';
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['options']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['prefkey']['total']);
?>
<tr>
<td align="left"><font face="Arial,Helvetica" size="-0"><strong>
<?php if ($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prefkey']['index']]['prefkey']=="hostmaster") {?>Site Hostmaster Address<?php }?>
<?php if ($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prefkey']['index']]['prefkey']=="range") {?>Items Per Page<?php }?>
<?php if ($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prefkey']['index']]['prefkey']=="prins") {?>Default Primary NS<?php }?>
<?php if ($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prefkey']['index']]['prefkey']=="secns") {?>Default Secondary NS<?php }?>
</strong></font></td>
	<td align="left"><input type="text" size="35" name="<?php echo $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prefkey']['index']]['prefkey'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->getVariable('smarty')->value['section']['prefkey']['index']]['prefval'];?>
"></td>
</tr>
<?php endfor; endif; ?>
</table>
<br><br><center><input type="submit" value="Save"></center><br>
</form>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 14:13:13
         compiled from "../templates/recordread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186770416854300079a4e716-52862905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97e641d9201a439b69618a361d2ee90660cb21b2' => 
    array (
      0 => '../templates/recordread.tpl',
      1 => 1407801171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186770416854300079a4e716-52862905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'zone' => 0,
    'admin' => 0,
    'userlist' => 0,
    'record' => 0,
    'types' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54300079ba5827_77419592',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54300079ba5827_77419592')) {function content_54300079ba5827_77419592($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/usr/share/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<form name="form1" method="post" action="./record.php?i=<?php echo $_smarty_tpl->tpl_vars['zone']->value['id'];?>
">
<table border="0" cellpadding="0" cellspacing="3">
  <tr>
    <td>
<div align="right"><font face="Arial,Helvetica" size="-1"><strong>Zone:</strong></font></div></td>
    <td><font size="-1" face="Arial,Helvetica"><?php echo $_smarty_tpl->tpl_vars['zone']->value['name'];?>
</font></td>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Serial:</strong></font></div></td>
    <td><font size="-1" face="Arial,Helvetica"><?php echo $_smarty_tpl->tpl_vars['zone']->value['serial'];?>
</font></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Refresh:</strong></font></div></td>
    <td><input type="text" name="refresh" size="25" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['refresh'];?>
"></td>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Retry:</strong></font></div></td>
    <td><input type="text" name="retry" size="25" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['retry'];?>
"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>Expire:</strong></font></div></td>
    <td><input type="text" name="expire" size="25" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['expire'];?>
"></td>
<td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>TTL:</strong></font></div></td>
    <td><input type="text" name="ttl" size="25" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['ttl'];?>
"></td>
  </tr>
  <tr>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>NS1:</strong></font></div></td>
    <td><input type="text" name="pri_dns" size="25" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['pri_dns'];?>
"></td>
    <td><div align="right"><font face="Arial,Helvetica" size="-1"><strong>NS2:</strong></font></div></td>
    <td><input type="text" name="sec_dns" size="25" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['sec_dns'];?>
"></td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['admin']->value=="yes") {?>
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
"<?php if ($_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['zone']->value['owner']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['username'];?>
</option>
	<?php endfor; endif; ?>
	</select>
	</td>
  </tr>
  <?php }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<input type="hidden" name="zone" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['name'];?>
">
<input type="hidden" name="zoneid" value="<?php echo $_smarty_tpl->tpl_vars['zone']->value['id'];?>
">
<table border="0" cellpadding="0" cellspacing="3">
  <tr>
    <td><font face="Arial,Helvetica" size="-1"><strong>Host</strong></font></td>
    <td><font face="Arial,Helvetica" size="-1"><strong>Type</strong></font></td>
    <td><font face="Arial,Helvetica" size="-1"><strong>Destination</strong></font></td>
    <td><font face="Arial,Helvetica" size="-1"><strong>Valid</strong></font></td>
    <td><font face="Arial,Helvetica" size="-1"><strong>Delete</strong></font></td>
  </tr>
  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['record']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
    <td>
	<input type="text" name="host[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
]" class="a1" value="<?php echo $_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['host'];?>
" size="16">
	<input type="hidden" name="host_id[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">
    </td>
    <td><select name="type[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
]" class="a1">
      <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['types']->value,'selected'=>$_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type'],'output'=>$_smarty_tpl->tpl_vars['types']->value),$_smarty_tpl);?>

    </select></td>
<?php if ($_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['type']=="MX") {?>
    <td>
	<input type="text" name="pri[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
]" class="a1" size="1" value="<?php echo $_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pri'];?>
">
	<input type="text" name="destination[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
]" class="a1" size="27" value="<?php echo $_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['destination'];?>
">
    </td>
<?php } else { ?>
    <td>
	<input type="text" name="destination[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
]" class="a1" size="32" value="<?php echo $_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['destination'];?>
">
    </td>
<?php }?>
    <td><center>
<?php if ($_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['valid']=="yes") {?><IMG ALT="YES" WIDTH="20" HEIGHT="20" SRC="../images/yes.png">
<?php } elseif ($_smarty_tpl->tpl_vars['record']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['valid']=="no") {?><IMG ALT="NO" WIDTH="20" HEIGHT="20" SRC="../images/no.png">
<?php } else { ?><IMG ALT="UNKNOWN" WIDTH="20" HEIGHT="20" SRC="../images/unknown.png">
<?php }?></center></td>
    <td><center><input type="checkbox" name="delete[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
]" class="a1"></center></td>
  </tr>
<?php endfor; endif; ?>
  <tr>
   <td colspan="3"><hr size="1" noshade></td>
  </tr>
  <tr>
    <td><input type="text" name="newhost" class="a1" size="16"></td>
    <td><select name="newtype" class="a1">
      <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['types']->value,'output'=>$_smarty_tpl->tpl_vars['types']->value),$_smarty_tpl);?>

    </select></td>
    <td><input type="text" name="newdestination" class="a1" size="32"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>
		<input type="hidden" name="total" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['total'];?>
">
		<input name="Submit" type="submit" class="a" value="Save"></td>
  </tr>
</table>
</form>
<?php echo $_smarty_tpl->getSubTemplate ("pages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

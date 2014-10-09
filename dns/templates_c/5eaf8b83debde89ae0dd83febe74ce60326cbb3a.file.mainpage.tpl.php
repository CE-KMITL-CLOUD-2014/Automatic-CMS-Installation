<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 13:54:48
         compiled from "../templates/mainpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:347530054542ffc28aa7582-97340720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eaf8b83debde89ae0dd83febe74ce60326cbb3a' => 
    array (
      0 => '../templates/mainpage.tpl',
      1 => 1168754951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '347530054542ffc28aa7582-97340720',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'admin' => 0,
    'status' => 0,
    'zones' => 0,
    'bad' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542ffc28b3c7f2_60609526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ffc28b3c7f2_60609526')) {function content_542ffc28b3c7f2_60609526($_smarty_tpl) {?><font face="Arial,Helvetica" size="-1">
<strong>Welcome, <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
.</strong>
<?php if ($_smarty_tpl->tpl_vars['admin']->value=="yes") {?> (<u>administrator</u>)<?php }?><br><br>
<?php if ($_smarty_tpl->tpl_vars['status']->value==0) {?>DNS Services are <b>started</b>.<?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>DNS Services are <b>stopped</b>.<?php }?>
You maintain <strong><?php echo $_smarty_tpl->tpl_vars['zones']->value;?>
</strong> zones.<br><br>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['bad']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
<b>WARNING:</b> The following zone contains bad or uncommitted records: <a class="class" href="./record.php?i=<?php echo $_smarty_tpl->tpl_vars['bad']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><b><?php echo $_smarty_tpl->tpl_vars['bad']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</b></a><br>
<?php endfor; endif; ?>
</font>
<?php }} ?>

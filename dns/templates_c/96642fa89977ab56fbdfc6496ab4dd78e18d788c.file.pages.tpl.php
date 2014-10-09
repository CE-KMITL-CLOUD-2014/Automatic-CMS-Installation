<?php /* Smarty version Smarty-3.1.18, created on 2014-10-04 13:54:53
         compiled from "../templates/pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1599438714542ffc2d7141b9-38499056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96642fa89977ab56fbdfc6496ab4dd78e18d788c' => 
    array (
      0 => '../templates/pages.tpl',
      1 => 1168782220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1599438714542ffc2d7141b9-38499056',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pages' => 0,
    'current_page' => 0,
    'page' => 0,
    'page_root' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542ffc2d7b2459_03811119',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ffc2d7b2459_03811119')) {function content_542ffc2d7b2459_03811119($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/usr/share/smarty/plugins/function.math.php';
?><?php if ($_smarty_tpl->tpl_vars['pages']->value) {?><center><font size="-1" face="Arial,Helvetica"><?php }?>
<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['page']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['page']->iteration=0;
 $_smarty_tpl->tpl_vars['page']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
 $_smarty_tpl->tpl_vars['page']->iteration++;
 $_smarty_tpl->tpl_vars['page']->index++;
 $_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->index === 0;
 $_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pages']['first'] = $_smarty_tpl->tpl_vars['page']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pages']['last'] = $_smarty_tpl->tpl_vars['page']->last;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pages']['first']) {?>
                <?php if ($_smarty_tpl->tpl_vars['current_page']->value==$_smarty_tpl->tpl_vars['page']->value) {?>
                        &lt;&lt;First &lt;Previous
                <?php } else { ?>
                        <a class="class" href="<?php echo $_smarty_tpl->tpl_vars['page_root']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">&lt;&lt;First</a>
                        <a class="class" href="<?php echo $_smarty_tpl->tpl_vars['page_root']->value;?>
page=<?php echo smarty_function_math(array('equation'=>((string)$_smarty_tpl->tpl_vars['current_page']->value)." - 1"),$_smarty_tpl);?>
">&lt;Previous</a>
                <?php }?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['current_page']->value==$_smarty_tpl->tpl_vars['page']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

        <?php } else { ?>
                <a class="class" href="<?php echo $_smarty_tpl->tpl_vars['page_root']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
        <?php }?>

        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pages']['last']) {?>
                <?php if ($_smarty_tpl->tpl_vars['current_page']->value==$_smarty_tpl->tpl_vars['page']->value) {?>
                        Next&gt; Last&gt;&gt;
                <?php } else { ?>
                        <a class="class" href="<?php echo $_smarty_tpl->tpl_vars['page_root']->value;?>
page=<?php echo smarty_function_math(array('equation'=>((string)$_smarty_tpl->tpl_vars['current_page']->value)." + 1"),$_smarty_tpl);?>
">Next&gt;</a>
                        <a class="class" href="<?php echo $_smarty_tpl->tpl_vars['page_root']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">Last&gt;&gt;</a>
                <?php }?>
        <?php }?>
<?php } ?>
<?php if ($_smarty_tpl->tpl_vars['pages']->value) {?></font></center><?php }?>
<?php }} ?>

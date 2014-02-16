<?php //netteCache[01]000388a:2:{s:4:"time";s:21:"0.94701500 1392567575";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:66:"C:\work\xampp\htdocs\nette\sb\app\templates\Homepage\default.latte";i:2;i:1392548485;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\work\xampp\htdocs\nette\sb\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '1s86ytmgl0')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6179a0cffd_content')) { function _lb6179a0cffd_content($_l, $_args) { extract($_args)
;echo $template->translate('Hello, <span style="color: red;">world!</span>') ?>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("insertForm") ? "insertForm" : $_control["insertForm"]), array()) ;$_input = is_object("name") ? "name" : $_form["name"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("name") ? "name" : $_form["name"]); echo $_input->getControl()->addAttributes(array()) ?>

<?php $_input = is_object("surname") ? "surname" : $_form["surname"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ;$_input = (is_object("surname") ? "surname" : $_form["surname"]); echo $_input->getControl()->addAttributes(array()) ?>

<?php $_input = (is_object("submit") ? "submit" : $_form["submit"]); echo $_input->getControl()->addAttributes(array()) ;Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
<br />
<ul>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($table) as $id => $row): if ($iterator->isFirst()): $iterations = 0; foreach ($row as $name => $value): ?>
    <?php echo Nette\Templating\Helpers::escapeHtml($name, ENT_NOQUOTES) ?>

<?php $iterations++; endforeach ;endif ?>
    <li>
        <?php echo Nette\Templating\Helpers::escapeHtml($id, ENT_NOQUOTES) ?>

        <ul>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($row) as $name => $value): if (!$iterator->isFirst()): ?>
            <li>
                <?php echo Nette\Templating\Helpers::escapeHtml($value, ENT_NOQUOTES) ?>

            </li>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>        </ul>
    </li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?></ul> 
<?php
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbf06c6869b5_scripts')) { function _lbf06c6869b5_scripts($_l, $_args) { extract($_args)
;Nette\Latte\Macros\UIMacros::callBlockParent($_l, 'scripts', get_defined_vars()) ;
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbe81410a29b_head')) { function _lbe81410a29b_head($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>

<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()) ; 
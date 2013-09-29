<?php //netteCache[01]000403a:2:{s:4:"time";s:21:"0.53303100 1379084864";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:81:"E:\xampp\htdocs\web\forum\sandbox\app\templates\ZalozitNovouDiskuzi\default.latte";i:2;i:1371308734;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"c0332ac released on 2013-03-08";}}}?><?php

// source file: E:\xampp\htdocs\web\forum\sandbox\app\templates\ZalozitNovouDiskuzi\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'k5uv9lc576')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb65496405d5_content')) { function _lb65496405d5_content($_l, $_args) { extract($_args)
?><h2 class="title">Založení nové diskuze</h2>
<p class="menu">Nacházíte se: <a href="<?php echo htmlSpecialChars($basePath) ?>/" title="Zpět na seznam témat">Domů</a>&nbsp;&gt;&nbsp;Založení nové diskuze</p>

<div class="form">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("thread") ? "thread" : $_control["thread"]), array()) ?>
	
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
	
	<table>
	<tr><td class="center"><?php $_input = is_object("title") ? "title" : $_form["title"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
</td><td class="top"><?php $_input = (is_object("title") ? "title" : $_form["title"]); echo $_input->getControl()->addAttributes(array('size' => 45)) ?>&nbsp;*</td></tr>
	<tr><td class="top"><?php $_input = is_object("comment") ? "comment" : $_form["comment"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?></td><td class="top"><textarea name="comment" rows="15" cols="60" id="comment"></textarea>&nbsp;*</td></tr>
	<tr><td><?php $_input = (is_object("submit") ? "submit" : $_form["submit"]); echo $_input->getControl()->addAttributes(array()) ?></td><td></td></tr>
	</table>
	
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</div>	<!-- // form -->

<?php
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
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 
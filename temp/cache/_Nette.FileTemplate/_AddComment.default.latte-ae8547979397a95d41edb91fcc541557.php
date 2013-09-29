<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.29058300 1376393987";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:72:"E:\xampp\htdocs\web\forum\sandbox\app\templates\AddComment\default.latte";i:2;i:1376393983;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"c0332ac released on 2013-03-08";}}}?><?php

// source file: E:\xampp\htdocs\web\forum\sandbox\app\templates\AddComment\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'oa1d4dl04v')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0755d9617a_content')) { function _lb0755d9617a_content($_l, $_args) { extract($_args)
?><h2 class="title">Reakce na příspěvek:</h2>

<div class="answer">
    <div class="comment-header">
        <p>(Vložil: <?php echo Nette\Templating\Helpers::escapeHtml($thread->ip, ENT_NOQUOTES) ?>
 || <?php echo Nette\Templating\Helpers::escapeHtml($thread->date, ENT_NOQUOTES) ?>)</p>
    </div>
    
    <div class="comment-text">
        <p><?php echo Nette\Templating\Helpers::escapeHtml($thread->comment, ENT_NOQUOTES) ?></p>
    </div>
<hr />
</div>


<div class="form">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("comment") ? "comment" : $_control["comment"]), array()) ?>
    <table>
        <tr><td>Autor</td><td><?php echo Nette\Templating\Helpers::escapeHtml($ip, ENT_NOQUOTES) ?></td></tr>
        <tr><td colspan="2">
<?php if (isset($textareaAuthor)): ?>
                <textarea rows="12" cols="80" name="text" id="text">[citace]&#13;&#10;**<?php echo Nette\Templating\Helpers::escapeHtml($textareaAuthor, ENT_NOQUOTES) ?>
** píše:&#13;&#10;<?php echo Nette\Templating\Helpers::escapeHtml($textareaText, ENT_NOQUOTES) ?>&#13;&#10;[/citace]&#13;&#10;</textarea></td></tr>
<?php else: ?>
                <textarea rows="12" cols="80" name="text" id="text"></textarea>
<?php endif ?>
        <tr><td colspan="2"><?php $_input = (is_object("add") ? "add" : $_form["add"]); echo $_input->getControl()->addAttributes(array()) ?></td></tr>
    </table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</div>  <!-- ./form -->

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
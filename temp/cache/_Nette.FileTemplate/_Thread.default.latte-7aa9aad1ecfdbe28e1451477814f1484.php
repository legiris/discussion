<?php //netteCache[01]000390a:2:{s:4:"time";s:21:"0.52314700 1376655614";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:68:"E:\xampp\htdocs\web\forum\sandbox\app\templates\Thread\default.latte";i:2;i:1376655606;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"c0332ac released on 2013-03-08";}}}?><?php

// source file: E:\xampp\htdocs\web\forum\sandbox\app\templates\Thread\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '2k4q0pqwze')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbde5184308d_content')) { function _lbde5184308d_content($_l, $_args) { extract($_args)
?><h2 class="title"><?php echo Nette\Templating\Helpers::escapeHtml($thread->title, ENT_NOQUOTES) ?></h2>

<p class="menu">Nacházíte se:&nbsp;<a href="<?php echo htmlSpecialChars($_presenter->link("Homepage:")) ?>
" title="Zpět na seznam témat">Domů</a>&nbsp;&gt;&nbsp;<?php echo Nette\Templating\Helpers::escapeHtml($thread->title, ENT_NOQUOTES) ?><br /><br /></p>

<div id="thread-page">

<div class="comment">    
    <div class="comment-header">
        <p>(Vložil: <?php echo Nette\Templating\Helpers::escapeHtml($thread->ip, ENT_NOQUOTES) ?>
 || <?php echo Nette\Templating\Helpers::escapeHtml($thread->date, ENT_NOQUOTES) ?>)</p>
    </div>
    
    <div class="comment-text">
        <p><?php echo Nette\Templating\Helpers::escapeHtml($thread->comment, ENT_NOQUOTES) ?></p>
    </div>

    <div class="comment-footer">
        <p><a href="<?php echo htmlSpecialChars($basePath) ?>/add-comment?threadId=<?php echo htmlSpecialChars($thread->id) ?>
">Vložit příspěvek</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo htmlSpecialChars($basePath) ?>/" title="Zpět na seznam témat">Zpět</a></p>
    </div>
</div>

<?php $iterations = 0; foreach ($comments as $comment): ?>
<div class="comment">
        <div class="comment-header">
            <p>(Vložil: <?php echo Nette\Templating\Helpers::escapeHtml($comment->ip, ENT_NOQUOTES) ?>
 || <?php echo Nette\Templating\Helpers::escapeHtml($comment->date, ENT_NOQUOTES) ?>)</p>
        </div>

        <div class="comment-text">
            <?php echo $comment->text ?>

        </div>

        <div class="comment-footer">
            <p><a href="<?php echo htmlSpecialChars($basePath) ?>/add-comment?threadId=<?php echo htmlSpecialChars($thread->id) ?>
&commentId=<?php echo htmlSpecialChars($comment->id) ?>" title="">Citovat</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo htmlSpecialChars($basePath) ?>
/add-comment?threadId=<?php echo htmlSpecialChars($thread->id) ?>" title="Odpovědět na zakládající příspěvek">Vložit příspěvek</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo htmlSpecialChars($basePath) ?>/" title="Zpět na seznam témat">Zpět</a></p>
        </div>
</div>
<?php $iterations++; endforeach ?>


</div>  <!-- ./thread-page -->
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 
<?php
// source: E:\xampp\htdocs\leon\app\presenters/templates/Homepage/default.latte

class Templatea47671ba08c1ca76d97a880e53e4bcb0 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('af3c89b40e', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block pagetitle
//
if (!function_exists($_b->blocks['pagetitle'][] = '_lbd548200cad_pagetitle')) { function _lbd548200cad_pagetitle($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Homepage<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbb9f9eedd9c_content')) { function _lbb9f9eedd9c_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>  
<?php
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lb54e2703b96_scripts')) { function _lb54e2703b96_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Latte\Macros\BlockMacrosRuntime::callBlockParent($_b, 'scripts', get_defined_vars()) ?>
<script src="https://files.nette.org/sandbox/jush.js"></script>
<script>
	jush.create_links = false;
	jush.highlight_tag('code');
	$('code.jush').each(function(){ $(this).html($(this).html().replace(/\x7B[/$\w].*?\}/g, '<span class="jush-latte">$&</span>')) });

	$('a[href^=#]').click(function(){
		$('html,body').animate({ scrollTop: $($(this).attr('href')).show().offset().top - 5 }, 'fast');
		return false;
	});
</script>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['pagetitle']), $_b, get_defined_vars())  ?>


<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>

<?php
}}
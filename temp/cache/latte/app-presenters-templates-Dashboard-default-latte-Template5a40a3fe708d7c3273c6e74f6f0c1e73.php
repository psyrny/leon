<?php
// source: E:\xampp\htdocs\leon\app\presenters/templates/Dashboard/default.latte

class Template5a40a3fe708d7c3273c6e74f6f0c1e73 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3cef214636', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block pagetitle
//
if (!function_exists($_b->blocks['pagetitle'][] = '_lb7187104d17_pagetitle')) { function _lb7187104d17_pagetitle($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Dashboard<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb7b054cabbf_content')) { function _lb7b054cabbf_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Tracy\Debugger::barDump(($users), '$users') ?>

<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-user fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?php echo Latte\Runtime\Filters::escapeHtml(count($users), ENT_NOQUOTES) ?></div>
            <div>Uživatelé</div>
          </div>
        </div>
      </div>
      <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:users"), ENT_COMPAT) ?>
">
        <div class="panel-footer">
          <span class="pull-left">Zobrazit uživatele</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>  
</div>
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



<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}
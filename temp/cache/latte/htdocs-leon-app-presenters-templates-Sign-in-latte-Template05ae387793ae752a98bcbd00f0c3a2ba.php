<?php
// source: E:\xampp\htdocs\leon\app\presenters/templates/Sign/in.latte

class Template05ae387793ae752a98bcbd00f0c3a2ba extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4dc1e17bc8', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block pagetitle
//
if (!function_exists($_b->blocks['pagetitle'][] = '_lbc71479f51a_pagetitle')) { function _lbc71479f51a_pagetitle($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Přihlášení<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbb4107d6a2a_content')) { function _lbb4107d6a2a_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><strong><?php echo Latte\Runtime\Filters::escapeHtml($configParam->projectName, ENT_NOQUOTES) ?>
</strong> <?php echo Latte\Runtime\Filters::escapeHtml($configParam->version, ENT_NOQUOTES) ?></h3>
        </div>
        <div class="panel-body">
        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["signInForm"], array('class' => "form")) ?>

          <fieldset>
            <div class="form-group">
              <?php echo $_form["email"]->getControl()->addAttributes(array('class' => 'form-control', 'placeholder' => "E-mail", 'autofocus' => 'autofocus')) ?>

            </div>
            <div class="form-group">
              <?php echo $_form["password"]->getControl()->addAttributes(array('class' => 'form-control', 'placeholder' => "Heslo")) ?>

            </div>
            <div class="checkbox">
              
                <?php echo $_form["remember"]->getControl()->addAttributes(array('class' => "form-control", 'value' => "on")) ?>

              
            </div>
            <?php echo $_form["send"]->getControl()->addAttributes(array('class' => "btn btn-lg btn-block btn-success", 'value' => "Přihlásit se")) ?>

          </fieldset>           
         <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

        </div>  
      </div>  
      <div class="text-center f-12">
        <a href="#">zapomenuté heslo</a>
        &nbsp;|&nbsp;
        <a href="#">nová registrace</a>
      </div>
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
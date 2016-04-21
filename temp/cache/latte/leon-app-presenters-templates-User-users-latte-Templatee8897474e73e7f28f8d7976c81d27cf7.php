<?php
// source: E:\xampp\htdocs\leon\app\presenters/templates/User/users.latte

class Templatee8897474e73e7f28f8d7976c81d27cf7 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c04658aa18', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block pagetitle
//
if (!function_exists($_b->blocks['pagetitle'][] = '_lba3dec5c439_pagetitle')) { function _lba3dec5c439_pagetitle($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Uživatelé<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb59169e8049_content')) { function _lb59169e8049_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        DataTables Advanced Tables
      </div>    
      <!-- /.panel-heading -->
      
      <div class="panel-body">
        <div class="dataTable_wrapper">      
          <table class="table table-striped table-bordered table-hover datatable" id="datatable-<?php echo Latte\Runtime\Filters::escapeHtml($presenter->name, ENT_COMPAT) ?>">
            <thead>
              <tr>
                <th>#</th>
                <th>E-mail</th>
              </tr>
            </thead>            
            <tbody>
<?php $iterations = 0; foreach ($users as $person) { ?>              <tr class="odd gradeX">
                <td><?php echo Latte\Runtime\Filters::escapeHtml($person->id, ENT_NOQUOTES) ?></td>
                <td><?php echo Latte\Runtime\Filters::escapeHtml($person->email, ENT_NOQUOTES) ?></td>
              </tr>            
<?php $iterations++; } ?>
            </tbody>  
          </table>
        </div>
        <!-- /.table-responsive -->     
      </div>  
      <!-- /.panel-body -->
      
    </div>  
    <!-- /.panel -->              
  </div>  
  <!-- /.col-lg-12 -->
</div>  
<!-- /.row --><?php
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
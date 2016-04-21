<?php
// source: E:\xampp\htdocs\leon\app\presenters/templates/@layout.latte

class Template1462de7097fa44b2bd4a0293425fa7bb extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5c269bd860', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb590683bda6_head')) { function _lb590683bda6_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>  <!-- Bootstrap Core CSS -->
  <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/leon-admin.css" rel="stylesheet">  
  <!-- Custom Fonts -->
  <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbb010a7144f_title')) { function _lbb010a7144f_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>              <h1 class="page-header"><?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'pagetitle', $template->getParameters()) ?></h1>
<?php
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbf32999047d_scripts')) { function _lbf32999047d_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->
  <!-- jQuery -->
  <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <!-- Nette Forms JavaScript -->
	<script src="//nette.github.io/resources/js/netteForms.min.js"></script>  
  <!-- DataTables JavaScript -->
  <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>  
  <!-- Custom Theme JavaScript -->
  <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/leon-admin.js"></script>  
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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtmlComment($basePath) ?>/css/style.css">-->
	<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">
  <meta name="author" content="petrsyrny.cz">
	<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?> <?php echo Latte\Runtime\Filters::escapeHtml($configParam->projectName, ENT_NOQUOTES) ?></title>
<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>
	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/aax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<![endif]-->  
</head>

<body>
<?php $iterations = 0; foreach ($flashes as $flash) { ?>	<div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>

<?php if ($user->isLoggedIn()) { ?>
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">    
<?php $_b->templates['5c269bd860']->renderChildTemplate('../templates/header-navigation.latte', $template->getParameters()) ;$_b->templates['5c269bd860']->renderChildTemplate('../templates/sidebar-navigation.latte', $template->getParameters()) ?>
      </nav>  
      <!-- Page Content -->
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
            </div>
            <!-- /.col-lg-12 -->
          </div>          
          <!-- /.row -->          
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->    
    </div>
    <!-- /#wrapper -->
<?php } else { Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ;} ?>
  
<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
</body>
</html><?php
}}
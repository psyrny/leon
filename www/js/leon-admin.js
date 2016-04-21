$(function() {
  $('#side-menu').metisMenu();
});

// Language definition of DataTables
$(function() {
  $('.datatable').DataTable({
    "language": 
      {
        "sProcessing":   "Provádím...",
        "sLengthMenu":   "Zobraz záznamů _MENU_",
        "sZeroRecords":  "Žádné záznamy nebyly nalezeny",
        "sInfo":         "Zobrazuji _START_ až _END_ z celkem _TOTAL_ záznamů",
        "sInfoEmpty":    "Zobrazuji 0 až 0 z 0 záznamů",
        "sInfoFiltered": "(filtrováno z celkem _MAX_ záznamů)",
        "sInfoPostFix":  "",
        "sSearch":       "Hledat:",
        "sUrl":          "",
        "oPaginate": {
           "sFirst":    "První",
           "sPrevious": "Předchozí",
           "sNext":     "Další",
           "sLast":     "Poslední"
        }
      }      
  });  
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});
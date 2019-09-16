/*====================================
=            sidebar menu            =
====================================*/

$('.sidebar-menu').tree();

/*=====  End of sidebar menu  ======*/


/*=================================
=            datatable            =
=================================*/

$('.tables').dataTable();

/*=====  End of datatable  ======*/

//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	checkboxClass: 'icheckbox_minimal-blue',
	radioClass   : 'iradio_minimal-blue'
});
$(document).ready(function () {
   var tabla_gastos= $('#tabla_gastos').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    "ordering": false,
    "order": [[ 0, "desc" ]],
    "bDestroy": true,
    buttons: [
      {extend :'excel',
        className: 'bg-light btn btn-outline-info mr-2' },
      { extend: 'pdf',
        className: 'bg-light btn btn-outline-info mr-2' }
    ],});
    
   tabla_gastos.buttons(0, null).containers().appendTo('#menu_tabla_gastos');
});

$(document).ready(function () {
  var tabla_ingresos= $('#tabla_ingresos').DataTable({
   extend: 'collection',
   processing: true,
   'processing': true,
   "ordering": false,
   "order": [[ 0, "desc" ]],
   "bDestroy": true,
   buttons: [
     {extend :'excel',
       className: 'bg-light btn btn-outline-info mr-2' },
     { extend: 'pdf',
       className: 'bg-light btn btn-outline-info mr-2' }
   ],});
   
   tabla_ingresos.buttons(0, null).containers().appendTo('#menu_tabla_ingresos');
});

$(document).ready(function () {
  var tabla_usuarios= $('#tabla_usuarios').DataTable({
   extend: 'collection',
   processing: true,
   'processing': true,
   "ordering": false,
   "order": [[ 0, "desc" ]],
   "bDestroy": true,
   buttons: [
     {extend :'excel',
       className: 'bg-light btn btn-outline-info mr-2' },
     { extend: 'pdf',
       className: 'bg-light btn btn-outline-info mr-2' }
   ],});
   
   tabla_usuarios.buttons(0, null).containers().appendTo('#menu_tabla_usuarios');
});

$(document).ready(function () {
  var tabla_deuda= $('#tabla_deudas').DataTable({
   extend: 'collection',
   processing: true,
   'processing': true,
   "ordering": false,
   "order": [[ 0, "desc" ]],
   "bDestroy": true,
   buttons: [
     {extend :'excel',
       className: 'bg-light btn btn-outline-info mr-2' },
     { extend: 'pdf',
       className: 'bg-light btn btn-outline-info mr-2' }
   ],});
   
   tabla_deuda.buttons(0, null).containers().appendTo('#menu_tabla_deudas');
});

$(document).ready(function () {
  var tabla_deudas= $('#tabla_gastos_fijos').DataTable({
   extend: 'collection',
   processing: true,
   'processing': true,
   "ordering": false,
   "order": [[ 0, "desc" ]],
   "bDestroy": true,
   buttons: [
     {extend :'excel',
       className: 'bg-light btn btn-outline-info mr-2' },
     { extend: 'pdf',
       className: 'bg-light btn btn-outline-info mr-2' }
   ],});
   
   tabla_deudas.buttons(0, null).containers().appendTo('#menu_tabla_gastos_fijos');
});
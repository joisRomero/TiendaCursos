 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Académica / Tipo</h1>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <!-- row para listado de productos/inventario -->
         <div class="row">
             <div class="col-lg-12">
                 <table id="tbl_tipoFormacion" class="table table-striped w-100 shadow">
                     <thead class="bg-info">
                         <tr style="font-size: 15px;">
                             <th></th>
                             <th>ID</th>
                             <th>Nombre</th>
                             <th>Vigencia</th>
                             <th class="text-cetner">Opciones</th>
                         </tr>
                     </thead>
                     <tbody class="text-small">
                     </tbody>
                 </table>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->

 <!-- Ventana modal para ingresar o modificar un tipo de formación -->
 <div class="modal fade" id="mdlGestionarTipoFormacion" role="dialog">
     <div class="modal-dialog modal-lg">

         <!-- Contenido de la ventana -->
         <div class="modal-content">

             <!-- Cabecera de la ventana -->
             <div class="modal-header bg-gray py-1 align-items-center">
                 <h5 class="modal-title">Agregar Tipo</h5>
                 <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-dismiss="modal" id="btnCerrarModal">
                     <i class="far fa-times-circle"></i>
                 </button>
             </div>

             <!-- Cuerpo de la ventana -->
             <div class="modal-body">
                 <div class="row">

                     <div class="col-lg-12">
                         <div class="form-group mb-2">
                             <label class="" for="nombreTipo"><i class="fas fa-book fs-6"></i>
                                 <span class="small">Nombre del Tipo</span><span class="text-danger">*</span>
                             </label>
                             <input type="text" class="form-control form-control-sm" id="nombreTipo" name="nombreTipo" placeholder="Ingrese el nombre del tipo" required>
                             <span id="validar_nombreTipo" class="text-danger small fst-italic" style="display: none;">Debe ingresar un nombre del tipo de formación académica</span>
                         </div>
                     </div>

                     <!-- Botones de Cancelar y Guardar -->
                     <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>

                     <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardarTipo" onclick="formSubmitClick()">Guardar Tipo</button>

                 </div>
             </div>

         </div>
     </div>
 </div>

 <script>
     $(document).ready(function() {

         var table;
         var accion;

         $.ajax({
             url: "../ajax/tipoFormacion.ajax.php",
             type: "POST",
             data: {
                 'accion': 1
             },
             dataType: 'json',
             success: function(respuesta) {
                 console.log("respuesta", respuesta);
             }
         });


         /*===================================================================*/
         // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
         /*===================================================================*/
         table = $("#tbl_tipoFormacion").DataTable({
             dom: 'Bfrtip',
             buttons: [{
                     text: 'Agregar Tipo',
                     className: 'addNewRecord',
                     action: function(e, dt, node, config) {
                         $("#mdlGestionarTipoFormacion").modal('show');
                         accion = 2; //registrar
                     }
                 },
                 'excel', 'print', 'pageLength'
             ],
             pageLength: [5, 10, 15, 30, 50, 100],
             pageLength: 10,
             ajax: {
                 url: "../ajax/tipoFormacion.ajax.php",
                 dataSrc: '',
                 type: "POST",
                 data: {
                     'accion': 1
                 },
             },
             responsive: {
                 details: {
                     type: 'column'
                 }
             },
             columnDefs: [{
                     targets: 1,
                     visible: false
                 },
                 {
                     targets: 3,
                     visible: false
                 },
                 {
                     targets: 4,
                     orderable: false,
                     render: function(datqa, type, full, meta) {
                         return "<center>" +
                             "<span class='btnEditarProducto text-primary px-1' style='cursor:pointer;'>" +
                             "<i class='fas fa-pencil-alt fs-5'></i>" +
                             "</span>" +
                             "<span class='btnAumentarStock text-success px-1' style='cursor:pointer;'>" +
                             "<i class='fas fa-plus-circle fs-5'></i>" +
                             "</span>" +
                             "<span class='btnDisminuirStock text-warning px-1' style='cursor:pointer;'>" +
                             "<i class='fas fa-minus-circle fs-5'></i>" +
                             "</span>" +
                             "<span class='btnEliminarProducto text-danger px-1' style='cursor:pointer;'>" +
                             "<i class='fas fa-trash fs-5'></i>" +
                             "</span>" +
                             "</center>"
                     }
                 }

             ],
             language: {
                 url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
             }
         });

         /*===================================================================*/
         // Limpiar
         /*===================================================================*/

         $("#btnCerrarModal, #btnCancelarRegistro").on('click', function() {

             $("#validate_nombreTipo").css("display", "none");
             $("#validate_selVigenciaTipo").css("display", "none");

             $("#nombreTipo").val("");
             $("#selVigenciaTipo").val(0);

         })
     })

     function formSubmitClick() {

         //validar ingreso de campos

         //levanto una ventana modal para preguntar si deseo continuar con el registro

         swal({
             title: 'Se registrará el tipo ¿Desea Continuar?',
             icon: 'warning',
             buttons: {
                 cancel: {
                     text: "Cancel",
                     value: null,
                     visible: false,
                     className: "",
                     closeModal: true,
                 },
                 confirm: {
                     text: "OK",
                     value: true,
                     visible: true,
                     className: "",
                     closeModal: true
                 }
             },
         }).then((result) => { //si la respuesta ha sido afirmativa...

             var datos = new FormData();

             datos.append("accion", accion);
             datos.append("nombre_tipo", $("#nombreTipo").val());

             $.ajax({
                 url: "../ajax/tipoFormacion.ajax.php",
                 method: "POST",
                 data: datos,
                 cache: false,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 success: function(respuesta) {
                     if (respuesta == "ok") {

                         Toast.fire({
                             icon: 'success',
                             title: 'El tipo se agregó correctamente'
                         });

                         table.ajax.reload(); //recarga el table

                         $("#mdlGestionarTipoFormacion").modal('hide');
                         $("#nombreTipo").val("");
                         $("#selVigenciaTipo").val(0);

                     } else {
                         Toast.fire({
                             icon: 'error',
                             title: 'El tipo no se pudo agregar'
                         });

                     }
                 }
             })




         })
     }
 </script>
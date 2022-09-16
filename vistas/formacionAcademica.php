 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Académica/ Formación académica</h1>
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
                 <table id="tbl_formacionAcademica" class="table table-striped w-100 shadow">
                     <thead class="bg-info">
                         <tr style="font-size: 15px;">
                             <th>Id</th>
                             <th>Nombre</th>
                             <th>Descripcion</th>
                             <th>Aprendizaje</th>
                             <th>Duración</th>
                             <th>Creación</th>
                             <th>Precio</th>
                             <th>Profesor</th>
                             <th>Tipo</th>
                             <th>Imagen</th>
                             <th>Estado</th>
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

 <!-- MODAL REGISTRAR -->
 <div class="modal fade" id="mdlGestionarFormacionAcademica" role="dialog">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header bg-gray py-1 align-items-center">
                 <h5 class="modal-title">Agregar Formación académica</h5>
                 <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" id="btnCerrarModal" data-dismiss="modal">
                     <i class="far fa-times-circle"></i>
                 </button>
             </div>

             <div class="modal-body">
                 <form method="POST" enctype="multipart/form-data" id="formulario">
                 <div class="row">
                     <!-- NOMBRE -->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                             <label for="nombre">
                                 <span class="small">Nombre </span><span class="text-danger">*</span>
                             </label>
                             <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="Nombre" required>
                             <span id="validar_nombre" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                         </div>
                     </div>

                     <!-- DURACION -->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                             <label for="duracion">
                                 <span class="small">Duración (en horas) </span></span><span class="text-danger">*</span>
                             </label>
                             <input type="number" class="form-control form-control-sm" id="duracion" name="duracion" placeholder="Duración" required>
                             <span id="validar_duracion" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                         </div>
                     </div>

                     <!-- PRECIO -->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                             <label for="precio">
                                 <span class="small">Precio </span></span><span class="text-danger">*</span>
                             </label>
                             <input type="number" class="form-control form-control-sm" id="precio" name="precio" placeholder="Precio" step="0.01" min="0" required>
                             <span id="validar_precio" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                         </div>
                     </div>

                     <!-- PROFESOR -->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                             <label for="profesor">
                                 <span class="small">Profesor </span></span><span class="text-danger">*</span>
                             </label>
                             <select name="profesor" id="profesor" class="form-control form-control-sm">
                             </select>
                             <span id="validar_profesor" class="text-danger small fst-italic" style="display: none;">Debe seleccionar un profesor</span>
                         </div>
                     </div>

                     <!-- TIPO -->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                             <label for="tipo">
                                 <span class="small">Tipo </span></span><span class="text-danger">*</span>
                             </label>
                             <select name="tipo" id="tipo" class="form-control form-control-sm">

                             </select>
                             <span id="validar_tipo" class="text-danger small fst-italic" style="display: none;">Debe seleccionar un profesor</span>
                         </div>
                     </div>

                     <!-- IMAGEN-->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                            
                             <label for="Imagen">
                                 <span class="small">Imagen </span></span><span class="text-danger">*</span>
                             </label>
                             <input type="file" class="form-control-file form-control-sm" name="imagen" id="imagen">
                             <span id="validar_imagen" class="text-danger small fst-italic" style="display: none;">Debe seleccionar una imagen</span>
                             
                         </div>
                     </div>

                     <!-- DESCRIPCION -->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                             <label for="descripcion">
                                 <span class="small">Descripción </span></span><span class="text-danger">*</span>
                             </label>
                             <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" required cols="30" rows="10"></textarea>
                             <span id="validar_descripcion" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                         </div>
                     </div>

                     <!-- APRENDIZAJE -->
                     <div class="col-lg-6">
                         <div class="form-group mb-2">
                             <label for="aprendizaje">
                                 <span class="small">Aprendizaje </span></span><span class="text-danger">*</span>
                             </label>
                             <textarea class="form-control form-control-sm" id="aprendizaje" name="aprendizaje" required cols="30" rows="10"></textarea>
                             <span id="validar_aprendizaje" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                         </div>
                     </div>
                    </div>
                </form>

                 <!-- Botones de Cancelar y Guardar -->
                 <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>

                 <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardarTipo" onclick="formSubmitClick()">Guardar</button>

             </div>

         </div>
     </div>
 </div>

 <script>
     var table;
     var accion;

     var Toast = Swal.mixin({
         toast: true,
         position: top,
         showConfirmButton: false,
         timer: 3000
     });

     $(document).ready(function() {
         $.ajax({
             url: "../ajax/formacionAcademica.ajax.php",
             type: "POST",
             data: {
                 'accion': 1
             },
             dataType: 'json'
         });

         //*===================================================================*/
         // CARGAR TIPOS EN COMBOBOX
         /*===================================================================*/
         $.ajax({
             url: "../ajax/tipoFormacion.ajax.php",
             type: "POST",
             data: {
                 'accion': 3
             },
             dataType: 'json',
             success: function(respuesta) {
                 var opciones = '<option value="0">--Seleccione--</option>';
                 for (let index = 0; index < respuesta.length; index++) {
                     if (respuesta[index][2] == 1) {
                         var opciones = opciones + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                     }
                 }
                 $('#tipo').html(opciones);
             }
         });

         //*===================================================================*/
         // CARGAR PROFESORES EN COMBOBOX
         /*===================================================================*/
         $.ajax({
             url: "../ajax/profesor.ajax.php",
             type: "POST",
             data: {
                 'accion': 1
             },
             dataType: 'json',
             success: function(respuesta) {

                 var opciones = '<option value="0">--Seleccione--</option>';

                 for (let index = 0; index < respuesta.length; index++) {
                     if (respuesta[index][2] == 1) {
                         var opciones = opciones + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                     }
                 }
                 $('#profesor').html(opciones);
             }
         });

         /*===================================================================*/
         // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
         /*===================================================================*/
         table = $("#tbl_formacionAcademica").DataTable({
             dom: 'Bfrtip',
             buttons: [{
                     text: 'Agregar Formación académica',
                     className: 'addNewRecord',
                     action: function(e, dt, node, config) {
                         $("#mdlGestionarFormacionAcademica").modal('show');
                         accion = 2;
                     }
                 },
                 'excel', 'print', 'pageLength'
             ],
             pageLength: [5, 10, 15, 30, 50, 100],
             pageLength: 10,
             ajax: {
                 url: "../ajax/formacionAcademica.ajax.php",
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
                     targets: 0,
                     visible: false
                 },
                 {
                     targets: 2,
                     visible: false
                 },
                 {
                     targets: 3,
                     visible: false
                 },
                 {
                     targets: 9,
                     orderable: false,
                     render: function(data, type, full, meta) {
                         return '<img src="' + data + '"  height="50px" width="50px">';
                     }
                 },
                 {
                     targets: 10,
                     orderable: false,
                     render: function(data, type, full, meta) {
                         if (data == '1') {
                             return '<span class="badge badge-success">Activado</span>';
                         } else {
                             return '<span class="badge badge-danger">Desactivado</span>';
                         }
                     }
                 },
                 {
                     targets: 11,
                     orderable: false,
                     render: function(datqa, type, full, meta) {
                         var check = "<span class='btnVigenciaTipo text-success h5 px-1' style='cursor:pointer;'>" +
                             "<i class='fa fa-check fs-5'></i>" +
                             "</span>";

                         var aspa = "<span class='btnVigenciaTipo text-danger h5 px-1' style='cursor:pointer;'>" +
                             "<i class='fa fa-times'></i>" +
                             "</span>";

                         var editar = "<span class='btnEditarTipo text-primary px-1' style='cursor:pointer;'>" +
                             "<i class='fas fa-pencil-alt fs-5'></i>" +
                             "</span>";
                         if (full[10] == 1) {
                             return "<center>" + editar + aspa + "</center>";
                         } else {
                             return "<center>" + editar + check + "</center>";
                         }
                     }
                 }

             ],
             language: {
                 url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
             }
         });

         /*===================================================================*/
         // EVENTOS PARA LIMPIAR
         /*===================================================================*/
         $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {
             $("#validar_nombre").css("display", "none");
             $("#validar_duracion").css("display", "none");
             $("#validar_precio").css("display", "none");
             $("#validar_profesor").css("display", "none");
             $("#validar_tipo").css("display", "none");
             $("#validar_imagen").css("display", "none");
             $("#validar_descripcion").css("display", "none");
             $("#validar_aprendizaje").css("display", "none");

             $("#nombre").val("");
             $("#duracion").val("");
             $("#precio").val("");
             $("#profesor").val(0);
             $("#tipo").val(0);
             $("#imagen").val("");
             $("#descripcion").val("");
             $("#aprendizaje").val("");
         })
     })

     function formSubmitClick() {
         //validar ingreso de campos 

         Swal.fire({
             title: "¿Está seguro de registrar la Formación académica?",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Sí, deseo registrar',
             cancelButtonText: 'Cancelar',
         }).then((result) => {
             if (result.isConfirmed) {
                 var datos = new FormData();
                 
                 datos.append('accion', accion);

                 datos.append("nombre", $("#nombre").val());
                 datos.append("descripcion", $("#descripcion").val());
                 datos.append("aprendizaje", $("#aprendizaje").val());
                 datos.append("duracion", $("#duracion").val());
                 datos.append("precio", $("#precio").val());
                 datos.append("imagen", $("#imagen").val());
                 datos.append("profesor", $("#profesor").val());
                 datos.append("tipo", $("#tipo").val());

                 $.ajax({
                     url: "../ajax/formacionAcademica.ajax.php",
                     method: "POST",
                     data: datos,
                     cache: false,
                     contentType: false,
                     processData: false,
                     dataType: 'json',
                     success: function(respuesta) {
                         console.log(respuesta);
                         if (respuesta == 'ok') {
                             Toast.fire({
                                 icon: 'success',
                                 title: 'La Formación académica se registró correctamente'
                             });

                             table.ajax.reload();

                             $("#mdlGestionarFormacionAcademica").modal('hide');

                             $("#nombre").val("");
                             $("#duracion").val("");
                             $("#precio").val("");
                             $("#profesor").val(0);
                             $("#tipo").val(0);
                             $("#imagen").val("");
                             $("#descripcion").val("");
                             $("#aprendizaje").val("");
                         } else {
                             Toast.fire({
                                 icon: 'error',
                                 title: 'La Formación académica no se pudo registrar'
                             });
                         }
                     }

                 });

             }
         })
     }
 </script>
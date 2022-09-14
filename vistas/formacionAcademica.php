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
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <!-- NOMBRE -->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="nombre">
                                <span class="small">Nombre</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="nombre" 
                            name="nombre" placeholder="Nombre" required>
                            <span id="validar_nombre" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                        </div>
                    </div>

                    <!-- DURACION -->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="duracion">
                                <span class="small">Duración</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="duracion" 
                            name="duracion" placeholder="Duración" required>
                            <span id="validar_duracion" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                        </div>
                    </div>

                    <!-- PRECIO -->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="precio">
                                <span class="small">Precio</span>
                            </label>
                            <input type="number" class="form-control form-control-sm" id="precio" 
                            name="precio" placeholder="Precio" required>
                            <span id="validar_precio" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                        </div>
                    </div>

                    <!-- PROFESOR -->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="profesor">
                                <span class="small">Profesor</span>
                            </label>
                            <select name="profesor" id="profesor" class="form-control form-control-sm">
                                <option value="seleccione">--Seleccione--</option>
                            </select>
                            <span id="validar_profesor" class="text-danger small fst-italic" style="display: none;">Debe seleccionar un profesor</span>
                        </div>
                    </div>

                    <!-- TIPO -->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="tipo">
                                <span class="small">Tipo</span>
                            </label>
                            <select name="tipo" id="tipo" class="form-control form-control-sm">
                                <option value="seleccione">--Seleccione--</option>
                            </select>
                            <span id="validar_tipo" class="text-danger small fst-italic" style="display: none;">Debe seleccionar un profesor</span>
                        </div>
                    </div>

                    <!-- VIGENCIA-->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="vigencia">
                                <span class="small">Vigencia</span>
                            </label>
                            <select name="vigencia" id="vigencia" class="form-control form-control-sm">
                                <option value="seleccione">--Seleccione--</option>
                            </select>
                            <span id="validar_profesor" class="text-danger small fst-italic" style="display: none;">Debe seleccionar un profesor</span>
                        </div>
                    </div>

                    <!-- DESCRIPCION -->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="descripcion">
                                <span class="small">Descripción</span>
                            </label>
                            <textarea class="form-control form-control-sm" id="descripcion" 
                            name="descripcion" required cols="30" rows="10"></textarea>
                            <span id="validar_descripcion" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                        </div>
                    </div>

                    <!-- APRENDIZAJE -->
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label for="aprendizaje">
                                <span class="small">Aprendizaje</span>
                            </label>
                            <textarea class="form-control form-control-sm" id="descripcion" 
                            name="aprendizaje" required cols="30" rows="10"></textarea>
                            <span id="validar_aprendizaje" class="text-danger small fst-italic" style="display: none;">Debe ingrese un nombre</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

 <script>
     $(document).ready(function() {

         var table;

         $.ajax({
             url: "../ajax/formacionAcademica.ajax.php",
             type: "POST",
             data: {
                 'accion': 1
             },
             dataType: 'json'
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
         // EVENTOS PARA CRITERIOS DE BUSQUEDA (CODIGO, CATEGORIA Y PRODUCTO)
         /*===================================================================*/
         // $("#iptCodigoBarras").keyup(function(){
         //     table.column($(this).data('index')).search(this.value).draw();
         // })

         // $("#iptCategoria").keyup(function(){
         //     table.column($(this).data('index')).search(this.value).draw();
         // })

         // $("#iptProducto").keyup(function(){
         //     table.column($(this).data('index')).search(this.value).draw();
         // })

         // $("#iptPrecioVentaDesde, #iptPrecioVentaHasta").keyup(function(){
         //     table.draw();
         // })

         // $.fn.dataTable.ext.search.push(

         //     function(settings, data, dataIndex){

         //         var precioDesde = parseFloat($("#iptPrecioVentaDesde").val());
         //         var precioHasta = parseFloat($("#iptPrecioVentaHasta").val());

         //         var col_venta = parseFloat(data[7]);

         //         if((isNaN(precioDesde) && isNaN(precioHasta)) ||
         //             (isNaN(precioDesde) && col_venta <=  precioHasta) ||
         //             (precioDesde <= col_venta && isNaN(precioHasta)) ||
         //             (precioDesde <= col_venta && col_venta <= precioHasta)){
         //                 return true;
         //         }

         //         return false;
         //     }
         // )

         // $("#btnLimpiarBusqueda").on('click',function(){

         //     $("#iptCodigoBarras").val('')
         //     $("#iptCategoria").val('')
         //     $("#iptProducto").val('')
         //     $("#iptPrecioVentaDesde").val('')
         //     $("#iptPrecioVentaHasta").val('')

         //     table.search('').columns().search('').draw();
         // })



     })
 </script>
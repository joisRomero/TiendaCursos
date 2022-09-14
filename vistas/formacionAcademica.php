 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Formación académica/ Formación académica</h1>
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
                             <th></th>
                             <th>Nombre</th>
                             <th>Duración</th>
                             <th>Fecha</th>
                             <th>Precio</th>
                             <th>Profesor</th>
                             <th>Tipo</th>
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

 <script>
$(document).ready(function() {

    var table;

    $.ajax({
        url: "../ajax/formacionAcademica.ajax.php",
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
    table = $("#tbl_formacionAcademica").DataTable({
        dom: 'Bfrtip',
        buttons: [{
                text: 'Agregar Formación académica',
                className: 'addNewRecord',
                action: function(e, dt, node, config) {
                    //EVENTO PARA LEVENTAR LA VENTA MODAL
                    alert('nuevo Boton')
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
        columnDefs: [
            {
                targets: 7,
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
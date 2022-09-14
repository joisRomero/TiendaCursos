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
                             <th>Nombre</th>
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
                    //EVENTO PARA LEVENTAR LA VENTA MODAL
                    alert('nuevo Tipo')
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
        columnDefs: [
            {
                targets: 2,
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
})
 </script>
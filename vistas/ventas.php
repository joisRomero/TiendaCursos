<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Ventas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- row para listado de compras -->
        <div class="row">
            <div class="col-lg-12">
                <table id="tbl_compra" class="table table-striped w-100 shadow">
                    <thead>
                        <tr style="font-size: 15px;">
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Estudiante</th>
                            <th>Profesor</th>
                            <th>Formación Académica</th>
                            <th>Tipo</th>
                            <th class="text-cetner">Habilitar / Deshabilitar</th>
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
    var accion;
    var table;

    var Toast = Swal.mixin({
        toast: true,
        position: top,
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {
        /*===================================================================*/
        // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
        /*===================================================================*/
        table = $("#tbl_compra").DataTable({
            dom: 'Bfrtip',
            buttons: ['excel', 'print', 'pageLength'],
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,
            ajax: {
                url: "../ajax/compra.ajax.php",
                dataSrc: '',
                type: "POST",
                data: {
                    'accion': 2 //listar
                },
            },
            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [{
                    targets: 0, //id
                    visible: true
                },
                {
                    targets: 2, //vigencia
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
                    targets: 7, //opciones
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var check = "<span class='btnVigenciaCompra text-success h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-check fs-5'></i>" +
                            "</span>";

                        var aspa = "<span class='btnVigenciaCompra text-danger h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-times'></i>" +
                            "</span>";
                        if (full[2] == 1) { //posición de la vigencia
                            return "<center>" + aspa + "</center>";
                        } else {
                            return "<center>" + check + "</center>";
                        }
                    }
                }

            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    })

    /*===================================================================*/
    // Evento al dar click en el botón dar de baja
    /*===================================================================*/
    $('#tbl_compra').on('click', '.btnVigenciaCompra', function() {
        accion = 3;
        var data = table.row($(this).parents('tr')).data();
        $id = data[0];
        $vigencia = data[2];

        if ($vigencia == 1) {
            var titulo_preg = "¿Está seguro que desea dar de baja esta compra?";
            var confirm_boton = 'Sí, dar de baja';
            var titulo_toast = 'La compra se dio de baja';
            var titulo_toast_error = 'La compra no se pudo dar de baja';
        } else {
            var titulo_preg = "¿Está seguro que desea recuperar esta compra?";
            var confirm_boton = 'Sí, recuperar';
            var titulo_toast = 'La compra se recuperó';
            var titulo_toast_error = 'La compra no se pudo recuperar';
        }

        Swal.fire({
            title: titulo_preg,
            icon: 'warning',
            showDenyButton: true,
            confirmButtonColor: '#3085d6',
            denyButtonColor: '#d33',
            confirmButtonText: confirm_boton,
            denyButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) { //si la respuesta ha sido confirmada...
                var datos = new FormData();
                datos.append("accion", accion);
                datos.append("id", $id);
                datos.append("vigencia", $vigencia);
                $.ajax({
                    url: "../ajax/compra.ajax.php",
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
                                title: titulo_toast,
                                position: 'top'
                            });

                            table.ajax.reload();

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: titulo_toast_error
                            });
                        }
                    }
                })
            } else if (result.isDenied) {
                Swal.fire('Los cambios no se guardaron', '', 'info')
            }

        });
    })
</script>
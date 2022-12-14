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
                    <thead>
                        <tr style="font-size: 15px;">
                            <th></th>
                            <th>ID</th>
                            <th>Nombre</th>
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

<!-- Ventana modal para ingresar o modificar un tipo de formación -->
<div class="modal fade" id="mdlGestionarTipoFormacion" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Contenido de la ventana -->
        <div class="modal-content">

            <!-- Cabecera de la ventana -->
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title">Tipo</h5>
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-dismiss="modal" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>

            <!-- Cuerpo de la ventana -->
            <div class="modal-body">

                <form class="needs-validation" novalidate>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label class="" for="nombreTipo">
                                    <span class="small">Nombre</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="nombreTipo" name="nombreTipo" placeholder="Ingrese el nombre del tipo" required>
                                <div class="invalid-feedback">
                                    Ingrese un nombre de tipo
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Cancelar y Guardar -->
                        <div class="d-flex w-100 justify-content-end">
                            <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>

                            <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardarTipo">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

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
        table = $("#tbl_tipoFormacion").DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Agregar Tipo',
                    className: 'addNewRecord',
                    action: function(e, dt, node, config) {
                        limpiar();
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
                    targets: 1, //id
                    visible: false
                },
                {
                    targets: 3, //vigencia
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
                    targets: 4, //opciones
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var check = "<span class='btnVigenciaTipo text-success h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-check fs-5'></i>" +
                            "</span>";

                        var aspa = "<span class='btnVigenciaTipo text-danger h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-times'></i>" +
                            "</span>";

                        var editar = "<span class='btnEditarTipo text-primary px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-pencil-alt fs-5'></i>" +
                            "</span>";
                        if (full[3] == 1) {
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
    })

    /*===================================================================*/
    // Evento al dar click en el botón (lapiz) editar
    /*===================================================================*/
    $('#tbl_tipoFormacion').on('click', '.btnEditarTipo', function() {
        accion = 4;

        $("#mdlGestionarTipoFormacion").modal('show');

        var data = table.row($(this).parents('tr')).data();
        $id_tipo = data[1];
        $('#nombreTipo').val(data[2]);
    })

    /*===================================================================*/
    // Evento al dar click en el botón dar de baja
    /*===================================================================*/

    $('#tbl_tipoFormacion').on('click', '.btnVigenciaTipo', function() {
        accion = 5;
        var data = table.row($(this).parents('tr')).data();
        $id_tipo = data[1];
        $vigente_tipo = data[3];

        if ($vigente_tipo == 1) {
            var titulo_preg = "¿Está seguro que desea dar de baja el tipo de Formación académica?";
            var confirm_boton = 'Sí, dar de baja';
            var titulo_toast = 'El tipo se dio de baja';
            var titulo_toast_error = 'El tipo no se pudo dar de baja';
        } else {
            var titulo_preg = "¿Está seguro que desea recuperar el tipo de Formación académica?";
            var confirm_boton = 'Sí, recuperar';
            var titulo_toast = 'El tipo se recuperó';
            var titulo_toast_error = 'El tipo no se pudo recuperar';
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
                datos.append("id_tipo", $id_tipo);
                datos.append("vigente_tipo", $vigente_tipo);
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

    document.getElementById("btnGuardarTipo").addEventListener("click", function() {

        var forms = document.getElementsByClassName('needs-validation');
        var validacion = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === true) {
                //validar ingreso de campos
                if (accion == 2) {
                    var titulo_preg = "¿Está seguro de registrar este tipo de Formación académica?";
                    var confirm_boton = 'Sí, deseo registrar';
                    var titulo_toast = 'El tipo se registró correctamente';
                    var titulo_toast_error = 'El tipo no se pudo registrar';
                } else if (accion == 4) {
                    var titulo_preg = "¿Está seguro de actualizar este tipo de Formación académica?";
                    var confirm_boton = 'Sí, deseo actualizar';
                    var titulo_toast = 'El tipo se actualizó correctamente';
                    var titulo_toast_error = 'El tipo no se pudo actualizar';
                }
                //levanto una ventana modal para preguntar si deseo continuar con el registro
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
                        datos.append("nombre_tipo", $("#nombreTipo").val());

                        if (accion == 4) {
                            datos.append("id_tipo", $id_tipo);
                        }
                        $.ajax({
                            url: "../ajax/tipoFormacion.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {
                                if (respuesta == "ok") { //si se enviaron los datos
                                    Toast.fire({
                                        icon: 'success',
                                        title: titulo_toast,
                                        position: 'top'
                                    });

                                    table.ajax.reload(); //recarga el table
                                    $("#mdlGestionarTipoFormacion").modal('hide');
                                    limpiar();

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: titulo_toast_error,
                                        position: 'top'
                                    });
                                    table.ajax.reload();
                                    $("#mdlGestionarTipoFormacion").modal('hide');
                                    limpiar();
                                }
                            }
                        })
                    } else if (result.isDenied) {
                        //si cancelaste la confirmación(2da ventana modal)
                        Swal.fire('Los cambios no se guardaron', '', 'info');
                        $("#mdlGestionarTipoFormacion").modal('hide');
                        limpiar();
                    }
                })
            } else {
                //si no llenaste todo el formulario
                $("#nombreTipo").addClass("is-invalid");
            }

            form.classList.add('was-validate');
        });
    });

    //botón cancelar
    document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
        limpiar();
    })

    //cerrar modal
    $("#btnCerrarModal").on('click', function() {
        limpiar();
    })

    function limpiar() {
        $(".needs-validation").removeClass("was-validate");
        $("#nombreTipo").removeClass("is-invalid");
        $("#nombreTipo").val("");
    }
</script>
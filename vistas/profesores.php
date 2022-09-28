<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profesores</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- row para listado de profesores -->
        <div class="row">
            <div class="col-lg-12">
                <table id="tbl_profesor" class="table table-striped w-100 shadow">
                    <thead>
                        <tr style="font-size: 15px;">
                            <th>ID</th>
                            <th>Dni</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Descripción</th>
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

<!-- Ventana modal para ingresar o modificar un profesor -->
<div class="modal fade" id="mdlGestionarProfesor" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Contenido de la ventana -->
        <div class="modal-content">

            <!-- Cabecera de la ventana -->
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title">Profesor</h5>
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-dismiss="modal" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>

            <!-- Cuerpo de la ventana -->
            <div class="modal-body">

                <form class="needs-validation" novalidate>
                    <div class="row">

                        <!-- DNI -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="dniProfesor">
                                    <span class="small">DNI </span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="dniProfesor" name="dniProfesor" placeholder="Ingrese el DNI del profesor" required>
                                <div class="invalid-feedback">
                                    Ingrese un DNI para este profesor
                                </div>
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="nombreProfesor">
                                    <span class="small">Nombre </span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="nombreProfesor" name="nombreProfesor" placeholder="Ingrese el nombre del profesor" required>
                                <div class="invalid-feedback">
                                    Ingrese una nombre para este profesor
                                </div>
                            </div>
                        </div>

                        <!-- Apellido Paterno -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="apPaterProfesor">
                                    <span class="small">Apellido Paterno </span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="apPaterProfesor" name="apPaterProfesor" placeholder="Ingrese el apellido paterno del profesor" required>
                                <div class="invalid-feedback">
                                    Ingrese un apellido paterno para este profesor
                                </div>
                            </div>
                        </div>

                        <!-- Apellido Materno -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="apMaterProfesor">
                                    <span class="small">Apellido Materno </span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="apMaterProfesor" name="apMaterProfesor" placeholder="Ingrese el apellido materno del profesor" required>
                                <div class="invalid-feedback">
                                    Ingrese un apellido materno para este profesor
                                </div>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="descripcionProfesor">
                                    <span class="small">Descripción </span><span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control form-control-sm" id="descripcionProfesor" name="descripcionProfesor" required cols="30" rows="10"></textarea>
                                <div class="invalid-feedback">
                                    Ingrese una descripción para este profesor
                                </div>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="imagenProfesor">
                                    <span class="small">Imagen </span><span class="text-danger text-danger-asterisco">*</span>
                                </label>
                                <input type="file" class="form-control-file form-control-sm" id="imagenProfesor" name="imagenProfesor">
                                <div class="invalid-feedback">
                                    Seleccione una imagen para este profesor
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Botones de Cancelar y Guardar -->
                <div class="d-flex w-100 justify-content-end">
                    <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-dismiss="modal" id="btnCancelarProfesor">Cancelar</button>

                    <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardarProfesor">Guardar</button>
                </div>
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

        table = $("#tbl_profesor").DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Agregar Profesor',
                    className: 'addNewRecord',
                    action: function(e, dt, node, config) {
                        limpiar();
                        $("#mdlGestionarProfesor").modal('show');
                        accion = 2; //registrar
                    }
                },
                'excel', 'print', 'pageLength'
            ],
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,
            ajax: {
                url: "../ajax/profesor.ajax.php",
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
                    targets: 0, //id
                    visible: false
                },
                {
                    targets: 4, //descripcion
                    visible: true
                },
                {
                    targets: 5, //img
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return '<img src="' + data + '"  height="50px" width="50px">';
                    }
                },
                {
                    targets: 6, //vigencia
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
                    render: function(datqa, type, full, meta) {
                        var check = "<span class='btnVigenciaProfesor text-success h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-check fs-5'></i>" +
                            "</span>";

                        var aspa = "<span class='btnVigenciaProfesor text-danger h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-times'></i>" +
                            "</span>";

                        var editar = "<span class='btnEditarProfesor text-primary px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-pencil-alt fs-5'></i>" +
                            "</span>";
                        if (full[8] == 1) { //posición de la vigencia
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
    // click en el botón (lapiz) editar LLENA LA VENTANA MODAL
    /*===================================================================*/
    $('#tbl_profesor').on('click', '.btnEditarProfesor', function() {
        accion = 4;

        $("#mdlGestionarProfesor").modal('show');
        var data = table.row($(this).parents('tr')).data();
        $id = data[0];

        $('#dniProfesor').val(data[1]);
        $('#nombreProfesor').val(data[2]);
        $('#apPaterProfesor').val(data[3]);
        $('#apMaterProfesor').val(data[4]);
        $('#descripcionProfesor').val(data[5]);
        $('#imagenProfesor').prop('disabled', true);
        $('.text-danger-asterisco').each(function() {
            $(this).hide();
        });
    })


    /*===================================================================*/
    // Evento al dar click en el botón dar de baja
    /*===================================================================*/
    $('#tbl_profesor').on('click', '.btnVigenciaProfesor', function() {
        accion = 5;
        var data = table.row($(this).parents('tr')).data();
        $id = data[0];
        $vigencia = data[7];
        console.log("data de la vigencia: " + data[7]);

        if ($vigencia == 1) {
            var titulo_preg = "¿Está seguro que desea dar de baja a este profesor?";
            var confirm_boton = 'Sí, dar de baja';
            var titulo_toast = 'El profesor se dio de baja';
            var titulo_toast_error = 'El profesor no se pudo dar de baja';
        } else {
            var titulo_preg = "¿Está seguro que desea recuperar a este profesor?";
            var confirm_boton = 'Sí, recuperar';
            var titulo_toast = 'El profesor se recuperó';
            var titulo_toast_error = 'El profesor no se pudo recuperar';
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
                    url: "../ajax/profesor.ajax.php",
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
                                title: titulo_toast_error,
                                position: 'top'
                            });
                        }
                    }
                })
            } else if (result.isDenied) {
                Swal.fire('Los cambios no se guardaron', '', 'info')
            }

        });
    })

    document.getElementById("btnGuardarProfesor").addEventListener("click", function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validacion = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === true) { //validar ingreso de campos
                if (accion == 2) {
                    var titulo_preg = "¿Está seguro de registrar a este profesor?";
                    var confirm_boton = 'Sí, deseo registrar';
                    var titulo_toast = 'El profesor se registró correctamente';
                    var titulo_toast_error = 'El profesor no se pudo registrar';
                } else if (accion == 4) {
                    var titulo_preg = "¿Está seguro de actualizar a este profesor?";
                    var confirm_boton = 'Sí, deseo actualizar';
                    var titulo_toast = 'El profesor se actualizó correctamente';
                    var titulo_toast_error = 'El profesor no se pudo actualizar';
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
                        datos.append('accion', accion);
                        datos.append("dni", $("#dniProfesor").val());
                        datos.append("nombre", $("#nombreProfesor").val());
                        datos.append("apPater", $("#apPaterProfesor").val());
                        datos.append("apMater", $("#apMaterProfesor").val());
                        datos.append("descripcion", $("#descripcionProfesor").val());
                        if (accion == 2) {
                            datos.append("imagen", $('#imagenProfesor')[0].files[0]);
                        } else if (accion == 4) {
                            datos.append("id", $id);
                        }
                        $.ajax({
                            url: "../ajax/profesor.ajax.php",
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

                                    table.ajax.reload(); //recarga el table

                                    $("#mdlGestionarProfesor").modal('hide');
                                    limpiar();
                                    //SE NECESITA RECARGAR EL COMBOBOX¿¿??

                                } else if (respuesta == "no-unico") {
                                    Toast.fire({
                                        icon: 'info',
                                        title: 'Este dni le corresponde a otro profesor',
                                        position: 'top'
                                    });
                                    table.ajax.reload(); //recarga el table

                                } else if (respuesta == "no-ocho") {
                                    Toast.fire({
                                        icon: 'info',
                                        title: 'El DNI debe tener 8 caracteres',
                                        position: 'top'
                                    });
                                    table.ajax.reload(); //recarga el table
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: titulo_toast_error,
                                        position: 'top'
                                    });
                                    table.ajax.reload();
                                    $("#mdlGestionarProfesor").modal('hide');
                                    limpiar();

                                }
                            }
                        })
                    } else if (result.isDenied) {
                        //si cancelaste la confirmación (2da ventana modal)
                        Swal.fire('Los cambios no se guardaron', '', 'info');
                        $("#mdlGestionarProfesor").modal('hide');
                        limpiar();
                    }
                })
            } else {
                //si no llenaste todo el formulario
                $(".needs-validation").removeClass("was-validate");
                $("#dniProfesor").removeClass("is-invalid");
                $("#nombreProfesor").removeClass("is-invalid");
                $("#apPaterProfesor").removeClass("is-invalid");
                $("#apMaterProfesor").removeClass("is-invalid");
                $("#descripcionProfesor").removeClass("is-invalid");
                $("#imagenProfesor").removeClass("is-invalid");
            }

            form.classList.add('was-validate');
        });
    });

    //botón cancelar
    document.getElementById("btnCancelarProfesor").addEventListener("click", function() {
        limpiar();
    })

    //cerrar modal
    $("#btnCerrarModal").on('click', function() {
        limpiar();
    })

    function limpiar() {
        $(".needs-validation").removeClass("was-validate");
        $("#dniProfesor").removeClass("is-invalid");
        $("#nombreProfesor").removeClass("is-invalid");
        $("#apPaterProfesor").removeClass("is-invalid");
        $("#apMaterProfesor").removeClass("is-invalid");
        $("#descripcionProfesor").removeClass("is-invalid");
        $("#imagenProfesor").removeClass("is-invalid");

        $('#imagenProfesor').prop('disabled', false);
        $('.text-danger-asterisco').each(function() {
            $(this).show();
        });

        $("#dniProfesor").val("");
        $("#nombreProfesor").val("");
        $("#apPaterProfesor").val("");
        $("#apMaterProfesor").val("");
        $("#descripcionProfesor").val("");
        $("#imagenProfesor").val("");

    }
</script>
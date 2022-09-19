<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Estudiantes</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- row para listado de estudiantes -->
        <div class="row">
            <div class="col-lg-12">
                <table id="tbl_estudiante" class="table table-striped w-100 shadow">
                    <thead class="bg-info">
                        <tr style="font-size: 15px;">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>ID Usuario</th>
                            <th>Usuario</th>
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

<!-- Ventana modal para ingresar o modificar un estudiante -->
<div class="modal fade" id="mdlGestionarEstudiante" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Contenido de la ventana -->
        <div class="modal-content">

            <!-- Cabecera de la ventana -->
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title">Agregar Estudiante</h5>
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-dismiss="modal" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>

            <!-- Cuerpo de la ventana -->
            <div class="modal-body">

                <form class="needs-validation" novalidate>
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="nombreEstudiante">
                                    <span class="small">Nombre</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="nombreEstudiante" name="nombreEstudiante" placeholder="Ingrese el nombre del estudiante" required>
                                <div class="invalid-feedback">
                                    Ingrese nombre
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="apellidosEstudiante">
                                    <span class="small">Apellidos</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="apellidosEstudiante" name="apellidosEstudiante" placeholder="Ingrese los apellidos del estudiante" required>
                                <div class="invalid-feedback">
                                    Ingrese apellidos
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 div-correo">
                            <div class="form-group mb-2">
                                <label class="" for="correoEstudiante">
                                    <span class="small">Correo</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="correoEstudiante" name="correoEstudiante" placeholder="Ingrese correo de estudiante" required>
                                <div class="invalid-feedback">
                                    Ingrese un correo
                                </div>
                            </div>
                        </div>

                        <!-- Usuario -->
                        <div class="col-lg-6 div-usuario">
                            <div class="form-group mb-2">
                                <p id="idUsuarioEstudiante" class="d-none">ID Usuario</p>
                                <label class="usuarioEstudiante" for="usuarioEstudiante">
                                    <span class="small">Usuario</span><span class="text-danger">*</span>
                                </label>
                                <select name="usuarioEstudiante" id="usuarioEstudiante" class="form-control form-control-sm">

                                </select>
                                <div class="invalid-feedback">
                                    Seleccione un usuario
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Cancelar y Guardar -->
                        <div class="d-flex w-100 justify-content-end">
                            <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-dismiss="modal" id="btnCancelarEstudiante">Cancelar</button>

                            <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardarEstudiante">Guardar</button>
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


        $.ajax({
            url: "../ajax/estudiante.ajax.php",
            type: "POST",
            data: {
                'accion': 1
            },
            dataType: 'json',
            success: function(respuesta) {}
        });


        //*===================================================================*/
        // CARGAR USUARIOS EN COMBOBOX
        /*===================================================================*/

        $.ajax({
            url: "../ajax/usuario.ajax.php",
            type: "POST",
            data: {
                'accion': 3
            },
            dataType: 'json',
            success: function(respuesta) {
                console.log(respuesta);
                var opciones = '<option value="0">--Seleccione--</option>';
                for (let index = 0; index < respuesta.length; index++) {
                    if (respuesta[index][5] == 1) {
                        var opciones = opciones + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                    }
                }
                $('#usuarioEstudiante').html(opciones);
            }
        });
        /*===================================================================*/
        // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
        /*===================================================================*/
        table = $("#tbl_estudiante").DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Agregar Estudiante',
                    className: 'addNewRecord',
                    action: function(e, dt, node, config) {
                        $("#mdlGestionarEstudiante").modal('show');
                        accion = 2; //registrar
                    }
                },
                'excel', 'print', 'pageLength'
            ],
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,
            ajax: {
                url: "../ajax/estudiante.ajax.php",
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
                    visible: true //id
                },
                {
                    targets: 4, //vigencia
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
                    targets: 5, //ID Usuario
                    visible: false //id
                },
                {
                    targets: 7, //opciones
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var check = "<span class='btnVigenciaEstudiante text-success h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-check fs-5'></i>" +
                            "</span>";

                        var aspa = "<span class='btnVigenciaEstudiante text-danger h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-times'></i>" +
                            "</span>";

                        var editar = "<span class='btnEditarEstudiante text-primary px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-pencil-alt fs-5'></i>" +
                            "</span>";
                        if (full[4] == 1) { //posición de la vigencia
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
        // Limpiar inputs al cerrar la ventana modal
        /*===================================================================*/

        $("#btnCerrarModal, #btnCancelarEstudiante").on('click', function() {

            $("#nombreEstudiante").val("");
            $("#apellidosEstudiante").val("");
            $("#correoEstudiante").val("");
            $("#usuarioEstudiante").val(0);
        })

        /*===================================================================*/
        // click en el botón (lapiz) editar LLENA LA VENTANA MODAL
        /*===================================================================*/
        $('#tbl_estudiante').on('click', '.btnEditarEstudiante', function() {
            accion = 4;

            $("#mdlGestionarEstudiante").modal('show');
            $("#usuarioEstudiante").hide();
            $(".usuarioEstudiante").hide();
            $(".div-correo").css("flex", "0 0 100%");
            $(".div-correo").css("max-width", "100%");

            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $id_estu = data[0];
            $nombre_estu = data[1];
            $apellidos_estu = data[2];
            $correo_estu = data[3];
            $idUsuario_estu = data[5];

            $('#nombreEstudiante').val(data[1]);
            $('#apellidosEstudiante').val(data[2]);
            $('#correoEstudiante').val(data[3]);
            $('#idUsuarioEstudiante').val(data[5]);
            $('#usuarioEstudiante').val(data[5]);
        })
    })

    /*===================================================================*/
    // Evento al dar click en el botón dar de baja
    /*===================================================================*/

    // $('#tbl_usuario').on('click', '.btnVigenciaUsuario', function() {
    //     accion = 5;
    //     var data = table.row($(this).parents('tr')).data();
    //     console.log(data);
    //     $id_usu = data[0];
    //     $vigencia_usu = data[5];

    //     if ($vigencia_usu == 1) {
    //         var titulo_preg = "¿Está seguro que desea dar de baja a este usuario?";
    //         var confirm_boton = 'Sí, dar de baja';
    //         var titulo_toast = 'El usuario se dio de baja';
    //         var titulo_toast_error = 'El usuario no se pudo dar de baja';
    //     } else {
    //         var titulo_preg = "¿Está seguro que desea recuperar a este usuario?";
    //         var confirm_boton = 'Sí, recuperar';
    //         var titulo_toast = 'El usuario se recuperó';
    //         var titulo_toast_error = 'El usuario no se pudo recuperar';
    //     }

    //     Swal.fire({
    //         title: titulo_preg,
    //         icon: 'warning',
    //         showDenyButton: true,
    //         confirmButtonColor: '#3085d6',
    //         denyButtonColor: '#d33',
    //         confirmButtonText: confirm_boton,
    //         denyButtonText: 'Cancelar',
    //     }).then((result) => {
    //         if (result.isConfirmed) { //si la respuesta ha sido confirmada...
    //             var datos = new FormData();
    //             datos.append("accion", accion);
    //             datos.append("id_usu", $id_usu);
    //             datos.append("vigencia_usu", $vigencia_usu);
    //             $.ajax({
    //                 url: "../ajax/usuario.ajax.php",
    //                 method: "POST",
    //                 data: datos,
    //                 cache: false,
    //                 contentType: false,
    //                 processData: false,
    //                 dataType: 'json',
    //                 success: function(respuesta) {
    //                     if (respuesta == "ok") {
    //                         Toast.fire({
    //                             icon: 'success',
    //                             title: titulo_toast,
    //                             position: 'top',
    //                         });

    //                         table.ajax.reload(); //recarga el table

    //                         $("#mdlGestionarUsuario").modal('hide');
    //                         $("#nombreUsuario").val("");
    //                         $("#claveUsuario").val("");
    //                         $("#avatarUsuario").val("");
    //                         $("#rolUsuario").val("");

    //                     } else {
    //                         Toast.fire({
    //                             icon: 'error',
    //                             title: titulo_toast_error
    //                         });
    //                     }
    //                 }
    //             })
    //         } else if (result.isDenied) {
    //             Swal.fire('Los cambios no se guardaron', '', 'info')
    //         }

    //     });
    // })


    document.getElementById("btnGuardarEstudiante").addEventListener("click", function() {

        var forms = document.getElementsByClassName('needs-validation');
        var validacion = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === true) {
                //validar ingreso de campos
                if (accion == 2) {
                    var titulo_preg = "¿Está seguro de registrar este Estudiante?";
                    var confirm_boton = 'Sí, deseo registrar';
                } else if (accion == 4) {
                    var titulo_preg = "¿Está seguro de actualizar este Estudiante?";
                    var confirm_boton = 'Sí, deseo actualizar';
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
                        datos.append("nombre_estu", $("#nombreEstudiante").val());
                        datos.append("apellidos_estu", $("#apellidosEstudiante").val());
                        datos.append("correo_estu", $("#correoEstudiante").val());
                        datos.append("usuario_estu", $("#idUsuarioEstudiante").val());

                        if (accion == 2) {
                            var titulo_msg = 'El estudiante se registró correctamente';
                        } else if (accion == 4) {
                            datos.append("idUsuario_estu", $idUsuario_estu);
                            datos.append("id_estu", $id_estu);
                            var titulo_msg = 'El estudiante se actualizó correctamente';
                        }
                        $.ajax({
                            url: "../ajax/estudiante.ajax.php",
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
                                        title: titulo_msg,
                                        position: 'top',
                                    });

                                    table.ajax.reload(); //recarga el table

                                    $("#mdlGestionarEstudiante").modal('hide');
                                    $("#nombreEstudiante").val("");
                                    $("#apellidosEstudiante").val("");
                                    $("#correoEstudiante").val("");
                                    $("#usuarioEstudiante").val(0);
                                    $(".div-correo").css("flex", "0 0 50%");
                                    $(".div-correo").css("max-width", "50%");
                                    $(".div-usuario").show();

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El estudiante no se pudo agregar'
                                    });

                                }
                            }
                        })
                    } else if (result.isDenied) {
                        Swal.fire('Los cambios no se guardaron', '', 'info');
                        $("#mdlGestionarEstudiante").modal('hide');
                        $("#nombreEstudiante").val("");
                        $("#apellidosEstudiante").val("");
                        $("#correoEstudiante").val("");
                        $("#usuarioEstudiante").val(0);
                        $(".div-correo").css("flex", "0 0 50%");
                        $(".div-correo").css("max-width", "50%");
                        $(".div-usuario").show();
                    }
                })
            } else {
                $("#nombreEstudiante").addClass("is-invalid");
                $("#apellidosEstudiante").addClass("is-invalid");
                $("#correoEstudiante").addClass("is-invalid");
                $("#usuarioEstudiante").addClass("is-invalid");
            }

            form.classList.add('was-validate');
        });
    });

    document.getElementById("btnCancelarEstudiante").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validate");
        $("#nombreEstudiante").removeClass("is-invalid");
        $("#apellidosEstudiante").removeClass("is-invalid");
        $("#correoEstudiante").removeClass("is-invalid");
        $("#usuarioEstudiante").removeClass("is-invalid");
        $(".div-correo").css("flex", "0 0 50%");
        $(".div-correo").css("max-width", "50%");
        $("#usuarioEstudiante").show();
        $(".usuarioEstudiante").show();
    })
</script>
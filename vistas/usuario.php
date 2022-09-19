 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Usuarios</h1>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <!-- row para listado de usuarios -->
         <div class="row">
             <div class="col-lg-12">
                 <table id="tbl_usuario" class="table table-striped w-100 shadow">
                     <thead class="bg-info">
                         <tr style="font-size: 15px;">
                             <th>ID</th>
                             <th>Nombre</th>
                             <th>Contraseña</th>
                             <th>Avatar</th>
                             <th>Rol</th>
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

 <!-- Ventana modal para ingresar o modificar un usuario -->
<div class="modal fade" id="mdlGestionarUsuario" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Contenido de la ventana -->
        <div class="modal-content">

            <!-- Cabecera de la ventana -->
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title">Agregar Usuario</h5>
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
                                <label class="" for="nombreUsuario">
                                    <span class="small">Nombre de usuario</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="nombreUsuario" name="nombreUsuario" placeholder="Ingrese el nombre del usuario" required>
                                <div class="invalid-feedback">
                                    Ingrese un nombre de usuario
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="claveUsuario">
                                    <span class="small">Contraseña de usuario</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="claveUsuario" name="claveUsuario" placeholder="Ingrese la contraseña del usuario" required>
                                <div class="invalid-feedback">
                                    Ingrese una contraseña de usuario
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="avatarUsuario">
                                    <span class="small">Avatar de usuario</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="avatarUsuario" name="avatarUsuario" placeholder="Ingrese avatar de usuario" required>
                                <div class="invalid-feedback">
                                    Ingrese un avatar de usuario
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label class="" for="rolUsuario">
                                    <span class="small">Rol del usuario</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="rolUsuario" name="rolUsuario" placeholder="Ingrese el rol del usuario" required>
                                <div class="invalid-feedback">
                                    Ingrese un rol de usuario
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Cancelar y Guardar -->
                        <div class="d-flex w-100 justify-content-end">
                            <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-dismiss="modal" id="btnCancelarUsuario">Cancelar</button>

                            <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardarUsuario">Guardar</button>
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
            url: "../ajax/usuario.ajax.php",
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
        table = $("#tbl_usuario").DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    text: 'Agregar Usuario',
                    className: 'addNewRecord',
                    action: function(e, dt, node, config) {
                        $("#mdlGestionarUsuario").modal('show');
                        accion = 2; //registrar
                    }
                },
                'excel', 'print', 'pageLength'
            ],
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,
            ajax: {
                url: "../ajax/usuario.ajax.php",
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
                     targets: 5, //vigencia
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
                    targets: 6, //opciones
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var check = "<span class='btnVigenciaUsuario text-success h5 px-1' style='cursor:pointer;'>" +
                                        "<i class='fa fa-check fs-5'></i>" +
                                    "</span>";

                        var aspa = "<span class='btnVigenciaUsuario text-danger h5 px-1' style='cursor:pointer;'>" +
                                        "<i class='fa fa-times'></i>" +
                                    "</span>";

                        var editar ="<span class='btnEditarUsuario text-primary px-1' style='cursor:pointer;'>" +
                                        "<i class='fas fa-pencil-alt fs-5'></i>" +
                                    "</span>" ;
                        if (full[5] == 1){ //posición de la vigencia
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

        $("#btnCerrarModal, #btnCancelarUsuario").on('click', function() {

            $("#nombreUsuario").val("");
            $("#claveUsuario").val("");
            $("#avatarUsuario").val("");
            $("#rolUsuario").val("");
        })

        /*===================================================================*/
        // Evento al dar click en el botón (lapiz) editar
        /*===================================================================*/
        $('#tbl_usuario').on('click', '.btnEditarUsuario', function() {
            accion = 4;

            $("#mdlGestionarUsuario").modal('show');

            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $id_usu = data[0];
            $nombre_usu = data[1];
            $clave_usu = data[2];
            $img_usu = data[3];
            $rol_usu = data[4];
            $('#nombreUsuario').val(data[1]);
            $('#claveUsuario').val(data[2]);
            $('#avatarUsuario').val(data[3]);
            $('#rolUsuario').val(data[4]);
        })
    })

        /*===================================================================*/
        // Evento al dar click en el botón dar de baja
        /*===================================================================*/

        $('#tbl_usuario').on('click', '.btnVigenciaUsuario', function() {
            accion = 5;
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            $id_usu = data[0];
            $vigencia_usu = data[5];

            if ($vigencia_usu == 1) {
                var titulo_preg = "¿Está seguro que desea dar de baja a este usuario?";
                var confirm_boton = 'Sí, dar de baja';
                var titulo_toast = 'El usuario se dio de baja';
                var titulo_toast_error = 'El usuario no se pudo dar de baja';
            } else {
                var titulo_preg = "¿Está seguro que desea recuperar a este usuario?";
                var confirm_boton = 'Sí, recuperar';
                var titulo_toast = 'El usuario se recuperó';
                var titulo_toast_error = 'El usuario no se pudo recuperar';
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
                    datos.append("id_usu", $id_usu);
                    datos.append("vigencia_usu", $vigencia_usu);
                    $.ajax({
                        url: "../ajax/usuario.ajax.php",
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
                                    position: 'top',
                                });

                                table.ajax.reload(); //recarga el table

                                $("#mdlGestionarUsuario").modal('hide');
                                $("#nombreUsuario").val("");
                                $("#claveUsuario").val("");
                                $("#avatarUsuario").val("");
                                $("#rolUsuario").val("");

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


    document.getElementById("btnGuardarUsuario").addEventListener("click", function() {

        var forms = document.getElementsByClassName('needs-validation');
        var validacion = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === true) {
                //validar ingreso de campos
                if (accion == 2) {
                    var titulo_preg = "¿Está seguro de registrar este Usuario?";
                    var confirm_boton = 'Sí, deseo registrar';
                } else if (accion == 4) {
                    var titulo_preg = "¿Está seguro de actualizar este Usuario?";
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
                        datos.append("nombre_usu", $("#nombreUsuario").val());
                        datos.append("clave_usu", $("#claveUsuario").val());
                        datos.append("avatar_usu", $("#avatarUsuario").val());
                        datos.append("rol_usu", $("#rolUsuario").val());

                        if (accion == 2) {
                            var titulo_msg = 'El usuario se registró correctamente';
                        } else if (accion == 4) {
                            datos.append("id_usu", $id_usu);
                            var titulo_msg = 'El usuario se actualizó correctamente';
                        }
                        $.ajax({
                            url: "../ajax/usuario.ajax.php",
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

                                    $("#mdlGestionarUsuario").modal('hide');
                                    $("#nombreUsuario").val("");
                                    $("#claveUsuario").val("");
                                    $("#avatarUsuario").val("");
                                    $("#rolUsuario").val("");

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El usuario no se pudo agregar'
                                    });

                                }
                            }
                        })
                    } else if (result.isDenied) {
                        Swal.fire('Los cambios no se guardaron', '', 'info');
                        $("#mdlGestionarUsuario").modal('hide');
                        $("#nombreUsuario").val("");
                    }
                })
            } else {
                $("#nombreUsuario").addClass("is-invalid");
            }

            form.classList.add('was-validate');
        });
    });

    document.getElementById("btnCancelarUsuario").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validate");
        $("#nombreUsuario").removeClass("is-invalid");
    })
</script>
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
                    <thead >
                        <tr style="font-size: 15px;">
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Aprendizaje</th>
                            <th>Duración</th>
                            <th>Creación</th>
                            <th>Precio</th>
                            <th>ID Profesor</th>
                            <th>Profesor</th>
                            <th>ID Tipo</th>
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

<!-- Ventana modal para ingresar o modificar una Formación académica -->
<div class="modal fade" id="mdlGestionarFormacionAcademica" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Contenido de la ventana -->
        <div class="modal-content">

            <!-- Cabecera de la ventana -->
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title">Formación académica</h5>
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" id="btnCerrarModal" data-dismiss="modal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>

            <!-- Cuerpo de la ventana -->
            <div class="modal-body">

                <!-- <form method="POST" enctype="multipart/form-data" id="formulario"> -->
                <form class="needs-validation" novalidate>
                    <div class="row">

                        <!-- NOMBRE -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label for="nombreFormacion">
                                    <span class="small">Nombre </span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="nombreFormacion" name="nombreFormacion" placeholder="Ingrese el nombre de la formación" required>
                                <div class="invalid-feedback">
                                    Ingrese un nombre de formación académica
                                </div>
                            </div>
                        </div>

                        <!-- DURACION -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label for="duracionFormacion">
                                    <span class="small">Duración (en horas) </span></span><span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control form-control-sm" id="duracionFormacion" name="duracionFormacion" placeholder="Ingrese la duración de la formación" min=0 required>
                                <div class="invalid-feedback">
                                    Ingrese una duración de formación académica
                                </div>
                            </div>
                        </div>

                        <!-- PRECIO -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label for="precioFormacion">
                                    <span class="small">Precio </span></span><span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control form-control-sm" id="precioFormacion" name="precioFormacion" placeholder="Ingrese el precio de la formación" step="0.01" min="0" required>
                                <div class="invalid-feedback">
                                    Ingrese un precio de formación académica
                                </div>
                            </div>
                        </div>

                        <!-- PROFESOR -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <input id="idProfesorFormacion" value="" disabled hidden>
                                <label for="profesorFormacion">
                                    <span class="small">Profesor </span></span><span class="text-danger">*</span>
                                </label>
                                <select name="profesorFormacion" id="profesorFormacion" class="form-control form-control-sm">

                                </select>
                                <div class="invalid-feedback">
                                    Seleccione un profesor para esta formación
                                </div>
                            </div>
                        </div>

                        <!-- TIPO -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <input id="idTipoFormacion" value="" disabled hidden>
                                <label for="tipoFormacion">
                                    <span class="small">Tipo </span></span><span class="text-danger">*</span>
                                </label>
                                <select name="tipoFormacion" id="tipoFormacion" class="form-control form-control-sm">

                                </select>
                                <div class="invalid-feedback">
                                    Seleccione un tipo para esta formación
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN-->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">

                                <label for="imagenFormacion">
                                    <span class="small">Imagen </span></span><span class="text-danger text-danger-asterisco">*</span>
                                </label>
                                <input type="file" class="form-control-file form-control-sm" name="imagenFormacion" id="imagenFormacion">
                                <div class="invalid-feedback">
                                    Seleccione una imagen para esta formación
                                </div>
                            </div>
                        </div>

                        <!-- DESCRIPCION -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label for="descripcionFormacion">
                                    <span class="small">Descripción </span></span><span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control form-control-sm" id="descripcionFormacion" name="descripcionFormacion" required cols="30" rows="10"></textarea>
                                <div class="invalid-feedback">
                                    Ingrese una descripción para esta formación
                                </div>
                            </div>
                        </div>

                        <!-- APRENDIZAJE -->
                        <div class="col-lg-6">
                            <div class="form-group mb-2">
                                <label for="aprendizajeFormacion">
                                    <span class="small">Aprendizaje </span></span><span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control form-control-sm" id="aprendizajeFormacion" name="aprendizajeFormacion" required cols="30" rows="10"></textarea>
                                <div class="invalid-feedback">
                                    Seleccione un aprendizaje para esta formación
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Botones de Cancelar y Guardar -->
                <div class="d-flex w-100 justify-content-end">
                    <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-dismiss="modal" id="btnCancelarFormacion">Cancelar</button>

                    <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardarFormacion">Guardar</button>
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
                    if (respuesta[index][2] == 1) { //si el tipo está vigente
                        var opciones = opciones + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>'; //llena el valor = ID & texto = nombre tipo
                    }
                }
                $('#tipoFormacion').html(opciones); //llena el select
            }
        });

        //*===================================================================*/
        // CARGAR PROFESORES EN COMBOBOX
        /*===================================================================*/
        $.ajax({
            url: "../ajax/profesor.ajax.php",
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
                $('#profesorFormacion').html(opciones);
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
                        limpiar();
                        $("#mdlGestionarFormacionAcademica").modal('show');
                        accion = 2; //registrar
                        $(document).on('change', '#profesorFormacion', function(event) {
                            $('#idProfesorFormacion').val($(this).val());
                        }); // lleno el value profesor
                        $(document).on('change', '#tipoFormacion', function(event) {
                            $('#idTipoFormacion').val($(this).val());
                        }); // lleno el value tipo
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
                    targets: 0, //id
                    visible: false
                },
                {
                    targets: 2, //descripcion
                    visible: false
                },
                {
                    targets: 3, //aprendizaje
                    visible: false
                },
                {
                    targets: 7, //id Profe
                    visible: false
                },
                {
                    targets: 9, //id Tipo
                    visible: false
                },
                {
                    targets: 11, //imagen
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return '<img src="' + data + '"  height="50px" width="50px">';
                    }
                },
                {
                    targets: 12, //vigencia
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
                    targets: 13, //opciones
                    orderable: false,
                    render: function(datqa, type, full, meta) {
                        var check = "<span class='btnVigenciaFormacion text-success h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-check fs-5'></i>" +
                            "</span>";

                        var aspa = "<span class='btnVigenciaFormacion text-danger h5 px-1' style='cursor:pointer;'>" +
                            "<i class='fa fa-times'></i>" +
                            "</span>";

                        var editar = "<span class='btnEditarFormacion text-primary px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-pencil-alt fs-5'></i>" +
                            "</span>";
                        if (full[12] == 1) { //posición de la vigencia
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
    $('#tbl_formacionAcademica').on('click', '.btnEditarFormacion', function() {
        accion = 3;

        $("#mdlGestionarFormacionAcademica").modal('show');
        var data = table.row($(this).parents('tr')).data();
        $id = data[0];

        //llenes los id
        $(document).on('change', '#profesorFormacion', function(event) {
            $('#idProfesorFormacion').val($(this).val());
        }); // lleno el value profesor
        $(document).on('change', '#tipoFormacion', function(event) {
            $('#idTipoFormacion').val($(this).val());
        }); // lleno el value tipo

        var duracion = data[4].match(/(\d+)/)
        var precio = data[6].match(/(\d+)/)

        $('#nombreFormacion').val(data[1]);
        $('#descripcionFormacion').val(data[2]);
        $('#aprendizajeFormacion').val(data[3]);
        $('#duracionFormacion').val(duracion[0]);
        $('#precioFormacion').val(precio[0]);
        $('#profesorFormacion').val(data[7]); //id Profe me llena el nombre
        $('#idProfesorFormacion').val(data[7]); //id Profe me llena el value
        $('#tipoFormacion').val(data[9]); //id Tipo me llena el nombre
        $('#idTipoFormacion').val(data[9]); //id Tipo me llena el value
        $('.text-danger-asterisco').each(function() {
            $(this).hide();
        });
    })


    /*===================================================================*/
    // Evento al dar click en el botón dar de baja
    /*===================================================================*/
    $('#tbl_formacionAcademica').on('click', '.btnVigenciaFormacion', function() {
        accion = 4;
        var data = table.row($(this).parents('tr')).data();
        $id = data[0];
        $vigencia = data[12];

        if ($vigencia == 1) {
            var titulo_preg = "¿Está seguro que desea dar de baja a esta formación?";
            var confirm_boton = 'Sí, dar de baja';
            var titulo_toast = 'La formación se dio de baja';
            var titulo_toast_error = 'La formación no se pudo dar de baja';
        } else {
            var titulo_preg = "¿Está seguro que desea recuperar a esta formación?";
            var confirm_boton = 'Sí, recuperar';
            var titulo_toast = 'La formación se recuperó';
            var titulo_toast_error = 'La formación no se pudo recuperar';
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
                    url: "../ajax/formacionAcademica.ajax.php",
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

    document.getElementById("btnGuardarFormacion").addEventListener("click", function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validacion = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === true) { //validar ingreso de campos
                if (accion == 2) {
                    var titulo_preg = "¿Está seguro de registrar esta Formación?";
                    var confirm_boton = 'Sí, deseo registrar';
                    var titulo_toast = 'La Formación se registró correctamente';
                    var titulo_toast_error = 'La Formación no se pudo registrar';
                } else if (accion == 3) {
                    var titulo_preg = "¿Está seguro de actualizar esta Formación?";
                    var confirm_boton = 'Sí, deseo actualizar';
                    var titulo_toast = 'La Formación se actualizó correctamente';
                    var titulo_toast_error = 'La Formación no se pudo actualizar';
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
                        datos.append("nombre", $("#nombreFormacion").val());
                        datos.append("duracion", $("#duracionFormacion").val());
                        datos.append("precio", $("#precioFormacion").val());
                        datos.append("profesor", $("#idProfesorFormacion").val());
                        datos.append("tipo", $("#idTipoFormacion").val());
                        datos.append("descripcion", $("#descripcionFormacion").val());
                        datos.append("aprendizaje", $("#aprendizajeFormacion").val());
                        if (accion == 2) {
                            datos.append("imagen", $('#imagenFormacion')[0].files[0]);
                        } else if (accion == 3) {
                            datos.append("id", $id);
                        }
                        $.ajax({
                            url: "../ajax/formacionAcademica.ajax.php",
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

                                    $("#mdlGestionarFormacionAcademica").modal('hide');
                                    limpiar();
                                    //SE NECESITA RECARGAR EL COMBOBOX¿¿??

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: titulo_toast_error,
                                        position: 'top'
                                    });
                                    table.ajax.reload();
                                    $("#mdlGestionarFormacionAcademica").modal('hide');
                                    limpiar();

                                }
                            }
                        })
                    } else if (result.isDenied) {
                        //si cancelaste la confirmación (2da ventana modal)
                        Swal.fire('Los cambios no se guardaron', '', 'info');
                        $("#mdlGestionarFormacionAcademica").modal('hide');
                        limpiar();
                    }
                })
            } else {
                //si no llenaste todo el formulario
                $(".needs-validation").removeClass("was-validate");
                $("#nombreFormacion").removeClass("is-invalid");
                $("#duracionFormacion").removeClass("is-invalid");
                $("#precioFormacion").removeClass("is-invalid");
                $("#profesorFormacion").removeClass("is-invalid");
                $("#tipoFormacion").removeClass("is-invalid");
                $("#imagenFormacion").removeClass("is-invalid");
                $("#descripcionFormacion").removeClass("is-invalid");
                $("#aprendizajeFormacion").removeClass("is-invalid");
            }

            form.classList.add('was-validate');
        });
    });

    //botón cancelar
    document.getElementById("btnCancelarFormacion").addEventListener("click", function() {
        limpiar();
    })

    //cerrar modal
    $("#btnCerrarModal").on('click', function() {
        limpiar();
    })

    function limpiar() {
        $(".needs-validation").removeClass("was-validate");
        $("#nombreFormacion").removeClass("is-invalid");
        $("#duracionFormacion").removeClass("is-invalid");
        $("#precioFormacion").removeClass("is-invalid");
        $("#profesorFormacion").removeClass("is-invalid");
        $("#tipoFormacion").removeClass("is-invalid");
        $("#imagenFormacion").removeClass("is-invalid");
        $("#descripcionFormacion").removeClass("is-invalid");
        $("#aprendizajeFormacion").removeClass("is-invalid");

        $('#imagenFormacion').prop('disabled', false);
        $('.text-danger-asterisco').each(function() {
            $(this).show();
        });

        $("#nombreFormacion").val("");
        $("#duracionFormacion").val("");
        $("#precioFormacion").val("");
        $("#profesorFormacion").val(0);
        $("#idProfesorFormacion").val("");
        $("#tipoFormacion").val(0);
        $("#idTipoFormacion").val("");
        $("#imagenFormacion").val("");
        $("#descripcionFormacion").val("");
        $("#aprendizajeFormacion").val("");

    }
</script>
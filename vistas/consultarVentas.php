<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Consultar ventas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title m-0">Seleccionar fechas</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label for="fechaInicio" class="col-form-label">Fecha de inicio</label>
                    </div>
                    <div class="col-lg-3">
                        <label for="fechaFin" class="col-form-label">Fecha de fin</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <input class="form-control" type="date" name="fechaInicio" id="fechaInicio">
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="date" name="fechaFin" id="fechaFin">
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-primary" id="buscar">Buscar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table id="tbl_compra" class="table table-striped w-100 shadow">
                    <thead>
                        <tr style="font-size: 15px;">
                            <th>ID</th>
                            <th>Estado</th>
                            <th>Estudiante</th>
                            <th>Profesor</th>
                            <th>Formación Académica</th>
                            <th>Tipo</th>
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
    var table;
    /*===================================================================*/
    // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
    /*===================================================================*/
    document.getElementById("buscar").addEventListener("click", function() {
        let fechaInicio = $("#fechaInicio").val();
        let fechaFin = $("#fechaFin").val();

        if (fechaFin === '' || fechaInicio === '') {
            Swal.fire('La fecha de inicio y fin son obligatorias', '', 'error')
        } else if (fechaFin < fechaInicio) {
            Swal.fire('La fecha de inicio no puede ser mayor a la fecha de fin', '', 'error')
        } else {

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
                        'accion': 6,
                        'fechaInicio': fechaInicio,
                        'fechaFin': fechaFin
                    },
                    error: function(e) {
                        console.log(e.responseText);
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
                        targets: 1, //vigencia
                        orderable: false,
                        render: function(data, type, full, meta) {
                            if (data == '1') {
                                return '<span class="badge badge-success">Activado</span>';
                            } else {
                                return '<span class="badge badge-danger">Desactivado</span>';
                            }
                        }
                    }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                bDestroy: true
            });
        }
    })
</script>
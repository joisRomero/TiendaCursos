 <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Tablero Principal</h1>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <!-- BOX 1 -->
             <div class="col-lg-3">
                 <!-- Small box -->
                 <div class="small-box bg-info">
                     <div class="inner">
                         <h4 id="totalCursos"></h4>
                         <p>Formaciones académicas</p>
                     </div>
                     <a class="small-box-footer cursor-pointer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>

             <!-- BOX 2 -->
             <div class="col-lg-3">
                 <!-- Small box -->
                 <div class="small-box bg-success">
                     <div class="inner">
                         <h4 id="totalEstudiantes">12</h4>
                         <p>Eestudiantes</p>
                     </div>
                     <a class="small-box-footer cursor-pointer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>

             <!-- BOX 3 -->
             <div class="col-lg-3">
                 <!-- Small box -->
                 <div class="small-box bg-warning">
                     <div class="inner">
                         <h4 id="totalProfesores">12</h4>
                         <p>Profesores</p>
                     </div>
                     <a class="small-box-footer cursor-pointer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>

             <div class="col-lg-3">
                 <!-- Small box -->
                 <div class="small-box bg-danger">
                     <div class="inner">
                         <h4 id="totalGanancias">12</h4>
                         <p>Ganancias</p>
                     </div>
                     <a class="small-box-footer cursor-pointer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
         </div>

         <div class="row">
             <div class="col-lg-6">
                 <div class="card card-info">
                     <div class="card-header">
                         <h3 class="card-title">Los 5 últimas formaciones académicas registrados</h3>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table" id="tbl_formaciones_academicas_registradas">
                                 <thead>
                                     <tr>
                                         <th>Nombre</th>
                                         <th>Duración</th>
                                         <th>Precio</th>
                                         <th>Tipo</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-6">
                 <div class="card card-info">
                     <div class="card-header">
                         <h3 class="card-title">Los 5 últimos estudiantes registrados</h3>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table" id="tbl_estudiantes">
                                 <thead>
                                     <tr>
                                         <th>Nombre</th>
                                         <th>Apellido</th>
                                         <th>Correo</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="row">
             <div class="col-lg-6">
                 <div class="card card-info">
                     <div class="card-header">
                         <h3 class="card-title">Los 5 últimos profesores registrados</h3>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table" id="tbl_profesores">
                                 <thead>
                                     <tr>
                                         <th>Nombres</th>
                                         <th>Apellidos</th>
                                         <th>Foto</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-6">
                 <div class="card card-info">
                     <div class="card-header">
                         <h3 class="card-title">Los 5 formaciones académicas más vendidas</h3>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table" id="tbl_masVendidos">
                                 <thead>
                                     <tr>
                                         <th>Nombre</th>
                                         <th>Duracuion</th>
                                         <th>Precio</th>
                                         <th>Tipo</th>
                                         <th>Cantidad</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>


     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->

 <script>
     // ========== AJAX PARA TARJETAS INFORMATIVAS ==================
     $(document).ready(function() {
         $.ajax({
             url: "../ajax/formacionAcademica.ajax.php",
             type: "POST",
             data: {
                 'accion': 7
             },
             dataType: 'json',
             success: function(datos) {
                 $("#totalCursos").html(datos[0][0]);
             }
         })


         $.ajax({
             url: "../ajax/estudiante.ajax.php",
             type: "POST",
             data: {
                 'accion': 6
             },
             dataType: 'json',
             success: function(datos) {
                 $("#totalEstudiantes").html(datos[0][0]);
             }
         })


         $.ajax({
             url: "../ajax/profesor.ajax.php",
             type: "POST",
             data: {
                 'accion': 7
             },
             dataType: 'json',
             success: function(datos) {
                 $("#totalProfesores").html(datos[0][0]);
             }
         })



         $.ajax({
             url: "../ajax/compra.ajax.php",
             type: "POST",
             data: {
                 'accion': 4
             },
             dataType: 'json',
             success: function(datos) {
                 $("#totalGanancias").html('S/' + Intl.NumberFormat('es-MX').format(datos[0][0]));
             }
         })


         $.ajax({
             url: "../ajax/formacionAcademica.ajax.php",
             type: "POST",
             dataType: 'json',
             data: {
                 'accion': 8
             },
             success: function(respuesta) {
                 respuesta.forEach((elemento) => {
                     let fila = `<tr>
                            <td>${elemento['nombre_forma']}</td>
                            <td>${elemento['duracion_forma']}</td>
                            <td>S/${elemento['precio_forma'].toFixed(2)}</td>
                            <td>${elemento['nombre_tipo']}</td>
                        </tr>`
                     $('#tbl_formaciones_academicas_registradas tbody').append(fila);
                 })
             }
         })

         $.ajax({
             url: "../ajax/estudiante.ajax.php",
             type: "POST",
             dataType: 'json',
             data: {
                 'accion': 7
             },
             success: function(respuesta) {
                 respuesta.forEach((elemento) => {
                     let fila = `<tr>
                            <td>${elemento['nombre_estu']}</td>
                            <td>${elemento['apellidos_estu']}</td>
                            <td>${elemento['correo_estu']}</td>
                        </tr>`
                     $('#tbl_estudiantes tbody').append(fila);
                 })
             }
         })

         $.ajax({
             url: "../ajax/profesor.ajax.php",
             type: "POST",
             dataType: 'json',
             data: {
                 'accion': 8
             },
             success: function(respuesta) {
                 respuesta.forEach((elemento) => {
                     let fila = `<tr>
                            <td>${elemento['nombre_pro']}</td>
                            <td>${elemento['apellidos']}</td>
                            <td><img src="${elemento['img']}" height="50px" width="50px"></td>
                        </tr>`
                     $('#tbl_profesores tbody').append(fila);
                 })
             }
         })

         $.ajax({
             url: "../ajax/compra.ajax.php",
             type: "POST",
             dataType: 'json',
             data: {
                 'accion': 5
             },
             success: function(respuesta) {
                 respuesta.forEach((elemento) => {
                     let fila = `<tr>
                            <td>${elemento['nombre_forma']}</td>
                            <td>${elemento['duracion_forma']}</td>
                            <td>S/${elemento['precio_forma']}</td>
                            <td>${elemento['nombre_tipo']}</td>
                            <td>${elemento['cantidad']}</td>
                        </tr>`
                     $('#tbl_masVendidos tbody').append(fila);
                 })
             }
         })

     });
 </script>
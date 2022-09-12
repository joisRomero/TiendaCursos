<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO-CURSO</title>
</head>
<body>
    <p>Usuario <?php 
    include_once '../modelos/usuario.php';
    include_once '../controladores/sesionUsuario.php';
    $sesionUsuario = new SesionUsuario();
    $usuario = new Usuario();
    session_start();
    ob_start();
    $usuario->setearUsuario($sesionUsuario->getUsuarioActual());
    echo $usuario->getNombreUsuario(); 
    
    ?></p>

    <p> <?php echo $usuario->getRol();  ?></p>
    
    <a href="../controladores/cerrarSession.php">Cerrar session</a>
</body>
</html>
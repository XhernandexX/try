<?php include("template/login.php"); ?>

<!DOCTYPE html>

<html lang="en"> 
<head>
    <title>Inicio</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/BANNERS/magnum.ico"> 

    <link id="theme-style" rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link id="text-css" rel="styletext" href="../assets/css/styletextlogin.css">


</head> 


<?php $url="http://".$_SERVER['HTTP_HOST']."/MAGNUM" ?>

  

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="height: 680px">
      <div class="position-sticky pt-3 sidebar-sticky">

      <span class="fs-4"><b>BACKOFFICE</b></span>

        <ul class="nav flex-column">

                <li class="nav-item">
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                <a href="inicio.php" class="nav-link active" aria-current="page">
                Inicio
                </a>
                </li>

                    <p>

                <li>
                <a href="usuarios.php" class="nav-link text-white">
                Usuarios
                </a>
                </li>

                    <p>

                <li>
                <a href="productos.php" class="nav-link text-white">
                Productos
                </a>
                </li>

                    <p>

                <li>
                <a href="reportes.php" class="nav-link text-white">
                Reportes
                </a>
                </li>

                    <p>

                <li>
                <a href="soporte.php" class="nav-link text-white">
                Soporte
                </a>
                </li>
        </ul>
                    <hr>

                <div class="logout">
  
                <a class="nav-item nav-link" href="<?php echo $url."/administrador/seccion/cerrar.php";?>">Cerrar Sesión</a>
 
                </div>
        </nav> 



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
    <div class="chartjs-size-monitor">
    </div>
<br>
<div class="col-md-12">
    <div class="card text-white bg-dark mb-3" >
  <div class="card-header"><?php $rolUsuario; ?></div>
  <div class="card-body">
    <h2 class="card-title">Bienvenido a nuestro BackOffice <?php $nombreUsuario; ?></h2>
    <p class="card-text">Recuerda que en este modulo encontraras todo lo que necesitas para administrar tu página
        <p>
        Dependiendo de tu rol podras usar las diferentes opciones que tenemos para ti
    </p>
  </div>
</div>



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="card border-dark mb-3" style="max-width: 20rem;">
        <div class="card-header">Modulo Usuarios</div>
        <div class="card-body">
        <h4 class="card-title">Usuarios</h4>
        <p class="card-text">
                <a href="usuarios.php" class="nav-link text-white">
                Crear Usuario
                </a>

                <a href="usuarios.php" class="nav-link text-white">
                Modificar Usuario
                </a>

                <a href="usuarios.php" class="nav-link text-white">
                Eliminar Usuario
                </a>
        </p>
        </div>
        </div>


        <div class="card border-dark mb-3" style="max-width: 20rem;">
        <div class="card-header">Modulo Productos</div>
        <div class="card-body">
        <h4 class="card-title">Productos</h4>
        <p class="card-text">
                <a href="productos.php" class="nav-link text-white">
                Crear Producto
                </a>

                <a href="productos.php" class="nav-link text-white">
                Modificar Producto
                </a>

                <a href="productos.php" class="nav-link text-white">
                Eliminar Producto
                </a>
        </p>
        </div>
        </div>


        <div class="card border-dark mb-3" style="max-width: 20rem;">
        <div class="card-header">Modulo Reportes</div>
        <div class="card-body">
        <h4 class="card-title">Reportes</h4>
        <p class="card-text">
                <a href="reportes.php" class="nav-link text-white">
                Crear Reporte
                </a>

                <a href="reportes.php" class="nav-link text-white">
                Modificar Reporte
                </a>

                <a href="reportes.php" class="nav-link text-white">
                Eliminar Reporte
                </a>
        </p>
        </div>
        </div>


        <div class="card border-dark mb-3" style="max-width: 20rem;">
        <div class="card-header">Soporte Técnico</div>
        <div class="card-body">
        <h4 class="card-title">Soporte</h4>
        <p class="card-text">
                <a href="soporte.php" class="nav-link text-white">
                Pago Platarfoma
                </a>

                <a href="soporte.php" class="nav-link text-white">
                Servicio Técnico
                </a>

                <a href="soporte.php" class="nav-link text-white">
                PQRS
                </a>
        </p>
        </div>
        </div>


</div>
          
        </div>
      </div>
      </main>

</html>

<?php include("template/login.php"); ?>


<!DOCTYPE html>

<html lang="en"> 
<head>
    <title>Reportes</title>
    
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
                <a href="inicio.php" class="nav-link text-white" aria-current="page">
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
                <a href="reportes.php" class="nav-link active">
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
</main>
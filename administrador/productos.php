<?php include("template/login.php"); ?>


<!DOCTYPE html>

<html lang="es"> 
<head>
    <title>Productos</title>
    
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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="height: 5000px">
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
                <a href="productos.php" class="nav-link active">
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


        <?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("config/bd.php");

switch($accion){

    case"Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO productos (nombre,imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);

        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!=""){

            move_uploaded_file($tmpImagen,"../assets/img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();

        header("Location:productos.php");
        break;
        

    case"Modificar":

        $sentenciaSQL= $conexion->prepare("UPDATE productos SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        if($txtImagen!=""){

        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        move_uploaded_file($tmpImagen,"../assets/img/".$nombreArchivo);
    
        $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($producto["imagen"]) &&($producto["imagen"]!="imagen.jpg") ){

            if(file_exists("../assets/img/".$producto["imagen"])){

            unlink("../assets/img/".$producto["imagen"]);
            }

        }

        $sentenciaSQL= $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id=:id");
        $sentenciaSQL->bindParam(':imagen',$txtImagen);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        }
        header("Location:productos.php");
        break;

    case"Cancelar":
        header("Location:productos.php");
        break;

    case"Seleccionar":

        $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$producto['nombre'];
        $txtImagen=$producto['imagen'];

        // echo"Presionado botón seleccionar";
        break;

    case"Borrar":

        $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($producto["imagen"]) &&($producto["imagen"]!="imagen.jpg") ){

            if(file_exists("../assets/img/".$producto["imagen"])){

            unlink("../assets/img/".$producto["imagen"]);
            }

        }
       $sentenciaSQL= $conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        
        break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
    <div class="chartjs-size-monitor">
    </div>



<div class="col-mb-3">
    



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-3">

      
    <div class="col-md-4">

        <div class="card text-white bg-dark mb-3">
        <div class="card-header">Modulo Productos</div>
        <div class="card-body">
        <h2 class="card-title">Productos</h2>
        <p class="card-text">
        
    <p class="card-text">En este modulo podrás administrar todos tus productos
        <p>
        Crear, modificar o eliminar
    </p>
        </p>
        </div>
        </div>
        </div>


        <div class="col-md-7 ">

  <form method="POST" enctype="multipart/form-data">


<div class = "form-group">
<label for="txtID">ID:</label>
<input type="text" required readonly class="form-control" value="<?php echo $txtID;  ?>" name="txtID" id="txtID" placeholder="ID">
</div>

<div class = "form-group">
<label for="txtID">Nombre:</label>
<input type="text" required class="form-control" value="<?php echo $txtNombre;  ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Producto">
</div>

<div class = "form-group">
<label for="txtID">Imagen:</label>

<br/>

<?php if($txtImagen!=""){ ?>

    <img src="../assets/img/<?php echo $txtImagen; ?>" width="50" alt="" srcset="">


<?php } ?>

<input type="file" class="form-control"  name="txtImagen" id="txtImagen" placeholder="Imagen del Producto">
</div>


<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""?> value="Agregar" class="btn btn-success">Agregar</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""?> value="Modificar" class="btn btn-warning">Modificar</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""?> value="Cancelar" class="btn btn-info">Cancelar</button>
</div>


</form>

</div>



</div>
          
        </div>



<div class="col-md-12">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listaProductos as $producto) { ?>
        <tr>
            <td><?php echo $producto['id']; ?></td>
            <td><?php echo $producto['nombre']; ?></td>
            <td>
                
            <img src="../assets/img/<?php echo $producto['imagen']; ?>" width="50" alt="" srcset="">

        
            </td>

            <td>
    
            <form method="post">

                <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id']; ?>" />

                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />

                <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
    
            </form>


            </td>




        </tr>
        <?php } ?>
    </tbody>
</table>
</div>



</main>
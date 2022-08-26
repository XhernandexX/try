<?php include("template/login.php"); ?>


<!DOCTYPE html>

<html lang="en"> 
<head>
    <title>Usuarios</title>
    
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
                <a href="usuarios.php" class="nav-link active">
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


        <?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtRol=(isset($_POST['txtRol']))?$_POST['txtRol']:"";
$txtUsuario=(isset($_POST['txtUsuario']))?$_POST['txtUsuario']:"";
$txtContrasenia=(isset($_POST['txtContrasenia']))?$_POST['txtContrasenia']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("config/bd.php");

switch($accion){

    case"Agregar":

        $sentenciaSQL= $conexion->prepare("INSERT INTO user (rol,usuario,contrasenia) VALUES (:rol,:usuario,:contrasenia);");
        $sentenciaSQL->bindParam(':rol',$txtRol);
        $sentenciaSQL->bindParam(':usuario',$txtUsuario);
        $sentenciaSQL->bindParam(':contrasenia',$txtContrasenia);

        $sentenciaSQL->execute();

        header("Location:usuarios.php");
        break;

    case"Modificar":

        $sentenciaSQL= $conexion->prepare("UPDATE user SET rol=:rol  WHERE id=:id");
        $sentenciaSQL->bindParam(':rol',$txtRol);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();


        $sentenciaSQL= $conexion->prepare("UPDATE user SET usuario=:usuario WHERE id=:id");
        $sentenciaSQL->bindParam(':usuario',$txtUsuario);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE user SET usuario=:usuario contrasenia=:contrasenia WHERE id=:id");
        $sentenciaSQL->bindParam(':contrasenia',$txtContrasenia);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
    
        $usuario=$sentenciaSQL->fetch(PDO::FETCH_LAZY);



        header("Location:usuarios.php");
        break;

    case"Cancelar":
        header("Location:usuarios.php");
        break;

    case"Seleccionar":

        $sentenciaSQL= $conexion->prepare("SELECT * FROM user WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $user=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtRol=$user['rol'];
        $txtUsuario=$user['usuario'];
        $txtContrasenia=$user['contrasenia'];

        break;

    case"Borrar":

        $sentenciaSQL= $conexion->prepare("SELECT usuario FROM user WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $user=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($usuario["usuario"]) &&($usuario["usuario"]!="usuario") ){

            if(date_exists("../bd.php".$usuario["usuario"])){

            unlink("../bd.php".$usuario["usuario"]);
            }

        }
       $sentenciaSQL= $conexion->prepare("DELETE FROM user WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        
        break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM user");
$sentenciaSQL->execute();
$listaUsers=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>




<main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
    <div class="chartjs-size-monitor">
    </div>



<div class="col-mb-3">
    



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-3">

      
    <div class="col-md-4">

        <div class="card text-white bg-dark mb-3">
        <div class="card-header">Modulo Usuarios</div>
        <div class="card-body">
        <h2 class="card-title">Usuario</h2>
        <p class="card-text">
        
    <p class="card-text">En este modulo podrás administrar todos tus usuarios
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
<label for="txtRol" class="form-label">Rol:</label>
<select class="form-select" value="<?php echo $txtRol;  ?>" name="txtRol" id="txtRol" placeholder="Rol">
        <option>Administrador</option>
        <option>Vendedor</option>
        <option>Inventario</option>
      </select>
</div>

<div class = "form-group">
<label for="txtUsuario">Usuario:</label>
<input type="text" required class="form-control" value="<?php echo $txtUsuario;  ?>" name="txtUsuario" id="txtUsuario" placeholder="Usuario">
</div>

<div class = "form-group">
<label for="txtContrasenia">Contraseña:</label>
<input type="text" required class="form-control" value="<?php echo $txtContrasenia;  ?>" name="txtContrasenia" id="txtContrasenia" placeholder="Contraseña">
</div>

<br/>


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
            <th>Rol</th>
            <th>Usuario</th>
            <th>Contrasenia</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listaUsers as $user) { ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['rol']; ?></td>
            <td><?php echo $user['usuario']; ?></td>
            <td><?php echo $user['contrasenia']; ?></td>
            <td>
                
        
            </td>

            <td>
    
            <form method="post">

                <input type="hidden" name="txtID" id="txtID" value="<?php echo $user['id']; ?>" />

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





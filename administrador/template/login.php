<?php
session_start();
include'./config/bd.php';
  if(!isset($_SESSION['usuario'])){
    header("Location:../index.php");
  }else{

      if($_SESSION['usuario']=="ok"){
        $nombreUsuario=$_SESSION["nombreUsuario"];
        
      }
  }
?>




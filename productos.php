<?php include("template/header.php"); ?>

<?php
include("administrador/config/bd.php");
$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="./assets/css/cardproductos.css"/>

<p>
<div class="container">
    <div class="row">
        
    <div class="col-md-0.5">
    
</div>

<?php foreach($listaProductos as $producto) { ?>
<div class="col-md-3">
<div class="card">   
<img class="card-img-top" src="./assets/img/<?php echo $producto['imagen']; ?>" weight="180" height="320" alt="">
<div class="card-body">
        <h4 class="card-title"><?php echo $producto['nombre']; ?></h4>
        <a name="" id="" class="btn btn-primary" href="https://wa.me/573186561200" role="button">¡Lo quiero!</a>
</div>
</div>
</div>
<?php } ?>

<?php include("template/footer.php"); ?>
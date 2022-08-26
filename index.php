<?php include("template/header.php"); ?>

<header class="col p-0">
			<div class="col bg-light p-0>
				<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="assets/img/BANNERS/banner1.png" class="d-block w-100" alt="...">
							<div class="carousel-caption d-none d-md-block"></div>
						</div>
						<div class="carousel-item">
							<img src="assets/img/BANNERS/banner2.png" class="d-block w-100" alt="...">
							<div class="carousel-caption d-none d-md-block"></div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only"></span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only"></span>
					</a>
				</div>
			</div>
        
</header>

<main class="col-md-11 ms-sm-auto col-lg-0 px-md-2">
    <div class="chartjs-size-monitor">
    </div>
<br>
<div class="col-md-11">
    <div class="card text-white bg-light mb-3 align-text-center" >
  <div class="card-body">
    <h2 class="card-title">Conoce más sobre nosotros</h2>
    <p class="card-text">Es un placer para nosotros tenerte aquí, por ello queremos que nos conozcas más a fondo, y creemos una gran relación
        <p>
        Verás nuestros datos de contacto, redes sociales, atención al cliente y más
    </p>
  </div>
</div>



    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="card border-light mb-3" style="max-width: 20rem;">
        <div class="card-header">Visión</div>
        <div class="card-body">
        <h4 class="card-title">Visión</h4>
        <p class="card-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.                
        </p>
        </div>
        </div>


        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114018.46205481802!2d-80.19908053
    83684!3d26.74192074693468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8d5ccb595adc1%3A0x1
    5efc7b51fe16bde!2sWest%20Palm%20Beach%2C%20Florida%2C%20EE.%20UU.!5e0!3m2!1ses!2sco!4v1659923266006!5m2!1ses!2sco"
    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>




    <div class="card border-light mb-3" style="max-width: 20rem;">
        <div class="card-header">Misión</div>
        <div class="card-body">
        <h4 class="card-title">Misión</h4>
        <p class="card-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.                
        </p>
        </div>
        </div>


</div>
          
        </div>
      </div>
      </main>



	  <?php
include("administrador/config/bd.php");
$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

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


<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/scripts.js"></script>	

<?php include("template/footer.php"); ?>

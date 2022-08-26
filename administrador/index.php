<?php
session_start();
if($_POST){
  if($_POST['usuario']=="administradores"&&($_POST['contrasenia']=="sistema")){

    $_SESSION['usuario']="ok";
    $_SESSION['nombreUsuario']="administradores";
    header('Location:inicio.php');
  }else{
    $mensaje="El usuario y/o contraseña son incorrectos";
  }
}
?>

<html lang="en"><head>
    <title>Administrador MAGNUM</title>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/BANNERS/magnum.ico"> 

    <link id="theme-style" rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link id="text-css" rel="styletext" href="../assets/css/styletextlogin.css">

</head> 



<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-12 col-lg-12 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-center">
			    <div class="app-auth-body mx-auto">	

				    <div class="app-auth-branding mb-4"><a class="app-logo" href="../administrador/inicio.php"><img class="logo-icon me-2" src="../assets/img/BANNERS/MGNMFONDOBLANCO.png" weight="160" height="160" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Ingreso Administrador</h2>
			        <div class="auth-form-container text-start">

              <?php if (isset($mensaje)) {?>
            <div class="alert alert-danger" role="alert">
              <?php echo $mensaje; ?>
            </div>
            <?php }?>

						<form method="POST">         
							<div class="email mb-3">
								<label class="sr-only" for="usuario">Usuario</label>
								<input id="usuario" name="usuario" type="text" class="form-control usuario" placeholder="Usuario" required="required">
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="contrasenia">Contraseña</label>
								<input id="contrasenia" name="contrasenia" type="password" class="form-control contrasenia" placeholder="Contraseña" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Recuerdame
											</label>
										</div>
									</div>
									<div class="col-6">
									</div>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-light">Iniciar Sesión</button>
							</div>
						</form>
			    </div>
		


			    <footer class="app-auth-footer">
				<div class="col p-2 text-white">				
				<h6 class="text-center m-0">Todos los Derechos Reservados a:</h6>
				<h6 class="text-center m-0"> MGNM Oficial Colombia © 2022</h6>			
			</div>
			    </footer>

		    </div>
	    </div>
	    
    
    </div>



 

</body></html>




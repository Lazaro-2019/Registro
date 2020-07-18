<?php 
	$nomb=$_POST["nombre"];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">

	    <!-- bootstrap-toggle-master -->
			<link href="../plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="../plugins/bootstrap-toggle-master/stylesheet.css" rel="stylesheet">
</head>
<body>
	<header >
		<?php 
			include('encabezado.php');
	 	?>
	</header>	
	<div class="container">
		<section id="registro" style="display: none">
			
			<br>
			<center><h3>BIENVENIDOS</h3></center>
			<hr>
			<center>
				<div class="row sombra2">
					<div class="col-md-6">
						<img src="img/desconocido.jpg" width="300" height="300" id="foto">
					</div>
					<div class="col-md-5">
						<br>
						<br>
						<label>Ingresa tu matricula:</label>
				        <input type="text" id="matricula" class="matricula form-control btn btn-block" onkeyup="selecion(event);">

				        <label>Nombre:</label>
				        <input type="text" id="nombre" class=" form-control btn btn-block">

				        <label>Ingresa tu matricula:</label>
				        <input type="text" id="edad" class="matricula form-control btn btn-block">
					</div>
				    </div>
				<br>
					<button type="submit" class="btn btn-login btn-md  btn-flat  pull-center" id="btnlogin" onclick="verlogin()">
          			<i class="fas fa-lock-open"></i>
          			Login
		        </button>
				</div>
			</div>
			</center>
		</section>
	</div>


	
	<div class="container" style="display:none" id="cuerpo">	
		<section id="login2">	
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo">Iniciar Sesión</h3>
				<hr>
				<section id="login2">
						<form id="frmIngreso">
						<div class="form-row">
							<div class="col-md-12">
								<label for="" class="colorLetra">Nombre de usuario:</label>
						          <div class="form-group has-feedback salto">
						            <input type="text" id="username" placeholder="Usuario" class="form-control " autofocus>
						            <span class="glyphicon glyphicon-user form-control-feedback"></span>
						          </div>
							</div>
							<div class="col-md-12">
								<label for="" class="colorLetra">Contraseña:</label>
						          <div class="form-group has-feedback salto">
						            <input type="password" id="pass" placeholder="Usuario" class="form-control " >
						            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						          </div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
													<input id="chkContra"  onchange='evaluarCheck(this.value)' data-on="Si" data-off="No" type="checkbox" checked data-toggle="toggle" data-size="mini" value='no'><label class="colorLetra"> &nbsp; Cambiar Contraseña</label>
			              			<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnIngresar">
				              			<i class="fas fa-lock-open"></i>
				              			Ingresar
			              			</button>
		              			</div>
		            		</div><!-- /.col -->
						</div>
					</form>	
			</div>	
			<div align="center">
				<button type="submit" class="btn btn-login  btn-flat  pull-center" id="btnregistrar" onclick="verregistro()">
          			<i class="fas fa-lock-open"></i>
          			Registro
		        </button>

			</div>

					
		
		</section>

	</div>



	<div class="container" style="display:none" id="cambiarContra">
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo">Cambiar Contraseña</h3>
				<hr>
				<form id="frmCambiar">
					<div class="form-row">
						<div class="col-md-12">
							<input type="hidden" id="usuario" class="form-control">
						<div class="col-md-12">
							<label for="" class="colorLetra">Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="vContra1"  class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
						<div class="col-md-12">
							<label for="" class="colorLetra">Verificar Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="vContra2"  class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
												<button type="button" class="btn btn-login  btn-flat  pull-left" id="btnCancelar" onclick="cancelar()">
			              			<i class="fas fa-times"></i>
			              			Cancelar
		              			</button>
		              			<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnActualizar">
			              			<i class="fas fa-lock-open"></i>
			              			Actualizar
		              			</button>
	              			</div>
	            		</div><!-- /.col -->
					</div>
				</form>
				
			</div>

		</div>
		
	</div>


	
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../plugins/Preloaders/jquery.preloaders.js"></script>

	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>
	<!-- bootstrap-toggle-master -->
	<script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>
    <!-- Funciones propias -->
    <script src="funciones.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/precarga.js"></script>


    <!-- Plugin Voice -->

    <script type="text/javascript" src="../plugins/voice/responsivevoice.js"></script>


		<script>
		window.onload = function() {
			$("#cuerpo").fadeIn("slow");
			$("#username").focus();
		};	

		$('#chkContra').bootstrapToggle('off');
		$('#chkContra').val('no');

	</script>


</body>
</html>
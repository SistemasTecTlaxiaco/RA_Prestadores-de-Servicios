<?php 
	
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {

	header('location: sistema/');
}else{

	if (!empty($_POST)) {

		if (empty($_POST['usuario']) || empty($_POST['clave'])) {

			$alert = 'Ingrese su usuario y su clave';
		}else{
			
			require_once "conexion.php";

			$user = mysqli_real_escape_string($conection,$_POST['usuario']);
			$pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$pass'");

			$result = mysqli_num_rows($query);

			if ($result > 0) {

				$data = mysqli_fetch_array($query);

				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idusuario'];
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['user'] = $data['usuario'];
				$_SESSION['rol'] = $data['rol'];

				header('location: sistema/');
			}else{
				$alert = 'El usuario o la clave son incorrectos';
				session_destroy();
			}
		}
	}
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="witdh=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login | Sistema Prestadores Egal</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="sistema/css/style.css">
</head>
<body>
	<section id="container">
		<form action="" method="post">
			<h3>Prestadores de Servicio EGAL</h3>
			<img src="img/login.jpg" alt="Login">
			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<div class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
			<input type="submit" value="INICIAR SESIÓN">
			<a href="sistema/registro_usuario.php" class="btn_new">Registrarse</a><br><br>
			<a href="sistema/recuperar.php" class="btn_res">¿Se te olvidó tu contraseña?</a>
		</form>
	</section>
</body>
</html>
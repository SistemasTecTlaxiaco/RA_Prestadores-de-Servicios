<?php  
	include "../conexion.php";

	if (!empty($_POST)) {
		$alert='';
		if (empty($_POST['correo']) || empty($_POST['usuario'])) {
			$alert='<p class="msg_error">El campo es obligatorio.</p>';
		}else{
			
			$email = $_POST['correo'];

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE correo = '$email'");
			$result = mysqli_fetch_array($query);

			if ($result > 0) {
				$alert='<p class="msg_error">Revise su correo electrónico.</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO usuario(nombre,correo,usuario,clave,rol)
					VALUES('$nombre','$email','$user','$clave','$rol')");

				if ($query_insert) {
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="witdh=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php include "includes/scripts.php" ?>
	<title>Recuperar contraseña</title>
</head>
<body>
	<section id="contenedor">
		<div class="form_register">

			<form action="" method="post">
				<h1>Recuperar</h1>
			<div class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
				<label for="correo">Correo Electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico">

				<input type="submit" value="Enviar" class="btn_save">
			</form>
		</div>
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>
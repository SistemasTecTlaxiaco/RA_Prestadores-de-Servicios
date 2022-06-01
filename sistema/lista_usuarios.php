<?php
	session_start();
	include "../conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php" ?>
	<title>Mi Perfil</title>
</head>
<body>
	<?php include "includes/header.php" ?>
	<section id="container">
		<h1> Mi Perfil</h1>

		<?php
			//Mostrar mis Datos
			$query = mysqli_query($conection,"SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if ($result > 0) {
					
				$data = mysqli_fetch_array($query)				
			?>
					<td>ID: <?php echo $data["idusuario"]; ?></td><br>
					<td>Nombre: <?php echo $data["nombre"]; ?></td><br>
					<td> Correo: <?php echo $data["correo"]; ?></td><br>
					<td>Usuario: <?php echo $data["usuario"]; ?></td><br>
					<td> Rol: <?php echo $data["rol"]; ?></td><br>
					<td>
						<a class="link_edit" href="actualizar_perfil.php?id=<?php echo $data["idusuario"]; ?>"><i class="fas fa-edit"></i> Editar</a>

					</td>
		<?php
			}
		?>	
	</section>
</body>
</html>
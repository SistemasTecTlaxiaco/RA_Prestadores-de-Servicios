 <?php
session_start();
include "../conexion.php";

if (!empty($_POST)) {
  $alert='';
  if (empty($_POST['nombreCompleto']) || empty($_POST['descripcion']) || empty($_POST['direccion']) || empty($_POST['email']) || empty($_POST['pago']) || empty($_POST['telefono']) || empty($_POST['tipo_servicio'])) {
    $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
  }else{

  $nombreCompleto=$_POST['nombreCompleto'];
  $descripcion=$_POST['descripcion'];
  $direccion=$_POST['direccion'];
  $email=$_POST['email'];
  $telefono=$_POST['telefono'];
  $tipo_servicio=$_POST['tipo_servicio'];
  $pago=$_POST['pago'];
  $ss=mysqli_query($conection, "SELECT MAX(id_registro) as id_maximo FROM registro");
  
    if($rr=mysqli_fetch_array($ss)){
      $id_maximo=$rr['id_maximo'];
    }
    $diretorio="../img/";
    $nameimagen=$_FILES['foto']['name'];
    $tmpimagen=$_FILES['foto']['tmp_name'];
    $urlnueva="".$diretorio. "foto_".$id_maximo. ".jpg";
    if(is_uploaded_file($tmpimagen)){
      copy($tmpimagen,$urlnueva);
      $alert='imagen cargado con exito';
    }
  else{
    $alert= 'error al cargar imagen :(';

  }   

 
  $query = mysqli_query($conection,"SELECT * FROM registro WHERE email = '$email' ");
			$result = mysqli_fetch_array($query);
      if ($result > 0) {
				$alert='<p class="msg_error">El correo ya exixte</p>';
			}else{
        $query_insert= mysqli_query($conection,"INSERT INTO registro(nombreCompleto,descripcion,direccion,email,pago,telefono,tipo_servicio,foto) 
          Values ('$nombreCompleto', '$descripcion', '$direccion','$email','$pago','$telefono','$tipo_servicio','$urlnueva')");
        if ($query_insert) {
          $alert='<p class="msg_save">se ha publicado correctamente</p>';
        }else{
          $alert='<p class="msg_error">Error al crear la publicacion </p>';
        }
      }
  }
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php include "includes/scripts.php" ?>
  <title>Nuevo Registro</title>
</head>
<body>
  <?php include "includes/header.php" ?>
  <section id="container">
    <div class="form_register">
      <h1><i class="fas fa-user-plus"></i> Nuevo Registro</h1>
      <hr>
      <div class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
      <form action="" method="post" enctype="multipart/form-data">
        <label for="nombreCompleto">Nombre completo :</label>
        <input type="text" id="nombreCompleto" name="nombreCompleto">
      
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion">
     
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion">
      
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email">
     
        <label for="telefono">Telefono:</label>
        <input type="text" id="telefono" name="telefono">
      
        <label for="tipo_servicio">Tipo de servicio:</label>
        <input type="text" id="tipo_servicio" name="tipo_servicio">
     
        <label for="pago">Forma de pago:</label>
        <input type="text" id="pago" name="pago">

        <p>
          <label for="foto">Fotografia</label><br>
          <input type="file" name="foto" id="foto" required>
        </p>
        <input type="submit" value="Registrar" class="btn_save">
      </form>
    </div>
  </section>
</body>
</html>
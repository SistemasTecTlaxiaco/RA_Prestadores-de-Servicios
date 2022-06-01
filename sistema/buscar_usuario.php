<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/scripts.php" ?>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Prestadores de Servicio EGAL</title>
</head>
<body>
  <?php include "includes/header.php"?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <?php
      $busqueda = strtolower($_REQUEST['busqueda']);
      if (empty($busqueda)) {
        header('location: index.php');
        mysqli_close($conection);
      }
  ?>

  <form action="buscar_usuario.php" method="get" class="form_search">
    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
    <input type="submit" value="Buscar" class="btn_search">
  </form>
  <div class="container">
    <?php 
      require_once "../conexion.php";
      $query = mysqli_query($conection,"SELECT * FROM registro WHERE tipo_servicio like '%$busqueda%'" );
        foreach ($query as $conection){
    ?>

    <div class="item">
      <a href="detalle_persona.php?codigo=<?php echo $conection['id_registro'] ?>"> <img src="../img/<?php echo $conection['foto'];?>" class="item-img">
        <h3><?php echo  $conection['nombreCompleto'];?></h3>
        <p><?php echo  $conection['tipo_servicio'];?></p>
        <a href='detalle_persona.php?codigo=<?php echo $conection['id_registro'] ?>'  class="btn btn-primary" ><center style="background-color: #FF9900">Mas informacion </center> </a>
        <div class="item-text"></div>
    </div>
    <?php
      }
    ?>
  </div>
    <!--<?php include "includes/footer.php" ?>-->
</body>
</html>
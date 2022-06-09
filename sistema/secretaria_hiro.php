<?php
session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php include "includes/scripts.php" ?>
  <title>secretaria hiro</title>
  <script src="https://aframe.io/releases/0.8.0/aframe.min.js"> </script>
    <script src="https://jeromeetienne.github.io/AR.js/aframe/build/aframe-ar.js"></script>
</head>
<body>
  <?php include "includes/header.php" ?>
<a-scene embedded arjs>
    <a-entity scale=".2 .2 .2">
        <a-entity gltf-model="Secretaria.glb" scale=".1 .1 .1" crossOrigin="anonymous"></a-entity>
    </a-entity>
    <a-marker-camera preset='hiro'></a-marker-camera>

</a-scene>
<a href="secretaria.php" class="boton">Salir</a>


<style type="text/css">
  .boton{
  display: inline-block;
  padding: 10px;
  margin-top: 20px;
  background-color: #008CBA;;
  width: 300px;
  cursor: pointer;
  border-radius: 8px;
  font-size: 20px;
  }
  .botones {
  display: flex;
  justify-content: center;

  }
 
</style>
</body>

</html>
<?php
session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php include "includes/scripts.php" ?>
  <title>Casa-Hiro</title>
  <script src="https://aframe.io/releases/0.8.0/aframe.min.js"> </script>
    <script src="https://jeromeetienne.github.io/AR.js/aframe/build/aframe-ar.js"></script>
</head>
<style >
  .boton{
    background-color: #0000FF;
    border: none; 
    color: white;
    padding: 7px;
    text-align:center;
    text-decoration:none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
    border: 2px solid rgba(9, 148, 28, 0.541);
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0.0.0.0.19);
    border:solid 2px #ccc;
  }
</style>
<div style='position: fixed; top:10px; width:100%; '>
<a href="RA_objetos.php" id="salir" class="boton">Salir</a> 

</div>
<body style='margin: 0px; overflow: hidden;'> </body>
<a-scene embedded arjs="debugUIEnabled: false;" vr-mode.ui="enabled: false" >
    <a-marker preset='hiro'>
    
        <a-entity  gltf-model="CASA-OBJ.glb" scale=".2 .2 .2" >

        </a-marker>  
    <a-entity camera></a-entity>
  </a-scene>

</html>
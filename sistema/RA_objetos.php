<?php
session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php include "includes/scripts.php" ?>
  <title>Realidad aumentada</title>
</head>
<body>
  <?php include "includes/header.php" ?>
<br>
<br>
<br>
<br>
<br>
<br>
   <div class="botones">
     
       <div>
         <h3 class="txt">OBJETOS EN 3D</h3>
         <br>
				<a href="casa-hiro.php" class="boton">Casa-hiro</a>
        <a href="casa-Min-Ar.php" class="boton">Casa-MindAr</a>
        <br>
         <div>
         <a href="persona-hiro.php" class="boton">Persona-hiro</a>
        <a href="persona-MindAr.php" class="boton">Persona-MindAr</a>
        <br>
         <div>
         <a href="../" class="boton">Trabajardor-hiro</a>
        <a href="../" class="boton">Casa-MindAr</a>
        </div>
        </div>
        </div>
   </div>
  <style type="text/css">
  .boton{
  display: inline-block;
  padding: 10px;
  margin-top: 20px;
  background-color: #008CBA;;
  width: 250px;
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
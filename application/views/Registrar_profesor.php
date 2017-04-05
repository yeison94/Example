<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <?= validation_errors(); ?>
    <?= form_open("Profesor/registrar/validar")?>

    <label for="cedula">CEDULA</label>
    <input type="input" name="cedula" placeholder="Cedula" /><br />

    <label for="nombre">NOMBRE</label>
    <input type="input" name="nombre" /><br />
    
    <label for="fecha_nacimiento">FECHA NACIMIENTO</label>
    <input type="input" name="fecha_nacimiento" /><br />

    <label for="lugar_nacimiento">LUGAR NACIMIENTO</label>
    <input type="input" name="lugar_nacimiento" /><br />

    <label for="titulo">TITULO</label>
    <input type="input" name="titulo" placeholder="titulo"/><br />

    <label for="departamento">DEPARTAMENTO</label>
    <input type="input" name="departamento" placeholder="departamento"/><br />

   <input type="submit" name="registrar" value="Registrar" />

  <?= form_close()?>
  </body>
</html>
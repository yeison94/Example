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
    <?= form_open("Formulario")?>
    <?= form_label('Nombre*','')?>
    <?php
    $data = array('name'=> 'nombre');
    echo form_input($data);?>
    <?= form_label('Salario*','')?>
    <?php
    $data = array('name'=> 'salario');
    echo form_input($data);?>
    <?= form_label('Sexo','')?>
    <?php
    $data = array('name'=> 'sexo');
    echo form_input($data);?>
   <br>
   <br>
    <?= form_submit("registrar","Registrar"); ?><br>
   <?php
      if(!isset($result)){
        if(isset($err)){
          //echo form_label('ERROR: Usuario inexistente o contraseña incorrecta', '');
          echo form_label($err, '');
        }
      }else{
        echo "El resultado es: $result";
      }
   ?>
   <?= form_close()?>
  </body>
</html>

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
    <?= form_open("Welcome/calcular_resultado")?>
    <?= form_label('Numero1*','')?>
    <?php
    $data = array('name'=> 'number1');
    echo form_input($data);?>
    <?= form_label('Numero2*','')?>
    <?php
    $data = array('name'=> 'number2');
    echo form_input($data);?>
   <br>
   <br>
   <?= form_submit("suma","Suma"); ?>
    <?= form_submit("resta","Resta"); ?><br>
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

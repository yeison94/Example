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
    <?= form_open("Welcome/recibirdatos_datos_formulario_registro")?>
    <?= form_label('USERNAME*','')?>
    <?php
      if(isset($error)){
      	$data = array('name'=> 'username','value'=>$usern);
      	echo form_input($data);
      }else{
      	$data = array('name'=> 'username');
      	echo form_input($data);
      }
   ?>
   <?= form_label('PASSWORD*','')?>
    <?php
      $data = array('name' => 'password');
      echo form_input($data);
   ?>
   <br>
   <?php
      echo form_submit('mysubmit', 'Enviar');
    	if(isset($error)){
    		echo form_label('ERROR: Usuario inexistente o contraseña incorrecta', '');
    	}
   ?>
   <?= form_close()?>
  </body>
</html>

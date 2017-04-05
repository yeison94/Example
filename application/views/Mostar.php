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
    <?php
    foreach ($usuarios->result() as $use) {?>
      <ul>
        <li><?php echo $use->user?></li>
      </ul>
  <?php }?>
  </body>
</html>

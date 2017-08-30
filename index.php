<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ASMR MALL</title>
      <link rel="stylesheet" href="./css/basic.css">
      <link rel="stylesheet" href="./css/css_index.css">
  </head>
  <body>
    <div id="wrap">
        <div id="header">
            <?php
                require_once "./lib/top_login1.php";
            ?>
        </div>
        <div id="content_circle">
            <?php
                require_once "./lib/circle_menu1.php";
            ?>
        </div>
    </div>
  </body>
</html>

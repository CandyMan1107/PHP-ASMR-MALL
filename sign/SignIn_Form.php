<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ASMR MALL</title>
      <link rel="stylesheet" href="../css/basic.css" media="all">
      <link rel="stylesheet" href="../css/css_singIn.css">
      <script type="text/javascript" src="../js/js_signIn.js"></script>
  </head>
  <body>
    <div id="wrap" align="center">
        <div style="padding: 80px;"></div>
      <div class="title">
        <a href="../index.php">A.</a>
      </div>
        <div style="padding: 80px;"></div>
      <div class="container">
          <form action="insert.php" name="sign_form" method="post">
            <div class="container">
                <input class="txt" type="text" name="id" placeholder=" 아이디를 입력하세요." required>
            </div>
              <div class="container">
                  <input class="txt" type="password" name="pass" placeholder=" 비밀번호를 입력하세요." required>
              </div>
                <div class="container">
                    <input class="txt" type="password" name="pass_confirm" placeholder=" 비밀번호를 재입력하세요." required>
                </div>
              <div style="padding: 5px;"></div>
              <input type="button" class="Start_Button" onclick="check_input()" value="시작하기" />
            </div>
          </form>
      </div>
    </div>
  </body>
</html>

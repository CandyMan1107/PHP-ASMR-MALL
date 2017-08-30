<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ASMR MALL</title>
      <link rel="stylesheet" href="../css/basic.css" media="all">
      <link rel="stylesheet" href="../css/css_logIn.css">
  </head>
  <body>
    <div id="wrap" align="center">
        <div id='logo' style="padding-top: 15px">
            <a href="../index.php">
                <img src="../img/logo.png" border="0">
            </a>
        </div>
        <div style="padding: 80px;"></div>
        <div class="title">
            ASMR MALL
        </div>
        <div style="padding: 80px;"></div>
        <div>
          <form name="login_form" method="post" action="LogIn.php">
              <div id="id_pw_input">
                  <input class="txt" type="text" name="id" placeholder=" 아이디" required/>
                  <div style="padding: 5px;"></div>
                  <input class="txt" type="password" name="pass" placeholder=" 비밀번호" required/>
              </div>
              <div style="padding: 5px;"></div>
              <button class="Start_Button" type="submit" name="submit">로그인</button>
              <div style="padding: 5px;"></div>
              <div id="join_form">
                  <input class="SignIn_Button" onclick="location='../sign/SignIn_Form.php'" type="button" name="signIn" value="시작하기" />
              </div>
          </form>
      </div>
    </div>
  </body>
</html>

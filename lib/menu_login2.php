<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div id='top_login'>
    <?php
    if (!isset($_SESSION['id'])) {
        ?>
        <a href="../login/LogIn_Form.php">로그인</a> |
        <a href="../sign/SignIn_Form.php">회원가입</a>
        <?php
    }
    else
    { // php의 변수값, 함수의 결과값을 태그영역에 나타내기
        ?>
        <?=$_SESSION['id']?> |
        <a href='../cart/cart_form.php'>구매목록</a>
        | <a href="../login/LogOut.php">로그아웃</a>
        <?php
    }
    ?>
</div>

<?php
session_start();

require_once "../lib/cDBManager.php";

try {
    $obj=new DBManager();
    $pdo=$obj->connect();

    $name=$_GET['name'];

    $sql = "select * from cart where pName='{$name}'";

    $stt=$pdo->prepare($sql);

    // print_r($stt);
    $stt->execute();

    //print_r($stt);

    $sql = "delete from cart where pName='{$name}'";
    $stt=$pdo->prepare($sql);
    $stt->execute();

    $pdo=NULL;

    echo "
           <script>
            location.href = 'cart_form.php';
           </script>
        ";
} catch (PDOException $e) {
    exit("DB ERROR : {$e->getMessage()}");
}
?>


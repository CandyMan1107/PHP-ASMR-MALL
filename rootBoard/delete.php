<?php
   session_start();

   require_once "../lib/cDBManager.php";

   try {
       $obj=new DBManager();
       $pdo=$obj->connect();

       $bNum=$_GET['num'];

       $sql = "select * from product where bNum=$bNum";

       $stt=$pdo->prepare($sql);

       // var_dump($stt);
       $stt->execute();

       //print_r($stt);

       $sql = "delete from product where bNum=$bNum";
       $stt=$pdo->prepare($sql);
       $stt->execute();

       $pdo=NULL;

       echo "
           <script>
            location.href = 'list.php';
           </script>
        ";
   } catch (PDOException $e) {
       exit("DB ERROR : {$e->getMessage()}");
   }
?>


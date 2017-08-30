<?php
    session_start();
    require_once "../lib/cDBManager.php";

    try {
        $obj=new DBManager();
        $pdo=$obj->connect();

        $product_name = $_POST['product_name'];
        $sql="select * from product where proper='properM' and pName='{$product_name}'";

        $stt=$pdo->prepare($sql);

        $stt->execute();
        $row=$stt->fetch(PDO::FETCH_ASSOC);

        $this_state = $_POST['this_count'];

        if ($_POST['purchase_count'] == 0) {
            echo "<script>
                    alert('수량을 정해주세요.');
                    history.go(-1);
                  </script>";
        } else {
            $minus = $_POST['purchase_count'];

            $new_state = $this_state - $minus;
            // print_r($new_state);

            if ($new_state == 0){
                $sql = "update product set pCount=0 where pName='{$product_name}'";
                $stt = $pdo->prepare($sql);

                $stt->execute();
            } else if ($new_state < 0){
                echo "<script>
                        alert('재고가 부족합니다.');
                        history.go(-1);
                      </script>";
            } else {
                $sql = "update product set pCount='{$new_state}' where pName='{$product_name}'";
                $stt = $pdo->prepare($sql);

                $stt->execute();
            }

            $regist_day = date('Y-m-d (H:I)');
            print_r($_SESSION['id']);
            $sql = "insert into cart values('','{$regist_day}','{$_SESSION['id']}','{$product_name}','{$_POST['pPrice']}','{$_POST['true']}')";
            $stt=$pdo->prepare($sql);
            $stt->execute();

            echo "<script>location.href='./detailForm.php?Mna={$product_name}'</script>";
        }
    } catch (PDOException $e) {
        exit("DB ERROR : {$e->getMessage()}");
    }
?>
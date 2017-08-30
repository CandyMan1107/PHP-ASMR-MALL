<?php
    session_start();

    require_once "../lib/cDBManager.php";

    try {
        $obj=new DBManager();
        $pdo=$obj->connect();

        $pName=$_GET['Mna'];
        $sql="select * from product where pName='{$pName}'";

        $stt=$pdo->prepare($sql);

        $stt->execute();
        $row=$stt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ASMR MALL</title>
    <link rel="stylesheet" href="../css/basic.css" media="all">
    <link rel="stylesheet" href="../css/star_a.css">
    <script type="text/javascript" src="../js/js_updateCounts.js"></script>
</head>
<body>
<div id="wrap_menu">
    <div id="header">
        <?php
            require_once "../lib/menu_login2.php";
        ?>
        <a href="../index.php" class="title">
            ASMR MALL
        </a>
        <hr style="border: solid 3px white;">
    </div>
    <div id="menu">
        <?php
            require_once "../lib/top_menu2.php";
        ?>
    </div>

    <div id="content">
        <br>
        <div class="clear"></div>

        <div id="list_content">
            <div id="t_list_item">
                <div style="float: left; width: 700px;">
                    <img src="../rootBoard/data/<?php echo $pName; ?>.jpg" />
                </div>
                <div align="center">
                    <h1><?php echo $row['pTrueName']?></h1>
                    <br>
                    <h2>
                        $ <?php echo $row['pPrice'];
                        //print_r($row);
                        ?>
                    </h2>
                    <br>
                    <hr style="border: solid 3px white;">
                    <br>
                    <?php
                    if (!isset($_SESSION['id'])) {
                        echo "로그인 후 구입이 가능합니다.";
                    } else {
                        ?>
                        <form action="update_counts.php" name="add_cart" method="post">
                            <input type="hidden" name="id" value=<?=$_SESSION['id']?>">
                            <input type="hidden" name="pPrice" value="<?=$row['pPrice']?>">
                            <input type="hidden" name="true" value=<?=$row['pTrueName']?>">

                            <input type="hidden" name="product_name" value="<?=$row['pName']?>">
                            <input type="hidden" name="this_count" value="<?=$row['pCount']?>">
                            수량 :
                            <input type="number" name="purchase_count"">
                            <br>
                            <input type="submit" value="구매">
                        </form>
                        <?php
                    }
                    ?>
                    <div style="padding: 20px;"></div>
                    <p style="font-size: large">
                        <?php
                        echo $row['pSubs'];
                        ?>
                    </p>
                    <div style="padding: 30px;"></div>
                    <p>
                        <?php
                        if ($row['pCount'] == 0) {
                            echo "품절된 상품입니다.";
                        } else {
                            ?>
                            재고 : <?php echo $row['pCount']; ?>개
                            <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
        } catch (PDOException $e) {
            exit("DB ERROR : {$e->getMessage()}");
        }
        ?>
        <div class="clear"></div>

    </div>
</div>
</body>
</html>

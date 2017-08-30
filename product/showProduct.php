<?php
    session_start();

    require_once "../lib/cDBManager.php";

    try {
        $obj=new DBManager();
        $pdo=$obj->connect();

        $sql="select * from product where proper='properM'";

        $stt = $pdo->prepare($sql);

        $stt->execute();

        while($row=$stt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ASMR MALL</title>
    <link rel="stylesheet" href="../css/basic.css" media="all">
    <link rel="stylesheet" href="../css/star_a.css">
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
        <h3 align="center">
            Microphones
        </h3>
        <br>
        <div class="clear"></div>
        <div id="list_content">
            <div id="t_list_item">
                <?php
                    echo ("<table>");
                echo "<tr align='center'>";
                foreach ($result as $key) {

                    echo "<td>";
                    echo "<a href='./detailForm.php?Mna={$key['pName']}'>";
                    echo "<img src='../rootBoard/data/{$key['pName']}.jpg' class='" . $key['pName'] . "' width='100%' height='auto'>";

                    echo "</a>";
                    echo "<br>";
                    echo "<a href='./detailForm.php?Mna={$key['pName']}'>";
                    echo "<span>" . $key['pTrueName'] . "</span>";

                    echo "<br>";

                    echo "<span> $ " . $key['pPrice'] . "</span>";

                    echo "</a>";

                    echo "</td>";
                }
                echo("</tr>");
                echo("</table>");
                ?>
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

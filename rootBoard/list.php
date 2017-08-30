<?php
    session_start();

    require_once "../lib/cDBManager.php";

    if (!isset($_SESSION['id'])) {
        echo "<script>
                    alert('관리자로 로그인 후 이용해주세요.')
                    location.href='../login/LogIn_Form.php';
              </script>";
    } else if (substr($_SESSION['id'], 0, 4) != 'root') {
    echo "<script>
                    alert('관리자로 로그인 후 이용해주세요.')
                    history.go(-1)
          </script>";
    }
    else{

    try {

        $obj = new DBManager();
        $pdo = $obj->connect();

        $sql = "select * from product order by bNum desc";

        $stt = $pdo->prepare($sql);

        $stt->execute();

       //  print_r($stt);

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
        <h3>
            관리자 상품 관리 게시판
        </h3>
        
        <div style="padding: 20px;"></div>
        
        <div>
            <table id="list_table" align="center" width="90%">
                <thead align="center">
                <tr>
                    <th class="list_num" colspan="2">NO</th>
                    <th class="list_title" colspan="5">상품명</th>
                    <th class="list_id" colspan="2">ID</th>
                    <th class="list_id" colspan="5">PROPER</th>
                    <th class="list_day" colspan="5">작성일</th>
                    <th class="list_hit" colspan="2">HIT</th>
                </tr>
                </thead>
                <tbody align="center">
                <?php

                    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                        $result[] = $row;
                    }

                    //print_r($stt);

                    foreach($result as $key) {
                    echo "<tr>
                        <td colspan='2'>
                            {$key['bNum']}
                        </td>
                        <td colspan='5'><a href='./view.php?num={$key['bNum']}'>{$key['pName']}</a></td>
                        <td colspan='2'>{$key['id']}</td>
                        <td colspan='5'>{$key['proper']}</td>
                        <td colspan='5'>{$key['regist_day']}</td>
                        <td colspan='2'>{$key['hit']}</td>
                    </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        
        <div style="padding: 20px;"></div>
        
        <button onclick="location.href='write_form.php'" style="float: right;">상품게시</button>
            <?php
                    } catch (PDOException $e) {
                        exit("DB ERROR :{$e->getMessage()}");
                    }
                }
            ?>
    </div>
</div>
</body>
</html>
<?php
    session_start();
    require_once "../lib/cDBManager.php";

    try {
        $obj = new DBManager();
        $pdo = $obj->connect();

        $sql = "select * from product where bNum={$_GET['num']}";

        $stt = $pdo->prepare($sql);
        $stt->execute();

        $row = $stt->fetch(PDO::FETCH_ASSOC);

        $item_num = $row['bNum'];
        $item_id = $row['id'];
        $item_hit = $row['hit'];

        $path = $row['upfile_name'];

        $item_date = $row['regist_day'];
        $item_subject = str_replace(" ", "&nbsp;", $row['pName']);

        $item_content = str_replace(" ", "&nbsp;", $row['pSubs']);
        $item_content = str_replace("\n", "<br>", $item_content);
        $new_hit = $item_hit + 1;

        $sql = "update product set hit=$new_hit where bNum=$item_num";       // 글 조회수 증가시킴

        $stt = $pdo->prepare($sql);
        $stt->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ASMR MALL</title>
    <link rel="stylesheet" href="../css/basic.css" media="all">
    <link rel="stylesheet" href="../css/star_a.css">
<body>
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

    <div id="content" style="width: 1000px;">
        <h3>
            상품 등록 게시판
        </h3>
        <div style="padding: 20px;"></div>
        <div id="view_comment"> &nbsp;</div>
        <div id="view_title">
            <div id="view_title1" align="center"><h4>[ <?= $item_subject ?> ]</h4></div>
            <div style="padding: 20px;"></div>
            <div id="view_title2" style="float: right;"><?= $_SESSION['id'] ?> | 조회 : <?= $item_hit ?>
                | <?= $item_date ?> </div>
        </div>
        <div style="padding: 20px;"></div>
        <div id="view_content">
            <div id="view_content1"><?= $item_content ?></div>
            <div style="padding: 20px;"></div>
            <div id="view_content2" align="right">
                <?php
                    if (isset($path) && $path!="") {
                        echo "
                            <img src={$path} width='800'>
                        ";
                    }
                ?>
            </div>
        </div>
        <div style="padding: 20px;"></div>
        <div id="view_button" style="float: right;">
            <?php
                if (isset($path) && $path!="") {
                    echo "
                        <a href='fileDownload.php?num={$item_num}'>[첨부파일 다운로드]</a>
                    ";
                }
            ?>
            &nbsp;
            <a href="list.php">[목록]</a>&nbsp;
            <?php
            if ($_SESSION['id'] && $_SESSION['id'] == $item_id) {
                ?>&nbsp;
                <a href="delete.php?num=<?= $item_num ?>">[삭제]</a>&nbsp;
                <?php
            }
            ?>
            <?php
                } catch (PDOException $e) {
                    exit("DB ERROR : {$e->getMessage()}");
                }
            ?>
        </div>
        <div class="clear"></div>

    </div>
</div>
</div>

</body>
</html>

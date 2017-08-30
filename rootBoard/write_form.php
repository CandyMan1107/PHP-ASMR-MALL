<?php
    session_start();
    require_once "../lib/cDBManager.php";

    try {
        $obj = new DBManager();
        $pdo = $obj->connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ASMR MALL</title>
    <link rel="stylesheet" href="../css/basic.css" media="all">
    <link rel="stylesheet" href="../css/star_a.css">
    <script type="text/javascript" src="../js/js_write_form.js"></script>
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

        <h3>상품 게시글 작성</h3>

        <div class="clear"></div>

        <form name="board_form" method="post" action="insert.php" enctype="multipart/form-data">

            <div id="write_form">
                <div class="write_line"></div>

                <div class="showId">
                    ID &nbsp; <?= $_SESSION['id'] ?>
                </div>

                <div class="write_line"></div>

                <div class="showPName">
                    <b>상품명</b> &nbsp;
                    <input type="text" name="pName">
                </div>

                <div class="write_line"></div>

                <div class="showPTrueName">
                    <b>상품 상세명</b> &nbsp;
                    <input type="text" name="pTrueName">
                </div>

                <div class="write_line"></div>

                <div class="proper">
                    <b>상품타입</b> &nbsp;
                    <select name="proper">
                        <option value="properM">마이크</option>
                    </select>
                    </div>

                <div class="write_line"></div>

                <div class="showPPrice">
                    <b>상품가격 &nbsp;
                    $</b> <input type="number" name="pPrice">
                </div>

                <div class="write_line"></div>

                <div class="showPSubs">
                    <b>상품정보</b> &nbsp;
                    <div>
                        <textarea rows="15" cols="79" name="pSubs"></textarea>
                    </div>
                </div>

                <div class="write_line"></div>

                <div class="showPSubs">
                    <b>상품재고</b> &nbsp;
                    <input type="number" name="pCount"> 개
                </div>

                <div class="write_line"></div>

                <div><b>첨부파일</b></div>
                <div class="upFile">
                    <input type="file" name="upFile"> * 5MB까지 업로드 가능!
                </div>

                <div class="clear"></div>

                <div id="write_button">
                    <input type="button" onclick="check_input()" value="작성" />
                    <input type="button" onclick="location='list.php'" value="목록">
                </div>
        </form>

    </div>


    <?php
    } catch (PDOException $e) {
        exit("DB ERROR : {$e->getMessage()}");
    }
    ?>

</div>
</div>

</body>
</html>

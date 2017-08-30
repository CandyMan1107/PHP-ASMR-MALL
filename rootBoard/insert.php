<meta charset="utf-8">
<?php
    session_start();

    require_once "../lib/cDBManager.php";

    function fileUpload($pName, $pFile_dr)
    {
        // input 태그 name, 상대 경로

        $rFile_path = "";
        // 안하면 문자열 선언 안한걸로

        $fileName = $_FILES[$pName]['name'];
        $file_path = $pFile_dr . $fileName;
        $file_tmp = $_FILES[$pName]['tmp_name'];  // 내가 지정한게 아니라 프로그램에서 직접 지정한 서버상 파일명 => 서버에 저장된 파일의 임시 복사본의 이름

        if (move_uploaded_file($file_tmp, $file_path)) { // 새 위치로 업로드된 파일 이동
            // 반환값이 true or false
            $rFile_dr = $pFile_dr;
            $rFile_name = $fileName;
            $rFile_path = $rFile_dr . $rFile_name;
        }

        return $rFile_path;
    } // 실제 파일 경로를 문자열로 반환하는 함수


    try {
        $s_fileUpload = fileUpload("upFile", "./data/");

        $obj = new DBManager();
        $pdo = $obj->connect();

        $regist_day = date("Y-m-d (H:i)");
        $hit=0;

        $sql = "insert into product ";
        $sql .= "values('', '$hit', '{$regist_day}', '{$_SESSION['id']}', '{$_POST['pName']}', '{$_POST['pPrice']}', '{$_POST['pSubs']}','{$_POST['pCount']}', '{$_POST['proper']}', '{$s_fileUpload}', '{$_POST['pTrueName']}')";

        $stt = $pdo->prepare($sql);
        $stt->execute();


        $pdo = NULL;                // DB 연결 끊기

        echo "
               <script>
                location.href = 'list.php';
               </script>
            ";

    } catch (PDOException $e) {
        exit("DB ERROR : {$e->getMessage()}");
    }
?>

  

<?php
    require_once "../lib/cDBManager.php";

    try {
        $obj = new DBManager();
        $pdo = $obj->connect();

        $bNum = $_GET['num'];

        $sql = "select upfile_name from product where bNum='{$bNum}'";
        $stt = $pdo->prepare($sql);
        $stt->execute();
        $row=$stt->fetch(PDO::FETCH_ASSOC);

        $result = $row['upfile_name'];

        // 파일 경로 ./data/
        $file_dir = substr($result, 0, 7);
        
        // 파일 이름
        $fileName = substr($result, 7);
        
        // urldecode : 주어진 문자열의 인코딩을 디코드
        $real_filename = urldecode($fileName);

        print_r($file_dir);
        print_r($fileName);
        header("Content-Type:application/octet-stream");
        header("Content-Length".filesize($file_dir.$fileName));
        header("Content-Disposition:attachment;filename=".$real_filename);
        header("Content-Transfer-Encoding:binary");
        $fp=fopen($file_dir.$fileName,"r"); // Opens File Or URL  // r : 읽기 전용 오픈 
        fpassthru($fp); // 파일 포인터에 남아있는 모든 데이터 출력 // 파일 전달하고
        fclose($fp); // 열려있는 파일 포인터를 닫는다. // 파일 닫고
    } catch (PDOException $e) {
        exit("DB ERROR : {$e->getMessage()}");
    }
?>